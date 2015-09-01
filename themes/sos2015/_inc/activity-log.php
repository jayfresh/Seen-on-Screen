<?php	define( 'ACTIVITY_LOG_VERSION', '2.7' );	function activity_log_display_last( $post_id ) {		if( $timestamp = activity_log_get_last( $post_id ) ) {			$timestamp = strtotime($timestamp);			echo sprintf( 'Last activity <abbr class="timeago" title="%s">%s</abbr>', date('c', $timestamp), date( 'F jS, Y', $timestamp) );		}	}	function activity_log_get_last( $post_id ) {		global $wpdb;		return $wpdb->get_var( "SELECT time FROM {$wpdb->prefix}activity_log WHERE post_id = $post_id ORDER BY time DESC LIMIT 1;" );	}	function activity_log_install() {		global $wpdb;		if( get_option('activity_log_db_version') != ACTIVITY_LOG_VERSION ) {			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');			$collate = '';			$wpdb->query( "RENAME TABLE {$wpdb->prefix}activity_log TO {$wpdb->prefix}old_activity_log;" );			if($wpdb->supports_collation()) {				if(!empty($wpdb->charset)) $collate = "DEFAULT CHARACTER SET $wpdb->charset";				if(!empty($wpdb->collate)) $collate .= " COLLATE $wpdb->collate";			}			$sql = "CREATE TABLE " . $wpdb->activity_log . " (				id 			INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,				user_id		INT(10) UNSIGNED NULL,								post_id		INT(10) UNSIGNED NULL,				time 		TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,				type 		VARCHAR(128) NOT NULL,				entry 		TEXT NOT NULL,				UNIQUE KEY id (id)			);";			if( dbDelta($sql) ) {				$rows = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}old_activity_log;" );				foreach( $rows as $row ) {					$post_id = $row->post_id;					$time = date('Y-m-d G:i', $row->time );					$type = 'old_'.$row->type;					$entry = $row->entry;					$wpdb->insert( $wpdb->activity_log, compact( 'time', 'post_id', 'type', 'entry' ), array(  '%s', '%d', '%s', '%s' )  );				}				update_option("activity_log_db_version", ACTIVITY_LOG_VERSION );			}		}	}	add_action( 'switch_theme', 'activity_log_install');	function activity_log_init() {		global $wpdb;		$variable_name = 'activity_log';		$wpdb->$variable_name = $wpdb->prefix . $variable_name;		$wpdb->tables[] = $variable_name;	}	add_action( 'init', 'activity_log_init' );	function activity_log_handler( $entry = array(), $post_id = null ) {		global $wpdb, $current_user;		if( get_option('activity_log_db_version') != ACTIVITY_LOG_VERSION ) {			activity_log_install();		}		if(!is_user_logged_in()) {         $user_id = 0;      } else {			get_currentuserinfo();			$user_id = $current_user->ID;		}		// Set a default value for entry and type		$entry = array_merge( array( 'type' => 'Anonymous', 'entry' => 'Not specified.' ), $entry );		if( is_array($entry) ) extract( $entry );		$entry = serialize( $entry );		$wpdb->insert( $wpdb->activity_log, compact( 'user_id', 'post_id', 'type', 'entry' ), array( '%d', '%d', '%s', '%s' )  );	}	add_action( 'activity_log', 'activity_log_handler', 10, 2 );	function activity_log_menu() {		add_menu_page( 'Activity Log', 'Activity Log', 'publish_posts', 'activity-log-admin', 'activity_log_menu_handler');	}	add_action('admin_menu', 'activity_log_menu', 25 );	function activity_log_menu_handler() {		if (!current_user_can('manage_options'))  {			wp_die( __('You do not have sufficient permissions to access this page.') );		}		echo '<div class="wrap"><h1>Activity Log</h1>';		$wp_list_table = new Activity_Log_Table();		$wp_list_table->prepare_items();		$wp_list_table->display();		echo '</div>';	}	if(!class_exists('WP_List_Table')){		if( file_exists(ABSPATH . 'wp-admin/includes/screen.php') ) {			require_once( ABSPATH . 'wp-admin/includes/screen.php' );		} else {			require_once( ABSPATH . 'wp-admin/includes/template.php' );		}		require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );	}	class Activity_Log_Table extends WP_List_Table {		function __construct( ){			parent::__construct( array(				 'singular'  => 'activity_log',				 'plural'    => 'activity_logs',				 'ajax'      => false			));		}		function no_items() {			_e( 'No log records have been found.', 'homemade' );		}		function column_default($item, $column_name){			return $item[ $column_name ];		}		function column_timestamp( $item ) {			return date( 'Y-m-d H:i:s', strtotime( $item['time'] ) );		}		function column_type( $item ) {			return $item['type'];		}		function column_entry( $item ) {			$entry = unserialize( $item['entry'] );			if( is_array($entry) ) {				return $entry['entry'];			} else {				return $entry;			}		}		function column_extended( $item ) {			$html = '';			$entry = unserialize( $item['entry'] );			if( is_array( $entry ) ) {				unset( $entry['entry'] );				foreach( $entry as $key => $value ) {					$html  .= sprintf( '<strong>%s: </strong>%s<br/>', $key, $value );				}			} else {				$html = 'n/a';			}			return $html;		}		function column_post_id( $item ) {			if( $item['post_id'] ) {				return $item['post_id']; // maybe return title here			} else {				return 'n/a';			}		}		function get_columns(){			$columns = array();			$columns['timestamp'] = __('Timestamp', 'activity_log' );			$columns['post_id'] = __('Post ID', 'activity_log' );			$columns['type'] = __('Type', 'activity_log' );			$columns['entry'] = __('Entry', 'activity_log' );			$columns['extended'] = __('Extended Data', 'activity_log' );			return $columns;		}		function get_sortable_columns() {			return null;		}		function prepare_items() {			global $wpdb;			$per_page = $this->get_items_per_page('posts_per_page');			$columns = $this->get_columns();			$hidden = array();			$sortable = $this->get_sortable_columns();			$this->_column_headers = array($columns, $hidden, $sortable);			$this->items = $wpdb->get_results( "SELECT SQL_CALC_FOUND_ROWS * FROM $wpdb->activity_log ORDER BY time DESC", ARRAY_A );			$total_items = $wpdb->get_var( 'SELECT FOUND_ROWS()' );			$this->set_pagination_args( array(				 'total_items' => $total_items,				 'per_page'    => $per_page,				 'total_pages' => ceil($total_items / $per_page)			) );		}	}
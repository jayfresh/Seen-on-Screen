<?php
	/* Template Name: Packages page */

get_header();

?>

<div class="threebox doublemarginright left">
					<div class="box">
						<h3 id="softcore">'Just For You'</h3>
						<ul>
							<li>4 Tuesday classes</li>
							<li>1 Monthly workshop</li>
							<li>One 1:1 class</li>
							<li><strong>&pound;195</strong></li>
						</ul>
						<a href="<?php bloginfo('url'); ?>/contact?page=packages&class=Just%20For%20You" class="bookbutton">Book now</a>
					</div>
					<!--<img id="grey_shadow" src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/sliced/grey_shadow.jpg" alt="dancer" class="bottomline" />-->
				</div>
				<div class="threebox doublemarginright left">
					<div class="box">
						<h3 id="mediumcore">'Friends Package'</h3>
						<ul>
							<li>4 Tuesday classes</li>
							<li>1 Monthly workshop</li>
							<li>One private class</li>
							<li>For 2 &ndash; 4 people</li>
							<li><strong>From &pound;112 each</strong></li>
						</ul>
						<a href="<?php bloginfo('url'); ?>/contact?page=bookings&class=Friends" class="bookbutton">Book now</a>
					</div>
				</div>
				<div class="threebox left">
					<div class="box">
						<h3 id="hardcore">SPECIAL OFFER</h3>
						<ul>
							<li><strong>Offer extended!</strong></li>
							<li>6 week course every Tuesday</li>
							<li>Notting Hill, Harbour Club</li>
							<li><strong>7 &ndash; 8:30pm</strong></li>
							<li><strong>&pound;95</strong></li>
						</ul>
						<a href="<?php bloginfo('url'); ?>/contact?page=bookings&class=Special%20Offer" class="bookbutton">Book now</a>
					</div>
				</div>
				<div class="grid10col padright left" id="packages">
					<h2>Welcome to our exciting new range of SoS packages that allow you to make the most of Seen On Screen Fitness!</h2>
					<p>If you would like to treat yourself or someone special our <strong>'Just For You'</strong> package would make a fantastic gift, especially with Christmas coming up. We also know you like to work out with friends so our new <strong>'Friends Package'</strong> is the perfect opportunity to get fit and have fun with your favourite people. Both packages include a special 1:1 class which will be choreographed specially, and take place at the studio location most convenient for you! Packages are designed to fit within a month, however they are flexible so if you can't make a class, you can roll over to the next available date within three months.</p>
					<p>We have an exciting new offer over the next 2 weeks for our <strong>NEW</strong> weekly Tuesday classes at the Harbour Club, Notting Hill. The classes will run as a 6 week course and if you book online between now and November 8th you get 6 classes for the price of 5 so don't miss out! If you don't want to commit to all 6 weeks, you can still book online for a single class or drop in for &pound;20 on the day. However, you could be at risk of not getting a spot as places are limited, so best to book online!</p>
					<p><strong>Weekly class details</strong><br />
					<strong>Dates</strong>: every Tuesday, from Nov 8th<br />
					<strong>Time</strong>: 7 &ndash; 8.30pm<br />
					<strong>Address</strong>: The Harbour Club Notting Hill, 1 Alfred Road, W2 5EU (<a href="http://maps.google.co.uk/maps/place?q=The+Harbour+Club+Notting+Hill,+1+Alfred+Road,+W2+5EU&hl=en&cid=12429843881671570323" target="_blank">map</a>)<br />
					<strong>Price</strong>: &pound;20 (&pound;18 when booking online)</p>
					<p>To book in for a single Tuesday class, please select a date from the drop-down below and click on the "Buy Now" button.</p>
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="text-align:center;">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="QNS74S75LGUD4">
						<table style="margin: 0 auto 10px;">
						<tr><td><input type="hidden" name="on0" value="Choose Tuesday class">Choose Tuesday class</td></tr><tr><td><select name="os0">
							<option value="November 8th">November 8th &pound;18.00</option>
							<option value="November 15th">November 15th &pound;18.00</option>
							<option value="November 22nd">November 22nd &pound;18.00</option>
							<option value="November 29th">November 29th &pound;18.00</option>
							<option value="December 6th">December 6th &pound;18.00</option>
							<option value="December 13th">December 13th &pound;18.00</option>
						</select> </td></tr>
						</table>
						<input type="hidden" name="currency_code" value="GBP">
						<input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal Ñ The safer, easier way to pay online.">
						<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
					</form>
					<p>For any queries regarding our packages please get in touch at <a href="mailto:info@seenonscreenfitness.com">info@seenonscreenfitness.com</a> or call
SoS director Bonnie Parsons on 07525003465.</p>
					<!--<p>*<strong>Friends Package Prices</strong><br />
					2 People - &pound;320<br />
					3 People - &pound;390<br />
					4 People - &pound;448</p>-->
				</div>
				<!--<div class="threebox left">
					<!--<a href="#" title="Click to book a FREE assessment with Bonnie Parsons">--><!--<img class="fullwidth" src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/sliced/bon_portrait.jpg" alt="book button" />
					<p class="smaller">Your consultation will be with Bonnie Parsons, Seen On Screen's director.<!--<a href="#"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/green_right_arrow.jpg" alt="book button" /></a>--><!--</p>-->
				<!--</div>-->
<?php get_footer(); ?>

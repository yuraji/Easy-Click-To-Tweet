<?php

		add_action( 'admin_menu', 'ca_click_to_tweet_menu_page' );

		function ca_click_to_tweet_menu_page(){
			add_menu_page( 
						'Click To Tweet', 
						'Click To Tweet', 
						'manage_options', 
						'click-to-tweet', // This is the slug for the "Click To Tweet" top-level page
						'click_to_tweet', 
						 'dashicons-twitter',
						 6 ); 
			

				add_submenu_page( 
								'click-to-tweet', 
								'1Upgrade To Pro', 
								'Pro Waiting List',
								'manage_options', 
								'stuff-to-tweet2', 
								'ca_extensions_submenu_page_callback' );

		}

		function click_to_tweet(){

			do_action( 'add_meta_boxes' ); ?>

			<div id="poststuff" class="ctt-settings-wrap">
				<div id="post-body" class="metabox-holder columns-2">
					<div id="post-body-content">
						
						<div id="postbox-container-1" class="postbox-container">
							<div id="side-sortables" class="meta-box-sortables">
								<?php do_meta_boxes( 'toplevel_page_click-to-tweet', 'side', false ); ?>
							</div>
						</div>
						<div id="postbox-container-2" class="postbox-container">
							<h3 class="test">How to Use Easy Click To Tweet By Cheeky Apps</h3>
							<p>Creating beautiful, responsive, and click freindly Tweet boxes is easier
								than ever with <strong>“Easy Click To Tweet Boxes By Cheeky Apps.”</strong> Simply use our short
								codes to produce the Tweet Box you desire and share it with the world. 

							<p>In this short tutorial, we will teach you how to use our plugin. </p>

							<h4>Step One: Go to Any Post Or Page</h4>

								<img src="<?php echo esc_url( plugins_url( 'assets/img/step1.png', __FILE__ ) ); ?>" alt="Step 1" />
							

							<h4>Step Two: Write the Text You'd like to Tweet</h4>

								<img src="<?php echo esc_url( plugins_url( 'assets/img/step2.png', __FILE__ ) ); ?>" alt="Step 2" />

							<h4>Step Three: Select the Tweet Box you would like to use</h4>

								<img src="<?php echo esc_url( plugins_url( 'assets/img/step3.png', __FILE__ ) ); ?>" alt="Step 3" />

							<p>Press "OK" and your good to go!</p>	

							<h4> Quick Tip: Use a Popular Hash Tags & URL Shotern</h4>
							<p><i>We strongly recommend using <a href="https://bitly.com/" target="_blank">Bitly.com</a> or <a href="http://tinyurl.com/" target="_blank">TinyUrl.com</a>
							</i> to produce short urls of the content you would like to share. This will make sure your Tweets do not go over 140 
							characters limit and <strong>drive traffic back to your site</strong></p> 

							<p>It is also a good idea to use a popular Hashtag. Doing this will help your Tweets spread around the internet like wild fire ;-)</p>

							<div id="normal-sortables" class="meta-box-sortables">
								<?php do_meta_boxes( 'toplevel_page_click-to-tweet', 'normal', false ); ?>
							</div>
						</div>
						<br class="clear">
					</div><!-- /#post-body-content -->
				</div><!-- /#post-body -->
			</div><!-- /#poststuff -->
			<?php

		}


		// Callback Settings page 


		function ca_settings_submenu_page_callback() {
			
			echo '<div class="wrap"><div id="icon-tools" class="icon32"></div>';
				echo '<h2>My Custom Submenu Page</h2>';
			echo '</div>';

		}

	// Callback Extensions page 

		function ca_extensions_submenu_page_callback() {
	//pending interesting code here...

		}

		function ca_redirect_upgrade_page() {
			wp_redirect( 'http://google.com', 301 );
			exit;
		}
		add_action( 'load-click-to-tweet_page_stuff-to-tweet2', 'ca_redirect_upgrade_page' );

// dave two
function dh_ptp_upgrade_to_premium_menu_js()
{
    ?>
    <script type="text/javascript">
    	jQuery(document).ready(function ($) {
            $('a[href="admin.php?page=stuff-to-tweet2"]').on('click', function () {
        		$(this).attr('target', '_blank');
            });
        });
    </script>
        <style>
        a[href="admin.php?page=stuff-to-tweet2"] {
            color: #6bbc5b !important;
        }
        a[href="admin.php?page=stuff-to-tweet2"]:hover {
            color: #7ad368 !important;
        }
    </style>

    <?php 
}
add_action( 'admin_footer', 'dh_ptp_upgrade_to_premium_menu_js');



// dave two 




		function ca_ctt_register_meta_boxes() {
			// add_meta_box( 'ca-ctt-sample-meta-box', __( 'Sample Meta Box', 'textdomain' ), 'ca_ctt_sample_meta_box', 'toplevel_page_click-to-tweet', 'normal' );

			add_meta_box( 'ca-ctt-sample-side-meta-box', __( 'Want More Twitter Traffic?', 'textdomain' ), 'ca_ctt_sample_side_meta_box', 'toplevel_page_click-to-tweet', 'side' );
		}
		add_action( 'add_meta_boxes', 'ca_ctt_register_meta_boxes' );


		function ca_ctt_sample_meta_box() {
			?>
			<h3>Hello meta box</h3>
			<?php
		}
		


		function ca_ctt_sample_side_meta_box() {
			?>
			<h3 class="text">Upgrade to Pro and Drive More Twitter Traffic to Your Site!</h3>
				<ul>	
					<!-- Can I remove the PTP_LOC?  -->
					<li><div class="dashicons dashicons-yes"></div> <?php _e( 'Remove "Powered By CheekyApps.com"' ); ?></li>
                    <li><div class="dashicons dashicons-yes"></div> <?php _e( 'More Gorgeous Designs' ); ?></li>
                    <li><div class="dashicons dashicons-yes"></div> <?php _e( 'Priority Email Support' ); ?></li>
					<li><div class="dashicons dashicons-yes"></div> <?php _e( 'Access to "Highlight to Tweet"' ); ?></li>
                    <li><div class="dashicons dashicons-yes"></div> <?php _e( 'And much more...' ); ?></li>			
				</ul>
				
				<p style="text-align: center;">
					<a class="button button-primary button-large" target="_blank" href="Http://www.Google.com">Get On The Waiting List</a>
				</p>
			<?php
		}
		

		function ca_ctt_enqueue_settings_css( $hook ) {
			if ( 'toplevel_page_click-to-tweet' == $hook ) {
				wp_enqueue_style( 'ca_ctt_admin', plugins_url( 'assets/css/ca_click_to_tweet_admin.css', __FILE__ ) );
			}
		}
		add_action( 'admin_enqueue_scripts', 'ca_ctt_enqueue_settings_css' );

?>
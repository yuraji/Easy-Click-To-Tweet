<?php 
	
	class ca_clicktotweet_button {


		public function ca_clicktotweet_button() {
			// Register admin only hooks
			if ( is_admin() ) {
				$this->register_admin_hooks();
			}
		}

		public function __construct() {
			$this->ca_clicktotweet_button();
		}

		public function register_admin_hooks(){
			// Add button plugin to TinyMCE
			add_action('init', array($this, 'tinymce_button'));

			add_action( 'admin_head-post.php', array( $this, 'setup_button_js' ) );
			add_action( 'admin_head-post-new.php', array( $this, 'setup_button_js' ) );
		}
		

		public function tinymce_button(){
			if (!current_user_can('edit_posts')  && !current_user_can ( 'edit_pages' ) ){
				return;
			}
	

			if ( get_user_option ( 'rich_editing' ) == 'true' ){
				add_filter( 'mce_external_plugins', array($this, 'tinymce_register_plugin') );
				add_filter( 'mce_buttons', array($this, 'tinymce_register_button' ) );

			}

		}

		public function tinymce_register_button($buttons) {
		   array_push( $buttons, "|", "ca-clicktotweet");
		   return $buttons;
		}


		public function tinymce_register_plugin($plugin_array) {
		   $plugin_array['ca-clicktotweet'] = plugins_url( '/assets/js/ca-clicktotweet-plugin.js', __FILE__);
		   return $plugin_array;
		}




		public function setup_button_js() {
			if (!current_user_can('edit_posts')  && !current_user_can ( 'edit_pages' ) ){
				return;
			}
	

			if ( get_user_option ( 'rich_editing' ) == 'true' ){
				?>
				<script type="text/javascript">
					var CAClickToTweet = <?php echo json_encode( array(
						'url' => plugins_url( '/', __FILE__ ),
						'button_title' => __( 'Click To Tweet', '' ),
					) ); ?>;
				</script>
				<?php
			}
		}

	}

	$ca_clicktotweet_button = new ca_clicktotweet_button();
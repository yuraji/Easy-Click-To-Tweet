<?php

function ca_click_to_tweet_shortcode( $atts, $content = null ) {
	extract( shortcode_atts(array(
		'theme' => 'default',
	), $atts, 'Tweet' /* Shortcode name for attribute filtering */ ) );

	$html = apply_filters( 'ca_Tweet_shortcode_html', '', $theme, $content, $atts );

	if ( '' != $html ) {
		return $html;
	}

	$classes = array( 'click-to-tweet' );
	$classes[] = 'ctt-theme-' . $theme;

	$classes = implode( ' ', $classes );

	$tweet_url = 'https://twitter.com/intent/tweet';
	$tweet_url = add_query_arg( array(
		'lang' => 'en',
		'text' => urlencode( $content ),
	), $tweet_url );

	ob_start(); ?>
		<div class="<?php echo esc_attr( $classes ); ?>">
	<!-- 	change to that werid twitter link -->
			<a href="<?php echo esc_url( $tweet_url ); ?>" class="tweet-link" target="_blank"><?php echo $content; ?></a>
		</div>
	<?php

	return ob_get_clean();
}
add_shortcode( 'Tweet', 'ca_click_to_tweet_shortcode' );


function ca_click_to_tweet_enqueue_scripts() {
	wp_register_style( 'ca_click_to_tweet', plugins_url( 'assets/css/ca_click_to_tweet.css', __FILE__ ) );

	if ( apply_filters( 'ca_click_to_tweet/enqueue_css', true ) ) {
		wp_enqueue_style( 'ca_click_to_tweet' );
	}
}
add_action( 'wp_enqueue_scripts', 'ca_click_to_tweet_enqueue_scripts' );

// Powered By for the basic-white theme 

function ca_override_basic_white_tweet_shortcode( $return, $theme, $content, $atts ) {
	if ( 'basic-white' == $theme ) {
		// $return = '<div>Basic white shortcode override</div>';

		$classes = array( 'click-to-tweet' );
		$classes[] = 'ctt-theme-' . $theme;

		$classes = implode( ' ', $classes );

		$tweet_url = 'https://twitter.com/intent/tweet';
		$tweet_url = add_query_arg( array(
			'lang' => 'en',
			'text' => urlencode( $content ),
		), $tweet_url );

		ob_start(); ?>
		<div class="<?php echo esc_attr( $classes ); ?>">

			<a href="<?php echo esc_url( $tweet_url ); ?>" class="tweet-link" target="_blank">
				<?php echo $content; ?>
				<span class="ctt-cta">Click to Tweet</span>
			</a>
			<a href="http://google.com/" target="_blank" class="powered-by">Powered by CheekyApps.com</a>
		</div>
		<?php

		$return = ob_get_clean();
	}

	return $return;

}
add_filter( 'ca_Tweet_shortcode_html', 'ca_override_basic_white_tweet_shortcode', 10, 4 );


// Powered By for the basic-border theme 

function ca_override_basic_border_tweet_shortcode( $return, $theme, $content, $atts ) {
	if ( 'basic-border' == $theme ) {
		// $return = '<div>Basic border shortcode override</div>';

		$classes = array( 'click-to-tweet' );
		$classes[] = 'ctt-theme-' . $theme;

		$classes = implode( ' ', $classes );

		$tweet_url = 'https://twitter.com/intent/tweet';
		$tweet_url = add_query_arg( array(
			'lang' => 'en',
			'text' => urlencode( $content ),
		), $tweet_url );

		ob_start(); ?>
		<div class="<?php echo esc_attr( $classes ); ?>">
	<!-- 	change to that werid twitter link -->
			<a href="<?php echo esc_url( $tweet_url ); ?>" class="tweet-link" target="_blank">
				<span class="text-wrap"><?php echo $content; ?></span>
				<span class="ctt-cta"><i class="bird-icon"></i> Click to Tweet</span>
			</a>
			<a href="http://google.com/" target="_blank" class="blue-powered-by">Powered by CheekyApps.com</a>
		</div>
		<?php

		$return = ob_get_clean();
	}

	return $return;
	
}
add_filter( 'ca_Tweet_shortcode_html', 'ca_override_basic_border_tweet_shortcode', 10, 4 );

// Powered By for the basic-full theme 


function ca_override_basic_full_powered_by_shortcode( $return, $theme, $content, $atts ) {
	if ( 'basic-full' == $theme ) {
		// $return = '<div>Basic border shortcode override</div>';

		$classes = array( 'click-to-tweet' );
		$classes[] = 'ctt-theme-' . $theme;

		$classes = implode( ' ', $classes );

		$tweet_url = 'https://twitter.com/intent/tweet';
		$tweet_url = add_query_arg( array(
			'lang' => 'en',
			'text' => urlencode( $content ),
		), $tweet_url );

		ob_start(); ?>
		<div class="<?php echo esc_attr( $classes ); ?>">
			<a href="<?php echo esc_url( $tweet_url ); ?>" class="tweet-link" target="_blank">
				<span class="text-wrap"><?php echo $content; ?></span>
				<span class="ctt-cta"><i class="bird-icon"></i> Click to Tweet</span>
			</a>
			<a href="http://google.com/" target="_blank" class="powered-by">Powered by CheekyApps.com</a>
		</div>
		<?php

		$return = ob_get_clean();
	}

	return $return;
	
}
add_filter( 'ca_Tweet_shortcode_html', 'ca_override_basic_full_powered_by_shortcode', 10, 4 );



function ca_override_basic_full_tweet_shortcode( $return, $theme, $content, $atts ) {
	if ( 'basic-full' == $theme ) {
		// $return = '<div>Basic white shortcode override</div>';

		$classes = array( 'click-to-tweet' );
		$classes[] = 'ctt-theme-' . $theme;

		$classes = implode( ' ', $classes );

		$tweet_url = 'https://twitter.com/intent/tweet';
		$tweet_url = add_query_arg( array(
			'lang' => 'en',
			'text' => urlencode( $content ),
		), $tweet_url );

		ob_start(); ?>
		<div class="<?php echo esc_attr( $classes ); ?>">
	<!-- 	change to that werid twitter link -->
			<a href="<?php echo esc_url( $tweet_url ); ?>" class="tweet-link" target="_blank">
				<?php echo $content; ?>
				<span class="ctt-cta">Click to Tweet</span>
			</a>
			<a href="http://google.com/" target="_blank" class="powered-by">Powered by CheekyApps.com</a>
		</div>
		<?php

		$return = ob_get_clean();
	}

	return $return;

}
add_filter( 'ca_Tweet_shortcode_html', 'ca_override_basic_full_tweet_shortcode', 10, 4 );

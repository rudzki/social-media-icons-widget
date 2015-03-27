<?php
/*
Plugin Name: Social Media Icons Widget
Description: A simple widget that displays social media icons
Author: Chris Rudzki
*/

// Create widget class.
class WPCOM_Social_Media_Icons_Widget extends WP_Widget {

	private $defaults;

	function __construct() {
		$widget_args = array( 'classname' => 'wpcom-social-media-icons-widget', 'description' => __( 'Add social media icons to your sidebar.' ) );
		parent::__construct( 'wpcom_social_media_icons_widget', __( 'Social Media Icons' ), $widget_args );

		$this->defaults = array(
			'title'              => __( 'Social' ),
			'facebook_username'  => '',
			'twitter_username'   => '',
			'instagram_username' => '',
			'pinterest_username' => '',
			'linkedin_username'  => '',
			'github_username'    => '',
		);
	}

	public function widget( $args, $instance ) {
		$instance = wp_parse_args( (array) $instance, $this->defaults );
		$instance['title'] = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );

		add_action( 'wp_footer', array( $this, 'wpcom_social_media_icons_widget_css' ) );

		echo $args['before_widget'];

		if ( $instance['title'] ) {
			echo $args['before_title'] . esc_html( $instance['title'] ) . $args['after_title'];
		}

		echo '<ul>';

		if ( ! empty( $instance['facebook_username'] ) ) {
			echo '<li><a title="View ' . $instance['facebook_username'] . '&#8217;s profile on Facebook" href="' . esc_url( 'https://www.facebook.com/' . $instance['facebook_username'] . '/' ) . '">' . '<span class="genericon genericon-facebook"></span>' . '</a></li>';
		}

		if ( ! empty( $instance['twitter_username'] ) ) {
			echo '<li><a title="View ' . $instance['twitter_username'] . '&#8217;s profile on Twitter" href="' . esc_url( 'https://twitter.com/' . $instance['twitter_username'] . '/' ) . '">' . '<span class="genericon genericon-twitter"></span>' . '</a></li>';
		}

		if ( ! empty( $instance['instagram_username'] ) ) {
			echo '<li><a title="View ' . $instance['instagram_username'] . '&#8217;s profile on Instagram" href="' . esc_url( 'https://instagram.com/' . $instance['instagram_username'] . '/' ) . '">' . '<span class="genericon genericon-instagram"></span>' . '</a></li>';
		}

		if ( ! empty( $instance['pinterest_username'] ) ) {
			echo '<li><a title="View ' . $instance['pinterest_username'] . '&#8217;s profile on Pinterest" href="' . esc_url( 'https://www.pinterest.com/' . $instance['pinterest_username'] . '/' ) . '">' . '<span class="genericon genericon-pinterest-alt"></span>' . '</a></li>';
		}

		if ( ! empty( $instance['linkedin_username'] ) ) {
			echo '<li><a title="View ' . $instance['linkedin_username'] . '&#8217;s profile on LinkedIn" href="' . esc_url( 'https://www.linkedin.com/in/' . $instance['linkedin_username'] . '/' ) . '">' . '<span class="genericon genericon-linkedin-alt"></span>' . '</a></li>';
		}

		if ( ! empty( $instance['github_username'] ) ) {
			echo '<li><a title="View ' . $instance['github_username'] . '&#8217;s profile on GitHub" href="' . esc_url( 'https://github.com/' . $instance['github_username'] . '/' ) . '">' . '<span class="genericon genericon-github"></span>' . '</a></li>';
		}

		echo '</ul>';

		echo $args['after_widget'];
	}

	function wpcom_social_media_icons_widget_css() {
	?>
		<style type="text/css">

		.wpcom-social-media-icons-widget ul {
			margin-left: 0;
		}

		.wpcom-social-media-icons-widget ul li::before {
			display: none;
		}

		.wpcom-social-media-icons-widget li {
			display: inline;
			margin-right: 0.5em;
		}

		.wpcom-social-media-icons-widget li a {
			text-decoration: none;
		}

		</style>
	<?php
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, $this->defaults );

	?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'facebook_username' ) ); ?>"><?php esc_html_e( 'Facebook username:' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook_username' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook_username' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['facebook_username'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'twitter_username' ) ); ?>"><?php esc_html_e( 'Twitter username:' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter_username' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter_username' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['twitter_username'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'instagram_username' ) ); ?>"><?php esc_html_e( 'Instagram username:' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram_username' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram_username' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['instagram_username'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'pinterest_username' ) ); ?>"><?php esc_html_e( 'Pinterest username:' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest_username' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest_username' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['pinterest_username'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'linkedin_username' ) ); ?>"><?php esc_html_e( 'LinkedIn username:' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin_username' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin_username' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['linkedin_username'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'github_username' ) ); ?>"><?php esc_html_e( 'GitHub username:' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'github_username' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'github_username' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['github_username'] ); ?>" />
		</p>
	<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']              = strip_tags( $new_instance['title'] );
		$instance['facebook_username']  = strip_tags( $new_instance['facebook_username'] );
		$instance['twitter_username']   = strip_tags( $new_instance['twitter_username'] );
		$instance['instagram_username'] = strip_tags( $new_instance['instagram_username'] );
		$instance['pinterest_username'] = strip_tags( $new_instance['pinterest_username'] );
		$instance['linkedin_username']  = strip_tags( $new_instance['linkedin_username'] );
		$instance['github_username']    = strip_tags( $new_instance['github_username'] );

		return $instance;
	}
}// WPCOM_Social_Media_Icons_Widget

// Register and load the widget.
function wpcom_social_media_icons_widget_load_widget() {
	register_widget( 'wpcom_social_media_icons_widget' );
}
add_action( 'widgets_init', 'wpcom_social_media_icons_widget_load_widget' );
<?php
/*
Plugin Name: Social Media Icons Widget
Description: A simple widget that displays social media icons
Author: Chris Rudzki
*/

// Creating the widget 

class WPCOM_social_media_icons_widget extends WP_Widget {

function __construct() {
	parent::__construct(
		'wpcom_social_media_icons_widget',
		__('Social Media Icons', 'wpcom_social_media_icons_widget'), 
		array( 'description' => __( 'A simple widget that displays social media icons', 'wpcom_social_media_icons_widget' ), ) 
	);
	if ( is_active_widget( false, false, $this->id_base ) ) {
		add_action( 'wp_head', array( $this, 'wpcom_social_media_icons_widget_css' ) );
	}
}

function wpcom_social_media_icons_widget_css() {
?>
<style type="text/css">

.widget_wpcom_social_media_icons_widget ul {
	margin-left: 0;
}

.widget_wpcom_social_media_icons_widget li {
	display: inline;
	margin-right: 0.5em;
}

.widget_wpcom_social_media_icons_widget li a {
	text-decoration: none;
}

</style>
<?php	
}

// front end
public function widget( $args, $instance ) {

	$widget_title = isset( $instance['title'] ) ? $instance['title'] : __( 'Social', 'wpcom_social_media_icons_widget' );
	$title = apply_filters( 'widget_title', $widget_title );
	$facebook_username = isset( $instance['facebook_username'] ) ? $instance['facebook_username'] : '';
	$twitter_username = isset( $instance['twitter_username'] ) ? $instance['twitter_username'] : '';
	$instagram_username = isset( $instance['instagram_username'] ) ? $instance['instagram_username'] : '';
	$pinterest_username = isset( $instance['pinterest_username'] ) ? $instance['pinterest_username'] : '';
	$linkedin_username = isset( $instance['linkedin_username'] ) ? $instance['linkedin_username'] : '';
	$github_username = isset( $instance['github_username'] ) ? $instance['github_username'] : '';

	// before widget arguments
	echo $args['before_widget'];

	if ( ! empty( $title ) )
		echo $args['before_title'] . esc_html( $title ) . $args['after_title'];

	// display output
	echo '<ul>';

	if ( ! empty( $facebook_username ) )
		echo '<li><a title="View ' . $facebook_username . '&#8217;s profile on Facebook" href="' . esc_url( 'https://www.facebook.com/' . $facebook_username . '/' ) . '">' . '<span class="genericon genericon-facebook"></span>' . '</a></li>';

	if ( ! empty( $twitter_username ) )
		echo '<li><a title="View ' . $twitter_username . '&#8217;s profile on Twitter" href="' . esc_url( 'https://twitter.com/' . $twitter_username . '/' ) . '">' . '<span class="genericon genericon-twitter"></span>' . '</a></li>';

	if ( ! empty( $instagram_username ) )
		echo '<li><a title="View ' . $instagram_username . '&#8217;s profile on Instagram" href="' . esc_url( 'https://instagram.com/' . $instagram_username . '/' ) . '">' . '<span class="genericon genericon-instagram"></span>' . '</a></li>';

	if ( ! empty( $pinterest_username ) )
		echo '<li><a title="View ' . $pinterest_username . '&#8217;s profile on Pinterest" href="' . esc_url( 'https://www.pinterest.com/' . $pinterest_username . '/' ) . '">' . '<span class="genericon genericon-pinterest-alt"></span>' . '</a></li>';

	if ( ! empty( $linkedin_username ) )
		echo '<li><a title="View ' . $linkedin_username . '&#8217;s profile on LinkedIn" href="' . esc_url( 'https://www.linkedin.com/in/' . $linkedin_username . '/' ) . '">' . '<span class="genericon genericon-linkedin-alt"></span>' . '</a></li>';

	if ( ! empty( $github_username ) )
		echo '<li><a title="View ' . $github_username . '&#8217;s profile on GitHub" href="' . esc_url( 'https://github.com/' . $github_username . '/' ) . '">' . '<span class="genericon genericon-github"></span>' . '</a></li>';

	echo '</ul>';

	// after widget arguments
	echo $args['after_widget'];

}
		
// backend 
public function form( $instance ) {

	$widget_title = isset( $instance['title'] ) ? $instance['title'] : __( 'Social', 'wpcom_social_media_icons_widget' );
	$title = apply_filters( 'widget_title', $widget_title );
	$facebook_username = isset( $instance['facebook_username'] ) ? $instance['facebook_username'] : '';
	$twitter_username = isset( $instance['twitter_username'] ) ? $instance['twitter_username'] : '';
	$instagram_username = isset( $instance['instagram_username'] ) ? $instance['instagram_username'] : '';
	$pinterest_username = isset( $instance['pinterest_username'] ) ? $instance['pinterest_username'] : '';
	$linkedin_username = isset( $instance['linkedin_username'] ) ? $instance['linkedin_username'] : '';
	$github_username = isset( $instance['github_username'] ) ? $instance['github_username'] : '';

// widget settings
?>
<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'facebook_username' ); ?>"><?php _e( 'Facebook username:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'facebook_username' ); ?>" name="<?php echo $this->get_field_name( 'facebook_username' ); ?>" type="text" value="<?php echo esc_attr( $facebook_username ); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'twitter_username' ); ?>"><?php _e( 'Twitter username:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'twitter_username' ); ?>" name="<?php echo $this->get_field_name( 'twitter_username' ); ?>" type="text" value="<?php echo esc_attr( $twitter_username ); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'instagram_username' ); ?>"><?php _e( 'Instagram username:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'instagram_username' ); ?>" name="<?php echo $this->get_field_name( 'instagram_username' ); ?>" type="text" value="<?php echo esc_attr( $instagram_username ); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'pinterest_username' ); ?>"><?php _e( 'Pinterest username:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'pinterest_username' ); ?>" name="<?php echo $this->get_field_name( 'pinterest_username' ); ?>" type="text" value="<?php echo esc_attr( $pinterest_username ); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'linkedin_username' ); ?>"><?php _e( 'LinkedIn username:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'linkedin_username' ); ?>" name="<?php echo $this->get_field_name( 'linkedin_username' ); ?>" type="text" value="<?php echo esc_attr( $linkedin_username ); ?>" />
</p>
<p>
	<label for="<?php echo $this->get_field_id( 'github_username' ); ?>"><?php _e( 'GitHub username:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'github_username' ); ?>" name="<?php echo $this->get_field_name( 'github_username' ); ?>" type="text" value="<?php echo esc_attr( $github_username ); ?>" />
</p>
<?php 
}
	
// updating widget settings
public function update( $new_instance, $old_instance ) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	$instance['facebook_username'] = ( ! empty( $new_instance['facebook_username'] ) ) ? strip_tags( $new_instance['facebook_username'] ) : '';
	$instance['twitter_username'] = ( ! empty( $new_instance['twitter_username'] ) ) ? strip_tags( $new_instance['twitter_username'] ) : '';
	$instance['instagram_username'] = ( ! empty( $new_instance['instagram_username'] ) ) ? strip_tags( $new_instance['instagram_username'] ) : '';
	$instance['pinterest_username'] = ( ! empty( $new_instance['pinterest_username'] ) ) ? strip_tags( $new_instance['pinterest_username'] ) : '';
	$instance['linkedin_username'] = ( ! empty( $new_instance['linkedin_username'] ) ) ? strip_tags( $new_instance['linkedin_username'] ) : '';
	$instance['github_username'] = ( ! empty( $new_instance['github_username'] ) ) ? strip_tags( $new_instance['github_username'] ) : '';

return $instance;
	}
} // class ends here

// register and load the widget
function wpcom_social_media_icons_widget_load_widget() {
	register_widget( 'wpcom_social_media_icons_widget' );
}
add_action( 'widgets_init', 'wpcom_social_media_icons_widget_load_widget' );
?>

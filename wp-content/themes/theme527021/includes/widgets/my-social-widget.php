<?php
// =============================== My Social Networks Widget ====================================== //
class My_SocialNetworksWidget extends WP_Widget {

	function My_SocialNetworksWidget() {
		$widget_ops = array('classname' => 'social_networks_widget', 'description' => __('Link to your social networks.', CURRENT_THEME) );
		$this->WP_Widget('social_networks', __('Cherry - Social Networks', CURRENT_THEME), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty($instance['title']) ? '' : $instance['title'], $instance );

		$networks['Twitter']['link']    = $instance['twitter'];
		$networks['Facebook']['link']   = $instance['facebook'];
		$networks['Flickr']['link']     = $instance['flickr'];
		$networks['Feed']['link']       = $instance['feed'];
		$networks['Linkedin']['link']   = $instance['linkedin'];
		$networks['Pinterest']['link']  = $instance['Pinterest'];
		$networks['Youtube']['link']    = $instance['youtube'];
		$networks['Google']['link']    = $instance['google'];

		$networks['Twitter']['label']   = $instance['twitter_label'];
		$networks['Facebook']['label']  = $instance['facebook_label'];
		$networks['Flickr']['label']    = $instance['flickr_label'];
		$networks['Feed']['label']      = $instance['feed_label'];
		$networks['Linkedin']['label']  = $instance['linkedin_label'];
		$networks['Pinterest']['label'] = $instance['Pinterest_label'];
		$networks['Youtube']['label']   = $instance['youtube_label'];
		$networks['Google']['label']   = $instance['google_label'];

		// WPML compatibility
		// Check if WPML is activated, then reigster labels for translation
		if ( defined( 'ICL_SITEPRESS_VERSION' ) ) {
			foreach( $networks as $label => $val ) {
				$networks[$label]['label'] = icl_translate( 'cherry', 'social_widget_label_' . $label, $val['label'] );
			}
		}

		$display = $instance['display'];

		echo $before_widget;
		if( $title ) {
			echo $before_title;
				echo $title;
			echo $after_title;
		} ?>

		<!-- BEGIN SOCIAL NETWORKS -->
		<?php if ($display == "both" or $display =="labels") {
			$addClass = "social__list";
		} elseif ($display == "icons") {
			$addClass = "social__row clearfix";
		} ?>

		<ul class="social <?php echo $addClass ?> unstyled">

		<?php foreach(array("Twitter", "Facebook", "Flickr", "Feed", "Linkedin", "Pinterest", "Youtube", "Google") as $network) : ?>
			<?php if (!empty($networks[$network]['link'])) : ?>
			<li class="social_li">
				<a class="social_link social_link__<?php echo strtolower($network); ?>" rel="tooltip" data-original-title="<?php echo strtolower($networks[$network]['label']); ?>" href="<?php echo $networks[$network]['link']; ?>" target="_blank">
					<?php if (($display == "both") or ($display =="icons")) {  $networkIcon=$network; ?> 
						
						<?php if ($networkIcon == 'Feed') $networkIcon = 'Rss '; ?>
						<?php if ($networkIcon == 'Flickr') $networkIcon = 'Flickr '; ?>

						<?php if ($networkIcon == 'Google') $networkIcon = 'Google-plus '; ?>
						<?php if ($networkIcon == 'Pinterest') $networkIcon = 'pinterest '; ?>
						 <span class="social_icon icon-<?php echo strtolower($networkIcon);?>"></span>
					<?php } if (($display == "labels") or ($display == "both")) { ?>
						<?php if ( $networks[$network]['label'] != "" ) { echo '<span class="social_label">'.$networks[$network]['label'].'</span>'; }?>
					<?php } ?>
				</a>
			</li>
			<?php endif; ?>
		<?php endforeach; ?>

		</ul>
		<!-- END SOCIAL NETWORKS -->
		<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	function form( $instance ) {
		/* Set up some default widget settings. */
		$defaults = array( 'title' => '', 'twitter' => '', 'twitter_label' => '', 'facebook' => '', 'facebook_label' => '', 'flickr' => '', 'flickr_label' => '', 'feed' => '', 'feed_label' => '', 'linkedin' => '', 'linkedin_label' => '', 'Pinterest' => '', 'Pinterest_label' => '', 'youtube' => '', 'youtube_label' => '', 'google' => '', 'google_label' => '', 'display' => 'icons', 'text' => '');
		$instance = wp_parse_args( (array) $instance, $defaults );

		$twitter         = $instance['twitter'];
		$facebook        = $instance['facebook'];
		$flickr          = $instance['flickr'];
		$feed            = $instance['feed'];
		$linkedin        = $instance['linkedin'];
		$Pinterest       = $instance['Pinterest'];
		$youtube         = $instance['youtube'];
		$google          = $instance['google'];

		$twitter_label   = $instance['twitter_label'];
		$facebook_label  = $instance['facebook_label'];
		$flickr_label    = $instance['flickr_label'];
		$feed_label      = $instance['feed_label'];
		$linkedin_label  = $instance['linkedin_label'];
		$Pinterest_label = $instance['Pinterest_label'];
		$youtube_label   = $instance['youtube_label'];
		$google_label    = $instance['google_label'];

		$display         = $instance['display'];
		$title           = strip_tags($instance['title']);
?>
	<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', CURRENT_THEME) ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

	<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
		<legend style="padding:0 5px;"><?php _e('Facebook', CURRENT_THEME); ?>:</legend>

		<p><label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook URL', CURRENT_THEME) ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('facebook_label'); ?>"><?php _e('Facebook label', CURRENT_THEME) ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('facebook_label'); ?>" name="<?php echo $this->get_field_name('facebook_label'); ?>" type="text" value="<?php echo esc_attr($facebook_label); ?>" /></p>
	</fieldset>

	<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
		<legend style="padding:0 5px;"><?php _e('Twitter', CURRENT_THEME); ?>:</legend>
	<p><label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter URL', CURRENT_THEME); ?>:</label>
	<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id('twitter_label'); ?>"><?php _e('Twitter label', CURRENT_THEME); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('twitter_label'); ?>" name="<?php echo $this->get_field_name('twitter_label'); ?>" type="text" value="<?php echo esc_attr($twitter_label); ?>" /></p>
	</fieldset>

	<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
		<legend style="padding:0 5px;"><?php _e('Flickr', CURRENT_THEME); ?>:</legend>
	<p><label for="<?php echo $this->get_field_id('flickr'); ?>"><?php _e('Flickr URL', CURRENT_THEME); ?>:</label>
	<input class="widefat" id="<?php echo $this->get_field_id('flickr'); ?>" name="<?php echo $this->get_field_name('flickr'); ?>" type="text" value="<?php echo esc_attr($flickr); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id('flickr_label'); ?>"><?php _e('Flickr label', CURRENT_THEME) ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('flickr_label'); ?>" name="<?php echo $this->get_field_name('flickr_label'); ?>" type="text" value="<?php echo esc_attr($flickr_label); ?>" /></p>
	</fieldset>

	<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
		<legend style="padding:0 5px;"><?php _e('RSS feed', CURRENT_THEME); ?>:</legend>
	<p><label for="<?php echo $this->get_field_id('feed'); ?>"><?php _e('RSS feed', CURRENT_THEME); ?>:</label>
	<input class="widefat" id="<?php echo $this->get_field_id('feed'); ?>" name="<?php echo $this->get_field_name('feed'); ?>" type="text" value="<?php echo esc_attr($feed); ?>" /></p>
	<p><label for="<?php echo $this->get_field_id('feed_label'); ?>"><?php _e('RSS label', CURRENT_THEME) ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('feed_label'); ?>" name="<?php echo $this->get_field_name('feed_label'); ?>" type="text" value="<?php echo esc_attr($feed_label); ?>" /></p>
	</fieldset>

	<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
			<legend style="padding:0 5px;"><?php _e('Linkedin', CURRENT_THEME); ?>:</legend>
	<p><label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin URL', CURRENT_THEME); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo esc_attr($linkedin); ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('linkedin_label'); ?>"><?php _e('Linkedin label', CURRENT_THEME) ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('linkedin_label'); ?>" name="<?php echo $this->get_field_name('linkedin_label'); ?>" type="text" value="<?php echo esc_attr($linkedin_label); ?>" /></p>
		</fieldset>

	<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
			<legend style="padding:0 5px;"><?php _e('Pinterest', CURRENT_THEME); ?>:</legend>
	<p><label for="<?php echo $this->get_field_id('Pinterest'); ?>"><?php _e('Pinterest URL', CURRENT_THEME); ?>:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('Pinterest'); ?>" name="<?php echo $this->get_field_name('Pinterest'); ?>" type="text" value="<?php echo esc_attr($Pinterest); ?>" /></p>
		<p><label for="<?php echo $this->get_field_id('Pinterest_label'); ?>"><?php _e('Pinterest label', CURRENT_THEME) ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('Pinterest_label'); ?>" name="<?php echo $this->get_field_name('Pinterest_label'); ?>" type="text" value="<?php echo esc_attr($Pinterest_label); ?>" /></p>
		</fieldset>

	<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
		<legend style="padding:0 5px;"><?php _e('Youtube', CURRENT_THEME); ?>:</legend>
		<p>
			<label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('Youtube URL', CURRENT_THEME) ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo esc_attr($youtube); ?>" /></p>
		<p>
			<label for="<?php echo $this->get_field_id('youtube_label'); ?>"><?php _e('Youtube label', CURRENT_THEME); ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('youtube_label'); ?>" name="<?php echo $this->get_field_name('youtube_label'); ?>" type="text" value="<?php echo esc_attr($youtube_label); ?>" />
		</p>
	</fieldset>

	<fieldset style="border:1px solid #dfdfdf; padding:10px 10px 0; margin-bottom:1em;">
		<legend style="padding:0 5px;"><?php _e('Google', CURRENT_THEME); ?>:</legend>
		<p>
			<label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('Google URL', CURRENT_THEME); ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" type="text" value="<?php echo esc_attr($google); ?>" /></p>
		<p>
			<label for="<?php echo $this->get_field_id('google_label'); ?>"><?php _e('Google label', CURRENT_THEME); ?>:</label>
			<input class="widefat" id="<?php echo $this->get_field_id('google_label'); ?>" name="<?php echo $this->get_field_name('google_label'); ?>" type="text" value="<?php echo esc_attr($google_label); ?>" />
		</p>
	</fieldset>


		<p><?php _e('Display', CURRENT_THEME); ?>:</p>
		<label for="<?php echo $this->get_field_id('icons'); ?>"><input type="radio" name="<?php echo $this->get_field_name('display'); ?>" value="icons" id="<?php echo $this->get_field_id('icons'); ?>" <?php checked($display, "icons"); ?>></input>  <?php _e('Icons', CURRENT_THEME); ?></label>
		<label for="<?php echo $this->get_field_id('labels'); ?>"><input type="radio" name="<?php echo $this->get_field_name('display'); ?>" value="labels" id="<?php echo $this->get_field_id('labels'); ?>" <?php checked($display, "labels"); ?>></input> <?php _e('Labels', CURRENT_THEME); ?></label>
		<label for="<?php echo $this->get_field_id('both'); ?>"><input type="radio" name="<?php echo $this->get_field_name('display'); ?>" value="both" id="<?php echo $this->get_field_id('both'); ?>" <?php checked($display, "both"); ?>></input> <?php _e('Both', CURRENT_THEME); ?></label>
<?php
	}
}?>
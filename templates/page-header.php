  <?php 

  if((is_page() && !is_front_page())) {
		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
		$thumb_url = $thumb_url_array[0];

		$author_id 		  	= get_the_author_meta('ID');
		$author_badge 	  	= get_field('wp_avatar', 'user_'. $author_id );
		$youtube_link 	  	= get_field('youtube_link', 'user_'. $author_id );
		$twitter_feed 	  	= get_field('twitter_feed', 'user_'. $author_id );
		$facebook_profile 	= get_field('facebook_profile', 'user_'. $author_id );
		$instagram_account 	= get_field('instagram_account', 'user_'. $author_id );
		$snapchat_account 	= get_field('snapchat_account', 'user_'. $author_id );
		$google_maps 	  	= get_field('google_maps', 'user_'. $author_id );

		$header_text_color  = get_field('header_text_color');
		if($header_text_color == '')
			$header_text_color = 'light';

		$no_header = get_field('no_header');
		$video = get_post_meta( get_the_ID(), 'youtube_embed_link', true );

		if($no_header != 1) { // do this if the no header box is not checked

			if($video) {
  			?>
    			<header class="full-width content-header" id="bgndVideo" class="player" data-property="{videoURL:'<?php echo $video; ?>',containment:'self',startAt:0,mute:false,autoPlay:true,loop:false,opacity:1}">
    		<?php } else { ?>
    			<header class="full-width content-header" style="background: linear-gradient(rgba(245, 245, 245, 0), rgba(245, 245, 245, 0)), url(<?php echo $thumb_url; ?>) repeat center top;">
    		<?php 
    		} ?>
      <div class="container">
        <div class="row no-gutters">
		  <div class="col-md-8">
            <div class="row no-gutters">
              <div class="col-xs-12 header-text-<?php echo $header_text_color; ?>">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <?php 
	            $subheader = get_post_meta( get_the_ID(), 'sub-header', true );
	            if($subheader) {
	            	echo "<h3>".$subheader."</h3>";
	            }
	           ?>
              </div>
              <div class="col-xs-12">
	           <?php 
	 				//echo wp_oembed_get( $video, array('width'=>350) );
	           ?>
              </div>
              <div class="col-xs-12">
                <div class="row no-gutters align-items-center">
					<div class="col-xs-12 header-text-<?php echo $header_text_color; ?>	">
						<ul id="social-list-header" style="display: none;">
							<?php if($snapchat_account) { ?>
							<li><a href="<?php echo $snapchat_account; ?>" target="_blank">
								<span class="fa-stack fa-1x hvr-grow">
								  <i class="fa fa-circle fa-stack-2x icon-background"></i>
								  <i class="fa fa-snapchat-ghost fa-stack-1x icon-dark"></i>
								</span>
							</a></li>
							<?php } ?>
							<?php if($google_maps) { ?>
							<li><a href="<?php echo $google_maps; ?>" target="_blank">
								<span class="fa-stack fa-1x">
								  <i class="fa fa-circle fa-stack-2x icon-background"></i>
								  <i class="fa fa-google-plus fa-stack-1x icon-dark"></i>
								</span>
							</a></li>
							<?php } ?>
							<?php if($instagram_account) { ?>
							<li><a href="<?php echo $instagram_account; ?>" target="_blank">
								<span class="fa-stack fa-1x">
								  <i class="fa fa-circle fa-stack-2x icon-background"></i>
								  <i class="fa fa-instagram fa-stack-1x icon-dark"></i>
								</span>
							</a></li>
							<?php } ?>
							<?php if($facebook_profile) { ?>
							<li><a href="<?php echo $facebook_profile; ?>" target="_blank">
								<span class="fa-stack fa-1x">
								  <i class="fa fa-circle fa-stack-2x icon-background"></i>
								  <i class="fa fa-facebook fa-stack-1x icon-dark"></i>
								</span>
							</a></li>
							<?php } ?>
							<?php if($youtube_link) { ?>
							<li><a href="<?php echo $youtube_link; ?>" target="_blank">
								<span class="fa-stack fa-1x">
								  <i class="fa fa-circle fa-stack-2x icon-background"></i>
								  <i class="fa fa-youtube-play fa-stack-1x icon-dark"></i>
								</span>
							</a></li>
							<?php } ?>
							<?php if($twitter_feed) { ?>
							<li><a href="<?php echo $twitter_feed; ?>" target="_blank">
								<span class="fa-stack fa-1x">
								  <i class="fa fa-circle fa-stack-2x icon-background"></i>
								  <i class="fa fa-twitter fa-stack-1x icon-dark"></i>
								</span>
							</a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
              </div>
            </div>
          </div>
        </div>
      </div>
     <div id="bgndVideo" class="player" 
     data-property="{videoURL:'http://youtu.be/BsekcY04xvQ',containment:'body',autoPlay:true, mute:true, startAt:0, opacity:1}"></div>
    </header>
  <?php 
}

	}
  ?>
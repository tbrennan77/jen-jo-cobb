<?php get_template_part('templates/page', 'header'); 
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

if(is_author()) {
	 $curauth = (isset($_GET['author_name'])) ? 
        get_user_by('slug', $author_name) : 
        get_userdata(intval($author));
        
	$custom_args = array(
	  'post_type' => 'post',
	  'author' => $curauth->ID,
      'posts_per_page' => 5,
      'paged' => $paged
    );
} else { 
	$cat = get_category( get_query_var( 'cat' ) );
	$custom_args = array(
	  'post_type' => 'post',
	  'category_name' => $cat->slug,
      'posts_per_page' => 5,
      'paged' => $paged
    );
}

//echo $cat->ID;
?>
<div class="container-fluid blog-top full-width">
	<div class="row">
		<div class="col-sm-12">
		  <?php
		  $how_many_last_posts = intval(get_post_meta($post->ID, 'archived-posts-no', true));
		  if($how_many_last_posts > 200 || $how_many_last_posts < 2) $how_many_last_posts = 15;

		  $my_query = new WP_Query($custom_args);
		  if($my_query->have_posts()) {

		    $counter = 1;
		    while($my_query->have_posts() && $counter <= $how_many_last_posts) {
		      $my_query->the_post();

		      if($counter ==1) {
		      	$thumb_id = get_post_thumbnail_id();
				$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
				$thumb_url = $thumb_url_array[0];
		      ?>
		      <div class="row">
		      	<div class="col-sm-12 archive-header" style="background: linear-gradient(rgba(50,52,75,.45), rgba(50,52,75, 0.45)), url(<?php echo $thumb_url; ?>) repeat center top;">
		      		<div class="container align-bottom">
		      			<div class="row">
				      		<div class="col-sm-12">
				      		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				      		</div>
				      		<div class="col-sm-12">
				      		<span class="meta">By <?php the_author_posts_link(); ?></span><span class="meta"><?php the_date(); ?></span><span class="meta categories">#<?php the_category(' #'); ?></span><span class="meta"><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></span><span class="meta"><?php if ( function_exists( 'time_to_read' ) ) { echo time_to_read(); } ?></span>
				      			<?php the_excerpt(); ?>
				      		</div>
				      		<div class="col-sm-12 read-now">
				      			<div class="row">
				      				<div class="col-sm-3">
							      		<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							      			<button class="btn btn-outline-primary hvr-grow">Read Now</button>
							 			</a>
							 		</div>
							 		<div class="col-sm-9 float-right share-buttons">
										<a class="custom-share-button js-social-share bg-fb" href="https://twitter.com/intent/tweet/?text=Check%20out%20this%20website!&url=https%3A%2F%2Fjonsuh.com%2F&via=jonsuh" target="_blank">
										  <span class="custom-share-button-icon"><i class="fa fa-facebook" aria-hidden="true"></i></span>
										</a>

										<a class="custom-share-button js-social-share" href="https://twitter.com/intent/tweet/?text=Check%20out%20this%20website!&url=https%3A%2F%2Fjonsuh.com%2F&via=jonsuh" target="_blank">
										  <span class="custom-share-button-icon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
										</a>

										<a class="custom-share-button js-social-share bg-li" href="https://twitter.com/intent/tweet/?text=Check%20out%20this%20website!&url=https%3A%2F%2Fjonsuh.com%2F&via=jonsuh" target="_blank">
										  <span class="custom-share-button-icon"><i class="fa fa-linkedin" aria-hidden="true"></i></span>
										</a>
							 		</div>
					 			</div>
				      		</div>
			      		</div>
		      		</div>
		      	</div>
		      </div>

		      <?php
		  		} elseif($counter ==  2) {
		      ?>
		  		</div>
		  	  </div>
		      <div class="container mb-4">
		      	<div class="row">
		      		<div class="col-sm-4">
		      			<div class="row">
			      			<div class="col-sm-12 archive-meta text-center">
			      			<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
			      				<span>By <?php the_author_posts_link(); ?></span><span><?php the_date(); ?></span><span><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></span><br /><span class="categories">#<?php the_category(' #'); ?></span><span><?php if ( function_exists( 'time_to_read' ) ) { echo time_to_read(); } ?></span>
			      				<div class="share-buttons">
			      					<a class="custom-share-button js-social-share bg-fb" href="https://twitter.com/intent/tweet/?text=Check%20out%20this%20website!&url=https%3A%2F%2Fjonsuh.com%2F&via=jonsuh" target="_blank">
										<span class="custom-share-button-icon"><i class="fa fa-facebook" aria-hidden="true"></i></span>
									</a>

									<a class="custom-share-button js-social-share" href="https://twitter.com/intent/tweet/?text=Check%20out%20this%20website!&url=https%3A%2F%2Fjonsuh.com%2F&via=jonsuh" target="_blank">
										<span class="custom-share-button-icon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
									</a>

									<a class="custom-share-button js-social-share bg-li" href="https://twitter.com/intent/tweet/?text=Check%20out%20this%20website!&url=https%3A%2F%2Fjonsuh.com%2F&via=jonsuh" target="_blank">
										<span class="custom-share-button-icon"><i class="fa fa-linkedin" aria-hidden="true"></i></span>
									</a>
								</div>
			      			</div>
			      			<div class="col-sm-6 archive-excerpt hidden-xl-down">
					      		<?php the_excerpt(); ?>
					      		<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="readnow">Read Now &raquo;</a>
					      	</div>
					    </div>
		      		</div>
		      <?php 
		  		} elseif($counter ==  3) {
		      ?>
		      		<div class="col-sm-4">
		      			<div class="row">
			      			<div class="col-sm-12 archive-meta text-center">
			      			<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
			      				<span>By <?php the_author_posts_link(); ?></span><span><?php the_date(); ?></span><span><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></span><br /><span class="categories">#<?php the_category(' #'); ?></span><span><?php if ( function_exists( 'time_to_read' ) ) { echo time_to_read(); } ?></span>
			      				<div class="share-buttons">
			      					<a class="custom-share-button js-social-share bg-fb" href="https://twitter.com/intent/tweet/?text=Check%20out%20this%20website!&url=https%3A%2F%2Fjonsuh.com%2F&via=jonsuh" target="_blank">
										<span class="custom-share-button-icon"><i class="fa fa-facebook" aria-hidden="true"></i></span>
									</a>

									<a class="custom-share-button js-social-share" href="https://twitter.com/intent/tweet/?text=Check%20out%20this%20website!&url=https%3A%2F%2Fjonsuh.com%2F&via=jonsuh" target="_blank">
										<span class="custom-share-button-icon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
									</a>

									<a class="custom-share-button js-social-share bg-li" href="https://twitter.com/intent/tweet/?text=Check%20out%20this%20website!&url=https%3A%2F%2Fjonsuh.com%2F&via=jonsuh" target="_blank">
										<span class="custom-share-button-icon"><i class="fa fa-linkedin" aria-hidden="true"></i></span>
									</a>
								</div>
			      			</div>
			      			<div class="col-sm-6 archive-excerpt hidden-xl-down">
					      		<?php the_excerpt(); ?>
					      		<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="readnow">Read Now &raquo;</a>
					      	</div>
					    </div>
		      		</div>
		      <?php 
		  		} elseif($counter ==  4) {
		      ?>
			      	<div class="col-sm-4">
		      			<div class="row">
			      			<div class="col-sm-12 archive-meta text-center">
			      			<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
			      				<span>By <?php the_author_posts_link(); ?></span><span><?php the_date(); ?></span><span><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></span><br /><span class="categories">#<?php the_category(' #'); ?></span><span><?php if ( function_exists( 'time_to_read' ) ) { echo time_to_read(); } ?></span>
			      				<div class="share-buttons">
			      					<a class="custom-share-button js-social-share bg-fb" href="https://twitter.com/intent/tweet/?text=Check%20out%20this%20website!&url=https%3A%2F%2Fjonsuh.com%2F&via=jonsuh" target="_blank">
										<span class="custom-share-button-icon"><i class="fa fa-facebook" aria-hidden="true"></i></span>
									</a>

									<a class="custom-share-button js-social-share" href="https://twitter.com/intent/tweet/?text=Check%20out%20this%20website!&url=https%3A%2F%2Fjonsuh.com%2F&via=jonsuh" target="_blank">
										<span class="custom-share-button-icon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
									</a>

									<a class="custom-share-button js-social-share bg-li" href="https://twitter.com/intent/tweet/?text=Check%20out%20this%20website!&url=https%3A%2F%2Fjonsuh.com%2F&via=jonsuh" target="_blank">
										<span class="custom-share-button-icon"><i class="fa fa-linkedin" aria-hidden="true"></i></span>
									</a>
								</div>
			      			</div>
			      			<div class="col-sm-6 archive-excerpt hidden-xl-down">
					      		<?php the_excerpt(); ?>
					      		<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="readnow">Read Now &raquo;</a>
					      	</div>
					    </div>
			      	</div>
			      </div>
			    </div>
		      <?php 
		  		} elseif($counter ==  5) {
		      ?>
		      <div class="container" style="padding-top: 40px;">
		      	<div class="row">
		      		<div class="col-sm-8">
		      <?php 
		  		} else {
		      ?>
		      <div class="row content-row">
			      	<div class="col-sm-12">
			      		<img src="<?php the_post_thumbnail_url('750x300'); ?>" class="img-fluid clearfix feature-blog-img" />
			      	</div>
			      	<div class="col-sm-12 padding-20">
			      		<div class="row">
			      			<div class="col-sm-6 archive-meta">
			      			<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
			      				<span>By <?php the_author_posts_link(); ?></span><span><?php the_date(); ?></span><span><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></span><br /><span class="categories">#<?php the_category(' #'); ?></span><span><?php if ( function_exists( 'time_to_read' ) ) { echo time_to_read(); } ?></span>
			      				<div class="share-buttons">
			      					<a class="custom-share-button js-social-share bg-fb" href="https://twitter.com/intent/tweet/?text=Check%20out%20this%20website!&url=https%3A%2F%2Fjonsuh.com%2F&via=jonsuh" target="_blank">
										<span class="custom-share-button-icon"><i class="fa fa-facebook" aria-hidden="true"></i></span>
									</a>

									<a class="custom-share-button js-social-share" href="https://twitter.com/intent/tweet/?text=Check%20out%20this%20website!&url=https%3A%2F%2Fjonsuh.com%2F&via=jonsuh" target="_blank">
										<span class="custom-share-button-icon"><i class="fa fa-twitter" aria-hidden="true"></i></span>
									</a>

									<a class="custom-share-button js-social-share bg-li" href="https://twitter.com/intent/tweet/?text=Check%20out%20this%20website!&url=https%3A%2F%2Fjonsuh.com%2F&via=jonsuh" target="_blank">
										<span class="custom-share-button-icon"><i class="fa fa-linkedin" aria-hidden="true"></i></span>
									</a>
								</div>
			      			</div>
			      			<div class="col-sm-6 archive-excerpt">
					      		<?php the_excerpt(); ?>
					      		<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="readnow">Read Now &raquo;</a>
					      	</div>
					    </div>
			      	</div>
			  </div>
			  <?php 
				  // end counter == 1
			      if($counter == z3) { ?>
			    <div class="row content-row inline-widget-area">
			      	<div class="col-sm-12">
			      			<?php dynamic_sidebar('blog-page-widgets'); ?>
			      	</div>
			    </div>
			  <?php   
				  }
		      } 

		    $counter++;	// increase counter
		    } // end loop

		    wp_reset_postdata();
		  }
		  ?>
		  	  </div>
		      <div class="col-sm-4 sidebar">
		      	<?php dynamic_sidebar('post-sidebar'); ?>
		      </div>
		    </div>
		  </div>
		  <div class="container">
		  	<div class="row">
		  		<div class="col-sm-12 text-center">
				  <?php
			      if (function_exists(custom_pagination())) {
			        custom_pagination(5,"",$paged);
			      }
			      ?>
			    </div>
		      </div>
	      </div>
		</div>
	</div>
</div>

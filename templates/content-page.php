  <?php
    $full_width = get_field( "full_width" );
    //echo "Full Width: ".$full_width;
  ?>
  <article>
    <div class="entry-content mt-2">
      <?php if(!is_front_page() && is_page()) { ?>
      <div class="container">
  			<div class="row">
         <?php if($full_width == "yes") { ?>
          <div class="col-sm-12">
            <?php the_content(); ?>
          </div>
          <?php } else { ?>
          <div class="col-lg-8 col-sm-12">
            <?php the_content(); ?>
          </div>
          <div class="col-lg-4 col-sm-12 sidebar">
            <?php dynamic_sidebar('post-sidebar'); ?>
          </div>
          <?php } ?>
  			</div>
  	  </div>
	  <?php 
      } else {
      	the_content();
      }
      ?>
    </div>
    <footer style="display: none;">
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
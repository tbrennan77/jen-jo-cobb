  <?php
    $full_width = get_field( "full_width" );
    //echo "Full Width: ".$full_width;
  ?>
  <?php if(is_page( array( 'tools', 'resources' ) )) { ?>
  <figure class="tools">
    <div class="container">
      <div class="row">
        <div class="col-sm-4 investors">
          <a href="#" class="hvr-grow" data-toggle="modal" data-target="#investormodal">Are You An Investor?</a>

          <!-- Modal -->
          <div class="modal fade" id="investormodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <?php //echo do_shortcode('[podioform appid="18230182" formid="1225230" showfooter="no"]'); ?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="col-sm-4 capital">
          <a href="#" class="hvr-grow" data-toggle="modal" data-target="#capitalmodal">Do You Need Capital?</a>

          <!-- Modal -->
          <div class="modal fade" id="capitalmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <?php //echo do_shortcode('[podioform appid="18221669" formid="1224579" showfooter="no"]'); ?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

        </div>
      
        <div class="col-sm-4 deals">
          <a href="#" class="hvr-grow" data-toggle="modal" data-target="#dealsmodal">Submit Your Deal Here</a>

          <!-- Modal -->
          <div class="modal fade" id="dealsmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <?php //echo do_shortcode('[podioform appid="18221731" formid="1224588" showfooter="no"]'); ?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </figure>
  <?php } ?>
    <?php if(is_page( array( 'start-here' ) )) { ?>
  <figure class="tools">
    <div class="container">
      <div class="row">
        <div class="col-sm-4 learn">
          <a href="/ask-a-question" class="hvr-grow">Ask A Question</a>
        </div>
        <div class="col-sm-4 invest">
          <a href="/why-invest-in-real-estate" class="hvr-grow">Why Real Estate</a>
        </div>
        <div class="col-sm-4 partner">
          <a href="/partner" class="hvr-grow">Let's Get Going</a>
        </div>
      </div>
    </div>
  </figure>
  <?php } ?>
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
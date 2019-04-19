<footer class="content-info">
  <?php 
  	//echo the_field('featured_footer_background_image', 'option'); 
  	//echo the_field('feature_logo_1', 'option'); 
  ?>
  <div class="container sidebar-footer">
    <div class="row">
      <div class="col-lg-3 col-xs-12">
        <?php dynamic_sidebar('sidebar-footer-left'); ?>
      </div>
      <div class="col-lg-3 col-xs-12">
        <?php dynamic_sidebar('sidebar-footer-center'); ?>
      </div>
      <div class="col-lg-6 col-xs-12 sidebar-footer-right">
        <?php dynamic_sidebar('sidebar-footer-right'); ?>
      </div>
    </div>
  </div>
  <div class="container-fluid disclosures">
    <div class="row">
      <div class="container">
        <div class="row">
          <div class="col-ms-12">
            <?php
              if (has_nav_menu('footer_menu')) :
                  wp_nav_menu([ 'menu' => 'footer_menu',
                  'theme_location' => 'footer_menu',
                  'container_class' => '',
                  'menu_id' => false,
                  'menu_class' => 'footer-nav',
                  'depth' => 1
                  ]);
              endif;
            ?>
            <?php dynamic_sidebar('footer-disclaimer'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
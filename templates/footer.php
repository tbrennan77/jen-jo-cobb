<section class="pop-out-container">
  <div class="container">
    <div class="row">
      <div class="col-xs-0 col-sm-2"></div>
      <div class="col-xs-12 col-sm-8 text-center">
        <div class="pop-out">
          <?php dynamic_sidebar('sidebar-footer-center'); ?>
        </div>
      </div>
      <div class="col-xs-0 col-sm-2"></div>
    </div>
  </div>
</section>
<footer class="content-info">
  <div class="container sidebar-footer">
    <div class="row">
      <div class="col-xs-2"></div>
      <div class="col-xs-8 footer-social">
        <?php dynamic_sidebar('sidebar-footer-center-rt'); ?>
      </div>
      <div class="col-xs-2"></div>
    </div>
    <div class="row footer-border-row">
      <div class="col-lg-8 col-xs-12 mx-0 px-0">
        <?php dynamic_sidebar('sidebar-footer-left'); ?>
      </div>
      <div class="col-lg-4 ml-1 col-xs-12 sidebar-footer-right text-left mx-0 px-0">
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
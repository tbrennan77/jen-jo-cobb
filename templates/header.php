<header class="banner">
  <div class="container-fluid menu-bar">
    <div class="row">
        <div class="navbar-header col-lg-12">
          <nav class="navbar navbar-toggleable-md navbar-light sticky-top pr-0 pl-0">
            <div class="row">
              <div class="header-logo col-xs-6 col-lg-2 px-0">
                <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>">
                    <?php
                      if ( get_theme_mod('theme_logo') ) :
                        echo '<img src="' . esc_url( get_theme_mod('theme_logo') ) . '" class="img-fluid brand-logo">';
                      else:
                        echo get_bloginfo('name') . '<span>' . get_bloginfo('description') . '</span>';
                      endif;
                    ?>
                </a>
              </div>
              <div class="desktop-menu col-xs-0 col-lg-8 px-0">
                <?php
                  if (has_nav_menu('primary_navigation')) :
                    wp_nav_menu([ 'menu' => 'primary_navigation',
                      'theme_location' => 'primary_navigation',
                      'container_class' => 'collapse navbar-toggleable-md',
                      'menu_id' => false,
                      'menu_class' => 'nav navbar-nav',
                      'depth' => 2,
                      'fallback_cb' => 'bs4navwalker::fallback',
                      'walker' => new bs4navwalker()
                      ]);
                  endif;
                  
                  //get_template_part('templates/search');
                  ?>
              </div>
              <div class="social-menu col-xs-0 col-lg-2 px-0">
                <?php
                  if (has_nav_menu('social_navigation')) :
                    wp_nav_menu([ 'menu' => 17,
                      'theme_location' => 'social_navigation',
                      'menu_id' => false,
                      'menu_class' => 'social-nav',
                      'fallback_cb' => 'bs4navwalker::fallback',
                      'walker' => new bs4navwalker()
                      ]);
                  endif;
                  
                  //get_template_part('templates/search');
                  ?>
              </div>
              <div class="mobile-button col-xs-6 hidden-lg-up px-0">
                <button class="navbar-toggler navbar-toggler-right float-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  ☰
                </button>
              </div>
            </div>
          </nav>
        </div>
    </div>
  </div>
  <div class="container-fluid mobile-menu">
    <div class="row">
      <div class="col-sm-12 collapse navbar-collapse" id="navbarSupportedContent">
          <nav class="navbar navbar-light pull-left">
            <?php
              if (has_nav_menu('primary_navigation')) :
                  wp_nav_menu([ 'menu' => 'primary_navigation',
                  'theme_location' => 'primary_navigation',
                  'container_class' => 'collapse navbar-toggleable-md',
                  'menu_id' => false,
                  'menu_class' => 'nav navbar-nav',
                  'depth' => 2
                  ]);
              endif;
                
              if (has_nav_menu('social_navigation')) :
                    wp_nav_menu([ 'menu' => 17,
                      'theme_location' => 'social_navigation',
                      'menu_id' => false,
                      'menu_class' => 'social-nav',
                      'fallback_cb' => 'bs4navwalker::fallback',
                      'walker' => new bs4navwalker()
                      ]);
              endif;
                  
              //get_template_part('templates/search');
              ?>

          </nav>
        </div>
      </div>
    </div>
</header>

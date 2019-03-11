<header class="banner">
  <div class="container menu-bar">
    <div class="row">
        <div class="navbar-header col-lg-12">
          <nav class="navbar navbar-toggleable-md navbar-light sticky-top pr-0 pl-0">
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
          </nav>
        </div>
    </div>
  </div>
</header>

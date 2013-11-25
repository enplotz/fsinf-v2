<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
<?php global $user_identity, $current_user;
      get_currentuserinfo();
if (is_user_logged_in()) : ?>
            <ul class="nav navbar-nav pull-right">

            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <span class="glyphicon glyphicon-user"></span>
<?php
                      echo $user_identity;
?>
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                  <li>
                    <a href="/fachschaft/user-profile/"><span class="glyphicon glyphicon-cog"></span> Profil</a>
                  </li>
                <li class="divider"></li>
                <li>
                  <a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Logout"><span class="glyphicon glyphicon-off"></span> Logout</a>
                </li>
              </ul>
            </li>
          </ul><!-- User-Menu -->
<?php else : ?>
          <ul class="nav navbar-nav pull-right">
            <li>
              <?php wp_register('', ''); ?>
            </li>
            <li>
              <a href="<?php echo wp_login_url( get_permalink() ); ?>" title="Login">Login</a>
            </li>
          </ul>
<?php  endif; ?>
    </nav>
  </div>
</header>

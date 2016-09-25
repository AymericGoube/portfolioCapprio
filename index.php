<?php get_header(); ?>

<!-- ouvrir header,php -->
<header id="header">
  <h1>Bienvenue sur le portfolio de la promo 1 Capprio !</h1>
</header>
<section id="apprenants" class="centre">
  <h4>Nous vous présentons les apprenants de la formation Capprio, en intégration web !</h4>
  <div id="my_carousel" class="carousel slide hidden-xs" data-ride="carousel">
    <!-- Slides -->
    <div class="carousel-inner hidden-xs hidden-sm">
      <?php
      $blogusers = get_users( array( 'fields' => array( 'id', 'display_name' ) ) );
      // Array of stdClass objects.
      $count=0;
      $carousel_page=false;
      foreach ( $blogusers as $user ) {
        $id= $user->id;
        $url = site_url()."/index.php/profile/?id=".$id;
        $user_info = get_userdata($user->id);
        $photo = get_avatar_url($user->id);
        if ($carousel_page == false && $count == 0) {
          echo "<div class='item active'>";
          echo "<div class='carousel-page'>";
          $carousel_page = true;
        }
        else if ($carousel_page == true && $count == 0) {
          echo "<div class='item'>";
          echo "<div class='carousel-page'>";
        }
        echo "<a class='user_link' href='".$url."'>";
        echo "<div class='test'>";
        echo "<img src='".$photo."' alt='Photo de ".$user->display_name."' height='100%' width='100%'/>";
        echo "<div class='user_infos'>";
        echo "<span class='user_title'>".$user->display_name."</span>";
        echo "<span>".$user->display_name."</span>";
        echo "</div>";
        echo "</div>";
        echo "</a>";
        if ($count  == 3) {
          echo "</div>";
          echo "</div>";
          $count=0;
        }
        else {
          $count++;
        }
      }
      if ($count < 3) {
        echo "</div>";
        echo "</div>";
      }
      ?>
     </div>
    <!-- Contrôles -->
    <a class="left carousel-control" href="#my_carousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#my_carousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
  </div>

  <div id="my_carousel2" class="carousel slide visible-xs visible-sm" data-ride="carousel">
    <!-- Slides -->
    <div class="carousel-inner">
      <?php
      $blogusers = get_users( array( 'fields' => array( 'id', 'display_name' ) ) );
      // Array of stdClass objects.
      $count2=0;
      $carousel_page2=false;
      foreach ( $blogusers as $user ) {
        $id= $user->id;
        $url = site_url()."/index.php/profile/?id=".$id;
        $user_info = get_userdata($user->id);
        $photo = get_avatar_url($user->id);
        if ($carousel_page2 == false && $count2 == 0) {
          echo "<div class='item active'>";
          echo "<div class='carousel-page'>";
          $carousel_page2 = true;
        }
        else if ($carousel_page2 == true && $count2 == 0) {
          echo "<div class='item'>";
          echo "<div class='carousel-page'>";
        }
        echo "<a class='user_link' href='".$url."'>";
        echo "<div class='test'>";
        echo "<img src='".$photo."' alt='Photo de ".$user->display_name."' height='100%' width='100%'/>";
        echo "<div class='user_infos'>";
        echo "<span class='user_title'>".$user->display_name."</span>";
        echo "<span>".$user->display_name."</span>";
        echo "</div>";
        echo "</div>";
        echo "</a>";
        if ($count2  == 1) {
          echo "</div>";
          echo "</div>";
          $count2=0;
        }
        else {
          $count2++;
        }
      }
      if ($count2 < 1) {
        echo "</div>";
        echo "</div>";
      }
      ?>
      </div>
    </div>
    <!-- Contrôles -->
    <a class="left carousel-control" href="#my_carousel2" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#my_carousel2" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
  </div>
</section>

<?php get_footer(); ?>

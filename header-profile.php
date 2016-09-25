<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Portfolio Capprio - Profil</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Bootstrap -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <!-- <script src="https://use.fontawesome.com/52ab7fbddb.js"></script> -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.bundle.js"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
  <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
  <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
  <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
  <?php wp_get_archives('type=monthly&format=link'); ?>
  <?php //comments_popup_script(); <?php wp_head(); ?>
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/style.css'; ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div class="container-fluid lanav">
    <div class="row">
      <nav class="navbar navbar-default custom_navbar">

        <div class="navbar-header custom_navbar_header col-md-12">
          <button type="button" class="custom_menu navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <!-- <span class="sr-only">Toggle navigation</span> -->
            <span>Menu</span>
          </button>
          <a class="navbar-brand logo-air" href="<?php echo site_url().'/index.php'; ?>">
            <img style="width:200px;" src="<?php echo get_stylesheet_directory_uri().'/images/logo-w.png' ?>" alt=""/>
          </a>



          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li class="cadreli"><a class ="menu-basic" href="<?php echo site_url().'/index.php'; ?>"><img class="logos" src="<?php echo get_stylesheet_directory_uri().'/images/01.png' ?>"></a></li>
              <li class="cadreli"><a href="<?php echo site_url().'/index.php/#apprenants'; ?>"><img class="logos" src="<?php echo get_stylesheet_directory_uri().'/images/02.png' ?>"></a></li>
              <li class="cadreli"><a href="<?php echo site_url().'/index.php/gallerie'; ?>"><img class="logos" src="<?php echo get_stylesheet_directory_uri().'/images/03.png' ?>"></a></li>
              <li class="cadreli"><a href="<?php echo site_url().'/wp-login.php'; ?>"><img class="logos" src="<?php echo get_stylesheet_directory_uri().'/images/04.png' ?>"></a></li>
            </ul>
          </div>
        </nav>

      </div>
    </div>
  </div>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php bloginfo('name'); ?></title>    
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico">
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
  </head>

    <body <?php body_class(); ?>>
    
      <div class="pageWrap clearfix">

          <?php
              wp_nav_menu( array( 
                  'theme_location' => 'main_menu',
                  'container'       => 'nav',
                  'container_class' => '',
              ));
          ?>
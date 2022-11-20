<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
<div id="page" class="site">
    <header>
        
        <section class="search">
            <div class="container">
                <div class="row">Search</div>
            </div>
        </section>
        <section class="top-bar">
            <div class="container second-column">
                <div class="row">
                    <div class="brand col-3">Logo</div>
                    <div class="col-9">
                        <div class="container">
                            <div class="row">
                                <div class="account col-3">Account</div>
                                <div class="main-menu col-9">
                                    <?php wp_nav_menu( ['theme_location'  => 'woo_main_menu',
                                ] ); ?>
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>
            </div>
        </section>
    </header>
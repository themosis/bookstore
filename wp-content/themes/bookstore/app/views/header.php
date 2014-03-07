<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php wp_title(); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon(s) in the root directory -->

        <?php wp_head(); ?>
    </head>
    <body>
        <!--[if lt IE 8]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <header>
            <div id="bookstore-logo">
                <a href="<?php echo(home_url()); ?>">
                    <img src="<?php echo(themosisAssets()); ?>/images/logo.png" alt="Bookstore" width="154" height="40">
                </a>
            </div>
            <div id="bookstore-navigation">
                <?php 
                    wp_nav_menu(array(
                        'theme_location' => 'header-nav',
                        'container'      => false
                    ));
                ?>
            </div>
            <div id="bookstore-search">
                <div id="search-button"></div>
                <div id="search--form">
                    <div id="search--form__icon"></div>
                    <div id="search--form__form">
                        <form class="searchform" action="/" method="get" role="search">
                            <input id="s" placeholder="Search book" type="text" name="s" value=""></input>
                        </form>
                    </div>
                </div>
            </div>
        </header>
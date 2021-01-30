<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!--   REMOVE THIS META DESCRIPTION TAG IF USING YOAST     -->
		<meta name="description" content="<?php bloginfo('description'); ?>">
		
        <link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>

        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,400,600" rel="stylesheet">
        
        <?php wp_head(); ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

        <!--[if IE]>
        <style>
            .row { width: 100%; } /*because IE doesn't like flexbox*/
        </style>
        <![endif]-->

	</head>

	<body <?php body_class(); ?>>


        <div id="mobile-menu" class="navigation">
            <nav id="site-nav" class="main-nav" role="navigation">
                <div class="d-flex justify-content-between">
                    <?php theme5150_nav(); ?>
                </div>
            </nav>
        </div>

        <div id="nav-sliding-container">
            
            <header id="page-header" class="header clear" role="banner">
                <div class="menu-button-container">
                    <span class="menu-btn"></span>
                </div>
                <div id="desktop-menu" class="navigation">
                    <nav id="site-nav" class="main-nav" role="navigation">
                        <div class="d-flex justify-content-between">
                            <?php theme5150_nav(); ?>
                        </div>
                    </nav>
                </div>
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="logo">
                        <a href="<?php echo home_url(); ?>" title="<?php wp_title(''); ?> - Home">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo" class="logo-img">
                        </a>
                    </div>
                </div>
            </header>


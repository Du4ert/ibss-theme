<!DOCTYPE html>
<html class="<?php echo get_theme_option('Style Sheet'); ?>" lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ($description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>">
    <?php endif; ?>
    <?php /* <link rel="shortcut icon" href="<?php echo img('favicon.ico'); ?>" type="image/x-icon" /> */ ?>
    <?php /* <link rel="apple-touch-icon" href="<?php echo img('favicon.svg'); ?>" type="image/svg+xml" /> */ ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view' => $this)); ?>

    <!-- Stylesheets -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans&display=swap" rel="stylesheet"> 

    <?php
	queue_css_file('custom');
    echo head_css();
    ?>

    <!-- JavaScripts -->
    <?php If (get_theme_option('Use Accessible Mega Menu')):
        queue_js_file(array('globals', 'vendor/jquery-accessibleMegaMenu'));
    endif; ?>
    <?php // see footer for bootstrap-related js...
    echo head_js(); ?>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <!-- <a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a> -->
    <?php fire_plugin_hook('public_body', array('view' => $this)); ?>

  <!--  <header id="header" role="banner" class="container">
        <div class="row">
            <div id="site-title" class="col-sm-12">
                <div class="logoimg">
                    <h1><?php echo link_to_home_page(str_replace('>', ' class="img-responsive">', theme_logo())); ?></h1>
                </div>
            </div>
        </div>
        <?php fire_plugin_hook('public_header', array('view' => $this)); ?>
    </header>
 -->
 <div class="container text-muted">
  <div class="row">
    <div class="col-auto top-text pt-1 pb-1">
 Федеральный исследовательский центр
 <br/>
 «Институт биологии южных морей имени А. О. Ковалевского РАН» 
 </div>
 </div>
 </div>
  <nav class="navbar navbar-expand-sm navbar-light border-top border-bottom"  id="main-nav">
  <div class="container mt-3 mb-3">
  <a class="navbar-brand" href="/">Медиаархив</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
				 <?php $nav = bootstrap_nav(public_nav_main(), array(
                    'ulClass' => 'navbar-nav',
                    'addExternalLinks' => false,
                ));
                echo IBSS_add_link_class($nav); ?>

  </div>

  </div>

	  </nav>
	
	
	
	
	
    <div class="container">
  
    <?php if ($breadcrumb = get_theme_option('Display Breadcrumb Trail')):
        echo common('breadcrumb', array('title' => @$title, 'mode' => $breadcrumb));
    endif; ?>
    </div>
    <div class="container" id="wrapper">
        <div id="content">

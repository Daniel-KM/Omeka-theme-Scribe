<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

    <!-- Stylesheets -->
    <!-- Le styles -->
    <?php
    queue_css_url('http://fonts.googleapis.com/css?family=Oxygen');
    queue_css_url('http://fonts.googleapis.com/css?family=Inconsolata');
    queue_css_file(array(
        'bootstrap',
        'font-awesome',
        'style',
    ));
    echo head_css();
    ?>

    <!-- JavaScripts -->
    <?php
    queue_js_url('https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
    queue_js_url('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js');
    queue_js_file(array(
        'bootstrap.min',
        'jquery.bxSlider.min',
    ));
    echo head_js();
    ?>
</head>

<?php
    echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass));
    $base_dir = basename(getcwd());
    require_once getcwd().'/plugins/Scripto/libraries/Scripto.php';
    $scripto = ScriptoPlugin::getScripto();
?>

    <div id="wrap" class="container">

        <header id="header" role="banner">

            <div id="sublinks" class="masthead clearfix">

                <ul class="nav nav-pills pull-right">

                    <?php if ($scripto->isLoggedIn()): ?>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong><?php echo $scripto->getUserName(); ?></strong><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/<?php echo $base_dir; ?>/scripto">Your Contributions</a></li>
                            <li><a href="/<?php echo $base_dir; ?>/scripto/watchlist">Your Watchlist</a></li>
                            <li><a href="/<?php echo $base_dir; ?>/scripto/recent-changes">Recent Changes</a></li>
                            <li><a href="/<?php echo $base_dir; ?>/scripto/logout">Logout</a></li>
                        </ul>
                    </li>

                    <?php else: ?>

                    <li>
                    <a href="/<?php echo $base_dir; ?>/scripto/login"><strong>Sign in or register</strong></a>
                    </li>

                    <?php endif; ?>
                </ul>

                <a href="/<?php echo $base_dir; ?>"><img src="<?php echo img('sub.png'); ?>" alt="Scribe: an Omeka theme" title="Scribe: an Omeka theme" width="960" height="80" border="0"></a>
            </div>

        </header><!-- end header -->

        <article id="content">

            <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>

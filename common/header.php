<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <script type="text/javascript"> </script>
    <meta charset="utf-8">
    <?php if ( $description = settings('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>

    <title><?php echo settings('site_title'); echo isset($title) ? ' | ' . strip_formatting($title) : ''; ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->
    <?php plugin_header(); ?>

    <!-- Le styles -->
    <link href="http://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
            
    <?php
    queue_css('bootstrap');
    queue_css('font-awesome');
    queue_css('style');
    display_css();
    $js_dir =  'http://'.$_SERVER['HTTP_HOST'] . '/' . basename(getcwd()) . '/themes/scribe/javascripts/';
    ?>

    <!-- JavaScripts -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo $js_dir; ?>bootstrap.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo $js_dir; ?>jquery.bxSlider.min.js" charset="utf-8"></script>

</head>

<?php 
    echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); 
    $base_dir = basename(getcwd());
    require_once getcwd().'/plugins/Scripto/libraries/Scripto.php';
    $scripto = ScriptoPlugin::getScripto();
?>  

    <div class="container">

        <div id="sublinks" class="masthead clearfix">

            <div id="header">
    
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

</div><!-- end header -->
<br /><br />

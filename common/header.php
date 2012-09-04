<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
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
    queue_css('jScrollPane');
    queue_css('style');
    display_css();
    ?>

    <!-- JavaScripts -->
    <?php display_js(); ?>    
</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php //plugin_body(); ?>
    <div class="container">

        <div class="masthead clearfix">
                        
            <h1 class="pull-left"><br /><?php echo link_to_home_page(custom_display_logo()); ?></h1>

            <ul class="nav nav-pills pull-right">
                <li>
                    <a href="">Crowdsourcing Home</a>
                </li>
                
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Collections<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/transcribe/collections/show/9">Iowa Byington Reed Diaries</a></li>
                            <li><a href="/transcribe/collections/show/7">Szathmary Culinary Manuscripts and Cookbooks</a></li>
                            <li><a href="/transcribe/collections/show/8">Civil War Diaries and Letters</a></li>
                            <li><a href="/transcribe/collections/show/6">Papers of Nile C. Kinnick</a></li>

                        </ul>
                     </li>
                </li>
                <li>
                    <a href="#">this should go somewhere</a>
                </li>
                <li>
                    <a href="/transcribe/scripto/login">My Account</a>
                </li>
            </ul>

        </div><!-- end header -->

        
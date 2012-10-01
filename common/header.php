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
    ?>

    <style>
        .masthead { height: 100px; background-color: #FFF; margin: 0; padding: 10; background-image: url(../images/background.gif); }
        #sublinks ul {  margin: 0; float: right; }
        
        #sublinks a { color: #6A231F; font-size: .9em; font-weight: bold; }
        #content { background-color: #fff; padding: 10px 20px; margin-top: 20px; }
h2 { color: #6A231F; }
        h2 { color: #6A231F; }
</style>

    <!-- JavaScripts -->
    <?php display_js(); ?>   



</head>

<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); 
    require_once './././plugins/Scripto/libraries/Scripto.php';
    $scripto = ScriptoPlugin::getScripto();
?>
    
    <div class="container">

        <div id="sublinks" class="masthead clearfix">

            <div id="header">
    
                <ul class="nav nav-pills pull-right">

                    <?php if ($scripto->isLoggedIn()): ?>
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong><?php echo $scripto->getUserName(); ?></strong><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/transcribe/scripto">Your Contributions</a></li>
                            <li><a href="/transcribe/scripto/watchlist">Your Watchlist</a></li>
                            <li><a href="/transcribe/scripto/recent-changes">Recent Changes</a></li>
                            <li><a href="/transcribe/scripto/logout">Logout</a></li>
                        </ul>
                    </li>

                    <?php else: ?>

                    <li>
                    <a href="/transcribe/scripto/login"><strong>Sign in</strong></a>                          
                    </li>

                    <?php endif; ?>
                </ul>
    
            <img src="/images/sub.png" alt="DIY History at The University of Iowa Libraries" title="DIY History at The University of Iowa Libraries" width="960" height="80" border="0" usemap="#Map">
            <map name="Map">
              <area shape="rect" coords="781,30,952,77" href="http://www.lib.uiowa.edu/" alt="The University of Iowa Libraries" title="The University of Iowa Libraries">
              <area shape="rect" coords="393,25,568,67" href="http://diyhistory.lib.uiowa.edu/transcribe" alt="Transcribe" title="Transcribe">
              <area shape="rect" coords="9,4,370,75" href="http://diyhistory.lib.uiowa.edu" alt="DIY History Home" title="DIY History Home">
            </map>
      </div>           

</div><!-- end header -->
<hr />

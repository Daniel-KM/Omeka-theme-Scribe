<?php
$head = array('title' => html_escape('Login'));
head($head);
?>
<h1><?php echo $head['title']; ?></h1>
<div id="primary">
<?php //echo flash(); ?>

<!-- navigation -->

<p><a href="http://s-lib017.lib.uiowa.edu/w/index.php5?title=Special:UserLogin&type=signup&returnto=Main+Page" target="_blank">Create an account</a> | <a href="<?php echo html_escape(uri('scripto/index/recent-changes')); ?>">Recent changes</a></p>
<p></p>

<!-- login -->
<form action="<?php echo uri('scripto/index/login'); ?>" method="post">
<div class="field">
    <label for="scripto_mediawiki_username">Username</label>
        <div class="inputs">
        <?php echo $this->formText('scripto_mediawiki_username', null, array('size' => 18)); ?>
    </div>
</div>
<div class="field">
    <label for="scripto_mediawiki_password">Password</label>
        <div class="inputs">
        <?php echo $this->formPassword('scripto_mediawiki_password', null, array('size' => 18)); ?>
    </div>
</div>
<?php echo $this->formHidden('scripto_redirect_url', $this->redirectUrl); ?>
<?php echo $this->formSubmit('scripto_mediawiki_login', 'Login', array('class' => 'btn btn-primary'), array('style' => 'display:inline; float:none;')); ?>
</form>
</div><!-- #scripto-login -->
</div>
<?php //foot(); ?>
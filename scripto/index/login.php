<?php
$head = array('title' => html_escape('Sign in'));
head($head);
?>
<h2>&nbsp&nbsp&nbsp&nbsp<?php echo $head['title']; ?></h2>
<div id="primary">

<!-- navigation -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#">Login page</a></li>
	<li><a href="http://diyhistory.lib.uiowa.edu/w/index.php5?title=Special:UserLogin&type=signup" target="_blank">Create an account</a></li>
    <li><a href="<?php echo html_escape(uri('scripto/recent-changes')); ?>">Recent changes</a> 
    
</ul>

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
<?php foot(); ?>
</div><!-- #scripto-login -->

</div>

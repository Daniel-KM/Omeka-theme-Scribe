<?php head(array('title'=>h($exhibit->title),'bodyid'=>'exhibits','bodyclass' => 'show')); ?>
<div id="primary">
	<h2><?php echo h($exhibit->title); ?></h2>

<div id="exhibit-nav">
	<?php echo section_nav();?>
	<?php echo page_nav();?>
</div><!-- end exhibit-nav -->

	<?php echo flash(); ?>
	<?php render_exhibit_page(); ?>

</div><!-- end primary -->

<?php foot(); ?>
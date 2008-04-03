<?php head(array('title'=>'Browse by Tag','bodyid'=>'items','bodyclass'=>'tags')); ?>

<div id="primary">
	<h2>Browse by Tag</h2>
	
<ul class="navigation item-tags" id="secondary-nav">
	<?php echo nav(array('Browse All' => uri('items/browse'), 'Browse by Tag' => uri('items/tags'))); ?>
</ul>

<?php echo tag_cloud($tags,uri('items/browse')); ?>
</div><!-- end primary -->
<?php foot(); ?>
<?php head(array('title'=>'Browse Items','bodyid'=>'items','bodyclass'=>'tags')); ?>

<div id="primary">
	
	<h1>Browse Items</h1>
	
	<ul class="navigation item-tags" id="secondary-nav">
	<?php echo nav(array('Browse All' => uri('items/browse'), 'Browse by Tag' => uri('items/tags'))); ?>
	</ul>

	<?php echo tag_cloud($tags, uri('items/browse')); ?>

</div><!-- end primary -->

<?php foot(); ?>
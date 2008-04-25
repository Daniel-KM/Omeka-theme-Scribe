<?php head(array('title'=>'Browse Exhibits','bodyid'=>'exhibits','bodyclass' => 'browse')); ?>

<script type="text/javascript" charset="utf-8">
//<![CDATA[
	Event.observe(window,'load',function() {
		var deleteLinks = document.getElementsByClassName('delete-link');
		for (var i=0; i < deleteLinks.length; i++) {
			deleteLinks[i].onclick = function() {
				return confirm( 'Are you sure you want to delete this exhibit and all of its data from the archive?' );
			};
		};
	});
//]]>	
</script>
<div id="primary">
	<h2>Exhibits</h2>
	
	<?php 
	if($exhibits):
	?>
	
	<ul class="navigation" id="secondary-nav">
	    <?php echo nav(array('Browse All' => uri('exhibits'), 'Browse by Tag' => uri('exhibits/tags'))); ?>
    </ul>	
		
		<?php foreach( $exhibits as $key=>$exhibit ): ?>
		<div class="exhibit <?php if($key%2==1) echo ' even'; else echo ' odd'; ?>">
		<h3><?php echo link_to_exhibit($exhibit); ?></h3>
		<div class="description"><?php echo nls2p($exhibit->description); ?></div>
		<p class="tags"><strong>Tags:</strong><?php echo tag_string($exhibit, uri('exhibits/browse/tag/')); ?></p>
		</div>
		<?php endforeach; ?>

		<?php else: ?>
		<p>You have no exhibits. Please add some in the admin.</p>
		<?php endif; ?>
		

		
</div><!-- end primary -->

<?php foot(); ?>
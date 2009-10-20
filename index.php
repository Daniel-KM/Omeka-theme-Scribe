<?php head(array('bodyid'=>'home')); ?>	

<div id="primary">
    
	<!-- Featured Item -->
	<div id="featured-item">
	    <?php echo display_random_featured_item(); ?>
	</div><!--end featured-item-->
		
	<!-- Featured Collection -->
	<div id="featured-collection">
	    <?php echo display_random_featured_collection(); ?>
	</div><!-- end featured collection -->
		
</div><!-- end primary -->

<div id="secondary">

	<div id="recent-items">
		<h2>Recently Added Items</h2>
		
		<?php set_items_for_loop(recent_items(3)); ?>
		<?php if (has_items_for_loop()): ?>
		    
		<div class="items-list">
			<?php while (loop_items()): ?>
			    
			<div class="item">
			    
				<h3><?php echo link_to_item(); ?></h3>
				
				<?php if (item_has_thumbnail()): ?>
    				<div class="item-img">
    				<?php echo link_to_item(item_square_thumbnail()); ?>						
    				</div>
				<?php endif; ?>
				
				<?php if ($desc = item('Dublin Core', 'Description', array('snippet'=>150))): ?>
				    
				    <div class="item-description"><?php echo $desc; ?><p><?php echo link_to_item('see more',(array('class'=>'show'))) ?></p></div>
				
				<?php endif; ?>	

			</div>
			<?php endwhile; ?>	
		</div>
		
		<?php else: ?>
			<p>No recent items available.</p>
			
		<?php endif; ?>
		
		<p class="view-items-link"><a href="<?php echo html_escape(uri('items')); ?>">View All Items</a></p>
		
	</div><!--end recent-items -->
		
</div><!-- end secondary -->
	
<?php foot(); ?>
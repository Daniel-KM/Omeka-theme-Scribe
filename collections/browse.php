<?php head(array('title'=>'Browse Collections','bodyid'=>'collections','bodyclass' => 'browse')); ?>
<div id="primary">
	<h2>Collections</h2>

		<?php foreach ($collections as $collection ): ?>
			<div class="collection">
            	<h3><?php echo link_to_collection($collection); ?></h3>
	
            	<div class="field">
            	<h4>Description</h4>
            	<div class="field-value"><?php echo nls2p(snippet(h($collection->description), 0, 150)); ?></div>
	            </div>
	            
            	<div class="field">
            	<h4>Collector(s)</h4> 
            	    <div class="field-value">
	<?php if(!empty($collection->Collectors)): ?>
            	        <ul><?php foreach($collection->Collectors as $collector):?>
            	            <li><?php echo h($collector->name); ?></li>
            	            <?php endforeach; ?>
            	        </ul>
					<?php else:?>
						<p>No Collectors</p>
					<?php endif;?>
            	    </div>
            	</div>
	
            	<p class="view-items-link"><a href="<?php echo uri('items/browse/', array('collection'=>$collection->id)); ?>">View the items in &quot;<?php echo h($collection->name); ?>&quot;</a></p>
            </div><!-- end class="collection" -->
		<?php endforeach; ?>

</div><!-- end primary -->
			
<?php foot(); ?>	
<?php head(array('title'=>h($collection->name),'bodyid'=>'collections','bodyclass' => 'show')); ?>

<div id="primary" class="show">
    <h2><?php echo h($collection->name); ?></h2>

    <div id="collection-description" class="field">
    <h3>Description</h3>
    <div class="field-value"><?php echo nls2p(h($collection->description)); ?></div>
    </div>
    
    <div id="collectors" class="field">
    <h3>Collector(s)</h3> 
        <div class="field-value">
            <ul><?php foreach($collection->Collectors as $collector):?>
                <li><?php echo nls2p(h($collector->name)); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <p><a class="view-items-link href="<?php echo uri('items/browse/', array('collection'=>$collection->id)); ?>">View the items in &quot;<?php echo h($collection->name); ?>&quot;</a></p>

</div><!-- end primary -->

<?php foot(); ?>
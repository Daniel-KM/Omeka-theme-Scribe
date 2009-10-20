<?php head(array('title' => html_escape($collection->name),'bodyid'=>'collections','bodyclass' => 'show')); ?>

<div id="primary" class="show">
    <h2><?php echo html_escape($collection->name); ?></h2>

    <h1><?php echo collection('Name'); ?></h1>

    <div id="collection-description" class="element">
        <h2>Description</h2>
        <div class="element-text"><?php echo nls2p(collection('Description')); ?></div>
    </div><!-- end collection-description -->
    
    <div id="collectors" class="element">
        <h2>Collector(s)</h2> 
        <div class="element-text">
            <ul>
                <li><?php echo collection('Collectors', array('delimiter'=>'</li><li>')); ?></li>
            </ul>
        </div>
    </div><!-- end collectors -->

    <p class="view-items-link"><?php echo link_to_browse_items('View the items in ' . collection('Name'), array('collection' => collection('id'))); ?></p>
    
    <?php echo plugin_append_to_collections_show(); ?>

</div><!-- end primary -->

<?php foot(); ?>
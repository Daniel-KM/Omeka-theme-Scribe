<?php head(array('title'=>collection('Name'), 'bodyid'=>'collections', 'bodyclass' => 'show')); ?>

<div id="primary">
    <h1><?php echo collection('Name'); ?></h1>

    <div id="description" class="element">
        <h2><?php echo __('Description'); ?></h2>
        <div class="element-text"><?php echo nls2p(collection('Description')); ?></div>
    </div><!-- end description -->

    <?php if (collection_has_collectors()): ?>
    <div id="collectors" class="element">
        <h2><?php echo __('Collector(s)'); ?></h2>
        <div class="element-text">
            <ul>
                <li><?php echo collection('Collectors', array('delimiter'=>'</li><li>')); ?></li>
            </ul>
        </div>
    </div><!-- end collectors -->
    <?php endif; ?>
    
    <!--
     <p class="view-items-link"><?php //echo link_to_browse_items(__('View the items in %s', collection('Name')), array('collection' => collection('id'))); ?></p>
    -->

    <div id="collection-items">
        <h2><?php echo __('Items in the %s Collection', collection('Name')); ?></h2>
        <?php require_once '/local/vol00/srv/www/htdocs/transcribe/plugins/Scripto/libraries/Scripto.php'; 
        $scripto = ScriptoPlugin::getScripto();
        
        ?>
        <ul>
        <?php while (loop_items_in_collection(30)): 
        $item = get_current_item();
               
        ?>
                    
            <?php if (item_has_thumbnail()): ?>
            <li class="span4">
                <div class="right-caption span4">
                    <?php echo link_to_item(item_thumbnail(array('alt'=>item('Dublin Core', 'Title'))),array('class'=>'span2')); ?>
                    <div class="caption">
                        <strong><?php echo link_to_item(item('Dublin Core', 'Title'), array('class'=>'permalink')); ?></strong><br />
                        <?php echo $scripto->progressBar($item, 'partial'); ?>
                    </div>    
                </div>    
            </li>

           <?php endif; ?>            

            <?php if ($text = item('Item Type Metadata', 'Text', array('snippet'=>250))): ?>
            <div class="item-description">
                <p><?php echo $text; ?></p>
            </div>
            <?php elseif ($description = item('Dublin Core', 'Description', array('snippet'=>250))): ?>
            <div class="item-description">
                <?php echo $description; ?>
            </div>
            <?php endif; ?>
        
        <?php endwhile; ?>
        </ul>
    </div><!-- end collection-items -->

    <?php echo plugin_append_to_collections_show(); ?>

</div><!-- end primary -->


<?php head(array('title'=>collection('Name'), 'bodyid'=>'collections', 'bodyclass' => 'show')); ?>

<div id="primary">
    <h1><?php echo collection('Name'); ?></h1>

    <div id="description" class="element">
        <div class="element-text"><?php echo collection('Description'); ?></div>
    </div><!-- end description -->

    <div id="collection-items">
                
        <ul class="nobullet">
        <?php set_items_for_loop(get_items(array('sort_field' => 'Dublin Core,Title', 'collection' => collection('id')), 999));
        while (loop_items()):  
        $item = get_current_item();
               
        ?>                    
            <?php if (item_has_thumbnail()): ?>
            <li class="span4">
                <div class="right-caption">
                    <?php echo link_to_item(item_thumbnail(array('alt'=>item('Dublin Core', 'Title')))); ?>
                    <div class="caption">
                        <?php echo link_to_item(item('Dublin Core', 'Title'), array('class'=>'permalink')); ?><br />
                        <?php   $progress_value = item('Scripto', 'Status');
                                if ($progress_value == null) {
                                     $progress_value = 0;
                                 } else {
                                    $progress_value = item('Scripto', 'Status');
                                 }
                                echo $progress_value . '% transcribed <br /><div class="progress progress-striped"><div class="bar" style="width:'.$progress_value.'%;"></div></div>'; ?>
                    </div>    
                </div>    
            </li>

           <?php endif; ?>            
        
        <?php endwhile; ?>
        </ul>
    </div><!-- end collection-items -->

 </div><!-- end primary -->


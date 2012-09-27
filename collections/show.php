<?php head(array('title'=>collection('Name'), 'bodyid'=>'collections', 'bodyclass' => 'show')); ?>

<div id="primary">
    <ul class="breadcrumb">
      <li><a href="http://diyhistory.lib.uiowa.edu/transcribe/">Home</a> <span class="divider">/</span></li>
      <li class="active"><a href="#"><?php echo collection('Name'); ?></a></li>
    </ul>
    <h1><?php echo collection('Name'); ?></h1>

    <div id="description" class="element">
        <div class="element-text"><?php echo collection('Description'); ?></div>
    </div><!-- end description -->
    <br />
    <div id="collection-items span12">
                
        <ul class="thumbnails">
        <?php set_items_for_loop(get_items(array('sort_field' => 'Dublin Core,Title', 'collection' => collection('id')), 999));
        while (loop_items()):  
        get_current_item();               
        ?> 
            <?php if (item_has_thumbnail()): ?>
            <li>
                <div id="col-images" class="thumbnail right-caption span4">
                    <?php echo link_to_item(item_square_thumbnail(array('alt'=>item('Dublin Core', 'Title'),'class'=>'span2'))); ?>
                    <div class="caption">
                        <?php echo link_to_item(item('Dublin Core', 'Title', array('snippet' => 65)), array('class'=>'permalink')); ?><br /><br />
                        <div id="col-progress">
                        <?php   $progress_value = item('Scripto', 'Status');
                                if ($progress_value == null) {
                                     $progress_value = 0;
                                 } else {
                                    $progress_value = item('Scripto', 'Status');
                                 }
                                echo $progress_value . '% transcribed <br /><div class="progress progress-striped"><div class="bar" style="width:'.$progress_value.'%;"></div></div>'; ?>
                        </div>
                    </div>    
                </div>    
            </li>           
            
            <?php endif; ?> 
        <?php endwhile; ?>
        </ul>
    </div><!-- end collection-items -->
<?php foot(); ?>
 </div><!-- end primary -->


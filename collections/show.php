<?php head(array('title'=>collection('Name'), 'bodyid'=>'collections', 'bodyclass' => 'show')); ?>
<?php $base_dir = basename(getcwd()); ?>
<div id="primary">
    <ul class="breadcrumb">
      <li><a href="/<?php echo $base_dir; ?>">Home</a> <span class="divider">/</span></li>
      <li class="active"><a href="#"><?php echo collection('Name'); ?></a></li>
    </ul>
    <h1><?php echo collection('Name'); ?></h1>

    <div id="description" class="element">
        <div class="element-text"><?php echo nls2p(collection('Description')); ?></div>
    </div><!-- end description -->
    <br />
    <div id="collection-items span12">
                
        <ul class="thumbnails">

        <?php 
        set_items_for_loop(get_items(array('sort_field' => 'Dublin Core,Audience','sort_dir' => 'a', 'collection' => collection('id')), 999));
        while (loop_items()):  
        get_current_item();                       
        ?> 
            <?php if (item_has_thumbnail()): ?>
            <li>
                <div id="col-images" class="thumbnail right-caption span4">
                    <?php echo link_to_item(item_square_thumbnail(array('alt'=>item('Dublin Core', 'Title'),'class'=>'span2'))); ?>
                    <div class="caption">
                        <?php echo link_to_item(item('Dublin Core', 'Title', array('snippet' => 60)), array('class'=>'permalink')); ?><br /><br />
                            <div id="col-progress">
                        <?php   

                        // set statuses                        
                        $progress_needs_review = item('Scripto', 'Percent Needs Review');
                        $progress_percent_completed = item('Scripto', 'Percent Completed');
                        $progress_status = $progress_needs_review + $progress_percent_completed;

                        if ($progress_status == null) {
                            $progress_status = 0;
                        }
                        $progress_not_started = 100 - $progress_status;

                        // set status messages
                        if ($progress_percent_completed == 100) {
                            $status_message = 'Completed';
                        } elseif ($progress_status == 100) {
                            $status_message = 'Needs Review';
                        } elseif ($progress_status != 0 and $progress_status != 100) {
                            $status_message = $progress_status . '% ' . 'Started';
                        } else {
                            $status_message = 'Not Started';
                        }

                        echo $status_message . '<br />
                        <div class="progress">
                            <div title="'.$progress_percent_completed.'% Completed" class="bar bar-danger" style="width:'.$progress_percent_completed .'%;"></div>
                            <div title="'.$progress_needs_review.'% Needs Review" class="bar bar-warning" style="width:'.$progress_needs_review .'%;"></div>
                        </div>';
                        
                    ?>
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


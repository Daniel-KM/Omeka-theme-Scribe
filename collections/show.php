<?php head(array('title'=>collection('Name'), 'bodyid'=>'collections', 'bodyclass' => 'show')); ?>

<div id="primary">
    <ul class="breadcrumb">
      <li><a href="http://diyhistory.lib.uiowa.edu/transcribe/">Home</a> <span class="divider">/</span></li>
      <li class="active"><a href="#"><?php echo collection('Name'); ?></a></li>
    </ul>
    <h1><?php echo collection('Name'); ?></h1>

    <div id="description" class="element">
        <?php if (collection('Name') == "Szathmary Culinary Manuscripts and Cookbooks") {
            $description_text = 'Handwritten cookbooks, ca. 1600s-1960s, documenting culinary history in America and Europe and how tastes have changed over the years. Help improve access to these historic documents by transcribing handwritten pages, reviewing transcriptions (look for <span class="label label-warning">Needs Review</span> pages), and correcting typewritten text. Select an item below to start transcribing or <a href="http://diyhistory.lib.uiowa.edu/w/index.php5?title=Special:UserLogin&type=signup">create an account</a> to enjoy additional features.';
        } elseif (collection('Name') == "Iowa Women’s Lives: Letters and Diaries") {
            $description_text = 'Personal papers documenting the lives of late 19th- and early 20th-century women and their families, from the holdings of the <a href="http://lib.uiowa.edu/iwa/">Iowa Women’s Archives</a> at the University of Iowa Libraries.';
        } elseif (collection('Name') == "Nile Kinnick Collection") {
            $description_text = 'Nile Clarke Kinnick, Jr. (July 9, 1918 – June 2, 1943) was a student and a college football player at the University of Iowa. He won the 1939 Heisman Trophy and was a consensus All-American. He died during a training flight while serving as a U.S Navy aviator in World War II. Kinnick was inducted into the College Football Hall of Fame in 1951, and the University of Iowa renamed its football stadium Kinnick Stadium in his honor in 1972.';
        } elseif (collection('Name') == "Civil War Diaries and Letters") {
            $description_text = 'First-hand accounts of the war from soldiers and their families back home.';
        }
        ?>
    <div class="element-text"><?php echo $description_text; ?></div>
    </div><!-- end description -->
    <br />
    <div id="collection-items span12">
                
        <ul class="thumbnails">

        <?php
            /*
            //initialize items
            require_once './././plugins/Scripto/ScriptoPlugin.php'; 
            $itemids = array(1748); //replace numbers in this array with item ids
            foreach ($itemids as $itemid) {
                $scripto = ScriptoPlugin::getScripto();
                $doc = $scripto->getDocument($itemid);
                //$doc->setDocumentTranscriptionProgress(); //leave commented if just setting sort weight
                //$doc->setItemSortWeight();
            }
             */          
        ?>  

        <?php 
        if (collection('Name') == "Iowa Women’s Lives: Letters and Diaries") {
            set_items_for_loop(get_items(array('sort_field' => 'Dublin Core,Alternative Title','sort_dir' => 'd', 'collection' => collection('id')), 999));
        } else {
            set_items_for_loop(get_items(array('sort_field' => 'Dublin Core,Audience','sort_dir' => 'a', 'collection' => collection('id')), 999));
        }
        
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


<?php head(array('bodyid'=>'home')); ?>

<div id="primary">
    
    <?php if (get_theme_option('Homepage Text')): ?>
    <p><?php echo get_theme_option('Homepage Text'); ?></p>
    <?php endif; ?>

    <?php if (get_theme_option('Display Featured Collection') !== '0'): ?>
    <!-- Featured Collection -->
    <div id="featured-collection">
        
    </div><!-- end featured collection -->
    <?php endif; ?>    

    <?php 

    require_once '/local/vol00/srv/www/htdocs/transcribe/plugins/Scripto/libraries/Scripto.php'; 
    $scripto = ScriptoPlugin::getScripto();

    $collectionList = display_featured_collections();

    $col1 = $collectionList[0];
    $col1_link = link_to_collection($collectionTitle, array(), 'show', $col1);
    $col1_items = get_items(array('collection' => $col1['id']),9000); 
    set_items_for_loop($col1_items);
    $col1_item_list = array();
       
    while (loop_items()) {
        $item1 = get_current_item();
        $col1_idl_link = item('Dublin Core', 'Source');
        array_push($col1_item_list, $col1_package=array('thumb'=>link_to_item(item_thumbnail(array('alt'=>item('Dublin Core', 'Title')))),
                                                  'link'=>link_to_item(item('Dublin Core', 'Title')),
                                                  'progress'=> 23));
    }


    $col2 = $collectionList[1]; 
    $col2_link = link_to_collection($collectionTitle, array(), 'show', $col2);
    $col2_items = get_items(array('collection' => $col2['id']),9000);
    set_items_for_loop($col2_items);
    $col2_item_list = array();

    while (loop_items()) {
        $item2 = get_current_item();
        $col2_idl_link = item('Dublin Core', 'Source');
        array_push($col2_item_list, $col2_package=array('thumb'=>link_to_item(item_thumbnail(array('alt'=>item('Dublin Core', 'Title')))),
                                                  'link'=>link_to_item(item('Dublin Core', 'Title')),
                                                  'progress'=> 23));
    }
   

    $col3 = $collectionList[2];
    $col3_link = link_to_collection($collectionTitle, array(), 'show', $col3);
    $col3_items = get_items(array('collection' => $col3['id']),9000);
    set_items_for_loop($col3_items);
    $col3_item_list = array();

    while (loop_items()) {
        $item3 = get_current_item();
        $col3_idl_link = item('Dublin Core', 'Source');
        array_push($col3_item_list, $col3_package=array('thumb'=>link_to_item(item_thumbnail(array('alt'=>item('Dublin Core', 'Title')))),
                                                  'link'=>link_to_item(item('Dublin Core', 'Title')),
                                                  'progress'=> 23));
    }

    $tr_count = array();
    array_push($tr_count, count($col1_items), count($col2_items), count($col3_items)); 
    $num_of_tr = max($tr_count);    

?>
<h2>Featured Manuscript Collections</h2>

<table class="table table-bordered table-striped table-condensed">
    <thead>
      <tr>
        <td><h3><?php echo $col1_link; ?></h3><a href="<?php echo $col1_idl_link; ?>">view in Iowa Digital Library</a></td>
        <td><h3><?php echo $col2_link; ?></h3><a href="<?php echo $col2_idl_link; ?>">view in Iowa Digital Library</a></td>
        <td><h3><?php echo $col3_link; ?></h3><a href="<?php echo $col3_idl_link; ?>">view in Iowa Digital Library</a></td>
      </tr>
    </thead>
    <tbody>
       <!--
       <tr>
        <td><strong>Select an item to begin transcribing</strong></td>
        <td><strong>Select an item to begin transcribing</strong></td>
        <td><strong>Select an item to begin transcribing</strong></td>
       </tr>
       --> 
      <?php
      for ($i=0; $i < $num_of_tr  ; $i++) { 
          echo '<tr>';
          echo '<td>'.$col1_item_list[$i]['thumb'].$col1_item_list[$i]['link'].'</td>';
          echo '<td>'.$col2_item_list[$i]['thumb'].$col2_item_list[$i]['link'].'</td>';
          echo '<td>'.$col3_item_list[$i]['thumb'].$col3_item_list[$i]['link'].'</td>';
          echo '</tr>';
      }
      ?>
    </tbody>
</table> 


</div><!-- end primary -->





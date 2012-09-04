<?php head(array('bodyid'=>'home')); ?>

<script>
!function( $ ){
  $(function () { 
    
      $('a[rel=tooltip]').tooltip();
      $('').jScrollPane({scrollbarWidth:4, scrollbarMargin:0});

      
    });
}( window.jQuery ) 
</script>

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
        $col1_idl_link = item('Dublin Core', 'Relation');
        array_push($col1_item_list, $col1_package=array('thumb'=>item_thumbnail(array('alt'=>item('Dublin Core', 'Title'))),
                                                  'link'=>link_to_item(item('Dublin Core', 'Title'), array('rel'=>'tooltip', 'title'=>link_to_item(item_thumbnail(array('alt'=>item('Dublin Core', 'Title')))))),
                                                  'progress'=> 23));
    }


    $col2 = $collectionList[1]; 
    $col2_link = link_to_collection($collectionTitle, array(), 'show', $col2);
    $col2_items = get_items(array('collection' => $col2['id']),9000);
    set_items_for_loop($col2_items);
    $col2_item_list = array();

    while (loop_items()) {
        $item2 = get_current_item();
        $col2_idl_link = item('Dublin Core', 'Relation');
        array_push($col2_item_list, $col2_package=array('thumb'=>item_thumbnail(array('alt'=>item('Dublin Core', 'Title'))),
                                                  'link'=>link_to_item(item('Dublin Core', 'Title'), array('rel'=>'tooltip', 'title'=>link_to_item(item_thumbnail(array('alt'=>item('Dublin Core', 'Title')))))),
                                                  'progress'=> 23));
    }
   

    $col3 = $collectionList[2];
    $col3_link = link_to_collection($collectionTitle, array(), 'show', $col3);
    $col3_items = get_items(array('collection' => $col3['id']),9000);
    set_items_for_loop($col3_items);
    $col3_item_list = array();

    while (loop_items()) {
        $item3 = get_current_item();
        $col3_idl_link = item('Dublin Core', 'Relation');
        array_push($col3_item_list, $col3_package=array('thumb'=>item_thumbnail(array('alt'=>item('Dublin Core', 'Title'))),
                                                  'link'=>link_to_item(item('Dublin Core', 'Title'), array('rel'=>'tooltip', 'title'=>link_to_item(item_thumbnail(array('alt'=>item('Dublin Core', 'Title')))))),
                                                  'progress'=> 23));
    }

    $num_of_tr1 = count($col1_items);   
    $num_of_tr2 = count($col2_items); 
    $num_of_tr3 = count($col3_items); 

?>
<h2>Featured Manuscript Collections</h2>

<div class="list-column">
<table class="table table-bordered table-striped table-condensed">
  <thead>
    <tr>
      <td><h3><?php echo $col1_link; ?></h3><a href="<?php echo $col1_idl_link; ?>">view in Iowa Digital Library</a></td>
    </tr>
  </thead>
  <tbody>
  </tbody>
  <?php
      for ($i=0; $i < $num_of_tr1  ; $i++) { 
          echo '<tr>';
          echo '<td>'.$col1_item_list[$i]['link'].'</td>'; //.$col1_item_list[$i]['thumb']
          echo '</tr>';
      }
      ?>
  </tbody>
</table>
</div>

<div class="list-column">
<table class="table table-bordered table-striped table-condensed">
  <thead>
    <tr>
      <td><h3><?php echo $col2_link; ?></h3><a href="<?php echo $col2_idl_link; ?>">view in Iowa Digital Library</a></td>
    </tr>
  </thead>
  <tbody>
  </tbody>
  <?php
      for ($i=0; $i < $num_of_tr2  ; $i++) { 
          echo '<tr>';
          echo '<td>'.$col2_item_list[$i]['link'].'</td>'; //.$col1_item_list[$i]['thumb']
          echo '</tr>';
      }
      ?>
  </tbody>
</table>
</div>

<div class="list-column">
<table class="table table-bordered table-striped table-condensed">
  <thead>
    <tr>
      <td><h3><?php echo $col3_link; ?></h3><a href="<?php echo $col3_idl_link; ?>">view in Iowa Digital Library</a></td>
    </tr>
  </thead>
  <tbody>
  </tbody>
  <?php
      for ($i=0; $i < $num_of_tr3  ; $i++) { 
          echo '<tr>';
          echo '<td>'.$col3_item_list[$i]['link'].'</td>'; //.$col1_item_list[$i]['thumb']
          echo '</tr>';
      }
      ?>
  </tbody>
</table>
</div>


</div><!-- end primary -->





<?php head(array('bodyid'=>'home')); ?>

<script>
!function( $ ){
  $(function () { 
    
   $('#cookbooks').bxSlider({
    displaySlideQty: 7,
    moveSlideQty: 7

  });

   $('#byington').bxSlider({
    displaySlideQty: 7,
    moveSlideQty: 7

  });

   $('#kinnick').bxSlider({
    displaySlideQty: 7,
    moveSlideQty: 7

  });

   $('#civil-war').bxSlider({
    displaySlideQty: 7,
    moveSlideQty: 7

  });

   $('a[rel=tooltip]').tooltip();

      
    });
}( window.jQuery ) 
</script>


<div id="primary">
    
    <?php if (get_theme_option('Homepage Text')): ?>
    <p><?php echo get_theme_option('Homepage Text'); ?></p>
    <?php endif; ?>

    <?php 

    $collectionList = display_featured_collections();

    //-------------------Szathmary Culinary Manuscripts and Cookbooks-----------------------------------//

    $col1 = $collectionList[0];
    $col1_link = link_to_collection($collectionTitle, array(), 'show', $col1);
    $col1_items = get_items(array('collection' => $col1['id']),9000); 
    set_items_for_loop($col1_items);
    $col1_item_list = array();
       
    while (loop_items()) {
        $item1 = get_current_item();
        $col1_idl_link = item('Dublin Core', 'Relation');
        array_push($col1_item_list, $col1_package=array('thumb'=>item_square_thumbnail(array('alt'=>item('Dublin Core', 'Title'))),
                                                  'link'=>item_uri(), 'name'=>item('Dublin Core', 'Title')));
    }

    //-------------------Nile Kinnick Collection-----------------------------------//

    $col2 = $collectionList[1]; 
    $col2_link = link_to_collection($collectionTitle, array(), 'show', $col2);
    $col2_items = get_items(array('collection' => $col2['id']),9000);
    set_items_for_loop($col2_items);
    $col2_item_list = array();

    while (loop_items()) {
        $item2 = get_current_item();
        $col2_idl_link = item('Dublin Core', 'Relation');
        array_push($col2_item_list, $col2_package=array('thumb'=>item_square_thumbnail(array('alt'=>item('Dublin Core', 'Title'))),
                                                  'link'=>item_uri(), 'name'=>item('Dublin Core', 'Title')));
    }
   
    //-------------------Civil War Diaries and Letters-----------------------------------//

    $col3 = $collectionList[2];
    $col3_link = link_to_collection($collectionTitle, array(), 'show', $col3);
    $col3_items = get_items(array('collection' => $col3['id']),9000);
    set_items_for_loop($col3_items);
    $col3_item_list = array();

    while (loop_items()) {
        $item3 = get_current_item();
        $col3_idl_link = item('Dublin Core', 'Relation');
        array_push($col3_item_list, $col3_package=array('thumb'=>item_square_thumbnail(array('alt'=>item('Dublin Core', 'Title'))),
                                                  'link'=>item_uri(), 'name'=>item('Dublin Core', 'Title')));
    }

    //-------------------Iowa Byington Reed Diaries-----------------------------------//

    $col4 = $collectionList[3];
    $col4_link = link_to_collection($collectionTitle, array(), 'show', $col4);
    $col4_items = get_items(array('collection' => $col4['id']),9000);
    set_items_for_loop($col4_items);
    $col4_item_list = array();

    while (loop_items()) {
        $item4 = get_current_item();
        $col4_idl_link = item('Dublin Core', 'Relation');
        array_push($col4_item_list, $col4_package=array('thumb'=>item_square_thumbnail(array('alt'=>item('Dublin Core', 'Title'))),
                                                  'link'=>item_uri(), 'name'=>item('Dublin Core', 'Title')));
    }

    $num_of_tr1 = count($col1_items);   
    $num_of_tr2 = count($col2_items); 
    $num_of_tr3 = count($col3_items); 
    $num_of_tr4 = count($col4_items);

?>

<h1><?php echo $col1_link; ?></h1>
<ul id="cookbooks" class="slider">
  <?php
  
      for ($i=0; $i < $num_of_tr1; $i++) { 
          echo '<li>';
          echo '<a href="'.$col1_item_list[$i]['link'].'" rel="tooltip" title="'.$col1_item_list[$i]['name'].'">'.$col1_item_list[$i]['thumb'].'</a>';
          echo '</li>';
      }
  ?>

</ul>

<br />

<h1><?php echo $col4_link; ?></h1>
<ul id="byington" class="slider">
  <?php
  
      for ($i=0; $i < $num_of_tr4; $i++) { 
          echo '<li>';
          echo '<a href="'.$col4_item_list[$i]['link'].'" rel="tooltip" title="'.$col4_item_list[$i]['name'].'">'.$col4_item_list[$i]['thumb'].'</a>';
          echo '</li>';
      }
  ?>

</ul>

<br />

<h1><?php echo $col2_link; ?></h1>
<ul id="kinnick" class="slider">
  <?php
  
      for ($i=0; $i < $num_of_tr2; $i++) { 
          echo '<li>';
          echo '<a href="'.$col2_item_list[$i]['link'].'" rel="tooltip" title="'.$col2_item_list[$i]['name'].'">'.$col2_item_list[$i]['thumb'].'</a>';
          echo '</li>';
      }
  ?>

</ul>

<br />

<h1><?php echo $col3_link; ?></h1>
<ul id="civil-war" class="slider">
  <?php
  
      for ($i=0; $i < $num_of_tr3; $i++) { 
          echo '<li>';
          echo '<a href="'.$col3_item_list[$i]['link'].'" rel="tooltip" title="'.$col3_item_list[$i]['name'].'">'.$col3_item_list[$i]['thumb'].'</a>';
          echo '</li>';
      }
  ?>

</ul>

<br />










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

    $cookbooks = $collectionList[0];
    $cookbooks_link = link_to_collection($collectionTitle, array(), 'show', $cookbooks);
    
    $cookbooks_items = get_items(array('collection' => $cookbooks['id']),9000); 
    set_items_for_loop($cookbooks_items);
    $cookbooks_item_list = array();
       
    while (loop_items()) {
        get_current_item();
        $cookbooks_idl_link = item('Dublin Core', 'Relation');
        array_push($cookbooks_item_list, array('thumb'=>item_square_thumbnail(array('alt'=>item('Dublin Core', 'Title'))),
                                                  'link'=>item_uri(), 'name'=>item('Dublin Core', 'Title')));
    }

    //-------------------Nile Kinnick Collection-----------------------------------//

    $kinnick = $collectionList[1]; 
    $kinnick_link = link_to_collection($collectionTitle, array(), 'show', $kinnick);
    $kinnick_items = get_items(array('collection' => $kinnick['id']),9000);
    set_items_for_loop($kinnick_items);
    $kinnick_item_list = array();

    while (loop_items()) {
        get_current_item();
        $kinnick_idl_link = item('Dublin Core', 'Relation');
        array_push($kinnick_item_list, array('thumb'=>item_square_thumbnail(array('alt'=>item('Dublin Core', 'Title'))),
                                                  'link'=>item_uri(), 'name'=>item('Dublin Core', 'Title')));
    }
   
    //-------------------Civil War Diaries and Letters-----------------------------------//

    $civil_war = $collectionList[2];
    $civil_war_link = link_to_collection($collectionTitle, array(), 'show', $civil_war);
    $civil_war_items = get_items(array('collection' => $civil_war['id']),9000);
    set_items_for_loop($civil_war_items);
    $civil_war_item_list = array();

    while (loop_items()) {
        get_current_item();
        $civil_war_idl_link = item('Dublin Core', 'Relation');
        array_push($civil_war_item_list, array('thumb'=>item_square_thumbnail(array('alt'=>item('Dublin Core', 'Title'))),
                                                  'link'=>item_uri(), 'name'=>item('Dublin Core', 'Title')));
    }

    //-------------------Iowa Byington Reed Diaries-----------------------------------//

    $byington = $collectionList[3];
    $byington_link = link_to_collection($collectionTitle, array(), 'show', $byington);
    $byington_items = get_items(array('collection' => $byington['id']),9000);
    set_items_for_loop($byington_items);
    $byington_item_list = array();

    while (loop_items()) {
        get_current_item();
        $byington_idl_link = item('Dublin Core', 'Relation');
        array_push($byington_item_list, array('thumb'=>item_square_thumbnail(array('alt'=>item('Dublin Core', 'Title'))),
                                                  'link'=>item_uri(), 'name'=>item('Dublin Core', 'Title')));
    }

    $num_of_cookbook_items = count($cookbooks_items);   
    $num_of_kinnick_items = count($kinnick_items); 
    $num_of_civil_war_items = count($civil_war_items); 
    $num_of_byington_items = count($byington_items);

?>

<h1 style="display: inline;">Szathmary Culinary Manuscripts and Cookbooks</h1>
<strong>(<a href="http://diyhistory.lib.uiowa.edu/transcribe/collections/show/7">browse all</a>)</strong>
<br /><br />
<ul id="cookbooks" class="slider">
  <?php
  
      for ($i=0; $i < $num_of_cookbook_items; $i++) { 
          echo '<li>';
          echo '<a href="'.$cookbooks_item_list[$i]['link'].'" rel="tooltip" title="'.$cookbooks_item_list[$i]['name'].'">'.$cookbooks_item_list[$i]['thumb'].'</a>';
          echo '</li>';
      }
  ?>

</ul>

<br />

<h1 style="display: inline;">Iowa Byington Reed Diaries</h1>
<strong>(<a href="http://diyhistory.lib.uiowa.edu/transcribe/collections/show/9">browse all</a>)</strong>
<br /><br />
<ul id="byington" class="slider">
  <?php
  
      for ($i=0; $i < $num_of_byington_items; $i++) { 
          echo '<li>';
          echo '<a href="'.$byington_item_list[$i]['link'].'" rel="tooltip" title="'.$byington_item_list[$i]['name'].'">'.$byington_item_list[$i]['thumb'].'</a>';
          echo '</li>';
      }
  ?>

</ul>

<br />

<h1 style="display: inline;">Nile Kinnick Collection</h1>
<strong>(<a href="http://diyhistory.lib.uiowa.edu/transcribe/collections/show/6">browse all</a>)</strong>
<br /><br />
<ul id="kinnick" class="slider">
  <?php
  
      for ($i=0; $i < $num_of_kinnick_items; $i++) { 
          echo '<li>';
          echo '<a href="'.$kinnick_item_list[$i]['link'].'" rel="tooltip" title="'.$kinnick_item_list[$i]['name'].'">'.$kinnick_item_list[$i]['thumb'].'</a>';
          echo '</li>';
      }
  ?>

</ul>

<br />

<h1 style="display: inline;">Civil War Diaries and Letters</h1>
<strong>(<a href="http://diyhistory.lib.uiowa.edu/transcribe/collections/show/8">browse all</a>)</strong>
<br /><br />
<ul id="civil-war" class="slider">
  <?php
  
      for ($i=0; $i < $num_of_civil_war_items; $i++) { 
          echo '<li>';
          echo '<a href="'.$civil_war_item_list[$i]['link'].'" rel="tooltip" title="'.$civil_war_item_list[$i]['name'].'">'.$civil_war_item_list[$i]['thumb'].'</a>';
          echo '</li>';
      }
  ?>

</ul>

<br />

<?php foot(); ?>










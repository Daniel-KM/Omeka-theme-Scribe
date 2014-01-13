<?php
echo head(array('bodyid' => 'home'));

ini_set('display_errors',1);
error_reporting(E_ALL);

?>

<div id="primary">
    <?php if (get_theme_option('Homepage Text')): ?>
    <p><?php echo get_theme_option('Homepage Text'); ?></p>
    <?php endif; ?>

<?php
    $collectionTitle = '';
    $collectionIDs = collection_order_array();
    $num_of_collections = count($collectionIDs);
    $div_counter = 1;

    foreach ($collectionIDs as $collectionID) {

        $collection = get_record_by_id('collection', $collectionID);
        $collection_link = link_to_collection($collectionTitle, array(), 'show', $collection);
        $collection_items = get_records('Item',
            array(
                'collection' => $collection['id'],
                'sort_field' => 'Scripto,Weight',
                'sort_dir' => 'a',
            ),
            999);

        $num_of_collection_items = count($collection_items);

        set_loop_records('items', $collection_items);
        $collection_item_list = array();
        foreach (loop('items') as $item) {
            set_current_record('item', $item);
            array_push($collection_item_list,
                array(
                    'thumb' => item_image('square_thumbnail', array('alt' => metadata($item, array('Dublin Core', 'Title')))),
                    'link' => record_url($item),
                    'name' => metadata($item, array('Dublin Core', 'Title')),
             ));
        }

        echo '<h1 style="display: inline;">' .$collection_link. '</h1>';
        echo '<hr style="visibility: hidden; margin-top: 2px; margin-bottom: 4px;" />';
        echo '<ul id="collection'.$div_counter.'" class="slider">';

        for ($i=0; $i < $num_of_collection_items; $i++) {
            echo '<li>';
            echo '<a href="'.$collection_item_list[$i]['link'].'" rel="tooltip" title="'.$collection_item_list[$i]['name'].'">'.$collection_item_list[$i]['thumb'].'</a>';
            echo '</li>';
        }

        echo '</ul>';
        echo '<hr style="visibility: hidden; margin-top: 3px; margin-bottom: 3px;" />';
        $div_counter++;

    }

    echo "<script> " . PHP_EOL;
    echo "!function( $ ){ " . PHP_EOL;
    echo "$(function () { " . PHP_EOL;

    for ($k=1; $k <= $num_of_collections; $k++) {
        echo "$('#collection".$k."').bxSlider({ " . PHP_EOL;
        echo "displaySlideQty: 7, " . PHP_EOL;
        echo "moveSlideQty: 7 " . PHP_EOL;
        echo " }); " . PHP_EOL;
    }

    echo "$('a[rel=tooltip]').tooltip(); " . PHP_EOL;
    echo "}); " . PHP_EOL;
    echo "}( window.jQuery ) " . PHP_EOL;
    echo "</script> " . PHP_EOL;

    fire_plugin_hook('public_home', array('view' => $this));
    echo foot();
 ?>

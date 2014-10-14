<?php
$collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
if ($collectionTitle == '') {
    $collectionTitle = __('[Untitled]');
}
?>

<?php echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show')); ?>

<h1><?php echo $collectionTitle; ?></h1>

    <div id="description" class="element">
        <div class="element-text"><?php echo metadata('collection', array('Dublin Core', 'Description')); ?></div>
    </div><!-- end description -->

    <div id="collection-items span12">

        <ul class="thumbnails">
        <?php
        $collection_items = get_records('Item',
            array(
                'collection' => $collection['id'],
                'sort_field' => 'Scripto,Weight',
                'sort_dir' => 'a',
            ),
            999);

        set_loop_records('items', $collection_items);
        foreach (loop('items') as $item) :
            set_current_record('item', $item);
            if (metadata($item, 'has thumbnail')): ?>
            <li>
                <div id="col-images" class="thumbnail right-caption span4">
                    <?php echo link_to_item(item_image('square_thumbnail', array(
                            'alt' => metadata($item, array('Dublin Core', 'Title')),
                            'class' => 'span2',
                        ))); ?>
                    <div class="caption">
                        <?php echo link_to_item(metadata($item, array('Dublin Core', 'Title'), array('snippet' => 60)), array('class'=>'permalink')); ?><br /><br />
                        <div id="col-progress">
                            <?php
                                // Set statuses.
                                $progress_needs_review = (int) metadata($item, array('Scripto', 'Percent Needs Review'));
                                $progress_percent_completed = (int) metadata($item, array('Scripto', 'Percent Completed'));
                                $progress_status = $progress_needs_review + $progress_percent_completed;

                                // Set status messages.
                                if ($progress_percent_completed == 100) {
                                    $status_message = __('Completed');
                                } elseif ($progress_status == 100) {
                                    $status_message = __('Needs Review');
                                } elseif ($progress_status != 0 and $progress_status != 100) {
                                    $status_message = __('%d%% Started', $progress_status);
                                } else {
                                    $status_message = __('Not Started');
                                }

                                echo $status_message;
                            ?>
                        <div class="progress">
                            <div title="<?php echo __('%d%% Completed', $progress_percent_completed); ?>" class="bar bar-danger" style="width:<?php echo $progress_percent_completed; ?>%;"></div>
                            <div title="<?php echo __('%d%% Needs Review', $progress_needs_review); ?>" class="bar bar-warning" style="width:<?php echo $progress_needs_review; ?>%;"></div>
                        </div>
                    </div>
                </div>
            </li>

            <?php endif; ?>
        <?php endforeach; ?>
        </ul>
    </div><!-- end collection-items -->
<?php echo foot(); ?>

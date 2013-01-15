<?php head(array('title' => item('Dublin Core', 'Title'), 'bodyid'=>'items','bodyclass' => 'show')); ?>

<?php $collection = get_collection_for_item(); ?>

<div id="primary">
    <ul class="breadcrumb">
      <li><a href="http://diyhistory.lib.uiowa.edu/transcribe/">Home</a> <span class="divider">/</span></li>
      <li><?php echo link_to_collection_for_item($collection->name, array('id' => 'item-collection-link',)); ?><span class="divider">/</span></li>
      <li class="active"><?php echo item('Dublin Core', 'Title'); ?></li>
    </ul>

    <h1><?php echo item('Dublin Core', 'Title'); ?></h1>

    <!-- The following returns all of the files associated with an item. -->
    <div id="itemfiles" class="element">
        
        <div class="element-text">
            <?php
            require_once './././plugins/Scripto/libraries/Scripto.php';
            require_once './././application/helpers/Media.php';
            $scripto = ScriptoPlugin::getScripto();
            $helper = new Omeka_View_Helper_Media;
            $files =  return_files_for_item(array());           
            echo '<ul class="thumbnails">';
            
            foreach ($files as $file) {
                $status = $scripto->getPageTranscriptionStatus($file->id);
                //uncomment to export all files in an item
                //SELECT id FROM items WHERE collection_id = '8' //use this SQL to get item ids. 8 is civil war
                //export to excel, copy column, paste as text into word, find-and-replace ^p with ,
                /*
                $itemids = array(86,272,332,270,90,341,275,274,98,99,100,101,103,104,105,106,107,368,185,187,188,189,190,191,192,193,327,195,321,197,198,199,200,1744,1745,1751,207,208,209,210,213,872,330,219,220,748,222,225,342,227,873,229,344,236,237,238,239,240,347,346,345,869,323,335,333,326,314,1732,1748,1738,1736,1737,1741,1742,1743,1554,870); //replace numbers in this array with item ids
                //civil war
                //86,272,332,270,90,341,275,274,98,99,100,101,103,104,105,106,107,368,185,187,188,189,190,191,192,193,327,195,321,197,198,199,200,1744,1745,1751,207,208,209,210,213,872,330,219,220,748,222,225,342,227,873,229,344,236,237,238,239,240,347,346,345,869,323,335,333,326,314,1732,1748,1738,1736,1737,1741,1742,1743,1554,870
                foreach ($itemids as $itemid) {
                    $doc = $scripto->getDocument($file->item_id);
                    $doc->setPage($file->id);
                    $doc->exportPage('plain_text');
                }         */                    
                switch ($status) {
                case 'Completed':
                    $label = "label-important";
                    break;
                case 'Needs Review':
                    $label = "label-warning";
                    break;
                case 'Not Started':
                    $label = "label-success";
                    break;                
                default:
                    $label = "label-important";
                    break;
                } 

                 $fileTitle = $this->fileMetadata($file, 'Dublin Core', 'Title');
                 //using monospaced font to make this work
                 if (strlen($fileTitle) <= 18) {
                    $fileTitle .= '<br /><br /><br />';
                 } elseif (strlen($fileTitle) <= 36 ) {
                     $fileTitle .= '<br /><br />';
                 }
                 echo '   <li class="span2">';
                 echo '       <div class="thumbnail">';
                 echo '           <a href="/transcribe/scripto/transcribe/'.$file->item_id.'/'.$file->id.'"><img src="/transcribe/archive/square_thumbnails/' . $file->archive_filename . '" /></a>';
                 echo '           <h4>'.$fileTitle.'</h4>';
                 echo '           <span class="label '.$label.'">'.$status.'</span>';
                 echo '       </div>';
                 echo '   </li>';

            }

            echo '</ul>';

            ?>
        </div>
   

    </div>



<?php foot(); ?>

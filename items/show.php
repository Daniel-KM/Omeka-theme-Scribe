<?php head(array('title' => item('Dublin Core', 'Title'), 'bodyid'=>'items','bodyclass' => 'show')); ?>
<?php $base_dir = basename(getcwd()); ?>
<?php $collection = get_collection_for_item(); 

//these functions supplement ItemFunctions.php and FileFunctions.php in application/helpers
function return_files($file, array $props=array(), $wrapperAttributes = array('class'=>'item-file'))
{
    return get_files(array($file), $props, $wrapperAttributes);
}

function return_files_for_item($options = array(), $wrapperAttributes = array('class'=>'item-file'), $item = null)
{
    if(!$item) {
        $item = get_current_item();
    }

    return return_files($item->Files, $options, $wrapperAttributes);
}

?>

<div id="primary">
    <ul class="breadcrumb">
      <li><a href="/<?php echo $base_dir; ?>">Home</a> <span class="divider">/</span></li>
      <li><?php echo link_to_collection_for_item($collection->name, array('id' => 'item-collection-link',)); ?><span class="divider">/</span></li>
      <li class="active"><?php echo item('Dublin Core', 'Title'); ?></li>
    </ul>

    <h1><?php echo item('Dublin Core', 'Title'); ?></h1>

    <!-- The following returns all of the files associated with an item. -->
    <div id="itemfiles" class="element">
        
        <div class="element-text">
            <?php 
            $basedir = getcwd();
            require_once $basedir.'/plugins/Scripto/libraries/Scripto.php';
            require_once $basedir.'/application/helpers/Media.php';
            $scripto = ScriptoPlugin::getScripto();
            $helper = new Omeka_View_Helper_Media;
            $files =  return_files_for_item(array());           
            echo '<ul class="thumbnails">';
            
            foreach ($files as $file) {
                $status = $scripto->getPageTranscriptionStatus($file->id);
            
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
                 echo '           <a href="/'.$base_dir.'/scripto/transcribe/'.$file->item_id.'/'.$file->id.'"><img src="/'.$base_dir.'/archive/square_thumbnails/' . $file->archive_filename . '" /></a>';
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

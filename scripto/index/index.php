<?php
$head = array('title' => html_escape(''));
head($head);
?>
<h1><?php echo $head['title']; ?></h1>
<div id="primary">
<?php //echo flash(); ?>

<div id="scripto-index" class="scripto">
<!-- navigation -->

<!-- your contributions -->
<?php if (!$this->scripto->isLoggedIn()): ?>
<?php if ($this->homePageText): ?>
<?php echo $this->homePageText ?>
<?php else: ?>
<h2>Welcome to Transcription @uiowa</h2>
<p>As a registered transcriber you can track your contributions, create a watchlist of your favorite pages, and leave comments on each page. Active transcribers can earn Expert Transcriber privileges to finalize pending transcriptions and correct errors in completed transcriptions.</p>
<?php endif; ?>
<?php else: ?>
<h2>Your Contributions</h2>
<?php if (empty($this->documentPages)): ?>
<p>You have no contributions.</p>
<?php else: ?>
<table class="table table-condensed table-striped table-bordered">
    <thead>
    <tr>
        <th>Document Page Name</th>
        <th>Most Recent Contribution</th>
        <th>Document Title</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($this->documentPages as $documentPage): ?>
    <?php
    // document page name
    $documentPageName = ScriptoPlugin::truncate($documentPage['document_page_name'], 60);
    $urlTranscribe = uri(array(
        'action' => 'transcribe', 
        'item-id' => $documentPage['document_id'], 
        'file-id' => $documentPage['document_page_id']
    ), 'scripto_action_item_file');
    if (1 == $documentPage['namespace_index']) {
        $urlTranscribe .= '#discussion';
    } else {
        $urlTranscribe .= '#transcription';
    }
    
    // document title
    $documentTitle = ScriptoPlugin::truncate($documentPage['document_title'], 60, 'Untitled');
    $urlItem = uri(array(
        'controller' => 'items', 
        'action' => 'show', 
        'id' => $documentPage['document_id']
    ), 'id');
    ?>
    <tr>
        <td><a href="<?php echo html_escape($urlTranscribe); ?>"><?php if (1 == $documentPage['namespace_index']): ?>Talk: <?php endif; ?><?php echo $documentPageName; ?></a></td>
        <td><?php echo gmdate('H:i:s M d, Y', strtotime($documentPage['timestamp'])); ?></td>
        <td><a href="<?php echo html_escape($urlItem); ?>"><?php echo $documentTitle; ?></a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>
<?php endif; ?>
</div><!-- #scripto-index -->
</div>
<?php //foot(); ?>
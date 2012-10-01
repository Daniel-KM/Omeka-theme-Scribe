<?php
$title = 'Page Revision';
//$title .= (1 == $this->namespaceIndex) ? 'Discussion' : 'Transcription';
$head = array('title' => html_escape($title));
head($head);
?>
<h2><?php echo $head['title']; ?></h2>
<div id="primary">

<div id="scripto-history" class="scripto">
<!-- navigation -->

<ul class="nav nav-tabs">
	<li class="active"><a href="#">Revisions</a></li>
    <li><a href="<?php echo html_escape(uri('scripto/recent-changes')); ?>">Recent changes</a> 
    <li><a href="<?php echo html_escape(uri(array('controller' => 'items', 'action' => 'show', 'id' => $this->doc->getId()), 'id')); ?>">View document</a></li>
    <li><a href="<?php echo html_escape(uri(array('controller' => 'files', 'action' => 'show', 'id' => $this->doc->getPageId()), 'id')); ?>">View file</a></li>
    <li><a href="<?php echo html_escape(uri(array('item-id' => $this->doc->getId(), 'file-id' => $this->doc->getPageId(), 'namespace-index' => $this->namespaceIndex), 'scripto_history')); ?>">View history</a></li>
    <li><a href="<?php echo html_escape(uri(array('action' => 'transcribe', 'item-id' => $this->doc->getId(), 'file-id' => $this->doc->getPageId()), 'scripto_action_item_file')); ?>">Transcribe page</a></li>
</ul>

<h2><?php if ($this->doc->getTitle()): ?><?php echo $this->doc->getTitle(); ?><?php else: ?>Untitled Document<?php endif; ?></h2>
<h3><?php echo $this->doc->getPageName(); ?></h3>

<!-- revert -->
<?php if (1 == $this->namespaceIndex && $this->doc->canEditTalkPage()): ?>
<div><?php echo $this->formTextarea('scripto-page-wikitext', $this->revision['wikitext'], array('cols' => '76', 'rows' => '16', 'disabled' => 'disabled')); ?></div>
<form method="post" action="<?php echo html_escape(uri(array('item-id' => $this->doc->getId(), 'file-id' => $this->doc->getPageId(), 'namespace-index' => $this->namespaceIndex, 'revision-id' => $this->revision['revision_id']), 'scripto_revision')); ?>">
    <?php echo $this->formSubmit('scripto-page-revert', 'Revert to this revision', array('style' => 'display:inline; float:none;', 'class'=>'btn btn-primary')); ?>
</form>
<?php elseif ($this->doc->canEditTranscriptionPage()): ?>
<div><?php echo $this->formTextarea('scripto-page-wikitext', $this->revision['wikitext'], array('cols' => '76', 'rows' => '16', 'disabled' => 'disabled', 'class'=>'span12')); ?></div>
<form method="post" action="<?php echo html_escape(uri(array('item-id' => $this->doc->getId(), 'file-id' => $this->doc->getPageId(), 'namespace-index' => $this->namespaceIndex, 'revision-id' => $this->revision['revision_id']), 'scripto_revision')); ?>">
    
    <?php 
    //mb: make it so only admins can revert
    if ($this->scripto->canProtect()) {
    	echo $this->formSubmit('scripto-page-revert', 'Revert to this revision', array('style' => 'display:inline; float:none;', 'class'=>'btn btn-primary')); 
    }
    ?>	
	
</form>
<?php endif; ?>

<!-- revision -->
<h2>Revision as of <?php echo date('H:i:s, M d, Y', strtotime($this->revision['timestamp'])); ?>, <?php echo ucfirst($this->revision['action']); ?> by <?php echo $this->revision['user']; ?></h2>
<div><?php echo $this->revision['html']; ?></div>

</div><!-- #scripto-history -->
</div>
<?php //foot(); ?>
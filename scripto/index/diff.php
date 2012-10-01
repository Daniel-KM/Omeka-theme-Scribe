<?php
$title = 'Revision Difference';
//$title .= (1 == $this->namespaceIndex) ? 'Discussion' : 'Transcription';
$head = array('title' => html_escape($title));
head($head);
?>
<style type="text/css">
#scripto-diff tr {border: none !important;}
#scripto-diff td {padding: 2px !important;}
td.diff-marker {width: 10px;}
td.diff-deletedline {background-color: #FFEDED;}
td.diff-addedline {background-color: #EDFFEF;}
ins.diffchange {background-color: #BDFFC8;}
del.diffchange {background-color: #FFBDBD;}
</style>
<h2>&nbsp&nbsp&nbsp&nbsp<?php echo $head['title']; ?></h2>
<div id="primary">

<div id="scripto-diff" class="scripto">
<!-- navigation -->
<ul class="nav nav-tabs">
    <li class="active"><a href="#">Differences</a></li>
    <li><a href="<?php echo html_escape(uri('scripto/recent-changes')); ?>">Recent changes</a> 
    <li><a href="<?php echo html_escape(uri(array('controller' => 'items', 'action' => 'show', 'id' => $this->doc->getId()), 'id')); ?>">View document</a></li>
    <li><a href="<?php echo html_escape(uri(array('controller' => 'files', 'action' => 'show', 'id' => $this->doc->getPageId()), 'id')); ?>">View file</a></li>
    <li><a href="<?php echo html_escape(uri(array('item-id' => $this->doc->getId(), 'file-id' => $this->doc->getPageId(), 'namespace-index' => $this->namespaceIndex), 'scripto_history')); ?>">View history</a></li>
    <li><a href="<?php echo html_escape(uri(array('action' => 'transcribe', 'item-id' => $this->doc->getId(), 'file-id' => $this->doc->getPageId()), 'scripto_action_item_file')); ?>">Transcribe page</a></li>
</ul>

<h2><?php if ($this->doc->getTitle()): ?><?php echo $this->doc->getTitle(); ?><?php else: ?>Untitled Document<?php endif; ?></h2>
<h3><?php echo $this->doc->getPageName(); ?></h3>

<!-- difference -->
<table class="table table-condensed table-striped table-bordered">
    <thead>
    <tr>
        <th colspan="2">Revision as of <?php echo date('H:i:s, M d, Y', strtotime($this->oldRevision['timestamp'])); ?><br />
        <?php echo ucfirst($this->oldRevision['action']); ?> by <?php echo $this->oldRevision['user']; ?></th>
        <th colspan="2">Revision as of <?php echo date('H:i:s, M d, Y', strtotime($this->revision['timestamp'])); ?><br />
        <?php echo ucfirst($this->revision['action']); ?> by <?php echo $this->revision['user']; ?></th>
    </tr>
    </thead>
    <tbody>
    <?php echo $this->diff; ?>
    </tbody>
</table>
<h2>Revision as of <?php echo date('H:i:s, M d, Y', strtotime($this->revision['timestamp'])); ?></h2>
<div><?php echo $this->revision['html']; ?></div>
</div><!-- #scripto-diff -->
<?php foot(); ?>
</div>

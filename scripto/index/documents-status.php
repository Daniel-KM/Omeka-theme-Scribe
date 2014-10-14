<?php
$head = array('title' => html_escape('Scripto'));
head($head);
?>
<h1><?php echo $head['title']; ?></h1>
<div id="primary">

    <div id="scripto-items-export" class="scripto">
        <!-- navigation -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#"><?php echo __('Data Export'); ?></a></li>
        <?php if ($this->scripto->isLoggedIn()): ?>
            <li><span><?php echo __('Logged in as %s', '<a href="' . html_escape(url('scripto')) . '">' . $this->scripto->getUserName() . '</a>'); ?></span></li>
            <li><span>(<a href="<?php echo html_escape(url('scripto/index/logout')); ?>"><?php echo __('logout'); ?></a>)</span></li>
            <li><a href="<?php echo html_escape(url('scripto/watchlist')); ?>"><?php echo __('Your watchlist'); ?></a> </li>
        <?php else: ?>
            <li><a href="<?php echo html_escape(url('scripto/index/login')); ?>"><?php echo __('Log in to Scripto'); ?></a></li>
        <?php endif; ?>
            <li><a href="<?php echo html_escape(url('scripto/recent-changes')); ?>"><?php echo __('Recent changes'); ?></a></li>
        </ul>

        <!-- Data Export -->
        <h2><?php echo __('Export Transcription Data'); ?></h2>
        <table class="table table-condensed table-striped table-bordered">
            <thead>
                <tr>
                    <th><?php echo __('Document Title'); ?></th>
                    <th><?php echo __('Transcription Status'); ?></th>
                    <th><?php echo __('Changed on'); ?></th>
                    <th><?php echo __('View in Omeka'); ?></th>
                    <th><?php echo __('Export'); ?></th>
                </tr>
            </thead>
            <tbody>
            <?php $types = array('new' => 'Created', 'edit' => 'Edited'); ?>
            <?php foreach ($this->recentChanges as $recentChange): ?>
            <?php
            $changes = ucfirst($recentChange['action']);
                $urlDiff = url(array(
                        'item-id' => $recentChange['document_id'],
                        'file-id' => $recentChange['document_page_id'],
                        'namespace-index' => $recentChange['namespace_index'],
                        'old-revision-id' => $recentChange['old_revision_id'],
                        'revision-id' => $recentChange['revision_id'],
                ), 'scripto_diff');
                $urlHistory = url(array(
                        'item-id' => $recentChange['document_id'],
                        'file-id' => $recentChange['document_page_id'],
                        'namespace-index' => $recentChange['namespace_index'],
                ), 'scripto_history');
                if ($recentChange['new'] || in_array($recentChange['action'], array('protected', 'unprotected'))) {
                        $changes .= ' (diff | <a href="' . html_escape($urlHistory) . '">hist</a>)';
                } else {
                        $changes .= ' (<a href="' . html_escape($urlDiff) . '">diff</a> | <a href="' . html_escape($urlHistory) . '">hist</a>)';
                }

            // document page name
            $documentPageName = ScriptoPlugin::truncate($recentChange['document_page_name'], 30);
            $urlTranscribe = url(array(
                'action' => 'transcribe',
                'item-id' => $recentChange['document_id'],
                'file-id' => $recentChange['document_page_id']
            ), 'scripto_action_item_file');
            if (1 == $recentChange['namespace_index']) {
                $urlTranscribe .= '#discussion';
            } else {
                $urlTranscribe .= '#transcription';
            }

            // document title
            $documentTitle = ScriptoPlugin::truncate($recentChange['document_title'], 30, 'Untitled');
            $urlItem = url(array(
                'controller' => 'items',
                'action' => 'show',
                'id' => $recentChange['document_id']
            ), 'id');

            // length changed
            $lengthChanged = $recentChange['new_length'] - $recentChange['old_length'];
            if (0 <= $lengthChanged) {
                $lengthChanged = "+$lengthChanged";
            }
            ?>
            <tr>
                <td><?php echo $changes; ?></td>
                <td><a href="<?php echo html_escape($urlTranscribe); ?>"><?php if (1 == $recentChange['namespace_index']): ?>Talk: <?php endif; ?><?php echo $documentPageName; ?></a></td>
                <td><?php echo date('H:i:s M d, Y', strtotime($recentChange['timestamp'])); ?></td>
                <td><?php echo $lengthChanged; ?></td>
                <td><?php echo $recentChange['user']; ?></td>
                <td><a href="<?php echo html_escape($urlItem); ?>"><?php echo $documentTitle; ?></a></td>
            </tr>
        <?php endforeach; ?>
            </tbody>
        </table>
    </div><!-- #scripto-data-export -->
</div>
<?php echo foot(); ?>

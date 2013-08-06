<?php
$title = $this->doc->getTitle();
$head = array('title' => html_escape($title));
head($head);
?>

<?php echo js('OpenLayers'); ?>
<?php echo js('jquery'); ?>

<script type="text/javascript">
jQuery(document).ready(function() {
    //remove funky pre tags in output
    $("pre").wrapInner('<div>').find('div').unwrap();

    jQuery('#scripto-transcription-edit').slideDown(0);
    
    // Handle edit transcription page.
    jQuery('#scripto-transcription-page-edit').click(function() {
        jQuery('#scripto-transcription-page-edit').prop('disabled', true).text('Editing transcription...');
        jQuery.post(
            <?php echo js_escape(uri('scripto/index/page-action')); ?>, 
            {
                page_action: 'edit', 
                page: 'transcription', 
                item_id: <?php echo js_escape($this->doc->getId()); ?>, 
                file_id: <?php echo js_escape($this->doc->getPageId()); ?>, 
                wikitext: jQuery('#scripto-transcription-page-wikitext').val()
            }, 
            function(data) {
                jQuery('#scripto-transcription-page-edit').prop('disabled', false).text('Edit transcription');
                jQuery('#scripto-transcription-page-html').html(data);
            }
        );
    });
    
    // Handle edit talk page.
    jQuery('#scripto-talk-page-edit').click(function() {
        jQuery('#scripto-talk-page-edit').prop('disabled', true).text('Editing discussion...');
        jQuery.post(
            <?php echo js_escape(uri('scripto/index/page-action')); ?>, 
            {
                page_action: 'edit', 
                page: 'talk', 
                item_id: <?php echo js_escape($this->doc->getId()); ?>, 
                file_id: <?php echo js_escape($this->doc->getPageId()); ?>, 
                wikitext: jQuery('#scripto-talk-page-wikitext').val()
            }, 
            function(data) {
                jQuery('#scripto-talk-page-edit').prop('disabled', false).text('Edit discussion');
                jQuery('#scripto-talk-page-html').html(data);
            }
        );
    });
    
    // Handle default transcription/talk visibility.
    if (window.location.hash == '#discussion') {
        jQuery('#scripto-transcription').hide();
        jQuery('#scripto-page-show').text('show transcription');
    } else {
        jQuery('#scripto-talk').hide();
        
    }
    
    // Handle transcription/talk visibility.
    jQuery('#scripto-page-show').click(function(event) {
        event.preventDefault();
        if ('show discussion' == jQuery('#scripto-page-show').text()) {
            window.location.hash = '#discussion';
            jQuery('#scripto-transcription').hide();
            jQuery('#scripto-talk').show();
            jQuery('#scripto-page-show').text('show transcription');
        } else {
            window.location.hash = '#transcription';
            jQuery('#scripto-talk').hide();
            jQuery('#scripto-transcription').show();
            
        }
    });
    
    // Toggle show transcription edit.
    jQuery('#scripto-transcription-edit-show').toggle(function(event) {
        event.preventDefault();
        jQuery(this).text('hide edit');
        jQuery('#scripto-transcription-edit').slideDown('fast');
    }, function(event) {
        event.preventDefault();
        jQuery(this).text('edit');
        jQuery('#scripto-transcription-edit').slideUp('fast');
    });
    
    // Toggle show talk edit.
    jQuery('#scripto-talk-edit-show').toggle(function(event) {
        event.preventDefault();
        jQuery(this).text('hide edit');
        jQuery('#scripto-talk-edit').slideDown('fast');
    }, function(event) {
        event.preventDefault();
        jQuery(this).text('edit');
        jQuery('#scripto-talk-edit').slideUp('fast');
    });
    
    <?php if ($this->scripto->isLoggedIn()): ?>
    
    // Handle default un/watch page.
    <?php if ($this->doc->isWatchedPage()): ?>
    jQuery('#scripto-page-watch').text('Unwatch page').css('float', 'none');
    <?php else: ?>
    jQuery('#scripto-page-watch').text('Watch page').css('float', 'none');
    <?php endif; ?>
    
    // Handle un/watch page.
    jQuery('#scripto-page-watch').click(function() {
        if ('Watch page' == jQuery(this).text()) {
            jQuery(this).prop('disabled', true).text('Watching page...');
            jQuery.post(
                <?php echo js_escape(uri('scripto/index/page-action')); ?>, 
                {
                    page_action: 'watch', 
                    page: 'transcription', 
                    item_id: <?php echo js_escape($this->doc->getId()); ?>, 
                    file_id: <?php echo js_escape($this->doc->getPageId()); ?>
                }, 
                function(data) {
                    jQuery('#scripto-page-watch').prop('disabled', false).text('Unwatch page');
                }
            );
        } else {
            jQuery(this).prop('disabled', true).text('Unwatching page...');
            jQuery.post(
                <?php echo js_escape(uri('scripto/index/page-action')); ?>, 
                {
                    page_action: 'unwatch', 
                    page: 'transcription', 
                    item_id: <?php echo js_escape($this->doc->getId()); ?>, 
                    file_id: <?php echo js_escape($this->doc->getPageId()); ?>
                }, 
                function(data) {
                    jQuery('#scripto-page-watch').prop('disabled', false).text('Watch page');
                }
            );
        }
    });
    
    <?php endif; // end isLoggedIn() ?>
    
    <?php if ($this->scripto->canProtect()): ?>
    
    // Handle default un/protect transcription page.
    <?php if ($this->doc->isProtectedTranscriptionPage()): ?>
    jQuery('#scripto-transcription-page-protect').text('Unapprove').css('float', 'none');
    <?php else: ?>
    jQuery('#scripto-transcription-page-protect').text('Approve').css('float', 'none');
    <?php endif; ?>
    
    // Handle un/protect transcription page.
    jQuery('#scripto-transcription-page-protect').click(function() {
        if ('Approve' == jQuery(this).text()) {
            jQuery(this).prop('disabled', true).text('Finalizing...');
            jQuery.post(
                <?php echo js_escape(uri('scripto/index/page-action')); ?>, 
                {
                    page_action: 'protect', 
                    page: 'transcription',
                    wikitext: jQuery('#scripto-transcription-page-wikitext').val(), 
                    item_id: <?php echo js_escape($this->doc->getId()); ?>, 
                    file_id: <?php echo js_escape($this->doc->getPageId()); ?>

                }, 
                function(data) {
                    jQuery('#scripto-transcription-page-protect').prop('disabled', false).text('Unapprove');
                    location.reload();
                }
            );
        } else {
            jQuery(this).prop('disabled', true).text('Unfinalizing page...');
            jQuery.post(
                <?php echo js_escape(uri('scripto/index/page-action')); ?>, 
                {
                    page_action: 'unprotect', 
                    page: 'transcription', 
                    item_id: <?php echo js_escape($this->doc->getId()); ?>, 
                    file_id: <?php echo js_escape($this->doc->getPageId()); ?>
                }, 
                function(data) {
                    jQuery('#scripto-transcription-page-protect').prop('disabled', false).text('Approve');
                    location.reload();
                }
            );
        }
    });
    
    // Handle default un/protect talk page.
    <?php if ($this->doc->isProtectedTalkPage()): ?>
    jQuery('#scripto-talk-page-protect').text('Unprotect page').css('float', 'none');
    <?php else: ?>
    jQuery('#scripto-talk-page-protect').text('Protect page').css('float', 'none');
    <?php endif; ?>
    
    // Handle un/protect talk page.
    jQuery('#scripto-talk-page-protect').click(function() {
        if ('Protect page' == jQuery(this).text()) {
            jQuery(this).prop('disabled', true).text('Protecting page...');
            jQuery.post(
                <?php echo js_escape(uri('scripto/index/page-action')); ?>, 
                {
                    page_action: 'protect', 
                    page: 'talk', 
                    item_id: <?php echo js_escape($this->doc->getId()); ?>, 
                    file_id: <?php echo js_escape($this->doc->getPageId()); ?>
                }, 
                function(data) {
                    jQuery('#scripto-talk-page-protect').prop('disabled', false).text('Unprotect page');
                }
            );
        } else {
            jQuery(this).prop('disabled', true).text('Unprotecting page...');
            jQuery.post(
                <?php echo js_escape(uri('scripto/index/page-action')); ?>, 
                {
                    page_action: 'unprotect', 
                    page: 'talk', 
                    item_id: <?php echo js_escape($this->doc->getId()); ?>, 
                    file_id: <?php echo js_escape($this->doc->getPageId()); ?>
                }, 
                function(data) {
                    jQuery('#scripto-talk-page-protect').prop('disabled', false).text('Protect page');
                }
            );
        }
    });
    
    <?php endif; // end canProtect() ?>
    <?php if ($this->scripto->canExport()): ?>
    
    jQuery('#scripto-transcription-page-import').click(function() {
        jQuery(this).prop('disabled', true).text('Importing page...');
        jQuery.post(
            <?php echo js_escape(uri('scripto/index/page-action')); ?>, 
            {
                page_action: 'import-page', 
                page: 'transcription', 
                item_id: <?php echo js_escape($this->doc->getId()); ?>, 
                file_id: <?php echo js_escape($this->doc->getPageId()); ?>
            }, 
            function(data) {
                jQuery('#scripto-transcription-page-import').prop('disabled', false).text('Import page');
            }
        );
    });
    
    jQuery('#scripto-transcription-document-import').click(function() {
        jQuery(this).prop('disabled', true).text('Importing document...');
        jQuery.post(
            <?php echo js_escape(uri('scripto/index/page-action')); ?>, 
            {
                page_action: 'import-document', 
                page: 'transcription', 
                item_id: <?php echo js_escape($this->doc->getId()); ?>, 
                file_id: <?php echo js_escape($this->doc->getPageId()); ?>
            }, 
            function(data) {
                jQuery('#scripto-transcription-document-import').prop('disabled', false).text('Import document');
            }
        );
    });

    <?php endif; // end canExport() ?>

});
</script>

<h1><?php echo $head['title']; ?></h1>

<?php
    $page_id = $this->doc->getId();
    set_current_item(get_item_by_id($page_id));
?>

<?php $base_dir = basename(getcwd()); ?>
<div id="primary">
    <ul class="breadcrumb">
        <li><a href="/<?php echo $base_dir; ?>">Home</a><span class="divider">/</span></li>
        <li><a href="<?php echo uri('collections'); ?>"></a></li>
        <li><a href="<?php echo uri(array('controller' => 'items', 'action' => 'show', 'id' => $this->doc->getId()), 'id'); ?>"><?php echo $this->doc->getTitle(); ?></a><span class="divider">/</span></li>
        <li><?php echo $this->fileMetadata($file, 'Dublin Core', 'Title'); ?></li>
    </ul>
    <div id="scripto-transcribe" class="scripto">
        <h2><?php if ($this->doc->getTitle()): ?><?php echo $this->doc->getTitle(); ?><?php else: ?>Untitled Document<?php endif; ?></h2>
        <div>
            <div><strong><?php echo $this->fileMetadata($file, 'Dublin Core', 'Title'); ?></strong></div>
            <div>image <?php echo html_escape($this->paginationUrls['current_page_number']); ?> of <?php echo html_escape($this->paginationUrls['number_of_pages']); ?></div>
            <div>
                <?php //echo $this->fileMetadata($file, 'Dublin Core', 'Source'); ?>
                <?php //echo item('Dublin Core', 'Relation'); ?>
            </div>

        </div>
        <div class="row" style="margin-left: 0px;">
            <?php echo display_file($this->file); ?>
            <div style="margin-left: 0px;">
                <div id="scripto-transcription">
                    <?php if ($this->doc->canEditTranscriptionPage()): ?>
                        <div id="scripto-transcription-edit" class="content">
                            <br />
                            <?php if ($this->doc->isProtectedTranscriptionPage()): ?>
                                <div class="alert alert-error">
                                    <strong>This transcription is complete!</strong>
                                </div><!--alert alert-error-->
                                <div id="scripto-transcription-page-html">
                                    <?php echo $this->transcriptionPageHtml; ?>
                                </div>
                                <br />
                            </div>
                            <?php else: ?>
                                <div class="alert alert-info">
                                    <strong>This item is editable!</strong>
                                </div><!--alert alert-info-->
                                <div>
                                    <?php echo $this->formTextarea('scripto-transcription-page-wikitext', $this->doc->getTranscriptionPageWikitext(), array('cols' => '76', 'rows' => '6', 'class' => 'span11')); ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        <div id="formbuttonscanedit">
                            <?php echo $this->formButton('scripto-transcription-page-edit','Save edits', array('class' => 'btn btn-primary')); ?> 
                            <?php if ($this->scripto->canProtect()): ?><?php echo $this->formButton('scripto-transcription-page-protect','Approve', array('class' => 'btn btn-primary')); ?> <?php endif; ?>
                            <?php if ($this->scripto->isLoggedIn()): ?><?php echo $this->formButton('scripto-page-watch', 'Watch', array('class' => 'btn btn-primary')); ?> <?php endif; ?>                 
                        </div><!--formbuttonscanedit-->
                        <div id="navbuttonscanedit">
                            <?php $all_images = uri(array('controller' => 'items', 'action' => 'show', 'id' => $this->doc->getId()), 'id'); ?>
                            <?php if (isset($this->paginationUrls['previous'])): ?><a><button type="submit" class="btn btn-mini nav-btn" onClick="parent.location='<?php echo html_escape($this->paginationUrls['previous']); ?>'">prev</button></a><?php else: ?><button type="submit" class="btn btn-mini">prev</button><?php endif; ?>
                            |  <?php if (isset($this->paginationUrls['next'])): ?><a><button type="submit" class="btn btn-mini nav-btn" onClick="parent.location='<?php echo html_escape($this->paginationUrls['next']); ?>'">next</button></a><?php else: ?><button type="submit" class="btn btn-mini">next</button><?php endif; ?>
                            |  <a><button class="btn btn-mini nav-btn" onClick="parent.location='<?php echo $all_images; ?>'">all images</button></a>
                            |  <a><button class="btn btn-mini nav-btn" onClick="parent.location='<?php echo html_escape(uri(array('item-id' => $this->doc->getId(), 'file-id' => $this->doc->getPageId(), 'namespace-index' => 0), 'scripto_history')); ?>'">history</button></a>
                        </div><!--navbuttonscanedit-->
                        </div><!--scripto-transcription-edit-->
                    <?php else: ?>
                        <div id="scripto-transcription-edit" class="content">
                            <br />
                            <div class="alert alert-error">
                                <strong>This transcription is complete!</strong>
                            </div><!--alert alert-error-->
                            <div id="scripto-transcription-page-html">
                                <?php echo $this->transcriptionPageHtml; ?>
                            </div><!--scripto-transcription-page-html-->
                            <?php if ($this->scripto->canProtect()): ?><?php echo $this->formButton('scripto-transcription-page-protect','Approve', array('class' => 'btn btn-primary')); ?> <?php endif; ?>
                            <?php if ($this->scripto->isLoggedIn()): ?><?php echo $this->formButton('scripto-page-watch', 'Watch', array('class' => 'btn btn-primary')); ?> <?php endif; ?>  
                            <div id="navbuttonscantedit">
                                <?php $all_images = uri(array('controller' => 'items', 'action' => 'show', 'id' => $this->doc->getId()), 'id'); ?>
                                <?php if (isset($this->paginationUrls['previous'])): ?><a><button type="submit" class="btn btn-mini nav-btn" onClick="parent.location='<?php echo html_escape($this->paginationUrls['previous']); ?>'">prev</button></a><?php else: ?><button type="submit" class="btn btn-mini">prev</button><?php endif; ?>
                                |  <?php if (isset($this->paginationUrls['next'])): ?><a><button type="submit" class="btn btn-mini nav-btn" onClick="parent.location='<?php echo html_escape($this->paginationUrls['next']); ?>'">next</button></a><?php else: ?><button type="submit" class="btn btn-mini">next</button><?php endif; ?>
                                |  <a><button class="btn btn-mini nav-btn" onClick="parent.location='<?php echo $all_images; ?>'">all images</button></a>
                                |  <a><button class="btn btn-mini nav-btn" onClick="parent.location='<?php echo html_escape(uri(array('item-id' => $this->doc->getId(), 'file-id' => $this->doc->getPageId(), 'namespace-index' => 0), 'scripto_history')); ?>'">history</button></a>
                            </div>       
                        </div><!--scripto-transcription-edit-->
                    </div>    
                    <?php endif; ?>
                </div><!--scripto-transcription-->
            </div><!--margin-left-->            
        </div><!--row-->
        <?php foot(); ?>
    </div><!--scripto-transcribe-->
</div><!--primary-->





          






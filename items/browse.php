<?php

$pageTitle = __('Browse Items');
echo head(array(
    'title' => $pageTitle,
    'bodyclass' => 'items browse',
));
?>
<div id="primary">
    <div class="row page-header">
        <div class="col-xs-12">
        <h1><?php echo $pageTitle;?> <small><?php echo __('(%s total)', $total_results); ?></small></h1>
        </div>
    </div>
    <nav class="items-nav navigation secondary-nav">
        <?php echo public_nav_items()->setUlClass('nav sub-nav'); ?>
    </nav>
<?php if ($searchFilters = item_search_filters()): ?>
    <div class="bs-callout bs-callout-info">
        <?php echo $searchFilters; ?>
    </div>
<?php endif; ?>
<?php if ($paginationLinks = pagination_links()): ?>
    <div id="pagination-top">
	
        <?php echo $paginationLinks; ?>

    </div>
<?php endif; ?>
<?php
    if ($total_results > 1):
        $sortLinks[__('Title')] = 'Dublin Core,Title';
        //$sortLinks[__('Creator')] = 'Dublin Core,Creator';
        $sortLinks[__('Date Added')] = 'added';
    ?>
    <div class="row">
        <div class="col-xs-12">
            <div id="sort-links" class="input-group input-group-sm btn-group">
                <span class="input-group-addon"><?php echo __('Sort by:'); ?></span>
                <div class="input-group">
                    <?php
                        echo bootstrap_browse_sort_links($sortLinks, array(
                            'list_tag'  => 'div',
                            'list_attr' => array('class' => 'input-group-btn'),
                            'link_tag'  => 'span',
                            'link_attr' => array('class' => 'btn btn-default btn-sm', 'role' => 'button')
                        ));
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php foreach(loop('items') as $item): ?>
    <div class="item">
        <div class="row">
            <div class="col-sm-4">
                <div class="item-img">
				
            <?php if (metadata($item, 'has thumbnail')): ?>
                    <?php echo link_to_item(item_image('thumbnail', array('class' => 'image img-responsive'))); ?>
            <?php else: ?>
                    <div class="image none"></div>
            <?php endif; ?>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="item-title">
					<b><?php  echo "ID: ".(metadata($item, 'id')) ?></b>
                    <h3><?php echo link_to_item(metadata($item, array('Dublin Core', 'Title')), array('class' => 'permalink', 'snippet' => 250)); ?></h3>
                </div>
                <?php if ($text = metadata($item, array('Item Type Metadata', 'Text'), array('snippet' => 250))): ?>
                <div class="item-description">
                    <p><?php echo $text; ?></p>
                </div>
                <?php elseif ($description = metadata($item,array('Dublin Core', 'Description'), array('snippet' => 250))): ?>
                <div class="item-description">
                    <?php echo $description; ?>
                </div>
                <?php endif; ?>
                <?php if (get_collection_for_item($item)): ?>
                <div><strong><?php echo __('Collection'); ?></strong></div>
                <div class="element-text"><?php echo link_to_collection_for_item(); ?></div>
                <?php endif; ?>
                <?php /* <div>
                    <h5><?php echo __('Citation'); ?></h5>
                    <p class="citation"><?php echo item_citation(); ?></p>
                </div> */ ?>
            </div>
            <div class="col-sm-2">
                <?php if (metadata($item,'has tags')): ?>
                <div class="browse-items-tags well well-sm">
                    <p><i class="fa fa-tag"></i> <strong><?php echo __('Tags'); ?></strong></p>
                    <?php echo tag_string($item); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <hr />
    </div>
<?php fire_plugin_hook('public_items_browse_each', array('view'  =>  $this, 'item' => $item)); ?>
<?php endforeach; ?>

<?php if ($paginationLinks): ?>
    <div id="pagination-bottom">
        <?php echo $paginationLinks; ?>
    </div>
<?php endif; ?>
    <?php fire_plugin_hook('public_items_browse', array('items' => $items, 'view' => $this)); ?>
 </div> <?php // end primary. ?>

<?php echo foot();

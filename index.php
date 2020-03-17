<?php
echo head(array(
    'bodyid' => 'home',
));
?>

<!--
<div id="featured-item">
    <h2><?php echo __('Featured Item'); ?></h2>
    <?php echo random_featured_items(10); ?>
</div>
-->

<?php $homepageText = get_theme_option('Homepage Text'); ?>
<!-- <?php //if ($homepageText): ?> -->
<div class="row home-features home-text mt-2" id="home-tagline"> <?php // start tagline ?>
    <div class="col-xs-12 col-sm-12 col-lg-6">
        <?php echo $homepageText; ?>
    </div>
	<div class="col-xs-12 col-sm-12 col-lg-6">

		
		

	</div>
</div>
<!-- <?php //endif; ?>  -->

<!--
<div class="row home-features">
    <div class="col-sm-6 home-items">
        <?php if (get_theme_option('Display Featured Item')): ?>
        <div id="featured-item">
            <h2><?php echo __('Featured Item'); ?></h2>
            <?php echo random_featured_items(1); ?>
        </div>
        <?php endif; ?>
    </div>
    <div class="col-sm-6 home-collection">
    <?php if (get_theme_option('Display Featured Collection')): ?>
        <div id="featured-collection">
            <h2><?php echo __('Featured Collection'); ?></h2>
            <?php echo random_featured_collection(); ?>
        </div>
    <?php endif; ?>
    </div>
</div>
-->
	<?php
        $recentItems = (integer) get_theme_option('Homepage Recent Items');
		
        if ($recentItems): ?>
		<h2><?php echo __('Recent Items'); ?></h2>
		<div class="text-center mt-1 mb-3">
			<a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a>
		</div>
		<div class="row home-features">
		<?php set_loop_records('items', get_recent_items($recentItems));?>
		<?php $noFile = '<img src="' . img('no-file.png') . '" class="img-rounded img-responsive img-thumbnail" alt="' . __('No file') . '" />'; ?>
			<?php foreach(loop('items') as $item): ?>
			<div class="col-sm-3">
				<div class="well" style="text-align:center;">
					<div><?php if (metadata($item, 'has files')):
						echo link_to_item(item_image('square_thumbnail', array('class' => 'img-rounded img-responsive img-thumbnail')));
					else:
						echo link_to_item($noFile, array('class' => 'image none'), 'show', $item);
					endif; ?>
					</div>
					<br />
					<p class="caption ellipsis"><span><?php echo metadata($item, array('Dublin Core', 'Title')); ?></span></p>
				</div>
			</div>
			<?php endforeach ?>
		
		</div>
    <?php endif; ?>

<div class="text-center">
<a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a>
</div>
<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot();

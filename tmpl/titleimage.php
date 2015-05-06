<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_tags_popular
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>
<?php JLoader::register('TagsHelperRoute', JPATH_BASE . '/components/com_tags/helpers/route.php'); ?>

<div class="tagsselected<?php echo $moduleclass_sfx; ?>">

<?php if ($params->get('show_type', 1)):?>
	<?php if(count($typeTitles) == 1): ?>
		<h3><?php echo $typeTitles[0]; ?></h3>
	<?php else: ?>
		<h3><?php echo JText::_('MOD_TAGS_SELECTED_CONTENT_TYPES_LABEL'); ?></h3>
		<ul>
		<?php foreach($typeTitles as $typeTitle):?>
			<li><?php echo $typeTitle; ?></li>
		<?php endforeach; ?>
		</ul>
	<?php endif;?>
<?php endif;?>
	
<?php if ($list) : ?>
	<?php foreach ($list as $i => $item) : ?>
		<div class="single_tagsselected">
			<div>
				<?php $item->route = new JHelperRoute; ?>
				<a href="<?php echo JRoute::_(TagsHelperRoute::getItemRoute($item->content_item_id, $item->core_alias, $item->core_catid, $item->core_language, $item->type_alias, $item->router)); ?>">
					<?php if (!empty($item->core_title)) {
						echo htmlspecialchars($item->core_title);
					} ?>
				</a>
			</div>
			<?php
				$image = json_decode($item->core_images)->image_intro;
				if ($image != '') {
					echo "<div><img src='$image' alt='$images->image_intro_alt'/></div>";
				}
    		?>
		</div>
	<?php endforeach; ?>
<?php else : ?>
	<span><?php echo JText::_('MOD_TAGS_SELECTED_NO_TAGGED_ITEMS'); ?></span>
<?php endif; ?>
</div>

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
		<h4 class='uk-margin-top-remove'>
			<?php $item->route = new JHelperRoute; ?>
			<a href="<?php echo JRoute::_(TagsHelperRoute::getItemRoute($item->content_item_id, $item->core_alias, $item->core_catid, $item->core_language, $item->type_alias, $item->router)); ?>">
				<?php if (!empty($item->core_title)) :
					echo htmlspecialchars($item->core_title);
				endif; ?>
			</a>
		</h4>
		<?php if ($params->get('show_date', 0) || $params->get('show_author', 0)): ?>
		<div class='meta'>
			<?php
			$dateOption = $params->get('date_option'); 
			$date = $item->{$dateOption};
			$author = $item->author;
			if ($params->get('show_date', 0) && !empty($date)) : ?>
			<span class='date'><?php echo date(JText::_('DATE_FORMAT_LC3'), strtotime($date)); ?></span>
			<?php endif;
			if ($params->get('show_author', 0) && !empty($author)) : ?>
			<span class='author'><?php echo $author; ?></span>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<?php echo $item->core_body; ?>
	<?php endforeach; ?>
<?php else : ?>
	<span><?php echo JText::_('MOD_TAGS_SELECTED_NO_TAGGED_ITEMS'); ?></span>
<?php endif; ?>
</div>

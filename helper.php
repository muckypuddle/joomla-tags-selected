<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_tags_popular
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Helper for mod_tags_popular
 *
 * @package     Joomla.Site
 * @subpackage  mod_tags_popular
 * @since       3.1
 */
abstract class ModTagsselectedHelper
{
	public static function getContentList($params)
	{
		$db         = JFactory::getDbo();
		$app        = JFactory::getApplication();
		$user       = JFactory::getUser();
		$groups     = implode(',', $user->getAuthorisedViewLevels());
		//$matchtype  = $params->get('matchtype', 'all');
		$maximum    = $params->get('maximum', 5);
		$tagsHelper = new JHelperTags;
		$option     = $app->input->get('option');
		$view       = $app->input->get('view');
		$prefix     = $option . '.' . $view;
		$id         = (array) $app->input->getObject('id');
		
		// Get module parameters
		$selectedTags = $params->get('selected_tags');
		$contentTypes = $params->get('content_types');
		$includeChildren = !!$params->get('include_children');
		$matchLogic = !!$params->get('match_logic');
		$orderByOption = $params->get('order_by_option');
		$orderDir = $params->get('order_dir');
			
		// Strip off any slug data.
		foreach ($id as $id)
		{
			if (substr_count($id, ':') > 0)
			{
				$idexplode = explode(':', $id);
				$id        = $idexplode[0];
			}
		}

		$tagsToMatch = $selectedTags;
		if (!$tagsToMatch || is_null($tagsToMatch))
		{
			return $results = false;
		}
		
		$query=$tagsHelper->getTagItemsQuery($tagsToMatch, $contentTypes, $includeChildren, $orderByOption, $orderDir, $matchLogic, $languageFilter = 'all', $stateFilter = '0,1');
		$db->setQuery($query, 0, $maximum);
		$results = $db->loadObjectList();

		foreach ($results as $result)
		{
			$explodedAlias = explode('.', $result->type_alias);
			$result->link = 'index.php?option=' . $explodedAlias[0] . '&view=' . $explodedAlias[1] . '&id=' . $result->content_item_id . '-' . $result->core_alias;
		}

		return $results;	
	}
}
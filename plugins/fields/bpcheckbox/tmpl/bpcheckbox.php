<?php
/**
 * @package     ${package}
 *
 * @copyright   Copyright (C) ${build.year} ${copyrights},  All rights reserved.
 * @license     ${license.name}; see ${license.url}
 *
 * Field based on original Checkbox field from Joomla! CMS.
 */
defined('_JEXEC') or die;

if ($field->value == '')
{
	return;
}

echo $field->value;

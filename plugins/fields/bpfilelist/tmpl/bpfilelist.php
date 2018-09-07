<?php
/**
 * @package     ${package}
 *
 * @copyright   Copyright (C) ${build.year} ${copyrights}, All rights reserved.
 * @license     ${license.name}; see ${license.url}
 */
defined('_JEXEC') or die;

if ($field->value == '')
{
	return;
}

$value  = (array) $field->value;

echo $value;

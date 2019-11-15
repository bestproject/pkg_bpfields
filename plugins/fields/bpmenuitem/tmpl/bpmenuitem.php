<?php
/**
 * @package     ${package}
 *
 * @copyright   Copyright (C) ${build.year} ${copyrights}, All rights reserved.
 * @license     ${license.name}; see ${license.url}
 */

use Joomla\CMS\Router\Route;

defined('_JEXEC') or die;


if (!$field->value)
{
	return;
}

$anchor_text = $fieldParams->get('link_name', $field->label);

?>
<a href="<?php echo Route::_('index.php?Itemid='.(int)$field->value) ?>">
	<?php echo $anchor_text ?>
</a>

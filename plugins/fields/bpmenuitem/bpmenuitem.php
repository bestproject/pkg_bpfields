<?php
/**
 * @package     ${package}
 *
 * @copyright   Copyright (C) ${build.year} ${copyrights}, All rights reserved.
 * @license     ${license.name}; see ${license.url}
 */

use Joomla\CMS\Form\Form;
use Joomla\CMS\Form\FormHelper;

defined('_JEXEC') or die;

JLoader::import('components.com_fields.libraries.fieldsplugin', JPATH_ADMINISTRATOR);

/**
 * Fields BPMenuItem Plugin
 *
 * @since 1.0
 */
class PlgFieldsBPMenuItem extends FieldsPlugin
{
	/**
	 * Transforms the field into a DOM XML element and appends it as a child on the given parent.
	 *
	 * @param   stdClass    $field   The field.
	 * @param   DOMElement  $parent  The field node parent.
	 * @param   JForm       $form    The form.
	 *
	 * @return  DOMElement
	 *
	 * @throws Exception
	 *
	 * @since 1.0
	 */
	public function onCustomFieldsPrepareDom($field, DOMElement $parent, JForm $form)
	{
		$fieldNode = parent::onCustomFieldsPrepareDom($field, $parent, $form);

        if (!$fieldNode)
		{
			return $fieldNode;
		}

		if (JFactory::getApplication()->isClient('site'))
		{
			// The menu item field is not working on the front end
			return;
		}

		FormHelper::addFieldPath(JPATH_ADMINISTRATOR.'/components/com_menus/models/fields/modal');

        $fieldNode->setAttribute('type', 'modal_menu');
        $fieldNode->setAttribute('select', 'true');
        $fieldNode->setAttribute('new', 'true');
        $fieldNode->setAttribute('edit', 'true');
        $fieldNode->setAttribute('clear', 'true');

		return $fieldNode;
	}
}

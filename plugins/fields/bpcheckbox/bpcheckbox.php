<?php
/**
 * @package     ${package}
 *
 * @copyright   Copyright (C) ${build.year} ${copyrights}, All rights reserved.
 * @license     ${license.name}; see ${license.url}
 */

defined('_JEXEC') or die;

JLoader::import('components.com_fields.libraries.fieldslistplugin', JPATH_ADMINISTRATOR);

/**
 * Fields BPCheckbox Plugin
 */
class PlgFieldsBPCheckbox extends FieldsListPlugin
{
	/**
	 * Transforms the field into a DOM XML element and appends it as a child on the given parent.
	 *
	 * @param   stdClass    $field   The field.
	 * @param   DOMElement  $parent  The field node parent.
	 * @param   JForm       $form    The form.
	 *
	 * @return  DOMElement
	 */
	public function onCustomFieldsPrepareDom($field, DOMElement $parent, JForm $form)
	{
		$fieldNode = parent::onCustomFieldsPrepareDom($field, $parent, $form);

        if (!$fieldNode)
		{
			return $fieldNode;
		}

        $fieldNode->setAttribute('type', 'bpcheckbox');
        $fieldNode->setAttribute('hiddenLabel', 'true');
        $fieldNode->setAttribute('addfieldpath', '/plugins/fields/bpcheckbox/fields');
        $fieldNode->setAttribute('text', $field->fieldparams->get('text'));

		return $fieldNode;
	}
}

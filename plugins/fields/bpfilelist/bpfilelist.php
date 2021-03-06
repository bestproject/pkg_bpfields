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
 * Fields BPFileList Plugin
 */
class PlgFieldsBPFileList extends FieldsListPlugin
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

        $fieldNode->setAttribute('type', 'filelist');
        $fieldNode->setAttribute('filter', '(.*)');
		$fieldNode->setAttribute('hide_default', 'true');
		$fieldNode->setAttribute('directory', '/images/' . $fieldNode->getAttribute('directory'));

		return $fieldNode;
	}
}

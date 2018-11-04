<?php

/**
 * @package     ${package}
 *
 * @copyright   Copyright (C) ${build.year} ${copyrights},  All rights reserved.
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters,  All rights reserved.
 * @license     ${license.name}; see ${license.url}
 *
 * Field based on original Checkbox field from Joomla! CMS.
 */
use Joomla\CMS\Layout\FileLayout;

defined('JPATH_PLATFORM') or die;

/**
 * A Checkbox field wrapper used in BP Fields.
 */
class JFormFieldBPCheckbox extends JFormField
{
    /**
     * The form field type.
     *
     * @var    string
     */
    protected $type = 'BPCheckbox';

    /**
     * The checked state of checkbox field.
     *
     * @var    boolean

     */
    protected $checked = false;

    /**
     * HTML field label text.
     * 
     * @var string
     */
    protected $text;

    /**
     * Method to get certain otherwise inaccessible properties from the form field object.
     *
     * @param   string  $name  The property name for which to get the value.
     *
     * @return  mixed  The property value or null.
     */
    public function __get($name)
    {
        switch ($name) {
            case 'checked':
                return $this->checked;
        }

        return parent::__get($name);
    }

    /**
     * Method to set certain otherwise inaccessible properties of the form field object.
     *
     * @param   string  $name   The property name for which to set the value.
     * @param   mixed   $value  The value of the property.
     *
     * @return  void
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case 'checked':
                $value         = (string) $value;
                $this->checked = ($value == 'true' || $value == $name || $value == '1');
                break;

            default:
                parent::__set($name, $value);
        }
    }

    /**
     * Method to attach a JForm object to the field.
     *
     * @param   SimpleXMLElement  $element  The SimpleXMLElement object representing the `<field>` tag for the form field object.
     * @param   mixed             $value    The form field value to validate.
     * @param   string            $group    The field name group control value. This acts as an array container for the field.
     *                                      For example if the field has name="foo" and the group value is set to "bar" then the
     *                                      full field name would end up being "bar[foo]".
     *
     * @return  boolean  True on success.
     *
     * @see     JFormField::setup()
     */
    public function setup(SimpleXMLElement $element, $value, $group = null)
    {
        // Handle the default attribute
        $default = (string) $element['default'];

        if ($default) {
            $test = $this->form->getValue((string) $element['name'], $group);

            $value = ($test == $default) ? $default : null;
        }

        $return = parent::setup($element, $value, $group);

        if ($return) {
            $checked       = (string) $this->element['checked'];
            $this->checked = ($checked == 'true' || $checked == 'checked' || $checked == '1');

            empty($this->value) || $this->checked ? null : $this->checked = true;

            $this->text = (string) $this->element['text'];
        }

        return $return;
    }

    /**
     * Method to get the field input markup.
     * The checked element sets the field to selected.
     *
     * @return  string  The field input markup.
     */
    protected function getInput()
    {

        /* @var $layout FileLayout */
        $layout = new FileLayout('joomla.form.field.bpcheckbox');

        $includePaths = $layout->getIncludePaths();
        $includePaths[] = JPATH_PLUGINS.'/fields/bpcheckbox/layouts';
        $layout->setIncludePaths($includePaths);

        // Field attributes
        $attributes = [
            'class' => trim($this->class.' bpcheckbox'),
            'value' => empty($this->value) ? $this->default : $this->value,
            'id' => $this->id,
            'name' => $this->name,
        ];

        // Is field disabled
        if ($this->disabled) {
            $attributes['disabled'] = '';
        }

        // Is field required
        if ($this->required) {
            $attributes['required'] = '';
        }

        // Should field be focused on default
        if ($this->autofocus) {
            $attributes['autofocus'] = '';
        }

        // Is field checked
        if ($this->checked) {
            $attributes['checked'] = '';
        }

        // Field onclick event
        if (!empty($this->onclick)) {
            $attributes['onclick'] = $this->onclick;
        }

        // Fiel on change event
        if (!empty($this->onchange)) {
            $attributes['onchange'] = $this->onchange;
        }

        return $layout->render([
                'attributes' => $attributes,
                'text' => $this->text
        ]);
    }
}
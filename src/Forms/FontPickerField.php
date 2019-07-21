<?php

namespace SilverStripe\Fontpicker\Forms;

use SilverStripe\Forms\SingleSelectField;
use SilverStripe\View\Requirements;

class FontPickerField extends SingleSelectField
{
    /**
     * Defines the default font
     *
     * @config
     * @var array
     */
    protected static $default_font = 'nunito-sans';

    public function getDefaultFont()
    {
        return $this->owner->config()->get('default_font');
    }

    public function __construct($name, $title = null, $source = array(), $value = null)
    {
        parent::__construct($name, $title, $source, $value);

        $this->addExtraClass('font-picker-field');
    }

    public function getSchemaDataDefaults()
    {
        $schemaData = parent::getSchemaDataDefaults();

        $fonts = [];
        foreach ($this->getSource() as $css => $title) {
            $fonts[] = [
                'CSSClass' => $css,
                'Title' => $title,
            ];
        }

        $schemaData['source'] = $fonts;
        $schemaData['name'] = $this->getName();
        $schemaData['value'] = $this->Value();

        return $schemaData;
    }

    public function Value()
    {
        return parent::Value() ?: $this->getDefaultFont();
    }
}

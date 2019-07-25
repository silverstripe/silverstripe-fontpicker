<?php

namespace SilverStripe\Fontpicker\Tests\Forms;

use SilverStripe\Core\Config\Config;
use SilverStripe\Fontpicker\Forms\FontPickerField;
use SilverStripe\Dev\SapphireTest;

class FontPickerFieldTest extends SapphireTest
{
    public function testValueReturnsDefaultValueIfFalsy()
    {
        $field = new FontPickerField('test');
        $this->assertSame(Config::inst()->get(FontPickerField::class, 'default_font'), $field->Value());
    }
}

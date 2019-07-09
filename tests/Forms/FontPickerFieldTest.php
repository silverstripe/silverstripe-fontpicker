<?php

namespace SilverStripe\Fontpicker\Tests\Forms;

use SilverStripe\Fontpicker\Forms\FontPickerField;
use SilverStripe\Dev\SapphireTest;

class FontPickerFieldTest extends SapphireTest
{
    public function testValueReturnsDefaultValueIfFalsy()
    {
        $field = new FontPickerField('test');
        $this->assertSame(FontPickerField::DEFAULT_VALUE, $field->Value());
    }
}

# Fontpicker Module

[![Build Status](https://travis-ci.org/silverstripe/fontpicker.svg?branch=master)](https://travis-ci.org/silverstripe/fontpicker)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/silverstripe/fontpicker/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/silverstripe/fontpicker/?branch=master)
[![codecov](https://codecov.io/gh/silverstripe/fontpicker/branch/master/graph/badge.svg)](https://codecov.io/gh/silverstripe/fontpicker)
[![SilverStripe supported module](https://img.shields.io/badge/silverstripe-supported-0071C4.svg)](https://www.silverstripe.org/software/addons/silverstripe-commercially-supported-module-list/)

This module adds a font picker field which can be used anywhere.

## Usage

To add a `FontPickerField` to a `DataObject`, you can write the following in a `DataExtension`:

```php
    public function updateCMSFields(FieldList $fields)
    {
        $fonts = [
            'nunito-sans' => 'Nunito Sans',
            'fira-sans' => 'Fira Sans',
            'merriweather' => 'Merriweather',
        ];

        // Import each font via the google fonts api to render font preview
        foreach ($fonts as $fontTitle) {
            $fontFamilyName = str_replace(' ', '+', $fontTitle);
            Requirements::css("//fonts.googleapis.com/css?family=$fontFamilyName");
        }

        $fields->addFieldsToTab(
            'Root.ThemeOptions',
            [
                FontPickerField::create(
                    'MainFontFamily',
                    _t(
                        __CLASS__ . '.MainFontFamily',
                        'Main font family'
                    ),
                    $fonts
                )
            ]
        );
    }
```

See https://github.com/silverstripe/silverstripe-theme-fontpicker for an example.

## Versioning

This library follows [Semver](http://semver.org). According to Semver, you will be able to upgrade to any minor or patch version of this library without any breaking changes to the public API. Semver also requires that we clearly define the public API for this library.

All methods, with `public` visibility, are part of the public API. All other methods are not part of the public API. Where possible, we'll try to keep `protected` methods backwards-compatible in minor/patch versions, but if you're overriding methods then please test your work before upgrading.

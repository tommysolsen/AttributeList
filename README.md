# AttributeList

AttributeList is a helper class for generating attribute lists for markup.

[![License: Beerware](https://img.shields.io/badge/license-beerware-green.svg)](https://spdx.org/licenses/Beerware)
[![Version](https://img.shields.io/github/tag/apility/AttributeList.svg?label=version)](https://github.com/apility/AttributeList/releases/latest)
[![CircleCI](https://circleci.com/gh/apility/AttributeList.svg?style=shield&circle-token=628b58f031ff68d46f0d11b7153cb7cfffc56c1d)](https://circleci.com/gh/apility/AttributeList)

**[Documentation](http://htmlpreview.github.io/?https://github.com/apility/AttributeList/blob/master/docs/index.html)**

## Installation

Use the package manager [Composer](https://getcomposer.org/) to install AttributeList.

```bash
composer require apility/attribute-list
```

## Usage

```php
use Apility\AttributeList\AttributeList;

$attributes = new AttributeList();
$attributes->addAttribute('class', 'button');
$attributes->addAttribute('loading', false);
$attributes->addAttribute('items', ['Item 1', 'Item 2', 'Item 3']);

echo "<vue-component {$attributes->toVuePropsString()}></vue-component>";
```

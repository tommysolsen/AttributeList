# AttributeList

AttributeList is a helper class for generating attribute lists for markup.

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

## License
[Beerware License](https://spdx.org/licenses/Beerware) 

<erikdju@gmail.com> wrote this file. As long as you retain this notice you can do whatever you want with this stuff. If we meet some day, and you think this stuff is worth it, you can buy me a beer in return.

Twig Extensions
===============

A few handy extensions for [Twig](http://twig.sensiolabs.org/).

Included extensions:

- [Markdown Extension](#markdown-extension)

## Installation and use

Using composer:

```bash
$ composer require allmarkedup/twig-extensions
```

Then load the required extension(s) into the Twig environment when setting it up as per [the instructions in the Twig docs](http://twig.sensiolabs.org/doc/api.html#using-extensions). For example, to use the Markdown extension, you would use something like this:

```php
use Amu\Twig\TwigMarkdownExtension as MarkdownExtension;
...
$twig = new Twig_Environment($loader, $options);
$twig->addExtension(new MarkdownExtension());
```

## Included extensions

### Markdown Extension

The Markdown extension uses [Parsedown](http://parsedown.org/) under the hood to allow for easy Markdown -> HTML conversion in your templates.

To install:

```php
$twig->addExtension(new Amu\Twig\TwigMarkdownExtension());
```

Use it in your templates as a [filter](http://twig.sensiolabs.org/doc/filters/index.html):

```html
{{ 'This is a **string**' | markdown }}
```

Or use it as a tag:

```html
{% markdown %}
_This sentence is emphasised_
> And this is a quote.
{% endmarkdown %}
```

## Running tests

Tests can be run using PHP Unit:

```bash
$ vendor/bin/phpunit 
```

The project also includes a [Grunt](http://gruntjs.com) watch task to run the PHP Unit tests when files are updated which you can use for your convenience.
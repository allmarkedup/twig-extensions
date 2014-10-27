Twig Extensions
===============

A few handy extensions for [Twig](http://twig.sensiolabs.org/).

Included extensions:

- [Markdown Extension](#markdown-extension)

## Installation and use

Using composer:

```bash
$ composer require clearleft/twig-extensions
```

Then load the required extension(s) into the Twig environment when setting it up as per [the instructions in the Twig docs](http://twig.sensiolabs.org/doc/api.html#using-extensions). For example, to use the Markdown extension, you would use something like this:

```php
use Clearleft\Twig\TwigMarkdownExtension as MarkdownExtension;
...
$twig = new Twig_Environment($loader, $options);
$twig->addExtension(new MarkdownExtension());
```

## Included extensions

### Markdown Extension

The Markdown extension uses [Parsedown](http://parsedown.org/) under the hood to allow for easy Markdown -> HTML conversion in your templates.

To install:

```php
$twig->addExtension(new Clearleft\Twig\TwigMarkdownExtension());
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
<?php namespace Clearleft\Twig\TwigMarkdown;

class TwigMarkdownExtension extends \Twig_Extension
{
    /**
     * @see Twig_ExtensionInterface::getName()
     */
    public function getName()
    {
        return 'markdown';
    }

    /**
     * @see Twig_Extension::getTokenParsers()
     */
    public function getTokenParsers()
    {
        return array(new TwigMarkdownTokenParser());
    }

    public function getFilters()
    {
        
        return array(
            'markdown' => new \Twig_Filter_Method($this, 'applyFilter'),
        );
    }

    public function applyFilter($str)
    {
        $parser = new \Parsedown();
        return $parser->parse($str);
    }
}

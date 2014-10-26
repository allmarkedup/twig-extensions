<?php namespace Clearleft\Twig\TwigMarkdown;

class TwigMarkdownNode extends \Twig_Node
{
    /**
     * @param \Twig_NodeInterface $body
     * @param int    $line
     * @param string $tag
     */
    public function __construct(\Twig_NodeInterface $body, $line, $tag = 'markdown')
    {
        parent::__construct(array('body' => $body), array(), $line, $tag);
    }

    /**
     * @see Twig_Node::compile()
     */
    public function compile(\Twig_Compiler $compiler)
    {
        $compiler
            ->addDebugInfo($this)
            ->write("ob_start();\n")
            ->subcompile($this->getNode('body'))
            ->write("echo (new \Parsedown())->text(ob_get_clean());\n")
        ;
    }
}
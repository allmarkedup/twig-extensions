<?php namespace Amu\Twig\TwigMarkdown;

class TwigMarkdownTokenParser extends \Twig_TokenParser
{
    /**
     * @see Twig_TokenParserInterface::getTag()
     */
    public function getTag()
    {
        return 'markdown';
    }

    /**
     * @see Twig_TokenParserInterface::parse()
     */
    public function parse(\Twig_Token $token)
    {
        $this->parser->getStream()->expect(\Twig_Token::BLOCK_END_TYPE);
        $body = $this->parser->subparse(function(\Twig_Token $token) {
            return $token->test('endmarkdown');
        }, true);
        $this->parser->getStream()->expect(\Twig_Token::BLOCK_END_TYPE);

        return new TwigMarkdownNode($body, $token->getLine(), $this->getTag());
    }
}
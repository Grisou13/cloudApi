<?php
/**
 * Created by PhpStorm.
 * User: thomas.ricci
 * Date: 17.03.2016
 * Time: 08:34
 */

namespace App\Api\Utils\Markdown;


use League\CommonMark\Block\Parser\AbstractBlockParser;
use League\CommonMark\ContextInterface;
use League\CommonMark\Cursor;
use League\CommonMark\Inline\Parser\AbstractInlineParser;
use League\CommonMark\InlineParserContext;
use League\CommonMark\Extension\Extension;

class HeaderIntoLinkExtension extends Extension
{
    public function getBlockParsers()
    {
        return [
            new TableParser(),
        ];
    }
    public function getBlockRenderers()
    {
        return [
            __NAMESPACE__.'\\Table'     => new TableRenderer(),
            __NAMESPACE__.'\\TableRows' => new TableRowsRenderer(),
            __NAMESPACE__.'\\TableRow'  => new TableRowRenderer(),
            __NAMESPACE__.'\\TableCell' => new TableCellRenderer(),
        ];
    }
    public function getName()
    {
        return 'table';
    }
}

class HeaderParser extends AbstractBlockParser
{

    /**
     * @param ContextInterface $context
     * @param Cursor $cursor
     *
     * @return bool
     */
    public function parse(ContextInterface $context, Cursor $cursor)
    {
        // TODO: Implement parse() method.
    }
}
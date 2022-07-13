<?php
namespace App\Classes;

abstract class Parser implements ParserInterface
{
    protected PageDownloaderInterface $getPageHandler;

    public function __construct(PageDownloaderInterface $pageHandler)
    {
        $this->getPageHandler = $pageHandler;
    }

    /**
     * Parse any source of data
     *
     * @return string
     */
    abstract public function parse(): string;

    /**
     * Format from array to string for output
     *
     * @param  array  $tags
     * @return string
     */
    protected static function formatOutput(array $tags): string
    {
        if(empty($tags))
            return '';

        $str = '';
        $i = 1;

        foreach($tags as $tagName => $useCnt) {
            $str .= $tagName . ": " . $useCnt;

            if($i < count($tags))
                $str .= (PHP_SAPI === 'cli' ? PHP_EOL : '<br>');

            $i++;
        }

        return $str;
    }
}
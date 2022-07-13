<?php

namespace App\Classes;

class ParserHtml extends Parser
{
    const PATTERN = '/<([a-zA-Z0-9]{1,})[\s\/>]/Ui';

    /**
     * Parse html data source
     *
     * @return string
     */
    public function parse(): string
    {
        preg_match_all(self::PATTERN, $this->getPageHandler->data, $matches);

        if(count($matches[1]) === 0)
            return 'No tags found!';

        $tagsUseCnt = array_count_values($matches[1]);

        arsort($tagsUseCnt);

        return self::formatOutput($tagsUseCnt);
    }
}
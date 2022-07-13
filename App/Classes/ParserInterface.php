<?php
namespace App\Classes;

interface ParserInterface
{
    /**
     * Parse tags from string
     *
     * @return string
     */
    public function parse(): string;
}
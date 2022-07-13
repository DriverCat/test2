<?php

namespace App\Classes;

interface PageDownloaderInterface
{
    /**
     * Get remote page contents with CURL
     *
     * @return string
     */
    public function getPage(): string;
}
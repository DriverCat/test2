<?php

namespace Tests\stubs;

use App\Classes\PageDownloaderInterface;

class DummyPageDownloader implements PageDownloaderInterface
{
    public string $data;

    /**
     * Define CURL target URL
     *
     * @param  string  $url
     */
    public function __construct(string $url)
    {
        $this->data = $this->getPage();
    }

    /**
     * Get fake data source string
     *
     * @return string
     */
    public function getPage(): string
    {
        return file_get_contents(__DIR__ . '/test-page.html');
    }
}
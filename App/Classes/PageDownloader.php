<?php

namespace App\Classes;

use App\Exceptions\NoPageException;

class PageDownloader implements PageDownloaderInterface
{
    /**
     * Define CURL options
     *
     * @var array
     */
    private array $curlOptions = [
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_VERIFYHOST => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_CONNECTTIMEOUT => 15,
        CURLOPT_HEADER => false,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',
    ];

    public string $data;

    /**
     * Set data from source into variable
     *
     * @param  string  $url
     */
    public function __construct(string $url)
    {
        $this->curlOptions[CURLOPT_URL] = $url;

        try {
            $this->data = $this->getPage();
        } catch (NoPageException $exception) {
            $this->data = $exception->getMessage();
        }
    }

    /**
     * Get remote page contents with CURL
     *
     * @throws NoPageException
     * @return string
     */
    public function getPage(): string
    {
        $ch = curl_init();
        curl_setopt_array($ch, $this->curlOptions);

        if(!$data = curl_exec($ch))
            throw new NoPageException('Error while downloading page!');

        curl_close($ch);

        return $data;
    }
}
<?php
namespace App;

use App\Classes\PageDownloader;
use App\Classes\ParserHtml;

require __DIR__ . '/vendor/autoload.php';

$Parser = new ParserHtml(new PageDownloader('https://yandex.ru'));

echo $Parser->parse();
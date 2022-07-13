<?php declare(strict_types=1);
namespace Tests;

use App\Classes\PageDownloader;
use PHPUnit\Framework\TestCase;
use App\Classes\ParserHtml;
use Tests\stubs\DummyPageDownloader;

class AppTests extends TestCase
{
    public function testTagsCntCalculatedValid(): void
    {
        $dummyPageDownloader = new DummyPageDownloader('https://google.com/');

        $Parser = new ParserHtml($dummyPageDownloader);
        $result = $Parser->parse();

        $expected = "meta: 9" . PHP_EOL . "link: 4" . PHP_EOL . "html: 1" . PHP_EOL .
            "head: 1" . PHP_EOL . "title: 1" . PHP_EOL . "body: 1" . PHP_EOL . "script: 1";

        $this->assertEquals($expected, $result);
    }

    public function testEmptyResultCanBeGet(): void
    {
        $dummyPageDownloader = new PageDownloader('');

        $Parser = new ParserHtml($dummyPageDownloader);
        $result = $Parser->parse();

        $expected = "No tags found!";

        $this->assertEquals($expected, $result);
    }
}

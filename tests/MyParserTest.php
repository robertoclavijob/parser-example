<?php

use PHPUnit\Framework\TestCase;
use MiProyecto\MyParser;

require_once __DIR__.'/../vendor/autoload.php';

class MyParserTest extends TestCase
{
    public function testParseString()
    {
        $parser = new MyParser();
        $result = $parser->parseString("a,b,c");
        $this->assertEquals(["a", "b", "c"], $result);
    }

    public function testParseNumbers()
    {
        $parser = new MyParser();
        $result = $parser->parseNumbers("1,2,3");
        $this->assertEquals([1, 2, 3], $result);
    }
}
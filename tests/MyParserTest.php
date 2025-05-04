<?php

use PHPUnit\Framework\TestCase;
use MiProyecto\MyParser;

require_once __DIR__ . '/../vendor/autoload.php';

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

    public function testEvaluateSumCommand()
    {
        $parser = new MyParser();
        $this->assertEquals(5, $parser->evaluateCommand("suma(3,2)"));
    }

    public function testEvaluateSumCommandWithoutParenthesis()
    {
        $parser = new MyParser();
        $this->assertEquals(5, $parser->evaluateCommand("suma 3,2"));
    }

    public function testEvaluateSumWithNegativeNumbers()
    {
        $parser = new MyParser();
        $this->assertEquals(-1, $parser->evaluateCommand("suma(-3,2)"));
        $this->assertEquals(-1, $parser->evaluateCommand("suma -3,2"));
        $this->assertEquals(-5, $parser->evaluateCommand("suma(-3,-2)"));
    }

    public function testEvaluateSumWithMultipleNumbers()
    {
        $parser = new MyParser();

        $this->assertEquals(17, $parser->evaluateCommand("suma(3,2,5,7)"));
        $this->assertEquals(17, $parser->evaluateCommand("suma 3,2,5,7"));
        $this->assertEquals(0, $parser->evaluateCommand("suma(-3,2,1)"));
        $this->assertEquals(-10, $parser->evaluateCommand("suma(-3,-2,-5)"));
    }

    public function testEvaluateSubtractCommand()
    {
        $parser = new MyParser();
        $this->assertEquals(1, $parser->evaluateCommand("resta(3,2)"));
    }

    public function testEvaluateSubtractWithMultipleNumbers()
    {
        $parser = new MyParser();

        $this->assertEquals(-11, $parser->evaluateCommand("resta(3,2,5,7)"));
        $this->assertEquals(-11, $parser->evaluateCommand("resta 3,2,5,7"));
    }

    public function testInvalidCommandThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $parser = new MyParser();
        $parser->evaluateCommand("comando_invalido(1,2)");
    }
}
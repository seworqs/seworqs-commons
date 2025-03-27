<?php

use PHPUnit\Framework\TestCase;
use Seworqs\Commons\Helper\StringHelper as StringHelper;

class StringHelperTest extends TestCase
{

    public function testToLowerCase()
    {
        $newValue = StringHelper::toLowerCase('This is Some simple String.');
        $this->assertEquals($newValue, 'this is some simple string.');
    }

    public function testToUpperCase()
    {
        $newValue = StringHelper::toUpperCase('This is Some simple String.');
        $this->assertEquals($newValue, 'THIS IS SOME SIMPLE STRING.');
    }

    public function testToPascalCase()
    {
        $newValue = StringHelper::toPascalCase('This is Some simple String.');
        $this->assertEquals('ThisIsSomeSimpleString.', $newValue);
    }

    public function testToPascalCaseWithIgnore()
    {
        $newValue = StringHelper::toPascalCase('This is Some simple String.', "\s");
        $this->assertEquals('ThisIsSomeSimpleString.', $newValue);
    }

    public function testToCamelCase()
    {
        $newValue = StringHelper::toCamelCase('This_is/Some/simple/String.');
        $this->assertEquals('thisIsSomeSimpleString.', $newValue);
    }

    public function testToCamelCaseWithIgnore()
    {
        $newValue = StringHelper::toCamelCase('This_is/Some/simple/String.', "/");
        $this->assertEquals('thisIs/Some/Simple/String.', $newValue);
    }
}
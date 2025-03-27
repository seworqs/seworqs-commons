<?php

use PHPUnit\Framework\TestCase;
use Seworqs\Commons\Json\JsonEditor;

class JsonEditorTest extends TestCase
{

    private $_jsonEditor;

    public function setup(): void
    {
        $this->_jsonEditor = new JsonEditor(__DIR__ . '/data/test.json');
    }

    public function testSimpleAdd()
    {
        $this->_jsonEditor->add('testing', 'some value');
        $this->assertEquals($this->_jsonEditor->get("testing"), "some value");
        $this->_jsonEditor->save();
    }

    public function testSimpleRemove()
    {
        $this->_jsonEditor->delete('testing');

        $this->assertEmpty($this->_jsonEditor->get('testing'));
        $this->_jsonEditor->save();
    }

    public function testDottedAdd()
    {
        $this->_jsonEditor->add('test.extra.label', 'Some extra label');

        $this->assertEquals($this->_jsonEditor->get("test.extra.label"), "Some extra label");
        $this->_jsonEditor->save();
    }

    public function testDottedRemove()
    {
        $this->_jsonEditor->delete('test.extra.label');

        $this->assertEmpty($this->_jsonEditor->get('test.extra.label'));
        $this->_jsonEditor->save();
    }

    public function testAddArray()
    {
        $this->_jsonEditor->add('participant', ['name' => 'Joe', 'age' => '47']);

        $this->assertEquals($this->_jsonEditor->get("participant.name"), "Joe");
        $this->_jsonEditor->save();
    }

    public function testRemoveArray()
    {
        $this->_jsonEditor->delete('participant');

        $this->assertEmpty($this->_jsonEditor->get('participant'));
        $this->_jsonEditor->save();
    }

    public function testResetJson()
    {
        $tmplJson = new JsonEditor(__DIR__ . '/data/template.json');

        $tmplJson->saveAs(__DIR__ . '/data/test.json');

        $this->_jsonEditor->reload(__DIR__ . '/data/test.json');

        $this->assertEquals($this->_jsonEditor->toString(), $tmplJson->toString());
    }
}

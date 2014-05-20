<?php

namespace Dao;

class FileTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->file = new File('test.json');
        $this->file->removeAllTodo();
    }

    public function test_イテレータである()
    {
        $expected = [
            0 => '新しいTODO',
            1 => '新しいTODO2',
            2 => '新しいTODO3',
        ];
                        
        $todo = new \Todo($expected[0]);
        $this->file->addTodo($todo);
        $todo = new \Todo($expected[1]);
        $this->file->addTodo($todo);
        $todo = new \Todo($expected[2]);
        $this->file->addTodo($todo);
                
        foreach ($this->file as $key => $val) {
            $this->assertEquals($expected[$key], $val->getSubject());
        }
    }
}

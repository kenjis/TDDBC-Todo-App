<?php

namespace Cli;

class PresenterTest extends \TestCase
{
    public function setUp()
    {
        $dao = new \Dao\File('test.json');
        $dao->removeAllTodo();
        $todolist = new \Todolist($dao);
        $todolist->addTodo(new \Todo('新しいTODO'));
        $todolist->addTodo(new \Todo('新しいTODO2'));
        $todolist->addTodo(new \Todo('新しいTODO3'));
        $this->todolist = $todolist;
    }
    
    public function test_追加したTODO全てを一覧で表示()
    {
        $todolist = $this->todolist;
        $presenter = new Presenter($todolist);
        $presenter->showAllTodo();
        $expected = '0. 新しいTODO' . PHP_EOL
                . '1. 新しいTODO2' . PHP_EOL
                . '2. 新しいTODO3' . PHP_EOL;
        $this->expectOutputString($expected);
    }
    
    public function test_最後に追加したTODOの表示()
    {
        $todolist = $this->todolist;
        $presenter = new Presenter($todolist);
        $presenter->showLastTodo();
        $expected = '新しいTODO3' . PHP_EOL;
        $this->expectOutputString($expected);
    }
    
    public function test_最初に追加したTODOの表示()
    {
        $todolist = $this->todolist;
        $presenter = new Presenter($todolist);
        $presenter->showFirstTodo();
        $expected = '新しいTODO' . PHP_EOL;
        $this->expectOutputString($expected);
    }
}

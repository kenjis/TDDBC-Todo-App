<?php

require __DIR__ . '/../src/Todolist.php';

class TodolistTest extends PHPUnit_Framework_TestCase
{
    public function test_TODOリストを作成直後、空のリストである()
    {
        $todolist = new Todolist();
        $this->assertEquals(0, $todolist->count());
    }
    
    public function test_最初のTODOを登録した後、TODOリスト件数が1件である()
    {
        $todolist = new Todolist();
        $todolist->addTodo('新しいTODO');
        $this->assertEquals(1, $todolist->count());
    }
    
    public function test_TODOを2件登録した後、TODOリスト件数が2件である()
    {
        $todolist = new Todolist();
        $todolist->addTodo('新しいTODO');
        $todolist->addTodo('新しいTODO');
        $this->assertEquals(2, $todolist->count());
    }
    
    public function test_最初のTODOに「新しいTODO」と登録した後、TODOリスト1件目の内容が「新しいTODO」である()
    {
        $todolist = new Todolist();
        $todolist->addTodo('新しいTODO');
        $this->assertEquals(2, $todolist->get());
    }
    
}

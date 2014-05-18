<?php

require __DIR__ . '/../src/Todolist.php';

class TodolistTest extends PHPUnit_Framework_TestCase
{
    public function test_TODOリストを作成直後、空のリストである()
    {
        $todolist = new Todolist();
        $this->assertEquals(0, $todolist->count());
    }
    
    /**
     * @dataProvider provide_TODOの件数
     */
    public function test_最初のTODOを登録した後、TODOリスト件数がn件である($n)
    {
        $todolist = new Todolist();
        for ($i = 0; $i < $n; $i++) {
            $todolist->addTodo('新しいTODO');
        }
        $this->assertEquals($n, $todolist->count());
    }
    
    public function provide_TODOの件数($n)
    {
        return array(
            array(1),
            array(2)
        );
    }
    
    public function test_最初のTODOに「新しいTODO」と登録した後、最後のTODOリストの内容が「新しいTODO」である()
    {
        $todolist = new Todolist();
        $todolist->addTodo('新しいTODO');
        $this->assertEquals('新しいTODO', $todolist->getLastTodo());
    }
    
    public function test_2件目のTODOに「新しいTODO2」と登録した後、最新のTODOリストの内容が「新しいTODO2」である()
    {
        $todolist = new Todolist();
        $todolist->addTodo('新しいTODO');
        $todolist->addTodo('新しいTODO2');
        $this->assertEquals('新しいTODO2', $todolist->getLastTodo());
    }
        
    public function test_最初のTODOに「新しいTODO」と登録した後、最初のTODOリストの内容が「新しいTODO」である()
    {
        $todolist = new Todolist();
        $todolist->addTodo('新しいTODO');
        $this->assertEquals('新しいTODO', $todolist->getFirstTodo());
    }

    public function test_1件目に「新しいTODO」2件目のTODOに「新しいTODO2」と登録した後、最初のTODOリストの内容が「新しいTODO」である()
    {
        $todolist = new Todolist();
        $todolist->addTodo('新しいTODO');
        $todolist->addTodo('新しいTODO2');
        $this->assertEquals('新しいTODO', $todolist->getFirstTodo());
    }
    
    public function test_TODOを登録した後、全てのTODOの内容が登録されている()
    {
        $todolist = new Todolist();
        $todolist->addTodo('新しいTODO');
        $todolist->addTodo('新しいTODO2');
        $expected = ['新しいTODO', '新しいTODO2'];
        $this->assertEquals($expected, $todolist->getAllTodo());
    }
    
    public function test_最初に追加したTODOを削除できる()
    {
        $todolist = new Todolist();
        $todolist->addTodo('新しいTODO');
        $todolist->addTodo('新しいTODO2');
        $todolist->removeFirstTodo();
        $this->assertEquals('新しいTODO2', $todolist->getFirstTodo());
    }
    
    public function test_最初に追加したTODOを削除すると件数が減る()
    {
        $todolist = new Todolist();
        $todolist->addTodo('新しいTODO');
        $todolist->addTodo('新しいTODO2');
        $todolist->removeFirstTodo();
        $this->assertEquals(1, $todolist->count());
    }
    
    public function test_最後に追加したTODOを削除できる()
    {
        $todolist = new Todolist();
        $todolist->addTodo('新しいTODO');
        $todolist->addTodo('新しいTODO2');
        $todolist->removeLastTodo();
        $this->assertEquals('新しいTODO', $todolist->getLastTodo());
    }
    
    public function test_追加した全てのTODOを削除できる()
    {
        // @TODO
//        $todolist = new Todolist();
//        $todolist->addTodo('新しいTODO');
//        $todolist->addTodo('新しいTODO2');
//        $todolist->removeAllTodo();
//        $this->assertEquals('新しいTODO', $todolist->getLastTodo());
    }
}

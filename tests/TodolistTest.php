<?php

class TodolistTest extends TestCase
{
    public function setUp()
    {
        $dao = new Dao\File('test.json');
        $dao->removeAllTodo();
        $this->todolist = new Todolist($dao);
    }

    public function test_TODOリストの作成直後はリストは空である()
    {
        $this->assertEquals(0, $this->todolist->count());
    }
    
    /**
     * @dataProvider provide_TODOの登録件数
     */
    public function test_TODOをn件登録したときTODOリストの件数はn件である($n)
    {
        $todolist = $this->todolist;
        for ($i = 0; $i < $n; $i++) {
            $todo = new \Todo('新しいTODO'.$i);
            $todolist->addTodo($todo);
        }
        $this->assertEquals($n, $todolist->count());
    }
    
    public function provide_TODOの登録件数($n)
    {
        return [
            [1],[2],[3]
        ];
    }
    
    /**
     * @dataProvider provide_TODOの登録件数
     */
    public function test_TODOをn件登録したとき最後のTODOの内容は最後に登録したものである($n)
    {
        $todolist = $this->todolist;
        for ($i = 0; $i < $n; $i++) {
            $todo = new \Todo('新しいTODO'.$i);
            $todolist->addTodo($todo);
        }
        $this->assertEquals('新しいTODO'.($i-1), $todolist->getLastTodo()->getSubject());
    }
    
    /**
     * @dataProvider provide_TODOの登録件数
     */
    public function test_TODOをn件登録したとき最初のTODOの内容は最初に登録したものである($n)
    {
        $todolist = $this->todolist;
        for ($i = 0; $i < $n; $i++) {
            $todo = new \Todo('新しいTODO'.$i);
            $todolist->addTodo($todo);
        }
        $this->assertEquals('新しいTODO0', $todolist->getFirstTodo()->getSubject());
    }
    
    public function TODOを2件登録()
    {
        $todo = new \Todo('新しいTODO');
        $this->todolist->addTodo($todo);
        $todo = new \Todo('新しいTODO2');
        $this->todolist->addTodo($todo);
    }
    
    public function test_TODOを2件登録し最初のTODOを削除すると最初のTODOは2件目に登録したものである()
    {
        $todolist = $this->todolist;
        $this->TODOを2件登録();
        $todolist->removeFirstTodo();
        $this->assertEquals('新しいTODO2', $todolist->getFirstTodo()->getSubject());
    }
    
    public function test_最初に追加したTODOを削除すると件数が減る()
    {
        $todolist = $this->todolist;
        $this->TODOを2件登録();
        $todolist->removeFirstTodo();
        $this->assertEquals(1, $todolist->count());
    }
    
    public function test_TODOを2件登録し最後に登録したTODOを削除すると最後のTODOは最初に登録したものである()
    {
        $todolist = $this->todolist;
        $this->TODOを2件登録();
        $todolist->removeLastTodo();
        $this->assertEquals('新しいTODO', $todolist->getLastTodo()->getSubject());
    }
    
    public function test_追加した全てのTODOを削除するとリストは空である()
    {
        $todolist = $this->todolist;
        $this->TODOを2件登録();
        $todolist->removeAllTodo();
        $this->assertEquals(0, $todolist->count());
    }
    
    public function test_最初のTODOと最後のTODOを入れ替える()
    {
        $todolist = $this->todolist;
        $todo = new \Todo('新しいTODO');
        $todolist->addTodo($todo);
        $todo = new \Todo('新しいTODO2');
        $todolist->addTodo($todo);
        $todo = new \Todo('新しいTODO3');
        $todolist->addTodo($todo);
        
        $todolist->swapTodo(0, 2);
        $this->assertEquals('新しいTODO3', $todolist->getFirstTodo()->getSubject());
        $this->assertEquals('新しいTODO', $todolist->getLastTodo()->getSubject());
    }

}

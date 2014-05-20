<?php

namespace Cli;

class Presenter
{
    private $todolist;
    
    public function __construct($todolist) {
        $this->todolist = $todolist;
    }

    public function showAllTodo()
    {
        foreach ($this->todolist as $id => $todo) {
            echo $id . '. ' . $todo->getSubject() . PHP_EOL;
        }
    }
    
    public function showFirstTodo()
    {
        $todo = $this->todolist->getFirstTodo();
        echo $todo->getSubject() . PHP_EOL;
    }
    
    public function showLastTodo()
    {
        $todo = $this->todolist->getLastTodo();
        echo $todo->getSubject() . PHP_EOL;
    }
}

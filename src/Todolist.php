<?php

ini_set('display_errors', "1");

class Todolist
{
    //private $list;
    private $count;
    
    public function count()
    {
        return $this->count;
    }
    
    public function addTodo($todo)
    {
        $this->count++;
        $this->list[] = $todo;
    }
}

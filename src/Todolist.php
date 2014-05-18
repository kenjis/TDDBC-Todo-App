<?php

ini_set('display_errors', "1");

class Todolist
{
    private $list;

    public function count()
    {
        return count($this->list);
    }
    
    public function addTodo($todo)
    {
        $this->list[] = $todo;
    }
    
    public function getLastTodo()
    {
        $list = $this->list;
        return array_pop($list);
    }
    
    public function getFirstTodo()
    {
        $list = $this->list;
        return array_shift($list);
    }
    
    public function getAllTodo()
    {
        return $this->list;
    }
    
    public function removeFirstTodo()
    {
        array_shift($this->list);
    }
    
    public function removeLastTodo()
    {
        array_pop($this->list);
    }
}

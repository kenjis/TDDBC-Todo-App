<?php

class Todolist implements IteratorAggregate
{
    private $dao;
    
    public function __construct(Dao\File $dao) {
        $this->dao = $dao;
    }

    public function count()
    {
        return $this->dao->count();
    }
    
    public function addTodo(Todo $todo)
    {
        $this->dao->addTodo($todo);
    }
    
    public function getLastTodo()
    {
        return $this->dao->getLastTodo();
    }
    
    public function getFirstTodo()
    {
        return $this->dao->getFirstTodo();
    }
        
    public function removeFirstTodo()
    {
        $this->dao->removeFirstTodo();
    }
    
    public function removeLastTodo()
    {
        $this->dao->removeLastTodo();
    }
    
    public function removeAllTodo()
    {
        $this->dao->removeAllTodo();
    }
    
    public function swapTodo($idA, $idB)
    {
        $this->dao->swapTodo($idA, $idB);
    }
    
    public function getIterator() {
        return $this->dao;
    }
}

<?php

namespace Dao;

class File implements \Iterator
{
    private $list = [];
    private $file;
    
    public function __construct($file = null) {
        if ($file === null) {
            $this->file = __DIR__ . '/../../data/todo.json';
        } else {
            $this->file = __DIR__ . '/../../data/' . $file;
        }
        
        $this->loadFile();
    }
    
    public function count()
    {
        return count($this->list);
    }
    
    public function addTodo(\Todo $todo)
    {
        $this->list[] = $todo;
        $this->saveFile();
    }

    public function getLastTodo()
    {
        $id = $this->count() - 1;
        $todo = $this->list[$id];
        $todo->setId($id);
        return $todo;
    }
    
    public function getFirstTodo()
    {
        $todo = $this->list[0];
        $todo->setId(0);
        return $todo;
    }
    
    public function removeFirstTodo()
    {
        array_shift($this->list);
        $this->saveFile();
    }

    public function removeLastTodo()
    {
        array_pop($this->list);
        $this->saveFile();
    }
    
    public function removeAllTodo()
    {
        $this->list = [];
        $this->saveFile();
    }
    
    public function swapTodo($idA, $idB)
    {
        $a = $this->list[$idA];
        $b = $this->list[$idB];
        $this->list[$idA] = $b;
        $this->list[$idB] = $a;
        $this->saveFile();
    }

    private function saveFile()
    {
        foreach ($this->list as $id => $todo) {
            $todo->setId($id);
        }
        $contents = json_encode(
            $this->list,
            JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
        );
        file_put_contents($this->file, $contents, LOCK_EX);
    }
    
    private function loadFile()
    {
        if (file_exists($this->file)) {
            $contents = file_get_contents($this->file);
            $array = json_decode($contents);
            if ($array === null) {
                $array = [];
            }

            $this->list = [];
            foreach ($array as $key => $val) {
                $todo = new \Todo($val->subject);
                $todo->setId($key);
                $this->list[] = $todo;
            }
        }
    }
    
    
    public function rewind()
    {
        reset($this->list);
    }
  
    public function current()
    {
        $var = current($this->list);
        return $var;
    }
  
    public function key()
    {
        $var = key($this->list);
        return $var;
    }
  
    public function next()
    {
        $var = next($this->list);
        return $var;
    }
  
    public function valid()
    {
        $key = key($this->list);
        $var = ($key !== null && $key !== false);
        return $var;
    }
}

<?php

namespace Cli;

class TodoCommand
{
    private $presenter;
    private $parser;
    private $todolist;
    private $command;
    private $args;
    
    public function __construct(
        Presenter $presenter, CommandParser $parser, \Todolist $todolist
    )
    {
        $this->presenter = $presenter;
        $this->parser = $parser;
        $this->todolist = $todolist;
        
        $this->parser->parse();
        $this->command = $this->parser->getCommand();
        $this->args = $this->parser->getArgs();
    }
    
    public function setCommand($command)
    {
        $this->command = $command;
    }

    public function setArgs($args)
    {
        $this->args = $args;
    }

    public function run()
    {
        switch ($this->command) {
            case 'show':
                $this->commandShow();
                break;
            case 'add':
                $this->commandAdd();
                break;
            case 'remove':
                $this->commandRemove();
                break;
            case 'swap':
                $this->commandSwap();
                break;
            default:
                // @TODO
        }
    }
    
    private function commandShow()
    {
        $target = $this->args[0];
        if ($target === 'all') {
            $this->presenter->showAllTodo();
        } elseif ($target === 'first') {
            $this->presenter->showFirstTodo();
        } elseif ($target === 'last') {
            $this->presenter->showLastTodo();
        } else {
            // @TODO
        }
    }
    
    private function commandAdd()
    {
        $subject = $this->args[0];
        $todo = new \Todo($subject);
        $this->todolist->addTodo($todo);
        echo 'Added todo' . PHP_EOL;
    }
    
    private function commandRemove()
    {
        $target = $this->args[0];
        if ($target === 'first') {
            $this->todolist->removeFirstTodo();
            echo 'Removed first todo' . PHP_EOL;
        } elseif ($target === 'last') {
            $this->todolist->removeLastTodo();
            echo 'Removed last todo' . PHP_EOL;
        } elseif ($target === 'all') {
            $this->todolist->removeAllTodo();
            echo 'Removed all todo' . PHP_EOL;
        } else {
            // @TODO
        }
    }
    
    private function commandSwap()
    {
            $idA = $this->args[0];
            $idB = $this->args[1];
            $this->todolist->swapTodo($idA, $idB);
            echo "Swapped todo $idA and $idB" . PHP_EOL;
    }
}

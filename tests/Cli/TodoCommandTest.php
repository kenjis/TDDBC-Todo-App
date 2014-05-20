<?php

namespace Cli;

use Mockery as m;

class TodoCommandTest extends \TestCase
{
    public function setUp()
    {
        $this->parser = new CommandParser([]);
        $this->dao = new \Dao\File('test.json');
        $this->todolist = new \Todolist($this->dao);
    }

    public function test_show_allコマンドを実行するとPresenterのshowAllTodoメソッドが実行される()
    {
        $presenter = m::mock('Cli\Presenter')
            ->shouldReceive('showAllTodo')
            ->andReturn(null)
            ->once()
            ->getMock();
        
        $command = new TodoCommand($presenter, $this->parser, $this->todolist);
        $command->setCommand('show');
        $command->setArgs(['all']);
        $command->run();
    }
    
    public function test_show_firstコマンドを実行するとPresenterのshowFirstTodoメソッドが実行される()
    {
        $presenter = m::mock('Cli\Presenter')
            ->shouldReceive('showFirstTodo')
            ->andReturn(null)
            ->once()
            ->getMock();
        
        $command = new TodoCommand($presenter, $this->parser, $this->todolist);
        $command->setCommand('show');
        $command->setArgs(['first']);
        $command->run();
    }
    
    public function test_show_lastコマンドを実行するとPresenterのshowLastTodoメソッドが実行される()
    {
        $presenter = m::mock('Cli\Presenter')
            ->shouldReceive('showLastTodo')
            ->andReturn(null)
            ->once()
            ->getMock();
        
        $command = new TodoCommand($presenter, $this->parser, $this->todolist);
        $command->setCommand('show');
        $command->setArgs(['last']);
        $command->run();
    }
    
    public function test_addコマンドを実行するとTodolistのaddTodoメソッドが実行される()
    {
        $presenter = m::mock('Cli\Presenter')
            ->shouldReceive('')
            ->andReturn(null)
            ->getMock();
        $todolist = m::mock('Todolist')
            ->shouldReceive('addTodo')
            ->andReturn(null)
            ->once()
            ->getMock();
        
        $command = new TodoCommand($presenter, $this->parser, $todolist);
        $command->setCommand('add');
        $command->setArgs(['新しいTODO']);
        $command->run();
    }
    
    public function test_remove_firstコマンドを実行するとTodolistのremoveFirstTodoメソッドが実行される()
    {
        $presenter = m::mock('Cli\Presenter')
            ->shouldReceive('')
            ->andReturn(null)
            ->getMock();
        $todolist = m::mock('Todolist')
            ->shouldReceive('removeFirstTodo')
            ->andReturn(null)
            ->once()
            ->getMock();
        
        $command = new TodoCommand($presenter, $this->parser, $todolist);
        $command->setCommand('remove');
        $command->setArgs(['first']);
        $command->run();
    }
    
    public function test_remove_lastコマンドを実行するとTodolistのremoveLastTodoメソッドが実行される()
    {
        $presenter = m::mock('Cli\Presenter')
            ->shouldReceive('')
            ->andReturn(null)
            ->getMock();
        $todolist = m::mock('Todolist')
            ->shouldReceive('removeLastTodo')
            ->andReturn(null)
            ->once()
            ->getMock();
        
        $command = new TodoCommand($presenter, $this->parser, $todolist);
        $command->setCommand('remove');
        $command->setArgs(['last']);
        $command->run();
    }

    public function test_remove_allコマンドを実行するとTodolistのremoveAllTodoメソッドが実行される()
    {
        $presenter = m::mock('Cli\Presenter')
            ->shouldReceive('')
            ->andReturn(null)
            ->getMock();
        $todolist = m::mock('Todolist')
            ->shouldReceive('removeAllTodo')
            ->andReturn(null)
            ->once()
            ->getMock();
        
        $command = new TodoCommand($presenter, $this->parser, $todolist);
        $command->setCommand('remove');
        $command->setArgs(['all']);
        $command->run();
    }
    
    public function test_swapコマンドを実行するとTodolistのswapTodoメソッドが実行される()
    {
        $presenter = m::mock('Cli\Presenter')
            ->shouldReceive('')
            ->andReturn(null)
            ->getMock();
        $todolist = m::mock('Todolist')
            ->shouldReceive('swapTodo')
            ->andReturn(null)
            ->once()
            ->getMock();
        
        $command = new TodoCommand($presenter, $this->parser, $todolist);
        $command->setCommand('swap');
        $command->setArgs(['0', '1']);
        $command->run();
    }    
}

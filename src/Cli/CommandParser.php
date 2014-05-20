<?php

namespace Cli;

class CommandParser
{
    private $argv;
    private $command;
    private $args;
    
    public function __construct($argv)
    {
        $this->argv = $argv;
    }
    
    public function parse()
    {
        $argv = $this->argv;
        array_shift($argv);
        $this->command = array_shift($argv);
        $this->args = $argv;
    }
    
    public function getCommand()
    {
        return $this->command;
    }
    
    public function getArgs()
    {
        return $this->args;
    }
}

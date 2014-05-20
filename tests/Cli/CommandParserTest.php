<?php

namespace Cli;

class CommandParserTest extends \TestCase
{
    public function test_渡された引数をコマンドとその引数にパースする()
    {
        $argv = [
            'todo.php',
            'show',
            'all',
        ];
        $parser = new CommandParser($argv);
        $parser->parse();
        
        $this->assertEquals('show', $parser->getCommand());
        $this->assertEquals(['all'], $parser->getArgs());
    }
}

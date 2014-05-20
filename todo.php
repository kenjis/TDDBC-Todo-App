<?php

require __DIR__ . '/bootstrap.php';

//var_dump($argv);

$dao       = new Dao\File();
$todolist  = new Todolist($dao);
$presenter = new Cli\Presenter($todolist);
$parser    = new Cli\CommandParser($argv);
$command   = new Cli\TodoCommand($presenter, $parser, $todolist);
$command->run();

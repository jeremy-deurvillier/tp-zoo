<?php

require_once('./config/autoload.php');

$ben = new Tiger(['name_animal' => 'Ben']);
$lou = new Bear(['name_animal' => 'Lou']);

echo $ben->getName() . PHP_EOL;
echo $ben->wander();
echo $ben->eat('miel');

echo $lou->getName() . PHP_EOL;
echo $lou->swim();
echo $lou->communicate();

?>

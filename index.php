<?php

require_once('./config/autoload.php');

$terre = new LandPark(['name_enclosure' => 'terre']);
$ben = new Tiger(['name_animal' => 'Ben']);
$lou = new Bear(['name_animal' => 'Lou']);
$jeje = new Employee(['name_employee' => 'Jéjé']);

$terre->add($ben);
echo $terre->counter() . PHP_EOL;
$terre->add($lou);
echo $terre->counter() . PHP_EOL;
$terre->remove($lou);
echo $terre->counter() . PHP_EOL;

echo $ben->getName() . PHP_EOL;
echo $ben->wander();
echo $ben->eat('miel');

echo $lou->getName() . PHP_EOL;
echo $lou->swim();
echo $lou->communicate();

echo $jeje->getName() . PHP_EOL;

?>

<?php

require_once('traits/fin.php');

class Fish extends Animal
{
    use fin;

    public function __construct(array $datas)
    {
        parent::hydrate($datas);
    }
}

?>

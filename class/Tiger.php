<?php

require_once('traits/pate.php');

class Tiger extends Animal
{
    use pate;

    public function __construct(array $datas)
    {
        parent::hydrate($datas);
    }

}

?>

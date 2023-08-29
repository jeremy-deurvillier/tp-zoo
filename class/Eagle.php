<?php

require_once('traits/wing.php');
require_once('traits/foot.php');

class Bear extends Animal
{
    use wing, foot;

    public function __construct(array $datas)
    {
        parent::hydrate($datas);
    }
}

?>

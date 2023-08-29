<?php

require_once('traits/foot.php');

class Bear extends Animal
{
    use foot;

    public function __construct(array $datas)
    {
        parent::hydrate($datas);
    }
}

?>

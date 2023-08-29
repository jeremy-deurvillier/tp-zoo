<?php

require_once('traits/foot.php');

class Tiger extends Animal
{
    use foot;

    public function __construct(array $datas)
    {
        parent::hydrate($datas);
    }

}

?>

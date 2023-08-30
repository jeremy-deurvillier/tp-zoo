<?php

require_once('./config/db-connect.php');

function getZooDatas()
{
    $repository = new ZooRepository(dbConnect());
    $datas = $repository->find(1);
}

?>

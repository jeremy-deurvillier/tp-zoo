<?php

require_once('./config/db-connect.php');

function getZooDatas():Zoo|null
{
    $repository = new ZooRepository(dbConnect());
    $zoo = $repository->find(1);

    return $zoo;
}

function changeZooName():array
{
    if (isset($_POST['zooNameChange'])) {
        $type = 'danger';
        $message = '[Erreur] Une erreur s\'est produite.';

        if (isset($_POST['name'])) {
            if (!empty($_POST['name'])) {
                $repository = new ZooRepository(dbConnect());
                $isChanged = $repository->update(1);

                if ($isChanged) {
                    $type = 'success';
                    $message = 'Le nom du zoo à bien été modifié.';
                }

                return ['type' => $type, 'message' => $message];

            } else {
                $message = 'Tu dois entrer un nom valide !';
                return ['type' => $type, 'message' => $message];
            }
        } else {
            $message = 'Ce formulaire ne semble pas exister !';
            return ['type' => $type, 'message' => $message];
        }
    }

    return [];
}

?>

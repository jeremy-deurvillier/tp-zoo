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
        $message = '[Zoo::update] Une erreur s\'est produite.';

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

function getAllEmployees():array
{
    $repository = new EmployeeRepository(dbConnect());

    return $repository->findAll();
}

function addEmployee():array
{
    if (isset($_POST['addEmployee'])) {
        $type = 'danger';
        $message = '[Employee::add] Une erreur s\'est produite.';

        $nameIsValid = isset($_POST['name']) && !empty($_POST['name']);
        $dobIsValid = isset($_POST['dob']) && !empty($_POST['dob']);
        $sexIsValid = isset($_POST['sex']) && !empty($_POST['sex']);

        if ($nameIsValid && $dobIsValid && $sexIsValid) {
            $zoo = getZooDatas();
            $repository = new EmployeeRepository(dbConnect());
            $isAdded = $repository->add($zoo);

            if ($isAdded) {
                $type = 'success';
                $message = 'L\'employé a bien été ajouté.';
            }

            return ['type' => $type, 'message' => $message];
        } else {
            $message = 'Le formulaire contient des erreurs.';
            return ['type' => $type, 'message' => $message];
        }
    }

    return [];
}

function getEmployee()
{
    if (isset($_GET['update']) && !empty($_GET['update'])) {
        if ($_GET['update'] === 'user') {
            $idIsValid = isset($_GET['id']) && !empty($_GET['id']);

            if ($idIsValid) {
                $repository = new EmployeeRepository(dbConnect());

                return $repository->find(htmlspecialchars($_GET['id']));
            }
        }
    }
}

function updateEmployee():array
{
    if (isset($_POST['updateEmployee'])) {
        $type = 'danger';
        $message = '[Employee::update] Une erreur s\'est produite.';

        $idIsValid = isset($_POST['id']) && !empty($_POST['id']);
        $nameIsValid = isset($_POST['name']) && !empty($_POST['name']);
        $dobIsValid = isset($_POST['dob']) && !empty($_POST['dob']);
        $sexIsValid = isset($_POST['sex']) && !empty($_POST['sex']);

        if ($idIsValid && $nameIsValid && $dobIsValid && $sexIsValid) {
            $repository = new EmployeeRepository(dbConnect());
            $isUpdate = $repository->update();

            if ($isUpdate) {
                $type = 'success';
                $message = 'L\'employé a bien été  mis à jour.';
            }

            return ['type' => $type, 'message' => $message];
        } else {
            $message = 'Le formulaire contient des erreurs.';
            return ['type' => $type, 'message' => $message];
        }
    }

    return [];
}

function deleteEmployee():array
{
    if (isset($_GET['delete']) && !empty($_GET['delete'])) {
        if ($_GET['delete'] === 'user') {
            $idIsValid = isset($_GET['id']) && !empty($_GET['id']);

            if ($idIsValid) {
                $repository = new EmployeeRepository(dbConnect());

                $isDelete = $repository->delete(htmlspecialchars($_GET['id']));

                if ($isDelete) {
                    $type = 'success';
                    $message = 'L\'employé a bien été renvoyer.';
                    return ['type' => $type, 'message' => $message];
                }

                $type = 'danger';
                $message = '[Employee::delete] Une erreur s\'est produite.';
                return ['type' => $type, 'message' => $message];
            } else {
                $type = 'danger';
                $message = '[Employee::delete] Aucun employé avec cet ID.';
                return ['type' => $type, 'message' => $message];
            }
        }
    }

    return [];
}

?>

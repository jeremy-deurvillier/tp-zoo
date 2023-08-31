<?php
$allEmployees = getAllEmployees();
?>
<div id="employeesList" class="uk-modal-full" uk-modal>
    <div class="uk-modal-dialog uk-modal-body" uk-height-viewport="">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h2 class="uk-modal-title">Liste des employés</h2>
        <div>
            <?php foreach($allEmployees as $employee) { ?>
                <!-- Employee Card -->
                <div class="uk-card uk-card-default uk-card-body uk-width-1-2@s uk-width-1-3@m uk-width-1-4@l">
                    <h3 class="uk-card-title uk-text-center"><?= $employee->getName() ?></h3>
                    <p>Né le <?= $employee->getDateOfBirth() ?></p>
                    <p class="uk-text-center">
                        <a href="/zoo.php?update=user&id=<?= $employee->getId() ?>" class="uk-button uk-button-default">Modifier</a>
                        <a href="#" class="uk-button uk-button-danger" uk-toggle="target: #delete-employee-<?= $employee->getId() ?>">Renvoyer</a>
                    </p>
                </div>
                <!-- Delete Employee Modal -->
                <div id="delete-employee-<?= $employee->getId() ?>" uk-modal>
                    <div class="uk-modal-dialog uk-modal-body">
                        <h2 class="uk-modal-title">Renvoyer <?= $employee->getName() ?> ?</h2>
                        <p>Vous allez renvoyer un employé. Confirmer le renvoi ?</p>
                        <p class="uk-text-right">
                            <a href="/zoo.php?delete=user&id=<?= $employee->getId() ?>" class="uk-button uk-button-danger">Renvoyer</a>
                            <button class="uk-button uk-button-default" type="button" uk-toggle="target: #employeesList">Annuler</button>
                        </p>
                    </div>
                </div>
            <?php } ?>
            <?php if (count($allEmployees) === 0) { ?>
                <p class="uk-text-center uk-text-bold">Aucun employé.</p>
                <p class="uk-text-center">
                    <a href="#" class="uk-button uk-button-primary" uk-toggle="target: #addEmployee">Ajouter un employé</a>
                </p>
            <?php } ?>
        </div>
    </div>
</div>

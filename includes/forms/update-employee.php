<?php
$employee = getEmployee();

if ($employee !== null) {
    $FIsChecked = ($employee->getSex() === 'f')?'checked':'';
    $MIsChecked = ($employee->getSex() === 'm')?'checked':'';
    $OIsChecked = ($employee->getSex() === 'o')?'checked':'';
?>
<p class="uk-container">
    <a href="#" class="uk-button uk-button-text" uk-toggle="target: #employeesList">
        <span uk-icon="icon: chevron-left"></span>
        Retour à la liste
    </a>
</p>

<h2 class="uk-modal-title uk-text-center">Mettre à jour un employé</h2>
<form action="/zoo.php" method="post" class="uk-flex uk-flex-column uk-flex-center uk-flex-middle">
    <input type="hidden" name="id" value="<?= $employee->getId() ?>">
    <div class="uk-margin-auto">
        <div class="uk-margin">
            <div class="uk-inline">
                <span class="uk-form-icon" uk-icon="icon: user"></span>
                <input class="uk-input" type="text" name="name" value="<?= $employee->getName() ?>" aria-label="addName">
            </div>
        </div>
        <div class="uk-margin">
            <div class="uk-inline">
                <span class="uk-form-icon" uk-icon="icon: calendar"></span>
                <input class="uk-input" type="text" name="dob" value="<?= $employee->getDateOfBirth() ?>" aria-label="addDob">
            </div>
        </div>
        <div class="uk-margin">
            <div class="uk-inline">
                <label><input class="uk-radio" type="radio" name="sex" value="f" aria-label="addSex" <?= $FIsChecked ?>> Femme</label>
                <label><input class="uk-radio" type="radio" name="sex" value="m" aria-label="addSex" <?= $MIsChecked ?>> Homme</label>
                <label><input class="uk-radio" type="radio" name="sex" value="o" aria-label="addSex" <?= $OIsChecked ?>> Autre</label>
            </div>
        </div>
        <div class="uk-margin">
            <div class="uk-width-1-1">
                <input class="uk-button uk-button-primary uk-width-1-1" type="submit" name="updateEmployee" value="Mettre à jour">
            </div>
        </div>
    </div>
</form>
<?php } else { ?>
<div class="uk-margin">
    <p class="uk-text-center uk-text-bold uk-text-warning">Aucun employé trouvé avec cet ID.</p>
</div>
<?php } ?>

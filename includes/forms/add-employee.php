
<div id="addEmployee" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <button class="uk-modal-close-default" type="button" uk-close></button>
        <h2 class="uk-modal-title">Ajouter un employé</h2>
        <form action="/zoo.php" method="post" class="uk-flex uk-flex-column uk-flex-center uk-flex-middle">
            <div class="uk-margin-auto">
                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: user"></span>
                        <input class="uk-input" type="text" name="name" aria-label="addName">
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: calendar"></span>
                        <input class="uk-input" type="text" name="dob" aria-label="addDob">
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-inline">
                        <label><input class="uk-radio" type="radio" name="sex" value="m" aria-label="addSex"> Homme</label>
                        <label><input class="uk-radio" type="radio" name="sex" value="f" aria-label="addSex"> Femme</label>
                        <label><input class="uk-radio" type="radio" name="sex" value="o" aria-label="addSex" checked> Autre</label>
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-width-1-1">
                        <input class="uk-button uk-button-primary uk-width-1-1" type="submit" name="addEmployee" value="Ajouter">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

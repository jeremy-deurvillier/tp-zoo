
<div id="changeName" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title">Changer le nom</h2>
        <form action="/zoo.php" method="post" class="uk-flex uk-flex-column uk-flex-center uk-flex-middle">
            <div class="uk-margin-auto">
                <div class="uk-margin">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: pencil"></span>
                        <input class="uk-input" type="text" name="name" aria-label="changeZooName">
                    </div>
                </div>
                <div class="uk-margin">
                    <div class="uk-width-1-1">
                        <input class="uk-button uk-button-primary uk-width-1-1" type="submit" value="Changer le nom">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

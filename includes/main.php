<div id="enclosuresAvailables" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar">
        <ul class="uk-nav uk-nav-default">
            <li class="uk-nav-header">Terrestre</li>
            <li><a href="/zoo.php?enclosure=land"><span class="uk-margin-small-right" uk-icon="icon: plus"></span>Ajouter</a></li>
            <li class="uk-nav-divider"></li>

            <li class="uk-nav-header">Aquarium</li>
            <li><a href="/zoo.php?enclosure=water"><span class="uk-margin-small-right" uk-icon="icon: plus"></span>Ajouter</a></li>
            <li class="uk-nav-divider"></li>

            <li class="uk-nav-header">Volière</li>
            <li><a href="/zoo.php?enclosure=aviary"><span class="uk-margin-small-right" uk-icon="icon: plus"></span>Ajouter</a></li>
            <li class="uk-nav-divider"></li>

        </ul>
    </div>
</div>

<?php
$enclosures = getAllEnclosures();
?>

<section id="zoo">
<?php
foreach($enclosures as $enclosure) {
    if ($enclosure->getCleanness() === 'bon') $cleanness = 'clean';
    if ($enclosure->getCleanness() === 'correct') $cleanness = 'good';
    if ($enclosure->getCleanness() === 'mauvais') $cleanness = 'bad';
?>
    <a href="#" class="parks <?= $enclosure->getType() ?> <?= $cleanness ?>" uk-toggle="target: #park-<?= $enclosure->getId() ?>">
        <p class="uk-text-center"><?= $enclosure->getName() ?></p>
    </a>
    <!-- Park Modal -->
    <div id="park-<?= $enclosure->getId() ?>" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <h2 class="uk-modal-title"><?= $enclosure->getName() ?></h2>
            <p>Type : <?= $enclosure->getType() ?></p>
            <p>État : <?= $enclosure->getCleanness() ?></p>
            <p>
                Nombre d'animaux : <?= $enclosure->counter() ?>
                (<a href="#plus-park-<?= $enclosure->getId() ?>" class="uk-button uk-button-text uk-text-primary" uk-toggle>Voir plus</a>)
            </p>
            <p class="uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Fermer</button>
            </p>
        </div>
    </div>
    <div id="plus-park-<?= $enclosure->getId() ?>" uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <h2 class="uk-modal-title">Animaux (<?= $enclosure->getName() ?>)</h2>
            <p class="uk-text-right">
            <button class="uk-button uk-button-default" type="button" uk-toggle="target: #park-<?= $enclosure->getId() ?>">Retour</button>
            </p>
        </div>
    </div>
<?php } ?>
</section>

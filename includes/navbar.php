<?php
$zoo = getZooDatas();
?>
<nav class="uk-navbar-container uk-margin uk-margin-remove-bottom">
    <div class="uk-container">
        <div uk-navbar>

            <div class="uk-navbar-left">
                <a href="#" class="uk-navbar-toggle" uk-navbar-toggle-icon uk-toggle="target: #navbar"></a>
            </div>

            <div class="uk-navbar-center">
                <a href="/zoo.php" class="uk-navbar-item uk-logo"><?= $zoo->getName() ?></a>
            </div>
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav">
                    <li><a href="#" class="uk-navbar-toggle" uk-toggle="target: #contact">Contact</a></li>
                    <li><a href="#" class="uk-navbar-toggle" uk-toggle="target: #about">A propos</a></li>
                </ul>
            </div>
        
        </div>
    </div>
</nav>

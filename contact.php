<?php
session_start();
require_once("./data/config.php");
require("./elements/header.php");
date_default_timezone_set('Indian/Antananarivo');
$heure = (int)($_GET['heure'] ?? date('G'));
$jour = (int)($_GET['jour'] ?? date('N') - 1);
$creneaux = CRENEAUX[$jour];
$ouvert = in_creneaux($heure, $creneaux);
$color = $ouvert ? 'green' : 'red'; //ternaire => si ouvert true {green} si non {red}

?>
<div class="row">
    <div class="col-md-8">
        <h2 class="mt-5">Nos Contacte</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique eos vitae officiis deserunt. Et autem at asperiores optio temporibus animi est sapiente, similique hic alias commodi distinctio nesciunt laborum ad.</p>
        <h2>Debug</h2>
        <pre>
            <?php var_dump($_SESSION); ?>
        </pre>
    </div>
    <div class="col-md-4">
        <h2 class="mt-5">Horaire d'ouvertures</h2>
        <?php if ($ouvert) : ?>
            <div class="alert alert-success">
                Le magasin est ouvert
            </div>
        <?php else : ?>
            <div class="alert alert-danger">
                Le magasin est fermer
            </div>
        <?php endif ?>
        <form action="" method="GET">
            <div class="from-group">
                <?= select('jour', $jour, JOURS) ?>
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="heure" value="<?= $heure ?>">
            </div>
            <button class="btn btn-primary" type="submit">Voire si le mangasin est ouvert</button>
        </form>
        <ul>
            <?php foreach (JOURS as $k => $jour) : ?>
                <li <?php if ($k + 1 === (int)date('N')) : ?> style="color:<?= $color ?>" <?php endif ?>>
                    <strong><?= $jour ?></strong>:
                    <?= creneaux_html(CRENEAUX[$k]) ?>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</div>
<?php require("./elements/footer.php"); ?>
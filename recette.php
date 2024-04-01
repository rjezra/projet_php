<?php
$parfums = [
    'Fraise' => 4,
    'Chocolat' => 5,
    'Vanille' => 3
];
$cornets = [
    'Pot' => 2,
    'Cornet' => 3
];
$suplements = [
    'Pepites de chocolat' => 1,
    "Chantilly" => 0.5
];
$ingredients = [];
$total = 0;

foreach (['parfum', 'suplement', 'cornet'] as $name) {
    if (isset($_GET[$name])) {
        $liste = $name . 's';
        $choix = $_GET[$name];
        if (is_array($choix)) {
            foreach ($choix as $value) {
                if (isset($$liste[$value])) {
                    $ingredients[] = $value;
                    $total += $$liste[$value];
                }
            }
        } else {
            if (isset($$liste[$choix])) {
                $ingredients[] = $choix;
                $total += $$liste[$choix];
            }
        }
    }
}

/*
if (isset($_GET['parfum'])) {
    foreach ($_GET['parfum'] as $parfum) {
        if (isset($parfums[$parfum])) {
            $ingredients[] = $parfum;
            $total += $parfunms[$parfum];
        }
    }
}
if (isset($_GET['suplement'])) {
    foreach ($_GET['suplement'] as $suplement) {
        if (isset($suplements[$suplement])) {
            $ingredients[] = $suplement;
            $total += $suplements[$suplement];
        }
    }
}

if (isset($_GET['cornet'])) {
    $cornet = $_GET['cornet'];
    if (isset($cornets[$cornet])) {
        $ingredients[] = $cornet;
        $total += $cornets[$cornet];
    }
}
*/
require './elements/header.php';

?>
<h1>Composer votre glasse</h1>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Votre Glace</h5>
                <ul>
                    <?php foreach ($ingredients as $ingredient) : ?>
                        <li><?= $ingredient ?></li>
                    <?php endforeach ?>
                </ul>
                <p>
                    <strong>Prix: </strong> <?= $total ?> $
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <form action="" method="GET">
            <h2>Choisisser votre parfum</h2>
            <?php foreach ($parfums as $parfum => $prix) : ?>
                <div class="checkbox">
                    <label>
                        <?= checkbox('parfum', $parfum, $_GET) ?>
                        <?= $parfum ?> - <?= $prix ?> $
                    </label>
                </div>
            <?php endforeach ?>
            <h2>Choisisser votre cornet</h2>
            <?php foreach ($cornets as $cornet => $prix) : ?>
                <div class="checkbox">
                    <label>
                        <?= radio('cornet', $cornet, $_GET) ?>
                        <?= $cornet ?> - <?= $prix ?> $
                    </label>
                </div>
            <?php endforeach ?>
            <h2>Choisisser votre suplement</h2>
            <?php foreach ($suplements as $suplement => $prix) : ?>
                <div class="checkbox">
                    <label>
                        <?= checkbox('suplement', $suplement, $_GET) ?>
                        <?= $suplement ?> - <?= $prix ?> $
                    </label>
                </div>
            <?php endforeach ?>
            <button type="submit" class="btn btn-primary">Composer ma glace</button>
        </form>
    </div>
</div>

<?php require './elements/footer.php'; ?>
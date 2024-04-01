<?php
require("./elements/header.php");
$lignes = file("./data/data.csv");
foreach ($lignes as $k => $ligne) {
    //$lignes[$k] = explode("\t", trim($ligne)); // recuperation fichier tsv
    $lignes[$k] = str_getcsv(trim($ligne), "; \n\r\t\v\x0B,");
}
?>
<h1>Menu</h1>
<?php foreach ($lignes as $ligne) : ?>
    <?php if (count($ligne) === 1) : ?>
        <h2><?= $ligne[0] ?></h2>

    <?php else : ?>
        <div class="row">
            <div class="col-sm-8">
                <p>
                    <strong><?= $ligne[0] ?></strong>
                    <?= $ligne[1] ?>
                </p>
            </div>
            <div class="col-sm-4">
                <?php
                // Vérifie si la troisième colonne est numérique avant de la formater
                if (is_numeric($ligne[2])) {
                    echo '<strong>' . number_format($ligne[2], 2, ',', ' ') . ' Ar</strong>';
                } else {
                    echo '<strong>' . htmlspecialchars($ligne[2]) . '</strong>'; // Affiche la donnée telle quelle si elle n'est pas numérique
                }
                ?>
            </div>
        </div>
    <?php endif ?>
<?php endforeach ?>


<?php require './elements/footer.php';  ?>
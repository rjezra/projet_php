<?php
$aDeviner = 150;
$erreur = null;
$succes = null;
$value = null;
if (isset($_GET['chiffre'])) {
    if ($_GET['chiffre'] > $aDeviner) {
        $erreur = "Votre chiffre est trop grand";
    } elseif ($_GET['chiffre'] < $aDeviner) {
        $erreur = " votre chiffre est trop petit";
    } else {
        $succes = " Bravo! Vous avez devine le chiffre <strong> $aDeviner</strong> ";
    }
    $value = (int)$_GET['chiffre'];
}
require './elements/header.php';
?>
<?php if ($erreur) : ?>
    <div class="alert alert-danger">
        <?= $erreur ?>
    </div>
<?php elseif ($succes) : ?>
    <div class="alert alert-success">
        <?= $succes ?>
    </div>
<?php endif ?>
<form action="./jeux.php" method="GET">
    <div class="form-group">
        <input type="number" class="form-control" name="chiffre" id="" placeholder="entre 0 et 1000" value="<?= $value; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Deviner</button>

</form>


<?php require './elements/footer.php'; ?>
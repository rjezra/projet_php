<?php
require './elements/header.php';
$ages = null;
if (!empty($_POST['birthday'])) {
    setcookie('birthday', $_POST['birthday']);
    $_COOKIE['birthday'] = $_POST['birthday'];
}
if (!empty($_COOKIE['birthday'])) {
    $birthday = $_COOKIE['birthday'];
    $ages = date('Y') - $birthday;
}

?>
<?php if ($ages >= 18) : ?>
    <h1>Du contenu reserver aux adultes</h1>
<?php elseif ($ages != null) : ?>
    <div class="alert alert-danger">Vous n'avez pas l'age requis pous voir le contenu</div>
<?php else : ?>
    <form action="" method="POST">
        <div class="form-group">
            <label for="birthday" id="">Selecion reserver pour les adultes, entre votre annee de naissance</label>
            <select name="birthday" id="birthday" class="form-control">
                <?php for ($i = date('Y') - 1; $i > 1900; $i--) : ?>
                    <option value="<?= $i; ?>"> <?= $i; ?> </option>
                <?php endfor ?>
            </select>
        </div>
        <button class="btn btn-primary">Valider</button>
    </form>
<?php endif ?>
<?php require './elements/footer.php' ?>
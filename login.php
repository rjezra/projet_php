<?php
require './elements/header.php';
$erreur = null;
if (!empty($_POST['username']) && !empty($_POST['motdepasse'])) {
    if ($_POST['username'] === 'Rakoto' && $_POST['motdepasse'] === 'admin') {
        session_start();
        $_SESSION['connecte'] = 1;
        header('Location: ./dashboard.php');
    } else {
        $erreur = "Identifiants incorecte";
    }
}
require_once './functions/auth.php';
if (est_connecte()) {
    header('Location: ./dashboard.php');
    exit();
}

?>
<?php if ($erreur) : ?>
    <div class="alert alert-danger">
        <?= $erreur ?>
    </div>
<?php endif ?>
<form action="" method="post">
    <div class="form-group">
        <input type="text" class="form-control" name="username" id="" placeholder="Nom d'ulilisateur">
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="motdepasse" id="" placeholder="Entre votre mot de passe">
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>
<?php require './elements/footer.php' ?>
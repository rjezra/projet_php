<?php
require './elements/header.php';
if (!empty($_GET['action']) && $_GET['action'] === 'deconnecter') {
    unset($_COOKIE['utilisateur']);
    setcookie('utilisateur', '', time() - 10);
}
$nom = null;
if (!empty($_COOKIE['utilisateur'])) {
    $nom = $_COOKIE['utilisateur'];
}
if (!empty($_POST['nom'])) {
    setcookie('utilisateur', $_POST['nom']);
    $nom = $_POST['nom'];
}
?>
<?php if ($nom) : ?>
    <h1>Bonjour <?= htmlentities($nom)  ?></h1>
    <a href="profil.php?action=deconnecter">Se deconecter</a>
<?php else : ?>
    <form action="" method="POST">
        <div class="form-group">
            <input type="text" class="form-control" name="nom" id="" placeholder="Entre votre nom">
        </div>
        <button class="btn btn-primary">Se connecter</button>
    </form>
<?php endif ?>
<?php require './elements/footer.php' ?>
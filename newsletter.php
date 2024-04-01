<?php
require './elements/header.php';
$error = null;
$email = null;
$sucess = null;
if (!empty($_POST['email'])) {
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = "./emails/" . date('Y-m-d') . ".txt";
        file_put_contents($file, $email . PHP_EOL, FILE_APPEND);
        $sucess = "Votre email a bien ete enregistre";
        $email = null;
    } else {
        $error = "Email invalide";
    }
}
?>
<h1>S'incrire a la newsletter</h1>
<?php if ($sucess) : ?>
    <div class="alert alert-success">
        <?= $sucess ?>
    </div>
<?php endif ?>
<?php if ($error) : ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php endif ?>

<form action="" method="POST" class="form-inline">
    <div class="form-goupe">
        <input type="text" name="email" placeholder="Entrez votre mail" required class="form-control" value="<?= htmlentities($email) ?>">
    </div>
    <button type="submit" class="btn btn-primary">Envoyer votre email</button>

</form>

<?php require './elements/footer.php'; ?>
<?php
require_once './functions/auth.php';
require './elements/header.php';
require_once './functions/compteur.php';

forcer_utilisateur_connecte();


$annee = (int)date('Y');
$mois = [
    '01' => 'Javier',
    '02' => 'Fevrier',
    '03' => 'Mars',
    '04' => 'Avril',
    '05' => 'Mai',
    '06' => 'Juin',
    '07' => 'Juillet',
    '08' => 'Aout',
    '09' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Decembre'
];
$annee_selection = empty($_GET['annee']) ? null : (int)$_GET['annee'];
$mois_selection = empty($_GET['mois']) ? null : (int)$_GET['mois'];
if ($annee_selection && $mois_selection) {
    $total =  nombre_vue_mois($annee_selection, $mois_selection);
    $detail = nombre_vue_detail_mois($annee_selection, $mois_selection);
} else {
    $total = nombre_vues();
}
?>
<div class="row">
    <div class="col-md-4">
        <div class="list-group">
            <?php for ($i = 0; $i < 5; $i++) : ?>
                <a class="list-group-item <?= ($annee - $i) === $annee_selection ? 'active' : '' ?>" href="dashboard.php?annee=<?= $annee - $i; ?>"><?= $annee - $i; ?></a>
                <?php if (($annee - $i) === $annee_selection) : ?>
                    <div class="list-group">
                        <?php foreach ($mois as $numero => $moi) : ?>
                            <a href="dashboard.php?annee=<?= $annee - $i; ?>&mois=<?= $numero ?>" class="list-group-item <?= $numero == $mois_selection ? 'active' : '' ?>">
                                <?= $moi ?>
                            </a>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
            <?php endfor ?>
        </div>

    </div>
    <div class="col-md-8">
        <div class="card mb-4">
            <div class="card-body">
                <strong style="font-size:3em"><?= $total; ?></strong><br />
                Visite<?= $total > 1 ? 's' : '' ?>
            </div>
        </div>
        <?php if (isset($detail)) : ?>
            <h2>Details de visite pour le mois</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Jour</th>
                        <th>Mois</th>
                        <th>Annee</th>
                        <th>Nombre de visite</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detail as $ligne) : ?>
                        <tr>
                            <td><?= $ligne["jour"] ?></td>
                            <td><?= $ligne["mois"] ?></td>
                            <td><?= $ligne["annee"] ?></td>
                            <td><?= $ligne["visite"] ?> visite<?= $ligne['visite'] > 1 ? 's' : '' ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php endif ?>
    </div>
</div>
<?php require './elements/footer.php'; ?>
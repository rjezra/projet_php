</div>
</main>
<div class="row">
    <div class="col-md-4">
        <?php
        require_once './functions/compteur.php';
        ajouter_vue();
        $vue = nombre_vues();
        ?>
        <p>Il y a <strong><i><?= $vue ?></i></strong> visite<?php if ($vue > 1) : ?>s <?php endif ?> sur le site</p>
    </div>
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <h5>Navigation</h5>
        <ul class="list-unstyled text-small">
            <?= nav_menu('') ?>
        </ul>
    </div>
</div>
<footer class="footer mt-auto py-3 bg-body-tertiary">
    <div class="container">
        <span class="text-body-secondary">Place sticky footer content here.</span>
    </div>
</footer>
<script src="./assets/js/bootstrap.min.js"></script>

</body>

</html>
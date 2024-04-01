<?php
if (!function_exists('nav_item')) {
    function nav_item(string $lien, string $titre, string $linkClasse)
    {
        $classe = "nav-link";
        if ($_SERVER['SCRIPT_NAME'] === $lien) {
            $classe .= ' active';
        }
        return <<<HTML
     <li class=$linkClasse>
        <a class="$classe" aria-current="page" href="$lien ">$titre</a>
    </li>
HTML;
    }
}
?>
<?= nav_item('/index.php', 'Home', $class) ?>
<?= nav_item('/contact.php', 'Contact', $class) ?>
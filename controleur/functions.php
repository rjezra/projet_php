<?php
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

function nav_menu(string $linkClasse): string
{
    return
        nav_item('/index.php', 'Home', $linkClasse) .
        nav_item('/contact.php', 'Contact', $linkClasse) .
        nav_item('/recette.php', 'Recette', $linkClasse);
}

function checkbox(string $name, string $value, array $data): string
{
    $attributes = '';
    if (isset($data[$name]) && in_array($value, $data[$name])) {
        $attributes .= 'checked';
    }
    return <<<HTML
    <input type="checkbox" name="{$name}[]" id="" value="$value" $attributes >
HTML;
}
function radio(string $name, string $value, array $data): string
{
    $attributes = '';
    if (isset($data[$name]) && $value === $data[$name]) {
        $attributes .= 'checked';
    }
    return <<<HTML
    <input type="radio" name="{$name}" id="" value="$value" $attributes >
HTML;
}
function select(string $name, $value, array $options): string
{
    $html_options = [];
    foreach ($options as $k => $option) {
        $attributes = $k == $value ? 'selected' : '';
        $html_options[] = "<option value='$k'  $attributes>$option</option>";
    }
    return "<select class='form-control' name='$name'>" . implode($html_options) . "</select>";
}

function creneaux_html(array $creneaux): string
{
    if (empty($creneaux)) {
        return 'Fermer';
    }
    $phrases = [];
    foreach ($creneaux as $creneau) {
        $phrases[] = "<strong>{$creneau[0]}h</strong> a <strong>{$creneau[1]}h</strong>";
    }
    return 'Ouvert de ' . implode(' et ', $phrases);
}
function in_creneaux(int $heure, array $creneaux): bool
{
    foreach ($creneaux as $creneau) {
        $debut = $creneau[0];
        $fin = $creneau[1];
        if ($heure >= $debut && $heure < $fin) {
            return true;
        }
    }
    return false;
}

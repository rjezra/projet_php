<?php
function ajouter_vue(): void
{
    $fichier = './data/compteur';
    $fichier_journalier = $fichier . '-' . date('Y-m-d');
    incrementation_compteur($fichier);
    incrementation_compteur($fichier_journalier);
}
function incrementation_compteur(string $fichier): void
{
    $compteur = '1';
    if (file_exists($fichier)) {
        $compteur = (int)file_get_contents($fichier);
        $compteur++;
    }
    file_put_contents($fichier, $compteur);
}
function nombre_vues(): string
{
    $fichier = './data/compteur';
    return file_get_contents($fichier);
}

function nombre_vue_mois(int $annee, int $mois): int
{
    $mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
    $fichier = './data/compteur-' . $annee . '-' . $mois . '-' . '*';
    $fichiers = glob($fichier);
    $total = 0;
    foreach ($fichiers as $fichier) {
        $total += (int)file_get_contents($fichier);
    }
    return $total;
}

function nombre_vue_detail_mois(int $annee, int $mois): array
{
    $mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
    $fichier = './data/compteur-' . $annee . '-' . $mois . '-' . '*';
    $fichiers = glob($fichier);
    $visite = [];
    foreach ($fichiers as $fichier) {
        $parties = explode('-', basename($fichier));
        $visite[] = [
            'annee' => $parties[1],
            'mois' => $parties[2],
            'jour' => $parties[3],
            'visite' => file_get_contents($fichier)
        ];
    }
    return $visite;
}

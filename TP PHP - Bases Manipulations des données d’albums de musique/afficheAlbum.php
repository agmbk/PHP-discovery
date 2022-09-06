<?php

require_once "duree.php";

// $disque = "1/1" ou "1/2" ou ...
// $piste = "1/9", "2/9",...
// Retourne une chaîne de caractères :
//  - s'il n'y a qu'un disque, on ne retourne que le numéro de la piste : "01"
//  - sinon le numéro du disque et le numéro de piste : "1 - 01"
// On met toujours le numéro de piste sur 2 chiffres avec un zéro devant si
// besoin (utiliser sprintf)
function ordre(string $disque, string $piste): string {
    // TODO : à compléter
    return "";
}

// On affiche :
//  - numéro de disque -- piste (voir la fonction ordre)
//  - le titre du morceau
//  - l'artiste (s'il existe)
//  - la durée du morceau
// Exemples :
//  02 - One Monkey (Francine Reed) - 03:40
//  1 - 10 - Enfermé dans les cabinets - 03:47
function afficheMorceau(array $m): void {
    // TODO : à compléter
}

// Affiche tout l'album global $monAlbum :
//   - entête avec les informations générales 
//   - liste des morceaux (voir fonction afficheMorceau)
function affiche(): void {
    // TODO : à compléter
}

// La variable globale $monAlbum est supposée définie dans un fichier PHP à inclure, dont
// le nom est passé en argument sur la ligne de commande (tableau $argv).
// TODO : à compléter


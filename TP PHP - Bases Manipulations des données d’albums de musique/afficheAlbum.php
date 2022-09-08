<?php

if (count($argv) != 2) return exit(sprintf("$ %s data/album_name.php\n", basename($_SERVER['SCRIPT_FILENAME'])));
if (!is_file($argv[1])) return exit('Not a file : ' . $argv[1] . "\n");

require_once "duree.php";
include $argv[1];

/**
 * $disque = "1/1" ou "1/2" ou ...
 * $piste = "1/9", "2/9",...
 * Retourne une chaîne de caractères :
 *  - s'il n'y a qu'un disque, on ne retourne que le numéro de la piste : "01"
 *  - sinon le numéro du disque et le numéro de piste : "1 - 01"
 *
 * On met toujours le numéro de piste sur 2 chiffres avec un zéro devant si besoin (utiliser sprintf)
 *
 * @param string $disque
 * @param string $piste
 * @return string
 */
function ordre(string $disque, string $piste): string
{
    return sprintf("%s%02d", explode('/', $disque)[1] > 1 ? sprintf("%1d - ", $disque) : '', $piste);
}

/**
 * On affiche :
 *  - numéro de disque -- piste (voir la fonction ordre)
 *  - le titre du morceau
 *  - l'artiste (s'il existe)
 *  - la durée du morceau
 *
 * Exemples :
 *  - 02 - One Monkey (Francine Reed) - 03:40
 *  - 1 - 10 - Enfermé dans les cabinets - 03:47
 *
 * @param array $m The song
 * @return void
 */
function afficheMorceau(array $m): void
{
    echo sprintf("	%s - %s%s - %s", ordre($m['disque'], $m['piste']), $m['titre'], isset($m['artiste']) ? ' (' . $m['artiste'] . ')' : '', $m['durée']) . "\n";
}

/**
 * Affiche tout l'album global $monAlbum :
 * - entête avec les informations générales
 * - liste des morceaux (voir fonction afficheMorceau)
 *
 * @return void
 */
function affiche(): void
{
    global $monAlbum;
    echo sprintf("%s (%s, %s)\n", $monAlbum['nom'], $monAlbum['artiste'], $monAlbum['année']);
    $totalDuration = '00:00';
    foreach ($monAlbum['morceaux'] as $song) {
        afficheMorceau($song);
        $totalDuration = toString(add(fromString($totalDuration), fromString($song['durée'])));
    }
    echo 'Durée totale : ' . $totalDuration;
}

// La variable globale $monAlbum est supposée définie dans un fichier PHP à inclure, dont
// le nom est passé en argument sur la ligne de commande (tableau $argv).
// TODO : à compléter

affiche();

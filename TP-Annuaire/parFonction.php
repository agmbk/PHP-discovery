<?php
require_once "annuaire.php";
require_once "tableTemplate.php";
global $annuaireInterne;

$html = "<table><thead>";

/**
 * Display the table header
 * @var  $key
 * @var  $value
 */
foreach ($annuaireInterne[0] as $key => $value) {
    $html .= '<td>' . strtoupper($key) . '</td>';
}
$html .= "</thead><tbody>";

/**
 * Sort the array by function
 * @param $a
 * @param $b
 * @return int
 */
function cmp($a, $b): int
{
    return strcmp($a["fonction"], $b["fonction"]);
}

usort($annuaireInterne, 'cmp');

/**
 * Display each person
 */
foreach ($annuaireInterne as $personne) {
    $html .= uneLigneHTML($personne);
}

$html .= "</tbody></table>";

affiche($html);


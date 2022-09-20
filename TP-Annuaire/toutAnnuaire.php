<?php
require_once "annuaire.php";
require_once "functions.php";
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
 * Display each person
 */
foreach ($annuaireInterne as $personne) {
    $html .= uneLigneHTML($personne);
}
$html .= "</tbody></table>";

displayHTML($html);


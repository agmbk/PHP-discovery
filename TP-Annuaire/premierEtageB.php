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
 * Display each person
 */
foreach ($annuaireInterne as $personne) {
    if (str_starts_with($personne['bureau'], 'B1')) $html .= uneLigneHTML($personne);
}
$html .= "</tbody></table>";

affiche($html);



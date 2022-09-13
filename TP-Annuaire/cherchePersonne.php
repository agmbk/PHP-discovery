<?php
require_once "annuaire.php";
require_once "tableTemplate.php";
global $annuaireInterne;

$achercher = "GENTHIAL";

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
$res = '';
foreach ($annuaireInterne as $personne) {
    if ($personne['nom'] == $achercher) $res .= uneLigneHTML($personne);
}

if ($res) {
    $html .= $res;
} else {
    $html .= '<p class="erreur">' . $achercher . '</p>';
}

$html .= "</tbody></table>";

affiche($html);


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
$min = 0;
for ($i = 0; $i < count($annuaireInterne); $i++) {
    for ($j = $i; $j < count($annuaireInterne); $j++) {
        if (strcmp($annuaireInterne[$min]['bureau'], $annuaireInterne[$j]['bureau']) > 0) $min = $j;
    }
    $temp = $annuaireInterne[$i];
    $annuaireInterne[$i] = $annuaireInterne[$min];
    $annuaireInterne[$min] = $temp;
}

foreach ($annuaireInterne as $personne) {
    $html .= uneLigneHTML($personne);
}

$html .= "</tbody></table>";

affiche($html);


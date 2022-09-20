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
    for ($j = $i + 1; $j < count($annuaireInterne); $j++) {
        if ($annuaireInterne[$min]['bureau'] > $annuaireInterne[$j]['bureau']) $min = $j;
    }
    $html .= uneLigneHTML($annuaireInterne[$min]);
    $annuaireInterne[$min] = $annuaireInterne[$i];
}

affiche($html . "</tbody></table>");

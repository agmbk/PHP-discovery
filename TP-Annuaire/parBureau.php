<?php
require_once "annuaire.php";
require_once "functions.php";
global $annuaireInterne;

$html = "";
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

displayTable($html);

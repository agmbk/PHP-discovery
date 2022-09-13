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
$res = $annuaireInterne;
$min = 0;

for ($i = 0; $i < count($annuaireInterne); $i++) {
    for ($j = $i; $j < count($annuaireInterne); $j++) {
        if ($res[$j]['bureau'] < $res[$min]['bureau']) {
            $min = $j;
        }
    }
    $temp = $res[$i];
    $res[$i] = $res[$min];
    $res[$min] = $temp;
}

foreach ($res as $indexToCompare => $personne) {
    $html .= uneLigneHTML($personne);
}

$html .= "</tbody></table>";

affiche($html);


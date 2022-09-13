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
$res = [];
foreach ($annuaireInterne as $index => $personne) {
    if (ord($personne['bureau']) > ord(end($res)['bureau'])) {
        $res[] = $personne;
        echo $personne['bureau'] . '-' . ord($personne['bureau']) . end($res)['bureau'] . "\n";
    }
    /*foreach ($annuaireInterne as $indexToCompare => $personneToCompare) {
        if ($indexToCompare > $index && ord($personneToCompare['bureau']) < ord($personne['bureau']))
            $html .= uneLigneHTML($personneToCompare);
    }*/

}

foreach ($res as $indexToCompare => $personne) {
    $html .= uneLigneHTML($personne);
}

$html .= "</tbody></table>";

affiche($html);


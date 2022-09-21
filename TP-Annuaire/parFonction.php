<?php
require_once "annuaire.php";
require_once "functions.php";
global $annuaireInterne;

$html = '';
/**
 * Display each person
 */
foreach (sortArray($annuaireInterne, "fonction") as $person) {
    $html .= uneLigneHTML($person);
}

displayTable($html);

<?php
require_once "annuaire.php";
require_once "functions.php";
global $annuaireInterne;

$html = "";

/**
 * Display each person
 */
foreach ($annuaireInterne as $personne) {
    $html .= uneLigneHTML($personne);
}

displayTable($html);

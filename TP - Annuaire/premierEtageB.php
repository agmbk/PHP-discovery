<?php
require_once "annuaire.php";
require_once "functions.php";
global $annuaireInterne;

$html = "";
/**
 * Display each person
 */
foreach ($annuaireInterne as $personne) {
    if (str_starts_with($personne['bureau'], 'B1')) $html .= uneLigneHTML($personne);
}

displayTable($html);

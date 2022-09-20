<?php
require_once "annuaire.php";
require_once "functions.php";
global $annuaireInterne;

$res = "";
/**
 * Display each person
 */
foreach ($annuaireInterne as $personne) {
    if (str_starts_with($personne['bureau'], 'B1')) $res .= uneLigneHTML($personne);
}

displayTable($res);

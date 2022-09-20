<?php
require_once "annuaire.php";
require_once "functions.php";
global $annuaireInterne;


displayTable(sortArray($annuaireInterne, "fonction"));

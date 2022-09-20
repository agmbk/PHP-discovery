<?php
require_once "annuaire.php";
require_once "functions.php";
global $annuaireInterne;

/**
 * Search menu
 */
$html = '<div style="width: 100%; height: 30px; padding-top: 10px; text-align: center; background-color: #77a"><form action="cherchePersonne.php" method="POST">
<input style="border-radius: 10px; padding-left: 10px" id="search" name="searchValue" type="text" placeholder="Search on NAME by default">
<label for="name">NOM
<input id="name" type="radio" name="searchID" value="nom" checked>
</label><label for="surname">PRENOM
<input id="surname" type="radio" name="searchID" value="prénom">
</label><label for="function">FUNCTION
<input id="function" type="radio" name="searchID" value="fonction">
</label><label for="office">OFFICE
<input id="office" type="radio" name="searchID" value="bureau">
</label>
<input style="width: 60px; height: 25px; color: #77a; background: #CCCCFF; border-radius: 10px" id="submit" type="submit" value="Search">
</form></div></br>';


if ($_POST && isset($_POST['searchValue'])) {

    /**
     * Display each person
     */
    $res = '';
    foreach ($annuaireInterne as $person) {
        if (str_starts_with(strtoupper($person[$_POST['searchID']]), strtoupper($_POST['searchValue']))) $res .= uneLigneHTML($person);
    }

    /**
     * Display the result or an error message
     */
    if ($res) {
        displayTable($html . $res);
    } else {
        displayHTML($html . "<p style=\"text-align: center\" class=\"erreur\">'" . $_POST['searchValue'] . "' as '" . $_POST['searchID'] . "' doesn't exists</p>");
    }
} else {
    displayHTML($html . '<div style="width: 100%; text-align: center;"><p style="margin: 0 auto">Enter a search value</p></div>');
}



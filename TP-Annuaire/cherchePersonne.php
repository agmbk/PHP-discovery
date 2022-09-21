<?php
require_once "annuaire.php";
require_once "functions.php";
global $annuaireInterne;

/**
 * Search menu
 */
$html = '<div id="formWrapper">
<form action="cherchePersonne.php" method="POST">

<div id="topMenu">
<input id="search" name="searchValue" type="text" placeholder="Value...">
<div id="switchWrapper">
<input type="checkbox" name="switch" id="switch">
<label for="switch"><div  class="arrowContainer"><span class="arrow"></span></div>&nbspContains&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspStart with</label>
</div>
<input id="submit" type="submit" value="Search">
</div>

<div id="radio">
<label for="name">
<input id="name" type="radio" name="searchID" value="nom" checked required><span>NOM</span>
</label><label for="surname">
<input id="surname" type="radio" name="searchID" value="prénom" required><span>PRENOM</span>
</label><label for="position">
<input id="position" type="radio" name="searchID" value="poste" required><span>POSTE</span>
</label><label for="function">
<input id="function" type="radio" name="searchID" value="fonction" required><span>FUNCTION</span>
</label><label for="office">
<input id="office" type="radio" name="searchID" value="bureau" required><span>OFFICE</span>
</label><label for="all">
<input id="all" type="radio" name="searchID" value="all" required><span>ALL</span>
</label>
</div>
</form></div></br>';

if ($_POST && isset($_POST['searchValue'])) {
    /**
     * Display each person
     */
    $needle = strtoupper($_POST['searchValue']);
    $res = '';
    $search = 'str_starts_with';

    /**
     * Contains / Starts with toggle
     */
    if (isset($_POST['switch'])) {
        $search = 'str_contains';
    }

    if ($_POST['searchID'] === 'all') {
        foreach ($annuaireInterne as $person) {
            $boolean = false;
            foreach ($person as $values) {
                if ($search(strtoupper(strval($values)), $needle)) $boolean = true;
            }
            if ($boolean) $res .= uneLigneHTML($person);;
        }
    } else {
        $newAnnuary = [];
        foreach ($annuaireInterne as $person) {
            if ($search(strtoupper(strval($person[$_POST['searchID']])), $needle)) $newAnnuary[] = $person;
        }
        /**
         * Sort the array on the search key
         */
        foreach (sortArray($newAnnuary, $_POST['searchID']) as $person) {
            $res .= uneLigneHTML($person);
        }
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

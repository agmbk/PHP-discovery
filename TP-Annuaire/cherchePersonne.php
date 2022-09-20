<?php
require_once "annuaire.php";
require_once "tableTemplate.php";
global $annuaireInterne;

$html = '<div style="width: 100%; height: 30px; padding-top: 10px; text-align: center; background-color: #77a"><form action="cherchePersonne.php" method="POST">
<input style="border-radius: 10px; padding-left: 10px" id="search" name="searchValue" type="text" placeholder="Search on NAME by default">
<label for="name">NOM
<input id="name" type="radio" name="searchID" value="name">
</label><label for="surname">PRENOM
<input id="surname" type="radio" name="searchID" value="surname">
</label><label for="function">FUNCTION
<input id="function" type="radio" name="searchID" value="function">
</label><label for="office">OFFICE
<input id="office" type="radio" name="searchID" value="office">
</label>
<input style="width: 60px; height: 25px; color: #77a; background: #CCCCFF; border-radius: 10px" id="submit" type="submit" value="Search">
</form></div></br>';


if ($_POST && isset($_POST['searchValue'])) {
    $toSearchValue = strtoupper($_POST['searchValue']);
    $toSearchField = "nom";

    /**
     * Change the search field (default name)
     */
    if (isset($_POST['searchID'])) {
        switch ($_POST['searchID']) {
            case "surname":
                $toSearchField = "prénom";
                break;
            case "function":
                $toSearchField = "fonction";
                break;
            case "office":
                $toSearchField = "bureau";
                break;
        }
    }

    $html .= '<table><thead>';
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
    $res = '';
    foreach ($annuaireInterne as $personne) {
        if (str_starts_with(strtoupper($personne[$toSearchField]), $toSearchValue)) $res .= uneLigneHTML($personne);
    }

    if ($res) {
        $html .= $res;
    } else {
        $html .= '<p class="erreur">' . $toSearchValue . ' doesn\'t exists</p>';
    }
    $html .= "</tbody></table>";
    affiche($html);
} else {
    affiche($html . '<div style="width: 100%; text-align: center;"><p style="margin: 0 auto">Enter a search value</p></div>');
}



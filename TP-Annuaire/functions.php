<?php

/**
 * Display the html page
 * @param string $html
 * @return void
 */
function displayHTML(string $html): void
{
    echo '<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css"/>
        <title>TP Annuaire</title>
    </head>
    <body>
    <h1>Scripts PHP pour le TP Annuaire</h1>' .
        $html .
        "</tbody></table></body></html>";
}

/**
 * Display the table header
 * @param array $arr
 */
function displayTable(array $arr): void
{
    $html = '<table><thead>';
    /**
     * Creates the table header
     */
    foreach (["NOM", "PRENOM", "POSTE", "BUREAU", "FONCTION"] as $value) {
        $html .= '<td>' . $value . '</td>';
    }
    $res = '';
    /**
     * Display each person
     */
    foreach ($arr as $person) {
        $res .= uneLigneHTML($person);
    }
    displayHTML($html . "</thead><tbody>" . $res . "</tbody></table>");
}

/**
 * Sort the array by function
 * @param array $arr
 * @param string $key
 * @return array
 */
function sortArray(array $arr, string $key): array
{
    function cmp($a, $b): int
    {
        global $key;
        return strcmp($a[$key], $b[$key]);
    }
    usort($arr, 'cmp');
    return $arr;
}

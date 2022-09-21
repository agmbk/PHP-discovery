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
        "</body></html>";
}

/**
 * Display the table header
 * @param string $data
 */
function displayTable(string $data): void
{
    $html = '<table><thead>';
    /**
     * Creates the table header
     */
    foreach (["NOM", "PRENOM", "POSTE", "BUREAU", "FONCTION"] as $value) {
        $html .= '<td>' . $value . '</td>';
    }
    displayHTML($html . "</thead><tbody>" . $data . "</tbody></table>");
}

/**
 * Sort the array by function
 * @param array $arr
 * @param string $_key
 * @return array
 */
function sortArray(array $arr, string $_key): array
{
    global $key;
    $key = $_key;
    function cmp($a, $b): int
    {
        global $key;
        return strcmp($a[$key], $b[$key]);
    }

    usort($arr, 'cmp');
    return $arr;
}

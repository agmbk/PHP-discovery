<?php

function affiche(string $html): void
{
    echo '<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css"/>
        <title>TP Annuaire</title>
    </head>
    <body>
    <h1>Scripts PHP pour le TP Annuaire</h1>';

    echo $html;

    echo "</tbody></table></body></html>";
}


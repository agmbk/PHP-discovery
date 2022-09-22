<?php

/**
 * Gestion des durées pour les albums. Une durée est un tableau associatif au format :
 *      [ 'h' => heures, 'm' => minutes, 's' => secondes ]
 * Reçoit une chaîne de type hh:mm:ss ou mm:ss et retourne une durée :
 *      tableau [ 'h' => hh, 'm' => mm, 's' => ss]
 * Indication : utiliser la fonction explode pour décomposer $strDuration
 *
 * @param string $strDuration 00:00:00 as h:m:s
 * @return array ['h' => int, 'm' => int, 's' => int]
 */
function fromString(string $strDuration): array
{
    $split = explode(':', $strDuration);
    $splitCount = count($split) - 1;
    $res = ['s' => $split[$splitCount], 'm' => $split[$splitCount - 1]];
    if (isset($split[$splitCount - 2]))
        $res['h'] = $split[$splitCount - 2];
    return $res;
}

/**
 * Convertit une durée en chaîne
 * Indication : utiliser sprintf pour afficher les 0 des valeurs < 10, 2 => "02"
 *
 * @param array $duration
 * @return string
 */
function toString(array $duration): string
{
    return (isset($duration['h']) ? sprintf("%d:", $duration['h']) : '')
        . sprintf("%02d:", $duration['m'])
        . sprintf("%02d", $duration['s']);
}

/**
 * Addition de deux durées, en n'utilisant que des si-alors-sinon, des additions
 * et des soustractions (pas de multiplication, ni de division, ni de modulo).
 *
 * @param array $d1 ['h' => int, 'm' => int, 's' => int]
 * @param array $d2 ['h' => int, 'm' => int, 's' => int]
 * @return array ['h' => int, 'm' => int, 's' => int]
 */
function add(array $d1, array $d2): array
{
    $res = [];
    /** Adds hour only if it exists */
    if (isset($d1['h']) || isset($d2['h']))
        $res['h'] = $d1['h'] ?? 0 + $d1['h'] ?? 0;

    /** Adds minutes and seconds */
    $res['m'] = $d1['m'] + $d2['m'];
    $res['s'] = $d1['s'] + $d2['s'];

    /** Format minutes and seconds to be <= 59 */
    if ($res['s'] > 59) {
        $res['s'] -= 60;
        $res['m']++;
    }
    if ($res['m'] > 59) {
        $res['m'] -= 60;
        $res['h'] = isset($res['h']) ? $res['h'] + 1 : 1;
    }
    return $res;
}

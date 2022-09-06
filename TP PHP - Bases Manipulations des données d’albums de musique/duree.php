<?php
// Gestion des durées pour les albums. Une durée est un tableau associatif au format :
//    [ 'h' => heures, 'm' => minutes, 's' => secondes ]

// Reçoit une chaîne de type hh:mm:ss ou mm:ss et retourne une durée :
//  tableau [ 'h' => hh, 'm' => mm, 's' => ss]
// Indication : utiliser la fonction explode pour décomposer $strDuration
function fromString(string $strDuration): array {
    echo $strDuration;
    $split = explode(':', $strDuration);
    $arrLen = count($split);
    if ($arrLen == 1) {
        return [ 's' => $strDuration ];
    }
    if ($arrLen == 2) {
        return [ 'm' => $split[0], 's' => $split[1] ];
    }
    return [ 'h' => $split[0], 'm' => $split[1], 's' => $split[2] ];
}

// Convertit une durée en chaîne
// Indication : utiliser sprintf pour afficher les 0 des valeurs < 10, 2 => "02"
function toString(array $duration): string {
    $res = '';
    foreach ($duration as &$value) {
        if ($value) {
            $res .= sprintf("%02d:", $value);
        }else {
            $res .= 00;
        }
    }
    if (count($duration) == 3) {
        return substr($res, 1, -1);
    }
    return substr($res, 0, -1);
}

// Addition de deux durées, en n'utilisant que des si-alors-sinon, des additions
// et des soustractions (pas de multiplication, ni de division, ni de modulo).
function add(array $d1, array $d2): array {
    $res = [ 'h' => 0, 'm' => 0, 's' => 0 ];
    $smh = ['s', 'm', 'h'];
    for ($i=0; $i<=2; $i++) {
        /** Adds mins and hours */
        if(array_key_exists($smh[$i], $d1)) {
            $res[$smh[$i]] += $d1[$smh[$i]];
        }
        if(array_key_exists($smh[$i], $d2)) {
            $res[$smh[$i]] += $d2[$smh[$i]];
        }
        /** Format mins and hours to 59 max */
        if ($i < 2 && $res[$smh[$i]] >= 60) {
            $res[$smh[$i]] = $res[$smh[$i]] - 60;
            $res[$smh[$i + 1]] += 1;
        }
    }
    return $res;
}

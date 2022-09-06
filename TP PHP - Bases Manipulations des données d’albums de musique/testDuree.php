<?php

// Programme de test du module de temps
require_once "duree.php";

$d3 = [ 'h' => 2, 'm' => 3, 's' => 4 ];
echo "toString([ 'h' => 2, 'm' => 3, 's' => 4 ]) ==> ", toString($d3), "\n";

$d1 = fromString("30:40");
echo 'fromString("30:40") ==> ', toString($d1), "\n";

$d2 = fromString("3:30:40");
echo 'fromString("3:30:40") ==> ', toString($d2), "\n";

$sum = add($d1, $d2);
echo toString($d1), " + ", toString($d2), " = ", toString($sum), "\n";


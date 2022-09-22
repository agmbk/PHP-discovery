<?php

require_once "duree.php";

foreach (scandir('./data') as $dir) {
    if (!str_ends_with($dir, '.php') || !$resControl = file_get_contents('data/' . substr($dir, 0, -3) . 'txt')) continue;
    $file = basename($dir);
    echo $file . "\n";

    $resControl = preg_split('/\n|\r\n?/', $resControl);
    $res = preg_split('/\n|\r\n?/', shell_exec('php afficheAlbum.php data/' . $dir));
    $error = false;

    foreach ($res as $i => $line) {
        $lineControl = trim($resControl[$i]);
        $line = trim($line);
        if ($line !== $lineControl) {
            $error = true;
            echo 'Invalid line (', ($i + 1), ') "', $line, '" !== "', $lineControl, "\"\n";
        }
    }
    echo ($error ? '' : "Success\n") . 'EOF ' . $file . "\n\n";
}

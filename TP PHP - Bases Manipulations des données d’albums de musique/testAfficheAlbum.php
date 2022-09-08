<?php

require_once "duree.php";

foreach (scandir('./data') as $dir) {
    if (substr($dir, strlen($dir) - 3, 3) !== 'php') continue;
    $file = basename($dir);
    echo 'Open ' . $file . "\n";

    $res = explode("\n", shell_exec('php afficheAlbum.php ' . sprintf('"%s\data\%s"', realpath(dirname(__FILE__)), $dir)));
    $invalid = false;

    if (!($resControl = file_get_contents(sprintf('%s\data\%s', realpath(dirname(__FILE__)), str_replace('php', 'txt', $dir)), "r"))) continue;

    $resControl = explode("\r", $resControl);

    foreach ($res as $key => $line) {
        $controlLine = str_replace(array("\n\r", "\n", "\r"), '', $resControl[$key]);
        $line = str_replace(array("\n\r", "\n", "\r"), '', $line);

        if ($invalid = $controlLine !== $line)
            echo 'Invalid line (' . ($key + 1) . ') "' . $line . '" !== "' . $controlLine . "\"\n";
    }
    echo ($invalid ? '' : "Success\n") . 'EOF ' . $file . "\n\n";
}

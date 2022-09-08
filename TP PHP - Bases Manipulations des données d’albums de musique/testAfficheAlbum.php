<?php

require_once "duree.php";

foreach (scandir('./data') as $dir) {
    if (!str_ends_with($dir, 'php') || !$resControl = file_get_contents(sprintf('%s\data\%s', realpath(dirname(__FILE__)), str_replace('.php', '.txt', $dir)))) continue;
    $file = basename($dir);
    echo $file . "\n";

    $resControl = explode("\r", $resControl);
    $res = explode("\n", shell_exec('php afficheAlbum.php ' . sprintf('"%s\data\%s"', realpath(dirname(__FILE__)), $dir)));
    $error = false;

    foreach ($res as $key => $line) {
        $lineControl = trim($resControl[$key]);
        $line = trim($line);

        if ($line !== $lineControl) {
            $error = true;
            echo 'Invalid line (' . ($key + 1) . ') "' . $line . '" !== "' . $lineControl . "\"\n";
        }
    }
    echo ($error ? '' : "Success\n") . 'EOF ' . $file . "\n\n";
}

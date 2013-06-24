#!/usr/bin/env php
<?php

namespace Sabre\VObject;

// This sucks.. we have to try to find the composer autoloader. But chances
// are, we can't find it this way. So we'll do our bestest
$paths = array(
    __DIR__ . '/../vendor/autoload.php',  // In case vobject is cloned directly
    __DIR__ . '/../../../autoload.php',   // In case vobject is a composer dependency.
);

foreach($paths as $path) {
    if (file_exists($path)) {
        include $path;
        break;
    }
}

if (!class_exists('Sabre\\VObject\\Version')) {
    fwrite(STDERR, "Composer autoloader could not be properly loaded.\n");
    die(1);
}

$cli = new Cli();
exit($cli->main($argv));


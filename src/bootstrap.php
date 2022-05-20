<?php

# helper functions
include __DIR__ . '/functions.php';

#load every classes automatically on class directory
spl_autoload_register('load_classes');

function load_classes($className)
{
    $dir = __DIR__ . '/class';
    $extention = '.php';
    $path = "$dir/$className$extention";

    if (file_exists($path)) include $path;
}

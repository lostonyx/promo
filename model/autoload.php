<?php

function Autoload($classname)
{
    $filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . $classname . '.php';
    if (is_readable($filename))
        require "$filename";
}

spl_autoload_register('Autoload');
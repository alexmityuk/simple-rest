<?php

/**
 * @param string $class
 * @param string $domain
 */
function load(string $class, string $domain)
{
    $dir = dirname($_SERVER['SCRIPT_FILENAME']) . DS .  $domain;

    foreach (scandir($dir) as $file) {
        if (preg_match("/.php$/i", $file)) {
            $className = $dir . DS . $file;
            require_once $className;
        } elseif ($file !== '.' && $file !== '..') {
            load($class, $domain . DS . $file);
        }
    }
}

spl_autoload_register(function ($class) {
    load($class, 'app' . DS . 'src'  . DS. 'Core');
    load($class, 'app' . DS . 'src' . DS . 'Api');
    load($class, 'app' . DS . 'Http');
});

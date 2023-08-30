<?php

// Strict
declare(strict_types=1);

// Enable all php errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

// Pretty errors
ini_set("html_errors", "1");
ini_set("error_prepend_string", "<pre style='color: #333; font-face:monospace; white-space:pre-wrap;font-size: 17px;color:#880808'>");
ini_set("error_append_string ", "</pre>");

// Autoload logic
function loadClass($classname)
{
    $utils = ['Animal', 'Zoo', 'Enclosure', 'Employee'];

    if (substr($classname, -strlen('Repository')) === 'Repository') {
        require(__DIR__ . '/../class/repository/' . $classname . '.php');
        return;
    }

    if (substr($classname, -strlen('Park')) === 'Park'){
        require(__DIR__ . '/../class/parks/' . $classname . '.php');
        return;
    }

    if (in_array($classname, $utils, true)) {
        require(__DIR__ . '/../class/' . $classname . '.php');
        return;
    }

    require(__DIR__ . '/../class/animals/' . $classname . '.php');
}

spl_autoload_register('loadClass');

// Session
//session_start();

?>

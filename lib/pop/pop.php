<?php
    // Put your setup variables in vars.php. Create one if it doesn't exist.
    define('PATH', dirname(__FILE__) . '/');

    if (file_exists(PATH . '../../vars.php')) {
        require_once(PATH . '../../vars.php');
    } else if (file_exists(PATH . '../vars.php')) {
        require_once(PATH . '../vars.php');
    } else if (file_exists(PATH . 'vars.php')) {
        require_once(PATH . 'vars.php');
    } else {
        require_once(PATH . 'vars.default.php');
    }
    require_once(PATH . 'lib.php');

    // run!
    import('pop');
    $pop = new Pop();  // register autoloaders and URL handlers
    unset($pop);

<?php

    require_once dirname(__DIR__) . '/App/Config.php';

    spl_autoload_register(function ($class) {
        $root = dirname(__DIR__);   
        $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
        if (is_readable($file)) {
            require $root . '/' . str_replace('\\', '/', $class) . '.php';
        }
    });

    set_error_handler('Core\Error::errorHandler');
    set_exception_handler('Core\Error::exceptionHandler');
  
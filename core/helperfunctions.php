<?php

/**
 * Require a view.
 *
 * @param string $name
 * @param array $data
 */
function view($fileName, $data = [])
{
    extract($data);
    return require "app/views/$fileName.view.php";
}

/**
 * Redirect to a new page.
 *
 * @param string $path
 */
function redirect($path)
{
    header("Location: /$path");
    exit();
}

/**
 * Dump variables
 */
function dd()
{
    $args = func_get_args();

    if (count($args)) {
        echo "<pre>";

        foreach ($args as $arg) {
            var_dump($arg);
        }

        echo "</pre>";

        die();
    }
}

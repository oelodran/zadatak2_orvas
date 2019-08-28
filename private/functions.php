<?php
/**
 * Created by PhpStorm.
 * User: leona
 * Date: 27.8.2019.
 * Time: 11:14
 */
function url_for($script_path)
{
    // add the leading '/' if not present
    if ($script_path[0] != '/') {
        $script_path = '/' . $script_path;
    }
    return WWW_ROOT . $script_path;
}

function u($string="")
{
    return urlencode($string);
}

function raw_u($string="")
{
    return rawurlencode($string);
}

function h($string="")
{
    return htmlspecialchars($string);
}

function redirect_to($location)
{
    header("Location: " . $location);
}

function is_post_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}
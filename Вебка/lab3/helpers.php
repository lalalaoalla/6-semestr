<?php


require_once ('config/connect.php');
function redirect(string $path)
{
    header(header:"Location: $path");
    die();
}


function getErrorMessage(string $fieldName)
{
    echo $_SESSION['validation'][$fieldName] ?? '';
    unset($_SESSION['validation'][$fieldName]);
}

function clearValidaton()
{
    $_SESSION['validation'] = [];
}
function addLoadValue (string $key, string $value) 
{
    $_SESSION['old'][$key]=$value;
}
function old(string $key)
{
    $value = $_SESSION['old'][$key] ?? '';
    unset($_SESSION['old'][$key] );
    return $value;
}
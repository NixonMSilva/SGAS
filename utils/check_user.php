<?php

function isLogged ()
{
    return isset($_SESSION['is_logged']);
}

function isAdmin ()
{
    if (isset($_SESSION['user_type']))
    {
        return ($_SESSION['user_type'] == 'A');
    }
    return false;
}

function isManager ()
{
    if (isset($_SESSION['user_type']))
    {
        return ($_SESSION['user_type'] == 'A' || $_SESSION['user_type'] == 'M');
    }
    return false;
}
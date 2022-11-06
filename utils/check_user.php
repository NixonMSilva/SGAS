<?php

function isAdmin ($userType)
{
    return ($userType == 'A');
}

function isManager ($userType)
{
    return ($userType == 'A' || $userType == 'M');
}
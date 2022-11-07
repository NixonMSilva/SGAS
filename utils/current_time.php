<?php

function getCurrentTime ()
{
    date_default_timezone_set("America/Sao_Paulo");
    $currentTime    =   $_SERVER['REQUEST_TIME'];
    $currentTime    =   date("Y-m-d H:i:s", $currentTime);
    return $currentTime;
}
<?php

function convertTimestampDate ($timestamp)
{
    $time = strtotime($timestamp);
    return date("d/m/y", $time);
}

function convertTimestampHour ($timestamp) 
{
    $time = strtotime($timestamp);
    return date("H:i", $time);
}

function convertTimestampFull ($timestamp)
{
    $time = strtotime($timestamp);
    return date("d/m/y H:i", $time);
}
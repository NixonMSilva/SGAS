<?php

function returnInvalidCredentials ($returnArgs)
{
    header('location:index.php?' . $returnArgs);
}
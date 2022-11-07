<?php

function returnToPage ($returnArgs)
{
    header('location:index.php?' . $returnArgs);
}
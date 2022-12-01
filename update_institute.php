<?php

include 'db.php';
include 'utils/current_time.php';

if (!isset($_GET['id']))
{
    exit();
}

$instituteId   =   mysqli_real_escape_string($connection, $_GET['id']);
$instituteCode =   mysqli_real_escape_string($connection, $_POST['instituteCode']); 
$instituteName =   mysqli_real_escape_string($connection, $_POST['instituteName']);

$currentTime = getCurrentTime();

$instituteUpdateQuery =
"UPDATE institute 
    SET name = '$instituteName', acronym = '$instituteCode', updated_at = '$currentTime'
    WHERE id = $instituteId"; 

mysqli_query($connection, $instituteUpdateQuery);

header('location:index.php?page=institutes');
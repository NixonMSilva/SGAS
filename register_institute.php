<?php

include 'db.php';
include 'utils/current_time.php';

$instituteCode =   mysqli_real_escape_string($connection, $_POST['instituteCode']); 
$instituteName =   mysqli_real_escape_string($connection, $_POST['instituteName']);

$currentTime = getCurrentTime();

$instituteInsertQuery =
"INSERT INTO institute(name, acronym, created_at, updated_at, isActive) 
VALUES ('$instituteName', '$instituteCode', '$currentTime', '$currentTime', 1)";

mysqli_query($connection, $instituteInsertQuery);

header('location:index.php?page=institutes');
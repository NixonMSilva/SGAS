<?php

include 'db.php';
include 'utils/current_time.php';

if (!isset($_GET['id']))
{
    exit();
}

$userId         =   mysqli_real_escape_string($connection, $_GET['id']);
$userName       =   mysqli_real_escape_string($connection, $_POST['userName']); 
$userPassword   =   mysqli_real_escape_string($connection, $_POST['userPassword']);
$userTelephone  =   mysqli_real_escape_string($connection, $_POST['userTelephone']);

$userCreatedAtQuery = "SELECT created_at FROM user WHERE id = '$userId'";
$userCreatedAtQueryResult = mysqli_query($connection, $userCreatedAtQuery);
$userCreatedAtTime  = mysqli_fetch_array($userCreatedAtQueryResult);

$userPassword = hash('sha256', $userCreatedAtTime['created_at'] . $userPassword);
$currentTime = getCurrentTime();

$userUpdateQuery =
"UPDATE user
    SET name = '$userName', pass_word = '$userPassword', telephone = '$userTelephone', altered_at = '$currentTime'
    WHERE id = '$userId'";

session_start();
$_SESSION['user_name'] = $userName;

mysqli_query($connection, $userUpdateQuery);

header('location:index.php?page=home');
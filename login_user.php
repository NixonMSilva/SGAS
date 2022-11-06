<?php

include 'db.php';

include 'utils/errorReturn.php';

$user_email     =   mysqli_real_escape_string($connection, $_POST['userEmail']);
$userPassword   =   mysqli_real_escape_string($connection, $_POST['userPassword']);

$queryBase =
    "SELECT *
    FROM user
    WHERE email = '$user_email'";

$queryResult = mysqli_query($connection, $queryBase);
$object      = mysqli_fetch_array($queryResult);

if (!$object)
{
    returnInvalidCredentials('page=home&error=1');
    exit();
}

$passwordTest = hash('sha256', $object['created_at'].$userPassword);
$passwordReal = $object['pass_word'];

if ($passwordTest != $passwordReal)
{
    returnInvalidCredentials('page=home&error=1');
    exit();
}

session_start();
$_SESSION['is_logged']  = true;
$_SESSION['user_id']    = $object['id'];
$_SESSION['user_name']  = $object['name'];
$_SESSION['user_type']  = $object['type'];

mysqli_free_result($queryResult);

header('location:index.php?page=home');
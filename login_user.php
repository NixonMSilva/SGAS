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
$object      = mysqli_fetch_array($queryResultTimestamp);

if (!$object)
{
    returnInvalidCredentials('page=login&error=1');
}

$passwordTest = hash('sha256', $object['created_at'].$userPassword);
$passwordReal = $object['pass_word'];

if ($passwordTest != $passwordReal)
{
    returnInvalidCredentials('page=login&error=1');
}

mysqli_free_result($queryResult);

header('location:index.php?page=home');
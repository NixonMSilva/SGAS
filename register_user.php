<?php

include 'db.php';
include 'utils/current_time.php';

$userName       =   mysqli_real_escape_string($connection, $_POST['userName']); 
$userEmail      =   mysqli_real_escape_string($connection, $_POST['userEmail']);
$userPassword   =   mysqli_real_escape_string($connection, $_POST['userPassword']);
$userCPF        =   mysqli_real_escape_string($connection, $_POST['userCPF']);
$userTelephone  =   mysqli_real_escape_string($connection, $_POST['userTelephone']);

$currentTime = getCurrentTime();

$userPassword = hash('sha256', $currentTime . $userPassword);

$userInsertQuery =
"INSERT INTO user(name, email, pass_word, cpf, telephone, created_at, altered_at) 
VALUES ('$userName','$userEmail','$userPassword','$userCPF','$userTelephone', '$currentTime', '$currentTime')";

mysqli_query($connection, $userInsertQuery);

header('location:index.php?page=home');
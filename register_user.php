<?php

include 'db.php';

$userName       =   mysqli_real_escape_string($connection, $_POST['userName']); 
$userEmail      =   mysqli_real_escape_string($connection, $_POST['userEmail']);
$userPassword   =   mysqli_real_escape_string($connection, $_POST['userPassword']);
$userCPF        =   mysqli_real_escape_string($connection, $_POST['userCPF']);
$userTelephone  =   mysqli_real_escape_string($connection, $_POST['userTelephone']);

date_default_timezone_set("America/Sao_Paulo");
$currentTime    =   $_SERVER['REQUEST_TIME'];
$currentTime    =   date("Y-m-d H:i:s", $currentTime);

$userPassword   =   hash('sha256', $currentTime . $userPassword);

$userInsertQuery =
"INSERT INTO user(name, email, pass_word, cpf, telephone, created_at) 
VALUES ('$userName','$userEmail','$userPassword','$userCPF','$userTelephone', '$currentTime')";

mysqli_query($connection, $userInsertQuery);

header('location:index.php?page=home');
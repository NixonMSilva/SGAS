<?php

setlocale( LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');

$sever      =   "localhost";
$user       =   "root";
$password   =   "";
$database   =   "sgas";

$connection = mysqli_connect($sever, $user, $password, $database);
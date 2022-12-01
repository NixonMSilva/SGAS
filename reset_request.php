<?php

include 'db.php';
include 'utils/current_time.php';

$requestId = mysqli_real_escape_string($connection, $_GET['id']);
$currentTime = getCurrentTime();

$resetRejectQuery =
"UPDATE request 
        SET request_status = 'P'
        WHERE (request_id = $requestId) AND (request_status <> 'E')";

mysqli_query($connection, $resetRejectQuery);

header('location:index.php?page=requests');
<?php

include 'db.php';
include 'utils/current_time.php';

$requestId = mysqli_real_escape_string($connection, $_GET['id']);
$currentTime = getCurrentTime();

$requestRejectQuery =
"UPDATE request 
        SET request_status = 'R', rejected_at = '$currentTime'
        WHERE request_id = $requestId AND (request_status <> 'E')";

mysqli_query($connection, $requestRejectQuery);

header('location:index.php?page=requests');
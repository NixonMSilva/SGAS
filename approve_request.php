<?php

include 'includes.html';
include 'partials/header.php';
include 'db.php';
include 'utils/current_time.php';

$requestId = mysqli_real_escape_string($connection, $_GET['id']);
$currentTime = getCurrentTime();

$requestDataQuery =
"SELECT classroom_id, request_time_start, request_time_end  
    FROM request
    WHERE request_id = $requestId";
$requestDataQueryResult = mysqli_fetch_array(mysqli_query($connection, $requestDataQuery));

$requestDataClassroomId = $requestDataQueryResult['classroom_id'];
$requestDataTimeStart   = $requestDataQueryResult['request_time_start'];
$requestDataTimeEnd     = $requestDataQueryResult['request_time_end'];

// Verify if the resquest start time hasn't been expired already
if ($currentTime > $requestDataTimeStart)
{
    include 'views/error_page.php';
    printErrorRequestExpired();
    exit();
}

// Verify if the request isn't in conflict with another
$checkConflictQuery = 
"SELECT COUNT(*)
    FROM request
    WHERE classroom_id LIKE '$requestDataClassroomId'
    AND (
        ( '$requestDataTimeStart' BETWEEN request_time_start AND request_time_end
        OR  
        '$requestDataTimeEnd' BETWEEN request_time_start AND request_time_end )
    )
    AND request_status = 'A'";

$checkConflictQueryResult = mysqli_fetch_row(mysqli_query($connection, $checkConflictQuery));

if ($checkConflictQueryResult[0] > 0)
{
    include 'views/error_page.php';
    printErrorRequestConflict();
    exit();
}
else
{
    $requestApproveQuery =
    "UPDATE request 
        SET request_status = 'A', approved_at = '$currentTime'
        WHERE request_id = $requestId AND (request_status <> 'E')";

    mysqli_query($connection, $requestApproveQuery);

    header('location:index.php?page=requests');
}
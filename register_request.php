<?php

include 'db.php';
include 'utils/current_time.php';

session_start();
$requestUserId          =   $_SESSION['user_id'];
$requestClassroomCode   =   $_GET['id'];
$requestDateParts       =   explode("/", mysqli_real_escape_string($connection, $_POST['requestDate']));
$requestHourStart       =   mysqli_real_escape_string($connection, $_POST['requestHourStart']);
$requestHourEnd         =   mysqli_real_escape_string($connection, $_POST['requestHourEnd']);

$requestDateFull        =   $requestDateParts[2] . '-' . $requestDateParts[0] . '-' . $requestDateParts[1];
$requestHourStartFull   =   $requestDateFull . " " . $requestHourStart . ":00";
$requestHourEndFull     =   $requestDateFull . " " . $requestHourEnd . ":00";

$currentTime = getCurrentTime();

$classroomInsertQuery =
"INSERT INTO request(requestor_id, classroom_id, request_time_start, request_time_end, requested_at) 
VALUES ('$requestUserId', '$requestClassroomCode', '$requestHourStartFull', '$requestHourEndFull', '$currentTime')";

echo $classroomInsertQuery;

mysqli_query($connection, $classroomInsertQuery);

header('location:index.php?page=userRequests');
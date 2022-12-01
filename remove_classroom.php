<?php

include 'db.php';
include 'utils/current_time.php';

$classroomCode = mysqli_real_escape_string($connection, $_GET['room_code']);

$classroomCountQuery = "SELECT COUNT(*) FROM request WHERE classroom_id = '$classroomCode'";
$classroomCountQueryResult = mysqli_fetch_row(mysqli_query($connection, $classroomCountQuery));

if ($classroomCountQueryResult[0] > 0)
{
    include 'views/error_page.php';
    printErrorDependency('index.php?page=home');
}
else
{
    $classroomSoftDeleteQuery =
    "UPDATE classroom SET isActive = 0 WHERE room_code LIKE '$classroomCode'";

    mysqli_query($connection, $classroomSoftDeleteQuery);

    header('location:index.php?page=classrooms');
}
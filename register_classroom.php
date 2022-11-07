<?php

include 'db.php';
include 'utils/current_time.php';

$classroomCode           =   mysqli_real_escape_string($connection, $_POST['classroomCode']); 
$classroomCapacity       =   mysqli_real_escape_string($connection, $_POST['classroomCapacity']);
$classroomInstituteId    =   mysqli_real_escape_string($connection, $_POST['classroomInstituteId']);

$currentTime = getCurrentTime();

$classroomInsertQuery =
"INSERT INTO classroom(room_code, institute_id, available, created_at, capacity) 
VALUES ('$classroomCode', '$classroomInstituteId', true, '$currentTime', '$classroomCapacity')";

mysqli_query($connection, $classroomInsertQuery);

header('location:index.php?page=classrooms');
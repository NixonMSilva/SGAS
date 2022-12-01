<?php

include 'db.php';
include 'utils/current_time.php';

if (!isset($_GET['id']))
{
    exit();
}

$classroomCode      = mysqli_real_escape_string($connection, $_GET['id']);
$classroomCapacity  = mysqli_real_escape_string($connection, $_POST['classroomCapacity']); 
$classroomInstitute = mysqli_real_escape_string($connection, $_POST['classroomInstituteId']);

$currentTime = getCurrentTime();

$classroomUpdateQuery =
"UPDATE classroom
    SET capacity = '$classroomCapacity', institute_id = '$classroomInstitute', updated_at = '$currentTime'
    WHERE room_code LIKE '$classroomCode'"; 

mysqli_query($connection, $classroomUpdateQuery);

header('location:index.php?page=classrooms');
<?php

include 'db.php';
include 'utils/current_time.php';

$classroomCode = mysqli_real_escape_string($connection, $_GET['room_code']);

$classroomSoftDeleteQuery =
"UPDATE classroom SET isActive = 0 WHERE room_code LIKE '$classroomCode'";

mysqli_query($connection, $classroomSoftDeleteQuery);

header('location:index.php?page=classrooms');
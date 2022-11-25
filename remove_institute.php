<?php

include 'db.php';
include 'utils/current_time.php';

$instituteCode = mysqli_real_escape_string($connection, $_GET['id']);

$instituteSoftDeleteQuery =
"UPDATE institute SET isActive = 0 WHERE id = $instituteCode";

mysqli_query($connection, $instituteSoftDeleteQuery);

header('location:index.php?page=institutes');
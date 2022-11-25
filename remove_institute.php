<?php

include 'db.php';
include 'utils/current_time.php';

$instituteCode = mysqli_real_escape_string($connection, $_GET['id']);

$instituteCountQuery = "SELECT COUNT(*) FROM classroom WHERE institute_id = $instituteCode";
$instituteCountQueryResult = mysqli_fetch_row(mysqli_query($connection, $instituteCountQuery));

if ($instituteCountQueryResult[0] > 0)
{
    include 'views/permission_denied_dependency.php';
}
else
{
    $instituteSoftDeleteQuery =
    "UPDATE institute SET isActive = 0 WHERE id = $instituteCode";

    mysqli_query($connection, $instituteSoftDeleteQuery);

    header('location:index.php?page=institutes');
}
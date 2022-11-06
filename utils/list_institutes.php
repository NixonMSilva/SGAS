<?php

include 'db.php';

function listInstituteOptions ($connection)
{
    $query = "SELECT id, acronym, name FROM institute";
    $result = mysqli_query($connection, $query);
    if ($result)
    {
        while ($row = mysqli_fetch_array($result))
        {
            $id = $row['id'];
            $acronym = $row['acronym'];
            $name = $row['name'];
            echo "<option value = $id>$acronym - $name</option>";
        } 
    }
    else
    {
        echo "<option>Error</option>";
    } 
}
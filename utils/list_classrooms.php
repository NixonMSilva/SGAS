<?php

include 'db.php';

function listClassroomTable ($connection, $isManager)
{
    $query = 
    "SELECT classroom.room_code, institute.acronym, classroom.capacity, classroom.available, classroom.isActive
        FROM classroom 
        JOIN institute ON classroom.institute_id = institute.id";
    $result = mysqli_query($connection, $query);
    if ($result)
    {
        while ($row = mysqli_fetch_array($result))
        {
            if ($row['isActive'] == 1)
            {
                if ($isManager || $row['available'] == true)
                {
                    printRow($row);
                }
            }  
        } 
    }
}

function listSingleClassroom ($connection, $code)
{
    $query =
    "SELECT classroom.room_code, institute.acronym, classroom.capacity, classroom.available, classroom.isActive
    FROM classroom 
    JOIN institute ON classroom.institute_id = institute.id
    WHERE classroom.room_code = '$code'";
    $result = mysqli_query($connection, $query);
    if ($result)
        return mysqli_fetch_array($result);
    else
        return null;
}

function printRow ($row)
{
    $code = $row['room_code'];
    $acronym = $row['acronym'];
    $capacity = $row['capacity'];
    echo 
        "<tr>
            <th scope='row'>$code</th>
            <td>$acronym</td>
            <td>$capacity</td>
            <td><a href='#'>Alocar</a></td>";
    if (isManager($_SESSION['user_type']))
    {
        echo "<td><a href='./index.php?page=add_classroom&room_code=$code'>Alterar</a>";
        echo "<td><a href='./index.php?page=remove_classroom&room_code=$code'>Apagar</a>";
    }
    echo
        "</tr>";
}
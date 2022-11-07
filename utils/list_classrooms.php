<?php

include 'db.php';

function listClassroomTable ($connection)
{
    $query = 
    "SELECT classroom.room_code, institute.acronym, classroom.capacity 
        FROM classroom 
        JOIN institute ON classroom.institute_id = institute.id";
    $result = mysqli_query($connection, $query);
    if ($result)
    {
        while ($row = mysqli_fetch_array($result))
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
                echo "<td><a href='#'>Apagar</a>";
            }
            echo
                "</tr>";
        } 
    }
}
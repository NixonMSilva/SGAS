<?php

include 'db.php';

function listInstituteOptions ($connection)
{
    $query = "SELECT id, acronym, name, isActive FROM institute";
    $result = mysqli_query($connection, $query);
    if ($result)
    {
        while ($row = mysqli_fetch_array($result))
        {
            if ($row['isActive'] == true)
            {
                $id = $row['id'];
                $acronym = $row['acronym'];
                $name = $row['name'];
                echo "<option value = $id>$acronym - $name</option>";
            }
        } 
    }
    else
    {
        echo "<option>Error</option>";
    } 
}

function listInstituteTable ($connection)
{
    $query = "SELECT id, acronym, name, isActive FROM institute";
    $result = mysqli_query($connection, $query);
    if ($result)
    {
        while ($row = mysqli_fetch_array($result))
        {
            if ($row['isActive'] == true)
            {
                $id = $row['id'];
                $acronym = $row['acronym'];
                $name = $row['name'];

                echo 
                    "<tr>
                        <th scope='row'>$acronym</th>
                        <td>$name</td>";
                if (isAdmin($_SESSION['user_type']))
                {
                    echo "<td><a href='./index.php?page=add_institute&id=$id'>Alterar</a>";
                    echo "<td><a href='./index.php?page=remove_institute&id=$id'>Apagar</a>";
                }
                echo
                    "</tr>";
            }
            
        } 
    }
    else
    {
        echo "<option>Error</option>";
    } 
}

function listSingleInstitute ($connection, $id)
{
    $query = "SELECT id, acronym, name, isActive FROM institute WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if ($result)
        return mysqli_fetch_array($result);
    else
        return null;
}
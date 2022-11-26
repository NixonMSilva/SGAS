<?php

include 'db.php';

function listUserTable ($connection)
{
    $query = "SELECT id, name, cpf, email, telephone FROM user";
    $result = mysqli_query($connection, $query);
    if ($result)
    {
        while ($row = mysqli_fetch_array($result))
        {
            $id         = $row['id'];
            $name       = $row['name'];
            $cpf        = $row['cpf'];
            $email      = $row['email'];
            $telephone  = $row['telephone'];

            echo 
                "<tr>
                    <th scope='row'>$name</th>
                    <td>$cpf</td>
                    <td>$email</td>
                    <td>$telephone</td>";
            if (isAdmin($_SESSION['user_type']))
            {
                echo "<td><a href='?page=requests&userId=$id'>Ver Alocações</a>";
            }
            echo
                "</tr>";
        } 
    }
    else
    {
        echo "<option>Error</option>";
    } 
}

function listSingleUser ($connection, $id)
{
    $query = "SELECT name, cpf, email, telephone FROM user WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if ($result)
        return mysqli_fetch_array($result);
    else
        return null;
}
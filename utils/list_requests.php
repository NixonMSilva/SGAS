<?php

include 'db.php';

function listRequestTable ($connection, $isManager)
{
    $query = 
    "SELECT request_id, user.name, classroom_id, request_time_start, request_time_end, request_status, requested_at 
        FROM request 
        JOIN user ON requestor_id = user.id";
    $result = mysqli_query($connection, $query);
    if ($result)
    {
        while ($row = mysqli_fetch_array($result))
        {
            if ($row['request_status'] != 'R')
            {
                printRow($row);
            }  
        } 
    }
}

function listRequestByUserTable ($connection, $isManager, $userId)
{
    $result = listUserRequests($connection, $userId);
    while ($row = mysqli_fetch_array($result))
    {
        if ($row['request_status'] != 'R')
        {
            printRow($row);
        }  
    }
}

function listRequestByRoomTable ($connection, $isManager, $roomId)
{
    $result = listClassroomRequests($connection, $roomId);
    while ($row = mysqli_fetch_array($result))
    {
        if ($row['request_status'] != 'R')
        {
            printRow($row);
        }  
    }
}

function listSingleRequest ($connection, $requestId)
{
    $query =
    "SELECT request_id, user.name, classroom_id, request_time_start, request_time_end, request_status, requested_at 
        FROM request 
        JOIN user ON requestor_id = user.id 
        WHERE request_id = '$requestId'";
    $result = mysqli_query($connection, $query);
    if ($result)
        return mysqli_fetch_array($result);
    else
        return null;
}

function listUserRequests ($connection, $userId)
{
    $query =
    "SELECT request_id, user.name, classroom_id, request_time_start, request_time_end, request_status, requested_at 
        FROM request 
        JOIN user ON requestor_id = user.id 
        WHERE requestor_id = '$userId'";
    $result = mysqli_query($connection, $query);
    if ($result)
        return $result;
    else
        return null;
}

function listClassroomRequests ($connection, $roomId)
{
    $query =
    "SELECT request_id, user.name, classroom_id, request_time_start, request_time_end, request_status, requested_at 
        FROM request 
        JOIN user ON requestor_id = user.id 
        WHERE classroom_id = '$roomId'";
    $result = mysqli_query($connection, $query);
    if ($result)
        return $result;
    else
        return null;
}

function printRow ($row)
{
    $classroomCode      = $row['classroom_id'];
    $requestorName      = $row['name'];
    $requestTimeStart   = $row['request_time_start'];
    $requestTimeEnd     = $row['request_time_end'];
    $requestStatus      = translateRequestStatus($row['request_status']);
    $requestedAt        = $row['requested_at'];
    $requestStatusColor = getRequestStatusColor($row['request_status']);
    
    echo 
        "<tr>
            <th scope='row'>$classroomCode</th>
            <td>$requestorName</td>
            <td>$requestTimeStart</td>
            <td>$requestTimeEnd</td>
            <td style='color:$requestStatusColor;'>$requestStatus</td>
            <td>$requestedAt</td>";
    if (isManager($_SESSION['user_type']))
    {
        if ($row['request_status'] == 'A')
        {
            echo "<td><a href='./index.php?page=add_classroom&room_code=$classroomCode'>Marcar Pendente</a></td>";
        }
        else
        {
            echo "<td><a href='./index.php?page=remove_classroom&room_code=$classroomCode'>Aprovar</a></td>";
        }

        if ($row['request_status'] == 'R')
        {
            echo "<td><a href='./index.php?page=remove_classroom&room_code=$classroomCode'>Desfazer Rejeição</a></td>";
        }
        else 
        {
            echo "<td><a href='./index.php?page=remove_classroom&room_code=$classroomCode'>Rejeitar</a></td>";
        }
        
    }
    echo
        "</tr>";
}

function translateRequestStatus ($requestStatus)
{
    switch ($requestStatus)
    {
        case "P":
            return "Pendente";
        case "A":
            return "Aprovada";
        case "R":
            return "Rejeitada";
        default:
            return "NULL";
    }
}

function getRequestStatusColor ($requestStatus)
{
    switch ($requestStatus)
    {
        case "P":
            return "#ffc107";
        case "A":
            return "#198754";
        case "R":
            return "#dc3545";
        default:
            return "#000000";
    }
}
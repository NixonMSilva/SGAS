<?php

include 'db.php';
include 'convert_timestamp.php';

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
            if (($row['request_status'] != 'R' && $row['request_status'] != 'E') || isManager())
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
        if (($row['request_status'] != 'R' && $row['request_status'] != 'E') || isManager())
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
        if (($row['request_status'] != 'R' && $row['request_status'] != 'E') || isManager())
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
    $requestId          = $row['request_id'];
    $classroomCode      = $row['classroom_id'];
    $requestorName      = $row['name'];
    $requestDate        = convertTimestampDate($row['request_time_start']);
    $requestTimeStart   = convertTimestampHour($row['request_time_start']);
    $requestTimeEnd     = convertTimestampHour($row['request_time_end']);
    $requestStatus      = translateRequestStatus($row['request_status']);
    $requestedAt        = convertTimestampFull($row['requested_at']);
    $requestStatusColor = getRequestStatusColor($row['request_status']);
    
    echo 
        "<tr>
            <th scope='row'>$classroomCode</th>
            <td>$requestorName</td>
            <td>$requestDate</td>
            <td>$requestTimeStart</td>
            <td>$requestTimeEnd</td>
            <td style='color:$requestStatusColor;'>$requestStatus</td>
            <td>$requestedAt</td>";
    if (isManager())
    {
        if ($row['request_status'] != 'E')
        {
            if ($row['request_status'] == 'A')
            {
                echo "<td><a href='./index.php?page=reset_request&requestId=$requestId'>Marcar Pendente</a></td>";
            }
            else
            {
                echo "<td><a href='./index.php?page=approve_request&requestId=$requestId'>Aprovar</a></td>";
            }

            if ($row['request_status'] == 'R')
            {
                echo "<td><a href='./index.php?page=reset_request&requestId=$requestId'>Desfazer Rejeição</a></td>";
            }
            else 
            {
                echo "<td><a href='./index.php?page=reject_request&requestId=$requestId'>Rejeitar</a></td>";
            }
        }
        else
        {
            echo "<td>-</td><td>-</td>";
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
        case "E":
            return "Expirada";
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
        case "E":
            return "#ff6619";
        default:
            return "#000000";
    }
}
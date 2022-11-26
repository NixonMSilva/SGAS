<?php

function setRoute ($page)
{
    switch ($page)
    {
        case 'home':
            pageHome();
            break;

        case 'signup':
            include 'views/sign_up.php';
            break;

        case 'users':

            if (isAdmin($_SESSION['user_type']))
                include 'views/users.php';
            else
                pagePermissionDenied();
            break;

        case 'add_classroom':

            if (isManager($_SESSION['user_type']))
                include 'views/add_classroom.php';
            else
                pagePermissionDenied();
            break;

        case 'classrooms':

            if (isset($_SESSION['is_logged']))
                include 'views/classrooms.php';
            else
                pagePermissionDenied();
            break;
        
        case 'remove_classroom':

            if (isAdmin($_SESSION['user_type']))
                include 'remove_classroom.php';
            else
                pagePermissionDenied();
            break;

        case 'institutes':

            if (isAdmin($_SESSION['user_type']))
                include 'views/institutes.php';
            else
                pagePermissionDenied();
            break;

        case 'add_institute':

            if (isAdmin($_SESSION['user_type']))
                include 'views/add_institute.php';
            else
                pagePermissionDenied();
            break;

        case 'remove_institute':

            if (isAdmin($_SESSION['user_type']))
                include 'remove_institute.php';
            else
                pagePermissionDenied();
            break;

        case 'requests':

            if (isManager($_SESSION['user_type']))
                include 'views/requests.php';
            else
                pagePermissionDenied();
            break;

        case 'userRequests':

            if (isset($_SESSION['is_logged']))
            {
                $_GET['userId'] = $_SESSION['user_id'];
                include 'views/requests.php';
            }
            else
                pagePermissionDenied();
            break;

        case 'classroomRequests':

            if (isset($_SESSION['is_logged']))
                include 'views/requests.php';
            else
                pagePermissionDenied();
            break;

        case 'add_request':

            if (isset($_SESSION['is_logged']))
                include 'views/add_request.php';
            else
                pagePermissionDenied();
            break;

        case 'approve_request':

            if (isManager($_SESSION['user_type']) && isset($_GET['requestId']))
            {
                $requestId = $_GET['requestId'];
                header("location:approve_request.php?id=$requestId");
            }
            else
                pagePermissionDenied();
            break;
        
        case 'reject_request':

            if (isManager($_SESSION['user_type']) && isset($_GET['requestId']))
            {
                $requestId = $_GET['requestId'];
                header("location:reject_request.php?id=$requestId");
            }
            else
                pagePermissionDenied();
            break;

        case 'reset_request':

            if (isManager($_SESSION['user_type']) && isset($_GET['requestId']))
            {
                $requestId = $_GET['requestId'];
                header("location:reset_request.php?id=$requestId");
            }
            else
                pagePermissionDenied();
            break;

        default:
            pageHome();
            break;
    }
}

function pageHome ()
{
    include 'views/home.php';
}

function pagePermissionDenied()
{
    include 'views/permission_denied.php';
}

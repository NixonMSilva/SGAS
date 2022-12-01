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

            if (isAdmin())
                include 'views/users.php';
            else
                pagePermissionDenied();
            break;

        case 'add_classroom':

            if (isManager())
                include 'views/add_classroom.php';
            else
                pagePermissionDenied();
            break;

        case 'classrooms':

            if (isLogged())
                include 'views/classrooms.php';
            else
                pagePermissionDenied();
            break;
        
        case 'remove_classroom':

            if (isAdmin())
                include 'remove_classroom.php';
            else
                pagePermissionDenied();
            break;

        case 'institutes':

            if (isAdmin())
                include 'views/institutes.php';
            else
                pagePermissionDenied();
            break;

        case 'add_institute':

            if (isAdmin())
                include 'views/add_institute.php';
            else
                pagePermissionDenied();
            break;

        case 'remove_institute':

            if (isAdmin())
                include 'remove_institute.php';
            else
                pagePermissionDenied();
            break;

        case 'requests':

            if (isManager())
                include 'views/requests.php';
            else
                pagePermissionDenied();
            break;

        case 'userRequests':

            if (isLogged())
            {
                $_GET['userId'] = $_SESSION['user_id'];
                include 'views/requests.php';
            }
            else
                pagePermissionDenied();
            break;

        case 'classroomRequests':

            if (isLogged())
                include 'views/requests.php';
            else
                pagePermissionDenied();
            break;

        case 'add_request':

            if (isLogged())
                include 'views/add_request.php';
            else
                pagePermissionDenied();
            break;

        case 'approve_request':

            if (isManager() && isset($_GET['requestId']))
            {
                $requestId = $_GET['requestId'];
                header("location:approve_request.php?id=$requestId");
            }
            else
                pagePermissionDenied();
            break;
        
        case 'reject_request':

            if (isManager() && isset($_GET['requestId']))
            {
                $requestId = $_GET['requestId'];
                header("location:reject_request.php?id=$requestId");
            }
            else
                pagePermissionDenied();
            break;

        case 'reset_request':

            if (isManager() && isset($_GET['requestId']))
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
    include 'views/error_page.php';
    printErrorAccessDenied('index.php?page=home');
}

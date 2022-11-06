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
            include 'views/classrooms.php';
            break;

        case 'requests':
            include 'views/requests.php';
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

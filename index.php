<?php

# Includes
include 'includes.php';

# Header
include 'partials/header.php';

# Database Connection
include 'db.php';

# Page Content
if (isset($_GET['page']))
{
    $page = $_GET['page'];
}
else
{
    $page = 'home';
}

switch ($page)
{
    case 'login':
        include 'views/login.php';
        break;
    case 'signup':
        include 'views/sign_up.php';
        break;
    case 'users':
        include 'views/users.php';
        break;
    case 'classrooms':
        include 'views/classrooms.php';
        break;
    case 'requests':
        include 'views/requests.php';
        break;
    default:
        include 'views/home.php';
        break;
}

# Footer
include 'partials/footer.php';

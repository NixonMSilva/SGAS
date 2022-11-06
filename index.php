<?php

# Session
session_start();

# Includes
include 'includes.html';

# Utils
include 'utils/check_user.php';

# Routes
include 'routes.php';

# Database Connection
include 'db.php';

# Header
include 'partials/header.php';

if (isset($_GET['page']))
{
    setRoute($_GET['page']);
}
else
{
    setRoute('home');
}

# Footer
include 'partials/footer.php';

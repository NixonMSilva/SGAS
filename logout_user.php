<?php

session_start();

if (isset($_SESSION['is_logged']))
{
    unset($_SESSION['is_logged']);  
    unset($_SESSION['user_id']);   
    unset($_SESSION['user_name']);  
    unset($_SESSION['user_type']);
}

header('location:index.php');
<?php 
    session_start();
    session_unset();
    session_destroy();
    header('location:/DOANCS22/user/menu.php');
?>
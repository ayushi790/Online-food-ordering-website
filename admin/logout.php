<?php
    session_start();
    include('config/constants.php');

    //end the session
    session_destroy();

    //redirect to login page
    header('location:'.SITEURL.'admin/login.php');

?>
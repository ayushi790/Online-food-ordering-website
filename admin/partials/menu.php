<?php

    session_start();
    $now = time();
    if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
        // this session has worn out its welcome; kill it and start a brand new one
        session_unset();
        session_destroy();
        session_start();
    }
    // either new or old, it should live at most for another hour
    $_SESSION['discard_after'] = $now + 3600;
    include('config/constants.php');

    if(!isset($_SESSION['user'])){
        //redirect to login page
        $_SESSION['no_login']="Please login to access admin panel";
        echo $_SESSION['no_login'];
        //redirect to login page
        header('location:'.SITEURL.'admin/login.php');
    }else{

    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8 without BOM">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn:ital,wght@1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/yourStyles.css?<?php echo time(); ?>" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
</head>
<body>

    <!-- header section starts -->
    <div id="header">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="manageAdmin.php">Admin</a></li>
                <li><a href="manageCategory.php">Category</a></li>
                <li><a href="manageFood.php">Food</a></li>
                <li><a href="manageOrder.php">Order</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
        </nav>

        <div class="fas fa-hamburger"></div>

        <a href="#" class="logo"><img src="../images/symbol.png" alt=""></a>

</div>
    <!-- header section ends -->


    

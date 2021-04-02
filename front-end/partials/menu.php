<?php
    include('admin/config/constants.php'); 
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering Website</title>
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" href="img.png">
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn:ital,wght@1,500&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
</head>

<body>

    <!-- header section starts -->
    <header id="header">
        <nav>
            <ul>
                <li><a href="<?php echo SITEURL;?>">home</a></li>
                <li><a href="<?php echo SITEURL;?>#category">categories</a></li>
                <li><a href="<?php echo SITEURL;?>#about">about</a></li>
                <li><a href="<?php echo SITEURL;?>#dishes">dishes</a></li>
                <li><a href="<?php echo SITEURL;?>#contact">contact</a></li>
                <li><form action="<?php echo SITEURL;?>food-search.php" method="POST" class="searchForm">
                    <input type="search" name="search" placeholder="search for dish" class="search">
                    <input type="submit" name = "submit" class="search">
                </form></li>
            </ul>
        </nav>

        <div class="fas fa-hamburger"></div>
        <a href="<?php echo SITEURL;?>" class="logo"><img src="symbol.png" alt=""></a>


    </header>
    <!-- header section ends -->

<?php   
    session_start(); 
    unset($_SESSION["session"]);
    include('config/constants.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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

<section id="Form" class="container-fluid">

    <div class="heading text-center">
        <h1>Login</h1>
        <h4>
            <?php
                if(isset($_SESSION['login_status'])){    //add session 
                    echo $_SESSION['login_status'];      //display session messsage
                    unset($_SESSION['login_status']);    //removing the session
                }
                if(isset($_SESSION['no_login'])){    //add session 
                    echo $_SESSION['no_login'];      //display session messsage
                    unset($_SESSION['no_login']);    //removing the session
                }
            ?>
       </h4>
    </div>

    <div class="row justify-content-center">

        <form action="" class="col-md-6" method="POST">

            <div class="inputBox">
                <input type="text" name="username" required>
                <h3>Username</h3>
            </div>

            <div class="inputBox">
                <input type="password" name="password" required>
                <h3>Password</h3>
            </div>

            <input type="submit" name = "submit" value="Login">

        </form>

    </div>

</section>

<?php include('partials/footer.php')?>

<?php
        //check whether the submit button is clicked or not
    if(isset($_POST['submit'])){
        echo "clicked";

        $username=$_POST['username'];
        $password=md5($_POST['password']);

        //create sql query to check whether user exist or not
        $sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //execute the query
        $res = mysqli_query($conn, $sql);
        
        $count=mysqli_num_rows($res);
        if($count==1){
            //user exist
            $_SESSION['login_status']="Login Successful";
            $_SESSION['user']=$username;    //to check whether the user is logged in or not
            //redirect to homepage
            header('location:'.SITEURL.'admin/');

        }else{
            //user not exist
            $_SESSION['login_status']="<span>Login Unsuccessful!! Username and password do not match</span>";
            //redirect to login page
            header('location:'.SITEURL.'admin/login.php');
        }
    }
?>
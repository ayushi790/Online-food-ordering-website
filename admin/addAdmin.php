<?php
    include('partials/menu.php');
    
?>
    <!-- main section starts -->
    <section id="Form" class="container-fluid">

    <div class="heading text-center">
        <h1>Add Admin</h1>
        <h4><span>
        <?php 
            if (isset($_SESSION['add'])){   //add session message
                echo $_SESSION['add'];      //display session message
                unset($_SESSION['add']);    //removing the session
            }
        ?>
        </span></h4>
    </div>

    <div class="row justify-content-center">

        <form action="" class="col-md-7" method="POST">

            <div class="inputBox">
                <input type="text" name = "full_name" required>
                <h3>Full name</h3>
            </div>

            <div class="inputBox">
                <input type="text" name="username" required>
                <h3>Username</h3>
            </div>

            <div class="inputBox">
                <input type="password" name="password" required>
                <h3>Password</h3>
            </div>

            <input type="submit" name = "submit" value="Add admin">

        </form>

    </div>

</section>

<!-- main section ends -->

<?php include('partials/footer.php')?>

<?php
    // process the value from form and save it in database
    //check whether the submit button is clicked or not

    if(isset($_POST['submit'])){
        //button clicked
        
        //get the data from form
        $full_name=$_POST['full_name'];
        $username=$_POST['username'];
        $password=md5($_POST['password']);  //Password encryption with md5

        //sql query to save data into database
        $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";

        //Execute query and save data in database

        //include('config/constants.php');
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //Check whether data is inserted or not
        if($res==TRUE){
            //data inserted
            //create a session variable to display message
            $_SESSION['add']="Admin added successfully!!";
            //redirect page
            header('location:'.SITEURL.'admin/manageAdmin.php');
        }
        else{
            //data not inserted
            //create a session variable to display message
            $_SESSION['add']="Admin not added!!";
            //redirect page
            header('location:'.SITEURL.'admin/addAdmin.php');
        }
    }
?>
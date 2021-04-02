<?php
    include('partials/menu.php');
 ?>
    <!-- main section starts -->


    <section id="Form" class="container-fluid">

    <div class="heading text-center">
        <h1>Update Admin</h1>
        <h4><span>
        <?php 
            if (isset($_SESSION['update'])){   //add session message
                echo $_SESSION['update'];      //display session message
                unset($_SESSION['update']);    //removing the session
            }
        ?>
        </span></h4>
    </div>

    <?php
        
        //get the id of the admin selected
        $id=$_GET['id'];
        
        //create sql suery
        $sql="SELECT * FROM tbl_admin WHERE id=$id";
        
        //execute the query
        $res=mysqli_query($conn, $sql);

        //check whether the query is executed or not
        if($res==true){
            //check if data is available or not
            $count = mysqli_num_rows($res);
            if($count==1){
                //get the details
                $rows=mysqli_fetch_assoc($res);
                $full_name = $rows['full_name'];
                $username = $rows['username'];
            }
        }else{
            //redirect to managAdmin page
            header('location:'.SITEURL.'admin/manageAdmin.php');
        }

    ?>

    <div class="row justify-content-center">

        <form action="" class="col-md-7" method="POST">

            <div class="inputBox">
                <input type="text" name = "full_name" value="<?php echo $full_name ?>">
            </div>

            <div class="inputBox">
                <input type="text" name="username" value="<?php echo $username ?>">
            </div>

            <input type="submit" name = "submit" value="Update admin" >

        </form>

    </div>

</section>

<!-- main section ends -->


<?php

    //check if submit buttton is clicked or not
    if(isset($_POST['submit'])){
        //update the details
        $full_name=$_POST['full_name'];
        $username=$_POST['username'];
            
        //create sql query to update admin
        $sql="UPDATE tbl_admin 
        SET full_name='$full_name',
            username='$username'
        WHERE id='$id'
        ";
        //execue the query
        
        $res=mysqli_query($conn, $sql);
        if($res==TRUE){
            //Query executed and admin updated
            $_SESSION['update']="Details updated successfully!!";
            //redirect to manageAdminpage
            header('location:'.SITEURL.'admin/manageAdmin.php');
        }else{
            //Failed to update Admin
            $_SESSION['update']="Details failed to update!!";
            header('location:'.SITEURL.'admin/updateAdmin.php');
        }
    }
?>

<?php include('partials/footer.php')?>
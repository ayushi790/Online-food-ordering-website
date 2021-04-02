<?php
    include('partials/menu.php');
?>

<!-- main section starts -->


<section id="Form" class="container-fluid">

    <div class="heading text-center">
        <h1>Change Password</h1>
        <h4>
            <?php 
                if(isset($_SESSION['pwd_not_match'])){    //add session 
                    echo $_SESSION['pwd_not_match'];      //display session messsage
                    unset($_SESSION['pwd_not_match']);    //removing the session
                }
            ?>
        </h4>
    </div>

    <div class="row justify-content-center">

        <form action="" class="col-md-7" method="POST">

            <div class="inputBox">
                <input type="password" name = "currentPassword" required>
                <h3>Current Password</h3>
            </div>

            <div class="inputBox">
                <input type="password" name="newPassword" required>
                <h3>New Password</h3>
            </div>

            <div class="inputBox">
                <input type="password" name="confirmPassword" required>
                <h3>Confirm Password</h3>
            </div>

            <input type="submit" name = "submit" value="Change Password">

        </form>

    </div>

</section>
<!-- main section ends -->

<?php include('partials/footer.php')?>

<?php
    if(isset($_POST['submit'])){
        //get the data from form
        $id = $_GET['id'];
        $currentPassword = md5($_POST['currentPassword']);
        $newPassword = md5($_POST['newPassword']);
        $confirmPassword = md5($_POST['confirmPassword']);


        //create sql query
        $sql="SELECT * FROM tbl_admin WHERE id=$id AND password='$currentPassword'";

        //execute query
        $res=mysqli_query($conn,$sql);

        if($res==TRUE){
            $count = mysqli_num_rows($res);
            if($count==1){
                //user exist and pwd can be changed
                //check new and confirm password match or not
                if($newPassword==$confirmPassword){

                    //update the password
                    $sql2="UPDATE tbl_admin SET password='$newPassword' WHERE id=$id ";

                    //execute the query
                    $res2=mysqli_query($conn,$sql2);

                    if($res2==TRUE){
                        //Display success message
                        $_SESSION['changePwd']="Password changed successfully";
                        //redirect page
                        header('location:'.SITEURL.'admin/manageAdmin.php');
                    }
                }else{

                    //display msg "new password should be equal to confirm password"
                    $_SESSION['pwd_not_match']="<span>New password and Confirm Password should be equal!!</span>";
                     //redirect page
                    header('location:'.SITEURL.'admin/changePassword.php');
                }
            }else{
                //user does not exist
                $_SESSION['status']="<span>User not Found</span>";
                //redirect page
                header('location:'.SITEURL.'admin/manageAdmin.php');
            }
        }

    }

?>
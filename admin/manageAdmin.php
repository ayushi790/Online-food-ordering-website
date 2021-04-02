<?php 
    include('partials/menu.php');
?>

<!-- main section starts -->
<link rel="stylesheet" type="text/css" href="css/yourStyles.css?<?php echo time(); ?>" />

<section id="main" class="container-fluid">
    <div class="heading ">
        <h1>Manage Admin</h1>
        <h4>
        <?php 
            if(isset($_SESSION['add'])){    //add session 
                echo $_SESSION['add'];      //display session messsage
                unset($_SESSION['add']);    //removing the session
            }
            if(isset($_SESSION['delete'])){    //add session 
                echo $_SESSION['delete'];      //display session messsage
                unset($_SESSION['delete']);    //removing the session
            }
            if(isset($_SESSION['update'])){    //add session 
                echo $_SESSION['update'];      //display session messsage
                unset($_SESSION['update']);    //removing the session
            }
            if(isset($_SESSION['status'])){    //add session 
                echo $_SESSION['status'];      //display session messsage
                unset($_SESSION['status']);    //removing the session
            }
            if(isset($_SESSION['changePwd'])){    //add session 
                echo $_SESSION['changePwd'];      //display session messsage
                unset($_SESSION['changePwd']);    //removing the session
            }

        ?>

        </h4>
       <!-- Admin added successfully -->

        <!-- button to add admin -->
        <a href="<?php echo SITEURL;?>admin/addAdmin.php"><button class="btn-primary">Add Admin</button></a>

        <table class = "tbl_full">
            <tr>
                <th>S.No</th>
                <th>Full name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            
            <?php

                //query to get all admins
                $sql = "SELECT * FROM tbl_admin";

                //execute the query
                $res = mysqli_query($conn, $sql);

                //check whether the query is executed or not
                if($res==TRUE){
                    //query is executed
                    //count no of rows to check whether there is data in database or not
                    $count = mysqli_num_rows($res);

                    //check if there is data in database
                    if($count>0){
                        //there is data in database

                        //for unique id
                        $sn = 1;
                        while($rows=mysqli_fetch_assoc($res)){

                            //using while loop to get all data from database
                            $id = $rows['id'];
                            $full_name = $rows['full_name'];
                            $username = $rows['username'];

                            ?>
                            <tr>
                                <td><?php echo $sn ?></td>
                                <td><?php echo $full_name?></td>
                                <td><?php echo $username?></td>
                                <td>
                                <a href="<?php echo SITEURL;?>admin/changePassword.php?id=<?php echo $id;?>"><button class="btn-primary">Change Password</button></a>
                                <a href="<?php echo SITEURL;?>admin/updateAdmin.php?id=<?php echo $id;?>"><button class="btn-secondary">Update Admin</button></a>
                                <a href="<?php echo SITEURL;?>admin/deleteAdmin.php?id=<?php echo $id;?>"><button class="btn-danger">Delete Admin</button></a>
                            </td>
                        </tr>
                            <?php
                            $sn++;
                        }
                    }
                    else{
                        ?>
                        <tr>
                            <td><h4><span>No admin added</span></h4></td>
                        </tr>
                        <?php
                    }
                }
            ?>
        </table>
  </div>
</section>

<!-- main section ends -->

<?php include('partials/footer.php')?>
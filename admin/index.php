<?php
    include('partials/menu.php');
    
?>

    <!-- main section starts -->

    <section id="main" class="container-fluid">

    <div class="heading text-center padding-top=20rem">
            <h1>Dashboard</h1>
            <h4>
                <?php
                    if(isset($_SESSION['login_status'])){    //add session 
                        echo $_SESSION['login_status'];      //display session messsage
                        unset($_SESSION['login_status']);    //removing the session
                }
            ?>
            </h4>
    </div>


        <div class="box-container">

            <a href="<?php echo SITEURL;?>admin/manageCategory.php"><div class="box">
                <?php
                    //calculate total no of categories
                    $sql = "SELECT * FROM tbl_category";
                                    
                    //execute the query
                    $res = mysqli_query($conn, $sql);

                    //count no of rows to check whether there is data in database or not
                    $count = mysqli_num_rows($res);
                ?>
                <h1><?php echo $count?></h1>
                <p>Categories</p>
            </div></a>

            <a href="<?php echo SITEURL;?>admin/manageFood.php"><div class="box">
                <?php
                    //calculate total no of foods
                    $sql2 = "SELECT * FROM tbl_dishes";
                                    
                    //execute the query
                    $res2 = mysqli_query($conn, $sql2);

                    //count no of rows to check whether there is data in database or not
                    $count2 = mysqli_num_rows($res2);
                ?>
            <h1><?php echo $count2?></h1>
                <p>Foods</p>
            </div></a>

            <a href="<?php echo SITEURL;?>admin/manageorder.php"><div class="box">
                <?php
                    //calculate total no of orders
                    $sql3 = "SELECT * FROM tbl_order";
                                    
                    //execute the query
                    $res3 = mysqli_query($conn, $sql3);

                    //count no of rows to check whether there is data in database or not
                    $count3 = mysqli_num_rows($res3);
                ?>
                <h1><?php echo $count3;?></h1>
                <p>Orders</p></a>
            </div>

            <a href="<?php echo SITEURL;?>admin/manageorder.php"><div class="box">
                <?php
                    $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='DELIVERED'";

                    //execute the query
                    $res4 = mysqli_query($conn, $sql4);

                    //get the value
                    $rows = mysqli_fetch_assoc($res4);
                    $total_revenue = $rows['Total'];
                ?>
                <h1><?php echo $total_revenue?></h1>
                <p>Revenue generated</p>
            </div></a>

        </div>
       
    
    </section>

    <!-- main section ends -->


   <?php include('partials/footer.php')

   ?>
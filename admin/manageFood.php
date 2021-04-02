<?php include('partials/menu.php')  ?>

<!-- main section starts -->

<section id="main" class="container-fluid">
    <div class="heading">
        <h1>Manage Food</h1>
        <h4>
        <?php 
            if (isset($_SESSION['addFood'])){   //add session message
                echo $_SESSION['addFood'];      //display session message
                unset($_SESSION['addFood']);    //removing the session
            }
            if (isset($_SESSION['delete'])){   //add session message
                echo $_SESSION['delete'];      //display session message
                unset($_SESSION['delete']);    //removing the session
            }
            if (isset($_SESSION['remove'])){   //add session message
                echo $_SESSION['remove'];      //display session message
                unset($_SESSION['remove']);    //removing the session
            }
            if (isset($_SESSION['no_food'])){   //add session message
                echo $_SESSION['no_food'];      //display session message
                unset($_SESSION['no_food']);    //removing the session
            }
            if (isset($_SESSION['update'])){   //add session message
                echo $_SESSION['update'];      //display session message
                unset($_SESSION['update']);    //removing the session
            }
            if (isset($_SESSION['upload'])){   //add session message
                echo $_SESSION['upload'];      //display session message
                unset($_SESSION['upload']);    //removing the session
            }
        ?>
        </h4>
    </div>
    <!-- button to add admin -->
    <a href="<?php echo SITEURL;?>admin/addFood.php"><button class="btn-primary">Add Food</button></a>

    <table class = "tbl_full">
        <tr>
            <th>S.No</th>
            <th>Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Featured</th>
            <th>Active</th>
            <th>Actions</th>
        </tr>
        <?php
        //create a query 
        $sql="SELECT * FROM tbl_dishes";
        //execute the query
        $res=mysqli_query($conn,$sql);
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
                    $title=$rows['title'];
                    $price = $rows['price'];
                    $image_name = $rows['image_name'];
                    $featured = $rows['featured'];
                    $active = $rows['active'];

                    ?><tr>
                        <td><?php echo $sn++ ?></td>
                        <td><?php echo $title?></td>
                        <td><?php echo $price?></td>
                        <td>
                            <?php
                                //check if image name is available or not
                                if($image_name!=''){
                                    //display the image
                                    ?>
                                    <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" width="100px">
                                    <?php
                                }else{
                                    echo "<h4><span>Image not added</span></h4>";
                                }
                            ?>
                        </td>
                        <td><?php echo $featured?></td>
                        <td><?php echo $active?></td>
                        <td>
                            <a href="<?php echo SITEURL;?>admin/updateFood.php?id=<?php echo $id;?>"><button class="btn-secondary">Update Food</button></a>
                            <a href="<?php echo SITEURL;?>admin/deleteFood.php?id=<?php echo $id;?>&image_name=<?php echo $image_name?>"><button class="btn-danger">Delete food</button></a>
                        </td>
                    </tr>
                    <?php
                }
            }
            else{
                ?>
                <tr>
                    <td><h4><span>No category added</span></h4></td>
                </tr>
                <?php
            }
        }?>
    </table>
</section>

<!-- main section ends -->

<?php include('partials/footer.php') ?>
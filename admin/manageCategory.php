<?php
include('partials/menu.php'); ?>

<!-- main section starts -->

<section id="main" class="container-fluid">
    <div class="heading ">
        <h1>Manage Category</h1>
        <h4>
        <?php 
            if (isset($_SESSION['addCategory'])){   //add session message
                echo $_SESSION['addCategory'];      //display session message
                unset($_SESSION['addCategory']);    //removing the session
            }
            if (isset($_SESSION['remove'])){   //add session message
                echo $_SESSION['remove'];      //display session message
                unset($_SESSION['remove']);    //removing the session
            }
            if (isset($_SESSION['delete'])){   //add session message
                echo $_SESSION['delete'];      //display session message
                unset($_SESSION['delete']);    //removing the session
            }
            if (isset($_SESSION['no_category'])){   //add session message
                echo $_SESSION['no_category'];      //display session message
                unset($_SESSION['no_category']);    //removing the session
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
    <a href="<?php echo SITEURL;?>admin/addCategory.php"><button class="btn-primary">Add Category</button></a>

<table class = "tbl_full">
    <tr>
        <th>S.No</th>
        <th>Title</th>
        <th>Image</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Actions</th>
    </tr>

    <?php
        //create a query 
        $sql="SELECT * FROM tbl_category";
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
                    $image_name = $rows['image_name'];
                    $featured = $rows['featured'];
                    $active = $rows['active'];

                    ?><tr>
                        <td><?php echo $sn++ ?></td>
                        <td><?php echo $title?></td>
                        <td>
                            <?php
                                //check if image name is available or not
                                if($image_name!=''){
                                    //display the image
                                    ?>
                                    <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" width="100px">
                                    <?php
                                }else{
                                    echo "<h4><span>Image not added</span></h4>";
                                }
                            ?>
                        </td>
                        <td><?php echo $featured?></td>
                        <td><?php echo $active?></td>
                        <td>
                            <a href="<?php echo SITEURL;?>admin/updateCategory.php?id=<?php echo $id;?>"><button class="btn-secondary">Update Category</button></a>
                            <a href="<?php echo SITEURL;?>admin/deleteCategory.php?id=<?php echo $id;?>&image_name=<?php echo $image_name?>"><button class="btn-danger">Delete Category</button></a>
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

<?php include('partials/footer.php')
?>
<?php
    include('front-end/partials/menu.php');
?>
<!-- dishes section starts  -->

<section id="dishes" class="container-fluid">

<div class="heading text-center">
    <?php
        $search=$_POST['search'];
    ?>
    <h1>Results for <span><?php echo $search;?></span></h1>
    <p>Beyond the boundaries of taste</p>
    <p>Hurry!! Order now!</p>
</div>


<div class="card-container">
    <?php
        $sql="SELECT * FROM tbl_dishes WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
        //execute the query
         $res=mysqli_query($conn,$sql);
        //count no of rows to check whether there is data in database or not
        // $res = mysqli_query($conn, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($conn), E_USER_ERROR);
        $count = mysqli_num_rows($res);
        
        if($count>0){
            //there is data in database
            while($rows=mysqli_fetch_assoc($res)){
                $id_dish=$rows['id'];
                $title_dish=$rows['title'];
                $image_name_dish=$rows['image_name'];
                $description=$rows['description'];
                $price=$rows['price'];
                ?>

                <!-- display foods-->
                <div class="card">
                    <?php
                        if($image_name_dish==''){
                            ?>
                            <img src="<?php echo SITEURL;?>img.png" alt="">
                            <?php
                        }else{
                            ?>
                            <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name_dish;?>" alt="">
                            <?php
                        }
                    ?>
                    <h2><?php echo $title_dish;?></h2>
                    <h4>Price: Rs.<?php echo $price;?>/-</h4>
                    <p><?php echo $description;?></p>
                    <a href="<?php echo SITEURL;?>order.php"><button>order now</button></a>
                </div>
                
                <?php
            }
        }else{
            echo "<div class='error'><h1>Sorry, there are no matching result for $search.<br><br>1. Try more general words.<br>2. Try different words with similar meaning<br>3. Please check your spelling</h1></div>";
        }
    ?>
</div>
</section>

<!-- dishes section ends  -->
<?php
    include('front-end/partials/footer.php');
?>
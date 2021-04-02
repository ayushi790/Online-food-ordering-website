<?php
    include('front-end/partials/menu.php');
?>

<!-- category section starts  -->

<section id="category" class="container">

    <div class="heading text-center">
        <h1>All <span>Categories</span></h1>
        <p>Mouth-watering Food in your Budget!</p>
    </div>
    

    <div class="box-container">

        <?php
            //code to display categories from database
            $sql="SELECT * FROM tbl_category WHERE active='YES'";
            //execute the query
            $res=mysqli_query($conn,$sql);
            //count no of rows to check whether there is data in database or not
            $count = mysqli_num_rows($res);
            //check if there is data in database
            if($count>0){
                //there is data in database
                while($rows=mysqli_fetch_assoc($res)){
                    $id=$rows['id'];
                    $title=$rows['title'];
                    $image_name=$rows['image_name'];
                    ?>
                    <div class="box">
                        <?php
                            if($image_name==''){
                                ?>
                                <img src="<?php echo SITEURL;?>img.png" alt="">
                                <?php
                            }else{
                                ?>
                                <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name?>" alt="">
                                <?php
                            }
                        ?>
                        <div class="info">
        
                            <p><?php echo $title;?></p>
                            <a href="<?php echo SITEURL;?>category-food.php?id=<?php echo $id?>"><button>view</button></a>
                        </div>
                    </div>
                    <?php
                }
            }else{
                echo "<div class='error'><h1>Category not added</h1></div>";
        }?>
    </div>
</section>

<!-- category section ends  -->
<?php
    include('front-end/partials/footer.php');
?>
<?php
    include('front-end/partials/menu.php');
?>
    <!-- dishes section starts  -->

    <section id="dishes" class="container-fluid">

        <div class="heading text-center">
            <h1>All <span>Dishes</span></h1>
            <p>Food that you get it when you click it!</p>
        </div>


        <div class="card-container">
            <?php
                //code to display categories from database
                $sql2="SELECT * FROM tbl_dishes WHERE active='YES'";
                //execute the query
                $res2=mysqli_query($conn,$sql2);
                //count no of rows to check whether there is data in database or not
                $count2 = mysqli_num_rows($res2);
                //check if there is data in database
                if($count2>0){
                    //there is data in database
                    while($rows2=mysqli_fetch_assoc($res2)){
                        $id_dish=$rows2['id'];
                        $title_dish=$rows2['title'];
                        $image_name_dish=$rows2['image_name'];
                        $description=$rows2['description'];
                        $price=$rows2['price'];
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
                            <a href="<?php echo SITEURL;?>order.php?id=<?php echo $id_dish;?>"><button>order now</button></a>
                        </div>
                        
                        <?php
                    }
                }else{
                    echo "<h1><span>Food not added</span></h1>";
                }
            ?>
        </div>
    </section>

    <!-- dishes section ends  -->
<?php
    include('front-end/partials/footer.php');
?>
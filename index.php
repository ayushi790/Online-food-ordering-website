<?php
    include('front-end/partials/menu.php');
?>
    <!-- home section starts  -->

    <section id="home" class="container-fluid">

        <div class="row min-vh-100 align-items-center">

            <div class="col-md-8 ml-md-5 text-md-left text-center content">
                <h1>there is no sincere love than the love of food</h1>
                <h2>enjoy the marvelous taste at your doorstep!</h2>
                <p>Good food never fail in bringing people together. So what are you waiting for? Come join us today with your friends and family</p>
                <p> Food that you can't resist awaits you!!</p>
                <a href="<?php echo SITEURL;?>#dishes"><button>get started</button></a>
                <?php
                    if(isset($_SESSION['order'])){
                        echo $_SESSION['order'];
                        unset($_SESSION['order']);
                    }
                    ?>
            </div>
            <div class="video-container">
                <video src="<?php echo SITEURL;?>vid/video.mp4" autoplay loop class="vid vid1"></video>
                <video src="<?php echo SITEURL;?>vid/video2.mp4" autoplay loop class="vid vid2"></video>
                <video src="<?php echo SITEURL;?>vid/video3.mp4" autoplay loop class="vid vid3"></video>
            </div>
            
            <div class="controls">
                <div class="dots dot1"></div>
                <div class="dots dot2"></div>
                <div class="dots dot3"></div>
            </div>
            
            
        </div>
        
    </section>
    
    <!-- home section ends  -->
    
    <!-- category section starts  -->
    
    <section id="category" class="container">
        
        <div class="heading text-center">
            <h1>our <span>Categories</span></h1>
            <p>The pleasure of variety at your place</p>
        </div>
        
        
        <div class="box-container">
            
            <?php
        //code to display categories from database
        $sql="SELECT * FROM tbl_category WHERE featured='YES' AND active='YES'LIMIT 8";
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
                        <a href="<?php echo SITEURL;?>category-food.php?id=<?php echo $id?>"><button>view more</button></a>
                    </div>
                </div>
                <?php
            }
        }else{
            echo "<h1><span>Category not added</span></h1>";
        }?>
</div>
<div class="view_all">
    <a href="<?php echo SITEURL?>category_front.php"><button>view all</button></a>
</div>

</section>

<!-- category section ends  -->
    
    <!-- about section starts -->
    
    <section id="about" class="container">
        
        <div class="heading text-center">
            <h1><span>about</span> us</h1>
        </div>

        <div class="row min-vh-100">

            <div class="col-md-6 text-center text-md-left align-self-center content">
                <p>An Indian food-lover’s dream, we bring to you the food prepared for you using the finest seasonal ingredients in separate 
                vegetarian and non-vegetarian kitchens by our specially trained chefs. Good food has the ability to delight your sense of
                 taste and leave you happier.</p>
                 <p><span>Our menu features a large range of vegetables, meats and delicious desserts from India’s rich 
                 culture including authentic Indian cuisines that tastes like it came straight from your home kitchen. Other than the typical 
                 authentic food, we also bring to you the amazing mouth-watering street foods.</span></p>
                 <p>Each menu item is specifically tailored with flair and attention to detail is characteristic of Mayura for every occasion,
                  whether it be a large dinner party, family outing, intimate first date. Regardless of the occasion, you can always expect a 
                  great atmosphere with great food.</p>
                    <a href="#"><button>learn more</button></a>
                </div>
                
                <div class="col-md-6 image">
                    <img src="css/bg_about1.jpg" alt="">
                </div>
                
            </div>
            
        </section>
        
        <!-- about section ends  -->
        

<!-- dishes section starts  -->

<section id="dishes" class="container-fluid">

    <div class="heading text-center">
        <h1>Our <span>Dishes</span></h1>
        <p>Your food is just a click away!</p>
    </div>


    <div class="card-container">
        <?php
            //code to display categories from database
            $sql2="SELECT * FROM tbl_dishes WHERE featured='YES' AND active='YES' LIMIT 8";
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
                echo "<div class='error'><h1>Food not added</h1></div>";
            }
        ?>
    </div>
    <div class="view_all">
        <a href="<?php echo SITEURL?>food_front.php"><button>view all</button></a>
</div>

</section>

<!-- dishes section ends  -->
<!-- contact section starts  -->

<section id="contact" class="container-fluid">

    <div class="heading text-center">
        <h1>contact <span>us</span></h1>
    </div>

    <div class="row justify-content-center">

        <form action="" class="col-md-7">

            <div class="inputBox">
                <input type="text" required>
                <h3>full name</h3>
            </div>

            <div class="inputBox">
                <input type="email" required>
                <h3>e-mail</h3>
            </div>

            <div class="inputBox">
                <textarea required name="" id="" cols="30" rows="10"></textarea>
                <h3>message</h3>
            </div>

            <input type="submit" value="send">

        </form>

    </div>

</section>

<!-- contact section ends  -->
<?php
    include('front-end/partials/footer.php');
?>


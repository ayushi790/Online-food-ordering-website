<?php
include('partials/menu.php');
?>
<!-- main section starts -->
<section id="Form" class="container-fluid">

    <div class="heading text-center">
        <h1>Add Food</h1>
        <h4>
        <?php 
            if (isset($_SESSION['addFood'])){   //add session message
                echo $_SESSION['addFood'];      //display session message
                unset($_SESSION['addFood']);    //removing the session
            }
        ?>
        </h4>
    </div>

    <div class="row justify-content-center">

        <form action="" class="col-md-7" method="POST" enctype="multipart/form-data">

            <div class="inputBox">
                <input type="text" name = "title" placeholder="Title" required>
            </div>

            <div class="inputBox">
                <textarea name="description" cols="30" rows="10" placeholder="description"></textarea>
            </div>

            <div class="inputBox">
                <input type="number" name = "price" required>
                <h3>Price</h3>
            </div>
            
            
            <div class="inputRadio">
                <h3><span>Select Image :</span></h3>
                <div class="img_upload">
                    <input type="file" name="image" id="image" class="btn-chooseImage">
                </div>
            </div>

            <div class="inputRadio">
                <h3><span>Category :</span></h3>
                <div class="inputs">
                    <select name="category" class="options">
                        <?php //php code to display categories from database
                            
                            //create sql query to get all active categories from database
                            $sql="SELECT * FROM tbl_category WHERE active='YES'";

                            //Execute the query
                            $res=mysqli_query($conn,$sql);
                            
                            //count no of rows to check whether there is data in database or not
                            $count = mysqli_num_rows($res);
                            
                            //check if there is data in database
                            if($count>0){
                                //there is data in database
                                while($rows=mysqli_fetch_assoc($res)){
                                    $id = $rows['id'];
                                    $title = $rows['title'];

                                    ?>
                                    <option value="<?php echo $id;?>"><?php echo $title;?></option>
                                    <?php
                                }
                            }else{
                                ?>
                                <option value="1"><h3>Food</h3></option>
                                <?php
                            }?>
                    </select>
                </div>
            </div>

            <div class="inputRadio">
                <h3><span>Featured :</span></h3>
                <div class="inputs">
                    <input type="radio" class="radio" name="featured" value="YES" id="yes" />
                    <label for="yes"><h3>Yes</h3></label>
                    <input type="radio" class="radio" name="featured" value="NO" id="no"  />
                    <label for="no"><h3>No</h3></label>
                </div>
            </div>

            <div class="inputRadio">
                <h3><span>Active category :</span></h3>
                <div class="inputs">
                    <input type="radio" class="radio" name="active" value="YES" id="yes" />
                    <label for="yes"><h3>Yes</h3></label>
                    <input type="radio" class="radio" name="active" value="NO" id="no" />
                    <label for="no"><h3>No</h3></label>
                </div>
            </div>

            <input type="submit" name = "submit" value="Add food">

        </form>

</div>

</section>
<!-- main section ends -->
<?php include('partials/footer.php');?>
<?php
    // process the value from form and save it in database
    //check whether the submit button is clicked or not
    if(isset($_POST['submit'])){
        //button clicked
        //get the data from form
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];

        if(isset($_POST['featured'])){
            $featured=$_POST['featured'];
        }else{
            $featured='NO';
        }

        if(isset($_POST['active'])){
            $active=$_POST['active'];
        }else{
            $active='NO';
        }
        // print_r($_FILES["image"]); //to display the array

        // die();  //break the code

        if(isset($_FILES['image']['name'])){
            //upload the image
            //to upload image we need image name, src path and destination path
            $image_name=$_FILES['image']['name'];
            
            if($image_name!=''){
                //auto-rename the image
                //get the extension of image
                $temp=explode('.',$image_name);
                $ext=end($temp);
    
                //rename the image
                $image_name="Food_".time().'.'.$ext;    //to rename the file 
                $source_path=$_FILES['image']['tmp_name'];           
                $destination_path='../images/food/'.$image_name;
    
                //upload the image
                $upload=move_uploaded_file($source_path,$destination_path);
                
                //check whether the image is uploaded or not ; if not uploaded stop the process and redirect with error message
                if($upload==FALSE){
                    $_SESSION['upload']="<span>Failed to upload the image!</span>";
                    header("location:".SITEURL."admin/addCategory.php");
                    //stop the process
                    die();
                }
            }
        }else{
            //do not upload image and set image name value as blank
            $image_name='';
        }
        
        //sql query to save data into database
        $sql = "INSERT INTO tbl_dishes SET
            title='$title',
            description='$description',
            price='$price',
            image_name='$image_name',
            category_id='$category',
            featured='$featured',
            active='$active'
        ";

        //Execute query and save data in database

        //include('config/constants.php');
        $res = mysqli_query($conn, $sql);

        //Check whether data is inserted or not
        if($res==TRUE){
            //data inserted
            //create a session variable to display message
            $_SESSION['addFood']="Food added successfully!!";
            //redirect page
            // header('location:'.SITEURL.'admin/manageFood.php');
            echo("<script>location.href = '".SITEURL."/admin/manageFood.php';</script>");

        }
        else{
            //data not inserted
            //create a session variable to display message
            $_SESSION['addFood']="<span>Food not added!!</span>";
            //redirect page            
            echo("<script>location.href = '".SITEURL."/admin/addFood.php';</script>");
            // header('location:'.SITEURL.'admin/addFood.php');
        }
    }?>
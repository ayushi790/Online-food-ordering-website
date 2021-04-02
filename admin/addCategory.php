<?php
include('partials/menu.php');
?>
    <!-- main section starts -->
    <section id="Form" class="container-fluid">

    <div class="heading text-center">
        <h1>Add Category</h1>
        <h4><span>
        <?php 
            if (isset($_SESSION['addCategory'])){   //add session message
                echo $_SESSION['addCategory'];      //display session message
                unset($_SESSION['addCategory']);    //removing the session
            }
            if (isset($_SESSION['upload'])){   //add session message
                echo $_SESSION['upload'];      //display session message
                unset($_SESSION['upload']);    //removing the session
            }
        ?>
        </span></h4>
    </div>

    <div class="row justify-content-center">

        <form action="" class="col-md-7" method="POST" enctype="multipart/form-data">

            <div class="inputBox">
                <input type="text" name = "title" required>
                <h3>Title</h3>
            </div>

            <div class="inputRadio">
                <h3><span>Select Image :</span></h3>
                <div class="img_upload">
                    <input type="file" name="image" id="image" class="btn-chooseImage">
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

            <input type="submit" name = "submit" value="Add category">

        </form>

    </div>

</section>

<!-- main section ends -->
<?php
    // process the value from form and save it in database
    //check whether the submit button is clicked or not
    if(isset($_POST['submit'])){
        //button clicked
        
        //get the data from form
        $title=$_POST['title'];
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
                $ext=end(explode('.',$image_name));
    
                //rename the image
                $image_name="Food_category_".time().'.'.$ext;    //to rename the file 
                $source_path=$_FILES['image']['tmp_name'];           
                $destination_path='../images/category/'.$image_name;
    
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
        $sql = "INSERT INTO tbl_category SET
            title='$title',
            image_name='$image_name',
            featured='$featured',
            active='$active'
        ";

        //Execute query and save data in database

        //include('config/constants.php');
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //Check whether data is inserted or not
        if($res==TRUE){
            //data inserted
            //create a session variable to display message
            $_SESSION['addCategory']="Category added successfully!!";
            //redirect page
            header('location:'.SITEURL.'admin/manageCategory.php');
        }
        else{
            //data not inserted
            //create a session variable to display message
            $_SESSION['addCategory']="Category not added!!";
            //redirect page
            header('location:'.SITEURL.'admin/addCategory.php');
        }
    }
?>

<?php include('partials/footer.php')?>

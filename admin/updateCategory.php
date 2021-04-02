<?php
    include('partials/menu.php');?>
<!-- main section starts -->
<section id="Form" class="container-fluid">
    
    <div class="heading text-center">
        <h1>Update Category</h1>
        <h4>
            <?php
            if (isset($_SESSION['update'])){   //add session message
                echo $_SESSION['update'];      //display session message
                unset($_SESSION['update']);    //removing the session
            }
            ?>
        </h4>
    </div>
    
    <?php
    //check whether id is set or not
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        
        //create sql query to get alll other details
        $sql="SELECT * FROM tbl_category WHERE id=$id";
        
        //execute the query
        $res=mysqli_query($conn,$sql);
        
        $count = mysqli_num_rows($res);
        if($count==1){
            //get the data
            $rows=mysqli_fetch_assoc($res);
            $title = $rows['title'];
            $current_image_name = $rows['image_name'];
            $featured = $rows['featured'];
            $active = $rows['active'];
            
        }else{
            //data is not present
            //redirect to manageCategory page
            $_SESSION['no_category']="<span>Category not found</span>";
            header("location:".SITEURL."admin/manageCategory.php");
        }
        
    }else{
        //redirect to manageCategory
        header("location:".SITEURL."admin/manageCategory.php");
    }
    ?>

<div class="row justify-content-center">
    
    <form action="" class="col-md-7" method="POST" enctype="multipart/form-data">
    
    <div class="inputBox">
        <input type="text" name = "title" value="<?php echo $title;?>" required>
    </div>
    
    <div class="inputRadio">
        <h3><span>Current Image :</span></h3>
        <div class="img_upload">
            <?php
                    //check if image name is available or not
                    if($current_image_name!=''){
                        //display the image
                        ?>
                    <img src="<?php echo SITEURL;?>images/category/<?php echo $current_image_name;?>" width="100px">
                    <?php
                    }else{
                        echo "<h4><span>Image not added</span></h4>";
                    }
                    ?>                
                </div>
            </div>
            <div class="inputRadio">
                <h3><span>New Image :</span></h3>
                <div class="img_upload">
                    <input type="file" name="image" id="image" class="btn-chooseImage">
                </div>
            </div>
            
            <div class="inputRadio">
                <h3><span>Featured :</span></h3>
                <div class="inputs">
                    <input <?php if($featured=="YES"){echo "checked";} ?> type="radio" class="radio" name="featured" value="YES" id="yes"/>
                    <label for="yes"><h3>Yes</h3></label>
                    <input <?php if($featured=="NO"){echo "checked";} ?> type="radio" class="radio" name="featured" value="NO" id="no"/>
                    <label for="no"><h3>No</h3></label>
                </div>
            </div>
            
            <div class="inputRadio">
                <h3><span>Active category :</span></h3>
                <div class="inputs">
                    <input <?php if($active=="YES"){echo "checked";} ?> type="radio" class="radio" name="active" value="YES" id="yes"/>
                    <label for="yes"><h3>Yes</h3></label>
                    <input <?php if($active=="NO"){echo "checked";} ?> type="radio" class="radio" name="active" value="NO" id="no"/>
                    <label for="no"><h3>No</h3></label>
                </div>
            </div>
            
            
            <input type="submit" name = "submit" value="Update category">
            
        </form>
        
    </div>
    
</section>
<?php
//check if submit buttton is clicked or not
if(isset($_POST['submit'])){
    //update the details
    $title=$_POST['title'];
    $featured=$_POST['featured'];
    $active=$_POST['active'];
    
    //print_r($_FILES["image"]); //to display the array
    
    //die();  //break the code
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
            if($current_image_name!=''){
                //remove the current image
                $path = '../images/category/'.$current_image_name;
                //remove the current image
                $remove = unlink($path);
                if($remove==FALSE){
                    //failed to remove image
                    $_SESSION['remove']="<span>Failed to remove category image</span>";
                    header('location:'.SITEURL.'admin/manageCategory.php');
                    die();
                }
            }
        }else{
            $image_name=$current_image_name;
        }
    }else{
        $image_name=$current_image_name;
    }  
    //create sql query to update admin
    $sql2="UPDATE tbl_category 
    SET title='$title',
        image_name='$image_name',
        featured='$featured',
        active='$active'
        WHERE id='$id'";
    //execue the query
    
    $res2=mysqli_query($conn, $sql2);
    if($res2==TRUE){
        //Query executed and admin updated
        $_SESSION['update']="Details updated successfully!!";
        //redirect to manageAdminpage
        header('location:'.SITEURL.'admin/manageCategory.php');
    }else{
        //Failed to update Admin
        $_SESSION['update']="<span>Details failed to update!!</span>";
        header('location:'.SITEURL.'admin/updateCategory.php');
    }
}?>

<?php include('partials/footer.php');?>

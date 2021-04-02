<?php
    include('partials/menu.php');?>
<!-- main section starts -->
<section id="Form" class="container-fluid">
    
    <div class="heading text-center">
        <h1>Update Food</h1>
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
        $sql="SELECT * FROM tbl_dishes WHERE id=$id";
        
        //execute the query
        $res=mysqli_query($conn,$sql);
        
        $count = mysqli_num_rows($res);
        if($count==1){
            //get the data
            $rows=mysqli_fetch_assoc($res);
            $title = $rows['title'];
            $description = $rows['description'];
            $price = $rows['price'];
            $current_image_name = $rows['image_name'];
            $current_category = $rows['category_id'];
            $featured = $rows['featured'];
            $active = $rows['active'];

        }else{
            //data is not present
            //redirect to manageCategory page
            $_SESSION['no_food']="<span>Food not found</span>";
            header("location:".SITEURL."admin/manageFood.php");
        }
        
    }else{
        //redirect to manageCategory
        header("location:".SITEURL."admin/manageFood.php");
    }
    ?>

<div class="row justify-content-center">
    
    <form action="" class="col-md-7" method="POST" enctype="multipart/form-data">
    
    <div class="inputBox">
        <input type="text" name = "title" value="<?php echo $title;?>" required>
    </div>

    <div class="inputBox">
        <textarea name="description" cols="30" rows="10" value="<?php echo $description;?>"><?php echo $description;?></textarea>
    </div>

    <div class="inputBox">
        <input type="number" name = "price"  value="<?php echo $price;?>" required>
    </div>

    <div class="inputRadio">
        <h3><span>Current Image :</span></h3>
        <div class="img_upload">
            <?php
                    //check if image name is available or not
                    if($current_image_name!=''){
                        //display the image
                        ?>
                    <img src="<?php echo SITEURL;?>images/food/<?php echo $current_image_name;?>" width="100px">
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
        <h3><span>Category :</span></h3>
        <div class="inputs">
            <select name="category" class="options">
                <?php //php code to display categories from database
                    
                    //create sql query to get all active categories from database
                    $sql2="SELECT * FROM tbl_category WHERE active='YES'";

                    //Execute the query
                    $res2=mysqli_query($conn,$sql2);
                    
                    //count no of rows to check whether there is data in database or not
                    $count2 = mysqli_num_rows($res2);
                    
                    //check if there is data in database
                    if($count2>0){
                        //there is data in database
                        while($rows2=mysqli_fetch_assoc($res2)){
                            $category_title = $rows2['title'];
                            $category_id = $rows2['id'];
                            ?>
                            <option <?php if($current_category==$category_id){echo "selected";}?> value="<?php echo $category_id;?>"><h3><?php echo $category_title;?></h3></option>
                            <?php
                        }
                    }else{
                        //category not available
                        ?>
                        <option value="0"><h3>Category not available</h3></option>
                        <?php
                    }?>
            </select>
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
            
    <input type="hidden" name = "id" value="<?php echo $id;?>">
    <input type="hidden" name = "current_image_name" value="<?php echo $current_image_name;?>">
    <input type="submit" name = "submit" value="Update food">
            
    </form>
        
    </div>
    
</section>
<?php
//check if submit buttton is clicked or not
if(isset($_POST['submit'])){
    //update the details
    $id=$_POST['id'];
    $current_image_name=$_POST['current_image_name'];
    $title=$_POST['title'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $category=$_POST['category'];
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
            $image_name="Food_".time().'.'.$ext;    //to rename the file 
            
            $source_path=$_FILES['image']['tmp_name'];
            
            $destination_path='../images/food/'.$image_name;
            
            //upload the image
            $upload=move_uploaded_file($source_path,$destination_path);
            
            //check whether the image is uploaded or not ; if not uploaded stop the process and redirect with error message
            if($upload==FALSE){
                $_SESSION['upload']="<span>Failed to upload the image!</span>";
                header("location:".SITEURL."admin/addFood.php");
                
                //stop the process
                die();
            }
            if($current_image_name!=''){
                //remove the current image
                $path = '../images/food/'.$current_image_name;
                //remove the current image
                $remove = unlink($path);
                if($remove==FALSE){
                    //failed to remove image
                    $_SESSION['remove']="<span>Failed to remove current food image</span>";
                    header('location:'.SITEURL.'admin/manageFood.php');
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
    $sql3="UPDATE tbl_dishes SET 
        title='$title',
        description='$description',
        price='$price',
        image_name='$image_name',
        category_id='$category',
        featured='$featured',
        active='$active'
    WHERE id=$id";
    //execue the query
    
    $res3=mysqli_query($conn, $sql3);
    if($res3==TRUE){
        //Query executed and admin updated
        $_SESSION['update']="Details updated successfully!!";
        //redirect to manageAdminpage
        echo("<script>location.href = '".SITEURL."/admin/manageFood.php';</script>");
    }else{
        //Failed to update Admin
        $_SESSION['update']="<span>Details failed to update!!</span>";
        echo("<script>location.href = '".SITEURL."/admin/updateFood.php';</script>");
    }
}?>

<?php include('partials/footer.php');?>

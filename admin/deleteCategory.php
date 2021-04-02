<?php
    session_start();
    include('config/constants.php');
    //get the id & image name of category to be deleted
    if(isset($_GET['id']) && isset($_GET['image_name'])){
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //remove the physical image file if available
        if($image_name!=''){
            //image is available
            $path = '../images/category/'.$image_name;
            //remove the image
            $remove = unlink($path);

            if($remove==FALSE){
                //failed to remove image
                $_SESSION['remove']="<span>Failed to remove category image</span>";
                header('location:'.SITEURL.'admin/manageCategory.php');
                die();
            }
        }
        //create sql query to delete 
        $sql="DELETE FROM tbl_category WHERE id=$id";

        //Execute the query
        $res=mysqli_query($conn, $sql);

        //session_start();
        //check whether the query is executed or not
        if($res==TRUE){
            //create a session variable to display message
            $_SESSION['delete']="Category deleted successfully!!";
        }
        else{
            //create a session variable to display message
            $_SESSION['delete']="<span>Failed to remove category</span>";
        }
    }
    //redirect to manageCategory page
    header('location:'.SITEURL.'admin/manageCategory.php');
?>
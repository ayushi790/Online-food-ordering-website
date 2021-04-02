<?php
    session_start();
    include('config/constants.php');
    //get the id & image name of food to be deleted
    if(isset($_GET['id']) && isset($_GET['image_name'])){
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //remove the physical image file if available
        if($image_name!=''){
            //image is available
            $path = '../images/food/'.$image_name;
            //remove the image
            $remove = unlink($path);

            if($remove==FALSE){
                //failed to remove image
                $_SESSION['remove']="<span>Failed to remove food image</span>";
                header('location:'.SITEURL.'admin/manageFood.php');
                die();
            }
        }
        //create sql query to delete 
        $sql="DELETE FROM tbl_dishes WHERE id=$id";

        //Execute the query
        $res=mysqli_query($conn, $sql);

        //session_start();
        //check whether the query is executed or not
        if($res==TRUE){
            //create a session variable to display message
            $_SESSION['delete']="Food deleted successfully!!";
        }
        else{
            //create a session variable to display message
            $_SESSION['delete']="<span>Failed to remove food</span>";
        }
    }
    //redirect to manageFood page
    header('location:'.SITEURL.'admin/manageFood.php');
?>
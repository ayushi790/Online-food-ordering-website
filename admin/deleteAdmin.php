<?php
    session_start();
    include('config/constants.php');

    //get the id of admin to be deleted
    $id = $_GET['id'];

    //create sql query to delete 
    $sql="DELETE FROM tbl_admin WHERE id=$id";

    //Execute the query
    $res=mysqli_query($conn, $sql);

    //session_start();
    //check whether the query is executed or not
    if($res==TRUE){
        //create a session variable to display message
        $_SESSION['delete']="Admin deleted successfully!!";
    }
    else{
        //create a session variable to display message
        $_SESSION['delete']="<span>Admin failed to be deleted</span>";
    }

    //redirect to manageAdmin page
    header('location:'.SITEURL.'admin/manageAdmin.php');
?>
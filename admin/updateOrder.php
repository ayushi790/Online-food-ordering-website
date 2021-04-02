<?php
    include('partials/menu.php');
 ?>
    <!-- main section starts -->

    <div class="order">

    <section id="Form" class="container-fluid">

    <?php
        if(isset($_GET['id'])){
            //get the id of the admin selected
            $id=$_GET['id'];
        
            //create sql suery
            $sql="SELECT * FROM tbl_order WHERE id=$id";
        
            //execute the query
            $res=mysqli_query($conn, $sql);

            //check whether the query is executed or not
            if($res==true){
                //check if data is available or not
                $count = mysqli_num_rows($res);
                if($count==1){
                    //get the details
                    $rows=mysqli_fetch_assoc($res);
                    $food_name = $rows['food'];
                    $price = $rows['price'];
                    $qty = $rows['qty'];
                    $status = $rows ['status'];
                    $customer_name = $rows ['customer_name'];
                    $customer_contact = $rows ['customer_contact'];
                    $customer_email = $rows ['customer_email'];
                    $customer_address = $rows ['customer_address'];
                }
            }else{
                //redirect to managAdmin page
                header('location:'.SITEURL.'admin/manageOrder.php');
            }
        }else{
            header('location:'.SITEURL.'admin/manageOrder.php');            
        }
    ?>

    <div class="heading text-center">
        <h1>Update Order</h1>
        <h5>Order name: <span><?php echo $food_name;?></span><br><br>Price: <span><?php echo $price;?>Rs/-</span></h5>
        <h4>
        <?php 
            if (isset($_SESSION['update'])){   //add session message
                echo $_SESSION['update'];      //display session message
                unset($_SESSION['update']);    //removing the session
            }
        ?>
        </h4>
    </div>

    <div class="row justify-content-center">

        <form action="" class="col-md-7" method="POST" enctype="multipart/form-data">

            <div class="inputBox">
                <input type="number" name="qty" value="<?php echo $qty;?>"><h3>Quantity
            </div>
            
            
            
            <div class="inputBox">
                <input type="text" name="customer_name" value="<?php echo $customer_name;?>">
            </div>
            
            <div class="inputRadio">
                <h3><span>Status :</span></h3>
                <div class="inputs">
                    <input <?php if($status=="Ordered"){echo "checked";} ?> type="radio" class="radio" name="status" value="Ordered" id="Ordered"/>
                    <label for="Ordered"><h3>Ordered</h3></label>

                    <input <?php if($status=="On-Delivery"){echo "checked";} ?> type="radio" class="radio" name="status" value="On-Delivery" id="On-Delivery" position="static"/>
                    <label for="On-Delivery"><h3>On-Delivery</h3></label>

                    <input <?php if($status=="Delivered"){echo "checked";} ?> type="radio" class="radio" name="status" value="Delivered" id="Delivered"/>
                    <label for="Delivered"><h3>Delivered</h3></label>

                    <input <?php if($status=="Cancelled"){echo "checked";} ?> type="radio" class="radio" name="status" value="Cancelled" id="Cancelled"/>
                    <label for="Cancelled"><h3>Cancelled</h3></label>
                </div>
            </div>

            <div class="inputBox">
                <input type="text" name="customer_contact" value="<?php echo $customer_contact;?>">
            </div>

            <div class="inputBox">
                <input type="text" name="customer_email" value="<?php echo $customer_email;?>">
            </div>

            <div class="inputBox">
                <input type="text" name="customer_address" value="<?php echo $customer_address;?>">
            </div>

            <input type="submit" name = "submit" value="Update order" >

        </form>

    </div>
</section>
</div>

<!-- main section ends -->


<?php

    //check if submit buttton is clicked or not
    if(isset($_POST['submit'])){
        //update the details
        $qty = $_POST['qty'];
        $status = $_POST ['status'];
        $customer_name = $_POST ['customer_name'];
        $customer_contact = $_POST ['customer_contact'];
        $customer_email = $_POST ['customer_email'];
        $customer_address = $_POST ['customer_address'];

            
        //create sql query to update admin
        $sql2="UPDATE tbl_order
        SET qty='$qty',
            status='$status',
            customer_name='$customer_name',
            customer_contact='$customer_contact',
            customer_email='$customer_email',
            customer_address='$customer_address'
        WHERE id='$id'
        ";
        //execue the query
        
        $res2=mysqli_query($conn, $sql2);
        if($res2==TRUE){
            //Query executed and order updated
            $_SESSION['update']="Details updated successfully!!";
            //redirect to manageOrder page
            echo("<script>location.href = '".SITEURL."/admin/manageOrder.php';</script>");
        }else{
            //Failed to update order
            $_SESSION['update']="<span>Details failed to update!!</span>";
            echo("<script>location.href = '".SITEURL."/admin/updateOrder.php';</script>");

        }
    }
?>

<?php include('partials/footer.php')?>
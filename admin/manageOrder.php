<?php
include('partials/menu.php')  ?>

<!-- main section starts -->
<div class="manageOrder">
<section id="main" class="container-fluid">
        <div class="heading">
            <h1>Manage Order</h1>
            <h4>
            <?php 
            if (isset($_SESSION['update'])){   //add session message
                echo $_SESSION['update'];      //display session message
                unset($_SESSION['update']);    //removing the session
            }
            ?>
            </h4>
        </div>


    <table class = "tbl_full">
        <tr>
            <th>S.No</th>
            <th>Food</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
            <th>Status</th>
            <th>Order date</th>
            <th>Customer name</th>
            <th>Customer contact</th>
            <th>Customer email</th>
            <th>Customer address</th>
            <th>Actions</th>
        </tr>
        <?php
        //create query
        $sql = "SELECT * FROM tbl_order ORDER BY id DESC";
        
        //execute the query
        $res = mysqli_query($conn, $sql);

        //count no of rows
        $count = mysqli_num_rows($res);

        if($count>0){
            //order available
            $sn=1;
            while($rows=mysqli_fetch_assoc($res)){

                //using while loop to get all data from database
                $id = $rows['id'];
                $food = $rows['food'];
                $price = $rows['price'];
                $qty = $rows['qty'];
                $total = $rows['total'];
                $status = $rows['status'];
                $order_date = $rows['order_date'];
                $customer_name = $rows['customer_name'];
                $customer_contact = $rows['customer_contact'];
                $customer_email = $rows['customer_email'];
                $customer_address = $rows['customer_address'];
                ?>
                <tr>
                    <td><?php echo $sn ?></td>
                    <td><?php echo $food?></td>
                    <td><?php echo $price?></td>
                    <td><?php echo $qty?></td>
                    <td><?php echo $total?></td>
                    <td>
                        <?php
                            if ($status=="Ordered"){
                                echo "<label>$status</label>";
                            }else if($status=="On-Delivery"){
                                echo "<label style='color: orange;'>$status</label>";
                            }else if($status=="Delivered"){
                                echo "<label style='color: #2ed573;'>$status</label>";     
                            }else{
                                echo "<label style='color: #ff6b81;'>$status</label>";     
                            }
                        ?>
                    </td>
                    <td><?php echo $order_date?></td>
                    <td><?php echo $customer_name?></td>
                    <td><?php echo $customer_contact?></td>
                    <td><?php echo $customer_email?></td>
                    <td><?php echo $customer_address?></td>
                    <td>
                    <a href="<?php echo SITEURL;?>admin/updateOrder.php?id=<?php echo $id?>"><button  class="btn-secondary"> Update Order</button></a>
                    </td>
                </tr>
                <?php
                $sn++;
            }

        }else{
            //order not available
            ?>
            <tr>
                <td><h4><span>No admin added</span></h4></td>
            </tr>
            <?php
        }
        ?>
        </table>
</section>
</div>

<!-- main section ends -->

<?php include('partials/footer.php') ?>
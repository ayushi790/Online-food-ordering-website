<?php
    include('front-end/partials/menu.php');
?>

<section id="order" class="container-fluid">

    <div class="heading text-center">
        <h1>Order now</h1>
    </div>

    <div class="row justify-content-center">

        <form action="" class="col-md-7" method="POST">

            <?php
                if(isset($_GET['id'])){
                    $id=$_GET['id'];

                    //create sql query
                    $sql = "SELECT * FROM tbl_dishes WHERE id=$id";

                    //execute the query
                    $res=mysqli_query($conn,$sql);

                    //count no of rows to check whether there is data in database or not
                    $count = mysqli_num_rows($res);

                    if($count==1){
                        $rows = mysqli_fetch_assoc($res);
                        $title = $rows['title'];
                        $price = $rows['price'];
                        $image_name = $rows['image_name'];
                    }else{
                        //food not available
                        echo '<script>alert("Dish not found")</script>';
                        header('location:'.SITEURL);    
                    }

                }else{
                    //redirect to home
                    header('location:'.SITEURL);
                    echo '<script>alert("Please select the dish first!!")</script>';
                }
            ?>

            <div class="selected">
                <table>
                    <tr>
                        <th>
                            <?php
                                if($image_name!=''){
                                    ?>
                                    <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name?>" alt="" width=250px>
                                    <?php
                                }else{
                                    ?>
                                    <img src="<?php echo SITEURL;?>img.png" alt="" width=250px>
                                    <?php
                                }
                            ?>
                        </th>
                        <th>
                            <div class="selection">
                                <div class="inputBox">
                                    <input type="text" name="selected-food" value="<?php echo $title?>" readonly>
                                </div>
                                <div class="inputBox">
                                    <input type="text" name="price" value="<?php echo $price?> Rs./-" readonly>
                                </div>
                                <div class="inputBox">
                                    <input type="number" name = "qty" placeholder="Quantity" required>
                                </div>
                            </div>
                        </th>
                    </tr>
                </table>
            </div>

            <div class="select">
                <div class="inputBox">
                    <input type="text" name="selected-food" value="<?php echo $title?>" readonly>
                </div>
                <div class="inputBox">
                    <input type="text" name="price" value="Rs.<?php echo $price?>" readonly>
                </div>
                <div class="inputBox">
                    <input type="number" name = "qty" placeholder="Quantity" value="1" required>
                </div>
            </div>

            <div class="inputBox">
                <input type="text" name="customer_name" placeholder="Full Name" required>
            </div>
            <div class="inputBox">
                <input type="text" name="customer_contact" placeholder="Phone no" required>
            </div>
            <div class="inputBox">
                <input type="text" name="customer_email" placeholder="E-mail id" required>
            </div>

            <div class="inputBox">
                <textarea name="customer_address" id="" cols="30" rows="10" placeholder="Address" required></textarea>
            </div>

            <input type="submit" name="submit" value="Place Order">

        </form>

        <?php
            if(isset($_POST['submit'])){
                //get all the details from the form
                $qty = $_POST['qty'];
                $total = $price * $qty;
                $customer_name = $_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];
                $customer_address = $_POST['customer_address'];
                $order_date = date("Y-m-d h:i:s a");
                $status = "Ordered";

                //create sql query
                $sql2 = "INSERT INTO tbl_order SET
                food = '$title',
                price = '$price',
                qty = '$qty',
                total = '$total',
                status = '$status',
                customer_name = '$customer_name',
                customer_contact = '$customer_contact',
                customer_email = '$customer_email',
                customer_address = '$customer_address',
                order_date = '$order_date'
                ";

                //execute the query
                $res2 = mysqli_query($conn,$sql2);

                if($res2==TRUE){
                    //order placed
                    echo '<script>alert("Order Placed Successfully!!")</script>';
                    echo("<script>location.href = '".SITEURL."';</script>");
                }else{
                    //failed to place order
                    echo '<script>alert("Failed to place order!! Try again later")</script>';
                    echo("<script>location.href = '".SITEURL."';</script>");
                }
            }
        ?>
    </div>
</section>
<?php
    include('front-end/partials/footer.php');
?>

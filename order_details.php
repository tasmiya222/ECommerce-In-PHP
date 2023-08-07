<?php
include('header.php');
$uid="";
$order_id="";
    // get order from url
    $order_id = get_safe_value($con,$_GET['id']); 
?>
<div class="section section-margin">
 <div class="container">

    <div class="row">
        <div class="col-12">

            <!-- Cart Table Start -->
            <div class="cart-table table-responsive">
                <table class="table table-bordered">

                    <!-- Table Head Start -->
                    <thead>
                        <tr>
                            <th class="pro-thumbnail">Image</th>
                            <th class="pro-title">Product</th>
                            <th class="pro-price">Price</th>
                            <th class="pro-quantity">Quantity</th>
                            <th class="pro-subtotal">Total</th>
                           
                          
                        </tr>
                    </thead>
                    <!-- Table Head End -->

                    <!-- Table Body Start -->
                    <tbody>
                        <?php    
                        $uid=$_SESSION['USER_ID'];
                        $res = mysqli_query($con,"select distinct(order_detail.id),order_detail.*,product.name,product.image from order_detail,product,  `order`where order_detail.order_id='$order_id' and `order`.user_id='$uid' and  order_detail.product_id=product.id");
                        $total_cart = 0;
                        $shipping = 150;
                        while($row = mysqli_fetch_assoc($res))
                        {
                            $total_cart = $row['qty']*$row['price'];
                            $grand_total = $shipping+$total_cart;
                        ?>
                        <tr>
                            <td class="pro-thumbnail"><a href="#"><img class="fit-image" src="<?php echo  PRODUCT_IMAGE_SITE_PATH.$row['image'] ?>" alt="Product" /></a></td>
                            <td class="pro-title"><a href="#"><?php echo $row['name']?></a></td>
                            <td class="pro-price"><span>Rs<?php echo $row['price'] ?>/-</span></td>
                            <td class="pro-quantity"><?php   echo $row['qty']?></td>
                            <td class="pro-subtotal">Rs<?php echo $grand_total ?>/-
                        <br>
                        Shipping Include
                        </td>
                           
                        </tr>
                      <?php } ?>
                    </tbody>
                    <!-- Table Body End -->

                </table>
            </div>
            <!-- Cart Table End -->



        </div>
    </div>
  </div>
</div>

<?php
include('footer.php');
?>
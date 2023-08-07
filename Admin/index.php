<?php

include('header.php');
$order_id="";
    // get order from url
$order_id = get_safe_value($con,$_GET['id']); 


?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">Order Details </h4>
                  
               </div>
               <div class="card-body--">
                  <div class="table-stats order-table ov-h">
                     <table class="table ">
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
                         
                                   
                        $res = mysqli_query($con,"select distinct(order_detail.id),order_detail.*,product.name,product.image from order_detail,product,
                        `order`where order_detail.order_id='$order_id' and order_detail.product_id=product.id");
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
         </div>
      </div>
   </div>
</div>
</div>
</div>
<div class="clearfix"></div>
<?php

include('footer.php');

?>
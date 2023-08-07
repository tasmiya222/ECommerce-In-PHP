<?php
include('header.php');
$order_detail_id = get_safe_value($con,$_GET['id']); 
if(isset($_POST['update_order_status']))
{
  echo  $update_order_status = $_POST['update_order_status'];
   mysqli_query($con,"UPDATE `order` SET order_status = '$update_order_status' WHERE `order`.id = '$order_detail_id'");
//   redirect('order_Master.php');
}
?>
<div class="content pb-0">
   <div class="orders">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="box-title">Order Master </h4>
                  
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
                        // echo  "select product.name , product.image,product.price,product.qty ,`order`.`address`,`order`.    `zipcode`,`order`.city,order_detail.* from order_detail inner join product on product.id=order_detail.product_id INNER join `order` on `order`.id=order_detail.order_id where order_detail.order_id='$order_detail_id'";
                       
                      
                        $res = mysqli_query($con,"select product.name , product.image,product.price,product.qty ,`order`.`address`,`order`.    `zipcode`,`order`.city,order_detail.* from order_detail inner join product on product.id=order_detail.product_id INNER join `order` on `order`.id=order_detail.order_id where order_detail.order_id='$order_detail_id'");
                        $total_cart = 0;
                        $shipping = 150;
                        while($row = mysqli_fetch_assoc($res))
                        {
                           $address = $row['address'];
                           $zipcode = $row['zipcode'];
                           $city= $row['city'];
                           $grand_total = $shipping+$total_cart;
                        ?>
                        <tr>
                            <td class="pro-thumbnail" ><a href="#"><img  class="fit-image" src="<?php echo  PRODUCT_IMAGE_SITE_PATH.$row['image'] ?>" alt="Product" /></a></td>
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
               <div id="addres_details">
               <div>
                <br> 
                <strong style="margin-left:30px">Address:</strong>
                <span><?php echo $address?>,<?php echo $city ?>,<?php echo $zipcode ?></span><br>
                <strong style="margin-left:30px">Order Status:</strong>
                <span>
                  <?php
                    
                   $order_status_arr= mysqli_fetch_assoc(mysqli_query($con,"select order_status.name from order_status, `order` where `order`.id='$order_detail_id' and `order`.order_status=order_status.id;"));
                    
                   echo  $order_status_arr['name'];
                ?></span>
                <br>
                <br>
                <hr>

                <form method="post">
                  <div class="form-group">
                        <strong>Order Status Confrim</strong>
                       <select  name="update_order_status" required  class="form-control">
                                 <option>Select Order Status</option>
                                 <?php 
                                 
                                 $sql = mysqli_query($con,"select * from order_status");
                                  while($row=mysqli_fetch_assoc($sql))
                                  {
                                      if($row['id'] == $category_id)
                                      {
                                        echo "<option selected value=".$row['id'].">".$row['name']."</option>";
                                      }
                                      else
                                      {
                                        echo "<option value=".$row['id'].">".$row['name']."</option>";
                                      }
                                     
                                  }
                                 ?>

                               </select>
                            </div> 
                            
                            <input type="submit"  class="btn btn-lg btn-info btn-block">
                     </form>
               </div> 
              
               </div>
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
<?php

include('header.php');



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
                        <thead class="thead-light">
                         <tr>
                           <th>Order</th>
                           <th>Date</th>
                           <th>Payment Type</th>
                           <th>Order Status</th>
                           <th>Total</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                      <?php
                       
                     //  echo "select `order`.*,order_status.name as order_status_str  from `order`,order_status order_status.id=`order`.order_status";
                      $Query = mysqli_query($con,"select `order`.*,order_status.name as order_status_str from `order`,order_status where order_status.id=`order`.order_status");
                      while($row=mysqli_fetch_assoc($Query))
                      { 
                         
                         ?>
                         <tr>
                           <td><?php echo $row['id'] ?></td>
                           <td><?php echo $row['added_on'] ?></td>
                           <td><?php echo $row['payment_type'] ?></td>
                           <td><?php echo $row['order_status_str'] ?></td>
                           <td>Rs<?php echo $row['total_price'] ?>/-</td>
                           <td><a href="order_detail.php?id=<?php echo $row['id'] ?>" class="btn btn btn-dark btn-hover-primary btn-sm rounded-0">Order Details</a></td>
                        </tr>
                     <?php } ?>
                  </tbody>
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
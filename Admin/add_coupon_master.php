<?php
include('header.php');
$msg="";
$coupon_code="";
$coupon_type="";
$coupon_value="";
$cart_min_value="";
 // Fetch data from table to Edit
if(isset($_GET['id']) && $_GET['id'] != '')
{
    
    $id=$_GET['id'];
    $res=mysqli_query($con,"select * from coupon_master where id='$id'");
    $check=mysqli_num_rows($res);
      if($check>0){
    $row=mysqli_fetch_assoc($res);
    $coupon_code=$row['coupon_code'];
    $coupon_type=$row['coupon_type'];
    $coupon_value=$row['coupon_value'];
    $cart_min_value=$row['cart_min_value'];    
}

else
{
  redirect('coupon_master.php');
}

}
//insertion
if(isset($_POST['submit']))
{
     $coupon_code=get_safe_value($con,$_POST['coupon_code']);
     $coupon_type=get_safe_value($con,$_POST['coupon_type']);
     $coupon_value=get_safe_value($con,$_POST['coupon_value']);     
     $cart_min_value=get_safe_value($con,$_POST['cart_min_value']);
     //If There is duplicate insertion
      $res=mysqli_query($con,"select * from coupon_master where coupon_code='$coupon_code'");
      $check=mysqli_num_rows($res);
      if($check>0)
      {
         if(isset($_GET['id']) && $_GET['id'] != '')
         {
                 $getData= mysqli_fetch_assoc($res);
                 if($id==$getData['id'])
                 {

                 }
                 else
                 {
                     $msg="This Coupon Code Already exits!!";      
                 }
         }
         else{
                $msg="This Coupon Code Already exits!!";
         }
      }      
      if($msg=='')
       {

       if(isset($_GET['id']) && $_GET['id'] != '')
       {
       
             $update_sql="update coupon_master set coupon_code='$coupon_code',coupon_type='$coupon_type',coupon_value='$coupon_value',cart_min_value='$cart_min_value' where id='$id'";
              mysqli_query($con,$update_sql);

       }

    else
    {
            mysqli_query($con,"insert into  coupon_master (coupon_code,coupon_type,coupon_value,cart_min_value,status)
            values('$coupon_code','$coupon_type','$coupon_value','$cart_min_value','1')");         
                                                                        
      }
      // echo "insert into  coupon_master (coupon_code,coupon_type,coupon_value,cart_min_value,status)
// values('$coupon_code','$coupon_type','$coupon_value','$cart_min_value','1')";
      redirect('coupon_master.php');
}

}
?>
      <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Coupon</strong><small>Form</small></div>
                        <div class="card-body card-block">
                            <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                               <label for="company" class=" form-control-label">Coupon Code</label>
                               <input type="text" require name="coupon_code" placeholder="Enter Coupon Code"  value="<?php echo $coupon_code ?>" class="form-control">
                            </div>
                           <div class="form-group">
                           <label for="company" class=" form-control-label">Coupon Type</label>
                               <!-- <input type="text" name="coupon_type" placeholder="Enter coupon_type"  value="<?php echo $coupon_type?>" class="form-control"> -->
                                <select name="coupon_type" value="<?php echo $coupon_type?>"required class="form-control">
                                 <option value=''>Select Coupon Type</option>
                                 <?php 
                                 
                                 if($coupon_type == 'Percentage')
                                 {
                                    echo '<option value="Percentage" selected>Percentage</option>
                                       <option value="Rupee">Rupee</option>';
                                 }
                                 elseif($coupon_type == 'Rupee')
                                 {
                                  echo '<option value="Percentage" >Percentage</option>
                                  <option value="Rupee" selected>Rupee</option>';
                                 }
                                 else
                                  {
                                  
                                    echo '<option value="Percentage" >Percentage</option>
                                    <option value="Rupee" >Rupee</option>';
                                  
                                 }
                                 ?>

                               </select>
                            </div>
                            <div class="form-group">
                               <label for="company" class=" form-control-label">Coupon Value</label>
                               <input type="text" name="coupon_value"  placeholder="Enter Coupon avlue" class="form-control" required value="<?php echo $coupon_value ?>">
                        </div>
                            <div class="form-group">
                               <label for="company" class=" form-control-label">Min Value</label>
                               <input type="text" name="cart_min_value"  placeholder="Enter Min Value" class="form-control" required value="<?php echo $cart_min_value ?>">
                        </div>
                        
                           <input type="submit" value="SUBMIT" name="submit" class="btn btn-lg btn-info btn-block">
                           <div class="error-msg"><?php echo  $msg; ?></div>
                           <!-- <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block"> -->
                           <!-- <span id="payment-button-amount">Submit</span> -->
                           </button>
</form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <!-- Javascript Code to retrive data Start -->
         
<?php
include('footer.php');

?>

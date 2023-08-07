<?php
include('header.php');
$category_id="";
$name="";
$mrp="";
$price="";
$qty="";
$short_desc="";
$description="";
$meta_title="";
$meta_description="";
$meta_keyword="";
$best_seller="";
$sub_categories_id="";
$msg='';
$image_required="required";
 // Fetch data from table to Edit
if(isset($_GET['id']) && $_GET['id'] != '')
{
    $image_required='';
    $id=$_GET['id'];
    $res=mysqli_query($con,"select * from product where id='$id'");
    $check=mysqli_num_rows($res);
      if($check>0){
    $row=mysqli_fetch_assoc($res);
    $category_id=$row['categories_id'];
    $name=$row['name'];
    $mrp=$row['mrp'];
    $price=$row['price'];
    $qty=$row['qty'];
    $short_desc=$row['short_description'];
    $description=$row['description'];
    $meta_title=$row['meta_tittle'];
    $meta_description=$row['meta_description'];
    $meta_keyword=$row['meta_keyword'];
    $sub_categories_id=$row['sub_categories_id'];
    $best_seller=$row['best_seller'];
    
}

else
{
  redirect('product.php');
}

}
//insertion
if(isset($_POST['submit']))
{
     $category_id=get_safe_value($con,$_POST['categories_id']);
     $name=get_safe_value($con,$_POST['name']);
     $mrp=get_safe_value($con,$_POST['mrp']);     
     $price=get_safe_value($con,$_POST['price']);
     $qty=get_safe_value($con,$_POST['qty']); 
     $short_desc=get_safe_value($con,$_POST['short_description']);
     $description=get_safe_value($con,$_POST['description']);
     $meta_tittle=get_safe_value($con,$_POST['meta_title']);
     $meta_description=get_safe_value($con,$_POST['meta_description']);
     $meta_keyword=get_safe_value($con,$_POST['meta_keyword']);
     $sub_categories_id=get_safe_value($con,$_POST['sub_categories_id']);
     $best_seller=get_safe_value($con,$_POST['best_seller']);
     //If There is duplicate insertion
      $res=mysqli_query($con,"select * from product where name='$name'");
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
                     $msg="This Product Already exits!!";      
                 }
         }
         else{
                $msg="This Product Already exits!!";
         }
      }
      // Images Format 
      if($_FILES['image']['type']!='' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg' && $_FILES['image']['type']!='image/png')
      { 
        $msg="Only .Jpeg .Jpg .Png Format Supported";

      }
      
      if($msg=='')
       {

       if(isset($_GET['id']) && $_GET['id'] != '')
       {
        if($_FILES['image']['name'])
        {
             $image=rand(11111111,99999999).'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
            
            $update_sql="update product set categories_id='$category_id',name='$name',mrp='$mrp',price='$price', qty='$qty',
            short_description='$short_desc', description='$description', meta_tittle='$meta_tittle', meta_description='$meta_description'
             ,meta_keyword='$meta_keyword', best_seller='$best_seller',sub_categories_id='$sub_categories_id', image='$image'  where id='$id'";
   }
   else
   {
      $update_sql="update product set categories_id='$category_id',name='$name',mrp='$mrp',price='$price', qty='$qty',
            short_description='$short_desc', description='$description', meta_tittle='$meta_tittle', meta_description='$meta_description'
             ,meta_keyword='$meta_keyword',best_seller='$best_seller',sub_categories_id='$sub_categories_id'  where id='$id'";
   }
    mysqli_query($con,$update_sql);

        }

    else{
            $image=rand(11111111,99999999).'_'.$_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
            mysqli_query($con,"insert into  product (categories_id,sub_categories_id,name,mrp,price,qty,short_description,description,meta_tittle,meta_description,meta_keyword,best_seller,image,status)
            values('$category_id','sub_categories_id','$name','$mrp','$price','$qty','$short_desc','$description','$meta_tittle','$meta_description','$meta_keyword','$best_seller','$image','1')");                                                                     
      }
       redirect('product.php');
}
}
?>
      <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Product</strong><small>Form</small></div>
                        <div class="card-body card-block">
                            <form method="post" enctype="multipart/form-data">
                           <div class="form-group">
                               <label for="company" class=" form-control-label">CategoryID</label>
                               <!-- <input type="text" name="category_id" placeholder="Enter Category Id" class="form-control"> -->
                               <select name="categories_id"required id="categories_id" onchange="get_sub_cat('')" class="form-control">
                                 <option>Select Category</option>
                                 <?php 
                                 
                                 $sql = mysqli_query($con,"select id, categories from categories order by categories desc");
                                  while($row=mysqli_fetch_assoc($sql))
                                  {
                                      if($row['id'] == $category_id)
                                      {
                                        echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
                                      }
                                      else
                                      {
                                        echo "<option value=".$row['id'].">".$row['categories']."</option>";
                                      }
                                     
                                  }
                                 ?>

                               </select>
                            </div>
                            <div class="form-group">
                               <label for="company" class=" form-control-label">SubCategory</label>
                               <!-- <input type="text" name="category_id" placeholder="Enter Category Id" class="form-control"> -->
                               <select name="sub_categories_id" id="sub_categories_id"  class="form-control">
                                 <option>Select SubCategory</option>
                               </select>
                            </div>
                           <div class="form-group">
                           <label for="company" class=" form-control-label">Best Seller</label>
                               <!-- <input type="text" name="category_id" placeholder="Enter Category Id" class="form-control"> -->
                               <select name="best_seller"required class="form-control">
                                 <option value=''>Select</option>
                                 <?php 
                                 
                                 if($best_seller == 1)
                                 {
                                    echo '<option value="1" selected>Yes</option>
                                       <option value="0">No</option>';
                                 }
                                 elseif($best_seller == 0)
                                 {
                                  echo '<option value="1" >Yes</option>
                                  <option value="0" selected>No</option>';
                                 }
                                 else
                                  {
                                  
                                    echo '<option value="1" >Yes</option>
                                    <option value="0" >No</option>';
                                  
                                 }
                                 ?>

                               </select>
                            </div>
                            <div class="form-group">
                               <label for="company" class=" form-control-label">Product Name</label>
                               <input type="text" name="name"  placeholder="Enter Product Name" class="form-control" required value="<?php echo $name ?>">
                        </div>
                            <div class="form-group">
                               <label for="company" class=" form-control-label">Current Price</label>
                               <input type="text" name="price"  placeholder="Enter Price" class="form-control" required value="<?php echo $price ?>">
                        </div>
                        
                        <div class="form-group">
                               <label for="company" class=" form-control-label">Sale Price</label>
                               <input type="text" name="mrp"  placeholder="Enter Mrp" class="form-control" required value="<?php echo $mrp ?>">
                        </div>
                       
                        
                        <div class="form-group">
                               <label for="company" class=" form-control-label">Qty</label>
                               <input type="text" name="qty"  placeholder="Enter Qty" class="form-control" required value="<?php echo $qty ?>">
                        </div>
                       
                        
                           <div class="form-group">
                               <label for="company" class=" form-control-label">Image</label>
                               <input type="file" name="image"  placeholder="Select Image" class="form-control"   <?php echo $image_required; ?>>
                            </div>
                           <div class="form-group">
                               <label for="company" class=" form-control-label">Short Description</label>
                               <input type="text" name="short_description"  placeholder="Enter Short Description" class="form-control" required value="<?php echo $short_desc ?>">
                            </div>

                           <div class="form-group">
                               <label for="company" class=" form-control-label">Description</label>
                               <textarea name="description" placeholder="Enter Description"  class="form-control" required><?php echo $description ?></textarea>
                               <!-- <input type="text" name="description"  placeholder="Enter Description" class="form-control"> -->
                            </div>
                           <div class="form-group">
                               <label for="company" class=" form-control-label">Meta Title</label>
                               <input type="text" name="meta_title"  placeholder="Enter Meta Title" class="form-control"  value="<?php echo $meta_title ?>">
                            </div>
                           
                            <div class="form-group">
                                <label for="company" class=" form-control-label">Meta Description</label>
                                <textarea name="meta_description" class="form-control" placeholder="Enter Meta Description" ><?php echo $meta_description?></textarea>
                                <!-- <input type="text" name="meta_desc"  placeholder="Enter Meta Description" class="form-control"> -->
                            </div>
                           <div class="form-group">
                               <label for="company" class=" form-control-label">Meta Keyword</label>
                               <input type="text" name="meta_keyword"  placeholder="Enter Meta Keyword" class="form-control"  value="<?php echo $meta_keyword?>">
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
         <script>
            function get_sub_cat(sub_cat_id)
            {
               var categories_id = jQuery('#categories_id').val();
               jQuery.ajax({

                  url:'get_sub_cat.php',
                  type:'post',
                  data:'categories_id='+categories_id+'&sub_cat_id='+sub_cat_id,
                  success:function(result)
                  {
                     jQuery('#sub_categories_id').html(result);
                  }
               });
            }
          

   

         </script>
         <!-- Javascript Code to retrive data End -->

<?php
include('footer.php');

?>
<script>
    <?php
    if(isset($_GET['id']))
    {
    ?>
     get_sub_cat('<?php echo $sub_categories_id ?>');
    <?php } ?>
</script>
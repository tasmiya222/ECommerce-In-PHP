<?php
include('header.php');
$msg="";
$categories="";
$sub_categories= "";
// getting value
if(isset($_GET['id']) && $_GET['id']!= '')
{
    $id = get_safe_value($con,$_GET['id']);
    $res = mysqli_query($con,"select * from sub_categories where id='$id'");
    $check = mysqli_num_rows($res);
    if($check > 0)
    {
      $row = mysqli_fetch_assoc($res);
      $categories= $row['categories_id'];
      $sub_categories= $row['sub_categories'];
    }
    else
    {
       redirect('categories.php');
    }
    
}


if(isset($_POST['submit']))
{
   $categories = get_safe_value($con,$_POST['categories']);
   $sub_categories = get_safe_value($con,$_POST['sub_categories']);

   $query=mysqli_query($con,"select * from sub_categories where categories_id='$categories' and sub_categories='$sub_categories'");
   $check = mysqli_num_rows($query);
   if($check >0)
   {
      if(isset($_GET['id']) && $_GET['id'] != '')
      {
         $getData = mysqli_fetch_assoc($query);
         if($id == $getData['id'])
         {

         }
         else
         {
            $msg = "Sub Category Already Exit!!";
         }
      }
      else
      {
         $msg = "Sub Category Already Exit!!";
      }      

   }

   if($msg == '')
   {
   if(isset($_GET['id']) && $_GET['id'] != '')
   {
      mysqli_query($con,"update sub_categories set categories_id='$categories',sub_categories='$sub_categories' where id='$id'");

   } 
    else
    {
      mysqli_query($con,"insert into  sub_categories (categories_id,sub_categories,status)values('$categories','$sub_categories','1')"); 
    }   
      
    redirect('sub_categories.php');
}

}
?>
      <div class="content pb-0">
            <div class="animated fadeIn">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-header"><strong>Categories</strong><small>Form</small></div>
                        <div class="card-body card-block">
                            <form method="post">
                           <div class="form-group"><label for="company" class=" form-control-label">Category Name</label>
                             <select name="categories" id="" class="form-control">
                                <option value="">Select Category</option>
                                <?php
                                 $query = mysqli_query($con,"select * from categories  where status = '1'");
                                 while($row= mysqli_fetch_assoc($query))
                                 {
                                    if($row['id'] == $categories)
                                    {
                                       echo "<option value=".$row['id']." selected>".$row['categories']."</option>";
                                    }
                                    else
                                    {
                                       echo "<option value=".$row['id'].">".$row['categories']."</option>";
                                    }
                                    
                                 }
                                ?>
                             </select>
                              </div>
                              <div class="form-group"><label for="company" class=" form-control-label">Sub Category </label>
                                  <input type="text" name="sub_categories" value="<?php echo $sub_categories ?>" class="form-control" placeholder="Enter Sub Categories">
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

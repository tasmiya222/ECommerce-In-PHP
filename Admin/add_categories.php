<?php
include('header.php');
$msg="";
$category_name="";
// getting value
if(isset($_GET['id']) && $_GET['id']!= '')
{
    $id = get_safe_value($con,$_GET['id']);
    $res = mysqli_query($con,"select * from categories where id='$id'");
    $check = mysqli_num_rows($res);
    if($check > 0)
    {
      $row = mysqli_fetch_assoc($res);
      $category_name = $row['categories'];
    }
    else
    {
       redirect('categories.php');
    }
    
}


if(isset($_POST['submit']))
{
   $category_name = get_safe_value($con,$_POST['category_name']);

   $query=mysqli_query($con,"select * from categories where categories='$category_name'");
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
            $msg = "Category Already Exit!!";
         }
      }
      else
      {
         $msg = "Category Already Exit!!";
      }      

   }

   if($msg == '')
   {
   if(isset($_GET['id']) && $_GET['id'] != '')
   {
      mysqli_query($con,"update categories set categories='$category_names' where id='$id'");

   } 
    else
    {
      mysqli_query($con,"insert into  categories (categories,status)values('$category_name','1')"); 
    }   
      
    redirect('categories.php');
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
                           <input type="text" name="category_name" value="<?php echo $category_name; ?>" placeholder="Enter Category Name" class="form-control"></div>
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

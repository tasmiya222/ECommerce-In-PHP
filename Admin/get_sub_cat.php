<?php
include('connection.inc.php');
include('function.inc.php');

$categories_id = get_safe_value($con,$_POST['categories_id']);
$sub_cat_id = get_safe_value($con,$_POST['sub_cat_id']);
$sql = mysqli_query($con,"select * from sub_categories where categories_id='$categories_id' and status='1'");
// chechking weather sub_categories exists
if(mysqli_num_rows($sql)>0)
{
   $html='';
   while($row= mysqli_fetch_assoc($sql))
   { 
       if($sub_cat_id == $row['id'])
       {
        $html.=" <option value=".$row['id']." selected>".$row['sub_categories']."</option>";
       }
       else
       {
        $html.=" <option value=".$row['id'].">".$row['sub_categories']."</option>";

       }
       
   }
   echo $html;
}
else
{
    echo "<option>No Sub Category</option>";
}
?>
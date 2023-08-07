<?php
error_reporting(0);
include('header.php');
// Status Active & DeActive
if(isset($_GET['type']) & $_GET['type'] != '')
{
    $type = get_safe_value($con,$_GET['type']);
    if($type == 'status')
    {
        $id= get_safe_value($con,$_GET['id']);
        $operation = get_safe_value($con,$_GET['operation']);
     
        if($operation == 'active')
        {
            $status = '1';
        }       
        else
        {
            $status = '0';
        }
        $update_status = "update  sub_categories set status='$status' where id='$id'";
        mysqli_query($con,$update_status);
      }

    if($type == 'delete')
    {
        $id= get_safe_value($con,$_GET['id']);
        $delete_status = "delete from sub_categories where id='$id'";
        mysqli_query($con,$delete_status);        
    }
}   

$Query = "select sub_categories.*,categories.categories  from sub_categories,categories where
 categories.id=sub_categories.categories_id  order by sub_categories asc";
$QueryLogin =mysqli_query($con, $Query);
?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Sub Categories </h4>
                           <h4 class="box-link"><a href="add_sub_categories.php">Add Sub Categories</a> </h4>

                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th>ID</th>
                                       <th>Category Name</th>
                                       <th>Sub Category</th>
                                         <th></th>

                                    </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                     $i = 1; 
                                     while($row = mysqli_fetch_assoc($QueryLogin)){
                                     ?>
                                    <tr>
                                       <td class="serial"><?php echo $i; ?>.</td>
                                       <td><?php echo $row['id']; ?></td>
                                       <td><?php echo $row['categories']; ?></td>
                                       <td><?php echo $row['sub_categories']; ?></td>
                                       <td>
                                           <?php if( $row['status'] == '1')
                                           {
                                                echo "<a href='?type=status&operation=deactive&id=".$row['id']."'>
                                                <span class='badge badge-complete'>Active</span></a> &nbsp";
                                           }
                                           else
                                           {
                                            echo "<a href='?type=status&operation=active&id=".$row['id']."'><span class='badge badge-pending'>DeActive</span></a> &nbsp";
                                           }
                                           echo  "<a href='add_sub_categories.php?type=edit&id=".$row['id']."'><span class='badge badge-info'>Edit</span></a> ";

                                           echo  "<a href='?type=delete&id=".$row['id']."'><span class='badge badge-danger'>Delete</span></a> &nbsp";
                                       
                                           
                                               ?>
                                        
                                        </td>
                                    </tr>
                                  <?php $i++;  } ?>
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
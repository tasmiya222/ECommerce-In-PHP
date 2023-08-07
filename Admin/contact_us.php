<?php
include('header.php');
error_reporting(0);

$type = get_safe_value($con,$_GET['type']);
    if($type == 'delete')
    {
       $id= get_safe_value($con,$_GET['id']);
        $delete_status = "DELETE FROM contact_us WHERE id='$id'";
        mysqli_query($con,$delete_status);        
    }


$Query = "select * from contact_us order by id desc";
$QueryLogin =mysqli_query($con, $Query);
?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Contact Us </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th class="serial">#</th>
                                       <th>ID</th>
                                       <th>Name</th>
                                       <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Comment</th> 
                                        <th>Added On</th> 
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
                                       <td><?php echo $row['name']; ?></td>
                                       <td><?php echo $row['email']; ?></td>
                                       <td><?php echo $row['mobile']; ?></td>
                                       <td><?php echo $row['comment'] ?></td>
                                       <td><?php echo $row['added_on'] ?></td>

                                       <td>
                                     <?php

                                           echo  "<a href='?type=delete&id=".$row['id']."'><span class='badge badge-danger'>Delete</span></a>";
                                       
                                           
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
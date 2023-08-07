<?php
error_reporting(0);
include('header.php');
$type = get_safe_value($con,$_GET['type']);
    if($type == 'delete')
    {
        $id= get_safe_value($con,$_GET['id']);
        $delete_status = "delete from users where id='$id'";
        mysqli_query($con,$delete_status);        
    }


$Query = "select * from users order by id desc";
$QueryLogin =mysqli_query($con, $Query);

?>
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">User </h4>
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
                                        <th>Password</th>
                                        <th>Mobile</th> 
                                        <th>Date</th> 
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
                                       <td><?php echo $row['password']; ?></td>
                                       <td><?php echo $row['mobile'] ?></td>
                                       <td><?php echo $row['added_on'] ?></td>

                                       <td>
                                     <?php

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
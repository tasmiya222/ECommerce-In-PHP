<?php
include('header.php');
// Checking if user is login
if(!isset($_SESSION['USER_LOGIN']))
{
  redirect('index.php');
}
// user id
$uid = $_SESSION['USER_ID'];

// Fetching Data from wishlist Table 
$Query=mysqli_query($con,"select  product.name,product.price,product.image,wishlist.id from 
product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'");
?>

    <!-- Breadcrumb Section Start -->
    <div class="section">

        <!-- Breadcrumb Area Start -->
        <div class="breadcrumb-area bg-primary">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li>
                            <a href="index.php"><i class="fa fa-home"></i> </a>
                        </li>
                        <li class="active">Wishlist </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Start -->
    <div class="section section-margin">
        <div class="container">

            <div class="row">
                <div class="col-12">

                    <!-- Cart Table Start -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">

                            <!-- Table Head Start -->
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <!-- Table Head End -->

                            <!-- Table Body Start -->
                            <tbody>
                                <?php
                                    while($row=mysqli_fetch_assoc($Query))
                                    {
                                ?>
                                <tr>
                                    <td class="pro-thumbnail"><a href="#"><img class="fit-image" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image'] ?>" alt="Product" /></a></td>
                                    <td class="pro-title"><a href="#"><?php   echo $row['name']?></a></td>
                                    <td class="pro-price"><span>Rs<?php echo $row['price'] ?>/-</span></td>
                                    <td class="pro-remove"><a href="wishlist.php?wishlist_id=<?php  echo $row['id']?>"><i class="pe-7s-close"></i></a></td>
                                </tr>
                          
                            </tbody>
                            <?php } ?>
                           <!-- Table Body End -->
                        </table>
                    </div>
                    <!-- Cart Table End -->
                </div>
            </div>

         
        </div>
    </div>
    <!-- Shopping Cart Section End -->

   <?php
   include('footer.php');
   
   ?>
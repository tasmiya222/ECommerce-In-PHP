<?php
include('connection.inc.php');
include('function.inc.php');
include('add_to_cart.inc.php');
// fetching category from databsse 
$cat_res = mysqli_query($con,"select * from categories where status=1 order by categories asc");
$catArr = array();
while($row = mysqli_fetch_assoc($cat_res))
{
    $catArr[] = $row;
}
$obj = new add_to_cart();
$totalProduct = $obj->totalProduct();
// wishlist 
if(isset($_SESSION['USER_LOGIN'])) //if user is login than appear
{
//    user_id
 $uid = $_SESSION['USER_ID'];

 // Remove data from Table 
 if(isset($_GET['wishlist_id']))
 {
    $wid= $_GET['wishlist_id'];
    mysqli_query($con,"delete from wishlist where id='$wid' and user_id='$uid'");
}
// count the wishlist number
$wishlist_count=mysqli_num_rows(mysqli_query($con,"select  product.name,product.price,product.image,wishlist.id from 
    product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'"));
}
// Meta Tags For SEO
$meta_title="";
$meta_keyword="";
$meta_desc="";
//default Meta value
$meta_desc="AKCulture ";
$meta_keyword="AKCulture";
$meta_title = "AKCulture";

// for product page only
$script_name = $_SERVER['SCRIPT_NAME'];
$script_name_arr = explode('/',$script_name);
$mypage = $script_name_arr[count($script_name_arr)-1];

// Product page 
if($mypage == 'product.php')
{
    $product_id = get_safe_value($con,$_GET['id']);
    $product_meta_res = mysqli_fetch_assoc(mysqli_query($con,"select * from product where id='$product_id'"));
    $meta_title = $product_meta_res['meta_tittle'];
    $meta_desc = $product_meta_res['meta_description'];
    $meta_keyword = $product_meta_res['meta_keyword'];
}
// product page
if($mypage == 'contact.php')
{
    $meta_title = 'Contact Us|AK Culture';
}
// Category Pages
if($mypage == 'categories.php'|| $mypage== 'search.php')
{
    $meta_title = 'Product Category|Ak Culture';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $meta_title; ?></title>
    <meta name="description" content="<?php echo $meta_desc ?>" />
    <meta name="keyword" content="<?php echo $meta_keyword ?>" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link rel="stylesheet" href="assets/css/custom.css" /> 
    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- icon link -->
    <script src="https://kit.fontawesome.com/6ac72d2bab.js" crossorigin="anonymous"></script>
</head>
<body>
   <!-- Header Top Start -->
        <div>
            <div class="container">
                <div class="row align-items-center">

                    <!-- Header Top Message Start -->
                    <div class="col-12">
                        <div class="header-top-msg-wrapper text-center" style="font-size:18px; color:#0a0808">
                            <marquee>
                            FREE DELIVERY ON ORDERS ABOVE Rs.1500/-, LESS THAN Rs.1500/- ORDER DELIVERY CHARGERS WILL APPLY Rs150/- ALL OVER PAKISTAN. 
                            </marquee>
                        </div>
                    </div>
                    <!-- Header Top Message End -->
                </div>
            </div>
        </div>
        <!-- Header Top End --> 
    <!-- Header Bottom Start -->
    <div class="header-bottom">
        <div class="header-sticky">
            <div class="container">
                <div class="row align-items-center position-relative">
                    <!-- Header Logo Start -->
                    <div class="col-md-6 col-lg-3 col-xl-2 col-6">
                        <div class="header-logo">
                            <a href="index.php"><img src="assets/images/logo/ak_culturalLogo.png" alt="Site Logo" /></a>
                        </div>
                    </div>
                    <!-- Header Logo End -->
                    <!-- Header Menu Start -->
                    <div class="col-lg-6 d-none d-lg-block">
                        <div class="main-menu">
                            <ul>
                                <li class="has-children">
                                    <a href="index.php">Home</a>
                                </li>
                                
                                <?php
                                foreach($catArr as $list)
                                {
                                    ?>
                                    <li  class="has-children"><a href="categories.php?id=<?php echo $list['id']; ?>"><?php echo $list['categories'] ?>
                                    <i class="fa fa-angle-down"></i></a>
                                    <?php 
                                    $cat_id = $list['id'];
                                    $sub_cat_res= mysqli_query($con,"select * from sub_categories where categories_id='$cat_id' and status='1'");
                                    if(mysqli_num_rows($sub_cat_res)>0)
                                    {
                                     ?>
                                     <ul class="sub-menu">
                                         
                                        <?php
                                        while($sub_cat_row= mysqli_fetch_assoc($sub_cat_res))
                                        {
                                           echo '<li><a href="categories.php?id='.$list['id'].'&sub_categories='.$sub_cat_row['id'].'">'.$sub_cat_row['sub_categories'].'</a></li>';                                           
                                       }
                                       ?>    
                                       
                                   </ul>
                               <?php } ?>
                           </li>
                       <?php } ?>
                       
                       
                       <li><a href="about.html">About</a></li>
                   </ul>
               </div>
           </div>
           <!-- Header Menu End -->

           <!-- Header Action Start -->
           <div class="col-md-6 col-lg-3 col-xl-4 col-6 justify-content-end">
            <div class="header-actions">
                <a href="javascript:void(0)" class="header-action-btn header-action-btn-search d-none d-lg-block"><i class="pe-7s-search"></i></a>
                <?php if(isset($_SESSION['USER_LOGIN']))
                {
                    echo "<a style='color:btn-dark btn-hover-primary; font-size:1.5em; font-family: anton;'   href='my-account.php'>$_SESSION[USER_NAME]</a>";
                                // echo '<a style="color:btn-dark btn-hover-primary" href="logout.php">Logout </a>';
                    
                } 
                else
                {
                  echo ' <div class="dropdown-user d-none d-lg-block">
                  <a href="register.php" class="header-action-btn"><i class="pe-7s-user"></i></a>
                  </div>';
              }
              ?>
              <?php
                            //  check user is login
              if(isset($_SESSION['USER_LOGIN']))
              {
                 ?>
                 <a href="wishlist.php" class="header-action-btn header-action-btn-wishlist">
                    <i class="pe-7s-like"></i>
                    <span class="header-action-num"><?php echo $wishlist_count ?></span>
                <?php } ?>
                <a href="javascript:void(0)" class="header-action-btn header-action-btn-cart">
                    <i class="pe-7s-cart"></i>
                    <span class="header-action-num" style="background-color:#e72828" ><?php echo $totalProduct ?></span>
                </a>
                
                <!-- Mobile Menu Hambarger Action Button Start -->
                <a href="javascript:void(0)" class="header-action-btn header-action-btn-menu d-lg-none d-md-block">
                    <i class="fa fa-bars"></i>
                </a>
                <!-- Mobile Menu Hambarger Action Button End -->

            </div>
        </div>
        <!-- Header Action End -->

    </div>
</div>
</div>
</div>
<!-- Header Bottom End -->

<!-- Offcanvas Search Start -->
<div class="offcanvas-search">
    <div class="offcanvas-search-inner">

        <!-- Button Close Start -->
        <div class="offcanvas-btn-close">
            <i class="pe-7s-close"></i>
        </div>
        <!-- Button Close End -->

        <!-- Offcanvas Search Form Start -->
        <form class="offcanvas-search-form" action="search.php">
            <input type="text" placeholder="Search Product..." name="str" class="offcanvas-search-input">
        </form>
        <!-- Offcanvas Search Form End -->

    </div>
</div>
<!-- Offcanvas Search End -->

<!-- Cart Offcanvas Start -->
<div class="cart-offcanvas-wrapper">
    <div class="offcanvas-overlay"></div>
    <!-- Cart Offcanvas Inner Start -->
    <div class="cart-offcanvas-inner">
        <!-- Button Close Start -->
        <div class="offcanvas-btn-close">
            <i class="pe-7s-close"></i>
        </div>
        <!-- Button Close End -->
        <!-- Offcanvas Cart Content Start -->
        <div class="offcanvas-cart-content">
            <!-- Offcanvas Cart Title Start -->
            <h2 class="offcanvas-cart-title mb-10">Cart</h2>
            <hr>
            <!-- Offcanvas Cart Title End    -->
            <?php
            if(isset($_SESSION['cart']) && $_SESSION['cart']>0)
            {
                $cart_total=0;
                foreach ($_SESSION['cart'] as $key => $val) {
                    $productArr = get_product($con,'','',$key);
                    $pname = $productArr[0]['name'];
                    $Pid = $productArr[0]['id'];
                    $price = $productArr[0]['price'];
                            // $mrp = $productArr[0]['mrp'];
                    $image = $productArr[0]['image'];
                    $qty = $val['qty'];
                    $cart_total = $cart_total+($price*$qty);
                    ?>
                    
                    <!-- Cart Product/Price Start -->
                    <div class="cart-product-wrapper mb-4 pb-4 border-bottom">
                        <!-- Single Cart Product Start -->
                        <div class="single-cart-product">
                            <div class="cart-product-thumb">
                                <a href="product.php?id=<?php echo $Pid; ?>"><img src="<?php echo  PRODUCT_IMAGE_SITE_PATH.$image; ?>" alt="Cart Product"></a>
                            </div>
                            <div class="cart-product-content">
                                <h3 class="title"><a href="product.php?id=<?php echo $Pid; ?>"><?php echo $pname;?></a></h3>
                                <div class="product-quty-price">
                                    <span class="price">
                                        <span class="new">Rs<?php echo $price?> /-</span>
                                    </span>
                                    <span class="cart-quantity" style="margin-right:80px ">Quantity:<?php  echo $qty ?><strong> × </strong></span>   
                                </div>
                            </div>
                        </div>
                        <!-- Single Cart Product End -->
                        
                        <!-- Product Remove Start -->
                        <div class="cart-product-remove">
                            <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>','remove')"><i class="pe-7s-close"></i></a>
                        </div>
                        <!-- Product Remove End -->

                    </div>
                    <!-- Cart Product/Price End -->
                <?php } ?>
                
                <!-- Cart Product Total Start -->
                <div class="cart-product-total mb-4 pb-4 border-bottom">
                    <span class="value">SubTotal</span>
                    <span class="price">Rs<?php echo $cart_total; ?>/-</span>
                </div>
                <!-- Cart Product Total End -->
            <?php } else { echo "Currently Yor Cart is Empty!!"; } ?>
            <!-- Cart Product Button Start -->
            <div class="cart-product-btn mt-4">
                <a href="cart.php" class="btn btn-light btn-hover-primary w-100"><i class="fa fa-shopping-cart"></i> View cart</a>
                <a href="checkout.php" class="btn btn-light btn-hover-primary w-100 mt-4"><i class="fa fa-share"></i> Checkout</a>
            </div>
            <!-- Cart Product Button End -->

        </div>
        <!-- Offcanvas Cart Content End -->

    </div>
    <!-- Cart Offcanvas Inner End -->
</div>
<!-- Cart Offcanvas End -->
</div>
<!-- Header Section End -->
<!-- Mobile Menu Start -->
<div class="mobile-menu-wrapper">
    <div class="offcanvas-overlay"></div>
    <div class="mobile-menu-inner">
        <div class="offcanvas-btn-close">
            <i class="pe-7s-close"></i>
        </div>
        <!-- Button Close End -->
        <div class="mobile-menu-inner-wrapper">
            <div class="search-box-offcanvas">
                <form>
                    <input class="search-input-offcanvas" type="text" placeholder="Search product...">
                    <button class="search-btn"><i class="pe-7s-search"></i></button>
                </form>
            </div>
            <!-- Mobile Menu Search Box End -->
            <!-- Mobile Menu Start -->
            <div class="mobile-navigation">
                <nav>
                    <ul class="mobile-menu">
                        <li class="has-children">
                            <a href="index.php">Home</a>        
                        </li>
                        
                        <?php
                        foreach($catArr as $list)
                        {
                            ?>
                            <li  class="has-children"><a href="categories.php?id=<?php echo $list['id']; ?>"><?php echo $list['categories'] ?>
                            <i class="fa fa-angle-down"></i></a>
                            <?php 
                            $cat_id = $list['id'];
                            $sub_cat_res= mysqli_query($con,"select * from sub_categories where categories_id='$cat_id' and status='1'");
                            if(mysqli_num_rows($sub_cat_res)>0)
                            {
                             ?>
                             <ul class="sub-menu">
                                 
                                <?php
                                while($sub_cat_row= mysqli_fetch_assoc($sub_cat_res))
                                {
                                   echo '<li><a href="categories.php?id='.$list['id'].'&sub_categories='.$sub_cat_row['id'].'">'.$sub_cat_row['sub_categories'].'</a></li>';                                           
                               }
                               ?>    
                               
                           </ul>
                       <?php } ?>
                   </li>
               <?php } ?>
               
               <li><a href="about.html">About</a></li>
               
           </ul>
       </nav>
   </div>
   <!-- Mobile Menu End -->
   <!-- Contact Links/Social Links Start -->
   <div class="mt-auto bottom-0">
    <!-- Contact Links Start -->
    <ul class="contact-links">
        <li><i class="fa fa-phone"></i><a href="#"> +012 3456 789</a></li>
        <li><i class="fa fa-envelope-o"></i><a href="#"> info@example.com</a></li>
        <li><i class="fa fa-clock-o"></i> <span>Monday - Sunday 9.00 - 18.00</span> </li>
    </ul>
    <!-- Contact Links End -->
    <!-- Social Widget Start -->
    <div class="widget-social">
        <a title="Facebook" href="#"><i class="fa fa-facebook-f"></i></a>
        <a title="Linkedin" href="#"><i class="fa fa-linkedin"></i></a>
    </div>
</div>
</div>
</div>  
</div>

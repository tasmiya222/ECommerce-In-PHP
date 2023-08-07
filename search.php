<?php

include('header.php');
$str = mysqli_real_escape_string($con,$_GET['str']);
// if someone insert any inValid to Url categoreies
if($str != '')
{
    $get_product= get_product($con,'','','',$str);
}
else
{
    redirect('index.php');
}

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
                        <li class="active">Search</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <?php
                 if(count($get_product)>0)
                 {
                
                ?>
                <div class="col-12">

                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper flex-column flex-md-row pb-10 mb-n4">
                        <!-- Shopt Top Bar Right Start -->
                        <div class="shop-top-bar-right mb-4">

                            <h4 class="title me-2">Short By: </h4>

                            <div class="shop-short-by">
                                <select class="nice-select" aria-label=".form-select-sm example">
                                    <option selected>Short by Default</option>
                                    <option value="1">Short by Popularity</option>
                                    <option value="2">Short by Rated</option>
                                    <option value="3">Short by Latest</option>
                                    <option value="3">Short by Price</option>
                                    <option value="3">Short by Price</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row shop_wrapper grid_4">
                        <?php
                        
                          foreach ($get_product as $list)
                          {                        
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 product">
                            <div class="product-inner">
                                <div class="thumb">
                                    <a href="product.php?id=<?php echo $list['id'] ?>" class="image">
                                        <img class="first-image" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image'] ?>" alt="Product" />
                                        <!-- <img class="second-image fit-image" src="assets/images/products/medium-product/3.jpg" alt="Product" /> -->
                                    </a>
                                    <span class="badges">
                                            <!-- <span class="sale">-18%</span> -->
                                    </span>
                                    <div class="actions">
                                        <a href="wishlist.html" class="action wishlist"><i class="pe-7s-like"></i></a>  
                                        <a href="#" class="action quickview" data-bs-toggle="modal" data-bs-target="#quick-view"><i class="pe-7s-search"></i></a>
                                    </div>
                                    <div class="add-cart-btn">
                                        <button class="btn btn-whited btn-hover-primary text-capitalize add-to-cart">Add To Cart</button>
                                    </div>
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="product.php?id=<?php echo $list['id']?>"><?php echo $list['name'] ?></a></h5>
                                    <span class="price">
                                            <span class="new"><?php echo $list['price']; ?></span>
                                    <!-- <span class="old"><?php echo $list['mrp']; ?></span> -->
                                    </span>
                                    <!-- <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p> -->
                                </div>
                            </div>
                        </div>
                       <?php
                          }
                        ?>
                        <!-- Single Product End -->



                    </div>
                    <!-- Shop Wrapper End -->

                    
                    <div class="shop_toolbar_wrapper mt-10 mb-n4">

                      

                        <!-- Shopt Top Bar Right Start -->
                        <div class="shop-top-bar-right mb-4">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item disabled">
                                        <a class="page-link rounded-0" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link rounded-0" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Shopt Top Bar Right End -->

                    </div>
                    <!--shop toolbar end-->

                </div>
                <?php
                 }
                 else
                 {
                     echo "Data Not Found";
                 }
                ?>
            </div>
        </div>
    </div>
    <!-- Shop Section End -->

   

 <?php 
  include('footer.php');
 
 ?>
<?php
include('header.php');
//To get products from category.
$product_id = get_safe_value($con,$_GET['id']);
if($product_id>0)
{
    $get_product= get_product($con,'','', $product_id);
}
else
{
   redirect('index.php');
}


?>
    <div class="section">
        <div class="breadcrumb-area bg-primary">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li>
                            <a href="index.php"><i class="fa fa-home"></i> </a>
                        </li>
                        <li class="active"><a href="categories.php?id=<?php echo $get_product['0']['categories_id'] ?>"><?php echo $get_product['0']['categories'] ?></a></li>
                        <li class="active"><?php echo $get_product['0']['name']?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Product Section Start -->
    <div class="section section-margin-top">
        <div class="container">

            <div class="row">
                <div class="col-lg-5 offset-lg-0 col-md-8 offset-md-2">
                    <!-- Product Details Image Start -->
                    <div class="product-details-img">
                       
                        <!-- Single Product Image Start -->
                        <div class="single-product-img swiper-container product-gallery-top">
                            <div class="swiper-wrapper popup-gallery">
                                <a class="swiper-slide w-100" href="#">
                                    <img class="w-100" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image'] ?>" alt="Product">
                                </a>
                                <!-- <a class="swiper-slide w-100" href="assets/images/products/large-product/2.jpg">
                                    <img class="w-100" src="assets/images/products/large-product/2.jpg" alt="Product">
                                </a>
                                <a class="swiper-slide w-100" href="assets/images/products/large-product/3.jpg">
                                    <img class="w-100" src="assets/images/products/large-product/3.jpg" alt="Product">
                                </a>
                                <a class="swiper-slide w-100" href="assets/images/products/large-product/4.jpg">
                                    <img class="w-100" src="assets/images/products/large-product/4.jpg" alt="Product">
                                </a>
                                <a class="swiper-slide w-100" href="assets/images/products/large-product/5.jpg">
                                    <img class="w-100" src="assets/images/products/large-product/5.jpg" alt="Product">
                                </a> -->
                            </div>
                        </div>
                        <!-- Single Product Image End -->

                        <!-- Single Product Thumb Start -->
                        <div class="single-product-thumb swiper-container product-gallery-thumbs">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="assets/images/products/small-product/10.jpg" alt="Product">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/products/small-product/2.jpg" alt="Product">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/products/small-product/3.jpg" alt="Product">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/products/small-product/15.jpg" alt="Product">
                                </div>
                                <div class="swiper-slide">
                                    <img src="assets/images/products/small-product/8.jpg" alt="Product">
                                </div>
                            </div>

                            <!-- Next Previous Button Start -->
                            <div class="swiper-button-next swiper-button-white"><i class="pe-7s-angle-right"></i></div>
                            <div class="swiper-button-prev swiper-button-white"><i class="pe-7s-angle-left"></i></div>
                            <!-- Next Previous Button End -->

                        </div>
                        <!-- Single Product Thumb End -->

                    </div>
                    <!-- Product Details Image End -->

                </div>
                <div class="col-lg-7">

                    <!-- Product Summery Start -->
                    <div class="product-summery position-relative">

                        <!-- Product Head Start -->
                        <div class="product-head mb-3">
                            <h2 class="product-title"><?php echo $get_product['0']['name'] ?></h2>
                        </div>
                        <!-- Product Head End -->

                        <!-- Rating Start -->
                        <!-- <span class="ratings justify-content-start mb-2">
                                <span class="rating-wrap">
                                    <span class="star" style="width: 100%"></span>
                        </span> -->
                        <!-- <span class="rating-num">(4)</span> -->
                        </span>
                        <!-- Rating End -->

                        <!-- Price Box Start -->
                        <div class="price-box mb-2">
                          <strong style="font-size:20px">Price:</strong> <span class="regular-price">Rs<?php echo $get_product[0]['price']; ?></span>
                            <!-- <span class="old-price"><del>$90.00</del></span> -->
                        </div>
                        <!-- Price Box End -->

                        <!-- SKU Start -->
                        <div class="sku mb-3">
                            <!-- <span>SKU: 12345</span> -->
                        </div>
                        <!-- SKU End -->
                         <?php
                          
                        $productSoldQtyByProductId=productSoldQtyByProductId($con,$get_product['0']['id']);
                        $pending_qty= $get_product['0']['qty']-$productSoldQtyByProductId;
                        $cart_show='yes';
                        if($get_product['0']['qty']>$productSoldQtyByProductId)
                        {
                            $stock = "In Stock";
                        }
                        else
                        {
                            $stock = "Out Of Stock";
                            $cart_show='';
                        }
                         ?>
                        <!-- Product Inventory Start -->
                        <div class="product-inventroy mb-3">
                            <span class="inventroy-title"> <strong>Availability:</strong></span>
                            <span class="inventory-varient"> <?php echo $stock ?></span>
                        </div>
                        <!-- Product Inventory End -->

                        <!-- Description Start -->
                        <p class="desc-content mb-5"><?php echo $get_product[0]['short_description'] ?></p>
                        <!-- Description End -->

                        <!-- Product Coler Variation Start -->
                        <div class="product-color-variation mb-5">
                            <span> <strong>Color: </strong></span>
                            <button type="button" class="btn bg-danger"></button>
                            <button type="button" class="btn bg-primary"></button>
                            <button type="button" class="btn bg-dark"></button>
                            <button type="button" class="btn bg-success"></button>
                        </div>
                        <!-- Product Coler Variation End -->

                        <!-- Product Size Start -->
                        <!-- <div class="product-size mb-5">
                            <span><strong>Size :</strong></span>
                            <a href="#" class="size-ratio active">m</a>
                            <a href="#" class="size-ratio">l</a>
                            <a href="#" class="size-ratio">xl</a>
                            <a href="#" class="size-ratio">xxl</a>
                        </div> -->
                        <!-- Product Size End -->
                        <?php if($cart_show != ''){ ?>
                        <!-- Quantity Start -->
                        <div class="quantity d-flex align-items-center mb-5">
                            <span class="me-2"><strong>Qty: </strong></span>
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" value="1" id="qty" type="text">
                                <div class="dec qtybutton"></div>
                                <div class="inc qtybutton"></div>
                           
                            </div>
                        </div>
                        <?php } ?>
                        <!-- Quantity End -->
                         <?php if($cart_show != ''){ ?>
                        <!-- Cart Button Start -->
                        <div class="cart-btn mb-4">
                            <div class="add-to_cart">
                                <a class="btn btn-dark btn-hover-primary" href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product[0]['id']?>','add')">Add to cart</a>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- <div class="social-share">
                            <span><strong>Social: </strong></span> -->
                            <!-- <a href="#" class="facebook-color"><i class="fa fa-facebook"></i> Like</a>
                            <a href="#" class="twitter-color"><i class="fa fa-twitter"></i> Tweet</a> -->
                        <!-- </div> -->
                    </div>
                </div>
            </div>

            <div class="row section-margin">
                <!-- Single Product Tab Start -->
                <div class="col-lg-12 single-product-tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#connect-1" role="tab" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#connect-2" role="tab" aria-selected="false">Reviews</a>
                        </li>
                    </ul>
                    <div class="tab-content mb-text" id="myTabContent">
                        <div class="tab-pane fade show active" id="connect-1" role="tabpanel" aria-labelledby="home-tab">
                            <div class="desc-content p-3">
                                <p class="mb-3"><?php echo $get_product[0]['description']?></p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="connect-2" role="tabpanel" aria-labelledby="profile-tab">
                            <!-- Start Single Content -->
                            <div class="product_tab_content border p-3">
                                <!-- Start Single Review -->
                                <div class="single-review d-flex mb-4">
                                    <!-- Review Thumb Start -->
                                    <div class="review_thumb">
                                        <img alt="review images" src="assets/images/review/1.jpg">
                                    </div>
                                    <!-- Review Thumb End -->
                                    <!-- Review Details Start -->
                                    <div class="review_details">
                                        <div class="review_info mb-2">
                                            <!-- Rating Start -->
                                            <span class="ratings justify-content-start mb-3">
                                                    <span class="rating-wrap">
                                                        <span class="star" style="width: 100%"></span>
                                            </span>
                                            <span class="rating-num">(1)</span>
                                            </span>
                                            <!-- Rating End -->
                                            <!-- Review Title & Date Start -->
                                            <div class="review-title-date d-flex">
                                                <h5 class="title">Admin - </h5><span> January 19, 2021</span>
                                            </div>
                                            <!-- Review Title & Date End -->

                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin in viverra ex, vitae vestibulum arcu. Duis sollicitudin metus sed lorem commodo, eu dapibus libero interdum. Morbi convallis viverra erat, et aliquet orci congue vel. Integer in odio enim. Pellentesque in dignissim leo. Vivamus varius ex sit amet quam tincidunt iaculis.</p>
                                    </div>
                                    <!-- Review Details End -->

                                </div>
                                <!-- End Single Review -->

                                <!-- Rating Wrap Start -->
                                <div class="rating_wrap">
                                    <h5 class="rating-title mb-2">Add a review </h5>
                                    <p class="mb-2">Your email address will not be published. Required fields are marked *</p>
                                    <h6 class="rating-sub-title mb-2">Your Rating</h6>

                                    <!-- Rating Start -->
                                    <span class="ratings justify-content-start mb-3">
                                            <span class="rating-wrap">
                                                <span class="star" style="width: 100%"></span>
                                    </span>
                                    <span class="rating-num">(2)</span>
                                    </span>
                                    <!-- Rating End -->

                                </div>
                                <!-- Rating Wrap End -->

                                <!-- Comments ans Replay Start -->
                                <div class="comments-area comments-reply-area">
                                    <div class="row">
                                        <div class="col-lg-12 col-custom">

                                            <!-- Comment form Start -->
                                            <form action="#" class="comment-form-area">
                                                <div class="row comment-input">

                                                    <!-- Input Name Start -->
                                                    <div class="col-md-6 col-custom comment-form-author mb-3">
                                                        <label>Name <span class="required">*</span></label>
                                                        <input type="text" required="required" name="Name">
                                                    </div>
                                                    <!-- Input Name End -->

                                                    <!-- Input Email Start -->
                                                    <div class="col-md-6 col-custom comment-form-emai mb-3">
                                                        <label>Email <span class="required">*</span></label>
                                                        <input type="text" required="required" name="email">
                                                    </div>
                                                    <!-- Input Email End -->

                                                </div>
                                                <!-- Comment Texarea Start -->
                                                <div class="comment-form-comment mb-3">
                                                    <label>Comment</label>
                                                    <textarea class="comment-notes" required="required"></textarea>
                                                </div>
                                                <!-- Comment Texarea End -->

                                                <!-- Comment Submit Button Start -->
                                                <div class="comment-form-submit">
                                                    <button class="btn btn-dark btn-hover-primary">Submit</button>
                                                </div>
                                                <!-- Comment Submit Button End -->
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php

include('footer.php');
?>
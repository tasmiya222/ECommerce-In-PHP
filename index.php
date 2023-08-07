<?php
 include('header.php');
?>

    <!-- Hero/Intro Slider Start -->
    <div class="section">
        <div class="hero-slider swiper-container">
            <div class="swiper-wrapper">

                <div class="hero-slide-item swiper-slide">
                    <div class="hero-slide-bg">
                        <img src="assets/images/slider/slider2-1.jpg" alt="Slider Image" />
                    </div>
                    <div class="container">
                        <div class="hero-slide-content text-center">
                            <h2 class="title m-0 text-white">Get -30% off</h2>
                            <p class="text-white">Latest baby product & toy collections.</p>
                            <a href="shop.html" class="btn btn-secondary btn-hover-primary">Shop Now</a>
                        </div>
                    </div>
                </div>

                <div class="hero-slide-item swiper-slide">
                    <div class="hero-slide-bg">
                        <img src="assets/images/slider/slider2-2.jpg" alt="Slider Image" />
                    </div>
                    <div class="container">
                        <div class="hero-slide-content">
                            <h2 class="title m-0 text-white"> New Arrivals <br />Amazing Craft </h2>
                            <p class="text-white">Latest baby product & toy collections.</p>
                            <a href="shop.html" class="btn btn-secondary btn-hover-primary">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Swiper Pagination Start -->
            <div class="swiper-pagination d-md-none"></div>
            <!-- Swiper Pagination End -->

            <!-- Swiper Navigation Start -->
            <div class="home-slider-prev swiper-button-prev main-slider-nav d-md-flex d-none"><i class="pe-7s-angle-left"></i></div>
            <div class="home-slider-next swiper-button-next main-slider-nav d-md-flex d-none"><i class="pe-7s-angle-right"></i></div>
            <!-- Swiper Navigation End -->
        </div>
    </div>
    <!-- Hero/Intro Slider End -->

    <!-- Product Banner Carousel Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-banner-carousel">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="single-product-banner" data-aos="fade-up" data-aos-delay="200">
                                        <div class="banner-img">
                                            <a href="shop.html"><img src="assets/images/testimonial/lg-thumb-1.png" alt="Banner Thumb"></a>
                                        </div>
                                        <div class="single-banner-content">
                                            <h4 class="title">
                                                <a href="shop.html">For Baby</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-product-banner" data-aos="fade-up" data-aos-delay="300">
                                        <div class="banner-img">
                                            <a href="shop.html"><img src="assets/images/testimonial/lg-thumb-2.png" alt="Banner Thumb"></a>
                                        </div>
                                        <div class="single-banner-content">
                                            <h4 class="title">
                                                <a href="shop.html">Age: 1-2</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="single-product-banner" data-aos="fade-up" data-aos-delay="400">
                                        <div class="banner-img">
                                            <a href="shop.html"><img src="assets/images/testimonial/lg-thumb-3.png" alt="Banner Thumb"></a>
                                        </div>
                                        <div class="single-banner-content">
                                            <h4 class="title">
                                                <a href="shop.html">Age: 3-5</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="single-product-banner" data-aos="fade-up" data-aos-delay="500">
                                        <div class="banner-img">
                                            <a href="shop.html"><img src="assets/images/testimonial/lg-thumb-4.png" alt="Banner Thumb"></a>
                                        </div>
                                        <div class="single-banner-content">
                                            <h4 class="title">
                                                <a href="shop.html">Age: 6-8</a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="single-product-banner" data-aos="fade-up" data-aos-delay="600">
                                        <div class="banner-img">
                                            <a href="shop.html"><img src="assets/images/testimonial/lg-thumb-5.png" alt="Banner Thumb"></a>
                                        </div>
                                        <div class="single-banner-content">
                                            <h4 class="title">
                                                <a href="shop.html">Age: 9+</a>
                                            </h4>
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
    <!-- Product Banner Carousel End -->

    <!-- Product Section Start -->
    <div class="section position-relative">
        <div class="container">
            <!-- Section Title & Tab Start -->
            <div class="row mb-lg-8 mb-6">
                <!-- Section Title Start -->
                <div class="col-lg col-12">
                    <div class="section-title mb-0 text-center" data-aos="fade-up" data-aos-delay="400">
                        <h2 class="title mb-2">Latest Products</h2>
                        <p>Add  products to weekly lineup</p>
                    </div>
                </div>
                <!-- Section Title End -->

            </div>
            <!-- Section Title & Tab End -->

            <!-- Products Tab Start -->
            <div class="row">
                <div class="col" data-aos="fade-up" data-aos-delay="600">
                    <div class="product-carousel arrow-outside-container">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                            <?php
                                     $get_product = get_product($con,4,'','');
                                     foreach($get_product as $list){
?>
                                <!-- Product Start -->
                               
                                    <div class="product-wrapper" style = "padding-right:15px;">                                   
                                        <div class="product mb-6">
                                            <div class="thumb">
                                                <a href="product.php?id=<?php echo $list['id'] ?>" class="image">
                                                    <img class="fit-image" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image'] ?>" alt="Product" />
                                                </a>
                                                <span class="badges">
														<!-- <span class="sale">-18%</span> -->
                                                </span>
                                                <div class="actions">
                                                    <a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')" class="action wishlist"><i class="pe-7s-like"></i></a>
                                                    <a   class="action quickview" data-bs-toggle="modal" data-bs-target="#quick-view"><i class="pe-7s-search"></i></a>
                                                </div>
                                                 <!-- Quantity Start -->
                                                 <input class="" value="1" type="hidden" id="qty">
                                                        <!-- Quantity End -->
                                                <div class="add-cart-btn">
                                                   <a  href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')" class="btn btn-whited btn-hover-primary text-capitalize add-to-cart">Add To Cart</a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h5 class="title"><a href=""><?php echo $list['name']; ?></a></h5>
                                                <span class="price">
														<span class="new">
															Rs<?php echo $list['price']; ?>/-
														</span>
                                                </span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                
                                <?php
                                }
                                ?>
                                    <!-- Product End -->
                                    
                            
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Products Tab End -->
        </div>
    </div>
    <!-- Product Section End -->

    <!-- Banner Section Start -->
    <div class="section section-margin">
        <div class="container">
            <!-- Banners Start -->
            <div class="row">

                <!-- Banner Start -->
                <div class="col-12">
                    <div class="banner" data-aos="fade-up" data-aos-delay="400">
                        <a href="shop.html"><img src="assets/images/banner/banner-3.jpg" alt="Banner Image" /></a>
                    </div>
                </div>
                <!-- Banner End -->

            </div>
            <!-- Banners End -->
        </div>
    </div>
    <!-- Banner Section End -->
    <!-- Product Section Start -->
    <div class="section position-relative">
        <div class="container">
            
                    <!-- Section Title Start -->
                    <div class="section-title text-center" data-aos="fade-up" data-aos-delay="300">
                        <h2 class="title">
                        <span class="header-title">SHOP</span>
                        <span class="name-title" >HANDICRAFTS</span>
                        </h2>
                        </div>
                    <!-- Section Title End -->>

            <!-- Products Tab Start -->
            <div class="row">
                <div class="col" data-aos="fade-up" data-aos-delay="600">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-product-all">
                            <div class="product-carousel arrow-outside-container">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                    <?php
                                     $get_product = get_product($con,5,'','','','','yes');
                                     foreach($get_product as $list){
?>
                                <!-- Product Start -->
                               
                                    <div class="product-wrapper" style = "padding-right:15px;">                                   
                                        <div class="product mb-6">
                                            <div class="thumb">
                                                <a href="product.php?id=<?php echo $list['id'] ?>" class="image">
                                                    <img class="fit-image" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image'] ?>" alt="Product" />
                                                </a>
                                                <span class="badges">
														<!-- <span class="sale">-18%</span> -->
                                                </span>
                                                <div class="actions">
                                                    <a href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')" class="action wishlist"><i class="pe-7s-like"></i></a>
                                                    <a   class="action quickview" data-bs-toggle="modal" data-bs-target="#quick-view"><i class="pe-7s-search"></i></a>
                                                </div>
                                                 <!-- Quantity Start -->
                                                 <input class="" value="1" type="hidden" id="qty">
                                                        <!-- Quantity End -->
                                                <div class="add-cart-btn">
                                                   <a  href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')" class="btn btn-whited btn-hover-primary text-capitalize add-to-cart">Add To Cart</a>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <h5 class="title"><a href=""><?php echo $list['name']; ?></a></h5>
                                                <span class="price">
														<span class="new">
															Rs<?php echo $list['price']; ?>/-
														</span>
                                                </span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                
                                <?php
                                }
                                ?>
                                    <!-- Product End -->
                                    

                                 
                                    </div>

                                    <div class="swiper-pagination d-block d-md-none"></div>
                                    <div class="swiper-button-prev swiper-nav-button d-none d-md-flex"><i class="pe-7s-angle-left"></i></div>
                                    <div class="swiper-button-next swiper-nav-button d-none d-md-flex"><i class="pe-7s-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-product-featured">
                            <div class="product-carousel arrow-outside-container">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">

                                        <!-- Product Start -->
                                        <div class="swiper-slide">
                                            <div class="product-wrapper">
                                                <div class="product">
                                                    <div class="thumb border-0">
                                                        <a href="single-product.html" class="image">
                                                            <img class="fit-image" src="assets/images/products/medium-product/3.jpg" alt="Product" />
                                                        </a>
                                                        <span class="badges">
                                                                <span class="new">New</span>
                                                        </span>
                                                        <div class="actions">
                                                            <a href="wishlist.html" class="action wishlist"><i class="pe-7s-like"></i></a>
                                                            <a href="compare.html" class="action compare"><i class="pe-7s-refresh-2"></i></a>
                                                            <a href="#" class="action quickview" data-bs-toggle="modal" data-bs-target="#quick-view"><i class="pe-7s-search"></i></a>
                                                        </div>
                                                        <div class="add-cart-btn">
                                                            <button class="btn btn-sm btn-whited btn-hover-primary text-capitalize add-to-cart">Add To Cart</button>
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <h5 class="title"><a href="single-product.html">This is the testing</a></h5>
                                                        <span class="price">
                                                                <span class="new">
                                                                    $28.50
                                                                </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product End -->

                                        <!-- Product Start -->
                                        <div class="swiper-slide">
                                            <div class="product-wrapper">
                                                <div class="product">
                                                    <div class="thumb border-0">
                                                        <a href="single-product.html" class="image">
                                                            <img class="fit-image" src="assets/images/products/medium-product/2.jpg" alt="Product" />
                                                        </a>
                                                        <span class="badges">
                                                                <span class="sale">-20%</span>
                                                        </span>
                                                        <div class="actions">
                                                            <a href="wishlist.html" class="action wishlist"><i class="pe-7s-like"></i></a>
                                                            <a href="compare.html" class="action compare"><i class="pe-7s-refresh-2"></i></a>
                                                            <a href="#" class="action quickview" data-bs-toggle="modal" data-bs-target="#quick-view"><i class="pe-7s-search"></i></a>
                                                        </div>
                                                        <div class="add-cart-btn">
                                                            <button class="btn btn-sm btn-whited btn-hover-primary text-capitalize add-to-cart">Add To Cart</button>
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <h5 class="title"><a href="single-product.html">Robotics for Kids</a></h5>
                                                        <span class="price">
                                                                <span class="new">$38.50</span>
                                                        <span class="old">$42.85</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product End -->

                                        <!-- Product Start -->
                                        <div class="swiper-slide">
                                            <div class="product-wrapper">
                                                <div class="product">
                                                    <div class="thumb border-0">
                                                        <a href="single-product.html" class="image">
                                                            <img class="fit-image" src="assets/images/products/medium-product/1.jpg" alt="Product" />
                                                            <img class="second-image fit-image" src="assets/images/products/medium-product/3.jpg" alt="Product" />
                                                        </a>
                                                        <span class="badges">
                                                                <span class="sale">-18%</span>
                                                        </span>
                                                        <div class="actions">
                                                            <a href="wishlist.html" class="action wishlist"><i class="pe-7s-like"></i></a>
                                                            <a href="compare.html" class="action compare"><i class="pe-7s-refresh-2"></i></a>
                                                            <a href="#" class="action quickview" data-bs-toggle="modal" data-bs-target="#quick-view"><i class="pe-7s-search"></i></a>
                                                        </div>
                                                        <div class="add-cart-btn">
                                                            <button class="btn btn-whited btn-hover-primary text-capitalize add-to-cart">Add To Cart</button>
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <h5 class="title"><a href="single-product.html">Unique content product</a></h5>
                                                        <span class="price">
                                                                <span class="new">
                                                                    $12.50
                                                                </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product End -->

                                        <!-- Product Start -->
                                        <div class="swiper-slide">
                                            <div class="product-wrapper">
                                                <div class="product">
                                                    <div class="thumb border-0">
                                                        <a href="single-product.html" class="image">
                                                            <img class="fit-image" src="assets/images/products/medium-product/4.jpg" alt="Product" />
                                                        </a>
                                                        <div class="actions">
                                                            <a href="wishlist.html" class="action wishlist"><i class="pe-7s-like"></i></a>
                                                            <a href="compare.html" class="action compare"><i class="pe-7s-refresh-2"></i></a>
                                                            <a href="#" class="action quickview" data-bs-toggle="modal" data-bs-target="#quick-view"><i class="pe-7s-search"></i></a>
                                                        </div>
                                                        <div class="add-cart-btn">
                                                            <button class="btn btn-sm btn-whited btn-hover-primary text-capitalize add-to-cart">Add To Cart</button>
                                                        </div>
                                                    </div>
                                                    <div class="content">
                                                        <h5 class="title"><a href="single-product.html">Product title here</a></h5>
                                                        <span class="price">
                                                                <span class="new">
                                                                    $25.50
                                                                </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Product End -->

                                    </div>

                                    <div class="swiper-pagination d-block d-md-none"></div>
                                    <div class="swiper-button-prev swiper-nav-button d-none d-md-flex"><i class="pe-7s-angle-left"></i></div>
                                    <div class="swiper-button-next swiper-nav-button d-none d-md-flex"><i class="pe-7s-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Products Tab End -->
        </div>
    </div>
    <!-- Product Section End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Latest Blog Section End -->
    <?php
    
    include('footer.php');
    ?>
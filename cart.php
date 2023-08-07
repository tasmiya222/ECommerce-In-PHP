<?php
include('header.php');

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
                        <li class="active"> Shopping Cart </li>
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
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <!-- Table Head End -->

                            <!-- Table Body Start -->
                            <tbody>
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
                                <tr>
                                    <td class="pro-thumbnail"><a href="#"><img class="fit-image" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image ?>" alt="Product" /></a></td>
                                    <td class="pro-title"><a href="#"><?php   echo $pname?></a></td>
                                    <td class="pro-price"><span>Rs<?php echo $price ?>/-</span></td>
                                    <td class="pro-quantity">
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" id="<?php echo $key?>qty" value="<?php echo $qty ?>" type="text">
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)"  onclick="manage_cart('<?php echo $key ?>','update')" class="btn btn-primary btn-hover-dark" style="margin-top:8px;">Update Cart</a>
                                    </td>
                                    <td class="pro-subtotal"><span>Rs<?php echo $cart_total ?>/-</span></td>
                                    <td class="pro-remove"><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key ?>','remove')"><i class="pe-7s-trash"></i></a></td>
                                </tr>
                          
                            </tbody>
                            <?php }} else { echo "Currently Your CArt is Empty!!"; } ?>
                           <!-- Table Body End -->
                        </table>
                    </div>
                    <!-- Cart Table End -->
                </div>
            </div>

            <div class="row mt-10 mb-n10">
                <div class="col-lg-6 mb-10">
                    <div >
                       
                    </div>
                </div>
                <div class="col-lg-6 mb-10">

                    <!-- Cart Calculation Area Start -->
                    <div class="cart-calculator-wrapper">

                        <!-- Cart Calculate Items Start -->
                        <div class="cart-calculate-items">

                            <!-- Cart Calculate Items Title Start -->
                            <h3 class="title">Cart Totals</h3>
                            <!-- Cart Calculate Items Title End -->

                            <!-- Responsive Table Start -->
                            <div class="table-responsive">
                               
                                <table class="table">
                                <?php 
                                if(isset($_SESSION['cart']) && $_SESSION['cart']>0)
                                {

                                    $above_order = 1500;
                                    $grand_total = 0;
                                    $shipping = 150;
                                    $grand_total = $shipping+$cart_total;
                                    if($cart_total > $above_order)
                                    {
                                       echo $grand_total = $cart_total;
                                        $shipping=0;
                                    }
                                    else
                                    {
                                        $grand_total = $shipping+$cart_total;
                                    }
                                ?>
                                    <tr>
                                        <td>Sub Total</td>
                                        <td>Rs<?php echo $cart_total ?>/-</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td>Rs<?php echo $shipping?>/-</td>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                        <td class="total-amount">Rs<?php echo $grand_total; ?>/-</td>
                                    </tr>
                                    <?php } ?>
                                </table>
                            </div>
                            <!-- Responsive Table End -->

                        </div>
                        <!-- Cart Calculate Items End -->

                        <!-- Cart Checktout Button Start -->
                        <a href="<?php echo SITE_PATH ?>checkout.php" class="btn btn-primary btn-hover-dark mt-6">Proceed To Checkout</a>
                        <!-- Cart Checktout Button End -->

                    </div>
                    <!-- Cart Calculation Area End -->

                </div>
            </div>

        </div>
    </div>
    <!-- Shopping Cart Section End -->

   <?php
   include('footer.php');
   
   ?>
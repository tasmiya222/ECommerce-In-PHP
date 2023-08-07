<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
include('header.php');
 //Defining the undefine varaible
$fname="";
$lname="";
$address="";
$city="";
$zipcode="";
$country="";
$email="";
$phone="";
$notes="";
$user_id="";
$total_price="";
$payment_type="";
$payment_status="";
$order_status="";
$added_on="";
//  if cart is empty
if(!isset($_SESSION['cart'])  || count($_SESSION['cart']) == 0)
{
    ?>
    <script>

        alert('Cart is Empty!');
        window.location.href = 'index.php';
    </script>
    <?php
}

// insert order into order Table 
if(isset($_POST['submit']))
{
    $fname = get_safe_value($con,$_POST['fname']);
    $lname = get_safe_value($con,$_POST['lname']);
    $address = get_safe_value($con,$_POST['address']);
    $country= get_safe_value($con,$_POST['country']);
    $city= get_safe_value($con,$_POST['city']);
    $zipcode = get_safe_value($con,$_POST['zipcode']);
    $email = get_safe_value($con,$_POST['email']);
    $phone = get_safe_value($con,$_POST['phone']);
    $notes = get_safe_value($con,$_POST['notes']);
    $user_id=$_SESSION['USER_ID'];
    $total_price = $cart_total;
    $payment_type = 'cod';
    if($payment_type == 'cod')
    {
        $payment_status='sucess';
    }
    $order_status = 1;
    $added_on = date('Y-m-d h:i:s');

    //  add total price in orders table simultaneously
    foreach ($_SESSION['cart'] as $key => $val)
    {
        $productArr = get_product($con,'','',$key);
        $price = $productArr[0]['price'];
        // $mrp = $productArr[0]['mrp'];
        $qty = $val['qty'];
        $cart_total = $cart_total+($price*$qty);
    }
//Insert data into order table 
    mysqli_query($con,"insert into `order`(fname,lname, user_id, address, city, notes,email,zipcode,payment_type,total_price,payment_status,order_status,added_on)
     values('$fname','$lname','$user_id','$address','$city','$notes','$email','$zipcode','$payment_type','$total_price','$payment_status','$order_status','$added_on')"); 

//  fetching Order id through which order is placing
    $order_id=mysqli_insert_id($con);

//  Insert data into order_details Table 
    mysqli_query($con,"insert into order_detail(order_id,product_id,qty,price,added_on)values('$order_id','$key','$qty','$price','$added_on')");
    // Email send when order has been placed 

	  
    //Destroy session after order has been placed.
    unset($_SESSION['cart']);
    // Sending ThankYOu Order Invoice Email
    $mail = new PHPMailer();	
    // $mail->SMTPDebug=3;
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.titan.email';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'orders@akcultures.com';                    
        $mail->Password   = 'Adnan000@';                               
        $mail->SMTPSecure = 'STARTTLS ';                               
        $mail->Port       = 587;                                    
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('orders@akcultures.com');
        $mail->addAddress($email);                           
        $mail->addReplyTo('orders@akcultures.com');
        $mail->isHTML(true);                       
        $mail->Subject = 'Order #'.$order_id.'\t confirmed';
        $mail->Body    = 'Thank You For Shopping ';
        $mail->SMTPOptions=array('ssl'=>array(
            'verify_peer'=>false,
            'verify_peer_name'=>false,
            'allow_self_signed'=>false
        ));
        if(!$mail->Send()){
            echo $mail->ErrorInfo;
        }else{
            echo 'Sent';
        }
    
        
        redirect('thankyou.php');
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
                    <li class="active"> Checkout Page</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

</div>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Start -->
<div class="section section-margin">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Coupon Accordion Start -->
                <div class="coupon-accordion">
                    <?php
                            //   If User is not login
                    if(!isset($_SESSION['USER_LOGIN']))
                    {
                        ?>
                        <!-- Title Start -->
                        <h3 class="title">Returning customer? <span id="showlogin">Click here to login</span></h3>
                        <!-- Title End -->

                        <!-- Checkout Login Start -->
                        <div id="checkout-login" class="coupon-content">
                            <div class="coupon-info">  
                              <!-- Form Start -->
                              <form action="#" method="post">
                                <!-- Input Email Start -->
                                <p class="form-row-first">
                                    <label>Email <span class="requiredd">*</span></label>
                                    <input type="email" placeholder="Enter your Email" name="email" id="email">
                                    <span style="color:red;" class="login_field_error" id="email_error"></sapn>
                                    </p>
                                    <!-- Input Email End -->

                                    <!-- Input Password Start -->
                                    <p class="form-row-last">
                                        <label>Password <span class="requiredd">*</span></label>
                                        <input type="password" placeholder="Enter your Password" name="password" id="password">
                                        <span style="color:red;" class="login_field_error" id="password_error"></sapn>
                                        </p>
                                        <!-- Input Password End -->


                                        <!-- Lost Password Start -->
                                        <!-- <p class="lost-password"><a href="#">Lost your password?</a></p> -->
                                        <!-- Lost Password End -->
                                        
                                        <div class="single-input-item mb-3">
                                            <button type="button"  class="btn btn btn-dark btn-hover-primary" onclick="login()">Login</button>
                                        </div>
                                    </form>
                                    
                                    <!-- Form End -->

                                </div>
                            </div>
                        <?php } ?>
                        <!-- Checkout Login End -->
                        <!-- Title Start -->
                        <!-- <h3 class="title">Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                        <!-- Title End -->
                        <!-- Checkout Coupon Start -->
                        <!-- <div id="checkout_coupon" class="coupon-checkout-content"> 
                            <div class="coupon-info">
                                <form action="#" method="post">
                                    <p class="checkout-coupon d-flex">
                                        <input placeholder="Coupon code"  id="coupon_str" name="coupon_str" type="text">
                                        <input  type="button" name="submit" class="btn btn-primary btn-hover-secondary rounded-0" onclick="set_coupon()" value="Apply Coupon">
                                    </p>
                                </form>
                                <div  id="coupon_result"></div>
                            </div> --> -->
                        <!-- </div>  -->
                        <!-- Checkout Coupon End -->
                    <!-- </div> -->
                    <!-- Coupon Accordion End -->
                </div>
            </div>
            <div class="row mb-n4">
                <div class="col-lg-6 col-12 mb-4">

                    <!-- Checkbox Form Start -->
                    <form action="#" method="post">
                        <div class="checkbox-form">

                            <!-- Checkbox Form Title Start -->
                            <h3 class="title">Billing Details</h3>
                            <!-- Checkbox Form Title End -->

                            <div class="row">

                                <!-- Select Country Name Start -->
                                <div class="col-md-12 mb-6">
                                    <div class="country-select">
                                        <label>Country/region<span class="requiredd"></span></label>
                                        <select class="myniceselect nice-select wide rounded-0" name="country">
                                            <option data-display="Pakistan">Pakistan</option>
                                            <!-- <option value="uk">London</option>
                                            <option value="rou">Romania</option>
                                            <option value="fr">French</option>
                                            <option value="de">Germany</option>
                                            <option value="aus">Australia</option> -->
                                        </select>
                                    </div>
                                </div>
                                <!-- Select Country Name End -->

                                <!-- First Name Input Start -->
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>First Name <span class="required">*</span></label>
                                        <input placeholder="First Name" type="text" name="fname" required>
                                    </div>
                                </div>
                                <!-- First Name Input End -->

                                <!-- Last Name Input Start -->
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input placeholder="Last Name" type="text" name="lname" required>
                                    </div>
                                </div>
                                <!-- Last Name Input End -->

                                <!-- Company Name Input Start -->
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>City*</label>
                                        <input placeholder="City" type="text" name="city" required>
                                    </div>
                                </div> 
                                <!-- Company Name Input End -->

                                <!-- Address Input Start -->
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input placeholder="Street address" type="text" name="address" required>
                                    </div>
                                </div>
                                <!-- Address Input End -->
                                <!-- Town or City Name Input Start -->
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Postcode / Zip <span class="required">*</span></label>
                                        <input placeholder="Postcode/Zip" type="text" name="zipcode" required>
                                    </div>
                                </div>
                                <!-- Town or City Name Input End -->

                                <!-- Email Address Input Start -->
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input placeholder="Email*" type="email" name="email" id="email" required> 
                                    </div>
                                </div>
                                <!-- Email Address Input End -->

                                <!-- Phone Number Input Start -->
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input placeholder="Phone" type="text" name="phone" required>
                                    </div>
                                </div>
                                <!-- Phone Number Input End -->

                                <!-- Order Notes Textarea Start -->
                                <div class="order-notes mt-3 mb-n2">
                                    <div class="checkout-form-list checkout-form-list-2">
                                        <label>Order Notes</label>
                                        <textarea id="checkout-mess" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."  name="notes" required ></textarea>
                                    </div>
                                </div>
                                <!-- Order Notes Textarea End -->
                            </div>


                        </div>
                        
                        <!-- Checkbox Form End -->

                    </div>

                    <div class="col-lg-6 col-12 mb-4">

                        <!-- Your Order Area Start -->
                        <div class="your-order-area border">

                            <!-- Title Start -->
                            <h3 class="title">Your order</h3>
                            <!-- Title End -->

                            <!-- Your Order Table Start -->
                            <div class="your-order-table table-responsive">
                                <table class="table">

                                    <!-- Table Head Start -->
                                    <thead>
                                        <tr class="cart-product-head">
                                            <th class="cart-product-name text-start">Product</th>
                                            <th class="cart-product-total text-end">Total</th>
                                        </tr>
                                    </thead>
                                    <!-- Table Head End -->

                                    <!-- Table Body Start -->
                                    <tbody>
                                        <?php
                                        $cart_total=0;
                                        $shipping = 150;
                                        $above_amount=1500;
                                        foreach ($_SESSION['cart'] as $key => $val) {
                                          $productArr = get_product($con,'','',$key);
                                          $pname = $productArr[0]['name'];
                                          $Pid = $productArr[0]['id'];
                                          $price = $productArr[0]['price'];
                                      // $mrp = $productArr[0]['mrp'];
                                          $image = $productArr[0]['image'];
                                          $qty = $val['qty'];
                                          $cart_total = $cart_total+($price*$qty);
                                          if($cart_total >$above_amount)
                                          {
                                              $shipping=0;
                                            $grand_total = $cart_total;
                                          }
                                          else
                                          {
                                            $grand_total = $cart_total+$shipping;
                                          }
                                          
                                          
                                          ?>
                                          <tr class="cart_item">
                                            <td class="cart-product-name text-start ps-0"> <?php echo $pname; ?><strong class="product-quantity"> × <?php  echo $qty?></strong></td>
                                            <td class="cart-product-total text-end pe-0"><span class="amount">Rs<?php echo $price*$qty?>/-</span></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                                <!-- Table Body End -->

                                <!-- Table Footer Start -->
                                <tfoot>
                                    <tr class="cart-subtotal">
                                        <th class="text-start ps-0">Cart Subtotal</th>
                                        <td class="text-end pe-0"><span class="amount">Rs<?php echo $cart_total?>/-</span></td>
                                    </tr>
                                    
                                    <tr class="cart-subtotal">
                                        <th class="text-start ps-0">Shipping </th>
                                        <td class="text-end pe-0"><span class="amount">Rs<?php echo $shipping?>/-</span></td>
                                    </tr>
                                  
                                    <tr class="order-total">
                                        <th class="text-start ps-0">Order Total</th>
                                        <td class="text-end pe-0"><strong><span class="amount">Rs<?php echo $grand_total ?>/-</span></strong></td>
                                    </tr>
                                </tfoot>
                                <!-- Table Footer End -->

                            </table>
                        </div>
                        <!-- Your Order Table End -->

                        <!-- Payment Accordion Order Button Start -->
                        <div class="payment-accordion-order-button">
                            <div class="payment-accordion">
                                <div class="single-payment">
                                   <input type="radio" name="payment_type"  checked="checked" value="COD">&nbsp; Cash On Delivery
                               </div>
                           </div>
                           
                       </div>
                   </div>
                   <div class="order-button -payment">
                    <input type="submit" name="submit" class="btn btn-primary btn-hover-secondary rounded-0 w-100" onclick="email_sender()"  value="Place Order">
                </div>
            </div>
        </form>
        <!-- Payment Accordion Order Button End -->
    </div>
    <!-- Your Order Area End -->
</div>
</div>
</div>
</div>
<!-- Checkout Section End -->

<?php
include('footer.php');
?>
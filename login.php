<?php
include('header.php');
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] == 'yes')
{
    ?>
    <script>
        window.location.href='my-account.php';
    </script>
    <?php
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
                        <li class="active"> Login Page</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    <!-- Login Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 m-auto">
                    <div class="login-wrapper">

                        <!-- Login Title & Content Start -->
                        <div class="section-content text-center mb-5">
                            <h2 class="title mb-2">Login</h2>
                            <p class="desc-content">Please login using account detail bellow.</p>
                        </div>
                        <!-- Login Title & Content End -->

                        <!-- Form Action Start -->
                        <form action="#" method="post">

                            <!-- Input Email Start -->
                            <div class="single-input-item mb-3">
                                <input type="email" placeholder="Enter your Email" name="email" id="email">
                                <span style="color:red;" class="login_field_error" id="email_error"></sapn>
                            </div>
                            <!-- Input Email End -->

                            <!-- Input Password Start -->
                            <div class="single-input-item mb-3">
                                <input type="password" placeholder="Enter your Password" name="password" id="password">
                                <span style="color:red;" class="login_field_error" id="password_error"></sapn>
                            </div>
                            <!-- Input Password End -->

                            <!-- Checkbox/Forget Password Start -->
                            <div class="single-input-item mb-3">
                                <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                    <div class="remember-meta mb-3">
                                       
                                    </div>
                                    <a href="forget-password.php" class="forget-pwd mb-3">Forget Password?</a>
                                </div>
                            </div>
                            <!-- Checkbox/Forget Password End -->

                            <!-- Login Button Start -->
                            <div class="single-input-item mb-3">
                                <button type="button"  class="btn btn btn-dark btn-hover-primary" onclick="login()">Login</button>
                            </div>
                            <!-- Login Button End -->
                             <div style="color:red" class="login_msg">
                               <p></p>
                             </div>
                            <!-- Lost Password & Creat New Account Start -->
                            <div class="lost-password" style="text-align:center;">
                               <span>Not Yet Registered?<a style="color:btn-dark btn-hover-primary" href="register.php">Register Now</a></span> 
                            </div>
                            <!-- Lost Password & Creat New Account End -->

                        </form>
                        <!-- Form Action End -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Section End -->

   <?php
   include('footer.php');
   
   ?>
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
                            <a href="index.html"><i class="fa fa-home"></i> </a>
                        </li>
                        <li class="active"> Register Page</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->

    <!-- Register Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 m-auto">
                    <!-- Register Wrapper Start -->
                    <div class="register-wrapper">

                        <!-- Login Title & Content Start -->
                        <div class="section-content text-center mb-5">
                            <h2 class="title mb-2">Create Account</h2>
                            <p class="desc-content">Please Register using account detail bellow.</p>
                        </div>
                        <!-- Login Title & Content End -->

                        <!-- Form Action Start -->
                        <form action="#" method="post">
                            <div class="single-input-item mb-3">
                                <input type="text" placeholder=" Name" name="name" id="name">
                                <span style="color:red;" class="user_field_error" id="name_error"></span>
                            </div>
                            <div class="single-input-item mb-3">
                                <input type="email" placeholder="Email" name="email" id="email">
                                <span style="color:red;" class="user_field_error" id="email_error"></span>
                            </div>
                            <div class="single-input-item mb-3">
                                <input type="text" placeholder="Mobile" name="mobile" id="mobile">
                                <span style="color:red;" class="user_field_error" id="mobile_error"></span>

                            </div>
                            <div class="single-input-item mb-3">
                                <input type="password" placeholder="Enter your Password" name="password" id="password">
                                <span style="color:red;" class="user_field_error" id="password_error"></span>

                            </div>
                            <div class="single-input-item mb-3">
                                <button type="button"  class="btn btn btn-dark btn-hover-primary" onclick="user_register()">Register</button>
                               
                            </div>
                            <!-- Register Button End -->
                            <div style="color:black;"  class="btn_error">
                             <p ></p>
                        </div>
                        </form>
                        <!-- Form Action End -->

                        <div class="lost-password" style="text-align:center;">
                               <span>Already have an account?<a style="color:btn-dark btn-hover-primary" href="login.php">Login Now</a></span> 
                            </div>
                     
                    </div>
                    <!-- Register Wrapper End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Register Section End -->
 <?php
 
 include('footer.php');
 
 ?>
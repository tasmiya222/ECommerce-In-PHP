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
                        <li class="active"> Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Area End -->

    </div>
    <!-- Breadcrumb Section End -->
    <!-- Contact Us Section Start -->
    <div class="section section-margin">
        <div class="container">
            <div class="row mb-n10">
                <div class="col-12 col-lg-6 mb-10 order-2 order-lg-1">
                    <!-- Section Title Start -->
                    <div class="contact-title pb-3" data-aos="fade-up" data-aos-delay="300">
                        <h2 class="title">Tell Us Your Need</h2>
                    </div>
                    <!-- Section Title End -->
                    <!-- Contact Form Wrapper Start -->
                    <div class="contact-form-wrapper contact-form">
                        <form action="#" id="contact-form" method="post">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                                            <div class="input-area mb-4">
                                                <input class="input-item" type="text" placeholder="Your Name *" id="name" name="name">
                                                <span style="color:red" class="contact_feild_error" id="name_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                                            <div class="input-area mb-4">
                                                <input class="input-item" type="email" placeholder="Email *"id="email" name="email">
                                                <span style="color:red" class="contact_feild_error" id="email_error"></span>
                                            </div>
                                          
                                        </div>
                                        <div class="col-12" data-aos="fade-up" data-aos-delay="300">
                                            <div class="input-area mb-4">
                                                <input class="input-item" type="text" placeholder="Mobile *" id="mobile" name="mobile">
                                                <span style="color:red" class="contact_feild_error" id="mobile_error"></span>
                                            </div>
                                            
                                        </div>
                                        <div class="col-12" data-aos="fade-up" data-aos-delay="400">
                                            <div class="input-area mb-8">
                                                <textarea cols="30" rows="5" class="textarea-item" name="message" id="message" placeholder="Message"></textarea>
                                                <span style="color:red" class="contact_feild_error" id="message_error"></span>
                                            </div>
                                          
                                        </div>
                                        <div class="col-12" data-aos="fade-up" data-aos-delay="500">
                                            <button  onclick="send_message()" name="submit" class="btn btn-secondary button-hover-primary">Send A Message</button>
                                        </div>
                                        <div id="thank_result" style="color:red; margin-top:8px;"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                       
                    </div>
                    <!-- Contact Form Wrapper End -->
                </div>
                <div class="col-12 col-lg-6 mb-10 order-1 order-lg-2">
                    <!-- Section Title Start -->
                    <div class="contact-title pb-3" data-aos="fade-up" data-aos-delay="300">
                        <h2 class="title">Contact Us</h2>
                    </div>
                    <!-- Section Title End -->
                    <div class="contact-content">
                   
                        <address class="contact-block">
                            <ul>
                             <li data-aos="fade-up" data-aos-delay="400"><i class="fa fa-phone"></i> <a href="tel:0321-3099355">0321-3099355</a></li>
                                <li data-aos="fade-up" data-aos-delay="600"><i class="fa fa-envelope-o"></i> <a href="mailto:demo@example.com">ak-collection@gmail.com </a></li>
                            </ul>
                        </address>

                        

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact us Section End -->
<?php
include('footer.php');

?>
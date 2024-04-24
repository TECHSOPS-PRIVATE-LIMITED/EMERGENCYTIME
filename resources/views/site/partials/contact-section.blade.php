<div id="contacts" class="contact-section section gradiant-background pb-90">
    <div class="container">
        <div class="section-head heading-light text-center">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="heading heading-light">Get In Touch</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="contact-form white-bg text-center">
                    <h3>Contact Us</h3>
                    <p>Have questions or feedback? Drop us a line using the contact form below.</p>
                    <form id="contact-form" class="form-message" action="form/contact.php" method="post">
                        <div class="form-results"></div>
                        <div class="form-group row fix-gutter-10">
                            <div class="form-field col-sm-6 gutter-10 form-m-bttm">
                                <input name="contact-name" type="text" placeholder="Full Name *" class="form-control required">
                            </div>
                            <div class="form-field col-sm-6 gutter-10">
                                <input name="contact-email" type="email" placeholder="Email *" class="form-control required email">
                            </div>
                        </div>
                        <div class="form-group row fix-gutter-10">
                            <div class="form-field col-md-6 gutter-10 form-m-bttm">
                                <input name="contact-phone" type="text" placeholder="Phone Number *" class="form-control required">
                            </div>
                            <div class="form-field col-md-6 gutter-10">
                                <input name="contact-subject" type="text" placeholder="Subject *" class="form-control required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="form-field col-md-12">
                                <textarea name="contact-message" placeholder="Messages *" class="txtarea form-control required"></textarea>
                            </div>
                        </div>
                        <input type="text" class="hidden" name="form-anti-honeypot" value="">
                        <button type="submit" class="button solid-btn sb-h">Submit</button>
                    </form>
                </div>
            </div><!-- .col  -->
            <div class="col-md-6">
                <div class="contact-info white-bg">
                    <div class="row">
                        <div class="col-sm-6">
                            <h6><em class="fa fa-envelope"></em>info@emergencytime.help</h6>
                        </div>
                        <div class="col-sm-6">
                            <h6><em class="fa fa-phone"></em> +1 (347) 278-5716</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h6><em class="fa fa-map-marker"></em>Your Address</h6>
                        </div>
                    </div>
                </div>
                <div id="gMap" class="google-map"></div>
            </div><!-- .col  -->
        </div><!-- .row  -->
    </div><!-- .container  -->
</div>

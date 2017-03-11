		<!-- Start Of contact -->
	
		<section class="contact-us text-center">
                <!-- Start Contact Us Container -->
                <div class="container">
                	<h4>Contact Us</h4>
                    <div class="row">
                       <img src="<?= $resourcesImg ?>contact-us.jpg" class="img-responsive" alt="contact us" title="contact us">
                        <p class="lead">Feel Free To Contact Us At Any Time You Like</p>

                        <!-- Start Contact Form -->
                        <form role="form" method="post" action="contact&action=send">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" name="name" placeholder="Write Your Name" size="30" required />
                                </div> 
                                <div class="form-group">
                                    <input type="email" class="form-control input-lg" name="email" placeholder="Write Your Email" size="40" required />
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control input-lg" name="subject" placeholder="Write Your Message Subject" size="30" required />
                                </div>
                             </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control input-lg" name="message" placeholder="Leave Your Message"></textarea>
                                </div>
                                <input type="submit" class="btn btn-danger input-lg btn-block" name="submit" value="Send" />
                            </div>
                         </form>
                        <!-- End Contact Form -->     
                    </div> 
                </div>
                <!-- End Contact Us Container -->
            <?php require $codes.'contact.php'; ?>
        </section>
        <!-- End Contact Us Section -->



<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>

<div class="inner-page-title"><div class="container">Contact Us</div></div>

<section class="contact-section-one">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="contact-us-box">
                    <img src="<?php echo e(url('assets/website/img/contact-email-icon.jpg')); ?>" class="img-fluid" />
                    <a href="mailto:info@yoursitename.com">info@yoursitename.com</a>
                    <a href="www.yoursitename.com">www.yoursitename.com</a>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="contact-us-box">
                    <img src="<?php echo e(url('assets/website/img/contact-map-icon.jpg')); ?>" class="img-fluid" />
                    <a href="tel:+1(8000) 123 4567">+1(8000) 123 4567</a>
                    <a href="tel:+1(8000) 123 4567">+1(8000) 123 4567</a>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="contact-us-box">
                    <img src="<?php echo e(url('assets/website/img/contact-home-icon.jpg')); ?>" class="img-fluid" />
                    <p>176 w street home.<br />New York, NY 10014</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact-form-section">
    <div class="container">
        <h2>Contact Us Today</h2>
             <?php echo $__env->make('errormessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form class="" id="contact_form" enctype="multipart/form-data" action="<?php echo e(route('contact-detail')); ?>" method="post" >             
            <div class="row">
                  <?php echo csrf_field(); ?>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name *" name="name" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email *" name="email" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Subject" name="subject" />
                    </div>
                </div>
            </div>
            <div class="form-group">
                <textarea placeholder="Message" class="form-control" rows="5" name="message"></textarea>
            </div>
            <div class="text-center"><button type="submit" class="btn btn-primary">Send Message</button></div>
        </form>
    </div>
</section>
<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    
    $(document).ready(function () {
   

    $('#contact_form').validate({
            rules: {            
                name: {
                    required: true,   
                },
                email: {
                    required: true,   
                },
                subject: {
                    required: true,   
                },
                message: {
                    required: true,   
                },        
            },            
        });
});


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/website/pages/contact-us.blade.php ENDPATH**/ ?>
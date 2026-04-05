
<?php $__env->startSection('title', 'Contact TufTable | DN Info Solution, Surat'); ?>
<?php $__env->startSection('content'); ?>


<div class="inner_banner-section">
    <img class="inner_banner-background-image" src="/image/common/inner-bg.png" alt="banner bg" />
    <div class="container">
        <div class="inner_banner-content-block">
            <h3 class="inner_banner-title">Connect with us</h3>
            <ul class="banner__page-navigator">
                <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                <li class="active"><a href="<?php echo e(route('landing.contact')); ?>">Contact Us</a></li>
            </ul>
        </div>
    </div>
</div>


<div class="contact-3_main-section section-padding-120">
    <div class="container">
        <div class="row row--custom">

            
            <div class="col-xl-5 col-lg-6">
                <div class="feature-widget-6-row">

                    <div class="feature-widget-6" data-aos="fade-left" data-aos-duration="1000">
                        <div class="feature-widget-6__icon">
                            <img src="/image/contact-details/feature-icon-2.svg" alt="Call" />
                        </div>
                        <div class="feature-widget-6__body">
                            <h3 class="feature-widget-6__title">Call Us</h3>
                            <p>Reach us at <span><a href="tel:+917984323769" style="color:inherit;">+91 79843 23769</a></span>. Monday–Saturday, 10 am to 7 pm IST.</p>
                        </div>
                    </div>

                    <div class="feature-widget-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="100">
                        <div class="feature-widget-6__icon">
                            <img src="/image/contact-details/feature-icon-3.svg" alt="Email" />
                        </div>
                        <div class="feature-widget-6__body">
                            <h3 class="feature-widget-6__title">Email Us</h3>
                            <p>Drop us an email at <span><a href="mailto:dninfopvt@gmail.com" style="color:inherit;">dninfopvt@gmail.com</a></span> — reply within 24 hours.</p>
                        </div>
                    </div>

                    <div class="feature-widget-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                        <div class="feature-widget-6__icon">
                            <img src="/image/contact-details/feature-icon-1.svg" alt="Address" />
                        </div>
                        <div class="feature-widget-6__body">
                            <h3 class="feature-widget-6__title">Our Office</h3>
                            <p><strong>DN Info Solution</strong><br />Surat, Gujarat, India<br /><a href="https://dninfo.online" target="_blank" rel="noopener" style="color:#4f46e5;">dninfo.online</a></p>
                        </div>
                    </div>

                </div>
            </div>

            
            <div class="offset-lg-1 col-lg-6 col-md-10">
                <div class="contact-3_main-comment-box-wrapper bg-light-2">

                    
                    <div id="contact-success" style="display:none;background:#f0fdf4;border:1px solid #86efac;border-radius:12px;padding:20px 24px;margin-bottom:20px;text-align:center;">
                        <p style="color:#166534;font-weight:600;font-size:16px;margin:0;">&#10003; Message sent! We'll get back to you within 24 hours.</p>
                    </div>

                    
                    <div id="contact-error" style="display:none;background:#fef2f2;border:1px solid #fca5a5;border-radius:12px;padding:20px 24px;margin-bottom:20px;text-align:center;">
                        <p style="color:#991b1b;font-weight:600;font-size:16px;margin:0;">Something went wrong. Please try again or call us directly.</p>
                    </div>

                    <form class="contact-3_main-comment-box" id="contact-form">
                        <div class="contact-3_main-comment-box__form-inner">
                            <h2 class="contact-title">Send us a message</h2>
                            <div class="contact-3_main-comment-box__form-input">
                                <input class="form-control" type="text" id="c-name" placeholder="Enter your full name*" required />
                            </div>
                            <div class="contact-3_main-comment-box__form-input">
                                <input class="form-control" type="tel" id="c-phone" placeholder="Enter your phone number*" />
                            </div>
                            <div class="contact-3_main-comment-box__form-input">
                                <input class="form-control" type="email" id="c-email" placeholder="Enter your email*" required />
                            </div>
                            <div class="contact-3_main-comment-box__form-input">
                                <textarea class="form-control textarea" id="c-message" placeholder="Write your message here..."></textarea>
                            </div>
                        </div>
                        <div class="contact-3_main-comment-box__form-input-button">
                            <button type="submit" id="contact-btn" class="btn-masco rounded-pill w-100">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="cta-base">
    <div class="container">
        <div class="cta-base__wrapper border-bottom-dark">
            <div class="row align-items-center justify-content-center justify-content-md-between gutter-y-20">
                <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-7 col-10">
                    <div class="cta-base__text-block">
                        <h2 class="heading-md text-white">Ready to modernise your restaurant?</h2>
                    </div>
                </div>
                <div class="col-xl-auto col-lg-4 col-md-5 col-xs-8 col-10">
                    <div class="cta-base__button">
                        <a href="<?php echo e(route('restaurant_signup')); ?>" class="btn-masco rounded-pill btn-fill--up">
                            <span>Start Free Trial</span>
                        </a>
                        <div class="cta-base__button-shape">
                            <img src="/image/home-1/cta-shape.svg" alt="cta shape" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $__env->make('partials.landing-footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
var GOOGLE_SHEET_URL = 'https://script.google.com/macros/s/AKfycbyiqfWws5zX_89dv1GjL1HDMQaw1pFR9tbbBBkioYP9Y2fgBTVeXKcL6cB4mHtNKn5iyg/exec';

document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();

    var btn = document.getElementById('contact-btn');
    btn.textContent = 'Sending...';
    btn.disabled = true;

    // Hidden iframe trick — bypasses CORS completely
    var iframeName = 'gs_iframe_' + Date.now();
    var iframe = document.createElement('iframe');
    iframe.name = iframeName;
    iframe.style.display = 'none';
    document.body.appendChild(iframe);

    var form = document.createElement('form');
    form.method = 'POST';
    form.action = GOOGLE_SHEET_URL;
    form.target = iframeName;
    form.style.display = 'none';

    var fields = {
        name:    document.getElementById('c-name').value,
        phone:   document.getElementById('c-phone').value,
        email:   document.getElementById('c-email').value,
        message: document.getElementById('c-message').value,
        source:  'TufTable Contact Page',
        date:    new Date().toLocaleString('en-IN', {timeZone:'Asia/Kolkata'})
    };

    Object.keys(fields).forEach(function(key) {
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = key;
        input.value = fields[key];
        form.appendChild(input);
    });

    document.body.appendChild(form);
    form.submit();

    setTimeout(function() {
        document.getElementById('contact-form').style.display = 'none';
        document.getElementById('contact-success').style.display = 'block';
        try { document.body.removeChild(form); document.body.removeChild(iframe); } catch(e) {}
    }, 1500);
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.landing-page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Priyam\Documents\GitHub\tuftable\resources\views/landing/contact-page.blade.php ENDPATH**/ ?>
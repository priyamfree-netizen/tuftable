<div class="footer footer-padding-default footer--dark-v1">
    <div class="container">
        <div class="row row--footer-main">
            <div class="col-md-8 col-lg-5 col-xl-5 col-xxl-4">
                <div class="footer__content-block">
                    <div class="footer__content-text">
                        <div class="footer-brand" style="display:flex;align-items:center;gap:10px;margin-bottom:16px;">
                            <img src="<?php echo e(global_setting()->logoUrl); ?>" alt="TufTable" style="height:40px;width:auto;" />
                            <span style="font-weight:700;font-size:1.25rem;color:#fff;">TufTable</span>
                        </div>
                        <p>India's smartest restaurant management platform. Developed by <a href="https://dninfo.online" target="_blank" rel="noopener" style="color:#818cf8;text-decoration:none;">DN Info Solution</a>, Surat, Gujarat, India.</p>
                    </div>
                    <a href="mailto:dninfopvt@gmail.com" class="footer-link">dninfopvt@gmail.com</a><br />
                    <a href="tel:+917984323769" class="footer-link" style="margin-top:4px;display:inline-block;">+91 79843 23769</a><br />
                    <span class="footer-link" style="margin-top:4px;display:inline-block;cursor:default;">Surat, Gujarat, India</span>
                    <br />
                    <ul class="list-social" style="margin-top:12px;">
                        <li><a href="https://dninfo.online" target="_blank"><i class="fa-solid fa-globe"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-7 col-xl-6 col-xxl-7 offset-xl-1">
                <div class="row row--list-block">
                    <div class="col-auto col-md-4 col-lg-auto">
                        <h3 class="footer-title">Pages</h3>
                        <ul class="footer-list">
                            <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                            <li><a href="<?php echo e(route('landing.about')); ?>">About Us</a></li>
                            <li><a href="<?php echo e(route('landing.blog')); ?>">Blog</a></li>
                            <li><a href="<?php echo e(route('landing.contact')); ?>">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-auto col-md-4 col-lg-auto">
                        <h3 class="footer-title">Account</h3>
                        <ul class="footer-list">
                            <li><a href="/login">Login</a></li>
                            <li><a href="<?php echo e(route('restaurant_signup')); ?>">Register</a></li>
                        </ul>
                    </div>
                    <div class="col-auto col-md-4 col-lg-auto">
                        <h3 class="footer-title">Resources</h3>
                        <ul class="footer-list">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Route::has('policy.show')): ?>
                                <li><a href="<?php echo e(route('policy.show')); ?>">Privacy Policy</a></li>
                            <?php else: ?>
                                <li><a href="#">Privacy Policy</a></li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(Route::has('terms.show')): ?>
                                <li><a href="<?php echo e(route('terms.show')); ?>">Terms &amp; Conditions</a></li>
                            <?php else: ?>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <li><a href="<?php echo e(route('landing.contact')); ?>">Support</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-block">
        <div class="container">
            <div class="copyright-inner text-center copyright-border">
                <p>&copy; <?php echo e(date('Y')); ?> TufTable. All Rights Reserved. Developed by <a href="https://dninfo.online" target="_blank" rel="noopener" style="color:#818cf8;text-decoration:none;">DN Info Solution</a> &mdash; Surat, Gujarat, India.</p>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\Priyam\Documents\tuftable\resources\views/partials/landing-footer.blade.php ENDPATH**/ ?>
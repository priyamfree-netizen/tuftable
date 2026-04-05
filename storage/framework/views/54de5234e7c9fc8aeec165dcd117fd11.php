<header id="site-main-header" style="position:sticky;top:0;z-index:9999;background:#111827;height:52px;display:flex;align-items:center;border-bottom:1px solid #374151;">
    <div style="max-width:1280px;width:100%;margin:0 auto;padding:0 1.5rem;display:flex;align-items:center;justify-content:space-between;">

        
        <a href="<?php echo e(route('home')); ?>" style="display:flex;align-items:center;gap:10px;text-decoration:none;flex-shrink:0;">
            <img src="<?php echo e(global_setting()->logoUrl); ?>" alt="TufTable" style="height:30px;width:auto;">
            <span style="font-weight:700;font-size:1rem;color:#fff;white-space:nowrap;">TufTable</span>
        </a>

        
        <nav style="display:flex;align-items:center;gap:2.5rem;" id="landing-desktop-nav">
            <a href="<?php echo e(route('landing.about')); ?>" style="font-size:0.875rem;font-weight:500;color:#9ca3af;text-decoration:none;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#9ca3af'">About Us</a>
            <a href="<?php echo e(route('landing.blog')); ?>" style="font-size:0.875rem;font-weight:500;color:#9ca3af;text-decoration:none;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#9ca3af'">Blog</a>
            <a href="<?php echo e(route('landing.contact')); ?>" style="font-size:0.875rem;font-weight:500;color:#9ca3af;text-decoration:none;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#9ca3af'">Contact</a>
        </nav>

        
        <div style="display:flex;align-items:center;gap:0.75rem;" id="landing-auth-nav">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
                
                <a href="<?php echo e(route('dashboard')); ?>"
                   style="padding:6px 18px;font-size:0.875rem;font-weight:600;color:#fff;background:#4f46e5;border-radius:999px;text-decoration:none;">
                    Dashboard
                </a>
                <form method="POST" action="<?php echo e(route('logout')); ?>" style="margin:0;">
                    <?php echo csrf_field(); ?>
                    <button type="submit"
                        style="padding:6px 18px;font-size:0.875rem;font-weight:500;color:#9ca3af;background:none;border:1px solid #374151;border-radius:999px;cursor:pointer;"
                        onmouseover="this.style.color='#fff';this.style.borderColor='#6b7280'"
                        onmouseout="this.style.color='#9ca3af';this.style.borderColor='#374151'">
                        Logout
                    </button>
                </form>
            <?php else: ?>
                
                <a href="/login"
                   style="font-size:0.875rem;font-weight:500;color:#9ca3af;text-decoration:none;"
                   onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#9ca3af'">
                    Login
                </a>
                <a href="<?php echo e(route('restaurant_signup')); ?>"
                   style="padding:6px 18px;font-size:0.875rem;font-weight:600;color:#fff;background:#4f46e5;border-radius:999px;text-decoration:none;">
                    Sign Up
                </a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <button id="lh-mobile-btn" style="display:none;background:none;border:none;cursor:pointer;padding:4px;" aria-label="Menu">
            <svg width="22" height="22" fill="none" stroke="#9ca3af" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    
    <div id="lh-mobile-menu" style="display:none;position:absolute;top:52px;left:0;right:0;background:#111827;border-top:1px solid #374151;padding:0.75rem 1.5rem;flex-direction:column;gap:0.25rem;z-index:9998;">
        <a href="<?php echo e(route('landing.about')); ?>" style="display:block;padding:10px 0;font-size:0.875rem;color:#9ca3af;text-decoration:none;border-bottom:1px solid #1f2937;">About Us</a>
        <a href="<?php echo e(route('landing.blog')); ?>" style="display:block;padding:10px 0;font-size:0.875rem;color:#9ca3af;text-decoration:none;border-bottom:1px solid #1f2937;">Blog</a>
        <a href="<?php echo e(route('landing.contact')); ?>" style="display:block;padding:10px 0;font-size:0.875rem;color:#9ca3af;text-decoration:none;border-bottom:1px solid #1f2937;">Contact</a>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->check()): ?>
            <a href="<?php echo e(route('dashboard')); ?>" style="display:block;padding:10px 0;font-size:0.875rem;color:#818cf8;text-decoration:none;border-bottom:1px solid #1f2937;">Dashboard</a>
            <form method="POST" action="<?php echo e(route('logout')); ?>" style="margin:0;">
                <?php echo csrf_field(); ?>
                <button type="submit" style="display:block;padding:10px 0;font-size:0.875rem;color:#9ca3af;background:none;border:none;cursor:pointer;text-align:left;width:100%;">Logout</button>
            </form>
        <?php else: ?>
            <a href="/login" style="display:block;padding:10px 0;font-size:0.875rem;color:#9ca3af;text-decoration:none;border-bottom:1px solid #1f2937;">Login</a>
            <a href="<?php echo e(route('restaurant_signup')); ?>" style="display:block;padding:10px 0;font-size:0.875rem;color:#818cf8;text-decoration:none;">Sign Up</a>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</header>

<style>
    .site-header { display: none !important; }
    @media(max-width: 768px) {
        #landing-desktop-nav { display: none !important; }
        #landing-auth-nav { display: none !important; }
        #lh-mobile-btn { display: block !important; }
    }
</style>

<script>
    (function() {
        var btn = document.getElementById('lh-mobile-btn');
        var menu = document.getElementById('lh-mobile-menu');
        if (btn && menu) {
            btn.addEventListener('click', function() {
                menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
            });
        }
    })();
</script>
<?php /**PATH C:\Users\Priyam\Videos\tuftable\resources\views/partials/landing-header.blade.php ENDPATH**/ ?>
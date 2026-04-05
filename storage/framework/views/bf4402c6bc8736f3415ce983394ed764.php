<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e(session('customer_is_rtl') ? 'rtl' : 'ltr'); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(global_setting()->logoUrl); ?>">
    <link rel="manifest" href="<?php echo e(asset('manifest.json')); ?>">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo e(global_setting()->logoUrl); ?>">

    
    <meta name="keywords" content="<?php echo e(global_setting()->meta_keyword ?? global_setting()->name); ?>">
    <meta name="description" content="<?php echo e(global_setting()->meta_description ?? global_setting()->name); ?>">

    <title><?php echo e(global_setting()->meta_title ?? global_setting()->name); ?></title>

    <!-- Scripts & Styles from New Template -->
    <link rel="stylesheet" href="<?php echo e(asset('landing_new_assets/index-c46ffb0e.css')); ?>" />
    <script type="module" crossorigin src="<?php echo e(asset('landing_new_assets/index-3f204186.js')); ?>"></script>

    <!-- Original Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>

    <!-- Styles -->
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>


    <?php echo $__env->make('sections.theme_style', [
        'baseColor' => global_setting()->theme_rgb,
        'baseColorHex' => global_setting()->theme_hex,
    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(File::exists(public_path() . '/css/app-custom.css')): ?>
    <link href="<?php echo e(asset('css/app-custom.css')); ?>" rel="stylesheet">
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if ($__env->exists('sections.custom_script_landing')) echo $__env->make('sections.custom_script_landing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</head>

<body class="font-sans antialiased bg-white">
    <?php echo $__env->make('partials.landing-header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <style>
        /* Kill React bundle's own header — zero space */
        .site-header {
            display: none !important;
            height: 0 !important;
            overflow: hidden !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        .home-7_hero-section                          { padding-top: 20px !important; }
        @media (min-width: 576px)  { .home-7_hero-section { padding-top: 40px !important; } }
        @media (min-width: 768px)  { .home-7_hero-section { padding-top: 40px !important; } }
        @media (min-width: 992px)  { .home-7_hero-section { padding-top: 70px !important; } }
        @media (min-width: 1200px) { .home-7_hero-section { padding-top: 90px !important; } }
        @media (min-width: 1400px) { .home-7_hero-section { padding-top: 110px !important; } }

        /* Make service card icons larger for PNG images */
        .service-card-2__icon img {
            width: 72px !important;
            height: 72px !important;
            object-fit: contain !important;
        }
        /* Hero image — bigger */
        .home-7_hero-image img.hero-image {
            width: 100% !important;
            max-width: 620px !important;
            height: auto !important;
        }
        /* Remove excessive blank gaps between sections */
        .home-7_service-section { padding-top: 60px !important; }
        .home-7_content-section-1 { padding-top: 60px !important; padding-bottom: 60px !important; }
        .home-7_content-section-2 { padding-bottom: 60px !important; }
        .home-7_fact-section { padding-top: 40px !important; padding-bottom: 40px !important; }
        .home-7_testimonial-section { padding-top: 60px !important; padding-bottom: 60px !important; }
        .home-7_pricing-section { padding-top: 60px !important; padding-bottom: 60px !important; }
        .padding-bottom-150 { padding-bottom: 60px !important; }

        /* Pricing section — hide toggle, hide prices, restyle cards */
        .home-7_pricing-control-block { display: none !important; }
        .home-7_pricing-section .price-card-3__price,
        .home-7_pricing-section .price-card-3__price-block,
        .home-7_pricing-section .pricing-card-3__price-block,
        .home-7_pricing-section .pricing-card-3__price,
        .home-7_pricing-section .pricing-card-3__price-sign,
        .home-7_pricing-section .pricing-card-3__price-time,
        .home-7_pricing-section [class*="price-block"],
        .home-7_pricing-section [class*="pricing-card-3__price"] { display: none !important; }
        /* Remove disabled strikethrough on list items — all features enabled */
        .home-7_pricing-section .price-card-3__list-item,
        .home-7_pricing-section .pricing-card-3__list-item,
        .home-7_pricing-section .price-card-3__list-item.disabled,
        .home-7_pricing-section .pricing-card-3__list-item.disabled {
            opacity: 1 !important;
            text-decoration: none !important;
            color: inherit !important;
        }
        .home-7_pricing-section .price-card-3__list-item::before,
        .home-7_pricing-section .pricing-card-3__list-item::before,
        .home-7_pricing-section .price-card-3__list-item.disabled::before,
        .home-7_pricing-section .pricing-card-3__list-item.disabled::before {
            background-color: currentColor !important;
            opacity: 1 !important;
        }
    </style>

    <script>
    // Poll for React mount, then patch once. No MutationObserver = no freeze.
    (function() {
        var done = false;

        var serviceCards = [
            { img: '/image/restaurant/chef-01.png', title: 'Table Management',      desc: 'Manage dine-in tables, assign waiters and track occupancy in real time.' },
            { img: '/image/restaurant/chef-02.png', title: 'QR & Online Orders',    desc: 'Customers scan a QR code to browse your menu and place orders directly.' },
            { img: '/image/restaurant/chef-03.png', title: 'Kitchen Display (KOT)', desc: 'Orders fire instantly to the kitchen screen. Chefs confirm items in seconds.' },
            { img: '/image/restaurant/chef-04.png', title: 'Smart Menu Builder',    desc: 'Build your full menu with categories, modifiers and variants in minutes.' },
            { img: '/image/restaurant/chef-05.png', title: 'Staff & Roles',         desc: 'Add waiters, chefs and managers with role-based permissions.' },
            { img: '/image/restaurant/chef-06.png', title: 'Billing & Payments',    desc: 'Split bills, apply discounts and send digital receipts instantly.' },
            { img: '/image/restaurant/chef-07.png', title: 'Sales Analytics',       desc: 'Track revenue, top-selling items and daily summaries with clear reports.' },
            { img: '/image/restaurant/chef-08.png', title: 'Table Reservations',    desc: 'Let guests book tables online and manage bookings effortlessly.' },
        ];

        function patch() {
            if (done) return;
            if (!document.querySelector('.home-7_hero-section')) return;
            done = true;

            function set(el, text) { if (el) el.textContent = text; }
            function q(scope, sel) { return scope.querySelector(sel); }
            function qa(scope, sel) { return scope.querySelectorAll(sel); }

            // Hero
            var hero = q(document, '.home-7_hero-section');
            if (hero) {
                set(q(hero,'.badge'), 'All-in-One Restaurant Management');
                set(q(hero,'.hero-content__title'), 'Run your restaurant smarter, faster & easier');
                set(q(hero,'.home-7_hero-content-text p'), 'TufTable gives your team everything they need — QR ordering, kitchen displays, billing, reservations and real-time analytics — in one simple platform.');
                var btn = q(hero,'.home-7_hero-content-button a');
                if (btn) { btn.textContent = 'Start Free Trial'; btn.href = '/restaurant-signup'; }
            }

            // Facts
            var ftitles = ['Loved by restaurants','Orders processed','Countries served'];
            var fdescs  = ['97% of customers say TufTable improved their table turnover rate.','2M+ orders processed monthly across restaurants worldwide.','Trusted by restaurant owners in 40+ countries globally.'];
            qa(document,'.fact-widget').forEach(function(w,i){
                set(q(w,'.fact-widget_title'), ftitles[i]);
                set(q(w,'p'), fdescs[i]);
            });

            // Service section
            var svc = q(document,'.home-7_service-section');
            if (svc) {
                set(q(svc,'.badge'), 'Everything You Need');
                set(q(svc,'.section-heading-wrapper h2'), 'All the tools your restaurant needs to thrive');
                qa(svc,'.service-card-2').forEach(function(card,i){
                    if (!serviceCards[i]) return;
                    var img = q(card,'.service-card-2__icon img');
                    if (img) { img.src = serviceCards[i].img; img.alt = serviceCards[i].title; }
                    set(q(card,'.service-card-2__title'), serviceCards[i].title);
                    set(q(card,'p'), serviceCards[i].desc);
                });
            }

            // Content 1
            var c1 = q(document,'.home-7_content-section-1');
            if (c1) {
                set(q(c1,'.badge'), 'Built for Every Restaurant');
                set(q(c1,'.content-title'), 'Everything your front-of-house team needs in one place');
                var c1ps = qa(c1,'.content-text-block p');
                set(c1ps[0], 'From the moment a guest walks in to the moment they pay, TufTable keeps your floor running smoothly. Assign tables, take orders on any device and send them straight to the kitchen.');
                set(c1ps[1], 'Your waiters spend less time running back and forth and more time delivering great hospitality. Real-time updates mean no missed orders, no confusion, no delays.');
            }

            // Content 2
            var c2 = q(document,'.home-7_content-section-2');
            if (c2) {
                set(q(c2,'.badge'), 'Insights That Drive Growth');
                set(q(c2,'h2'), 'Know your numbers. Grow your restaurant.');
                set(q(c2,'.content-text-block p'), "Stop guessing what's working. TufTable's analytics show your best-selling dishes, busiest hours and daily revenue so you make smarter decisions every day.");
                var bullets = ['Real-time sales dashboard updated every minute','Item-level reports to spot your top performers','Export reports to Excel or PDF in one click'];
                qa(c2,'.content-list li').forEach(function(li,i){ set(q(li,'span') || li, bullets[i]); });
            }

            // Testimonials
            var tsec = q(document,'.home-7_testimonial-section');
            if (tsec) {
                set(q(tsec,'.testimonial-content h2'), 'What restaurant owners say about TufTable');
                set(q(tsec,'.testimonial-content .content-text-block p'), "Thousands of restaurants trust TufTable daily. Here's what they have to say.");
                set(q(tsec,'.content-button-block a'), 'Read All Reviews');
                var tdata = [
                    {title:'Game changer for our restaurant', desc:'We cut order errors by 80% in the first week. The KOT system is brilliant — chefs love it and customers notice the difference.', name:'Ravi Sharma', pos:'Owner @ Spice Garden'},
                    {title:'Finally, a system that just works', desc:'Setup took 20 minutes. Our waiters picked it up immediately. QR ordering alone paid for the subscription in the first month.', name:'Maria Santos', pos:'Manager @ Café Bella'},
                    {title:'Our revenue went up 30%', desc:'Analytics showed we were underpricing our top dishes. We adjusted the menu and saw an immediate jump in revenue.', name:'James Okafor', pos:'CEO @ Urban Bites'},
                ];
                qa(tsec,'.single-slide').forEach(function(slide,i){
                    if (!tdata[i]) return;
                    set(q(slide,'h3'), tdata[i].title);
                    set(q(slide,'p'),  tdata[i].desc);
                    set(q(slide,'h4'), tdata[i].name);
                    set(q(slide,'span'), tdata[i].pos);
                });
            }

            // Pricing section — full restaurant rewrite
            var pricing = q(document,'.home-7_pricing-section');
            if (pricing) {
                // Badge + heading
                set(q(pricing,'.badge'), 'Simple & Transparent Plans');
                set(q(pricing,'h2'), 'All features included. No hidden charges.');

                // Hide the monthly/yearly toggle
                var toggle = q(pricing,'.home-7_pricing-control-block');
                if (toggle) toggle.style.display = 'none';

                var plans = [
                    {
                        name: '1 Month',
                        sub: 'Pay monthly, cancel anytime',
                        features: ['Unlimited Tables & Orders','QR Code Menu Ordering','Kitchen Display (KOT)','Menu Builder with Modifiers','Staff & Role Management','GST Billing & Digital Receipts','Sales & Payment Reports','Table Reservations','Customer Management','Email Support'],
                        btn: 'Contact for Pricing',
                        active: false,
                    },
                    {
                        name: '1 Year',
                        sub: 'Most popular — best value',
                        features: ['Full access — same as Monthly','Priority WhatsApp Support','Advanced Reports & Excel Export','Multi-Branch Management','Custom Branding','Delivery App Integration','Dedicated Onboarding Session','Expense Tracking Module','Phone & Email Support'],
                        btn: 'Contact for Pricing',
                        active: true,
                    },
                    {
                        name: '3 Years',
                        sub: 'Maximum savings — lowest cost',
                        features: ['Full access — same as 1 Year','Lifetime Software Updates','White-Label Option','API Access & Integrations','Custom Module Development','Dedicated Account Manager','On-Site Training (Surat)','SLA Guarantee','24/7 Priority Support'],
                        btn: 'Contact for Pricing',
                        active: false,
                    },
                ];

                var cards = qa(pricing,'.price-card-3, [class*="price-card"]');
                cards.forEach(function(card, i) {
                    if (!plans[i]) return;
                    var p = plans[i];

                    // Plan name
                    var nameEl = q(card,'.price-card-3__name') || q(card,'h3') || q(card,'h4');
                    if (nameEl) nameEl.textContent = p.name;

                    // Replace price block with subtitle
                    var priceBlock = q(card,'.price-card-3__price-block') || q(card,'[class*="price-block"]');
                    if (priceBlock) {
                        priceBlock.innerHTML = '<p style="font-size:0.875rem;color:inherit;opacity:0.75;margin:4px 0 12px;font-weight:500;">' + p.sub + '</p>';
                    }

                    // Rewrite feature list — all items enabled
                    var list = q(card,'.price-card-3__list') || q(card,'ul');
                    if (list) {
                        list.innerHTML = p.features.map(function(f) {
                            return '<li class="price-card-3__list-item" style="opacity:1;text-decoration:none;list-style:none;">' + f + '</li>';
                        }).join('');
                    }

                    // Button → contact page
                    var btn = q(card,'a.btn-masco') || q(card,'button.btn-masco') || q(card,'a') || q(card,'button');
                    if (btn) {
                        btn.textContent = p.btn;
                        btn.setAttribute('href', '/contact');
                        btn.style.cursor = 'pointer';
                    }
                });
            }

            // CTA email → redirect to signup with email pre-filled
            var cta = q(document,'.cta-home-7');
            if (cta) {
                set(q(cta,'h2'), 'Start managing your restaurant the smart way today');
                var ci = q(cta,'input');
                if (ci) {
                    ci.placeholder = 'Enter your work email';
                    ci.id = 'cta-email-input';
                }
                var cb = q(cta,'button');
                if (cb) {
                    cb.textContent = 'Get Started Free';
                    cb.onclick = function(e) {
                        e.preventDefault();
                        var email = document.getElementById('cta-email-input');
                        var val = email ? encodeURIComponent(email.value.trim()) : '';
                        window.location.href = '/restaurant-signup' + (val ? '?email=' + val : '');
                    };
                }
            }

            // React footer — hide it, we use our own Blade footer
            var reactFooter = q(document,'.footer');
            if (reactFooter) reactFooter.style.display = 'none';

            // Brand section (Logoipsum) — hide entirely
            var brand = q(document,'.home-7_brand-section, .brand-section, [class*="brand-section"]');
            if (brand) brand.style.display = 'none';
        }

        // Poll every 300ms, give up after 10s
        var polls = 0;
        var timer = setInterval(function() {
            polls++;
            patch();
            if (done || polls > 33) clearInterval(timer);
        }, 300);
    })();
    </script>

    <?php echo $__env->make('partials.landing-footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
</html>
<?php /**PATH C:\Users\Priyam\Videos\tuftable\resources\views/layouts/landing.blade.php ENDPATH**/ ?>
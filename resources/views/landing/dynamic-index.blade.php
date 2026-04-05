@extends('layouts.landing')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">

            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                    {{ $frontDetails->header_title ?? __('landing.heroTitle') }}
                </h1>
            <div class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                {!! $frontDetails->header_description ?? __('landing.heroSubTitle') !!}
            </div>
            <div
                class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
                <a href="{{ route('restaurant_signup') }}"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-skin-base hover:bg-skin-base/[0.7] focus:ring-4 focus:ring-skin-base dark:focus:ring-skin-base">
                    @if ($trialPackage)
                        @lang('landing.startTrial', ['days' => $trialPackage->trial_days])
                    @else
                        @lang('landing.getStartedFree')
                    @endif
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>

            </div>

            <div class="relative  max-w-screen-lg flex justify-center mx-auto">

                <div>
                    <img src="{{ $frontDetails->image_url ?? asset('landing/dashboard.png') }}" class="shadow-lg border rounded-lg " alt="">
                </div>

                <!-- SVG Element -->
                <div class="hidden md:block absolute top-0 end-0 -translate-y-12 translate-x-20">
                    <svg class="w-16 h-auto text-skin-base" width="121" height="135" viewBox="0 0 121 135"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 16.4754C11.7688 27.4499 21.2452 57.3224 5 89.0164" stroke="currentColor"
                            stroke-width="10" stroke-linecap="round" />
                        <path d="M33.6761 112.104C44.6984 98.1239 74.2618 57.6776 83.4821 5" stroke="currentColor"
                            stroke-width="10" stroke-linecap="round" />
                        <path d="M50.5525 130C68.2064 127.495 110.731 117.541 116 78.0874" stroke="currentColor"
                            stroke-width="10" stroke-linecap="round" />
                    </svg>
                </div>
                <!-- End SVG Element -->

                <!-- SVG Element -->
                <div class="hidden md:block absolute bottom-0 start-0 translate-y-10 -translate-x-32">
                    <svg class="w-40 h-auto text-gray-500" width="347" height="188" viewBox="0 0 347 188"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M4 82.4591C54.7956 92.8751 30.9771 162.782 68.2065 181.385C112.642 203.59 127.943 78.57 122.161 25.5053C120.504 2.2376 93.4028 -8.11128 89.7468 25.5053C85.8633 61.2125 130.186 199.678 180.982 146.248L214.898 107.02C224.322 95.4118 242.9 79.2851 258.6 107.02C274.299 134.754 299.315 125.589 309.861 117.539L343 93.4426"
                            stroke="currentColor" stroke-width="7" stroke-linecap="round" />
                    </svg>
                </div>
                <!-- End SVG Element -->
            </div>

        </div>
    </section>

    @if (!$frontFeatures->isEmpty() )
    <!-- Features -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto space-y-8">

        <!-- Title -->
        <div class="mx-auto mb-8 lg:mb-14 text-center">
            <h2 class="text-3xl lg:text-4xl text-gray-800 font-bold dark:text-neutral-200">
                {{ $frontDetails->feature_with_image_heading ?? __('landing.featureSection1')}}
            </h2>
        </div>
        <!-- End Title -->
        <!-- Grid -->
            @foreach($frontFeatures as $index => $feature)
                @if ($feature->type == 'image')

                    <div class="md:grid md:grid-cols-2 md:items-center md:gap-12 xl:gap-32 mb-10 flex flex-col">
                        @if($index % 2 == 0)
                            <div class="w-full lg:w-[500px] lg:h-[500px] overflow-hidden rounded-xl border border-gray-100 shadow">
                                <img class="w-full h-full object-cover object-center"
                                    src="{{ $feature->image ? asset('user-uploads/front_feature/' . $feature->image) : asset('landing/order-management.png') }}"
                                    alt="{{ $feature->title }}">
                            </div>
                            <!-- End Col -->
                            <div class="mt-5 sm:mt-10 lg:mt-0">
                                <div class="space-y-6 sm:space-y-8">
                                    <!-- Title -->
                                    <div class="space-y-2 md:space-y-4">
                                        <h2 class="font-bold text-3xl lg:text-4xl text-gray-800 dark:text-neutral-200">
                                            {{ $feature->title }}
                                        </h2>
                                        <div class="prose prose-gray dark:prose-invert max-w-none">
                                            {!! $feature->description !!}
                                        </div>
                                    </div>
                                    <!-- End Title -->
                                </div>
                            </div>
                            <!-- End Col -->
                        @else
                            <div class="order-2 md:order-1 mt-5 sm:mt-10 lg:mt-0">
                                <div class="space-y-6 sm:space-y-8">
                                    <!-- Title -->
                                    <div class="space-y-2 md:space-y-4">
                                        <h2 class="font-bold text-3xl lg:text-4xl text-gray-800 dark:text-neutral-200">
                                            {{ $feature->title }}
                                        </h2>
                                        <div class="prose prose-gray dark:prose-invert max-w-none">
                                            {!! $feature->description !!}
                                        </div>
                                    </div>
                                    <!-- End Title -->
                                </div>
                            </div>
                            <!-- End Col -->
                            <div class="w-full lg:w-[500px] lg:h-[500px] overflow-hidden rounded-xl border border-gray-100 shadow order-1 md:order-2">
                                <img class="w-full h-full object-cover object-center"
                                    src="{{ $feature->image ? asset('user-uploads/front_feature/' . $feature->image) : asset('landing/table-reservation.png') }}"
                                    alt="{{ $feature->title }}">
                            </div>
                            <!-- End Col -->

                        @endif
                    </div>
                @endif

            @endforeach
        <!-- End Grid -->

    </div>
    <!-- End Features -->
    @endif

    @if(!$frontFeatures->isEmpty())
    <!-- Icon Blocks -->
    <div id="icon-features" class="mb-5"> </div>
    <div class="max-w-[85rem] mt-6 px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

        <!-- Title -->
        <div class="mx-auto  mb-8 lg:mb-14 text-center">
            <h2 class="text-3xl lg:text-4xl text-gray-800 font-bold dark:text-neutral-200">
                {{ $frontDetails->feature_with_icon_heading ?? __('landing.featureSection2')}}
            </h2>
        </div>
        <!-- End Title -->

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-12">
                @foreach($frontFeatures as $index => $feature)
                    <!-- Icon Block -->
                    @if ($feature->type == 'icon')

                    <div>
                        <div
                            class="relative flex justify-center items-center size-12 bg-white rounded-xl before:absolute before:-inset-px before:-z-[1] before:bg-gradient-to-br before:from-gray-700 before:via-transparent before:to-gray-600 before:rounded-xl dark:bg-neutral-900">
                            @if(!empty($feature->image))
                                {!! $feature->image !!}
                            @else
                                <!-- Default SVG if icon not set -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-qr-code-scan text-skin-base dark:text-skin-base size-6" viewBox="0 0 16 16">
                                    <path
                                        d="M0 .5A.5.5 0 0 1 .5 0h3a.5.5 0 0 1 0 1H1v2.5a.5.5 0 0 1-1 0zm12 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0V1h-2.5a.5.5 0 0 1-.5-.5M.5 12a.5.5 0 0 1 .5.5V15h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H15v-2.5a.5.5 0 0 1 .5-.5M4 4h1v1H4z" />
                                    <path d="M7 2H2v5h5zM3 3h3v3H3zm2 8H4v1h1z" />
                                    <path d="M7 9H2v5h5zm-4 1h3v3H3zm8-6h1v1h-1z" />
                                    <path
                                        d="M9 2h5v5H9zm1 1v3h3V3zM8 8v2h1v1H8v1h2v-2h1v2h1v-1h2v-1h-3V8zm2 2H9V9h1zm4 2h-1v1h-2v1h3zm-4 2v-1H8v1z" />
                                    <path d="M12 9h2V8h-2z" />
                                </svg>
                            @endif
                        </div>
                        <div class="mt-5">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $feature->title }}</h3>
                            <div class="prose prose-gray dark:prose-invert max-w-none">{!! $feature->description !!}</div>
                        </div>
                    </div>
                    <!-- End Icon Block -->
                    @endif

                @endforeach
            </div>
    </div>
    <!-- End Icon Blocks -->
    @endif

    @if(!$frontReviews->isEmpty())
    <!-- Testimonials -->

    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">

        <!-- Title -->
        <div class="mx-auto  mb-8 lg:mb-14 text-center">
            <h2 class="text-3xl lg:text-4xl text-gray-800 font-bold dark:text-neutral-200">
            {{ $frontDetails->review_heading ?? __('landing.testimonialSection1') }}
            </h2>
        </div>
        <!-- End Title -->

        <!-- Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($frontReviews as $review)
                    <!-- Card -->
                    <div class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-700">
                        <div class="flex-auto p-4 md:p-6">
                            <p class="text-base text-gray-800 md:text-xl dark:text-white"><em>
                                "{{ $review->reviews }}"
                            </em></p>
                        </div>
                        <div class="p-4 rounded-b-xl md:px-6">
                            <h3 class="text-sm font-semibold text-gray-800 sm:text-base dark:text-neutral-200">
                                {{ $review->reviewer_name }}
                            </h3>
                            <p class="text-sm text-gray-500 dark:text-neutral-500">
                                {{ $review->reviewer_designation }}
                            </p>
                        </div>
                    </div>
                    <!-- End Card -->
                @endforeach

        </div>
        <!-- End Grid -->
    </div>
    <!-- End Testimonials -->
    @endif

    <!-- Pricing Section -->
    <div id="simple-pricing"></div>
    <section style="background:#0f172a;padding:80px 0;">
        <div class="container">

            {{-- Heading --}}
            <div style="text-align:center;margin-bottom:56px;">
                <span style="display:inline-block;background:#fef08a;color:#713f12;font-size:12px;font-weight:700;padding:4px 16px;border-radius:999px;margin-bottom:16px;letter-spacing:1px;">SIMPLE &amp; TRANSPARENT PLANS</span>
                <h2 style="font-size:2.5rem;font-weight:800;color:#fff;line-height:1.2;margin:0 0 12px;">All features included.<br>No hidden charges.</h2>
                <p style="color:#94a3b8;font-size:1rem;margin:0;">Pick the billing cycle that works for your restaurant.</p>
            </div>

            {{-- 3 Cards --}}
            <div class="row justify-content-center">

                {{-- Monthly --}}
                <div class="col-lg-4 col-md-6" style="padding:12px;">
                    <div style="background:#fff;border-radius:20px;padding:36px 32px;height:100%;display:flex;flex-direction:column;">
                        <div style="margin-bottom:28px;">
                            <span style="display:inline-block;background:#ede9fe;color:#4f46e5;font-size:11px;font-weight:700;padding:3px 12px;border-radius:999px;letter-spacing:1px;margin-bottom:12px;">MONTHLY</span>
                            <h3 style="font-size:1.4rem;font-weight:800;color:#111827;margin:0 0 6px;">Pay as you go</h3>
                            <p style="font-size:13px;color:#6b7280;margin:0;">Billed every month. Cancel anytime.</p>
                        </div>
                        <ul style="list-style:none;padding:0;margin:0 0 32px;flex:1;">
                            <li style="display:flex;align-items:flex-start;gap:10px;padding:9px 0;border-bottom:1px solid #f3f4f6;font-size:14px;color:#374151;"><span style="color:#4f46e5;font-weight:700;flex-shrink:0;">&#10003;</span> KOT &amp; Digital Order Management</li>
                            <li style="display:flex;align-items:flex-start;gap:10px;padding:9px 0;border-bottom:1px solid #f3f4f6;font-size:14px;color:#374151;"><span style="color:#4f46e5;font-weight:700;flex-shrink:0;">&#10003;</span> QR Code Menu &amp; Ordering</li>
                            <li style="display:flex;align-items:flex-start;gap:10px;padding:9px 0;border-bottom:1px solid #f3f4f6;font-size:14px;color:#374151;"><span style="color:#4f46e5;font-weight:700;flex-shrink:0;">&#10003;</span> GST Billing &amp; Invoices</li>
                            <li style="display:flex;align-items:flex-start;gap:10px;padding:9px 0;border-bottom:1px solid #f3f4f6;font-size:14px;color:#374151;"><span style="color:#4f46e5;font-weight:700;flex-shrink:0;">&#10003;</span> Table &amp; Floor Management</li>
                            <li style="display:flex;align-items:flex-start;gap:10px;padding:9px 0;border-bottom:1px solid #f3f4f6;font-size:14px;color:#374151;"><span style="color:#4f46e5;font-weight:700;flex-shrink:0;">&#10003;</span> Sales &amp; Payment Reports</li>
                            <li style="display:flex;align-items:flex-start;gap:10px;padding:9px 0;font-size:14px;color:#374151;"><span style="color:#4f46e5;font-weight:700;flex-shrink:0;">&#10003;</span> Customer Management</li>
                        </ul>
                        <a href="{{ route('landing.contact') }}" style="display:block;text-align:center;padding:14px;border:2px solid #111827;border-radius:999px;font-weight:700;font-size:15px;color:#111827;text-decoration:none;" onmouseover="this.style.background='#111827';this.style.color='#fff'" onmouseout="this.style.background='transparent';this.style.color='#111827'">Get Started</a>
                    </div>
                </div>

                {{-- 1 Year (Popular) --}}
                <div class="col-lg-4 col-md-6" style="padding:12px;">
                    <div style="background:#4f46e5;border-radius:20px;padding:36px 32px;height:100%;display:flex;flex-direction:column;position:relative;box-shadow:0 24px 60px rgba(79,70,229,0.45);">
                        <div style="position:absolute;top:-14px;left:50%;transform:translateX(-50%);background:#fef08a;color:#713f12;font-size:11px;font-weight:800;padding:4px 18px;border-radius:999px;white-space:nowrap;letter-spacing:1px;">MOST POPULAR</div>
                        <div style="margin-bottom:28px;">
                            <span style="display:inline-block;background:rgba(255,255,255,0.15);color:#fff;font-size:11px;font-weight:700;padding:3px 12px;border-radius:999px;letter-spacing:1px;margin-bottom:12px;">1 YEAR</span>
                            <h3 style="font-size:1.4rem;font-weight:800;color:#fff;margin:0 0 6px;">Best value plan</h3>
                            <p style="font-size:13px;color:#c7d2fe;margin:0;">Billed annually. Save more, stress less.</p>
                        </div>
                        <ul style="list-style:none;padding:0;margin:0 0 32px;flex:1;">
                            <li style="display:flex;align-items:flex-start;gap:10px;padding:9px 0;border-bottom:1px solid rgba(255,255,255,0.15);font-size:14px;color:#fff;"><span style="color:#fef08a;font-weight:700;flex-shrink:0;">&#10003;</span> Everything in Monthly</li>
                            <li style="display:flex;align-items:flex-start;gap:10px;padding:9px 0;border-bottom:1px solid rgba(255,255,255,0.15);font-size:14px;color:#fff;"><span style="color:#fef08a;font-weight:700;flex-shrink:0;">&#10003;</span> Online Table Reservations</li>
                            <li style="display:flex;align-items:flex-start;gap:10px;padding:9px 0;border-bottom:1px solid rgba(255,255,255,0.15);font-size:14px;color:#fff;"><span style="color:#fef08a;font-weight:700;flex-shrink:0;">&#10003;</span> Staff &amp; Waiter Management</li>
                            <li style="display:flex;align-items:flex-start;gap:10px;padding:9px 0;border-bottom:1px solid rgba(255,255,255,0.15);font-size:14px;color:#fff;"><span style="color:#fef08a;font-weight:700;flex-shrink:0;">&#10003;</span> Delivery Executive Module</li>
                            <li style="display:flex;align-items:flex-start;gap:10px;padding:9px 0;border-bottom:1px solid rgba(255,255,255,0.15);font-size:14px;color:#fff;"><span style="color:#fef08a;font-weight:700;flex-shrink:0;">&#10003;</span> Advanced Analytics &amp; Exports</li>
                            <li style="display:flex;align-items:flex-start;gap:10px;padding:9px 0;font-size:14px;color:#fff;"><span style="color:#fef08a;font-weight:700;flex-shrink:0;">&#10003;</span> WhatsApp &amp; OTP Notifications</li>
                        </ul>
                        <a href="{{ route('landing.contact') }}" style="display:block;text-align:center;padding:14px;background:#fff;border-radius:999px;font-weight:700;font-size:15px;color:#4f46e5;text-decoration:none;" onmouseover="this.style.background='#fef08a'" onmouseout="this.style.background='#fff'">Get Started</a>
                    </div>
                </div>

                {{-- 3 Years --}}
                <div class="col-lg-4 col-md-6" style="padding:12px;">
                    <div style="background:#fff;border-radius:20px;padding:36px 32px;height:100%;display:flex;flex-direction:column;border:2px solid #e5e7eb;">
                        <div style="margin-bottom:28px;">
                            <span style="display:inline-block;background:#fef3c7;color:#92400e;font-size:11px;font-weight:700;padding:3px 12px;border-radius:999px;letter-spacing:1px;margin-bottom:12px;">3 YEARS</span>
                            <h3 style="font-size:1.4rem;font-weight:800;color:#111827;margin:0 0 6px;">Maximum savings</h3>
                            <p style="font-size:13px;color:#6b7280;margin:0;">Billed once for 3 years. Lowest cost.</p>
                        </div>
                        <ul style="list-style:none;padding:0;margin:0 0 32px;flex:1;">
                            <li style="display:flex;align-items:flex-start;gap:10px;padding:9px 0;border-bottom:1px solid #f3f4f6;font-size:14px;color:#374151;"><span style="color:#4f46e5;font-weight:700;flex-shrink:0;">&#10003;</span> Everything in 1 Year</li>
                            <li style="display:flex;align-items:flex-start;gap:10px;padding:9px 0;border-bottom:1px solid #f3f4f6;font-size:14px;color:#374151;"><span style="color:#4f46e5;font-weight:700;flex-shrink:0;">&#10003;</span> Multi-Branch Management</li>
                            <li style="display:flex;align-items:flex-start;gap:10px;padding:9px 0;border-bottom:1px solid #f3f4f6;font-size:14px;color:#374151;"><span style="color:#4f46e5;font-weight:700;flex-shrink:0;">&#10003;</span> Custom Branding &amp; Domain</li>
                            <li style="display:flex;align-items:flex-start;gap:10px;padding:9px 0;border-bottom:1px solid #f3f4f6;font-size:14px;color:#374151;"><span style="color:#4f46e5;font-weight:700;flex-shrink:0;">&#10003;</span> Priority WhatsApp Support</li>
                            <li style="display:flex;align-items:flex-start;gap:10px;padding:9px 0;border-bottom:1px solid #f3f4f6;font-size:14px;color:#374151;"><span style="color:#4f46e5;font-weight:700;flex-shrink:0;">&#10003;</span> Dedicated Onboarding</li>
                            <li style="display:flex;align-items:flex-start;gap:10px;padding:9px 0;font-size:14px;color:#374151;"><span style="color:#4f46e5;font-weight:700;flex-shrink:0;">&#10003;</span> Expense &amp; Modifier Modules</li>
                        </ul>
                        <a href="{{ route('landing.contact') }}" style="display:block;text-align:center;padding:14px;border:2px solid #111827;border-radius:999px;font-weight:700;font-size:15px;color:#111827;text-decoration:none;" onmouseover="this.style.background='#111827';this.style.color='#fff'" onmouseout="this.style.background='transparent';this.style.color='#111827'">Get Started</a>
                    </div>
                </div>

            </div>

            {{-- Bottom feature tags --}}
            <div style="margin-top:48px;text-align:center;">
                <p style="color:#64748b;font-size:13px;margin-bottom:16px;">All plans include:</p>
                <div style="display:flex;flex-wrap:wrap;justify-content:center;gap:10px;">
                    @foreach(['KOT System','QR Menu','GST Billing','Table Management','Sales Reports','Customer Management','Menu Builder','Payment Tracking','Expense Tracking','Item Modifiers','Reservation System','Delivery Module'] as $feat)
                    <span style="background:#1e293b;color:#94a3b8;font-size:12px;padding:5px 14px;border-radius:999px;">{{ $feat }}</span>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
    <!-- End Pricing Section -->

    @if(!$frontFaqs->isEmpty())
    <!-- FAQ -->
    <div id="user-faqs" class="mb-5"> </div>
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto" id="user-faqs">
        <!-- Title -->
        <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight dark:text-white">
                    {{ $frontDetails->faq_heading ?? __('landing.faqTitle1')}}
            </h2>
            <div class="mt-1 text-gray-600 dark:text-neutral-400">{!!  $frontDetails->faq_description ?? __('landing.faqSubTitle1')!!}</div>
        </div>
        <!-- End Title -->
            <div class="max-w-5xl mx-auto">
                <!-- Grid -->
                <div class="grid sm:grid-cols-2 gap-6 md:gap-12">
                    @foreach ($frontFaqs as $frontFaq)
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-neutral-200">
                                {{ $frontFaq->question }}
                            </h3>
                            <div class="mt-2 text-gray-600 dark:text-neutral-400 [&_*]:text-gray-600 [&_*]:dark:text-neutral-400">
                                {!! $frontFaq->answer !!}
                            </div>
                        </div>
                        <!-- End Col -->
                    @endforeach
                </div>
                <!-- End Grid -->
            </div>


    </div>
    <!-- End FAQ -->
    @endif

    {{-- New Section --}}
    {{-- @foreach ($customMenu as $menu)
        <div id="{{ Str::slug($menu->menu_name) }}"> </div>

        <div>
            <div class="max-w-7xl px-4 lg:px-8 lg:py-5 mx-auto">
                <ul class="flex flex-col gap-4">
                </ul>

                <div id="{{ Str::slug($menu->menu_name) }}"
                    class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                    <!-- Title -->
                    <div class="mx-auto mb-8 lg:mb-14 text-center">
                        <h2 class="text-3xl lg:text-4xl text-gray-800 font-bold dark:text-neutral-200">
                            {{ $menu->menu_name }}
                        </h2>
                    </div>
                    <!-- End Title -->

                    <!-- Content -->
                    <div class="text-gray-600 dark:text-neutral-400">
                        {!! $menu->menu_content !!}
                    </div>
                    <!-- End Content -->
                </div>
            </div>
        </div>
    @endforeach --}}
    {{-- End New Section --}}
    <!-- Contact -->
    <div class="max-w-7xl px-4 lg:px-8 py-12 lg:py-24 mx-auto">
        <div class="mb-6 sm:mb-10 max-w-2xl text-center mx-auto">
            <h2 class="font-medium text-black text-2xl sm:text-4xl dark:text-white">
                {{ $frontDetails->contact_heading ?? __('landing.contactTitle')}}
            </h2>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 lg:items-center gap-6 md:gap-8 lg:gap-12">
            <div class="aspect-w-16 aspect-h-6 lg:aspect-h-14 overflow-hidden bg-gray-100 rounded-2xl dark:bg-neutral-800">
            @if(!empty($frontContact->image))
                <img class="group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out object-cover rounded-2xl w-full"
                    src="{{ asset('user-uploads/contact_image/' . $frontContact->image) }}"
                    alt="Contact Image">
            @else
                <img class="group-hover:scale-105 group-focus:scale-105 transition-transform duration-500 ease-in-out object-cover rounded-2xl"
                    src="https://images.unsplash.com/photo-1572021335469-31706a17aaef?q=80&w=560&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    alt="Contacts Image">
            @endif

            </div>
            <!-- End Col -->

            <div class="space-y-8 lg:space-y-16">
                <div>
                    <h3 class="mb-5 font-semibold text-black dark:text-white">
                        @lang('landing.addressTitle')
                    </h3>

                    <!-- Grid -->
                    <div class="grid gap-4 sm:gap-6 md:gap-8 lg:gap-12">
                        <div class="flex gap-4">
                            <svg class="shrink-0 size-5 text-gray-500 dark:text-neutral-500"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>

                            <div class="grow">
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                     {{ $frontContact->contact_company ?? __('landing.contactCompany')}}
                                </p>
                                <address class="mt-1 text-black not-italic dark:text-white">
                                     {{ $frontContact->address ?? __('landing.contactAddress')}}

                                </address>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <svg class="shrink-0 size-5 text-gray-500 dark:text-neutral-500"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z">
                                </path>
                                <path d="m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10"></path>
                            </svg>

                            <div class="grow">
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    @lang('landing.emailTitle')
                                </p>
                                <p>
                                    <a class="relative inline-block font-medium text-black before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-skin-base hover:before:bg-black focus:outline-none focus:before:bg-black dark:text-white dark:hover:before:bg-white dark:focus:before:bg-white"
                                        href="mailto:{{ $frontContact->email ?? __('landing.contactEmail')}}">
                                         {{ $frontContact->email ?? __('landing.contactEmail')}}

                                    </a>
                                </p>
                            </div>
                        </div>

                    </div>
                    <!-- End Grid -->
                </div>

            </div>
            <!-- End Col -->
        </div>
    </div>
    <!-- End Contact -->
@endsection

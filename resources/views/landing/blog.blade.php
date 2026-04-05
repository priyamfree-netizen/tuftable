@extends('layouts.landing-page')

@section('title', 'Restaurant Management Blog India 2024 | TufTable by DN Info Solution')

@push('styles')
<meta name="description" content="Expert tips on restaurant management software, KOT systems, QR ordering, GST billing and table reservations for Indian restaurants. By DN Info Solution, Surat.">
<meta name="keywords" content="restaurant management software India, KOT system, QR menu ordering, GST billing restaurant, table reservation software, restaurant POS India, TufTable, DN Info Solution">
<meta name="author" content="DN Info Solution">
<meta name="robots" content="index, follow">
<link rel="canonical" href="{{ url('/blog') }}">
<meta property="og:title" content="Restaurant Management Blog India | TufTable">
<meta property="og:description" content="Expert restaurant management tips for Indian restaurant owners.">
<meta property="og:url" content="{{ url('/blog') }}">
<meta property="og:type" content="website">
<meta property="og:image" content="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=1200&auto=format&fit=crop">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Restaurant Management Blog India | TufTable">
<meta name="twitter:description" content="Expert tips for Indian restaurant owners on digital operations, billing and growth.">
<script type="application/ld+json">{"@@context":"https://schema.org","@@type":"Blog","name":"TufTable Restaurant Management Blog","description":"Expert restaurant management tips for Indian restaurant owners","url":"{{ url('/blog') }}","publisher":{"@@type":"Organization","name":"DN Info Solution","url":"https://dninfo.online","address":{"@@type":"PostalAddress","addressLocality":"Surat","addressRegion":"Gujarat","addressCountry":"IN"},"contactPoint":{"@@type":"ContactPoint","telephone":"+91-79843-23769","email":"dninfopvt@gmail.com"}}}</script>
@endpush

@section('content')

@php $posts = require(resource_path('views/landing/blog-data.php')); @endphp

{{-- Inner Banner --}}
<div class="inner_banner-section">
    <img class="inner_banner-background-image" src="/image/common/inner-bg.png" alt="Restaurant Management Blog India" />
    <div class="container">
        <div class="inner_banner-content-block">
            <h1 class="inner_banner-title" style="font-size:2rem;">Restaurant Tips &amp; Insights</h1>
            <ul class="banner__page-navigator">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active"><a href="{{ route('landing.blog') }}">Blog</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="blog_main-section section-padding-120">
    <div class="container">
        <div class="row">

            <div class="col-xl-8">
                <div class="blog_content">
                    <div class="blog-card-large-row">

                        @foreach($posts as $post)
                        <article class="blog-card-large" itemscope itemtype="https://schema.org/BlogPosting">
                            <meta itemprop="datePublished" content="{{ $post['dateISO'] }}">
                            <meta itemprop="author" content="DN Team — DN Info Solution">
                            <div class="blog-card-large__image">
                                <img src="{{ $post['img'] }}" alt="{{ $post['title'] }}" itemprop="image" style="width:100%;height:280px;object-fit:cover;border-radius:8px;" />
                            </div>
                            <div class="blog-card-large__body">
                                <div class="blog-card-large__meta">
                                    <span class="blog-card-large__user" style="display:inline-flex;align-items:center;gap:6px;">
                                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                                        DN Team
                                    </span>
                                    <span class="blog-card-large__time" style="margin-left:12px;">
                                        <i class="fa-regular fa-calendar" style="font-size:11px;"></i> {{ $post['date'] }}
                                    </span>
                                    <span class="blog-card-large__category" style="margin-left:12px;">{{ $post['category'] }}</span>
                                    <span style="margin-left:12px;font-size:12px;color:#9ca3af;"><i class="fa-regular fa-clock"></i> {{ $post['readTime'] }}</span>
                                </div>
                                <h2 class="blog-card-large__title" itemprop="headline" style="cursor:pointer;" onclick="openBlogModal('{{ $post['id'] }}')">
                                    {{ $post['title'] }}
                                </h2>
                                <p itemprop="description">{{ $post['excerpt'] }}</p>
                                <button onclick="openBlogModal('{{ $post['id'] }}')" class="blog-card-large__link" style="background:none;border:none;cursor:pointer;padding:0;display:inline-flex;align-items:center;gap:6px;">
                                    <span>Read More</span>
                                    <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </article>

                        <div id="modal-{{ $post['id'] }}" style="display:none;position:fixed;inset:0;z-index:99999;background:rgba(0,0,0,0.7);overflow-y:auto;padding:20px;" onclick="if(event.target===this){closeBlogModal('{{ $post['id'] }}')}">
                            <div style="max-width:780px;margin:40px auto;background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 25px 60px rgba(0,0,0,0.3);">
                                <img src="{{ $post['img'] }}" alt="{{ $post['title'] }}" style="width:100%;height:300px;object-fit:cover;" />
                                <div style="padding:36px 40px;">
                                    <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;flex-wrap:wrap;">
                                        <span style="background:#f3f4f6;padding:4px 12px;border-radius:999px;font-size:12px;font-weight:600;color:#4f46e5;">{{ $post['category'] }}</span>
                                        <span style="font-size:13px;color:#6b7280;"><i class="fa-regular fa-calendar"></i> {{ $post['date'] }}</span>
                                        <span style="font-size:13px;color:#6b7280;"><i class="fa-regular fa-clock"></i> {{ $post['readTime'] }}</span>
                                        <span style="font-size:13px;color:#6b7280;">DN Team — DN Info Solution</span>
                                    </div>
                                    <h2 style="font-size:1.6rem;font-weight:700;color:#111827;margin-bottom:20px;line-height:1.3;">{{ $post['title'] }}</h2>
                                    <div style="font-size:0.95rem;line-height:1.8;color:#374151;" class="blog-modal-content">
                                        {!! $post['content'] !!}
                                    </div>
                                    <div style="margin-top:32px;padding-top:24px;border-top:1px solid #e5e7eb;display:flex;align-items:center;justify-content:space-between;">
                                        <div style="font-size:13px;color:#6b7280;">
                                            Published by <strong>DN Info Solution</strong> &middot; Surat, Gujarat &middot;
                                            <a href="https://dninfo.online" target="_blank" style="color:#4f46e5;">dninfo.online</a>
                                        </div>
                                        <button onclick="closeBlogModal('{{ $post['id'] }}')" style="padding:8px 20px;background:#111827;color:#fff;border:none;border-radius:999px;cursor:pointer;font-size:14px;">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

                <div class="pagination" style="margin-top:40px;">
                    <div class="pagination-wrapper">
                        <button class="btn btn--arrow"><i class="fa fa-angle-left"></i></button>
                        <button class="btn btn-main active">1</button>
                        <button class="btn btn-main">2</button>
                        <button class="btn btn-main">3</button>
                        <button class="btn btn--arrow"><i class="fa fa-angle-right"></i></button>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <aside class="sidebar-wrapper">

                    <div class="sidebar-search-input">
                        <form action="#" class="input-wrapper">
                            <span class="input-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                            <input class="form-control" type="text" placeholder="Search articles..." />
                        </form>
                    </div>

                    <div class="sidebar-single">
                        <div class="sidebar-list">
                            <div class="sidebar-title-block"><h3 class="sidebar-title">Categories</h3></div>
                            <ul class="sidebar-category-list">
                                <li class="sidebar-category-list-item"><a href="#" class="sidebar-category">Restaurant Management (12)</a></li>
                                <li class="sidebar-category-list-item"><a href="#" class="sidebar-category">QR Ordering (8)</a></li>
                                <li class="sidebar-category-list-item"><a href="#" class="sidebar-category">Billing &amp; GST (6)</a></li>
                                <li class="sidebar-category-list-item"><a href="#" class="sidebar-category">Table Reservations (5)</a></li>
                                <li class="sidebar-category-list-item"><a href="#" class="sidebar-category">Sales Analytics (9)</a></li>
                                <li class="sidebar-category-list-item"><a href="#" class="sidebar-category">Staff Management (4)</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="sidebar-single">
                        <div class="sidebar-blog-suggestion">
                            <div class="sidebar-title-block"><h3 class="sidebar-title">Recent Posts</h3></div>
                            <div class="sidebar-blog-widget-wrapper">
                                @foreach(array_slice($posts, 0, 3) as $r)
                                <div class="sidebar-blog-widget" style="cursor:pointer;" onclick="openBlogModal('{{ $r['id'] }}')">
                                    <div class="sidebar-blog-widget__image">
                                        <img src="{{ $r['img'] }}" alt="{{ $r['title'] }}" style="width:70px;height:60px;object-fit:cover;border-radius:6px;" />
                                    </div>
                                    <div class="sidebar-blog-widget__body">
                                        <span class="sidebar-blog-widget__date" style="font-size:12px;color:#9ca3af;">{{ $r['date'] }}</span>
                                        <h3 class="sidebar-blog-widget__title" style="font-size:13px;">{{ $r['title'] }}</h3>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-single">
                        <div class="sidebar-title-block"><h3 class="sidebar-title">Tags</h3></div>
                        <ul class="sidebar-tag-list">
                            @foreach(['Restaurant POS India','KOT System','QR Menu','Table Booking','GST Billing','Indian Restaurant Software','Food Tech India','Restaurant Management','Online Ordering','Staff Management','Sales Report','TufTable','DN Info Solution','Surat Gujarat'] as $tag)
                            <li class="sidebar-tag-list-item"><a href="#" rel="tag">{{ $tag }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="sidebar-single">
                        <div class="sidebar-title-block"><h3 class="sidebar-title">About the Author</h3></div>
                        <div class="sidebar-newsletter">
                            <p style="font-weight:600;margin-bottom:4px;">DN Team</p>
                            <p style="font-size:13px;color:#6b7280;">Restaurant technology experts at <a href="https://dninfo.online" target="_blank" style="color:#4f46e5;">DN Info Solution</a>, Surat, Gujarat. We build TufTable.</p>
                            <p style="font-size:13px;margin-top:8px;"><a href="mailto:dninfopvt@gmail.com" style="color:#4f46e5;">dninfopvt@gmail.com</a><br>+91 79843 23769</p>
                        </div>
                    </div>

                    <div class="sidebar-single">
                        <div class="sidebar-title-block"><h3 class="sidebar-title">Try TufTable Free</h3></div>
                        <div class="sidebar-newsletter">
                            <p>Join 500+ Indian restaurants already using TufTable.</p>
                            <div class="sidebar-button" style="margin-top:16px;">
                                <a href="{{ route('restaurant_signup') }}" class="btn-masco btn-primary rounded-pill w-100">Start Free Trial</a>
                            </div>
                        </div>
                    </div>

                </aside>
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
                        <h2 class="heading-md text-white">Ready to modernise your restaurant operations?</h2>
                    </div>
                </div>
                <div class="col-xl-auto col-lg-4 col-md-5 col-xs-8 col-10">
                    <div class="cta-base__button">
                        <a href="{{ route('restaurant_signup') }}" class="btn-masco rounded-pill btn-fill--up"><span>Start Free Trial</span></a>
                        <div class="cta-base__button-shape"><img src="/image/home-1/cta-shape.svg" alt="cta shape" /></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.landing-footer')

@endsection


@push('scripts')
<style>
.blog-modal-content h2{font-size:1.2rem;font-weight:700;color:#111827;margin:24px 0 10px;}
.blog-modal-content h3{font-size:1rem;font-weight:600;color:#1f2937;margin:18px 0 8px;}
.blog-modal-content p{margin-bottom:14px;}
.blog-modal-content ul,.blog-modal-content ol{padding-left:20px;margin-bottom:14px;}
.blog-modal-content li{margin-bottom:6px;}
.blog-modal-content a{color:#4f46e5;text-decoration:underline;}
.blog-modal-content strong{color:#111827;}
</style>

<script>
function openBlogModal(id){document.getElementById('modal-'+id).style.display='block';document.body.style.overflow='hidden';}
function closeBlogModal(id){document.getElementById('modal-'+id).style.display='none';document.body.style.overflow='';}
document.addEventListener('keydown',function(e){if(e.key==='Escape'){document.querySelectorAll('[id^="modal-"]').forEach(function(m){m.style.display='none';});document.body.style.overflow='';}});
</script>
@endpush

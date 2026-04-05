@extends('layouts.landing-page')
@section('title', 'About TufTable | Restaurant Management Software India')
@section('content')

{{-- Inner Banner --}}
<div class="inner_banner-section">
    <img class="inner_banner-background-image" src="/image/common/inner-bg.png" alt="banner bg" />
    <div class="container">
        <div class="inner_banner-content-block">
            <h3 class="inner_banner-title">About TufTable</h3>
            <ul class="banner__page-navigator">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li class="active"><a href="{{ route('landing.about') }}">About Us</a></li>
            </ul>
        </div>
    </div>
</div>

{{-- Banner Images --}}
<div class="about_banner-section">
    <div class="container">
        <div class="row justify-content-center row--custom">
            <div class="col-12">
                <div class="row banner_image-row padding-top-100">
                    <div class="col-xs-4 col-7">
                        <div class="single-image-1">
                            <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=600&auto=format&fit=crop" alt="Restaurant Interior" />
                        </div>
                    </div>
                    <div class="col-xs-4 col-7">
                        <div class="single-image-2">
                            <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=600&auto=format&fit=crop" alt="Fine Dining" />
                        </div>
                    </div>
                    <div class="col-xs-4 col-7">
                        <div class="single-image-3">
                            <img src="https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=600&auto=format&fit=crop" alt="Restaurant Kitchen" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Vision / Mission --}}
<div class="about_content-section bg-light-2 section-padding-120">
    <div class="container">
        <div class="row row--custom">
            <div class="col-xxl-6 col-lg-5 col-md-6 col-7">
                <div class="about_content-image-block">
                    <div class="about_content-image content-image--mobile-width">
                        <img src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092?w=700&auto=format&fit=crop" alt="TufTable Mission" />
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-lg-7 col-md-10 col-auto" data-aos="fade-left" data-aos-duration="1000">
                <div class="content">
                    <div class="content-text-block">
                        @if(!empty(global_setting()->about_us))
                            <div class="trix-content">{!! global_setting()->about_us !!}</div>
                        @else
                            <h2 class="content-title heading-md text-black">Built in India, for Indian restaurants</h2>
                            <p>TufTable was born from a simple frustration — watching great Indian restaurants lose revenue to paper KOTs, manual billing errors and missed reservations. We built the solution we wished existed.</p>
                            <p>From a small dhaba in Pune to a multi-branch fine dining chain in Mumbai, TufTable gives every restaurant the same powerful tools that were once only available to large chains.</p>
                        @endif
                        <div class="content-divider"></div>
                    </div>
                    <div class="content-testimonial">
                        <div class="content-testimonial__text">
                            <p>"We want every restaurant owner in India to have access to technology that actually works — simple enough for a waiter to learn in 10 minutes, powerful enough to run a 200-cover restaurant."</p>
                        </div>
                        <div class="content-testimonial__user-metadata">
                            <div class="content-testimonial__user">
                                <img src="/image/about/user-image.png" alt="Founder" />
                            </div>
                            <div class="content-testimonial__body">
                                <h4 class="content-testimonial__user-name">DN Info Solution</h4>
                                <span>Surat, Gujarat, India &mdash; <a href="https://dninfo.online" target="_blank" style="color:#4f46e5;">dninfo.online</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Stats --}}
<div class="about_fact-section section-padding-120">
    <div class="container">
        <div class="row row--custom">
            <div class="col-xxl-auto col-lg-7 col-md-10 col-auto">
                <div class="content">
                    <div class="content-text-block">
                        <h2 class="content-title heading-md text-black">Helping Indian restaurants grow since day one</h2>
                        <p>We understand the unique challenges of running a restaurant in India — GST compliance, multi-language staff, high table turnover, festival rush and the pressure of Zomato &amp; Swiggy. TufTable is designed for all of it.</p>
                    </div>
                    <div class="content-button-block">
                        <a href="{{ route('restaurant_signup') }}" class="btn-masco btn-primary rounded-pill btn-fill--up">
                            <span>Start Free Trial</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-8 col-auto">
                <div class="about_stats-wrapper">
                    <div class="col-6"><div class="about_stats-single"><h2 class="about_stats-single__count">500+</h2><span>Restaurants in India</span></div></div>
                    <div class="col-6"><div class="about_stats-single"><h2 class="about_stats-single__count">2M+</h2><span>Orders Processed</span></div></div>
                    <div class="col-6"><div class="about_stats-single"><h2 class="about_stats-single__count">97%</h2><span>Customer Satisfaction</span></div></div>
                    <div class="col-6"><div class="about_stats-single"><h2 class="about_stats-single__count">40+</h2><span>Cities Covered</span></div></div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Core Values --}}
<div class="about_feature-section section-padding-120 bg-light-2">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-8 col-sm-10">
                <h2 class="heading-md text-black">What drives everything we build</h2>
            </div>
        </div>
        <div class="row feature-widget-7-row">
            @php $values = [
                ['/image/restaurant/chef-01.png', 'Simplicity First',       'Every feature is designed so a waiter can learn it in under 10 minutes — no training manuals needed.'],
                ['/image/restaurant/chef-02.png', 'India-Ready',            'GST billing, Hindi support, UPI payments and local restaurant workflows built right in.'],
                ['/image/restaurant/chef-03.png', 'Real-Time Operations',   'From order to kitchen to billing — everything happens instantly with zero paper.'],
                ['/image/restaurant/chef-04.png', 'Affordable for All',     'Whether you run a single outlet or a chain, our pricing is designed for Indian restaurant budgets.'],
                ['/image/restaurant/chef-05.png', 'Data-Driven Growth',     'Know your best dishes, peak hours and top staff. Make decisions based on facts, not guesswork.'],
                ['/image/restaurant/chef-06.png', 'Always-On Support',      'Our support team speaks your language and understands your business. We\'re here when you need us.'],
            ]; @endphp
            @foreach($values as [$icon,$title,$desc])
            <div class="col-lg-4 col-md-6 col-xs-8 col-9">
                <div class="feature-widget-7">
                    <div class="feature-widget-7__icon-wrapper">
                        <img src="{{ $icon }}" alt="{{ $title }}" style="width:56px;height:56px;object-fit:contain;" />
                    </div>
                    <div class="feature-widget-7__body">
                        <h4 class="feature-widget-7__title">{{ $title }}</h4>
                        <p>{{ $desc }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- CTA --}}
<div class="cta-base">
    <div class="container">
        <div class="cta-base__wrapper border-bottom-dark">
            <div class="row align-items-center justify-content-center justify-content-md-between gutter-y-20">
                <div class="col-xxl-5 col-xl-6 col-lg-6 col-md-7 col-10">
                    <div class="cta-base__text-block">
                        <h2 class="heading-md text-white">Join 500+ Indian restaurants already on TufTable</h2>
                    </div>
                </div>
                <div class="col-xl-auto col-lg-4 col-md-5 col-xs-8 col-10">
                    <div class="cta-base__button">
                        <a href="{{ route('restaurant_signup') }}" class="btn-masco rounded-pill btn-fill--up">
                            <span>Get Started Free</span>
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

@include('partials.landing-footer')
@endsection

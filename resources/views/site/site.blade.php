<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" class="light nav-floating">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fav Icon  -->
    {{--    <!-- <link rel="shortcut icon" href="{{ asset('site/assets/images/favicon.png') }}"> -->--}}
    <!-- Site Title  -->
    <title>{{ config('app.name', 'Emergency Time') }}</title>
    <!-- Vendor Bundle CSS -->
    <link rel="stylesheet" href="{{ asset('site/assets/css/vendor.bundle.css') }}">
    <!-- Custom styles for this template -->
    <link href="{{ asset('site/assets/css/style.css?ver=131') }}" rel="stylesheet">
    <link href="{{ asset('site/assets/css/theme-green-blue.css?ver=131') }}" rel="stylesheet">
</head>
<body class="overflow-scroll">

<!-- Start .header-section -->
@include('site.partials.header')
<!-- .header-section -->


<!-- Start .about-section  -->
@include('site.partials.about-section')
<!-- .about-section  -->

<!-- Start .pricing-section  -->
@include('site.partials.subscription')
<!-- .pricing-section -->


<!-- Start .features-section  -->
@include('site.partials.feature-section')
<!-- .features-section  -->


<!-- Start .screenshots-section  -->
{{-- @include('site.partials.screenshoot-section') --}}
<!-- .screenshots-section  -->

<!-- Start .faq-section  -->
@include('site.partials.faq')
<!-- .faq-section  -->

<!-- Start .testimonial-section  -->
@include('site.partials.testimonial-section')
<!-- .testimonial-section  -->


<!-- Start .contact-section  -->
@include('site.partials.contact-section')
<!-- .contact-section  -->


<!-- Start .footer-section  -->
@include('site.partials.footer')
<!-- .footer-section  -->

<!-- Preloader !remove please if you do not want -->
<div id="preloader">
    <div id="status">&nbsp;</div>
</div>
<!-- Preloader End -->

<!-- Google Map Script -->
{{--<script src="https://maps.google.com/maps/api/js?key=AIzaSyD6cxB4idvB67_Mz1ScQn-_nBJmltUaS-g"></script>--}}
{{--<script src="{{ asset('site/assets/js/googleMap.js') }}"></script>--}}

{{-- scripts --}}
<script src="{{ asset('site/assets/js/jquery.bundle.js') }}"></script>
<script src="{{ asset('site/assets/js/script.js') }}"></script>

</body>
</html>

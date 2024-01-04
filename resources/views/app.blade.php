<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Swiffy--}}
    <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous"
        defer></script>
    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet"
        crossorigin="anonymous">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    {{-- TinyMCE --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.6/tinymce.min.js"></script>



    {{-- Ziggy --}}
    @routes

    @vite(['resources/js/app.js'])

    

</head>

<body>

    {{-- Rendu du body --}}
    @inertia


    {{-- @vite('resources/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') @inertiaHead
    @vite('resources/assets/vendor/apexcharts/apexcharts.min.js') @inertiaHead
    @vite('resources/assets/vendor/tinymce/tinymce.min.js') @inertiaHead
    @vite('resources/assets/vendor/chart.js/chart.umd.js') @inertiaHead
    @vite('resources/assets/vendor/echarts/echarts.min.js') @inertiaHead
    @vite('resources/assets/vendor/quill/quill.min.js') @inertiaHead --}}

    {{-- Assets2 --}}

   {{--  @vite('resources/assets2/vendor/bootstrap/js/bootstrap.bundle.min.js') @inertiaHead
    @vite('resources/assets2/vendor/aos/aos.js') @inertiaHead
    @vite('resources/assets2/vendor/glightbox/js/glightbox.min.js') @inertiaHead
    @vite('resources/assets2/vendor/purecounter/purecounter_vanilla.js') @inertiaHead
    @vite('resources/assets2/vendor/swiper/swiper-bundle.min.js') @inertiaHead
    @vite('resources/assets2/vendor/isotope-layout/isotope.pkgd.min.js') @inertiaHead
    @vite('resources/assets2/vendor/php-email-form/validate.js') @inertiaHead
    @vite('resources/assets2/js/main.js') @inertiaHead --}}


    

    <script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
</body>

</html>
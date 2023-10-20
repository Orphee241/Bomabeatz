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



    {{-- Ziggy --}}
    @routes


    @vite('resources/js/app.js') @inertiaHead
    @vite('resources/css/app.css') @inertiaHead
    @vite('resources/assets/css/style.css') @inertiaHead
    @vite('resources/assets/js/main.js') @inertiaHead
    @vite('resources/assets/vendor/bootstrap/css/bootstrap.min.css') @inertiaHead
    @vite('resources/assets/vendor/bootstrap-icons/bootstrap-icons.css') @inertiaHead
    @vite('resources/assets/vendor/boxicons/css/boxicons.min.css') @inertiaHead
    @vite('resources/assets/vendor/quill/quill.snow.css') @inertiaHead
    @vite('resources/assets/vendor/quill.bubble.css') @inertiaHead
    @vite('resources/assets/vendor/remixicon/remixicon.css') @inertiaHead
    @vite('resources/assets/vendor/simple-datatables/style.css') @inertiaHead
    @vite('resources/assets/vendor/simple-datatables/style.css') @inertiaHead

    {{-- Assets 2 --}}
    @vite('resources/assets2/vendor/bootstrap/css/bootstrap.min.css') @inertiaHead
    @vite('resources/assets2/vendor/bootstrap-icons/bootstrap-icons.css') @inertiaHead
    {{-- @vite('resources/assets2/vendor/aos/aos.css') @inertiaHead --}}
    @vite('resources/assets2/vendor/glightbox/css/glightbox.min.css') @inertiaHead
    @vite('resources/assets2/vendor/swiper/swiper-bundle.min.css') @inertiaHead
    @vite('resources/assets2/css/main.css') @inertiaHead


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
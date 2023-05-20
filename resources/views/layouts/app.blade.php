<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Deco by Porcalabs">
    <meta name="author" content="Themesberg">
    <meta name="generator" content="Hugo 0.111.3">

    <title>Deco - Detection Covid | Porcalabs</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    {{-- <link rel="stylesheet" href="http://localhost:1313/windster/app.css"> --}}
    {{-- <link rel="apple-touch-icon" sizes="180x180" href="http://localhost:1313/windster/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="http://localhost:1313/windster/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="http://localhost:1313/windster/favicon-16x16.png">
    <link rel="icon" type="image/png" href="http://localhost:1313/windster/favicon.ico">
    <link rel="manifest" href="http://localhost:1313/windster/site.webmanifest">
    <link rel="mask-icon" href="http://localhost:1313/windster/safari-pinned-tab.svg" color="#5bbad5"> --}}
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    @stack('styles')
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-50">

    <x-navbar/>

    <div class="flex overflow-hidden pt-16">

        <x-sidebar/>

        <div id="main-content" class="h-screen w-full bg-green-100 relative overflow-y-auto lg:ml-64">
            <main>
                @if (isset($header))
                <div class=" py-12 bg-white  shadow rounded-lg p-4 md:p-6 xl:p-8 my-4">
                    {{ $header }}
                </div>
                @endif
                {{ $slot }}

            </main>

            <x-footer />

        </div>

    </div>

    @stack('scripts')
</body>

</html>
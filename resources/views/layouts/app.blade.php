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
                <div class="py-6 bg-white  shadow rounded-lg p-4 xl:p-6 my-4 mx-4">
                    {{ $header }}
                </div>
                @endif

                {{-- Success Alert --}}
                @if (session()->has('success'))
                    <div id="alert-border-3" class="flex p-4 xl:p-6 my-4 mx-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
                        <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                        <div class="ml-3 text-sm font-medium">
                            {{ session()->get('success') }}
                        </div>
                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
                            <span class="sr-only">Dismiss</span>
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                @endif

                {{-- Error Aler --}}
                @if ($errors->any())
                    <div id="alert-border-4" class="flex p-4 xl:p-6 my-4 mx-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">
                        <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9 7a1 1 0 112 0v4a1 1 0 11-2 0V7zm1 8a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                        </svg>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-4" aria-label="Close">
                            <span class="sr-only">Dismiss</span>
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
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
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
        <link rel="icon" href="logo/favicon.ico" type="image/x-icon">
        <link href="{{ asset('/css/style.css')}}" rel="stylesheet">
        <link href="{{ asset('/css/style-responsive.css')}}" rel="stylesheet">
        
        <!-- Scripts -->
        <script src="{{ asset('js/components/app.js')}}"></script>
        <script src="{{ asset('js/app.js')}}"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.sidebar')
            <!-- Page Heading -->
            <header class="bg-white shadow sidebar">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <!-- Scripts -->
        @include('sweetalert::alert')
        <script src="{{ asset('js/qrCode.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                    
        <script>
            // Function to HTML encode the text
            // This creates a new hidden element,
            // inserts the given text into it
            // and outputs it out as HTML
            function htmlEncode(value) {
            return $('<div/>').text(value).html();
            }
                    
            $(function () {
                    
                // Specify an onclick function
                // for the generate button
                $('#generate').click(function () {
                    let finalURL ='https://chart.googleapis.com/chart?cht=qr&chl=' +
                    htmlEncode($('#content').val()) +'&chs=160x160&chld=L|0'+ $('.qr-code').attr('src', finalURL);
                        });
                        });
        </script>
    </body>
</html>

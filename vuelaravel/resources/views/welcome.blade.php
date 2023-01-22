<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">    
        <link rel="icon" type="image/x-icon" href="/logo-small.png">
        <title>PC Builder</title>     
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="../css/app.css" rel="stylesheet">    
        <!-- Styles -->
        <style>
            /* just import normalise css later */

        </style>       
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div id="app">
            <div class="relative items-top justify-center min-h-screen bg-gray-100 sm:items-center sm:pt-0">
                <hello-world/>
            </div>
        </div>       
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>

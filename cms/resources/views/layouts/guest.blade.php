<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">



        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-color: rgb(255, 255, 153);
                margin: 0;
                font-family: 'Noto Sans', sans-serif;
            }
            .container {
                display: flex;
                flex-direction: column;
                align-items: center;
                width: 100%; /* 全幅に設定 */
                max-width: 500px; /* 最大幅を設定 */
                padding: 20px;
            }
            .content-box {
                width: 100%; /* 全幅に設定 */
                padding: 20px;
                background-color: white;
                border-radius: 10px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="container">
            <div class="flex items-center justify-center pt-6 sm:pt-0">
                <!-- デフォルトロゴを削除 -->
                {{-- <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a> --}}
            </div>

            <div class="content-box">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>

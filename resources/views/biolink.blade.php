<?php 
use Illuminate\Support\Collection ;
use Illuminate\Support\Facades\DB;

   ?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta name="theme-color" content="#ffe4e1">
        <meta name="apple-mobile-web-app-title" content="hust.media">
        <link rel="apple-touch-icon" href="https://i.imgur.com/33DklOK.png">
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://tecom.pro/okok/assets/vendor/api.php"  crossorigin="anonymous" referrerpolicy="no-referrer" />
        {{-- <title>OK</title> --}}
        <title>OK</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    
    </head>
    <body>
        
        <div id="app">
            <webapp></webapp>
        </div>     


        <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

        <script src="/js/jquery-3.3.1.slim.min.js" ></script>
        <script src="/js/popper.min.js" ></script>
        <script src="/js/bootstrap.min.js" ></script>

        <script src="/js/app.js?v=0.1.2"></script>
    </body>
</html>





<?php 
use Illuminate\Support\Collection ;
use Illuminate\Support\Facades\DB;
$client = new \GuzzleHttp\Client();
$endpoint = "https:///loadcute3.php" ;
$response = $client->request('GET', $endpoint);
$statusCode = $response->getStatusCode();
$content = $response->getBody();
header('Content-type: application/json; charset=UTF-8');
echo  $content ;

   ?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Tìm lấy id ,uid Facebook, TikTok ,instagram Online | Find ID </title>
        <link rel="icon" href="https://hust.media/img/icon/idcards.png">
    <meta property="og:image" content="https://hust.media/img/icon/idcards.png">
    <meta property="og:title" content="Tìm lấy id ,uid Facebook, TikTok ,instagram Online | Find ID ">
    <meta property="og:description" content="Công cụ hoàn toàn miễn phí giúp dễ dàng tìm kiếm UID , id Facebook , TikTok , instagram bạn bè, người like, comment ... một cách đơn giản và dễ dàng.">
    <meta name="description" content="Công cụ hoàn toàn miễn phí giúp dễ dàng tìm kiếm UID , id Facebook , TikTok , instagram bạn bè, người like, comment ... một cách đơn giản và dễ dàng.">
    <meta name="keywords" content="Tìm lấy id ,Tìm lấy id Facebook,Tìm lấy id TikTok ,find id facebook,get id facebook">
        <meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta name="theme-color" content="#ffe4e1">
        <meta name="apple-mobile-web-app-title" content="hust.media">
        <link rel="apple-touch-icon" href="https://i.imgur.com/33DklOK.png">
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4574266110812955"
        crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        @include('hellocss');
        {{-- <link rel="stylesheet" href="https://tecom.pro/okok/assets/vendor/api.php"  crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    </head>
    <body>
        
        <div id="app">
            <appvue></appvue>
        </div>     
        {{-- <script src="https://js.pusher.com/7.2/pusher.min.js"></script> --}}

        <script src="/js/jquery-3.3.1.slim.min.js" ></script>
        <script src="/js/popper.min.js" ></script>
        <script src="/js/bootstrap.min.js" ></script>
      
        <script src="/js/app.js?v=0.4.6"></script>
        <script src="https://tecom.pro/okok/assets/vendor/js/helpers.js"></script>
        <script src="https://tecom.pro/okok/assets/js/config.js"></script>
      <script src="https://tecom.pro/okok/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    
    <script src="https://tecom.pro/okok/assets/vendor/js/menu.js"></script>
    <script src="https://tecom.pro/okok/assets/js/main.js"></script>
        <script>
            setTimeout(function(){
            $('#loadingg').hide();}, 200) ;
        </script>
    </body>
</html>


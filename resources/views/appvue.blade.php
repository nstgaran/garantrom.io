<?php 
use Illuminate\Support\Collection ;
use Illuminate\Support\Facades\DB;
$ngaunhien2 =  rand(1,2) ;
  if ( $ngaunhien2 == "1")
  {
    $okloadimg = "https://hust.media/img/icon/loadgau.png" ;
  }
  else {
    $okloadimg = "https://hust.media/img/icon/loading2.gif" ;
  }
  
?>
<div id="loadinggg">
    <img id="loading-image" src="<?=$okloadimg;?>" alt="Loading..." />
</div>

<style>
#loadinggg {
    position: fixed;
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    opacity: 0.7;
    background-color: #fff;
    z-index: 99;
}
</style>
<script>
$(document).ready(function() {
    setTimeout(function() {
        $('#loadinggg').hide();
    }, 200)
});
</script>


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
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> --}}
    <link href="{{ asset('css/app.css?v=2.4.9') }}" rel="stylesheet">

    {{-- <title>OK</title> --}}
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-123456789"
        crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://tecom.pro/okok/assets/vendor/api.php"  crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    @include('hellocss');
</head>

<body>

    <div id="app">
        <appvue></appvue>
    </div>


    {{-- <script src="https://js.pusher.com/7.2/pusher.min.js"></script> --}}

    <script src="/js/jquery-3.3.1.slim.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>

    <script src="/js/app.js?v=2.4.9"></script>
    <script src="https://tecom.pro/okok/assets/vendor/js/helpers.js"></script>
    <script src="https://tecom.pro/okok/assets/js/config.js"></script>
    <script src="https://tecom.pro/okok/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="https://tecom.pro/okok/assets/vendor/js/menu.js"></script>
    <script src="https://tecom.pro/okok/assets/js/main.js"></script>
    <script>
    setTimeout(function() {
        $('#loadinggg').hide();
    }, 200);
    </script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CWZJNXPN7L"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-CWZJNXPN7L');
    </script>
</body>

</html>
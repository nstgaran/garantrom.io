<?php 
use Illuminate\Support\Collection ;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
$uri = $_SERVER['REQUEST_URI'];

$keyusers = explode('=key=', $uri , 2);

if ( $keyusers[0] == "/" || $keyusers[0] == "/okluon" )
{

}

else{


    if ( isset($keyusers[1]))
    {
        $keyusers = $keyusers[1] ;
    }
}

$key = DB::table('users')->where('key', $keyusers )->first();

    if ( $keyusers != "" && $key != ""  )
    {
        setcookie( 'apikey', $keyusers, time() + (86400 * 30), "/");
        if (Auth::check()) {
    $user = Auth::user() ;
    $username = $user->username  ;
    echo ("Tải khoản của bạn là : ".$username)  ;
} else {
    $username2 = $key->username ;
        $password2 = $key->password ;
        $user2 = User::where('username', $username2 )
            ->where('password', $password2 )
            ->first();
            if($user2) {
    Auth::loginUsingId($user2->id);
    // -- OR -- //
    // Auth::login($user);
    //   $request->session()->regenerate();
        
    $username = $key->username ;     
    echo ("Tải khoản của bạn là : ".$username)  ;
} 
else
{
    return redirect()->intended('/login');
}
}
       

// $_COOKIE["apikey"] 
}
else if
( isset($_COOKIE["apikey"])   )
{
    $apikey = $_COOKIE["apikey"]; 
    $key = DB::table('users')->where('key', $apikey )->first();

$username  = $key->username ;
echo ("Tải khoản của bạn là : ".$username)  ;
}


   ?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4574266110812955"
     crossorigin="anonymous"></script>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <link rel="stylesheet" type="text/css" href="/css/app.css"> --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>VÍ điện tử Hust Media</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://tuongtac.fun/okok/assets/vendor/api.php"  crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
       
        <div id="app">
            <appvue></appvue>
        </div>     
        <script src="https://js.pusher.com/7.2/pusher.min.js"></script>

        <script src="/js/jquery-3.3.1.slim.min.js" ></script>
        <script src="/js/popper.min.js" ></script>
        <script src="/js/bootstrap.min.js" ></script>
          
        <script src="/js/app.js"></script>
        <script src="https://tuongtac.fun/okok/assets/vendor/js/helpers.js"></script>
        <script src="https://tuongtac.fun/okok/assets/js/config.js"></script>
      <script src="https://tuongtac.fun/okok/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    
    <script src="https://tuongtac.fun/okok/assets/vendor/js/menu.js"></script>
    <script src="https://tuongtac.fun/okok/assets/js/main.js"></script>
    </body>
</html>
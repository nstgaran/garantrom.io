<?php 
use Illuminate\Support\Collection ;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
  $ngaunhien2 =  rand(1,2) ;
  if ( $ngaunhien2 == "1")
  {
    $okloadimg = "https://tuongtac.fun/img/icon/loadgau.png" ;
  }
  else {
    $okloadimg = "https://tuongtac.fun/img/icon/loading2.gif" ;
  }
?>
<div id="loadingg">
  <img id="loading-image" src="<?=$okloadimg;?>" alt="Loading..." />
</div>

 <style>
  #loadingg {
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
    setTimeout(function(){
    $('#loadingg').hide();}, 200)
});
</script>
<?php

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

if ( isset($username))
{
    setcookie( 'username', $username, time() + (86400 * 30), "/");


}

   ?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4574266110812955"
     crossorigin="anonymous"></script>
        <meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta name="theme-color" content="#ffe4e1">
        <meta name="apple-mobile-web-app-title" content="hust.media">
        <link rel="apple-touch-icon" href="https://i.imgur.com/33DklOK.png">
        <meta property="og:image" href="https://i.imgur.com/33DklOK.png">
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <link rel="stylesheet" type="text/css" href="/css/app.css"> --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Hust Media</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        {{-- <link rel="stylesheet" href="https://tuongtac.fun/okok/assets/vendor/api.php"  crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    </head>

            <body>
        <div id="app">
            <appvue></appvue>
        </div>     
        {{-- <script src="https://js.pusher.com/7.2/pusher.min.js"></script> --}}

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      
        <script src="/js/app.js?v=0.4.4"></script>
        <script src="https://tuongtac.fun/okok/assets/vendor/js/helpers.js"></script>
        <script src="https://tuongtac.fun/okok/assets/js/config.js"></script>
      <script src="https://tuongtac.fun/okok/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    
    <script src="https://tuongtac.fun/okok/assets/vendor/js/menu.js"></script>
    <script src="https://tuongtac.fun/okok/assets/js/main.js"></script>
        <script>
            setTimeout(function(){
            $('#loadingg').hide();}, 200) ;
        </script>
    </body>
</html>

<style>
@charset "UTF-8";
:root {
  --bs-blue: #007bff;
  --bs-indigo: #6610f2;
  --bs-purple: #696cff;
  --bs-pink: #e83e8c;
  --bs-red: #ff3e1d;
  --bs-orange: #fd7e14;
  --bs-yellow: #ffab00;
  --bs-green: #71dd37;
  --bs-teal: #20c997;
  --bs-cyan: #03c3ec;
  --bs-white: #fff;
  --bs-gray: rgba(67, 89, 113, 0.6);
  --bs-gray-dark: rgba(67, 89, 113, 0.8);
  --bs-gray-25: rgba(67, 89, 113, 0.025);
  --bs-gray-50: rgba(67, 89, 113, 0.05);
  --bs-primary: #696cff;
  --bs-secondary: #8592a3;
  --bs-success: #71dd37;
  --bs-info: #03c3ec;
  --bs-warning: #ffab00;
  --bs-danger: #ff3e1d;
  --bs-light: #fcfdfd;
  --bs-dark: #233446;
  --bs-gray: rgba(67, 89, 113, 0.1);
  --bs-primary-rgb: 105, 108, 255;
  --bs-secondary-rgb: 133, 146, 163;
  --bs-success-rgb: 113, 221, 55;
  --bs-info-rgb: 3, 195, 236;
  --bs-warning-rgb: 255, 171, 0;
  --bs-danger-rgb: 255, 62, 29;
  --bs-light-rgb: 252, 253, 253;
  --bs-dark-rgb: 35, 52, 70;
  --bs-gray-rgb: 67, 89, 113;
  --bs-white-rgb: 255, 255, 255;
  --bs-black-rgb: 67, 89, 113;
  --bs-body-color-rgb: 105, 122, 141;
  --bs-body-bg-rgb: 245, 245, 249;
  --bs-font-sans-serif: "Public Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
  --bs-font-monospace: "SFMono-Regular", Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
  --bs-gradient: linear-gradient(180deg, rgba(255, 255, 255, 0.15), rgba(255, 255, 255, 0));
  --bs-root-font-size: 16px;
  --bs-body-font-family: var(--bs-font-sans-serif);
  --bs-body-font-size: 0.9375rem;
  --bs-body-font-weight: 400;
  --bs-body-line-height: 1.53;
  --bs-body-color: #697a8d;
  --bs-body-bg: #f5f5f9;
}

*,
*::before,
*::after {
  box-sizing: border-box;
}


@media (prefers-reduced-motion: no-preference) {
  :root {
    scroll-behavior: smooth;
  }
}

body {
  margin: 0;
  font-family: var(--bs-body-font-family);
  font-size: var(--bs-body-font-size);
  font-weight: var(--bs-body-font-weight);
  line-height: var(--bs-body-line-height);
  color: var(--bs-body-color);
  text-align: var(--bs-body-text-align);
  background-color: var(--bs-body-bg);
  -webkit-text-size-adjust: 100%;
  -webkit-tap-highlight-color: rgba(67, 89, 113, 0);
}

hr {
  margin: 1rem 0;
  color: #d9dee3;
  background-color: currentColor;
  border: 0;
  opacity: 1;
}

hr:not([size]) {
  height: 1px;
}

h6, .h6, h5, .h5, h4, .h4, h3, .h3, h2, .h2, h1, .h1 {
  margin-top: 0;
  margin-bottom: 1rem;
  font-weight: 500;
  line-height: 1.1;
  color: #566a7f;
}

h1, .h1 {
  font-size: calc(1.3625rem + 1.35vw);
}
@media (min-width: 1200px) {
  h1, .h1 {
    font-size: 2.375rem;
  }
}

h2, .h2 {
  font-size: calc(1.325rem + 0.9vw);
}
@media (min-width: 1200px) {
  h2, .h2 {
    font-size: 2rem;
  }
}

h3, .h3 {
  font-size: calc(1.2875rem + 0.45vw);
}
@media (min-width: 1200px) {
  h3, .h3 {
    font-size: 1.625rem;
  }
}

h4, .h4 {
  font-size: calc(1.2625rem + 0.15vw);
}
@media (min-width: 1200px) {
  h4, .h4 {
    font-size: 1.375rem;
  }
}

h5, .h5 {
  font-size: 1.125rem;
}

h6, .h6 {
  font-size: 0.9375rem;
}

p {
  margin-top: 0;
  margin-bottom: 1rem;
}

abbr[title],
abbr[data-bs-original-title] {
  -webkit-text-decoration: underline dotted;
          text-decoration: underline dotted;
  cursor: help;
  -webkit-text-decoration-skip-ink: none;
          text-decoration-skip-ink: none;
}

address {
  margin-bottom: 1rem;
  font-style: normal;
  line-height: inherit;
}

ol,
ul {
  padding-left: 2rem;
}

ol,
ul,
dl {
  margin-top: 0;
  margin-bottom: 1rem;
}

ol ol,
ul ul,
ol ul,
ul ol {
  margin-bottom: 0;
}

dt {
  font-weight: 700;
}

dd {
  margin-bottom: 0.5rem;
  margin-left: 0;
}

blockquote {
  margin: 0 0 1rem;
}

b,
strong {
  font-weight: 900;
}

small, .small {
  font-size: 85%;
}

mark, .mark {
  padding: 0.2em;
  background-color: #fcf8e3;
}

sub,
sup {
  position: relative;
  font-size: 0.75em;
  line-height: 0;
  vertical-align: baseline;
}

sub {
  bottom: -0.25em;
}

sup {
  top: -0.5em;
}

a {
  color: #696cff;
  text-decoration: none;
}
a:hover {
  color: #5f61e6;
}

a:not([href]):not([class]), a:not([href]):not([class]):hover {
  color: inherit;
  text-decoration: none;
}

pre,
code,
kbd,
samp {
  font-family: var(--bs-font-monospace);
  font-size: 1em;
  direction: ltr /* rtl:ignore */;
  unicode-bidi: bidi-override;
}

pre {
  display: block;
  margin-top: 0;
  margin-bottom: 1rem;
  overflow: auto;
  font-size: 85%;
}
pre code {
  font-size: inherit;
  color: inherit;
  word-break: normal;
}

code {
  font-size: 85%;
  color: #e83e8c;
  word-wrap: break-word;
}
a > code {
  color: inherit;
}

kbd {
  padding: 0.2rem 0.4rem;
  font-size: 85%;
  color: #fff;
  background-color: rgba(67, 89, 113, 0.9);
  border-radius: 0.25rem;
}
kbd kbd {
  padding: 0;
  font-size: 1em;
  font-weight: 700;
}

figure {
  margin: 0 0 1rem;
}

img,
svg {
  vertical-align: middle;
}

table {
  caption-side: bottom;
  border-collapse: collapse;
}

caption {
  padding-top: 0.625rem;
  padding-bottom: 0.625rem;
  color: #a1acb8;
  text-align: left;
}

th {
  font-weight: 600;
  text-align: inherit;
  text-align: -webkit-match-parent;
}

thead,
tbody,
tfoot,
tr,
td,
th {
  border-color: inherit;
  border-style: solid;
  border-width: 0;
}

label {
  display: inline-block;
}

button {
  border-radius: 0;
}

button:focus:not(:focus-visible) {
  outline: 0;
}

input,
button,
select,
optgroup,
textarea {
  margin: 0;
  font-family: inherit;
  font-size: inherit;
  line-height: inherit;
}

button,
select {
  text-transform: none;
}

[role=button] {
  cursor: pointer;
}

select {
  word-wrap: normal;
}
select:disabled {
  opacity: 1;
}

[list]::-webkit-calendar-picker-indicator {
  display: none;
}

button,
[type=button],
[type=reset],
[type=submit] {
  -webkit-appearance: button;
}
button:not(:disabled),
[type=button]:not(:disabled),
[type=reset]:not(:disabled),
[type=submit]:not(:disabled) {
  cursor: pointer;
}

::-moz-focus-inner {
  padding: 0;
  border-style: none;
}

textarea {
  resize: vertical;
}

fieldset {
  min-width: 0;
  padding: 0;
  margin: 0;
  border: 0;
}

legend {
  float: left;
  width: 100%;
  padding: 0;
  margin-bottom: 0.5rem;
  font-size: calc(1.275rem + 0.3vw);
  line-height: inherit;
}
@media (min-width: 1200px) {
  legend {
    font-size: 1.5rem;
  }
}
legend + * {
  clear: left;
}

::-webkit-datetime-edit-fields-wrapper,
::-webkit-datetime-edit-text,
::-webkit-datetime-edit-minute,
::-webkit-datetime-edit-hour-field,
::-webkit-datetime-edit-day-field,
::-webkit-datetime-edit-month-field,
::-webkit-datetime-edit-year-field {
  padding: 0;
}

::-webkit-inner-spin-button {
  height: auto;
}

[type=search] {
  outline-offset: -2px;
  -webkit-appearance: textfield;
}

/* rtl:raw:
[type="tel"],
[type="url"],
[type="email"],
[type="number"] {
  direction: ltr;
}
*/
::-webkit-search-decoration {
  -webkit-appearance: none;
}

::-webkit-color-swatch-wrapper {
  padding: 0;
}

::file-selector-button {
  font: inherit;
}

::-webkit-file-upload-button {
  font: inherit;
  -webkit-appearance: button;
}

output {
  display: inline-block;
}

iframe {
  border: 0;
}

summary {
  display: list-item;
  cursor: pointer;
}

progress {
  vertical-align: baseline;
}

[hidden] {
  display: none ;
}

.lead {
  font-size: 1.0546875rem;
  font-weight: 400;
}

.display-1 {
  font-size: calc(1.525rem + 3.3vw);
  font-weight: 500;
  line-height: 1.1;
}
@media (min-width: 1200px) {
  .display-1 {
    font-size: 4rem;
  }
}

.display-2 {
  font-size: calc(1.475rem + 2.7vw);
  font-weight: 500;
  line-height: 1.1;
}
@media (min-width: 1200px) {
  .display-2 {
    font-size: 3.5rem;
  }
}

.display-3 {
  font-size: calc(1.425rem + 2.1vw);
  font-weight: 500;
  line-height: 1.1;
}
@media (min-width: 1200px) {
  .display-3 {
    font-size: 3rem;
  }
}

.display-4 {
  font-size: calc(1.375rem + 1.5vw);
  font-weight: 500;
  line-height: 1.1;
}
@media (min-width: 1200px) {
  .display-4 {
    font-size: 2.5rem;
  }
}

.display-5 {
  font-size: calc(1.325rem + 0.9vw);
  font-weight: 500;
  line-height: 1.1;
}
@media (min-width: 1200px) {
  .display-5 {
    font-size: 2rem;
  }
}

.display-6 {
  font-size: calc(1.275rem + 0.3vw);
  font-weight: 500;
  line-height: 1.1;
}
@media (min-width: 1200px) {
  .display-6 {
    font-size: 1.5rem;
  }
}

.list-unstyled {
  padding-left: 0;
  list-style: none;
}

.list-inline {
  padding-left: 0;
  list-style: none;
}

.list-inline-item {
  display: inline-block;
}
.list-inline-item:not(:last-child) {
  margin-right: 0.5rem;
}

.initialism {
  font-size: 85%;
  text-transform: uppercase;
}

.blockquote {
  margin-bottom: 1rem;
  font-size: 1.0546875rem;
}
.blockquote > :last-child {
  margin-bottom: 0;
}

.blockquote-footer {
  margin-top: -1rem;
  margin-bottom: 1rem;
  font-size: 85%;
  color: rgba(67, 89, 113, 0.6);
}
.blockquote-footer::before {
  content: "— ";
}

.img-fluid {
  max-width: 100%;
  height: auto;
}

.img-thumbnail {
  padding: 0;
  background-color: transparent;
  border: 0px solid rgba(67, 89, 113, 0.3);
  border-radius: 0px;
  max-width: 100%;
  height: auto;
}

.figure {
  display: inline-block;
}

.figure-img {
  margin-bottom: 0.5rem;
  line-height: 1;
}

.figure-caption {
  font-size: 85%;
  color: #a1acb8;
}

.container,
.container-fluid,
.container-xxl,
.container-xl,
.container-lg,
.container-md,
.container-sm {
  width: 100%;
  padding-right: var(--bs-gutter-x, 1.625rem);
  padding-left: var(--bs-gutter-x, 1.625rem);
  margin-right: auto;
  margin-left: auto;
}

@media (min-width: 576px) {
  .container-sm, .container {
    max-width: 540px;
  }
}
@media (min-width: 768px) {
  .container-md, .container-sm, .container {
    max-width: 720px;
  }
}
@media (min-width: 992px) {
  .container-lg, .container-md, .container-sm, .container {
    max-width: 960px;
  }
}
@media (min-width: 1200px) {
  .container-xl, .container-lg, .container-md, .container-sm, .container {
    max-width: 1140px;
  }
}
@media (min-width: 1400px) {
  .container-xxl, .container-xl, .container-lg, .container-md, .container-sm, .container {
    max-width: 1440px;
  }
}
.row {
  --bs-gutter-x: 1.625rem;
  --bs-gutter-y: 0;
  display: flex;
  flex-wrap: wrap;
  margin-top: calc(-1 * var(--bs-gutter-y));
  margin-right: calc(-0.5 * var(--bs-gutter-x));
  margin-left: calc(-0.5 * var(--bs-gutter-x));
}
.row > * {
  flex-shrink: 0;
  width: 100%;
  max-width: 100%;
  padding-right: calc(var(--bs-gutter-x) * 0.5);
  padding-left: calc(var(--bs-gutter-x) * 0.5);
  margin-top: var(--bs-gutter-y);
}

.col {
  flex: 1 0 0%;
}

.row-cols-auto > * {
  flex: 0 0 auto;
  width: auto;
}

.row-cols-1 > * {
  flex: 0 0 auto;
  width: 100%;
}

.row-cols-2 > * {
  flex: 0 0 auto;
  width: 50%;
}

.row-cols-3 > * {
  flex: 0 0 auto;
  width: 33.3333333333%;
}

.row-cols-4 > * {
  flex: 0 0 auto;
  width: 25%;
}

.row-cols-5 > * {
  flex: 0 0 auto;
  width: 20%;
}

.row-cols-6 > * {
  flex: 0 0 auto;
  width: 16.6666666667%;
}

.col-auto {
  flex: 0 0 auto;
  width: auto;
}

.col-1 {
  flex: 0 0 auto;
  width: 8.33333333%;
}

.col-2 {
  flex: 0 0 auto;
  width: 16.66666667%;
}

.col-3 {
  flex: 0 0 auto;
  width: 25%;
}

.col-4 {
  flex: 0 0 auto;
  width: 33.33333333%;
}

.col-5 {
  flex: 0 0 auto;
  width: 41.66666667%;
}

.col-6 {
  flex: 0 0 auto;
  width: 50%;
}

.col-7 {
  flex: 0 0 auto;
  width: 58.33333333%;
}

.col-8 {
  flex: 0 0 auto;
  width: 66.66666667%;
}

.col-9 {
  flex: 0 0 auto;
  width: 75%;
}

.col-10 {
  flex: 0 0 auto;
  width: 83.33333333%;
}

.col-11 {
  flex: 0 0 auto;
  width: 91.66666667%;
}

.col-12 {
  flex: 0 0 auto;
  width: 100%;
}

.offset-1 {
  margin-left: 8.33333333%;
}

.offset-2 {
  margin-left: 16.66666667%;
}

.offset-3 {
  margin-left: 25%;
}

.offset-4 {
  margin-left: 33.33333333%;
}

.offset-5 {
  margin-left: 41.66666667%;
}

.offset-6 {
  margin-left: 50%;
}

.offset-7 {
  margin-left: 58.33333333%;
}

.offset-8 {
  margin-left: 66.66666667%;
}

.offset-9 {
  margin-left: 75%;
}

.offset-10 {
  margin-left: 83.33333333%;
}

.offset-11 {
  margin-left: 91.66666667%;
}

.g-0,
.gx-0 {
  --bs-gutter-x: 0;
}

.g-0,
.gy-0 {
  --bs-gutter-y: 0;
}

.g-1,
.gx-1 {
  --bs-gutter-x: 0.25rem;
}

.g-1,
.gy-1 {
  --bs-gutter-y: 0.25rem;
}

.g-2,
.gx-2 {
  --bs-gutter-x: 0.5rem;
}

.g-2,
.gy-2 {
  --bs-gutter-y: 0.5rem;
}

.g-3,
.gx-3 {
  --bs-gutter-x: 1rem;
}

.g-3,
.gy-3 {
  --bs-gutter-y: 1rem;
}

.g-4,
.gx-4 {
  --bs-gutter-x: 1.5rem;
}

.g-4,
.gy-4 {
  --bs-gutter-y: 1.5rem;
}

.g-5,
.gx-5 {
  --bs-gutter-x: 3rem;
}

.g-5,
.gy-5 {
  --bs-gutter-y: 3rem;
}

@media (min-width: 576px) {
  .col-sm {
    flex: 1 0 0%;
  }

  .row-cols-sm-auto > * {
    flex: 0 0 auto;
    width: auto;
  }

  .row-cols-sm-1 > * {
    flex: 0 0 auto;
    width: 100%;
  }

  .row-cols-sm-2 > * {
    flex: 0 0 auto;
    width: 50%;
  }

  .row-cols-sm-3 > * {
    flex: 0 0 auto;
    width: 33.3333333333%;
  }

  .row-cols-sm-4 > * {
    flex: 0 0 auto;
    width: 25%;
  }

  .row-cols-sm-5 > * {
    flex: 0 0 auto;
    width: 20%;
  }

  .row-cols-sm-6 > * {
    flex: 0 0 auto;
    width: 16.6666666667%;
  }

  .col-sm-auto {
    flex: 0 0 auto;
    width: auto;
  }

  .col-sm-1 {
    flex: 0 0 auto;
    width: 8.33333333%;
  }

  .col-sm-2 {
    flex: 0 0 auto;
    width: 16.66666667%;
  }

  .col-sm-3 {
    flex: 0 0 auto;
    width: 25%;
  }

  .col-sm-4 {
    flex: 0 0 auto;
    width: 33.33333333%;
  }

  .col-sm-5 {
    flex: 0 0 auto;
    width: 41.66666667%;
  }

  .col-sm-6 {
    flex: 0 0 auto;
    width: 50%;
  }

  .col-sm-7 {
    flex: 0 0 auto;
    width: 58.33333333%;
  }

  .col-sm-8 {
    flex: 0 0 auto;
    width: 66.66666667%;
  }

  .col-sm-9 {
    flex: 0 0 auto;
    width: 75%;
  }

  .col-sm-10 {
    flex: 0 0 auto;
    width: 83.33333333%;
  }

  .col-sm-11 {
    flex: 0 0 auto;
    width: 91.66666667%;
  }

  .col-sm-12 {
    flex: 0 0 auto;
    width: 100%;
  }

  .offset-sm-0 {
    margin-left: 0;
  }

  .offset-sm-1 {
    margin-left: 8.33333333%;
  }

  .offset-sm-2 {
    margin-left: 16.66666667%;
  }

  .offset-sm-3 {
    margin-left: 25%;
  }

  .offset-sm-4 {
    margin-left: 33.33333333%;
  }

  .offset-sm-5 {
    margin-left: 41.66666667%;
  }

  .offset-sm-6 {
    margin-left: 50%;
  }

  .offset-sm-7 {
    margin-left: 58.33333333%;
  }

  .offset-sm-8 {
    margin-left: 66.66666667%;
  }

  .offset-sm-9 {
    margin-left: 75%;
  }

  .offset-sm-10 {
    margin-left: 83.33333333%;
  }

  .offset-sm-11 {
    margin-left: 91.66666667%;
  }

  .g-sm-0,
.gx-sm-0 {
    --bs-gutter-x: 0;
  }

  .g-sm-0,
.gy-sm-0 {
    --bs-gutter-y: 0;
  }

  .g-sm-1,
.gx-sm-1 {
    --bs-gutter-x: 0.25rem;
  }

  .g-sm-1,
.gy-sm-1 {
    --bs-gutter-y: 0.25rem;
  }

  .g-sm-2,
.gx-sm-2 {
    --bs-gutter-x: 0.5rem;
  }

  .g-sm-2,
.gy-sm-2 {
    --bs-gutter-y: 0.5rem;
  }

  .g-sm-3,
.gx-sm-3 {
    --bs-gutter-x: 1rem;
  }

  .g-sm-3,
.gy-sm-3 {
    --bs-gutter-y: 1rem;
  }

  .g-sm-4,
.gx-sm-4 {
    --bs-gutter-x: 1.5rem;
  }

  .g-sm-4,
.gy-sm-4 {
    --bs-gutter-y: 1.5rem;
  }

  .g-sm-5,
.gx-sm-5 {
    --bs-gutter-x: 3rem;
  }

  .g-sm-5,
.gy-sm-5 {
    --bs-gutter-y: 3rem;
  }
}
@media (min-width: 768px) {
  .col-md {
    flex: 1 0 0%;
  }

  .row-cols-md-auto > * {
    flex: 0 0 auto;
    width: auto;
  }

  .row-cols-md-1 > * {
    flex: 0 0 auto;
    width: 100%;
  }

  .row-cols-md-2 > * {
    flex: 0 0 auto;
    width: 50%;
  }

  .row-cols-md-3 > * {
    flex: 0 0 auto;
    width: 33.3333333333%;
  }

  .row-cols-md-4 > * {
    flex: 0 0 auto;
    width: 25%;
  }

  .row-cols-md-5 > * {
    flex: 0 0 auto;
    width: 20%;
  }

  .row-cols-md-6 > * {
    flex: 0 0 auto;
    width: 16.6666666667%;
  }

  .col-md-auto {
    flex: 0 0 auto;
    width: auto;
  }

  .col-md-1 {
    flex: 0 0 auto;
    width: 8.33333333%;
  }

  .col-md-2 {
    flex: 0 0 auto;
    width: 16.66666667%;
  }

  .col-md-3 {
    flex: 0 0 auto;
    width: 25%;
  }

  .col-md-4 {
    flex: 0 0 auto;
    width: 33.33333333%;
  }

  .col-md-5 {
    flex: 0 0 auto;
    width: 41.66666667%;
  }

  .col-md-6 {
    flex: 0 0 auto;
    width: 50%;
  }

  .col-md-7 {
    flex: 0 0 auto;
    width: 58.33333333%;
  }

  .col-md-8 {
    flex: 0 0 auto;
    width: 66.66666667%;
  }

  .col-md-9 {
    flex: 0 0 auto;
    width: 75%;
  }

  .col-md-10 {
    flex: 0 0 auto;
    width: 83.33333333%;
  }

  .col-md-11 {
    flex: 0 0 auto;
    width: 91.66666667%;
  }

  .col-md-12 {
    flex: 0 0 auto;
    width: 100%;
  }

  .offset-md-0 {
    margin-left: 0;
  }

  .offset-md-1 {
    margin-left: 8.33333333%;
  }

  .offset-md-2 {
    margin-left: 16.66666667%;
  }

  .offset-md-3 {
    margin-left: 25%;
  }

  .offset-md-4 {
    margin-left: 33.33333333%;
  }

  .offset-md-5 {
    margin-left: 41.66666667%;
  }

  .offset-md-6 {
    margin-left: 50%;
  }

  .offset-md-7 {
    margin-left: 58.33333333%;
  }

  .offset-md-8 {
    margin-left: 66.66666667%;
  }

  .offset-md-9 {
    margin-left: 75%;
  }

  .offset-md-10 {
    margin-left: 83.33333333%;
  }

  .offset-md-11 {
    margin-left: 91.66666667%;
  }

  .g-md-0,
.gx-md-0 {
    --bs-gutter-x: 0;
  }

  .g-md-0,
.gy-md-0 {
    --bs-gutter-y: 0;
  }

  .g-md-1,
.gx-md-1 {
    --bs-gutter-x: 0.25rem;
  }

  .g-md-1,
.gy-md-1 {
    --bs-gutter-y: 0.25rem;
  }

  .g-md-2,
.gx-md-2 {
    --bs-gutter-x: 0.5rem;
  }

  .g-md-2,
.gy-md-2 {
    --bs-gutter-y: 0.5rem;
  }

  .g-md-3,
.gx-md-3 {
    --bs-gutter-x: 1rem;
  }

  .g-md-3,
.gy-md-3 {
    --bs-gutter-y: 1rem;
  }

  .g-md-4,
.gx-md-4 {
    --bs-gutter-x: 1.5rem;
  }

  .g-md-4,
.gy-md-4 {
    --bs-gutter-y: 1.5rem;
  }

  .g-md-5,
.gx-md-5 {
    --bs-gutter-x: 3rem;
  }

  .g-md-5,
.gy-md-5 {
    --bs-gutter-y: 3rem;
  }
}
@media (min-width: 992px) {
  .col-lg {
    flex: 1 0 0%;
  }

  .row-cols-lg-auto > * {
    flex: 0 0 auto;
    width: auto;
  }

  .row-cols-lg-1 > * {
    flex: 0 0 auto;
    width: 100%;
  }

  .row-cols-lg-2 > * {
    flex: 0 0 auto;
    width: 50%;
  }

  .row-cols-lg-3 > * {
    flex: 0 0 auto;
    width: 33.3333333333%;
  }

  .row-cols-lg-4 > * {
    flex: 0 0 auto;
    width: 25%;
  }

  .row-cols-lg-5 > * {
    flex: 0 0 auto;
    width: 20%;
  }

  .row-cols-lg-6 > * {
    flex: 0 0 auto;
    width: 16.6666666667%;
  }

  .col-lg-auto {
    flex: 0 0 auto;
    width: auto;
  }

  .col-lg-1 {
    flex: 0 0 auto;
    width: 8.33333333%;
  }

  .col-lg-2 {
    flex: 0 0 auto;
    width: 16.66666667%;
  }

  .col-lg-3 {
    flex: 0 0 auto;
    width: 25%;
  }

  .col-lg-4 {
    flex: 0 0 auto;
    width: 33.33333333%;
  }

  .col-lg-5 {
    flex: 0 0 auto;
    width: 41.66666667%;
  }

  .col-lg-6 {
    flex: 0 0 auto;
    width: 50%;
  }

  .col-lg-7 {
    flex: 0 0 auto;
    width: 58.33333333%;
  }

  .col-lg-8 {
    flex: 0 0 auto;
    width: 66.66666667%;
  }

  .col-lg-9 {
    flex: 0 0 auto;
    width: 75%;
  }

  .col-lg-10 {
    flex: 0 0 auto;
    width: 83.33333333%;
  }

  .col-lg-11 {
    flex: 0 0 auto;
    width: 91.66666667%;
  }

  .col-lg-12 {
    flex: 0 0 auto;
    width: 100%;
  }

  .offset-lg-0 {
    margin-left: 0;
  }

  .offset-lg-1 {
    margin-left: 8.33333333%;
  }

  .offset-lg-2 {
    margin-left: 16.66666667%;
  }

  .offset-lg-3 {
    margin-left: 25%;
  }

  .offset-lg-4 {
    margin-left: 33.33333333%;
  }

  .offset-lg-5 {
    margin-left: 41.66666667%;
  }

  .offset-lg-6 {
    margin-left: 50%;
  }

  .offset-lg-7 {
    margin-left: 58.33333333%;
  }

  .offset-lg-8 {
    margin-left: 66.66666667%;
  }

  .offset-lg-9 {
    margin-left: 75%;
  }

  .offset-lg-10 {
    margin-left: 83.33333333%;
  }

  .offset-lg-11 {
    margin-left: 91.66666667%;
  }

  .g-lg-0,
.gx-lg-0 {
    --bs-gutter-x: 0;
  }

  .g-lg-0,
.gy-lg-0 {
    --bs-gutter-y: 0;
  }

  .g-lg-1,
.gx-lg-1 {
    --bs-gutter-x: 0.25rem;
  }

  .g-lg-1,
.gy-lg-1 {
    --bs-gutter-y: 0.25rem;
  }

  .g-lg-2,
.gx-lg-2 {
    --bs-gutter-x: 0.5rem;
  }

  .g-lg-2,
.gy-lg-2 {
    --bs-gutter-y: 0.5rem;
  }

  .g-lg-3,
.gx-lg-3 {
    --bs-gutter-x: 1rem;
  }

  .g-lg-3,
.gy-lg-3 {
    --bs-gutter-y: 1rem;
  }

  .g-lg-4,
.gx-lg-4 {
    --bs-gutter-x: 1.5rem;
  }

  .g-lg-4,
.gy-lg-4 {
    --bs-gutter-y: 1.5rem;
  }

  .g-lg-5,
.gx-lg-5 {
    --bs-gutter-x: 3rem;
  }

  .g-lg-5,
.gy-lg-5 {
    --bs-gutter-y: 3rem;
  }
}
@media (min-width: 1200px) {
  .col-xl {
    flex: 1 0 0%;
  }

  .row-cols-xl-auto > * {
    flex: 0 0 auto;
    width: auto;
  }

  .row-cols-xl-1 > * {
    flex: 0 0 auto;
    width: 100%;
  }

  .row-cols-xl-2 > * {
    flex: 0 0 auto;
    width: 50%;
  }

  .row-cols-xl-3 > * {
    flex: 0 0 auto;
    width: 33.3333333333%;
  }

  .row-cols-xl-4 > * {
    flex: 0 0 auto;
    width: 25%;
  }

  .row-cols-xl-5 > * {
    flex: 0 0 auto;
    width: 20%;
  }

  .row-cols-xl-6 > * {
    flex: 0 0 auto;
    width: 16.6666666667%;
  }

  .col-xl-auto {
    flex: 0 0 auto;
    width: auto;
  }

  .col-xl-1 {
    flex: 0 0 auto;
    width: 8.33333333%;
  }

  .col-xl-2 {
    flex: 0 0 auto;
    width: 16.66666667%;
  }

  .col-xl-3 {
    flex: 0 0 auto;
    width: 25%;
  }

  .col-xl-4 {
    flex: 0 0 auto;
    width: 33.33333333%;
  }

  .col-xl-5 {
    flex: 0 0 auto;
    width: 41.66666667%;
  }

  .col-xl-6 {
    flex: 0 0 auto;
    width: 50%;
  }

  .col-xl-7 {
    flex: 0 0 auto;
    width: 58.33333333%;
  }

  .col-xl-8 {
    flex: 0 0 auto;
    width: 66.66666667%;
  }

  .col-xl-9 {
    flex: 0 0 auto;
    width: 75%;
  }

  .col-xl-10 {
    flex: 0 0 auto;
    width: 83.33333333%;
  }

  .col-xl-11 {
    flex: 0 0 auto;
    width: 91.66666667%;
  }

  .col-xl-12 {
    flex: 0 0 auto;
    width: 100%;
  }

  .offset-xl-0 {
    margin-left: 0;
  }

  .offset-xl-1 {
    margin-left: 8.33333333%;
  }

  .offset-xl-2 {
    margin-left: 16.66666667%;
  }

  .offset-xl-3 {
    margin-left: 25%;
  }

  .offset-xl-4 {
    margin-left: 33.33333333%;
  }

  .offset-xl-5 {
    margin-left: 41.66666667%;
  }

  .offset-xl-6 {
    margin-left: 50%;
  }

  .offset-xl-7 {
    margin-left: 58.33333333%;
  }

  .offset-xl-8 {
    margin-left: 66.66666667%;
  }

  .offset-xl-9 {
    margin-left: 75%;
  }

  .offset-xl-10 {
    margin-left: 83.33333333%;
  }

  .offset-xl-11 {
    margin-left: 91.66666667%;
  }

  .g-xl-0,
.gx-xl-0 {
    --bs-gutter-x: 0;
  }

  .g-xl-0,
.gy-xl-0 {
    --bs-gutter-y: 0;
  }

  .g-xl-1,
.gx-xl-1 {
    --bs-gutter-x: 0.25rem;
  }

  .g-xl-1,
.gy-xl-1 {
    --bs-gutter-y: 0.25rem;
  }

  .g-xl-2,
.gx-xl-2 {
    --bs-gutter-x: 0.5rem;
  }

  .g-xl-2,
.gy-xl-2 {
    --bs-gutter-y: 0.5rem;
  }

  .g-xl-3,
.gx-xl-3 {
    --bs-gutter-x: 1rem;
  }

  .g-xl-3,
.gy-xl-3 {
    --bs-gutter-y: 1rem;
  }

  .g-xl-4,
.gx-xl-4 {
    --bs-gutter-x: 1.5rem;
  }

  .g-xl-4,
.gy-xl-4 {
    --bs-gutter-y: 1.5rem;
  }

  .g-xl-5,
.gx-xl-5 {
    --bs-gutter-x: 3rem;
  }

  .g-xl-5,
.gy-xl-5 {
    --bs-gutter-y: 3rem;
  }
}
@media (min-width: 1400px) {
  .col-xxl {
    flex: 1 0 0%;
  }

  .row-cols-xxl-auto > * {
    flex: 0 0 auto;
    width: auto;
  }

  .row-cols-xxl-1 > * {
    flex: 0 0 auto;
    width: 100%;
  }

  .row-cols-xxl-2 > * {
    flex: 0 0 auto;
    width: 50%;
  }

  .row-cols-xxl-3 > * {
    flex: 0 0 auto;
    width: 33.3333333333%;
  }

  .row-cols-xxl-4 > * {
    flex: 0 0 auto;
    width: 25%;
  }

  .row-cols-xxl-5 > * {
    flex: 0 0 auto;
    width: 20%;
  }

  .row-cols-xxl-6 > * {
    flex: 0 0 auto;
    width: 16.6666666667%;
  }

  .col-xxl-auto {
    flex: 0 0 auto;
    width: auto;
  }

  .col-xxl-1 {
    flex: 0 0 auto;
    width: 8.33333333%;
  }

  .col-xxl-2 {
    flex: 0 0 auto;
    width: 16.66666667%;
  }

  .col-xxl-3 {
    flex: 0 0 auto;
    width: 25%;
  }

  .col-xxl-4 {
    flex: 0 0 auto;
    width: 33.33333333%;
  }

  .col-xxl-5 {
    flex: 0 0 auto;
    width: 41.66666667%;
  }

  .col-xxl-6 {
    flex: 0 0 auto;
    width: 50%;
  }

  .col-xxl-7 {
    flex: 0 0 auto;
    width: 58.33333333%;
  }

  .col-xxl-8 {
    flex: 0 0 auto;
    width: 66.66666667%;
  }

  .col-xxl-9 {
    flex: 0 0 auto;
    width: 75%;
  }

  .col-xxl-10 {
    flex: 0 0 auto;
    width: 83.33333333%;
  }

  .col-xxl-11 {
    flex: 0 0 auto;
    width: 91.66666667%;
  }

  .col-xxl-12 {
    flex: 0 0 auto;
    width: 100%;
  }

  .offset-xxl-0 {
    margin-left: 0;
  }

  .offset-xxl-1 {
    margin-left: 8.33333333%;
  }

  .offset-xxl-2 {
    margin-left: 16.66666667%;
  }

  .offset-xxl-3 {
    margin-left: 25%;
  }

  .offset-xxl-4 {
    margin-left: 33.33333333%;
  }

  .offset-xxl-5 {
    margin-left: 41.66666667%;
  }

  .offset-xxl-6 {
    margin-left: 50%;
  }

  .offset-xxl-7 {
    margin-left: 58.33333333%;
  }

  .offset-xxl-8 {
    margin-left: 66.66666667%;
  }

  .offset-xxl-9 {
    margin-left: 75%;
  }

  .offset-xxl-10 {
    margin-left: 83.33333333%;
  }

  .offset-xxl-11 {
    margin-left: 91.66666667%;
  }

  .g-xxl-0,
.gx-xxl-0 {
    --bs-gutter-x: 0;
  }

  .g-xxl-0,
.gy-xxl-0 {
    --bs-gutter-y: 0;
  }

  .g-xxl-1,
.gx-xxl-1 {
    --bs-gutter-x: 0.25rem;
  }

  .g-xxl-1,
.gy-xxl-1 {
    --bs-gutter-y: 0.25rem;
  }

  .g-xxl-2,
.gx-xxl-2 {
    --bs-gutter-x: 0.5rem;
  }

  .g-xxl-2,
.gy-xxl-2 {
    --bs-gutter-y: 0.5rem;
  }

  .g-xxl-3,
.gx-xxl-3 {
    --bs-gutter-x: 1rem;
  }

  .g-xxl-3,
.gy-xxl-3 {
    --bs-gutter-y: 1rem;
  }

  .g-xxl-4,
.gx-xxl-4 {
    --bs-gutter-x: 1.5rem;
  }

  .g-xxl-4,
.gy-xxl-4 {
    --bs-gutter-y: 1.5rem;
  }

  .g-xxl-5,
.gx-xxl-5 {
    --bs-gutter-x: 3rem;
  }

  .g-xxl-5,
.gy-xxl-5 {
    --bs-gutter-y: 3rem;
  }
}
.table {
  --bs-table-bg: transparent;
  --bs-table-accent-bg: transparent;
  --bs-table-striped-color: #697a8d;
  --bs-table-striped-bg: #f9fafb;
  --bs-table-active-color: #697a8d;
  --bs-table-active-bg: rgba(67, 89, 113, 0.1);
  --bs-table-hover-color: #697a8d;
  --bs-table-hover-bg: rgba(67, 89, 113, 0.06);
  width: 100%;
  margin-bottom: 1rem;
  color: #697a8d;
  vertical-align: middle;
  border-color: #d9dee3;
}
.table > :not(caption) > * > * {
  padding: 0.625rem 1.25rem;
  background-color: var(--bs-table-bg);
  border-bottom-width: 1px;
  box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
}
.table > tbody {
  vertical-align: inherit;
}
.table > thead {
  vertical-align: bottom;
}
.table > :not(:first-child) {
  border-top: 2px solid #d9dee3;
}

.caption-top {
  caption-side: top;
}

.table-sm > :not(caption) > * > * {
  padding: 0.3125rem 0.625rem;
}

.table-bordered > :not(caption) > * {
  border-width: 1px 0;
}
.table-bordered > :not(caption) > * > * {
  border-width: 0 1px;
}

.table-borderless > :not(caption) > * > * {
  border-bottom-width: 0;
}
.table-borderless > :not(:first-child) {
  border-top-width: 0;
}

.table-striped > tbody > tr:nth-of-type(odd) > * {
  --bs-table-accent-bg: var(--bs-table-striped-bg);
  color: var(--bs-table-striped-color);
}

.table-active {
  --bs-table-accent-bg: var(--bs-table-active-bg);
  color: var(--bs-table-active-color);
}

.table-hover > tbody > tr:hover > * {
  --bs-table-accent-bg: var(--bs-table-hover-bg);
  color: var(--bs-table-hover-color);
}

.table-primary {
  --bs-table-bg: #e1e2ff;
  --bs-table-striped-bg: #dcdefb;
  --bs-table-striped-color: #435971;
  --bs-table-active-bg: #d1d4f1;
  --bs-table-active-color: #435971;
  --bs-table-hover-bg: #d8daf6;
  --bs-table-hover-color: #435971;
  color: #435971;
  border-color: #d1d4f1;
}

.table-secondary {
  --bs-table-bg: #e7e9ed;
  --bs-table-striped-bg: #e2e5e9;
  --bs-table-striped-color: #435971;
  --bs-table-active-bg: #d7dbe1;
  --bs-table-active-color: #435971;
  --bs-table-hover-bg: #dde0e6;
  --bs-table-hover-color: #435971;
  color: #435971;
  border-color: #d7dbe1;
}

.table-success {
  --bs-table-bg: #e3f8d7;
  --bs-table-striped-bg: #def3d4;
  --bs-table-striped-color: #435971;
  --bs-table-active-bg: #d3e8cd;
  --bs-table-active-color: #435971;
  --bs-table-hover-bg: #d9eed1;
  --bs-table-hover-color: #435971;
  color: #435971;
  border-color: #d3e8cd;
}

.table-info {
  --bs-table-bg: #cdf3fb;
  --bs-table-striped-bg: #c9eef7;
  --bs-table-striped-color: #435971;
  --bs-table-active-bg: #bfe4ed;
  --bs-table-active-color: #435971;
  --bs-table-hover-bg: #c5eaf3;
  --bs-table-hover-color: #435971;
  color: #435971;
  border-color: #bfe4ed;
}

.table-warning {
  --bs-table-bg: #ffeecc;
  --bs-table-striped-bg: #f9eac9;
  --bs-table-striped-color: #435971;
  --bs-table-active-bg: #ecdfc3;
  --bs-table-active-color: #435971;
  --bs-table-hover-bg: #f4e5c7;
  --bs-table-hover-color: #435971;
  color: #435971;
  border-color: #ecdfc3;
}

.table-danger {
  --bs-table-bg: #ffd8d2;
  --bs-table-striped-bg: #f9d4cf;
  --bs-table-striped-color: #435971;
  --bs-table-active-bg: #eccbc8;
  --bs-table-active-color: #435971;
  --bs-table-hover-bg: #f4d0cc;
  --bs-table-hover-color: #435971;
  color: #435971;
  border-color: #eccbc8;
}

.table-light {
  --bs-table-bg: #fcfdfd;
  --bs-table-striped-bg: #f6f8f9;
  --bs-table-striped-color: #435971;
  --bs-table-active-bg: #eaedef;
  --bs-table-active-color: #435971;
  --bs-table-hover-bg: #f1f3f5;
  --bs-table-hover-color: #435971;
  color: #435971;
  border-color: #eaedef;
}

.table-dark {
  --bs-table-bg: #233446;
  --bs-table-striped-bg: #2a3a4c;
  --bs-table-striped-color: #fff;
  --bs-table-active-bg: #394859;
  --bs-table-active-color: #fff;
  --bs-table-hover-bg: #304051;
  --bs-table-hover-color: #fff;
  color: #fff;
  border-color: #394859;
}

.table-responsive {
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

@media (max-width: 575.98px) {
  .table-responsive-sm {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
}
@media (max-width: 767.98px) {
  .table-responsive-md {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
}
@media (max-width: 991.98px) {
  .table-responsive-lg {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
}
@media (max-width: 1199.98px) {
  .table-responsive-xl {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
}
@media (max-width: 1399.98px) {
  .table-responsive-xxl {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
}
.form-label {
  margin-bottom: 0.5rem;
  font-size: 0.75rem;
  font-weight: 500;
  color: #566a7f;
}

.col-form-label {
  padding-top: calc(0.4375rem + 1px);
  padding-bottom: calc(0.4375rem + 1px);
  margin-bottom: 0;
  font-size: inherit;
  font-weight: 500;
  line-height: 1.53;
  color: #566a7f;
}

.col-form-label-lg {
  padding-top: calc(0.75rem + 1px);
  padding-bottom: calc(0.75rem + 1px);
  font-size: 1rem;
}

.col-form-label-sm {
  padding-top: calc(0.25rem + 1px);
  padding-bottom: calc(0.25rem + 1px);
  font-size: 0.75rem;
}

.form-text {
  margin-top: 0.3rem;
  font-size: 85%;
  color: #b4bdc6;
}

.form-control {
  display: block;
  width: 100%;
  padding: 0.4375rem 0.875rem;
  font-size: 0.9375rem;
  font-weight: 400;
  line-height: 1.53;
  color: #697a8d;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #d9dee3;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  border-radius: 0.375rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
@media (prefers-reduced-motion: reduce) {
  .form-control {
    transition: none;
  }
}
.form-control[type=file] {
  overflow: hidden;
}
.form-control[type=file]:not(:disabled):not([readonly]) {
  cursor: pointer;
}
.form-control:focus {
  color: #697a8d;
  background-color: #fff;
  border-color: rgba(249, 249, 255, 0.54);
  outline: 0;
  box-shadow: 0 0 0.25rem 0.05rem rgba(105, 108, 255, 0.1);
}
.form-control::-webkit-date-and-time-value {
  height: 1.53em;
}
.form-control::-moz-placeholder {
  color: #b4bdc6;
  opacity: 1;
}
.form-control::placeholder {
  color: #b4bdc6;
  opacity: 1;
}
.form-control:disabled, .form-control[readonly] {
  background-color: #eceef1;
  opacity: 1;
}
.form-control::file-selector-button {
  padding: 0.4375rem 0.875rem;
  margin: -0.4375rem -0.875rem;
  -webkit-margin-end: 0.875rem;
          margin-inline-end: 0.875rem;
  color: #697a8d;
  background-color: #fff;
  pointer-events: none;
  border-color: inherit;
  border-style: solid;
  border-width: 0;
  border-inline-end-width: 1px;
  border-radius: 0;
  transition: all 0.2s ease-in-out;
}
@media (prefers-reduced-motion: reduce) {
  .form-control::file-selector-button {
    transition: none;
  }
}
.form-control:hover:not(:disabled):not([readonly])::file-selector-button {
  background-color: #f2f2f2;
}
.form-control::-webkit-file-upload-button {
  padding: 0.4375rem 0.875rem;
  margin: -0.4375rem -0.875rem;
  -webkit-margin-end: 0.875rem;
          margin-inline-end: 0.875rem;
  color: #697a8d;
  background-color: #fff;
  pointer-events: none;
  border-color: inherit;
  border-style: solid;
  border-width: 0;
  border-inline-end-width: 1px;
  border-radius: 0;
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
@media (prefers-reduced-motion: reduce) {
  .form-control::-webkit-file-upload-button {
    -webkit-transition: none;
    transition: none;
  }
}
.form-control:hover:not(:disabled):not([readonly])::-webkit-file-upload-button {
  background-color: #f2f2f2;
}

.form-control-plaintext {
  display: block;
  width: 100%;
  padding: 0.4375rem 0;
  margin-bottom: 0;
  line-height: 1.53;
  color: #697a8d;
  background-color: transparent;
  border: solid transparent;
  border-width: 1px 0;
}
.form-control-plaintext.form-control-sm, .form-control-plaintext.form-control-lg {
  padding-right: 0;
  padding-left: 0;
}

.form-control-sm {
  min-height: calc(1.53em + 0.5rem + 2px);
  padding: 0.25rem 0.625rem;
  font-size: 0.75rem;
  border-radius: 0.25rem;
}
.form-control-sm::file-selector-button {
  padding: 0.25rem 0.625rem;
  margin: -0.25rem -0.625rem;
  -webkit-margin-end: 0.625rem;
          margin-inline-end: 0.625rem;
}
.form-control-sm::-webkit-file-upload-button {
  padding: 0.25rem 0.625rem;
  margin: -0.25rem -0.625rem;
  -webkit-margin-end: 0.625rem;
          margin-inline-end: 0.625rem;
}

.form-control-lg {
  min-height: calc(1.53em + 1.5rem + 2px);
  padding: 0.75rem 1.25rem;
  font-size: 1rem;
  border-radius: 0.5rem;
}
.form-control-lg::file-selector-button {
  padding: 0.75rem 1.25rem;
  margin: -0.75rem -1.25rem;
  -webkit-margin-end: 1.25rem;
          margin-inline-end: 1.25rem;
}
.form-control-lg::-webkit-file-upload-button {
  padding: 0.75rem 1.25rem;
  margin: -0.75rem -1.25rem;
  -webkit-margin-end: 1.25rem;
          margin-inline-end: 1.25rem;
}

textarea.form-control {
  min-height: calc(1.53em + 0.875rem + 2px);
}
textarea.form-control-sm {
  min-height: calc(1.53em + 0.5rem + 2px);
}
textarea.form-control-lg {
  min-height: calc(1.53em + 1.5rem + 2px);
}

.form-control-color {
  width: 3rem;
  height: auto;
  padding: 0.4375rem;
}
.form-control-color:not(:disabled):not([readonly]) {
  cursor: pointer;
}
.form-control-color::-moz-color-swatch {
  height: 1.53em;
  border-radius: 0.375rem;
}
.form-control-color::-webkit-color-swatch {
  height: 1.53em;
  border-radius: 0.375rem;
}

.form-select {
  display: block;
  width: 100%;
  padding: 0.4375rem 1.875rem 0.4375rem 0.875rem;
  -moz-padding-start: calc(0.875rem - 3px);
  font-size: 0.9375rem;
  font-weight: 400;
  line-height: 1.53;
  color: #697a8d;
  background-color: #fff;
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%2867, 89, 113, 0.6%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
  background-repeat: no-repeat;
  background-position: right 0.875rem center;
  background-size: 17px 12px;
  border: 1px solid #d9dee3;
  border-radius: 0.375rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
}
@media (prefers-reduced-motion: reduce) {
  .form-select {
    transition: none;
  }
}
.form-select:focus {
  border-color: rgba(249, 249, 255, 0.54);
  outline: 0;
  box-shadow: 0 0 0.25rem 0.05rem rgba(105, 108, 255, 0.1);
}
.form-select[multiple], .form-select[size]:not([size="1"]) {
  padding-right: 0.875rem;
  background-image: none;
}
.form-select:disabled {
  color: #697a8d;
  background-color: #eceef1;
}
.form-select:-moz-focusring {
  color: transparent;
  text-shadow: 0 0 0 #697a8d;
}

.form-select-sm {
  padding-top: 0.25rem;
  padding-bottom: 0.25rem;
  padding-left: 0.625rem;
  font-size: 0.75rem;
  border-radius: 0.25rem;
}

.form-select-lg {
  padding-top: 0.75rem;
  padding-bottom: 0.75rem;
  padding-left: 1.25rem;
  font-size: 1rem;
  border-radius: 0.5rem;
}

.form-check {
  display: block;
  min-height: 1.434375rem;
  padding-left: 1.7em;
  margin-bottom: 0.125rem;
}
.form-check .form-check-input {
  float: left;
  margin-left: -1.7em;
}

.form-check-input {
  width: 1.2em;
  height: 1.2em;
  margin-top: 0.165em;
  vertical-align: top;
  background-color: #fff;
  background-repeat: no-repeat;
  background-position: center;
  background-size: contain;
  border: 1px solid #d9dee3;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  -webkit-print-color-adjust: exact;
          color-adjust: exact;
}
.form-check-input[type=checkbox] {
  border-radius: 0.25em;
}
.form-check-input[type=radio] {
  border-radius: 50%;
}
.form-check-input:active {
  filter: brightness(90%);
}
.form-check-input:focus {
  border-color: rgba(249, 249, 255, 0.54);
  outline: 0;
  box-shadow: 0 0 0.25rem 0.05rem rgba(105, 108, 255, 0.1);
}
.form-check-input:checked {
  background-color: rgba(105, 108, 255, 0.08);
  border-color: rgba(105, 108, 255, 0.08);
}
.form-check-input:checked[type=checkbox] {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 10l3 3l6-6'/%3e%3c/svg%3e");
}
.form-check-input:checked[type=radio] {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='1.5' fill='%23fff'/%3e%3c/svg%3e");
}
.form-check-input[type=checkbox]:indeterminate {
  background-color: rgba(105, 108, 255, 0.08);
  border-color: rgba(105, 108, 255, 0.08);
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='%23fff' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M6 10h8'/%3e%3c/svg%3e");
}
.form-check-input:disabled {
  pointer-events: none;
  filter: none;
  opacity: 0.5;
}
.form-check-input[disabled] ~ .form-check-label, .form-check-input:disabled ~ .form-check-label {
  opacity: 0.5;
}

.form-switch {
  padding-left: 2.5em;
}
.form-switch .form-check-input {
  width: 2em;
  margin-left: -2.5em;
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='rgba%2867, 89, 113, 0.3%29'/%3e%3c/svg%3e");
  background-position: left center;
  border-radius: 2em;
  transition: background-position 0.15s ease-in-out;
}
@media (prefers-reduced-motion: reduce) {
  .form-switch .form-check-input {
    transition: none;
  }
}
.form-switch .form-check-input:focus {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='rgba%28249, 249, 255, 0.54%29'/%3e%3c/svg%3e");
}
.form-switch .form-check-input:checked {
  background-position: right center;
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23fff'/%3e%3c/svg%3e");
}

.form-check-inline {
  display: inline-block;
  margin-right: 1rem;
}

.btn-check {
  position: absolute;
  clip: rect(0, 0, 0, 0);
  pointer-events: none;
}
.btn-check[disabled] + .btn, .btn-check:disabled + .btn {
  pointer-events: none;
  filter: none;
  opacity: 0.65;
}

.form-range {
  width: 100%;
  height: 0.975rem;
  padding: 0;
  background-color: transparent;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
}
.form-range:focus {
  outline: 0;
}
.form-range:focus::-webkit-slider-thumb {
  box-shadow: 0 0 8px 0px rgba(67, 89, 113, 0.4);
}
.form-range:focus::-moz-range-thumb {
  box-shadow: 0 0 8px 0px rgba(67, 89, 113, 0.4);
}
.form-range::-moz-focus-outer {
  border: 0;
}
.form-range::-webkit-slider-thumb {
  width: 0.875rem;
  height: 0.875rem;
  margin-top: -0.25rem;
  background-color: #fff;
  border: 0;
  border-radius: 1rem;
  -webkit-transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  -webkit-appearance: none;
          appearance: none;
}
@media (prefers-reduced-motion: reduce) {
  .form-range::-webkit-slider-thumb {
    -webkit-transition: none;
    transition: none;
  }
}
.form-range::-webkit-slider-thumb:active {
  background-color: #fff;
}
.form-range::-webkit-slider-runnable-track {
  width: 100%;
  height: 0.375rem;
  color: transparent;
  cursor: pointer;
  background-color: #eceef1;
  border-color: transparent;
  border-radius: 1rem;
}
.form-range::-moz-range-thumb {
  width: 0.875rem;
  height: 0.875rem;
  background-color: #fff;
  border: 0;
  border-radius: 1rem;
  -moz-transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  -moz-appearance: none;
       appearance: none;
}
@media (prefers-reduced-motion: reduce) {
  .form-range::-moz-range-thumb {
    -moz-transition: none;
    transition: none;
  }
}
.form-range::-moz-range-thumb:active {
  background-color: #fff;
}
.form-range::-moz-range-track {
  width: 100%;
  height: 0.375rem;
  color: transparent;
  cursor: pointer;
  background-color: #eceef1;
  border-color: transparent;
  border-radius: 1rem;
}
.form-range:disabled {
  pointer-events: none;
}
.form-range:disabled::-webkit-slider-thumb {
  background-color: #d9dee3;
}
.form-range:disabled::-moz-range-thumb {
  background-color: #d9dee3;
}

.form-floating {
  position: relative;
}
.form-floating > .form-control,
.form-floating > .form-select {
  height: calc(3.5rem + 2px);
  line-height: 1.25;
}
.form-floating > label {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  padding: 1rem 0.875rem;
  pointer-events: none;
  border: 1px solid transparent;
  transform-origin: 0 0;
  transition: opacity 0.2s ease-in-out, transform 0.2s ease-in-out;
}
@media (prefers-reduced-motion: reduce) {
  .form-floating > label {
    transition: none;
  }
}
.form-floating > .form-control {
  padding: 1rem 0.875rem;
}
.form-floating > .form-control::-moz-placeholder {
  color: transparent;
}
.form-floating > .form-control::placeholder {
  color: transparent;
}
.form-floating > .form-control:not(:-moz-placeholder-shown) {
  padding-top: 1.625rem;
  padding-bottom: 0.625rem;
}
.form-floating > .form-control:focus, .form-floating > .form-control:not(:placeholder-shown) {
  padding-top: 1.625rem;
  padding-bottom: 0.625rem;
}
.form-floating > .form-control:-webkit-autofill {
  padding-top: 1.625rem;
  padding-bottom: 0.625rem;
}
.form-floating > .form-select {
  padding-top: 1.625rem;
  padding-bottom: 0.625rem;
}
.form-floating > .form-control:not(:-moz-placeholder-shown) ~ label {
  opacity: 0.75;
  transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
}
.form-floating > .form-control:focus ~ label,
.form-floating > .form-control:not(:placeholder-shown) ~ label,
.form-floating > .form-select ~ label {
  opacity: 0.75;
  transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
}
.form-floating > .form-control:-webkit-autofill ~ label {
  opacity: 0.75;
  transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
}

.input-group {
  position: relative;
  display: flex;
  flex-wrap: wrap;
  align-items: stretch;
  width: 100%;
}
.input-group > .form-control,
.input-group > .form-select {
  position: relative;
  flex: 1 1 auto;
  width: 1%;
  min-width: 0;
}
.input-group > .form-control:focus,
.input-group > .form-select:focus {
  z-index: 3;
}
.input-group .btn {
  position: relative;
  z-index: 2;
}
.input-group .btn:focus {
  z-index: 3;
}

.input-group-text {
  display: flex;
  align-items: center;
  padding: 0.4375rem 0.875rem;
  font-size: 0.9375rem;
  font-weight: 400;
  line-height: 1.53;
  color: #697a8d;
  text-align: center;
  white-space: nowrap;
  background-color: #fff;
  border: 1px solid #d9dee3;
  border-radius: 0.375rem;
}

.input-group-lg > .form-control,
.input-group-lg > .form-select,
.input-group-lg > .input-group-text,
.input-group-lg > .btn {
  padding: 0.75rem 1.25rem;
  font-size: 1rem;
  border-radius: 0.5rem;
}

.input-group-sm > .form-control,
.input-group-sm > .form-select,
.input-group-sm > .input-group-text,
.input-group-sm > .btn {
  padding: 0.25rem 0.625rem;
  font-size: 0.75rem;
  border-radius: 0.25rem;
}

.input-group-lg > .form-select,
.input-group-sm > .form-select {
  padding-right: 2.75rem;
}

.input-group:not(.has-validation) > :not(:last-child):not(.dropdown-toggle):not(.dropdown-menu),
.input-group:not(.has-validation) > .dropdown-toggle:nth-last-child(n+3) {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}
.input-group.has-validation > :nth-last-child(n+3):not(.dropdown-toggle):not(.dropdown-menu),
.input-group.has-validation > .dropdown-toggle:nth-last-child(n+4) {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}
.input-group > :not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback) {
  margin-left: -1px;
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}

.btn {
  display: inline-block;
  font-weight: 400;
  line-height: 1.53;
  color: #697a8d;
  text-align: center;
  vertical-align: middle;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
          user-select: none;
  background-color: transparent;
  border: 1px solid transparent;
  padding: 0.4375rem 1.25rem;
  font-size: 0.9375rem;
  border-radius: 0.375rem;
  transition: all 0.2s ease-in-out;
}
@media (prefers-reduced-motion: reduce) {
  .btn {
    transition: none;
  }
}
.btn:hover {
  color: #697a8d;
}
.btn-check:focus + .btn, .btn:focus {
  outline: 0;
  box-shadow: none;
}
.btn:disabled, .btn.disabled, fieldset:disabled .btn {
  pointer-events: none;
  opacity: 0.65;
}

.btn-link {
  font-weight: 400;
  color: #696cff;
  text-decoration: none;
}
.btn-link:hover {
  color: #5f61e6;
}
.btn-link:disabled, .btn-link.disabled {
  color: rgba(67, 89, 113, 0.6);
}

.btn-lg, .btn-group-lg > .btn {
  padding: 0.75rem 1.5rem;
  font-size: 1rem;
  border-radius: 0.5rem;
}

.btn-sm, .btn-group-sm > .btn {
  padding: 0.25rem 0.6875rem;
  font-size: 0.75rem;
  border-radius: 0.25rem;
}

.fade {
  transition: opacity 0.15s linear;
}
@media (prefers-reduced-motion: reduce) {
  .fade {
    transition: none;
  }
}
.fade:not(.show) {
  opacity: 0;
}

.collapse:not(.show) {
  display: none;
}

.collapsing {
  height: 0;
  overflow: hidden;
  transition: height 0.35s ease;
}
@media (prefers-reduced-motion: reduce) {
  .collapsing {
    transition: none;
  }
}
.collapsing.collapse-horizontal {
  width: 0;
  height: auto;
  transition: width 0.35s ease;
}
@media (prefers-reduced-motion: reduce) {
  .collapsing.collapse-horizontal {
    transition: none;
  }
}

.dropup,
.dropend,
.dropdown,
.dropstart {
  position: relative;
}

.dropdown-toggle {
  white-space: nowrap;
}
.dropdown-toggle::after {
  display: inline-block;
  margin-left: 0.5em;
  vertical-align: middle;
  content: "";
  margin-top: -0.28em;
  width: 0.42em;
  height: 0.42em;
  border: 1px solid;
  border-top: 0;
  border-left: 0;
  transform: rotate(45deg);
}
.dropdown-toggle:empty::after {
  margin-left: 0;
}

.dropdown-menu {
  position: absolute;
  z-index: 1000;
  display: none;
  min-width: 12rem;
  padding: 0.3125rem 0;
  margin: 0;
  font-size: 0.9375rem;
  color: #697a8d;
  text-align: left;
  list-style: none;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid transparent;
  border-radius: 0.375rem;
}
.dropdown-menu[data-bs-popper] {
  top: 100%;
  left: 0;
  margin-top: 0.125rem;
}

.dropdown-menu-start {
  --bs-position: start;
}
.dropdown-menu-start[data-bs-popper] {
  right: auto;
  left: 0;
}

.dropdown-menu-end {
  --bs-position: end;
}
.dropdown-menu-end[data-bs-popper] {
  right: 0;
  left: auto;
}

@media (min-width: 576px) {
  .dropdown-menu-sm-start {
    --bs-position: start;
  }
  .dropdown-menu-sm-start[data-bs-popper] {
    right: auto;
    left: 0;
  }

  .dropdown-menu-sm-end {
    --bs-position: end;
  }
  .dropdown-menu-sm-end[data-bs-popper] {
    right: 0;
    left: auto;
  }
}
@media (min-width: 768px) {
  .dropdown-menu-md-start {
    --bs-position: start;
  }
  .dropdown-menu-md-start[data-bs-popper] {
    right: auto;
    left: 0;
  }

  .dropdown-menu-md-end {
    --bs-position: end;
  }
  .dropdown-menu-md-end[data-bs-popper] {
    right: 0;
    left: auto;
  }
}
@media (min-width: 992px) {
  .dropdown-menu-lg-start {
    --bs-position: start;
  }
  .dropdown-menu-lg-start[data-bs-popper] {
    right: auto;
    left: 0;
  }

  .dropdown-menu-lg-end {
    --bs-position: end;
  }
  .dropdown-menu-lg-end[data-bs-popper] {
    right: 0;
    left: auto;
  }
}
@media (min-width: 1200px) {
  .dropdown-menu-xl-start {
    --bs-position: start;
  }
  .dropdown-menu-xl-start[data-bs-popper] {
    right: auto;
    left: 0;
  }

  .dropdown-menu-xl-end {
    --bs-position: end;
  }
  .dropdown-menu-xl-end[data-bs-popper] {
    right: 0;
    left: auto;
  }
}
@media (min-width: 1400px) {
  .dropdown-menu-xxl-start {
    --bs-position: start;
  }
  .dropdown-menu-xxl-start[data-bs-popper] {
    right: auto;
    left: 0;
  }

  .dropdown-menu-xxl-end {
    --bs-position: end;
  }
  .dropdown-menu-xxl-end[data-bs-popper] {
    right: 0;
    left: auto;
  }
}
.dropup .dropdown-menu[data-bs-popper] {
  top: auto;
  bottom: 100%;
  margin-top: 0;
  margin-bottom: 0.125rem;
}
.dropup .dropdown-toggle::after {
  display: inline-block;
  margin-left: 0.5em;
  vertical-align: middle;
  content: "";
  margin-top: 0;
  width: 0.42em;
  height: 0.42em;
  border: 1px solid;
  border-bottom: 0;
  border-left: 0;
  transform: rotate(-45deg);
}
.dropup .dropdown-toggle:empty::after {
  margin-left: 0;
}

.dropend .dropdown-menu[data-bs-popper] {
  top: 0;
  right: auto;
  left: 100%;
  margin-top: 0;
  margin-left: 0.125rem;
}
.dropend .dropdown-toggle::after {
  display: inline-block;
  margin-left: 0.5em;
  vertical-align: middle;
  content: "";
  border-top: 0.42em solid transparent;
  border-right: 0;
  border-bottom: 0.42em solid transparent;
  border-left: 0.42em solid;
}
.dropend .dropdown-toggle:empty::after {
  margin-left: 0;
}
.dropend .dropdown-toggle::after {
  vertical-align: 0;
}

.dropstart .dropdown-menu[data-bs-popper] {
  top: 0;
  right: 100%;
  left: auto;
  margin-top: 0;
  margin-right: 0.125rem;
}
.dropstart .dropdown-toggle::after {
  display: inline-block;
  margin-left: 0.5em;
  vertical-align: middle;
  content: "";
}
.dropstart .dropdown-toggle::after {
  display: none;
}
.dropstart .dropdown-toggle::before {
  display: inline-block;
  margin-right: 0.5em;
  vertical-align: middle;
  content: "";
  border-top: 0.42em solid transparent;
  border-right: 0.42em solid;
  border-bottom: 0.42em solid transparent;
}
.dropstart .dropdown-toggle:empty::after {
  margin-left: 0;
}
.dropstart .dropdown-toggle::before {
  vertical-align: 0;
}

.dropdown-divider {
  height: 0;
  margin: 0.5rem 0;
  overflow: hidden;
  border-top: 1px solid #d9dee3;
}

.dropdown-item {
  display: block;
  width: 100%;
  padding: 0.532rem 1.25rem;
  clear: both;
  font-weight: 400;
  color: #697a8d;
  text-align: inherit;
  white-space: nowrap;
  background-color: transparent;
  border: 0;
}
.dropdown-item:hover, .dropdown-item:focus {
  color: #5f6e7f;
  background-color: rgba(67, 89, 113, 0.04);
}
.dropdown-item.active, .dropdown-item:active {
  color: #fff;
  text-decoration: none;
  background-color: rgba(105, 108, 255, 0.08);
}
.dropdown-item.disabled, .dropdown-item:disabled {
  color: #c7cdd4;
  pointer-events: none;
  background-color: transparent;
}

.dropdown-menu.show {
  display: block;
}

.dropdown-header {
  display: block;
  padding: 0.532rem 1.25rem;
  margin-bottom: 0;
  font-size: 0.75rem;
  color: #a1acb8;
  white-space: nowrap;
}

.dropdown-item-text {
  display: block;
  padding: 0.532rem 1.25rem;
  color: #697a8d;
}

.dropdown-menu-dark {
  color: rgba(67, 89, 113, 0.3);
  background-color: rgba(67, 89, 113, 0.8);
  border-color: transparent;
}
.dropdown-menu-dark .dropdown-item {
  color: rgba(67, 89, 113, 0.3);
}
.dropdown-menu-dark .dropdown-item:hover, .dropdown-menu-dark .dropdown-item:focus {
  color: #fff;
  background-color: rgba(255, 255, 255, 0.15);
}
.dropdown-menu-dark .dropdown-item.active, .dropdown-menu-dark .dropdown-item:active {
  color: #fff;
  background-color: rgba(105, 108, 255, 0.08);
}
.dropdown-menu-dark .dropdown-item.disabled, .dropdown-menu-dark .dropdown-item:disabled {
  color: rgba(67, 89, 113, 0.5);
}
.dropdown-menu-dark .dropdown-divider {
  border-color: #d9dee3;
}
.dropdown-menu-dark .dropdown-item-text {
  color: rgba(67, 89, 113, 0.3);
}
.dropdown-menu-dark .dropdown-header {
  color: rgba(67, 89, 113, 0.5);
}

.btn-group,
.btn-group-vertical {
  position: relative;
  display: inline-flex;
  vertical-align: middle;
}
.btn-group > .btn,
.btn-group-vertical > .btn {
  position: relative;
  flex: 1 1 auto;
}
.btn-group > .btn-check:checked + .btn,
.btn-group > .btn-check:focus + .btn,
.btn-group > .btn:hover,
.btn-group > .btn:focus,
.btn-group > .btn:active,
.btn-group > .btn.active,
.btn-group-vertical > .btn-check:checked + .btn,
.btn-group-vertical > .btn-check:focus + .btn,
.btn-group-vertical > .btn:hover,
.btn-group-vertical > .btn:focus,
.btn-group-vertical > .btn:active,
.btn-group-vertical > .btn.active {
  z-index: 1;
}

.btn-toolbar {
  display: flex;
  flex-wrap: wrap;
  justify-content: flex-start;
}
.btn-toolbar .input-group {
  width: auto;
}

.btn-group > .btn:not(:first-child),
.btn-group > .btn-group:not(:first-child) {
  margin-left: -1px;
}
.btn-group > .btn:not(:last-child):not(.dropdown-toggle),
.btn-group > .btn-group:not(:last-child) > .btn {
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}
.btn-group > .btn:nth-child(n+3),
.btn-group > :not(.btn-check) + .btn,
.btn-group > .btn-group:not(:first-child) > .btn {
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}

.dropdown-toggle-split {
  padding-right: 0.9375rem;
  padding-left: 0.9375rem;
}
.dropdown-toggle-split::after, .dropup .dropdown-toggle-split::after, .dropend .dropdown-toggle-split::after {
  margin-left: 0;
}
.dropstart .dropdown-toggle-split::before {
  margin-right: 0;
}

.btn-sm + .dropdown-toggle-split, .btn-group-sm > .btn + .dropdown-toggle-split {
  padding-right: 0.515625rem;
  padding-left: 0.515625rem;
}

.btn-lg + .dropdown-toggle-split, .btn-group-lg > .btn + .dropdown-toggle-split {
  padding-right: 1.125rem;
  padding-left: 1.125rem;
}

.btn-group-vertical {
  flex-direction: column;
  align-items: flex-start;
  justify-content: center;
}
.btn-group-vertical > .btn,
.btn-group-vertical > .btn-group {
  width: 100%;
}
.btn-group-vertical > .btn:not(:first-child),
.btn-group-vertical > .btn-group:not(:first-child) {
  margin-top: -1px;
}
.btn-group-vertical > .btn:not(:last-child):not(.dropdown-toggle),
.btn-group-vertical > .btn-group:not(:last-child) > .btn {
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.btn-group-vertical > .btn ~ .btn,
.btn-group-vertical > .btn-group:not(:first-child) > .btn {
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.nav {
  display: flex;
  flex-wrap: wrap;
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;
}

.nav-link {
  display: block;
  padding: 0.5rem 1.25rem;
  color: #8e9baa;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
}
@media (prefers-reduced-motion: reduce) {
  .nav-link {
    transition: none;
  }
}
.nav-link:hover, .nav-link:focus {
  color: #5f61e6;
}
.nav-link.disabled {
  color: #c7cdd4;
  pointer-events: none;
  cursor: default;
}

.nav-tabs {
  border-bottom: 1px solid #fff;
}
.nav-tabs .nav-link {
  margin-bottom: -1px;
  background: none;
  border: 1px solid transparent;
  border-top-left-radius: 0.375rem;
  border-top-right-radius: 0.375rem;
}
.nav-tabs .nav-link:hover, .nav-tabs .nav-link:focus {
  border-color: rgba(67, 89, 113, 0.1);
  isolation: isolate;
}
.nav-tabs .nav-link.disabled {
  color: #c7cdd4;
  background-color: transparent;
  border-color: transparent;
}
.nav-tabs .nav-link.active,
.nav-tabs .nav-item.show .nav-link {
  color: #697a8d;
  background-color: #fff;
  border-color: #fff;
}
.nav-tabs .dropdown-menu {
  margin-top: -1px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.nav-pills .nav-link {
  background: none;
  border: 0;
  border-radius: 0.375rem;
}
.nav-pills .nav-link.active,
.nav-pills .show > .nav-link {
  color: #fff;
  background-color: transparent;
}

.nav-fill > .nav-link,
.nav-fill .nav-item {
  flex: 1 1 auto;
  text-align: center;
}

.nav-justified > .nav-link,
.nav-justified .nav-item {
  flex-basis: 0;
  flex-grow: 1;
  text-align: center;
}

.nav-fill .nav-item .nav-link,
.nav-justified .nav-item .nav-link {
  width: 100%;
}

.tab-content > .tab-pane {
  display: none;
}
.tab-content > .active {
  display: block;
}

.navbar {
  position: relative;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
}
.navbar > .container,
.navbar > .container-fluid,
.navbar > .container-sm,
.navbar > .container-md,
.navbar > .container-lg,
.navbar > .container-xl,
.navbar > .container-xxl {
  display: flex;
  flex-wrap: inherit;
  align-items: center;
  justify-content: space-between;
}
.navbar-brand {
  padding-top: 0.4521875rem;
  padding-bottom: 0.4521875rem;
  margin-right: 1rem;
  font-size: 1rem;
  white-space: nowrap;
}
.navbar-nav {
  display: flex;
  flex-direction: column;
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;
}
.navbar-nav .nav-link {
  padding-right: 0;
  padding-left: 0;
}
.navbar-nav .dropdown-menu {
  position: static;
}

.navbar-text {
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
}

.navbar-collapse {
  flex-basis: 100%;
  flex-grow: 1;
  align-items: center;
}

.navbar-toggler {
  padding: 0 0;
  font-size: 0.75rem;
  line-height: 1;
  background-color: transparent;
  border: 1px solid transparent;
  border-radius: 0.375rem;
  transition: box-shadow 0.15s ease-in-out;
}
@media (prefers-reduced-motion: reduce) {
  .navbar-toggler {
    transition: none;
  }
}
.navbar-toggler:hover {
  text-decoration: none;
}
.navbar-toggler:focus {
  text-decoration: none;
  outline: 0;
  box-shadow: 0 0 0 0.05rem;
}

.navbar-toggler-icon {
  display: inline-block;
  width: 1.5em;
  height: 1.5em;
  vertical-align: middle;
  background-repeat: no-repeat;
  background-position: center;
  background-size: 100%;
}

.navbar-nav-scroll {
  max-height: var(--bs-scroll-height, 75vh);
  overflow-y: auto;
}

@media (min-width: 576px) {
  .navbar-expand-sm {
    flex-wrap: nowrap;
    justify-content: flex-start;
  }
  .navbar-expand-sm .navbar-nav {
    flex-direction: row;
  }
  .navbar-expand-sm .navbar-nav .dropdown-menu {
    position: absolute;
  }
  .navbar-expand-sm .navbar-nav .nav-link {
    padding-right: 0.5rem;
    padding-left: 0.5rem;
  }
  .navbar-expand-sm .navbar-nav-scroll {
    overflow: visible;
  }
  .navbar-expand-sm .navbar-collapse {
    display: flex ;
    flex-basis: auto;
  }
  .navbar-expand-sm .navbar-toggler {
    display: none;
  }
  .navbar-expand-sm .offcanvas-header {
    display: none;
  }
  .navbar-expand-sm .offcanvas {
    position: inherit;
    bottom: 0;
    z-index: 1000;
    flex-grow: 1;
    visibility: visible ;
    background-color: transparent;
    border-right: 0;
    border-left: 0;
    transition: none;
    transform: none;
  }
  .navbar-expand-sm .offcanvas-top,
.navbar-expand-sm .offcanvas-bottom {
    height: auto;
    border-top: 0;
    border-bottom: 0;
  }
  .navbar-expand-sm .offcanvas-body {
    display: flex;
    flex-grow: 0;
    padding: 0;
    overflow-y: visible;
  }
}
@media (min-width: 768px) {
  .navbar-expand-md {
    flex-wrap: nowrap;
    justify-content: flex-start;
  }
  .navbar-expand-md .navbar-nav {
    flex-direction: row;
  }
  .navbar-expand-md .navbar-nav .dropdown-menu {
    position: absolute;
  }
  .navbar-expand-md .navbar-nav .nav-link {
    padding-right: 0.5rem;
    padding-left: 0.5rem;
  }
  .navbar-expand-md .navbar-nav-scroll {
    overflow: visible;
  }
  .navbar-expand-md .navbar-collapse {
    display: flex ;
    flex-basis: auto;
  }
  .navbar-expand-md .navbar-toggler {
    display: none;
  }
  .navbar-expand-md .offcanvas-header {
    display: none;
  }
  .navbar-expand-md .offcanvas {
    position: inherit;
    bottom: 0;
    z-index: 1000;
    flex-grow: 1;
    visibility: visible ;
    background-color: transparent;
    border-right: 0;
    border-left: 0;
    transition: none;
    transform: none;
  }
  .navbar-expand-md .offcanvas-top,
.navbar-expand-md .offcanvas-bottom {
    height: auto;
    border-top: 0;
    border-bottom: 0;
  }
  .navbar-expand-md .offcanvas-body {
    display: flex;
    flex-grow: 0;
    padding: 0;
    overflow-y: visible;
  }
}
@media (min-width: 992px) {
  .navbar-expand-lg {
    flex-wrap: nowrap;
    justify-content: flex-start;
  }
  .navbar-expand-lg .navbar-nav {
    flex-direction: row;
  }
  .navbar-expand-lg .navbar-nav .dropdown-menu {
    position: absolute;
  }
  .navbar-expand-lg .navbar-nav .nav-link {
    padding-right: 0.5rem;
    padding-left: 0.5rem;
  }
  .navbar-expand-lg .navbar-nav-scroll {
    overflow: visible;
  }
  .navbar-expand-lg .navbar-collapse {
    display: flex ;
    flex-basis: auto;
  }
  .navbar-expand-lg .navbar-toggler {
    display: none;
  }
  .navbar-expand-lg .offcanvas-header {
    display: none;
  }
  .navbar-expand-lg .offcanvas {
    position: inherit;
    bottom: 0;
    z-index: 1000;
    flex-grow: 1;
    visibility: visible ;
    background-color: transparent;
    border-right: 0;
    border-left: 0;
    transition: none;
    transform: none;
  }
  .navbar-expand-lg .offcanvas-top,
.navbar-expand-lg .offcanvas-bottom {
    height: auto;
    border-top: 0;
    border-bottom: 0;
  }
  .navbar-expand-lg .offcanvas-body {
    display: flex;
    flex-grow: 0;
    padding: 0;
    overflow-y: visible;
  }
}
@media (min-width: 1200px) {
  .navbar-expand-xl {
    flex-wrap: nowrap;
    justify-content: flex-start;
  }
  .navbar-expand-xl .navbar-nav {
    flex-direction: row;
  }
  .navbar-expand-xl .navbar-nav .dropdown-menu {
    position: absolute;
  }
  .navbar-expand-xl .navbar-nav .nav-link {
    padding-right: 0.5rem;
    padding-left: 0.5rem;
  }
  .navbar-expand-xl .navbar-nav-scroll {
    overflow: visible;
  }
  .navbar-expand-xl .navbar-collapse {
    display: flex ;
    flex-basis: auto;
  }
  .navbar-expand-xl .navbar-toggler {
    display: none;
  }
  .navbar-expand-xl .offcanvas-header {
    display: none;
  }
  .navbar-expand-xl .offcanvas {
    position: inherit;
    bottom: 0;
    z-index: 1000;
    flex-grow: 1;
    visibility: visible ;
    background-color: transparent;
    border-right: 0;
    border-left: 0;
    transition: none;
    transform: none;
  }
  .navbar-expand-xl .offcanvas-top,
.navbar-expand-xl .offcanvas-bottom {
    height: auto;
    border-top: 0;
    border-bottom: 0;
  }
  .navbar-expand-xl .offcanvas-body {
    display: flex;
    flex-grow: 0;
    padding: 0;
    overflow-y: visible;
  }
}
@media (min-width: 1400px) {
  .navbar-expand-xxl {
    flex-wrap: nowrap;
    justify-content: flex-start;
  }
  .navbar-expand-xxl .navbar-nav {
    flex-direction: row;
  }
  .navbar-expand-xxl .navbar-nav .dropdown-menu {
    position: absolute;
  }
  .navbar-expand-xxl .navbar-nav .nav-link {
    padding-right: 0.5rem;
    padding-left: 0.5rem;
  }
  .navbar-expand-xxl .navbar-nav-scroll {
    overflow: visible;
  }
  .navbar-expand-xxl .navbar-collapse {
    display: flex ;
    flex-basis: auto;
  }
  .navbar-expand-xxl .navbar-toggler {
    display: none;
  }
  .navbar-expand-xxl .offcanvas-header {
    display: none;
  }
  .navbar-expand-xxl .offcanvas {
    position: inherit;
    bottom: 0;
    z-index: 1000;
    flex-grow: 1;
    visibility: visible ;
    background-color: transparent;
    border-right: 0;
    border-left: 0;
    transition: none;
    transform: none;
  }
  .navbar-expand-xxl .offcanvas-top,
.navbar-expand-xxl .offcanvas-bottom {
    height: auto;
    border-top: 0;
    border-bottom: 0;
  }
  .navbar-expand-xxl .offcanvas-body {
    display: flex;
    flex-grow: 0;
    padding: 0;
    overflow-y: visible;
  }
}
.navbar-expand {
  flex-wrap: nowrap;
  justify-content: flex-start;
}
.navbar-expand .navbar-nav {
  flex-direction: row;
}
.navbar-expand .navbar-nav .dropdown-menu {
  position: absolute;
}
.navbar-expand .navbar-nav .nav-link {
  padding-right: 0.5rem;
  padding-left: 0.5rem;
}
.navbar-expand .navbar-nav-scroll {
  overflow: visible;
}
.navbar-expand .navbar-collapse {
  display: flex ;
  flex-basis: auto;
}
.navbar-expand .navbar-toggler {
  display: none;
}
.navbar-expand .offcanvas-header {
  display: none;
}
.navbar-expand .offcanvas {
  position: inherit;
  bottom: 0;
  z-index: 1000;
  flex-grow: 1;
  visibility: visible ;
  background-color: transparent;
  border-right: 0;
  border-left: 0;
  transition: none;
  transform: none;
}
.navbar-expand .offcanvas-top,
.navbar-expand .offcanvas-bottom {
  height: auto;
  border-top: 0;
  border-bottom: 0;
}
.navbar-expand .offcanvas-body {
  display: flex;
  flex-grow: 0;
  padding: 0;
  overflow-y: visible;
}

.navbar-light .navbar-brand {
  color: #697a8d;
}
.navbar-light .navbar-brand:hover, .navbar-light .navbar-brand:focus {
  color: #697a8d;
}
.navbar-light .navbar-nav .nav-link {
  color: rgba(67, 89, 113, 0.5);
}
.navbar-light .navbar-nav .nav-link:hover, .navbar-light .navbar-nav .nav-link:focus {
  color: #697a8d;
}
.navbar-light .navbar-nav .nav-link.disabled {
  color: rgba(67, 89, 113, 0.3);
}
.navbar-light .navbar-nav .show > .nav-link,
.navbar-light .navbar-nav .nav-link.active {
  color: #697a8d;
}
.navbar-light .navbar-toggler {
  color: rgba(67, 89, 113, 0.5);
  border-color: rgba(67, 89, 113, 0.06);
}
.navbar-light .navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3Csvg width='14px' height='11px' viewBox='0 0 14 11' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpath d='M0,0 L14,0 L14,1.75 L0,1.75 L0,0 Z M0,4.375 L14,4.375 L14,6.125 L0,6.125 L0,4.375 Z M0,8.75 L14,8.75 L14,10.5 L0,10.5 L0,8.75 Z' id='path-1'%3E%3C/path%3E%3C/defs%3E%3Cg id='💎-UI-Elements' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='12%29-Navbar' transform='translate%28-1174.000000, -1290.000000%29'%3E%3Cg id='Group' transform='translate%281174.000000, 1288.000000%29'%3E%3Cg id='Icon-Color' transform='translate%280.000000, 2.000000%29'%3E%3Cuse fill='rgba%2867, 89, 113, 0.5%29' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.1' fill='rgba%2867, 89, 113, 0.5%29' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.navbar-light .navbar-text {
  color: rgba(67, 89, 113, 0.5);
}
.navbar-light .navbar-text a,
.navbar-light .navbar-text a:hover,
.navbar-light .navbar-text a:focus {
  color: #697a8d;
}

.navbar-dark .navbar-brand {
  color: #fff;
}
.navbar-dark .navbar-brand:hover, .navbar-dark .navbar-brand:focus {
  color: #fff;
}
.navbar-dark .navbar-nav .nav-link {
  color: rgba(255, 255, 255, 0.8);
}
.navbar-dark .navbar-nav .nav-link:hover, .navbar-dark .navbar-nav .nav-link:focus {
  color: #fff;
}
.navbar-dark .navbar-nav .nav-link.disabled {
  color: rgba(255, 255, 255, 0.4);
}
.navbar-dark .navbar-nav .show > .nav-link,
.navbar-dark .navbar-nav .nav-link.active {
  color: #fff;
}
.navbar-dark .navbar-toggler {
  color: rgba(255, 255, 255, 0.8);
  border-color: rgba(255, 255, 255, 0.1);
}
.navbar-dark .navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3Csvg width='14px' height='11px' viewBox='0 0 14 11' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpath d='M0,0 L14,0 L14,1.75 L0,1.75 L0,0 Z M0,4.375 L14,4.375 L14,6.125 L0,6.125 L0,4.375 Z M0,8.75 L14,8.75 L14,10.5 L0,10.5 L0,8.75 Z' id='path-1'%3E%3C/path%3E%3C/defs%3E%3Cg id='💎-UI-Elements' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='12%29-Navbar' transform='translate%28-1174.000000, -1290.000000%29'%3E%3Cg id='Group' transform='translate%281174.000000, 1288.000000%29'%3E%3Cg id='Icon-Color' transform='translate%280.000000, 2.000000%29'%3E%3Cuse fill='rgba%28255, 255, 255, 0.8%29' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.1' fill='rgba%28255, 255, 255, 0.8%29' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.navbar-dark .navbar-text {
  color: rgba(255, 255, 255, 0.8);
}
.navbar-dark .navbar-text a,
.navbar-dark .navbar-text a:hover,
.navbar-dark .navbar-text a:focus {
  color: #fff;
}

.card {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 0 solid #d9dee3;
  border-radius: 0.5rem;
}
.card > hr {
  margin-right: 0;
  margin-left: 0;
}
.card > .list-group {
  border-top: inherit;
  border-bottom: inherit;
}
.card > .list-group:first-child {
  border-top-width: 0;
  border-top-left-radius: 0.5rem;
  border-top-right-radius: 0.5rem;
}
.card > .list-group:last-child {
  border-bottom-width: 0;
  border-bottom-right-radius: 0.5rem;
  border-bottom-left-radius: 0.5rem;
}
.card > .card-header + .list-group,
.card > .list-group + .card-footer {
  border-top: 0;
}

.card-body {
  flex: 1 1 auto;
  padding: 1.5rem 1.5rem;
}

.card-title {
  margin-bottom: 0.875rem;
}

.card-subtitle {
  margin-top: -0.4375rem;
  margin-bottom: 0;
}

.card-text:last-child {
  margin-bottom: 0;
}

.card-link + .card-link {
  margin-left: 1.5rem;
}

.card-header {
  padding: 1.5rem 1.5rem;
  margin-bottom: 0;
  background-color: transparent;
  border-bottom: 0 solid #d9dee3;
}
.card-header:first-child {
  border-radius: 0.5rem 0.5rem 0 0;
}

.card-footer {
  padding: 1.5rem 1.5rem;
  background-color: transparent;
  border-top: 0 solid #d9dee3;
}
.card-footer:last-child {
  border-radius: 0 0 0.5rem 0.5rem;
}

.card-header-tabs {
  margin-right: -0.75rem;
  margin-bottom: -1.5rem;
  margin-left: -0.75rem;
  border-bottom: 0;
}

.card-header-pills {
  margin-right: -0.75rem;
  margin-left: -0.75rem;
}

.card-img-overlay {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1.5rem;
  border-radius: 0.5rem;
}

.card-img,
.card-img-top,
.card-img-bottom {
  width: 100%;
}

.card-img,
.card-img-top {
  border-top-left-radius: 0.5rem;
  border-top-right-radius: 0.5rem;
}

.card-img,
.card-img-bottom {
  border-bottom-right-radius: 0.5rem;
  border-bottom-left-radius: 0.5rem;
}

.card-group > .card {
  margin-bottom: 0.8125rem;
}
@media (min-width: 576px) {
  .card-group {
    display: flex;
    flex-flow: row wrap;
  }
  .card-group > .card {
    flex: 1 0 0%;
    margin-bottom: 0;
  }
  .card-group > .card + .card {
    margin-left: 0;
    border-left: 0;
  }
  .card-group > .card:not(:last-child) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
  }
  .card-group > .card:not(:last-child) .card-img-top,
.card-group > .card:not(:last-child) .card-header {
    border-top-right-radius: 0;
  }
  .card-group > .card:not(:last-child) .card-img-bottom,
.card-group > .card:not(:last-child) .card-footer {
    border-bottom-right-radius: 0;
  }
  .card-group > .card:not(:first-child) {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }
  .card-group > .card:not(:first-child) .card-img-top,
.card-group > .card:not(:first-child) .card-header {
    border-top-left-radius: 0;
  }
  .card-group > .card:not(:first-child) .card-img-bottom,
.card-group > .card:not(:first-child) .card-footer {
    border-bottom-left-radius: 0;
  }
}

.accordion-button {
  position: relative;
  display: flex;
  align-items: center;
  width: 100%;
  padding: 0.79rem 1.125rem;
  font-size: 0.9375rem;
  color: #566a7f;
  text-align: left;
  background-color: #fff;
  border: 0;
  border-radius: 0;
  overflow-anchor: none;
  transition: all 0.2s ease-in-out, border-radius 0.15s ease;
}
@media (prefers-reduced-motion: reduce) {
  .accordion-button {
    transition: none;
  }
}
.accordion-button:not(.collapsed) {
  color: #566a7f;
  background-color: #fff;
  box-shadow: inset 0 0 0 #d9dee3;
}
.accordion-button:not(.collapsed)::after {
  background-image: url("data:image/svg+xml,%3Csvg width='12' height='12' viewBox='0 0 12 12' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpath id='a' d='m1.532 12 6.182-6-6.182-6L0 1.487 4.65 6 0 10.513z'/%3E%3C/defs%3E%3Cg transform='translate%282.571%29' fill='none' fill-rule='evenodd'%3E%3Cuse fill='%23435971' xlink:href='%23a'/%3E%3Cuse fill-opacity='.1' fill='%23566a7f' xlink:href='%23a'/%3E%3C/g%3E%3C/svg%3E%0A");
  transform: rotate(90deg);
}
.accordion-button::after {
  flex-shrink: 0;
  width: 0.75rem;
  height: 0.75rem;
  margin-left: auto;
  content: "";
  background-image: url("data:image/svg+xml,%3Csvg width='12' height='12' viewBox='0 0 12 12' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpath id='a' d='m1.532 12 6.182-6-6.182-6L0 1.487 4.65 6 0 10.513z'/%3E%3C/defs%3E%3Cg transform='translate%282.571%29' fill='none' fill-rule='evenodd'%3E%3Cuse fill='%23435971' xlink:href='%23a'/%3E%3Cuse fill-opacity='.1' fill='%23566a7f' xlink:href='%23a'/%3E%3C/g%3E%3C/svg%3E%0A");
  background-repeat: no-repeat;
  background-size: 0.75rem;
  transition: transform 0.2s ease-in-out;
}
@media (prefers-reduced-motion: reduce) {
  .accordion-button::after {
    transition: none;
  }
}
.accordion-button:hover {
  z-index: 2;
}
.accordion-button:focus {
  z-index: 3;
  border-color: rgba(249, 249, 255, 0.54);
  outline: 0;
  box-shadow: none;
}

.accordion-header {
  margin-bottom: 0;
}

.accordion-item {
  background-color: #fff;
  border: 0 solid #d9dee3;
}
.accordion-item:first-of-type {
  border-top-left-radius: 0.375rem;
  border-top-right-radius: 0.375rem;
}
.accordion-item:first-of-type .accordion-button {
  border-top-left-radius: 0.375rem;
  border-top-right-radius: 0.375rem;
}
.accordion-item:not(:first-of-type) {
  border-top: 0;
}
.accordion-item:last-of-type {
  border-bottom-right-radius: 0.375rem;
  border-bottom-left-radius: 0.375rem;
}
.accordion-item:last-of-type .accordion-button.collapsed {
  border-bottom-right-radius: 0.375rem;
  border-bottom-left-radius: 0.375rem;
}
.accordion-item:last-of-type .accordion-collapse {
  border-bottom-right-radius: 0.375rem;
  border-bottom-left-radius: 0.375rem;
}

.accordion-body {
  padding: 0.79rem 1.125rem;
}

.accordion-flush .accordion-collapse {
  border-width: 0;
}
.accordion-flush .accordion-item {
  border-right: 0;
  border-left: 0;
  border-radius: 0;
}
.accordion-flush .accordion-item:first-child {
  border-top: 0;
}
.accordion-flush .accordion-item:last-child {
  border-bottom: 0;
}
.accordion-flush .accordion-item .accordion-button {
  border-radius: 0;
}

.breadcrumb {
  display: flex;
  flex-wrap: wrap;
  padding: 0 0;
  margin-bottom: 1rem;
  list-style: none;
  background-color: transparent;
}

.breadcrumb-item + .breadcrumb-item {
  padding-left: 0.5rem;
}
.breadcrumb-item + .breadcrumb-item::before {
  float: left;
  padding-right: 0.5rem;
  color: #a1acb8;
  content: var(--bs-breadcrumb-divider, "/") /* rtl: var(--bs-breadcrumb-divider, "\\") */;
}
.breadcrumb-item.active {
  color: #697a8d;
}

.pagination {
  display: flex;
  padding-left: 0;
  list-style: none;
}

.page-link {
  position: relative;
  display: block;
  color: #697a8d;
  background-color: #f0f2f4;
  border: 0px solid #d9dee3;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
@media (prefers-reduced-motion: reduce) {
  .page-link {
    transition: none;
  }
}
.page-link:hover {
  z-index: 2;
  color: #697a8d;
  background-color: #e1e4e8;
  border-color: rgba(67, 89, 113, 0.3);
}
.page-link:focus {
  z-index: 3;
  color: #697a8d;
  background-color: #e1e4e8;
  outline: 0;
  box-shadow: none;
}

.page-item:not(:first-child) .page-link {
  margin-left: 0.1875rem;
}
.page-item.active .page-link {
  z-index: 3;
  color: #fff;
  background-color: rgba(105, 108, 255, 0.08);
  border-color: rgba(105, 108, 255, 0.08);
}
.page-item.disabled .page-link {
  color: #a1acb8;
  pointer-events: none;
  background-color: #f7f8f9;
  border-color: rgba(67, 89, 113, 0.3);
}

.page-link {
  padding: 0.625rem 0.5125rem;
}

.page-item .page-link {
  border-radius: 0.25rem;
}

.pagination-lg .page-link {
  padding: 0.9375rem 0.5rem;
  font-size: 1rem;
}
.pagination-lg .page-item .page-link {
  border-radius: 0.5rem;
}

.pagination-sm .page-link {
  padding: 0.375rem 0.25rem;
  font-size: 0.75rem;
}
.pagination-sm .page-item .page-link {
  border-radius: 0.25rem;
}

.badge {
  display: inline-block;
  padding: 0.52em 0.593em;
  font-size: 0.8125em;
  font-weight: 500;
  line-height: 1;
  color: #fff;
  text-align: center;
  white-space: nowrap;
  vertical-align: baseline;
  border-radius: 0.25rem;
}
.badge:empty {
  display: none;
}

.btn .badge {
  position: relative;
  top: -1px;
}

.alert {
  position: relative;
  padding: 0.9375rem 0.9375rem;
  margin-bottom: 1rem;
  border: 0 solid transparent;
  border-radius: 0.375rem;
}

.alert-heading {
  color: inherit;
}

.alert-link {
  font-weight: 700;
}

.alert-dismissible {
  padding-right: 2.8125rem;
}
.alert-dismissible .btn-close {
  position: absolute;
  top: 0;
  right: 0;
  z-index: 2;
  padding: 1.171875rem 0.9375rem;
}

@-webkit-keyframes progress-bar-stripes {
  0% {
    background-position-x: 0.75rem;
  }
}

@keyframes progress-bar-stripes {
  0% {
    background-position-x: 0.75rem;
  }
}
.progress {
  display: flex;
  height: 0.75rem;
  overflow: hidden;
  font-size: 0.625rem;
  background-color: rgba(67, 89, 113, 0.1);
  border-radius: 10rem;
}

.progress-bar {
  display: flex;
  flex-direction: column;
  justify-content: center;
  overflow: hidden;
  color: #fff;
  text-align: center;
  white-space: nowrap;
  background-color: #696cff;
  transition: width 0.6s ease;
}
@media (prefers-reduced-motion: reduce) {
  .progress-bar {
    transition: none;
  }
}

.progress-bar-striped {
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
  background-size: 0.75rem 0.75rem;
}

.progress-bar-animated {
  -webkit-animation: 1s linear infinite progress-bar-stripes;
          animation: 1s linear infinite progress-bar-stripes;
}
@media (prefers-reduced-motion: reduce) {
  .progress-bar-animated {
    -webkit-animation: none;
            animation: none;
  }
}

.list-group {
  display: flex;
  flex-direction: column;
  padding-left: 0;
  margin-bottom: 0;
  border-radius: 0.5rem;
}

.list-group-numbered {
  list-style-type: none;
  counter-reset: section;
}
.list-group-numbered > li::before {
  content: counters(section, ".") ". ";
  counter-increment: section;
}

.list-group-item-action {
  width: 100%;
  color: #8e9baa;
  text-align: inherit;
}
.list-group-item-action:hover, .list-group-item-action:focus {
  z-index: 1;
  color: #697a8d;
  text-decoration: none;
  background-color: rgba(67, 89, 113, 0.06);
}
.list-group-item-action:active {
  color: #697a8d;
  background-color: rgba(67, 89, 113, 0.05);
}

.list-group-item {
  position: relative;
  display: block;
  padding: 0.58rem 0.9375rem;
  color: #697a8d;
  background-color: transparent;
  border: 1px solid #d9dee3;
}
.list-group-item:first-child {
  border-top-left-radius: inherit;
  border-top-right-radius: inherit;
}
.list-group-item:last-child {
  border-bottom-right-radius: inherit;
  border-bottom-left-radius: inherit;
}
.list-group-item.disabled, .list-group-item:disabled {
  color: #c7cdd4;
  pointer-events: none;
  background-color: transparent;
}
.list-group-item.active {
  z-index: 2;
  color: #fff;
  background-color: rgba(105, 108, 255, 0.08);
  border-color: rgba(105, 108, 255, 0.08);
}
.list-group-item + .list-group-item {
  border-top-width: 0;
}
.list-group-item + .list-group-item.active {
  margin-top: -1px;
  border-top-width: 1px;
}

.list-group-horizontal {
  flex-direction: row;
}
.list-group-horizontal > .list-group-item:first-child {
  border-bottom-left-radius: 0.5rem;
  border-top-right-radius: 0;
}
.list-group-horizontal > .list-group-item:last-child {
  border-top-right-radius: 0.5rem;
  border-bottom-left-radius: 0;
}
.list-group-horizontal > .list-group-item.active {
  margin-top: 0;
}
.list-group-horizontal > .list-group-item + .list-group-item {
  border-top-width: 1px;
  border-left-width: 0;
}
.list-group-horizontal > .list-group-item + .list-group-item.active {
  margin-left: -1px;
  border-left-width: 1px;
}

@media (min-width: 576px) {
  .list-group-horizontal-sm {
    flex-direction: row;
  }
  .list-group-horizontal-sm > .list-group-item:first-child {
    border-bottom-left-radius: 0.5rem;
    border-top-right-radius: 0;
  }
  .list-group-horizontal-sm > .list-group-item:last-child {
    border-top-right-radius: 0.5rem;
    border-bottom-left-radius: 0;
  }
  .list-group-horizontal-sm > .list-group-item.active {
    margin-top: 0;
  }
  .list-group-horizontal-sm > .list-group-item + .list-group-item {
    border-top-width: 1px;
    border-left-width: 0;
  }
  .list-group-horizontal-sm > .list-group-item + .list-group-item.active {
    margin-left: -1px;
    border-left-width: 1px;
  }
}
@media (min-width: 768px) {
  .list-group-horizontal-md {
    flex-direction: row;
  }
  .list-group-horizontal-md > .list-group-item:first-child {
    border-bottom-left-radius: 0.5rem;
    border-top-right-radius: 0;
  }
  .list-group-horizontal-md > .list-group-item:last-child {
    border-top-right-radius: 0.5rem;
    border-bottom-left-radius: 0;
  }
  .list-group-horizontal-md > .list-group-item.active {
    margin-top: 0;
  }
  .list-group-horizontal-md > .list-group-item + .list-group-item {
    border-top-width: 1px;
    border-left-width: 0;
  }
  .list-group-horizontal-md > .list-group-item + .list-group-item.active {
    margin-left: -1px;
    border-left-width: 1px;
  }
}
@media (min-width: 992px) {
  .list-group-horizontal-lg {
    flex-direction: row;
  }
  .list-group-horizontal-lg > .list-group-item:first-child {
    border-bottom-left-radius: 0.5rem;
    border-top-right-radius: 0;
  }
  .list-group-horizontal-lg > .list-group-item:last-child {
    border-top-right-radius: 0.5rem;
    border-bottom-left-radius: 0;
  }
  .list-group-horizontal-lg > .list-group-item.active {
    margin-top: 0;
  }
  .list-group-horizontal-lg > .list-group-item + .list-group-item {
    border-top-width: 1px;
    border-left-width: 0;
  }
  .list-group-horizontal-lg > .list-group-item + .list-group-item.active {
    margin-left: -1px;
    border-left-width: 1px;
  }
}
@media (min-width: 1200px) {
  .list-group-horizontal-xl {
    flex-direction: row;
  }
  .list-group-horizontal-xl > .list-group-item:first-child {
    border-bottom-left-radius: 0.5rem;
    border-top-right-radius: 0;
  }
  .list-group-horizontal-xl > .list-group-item:last-child {
    border-top-right-radius: 0.5rem;
    border-bottom-left-radius: 0;
  }
  .list-group-horizontal-xl > .list-group-item.active {
    margin-top: 0;
  }
  .list-group-horizontal-xl > .list-group-item + .list-group-item {
    border-top-width: 1px;
    border-left-width: 0;
  }
  .list-group-horizontal-xl > .list-group-item + .list-group-item.active {
    margin-left: -1px;
    border-left-width: 1px;
  }
}
@media (min-width: 1400px) {
  .list-group-horizontal-xxl {
    flex-direction: row;
  }
  .list-group-horizontal-xxl > .list-group-item:first-child {
    border-bottom-left-radius: 0.5rem;
    border-top-right-radius: 0;
  }
  .list-group-horizontal-xxl > .list-group-item:last-child {
    border-top-right-radius: 0.5rem;
    border-bottom-left-radius: 0;
  }
  .list-group-horizontal-xxl > .list-group-item.active {
    margin-top: 0;
  }
  .list-group-horizontal-xxl > .list-group-item + .list-group-item {
    border-top-width: 1px;
    border-left-width: 0;
  }
  .list-group-horizontal-xxl > .list-group-item + .list-group-item.active {
    margin-left: -1px;
    border-left-width: 1px;
  }
}
.list-group-flush {
  border-radius: 0;
}
.list-group-flush > .list-group-item {
  border-width: 0 0 1px;
}
.list-group-flush > .list-group-item:last-child {
  border-bottom-width: 0;
}

.btn-close {
  box-sizing: content-box;
  width: 0.8em;
  height: 0.8em;
  padding: 0.25em 0.25em;
  color: #a1acb8;
  background: transparent url("data:image/svg+xml,%3Csvg width='150px' height='151px' viewBox='0 0 150 151' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpolygon id='path-1' points='131.251657 0 74.9933705 56.25 18.7483426 0 0 18.75 56.2450278 75 0 131.25 18.7483426 150 74.9933705 93.75 131.251657 150 150 131.25 93.7549722 75 150 18.75'%3E%3C/polygon%3E%3C/defs%3E%3Cg id='🎨-%5BSetup%5D:-Colors-&amp;-Shadows' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Artboard' transform='translate%28-225.000000, -250.000000%29'%3E%3Cg id='Icon-Color' transform='translate%28225.000000, 250.500000%29'%3E%3Cuse fill='%23a1acb8' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.5' fill='%23a1acb8' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E") center/0.8em auto no-repeat;
  border: 0;
  border-radius: 0.375rem;
  opacity: 0.95;
}
.btn-close:hover {
  color: #a1acb8;
  text-decoration: none;
  opacity: 0.95;
}
.btn-close:focus {
  outline: 0;
  box-shadow: none;
  opacity: 0.95;
}
.btn-close:disabled, .btn-close.disabled {
  pointer-events: none;
  -webkit-user-select: none;
     -moz-user-select: none;
          user-select: none;
  opacity: 0.25;
}

.btn-close-white {
  filter: invert(1) grayscale(100%) brightness(200%);
}

.toast {
  width: 350px;
  max-width: 100%;
  font-size: 0.9375rem;
  pointer-events: auto;
  background-color: #fff;
  background-clip: padding-box;
  border: 0 solid rgba(67, 89, 113, 0.1);
  box-shadow: 0 0.25rem 1rem rgba(161, 172, 184, 0.45);
  border-radius: 0.5rem;
}
.toast.showing {
  opacity: 0;
}
.toast:not(.show) {
  display: none;
}

.toast-container {
  width: -webkit-max-content;
  width: -moz-max-content;
  width: max-content;
  max-width: 100%;
  pointer-events: none;
}
.toast-container > :not(:last-child) {
  margin-bottom: 1.25rem;
}

.toast-header {
  display: flex;
  align-items: center;
  padding: 1.25rem 1.25rem;
  color: #697a8d;
  background-color: transparent;
  background-clip: padding-box;
  border-bottom: 0 solid transparent;
  border-top-left-radius: 0.5rem;
  border-top-right-radius: 0.5rem;
}
.toast-header .btn-close {
  margin-right: -0.625rem;
  margin-left: 1.25rem;
}

.toast-body {
  padding: 1.25rem;
  word-wrap: break-word;
}

.modal {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1090;
  display: none;
  width: 100%;
  height: 100%;
  overflow-x: hidden;
  overflow-y: auto;
  outline: 0;
}

.modal-dialog {
  position: relative;
  width: auto;
  margin: 1.5rem;
  pointer-events: none;
}
.modal.fade .modal-dialog {
  transition: transform 0.15s ease-out;
  transform: translateY(-100px) scale(0.8);
}
@media (prefers-reduced-motion: reduce) {
  .modal.fade .modal-dialog {
    transition: none;
  }
}
.modal.show .modal-dialog {
  transform: translateY(0) scale(1);
}
.modal.modal-static .modal-dialog {
  transform: scale(1.02);
}

.modal-dialog-scrollable {
  height: calc(100% - 3rem);
}
.modal-dialog-scrollable .modal-content {
  max-height: 100%;
  overflow: hidden;
}
.modal-dialog-scrollable .modal-body {
  overflow-y: auto;
}

.modal-dialog-centered {
  display: flex;
  align-items: center;
  min-height: calc(100% - 3rem);
}

.modal-content {
  position: relative;
  display: flex;
  flex-direction: column;
  width: 100%;
  pointer-events: auto;
  background-color: #fff;
  background-clip: padding-box;
  border: 0px solid rgba(67, 89, 113, 0.2);
  border-radius: 0.5rem;
  outline: 0;
}



.modal-header {
  display: flex;
  flex-shrink: 0;
  align-items: center;
  justify-content: space-between;
  padding: 1.5rem 1.5rem 0.25rem;
  border-bottom: 0px solid #d9dee3;
  border-top-left-radius: calc(0.5rem - 0px);
  border-top-right-radius: calc(0.5rem - 0px);
}
.modal-header .btn-close {
  padding: 0.125rem 0.75rem;
  margin: -0.125rem -0.75rem -0.125rem auto;
}

.modal-title {
  margin-bottom: 0;
  line-height: 1.53;
}

.modal-body {
  position: relative;
  flex: 1 1 auto;
  padding: 1.5rem;
}

.modal-footer {
  display: flex;
  flex-wrap: wrap;
  flex-shrink: 0;
  align-items: center;
  justify-content: flex-end;
  padding: 1.25rem;
  border-top: 0px solid #d9dee3;
  border-bottom-right-radius: calc(0.5rem - 0px);
  border-bottom-left-radius: calc(0.5rem - 0px);
}
.modal-footer > * {
  margin: 0.25rem;
}

@media (min-width: 576px) {
  .modal-dialog {
    max-width: 35rem;
    margin: 1.75rem auto;
  }

  .modal-dialog-scrollable {
    height: calc(100% - 3.5rem);
  }

  .modal-dialog-centered {
    min-height: calc(100% - 3.5rem);
  }

  .modal-sm {
    max-width: 22.5rem;
  }
}
@media (min-width: 992px) {
  .modal-lg,
.modal-xl {
    max-width: 50rem;
  }
}
@media (min-width: 1200px) {
  .modal-xl {
    max-width: 1140px;
  }
}
.modal-fullscreen {
  width: 100vw;
  max-width: none;
  height: 100%;
  margin: 0;
}
.modal-fullscreen .modal-content {
  height: 100%;
  border: 0;
  border-radius: 0;
}
.modal-fullscreen .modal-header {
  border-radius: 0;
}
.modal-fullscreen .modal-body {
  overflow-y: auto;
}
.modal-fullscreen .modal-footer {
  border-radius: 0;
}

@media (max-width: 575.98px) {
  .modal-fullscreen-sm-down {
    width: 100vw;
    max-width: none;
    height: 100%;
    margin: 0;
  }
  .modal-fullscreen-sm-down .modal-content {
    height: 100%;
    border: 0;
    border-radius: 0;
  }
  .modal-fullscreen-sm-down .modal-header {
    border-radius: 0;
  }
  .modal-fullscreen-sm-down .modal-body {
    overflow-y: auto;
  }
  .modal-fullscreen-sm-down .modal-footer {
    border-radius: 0;
  }
}
@media (max-width: 767.98px) {
  .modal-fullscreen-md-down {
    width: 100vw;
    max-width: none;
    height: 100%;
    margin: 0;
  }
  .modal-fullscreen-md-down .modal-content {
    height: 100%;
    border: 0;
    border-radius: 0;
  }
  .modal-fullscreen-md-down .modal-header {
    border-radius: 0;
  }
  .modal-fullscreen-md-down .modal-body {
    overflow-y: auto;
  }
  .modal-fullscreen-md-down .modal-footer {
    border-radius: 0;
  }
}
@media (max-width: 991.98px) {
  .modal-fullscreen-lg-down {
    width: 100vw;
    max-width: none;
    height: 100%;
    margin: 0;
  }
  .modal-fullscreen-lg-down .modal-content {
    height: 100%;
    border: 0;
    border-radius: 0;
  }
  .modal-fullscreen-lg-down .modal-header {
    border-radius: 0;
  }
  .modal-fullscreen-lg-down .modal-body {
    overflow-y: auto;
  }
  .modal-fullscreen-lg-down .modal-footer {
    border-radius: 0;
  }
}
@media (max-width: 1199.98px) {
  .modal-fullscreen-xl-down {
    width: 100vw;
    max-width: none;
    height: 100%;
    margin: 0;
  }
  .modal-fullscreen-xl-down .modal-content {
    height: 100%;
    border: 0;
    border-radius: 0;
  }
  .modal-fullscreen-xl-down .modal-header {
    border-radius: 0;
  }
  .modal-fullscreen-xl-down .modal-body {
    overflow-y: auto;
  }
  .modal-fullscreen-xl-down .modal-footer {
    border-radius: 0;
  }
}
@media (max-width: 1399.98px) {
  .modal-fullscreen-xxl-down {
    width: 100vw;
    max-width: none;
    height: 100%;
    margin: 0;
  }
  .modal-fullscreen-xxl-down .modal-content {
    height: 100%;
    border: 0;
    border-radius: 0;
  }
  .modal-fullscreen-xxl-down .modal-header {
    border-radius: 0;
  }
  .modal-fullscreen-xxl-down .modal-body {
    overflow-y: auto;
  }
  .modal-fullscreen-xxl-down .modal-footer {
    border-radius: 0;
  }
}
.tooltip {
  position: absolute;
  z-index: 1099;
  display: block;
  margin: 0;
  font-family: var(--bs-font-sans-serif);
  font-style: normal;
  font-weight: 400;
  line-height: 1.53;
  text-align: left;
  text-align: start;
  text-decoration: none;
  text-shadow: none;
  text-transform: none;
  letter-spacing: normal;
  word-break: normal;
  word-spacing: normal;
  white-space: normal;
  line-break: auto;
  font-size: 0.9375rem;
  word-wrap: break-word;
  opacity: 0;
}
.tooltip.show {
  opacity: 1;
}
.tooltip .tooltip-arrow {
  position: absolute;
  display: block;
  width: 0.8rem;
  height: 0.4rem;
}
.tooltip .tooltip-arrow::before {
  position: absolute;
  content: "";
  border-color: transparent;
  border-style: solid;
}

.bs-tooltip-top, .bs-tooltip-auto[data-popper-placement^=top] {
  padding: 0.4rem 0;
}
.bs-tooltip-top .tooltip-arrow, .bs-tooltip-auto[data-popper-placement^=top] .tooltip-arrow {
  bottom: 0;
}
.bs-tooltip-top .tooltip-arrow::before, .bs-tooltip-auto[data-popper-placement^=top] .tooltip-arrow::before {
  top: -1px;
  border-width: 0.4rem 0.4rem 0;
  border-top-color: #233446;
}

.bs-tooltip-end, .bs-tooltip-auto[data-popper-placement^=right] {
  padding: 0 0.4rem;
}
.bs-tooltip-end .tooltip-arrow, .bs-tooltip-auto[data-popper-placement^=right] .tooltip-arrow {
  left: 0;
  width: 0.4rem;
  height: 0.8rem;
}
.bs-tooltip-end .tooltip-arrow::before, .bs-tooltip-auto[data-popper-placement^=right] .tooltip-arrow::before {
  right: -1px;
  border-width: 0.4rem 0.4rem 0.4rem 0;
  border-right-color: #233446;
}

.bs-tooltip-bottom, .bs-tooltip-auto[data-popper-placement^=bottom] {
  padding: 0.4rem 0;
}
.bs-tooltip-bottom .tooltip-arrow, .bs-tooltip-auto[data-popper-placement^=bottom] .tooltip-arrow {
  top: 0;
}
.bs-tooltip-bottom .tooltip-arrow::before, .bs-tooltip-auto[data-popper-placement^=bottom] .tooltip-arrow::before {
  bottom: -1px;
  border-width: 0 0.4rem 0.4rem;
  border-bottom-color: #233446;
}

.bs-tooltip-start, .bs-tooltip-auto[data-popper-placement^=left] {
  padding: 0 0.4rem;
}
.bs-tooltip-start .tooltip-arrow, .bs-tooltip-auto[data-popper-placement^=left] .tooltip-arrow {
  right: 0;
  width: 0.4rem;
  height: 0.8rem;
}
.bs-tooltip-start .tooltip-arrow::before, .bs-tooltip-auto[data-popper-placement^=left] .tooltip-arrow::before {
  left: -1px;
  border-width: 0.4rem 0 0.4rem 0.4rem;
  border-left-color: #233446;
}

.tooltip-inner {
  max-width: 200px;
  padding: 0.25rem 0.7rem;
  color: #fff;
  text-align: center;
  background-color: #233446;
  border-radius: 0.25rem;
}

.popover {
  position: absolute;
  top: 0;
  left: 0 /* rtl:ignore */;
  z-index: 1091;
  display: block;
  max-width: 276px;
  font-family: var(--bs-font-sans-serif);
  font-style: normal;
  font-weight: 400;
  line-height: 1.53;
  text-align: left;
  text-align: start;
  text-decoration: none;
  text-shadow: none;
  text-transform: none;
  letter-spacing: normal;
  word-break: normal;
  word-spacing: normal;
  white-space: normal;
  line-break: auto;
  font-size: 0.9375rem;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: padding-box;
  border: 0px solid rgba(67, 89, 113, 0.2);
  border-radius: 0.5rem;
}
.popover .popover-arrow {
  position: absolute;
  display: block;
  width: 1rem;
  height: 0.5rem;
}
.popover .popover-arrow::before, .popover .popover-arrow::after {
  position: absolute;
  display: block;
  content: "";
  border-color: transparent;
  border-style: solid;
}

.bs-popover-top > .popover-arrow, .bs-popover-auto[data-popper-placement^=top] > .popover-arrow {
  bottom: calc(-0.5rem - 0px);
}
.bs-popover-top > .popover-arrow::before, .bs-popover-auto[data-popper-placement^=top] > .popover-arrow::before {
  bottom: 0;
  border-width: 0.5rem 0.5rem 0;
  border-top-color: #fff;
}
.bs-popover-top > .popover-arrow::after, .bs-popover-auto[data-popper-placement^=top] > .popover-arrow::after {
  bottom: 0px;
  border-width: 0.5rem 0.5rem 0;
  border-top-color: #fff;
}

.bs-popover-end > .popover-arrow, .bs-popover-auto[data-popper-placement^=right] > .popover-arrow {
  left: calc(-0.5rem - 0px);
  width: 0.5rem;
  height: 1rem;
}
.bs-popover-end > .popover-arrow::before, .bs-popover-auto[data-popper-placement^=right] > .popover-arrow::before {
  left: 0;
  border-width: 0.5rem 0.5rem 0.5rem 0;
  border-right-color: #fff;
}
.bs-popover-end > .popover-arrow::after, .bs-popover-auto[data-popper-placement^=right] > .popover-arrow::after {
  left: 0px;
  border-width: 0.5rem 0.5rem 0.5rem 0;
  border-right-color: #fff;
}

.bs-popover-bottom > .popover-arrow, .bs-popover-auto[data-popper-placement^=bottom] > .popover-arrow {
  top: calc(-0.5rem - 0px);
}
.bs-popover-bottom > .popover-arrow::before, .bs-popover-auto[data-popper-placement^=bottom] > .popover-arrow::before {
  top: 0;
  border-width: 0 0.5rem 0.5rem 0.5rem;
  border-bottom-color: #fff;
}
.bs-popover-bottom > .popover-arrow::after, .bs-popover-auto[data-popper-placement^=bottom] > .popover-arrow::after {
  top: 0px;
  border-width: 0 0.5rem 0.5rem 0.5rem;
  border-bottom-color: #fff;
}
.bs-popover-bottom .popover-header::before, .bs-popover-auto[data-popper-placement^=bottom] .popover-header::before {
  position: absolute;
  top: 0;
  left: 50%;
  display: block;
  width: 1rem;
  margin-left: -0.5rem;
  content: "";
  border-bottom: 0px solid transparent;
}

.bs-popover-start > .popover-arrow, .bs-popover-auto[data-popper-placement^=left] > .popover-arrow {
  right: calc(-0.5rem - 0px);
  width: 0.5rem;
  height: 1rem;
}
.bs-popover-start > .popover-arrow::before, .bs-popover-auto[data-popper-placement^=left] > .popover-arrow::before {
  right: 0;
  border-width: 0.5rem 0 0.5rem 0.5rem;
  border-left-color: #fff;
}
.bs-popover-start > .popover-arrow::after, .bs-popover-auto[data-popper-placement^=left] > .popover-arrow::after {
  right: 0px;
  border-width: 0.5rem 0 0.5rem 0.5rem;
  border-left-color: #fff;
}

.popover-header {
  padding: 0 1.125rem;
  margin-bottom: 0;
  font-size: 0.9375rem;
  color: #566a7f;
  background-color: transparent;
  border-bottom: 0px solid rgba(67, 89, 113, 0.2);
  border-top-left-radius: calc(0.5rem - 0px);
  border-top-right-radius: calc(0.5rem - 0px);
}
.popover-header:empty {
  display: none;
}

.popover-body {
  padding: 1.125rem 1.125rem;
  color: #697a8d;
}

.carousel {
  position: relative;
}

.carousel.pointer-event {
  touch-action: pan-y;
}

.carousel-inner {
  position: relative;
  width: 100%;
  overflow: hidden;
}
.carousel-inner::after {
  display: block;
  clear: both;
  content: "";
}

.carousel-item {
  position: relative;
  display: none;
  float: left;
  width: 100%;
  margin-right: -100%;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  transition: transform 0.6s ease-in-out;
}
@media (prefers-reduced-motion: reduce) {
  .carousel-item {
    transition: none;
  }
}

.carousel-item.active,
.carousel-item-next,
.carousel-item-prev {
  display: block;
}

/* rtl:begin:ignore */
.carousel-item-next:not(.carousel-item-start),
.active.carousel-item-end {
  transform: translateX(100%);
}

.carousel-item-prev:not(.carousel-item-end),
.active.carousel-item-start {
  transform: translateX(-100%);
}

/* rtl:end:ignore */
.carousel-fade .carousel-item {
  opacity: 0;
  transition-property: opacity;
  transform: none;
}
.carousel-fade .carousel-item.active,
.carousel-fade .carousel-item-next.carousel-item-start,
.carousel-fade .carousel-item-prev.carousel-item-end {
  z-index: 1;
  opacity: 1;
}
.carousel-fade .active.carousel-item-start,
.carousel-fade .active.carousel-item-end {
  z-index: 0;
  opacity: 0;
  transition: opacity 0s 0.6s;
}
@media (prefers-reduced-motion: reduce) {
  .carousel-fade .active.carousel-item-start,
.carousel-fade .active.carousel-item-end {
    transition: none;
  }
}

.carousel-control-prev,
.carousel-control-next {
  position: absolute;
  top: 0;
  bottom: 0;
  z-index: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  width: 14%;
  padding: 0;
  color: #fff;
  text-align: center;
  background: none;
  border: 0;
  opacity: 1;
  transition: opacity 0.15s ease;
}
@media (prefers-reduced-motion: reduce) {
  .carousel-control-prev,
.carousel-control-next {
    transition: none;
  }
}
.carousel-control-prev:hover, .carousel-control-prev:focus,
.carousel-control-next:hover,
.carousel-control-next:focus {
  color: #fff;
  text-decoration: none;
  outline: 0;
  opacity: 1;
}

.carousel-control-prev {
  left: 0;
}

.carousel-control-next {
  right: 0;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
  display: inline-block;
  width: 2.55rem;
  height: 2.55rem;
  background-repeat: no-repeat;
  background-position: 50%;
  background-size: 100% 100%;
}

/* rtl:options: {
  "autoRename": true,
  "stringMap":[ {
    "name"    : "prev-next",
    "search"  : "prev",
    "replace" : "next"
  } ]
} */
.carousel-control-prev-icon {
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' style='fill: %23fff;transform: ;msFilter:;'%3E%3Cpath d='M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z'%3E%3C/path%3E%3C/svg%3E");
}

.carousel-control-next-icon {
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' style='fill: %23fff;transform: ;msFilter:;'%3E%3Cpath d='M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z'%3E%3C/path%3E%3C/svg%3E");
}

.carousel-indicators {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 2;
  display: flex;
  justify-content: center;
  padding: 0;
  margin-right: 14%;
  margin-bottom: 1rem;
  margin-left: 14%;
  list-style: none;
}
.carousel-indicators [data-bs-target] {
  box-sizing: content-box;
  flex: 0 1 auto;
  width: 30px;
  height: 3px;
  padding: 0;
  margin-right: 3px;
  margin-left: 3px;
  text-indent: -999px;
  cursor: pointer;
  background-color: #fff;
  background-clip: padding-box;
  border: 0;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  opacity: 0.5;
  transition: opacity 0.6s ease;
}
@media (prefers-reduced-motion: reduce) {
  .carousel-indicators [data-bs-target] {
    transition: none;
  }
}
.carousel-indicators .active {
  opacity: 1;
}

.carousel-caption {
  position: absolute;
  right: 15%;
  bottom: 1.25rem;
  left: 15%;
  padding-top: 1.25rem;
  padding-bottom: 1.25rem;
  color: #fff;
  text-align: center;
}

.carousel-dark .carousel-control-prev-icon,
.carousel-dark .carousel-control-next-icon {
  filter: invert(1) grayscale(100);
}
.carousel-dark .carousel-indicators [data-bs-target] {
  background-color: #435971;
}
.carousel-dark .carousel-caption {
  color: #435971;
}

@-webkit-keyframes spinner-border {
  to {
    transform: rotate(360deg) /* rtl:ignore */;
  }
}

@keyframes spinner-border {
  to {
    transform: rotate(360deg) /* rtl:ignore */;
  }
}
.spinner-border {
  display: inline-block;
  width: 2rem;
  height: 2rem;
  vertical-align: -0.125em;
  border: 0.25em solid currentColor;
  border-right-color: transparent;
  border-radius: 50%;
  -webkit-animation: 0.75s linear infinite spinner-border;
          animation: 0.75s linear infinite spinner-border;
}

.spinner-border-sm {
  width: 1rem;
  height: 1rem;
  border-width: 0.2em;
}

@-webkit-keyframes spinner-grow {
  0% {
    transform: scale(0);
  }
  50% {
    opacity: 1;
    transform: none;
  }
}

@keyframes spinner-grow {
  0% {
    transform: scale(0);
  }
  50% {
    opacity: 1;
    transform: none;
  }
}
.spinner-grow {
  display: inline-block;
  width: 2rem;
  height: 2rem;
  vertical-align: -0.125em;
  background-color: currentColor;
  border-radius: 50%;
  opacity: 0;
  -webkit-animation: 0.75s linear infinite spinner-grow;
          animation: 0.75s linear infinite spinner-grow;
}

.spinner-grow-sm {
  width: 1rem;
  height: 1rem;
}

@media (prefers-reduced-motion: reduce) {
  .spinner-border,
.spinner-grow {
    -webkit-animation-duration: 1.5s;
            animation-duration: 1.5s;
  }
}
.offcanvas {
  position: fixed;
  bottom: 0;
  z-index: 1090;
  display: flex;
  flex-direction: column;
  max-width: 100%;
  visibility: hidden;
  background-color: #fff;
  background-clip: padding-box;
  outline: 0;
  transition: transform 0.25s ease-in-out;
}
@media (prefers-reduced-motion: reduce) {
  .offcanvas {
    transition: none;
  }
}

.offcanvas-backdrop {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1089;
  width: 100vw;
  height: 100vh;
  background-color: #435971;
}
.offcanvas-backdrop.fade {
  opacity: 0;
}
.offcanvas-backdrop.show {
  opacity: 0.5;
}

.offcanvas-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 1.5rem 1.5rem;
}
.offcanvas-header .btn-close {
  padding: 0.75rem 0.75rem;
  margin-top: -0.75rem;
  margin-right: -0.75rem;
  margin-bottom: -0.75rem;
}

.offcanvas-title {
  margin-bottom: 0;
  line-height: 1.53;
}

.offcanvas-body {
  flex-grow: 1;
  padding: 1.5rem 1.5rem;
  overflow-y: auto;
}

.offcanvas-start {
  top: 0;
  left: 0;
  width: 400px;
  border-right: 0px solid rgba(67, 89, 113, 0.2);
  transform: translateX(-100%);
}

.offcanvas-end {
  top: 0;
  right: 0;
  width: 400px;
  border-left: 0px solid rgba(67, 89, 113, 0.2);
  transform: translateX(100%);
}

.offcanvas-top {
  top: 0;
  right: 0;
  left: 0;
  height: 30vh;
  max-height: 100%;
  border-bottom: 0px solid rgba(67, 89, 113, 0.2);
  transform: translateY(-100%);
}

.offcanvas-bottom {
  right: 0;
  left: 0;
  height: 30vh;
  max-height: 100%;
  border-top: 0px solid rgba(67, 89, 113, 0.2);
  transform: translateY(100%);
}

.offcanvas.show {
  transform: none;
}

.placeholder {
  display: inline-block;
  min-height: 1em;
  vertical-align: middle;
  cursor: wait;
  background-color: currentColor;
  opacity: 0.5;
}
.placeholder.btn::before {
  display: inline-block;
  content: "";
}

.placeholder-xs {
  min-height: 0.6em;
}

.placeholder-sm {
  min-height: 0.8em;
}

.placeholder-lg {
  min-height: 1.2em;
}

.placeholder-glow .placeholder {
  -webkit-animation: placeholder-glow 2s ease-in-out infinite;
          animation: placeholder-glow 2s ease-in-out infinite;
}

@-webkit-keyframes placeholder-glow {
  50% {
    opacity: 0.2;
  }
}

@keyframes placeholder-glow {
  50% {
    opacity: 0.2;
  }
}
.placeholder-wave {
  -webkit-mask-image: linear-gradient(130deg, #435971 55%, rgba(0, 0, 0, 0.8) 75%, #435971 95%);
          mask-image: linear-gradient(130deg, #435971 55%, rgba(0, 0, 0, 0.8) 75%, #435971 95%);
  -webkit-mask-size: 200% 100%;
          mask-size: 200% 100%;
  -webkit-animation: placeholder-wave 2s linear infinite;
          animation: placeholder-wave 2s linear infinite;
}

@-webkit-keyframes placeholder-wave {
  100% {
    -webkit-mask-position: -200% 0%;
            mask-position: -200% 0%;
  }
}

@keyframes placeholder-wave {
  100% {
    -webkit-mask-position: -200% 0%;
            mask-position: -200% 0%;
  }
}
.clearfix::after {
  display: block;
  clear: both;
  content: "";
}

.link-primary {
  color: #696cff;
}
.link-primary:hover, .link-primary:focus {
  color: #5f61e6;
}

.link-secondary {
  color: #8592a3;
}
.link-secondary:hover, .link-secondary:focus {
  color: #788393;
}

.link-success {
  color: #71dd37;
}
.link-success:hover, .link-success:focus {
  color: #66c732;
}

.link-info {
  color: #03c3ec;
}
.link-info:hover, .link-info:focus {
  color: #03b0d4;
}

.link-warning {
  color: #ffab00;
}
.link-warning:hover, .link-warning:focus {
  color: #e69a00;
}

.link-danger {
  color: #ff3e1d;
}
.link-danger:hover, .link-danger:focus {
  color: #e6381a;
}

.link-light {
  color: #fcfdfd;
}
.link-light:hover, .link-light:focus {
  color: #fcfdfd;
}

.link-dark {
  color: #233446;
}
.link-dark:hover, .link-dark:focus {
  color: #202f3f;
}

.link-gray {
  color: rgba(67, 89, 113, 0.1);
}
.link-gray:hover, .link-gray:focus {
  color: rgba(22, 29, 36, 0.19);
}

.ratio {
  position: relative;
  width: 100%;
}
.ratio::before {
  display: block;
  padding-top: var(--bs-aspect-ratio);
  content: "";
}
.ratio > * {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.ratio-1x1 {
  --bs-aspect-ratio: 100%;
}

.ratio-4x3 {
  --bs-aspect-ratio: 75%;
}

.ratio-16x9 {
  --bs-aspect-ratio: 56.25%;
}

.ratio-21x9 {
  --bs-aspect-ratio: 42.8571428571%;
}

.fixed-top {
  position: fixed;
  top: 0;
  right: 0;
  left: 0;
  z-index: 1030;
}

.fixed-bottom {
  position: fixed;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1030;
}

.sticky-top {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  z-index: 1020;
}

@media (min-width: 576px) {
  .sticky-sm-top {
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    z-index: 1020;
  }
}
@media (min-width: 768px) {
  .sticky-md-top {
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    z-index: 1020;
  }
}
@media (min-width: 992px) {
  .sticky-lg-top {
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    z-index: 1020;
  }
}
@media (min-width: 1200px) {
  .sticky-xl-top {
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    z-index: 1020;
  }
}
@media (min-width: 1400px) {
  .sticky-xxl-top {
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    z-index: 1020;
  }
}
.hstack {
  display: flex;
  flex-direction: row;
  align-items: center;
  align-self: stretch;
}

.vstack {
  display: flex;
  flex: 1 1 auto;
  flex-direction: column;
  align-self: stretch;
}

.visually-hidden,
.visually-hidden-focusable:not(:focus):not(:focus-within) {
  position: absolute ;
  width: 1px ;
  height: 1px ;
  padding: 0 ;
  margin: -1px ;
  overflow: hidden ;
  clip: rect(0, 0, 0, 0) ;
  white-space: nowrap ;
  border: 0 ;
}

.stretched-link::after {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 1;
  content: "";
}

.text-truncate {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

.vr {
  display: inline-block;
  align-self: stretch;
  width: 1px;
  min-height: 1em;
  background-color: currentColor;
  opacity: 1;
}

:root {
  color-scheme: light;
}

b,
strong {
  font-weight: 700;
}

a:not([href]) {
  color: inherit;
  text-decoration: none;
}
a:not([href]):hover {
  color: inherit;
  text-decoration: none;
}

input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
textarea:-webkit-autofill,
textarea:-webkit-autofill:hover,
textarea:-webkit-autofill:focus,
select:-webkit-autofill,
select:-webkit-autofill:hover,
select:-webkit-autofill:focus,
input:-internal-autofill-selected {
  background-clip: text ;
  -webkit-background-clip: text ;
}

.row-bordered {
  overflow: hidden;
}
.row-bordered > .col,
.row-bordered > [class^=col-],
.row-bordered > [class*=" col-"],
.row-bordered > [class^="col "],
.row-bordered > [class*=" col "],
.row-bordered > [class$=" col"],
.row-bordered > [class=col] {
  position: relative;
  padding-top: 1px;
}
.row-bordered > .col::before,
.row-bordered > [class^=col-]::before,
.row-bordered > [class*=" col-"]::before,
.row-bordered > [class^="col "]::before,
.row-bordered > [class*=" col "]::before,
.row-bordered > [class$=" col"]::before,
.row-bordered > [class=col]::before {
  content: "";
  position: absolute;
  right: 0;
  bottom: -1px;
  left: 0;
  display: block;
  height: 0;
  border-top: 1px solid #d9dee3;
}
.row-bordered > .col::after,
.row-bordered > [class^=col-]::after,
.row-bordered > [class*=" col-"]::after,
.row-bordered > [class^="col "]::after,
.row-bordered > [class*=" col "]::after,
.row-bordered > [class$=" col"]::after,
.row-bordered > [class=col]::after {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  left: -1px;
  display: block;
  width: 0;
  border-left: 1px solid #d9dee3;
}
.row-bordered.row-border-light > .col::before, .row-bordered.row-border-light > .col::after,
.row-bordered.row-border-light > [class^=col-]::before,
.row-bordered.row-border-light > [class^=col-]::after,
.row-bordered.row-border-light > [class*=" col-"]::before,
.row-bordered.row-border-light > [class*=" col-"]::after,
.row-bordered.row-border-light > [class^="col "]::before,
.row-bordered.row-border-light > [class^="col "]::after,
.row-bordered.row-border-light > [class*=" col "]::before,
.row-bordered.row-border-light > [class*=" col "]::after,
.row-bordered.row-border-light > [class$=" col"]::before,
.row-bordered.row-border-light > [class$=" col"]::after,
.row-bordered.row-border-light > [class=col]::before,
.row-bordered.row-border-light > [class=col]::after {
  border-color: rgba(67, 89, 113, 0.1);
}

.bg-label-secondary {
  background-color: #ebeef0 ;
  color: #8592a3 ;
}

.border-label-secondary {
  border: 3px solid #ced3da ;
}

.border-light-secondary {
  border: 3px solid rgba(133, 146, 163, 0.08);
}

.bg-label-success {
  background-color: #e8fadf ;
  color: #71dd37 ;
}

.border-label-success {
  border: 3px solid #c6f1af ;
}

.border-light-success {
  border: 3px solid rgba(113, 221, 55, 0.08);
}

.bg-label-info {
  background-color: #d7f5fc ;
  color: #03c3ec ;
}

.border-label-info {
  border: 3px solid #9ae7f7 ;
}

.border-light-info {
  border: 3px solid rgba(3, 195, 236, 0.08);
}

.bg-label-warning {
  background-color: #fff2d6 ;
  color: #ffab00 ;
}

.border-label-warning {
  border: 3px solid #ffdd99 ;
}

.border-light-warning {
  border: 3px solid rgba(255, 171, 0, 0.08);
}

.bg-label-danger {
  background-color: #ffe0db ;
  color: #ff3e1d ;
}

.border-label-danger {
  border: 3px solid #ffb2a5 ;
}

.border-light-danger {
  border: 3px solid rgba(255, 62, 29, 0.08);
}

.bg-label-light {
  background-color: white ;
  color: #fcfdfd ;
}

.border-label-light {
  border: 3px solid #fefefe ;
}

.border-light-light {
  border: 3px solid rgba(252, 253, 253, 0.08);
}

.bg-label-dark {
  background-color: #dcdfe1 ;
  color: #233446 ;
}

.border-label-dark {
  border: 3px solid #a7aeb5 ;
}

.border-light-dark {
  border: 3px solid rgba(35, 52, 70, 0.08);
}

.bg-label-gray {
  background-color: rgba(253, 253, 254, 0.856) ;
  color: rgba(67, 89, 113, 0.1) ;
}

.border-label-gray {
  border: 3px solid rgba(249, 249, 250, 0.64) ;
}

.border-light-gray {
  border: 3px solid rgba(67, 89, 113, 0.08);
}

a.bg-dark:hover, a.bg-dark:focus {
  background-color: rgba(67, 89, 113, 0.9) ;
}

a.bg-light:hover, a.bg-light:focus {
  background-color: rgba(67, 89, 113, 0.2) ;
}

a.bg-lighter:hover, a.bg-lighter:focus {
  background-color: rgba(67, 89, 113, 0.1) ;
}

a.bg-lightest:hover, a.bg-lightest:focus {
  background-color: rgba(67, 89, 113, 0.05) ;
}

.text-muted[href]:hover, .text-muted[href]:focus {
  color: #8e9baa ;
}

.text-light {
  color: #b4bdc6 ;
}
.text-light[href]:hover, .text-light[href]:focus {
  color: #8e9baa ;
}

.text-lighter {
  color: #c7cdd4 ;
}
.text-lighter[href]:hover, .text-lighter[href]:focus {
  color: #8e9baa ;
}

.text-lightest {
  color: #d9dee3 ;
}
.text-lightest[href]:hover, .text-lightest[href]:focus {
  color: #8e9baa ;
}

.invert-text-white {
  color: #fff ;
}

.invert-text-white[href]:hover:hover, .invert-text-white[href]:hover:focus {
  color: #fff ;
}

.invert-text-dark {
  color: #435971 ;
}

.invert-text-dark[href]:hover:hover, .invert-text-dark[href]:hover:focus {
  color: #435971 ;
}

.invert-bg-white {
  background-color: #fff ;
}

a.invert-bg-white:hover, a.invert-bg-white:focus {
  background-color: #fff ;
}

.invert-bg-dark {
  background-color: rgba(67, 89, 113, 0.9) ;
}

a.invert-bg-dark:hover, a.invert-bg-dark:focus {
  background-color: rgba(67, 89, 113, 0.9) ;
}

.invert-border-dark {
  border-color: #233446 ;
}

.invert-border-white {
  border-color: #fff ;
}

.container-p-x {
  padding-right: 1rem ;
  padding-left: 1rem ;
}
@media (min-width: 992px) {
  .container-p-x {
    padding-right: 1.625rem ;
    padding-left: 1.625rem ;
  }
}

.container-m-nx {
  margin-right: -1rem ;
  margin-left: -1rem ;
}
@media (min-width: 992px) {
  .container-m-nx {
    margin-right: -1.625rem ;
    margin-left: -1.625rem ;
  }
}

.container-p-y:not([class^=pt-]):not([class*=" pt-"]) {
  padding-top: 1.625rem ;
}
.container-p-y:not([class^=pb-]):not([class*=" pb-"]) {
  padding-bottom: 1.625rem ;
}

.container-m-ny:not([class^=mt-]):not([class*=" mt-"]) {
  margin-top: -1.625rem ;
}
.container-m-ny:not([class^=mb-]):not([class*=" mb-"]) {
  margin-bottom: -1.625rem ;
}

.cell-fit {
  width: 0.1%;
  white-space: nowrap;
}

.table-secondary {
  --bs-table-bg: #e7e9ed;
  --bs-table-striped-bg: #e2e5e9;
  --bs-table-striped-color: #435971;
  --bs-table-active-bg: #d7dbe1;
  --bs-table-active-color: #435971;
  --bs-table-hover-bg: #dde0e6;
  --bs-table-hover-color: #435971;
  color: #435971;
  border-color: #d7dbe1;
}
.table-secondary th {
  border-bottom-color: inherit ;
}
.table-secondary .btn-icon {
  color: #435971;
}

.table-success {
  --bs-table-bg: #e3f8d7;
  --bs-table-striped-bg: #def3d4;
  --bs-table-striped-color: #435971;
  --bs-table-active-bg: #d3e8cd;
  --bs-table-active-color: #435971;
  --bs-table-hover-bg: #d9eed1;
  --bs-table-hover-color: #435971;
  color: #435971;
  border-color: #d3e8cd;
}
.table-success th {
  border-bottom-color: inherit ;
}
.table-success .btn-icon {
  color: #435971;
}

.table-info {
  --bs-table-bg: #cdf3fb;
  --bs-table-striped-bg: #c9eef7;
  --bs-table-striped-color: #435971;
  --bs-table-active-bg: #bfe4ed;
  --bs-table-active-color: #435971;
  --bs-table-hover-bg: #c5eaf3;
  --bs-table-hover-color: #435971;
  color: #435971;
  border-color: #bfe4ed;
}
.table-info th {
  border-bottom-color: inherit ;
}
.table-info .btn-icon {
  color: #435971;
}

.table-warning {
  --bs-table-bg: #ffeecc;
  --bs-table-striped-bg: #f9eac9;
  --bs-table-striped-color: #435971;
  --bs-table-active-bg: #ecdfc3;
  --bs-table-active-color: #435971;
  --bs-table-hover-bg: #f4e5c7;
  --bs-table-hover-color: #435971;
  color: #435971;
  border-color: #ecdfc3;
}
.table-warning th {
  border-bottom-color: inherit ;
}
.table-warning .btn-icon {
  color: #435971;
}

.table-danger {
  --bs-table-bg: #ffd8d2;
  --bs-table-striped-bg: #f9d4cf;
  --bs-table-striped-color: #435971;
  --bs-table-active-bg: #eccbc8;
  --bs-table-active-color: #435971;
  --bs-table-hover-bg: #f4d0cc;
  --bs-table-hover-color: #435971;
  color: #435971;
  border-color: #eccbc8;
}
.table-danger th {
  border-bottom-color: inherit ;
}
.table-danger .btn-icon {
  color: #435971;
}

.table-light {
  --bs-table-bg: #fcfdfd;
  --bs-table-striped-bg: #f6f8f9;
  --bs-table-striped-color: #435971;
  --bs-table-active-bg: #eaedef;
  --bs-table-active-color: #435971;
  --bs-table-hover-bg: #f1f3f5;
  --bs-table-hover-color: #435971;
  color: #435971;
  border-color: #eaedef;
}
.table-light th {
  border-bottom-color: inherit ;
}
.table-light .btn-icon {
  color: #435971;
}

.table-dark {
  --bs-table-bg: #233446;
  --bs-table-striped-bg: #2a3a4c;
  --bs-table-striped-color: #fff;
  --bs-table-active-bg: #394859;
  --bs-table-active-color: #fff;
  --bs-table-hover-bg: #304051;
  --bs-table-hover-color: #fff;
  color: #fff;
  border-color: #394859;
}
.table-dark th {
  border-bottom-color: #394859 ;
}
.table-dark .btn-icon {
  color: #fff;
}

.card .table {
  margin-bottom: 0;
}

@supports (-moz-appearance: none) {
  .table .dropdown-menu.show {
    display: inline-table;
  }
}
.table th {
  text-transform: uppercase;
  font-size: 0.75rem;
  letter-spacing: 1px;
}
.table:not(.table-dark) th {
  color: #566a7f;
}

.table-border-bottom-0 tr:last-child td,
.table-border-bottom-0 tr:last-child th {
  border-bottom-width: 0;
}

.table.table-dark .btn.btn-icon {
  color: #d9dee3;
}

.table.table-flush-spacing thead tr > td:first-child,
.table.table-flush-spacing tbody tr > td:first-child {
  padding-left: 0;
}
.table.table-flush-spacing thead tr > td:last-child,
.table.table-flush-spacing tbody tr > td:last-child {
  padding-right: 0;
}

.nav-align-top .table:not(.table-dark),
.nav-align-top .table:not(.table-dark) thead:not(.table-dark) th,
.nav-align-top .table:not(.table-dark) tfoot:not(.table-dark) th,
.nav-align-top .table:not(.table-dark) td,
.nav-align-right .table:not(.table-dark),
.nav-align-right .table:not(.table-dark) thead:not(.table-dark) th,
.nav-align-right .table:not(.table-dark) tfoot:not(.table-dark) th,
.nav-align-right .table:not(.table-dark) td,
.nav-align-bottom .table:not(.table-dark),
.nav-align-bottom .table:not(.table-dark) thead:not(.table-dark) th,
.nav-align-bottom .table:not(.table-dark) tfoot:not(.table-dark) th,
.nav-align-bottom .table:not(.table-dark) td,
.nav-align-left .table:not(.table-dark),
.nav-align-left .table:not(.table-dark) thead:not(.table-dark) th,
.nav-align-left .table:not(.table-dark) tfoot:not(.table-dark) th,
.nav-align-left .table:not(.table-dark) td {
  border-color: #d9dee3;
}

.btn {
  cursor: pointer;
}
.btn.disabled, .btn:disabled {
  cursor: default;
}

.btn .badge {
  transition: all 0.2s ease-in-out;
}
@media (prefers-reduced-motion: reduce) {
  .btn .badge {
    transition: none;
  }
}

label.btn {
  margin-bottom: 0;
}

.btn-xl, .btn-group-xl > .btn {
  padding: 0.875rem 2.125rem;
  font-size: 1.25rem;
  border-radius: 0.625rem;
}

.btn-xs, .btn-group-xs > .btn {
  padding: 0 0.5rem;
  font-size: 0.75rem;
  border-radius: 0.125rem;
}

.btn-secondary {
  color: #fff;
  background-color: #8592a3;
  border-color: #8592a3;
  box-shadow: 0 0.125rem 0.25rem 0 rgba(133, 146, 163, 0.4);
}
.btn-secondary:hover {
  color: #fff;
  background-color: #788393;
  border-color: #788393;
  transform: translateY(-1px);
}
.btn-check:focus + .btn-secondary, .btn-secondary:focus, .btn-secondary.focus {
  color: #fff;
  background-color: #788393;
  border-color: #788393;
  transform: translateY(0);
  box-shadow: none;
}
.btn-check:checked + .btn-secondary, .btn-check:active + .btn-secondary, .btn-secondary:active, .btn-secondary.active, .show > .btn-secondary.dropdown-toggle {
  color: #fff;
  background-color: #717c8b;
  border-color: #717c8b;
}
.btn-check:checked + .btn-secondary:focus, .btn-check:active + .btn-secondary:focus, .btn-secondary:active:focus, .btn-secondary.active:focus, .show > .btn-secondary.dropdown-toggle:focus {
  box-shadow: none;
}
.btn-secondary.disabled, .btn-secondary:disabled {
  box-shadow: none;
}

.btn-outline-secondary {
  color: #8592a3;
  border-color: #8592a3;
  background: transparent;
}
.btn-outline-secondary:hover {
  color: #fff;
  background-color: #788393;
  border-color: #788393;
  box-shadow: 0 0.125rem 0.25rem 0 rgba(133, 146, 163, 0.4);
  transform: translateY(-1px);
}
.btn-check:focus + .btn-outline-secondary, .btn-outline-secondary:focus {
  color: #fff;
  background-color: #788393;
  border-color: #788393;
  box-shadow: none;
  transform: translateY(0);
}
.btn-check:checked + .btn-outline-secondary, .btn-check:active + .btn-outline-secondary, .btn-outline-secondary:active, .btn-outline-secondary.active, .btn-outline-secondary.dropdown-toggle.show {
  color: #fff;
  background-color: #717c8b;
  border-color: #717c8b;
}
.btn-check:checked + .btn-outline-secondary:focus, .btn-check:active + .btn-outline-secondary:focus, .btn-outline-secondary:active:focus, .btn-outline-secondary.active:focus, .btn-outline-secondary.dropdown-toggle.show:focus {
  box-shadow: none;
}
.btn-outline-secondary.disabled, .btn-outline-secondary:disabled {
  box-shadow: none;
}

.btn-outline-secondary .badge {
  background: #8592a3;
  border-color: #8592a3;
  color: #fff;
}

.btn-outline-secondary:hover .badge,
.btn-outline-secondary:focus:hover .badge,
.btn-outline-secondary:active .badge,
.btn-outline-secondary.active .badge,
.show > .btn-outline-secondary.dropdown-toggle .badge {
  background: #fff;
  border-color: #fff;
  color: #8592a3;
}

.btn-success {
  color: #fff;
  background-color: #71dd37;
  border-color: #71dd37;
  box-shadow: 0 0.125rem 0.25rem 0 rgba(113, 221, 55, 0.4);
}
.btn-success:hover {
  color: #fff;
  background-color: #66c732;
  border-color: #66c732;
  transform: translateY(-1px);
}
.btn-check:focus + .btn-success, .btn-success:focus, .btn-success.focus {
  color: #fff;
  background-color: #66c732;
  border-color: #66c732;
  transform: translateY(0);
  box-shadow: none;
}
.btn-check:checked + .btn-success, .btn-check:active + .btn-success, .btn-success:active, .btn-success.active, .show > .btn-success.dropdown-toggle {
  color: #fff;
  background-color: #60bc2f;
  border-color: #60bc2f;
}
.btn-check:checked + .btn-success:focus, .btn-check:active + .btn-success:focus, .btn-success:active:focus, .btn-success.active:focus, .show > .btn-success.dropdown-toggle:focus {
  box-shadow: none;
}
.btn-success.disabled, .btn-success:disabled {
  box-shadow: none;
}

.btn-outline-success {
  color: #71dd37;
  border-color: #71dd37;
  background: transparent;
}
.btn-outline-success:hover {
  color: #fff;
  background-color: #66c732;
  border-color: #66c732;
  box-shadow: 0 0.125rem 0.25rem 0 rgba(113, 221, 55, 0.4);
  transform: translateY(-1px);
}
.btn-check:focus + .btn-outline-success, .btn-outline-success:focus {
  color: #fff;
  background-color: #66c732;
  border-color: #66c732;
  box-shadow: none;
  transform: translateY(0);
}
.btn-check:checked + .btn-outline-success, .btn-check:active + .btn-outline-success, .btn-outline-success:active, .btn-outline-success.active, .btn-outline-success.dropdown-toggle.show {
  color: #fff;
  background-color: #60bc2f;
  border-color: #60bc2f;
}
.btn-check:checked + .btn-outline-success:focus, .btn-check:active + .btn-outline-success:focus, .btn-outline-success:active:focus, .btn-outline-success.active:focus, .btn-outline-success.dropdown-toggle.show:focus {
  box-shadow: none;
}
.btn-outline-success.disabled, .btn-outline-success:disabled {
  box-shadow: none;
}

.btn-outline-success .badge {
  background: #71dd37;
  border-color: #71dd37;
  color: #fff;
}

.btn-outline-success:hover .badge,
.btn-outline-success:focus:hover .badge,
.btn-outline-success:active .badge,
.btn-outline-success.active .badge,
.show > .btn-outline-success.dropdown-toggle .badge {
  background: #fff;
  border-color: #fff;
  color: #71dd37;
}

.btn-info {
  color: #fff;
  background-color: #03c3ec;
  border-color: #03c3ec;
  box-shadow: 0 0.125rem 0.25rem 0 rgba(3, 195, 236, 0.4);
}
.btn-info:hover {
  color: #fff;
  background-color: #03b0d4;
  border-color: #03b0d4;
  transform: translateY(-1px);
}
.btn-check:focus + .btn-info, .btn-info:focus, .btn-info.focus {
  color: #fff;
  background-color: #03b0d4;
  border-color: #03b0d4;
  transform: translateY(0);
  box-shadow: none;
}
.btn-check:checked + .btn-info, .btn-check:active + .btn-info, .btn-info:active, .btn-info.active, .show > .btn-info.dropdown-toggle {
  color: #fff;
  background-color: #03a6c9;
  border-color: #03a6c9;
}
.btn-check:checked + .btn-info:focus, .btn-check:active + .btn-info:focus, .btn-info:active:focus, .btn-info.active:focus, .show > .btn-info.dropdown-toggle:focus {
  box-shadow: none;
}
.btn-info.disabled, .btn-info:disabled {
  box-shadow: none;
}

.btn-outline-info {
  color: #03c3ec;
  border-color: #03c3ec;
  background: transparent;
}
.btn-outline-info:hover {
  color: #fff;
  background-color: #03b0d4;
  border-color: #03b0d4;
  box-shadow: 0 0.125rem 0.25rem 0 rgba(3, 195, 236, 0.4);
  transform: translateY(-1px);
}
.btn-check:focus + .btn-outline-info, .btn-outline-info:focus {
  color: #fff;
  background-color: #03b0d4;
  border-color: #03b0d4;
  box-shadow: none;
  transform: translateY(0);
}
.btn-check:checked + .btn-outline-info, .btn-check:active + .btn-outline-info, .btn-outline-info:active, .btn-outline-info.active, .btn-outline-info.dropdown-toggle.show {
  color: #fff;
  background-color: #03a6c9;
  border-color: #03a6c9;
}
.btn-check:checked + .btn-outline-info:focus, .btn-check:active + .btn-outline-info:focus, .btn-outline-info:active:focus, .btn-outline-info.active:focus, .btn-outline-info.dropdown-toggle.show:focus {
  box-shadow: none;
}
.btn-outline-info.disabled, .btn-outline-info:disabled {
  box-shadow: none;
}

.btn-outline-info .badge {
  background: #03c3ec;
  border-color: #03c3ec;
  color: #fff;
}

.btn-outline-info:hover .badge,
.btn-outline-info:focus:hover .badge,
.btn-outline-info:active .badge,
.btn-outline-info.active .badge,
.show > .btn-outline-info.dropdown-toggle .badge {
  background: #fff;
  border-color: #fff;
  color: #03c3ec;
}

.btn-warning {
  color: #fff;
  background-color: #ffab00;
  border-color: #ffab00;
  box-shadow: 0 0.125rem 0.25rem 0 rgba(255, 171, 0, 0.4);
}
.btn-warning:hover {
  color: #fff;
  background-color: #e69a00;
  border-color: #e69a00;
  transform: translateY(-1px);
}
.btn-check:focus + .btn-warning, .btn-warning:focus, .btn-warning.focus {
  color: #fff;
  background-color: #e69a00;
  border-color: #e69a00;
  transform: translateY(0);
  box-shadow: none;
}
.btn-check:checked + .btn-warning, .btn-check:active + .btn-warning, .btn-warning:active, .btn-warning.active, .show > .btn-warning.dropdown-toggle {
  color: #fff;
  background-color: #d99100;
  border-color: #d99100;
}
.btn-check:checked + .btn-warning:focus, .btn-check:active + .btn-warning:focus, .btn-warning:active:focus, .btn-warning.active:focus, .show > .btn-warning.dropdown-toggle:focus {
  box-shadow: none;
}
.btn-warning.disabled, .btn-warning:disabled {
  box-shadow: none;
}

.btn-outline-warning {
  color: #ffab00;
  border-color: #ffab00;
  background: transparent;
}
.btn-outline-warning:hover {
  color: #fff;
  background-color: #e69a00;
  border-color: #e69a00;
  box-shadow: 0 0.125rem 0.25rem 0 rgba(255, 171, 0, 0.4);
  transform: translateY(-1px);
}
.btn-check:focus + .btn-outline-warning, .btn-outline-warning:focus {
  color: #fff;
  background-color: #e69a00;
  border-color: #e69a00;
  box-shadow: none;
  transform: translateY(0);
}
.btn-check:checked + .btn-outline-warning, .btn-check:active + .btn-outline-warning, .btn-outline-warning:active, .btn-outline-warning.active, .btn-outline-warning.dropdown-toggle.show {
  color: #fff;
  background-color: #d99100;
  border-color: #d99100;
}
.btn-check:checked + .btn-outline-warning:focus, .btn-check:active + .btn-outline-warning:focus, .btn-outline-warning:active:focus, .btn-outline-warning.active:focus, .btn-outline-warning.dropdown-toggle.show:focus {
  box-shadow: none;
}
.btn-outline-warning.disabled, .btn-outline-warning:disabled {
  box-shadow: none;
}

.btn-outline-warning .badge {
  background: #ffab00;
  border-color: #ffab00;
  color: #fff;
}

.btn-outline-warning:hover .badge,
.btn-outline-warning:focus:hover .badge,
.btn-outline-warning:active .badge,
.btn-outline-warning.active .badge,
.show > .btn-outline-warning.dropdown-toggle .badge {
  background: #fff;
  border-color: #fff;
  color: #ffab00;
}

.btn-danger {
  color: #fff;
  background-color: #ff3e1d;
  border-color: #ff3e1d;
  box-shadow: 0 0.125rem 0.25rem 0 rgba(255, 62, 29, 0.4);
}
.btn-danger:hover {
  color: #fff;
  background-color: #e6381a;
  border-color: #e6381a;
  transform: translateY(-1px);
}
.btn-check:focus + .btn-danger, .btn-danger:focus, .btn-danger.focus {
  color: #fff;
  background-color: #e6381a;
  border-color: #e6381a;
  transform: translateY(0);
  box-shadow: none;
}
.btn-check:checked + .btn-danger, .btn-check:active + .btn-danger, .btn-danger:active, .btn-danger.active, .show > .btn-danger.dropdown-toggle {
  color: #fff;
  background-color: #d93519;
  border-color: #d93519;
}
.btn-check:checked + .btn-danger:focus, .btn-check:active + .btn-danger:focus, .btn-danger:active:focus, .btn-danger.active:focus, .show > .btn-danger.dropdown-toggle:focus {
  box-shadow: none;
}
.btn-danger.disabled, .btn-danger:disabled {
  box-shadow: none;
}

.btn-outline-danger {
  color: #ff3e1d;
  border-color: #ff3e1d;
  background: transparent;
}
.btn-outline-danger:hover {
  color: #fff;
  background-color: #e6381a;
  border-color: #e6381a;
  box-shadow: 0 0.125rem 0.25rem 0 rgba(255, 62, 29, 0.4);
  transform: translateY(-1px);
}
.btn-check:focus + .btn-outline-danger, .btn-outline-danger:focus {
  color: #fff;
  background-color: #e6381a;
  border-color: #e6381a;
  box-shadow: none;
  transform: translateY(0);
}
.btn-check:checked + .btn-outline-danger, .btn-check:active + .btn-outline-danger, .btn-outline-danger:active, .btn-outline-danger.active, .btn-outline-danger.dropdown-toggle.show {
  color: #fff;
  background-color: #d93519;
  border-color: #d93519;
}
.btn-check:checked + .btn-outline-danger:focus, .btn-check:active + .btn-outline-danger:focus, .btn-outline-danger:active:focus, .btn-outline-danger.active:focus, .btn-outline-danger.dropdown-toggle.show:focus {
  box-shadow: none;
}
.btn-outline-danger.disabled, .btn-outline-danger:disabled {
  box-shadow: none;
}

.btn-outline-danger .badge {
  background: #ff3e1d;
  border-color: #ff3e1d;
  color: #fff;
}

.btn-outline-danger:hover .badge,
.btn-outline-danger:focus:hover .badge,
.btn-outline-danger:active .badge,
.btn-outline-danger.active .badge,
.show > .btn-outline-danger.dropdown-toggle .badge {
  background: #fff;
  border-color: #fff;
  color: #ff3e1d;
}

.btn-light {
  color: #435971;
  background-color: #fcfdfd;
  border-color: #fcfdfd;
  box-shadow: 0 0.125rem 0.25rem 0 rgba(252, 253, 253, 0.4);
}
.btn-light:hover {
  color: #435971;
  background-color: #fcfdfd;
  border-color: #fcfdfd;
  transform: translateY(-1px);
}
.btn-check:focus + .btn-light, .btn-light:focus, .btn-light.focus {
  color: #435971;
  background-color: #fcfdfd;
  border-color: #fcfdfd;
  transform: translateY(0);
  box-shadow: none;
}
.btn-check:checked + .btn-light, .btn-check:active + .btn-light, .btn-light:active, .btn-light.active, .show > .btn-light.dropdown-toggle {
  color: #435971;
  background-color: #fcfdfd;
  border-color: #fcfdfd;
}
.btn-check:checked + .btn-light:focus, .btn-check:active + .btn-light:focus, .btn-light:active:focus, .btn-light.active:focus, .show > .btn-light.dropdown-toggle:focus {
  box-shadow: none;
}
.btn-light.disabled, .btn-light:disabled {
  box-shadow: none;
}

.btn-outline-light {
  color: #fcfdfd;
  border-color: #fcfdfd;
  background: transparent;
}
.btn-outline-light:hover {
  color: #435971;
  background-color: #fcfdfd;
  border-color: #fcfdfd;
  box-shadow: 0 0.125rem 0.25rem 0 rgba(252, 253, 253, 0.4);
  transform: translateY(-1px);
}
.btn-check:focus + .btn-outline-light, .btn-outline-light:focus {
  color: #435971;
  background-color: #fcfdfd;
  border-color: #fcfdfd;
  box-shadow: none;
  transform: translateY(0);
}
.btn-check:checked + .btn-outline-light, .btn-check:active + .btn-outline-light, .btn-outline-light:active, .btn-outline-light.active, .btn-outline-light.dropdown-toggle.show {
  color: #435971;
  background-color: #fcfdfd;
  border-color: #fcfdfd;
}
.btn-check:checked + .btn-outline-light:focus, .btn-check:active + .btn-outline-light:focus, .btn-outline-light:active:focus, .btn-outline-light.active:focus, .btn-outline-light.dropdown-toggle.show:focus {
  box-shadow: none;
}
.btn-outline-light.disabled, .btn-outline-light:disabled {
  box-shadow: none;
}

.btn-outline-light .badge {
  background: #fcfdfd;
  border-color: #fcfdfd;
  color: #435971;
}

.btn-outline-light:hover .badge,
.btn-outline-light:focus:hover .badge,
.btn-outline-light:active .badge,
.btn-outline-light.active .badge,
.show > .btn-outline-light.dropdown-toggle .badge {
  background: #435971;
  border-color: #435971;
  color: #fcfdfd;
}

.btn-dark {
  color: #fff;
  background-color: #233446;
  border-color: #233446;
  box-shadow: 0 0.125rem 0.25rem 0 rgba(35, 52, 70, 0.4);
}
.btn-dark:hover {
  color: #fff;
  background-color: #202f3f;
  border-color: #202f3f;
  transform: translateY(-1px);
}
.btn-check:focus + .btn-dark, .btn-dark:focus, .btn-dark.focus {
  color: #fff;
  background-color: #202f3f;
  border-color: #202f3f;
  transform: translateY(0);
  box-shadow: none;
}
.btn-check:checked + .btn-dark, .btn-check:active + .btn-dark, .btn-dark:active, .btn-dark.active, .show > .btn-dark.dropdown-toggle {
  color: #fff;
  background-color: #1e2c3c;
  border-color: #1e2c3c;
}
.btn-check:checked + .btn-dark:focus, .btn-check:active + .btn-dark:focus, .btn-dark:active:focus, .btn-dark.active:focus, .show > .btn-dark.dropdown-toggle:focus {
  box-shadow: none;
}
.btn-dark.disabled, .btn-dark:disabled {
  box-shadow: none;
}

.btn-outline-dark {
  color: #233446;
  border-color: #233446;
  background: transparent;
}
.btn-outline-dark:hover {
  color: #fff;
  background-color: #202f3f;
  border-color: #202f3f;
  box-shadow: 0 0.125rem 0.25rem 0 rgba(35, 52, 70, 0.4);
  transform: translateY(-1px);
}
.btn-check:focus + .btn-outline-dark, .btn-outline-dark:focus {
  color: #fff;
  background-color: #202f3f;
  border-color: #202f3f;
  box-shadow: none;
  transform: translateY(0);
}
.btn-check:checked + .btn-outline-dark, .btn-check:active + .btn-outline-dark, .btn-outline-dark:active, .btn-outline-dark.active, .btn-outline-dark.dropdown-toggle.show {
  color: #fff;
  background-color: #1e2c3c;
  border-color: #1e2c3c;
}
.btn-check:checked + .btn-outline-dark:focus, .btn-check:active + .btn-outline-dark:focus, .btn-outline-dark:active:focus, .btn-outline-dark.active:focus, .btn-outline-dark.dropdown-toggle.show:focus {
  box-shadow: none;
}
.btn-outline-dark.disabled, .btn-outline-dark:disabled {
  box-shadow: none;
}

.btn-outline-dark .badge {
  background: #233446;
  border-color: #233446;
  color: #fff;
}

.btn-outline-dark:hover .badge,
.btn-outline-dark:focus:hover .badge,
.btn-outline-dark:active .badge,
.btn-outline-dark.active .badge,
.show > .btn-outline-dark.dropdown-toggle .badge {
  background: #fff;
  border-color: #fff;
  color: #233446;
}

.btn-gray {
  color: #fff;
  background-color: rgba(67, 89, 113, 0.1);
  border-color: rgba(67, 89, 113, 0.1);
  box-shadow: 0 0.125rem 0.25rem 0 rgba(67, 89, 113, 0.4);
}
.btn-gray:hover {
  color: #fff;
  background-color: rgba(22, 29, 36, 0.19);
  border-color: rgba(22, 29, 36, 0.19);
  transform: translateY(-1px);
}
.btn-check:focus + .btn-gray, .btn-gray:focus, .btn-gray.focus {
  color: #fff;
  background-color: rgba(22, 29, 36, 0.19);
  border-color: rgba(22, 29, 36, 0.19);
  transform: translateY(0);
  box-shadow: none;
}
.btn-check:checked + .btn-gray, .btn-check:active + .btn-gray, .btn-gray:active, .btn-gray.active, .show > .btn-gray.dropdown-toggle {
  color: #fff;
  background-color: rgba(15, 20, 26, 0.235);
  border-color: rgba(15, 20, 26, 0.235);
}
.btn-check:checked + .btn-gray:focus, .btn-check:active + .btn-gray:focus, .btn-gray:active:focus, .btn-gray.active:focus, .show > .btn-gray.dropdown-toggle:focus {
  box-shadow: none;
}
.btn-gray.disabled, .btn-gray:disabled {
  box-shadow: none;
}

.btn-outline-gray {
  color: rgba(67, 89, 113, 0.1);
  border-color: rgba(67, 89, 113, 0.1);
  background: transparent;
}
.btn-outline-gray:hover {
  color: #fff;
  background-color: rgba(22, 29, 36, 0.19);
  border-color: rgba(22, 29, 36, 0.19);
  box-shadow: 0 0.125rem 0.25rem 0 rgba(67, 89, 113, 0.4);
  transform: translateY(-1px);
}
.btn-check:focus + .btn-outline-gray, .btn-outline-gray:focus {
  color: #fff;
  background-color: rgba(22, 29, 36, 0.19);
  border-color: rgba(22, 29, 36, 0.19);
  box-shadow: none;
  transform: translateY(0);
}
.btn-check:checked + .btn-outline-gray, .btn-check:active + .btn-outline-gray, .btn-outline-gray:active, .btn-outline-gray.active, .btn-outline-gray.dropdown-toggle.show {
  color: #fff;
  background-color: rgba(15, 20, 26, 0.235);
  border-color: rgba(15, 20, 26, 0.235);
}
.btn-check:checked + .btn-outline-gray:focus, .btn-check:active + .btn-outline-gray:focus, .btn-outline-gray:active:focus, .btn-outline-gray.active:focus, .btn-outline-gray.dropdown-toggle.show:focus {
  box-shadow: none;
}
.btn-outline-gray.disabled, .btn-outline-gray:disabled {
  box-shadow: none;
}

.btn-outline-gray .badge {
  background: rgba(67, 89, 113, 0.1);
  border-color: rgba(67, 89, 113, 0.1);
  color: #fff;
}

.btn-outline-gray:hover .badge,
.btn-outline-gray:focus:hover .badge,
.btn-outline-gray:active .badge,
.btn-outline-gray.active .badge,
.show > .btn-outline-gray.dropdown-toggle .badge {
  background: #fff;
  border-color: #fff;
  color: #435971;
}

.btn-icon {
  padding: 0;
  width: calc(2.309375rem + 2px);
  height: calc(2.309375rem + 2px);
  display: inline-flex;
  flex-shrink: 0;
  justify-content: center;
  align-items: center;
}
.btn-icon.btn-xl, .btn-group-xl > .btn-icon.btn {
  width: calc(3.625rem + 2px);
  height: calc(3.625rem + 2px);
}
.btn-icon.btn-xl > span, .btn-group-xl > .btn-icon.btn > span {
  font-size: 1.25rem;
}
.btn-icon.btn-lg, .btn-group-lg > .btn-icon.btn {
  width: calc(3rem + 2px);
  height: calc(3rem + 2px);
  font-size: 1rem;
}
.btn-icon.btn-sm, .btn-group-sm > .btn-icon.btn {
  width: calc(1.625rem + 2px);
  height: calc(1.625rem + 2px);
  font-size: 0.75rem;
}
.btn-icon.btn-xs, .btn-group-xs > .btn-icon.btn {
  width: calc(1.125rem + 2px);
  height: calc(1.125rem + 2px);
  font-size: 0.75rem;
}

.btn.borderless:not(.active):not(:active):not(:hover):not(:focus), :not(.show) > .btn.borderless.dropdown-toggle:not(:hover):not(:focus) {
  border-color: transparent;
  box-shadow: none;
}

.btn.btn-link {
  font-size: inherit;
}

.btn-pinned {
  position: absolute;
  top: 0.75rem;
  right: 0.75rem;
}

button:focus {
  outline: none;
}

.dropdown-toggle-split,
.btn-lg + .dropdown-toggle-split,
.btn-group-lg > .btn + .dropdown-toggle-split,
.input-group-lg .btn + .dropdown-toggle-split,
.btn-xl + .dropdown-toggle-split,
.btn-group-xl > .btn + .dropdown-toggle-split {
  padding-right: 0.7em;
  padding-left: 0.7em;
}

.btn-sm + .dropdown-toggle-split,
.btn-group-sm > .btn + .dropdown-toggle-split,
.input-group-sm .btn + .dropdown-toggle-split {
  padding-right: 0.6em;
  padding-left: 0.6em;
}

.btn-xs + .dropdown-toggle-split,
.btn-group-xs > .btn + .dropdown-toggle-split {
  padding-right: 0.5em;
  padding-left: 0.5em;
}

.btn-group > .btn-group:first-child > .btn:not([class*=btn-outline-]):first-child,
.input-group > .btn:not([class*=btn-outline-]):first-child,
:not(.btn-group):not(.input-group) > .btn-group > .btn:not([class*=btn-outline-]):first-child,
.input-group > .btn-group:first-child > .btn:not([class*=btn-outline-]):first-child {
  border-left-color: transparent;
}

.btn-group > .btn-group:last-child > .btn:not([class*=btn-outline-]):last-of-type,
.input-group > .btn:not([class*=btn-outline-]):last-of-type,
:not(.btn-group):not(.input-group) > .btn-group > .btn:not([class*=btn-outline-]):last-of-type,
.input-group > .btn-group:last-child > .btn:not([class*=btn-outline-]):last-of-type {
  border-right-color: transparent;
}

.badge {
  text-transform: uppercase;
  line-height: 0.75;
}

.badge-center {
  display: inline-flex;
  justify-content: center;
  align-items: center;
  height: 1.5rem;
  width: 1.5rem;
  font-size: 0.8125em;
}
.badge-center i {
  font-size: 0.8rem;
}

[data-trigger=hover] {
  outline: 0;
}

.dropdown-menu {
  margin: 0.125rem 0;
  box-shadow: 0 0.25rem 1rem rgba(161, 172, 184, 0.45);
  -webkit-animation: dropdownAnimation 0.1s;
          animation: dropdownAnimation 0.1s;
}
.mega-dropdown > .dropdown-menu {
  left: 0 ;
  right: 0 ;
}
.dropdown-menu .badge[class^=float-],
.dropdown-menu .badge[class*=" float-"] {
  position: relative;
  top: 0.071em;
}

.dropdown-item {
  line-height: 1.54;
}

.dropdown-toggle.hide-arrow::before, .dropdown-toggle.hide-arrow::after,
.dropdown-toggle-hide-arrow > .dropdown-toggle::before,
.dropdown-toggle-hide-arrow > .dropdown-toggle::after {
  display: none;
}

.dropdown-toggle::after {
  margin-top: -0.28em;
  width: 0.42em;
  height: 0.42em;
  border: 1px solid;
  border-top: 0;
  border-left: 0;
  transform: rotate(45deg);
}

.dropend .dropdown-toggle::after {
  margin-top: -0.168em;
  width: 0.42em;
  height: 0.42em;
  border: 1px solid;
  border-top: 0;
  border-left: 0;
  transform: rotate(-45deg);
}

.dropstart .dropdown-toggle::before {
  margin-top: -0.168em;
  width: 0.42em;
  height: 0.42em;
  border: 1px solid;
  border-top: 0;
  border-right: 0;
  transform: rotate(45deg);
}

.dropup .dropdown-toggle::after {
  margin-top: 0;
  width: 0.42em;
  height: 0.42em;
  border: 1px solid;
  border-bottom: 0;
  border-left: 0;
  transform: rotate(-45deg);
}

.dropstart .dropdown-toggle::before,
.dropend .dropdown-toggle::after {
  vertical-align: middle;
}

.nav .nav-item,
.nav .nav-link,
.tab-pane,
.tab-pane .card-body {
  outline: none ;
}

.nav-tabs .nav-item .nav-link {
  color: #566a7f;
  border: 0;
  border-radius: 0;
}
.nav-tabs .nav-item .nav-link:hover, .nav-tabs .nav-item .nav-link:focus {
  color: #566a7f;
}
.nav-tabs .nav-item .nav-link:not(.active) {
  background-color: #eceef1;
}
.nav-tabs .nav-item .nav-link.disabled {
  color: #c7cdd4;
}

.nav-tabs:not(.nav-fill):not(.nav-justified) .nav-link,
.nav-pills:not(.nav-fill):not(.nav-justified) .nav-link {
  width: 100%;
}

.nav-pills .nav-link:not(.active, .disabled) {
  color: #566a7f;
}

.tab-content {
  padding: 1.5rem;
  border-radius: 0.375rem;
}

.nav-scrollable {
  display: -webkit-inline-box;
  display: -moz-inline-box;
  width: 100%;
  overflow-y: auto;
  flex-wrap: nowrap;
}

.nav-tabs .nav-link {
  background-clip: padding-box;
}
.nav-tabs .nav-link.active {
  border-bottom-color: #fff;
}
.nav-tabs .nav-link.active:hover, .nav-tabs .nav-link.active:focus {
  border-bottom-color: #fff;
}
.nav-tabs .nav-link:hover, .nav-tabs .nav-link:focus {
  border-bottom-color: transparent;
}

.nav-sm > .nav .nav-link, .nav-sm.nav .nav-link {
  padding: 0.3125rem 0.875rem;
  font-size: 0.75rem;
  line-height: 1.5;
}

.nav-lg > .nav .nav-link, .nav-lg.nav .nav-link {
  padding: 0.875rem 1.3125rem;
  font-size: 1rem;
  line-height: 1.5;
}

.nav-align-top,
.nav-align-right,
.nav-align-bottom,
.nav-align-left {
  display: flex;
}
.nav-align-top > .nav,
.nav-align-top > div > .nav,
.nav-align-right > .nav,
.nav-align-right > div > .nav,
.nav-align-bottom > .nav,
.nav-align-bottom > div > .nav,
.nav-align-left > .nav,
.nav-align-left > div > .nav {
  border: 0;
  z-index: 1;
  position: relative;
}
.nav-align-top > .nav .nav-link:hover, .nav-align-top > .nav .nav-link:focus,
.nav-align-top > div > .nav .nav-link:hover,
.nav-align-top > div > .nav .nav-link:focus,
.nav-align-right > .nav .nav-link:hover,
.nav-align-right > .nav .nav-link:focus,
.nav-align-right > div > .nav .nav-link:hover,
.nav-align-right > div > .nav .nav-link:focus,
.nav-align-bottom > .nav .nav-link:hover,
.nav-align-bottom > .nav .nav-link:focus,
.nav-align-bottom > div > .nav .nav-link:hover,
.nav-align-bottom > div > .nav .nav-link:focus,
.nav-align-left > .nav .nav-link:hover,
.nav-align-left > .nav .nav-link:focus,
.nav-align-left > div > .nav .nav-link:hover,
.nav-align-left > div > .nav .nav-link:focus {
  isolation: auto;
}
.nav-align-top .row-bordered > [class^=col-]::before, .nav-align-top .row-bordered > [class^=col-]::after,
.nav-align-top .row-bordered > [class*=" col-"]::before,
.nav-align-top .row-bordered > [class*=" col-"]::after,
.nav-align-top .row-bordered > [class^="col "]::before,
.nav-align-top .row-bordered > [class^="col "]::after,
.nav-align-top .row-bordered > [class*=" col "]::before,
.nav-align-top .row-bordered > [class*=" col "]::after,
.nav-align-top .row-bordered > [class$=" col"]::before,
.nav-align-top .row-bordered > [class$=" col"]::after,
.nav-align-top .row-bordered > [class=col]::before,
.nav-align-top .row-bordered > [class=col]::after,
.nav-align-right .row-bordered > [class^=col-]::before,
.nav-align-right .row-bordered > [class^=col-]::after,
.nav-align-right .row-bordered > [class*=" col-"]::before,
.nav-align-right .row-bordered > [class*=" col-"]::after,
.nav-align-right .row-bordered > [class^="col "]::before,
.nav-align-right .row-bordered > [class^="col "]::after,
.nav-align-right .row-bordered > [class*=" col "]::before,
.nav-align-right .row-bordered > [class*=" col "]::after,
.nav-align-right .row-bordered > [class$=" col"]::before,
.nav-align-right .row-bordered > [class$=" col"]::after,
.nav-align-right .row-bordered > [class=col]::before,
.nav-align-right .row-bordered > [class=col]::after,
.nav-align-bottom .row-bordered > [class^=col-]::before,
.nav-align-bottom .row-bordered > [class^=col-]::after,
.nav-align-bottom .row-bordered > [class*=" col-"]::before,
.nav-align-bottom .row-bordered > [class*=" col-"]::after,
.nav-align-bottom .row-bordered > [class^="col "]::before,
.nav-align-bottom .row-bordered > [class^="col "]::after,
.nav-align-bottom .row-bordered > [class*=" col "]::before,
.nav-align-bottom .row-bordered > [class*=" col "]::after,
.nav-align-bottom .row-bordered > [class$=" col"]::before,
.nav-align-bottom .row-bordered > [class$=" col"]::after,
.nav-align-bottom .row-bordered > [class=col]::before,
.nav-align-bottom .row-bordered > [class=col]::after,
.nav-align-left .row-bordered > [class^=col-]::before,
.nav-align-left .row-bordered > [class^=col-]::after,
.nav-align-left .row-bordered > [class*=" col-"]::before,
.nav-align-left .row-bordered > [class*=" col-"]::after,
.nav-align-left .row-bordered > [class^="col "]::before,
.nav-align-left .row-bordered > [class^="col "]::after,
.nav-align-left .row-bordered > [class*=" col "]::before,
.nav-align-left .row-bordered > [class*=" col "]::after,
.nav-align-left .row-bordered > [class$=" col"]::before,
.nav-align-left .row-bordered > [class$=" col"]::after,
.nav-align-left .row-bordered > [class=col]::before,
.nav-align-left .row-bordered > [class=col]::after {
  border-color: #d9dee3;
}

.nav-align-right,
.nav-align-left {
  align-items: stretch;
}
.nav-align-right > .nav,
.nav-align-right > div > .nav,
.nav-align-left > .nav,
.nav-align-left > div > .nav {
  flex-grow: 0;
  flex-direction: column;
}
.nav-align-right > .tab-content,
.nav-align-left > .tab-content {
  flex-grow: 1;
}

.nav-align-top {
  flex-direction: column;
}
.nav-align-top .nav-tabs ~ .tab-content {
  z-index: 1;
  box-shadow: 0px 6px 7px -1px rgba(67, 89, 113, 0.12);
}
.nav-align-top .nav-tabs .nav-item:first-child .nav-link {
  border-top-left-radius: 0.375rem;
}
.nav-align-top .nav-tabs .nav-item:last-child .nav-link {
  border-top-right-radius: 0.375rem;
}
.nav-align-top .nav-tabs .nav-item:not(:first-child) .nav-link {
  border-left: 1px solid #fff;
}
.nav-align-top .nav-tabs .nav-link.active {
  box-shadow: 0 2px 6px 0 rgba(67, 89, 113, 0.12);
}

.nav-align-right {
  flex-direction: row-reverse;
}
.nav-align-right > .nav .nav-item,
.nav-align-right > div > .nav .nav-item {
  margin-left: -1px;
  margin-bottom: 0;
}
.nav-align-right .nav-link {
  text-align: right;
}
.nav-align-right .nav-tabs ~ .tab-content {
  box-shadow: 0 2px 6px 0 rgba(67, 89, 113, 0.12);
}
.nav-align-right .nav-tabs .nav-item:not(:first-child) .nav-link {
  border-top: 1px solid #fff;
}
.nav-align-right .nav-tabs .nav-item:first-child .nav-link {
  border-top-right-radius: 0.375rem;
}
.nav-align-right .nav-tabs .nav-item:last-child .nav-link {
  border-bottom-right-radius: 0.375rem;
}
.nav-align-right .nav-tabs .nav-link.active {
  box-shadow: 5px 4px 6px 0 rgba(67, 89, 113, 0.12);
}

.nav-align-bottom {
  flex-direction: column-reverse;
}
.nav-align-bottom > .nav .nav-item,
.nav-align-bottom > div > .nav .nav-item {
  margin-bottom: 0;
  margin-top: -1px;
}
.nav-align-bottom .nav-tabs ~ .tab-content {
  box-shadow: 0 2px 6px 0 rgba(67, 89, 113, 0.12);
}
.nav-align-bottom .nav-tabs .nav-item:first-child .nav-link {
  border-bottom-left-radius: 0.375rem;
}
.nav-align-bottom .nav-tabs .nav-item:last-child .nav-link {
  border-bottom-right-radius: 0.375rem;
}
.nav-align-bottom .nav-tabs .nav-item:not(:first-child) .nav-link {
  border-left: 1px solid #fff;
}
.nav-align-bottom .nav-tabs .nav-link.active {
  box-shadow: 0 4px 6px 0 rgba(67, 89, 113, 0.12);
}

.nav-align-left > .nav .nav-item,
.nav-align-left > div > .nav .nav-item {
  margin-right: -1px;
  margin-bottom: 0;
}
.nav-align-left .nav-link {
  text-align: left;
}
.nav-align-left .nav-tabs ~ .tab-content {
  box-shadow: 0 2px 6px 0 rgba(67, 89, 113, 0.12);
}
.nav-align-left .nav-tabs .nav-item:not(:first-child) .nav-link {
  border-top: 1px solid #fff;
}
.nav-align-left .nav-tabs .nav-item:first-child .nav-link {
  border-top-left-radius: 0.375rem;
}
.nav-align-left .nav-tabs .nav-item:last-child .nav-link {
  border-bottom-left-radius: 0.375rem;
}
.nav-align-left .nav-tabs .nav-link.active {
  box-shadow: -5px 2px 6px 0 rgba(67, 89, 113, 0.12);
}

.nav-align-top > .tab-content,
.nav-align-right > .tab-content,
.nav-align-bottom > .tab-content,
.nav-align-left > .tab-content {
  flex-shrink: 1;
  border: 0 solid #d9dee3;
  box-shadow: 0 2px 6px 0 rgba(67, 89, 113, 0.12);
  background-clip: padding-box;
  background: #fff;
}

.nav-align-top :not(.nav-pills) ~ .tab-content {
  border-radius: 0 0 0.375rem 0.375rem;
}

.nav-align-top .nav-tabs:not(.nav-fill) ~ .tab-content {
  border-top-right-radius: 0.375rem;
}

.nav-align-right :not(.nav-pills) ~ .tab-content {
  border-radius: 0.375rem 0 0 0.375rem;
}

.nav-align-bottom :not(.nav-pills) ~ .tab-content {
  border-radius: 0.375rem 0.375rem 0 0;
}

.nav-align-left :not(.nav-pills) ~ .tab-content {
  border-radius: 0 0.375rem 0.375rem 0;
}

.nav-align-left > .tab-content {
  border-radius: 0 0.375rem 0.375rem 0.375rem;
}

.page-item.first .page-link, .page-item.last .page-link, .page-item.next .page-link, .page-item.prev .page-link, .page-item.previous .page-link {
  padding-top: 0.5rem;
  padding-bottom: 0.5rem;
}
.page-item.disabled .page-link {
  border-color: #d9dee3;
}
.page-item.active .page-link {
  margin: 0 0.1rem 0 0.3rem;
}

.page-link,
.page-link > a {
  border-radius: 0.375rem;
  line-height: 1;
  text-align: center;
  min-width: calc(
    2.1875rem + 0px
  );
}
.page-link:focus,
.page-link > a:focus {
  color: #697a8d;
}

.page-link.btn-primary {
  box-shadow: none ;
}

.pagination-lg .page-link,
.pagination-lg > li > a:not(.page-link) {
  min-width: calc(
    2.875rem + 0px
  );
}

.pagination-lg > .page-item.first .page-link, .pagination-lg > .page-item.last .page-link, .pagination-lg > .page-item.next .page-link, .pagination-lg > .page-item.prev .page-link, .pagination-lg > .page-item.previous .page-link {
  padding-top: 0.853rem;
  padding-bottom: 0.853rem;
}

.pagination-sm .page-link,
.pagination-sm > li > a:not(.page-link) {
  min-width: calc(
    1.5rem + 0px
  );
}
.pagination-sm .page-link .tf-icon,
.pagination-sm > li > a:not(.page-link) .tf-icon {
  font-size: 0.9375rem;
}

.pagination-sm > .page-item.first .page-link, .pagination-sm > .page-item.last .page-link, .pagination-sm > .page-item.next .page-link, .pagination-sm > .page-item.prev .page-link, .pagination-sm > .page-item.previous .page-link {
  padding-top: 0.3rem;
  padding-bottom: 0.3rem;
}

.alert-secondary {
  background-color: #ebeef0;
  border-color: #dadee3;
  color: #8592a3;
}
.alert-secondary .btn-close {
  background-image: url("data:image/svg+xml,%3Csvg width='150px' height='151px' viewBox='0 0 150 151' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpolygon id='path-1' points='131.251657 0 74.9933705 56.25 18.7483426 0 0 18.75 56.2450278 75 0 131.25 18.7483426 150 74.9933705 93.75 131.251657 150 150 131.25 93.7549722 75 150 18.75'%3E%3C/polygon%3E%3C/defs%3E%3Cg id='🎨-%5BSetup%5D:-Colors-&amp;-Shadows' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Artboard' transform='translate(-225.000000, -250.000000)'%3E%3Cg id='Icon-Color' transform='translate(225.000000, 250.500000)'%3E%3Cuse fill='%238592a3' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.5' fill='%238592a3' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.alert-secondary .alert-link {
  color: #8592a3;
}

.card .alert-secondary hr {
  background-color: #8592a3 ;
}

.alert-success {
  background-color: #e8fadf;
  border-color: #d4f5c3;
  color: #71dd37;
}
.alert-success .btn-close {
  background-image: url("data:image/svg+xml,%3Csvg width='150px' height='151px' viewBox='0 0 150 151' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpolygon id='path-1' points='131.251657 0 74.9933705 56.25 18.7483426 0 0 18.75 56.2450278 75 0 131.25 18.7483426 150 74.9933705 93.75 131.251657 150 150 131.25 93.7549722 75 150 18.75'%3E%3C/polygon%3E%3C/defs%3E%3Cg id='🎨-%5BSetup%5D:-Colors-&amp;-Shadows' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Artboard' transform='translate(-225.000000, -250.000000)'%3E%3Cg id='Icon-Color' transform='translate(225.000000, 250.500000)'%3E%3Cuse fill='%2371dd37' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.5' fill='%2371dd37' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.alert-success .alert-link {
  color: #71dd37;
}

.card .alert-success hr {
  background-color: #71dd37 ;
}

.alert-info {
  background-color: #d7f5fc;
  border-color: #b3edf9;
  color: #03c3ec;
}
.alert-info .btn-close {
  background-image: url("data:image/svg+xml,%3Csvg width='150px' height='151px' viewBox='0 0 150 151' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpolygon id='path-1' points='131.251657 0 74.9933705 56.25 18.7483426 0 0 18.75 56.2450278 75 0 131.25 18.7483426 150 74.9933705 93.75 131.251657 150 150 131.25 93.7549722 75 150 18.75'%3E%3C/polygon%3E%3C/defs%3E%3Cg id='🎨-%5BSetup%5D:-Colors-&amp;-Shadows' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Artboard' transform='translate(-225.000000, -250.000000)'%3E%3Cg id='Icon-Color' transform='translate(225.000000, 250.500000)'%3E%3Cuse fill='%2303c3ec' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.5' fill='%2303c3ec' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.alert-info .alert-link {
  color: #03c3ec;
}

.card .alert-info hr {
  background-color: #03c3ec ;
}

.alert-warning {
  background-color: #fff2d6;
  border-color: #ffe6b3;
  color: #ffab00;
}
.alert-warning .btn-close {
  background-image: url("data:image/svg+xml,%3Csvg width='150px' height='151px' viewBox='0 0 150 151' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpolygon id='path-1' points='131.251657 0 74.9933705 56.25 18.7483426 0 0 18.75 56.2450278 75 0 131.25 18.7483426 150 74.9933705 93.75 131.251657 150 150 131.25 93.7549722 75 150 18.75'%3E%3C/polygon%3E%3C/defs%3E%3Cg id='🎨-%5BSetup%5D:-Colors-&amp;-Shadows' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Artboard' transform='translate(-225.000000, -250.000000)'%3E%3Cg id='Icon-Color' transform='translate(225.000000, 250.500000)'%3E%3Cuse fill='%23ffab00' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.5' fill='%23ffab00' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.alert-warning .alert-link {
  color: #ffab00;
}

.card .alert-warning hr {
  background-color: #ffab00 ;
}

.alert-danger {
  background-color: #ffe0db;
  border-color: #ffc5bb;
  color: #ff3e1d;
}
.alert-danger .btn-close {
  background-image: url("data:image/svg+xml,%3Csvg width='150px' height='151px' viewBox='0 0 150 151' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpolygon id='path-1' points='131.251657 0 74.9933705 56.25 18.7483426 0 0 18.75 56.2450278 75 0 131.25 18.7483426 150 74.9933705 93.75 131.251657 150 150 131.25 93.7549722 75 150 18.75'%3E%3C/polygon%3E%3C/defs%3E%3Cg id='🎨-%5BSetup%5D:-Colors-&amp;-Shadows' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Artboard' transform='translate(-225.000000, -250.000000)'%3E%3Cg id='Icon-Color' transform='translate(225.000000, 250.500000)'%3E%3Cuse fill='%23ff3e1d' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.5' fill='%23ff3e1d' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.alert-danger .alert-link {
  color: #ff3e1d;
}

.card .alert-danger hr {
  background-color: #ff3e1d ;
}

.alert-dark {
  background-color: #dcdfe1;
  border-color: #bdc2c8;
  color: #233446;
}
.alert-dark .btn-close {
  background-image: url("data:image/svg+xml,%3Csvg width='150px' height='151px' viewBox='0 0 150 151' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpolygon id='path-1' points='131.251657 0 74.9933705 56.25 18.7483426 0 0 18.75 56.2450278 75 0 131.25 18.7483426 150 74.9933705 93.75 131.251657 150 150 131.25 93.7549722 75 150 18.75'%3E%3C/polygon%3E%3C/defs%3E%3Cg id='🎨-%5BSetup%5D:-Colors-&amp;-Shadows' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Artboard' transform='translate(-225.000000, -250.000000)'%3E%3Cg id='Icon-Color' transform='translate(225.000000, 250.500000)'%3E%3Cuse fill='%23233446' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.5' fill='%23233446' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.alert-dark .alert-link {
  color: #233446;
}

.card .alert-dark hr {
  background-color: #233446 ;
}

.alert-gray {
  background-color: rgba(253, 253, 254, 0.856);
  border-color: rgba(251, 251, 252, 0.73);
  color: rgba(67, 89, 113, 0.1);
}
.alert-gray .btn-close {
  background-image: url("data:image/svg+xml,%3Csvg width='150px' height='151px' viewBox='0 0 150 151' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpolygon id='path-1' points='131.251657 0 74.9933705 56.25 18.7483426 0 0 18.75 56.2450278 75 0 131.25 18.7483426 150 74.9933705 93.75 131.251657 150 150 131.25 93.7549722 75 150 18.75'%3E%3C/polygon%3E%3C/defs%3E%3Cg id='🎨-%5BSetup%5D:-Colors-&amp;-Shadows' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Artboard' transform='translate(-225.000000, -250.000000)'%3E%3Cg id='Icon-Color' transform='translate(225.000000, 250.500000)'%3E%3Cuse fill='rgba(67, 89, 113, 0.1)' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.5' fill='rgba(67, 89, 113, 0.1)' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.alert-gray .alert-link {
  color: rgba(67, 89, 113, 0.1);
}

.card .alert-gray hr {
  background-color: rgba(67, 89, 113, 0.1) ;
}

.modal-open .tooltip {
  z-index: 1092;
}

.tooltip-inner {
  box-shadow: 0 0.125rem 0.25rem rgba(161, 172, 184, 0.4);
}

.modal-open .popover {
  z-index: 1091;
}

.popover {
  box-shadow: 0 0.25rem 1rem rgba(161, 172, 184, 0.45);
}
.popover .popover-arrow {
  z-index: 1;
}
.popover.bs-popover-bottom > .popover-arrow::after, .popover.bs-popover-auto[data-popper-placement^=bottom] > .popover-arrow::after {
  border-bottom-color: white;
  top: 2px;
}
.popover.bs-popover-bottom > .popover-arrow:before, .popover.bs-popover-auto[data-popper-placement^=bottom] > .popover-arrow:before {
  top: 1px;
}

.popover-header {
  padding: 1.125rem 1.125rem 0;
  font-size: 1.125rem;
}

.form-label,
.col-form-label {
  font-size: 0.75rem;
  text-transform: uppercase;
  letter-spacing: inherit;
}

.form-label-lg {
  font-size: 1rem;
}

.form-label-sm {
  font-size: 0.75rem;
}

.form-control::-moz-placeholder {
  -moz-transition: all 0.25s ease;
  transition: all 0.25s ease;
}

.form-control::placeholder {
  transition: all 0.25s ease;
}
.form-control:focus::-moz-placeholder {
  transform: translate(5px);
  -moz-transition: all 0.25s ease;
  transition: all 0.25s ease;
}
.form-control:focus::placeholder {
  transform: translate(5px);
  transition: all 0.25s ease;
}

.form-select {
  background-clip: padding-box;
}

.form-range::-webkit-slider-thumb {
  box-shadow: 0 0 6px 0 rgba(67, 89, 113, 0.4);
  -webkit-transition: transform 0.2s;
  transition: transform 0.2s;
  transform-origin: center;
}
.form-range::-webkit-slider-thumb:focus {
  box-shadow: 0 0 8px 0px rgba(67, 89, 113, 0.4);
}
.form-range::-webkit-slider-thumb:active {
  transform: scale(1.4, 1.4);
}
.form-range::-moz-range-thumb {
  box-shadow: 0 0 6px 0 rgba(67, 89, 113, 0.4);
  -moz-transition: transform 0.2s;
  transition: transform 0.2s;
  transform-origin: center;
}
.form-range::-moz-range-thumb:focus {
  box-shadow: 0 0 8px 0px rgba(67, 89, 113, 0.4);
}
.form-range::-moz-range-thumb:active {
  transform: scale(1.4, 1.4);
}
.form-range:disabled::-webkit-slider-runnable-track {
  background-color: rgba(67, 89, 113, 0.05);
}
.form-range:disabled::-moz-range-track {
  background-color: rgba(67, 89, 113, 0.05);
  box-shadow: none;
}
.form-range:disabled::-webkit-slider-thumb {
  box-shadow: none;
}
.form-range:disabled::-moz-range-thumb {
  box-shadow: none;
}

.input-group:focus-within {
  box-shadow: 0 0 0.25rem 0.05rem rgba(105, 108, 255, 0.1);
}
.input-group:focus-within .form-control,
.input-group:focus-within .input-group-text {
  box-shadow: none;
}
.input-group.disabled .input-group-text {
  background-color: #eceef1;
}

.input-group-text {
  background-clip: padding-box;
}
.input-group-text i {
  font-size: 0.9375rem;
}

.input-group-lg > .input-group-text i {
  font-size: 1rem;
}

.input-group-sm > .input-group-text i {
  font-size: 0.75rem;
}

.input-group-merge .input-group-text:first-child {
  border-right: 0;
}
.input-group-merge .input-group-text:last-child {
  border-left: 0;
}
.input-group-merge .form-control:not(:first-child) {
  padding-left: 0;
  border-left: 0;
}
.input-group-merge .form-control:not(:last-child) {
  padding-right: 0;
  border-right: 0;
}

.input-group-text {
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
@media (prefers-reduced-motion: reduce) {
  .input-group-text {
    transition: none;
  }
}

.form-floating > .form-control:focus::-moz-placeholder, .form-floating > .form-control:not(:placeholder-shown)::-moz-placeholder {
  color: #b4bdc6;
}

.form-floating > .form-control:not(:-moz-placeholder-shown)::placeholder {
  color: #b4bdc6;
}

.form-floating > .form-control:focus::placeholder,
.form-floating > .form-control:not(:placeholder-shown)::placeholder {
  color: #b4bdc6;
}

.valid-feedback {
  display: none;
  width: 100%;
  margin-top: 0.3rem;
  font-size: 85%;
  color: #71dd37;
}

.valid-tooltip {
  position: absolute;
  top: 100%;
  z-index: 5;
  display: none;
  max-width: 100%;
  padding: 0.25rem 0.7rem;
  margin-top: 0.1rem;
  font-size: 0.9375rem;
  color: #fff;
  background-color: #71dd37;
  border-radius: 0.25rem;
}

.was-validated :valid ~ .valid-feedback,
.was-validated :valid ~ .valid-tooltip,
.is-valid ~ .valid-feedback,
.is-valid ~ .valid-tooltip {
  display: block;
}

.was-validated .form-control:valid, .form-control.is-valid {
  border-color: #71dd37;
}
.dark-style .was-validated .form-control:valid, .dark-style .form-control.is-valid {
  border-color: #71dd37 ;
}
.was-validated .form-control:valid:focus, .form-control.is-valid:focus {
  border-color: #71dd37;
  box-shadow: 0 0 0.25rem 0.05rem rgba(113, 221, 55, 0.1);
}

.was-validated .form-select:valid, .form-select.is-valid {
  border-color: #71dd37;
}
.was-validated .form-select:valid:focus, .form-select.is-valid:focus {
  border-color: #71dd37;
  box-shadow: 0 0 0.25rem 0.05rem rgba(113, 221, 55, 0.1);
}

.was-validated .form-check-input:valid, .form-check-input.is-valid {
  border-color: #71dd37;
}
.was-validated .form-check-input:valid:checked, .form-check-input.is-valid:checked {
  background-color: #71dd37;
  border-color: #71dd37;
}
.was-validated .form-check-input:valid:focus, .form-check-input.is-valid:focus {
  box-shadow: 0 0 0.25rem 0.05rem rgba(113, 221, 55, 0.1);
  border-color: #71dd37;
}
.was-validated .form-check-input:valid ~ .form-check-label, .form-check-input.is-valid ~ .form-check-label {
  color: #71dd37;
}

.form-check-inline .form-check-input ~ .valid-feedback {
  margin-left: 0.5em;
}

.was-validated .input-group .form-control:valid ~ .input-group-text, .input-group .form-control.is-valid ~ .input-group-text {
  border-color: #71dd37;
}
.was-validated .input-group .form-control:valid:focus, .input-group .form-control.is-valid:focus {
  border-color: #71dd37;
  box-shadow: none;
}
.was-validated .input-group .form-control:valid:focus ~ .input-group-text, .input-group .form-control.is-valid:focus ~ .input-group-text {
  border-color: #71dd37;
}

.was-validated .input-group .form-control:valid, .input-group .form-control.is-valid,
.was-validated .input-group .form-select:valid,
.input-group .form-select.is-valid {
  z-index: 3;
}

.invalid-feedback {
  display: none;
  width: 100%;
  margin-top: 0.3rem;
  font-size: 85%;
  color: #ff3e1d;
}

.invalid-tooltip {
  position: absolute;
  top: 100%;
  z-index: 5;
  display: none;
  max-width: 100%;
  padding: 0.25rem 0.7rem;
  margin-top: 0.1rem;
  font-size: 0.9375rem;
  color: #fff;
  background-color: #ff3e1d;
  border-radius: 0.25rem;
}

.was-validated :invalid ~ .invalid-feedback,
.was-validated :invalid ~ .invalid-tooltip,
.is-invalid ~ .invalid-feedback,
.is-invalid ~ .invalid-tooltip {
  display: block;
}

.was-validated .form-control:invalid, .form-control.is-invalid {
  border-color: #ff3e1d;
}
.dark-style .was-validated .form-control:invalid, .dark-style .form-control.is-invalid {
  border-color: #ff3e1d ;
}
.was-validated .form-control:invalid:focus, .form-control.is-invalid:focus {
  border-color: #ff3e1d;
  box-shadow: 0 0 0.25rem 0.05rem rgba(255, 62, 29, 0.1);
}

.was-validated .form-select:invalid, .form-select.is-invalid {
  border-color: #ff3e1d;
}
.was-validated .form-select:invalid:focus, .form-select.is-invalid:focus {
  border-color: #ff3e1d;
  box-shadow: 0 0 0.25rem 0.05rem rgba(255, 62, 29, 0.1);
}

.was-validated .form-check-input:invalid, .form-check-input.is-invalid {
  border-color: #ff3e1d;
}
.was-validated .form-check-input:invalid:checked, .form-check-input.is-invalid:checked {
  background-color: #ff3e1d;
  border-color: #ff3e1d;
}
.was-validated .form-check-input:invalid:focus, .form-check-input.is-invalid:focus {
  box-shadow: 0 0 0.25rem 0.05rem rgba(255, 62, 29, 0.1);
  border-color: #ff3e1d;
}
.was-validated .form-check-input:invalid ~ .form-check-label, .form-check-input.is-invalid ~ .form-check-label {
  color: #ff3e1d;
}

.form-check-inline .form-check-input ~ .invalid-feedback {
  margin-left: 0.5em;
}

.was-validated .input-group .form-control:invalid ~ .input-group-text, .input-group .form-control.is-invalid ~ .input-group-text {
  border-color: #ff3e1d;
}
.was-validated .input-group .form-control:invalid:focus, .input-group .form-control.is-invalid:focus {
  border-color: #ff3e1d;
  box-shadow: none;
}
.was-validated .input-group .form-control:invalid:focus ~ .input-group-text, .input-group .form-control.is-invalid:focus ~ .input-group-text {
  border-color: #ff3e1d;
}

.was-validated .input-group .form-control:invalid, .input-group .form-control.is-invalid,
.was-validated .input-group .form-select:invalid,
.input-group .form-select.is-invalid {
  z-index: 3;
}

form .error:not(li):not(input) {
  color: #ff3e1d;
  font-size: 85%;
  margin-top: 0.25rem;
}
form .invalid,
form .is-invalid .invalid:before,
form .is-invalid::before {
  border-color: #ff3e1d ;
}
form .form-label.invalid, form .form-label.is-invalid {
  border-color: #ff3e1d;
  box-shadow: 0 0 0 2px rgba(255, 62, 29, 0.4) ;
}
form select.invalid ~ .select2 .select2-selection {
  border-color: #ff3e1d;
}
form select.is-invalid ~ .select2 .select2-selection {
  border-color: #ff3e1d ;
}
form select.selectpicker.is-invalid ~ .btn {
  border-color: 1px solid #ff3e1d;
  border-color: #ff3e1d;
}

.modal-content {
  box-shadow: 0 2px 16px 0 rgba(67, 89, 113, 0.45);
}

.modal .btn-close {
  background-color: #fff;
  border-radius: 0.5rem;
  opacity: 1;
  padding: 0.635rem;
  box-shadow: 0 0.125rem 0.25rem rgba(161, 172, 184, 0.4);
  transition: all 0.23s ease 0.1s;
  transform: translate(23px, -25px);
}
.modal .btn-close:hover, .modal .btn-close:focus, .modal .btn-close:active {
  opacity: 1;
  outline: none;
  transform: translate(20px, -20px);
}
.modal .modal-header .btn-close {
  margin-top: -1.25rem;
}

.modal-footer {
  padding: 0.25rem 1.5rem 1.5rem;
}

.modal-dialog-scrollable .btn-close,
.modal-fullscreen .btn-close,
.modal-top .btn-close {
  box-shadow: none;
  transform: translate(0, 0) ;
}
.modal-dialog-scrollable .btn-close:hover,
.modal-fullscreen .btn-close:hover,
.modal-top .btn-close:hover {
  transform: translate(0, 0) ;
}

.modal-top .modal-dialog {
  margin-top: 0;
}
.modal-top .modal-content {
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

@media (max-width: 991.98px) {
  .modal-onboarding .onboarding-horizontal {
    flex-direction: column;
  }
}
@media (max-width: 767.98px) {
  .modal .modal-dialog:not(.modal-fullscreen) {
    padding: 0 0.75rem;
    padding-left: 0.75rem ;
  }
  .modal .carousel-control-prev,
.modal .carousel-control-next {
    display: none;
  }
}
@media (min-width: 576px) {
  .modal-content {
    box-shadow: 0 2px 20px 0 rgba(67, 89, 113, 0.45);
  }

  .modal-sm .modal-dialog {
    max-width: 22.5rem;
  }
}
@media (min-width: 1200px) {
  .modal-xl .modal-dialog {
    max-width: 1140px;
  }
}
.progress {
  overflow: initial;
}

.progress-bar.bg-secondary {
  box-shadow: 0 2px 4px 0 rgba(133, 146, 163, 0.4);
}

.progress-bar.bg-success {
  box-shadow: 0 2px 4px 0 rgba(113, 221, 55, 0.4);
}

.progress-bar.bg-info {
  box-shadow: 0 2px 4px 0 rgba(3, 195, 236, 0.4);
}

.progress-bar.bg-warning {
  box-shadow: 0 2px 4px 0 rgba(255, 171, 0, 0.4);
}

.progress-bar.bg-danger {
  box-shadow: 0 2px 4px 0 rgba(255, 62, 29, 0.4);
}

.progress-bar.bg-light {
  box-shadow: 0 2px 4px 0 rgba(252, 253, 253, 0.4);
}

.progress-bar.bg-dark {
  box-shadow: 0 2px 4px 0 rgba(35, 52, 70, 0.4);
}

.progress-bar.bg-gray {
  box-shadow: 0 2px 4px 0 rgba(67, 89, 113, 0.4);
}

.progress-bar-striped {
  background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.07) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.07) 50%, rgba(255, 255, 255, 0.07) 75%, transparent 75%, transparent);
}

.progress .progress-bar:last-child {
  border-top-right-radius: 10rem;
  border-bottom-right-radius: 10rem;
}
.progress .progress-bar:first-child {
  border-top-left-radius: 10rem;
  border-bottom-left-radius: 10rem;
}

.breadcrumb-item,
.breadcrumb-item a {
  color: #697a8d;
}
.breadcrumb-item:hover, .breadcrumb-item:focus,
.breadcrumb-item a:hover,
.breadcrumb-item a:focus {
  color: #697a8d;
}
.breadcrumb-item.active,
.breadcrumb-item a.active {
  font-weight: 600;
}
.breadcrumb-item.active::before,
.breadcrumb-item a.active::before {
  font-weight: 400;
}

.breadcrumb-item.active a, .breadcrumb-item.active a:hover, .breadcrumb-item.active a:focus, .breadcrumb-item.active a:active {
  color: inherit;
}

.breadcrumb-style1 .breadcrumb-item + .breadcrumb-item::before,
.breadcrumb-style2 .breadcrumb-item + .breadcrumb-item::before {
  font-family: boxicons;
  vertical-align: middle;
}

.breadcrumb-style1 .breadcrumb-item + .breadcrumb-item::before {
  content: "\ecb3";
  font-size: 1.125rem;
  line-height: 1.4;
}

.breadcrumb-style2 .breadcrumb-item + .breadcrumb-item::before {
  content: "\ee4a";
  font-size: 1rem;
  line-height: 1.35rem;
}

.list-group-item-secondary {
  background-color: #e7e9ed;
  color: #8592a3 ;
}

a.list-group-item-secondary,
button.list-group-item-secondary {
  color: #8592a3;
}
a.list-group-item-secondary:hover, a.list-group-item-secondary:focus,
button.list-group-item-secondary:hover,
button.list-group-item-secondary:focus {
  background-color: #dbdde1;
  color: #8592a3;
}
a.list-group-item-secondary.active,
button.list-group-item-secondary.active {
  border-color: #8592a3;
  background-color: #8592a3;
  color: #8592a3;
}

.list-group-item-success {
  background-color: #e3f8d7;
  color: #71dd37 ;
}

a.list-group-item-success,
button.list-group-item-success {
  color: #71dd37;
}
a.list-group-item-success:hover, a.list-group-item-success:focus,
button.list-group-item-success:hover,
button.list-group-item-success:focus {
  background-color: #d8eccc;
  color: #71dd37;
}
a.list-group-item-success.active,
button.list-group-item-success.active {
  border-color: #71dd37;
  background-color: #71dd37;
  color: #71dd37;
}

.list-group-item-info {
  background-color: #cdf3fb;
  color: #03c3ec ;
}

a.list-group-item-info,
button.list-group-item-info {
  color: #03c3ec;
}
a.list-group-item-info:hover, a.list-group-item-info:focus,
button.list-group-item-info:hover,
button.list-group-item-info:focus {
  background-color: #c3e7ee;
  color: #03c3ec;
}
a.list-group-item-info.active,
button.list-group-item-info.active {
  border-color: #03c3ec;
  background-color: #03c3ec;
  color: #03c3ec;
}

.list-group-item-warning {
  background-color: #ffeecc;
  color: #ffab00 ;
}

a.list-group-item-warning,
button.list-group-item-warning {
  color: #ffab00;
}
a.list-group-item-warning:hover, a.list-group-item-warning:focus,
button.list-group-item-warning:hover,
button.list-group-item-warning:focus {
  background-color: #f2e2c2;
  color: #ffab00;
}
a.list-group-item-warning.active,
button.list-group-item-warning.active {
  border-color: #ffab00;
  background-color: #ffab00;
  color: #ffab00;
}

.list-group-item-danger {
  background-color: #ffd8d2;
  color: #ff3e1d ;
}

a.list-group-item-danger,
button.list-group-item-danger {
  color: #ff3e1d;
}
a.list-group-item-danger:hover, a.list-group-item-danger:focus,
button.list-group-item-danger:hover,
button.list-group-item-danger:focus {
  background-color: #f2cdc8;
  color: #ff3e1d;
}
a.list-group-item-danger.active,
button.list-group-item-danger.active {
  border-color: #ff3e1d;
  background-color: #ff3e1d;
  color: #ff3e1d;
}

.list-group-item-dark {
  background-color: #d3d6da;
  color: #233446 ;
}

a.list-group-item-dark,
button.list-group-item-dark {
  color: #233446;
}
a.list-group-item-dark:hover, a.list-group-item-dark:focus,
button.list-group-item-dark:hover,
button.list-group-item-dark:focus {
  background-color: #c8cbcf;
  color: #233446;
}
a.list-group-item-dark.active,
button.list-group-item-dark.active {
  border-color: #233446;
  background-color: #233446;
  color: #233446;
}

.list-group-item-gray {
  background-color: rgba(253, 253, 253, 0.82);
  color: rgba(67, 89, 113, 0.1) ;
}

a.list-group-item-gray,
button.list-group-item-gray {
  color: rgba(67, 89, 113, 0.1);
}
a.list-group-item-gray:hover, a.list-group-item-gray:focus,
button.list-group-item-gray:hover,
button.list-group-item-gray:focus {
  background-color: rgba(235, 235, 235, 0.829);
  color: rgba(67, 89, 113, 0.1);
}
a.list-group-item-gray.active,
button.list-group-item-gray.active {
  border-color: rgba(67, 89, 113, 0.1);
  background-color: rgba(67, 89, 113, 0.1);
  color: rgba(67, 89, 113, 0.1);
}

.list-group.list-group-timeline {
  position: relative;
}
.list-group.list-group-timeline:before {
  background-color: #d9dee3;
  position: absolute;
  content: "";
  width: 1px;
  height: 100%;
  top: 0;
  bottom: 0;
  left: 0.2rem;
}
.list-group.list-group-timeline .list-group-item {
  border: none;
  padding-left: 1.25rem;
}
.list-group.list-group-timeline .list-group-item:before {
  position: absolute;
  display: block;
  content: "";
  width: 7px;
  height: 7px;
  left: 0;
  top: 50%;
  margin-top: -3.5px;
  border-radius: 100%;
}
.list-group .list-group-item.active h1,
.list-group .list-group-item.active .h1,
.list-group .list-group-item.active h2,
.list-group .list-group-item.active .h2,
.list-group .list-group-item.active h3,
.list-group .list-group-item.active .h3,
.list-group .list-group-item.active h4,
.list-group .list-group-item.active .h4,
.list-group .list-group-item.active h5,
.list-group .list-group-item.active .h5,
.list-group .list-group-item.active h6,
.list-group .list-group-item.active .h6 {
  color: #fff;
}

.navbar {
  z-index: 2;
}
.navbar .dropdown:focus,
.navbar .dropdown-toggle:focus {
  outline: 0;
}
.navbar .navbar-toggler {
  border: none;
}
.navbar .navbar-toggler:focus {
  box-shadow: none;
}

.fixed-top {
  z-index: 1030;
}

.navbar.navbar-light {
  color: rgba(67, 89, 113, 0.5);
}

.navbar-light .navbar-nav .nav-link.disabled {
  color: rgba(67, 89, 113, 0.3) ;
}

.navbar.navbar-dark {
  color: rgba(255, 255, 255, 0.8);
}

.navbar-dark .navbar-nav .nav-link.disabled {
  color: rgba(255, 255, 255, 0.4) ;
}

.navbar-collapse,
.navbar-brand,
.navbar-text {
  flex-shrink: 1;
}

.navbar-dark hr {
  border-color: rgba(255, 255, 255, 0.1);
}

.navbar-light hr {
  border-color: rgba(67, 89, 113, 0.1);
}

.card {
  background-clip: padding-box;
  box-shadow: 0 2px 6px 0 rgba(67, 89, 113, 0.12);
}
.card .card-link {
  display: inline-block;
}
.card .card-header + .card-body,
.card .card-header + .card-content > .card-body:first-of-type {
  padding-top: 0;
}

.card-action.card-fullscreen {
  display: block;
  z-index: 9999;
  position: fixed;
  width: 100% ;
  height: 100% ;
  top: 0;
  right: 0;
  left: 0;
  bottom: 0;
  overflow: auto;
  border: none;
  border-radius: 0;
}
.card-action .card-alert {
  position: absolute;
  width: 100%;
  z-index: 999;
}
.card-action .card-alert .alert {
  border-bottom-right-radius: 0px;
  border-bottom-left-radius: 0px;
}
.card-action .card-header.collapsed {
  border-bottom: 0;
}
.card-action .card-header {
  display: flex;
  line-height: 1.54;
}
.card-action .card-header .card-action-title {
  flex-grow: 1;
  margin-right: 0.5rem;
}
.card-action .card-header .card-action-element {
  flex-shrink: 0;
  background-color: inherit;
  top: 1rem;
  right: 1.5rem;
  color: #697a8d;
}
.card-action .card-header .card-action-element a {
  color: #697a8d;
}
.card-action .card-header .card-action-element a .collapse-icon::after {
  margin-top: -0.15rem;
}
.card-action .blockUI .sk-fold {
  margin: 0 auto;
}
.card-action .blockUI h5, .card-action .blockUI .h5 {
  color: #697a8d;
  margin: 1rem 0 0 0;
}

.card-header,
.card-footer {
  border-color: #d9dee3;
}

.card hr {
  color: #d9dee3;
}

.card .row-bordered > [class*=" col "] .card .row-bordered > [class$=" col"], .card .row-bordered > [class*=" col "]::before, .card .row-bordered > [class*=" col "]::after,
.card .row-bordered > [class^="col "] .card .row-bordered > [class$=" col"],
.card .row-bordered > [class^="col "]::before,
.card .row-bordered > [class^="col "]::after,
.card .row-bordered > [class*=" col-"] .card .row-bordered > [class$=" col"],
.card .row-bordered > [class*=" col-"]::before,
.card .row-bordered > [class*=" col-"]::after,
.card .row-bordered > [class^=col-] .card .row-bordered > [class$=" col"],
.card .row-bordered > [class^=col-]::before,
.card .row-bordered > [class^=col-]::after,
.card .row-bordered > [class=col] .card .row-bordered > [class$=" col"],
.card .row-bordered > [class=col]::before,
.card .row-bordered > [class=col]::after {
  border-color: #d9dee3;
}

.card-header.header-elements,
.card-title.header-elements {
  display: flex;
  width: 100%;
  align-items: center;
  flex-wrap: wrap;
}

.card-header.card-header-elements {
  padding-top: 0.75rem;
  padding-bottom: 0.75rem;
}
.card-header .card-header-elements {
  padding-top: 0.25rem;
  padding-bottom: 0.25rem;
}

.card-header-elements,
.card-title-elements {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
}
.card-header-elements + .card-header-elements,
.card-header-elements > * + *,
.card-header-elements + .card-title-elements,
.card-title-elements > * + *,
.card-title-elements + .card-header-elements,
.card-title-elements + .card-title-elements {
  margin-left: 0.25rem;
}

.card-img-left {
  border-top-left-radius: 0.5rem;
  border-bottom-left-radius: 0.5rem;
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}
@media (max-width: 767.98px) {
  .card-img-left {
    border-top-left-radius: 0.5rem;
    border-top-right-radius: 0.5rem;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }
}

.card-img-right {
  border-top-right-radius: 0.5rem;
  border-bottom-right-radius: 0.5rem;
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}
@media (max-width: 767.98px) {
  .card-img-right {
    border-bottom-right-radius: 0.5rem;
    border-bottom-left-radius: 0.5rem;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }
}

.card > .list-group .list-group-item {
  padding-left: 1.5rem;
  padding-right: 1.5rem;
}

.card .card-separator {
  border-right: 1px solid #d9dee3;
}

@media (max-width: 767.98px) {
  .card .card-separator {
    border-bottom: 1px solid #d9dee3;
    padding-bottom: 1.5rem;
    border-right-width: 0 ;
  }
}
.accordion-header + .accordion-collapse .accordion-body {
  padding-top: 0;
}

.accordion.accordion-without-arrow .accordion-button::after {
  background-image: none ;
}
.accordion .accordion-item.active {
  box-shadow: 0 0.25rem 1rem rgba(161, 172, 184, 0.45);
}

.card.accordion-item {
  box-shadow: 0 0.125rem 0.25rem rgba(161, 172, 184, 0.4);
}

.accordion-button.collapsed:focus {
  box-shadow: none;
}

.accordion-button {
  box-shadow: none;
}

.accordion-header {
  line-height: 1.54;
}

.accordion-item:not(:first-of-type) {
  border-top: 0 solid #d9dee3;
}

.accordion-button {
  font-weight: inherit;
  border-top-left-radius: 0.375rem;
  border-top-right-radius: 0.375rem;
}
.accordion-button.collapsed {
  border-radius: 0.375rem;
}

.accordion > .card:not(:last-of-type) {
  border-radius: 0.375rem ;
  margin-bottom: 0.6875rem;
}

.close:focus {
  outline: 0;
}

.bg-secondary.toast, .bg-secondary.bs-toast {
  color: #fff;
  background-color: rgba(133, 146, 163, 0.85) ;
  box-shadow: 0 0.25rem 1rem rgba(133, 146, 163, 0.4);
}
.bg-secondary.toast .toast-header, .bg-secondary.bs-toast .toast-header {
  color: #fff;
}
.bg-secondary.toast .toast-header .btn-close, .bg-secondary.bs-toast .toast-header .btn-close {
  background-color: #8592a3 ;
  background-image: url("data:image/svg+xml,%3Csvg width='150px' height='151px' viewBox='0 0 150 151' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpolygon id='path-1' points='131.251657 0 74.9933705 56.25 18.7483426 0 0 18.75 56.2450278 75 0 131.25 18.7483426 150 74.9933705 93.75 131.251657 150 150 131.25 93.7549722 75 150 18.75'%3E%3C/polygon%3E%3C/defs%3E%3Cg id='🎨-%5BSetup%5D:-Colors-&amp;-Shadows' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Artboard' transform='translate(-225.000000, -250.000000)'%3E%3Cg id='Icon-Color' transform='translate(225.000000, 250.500000)'%3E%3Cuse fill='%23fff' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='1' fill='%23fff' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  box-shadow: 0 0.1875rem 0.375rem 0 rgba(133, 146, 163, 0.4) ;
}

.bg-success.toast, .bg-success.bs-toast {
  color: #fff;
  background-color: rgba(113, 221, 55, 0.85) ;
  box-shadow: 0 0.25rem 1rem rgba(113, 221, 55, 0.4);
}
.bg-success.toast .toast-header, .bg-success.bs-toast .toast-header {
  color: #fff;
}
.bg-success.toast .toast-header .btn-close, .bg-success.bs-toast .toast-header .btn-close {
  background-color: #71dd37 ;
  background-image: url("data:image/svg+xml,%3Csvg width='150px' height='151px' viewBox='0 0 150 151' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpolygon id='path-1' points='131.251657 0 74.9933705 56.25 18.7483426 0 0 18.75 56.2450278 75 0 131.25 18.7483426 150 74.9933705 93.75 131.251657 150 150 131.25 93.7549722 75 150 18.75'%3E%3C/polygon%3E%3C/defs%3E%3Cg id='🎨-%5BSetup%5D:-Colors-&amp;-Shadows' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Artboard' transform='translate(-225.000000, -250.000000)'%3E%3Cg id='Icon-Color' transform='translate(225.000000, 250.500000)'%3E%3Cuse fill='%23fff' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='1' fill='%23fff' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  box-shadow: 0 0.1875rem 0.375rem 0 rgba(113, 221, 55, 0.4) ;
}

.bg-info.toast, .bg-info.bs-toast {
  color: #fff;
  background-color: rgba(3, 195, 236, 0.85) ;
  box-shadow: 0 0.25rem 1rem rgba(3, 195, 236, 0.4);
}
.bg-info.toast .toast-header, .bg-info.bs-toast .toast-header {
  color: #fff;
}
.bg-info.toast .toast-header .btn-close, .bg-info.bs-toast .toast-header .btn-close {
  background-color: #03c3ec ;
  background-image: url("data:image/svg+xml,%3Csvg width='150px' height='151px' viewBox='0 0 150 151' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpolygon id='path-1' points='131.251657 0 74.9933705 56.25 18.7483426 0 0 18.75 56.2450278 75 0 131.25 18.7483426 150 74.9933705 93.75 131.251657 150 150 131.25 93.7549722 75 150 18.75'%3E%3C/polygon%3E%3C/defs%3E%3Cg id='🎨-%5BSetup%5D:-Colors-&amp;-Shadows' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Artboard' transform='translate(-225.000000, -250.000000)'%3E%3Cg id='Icon-Color' transform='translate(225.000000, 250.500000)'%3E%3Cuse fill='%23fff' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='1' fill='%23fff' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  box-shadow: 0 0.1875rem 0.375rem 0 rgba(3, 195, 236, 0.4) ;
}

.bg-warning.toast, .bg-warning.bs-toast {
  color: #fff;
  background-color: rgba(255, 171, 0, 0.85) ;
  box-shadow: 0 0.25rem 1rem rgba(255, 171, 0, 0.4);
}
.bg-warning.toast .toast-header, .bg-warning.bs-toast .toast-header {
  color: #fff;
}
.bg-warning.toast .toast-header .btn-close, .bg-warning.bs-toast .toast-header .btn-close {
  background-color: #ffab00 ;
  background-image: url("data:image/svg+xml,%3Csvg width='150px' height='151px' viewBox='0 0 150 151' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpolygon id='path-1' points='131.251657 0 74.9933705 56.25 18.7483426 0 0 18.75 56.2450278 75 0 131.25 18.7483426 150 74.9933705 93.75 131.251657 150 150 131.25 93.7549722 75 150 18.75'%3E%3C/polygon%3E%3C/defs%3E%3Cg id='🎨-%5BSetup%5D:-Colors-&amp;-Shadows' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Artboard' transform='translate(-225.000000, -250.000000)'%3E%3Cg id='Icon-Color' transform='translate(225.000000, 250.500000)'%3E%3Cuse fill='%23fff' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='1' fill='%23fff' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  box-shadow: 0 0.1875rem 0.375rem 0 rgba(255, 171, 0, 0.4) ;
}

.bg-danger.toast, .bg-danger.bs-toast {
  color: #fff;
  background-color: rgba(255, 62, 29, 0.85) ;
  box-shadow: 0 0.25rem 1rem rgba(255, 62, 29, 0.4);
}
.bg-danger.toast .toast-header, .bg-danger.bs-toast .toast-header {
  color: #fff;
}
.bg-danger.toast .toast-header .btn-close, .bg-danger.bs-toast .toast-header .btn-close {
  background-color: #ff3e1d ;
  background-image: url("data:image/svg+xml,%3Csvg width='150px' height='151px' viewBox='0 0 150 151' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpolygon id='path-1' points='131.251657 0 74.9933705 56.25 18.7483426 0 0 18.75 56.2450278 75 0 131.25 18.7483426 150 74.9933705 93.75 131.251657 150 150 131.25 93.7549722 75 150 18.75'%3E%3C/polygon%3E%3C/defs%3E%3Cg id='🎨-%5BSetup%5D:-Colors-&amp;-Shadows' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Artboard' transform='translate(-225.000000, -250.000000)'%3E%3Cg id='Icon-Color' transform='translate(225.000000, 250.500000)'%3E%3Cuse fill='%23fff' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='1' fill='%23fff' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  box-shadow: 0 0.1875rem 0.375rem 0 rgba(255, 62, 29, 0.4) ;
}

.bg-light.toast, .bg-light.bs-toast {
  color: #fff;
  background-color: rgba(252, 253, 253, 0.85) ;
  box-shadow: 0 0.25rem 1rem rgba(252, 253, 253, 0.4);
}
.bg-light.toast .toast-header, .bg-light.bs-toast .toast-header {
  color: #fff;
}
.bg-light.toast .toast-header .btn-close, .bg-light.bs-toast .toast-header .btn-close {
  background-color: #fcfdfd ;
  background-image: url("data:image/svg+xml,%3Csvg width='150px' height='151px' viewBox='0 0 150 151' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpolygon id='path-1' points='131.251657 0 74.9933705 56.25 18.7483426 0 0 18.75 56.2450278 75 0 131.25 18.7483426 150 74.9933705 93.75 131.251657 150 150 131.25 93.7549722 75 150 18.75'%3E%3C/polygon%3E%3C/defs%3E%3Cg id='🎨-%5BSetup%5D:-Colors-&amp;-Shadows' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Artboard' transform='translate(-225.000000, -250.000000)'%3E%3Cg id='Icon-Color' transform='translate(225.000000, 250.500000)'%3E%3Cuse fill='%23fff' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='1' fill='%23fff' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  box-shadow: 0 0.1875rem 0.375rem 0 rgba(252, 253, 253, 0.4) ;
}

.bg-dark.toast, .bg-dark.bs-toast {
  color: #fff;
  background-color: rgba(35, 52, 70, 0.85) ;
  box-shadow: 0 0.25rem 1rem rgba(35, 52, 70, 0.4);
}
.bg-dark.toast .toast-header, .bg-dark.bs-toast .toast-header {
  color: #fff;
}
.bg-dark.toast .toast-header .btn-close, .bg-dark.bs-toast .toast-header .btn-close {
  background-color: #233446 ;
  background-image: url("data:image/svg+xml,%3Csvg width='150px' height='151px' viewBox='0 0 150 151' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpolygon id='path-1' points='131.251657 0 74.9933705 56.25 18.7483426 0 0 18.75 56.2450278 75 0 131.25 18.7483426 150 74.9933705 93.75 131.251657 150 150 131.25 93.7549722 75 150 18.75'%3E%3C/polygon%3E%3C/defs%3E%3Cg id='🎨-%5BSetup%5D:-Colors-&amp;-Shadows' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Artboard' transform='translate(-225.000000, -250.000000)'%3E%3Cg id='Icon-Color' transform='translate(225.000000, 250.500000)'%3E%3Cuse fill='%23fff' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='1' fill='%23fff' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  box-shadow: 0 0.1875rem 0.375rem 0 rgba(35, 52, 70, 0.4) ;
}

.bg-gray.toast, .bg-gray.bs-toast {
  color: #fff;
  background-color: rgba(67, 89, 113, 0.85) ;
  box-shadow: 0 0.25rem 1rem rgba(67, 89, 113, 0.4);
}
.bg-gray.toast .toast-header, .bg-gray.bs-toast .toast-header {
  color: #fff;
}
.bg-gray.toast .toast-header .btn-close, .bg-gray.bs-toast .toast-header .btn-close {
  background-color: rgba(67, 89, 113, 0.1) ;
  background-image: url("data:image/svg+xml,%3Csvg width='150px' height='151px' viewBox='0 0 150 151' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpolygon id='path-1' points='131.251657 0 74.9933705 56.25 18.7483426 0 0 18.75 56.2450278 75 0 131.25 18.7483426 150 74.9933705 93.75 131.251657 150 150 131.25 93.7549722 75 150 18.75'%3E%3C/polygon%3E%3C/defs%3E%3Cg id='🎨-%5BSetup%5D:-Colors-&amp;-Shadows' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Artboard' transform='translate(-225.000000, -250.000000)'%3E%3Cg id='Icon-Color' transform='translate(225.000000, 250.500000)'%3E%3Cuse fill='%23fff' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='1' fill='%23fff' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  box-shadow: 0 0.1875rem 0.375rem 0 rgba(67, 89, 113, 0.4) ;
}

.bs-toast[class^=bg-],
.bs-toast[class*=" bg-"] {
  border: none;
}

.toast.bs-toast {
  background-color: rgba(255, 255, 255, 0.85);
  z-index: 1095;
}
.toast.bs-toast .toast-header {
  padding-bottom: 0.5rem;
  position: relative;
}
.toast.bs-toast .toast-header .btn-close {
  position: absolute;
  top: -8px;
  border-radius: 0.375rem;
  padding: 0.45rem;
  background-size: 0.625em;
  transition: all 0.23s ease 0.1s;
  background-color: #fff;
  box-shadow: 0 0.125rem 0.25rem rgba(161, 172, 184, 0.4);
  right: 2px;
}
.toast.bs-toast .toast-header .btn-close:hover, .toast.bs-toast .toast-header .btn-close:focus, .toast.bs-toast .toast-header .btn-close:active {
  opacity: 1;
  outline: none;
}
.toast.bs-toast .toast-header ~ .toast-body {
  padding-top: 0;
}

.toast-ex {
  position: fixed;
  top: 4.1rem;
  right: 2.5rem;
}

.toast-placement-ex {
  position: fixed;
}

.carousel .carousel-item.active h1,
.carousel .carousel-item.active .h1,
.carousel .carousel-item.active h2,
.carousel .carousel-item.active .h2,
.carousel .carousel-item.active h3,
.carousel .carousel-item.active .h3,
.carousel .carousel-item.active h4,
.carousel .carousel-item.active .h4,
.carousel .carousel-item.active h5,
.carousel .carousel-item.active .h5,
.carousel .carousel-item.active h6,
.carousel .carousel-item.active .h6,
.carousel .carousel-item.carousel-item-start h1,
.carousel .carousel-item.carousel-item-start .h1,
.carousel .carousel-item.carousel-item-start h2,
.carousel .carousel-item.carousel-item-start .h2,
.carousel .carousel-item.carousel-item-start h3,
.carousel .carousel-item.carousel-item-start .h3,
.carousel .carousel-item.carousel-item-start h4,
.carousel .carousel-item.carousel-item-start .h4,
.carousel .carousel-item.carousel-item-start h5,
.carousel .carousel-item.carousel-item-start .h5,
.carousel .carousel-item.carousel-item-start h6,
.carousel .carousel-item.carousel-item-start .h6 {
  color: #fff;
}

.carousel.carousel-dark .carousel-item.active h1,
.carousel.carousel-dark .carousel-item.active .h1,
.carousel.carousel-dark .carousel-item.active h2,
.carousel.carousel-dark .carousel-item.active .h2,
.carousel.carousel-dark .carousel-item.active h3,
.carousel.carousel-dark .carousel-item.active .h3,
.carousel.carousel-dark .carousel-item.active h4,
.carousel.carousel-dark .carousel-item.active .h4,
.carousel.carousel-dark .carousel-item.active h5,
.carousel.carousel-dark .carousel-item.active .h5,
.carousel.carousel-dark .carousel-item.active h6,
.carousel.carousel-dark .carousel-item.active .h6,
.carousel.carousel-dark .carousel-item.carousel-item-start h1,
.carousel.carousel-dark .carousel-item.carousel-item-start .h1,
.carousel.carousel-dark .carousel-item.carousel-item-start h2,
.carousel.carousel-dark .carousel-item.carousel-item-start .h2,
.carousel.carousel-dark .carousel-item.carousel-item-start h3,
.carousel.carousel-dark .carousel-item.carousel-item-start .h3,
.carousel.carousel-dark .carousel-item.carousel-item-start h4,
.carousel.carousel-dark .carousel-item.carousel-item-start .h4,
.carousel.carousel-dark .carousel-item.carousel-item-start h5,
.carousel.carousel-dark .carousel-item.carousel-item-start .h5,
.carousel.carousel-dark .carousel-item.carousel-item-start h6,
.carousel.carousel-dark .carousel-item.carousel-item-start .h6 {
  color: #435971;
}

.spinner-border-lg {
  width: 3rem;
  height: 3rem;
  border-width: 0.3em;
}

.spinner-grow-lg {
  width: 3rem;
  height: 3rem;
  border-width: 0.3em;
}

@-webkit-keyframes spinner-border-rtl {
  to {
    transform: rotate(-360deg);
  }
}
@keyframes spinner-border-rtl {
  to {
    transform: rotate(-360deg);
  }
}
.offcanvas-header {
  padding-bottom: 0.75rem;
}

.offcanvas-body {
  padding-top: 0.75rem;
}

.align-baseline {
  vertical-align: baseline ;
}

.align-top {
  vertical-align: top ;
}

.align-middle {
  vertical-align: middle ;
}

.align-bottom {
  vertical-align: bottom ;
}

.align-text-bottom {
  vertical-align: text-bottom ;
}

.align-text-top {
  vertical-align: text-top ;
}

.overflow-auto {
  overflow: auto ;
}

.overflow-hidden {
  overflow: hidden ;
}

.overflow-visible {
  overflow: visible ;
}

.overflow-scroll {
  overflow: scroll ;
}

.d-inline {
  display: inline ;
}

.d-inline-block {
  display: inline-block ;
}

.d-block {
  display: block ;
}

.d-grid {
  display: grid ;
}

.d-table {
  display: table ;
}

.d-table-row {
  display: table-row ;
}

.d-table-cell {
  display: table-cell ;
}

.d-flex {
  display: flex ;
}

.d-inline-flex {
  display: inline-flex ;
}

.d-none {
  display: none ;
}

.shadow {
  box-shadow: 0 0.25rem 1rem rgba(161, 172, 184, 0.45) ;
}

.shadow-sm {
  box-shadow: 0 0.125rem 0.25rem rgba(161, 172, 184, 0.4) ;
}

.shadow-lg {
  box-shadow: 0 0.625rem 1.25rem rgba(161, 172, 184, 0.5) ;
}

.shadow-none {
  box-shadow: none ;
}

.position-static {
  position: static ;
}

.position-relative {
  position: relative ;
}

.position-absolute {
  position: absolute ;
}

.position-fixed {
  position: fixed ;
}

.position-sticky {
  position: -webkit-sticky ;
  position: sticky ;
}

.top-0 {
  top: 0 ;
}

.top-50 {
  top: 50% ;
}

.top-100 {
  top: 100% ;
}

.bottom-0 {
  bottom: 0 ;
}

.bottom-50 {
  bottom: 50% ;
}

.bottom-100 {
  bottom: 100% ;
}

.zindex-1 {
  z-index: 1 ;
}

.zindex-2 {
  z-index: 2 ;
}

.zindex-3 {
  z-index: 3 ;
}

.zindex-4 {
  z-index: 4 ;
}

.zindex-5 {
  z-index: 5 ;
}

.border {
  border: 1px solid #d9dee3 ;
}

.border-0 {
  border: 0 ;
}

.border-top {
  border-top: 1px solid #d9dee3 ;
}

.border-top-0 {
  border-top: 0 ;
}

.border-bottom {
  border-bottom: 1px solid #d9dee3 ;
}

.border-bottom-0 {
  border-bottom: 0 ;
}

.border-primary {
  border-color: #696cff ;
}

.border-secondary {
  border-color: #8592a3 ;
}

.border-success {
  border-color: #71dd37 ;
}

.border-info {
  border-color: #03c3ec ;
}

.border-warning {
  border-color: #ffab00 ;
}

.border-danger {
  border-color: #ff3e1d ;
}

.border-light {
  border-color: rgba(67, 89, 113, 0.1) ;
}

.border-dark {
  border-color: #233446 ;
}

.border-gray {
  border-color: rgba(67, 89, 113, 0.1) ;
}

.border-white {
  border-color: #fff ;
}

.border-transparent {
  border-color: transparent ;
}

.border-1 {
  border-width: 1px ;
}

.border-2 {
  border-width: 2px ;
}

.border-3 {
  border-width: 3px ;
}

.border-4 {
  border-width: 4px ;
}

.border-5 {
  border-width: 5px ;
}

.w-px-20 {
  width: 20px ;
}

.w-px-30 {
  width: 30px ;
}

.w-px-40 {
  width: 40px ;
}

.w-px-50 {
  width: 50px ;
}

.w-px-75 {
  width: 75px ;
}

.w-px-100 {
  width: 100px ;
}

.w-px-150 {
  width: 150px ;
}

.w-px-200 {
  width: 200px ;
}

.w-px-250 {
  width: 250px ;
}

.w-px-300 {
  width: 300px ;
}

.w-px-350 {
  width: 350px ;
}

.w-px-400 {
  width: 400px ;
}

.w-px-500 {
  width: 500px ;
}

.w-px-600 {
  width: 600px ;
}

.w-px-700 {
  width: 700px ;
}

.w-px-800 {
  width: 800px ;
}

.w-auto {
  width: auto ;
}

.w-25 {
  width: 25% ;
}

.w-50 {
  width: 50% ;
}

.w-75 {
  width: 75% ;
}

.w-100 {
  width: 100% ;
}

.mw-100 {
  max-width: 100% ;
}

.vw-100 {
  width: 100vw ;
}

.min-vw-100 {
  min-width: 100vw ;
}

.h-px-20 {
  height: 20px ;
}

.h-px-30 {
  height: 30px ;
}

.h-px-40 {
  height: 40px ;
}

.h-px-50 {
  height: 50px ;
}

.h-px-75 {
  height: 75px ;
}

.h-px-100 {
  height: 100px ;
}

.h-px-150 {
  height: 150px ;
}

.h-px-200 {
  height: 200px ;
}

.h-px-250 {
  height: 250px ;
}

.h-px-300 {
  height: 300px ;
}

.h-px-350 {
  height: 350px ;
}

.h-px-400 {
  height: 400px ;
}

.h-px-500 {
  height: 500px ;
}

.h-px-600 {
  height: 600px ;
}

.h-px-700 {
  height: 700px ;
}

.h-px-800 {
  height: 800px ;
}

.h-auto {
  height: auto ;
}

.h-25 {
  height: 25% ;
}

.h-50 {
  height: 50% ;
}

.h-75 {
  height: 75% ;
}

.h-100 {
  height: 100% ;
}

.mh-100 {
  max-height: 100% ;
}

.vh-100 {
  height: 100vh ;
}

.min-vh-100 {
  min-height: 100vh ;
}

.flex-fill {
  flex: 1 1 auto ;
}

.flex-row {
  flex-direction: row ;
}

.flex-column {
  flex-direction: column ;
}

.flex-row-reverse {
  flex-direction: row-reverse ;
}

.flex-column-reverse {
  flex-direction: column-reverse ;
}

.flex-grow-0 {
  flex-grow: 0 ;
}

.flex-grow-1 {
  flex-grow: 1 ;
}

.flex-shrink-0 {
  flex-shrink: 0 ;
}

.flex-shrink-1 {
  flex-shrink: 1 ;
}

.flex-wrap {
  flex-wrap: wrap ;
}

.flex-nowrap {
  flex-wrap: nowrap ;
}

.flex-wrap-reverse {
  flex-wrap: wrap-reverse ;
}

.gap-0 {
  gap: 0 ;
}

.gap-1 {
  gap: 0.25rem ;
}

.gap-2 {
  gap: 0.5rem ;
}

.gap-3 {
  gap: 1rem ;
}

.gap-4 {
  gap: 1.5rem ;
}

.gap-5 {
  gap: 3rem ;
}

.justify-content-start {
  justify-content: flex-start ;
}

.justify-content-end {
  justify-content: flex-end ;
}

.justify-content-center {
  justify-content: center ;
}

.justify-content-between {
  justify-content: space-between ;
}

.justify-content-around {
  justify-content: space-around ;
}

.justify-content-evenly {
  justify-content: space-evenly ;
}

.align-items-start {
  align-items: flex-start ;
}

.align-items-end {
  align-items: flex-end ;
}

.align-items-center {
  align-items: center ;
}

.align-items-baseline {
  align-items: baseline ;
}

.align-items-stretch {
  align-items: stretch ;
}

.align-content-start {
  align-content: flex-start ;
}

.align-content-end {
  align-content: flex-end ;
}

.align-content-center {
  align-content: center ;
}

.align-content-between {
  align-content: space-between ;
}

.align-content-around {
  align-content: space-around ;
}

.align-content-stretch {
  align-content: stretch ;
}

.align-self-auto {
  align-self: auto ;
}

.align-self-start {
  align-self: flex-start ;
}

.align-self-end {
  align-self: flex-end ;
}

.align-self-center {
  align-self: center ;
}

.align-self-baseline {
  align-self: baseline ;
}

.align-self-stretch {
  align-self: stretch ;
}

.order-first {
  order: -1 ;
}

.order-0 {
  order: 0 ;
}

.order-1 {
  order: 1 ;
}

.order-2 {
  order: 2 ;
}

.order-3 {
  order: 3 ;
}

.order-4 {
  order: 4 ;
}

.order-5 {
  order: 5 ;
}

.order-last {
  order: 6 ;
}

.m-0 {
  margin: 0 ;
}

.m-1 {
  margin: 0.25rem ;
}

.m-2 {
  margin: 0.5rem ;
}

.m-3 {
  margin: 1rem ;
}

.m-4 {
  margin: 1.5rem ;
}

.m-5 {
  margin: 3rem ;
}

.m-auto {
  margin: auto ;
}

.mx-0 {
  margin-right: 0 ;
  margin-left: 0 ;
}

.mx-1 {
  margin-right: 0.25rem ;
  margin-left: 0.25rem ;
}

.mx-2 {
  margin-right: 0.5rem ;
  margin-left: 0.5rem ;
}

.mx-3 {
  margin-right: 1rem ;
  margin-left: 1rem ;
}

.mx-4 {
  margin-right: 1.5rem ;
  margin-left: 1.5rem ;
}

.mx-5 {
  margin-right: 3rem ;
  margin-left: 3rem ;
}

.mx-auto {
  margin-right: auto ;
  margin-left: auto ;
}

.my-0 {
  margin-top: 0 ;
  margin-bottom: 0 ;
}

.my-1 {
  margin-top: 0.25rem ;
  margin-bottom: 0.25rem ;
}

.my-2 {
  margin-top: 0.5rem ;
  margin-bottom: 0.5rem ;
}

.my-3 {
  margin-top: 1rem ;
  margin-bottom: 1rem ;
}

.my-4 {
  margin-top: 1.5rem ;
  margin-bottom: 1.5rem ;
}

.my-5 {
  margin-top: 3rem ;
  margin-bottom: 3rem ;
}

.my-auto {
  margin-top: auto ;
  margin-bottom: auto ;
}

.mt-0 {
  margin-top: 0 ;
}

.mt-1 {
  margin-top: 0.25rem ;
}

.mt-2 {
  margin-top: 0.5rem ;
}

.mt-3 {
  margin-top: 1rem ;
}

.mt-4 {
  margin-top: 1.5rem ;
}

.mt-5 {
  margin-top: 3rem ;
}

.mt-auto {
  margin-top: auto ;
}

.mb-0 {
  margin-bottom: 0 ;
}

.mb-1 {
  margin-bottom: 0.25rem ;
}

.mb-2 {
  margin-bottom: 0.5rem ;
}

.mb-3 {
  margin-bottom: 1rem ;
}

.mb-4 {
  margin-bottom: 1.5rem ;
}

.mb-5 {
  margin-bottom: 3rem ;
}

.mb-auto {
  margin-bottom: auto ;
}

.m-n1 {
  margin: -0.25rem ;
}

.m-n2 {
  margin: -0.5rem ;
}

.m-n3 {
  margin: -1rem ;
}

.m-n4 {
  margin: -1.5rem ;
}

.m-n5 {
  margin: -3rem ;
}

.mx-n1 {
  margin-right: -0.25rem ;
  margin-left: -0.25rem ;
}

.mx-n2 {
  margin-right: -0.5rem ;
  margin-left: -0.5rem ;
}

.mx-n3 {
  margin-right: -1rem ;
  margin-left: -1rem ;
}

.mx-n4 {
  margin-right: -1.5rem ;
  margin-left: -1.5rem ;
}

.mx-n5 {
  margin-right: -3rem ;
  margin-left: -3rem ;
}

.my-n1 {
  margin-top: -0.25rem ;
  margin-bottom: -0.25rem ;
}

.my-n2 {
  margin-top: -0.5rem ;
  margin-bottom: -0.5rem ;
}

.my-n3 {
  margin-top: -1rem ;
  margin-bottom: -1rem ;
}

.my-n4 {
  margin-top: -1.5rem ;
  margin-bottom: -1.5rem ;
}

.my-n5 {
  margin-top: -3rem ;
  margin-bottom: -3rem ;
}

.mt-n1 {
  margin-top: -0.25rem ;
}

.mt-n2 {
  margin-top: -0.5rem ;
}

.mt-n3 {
  margin-top: -1rem ;
}

.mt-n4 {
  margin-top: -1.5rem ;
}

.mt-n5 {
  margin-top: -3rem ;
}

.mb-n1 {
  margin-bottom: -0.25rem ;
}

.mb-n2 {
  margin-bottom: -0.5rem ;
}

.mb-n3 {
  margin-bottom: -1rem ;
}

.mb-n4 {
  margin-bottom: -1.5rem ;
}

.mb-n5 {
  margin-bottom: -3rem ;
}

.p-0 {
  padding: 0 ;
}

.p-1 {
  padding: 0.25rem ;
}

.p-2 {
  padding: 0.5rem ;
}

.p-3 {
  padding: 1rem ;
}

.p-4 {
  padding: 1.5rem ;
}

.p-5 {
  padding: 3rem ;
}

.px-0 {
  padding-right: 0 ;
  padding-left: 0 ;
}
.px-mot {
  padding-right: 0.1rem ;
  padding-left: 0.1rem ;
}
.px-1 {
  padding-right: 0.25rem ;
  padding-left: 0.25rem ;
}

.px-2 {
  padding-right: 0.5rem ;
  padding-left: 0.5rem ;
}

.px-3 {
  padding-right: 1rem ;
  padding-left: 1rem ;
}

.px-4 {
  padding-right: 1.5rem ;
  padding-left: 1.5rem ;
}

.px-5 {
  padding-right: 3rem ;
  padding-left: 3rem ;
}

.py-0 {
  padding-top: 0 ;
  padding-bottom: 0 ;
}

.py-1 {
  padding-top: 0.25rem ;
  padding-bottom: 0.25rem ;
}

.py-2 {
  padding-top: 0.5rem ;
  padding-bottom: 0.5rem ;
}

.py-3 {
  padding-top: 1rem ;
  padding-bottom: 1rem ;
}

.py-4 {
  padding-top: 1.5rem ;
  padding-bottom: 1.5rem ;
}

.py-5 {
  padding-top: 3rem ;
  padding-bottom: 3rem ;
}

.pt-0 {
  padding-top: 0 ;
}

.pt-1 {
  padding-top: 0.25rem ;
}

.pt-2 {
  padding-top: 0.5rem ;
}

.pt-3 {
  padding-top: 1rem ;
}

.pt-4 {
  padding-top: 1.5rem ;
}

.pt-5 {
  padding-top: 3rem ;
}

.pb-0 {
  padding-bottom: 0 ;
}

.pb-1 {
  padding-bottom: 0.25rem ;
}

.pb-2 {
  padding-bottom: 0.5rem ;
}

.pb-3 {
  padding-bottom: 1rem ;
}

.pb-4 {
  padding-bottom: 1.5rem ;
}

.pb-5 {
  padding-bottom: 3rem ;
}

.font-monospace {
  font-family: var(--bs-font-monospace) ;
}

.fs-1 {
  font-size: calc(1.3625rem + 1.35vw) ;
}

.fs-2 {
  font-size: calc(1.325rem + 0.9vw) ;
}

.fs-3 {
  font-size: calc(1.2875rem + 0.45vw) ;
}

.fs-4 {
  font-size: calc(1.2625rem + 0.15vw) ;
}

.fs-5 {
  font-size: 1.125rem ;
}

.fs-6 {
  font-size: 0.9375rem ;
}

.fs-tiny {
  font-size: 70% ;
}

.fs-big {
  font-size: 112% ;
}

.fs-large {
  font-size: 150% ;
}

.fs-xlarge {
  font-size: 170% ;
}

.fst-italic {
  font-style: italic ;
}

.fst-normal {
  font-style: normal ;
}

.fw-light {
  font-weight: 300 ;
}

.fw-lighter {
  font-weight: 100 ;
}

.fw-normal {
  font-weight: 400 ;
}

.fw-bold {
  font-weight: 700 ;
}

.fw-semibold {
  font-weight: 600 ;
}

.fw-bolder {
  font-weight: 900 ;
}

.lh-1 {
  line-height: 1 ;
}

.lh-inherit {
  line-height: inherit ;
}

.lh-sm {
  line-height: 1.5 ;
}

.lh-base {
  line-height: 1.53 ;
}

.lh-lg {
  line-height: 1.5 ;
}

.text-decoration-none {
  text-decoration: none ;
}

.text-decoration-underline {
  text-decoration: underline ;
}

.text-decoration-line-through {
  text-decoration: line-through ;
}

.text-none {
  text-transform: none ;
}

.text-lowercase {
  text-transform: lowercase ;
}

.text-uppercase {
  text-transform: uppercase ;
}

.text-capitalize {
  text-transform: capitalize ;
}

.text-wrap {
  white-space: normal ;
}

.text-nowrap {
  white-space: nowrap ;
}

/* rtl:begin:remove */
.text-break {
  word-wrap: break-word ;
  word-break: break-word ;
}

/* rtl:end:remove */
.text-primary {
  --bs-text-opacity: 1;
  color: rgba(var(--bs-primary-rgb), var(--bs-text-opacity)) ;
}

.text-secondary {
  --bs-text-opacity: 1;
  color: rgba(var(--bs-secondary-rgb), var(--bs-text-opacity)) ;
}

.text-success {
  --bs-text-opacity: 1;
  color: rgba(var(--bs-success-rgb), var(--bs-text-opacity)) ;
}

.text-info {
  --bs-text-opacity: 1;
  color: rgba(var(--bs-info-rgb), var(--bs-text-opacity)) ;
}

.text-warning {
  --bs-text-opacity: 1;
  color: rgba(var(--bs-warning-rgb), var(--bs-text-opacity)) ;
}

.text-danger {
  --bs-text-opacity: 1;
  color: rgba(var(--bs-danger-rgb), var(--bs-text-opacity)) ;
}

.text-light {
  --bs-text-opacity: 1;
  color: #b4bdc6 ;
}

.text-dark {
  --bs-text-opacity: 1;
  color: rgba(var(--bs-dark-rgb), var(--bs-text-opacity)) ;
}

.text-gray {
  --bs-text-opacity: 1;
  color: rgba(var(--bs-gray-rgb), var(--bs-text-opacity)) ;
}

.text-black {
  --bs-text-opacity: 1;
  color: rgba(var(--bs-black-rgb), var(--bs-text-opacity)) ;
}

.text-white {
  --bs-text-opacity: 1;
  color: #fff ;
}

.text-body {
  --bs-text-opacity: 1;
  color: #697a8d ;
}

.text-muted {
  --bs-text-opacity: 1;
  color: #a1acb8 ;
}

.text-black-50 {
  --bs-text-opacity: 1;
  color: rgba(67, 89, 113, 0.5) ;
}

.text-white-50 {
  --bs-text-opacity: 1;
  color: rgba(255, 255, 255, 0.5) ;
}

.text-reset {
  --bs-text-opacity: 1;
  color: inherit ;
}

.bg-primary {
  --bs-bg-opacity: 1;
  background-color: rgba(var(--bs-primary-rgb), var(--bs-bg-opacity)) ;
}

.bg-secondary {
  --bs-bg-opacity: 1;
  background-color: rgba(var(--bs-secondary-rgb), var(--bs-bg-opacity)) ;
}

.bg-success {
  --bs-bg-opacity: 1;
  background-color: rgba(var(--bs-success-rgb), var(--bs-bg-opacity)) ;
}

.bg-info {
  --bs-bg-opacity: 1;
  background-color: rgba(var(--bs-info-rgb), var(--bs-bg-opacity)) ;
}

.bg-warning {
  --bs-bg-opacity: 1;
  background-color: rgba(var(--bs-warning-rgb), var(--bs-bg-opacity)) ;
}

.bg-danger {
  --bs-bg-opacity: 1;
  background-color: rgba(var(--bs-danger-rgb), var(--bs-bg-opacity)) ;
}

.bg-light {
  --bs-bg-opacity: 1;
  background-color: rgba(var(--bs-light-rgb), var(--bs-bg-opacity)) ;
}

.bg-dark {
  --bs-bg-opacity: 1;
  background-color: rgba(var(--bs-dark-rgb), var(--bs-bg-opacity)) ;
}

.bg-gray {
  --bs-bg-opacity: 1;
  background-color: rgba(var(--bs-gray-rgb), var(--bs-bg-opacity)) ;
}

.bg-black {
  --bs-bg-opacity: 1;
  background-color: rgba(var(--bs-black-rgb), var(--bs-bg-opacity)) ;
}

.bg-white {
  --bs-bg-opacity: 1;
  background-color: #fff ;
}

.bg-body {
  --bs-bg-opacity: 1;
  background-color: #f5f5f9 ;
}

.bg-transparent {
  --bs-bg-opacity: 1;
  background-color: transparent ;
}

.bg-lighter {
  --bs-bg-opacity: 1;
  background-color: rgba(67, 89, 113, 0.05) ;
}

.bg-lightest {
  --bs-bg-opacity: 1;
  background-color: rgba(67, 89, 113, 0.025) ;
}

.bg-gradient {
  background-image: var(--bs-gradient) ;
}

.user-select-all {
  -webkit-user-select: all ;
     -moz-user-select: all ;
          user-select: all ;
}

.user-select-auto {
  -webkit-user-select: auto ;
     -moz-user-select: auto ;
          user-select: auto ;
}

.user-select-none {
  -webkit-user-select: none ;
     -moz-user-select: none ;
          user-select: none ;
}

.pe-none {
  pointer-events: none ;
}

.pe-auto {
  pointer-events: auto ;
}

.rounded {
  border-radius: 0.375rem ;
}

.rounded-0 {
  border-radius: 0 ;
}

.rounded-1 {
  border-radius: 0.25rem ;
}

.rounded-2 {
  border-radius: 0.375rem ;
}

.rounded-3 {
  border-radius: 0.5rem ;
}

.rounded-circle {
  border-radius: 50% ;
}

.rounded-pill {
  border-radius: 50rem ;
}

.rounded-top {
  border-top-left-radius: 0.375rem ;
  border-top-right-radius: 0.375rem ;
}

.rounded-bottom {
  border-bottom-right-radius: 0.375rem ;
  border-bottom-left-radius: 0.375rem ;
}

.visible {
  visibility: visible ;
}

.invisible {
  visibility: hidden ;
}

.cursor-pointer {
  cursor: pointer ;
}

.cursor-move {
  cursor: move ;
}

.cursor-grab {
  cursor: -webkit-grab ;
  cursor: grab ;
}

@media (min-width: 576px) {
  .d-sm-inline {
    display: inline ;
  }

  .d-sm-inline-block {
    display: inline-block ;
  }

  .d-sm-block {
    display: block ;
  }

  .d-sm-grid {
    display: grid ;
  }

  .d-sm-table {
    display: table ;
  }

  .d-sm-table-row {
    display: table-row ;
  }

  .d-sm-table-cell {
    display: table-cell ;
  }

  .d-sm-flex {
    display: flex ;
  }

  .d-sm-inline-flex {
    display: inline-flex ;
  }

  .d-sm-none {
    display: none ;
  }

  .flex-sm-fill {
    flex: 1 1 auto ;
  }

  .flex-sm-row {
    flex-direction: row ;
  }

  .flex-sm-column {
    flex-direction: column ;
  }

  .flex-sm-row-reverse {
    flex-direction: row-reverse ;
  }

  .flex-sm-column-reverse {
    flex-direction: column-reverse ;
  }

  .flex-sm-grow-0 {
    flex-grow: 0 ;
  }

  .flex-sm-grow-1 {
    flex-grow: 1 ;
  }

  .flex-sm-shrink-0 {
    flex-shrink: 0 ;
  }

  .flex-sm-shrink-1 {
    flex-shrink: 1 ;
  }

  .flex-sm-wrap {
    flex-wrap: wrap ;
  }

  .flex-sm-nowrap {
    flex-wrap: nowrap ;
  }

  .flex-sm-wrap-reverse {
    flex-wrap: wrap-reverse ;
  }

  .gap-sm-0 {
    gap: 0 ;
  }

  .gap-sm-1 {
    gap: 0.25rem ;
  }

  .gap-sm-2 {
    gap: 0.5rem ;
  }

  .gap-sm-3 {
    gap: 1rem ;
  }

  .gap-sm-4 {
    gap: 1.5rem ;
  }

  .gap-sm-5 {
    gap: 3rem ;
  }

  .justify-content-sm-start {
    justify-content: flex-start ;
  }

  .justify-content-sm-end {
    justify-content: flex-end ;
  }

  .justify-content-sm-center {
    justify-content: center ;
  }

  .justify-content-sm-between {
    justify-content: space-between ;
  }

  .justify-content-sm-around {
    justify-content: space-around ;
  }

  .justify-content-sm-evenly {
    justify-content: space-evenly ;
  }

  .align-items-sm-start {
    align-items: flex-start ;
  }

  .align-items-sm-end {
    align-items: flex-end ;
  }

  .align-items-sm-center {
    align-items: center ;
  }

  .align-items-sm-baseline {
    align-items: baseline ;
  }

  .align-items-sm-stretch {
    align-items: stretch ;
  }

  .align-content-sm-start {
    align-content: flex-start ;
  }

  .align-content-sm-end {
    align-content: flex-end ;
  }

  .align-content-sm-center {
    align-content: center ;
  }

  .align-content-sm-between {
    align-content: space-between ;
  }

  .align-content-sm-around {
    align-content: space-around ;
  }

  .align-content-sm-stretch {
    align-content: stretch ;
  }

  .align-self-sm-auto {
    align-self: auto ;
  }

  .align-self-sm-start {
    align-self: flex-start ;
  }

  .align-self-sm-end {
    align-self: flex-end ;
  }

  .align-self-sm-center {
    align-self: center ;
  }

  .align-self-sm-baseline {
    align-self: baseline ;
  }

  .align-self-sm-stretch {
    align-self: stretch ;
  }

  .order-sm-first {
    order: -1 ;
  }

  .order-sm-0 {
    order: 0 ;
  }

  .order-sm-1 {
    order: 1 ;
  }

  .order-sm-2 {
    order: 2 ;
  }

  .order-sm-3 {
    order: 3 ;
  }

  .order-sm-4 {
    order: 4 ;
  }

  .order-sm-5 {
    order: 5 ;
  }

  .order-sm-last {
    order: 6 ;
  }

  .m-sm-0 {
    margin: 0 ;
  }

  .m-sm-1 {
    margin: 0.25rem ;
  }

  .m-sm-2 {
    margin: 0.5rem ;
  }

  .m-sm-3 {
    margin: 1rem ;
  }

  .m-sm-4 {
    margin: 1.5rem ;
  }

  .m-sm-5 {
    margin: 3rem ;
  }

  .m-sm-auto {
    margin: auto ;
  }

  .mx-sm-0 {
    margin-right: 0 ;
    margin-left: 0 ;
  }

  .mx-sm-1 {
    margin-right: 0.25rem ;
    margin-left: 0.25rem ;
  }

  .mx-sm-2 {
    margin-right: 0.5rem ;
    margin-left: 0.5rem ;
  }

  .mx-sm-3 {
    margin-right: 1rem ;
    margin-left: 1rem ;
  }

  .mx-sm-4 {
    margin-right: 1.5rem ;
    margin-left: 1.5rem ;
  }

  .mx-sm-5 {
    margin-right: 3rem ;
    margin-left: 3rem ;
  }

  .mx-sm-auto {
    margin-right: auto ;
    margin-left: auto ;
  }

  .my-sm-0 {
    margin-top: 0 ;
    margin-bottom: 0 ;
  }

  .my-sm-1 {
    margin-top: 0.25rem ;
    margin-bottom: 0.25rem ;
  }

  .my-sm-2 {
    margin-top: 0.5rem ;
    margin-bottom: 0.5rem ;
  }

  .my-sm-3 {
    margin-top: 1rem ;
    margin-bottom: 1rem ;
  }

  .my-sm-4 {
    margin-top: 1.5rem ;
    margin-bottom: 1.5rem ;
  }

  .my-sm-5 {
    margin-top: 3rem ;
    margin-bottom: 3rem ;
  }

  .my-sm-auto {
    margin-top: auto ;
    margin-bottom: auto ;
  }

  .mt-sm-0 {
    margin-top: 0 ;
  }

  .mt-sm-1 {
    margin-top: 0.25rem ;
  }

  .mt-sm-2 {
    margin-top: 0.5rem ;
  }

  .mt-sm-3 {
    margin-top: 1rem ;
  }

  .mt-sm-4 {
    margin-top: 1.5rem ;
  }

  .mt-sm-5 {
    margin-top: 3rem ;
  }

  .mt-sm-auto {
    margin-top: auto ;
  }

  .mb-sm-0 {
    margin-bottom: 0 ;
  }

  .mb-sm-1 {
    margin-bottom: 0.25rem ;
  }

  .mb-sm-2 {
    margin-bottom: 0.5rem ;
  }

  .mb-sm-3 {
    margin-bottom: 1rem ;
  }

  .mb-sm-4 {
    margin-bottom: 1.5rem ;
  }

  .mb-sm-5 {
    margin-bottom: 3rem ;
  }

  .mb-sm-auto {
    margin-bottom: auto ;
  }

  .m-sm-n1 {
    margin: -0.25rem ;
  }

  .m-sm-n2 {
    margin: -0.5rem ;
  }

  .m-sm-n3 {
    margin: -1rem ;
  }

  .m-sm-n4 {
    margin: -1.5rem ;
  }

  .m-sm-n5 {
    margin: -3rem ;
  }

  .mx-sm-n1 {
    margin-right: -0.25rem ;
    margin-left: -0.25rem ;
  }

  .mx-sm-n2 {
    margin-right: -0.5rem ;
    margin-left: -0.5rem ;
  }

  .mx-sm-n3 {
    margin-right: -1rem ;
    margin-left: -1rem ;
  }

  .mx-sm-n4 {
    margin-right: -1.5rem ;
    margin-left: -1.5rem ;
  }

  .mx-sm-n5 {
    margin-right: -3rem ;
    margin-left: -3rem ;
  }

  .my-sm-n1 {
    margin-top: -0.25rem ;
    margin-bottom: -0.25rem ;
  }

  .my-sm-n2 {
    margin-top: -0.5rem ;
    margin-bottom: -0.5rem ;
  }

  .my-sm-n3 {
    margin-top: -1rem ;
    margin-bottom: -1rem ;
  }

  .my-sm-n4 {
    margin-top: -1.5rem ;
    margin-bottom: -1.5rem ;
  }

  .my-sm-n5 {
    margin-top: -3rem ;
    margin-bottom: -3rem ;
  }

  .mt-sm-n1 {
    margin-top: -0.25rem ;
  }

  .mt-sm-n2 {
    margin-top: -0.5rem ;
  }

  .mt-sm-n3 {
    margin-top: -1rem ;
  }

  .mt-sm-n4 {
    margin-top: -1.5rem ;
  }

  .mt-sm-n5 {
    margin-top: -3rem ;
  }

  .mb-sm-n1 {
    margin-bottom: -0.25rem ;
  }

  .mb-sm-n2 {
    margin-bottom: -0.5rem ;
  }

  .mb-sm-n3 {
    margin-bottom: -1rem ;
  }

  .mb-sm-n4 {
    margin-bottom: -1.5rem ;
  }

  .mb-sm-n5 {
    margin-bottom: -3rem ;
  }

  .p-sm-0 {
    padding: 0 ;
  }

  .p-sm-1 {
    padding: 0.25rem ;
  }

  .p-sm-2 {
    padding: 0.5rem ;
  }

  .p-sm-3 {
    padding: 1rem ;
  }

  .p-sm-4 {
    padding: 1.5rem ;
  }

  .p-sm-5 {
    padding: 3rem ;
  }

  .px-sm-0 {
    padding-right: 0 ;
    padding-left: 0 ;
  }

  .px-sm-1 {
    padding-right: 0.25rem ;
    padding-left: 0.25rem ;
  }

  .px-sm-2 {
    padding-right: 0.5rem ;
    padding-left: 0.5rem ;
  }

  .px-sm-3 {
    padding-right: 1rem ;
    padding-left: 1rem ;
  }

  .px-sm-4 {
    padding-right: 1.5rem ;
    padding-left: 1.5rem ;
  }

  .px-sm-5 {
    padding-right: 3rem ;
    padding-left: 3rem ;
  }

  .py-sm-0 {
    padding-top: 0 ;
    padding-bottom: 0 ;
  }

  .py-sm-1 {
    padding-top: 0.25rem ;
    padding-bottom: 0.25rem ;
  }

  .py-sm-2 {
    padding-top: 0.5rem ;
    padding-bottom: 0.5rem ;
  }

  .py-sm-3 {
    padding-top: 1rem ;
    padding-bottom: 1rem ;
  }

  .py-sm-4 {
    padding-top: 1.5rem ;
    padding-bottom: 1.5rem ;
  }

  .py-sm-5 {
    padding-top: 3rem ;
    padding-bottom: 3rem ;
  }

  .pt-sm-0 {
    padding-top: 0 ;
  }

  .pt-sm-1 {
    padding-top: 0.25rem ;
  }

  .pt-sm-2 {
    padding-top: 0.5rem ;
  }

  .pt-sm-3 {
    padding-top: 1rem ;
  }

  .pt-sm-4 {
    padding-top: 1.5rem ;
  }

  .pt-sm-5 {
    padding-top: 3rem ;
  }

  .pb-sm-0 {
    padding-bottom: 0 ;
  }

  .pb-sm-1 {
    padding-bottom: 0.25rem ;
  }

  .pb-sm-2 {
    padding-bottom: 0.5rem ;
  }

  .pb-sm-3 {
    padding-bottom: 1rem ;
  }

  .pb-sm-4 {
    padding-bottom: 1.5rem ;
  }

  .pb-sm-5 {
    padding-bottom: 3rem ;
  }
}
@media (min-width: 768px) {
  .d-md-inline {
    display: inline ;
  }

  .d-md-inline-block {
    display: inline-block ;
  }

  .d-md-block {
    display: block ;
  }

  .d-md-grid {
    display: grid ;
  }

  .d-md-table {
    display: table ;
  }

  .d-md-table-row {
    display: table-row ;
  }

  .d-md-table-cell {
    display: table-cell ;
  }

  .d-md-flex {
    display: flex ;
  }

  .d-md-inline-flex {
    display: inline-flex ;
  }

  .d-md-none {
    display: none ;
  }

  .flex-md-fill {
    flex: 1 1 auto ;
  }

  .flex-md-row {
    flex-direction: row ;
  }

  .flex-md-column {
    flex-direction: column ;
  }

  .flex-md-row-reverse {
    flex-direction: row-reverse ;
  }

  .flex-md-column-reverse {
    flex-direction: column-reverse ;
  }

  .flex-md-grow-0 {
    flex-grow: 0 ;
  }

  .flex-md-grow-1 {
    flex-grow: 1 ;
  }

  .flex-md-shrink-0 {
    flex-shrink: 0 ;
  }

  .flex-md-shrink-1 {
    flex-shrink: 1 ;
  }

  .flex-md-wrap {
    flex-wrap: wrap ;
  }

  .flex-md-nowrap {
    flex-wrap: nowrap ;
  }

  .flex-md-wrap-reverse {
    flex-wrap: wrap-reverse ;
  }

  .gap-md-0 {
    gap: 0 ;
  }

  .gap-md-1 {
    gap: 0.25rem ;
  }

  .gap-md-2 {
    gap: 0.5rem ;
  }

  .gap-md-3 {
    gap: 1rem ;
  }

  .gap-md-4 {
    gap: 1.5rem ;
  }

  .gap-md-5 {
    gap: 3rem ;
  }

  .justify-content-md-start {
    justify-content: flex-start ;
  }

  .justify-content-md-end {
    justify-content: flex-end ;
  }

  .justify-content-md-center {
    justify-content: center ;
  }

  .justify-content-md-between {
    justify-content: space-between ;
  }

  .justify-content-md-around {
    justify-content: space-around ;
  }

  .justify-content-md-evenly {
    justify-content: space-evenly ;
  }

  .align-items-md-start {
    align-items: flex-start ;
  }

  .align-items-md-end {
    align-items: flex-end ;
  }

  .align-items-md-center {
    align-items: center ;
  }

  .align-items-md-baseline {
    align-items: baseline ;
  }

  .align-items-md-stretch {
    align-items: stretch ;
  }

  .align-content-md-start {
    align-content: flex-start ;
  }

  .align-content-md-end {
    align-content: flex-end ;
  }

  .align-content-md-center {
    align-content: center ;
  }

  .align-content-md-between {
    align-content: space-between ;
  }

  .align-content-md-around {
    align-content: space-around ;
  }

  .align-content-md-stretch {
    align-content: stretch ;
  }

  .align-self-md-auto {
    align-self: auto ;
  }

  .align-self-md-start {
    align-self: flex-start ;
  }

  .align-self-md-end {
    align-self: flex-end ;
  }

  .align-self-md-center {
    align-self: center ;
  }

  .align-self-md-baseline {
    align-self: baseline ;
  }

  .align-self-md-stretch {
    align-self: stretch ;
  }

  .order-md-first {
    order: -1 ;
  }

  .order-md-0 {
    order: 0 ;
  }

  .order-md-1 {
    order: 1 ;
  }

  .order-md-2 {
    order: 2 ;
  }

  .order-md-3 {
    order: 3 ;
  }

  .order-md-4 {
    order: 4 ;
  }

  .order-md-5 {
    order: 5 ;
  }

  .order-md-last {
    order: 6 ;
  }

  .m-md-0 {
    margin: 0 ;
  }

  .m-md-1 {
    margin: 0.25rem ;
  }

  .m-md-2 {
    margin: 0.5rem ;
  }

  .m-md-3 {
    margin: 1rem ;
  }

  .m-md-4 {
    margin: 1.5rem ;
  }

  .m-md-5 {
    margin: 3rem ;
  }

  .m-md-auto {
    margin: auto ;
  }

  .mx-md-0 {
    margin-right: 0 ;
    margin-left: 0 ;
  }

  .mx-md-1 {
    margin-right: 0.25rem ;
    margin-left: 0.25rem ;
  }

  .mx-md-2 {
    margin-right: 0.5rem ;
    margin-left: 0.5rem ;
  }

  .mx-md-3 {
    margin-right: 1rem ;
    margin-left: 1rem ;
  }

  .mx-md-4 {
    margin-right: 1.5rem ;
    margin-left: 1.5rem ;
  }

  .mx-md-5 {
    margin-right: 3rem ;
    margin-left: 3rem ;
  }

  .mx-md-auto {
    margin-right: auto ;
    margin-left: auto ;
  }

  .my-md-0 {
    margin-top: 0 ;
    margin-bottom: 0 ;
  }

  .my-md-1 {
    margin-top: 0.25rem ;
    margin-bottom: 0.25rem ;
  }

  .my-md-2 {
    margin-top: 0.5rem ;
    margin-bottom: 0.5rem ;
  }

  .my-md-3 {
    margin-top: 1rem ;
    margin-bottom: 1rem ;
  }

  .my-md-4 {
    margin-top: 1.5rem ;
    margin-bottom: 1.5rem ;
  }

  .my-md-5 {
    margin-top: 3rem ;
    margin-bottom: 3rem ;
  }

  .my-md-auto {
    margin-top: auto ;
    margin-bottom: auto ;
  }

  .mt-md-0 {
    margin-top: 0 ;
  }

  .mt-md-1 {
    margin-top: 0.25rem ;
  }

  .mt-md-2 {
    margin-top: 0.5rem ;
  }

  .mt-md-3 {
    margin-top: 1rem ;
  }

  .mt-md-4 {
    margin-top: 1.5rem ;
  }

  .mt-md-5 {
    margin-top: 3rem ;
  }

  .mt-md-auto {
    margin-top: auto ;
  }

  .mb-md-0 {
    margin-bottom: 0 ;
  }

  .mb-md-1 {
    margin-bottom: 0.25rem ;
  }

  .mb-md-2 {
    margin-bottom: 0.5rem ;
  }

  .mb-md-3 {
    margin-bottom: 1rem ;
  }

  .mb-md-4 {
    margin-bottom: 1.5rem ;
  }

  .mb-md-5 {
    margin-bottom: 3rem ;
  }

  .mb-md-auto {
    margin-bottom: auto ;
  }

  .m-md-n1 {
    margin: -0.25rem ;
  }

  .m-md-n2 {
    margin: -0.5rem ;
  }

  .m-md-n3 {
    margin: -1rem ;
  }

  .m-md-n4 {
    margin: -1.5rem ;
  }

  .m-md-n5 {
    margin: -3rem ;
  }

  .mx-md-n1 {
    margin-right: -0.25rem ;
    margin-left: -0.25rem ;
  }

  .mx-md-n2 {
    margin-right: -0.5rem ;
    margin-left: -0.5rem ;
  }

  .mx-md-n3 {
    margin-right: -1rem ;
    margin-left: -1rem ;
  }

  .mx-md-n4 {
    margin-right: -1.5rem ;
    margin-left: -1.5rem ;
  }

  .mx-md-n5 {
    margin-right: -3rem ;
    margin-left: -3rem ;
  }

  .my-md-n1 {
    margin-top: -0.25rem ;
    margin-bottom: -0.25rem ;
  }

  .my-md-n2 {
    margin-top: -0.5rem ;
    margin-bottom: -0.5rem ;
  }

  .my-md-n3 {
    margin-top: -1rem ;
    margin-bottom: -1rem ;
  }

  .my-md-n4 {
    margin-top: -1.5rem ;
    margin-bottom: -1.5rem ;
  }

  .my-md-n5 {
    margin-top: -3rem ;
    margin-bottom: -3rem ;
  }

  .mt-md-n1 {
    margin-top: -0.25rem ;
  }

  .mt-md-n2 {
    margin-top: -0.5rem ;
  }

  .mt-md-n3 {
    margin-top: -1rem ;
  }

  .mt-md-n4 {
    margin-top: -1.5rem ;
  }

  .mt-md-n5 {
    margin-top: -3rem ;
  }

  .mb-md-n1 {
    margin-bottom: -0.25rem ;
  }

  .mb-md-n2 {
    margin-bottom: -0.5rem ;
  }

  .mb-md-n3 {
    margin-bottom: -1rem ;
  }

  .mb-md-n4 {
    margin-bottom: -1.5rem ;
  }

  .mb-md-n5 {
    margin-bottom: -3rem ;
  }

  .p-md-0 {
    padding: 0 ;
  }

  .p-md-1 {
    padding: 0.25rem ;
  }

  .p-md-2 {
    padding: 0.5rem ;
  }

  .p-md-3 {
    padding: 1rem ;
  }

  .p-md-4 {
    padding: 1.5rem ;
  }

  .p-md-5 {
    padding: 3rem ;
  }

  .px-md-0 {
    padding-right: 0 ;
    padding-left: 0 ;
  }

  .px-md-1 {
    padding-right: 0.25rem ;
    padding-left: 0.25rem ;
  }

  .px-md-2 {
    padding-right: 0.5rem ;
    padding-left: 0.5rem ;
  }

  .px-md-3 {
    padding-right: 1rem ;
    padding-left: 1rem ;
  }

  .px-md-4 {
    padding-right: 1.5rem ;
    padding-left: 1.5rem ;
  }

  .px-md-5 {
    padding-right: 3rem ;
    padding-left: 3rem ;
  }

  .py-md-0 {
    padding-top: 0 ;
    padding-bottom: 0 ;
  }

  .py-md-1 {
    padding-top: 0.25rem ;
    padding-bottom: 0.25rem ;
  }

  .py-md-2 {
    padding-top: 0.5rem ;
    padding-bottom: 0.5rem ;
  }

  .py-md-3 {
    padding-top: 1rem ;
    padding-bottom: 1rem ;
  }

  .py-md-4 {
    padding-top: 1.5rem ;
    padding-bottom: 1.5rem ;
  }

  .py-md-5 {
    padding-top: 3rem ;
    padding-bottom: 3rem ;
  }

  .pt-md-0 {
    padding-top: 0 ;
  }

  .pt-md-1 {
    padding-top: 0.25rem ;
  }

  .pt-md-2 {
    padding-top: 0.5rem ;
  }

  .pt-md-3 {
    padding-top: 1rem ;
  }

  .pt-md-4 {
    padding-top: 1.5rem ;
  }

  .pt-md-5 {
    padding-top: 3rem ;
  }

  .pb-md-0 {
    padding-bottom: 0 ;
  }

  .pb-md-1 {
    padding-bottom: 0.25rem ;
  }

  .pb-md-2 {
    padding-bottom: 0.5rem ;
  }

  .pb-md-3 {
    padding-bottom: 1rem ;
  }

  .pb-md-4 {
    padding-bottom: 1.5rem ;
  }

  .pb-md-5 {
    padding-bottom: 3rem ;
  }
}
@media (min-width: 992px) {
  .d-lg-inline {
    display: inline ;
  }

  .d-lg-inline-block {
    display: inline-block ;
  }

  .d-lg-block {
    display: block ;
  }

  .d-lg-grid {
    display: grid ;
  }

  .d-lg-table {
    display: table ;
  }

  .d-lg-table-row {
    display: table-row ;
  }

  .d-lg-table-cell {
    display: table-cell ;
  }

  .d-lg-flex {
    display: flex ;
  }

  .d-lg-inline-flex {
    display: inline-flex ;
  }

  .d-lg-none {
    display: none ;
  }

  .flex-lg-fill {
    flex: 1 1 auto ;
  }

  .flex-lg-row {
    flex-direction: row ;
  }

  .flex-lg-column {
    flex-direction: column ;
  }

  .flex-lg-row-reverse {
    flex-direction: row-reverse ;
  }

  .flex-lg-column-reverse {
    flex-direction: column-reverse ;
  }

  .flex-lg-grow-0 {
    flex-grow: 0 ;
  }

  .flex-lg-grow-1 {
    flex-grow: 1 ;
  }

  .flex-lg-shrink-0 {
    flex-shrink: 0 ;
  }

  .flex-lg-shrink-1 {
    flex-shrink: 1 ;
  }

  .flex-lg-wrap {
    flex-wrap: wrap ;
  }

  .flex-lg-nowrap {
    flex-wrap: nowrap ;
  }

  .flex-lg-wrap-reverse {
    flex-wrap: wrap-reverse ;
  }

  .gap-lg-0 {
    gap: 0 ;
  }

  .gap-lg-1 {
    gap: 0.25rem ;
  }

  .gap-lg-2 {
    gap: 0.5rem ;
  }

  .gap-lg-3 {
    gap: 1rem ;
  }

  .gap-lg-4 {
    gap: 1.5rem ;
  }

  .gap-lg-5 {
    gap: 3rem ;
  }

  .justify-content-lg-start {
    justify-content: flex-start ;
  }

  .justify-content-lg-end {
    justify-content: flex-end ;
  }

  .justify-content-lg-center {
    justify-content: center ;
  }

  .justify-content-lg-between {
    justify-content: space-between ;
  }

  .justify-content-lg-around {
    justify-content: space-around ;
  }

  .justify-content-lg-evenly {
    justify-content: space-evenly ;
  }

  .align-items-lg-start {
    align-items: flex-start ;
  }

  .align-items-lg-end {
    align-items: flex-end ;
  }

  .align-items-lg-center {
    align-items: center ;
  }

  .align-items-lg-baseline {
    align-items: baseline ;
  }

  .align-items-lg-stretch {
    align-items: stretch ;
  }

  .align-content-lg-start {
    align-content: flex-start ;
  }

  .align-content-lg-end {
    align-content: flex-end ;
  }

  .align-content-lg-center {
    align-content: center ;
  }

  .align-content-lg-between {
    align-content: space-between ;
  }

  .align-content-lg-around {
    align-content: space-around ;
  }

  .align-content-lg-stretch {
    align-content: stretch ;
  }

  .align-self-lg-auto {
    align-self: auto ;
  }

  .align-self-lg-start {
    align-self: flex-start ;
  }

  .align-self-lg-end {
    align-self: flex-end ;
  }

  .align-self-lg-center {
    align-self: center ;
  }

  .align-self-lg-baseline {
    align-self: baseline ;
  }

  .align-self-lg-stretch {
    align-self: stretch ;
  }

  .order-lg-first {
    order: -1 ;
  }

  .order-lg-0 {
    order: 0 ;
  }

  .order-lg-1 {
    order: 1 ;
  }

  .order-lg-2 {
    order: 2 ;
  }

  .order-lg-3 {
    order: 3 ;
  }

  .order-lg-4 {
    order: 4 ;
  }

  .order-lg-5 {
    order: 5 ;
  }

  .order-lg-last {
    order: 6 ;
  }

  .m-lg-0 {
    margin: 0 ;
  }

  .m-lg-1 {
    margin: 0.25rem ;
  }

  .m-lg-2 {
    margin: 0.5rem ;
  }

  .m-lg-3 {
    margin: 1rem ;
  }

  .m-lg-4 {
    margin: 1.5rem ;
  }

  .m-lg-5 {
    margin: 3rem ;
  }

  .m-lg-auto {
    margin: auto ;
  }

  .mx-lg-0 {
    margin-right: 0 ;
    margin-left: 0 ;
  }

  .mx-lg-1 {
    margin-right: 0.25rem ;
    margin-left: 0.25rem ;
  }

  .mx-lg-2 {
    margin-right: 0.5rem ;
    margin-left: 0.5rem ;
  }

  .mx-lg-3 {
    margin-right: 1rem ;
    margin-left: 1rem ;
  }

  .mx-lg-4 {
    margin-right: 1.5rem ;
    margin-left: 1.5rem ;
  }

  .mx-lg-5 {
    margin-right: 3rem ;
    margin-left: 3rem ;
  }

  .mx-lg-auto {
    margin-right: auto ;
    margin-left: auto ;
  }

  .my-lg-0 {
    margin-top: 0 ;
    margin-bottom: 0 ;
  }

  .my-lg-1 {
    margin-top: 0.25rem ;
    margin-bottom: 0.25rem ;
  }

  .my-lg-2 {
    margin-top: 0.5rem ;
    margin-bottom: 0.5rem ;
  }

  .my-lg-3 {
    margin-top: 1rem ;
    margin-bottom: 1rem ;
  }

  .my-lg-4 {
    margin-top: 1.5rem ;
    margin-bottom: 1.5rem ;
  }

  .my-lg-5 {
    margin-top: 3rem ;
    margin-bottom: 3rem ;
  }

  .my-lg-auto {
    margin-top: auto ;
    margin-bottom: auto ;
  }

  .mt-lg-0 {
    margin-top: 0 ;
  }

  .mt-lg-1 {
    margin-top: 0.25rem ;
  }

  .mt-lg-2 {
    margin-top: 0.5rem ;
  }

  .mt-lg-3 {
    margin-top: 1rem ;
  }

  .mt-lg-4 {
    margin-top: 1.5rem ;
  }

  .mt-lg-5 {
    margin-top: 3rem ;
  }

  .mt-lg-auto {
    margin-top: auto ;
  }

  .mb-lg-0 {
    margin-bottom: 0 ;
  }

  .mb-lg-1 {
    margin-bottom: 0.25rem ;
  }

  .mb-lg-2 {
    margin-bottom: 0.5rem ;
  }

  .mb-lg-3 {
    margin-bottom: 1rem ;
  }

  .mb-lg-4 {
    margin-bottom: 1.5rem ;
  }

  .mb-lg-5 {
    margin-bottom: 3rem ;
  }

  .mb-lg-auto {
    margin-bottom: auto ;
  }

  .m-lg-n1 {
    margin: -0.25rem ;
  }

  .m-lg-n2 {
    margin: -0.5rem ;
  }

  .m-lg-n3 {
    margin: -1rem ;
  }

  .m-lg-n4 {
    margin: -1.5rem ;
  }

  .m-lg-n5 {
    margin: -3rem ;
  }

  .mx-lg-n1 {
    margin-right: -0.25rem ;
    margin-left: -0.25rem ;
  }

  .mx-lg-n2 {
    margin-right: -0.5rem ;
    margin-left: -0.5rem ;
  }

  .mx-lg-n3 {
    margin-right: -1rem ;
    margin-left: -1rem ;
  }

  .mx-lg-n4 {
    margin-right: -1.5rem ;
    margin-left: -1.5rem ;
  }

  .mx-lg-n5 {
    margin-right: -3rem ;
    margin-left: -3rem ;
  }

  .my-lg-n1 {
    margin-top: -0.25rem ;
    margin-bottom: -0.25rem ;
  }

  .my-lg-n2 {
    margin-top: -0.5rem ;
    margin-bottom: -0.5rem ;
  }

  .my-lg-n3 {
    margin-top: -1rem ;
    margin-bottom: -1rem ;
  }

  .my-lg-n4 {
    margin-top: -1.5rem ;
    margin-bottom: -1.5rem ;
  }

  .my-lg-n5 {
    margin-top: -3rem ;
    margin-bottom: -3rem ;
  }

  .mt-lg-n1 {
    margin-top: -0.25rem ;
  }

  .mt-lg-n2 {
    margin-top: -0.5rem ;
  }

  .mt-lg-n3 {
    margin-top: -1rem ;
  }

  .mt-lg-n4 {
    margin-top: -1.5rem ;
  }

  .mt-lg-n5 {
    margin-top: -3rem ;
  }

  .mb-lg-n1 {
    margin-bottom: -0.25rem ;
  }

  .mb-lg-n2 {
    margin-bottom: -0.5rem ;
  }

  .mb-lg-n3 {
    margin-bottom: -1rem ;
  }

  .mb-lg-n4 {
    margin-bottom: -1.5rem ;
  }

  .mb-lg-n5 {
    margin-bottom: -3rem ;
  }

  .p-lg-0 {
    padding: 0 ;
  }

  .p-lg-1 {
    padding: 0.25rem ;
  }

  .p-lg-2 {
    padding: 0.5rem ;
  }

  .p-lg-3 {
    padding: 1rem ;
  }

  .p-lg-4 {
    padding: 1.5rem ;
  }

  .p-lg-5 {
    padding: 3rem ;
  }

  .px-lg-0 {
    padding-right: 0 ;
    padding-left: 0 ;
  }

  .px-lg-1 {
    padding-right: 0.25rem ;
    padding-left: 0.25rem ;
  }

  .px-lg-2 {
    padding-right: 0.5rem ;
    padding-left: 0.5rem ;
  }

  .px-lg-3 {
    padding-right: 1rem ;
    padding-left: 1rem ;
  }

  .px-lg-4 {
    padding-right: 1.5rem ;
    padding-left: 1.5rem ;
  }

  .px-lg-5 {
    padding-right: 3rem ;
    padding-left: 3rem ;
  }

  .py-lg-0 {
    padding-top: 0 ;
    padding-bottom: 0 ;
  }

  .py-lg-1 {
    padding-top: 0.25rem ;
    padding-bottom: 0.25rem ;
  }

  .py-lg-2 {
    padding-top: 0.5rem ;
    padding-bottom: 0.5rem ;
  }

  .py-lg-3 {
    padding-top: 1rem ;
    padding-bottom: 1rem ;
  }

  .py-lg-4 {
    padding-top: 1.5rem ;
    padding-bottom: 1.5rem ;
  }

  .py-lg-5 {
    padding-top: 3rem ;
    padding-bottom: 3rem ;
  }

  .pt-lg-0 {
    padding-top: 0 ;
  }

  .pt-lg-1 {
    padding-top: 0.25rem ;
  }

  .pt-lg-2 {
    padding-top: 0.5rem ;
  }

  .pt-lg-3 {
    padding-top: 1rem ;
  }

  .pt-lg-4 {
    padding-top: 1.5rem ;
  }

  .pt-lg-5 {
    padding-top: 3rem ;
  }

  .pb-lg-0 {
    padding-bottom: 0 ;
  }

  .pb-lg-1 {
    padding-bottom: 0.25rem ;
  }

  .pb-lg-2 {
    padding-bottom: 0.5rem ;
  }

  .pb-lg-3 {
    padding-bottom: 1rem ;
  }

  .pb-lg-4 {
    padding-bottom: 1.5rem ;
  }

  .pb-lg-5 {
    padding-bottom: 3rem ;
  }
}
@media (min-width: 1200px) {
  .d-xl-inline {
    display: inline ;
  }

  .d-xl-inline-block {
    display: inline-block ;
  }

  .d-xl-block {
    display: block ;
  }

  .d-xl-grid {
    display: grid ;
  }

  .d-xl-table {
    display: table ;
  }

  .d-xl-table-row {
    display: table-row ;
  }

  .d-xl-table-cell {
    display: table-cell ;
  }

  .d-xl-flex {
    display: flex ;
  }

  .d-xl-inline-flex {
    display: inline-flex ;
  }

  .d-xl-none {
    display: none ;
  }

  .flex-xl-fill {
    flex: 1 1 auto ;
  }

  .flex-xl-row {
    flex-direction: row ;
  }

  .flex-xl-column {
    flex-direction: column ;
  }

  .flex-xl-row-reverse {
    flex-direction: row-reverse ;
  }

  .flex-xl-column-reverse {
    flex-direction: column-reverse ;
  }

  .flex-xl-grow-0 {
    flex-grow: 0 ;
  }

  .flex-xl-grow-1 {
    flex-grow: 1 ;
  }

  .flex-xl-shrink-0 {
    flex-shrink: 0 ;
  }

  .flex-xl-shrink-1 {
    flex-shrink: 1 ;
  }

  .flex-xl-wrap {
    flex-wrap: wrap ;
  }

  .flex-xl-nowrap {
    flex-wrap: nowrap ;
  }

  .flex-xl-wrap-reverse {
    flex-wrap: wrap-reverse ;
  }

  .gap-xl-0 {
    gap: 0 ;
  }

  .gap-xl-1 {
    gap: 0.25rem ;
  }

  .gap-xl-2 {
    gap: 0.5rem ;
  }

  .gap-xl-3 {
    gap: 1rem ;
  }

  .gap-xl-4 {
    gap: 1.5rem ;
  }

  .gap-xl-5 {
    gap: 3rem ;
  }

  .justify-content-xl-start {
    justify-content: flex-start ;
  }

  .justify-content-xl-end {
    justify-content: flex-end ;
  }

  .justify-content-xl-center {
    justify-content: center ;
  }

  .justify-content-xl-between {
    justify-content: space-between ;
  }

  .justify-content-xl-around {
    justify-content: space-around ;
  }

  .justify-content-xl-evenly {
    justify-content: space-evenly ;
  }

  .align-items-xl-start {
    align-items: flex-start ;
  }

  .align-items-xl-end {
    align-items: flex-end ;
  }

  .align-items-xl-center {
    align-items: center ;
  }

  .align-items-xl-baseline {
    align-items: baseline ;
  }

  .align-items-xl-stretch {
    align-items: stretch ;
  }

  .align-content-xl-start {
    align-content: flex-start ;
  }

  .align-content-xl-end {
    align-content: flex-end ;
  }

  .align-content-xl-center {
    align-content: center ;
  }

  .align-content-xl-between {
    align-content: space-between ;
  }

  .align-content-xl-around {
    align-content: space-around ;
  }

  .align-content-xl-stretch {
    align-content: stretch ;
  }

  .align-self-xl-auto {
    align-self: auto ;
  }

  .align-self-xl-start {
    align-self: flex-start ;
  }

  .align-self-xl-end {
    align-self: flex-end ;
  }

  .align-self-xl-center {
    align-self: center ;
  }

  .align-self-xl-baseline {
    align-self: baseline ;
  }

  .align-self-xl-stretch {
    align-self: stretch ;
  }

  .order-xl-first {
    order: -1 ;
  }

  .order-xl-0 {
    order: 0 ;
  }

  .order-xl-1 {
    order: 1 ;
  }

  .order-xl-2 {
    order: 2 ;
  }

  .order-xl-3 {
    order: 3 ;
  }

  .order-xl-4 {
    order: 4 ;
  }

  .order-xl-5 {
    order: 5 ;
  }

  .order-xl-last {
    order: 6 ;
  }

  .m-xl-0 {
    margin: 0 ;
  }

  .m-xl-1 {
    margin: 0.25rem ;
  }

  .m-xl-2 {
    margin: 0.5rem ;
  }

  .m-xl-3 {
    margin: 1rem ;
  }

  .m-xl-4 {
    margin: 1.5rem ;
  }

  .m-xl-5 {
    margin: 3rem ;
  }

  .m-xl-auto {
    margin: auto ;
  }

  .mx-xl-0 {
    margin-right: 0 ;
    margin-left: 0 ;
  }

  .mx-xl-1 {
    margin-right: 0.25rem ;
    margin-left: 0.25rem ;
  }

  .mx-xl-2 {
    margin-right: 0.5rem ;
    margin-left: 0.5rem ;
  }

  .mx-xl-3 {
    margin-right: 1rem ;
    margin-left: 1rem ;
  }

  .mx-xl-4 {
    margin-right: 1.5rem ;
    margin-left: 1.5rem ;
  }

  .mx-xl-5 {
    margin-right: 3rem ;
    margin-left: 3rem ;
  }

  .mx-xl-auto {
    margin-right: auto ;
    margin-left: auto ;
  }

  .my-xl-0 {
    margin-top: 0 ;
    margin-bottom: 0 ;
  }

  .my-xl-1 {
    margin-top: 0.25rem ;
    margin-bottom: 0.25rem ;
  }

  .my-xl-2 {
    margin-top: 0.5rem ;
    margin-bottom: 0.5rem ;
  }

  .my-xl-3 {
    margin-top: 1rem ;
    margin-bottom: 1rem ;
  }

  .my-xl-4 {
    margin-top: 1.5rem ;
    margin-bottom: 1.5rem ;
  }

  .my-xl-5 {
    margin-top: 3rem ;
    margin-bottom: 3rem ;
  }

  .my-xl-auto {
    margin-top: auto ;
    margin-bottom: auto ;
  }

  .mt-xl-0 {
    margin-top: 0 ;
  }

  .mt-xl-1 {
    margin-top: 0.25rem ;
  }

  .mt-xl-2 {
    margin-top: 0.5rem ;
  }

  .mt-xl-3 {
    margin-top: 1rem ;
  }

  .mt-xl-4 {
    margin-top: 1.5rem ;
  }

  .mt-xl-5 {
    margin-top: 3rem ;
  }

  .mt-xl-auto {
    margin-top: auto ;
  }

  .mb-xl-0 {
    margin-bottom: 0 ;
  }

  .mb-xl-1 {
    margin-bottom: 0.25rem ;
  }

  .mb-xl-2 {
    margin-bottom: 0.5rem ;
  }

  .mb-xl-3 {
    margin-bottom: 1rem ;
  }

  .mb-xl-4 {
    margin-bottom: 1.5rem ;
  }

  .mb-xl-5 {
    margin-bottom: 3rem ;
  }

  .mb-xl-auto {
    margin-bottom: auto ;
  }

  .m-xl-n1 {
    margin: -0.25rem ;
  }

  .m-xl-n2 {
    margin: -0.5rem ;
  }

  .m-xl-n3 {
    margin: -1rem ;
  }

  .m-xl-n4 {
    margin: -1.5rem ;
  }

  .m-xl-n5 {
    margin: -3rem ;
  }

  .mx-xl-n1 {
    margin-right: -0.25rem ;
    margin-left: -0.25rem ;
  }

  .mx-xl-n2 {
    margin-right: -0.5rem ;
    margin-left: -0.5rem ;
  }

  .mx-xl-n3 {
    margin-right: -1rem ;
    margin-left: -1rem ;
  }

  .mx-xl-n4 {
    margin-right: -1.5rem ;
    margin-left: -1.5rem ;
  }

  .mx-xl-n5 {
    margin-right: -3rem ;
    margin-left: -3rem ;
  }

  .my-xl-n1 {
    margin-top: -0.25rem ;
    margin-bottom: -0.25rem ;
  }

  .my-xl-n2 {
    margin-top: -0.5rem ;
    margin-bottom: -0.5rem ;
  }

  .my-xl-n3 {
    margin-top: -1rem ;
    margin-bottom: -1rem ;
  }

  .my-xl-n4 {
    margin-top: -1.5rem ;
    margin-bottom: -1.5rem ;
  }

  .my-xl-n5 {
    margin-top: -3rem ;
    margin-bottom: -3rem ;
  }

  .mt-xl-n1 {
    margin-top: -0.25rem ;
  }

  .mt-xl-n2 {
    margin-top: -0.5rem ;
  }

  .mt-xl-n3 {
    margin-top: -1rem ;
  }

  .mt-xl-n4 {
    margin-top: -1.5rem ;
  }

  .mt-xl-n5 {
    margin-top: -3rem ;
  }

  .mb-xl-n1 {
    margin-bottom: -0.25rem ;
  }

  .mb-xl-n2 {
    margin-bottom: -0.5rem ;
  }

  .mb-xl-n3 {
    margin-bottom: -1rem ;
  }

  .mb-xl-n4 {
    margin-bottom: -1.5rem ;
  }

  .mb-xl-n5 {
    margin-bottom: -3rem ;
  }

  .p-xl-0 {
    padding: 0 ;
  }

  .p-xl-1 {
    padding: 0.25rem ;
  }

  .p-xl-2 {
    padding: 0.5rem ;
  }

  .p-xl-3 {
    padding: 1rem ;
  }

  .p-xl-4 {
    padding: 1.5rem ;
  }

  .p-xl-5 {
    padding: 3rem ;
  }

  .px-xl-0 {
    padding-right: 0 ;
    padding-left: 0 ;
  }

  .px-xl-1 {
    padding-right: 0.25rem ;
    padding-left: 0.25rem ;
  }

  .px-xl-2 {
    padding-right: 0.5rem ;
    padding-left: 0.5rem ;
  }

  .px-xl-3 {
    padding-right: 1rem ;
    padding-left: 1rem ;
  }

  .px-xl-4 {
    padding-right: 1.5rem ;
    padding-left: 1.5rem ;
  }

  .px-xl-5 {
    padding-right: 3rem ;
    padding-left: 3rem ;
  }

  .py-xl-0 {
    padding-top: 0 ;
    padding-bottom: 0 ;
  }

  .py-xl-1 {
    padding-top: 0.25rem ;
    padding-bottom: 0.25rem ;
  }

  .py-xl-2 {
    padding-top: 0.5rem ;
    padding-bottom: 0.5rem ;
  }

  .py-xl-3 {
    padding-top: 1rem ;
    padding-bottom: 1rem ;
  }

  .py-xl-4 {
    padding-top: 1.5rem ;
    padding-bottom: 1.5rem ;
  }

  .py-xl-5 {
    padding-top: 3rem ;
    padding-bottom: 3rem ;
  }

  .pt-xl-0 {
    padding-top: 0 ;
  }

  .pt-xl-1 {
    padding-top: 0.25rem ;
  }

  .pt-xl-2 {
    padding-top: 0.5rem ;
  }

  .pt-xl-3 {
    padding-top: 1rem ;
  }

  .pt-xl-4 {
    padding-top: 1.5rem ;
  }

  .pt-xl-5 {
    padding-top: 3rem ;
  }

  .pb-xl-0 {
    padding-bottom: 0 ;
  }

  .pb-xl-1 {
    padding-bottom: 0.25rem ;
  }

  .pb-xl-2 {
    padding-bottom: 0.5rem ;
  }

  .pb-xl-3 {
    padding-bottom: 1rem ;
  }

  .pb-xl-4 {
    padding-bottom: 1.5rem ;
  }

  .pb-xl-5 {
    padding-bottom: 3rem ;
  }
}
@media (min-width: 1400px) {
  .d-xxl-inline {
    display: inline ;
  }

  .d-xxl-inline-block {
    display: inline-block ;
  }

  .d-xxl-block {
    display: block ;
  }

  .d-xxl-grid {
    display: grid ;
  }

  .d-xxl-table {
    display: table ;
  }

  .d-xxl-table-row {
    display: table-row ;
  }

  .d-xxl-table-cell {
    display: table-cell ;
  }

  .d-xxl-flex {
    display: flex ;
  }

  .d-xxl-inline-flex {
    display: inline-flex ;
  }

  .d-xxl-none {
    display: none ;
  }

  .flex-xxl-fill {
    flex: 1 1 auto ;
  }

  .flex-xxl-row {
    flex-direction: row ;
  }

  .flex-xxl-column {
    flex-direction: column ;
  }

  .flex-xxl-row-reverse {
    flex-direction: row-reverse ;
  }

  .flex-xxl-column-reverse {
    flex-direction: column-reverse ;
  }

  .flex-xxl-grow-0 {
    flex-grow: 0 ;
  }

  .flex-xxl-grow-1 {
    flex-grow: 1 ;
  }

  .flex-xxl-shrink-0 {
    flex-shrink: 0 ;
  }

  .flex-xxl-shrink-1 {
    flex-shrink: 1 ;
  }

  .flex-xxl-wrap {
    flex-wrap: wrap ;
  }

  .flex-xxl-nowrap {
    flex-wrap: nowrap ;
  }

  .flex-xxl-wrap-reverse {
    flex-wrap: wrap-reverse ;
  }

  .gap-xxl-0 {
    gap: 0 ;
  }

  .gap-xxl-1 {
    gap: 0.25rem ;
  }

  .gap-xxl-2 {
    gap: 0.5rem ;
  }

  .gap-xxl-3 {
    gap: 1rem ;
  }

  .gap-xxl-4 {
    gap: 1.5rem ;
  }

  .gap-xxl-5 {
    gap: 3rem ;
  }

  .justify-content-xxl-start {
    justify-content: flex-start ;
  }

  .justify-content-xxl-end {
    justify-content: flex-end ;
  }

  .justify-content-xxl-center {
    justify-content: center ;
  }

  .justify-content-xxl-between {
    justify-content: space-between ;
  }

  .justify-content-xxl-around {
    justify-content: space-around ;
  }

  .justify-content-xxl-evenly {
    justify-content: space-evenly ;
  }

  .align-items-xxl-start {
    align-items: flex-start ;
  }

  .align-items-xxl-end {
    align-items: flex-end ;
  }

  .align-items-xxl-center {
    align-items: center ;
  }

  .align-items-xxl-baseline {
    align-items: baseline ;
  }

  .align-items-xxl-stretch {
    align-items: stretch ;
  }

  .align-content-xxl-start {
    align-content: flex-start ;
  }

  .align-content-xxl-end {
    align-content: flex-end ;
  }

  .align-content-xxl-center {
    align-content: center ;
  }

  .align-content-xxl-between {
    align-content: space-between ;
  }

  .align-content-xxl-around {
    align-content: space-around ;
  }

  .align-content-xxl-stretch {
    align-content: stretch ;
  }

  .align-self-xxl-auto {
    align-self: auto ;
  }

  .align-self-xxl-start {
    align-self: flex-start ;
  }

  .align-self-xxl-end {
    align-self: flex-end ;
  }

  .align-self-xxl-center {
    align-self: center ;
  }

  .align-self-xxl-baseline {
    align-self: baseline ;
  }

  .align-self-xxl-stretch {
    align-self: stretch ;
  }

  .order-xxl-first {
    order: -1 ;
  }

  .order-xxl-0 {
    order: 0 ;
  }

  .order-xxl-1 {
    order: 1 ;
  }

  .order-xxl-2 {
    order: 2 ;
  }

  .order-xxl-3 {
    order: 3 ;
  }

  .order-xxl-4 {
    order: 4 ;
  }

  .order-xxl-5 {
    order: 5 ;
  }

  .order-xxl-last {
    order: 6 ;
  }

  .m-xxl-0 {
    margin: 0 ;
  }

  .m-xxl-1 {
    margin: 0.25rem ;
  }

  .m-xxl-2 {
    margin: 0.5rem ;
  }

  .m-xxl-3 {
    margin: 1rem ;
  }

  .m-xxl-4 {
    margin: 1.5rem ;
  }

  .m-xxl-5 {
    margin: 3rem ;
  }

  .m-xxl-auto {
    margin: auto ;
  }

  .mx-xxl-0 {
    margin-right: 0 ;
    margin-left: 0 ;
  }

  .mx-xxl-1 {
    margin-right: 0.25rem ;
    margin-left: 0.25rem ;
  }

  .mx-xxl-2 {
    margin-right: 0.5rem ;
    margin-left: 0.5rem ;
  }

  .mx-xxl-3 {
    margin-right: 1rem ;
    margin-left: 1rem ;
  }

  .mx-xxl-4 {
    margin-right: 1.5rem ;
    margin-left: 1.5rem ;
  }

  .mx-xxl-5 {
    margin-right: 3rem ;
    margin-left: 3rem ;
  }

  .mx-xxl-auto {
    margin-right: auto ;
    margin-left: auto ;
  }

  .my-xxl-0 {
    margin-top: 0 ;
    margin-bottom: 0 ;
  }

  .my-xxl-1 {
    margin-top: 0.25rem ;
    margin-bottom: 0.25rem ;
  }

  .my-xxl-2 {
    margin-top: 0.5rem ;
    margin-bottom: 0.5rem ;
  }

  .my-xxl-3 {
    margin-top: 1rem ;
    margin-bottom: 1rem ;
  }

  .my-xxl-4 {
    margin-top: 1.5rem ;
    margin-bottom: 1.5rem ;
  }

  .my-xxl-5 {
    margin-top: 3rem ;
    margin-bottom: 3rem ;
  }

  .my-xxl-auto {
    margin-top: auto ;
    margin-bottom: auto ;
  }

  .mt-xxl-0 {
    margin-top: 0 ;
  }

  .mt-xxl-1 {
    margin-top: 0.25rem ;
  }

  .mt-xxl-2 {
    margin-top: 0.5rem ;
  }

  .mt-xxl-3 {
    margin-top: 1rem ;
  }

  .mt-xxl-4 {
    margin-top: 1.5rem ;
  }

  .mt-xxl-5 {
    margin-top: 3rem ;
  }

  .mt-xxl-auto {
    margin-top: auto ;
  }

  .mb-xxl-0 {
    margin-bottom: 0 ;
  }

  .mb-xxl-1 {
    margin-bottom: 0.25rem ;
  }

  .mb-xxl-2 {
    margin-bottom: 0.5rem ;
  }

  .mb-xxl-3 {
    margin-bottom: 1rem ;
  }

  .mb-xxl-4 {
    margin-bottom: 1.5rem ;
  }

  .mb-xxl-5 {
    margin-bottom: 3rem ;
  }

  .mb-xxl-auto {
    margin-bottom: auto ;
  }

  .m-xxl-n1 {
    margin: -0.25rem ;
  }

  .m-xxl-n2 {
    margin: -0.5rem ;
  }

  .m-xxl-n3 {
    margin: -1rem ;
  }

  .m-xxl-n4 {
    margin: -1.5rem ;
  }

  .m-xxl-n5 {
    margin: -3rem ;
  }

  .mx-xxl-n1 {
    margin-right: -0.25rem ;
    margin-left: -0.25rem ;
  }

  .mx-xxl-n2 {
    margin-right: -0.5rem ;
    margin-left: -0.5rem ;
  }

  .mx-xxl-n3 {
    margin-right: -1rem ;
    margin-left: -1rem ;
  }

  .mx-xxl-n4 {
    margin-right: -1.5rem ;
    margin-left: -1.5rem ;
  }

  .mx-xxl-n5 {
    margin-right: -3rem ;
    margin-left: -3rem ;
  }

  .my-xxl-n1 {
    margin-top: -0.25rem ;
    margin-bottom: -0.25rem ;
  }

  .my-xxl-n2 {
    margin-top: -0.5rem ;
    margin-bottom: -0.5rem ;
  }

  .my-xxl-n3 {
    margin-top: -1rem ;
    margin-bottom: -1rem ;
  }

  .my-xxl-n4 {
    margin-top: -1.5rem ;
    margin-bottom: -1.5rem ;
  }

  .my-xxl-n5 {
    margin-top: -3rem ;
    margin-bottom: -3rem ;
  }

  .mt-xxl-n1 {
    margin-top: -0.25rem ;
  }

  .mt-xxl-n2 {
    margin-top: -0.5rem ;
  }

  .mt-xxl-n3 {
    margin-top: -1rem ;
  }

  .mt-xxl-n4 {
    margin-top: -1.5rem ;
  }

  .mt-xxl-n5 {
    margin-top: -3rem ;
  }

  .mb-xxl-n1 {
    margin-bottom: -0.25rem ;
  }

  .mb-xxl-n2 {
    margin-bottom: -0.5rem ;
  }

  .mb-xxl-n3 {
    margin-bottom: -1rem ;
  }

  .mb-xxl-n4 {
    margin-bottom: -1.5rem ;
  }

  .mb-xxl-n5 {
    margin-bottom: -3rem ;
  }

  .p-xxl-0 {
    padding: 0 ;
  }

  .p-xxl-1 {
    padding: 0.25rem ;
  }

  .p-xxl-2 {
    padding: 0.5rem ;
  }

  .p-xxl-3 {
    padding: 1rem ;
  }

  .p-xxl-4 {
    padding: 1.5rem ;
  }

  .p-xxl-5 {
    padding: 3rem ;
  }

  .px-xxl-0 {
    padding-right: 0 ;
    padding-left: 0 ;
  }

  .px-xxl-1 {
    padding-right: 0.25rem ;
    padding-left: 0.25rem ;
  }

  .px-xxl-2 {
    padding-right: 0.5rem ;
    padding-left: 0.5rem ;
  }

  .px-xxl-3 {
    padding-right: 1rem ;
    padding-left: 1rem ;
  }

  .px-xxl-4 {
    padding-right: 1.5rem ;
    padding-left: 1.5rem ;
  }

  .px-xxl-5 {
    padding-right: 3rem ;
    padding-left: 3rem ;
  }

  .py-xxl-0 {
    padding-top: 0 ;
    padding-bottom: 0 ;
  }

  .py-xxl-1 {
    padding-top: 0.25rem ;
    padding-bottom: 0.25rem ;
  }

  .py-xxl-2 {
    padding-top: 0.5rem ;
    padding-bottom: 0.5rem ;
  }

  .py-xxl-3 {
    padding-top: 1rem ;
    padding-bottom: 1rem ;
  }

  .py-xxl-4 {
    padding-top: 1.5rem ;
    padding-bottom: 1.5rem ;
  }

  .py-xxl-5 {
    padding-top: 3rem ;
    padding-bottom: 3rem ;
  }

  .pt-xxl-0 {
    padding-top: 0 ;
  }

  .pt-xxl-1 {
    padding-top: 0.25rem ;
  }

  .pt-xxl-2 {
    padding-top: 0.5rem ;
  }

  .pt-xxl-3 {
    padding-top: 1rem ;
  }

  .pt-xxl-4 {
    padding-top: 1.5rem ;
  }

  .pt-xxl-5 {
    padding-top: 3rem ;
  }

  .pb-xxl-0 {
    padding-bottom: 0 ;
  }

  .pb-xxl-1 {
    padding-bottom: 0.25rem ;
  }

  .pb-xxl-2 {
    padding-bottom: 0.5rem ;
  }

  .pb-xxl-3 {
    padding-bottom: 1rem ;
  }

  .pb-xxl-4 {
    padding-bottom: 1.5rem ;
  }

  .pb-xxl-5 {
    padding-bottom: 3rem ;
  }
}
@media (min-width: 1200px) {
  .fs-1 {
    font-size: 2.375rem ;
  }

  .fs-2 {
    font-size: 2rem ;
  }

  .fs-3 {
    font-size: 1.625rem ;
  }

  .fs-4 {
    font-size: 1.375rem ;
  }
}
@media print {
  .d-print-inline {
    display: inline ;
  }

  .d-print-inline-block {
    display: inline-block ;
  }

  .d-print-block {
    display: block ;
  }

  .d-print-grid {
    display: grid ;
  }

  .d-print-table {
    display: table ;
  }

  .d-print-table-row {
    display: table-row ;
  }

  .d-print-table-cell {
    display: table-cell ;
  }

  .d-print-flex {
    display: flex ;
  }

  .d-print-inline-flex {
    display: inline-flex ;
  }

  .d-print-none {
    display: none ;
  }
}

.float-start {
  float: left ;
}

.float-end {
  float: right ;
}

.float-none {
  float: none ;
}

.end-0 {
  right: 0 ;
}

.end-50 {
  right: 50% ;
}

.end-100 {
  right: 100% ;
}

.start-0 {
  left: 0 ;
}

.start-50 {
  left: 50% ;
}

.start-100 {
  left: 100% ;
}

.translate-middle {
  transform: translate(-50%, -50%) ;
}

.translate-middle-x {
  transform: translateX(-50%) ;
}

.translate-middle-y {
  transform: translateY(-50%) ;
}

.border-end {
  border-right: 1px solid #d9dee3 ;
}

.border-end-0 {
  border-right: 0 ;
}

.border-start {
  border-left: 1px solid #d9dee3 ;
}

.border-start-0 {
  border-left: 0 ;
}

.text-start {
  text-align: left ;
}

.text-end {
  text-align: right ;
}

.text-center {
  text-align: center ;
}

.rounded-end {
  border-top-right-radius: 0.375rem ;
  border-bottom-right-radius: 0.375rem ;
}

.rounded-start {
  border-bottom-left-radius: 0.375rem ;
  border-top-left-radius: 0.375rem ;
}

.rounded-start-top {
  border-top-left-radius: 0.375rem ;
}

.rounded-start-bottom {
  border-bottom-left-radius: 0.375rem ;
}

.rounded-end-top {
  border-top-right-radius: 0.375rem ;
}

.rounded-end-bottom {
  border-bottom-right-radius: 0.375rem ;
}

.me-0 {
  margin-right: 0 ;
}

.me-1 {
  margin-right: 0.25rem ;
}

.me-2 {
  margin-right: 0.5rem ;
}

.me-3 {
  margin-right: 1rem ;
}

.me-4 {
  margin-right: 1.5rem ;
}

.me-5 {
  margin-right: 3rem ;
}

.me-auto {
  margin-right: auto ;
}

.ms-0 {
  margin-left: 0 ;
}

.ms-1 {
  margin-left: 0.25rem ;
}

.ms-2 {
  margin-left: 0.5rem ;
}

.ms-3 {
  margin-left: 1rem ;
}

.ms-4 {
  margin-left: 1.5rem ;
}

.ms-5 {
  margin-left: 3rem ;
}

.ms-auto {
  margin-left: auto ;
}

.me-n1 {
  margin-right: -0.25rem ;
}

.me-n2 {
  margin-right: -0.5rem ;
}

.me-n3 {
  margin-right: -1rem ;
}

.me-n4 {
  margin-right: -1.5rem ;
}

.me-n5 {
  margin-right: -3rem ;
}

.ms-n1 {
  margin-left: -0.25rem ;
}

.ms-n2 {
  margin-left: -0.5rem ;
}

.ms-n3 {
  margin-left: -1rem ;
}

.ms-n4 {
  margin-left: -1.5rem ;
}

.ms-n5 {
  margin-left: -3rem ;
}

.pe-0 {
  padding-right: 0 ;
}

.pe-1 {
  padding-right: 0.25rem ;
}

.pe-2 {
  padding-right: 0.5rem ;
}

.pe-3 {
  padding-right: 1rem ;
}

.pe-4 {
  padding-right: 1.5rem ;
}

.pe-5 {
  padding-right: 3rem ;
}

.ps-0 {
  padding-left: 0 ;
}

.ps-1 {
  padding-left: 0.25rem ;
}

.ps-2 {
  padding-left: 0.5rem ;
}

.ps-3 {
  padding-left: 1rem ;
}

.ps-4 {
  padding-left: 1.5rem ;
}

.ps-5 {
  padding-left: 3rem ;
}

.rotate-0 {
  transform: rotate(0deg) ;
}

.rotate-90 {
  transform: rotate(90deg) ;
}

.rotate-180 {
  transform: rotate(180deg) ;
}

.rotate-270 {
  transform: rotate(270deg) ;
}

.rotate-n90 {
  transform: rotate(-90deg) ;
}

.rotate-n180 {
  transform: rotate(-180deg) ;
}

.rotate-n270 {
  transform: rotate(-270deg) ;
}

.scaleX-n1 {
  transform: scaleX(-1) ;
}

.scaleY-n1 {
  transform: scaleY(-1) ;
}

@media (min-width: 576px) {
  .float-sm-start {
    float: left ;
  }

  .float-sm-end {
    float: right ;
  }

  .float-sm-none {
    float: none ;
  }

  .text-sm-start {
    text-align: left ;
  }

  .text-sm-end {
    text-align: right ;
  }

  .text-sm-center {
    text-align: center ;
  }

  .me-sm-0 {
    margin-right: 0 ;
  }

  .me-sm-1 {
    margin-right: 0.25rem ;
  }

  .me-sm-2 {
    margin-right: 0.5rem ;
  }

  .me-sm-3 {
    margin-right: 1rem ;
  }

  .me-sm-4 {
    margin-right: 1.5rem ;
  }

  .me-sm-5 {
    margin-right: 3rem ;
  }

  .me-sm-auto {
    margin-right: auto ;
  }

  .ms-sm-0 {
    margin-left: 0 ;
  }

  .ms-sm-1 {
    margin-left: 0.25rem ;
  }

  .ms-sm-2 {
    margin-left: 0.5rem ;
  }

  .ms-sm-3 {
    margin-left: 1rem ;
  }

  .ms-sm-4 {
    margin-left: 1.5rem ;
  }

  .ms-sm-5 {
    margin-left: 3rem ;
  }

  .ms-sm-auto {
    margin-left: auto ;
  }

  .me-sm-n1 {
    margin-right: -0.25rem ;
  }

  .me-sm-n2 {
    margin-right: -0.5rem ;
  }

  .me-sm-n3 {
    margin-right: -1rem ;
  }

  .me-sm-n4 {
    margin-right: -1.5rem ;
  }

  .me-sm-n5 {
    margin-right: -3rem ;
  }

  .ms-sm-n1 {
    margin-left: -0.25rem ;
  }

  .ms-sm-n2 {
    margin-left: -0.5rem ;
  }

  .ms-sm-n3 {
    margin-left: -1rem ;
  }

  .ms-sm-n4 {
    margin-left: -1.5rem ;
  }

  .ms-sm-n5 {
    margin-left: -3rem ;
  }

  .pe-sm-0 {
    padding-right: 0 ;
  }

  .pe-sm-1 {
    padding-right: 0.25rem ;
  }

  .pe-sm-2 {
    padding-right: 0.5rem ;
  }

  .pe-sm-3 {
    padding-right: 1rem ;
  }

  .pe-sm-4 {
    padding-right: 1.5rem ;
  }

  .pe-sm-5 {
    padding-right: 3rem ;
  }

  .ps-sm-0 {
    padding-left: 0 ;
  }

  .ps-sm-1 {
    padding-left: 0.25rem ;
  }

  .ps-sm-2 {
    padding-left: 0.5rem ;
  }

  .ps-sm-3 {
    padding-left: 1rem ;
  }

  .ps-sm-4 {
    padding-left: 1.5rem ;
  }

  .ps-sm-5 {
    padding-left: 3rem ;
  }
}
@media (min-width: 768px) {
  .float-md-start {
    float: left ;
  }

  .float-md-end {
    float: right ;
  }

  .float-md-none {
    float: none ;
  }

  .text-md-start {
    text-align: left ;
  }

  .text-md-end {
    text-align: right ;
  }

  .text-md-center {
    text-align: center ;
  }

  .me-md-0 {
    margin-right: 0 ;
  }

  .me-md-1 {
    margin-right: 0.25rem ;
  }

  .me-md-2 {
    margin-right: 0.5rem ;
  }

  .me-md-3 {
    margin-right: 1rem ;
  }

  .me-md-4 {
    margin-right: 1.5rem ;
  }

  .me-md-5 {
    margin-right: 3rem ;
  }

  .me-md-auto {
    margin-right: auto ;
  }

  .ms-md-0 {
    margin-left: 0 ;
  }

  .ms-md-1 {
    margin-left: 0.25rem ;
  }

  .ms-md-2 {
    margin-left: 0.5rem ;
  }

  .ms-md-3 {
    margin-left: 1rem ;
  }

  .ms-md-4 {
    margin-left: 1.5rem ;
  }

  .ms-md-5 {
    margin-left: 3rem ;
  }

  .ms-md-auto {
    margin-left: auto ;
  }

  .me-md-n1 {
    margin-right: -0.25rem ;
  }

  .me-md-n2 {
    margin-right: -0.5rem ;
  }

  .me-md-n3 {
    margin-right: -1rem ;
  }

  .me-md-n4 {
    margin-right: -1.5rem ;
  }

  .me-md-n5 {
    margin-right: -3rem ;
  }

  .ms-md-n1 {
    margin-left: -0.25rem ;
  }

  .ms-md-n2 {
    margin-left: -0.5rem ;
  }

  .ms-md-n3 {
    margin-left: -1rem ;
  }

  .ms-md-n4 {
    margin-left: -1.5rem ;
  }

  .ms-md-n5 {
    margin-left: -3rem ;
  }

  .pe-md-0 {
    padding-right: 0 ;
  }

  .pe-md-1 {
    padding-right: 0.25rem ;
  }

  .pe-md-2 {
    padding-right: 0.5rem ;
  }

  .pe-md-3 {
    padding-right: 1rem ;
  }

  .pe-md-4 {
    padding-right: 1.5rem ;
  }

  .pe-md-5 {
    padding-right: 3rem ;
  }

  .ps-md-0 {
    padding-left: 0 ;
  }

  .ps-md-1 {
    padding-left: 0.25rem ;
  }

  .ps-md-2 {
    padding-left: 0.5rem ;
  }

  .ps-md-3 {
    padding-left: 1rem ;
  }

  .ps-md-4 {
    padding-left: 1.5rem ;
  }

  .ps-md-5 {
    padding-left: 3rem ;
  }
}
@media (min-width: 992px) {
  .float-lg-start {
    float: left ;
  }

  .float-lg-end {
    float: right ;
  }

  .float-lg-none {
    float: none ;
  }

  .text-lg-start {
    text-align: left ;
  }

  .text-lg-end {
    text-align: right ;
  }

  .text-lg-center {
    text-align: center ;
  }

  .me-lg-0 {
    margin-right: 0 ;
  }

  .me-lg-1 {
    margin-right: 0.25rem ;
  }

  .me-lg-2 {
    margin-right: 0.5rem ;
  }

  .me-lg-3 {
    margin-right: 1rem ;
  }

  .me-lg-4 {
    margin-right: 1.5rem ;
  }

  .me-lg-5 {
    margin-right: 3rem ;
  }

  .me-lg-auto {
    margin-right: auto ;
  }

  .ms-lg-0 {
    margin-left: 0 ;
  }

  .ms-lg-1 {
    margin-left: 0.25rem ;
  }

  .ms-lg-2 {
    margin-left: 0.5rem ;
  }

  .ms-lg-3 {
    margin-left: 1rem ;
  }

  .ms-lg-4 {
    margin-left: 1.5rem ;
  }

  .ms-lg-5 {
    margin-left: 3rem ;
  }

  .ms-lg-auto {
    margin-left: auto ;
  }

  .me-lg-n1 {
    margin-right: -0.25rem ;
  }

  .me-lg-n2 {
    margin-right: -0.5rem ;
  }

  .me-lg-n3 {
    margin-right: -1rem ;
  }

  .me-lg-n4 {
    margin-right: -1.5rem ;
  }

  .me-lg-n5 {
    margin-right: -3rem ;
  }

  .ms-lg-n1 {
    margin-left: -0.25rem ;
  }

  .ms-lg-n2 {
    margin-left: -0.5rem ;
  }

  .ms-lg-n3 {
    margin-left: -1rem ;
  }

  .ms-lg-n4 {
    margin-left: -1.5rem ;
  }

  .ms-lg-n5 {
    margin-left: -3rem ;
  }

  .pe-lg-0 {
    padding-right: 0 ;
  }

  .pe-lg-1 {
    padding-right: 0.25rem ;
  }

  .pe-lg-2 {
    padding-right: 0.5rem ;
  }

  .pe-lg-3 {
    padding-right: 1rem ;
  }

  .pe-lg-4 {
    padding-right: 1.5rem ;
  }

  .pe-lg-5 {
    padding-right: 3rem ;
  }

  .ps-lg-0 {
    padding-left: 0 ;
  }

  .ps-lg-1 {
    padding-left: 0.25rem ;
  }

  .ps-lg-2 {
    padding-left: 0.5rem ;
  }

  .ps-lg-3 {
    padding-left: 1rem ;
  }

  .ps-lg-4 {
    padding-left: 1.5rem ;
  }

  .ps-lg-5 {
    padding-left: 3rem ;
  }
}
@media (min-width: 1200px) {
  .float-xl-start {
    float: left ;
  }

  .float-xl-end {
    float: right ;
  }

  .float-xl-none {
    float: none ;
  }

  .text-xl-start {
    text-align: left ;
  }

  .text-xl-end {
    text-align: right ;
  }

  .text-xl-center {
    text-align: center ;
  }

  .me-xl-0 {
    margin-right: 0 ;
  }

  .me-xl-1 {
    margin-right: 0.25rem ;
  }

  .me-xl-2 {
    margin-right: 0.5rem ;
  }

  .me-xl-3 {
    margin-right: 1rem ;
  }

  .me-xl-4 {
    margin-right: 1.5rem ;
  }

  .me-xl-5 {
    margin-right: 3rem ;
  }

  .me-xl-auto {
    margin-right: auto ;
  }

  .ms-xl-0 {
    margin-left: 0 ;
  }

  .ms-xl-1 {
    margin-left: 0.25rem ;
  }

  .ms-xl-2 {
    margin-left: 0.5rem ;
  }

  .ms-xl-3 {
    margin-left: 1rem ;
  }

  .ms-xl-4 {
    margin-left: 1.5rem ;
  }

  .ms-xl-5 {
    margin-left: 3rem ;
  }

  .ms-xl-auto {
    margin-left: auto ;
  }

  .me-xl-n1 {
    margin-right: -0.25rem ;
  }

  .me-xl-n2 {
    margin-right: -0.5rem ;
  }

  .me-xl-n3 {
    margin-right: -1rem ;
  }

  .me-xl-n4 {
    margin-right: -1.5rem ;
  }

  .me-xl-n5 {
    margin-right: -3rem ;
  }

  .ms-xl-n1 {
    margin-left: -0.25rem ;
  }

  .ms-xl-n2 {
    margin-left: -0.5rem ;
  }

  .ms-xl-n3 {
    margin-left: -1rem ;
  }

  .ms-xl-n4 {
    margin-left: -1.5rem ;
  }

  .ms-xl-n5 {
    margin-left: -3rem ;
  }

  .pe-xl-0 {
    padding-right: 0 ;
  }

  .pe-xl-1 {
    padding-right: 0.25rem ;
  }

  .pe-xl-2 {
    padding-right: 0.5rem ;
  }

  .pe-xl-3 {
    padding-right: 1rem ;
  }

  .pe-xl-4 {
    padding-right: 1.5rem ;
  }

  .pe-xl-5 {
    padding-right: 3rem ;
  }

  .ps-xl-0 {
    padding-left: 0 ;
  }

  .ps-xl-1 {
    padding-left: 0.25rem ;
  }

  .ps-xl-2 {
    padding-left: 0.5rem ;
  }

  .ps-xl-3 {
    padding-left: 1rem ;
  }

  .ps-xl-4 {
    padding-left: 1.5rem ;
  }

  .ps-xl-5 {
    padding-left: 3rem ;
  }
}
@media (min-width: 1400px) {
  .float-xxl-start {
    float: left ;
  }

  .float-xxl-end {
    float: right ;
  }

  .float-xxl-none {
    float: none ;
  }

  .text-xxl-start {
    text-align: left ;
  }

  .text-xxl-end {
    text-align: right ;
  }

  .text-xxl-center {
    text-align: center ;
  }

  .me-xxl-0 {
    margin-right: 0 ;
  }

  .me-xxl-1 {
    margin-right: 0.25rem ;
  }

  .me-xxl-2 {
    margin-right: 0.5rem ;
  }

  .me-xxl-3 {
    margin-right: 1rem ;
  }

  .me-xxl-4 {
    margin-right: 1.5rem ;
  }

  .me-xxl-5 {
    margin-right: 3rem ;
  }

  .me-xxl-auto {
    margin-right: auto ;
  }

  .ms-xxl-0 {
    margin-left: 0 ;
  }

  .ms-xxl-1 {
    margin-left: 0.25rem ;
  }

  .ms-xxl-2 {
    margin-left: 0.5rem ;
  }

  .ms-xxl-3 {
    margin-left: 1rem ;
  }

  .ms-xxl-4 {
    margin-left: 1.5rem ;
  }

  .ms-xxl-5 {
    margin-left: 3rem ;
  }

  .ms-xxl-auto {
    margin-left: auto ;
  }

  .me-xxl-n1 {
    margin-right: -0.25rem ;
  }

  .me-xxl-n2 {
    margin-right: -0.5rem ;
  }

  .me-xxl-n3 {
    margin-right: -1rem ;
  }

  .me-xxl-n4 {
    margin-right: -1.5rem ;
  }

  .me-xxl-n5 {
    margin-right: -3rem ;
  }

  .ms-xxl-n1 {
    margin-left: -0.25rem ;
  }

  .ms-xxl-n2 {
    margin-left: -0.5rem ;
  }

  .ms-xxl-n3 {
    margin-left: -1rem ;
  }

  .ms-xxl-n4 {
    margin-left: -1.5rem ;
  }

  .ms-xxl-n5 {
    margin-left: -3rem ;
  }

  .pe-xxl-0 {
    padding-right: 0 ;
  }

  .pe-xxl-1 {
    padding-right: 0.25rem ;
  }

  .pe-xxl-2 {
    padding-right: 0.5rem ;
  }

  .pe-xxl-3 {
    padding-right: 1rem ;
  }

  .pe-xxl-4 {
    padding-right: 1.5rem ;
  }

  .pe-xxl-5 {
    padding-right: 3rem ;
  }

  .ps-xxl-0 {
    padding-left: 0 ;
  }

  .ps-xxl-1 {
    padding-left: 0.25rem ;
  }

  .ps-xxl-2 {
    padding-left: 0.5rem ;
  }

  .ps-xxl-3 {
    padding-left: 1rem ;
  }

  .ps-xxl-4 {
    padding-left: 1.5rem ;
  }

  .ps-xxl-5 {
    padding-left: 3rem ;
  }
}
body {
  text-rendering: optimizeLegibility;
  font-smoothing: antialiased;
  -moz-font-feature-settings: "liga" on;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

@media (min-width: 768px) {
  button.list-group-item {
    outline: none;
  }
}
.app-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(67, 89, 113, 0.5);
  visibility: hidden;
  z-index: 3;
  transition: all 0.25s ease;
}
.app-overlay.show {
  visibility: visible;
}

.container,
.container-fluid,
.container-sm,
.container-md,
.container-lg,
.container-xl,
.container-xxl {
  padding-right: 1rem;
  padding-left: 1rem;
}
@media (min-width: 992px) {
  .container,
.container-fluid,
.container-sm,
.container-md,
.container-lg,
.container-xl,
.container-xxl {
    padding-right: 1.625rem;
    padding-left: 1.625rem;
  }
}

.img-thumbnail {
  position: relative;
  display: block;
}
.img-thumbnail img {
  z-index: 1;
}

.img-thumbnail-content {
  position: absolute;
  top: 50%;
  left: 50%;
  z-index: 3;
  display: block;
  opacity: 0;
  transition: all 0.2s ease-in-out;
  transform: translate(-50%, -50%);
}
.img-thumbnail:hover .img-thumbnail-content, .img-thumbnail:focus .img-thumbnail-content {
  opacity: 1;
}

.img-thumbnail-overlay {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: 2;
  display: block;
  transition: all 0.2s ease-in-out;
}
.img-thumbnail:not(:hover):not(:focus) .img-thumbnail-overlay {
  opacity: 0 ;
}

.img-thumbnail-shadow {
  transition: box-shadow 0.2s;
}
.img-thumbnail-shadow:hover, .img-thumbnail-shadow:focus {
  box-shadow: 0 5px 20px rgba(67, 89, 113, 0.4);
}

.img-thumbnail-zoom-in {
  overflow: hidden;
}
.img-thumbnail-zoom-in img {
  transition: all 0.3s ease-in-out;
  transform: translate3d(0);
}
.img-thumbnail-zoom-in .img-thumbnail-content {
  transform: translate(-50%, -50%) scale(0.6);
}
.img-thumbnail-zoom-in:hover img, .img-thumbnail-zoom-in:focus img {
  transform: scale(1.1);
}
.img-thumbnail-zoom-in:hover .img-thumbnail-content, .img-thumbnail-zoom-in:focus .img-thumbnail-content {
  transform: translate(-50%, -50%) scale(1);
}

@media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
  .card,
.card-body,
.media,
.flex-column,
.tab-content {
    min-height: 1px;
  }

  img {
    min-height: 1px;
    height: auto;
  }
}
.buy-now .btn-buy-now {
  position: fixed;
  bottom: 3rem;
  right: 1.625rem;
  z-index: 999999;
  box-shadow: 0 1px 20px 1px #ff3e1d;
}
.buy-now .btn-buy-now:hover {
  box-shadow: none;
}

.ui-square,
.ui-rect,
.ui-rect-30,
.ui-rect-60,
.ui-rect-67,
.ui-rect-75 {
  position: relative ;
  display: block ;
  padding-top: 100% ;
  width: 100% ;
}

.ui-square {
  padding-top: 100% ;
}

.ui-rect {
  padding-top: 50% ;
}

.ui-rect-30 {
  padding-top: 30% ;
}

.ui-rect-60 {
  padding-top: 60% ;
}

.ui-rect-67 {
  padding-top: 67% ;
}

.ui-rect-75 {
  padding-top: 75% ;
}

.ui-square-content,
.ui-rect-content {
  position: absolute ;
  top: 0 ;
  right: 0 ;
  bottom: 0 ;
  left: 0 ;
}

.text-strike-through {
  text-decoration: line-through;
}

.line-clamp-1 {
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 1;
  -webkit-box-orient: vertical;
}

.line-clamp-2 {
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
}

.line-clamp-3 {
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
}

.ui-stars,
.ui-star,
.ui-star > * {
  height: 1.1em;
  -webkit-user-drag: none;
  -khtml-user-drag: none;
  -moz-user-drag: none;
  -o-user-drag: none;
  user-drag: none;
}

.ui-stars {
  display: inline-block;
  vertical-align: middle;
  white-space: nowrap;
}

.ui-star {
  position: relative;
  display: block;
  float: left;
  width: 1.1em;
  height: 1.1em;
  text-decoration: none ;
  font-size: 1.1em;
  line-height: 1;
  -webkit-user-select: none;
     -moz-user-select: none;
          user-select: none;
}
.ui-star + .ui-star {
  margin-left: -0.1em;
}
.ui-star > *,
.ui-star > *::before,
.ui-star > *::after {
  position: absolute;
  left: 0.55em;
  height: 100%;
  font-size: 1em;
  line-height: 1;
  transform: translateX(-50%);
}
.ui-star > * {
  top: 0;
  width: 100%;
  text-align: center;
}
.ui-star > *:first-child {
  z-index: 10;
  display: none;
  overflow: hidden;
  color: #ffab00;
}
.ui-star > *:last-child {
  z-index: 5;
  display: block;
}
.ui-star.half-filled > *:first-child {
  width: 50%;
  transform: translateX(-100%);
}
.ui-star.filled > *:first-child, .ui-star.half-filled > *:first-child {
  display: block;
}
.ui-star.filled > *:last-child {
  display: none;
}

.ui-stars.hoverable .ui-star > *:first-child {
  display: block;
}

.ui-stars.hoverable .ui-star:first-child:not(.filled) > *:first-child,
.ui-stars.hoverable .ui-star:first-child:not(.filled) ~ .ui-star > *:first-child,
.ui-stars.hoverable .ui-star:first-child:not(.half-filled) > *:first-child,
.ui-stars.hoverable .ui-star:first-child:not(.half-filled) ~ .ui-star > *:first-child {
  display: none;
}

.ui-stars.hoverable .ui-star.filled > *:first-child,
.ui-stars.hoverable .ui-star.half-filled > *:first-child {
  display: block ;
}

.ui-stars.hoverable:hover .ui-star > *:first-child {
  display: block ;
  width: 100% ;
  transform: translateX(-50%) ;
}

.ui-stars.hoverable .ui-star:hover ~ .ui-star > *:first-child {
  display: none ;
}
.ui-stars.hoverable .ui-star:hover ~ .ui-star > *:last-child {
  display: block ;
}

.ui-bg-cover {
  background-color: rgba(0, 0, 0, 0);
  background-position: center center;
  background-size: cover;
}

.ui-bg-overlay-container,
.ui-bg-video-container {
  position: relative;
}
.ui-bg-overlay-container > *,
.ui-bg-video-container > * {
  position: relative;
}

.ui-bg-overlay-container .ui-bg-overlay {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  display: block;
}

.light-style .ui-bordered {
  border: 1px solid #d9dee3;
}
.light-style .ui-star > *:last-child {
  color: rgba(67, 89, 113, 0.2);
}

.menu {
  display: flex;
}
.menu .app-brand {
  width: 100%;
}
.menu .ps__thumb-y,
.menu .ps__rail-y {
  width: 0.125rem ;
}
.menu .ps__rail-y {
  right: 0.25rem ;
  left: auto ;
  background: none ;
}
.menu .ps__rail-y:hover,
.menu .ps__rail-y:focus,
.menu .ps__rail-y.ps--clicking,
.menu .ps__rail-y:hover > .ps__thumb-y,
.menu .ps__rail-y:focus > .ps__thumb-y,
.menu .ps__rail-y.ps--clicking > .ps__thumb-y {
  width: 0.375rem ;
}

.menu-inner {
  display: flex;
  align-items: flex-start;
  justify-content: flex-start;
  margin: 0;
  padding: 0;
  height: 100%;
}

.menu-inner-shadow {
  display: none;
  position: absolute;
  top: 4.225rem;
  height: 3rem;
  width: 100%;
  pointer-events: none;
  z-index: 2;
}
html:not(.layout-menu-fixed) .menu-inner-shadow {
  display: none ;
}

.menu-item {
  align-items: flex-start;
  justify-content: flex-start;
}
.menu-item.menu-item-animating {
  transition: height 0.3s ease-in-out;
}

.menu-item,
.menu-header,
.menu-divider,
.menu-block {
  flex: 0 0 auto;
  flex-direction: column;
  margin: 0;
  padding: 0;
  list-style: none;
}

.menu-header {
  opacity: 1;
  transition: opacity 0.3s ease-in-out;
}

.menu-icon {
  flex-grow: 0;
  flex-shrink: 0;
  margin-right: 0.5rem;
  font-size: 1.25rem;
}
.menu:not(.menu-no-animation) .menu-icon {
  transition: margin-right 0.3s ease;
}

.menu-link {
  position: relative;
  display: flex;
  align-items: center;
  flex: 0 1 auto;
  margin: 0;
}
.menu-item.disabled .menu-link {
  cursor: not-allowed ;
}
.menu:not(.menu-no-animation) .menu-link {
  transition-duration: 0.3s;
  transition-property: color, background-color;
}
.menu-link > :not(.menu-icon) {
  flex: 0 1 auto;
  opacity: 1;
}
.menu:not(.menu-no-animation) .menu-link > :not(.menu-icon) {
  transition: opacity 0.3s ease-in-out;
}

.menu-sub {
  display: none;
  flex-direction: column;
  margin: 0;
  padding: 0;
}
.menu:not(.menu-no-animation) .menu-sub {
  transition: background-color 0.3s;
}
.menu-item.open > .menu-sub {
  display: flex;
}

.menu-toggle::after {
  content: "";
  position: absolute;
  top: 50%;
  display: block;
  width: 0.42em;
  height: 0.42em;
  border: 1px solid;
  border-bottom: 0;
  border-left: 0;
  transform: translateY(-50%) rotate(45deg);
}
.menu-item.open:not(.menu-item-closing) > .menu-toggle::after {
  transform: translateY(-50%) rotate(135deg);
}
.menu:not(.menu-no-animation) .menu-toggle::after {
  transition-duration: 0.3s;
  transition-property: transform;
}

.menu-divider {
  width: 100%;
  border: 0;
  border-top: 1px solid;
}

.menu-vertical {
  flex-direction: column;
}
.menu-vertical:not(.menu-no-animation) {
  transition: width 0.3s;
}
.menu-vertical,
.menu-vertical .menu-block,
.menu-vertical .menu-inner > .menu-item,
.menu-vertical .menu-inner > .menu-header {
  width: 16.25rem;
}
.menu-vertical .menu-inner {
  flex-direction: column;
  flex: 1 1 auto;
}
.menu-vertical .menu-inner > .menu-item {
  margin: 0.0625rem 0;
}
.menu-vertical .menu-inner > .menu-item .menu-link {
  margin: 0rem 1rem;
}
.menu-vertical .menu-item .menu-link,
.menu-vertical .menu-block {
  padding: 0.625rem 1rem;
}
.menu-vertical .menu-header {
  margin: 1rem 0 0.5rem 0;
  padding: 0.625rem 2rem 0.625rem 2rem;
}
.menu-vertical .menu-item .menu-link {
  font-size: 0.9375rem;
}
.menu-vertical .menu-item.active:not(.open) > .menu-link {
  font-weight: 600;
}
.menu-vertical .menu-item .menu-toggle {
  padding-right: calc(1rem + 1.26em);
}
.menu-vertical .menu-item .menu-toggle::after {
  right: 1rem;
}
.menu-vertical .menu-divider {
  margin-top: 0.625rem;
  margin-bottom: 0.625rem;
  padding: 0;
}
.menu-vertical .menu-sub {
  padding-top: 0.3125rem;
  padding-bottom: 0.3125rem;
}
.menu-vertical .menu-sub .menu-link {
  padding-top: 0.625rem;
  padding-bottom: 0.625rem;
}
.menu-vertical .menu-icon {
  width: 1.5rem;
}
.menu-vertical .menu-sub .menu-icon {
  margin-right: 0;
}
@media (max-width: 1199.98px) {
  .menu-vertical .menu-sub .menu-icon {
    display: none;
  }
}
.menu-vertical .menu-horizontal-wrapper {
  flex: none;
}
.menu-vertical .menu-sub .menu-link {
  padding-left: 3rem;
}
.menu-vertical .menu-sub .menu-sub .menu-link {
  padding-left: 3.65rem;
}
.menu-vertical .menu-sub .menu-sub .menu-sub .menu-link {
  padding-left: 4.3rem;
}
.menu-vertical .menu-sub .menu-sub .menu-sub .menu-sub .menu-link {
  padding-left: 4.95rem;
}
.menu-vertical .menu-sub .menu-sub .menu-sub .menu-sub .menu-sub .menu-link {
  padding-left: 5.6rem;
}

.menu-collapsed:not(:hover) {
  width: 5.25rem;
}
.menu-collapsed:not(:hover) .menu-inner > .menu-item {
  width: 5.25rem;
}
.menu-collapsed:not(:hover) .menu-inner > .menu-item > .menu-link {
  padding-left: 1rem;
}
.menu-collapsed:not(:hover) .menu-inner > .menu-header,
.menu-collapsed:not(:hover) .menu-block {
  position: relative;
  margin-left: 1rem;
  padding-right: 1.5rem;
  padding-left: 0.5rem;
  width: 16.25rem;
  text-indent: -9999px;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.menu-collapsed:not(:hover) .menu-inner > .menu-header .menu-header-text,
.menu-collapsed:not(:hover) .menu-block .menu-header-text {
  overflow: hidden;
  opacity: 0;
}
.menu-collapsed:not(:hover) .menu-inner > .menu-header::before,
.menu-collapsed:not(:hover) .menu-block::before {
  content: "";
  position: absolute;
  left: 1.125rem;
  display: block;
  width: 1rem;
  text-align: center;
  top: 1.1875rem;
}
.menu-collapsed:not(:hover) .menu-block::before {
  bottom: 0.75rem;
}
.menu-collapsed:not(:hover) .menu-inner > .menu-item div:not(.menu-block) {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  opacity: 0;
}
.menu-collapsed:not(:hover) .menu-inner > .menu-item > .menu-sub,
.menu-collapsed:not(:hover) .menu-inner > .menu-item.open > .menu-sub {
  display: none;
}
.menu-collapsed:not(:hover) .menu-inner > .menu-item > .menu-toggle::after {
  display: none;
}
.menu-collapsed:not(:hover) .menu-inner > .menu-item > .menu-link .menu-icon {
  margin-left: -2rem;
  width: 5.25rem;
  text-align: center;
  margin-right: 0;
}

.layout-container {
  min-height: 100vh;
}

.layout-wrapper,
.layout-container {
  width: 100%;
  display: flex;
  flex: 1 1 auto;
  align-items: stretch;
}

.layout-page,
.content-wrapper,
.content-wrapper > *,
.layout-menu {
  min-height: 1px;
}

.layout-navbar,
.content-footer {
  flex: 0 0 auto;
}

.layout-page {
  display: flex;
  flex: 1 1 auto;
  align-items: stretch;
  padding: 0;
}
.layout-without-menu .layout-page {
  padding-right: 0 ;
  padding-left: 0 ;
}

.content-wrapper {
  display: flex;
  align-items: stretch;
  flex: 1 1 auto;
  flex-direction: column;
  justify-content: space-between;
}

.content-backdrop {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 1;
  width: 100vw;
  height: 100vh;
  background-color: #435971;
}
.content-backdrop.fade {
  opacity: 0;
}
.content-backdrop.show {
  opacity: 0.5;
}
.layout-menu-fixed .content-backdrop {
  z-index: 10;
}
.content-backdrop.fade {
  z-index: -1;
}

.layout-navbar {
  position: relative;
  padding-top: 0.25rem;
  padding-bottom: 0.2rem;
  height: 3.875rem;
  flex-wrap: nowrap;
  color: #697a8d;
  z-index: 2;
}
.layout-navbar .navbar {
  transform: translate3d(0, 0, 0);
}
.layout-navbar .navbar-nav-right {
  flex-basis: 100%;
}
.layout-navbar .navbar-search-wrapper .search-input,
.layout-navbar .navbar-search-wrapper .input-group-text {
  background-color: transparent;
}
.layout-navbar.navbar-detached {
  width: calc(100% - (1.625rem * 2));
  margin: 0.75rem auto 0;
  border-radius: 0.375rem;
  padding: 0 1.5rem;
}
.layout-navbar.navbar-detached.container-xxl {
  max-width: calc(1440px - calc(1.625rem * 2));
}
.layout-navbar-fixed .layout-navbar.navbar-detached {
  width: calc(100% - calc(1.625rem * 2) - 16.25rem);
}
@media (max-width: 1199.98px) {
  .layout-navbar-fixed .layout-navbar.navbar-detached {
    width: calc(100% - (1.625rem * 2)) ;
  }
}
@media (max-width: 991.98px) {
  .layout-navbar-fixed .layout-navbar.navbar-detached {
    width: calc(100% - (1rem * 2)) ;
  }
}
.layout-navbar-fixed.layout-menu-collapsed .layout-navbar.navbar-detached {
  width: calc(100% - calc(1.625rem * 2) - 5.25rem);
}
@media (max-width: 1199.98px) {
  .layout-navbar.navbar-detached {
    width: calc(100vw - (100vw - 100%) - (1.625rem * 2)) ;
  }
}
@media (max-width: 991.98px) {
  .layout-navbar.navbar-detached {
    width: calc(100vw - (100vw - 100%) - (1rem * 2)) ;
  }
}
.layout-menu-collapsed .layout-navbar.navbar-detached, .layout-without-menu .layout-navbar.navbar-detached {
  width: calc(100% - (1.625rem * 2));
}
.layout-navbar .search-input-wrapper .search-toggler {
  position: absolute;
  top: 1.25rem;
  right: 1rem;
  z-index: 1;
}
.layout-navbar .search-input-wrapper .search-input {
  height: 100%;
  box-shadow: none;
}
.layout-navbar[class*=bg-]:not(.bg-navbar-theme) .nav-item .input-group-text,
.layout-navbar[class*=bg-]:not(.bg-navbar-theme) .nav-item .dropdown-toggle {
  color: #fff;
}
@media (max-width: 1199.98px) {
  .layout-navbar .navbar-nav .nav-item.dropdown .dropdown-menu {
    position: absolute;
  }
  .layout-navbar .navbar-nav .nav-item.dropdown .dropdown-menu .last-login {
    white-space: nowrap;
  }
}
@media (max-width: 767.98px) {
  .layout-navbar .navbar-nav .nav-item.dropdown {
    position: static;
    float: left;
  }
  .layout-navbar .navbar-nav .nav-item.dropdown .badge-notifications {
    top: auto;
  }
  .layout-navbar .navbar-nav .nav-item.dropdown .dropdown-menu {
    position: absolute;
    left: 0.9rem;
    min-width: auto;
    width: 92%;
  }
}

@media (max-width: 1199.98px) {
  .layout-navbar {
    z-index: 1080;
  }
}
.layout-menu {
  position: relative;
  flex: 1 0 auto;
}
.layout-menu .menu {
  transform: translate3d(0, 0, 0);
}
.layout-menu .menu-vertical {
  height: 100%;
}

.layout-content-navbar .layout-page {
  flex-basis: 100%;
  flex-direction: column;
  width: 0;
  min-width: 0;
  max-width: 100%;
}
.layout-content-navbar .content-wrapper {
  width: 100%;
}

@media (min-width: 1200px) {
  .layout-menu-fixed .layout-menu,
.layout-menu-fixed-offcanvas .layout-menu {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    margin-right: 0 ;
    margin-left: 0 ;
  }

  .layout-menu-fixed:not(.layout-menu-collapsed) .layout-page,
.layout-menu-fixed-offcanvas:not(.layout-menu-collapsed) .layout-page {
    padding-left: 16.25rem;
  }
}
html:not(.layout-navbar-fixed):not(.layout-menu-fixed):not(.layout-menu-fixed-offcanvas) .layout-page,
html:not(.layout-navbar-fixed) .layout-content-navbar .layout-page {
  padding-top: 0 ;
}

html:not(.layout-footer-fixed) .content-wrapper {
  padding-bottom: 0 ;
}

@media (max-width: 1199.98px) {
  .layout-menu-fixed .layout-wrapper.layout-navbar-full .layout-menu,
.layout-menu-fixed-offcanvas .layout-wrapper.layout-navbar-full .layout-menu {
    top: 0 ;
  }

  html:not(.layout-navbar-fixed) .layout-navbar-full .layout-page {
    padding-top: 0 ;
  }
}
.layout-navbar-fixed .layout-navbar {
  position: fixed;
  top: 0;
  right: 0;
  left: 0;
}

@media (min-width: 1200px) {
  .layout-menu-fixed .layout-navbar-full .layout-navbar,
.layout-menu-fixed-offcanvas .layout-navbar-full .layout-navbar {
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
  }

  .layout-navbar-fixed:not(.layout-menu-collapsed) .layout-content-navbar:not(.layout-without-menu) .layout-navbar,
.layout-menu-fixed.layout-navbar-fixed:not(.layout-menu-collapsed) .layout-content-navbar:not(.layout-without-menu) .layout-navbar,
.layout-menu-fixed-offcanvas.layout-navbar-fixed:not(.layout-menu-collapsed) .layout-content-navbar:not(.layout-without-menu) .layout-navbar {
    left: 16.25rem;
  }
}
.layout-footer-fixed .content-footer {
  position: fixed;
  bottom: 0;
  left: 0;
  right: 0;
}

@media (min-width: 1200px) {
  .layout-footer-fixed:not(.layout-menu-collapsed) .layout-wrapper:not(.layout-without-menu) .content-footer {
    left: 16.25rem;
  }
}
@media (max-width: 1199.98px) {
  .layout-menu {
    position: fixed ;
    top: 0 ;
    height: 100% ;
    left: 0 ;
    margin-right: 0 ;
    margin-left: 0 ;
    transform: translate3d(-100%, 0, 0);
    will-change: transform, -webkit-transform;
  }
  .layout-menu-expanded .layout-menu {
    transform: translate3d(0, 0, 0) ;
  }

  .layout-menu-expanded body {
    overflow: hidden;
  }

  .layout-overlay {
    position: fixed;
    top: 0;
    right: 0;
    height: 100% ;
    left: 0;
    display: none;
    background: #435971;
    opacity: 0.5;
    cursor: pointer;
  }
  .layout-menu-expanded .layout-overlay {
    display: block;
  }

  .layout-menu-100vh .layout-menu,
.layout-menu-100vh .layout-overlay {
    height: 100vh ;
  }
}
.layout-navbar-fixed body:not(.modal-open) .layout-navbar-full .layout-navbar,
.layout-menu-fixed body:not(.modal-open) .layout-navbar-full .layout-navbar,
.layout-menu-fixed-offcanvas body:not(.modal-open) .layout-navbar-full .layout-navbar {
  z-index: 1080;
}
.layout-navbar-fixed body:not(.modal-open) .layout-content-navbar .layout-navbar,
.layout-menu-fixed body:not(.modal-open) .layout-content-navbar .layout-navbar,
.layout-menu-fixed-offcanvas body:not(.modal-open) .layout-content-navbar .layout-navbar {
  z-index: 1075;
}

.layout-footer-fixed .content-footer {
  z-index: 1030;
}

@media (max-width: 1199.98px) {
  .layout-menu {
    z-index: 1100;
  }

  .layout-overlay {
    z-index: 1099;
  }
}
@media (min-width: 1200px) {
  .layout-navbar-full .layout-navbar {
    z-index: 10;
  }
  .layout-navbar-full .layout-menu {
    z-index: 9;
  }

  .layout-content-navbar .layout-navbar {
    z-index: 9;
  }
  .layout-content-navbar .layout-menu {
    z-index: 10;
  }

  .layout-menu-fixed body:not(.modal-open) .layout-navbar-full .layout-menu,
.layout-menu-fixed-offcanvas body:not(.modal-open) .layout-navbar-full .layout-menu {
    z-index: 1075;
  }

  .layout-navbar-fixed body:not(.modal-open) .layout-content-navbar .layout-menu,
.layout-menu-fixed body:not(.modal-open) .layout-content-navbar .layout-menu,
.layout-menu-fixed-offcanvas body:not(.modal-open) .layout-content-navbar .layout-menu {
    z-index: 1080;
  }
}
.layout-menu-link-no-transition .layout-menu .menu-link,
.layout-menu-link-no-transition .layout-menu-horizontal .menu-link {
  transition: none ;
  -webkit-animation: none ;
          animation: none ;
}

.layout-no-transition .layout-menu, .layout-no-transition .layout-menu .menu, .layout-no-transition .layout-menu .menu-item,
.layout-no-transition .layout-menu-horizontal,
.layout-no-transition .layout-menu-horizontal .menu,
.layout-no-transition .layout-menu-horizontal .menu-item {
  transition: none ;
  -webkit-animation: none ;
          animation: none ;
}

@media (max-width: 1199.98px) {
  .layout-transitioning .layout-overlay {
    -webkit-animation: menuAnimation 0.3s;
            animation: menuAnimation 0.3s;
  }
  .layout-transitioning .layout-menu {
    transition-duration: 0.3s;
    transition-property: transform;
  }
}
@media (min-width: 1200px) {
  .layout-menu-collapsed:not(.layout-transitioning):not(.layout-menu-offcanvas):not(.layout-menu-fixed):not(.layout-menu-fixed-offcanvas) .layout-menu {
    transition-duration: 0.3s;
    transition-property: margin-left, margin-right, width;
  }

  .layout-transitioning.layout-menu-offcanvas .layout-menu {
    transition-duration: 0.3s;
    transition-property: margin-left, margin-right, transform;
  }
  .layout-transitioning.layout-menu-fixed .layout-page, .layout-transitioning.layout-menu-fixed-offcanvas .layout-page {
    transition-duration: 0.3s;
    transition-property: padding-left, padding-right;
  }
  .layout-transitioning.layout-menu-fixed .layout-menu {
    transition: width 0.3s;
  }
  .layout-transitioning.layout-menu-fixed-offcanvas .layout-menu {
    transition-duration: 0.3s;
    transition-property: transform;
  }
  .layout-transitioning.layout-navbar-fixed .layout-content-navbar .layout-navbar, .layout-transitioning.layout-footer-fixed .content-footer {
    transition-duration: 0.3s;
    transition-property: left, right;
  }
  .layout-transitioning:not(.layout-menu-offcanvas):not(.layout-menu-fixed):not(.layout-menu-fixed-offcanvas) .layout-menu {
    transition-duration: 0.3s;
    transition-property: margin-left, margin-right, width;
  }
}
@media all and (-ms-high-contrast: none), (-ms-high-contrast: active) {
  .menu,
.layout-menu,
.layout-page,
.layout-navbar,
.content-footer {
    transition: none ;
    transition-duration: 0s ;
  }

  .layout-overlay {
    -webkit-animation: none ;
            animation: none ;
  }
}
@-webkit-keyframes menuAnimation {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 0.5;
  }
}
@keyframes menuAnimation {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 0.5;
  }
}
.app-brand {
  display: flex;
  flex-grow: 0;
  flex-shrink: 0;
  overflow: hidden;
  line-height: 1;
  min-height: 1px;
  align-items: center;
}

.app-brand-link {
  display: flex;
  align-items: center;
}

.app-brand-logo {
  display: block;
  flex-grow: 0;
  flex-shrink: 0;
  overflow: hidden;
  min-height: 1px;
}
.app-brand-logo img,
.app-brand-logo svg {
  display: block;
}

.app-brand-text {
  flex-shrink: 0;
  opacity: 1;
  transition: opacity 0.15s ease-in-out;
}

.app-brand-img-collapsed {
  display: none;
}

.menu-vertical .app-brand {
  padding-right: 2rem;
  padding-left: 2rem;
}

.menu-horizontal .app-brand,
.menu-horizontal .app-brand + .menu-divider {
  display: none ;
}

:not(.layout-menu) > .menu-vertical.menu-collapsed:not(.layout-menu):not(:hover) .app-brand {
  width: 5.25rem;
}
:not(.layout-menu) > .menu-vertical.menu-collapsed:not(.layout-menu):not(:hover) .app-brand-logo,
:not(.layout-menu) > .menu-vertical.menu-collapsed:not(.layout-menu):not(:hover) .app-brand-link,
:not(.layout-menu) > .menu-vertical.menu-collapsed:not(.layout-menu):not(:hover) .app-brand-text {
  margin-right: auto;
  margin-left: auto;
}
:not(.layout-menu) > .menu-vertical.menu-collapsed:not(.layout-menu):not(:hover) .app-brand-logo ~ .app-brand-text {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  opacity: 0;
}
:not(.layout-menu) > .menu-vertical.menu-collapsed:not(.layout-menu):not(:hover) .app-brand .layout-menu-toggle {
  display: none ;
}
:not(.layout-menu) > .menu-vertical.menu-collapsed:not(.layout-menu):not(:hover) .app-brand-img {
  display: none;
}
:not(.layout-menu) > .menu-vertical.menu-collapsed:not(.layout-menu):not(:hover) .app-brand-img-collapsed {
  display: block;
}

@media (min-width: 1200px) {
  .layout-menu-collapsed:not(.layout-menu-hover):not(.layout-menu-offcanvas):not(.layout-menu-fixed-offcanvas) .layout-menu .app-brand {
    width: 5.25rem;
  }
  .layout-menu-collapsed:not(.layout-menu-hover):not(.layout-menu-offcanvas):not(.layout-menu-fixed-offcanvas) .layout-menu .app-brand-logo,
.layout-menu-collapsed:not(.layout-menu-hover):not(.layout-menu-offcanvas):not(.layout-menu-fixed-offcanvas) .layout-menu .app-brand-link,
.layout-menu-collapsed:not(.layout-menu-hover):not(.layout-menu-offcanvas):not(.layout-menu-fixed-offcanvas) .layout-menu .app-brand-text {
    margin-right: auto;
    margin-left: auto;
  }
  .layout-menu-collapsed:not(.layout-menu-hover):not(.layout-menu-offcanvas):not(.layout-menu-fixed-offcanvas) .layout-menu .app-brand-logo ~ .app-brand-text {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    opacity: 0;
  }
  .layout-menu-collapsed:not(.layout-menu-hover):not(.layout-menu-offcanvas):not(.layout-menu-fixed-offcanvas) .layout-menu .app-brand .layout-menu-toggle {
    display: none ;
  }
  .layout-menu-collapsed:not(.layout-menu-hover):not(.layout-menu-offcanvas):not(.layout-menu-fixed-offcanvas) .layout-menu .app-brand-img {
    display: none;
  }
  .layout-menu-collapsed:not(.layout-menu-hover):not(.layout-menu-offcanvas):not(.layout-menu-fixed-offcanvas) .layout-menu .app-brand-img-collapsed {
    display: block;
  }
}
.avatar {
  position: relative;
  width: 2.375rem;
  height: 2.375rem;
  cursor: pointer;
}
.avatar img {
  width: 100%;
  height: 100%;
}
.avatar .avatar-initial {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  text-transform: uppercase;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #fff;
  background-color: #8592a3;
  font-weight: 700;
}
.avatar.avatar-online:after, .avatar.avatar-offline:after, .avatar.avatar-away:after, .avatar.avatar-busy:after {
  content: "";
  position: absolute;
  bottom: 0;
  right: 3px;
  width: 8px;
  height: 8px;
  border-radius: 100%;
  box-shadow: 0 0 0 2px #fff;
}
.avatar.avatar-online:after {
  background-color: #71dd37;
}
.avatar.avatar-offline:after {
  background-color: #8592a3;
}
.avatar.avatar-away:after {
  background-color: #ffab00;
}
.avatar.avatar-busy:after {
  background-color: #ff3e1d;
}

.pull-up {
  transition: all 0.25s ease;
}
.pull-up:hover {
  transform: translateY(-4px) scale(1.02);
  box-shadow: 0 0.25rem 1rem rgba(161, 172, 184, 0.45);
  z-index: 30;
  border-radius: 50%;
}

.avatar-xs {
  width: 1.625rem;
  height: 1.625rem;
}
.avatar-xs .avatar-initial {
  font-size: 0.625rem;
}
.avatar-xs.avatar-online:after, .avatar-xs.avatar-offline:after, .avatar-xs.avatar-away:after, .avatar-xs.avatar-busy:after {
  width: 0.325rem;
  height: 0.325rem;
  right: 1px;
}

.avatar-sm {
  width: 2rem;
  height: 2rem;
}
.avatar-sm .avatar-initial {
  font-size: 0.75rem;
}
.avatar-sm.avatar-online:after, .avatar-sm.avatar-offline:after, .avatar-sm.avatar-away:after, .avatar-sm.avatar-busy:after {
  width: 0.4rem;
  height: 0.4rem;
  right: 2px;
}

.avatar-md {
  width: 3rem;
  height: 3rem;
}
.avatar-md .avatar-initial {
  font-size: 1.125rem;
}
.avatar-md.avatar-online:after, .avatar-md.avatar-offline:after, .avatar-md.avatar-away:after, .avatar-md.avatar-busy:after {
  width: 0.6rem;
  height: 0.6rem;
  right: 4px;
}

.avatar-lg {
  width: 4rem;
  height: 4rem;
}
.avatar-lg .avatar-initial {
  font-size: 1.5rem;
}
.avatar-lg.avatar-online:after, .avatar-lg.avatar-offline:after, .avatar-lg.avatar-away:after, .avatar-lg.avatar-busy:after {
  width: 0.8rem;
  height: 0.8rem;
  right: 5px;
}

.avatar-xl {
  width: 4.5rem;
  height: 4.5rem;
}
.avatar-xl .avatar-initial {
  font-size: 1.875rem;
}
.avatar-xl.avatar-online:after, .avatar-xl.avatar-offline:after, .avatar-xl.avatar-away:after, .avatar-xl.avatar-busy:after {
  width: 0.9rem;
  height: 0.9rem;
  right: 6px;
}

.avatar-group .avatar {
  transition: all 0.25s ease;
}
.avatar-group .avatar img,
.avatar-group .avatar .avatar-initial {
  border: 2px solid #fff;
}
.avatar-group .avatar .avatar-initial {
  background-color: #9da8b5;
}
.avatar-group .avatar:hover {
  z-index: 30;
  transition: all 0.25s ease;
}
.avatar-group .avatar {
  margin-left: -0.8rem;
}
.avatar-group .avatar:first-child {
  margin-left: 0;
}
.avatar-group .avatar-xs {
  margin-left: -0.65rem;
}
.avatar-group .avatar-sm {
  margin-left: -0.75rem;
}
.avatar-group .avatar-md {
  margin-left: -0.9rem;
}
.avatar-group .avatar-lg {
  margin-left: -1.5rem;
}
.avatar-group .avatar-xl {
  margin-left: -1.75rem;
}

.divider {
  display: block;
  text-align: center;
  margin: 1rem 0;
  overflow: hidden;
  white-space: nowrap;
}
.divider .divider-text {
  position: relative;
  display: inline-block;
  font-size: 0.8rem;
  padding: 0rem 1rem;
}
.divider .divider-text i {
  font-size: 1rem;
}
.divider .divider-text:before, .divider .divider-text:after {
  content: "";
  position: absolute;
  top: 50%;
  width: 100vw;
  border-top: 1px solid rgba(67, 89, 113, 0.2);
}
.divider .divider-text:before {
  right: 100%;
}
.divider .divider-text:after {
  left: 100%;
}
.divider.text-start .divider-text {
  padding-left: 0;
}
.divider.text-end .divider-text {
  padding-right: 0;
}
.divider.text-start-center .divider-text {
  left: -25%;
}
.divider.text-end-center .divider-text {
  right: -25%;
}
.divider.divider-dotted .divider-text:before, .divider.divider-dotted .divider-text:after {
  border-style: dotted;
  border-width: 0 1px 1px;
  border-color: rgba(67, 89, 113, 0.2);
}
.divider.divider-dashed .divider-text:before, .divider.divider-dashed .divider-text:after {
  border-style: dashed;
  border-width: 0 1px 1px;
  border-color: rgba(67, 89, 113, 0.2);
}

.divider.divider.divider-secondary .divider-text:before, .divider.divider.divider-secondary .divider-text:after {
  border-color: #8592a3;
}

.divider.divider.divider-success .divider-text:before, .divider.divider.divider-success .divider-text:after {
  border-color: #71dd37;
}

.divider.divider.divider-info .divider-text:before, .divider.divider.divider-info .divider-text:after {
  border-color: #03c3ec;
}

.divider.divider.divider-warning .divider-text:before, .divider.divider.divider-warning .divider-text:after {
  border-color: #ffab00;
}

.divider.divider.divider-danger .divider-text:before, .divider.divider.divider-danger .divider-text:after {
  border-color: #ff3e1d;
}

.divider.divider.divider-dark .divider-text:before, .divider.divider.divider-dark .divider-text:after {
  border-color: #233446;
}

.divider.divider.divider-gray .divider-text:before, .divider.divider.divider-gray .divider-text:after {
  border-color: rgba(67, 89, 113, 0.1);
}

.footer-link {
  display: inline-block;
}

.footer-light {
  color: rgba(67, 89, 113, 0.5);
}
.footer-light .footer-text {
  color: #697a8d;
}
.footer-light .footer-link {
  color: rgba(67, 89, 113, 0.5);
}
.footer-light .footer-link:hover, .footer-light .footer-link:focus {
  color: #697a8d;
}
.footer-light .footer-link.disabled {
  color: rgba(67, 89, 113, 0.3) ;
}
.footer-light .show > .footer-link,
.footer-light .active > .footer-link,
.footer-light .footer-link.show,
.footer-light .footer-link.active {
  color: #697a8d;
}
.footer-light hr {
  border-color: rgba(0, 0, 0, 0.06);
}

.navbar.bg-secondary {
  background-color: #8592a3 ;
  color: #eaecef;
}
.navbar.bg-secondary .navbar-brand,
.navbar.bg-secondary .navbar-brand a {
  color: #fff;
}
.navbar.bg-secondary .navbar-brand:hover, .navbar.bg-secondary .navbar-brand:focus,
.navbar.bg-secondary .navbar-brand a:hover,
.navbar.bg-secondary .navbar-brand a:focus {
  color: #fff;
}
.navbar.bg-secondary .navbar-search-wrapper .navbar-search-icon,
.navbar.bg-secondary .navbar-search-wrapper .search-input {
  color: #eaecef;
}
.navbar.bg-secondary .search-input-wrapper .search-input,
.navbar.bg-secondary .search-input-wrapper .search-toggler {
  background-color: #8592a3 ;
  color: #eaecef;
}
.navbar.bg-secondary .navbar-nav > .nav-link,
.navbar.bg-secondary .navbar-nav > .nav-item > .nav-link,
.navbar.bg-secondary .navbar-nav > .nav > .nav-item > .nav-link {
  color: #eaecef;
}
.navbar.bg-secondary .navbar-nav > .nav-link:hover, .navbar.bg-secondary .navbar-nav > .nav-link:focus,
.navbar.bg-secondary .navbar-nav > .nav-item > .nav-link:hover,
.navbar.bg-secondary .navbar-nav > .nav-item > .nav-link:focus,
.navbar.bg-secondary .navbar-nav > .nav > .nav-item > .nav-link:hover,
.navbar.bg-secondary .navbar-nav > .nav > .nav-item > .nav-link:focus {
  color: #fff;
}
.navbar.bg-secondary .navbar-nav > .nav-link.disabled,
.navbar.bg-secondary .navbar-nav > .nav-item > .nav-link.disabled,
.navbar.bg-secondary .navbar-nav > .nav > .nav-item > .nav-link.disabled {
  color: #c2c8d1 ;
}
.navbar.bg-secondary .navbar-nav .show > .nav-link,
.navbar.bg-secondary .navbar-nav .active > .nav-link,
.navbar.bg-secondary .navbar-nav .nav-link.show,
.navbar.bg-secondary .navbar-nav .nav-link.active {
  color: #fff;
}
.navbar.bg-secondary .navbar-toggler {
  color: #eaecef;
  border-color: rgba(255, 255, 255, 0.15);
}
.navbar.bg-secondary .navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3Csvg width='14px' height='11px' viewBox='0 0 14 11' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpath d='M0,0 L14,0 L14,1.75 L0,1.75 L0,0 Z M0,4.375 L14,4.375 L14,6.125 L0,6.125 L0,4.375 Z M0,8.75 L14,8.75 L14,10.5 L0,10.5 L0,8.75 Z' id='path-1'%3E%3C/path%3E%3C/defs%3E%3Cg id='💎-UI-Elements' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='12)-Navbar' transform='translate(-1174.000000, -1290.000000)'%3E%3Cg id='Group' transform='translate(1174.000000, 1288.000000)'%3E%3Cg id='Icon-Color' transform='translate(0.000000, 2.000000)'%3E%3Cuse fill='rgba(255, 255, 255, 0.8)' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.1' fill='rgba(255, 255, 255, 0.8)' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.navbar.bg-secondary .navbar-text {
  color: #eaecef;
}
.navbar.bg-secondary .navbar-text a {
  color: #fff;
}
.navbar.bg-secondary .navbar-text a:hover, .navbar.bg-secondary .navbar-text a:focus {
  color: #fff;
}
.navbar.bg-secondary hr {
  border-color: rgba(255, 255, 255, 0.15);
}

.navbar.bg-success {
  background-color: #71dd37 ;
  color: #ecfae4;
}
.navbar.bg-success .navbar-brand,
.navbar.bg-success .navbar-brand a {
  color: #fff;
}
.navbar.bg-success .navbar-brand:hover, .navbar.bg-success .navbar-brand:focus,
.navbar.bg-success .navbar-brand a:hover,
.navbar.bg-success .navbar-brand a:focus {
  color: #fff;
}
.navbar.bg-success .navbar-search-wrapper .navbar-search-icon,
.navbar.bg-success .navbar-search-wrapper .search-input {
  color: #ecfae4;
}
.navbar.bg-success .search-input-wrapper .search-input,
.navbar.bg-success .search-input-wrapper .search-toggler {
  background-color: #71dd37 ;
  color: #ecfae4;
}
.navbar.bg-success .navbar-nav > .nav-link,
.navbar.bg-success .navbar-nav > .nav-item > .nav-link,
.navbar.bg-success .navbar-nav > .nav > .nav-item > .nav-link {
  color: #ecfae4;
}
.navbar.bg-success .navbar-nav > .nav-link:hover, .navbar.bg-success .navbar-nav > .nav-link:focus,
.navbar.bg-success .navbar-nav > .nav-item > .nav-link:hover,
.navbar.bg-success .navbar-nav > .nav-item > .nav-link:focus,
.navbar.bg-success .navbar-nav > .nav > .nav-item > .nav-link:hover,
.navbar.bg-success .navbar-nav > .nav > .nav-item > .nav-link:focus {
  color: #fff;
}
.navbar.bg-success .navbar-nav > .nav-link.disabled,
.navbar.bg-success .navbar-nav > .nav-item > .nav-link.disabled,
.navbar.bg-success .navbar-nav > .nav > .nav-item > .nav-link.disabled {
  color: #bbee9f ;
}
.navbar.bg-success .navbar-nav .show > .nav-link,
.navbar.bg-success .navbar-nav .active > .nav-link,
.navbar.bg-success .navbar-nav .nav-link.show,
.navbar.bg-success .navbar-nav .nav-link.active {
  color: #fff;
}
.navbar.bg-success .navbar-toggler {
  color: #ecfae4;
  border-color: rgba(255, 255, 255, 0.15);
}
.navbar.bg-success .navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3Csvg width='14px' height='11px' viewBox='0 0 14 11' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpath d='M0,0 L14,0 L14,1.75 L0,1.75 L0,0 Z M0,4.375 L14,4.375 L14,6.125 L0,6.125 L0,4.375 Z M0,8.75 L14,8.75 L14,10.5 L0,10.5 L0,8.75 Z' id='path-1'%3E%3C/path%3E%3C/defs%3E%3Cg id='💎-UI-Elements' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='12)-Navbar' transform='translate(-1174.000000, -1290.000000)'%3E%3Cg id='Group' transform='translate(1174.000000, 1288.000000)'%3E%3Cg id='Icon-Color' transform='translate(0.000000, 2.000000)'%3E%3Cuse fill='rgba(255, 255, 255, 0.8)' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.1' fill='rgba(255, 255, 255, 0.8)' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.navbar.bg-success .navbar-text {
  color: #ecfae4;
}
.navbar.bg-success .navbar-text a {
  color: #fff;
}
.navbar.bg-success .navbar-text a:hover, .navbar.bg-success .navbar-text a:focus {
  color: #fff;
}
.navbar.bg-success hr {
  border-color: rgba(255, 255, 255, 0.15);
}

.navbar.bg-info {
  background-color: #03c3ec ;
  color: #d2f4fc;
}
.navbar.bg-info .navbar-brand,
.navbar.bg-info .navbar-brand a {
  color: #fff;
}
.navbar.bg-info .navbar-brand:hover, .navbar.bg-info .navbar-brand:focus,
.navbar.bg-info .navbar-brand a:hover,
.navbar.bg-info .navbar-brand a:focus {
  color: #fff;
}
.navbar.bg-info .navbar-search-wrapper .navbar-search-icon,
.navbar.bg-info .navbar-search-wrapper .search-input {
  color: #d2f4fc;
}
.navbar.bg-info .search-input-wrapper .search-input,
.navbar.bg-info .search-input-wrapper .search-toggler {
  background-color: #03c3ec ;
  color: #d2f4fc;
}
.navbar.bg-info .navbar-nav > .nav-link,
.navbar.bg-info .navbar-nav > .nav-item > .nav-link,
.navbar.bg-info .navbar-nav > .nav > .nav-item > .nav-link {
  color: #d2f4fc;
}
.navbar.bg-info .navbar-nav > .nav-link:hover, .navbar.bg-info .navbar-nav > .nav-link:focus,
.navbar.bg-info .navbar-nav > .nav-item > .nav-link:hover,
.navbar.bg-info .navbar-nav > .nav-item > .nav-link:focus,
.navbar.bg-info .navbar-nav > .nav > .nav-item > .nav-link:hover,
.navbar.bg-info .navbar-nav > .nav > .nav-item > .nav-link:focus {
  color: #fff;
}
.navbar.bg-info .navbar-nav > .nav-link.disabled,
.navbar.bg-info .navbar-nav > .nav-item > .nav-link.disabled,
.navbar.bg-info .navbar-nav > .nav > .nav-item > .nav-link.disabled {
  color: #7fe0f6 ;
}
.navbar.bg-info .navbar-nav .show > .nav-link,
.navbar.bg-info .navbar-nav .active > .nav-link,
.navbar.bg-info .navbar-nav .nav-link.show,
.navbar.bg-info .navbar-nav .nav-link.active {
  color: #fff;
}
.navbar.bg-info .navbar-toggler {
  color: #d2f4fc;
  border-color: rgba(255, 255, 255, 0.15);
}
.navbar.bg-info .navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3Csvg width='14px' height='11px' viewBox='0 0 14 11' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpath d='M0,0 L14,0 L14,1.75 L0,1.75 L0,0 Z M0,4.375 L14,4.375 L14,6.125 L0,6.125 L0,4.375 Z M0,8.75 L14,8.75 L14,10.5 L0,10.5 L0,8.75 Z' id='path-1'%3E%3C/path%3E%3C/defs%3E%3Cg id='💎-UI-Elements' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='12)-Navbar' transform='translate(-1174.000000, -1290.000000)'%3E%3Cg id='Group' transform='translate(1174.000000, 1288.000000)'%3E%3Cg id='Icon-Color' transform='translate(0.000000, 2.000000)'%3E%3Cuse fill='rgba(255, 255, 255, 0.8)' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.1' fill='rgba(255, 255, 255, 0.8)' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.navbar.bg-info .navbar-text {
  color: #d2f4fc;
}
.navbar.bg-info .navbar-text a {
  color: #fff;
}
.navbar.bg-info .navbar-text a:hover, .navbar.bg-info .navbar-text a:focus {
  color: #fff;
}
.navbar.bg-info hr {
  border-color: rgba(255, 255, 255, 0.15);
}

.navbar.bg-warning {
  background-color: #ffab00 ;
  color: #fff5e0;
}
.navbar.bg-warning .navbar-brand,
.navbar.bg-warning .navbar-brand a {
  color: #fff;
}
.navbar.bg-warning .navbar-brand:hover, .navbar.bg-warning .navbar-brand:focus,
.navbar.bg-warning .navbar-brand a:hover,
.navbar.bg-warning .navbar-brand a:focus {
  color: #fff;
}
.navbar.bg-warning .navbar-search-wrapper .navbar-search-icon,
.navbar.bg-warning .navbar-search-wrapper .search-input {
  color: #fff5e0;
}
.navbar.bg-warning .search-input-wrapper .search-input,
.navbar.bg-warning .search-input-wrapper .search-toggler {
  background-color: #ffab00 ;
  color: #fff5e0;
}
.navbar.bg-warning .navbar-nav > .nav-link,
.navbar.bg-warning .navbar-nav > .nav-item > .nav-link,
.navbar.bg-warning .navbar-nav > .nav > .nav-item > .nav-link {
  color: #fff5e0;
}
.navbar.bg-warning .navbar-nav > .nav-link:hover, .navbar.bg-warning .navbar-nav > .nav-link:focus,
.navbar.bg-warning .navbar-nav > .nav-item > .nav-link:hover,
.navbar.bg-warning .navbar-nav > .nav-item > .nav-link:focus,
.navbar.bg-warning .navbar-nav > .nav > .nav-item > .nav-link:hover,
.navbar.bg-warning .navbar-nav > .nav > .nav-item > .nav-link:focus {
  color: #fff;
}
.navbar.bg-warning .navbar-nav > .nav-link.disabled,
.navbar.bg-warning .navbar-nav > .nav-item > .nav-link.disabled,
.navbar.bg-warning .navbar-nav > .nav > .nav-item > .nav-link.disabled {
  color: #ffd786 ;
}
.navbar.bg-warning .navbar-nav .show > .nav-link,
.navbar.bg-warning .navbar-nav .active > .nav-link,
.navbar.bg-warning .navbar-nav .nav-link.show,
.navbar.bg-warning .navbar-nav .nav-link.active {
  color: #fff;
}
.navbar.bg-warning .navbar-toggler {
  color: #fff5e0;
  border-color: rgba(255, 255, 255, 0.15);
}
.navbar.bg-warning .navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3Csvg width='14px' height='11px' viewBox='0 0 14 11' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpath d='M0,0 L14,0 L14,1.75 L0,1.75 L0,0 Z M0,4.375 L14,4.375 L14,6.125 L0,6.125 L0,4.375 Z M0,8.75 L14,8.75 L14,10.5 L0,10.5 L0,8.75 Z' id='path-1'%3E%3C/path%3E%3C/defs%3E%3Cg id='💎-UI-Elements' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='12)-Navbar' transform='translate(-1174.000000, -1290.000000)'%3E%3Cg id='Group' transform='translate(1174.000000, 1288.000000)'%3E%3Cg id='Icon-Color' transform='translate(0.000000, 2.000000)'%3E%3Cuse fill='rgba(255, 255, 255, 0.8)' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.1' fill='rgba(255, 255, 255, 0.8)' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.navbar.bg-warning .navbar-text {
  color: #fff5e0;
}
.navbar.bg-warning .navbar-text a {
  color: #fff;
}
.navbar.bg-warning .navbar-text a:hover, .navbar.bg-warning .navbar-text a:focus {
  color: #fff;
}
.navbar.bg-warning hr {
  border-color: rgba(255, 255, 255, 0.15);
}

.navbar.bg-danger {
  background-color: #ff3e1d ;
  color: #ffd5ce;
}
.navbar.bg-danger .navbar-brand,
.navbar.bg-danger .navbar-brand a {
  color: #fff;
}
.navbar.bg-danger .navbar-brand:hover, .navbar.bg-danger .navbar-brand:focus,
.navbar.bg-danger .navbar-brand a:hover,
.navbar.bg-danger .navbar-brand a:focus {
  color: #fff;
}
.navbar.bg-danger .navbar-search-wrapper .navbar-search-icon,
.navbar.bg-danger .navbar-search-wrapper .search-input {
  color: #ffd5ce;
}
.navbar.bg-danger .search-input-wrapper .search-input,
.navbar.bg-danger .search-input-wrapper .search-toggler {
  background-color: #ff3e1d ;
  color: #ffd5ce;
}
.navbar.bg-danger .navbar-nav > .nav-link,
.navbar.bg-danger .navbar-nav > .nav-item > .nav-link,
.navbar.bg-danger .navbar-nav > .nav > .nav-item > .nav-link {
  color: #ffd5ce;
}
.navbar.bg-danger .navbar-nav > .nav-link:hover, .navbar.bg-danger .navbar-nav > .nav-link:focus,
.navbar.bg-danger .navbar-nav > .nav-item > .nav-link:hover,
.navbar.bg-danger .navbar-nav > .nav-item > .nav-link:focus,
.navbar.bg-danger .navbar-nav > .nav > .nav-item > .nav-link:hover,
.navbar.bg-danger .navbar-nav > .nav > .nav-item > .nav-link:focus {
  color: #fff;
}
.navbar.bg-danger .navbar-nav > .nav-link.disabled,
.navbar.bg-danger .navbar-nav > .nav-item > .nav-link.disabled,
.navbar.bg-danger .navbar-nav > .nav > .nav-item > .nav-link.disabled {
  color: #ff9987 ;
}
.navbar.bg-danger .navbar-nav .show > .nav-link,
.navbar.bg-danger .navbar-nav .active > .nav-link,
.navbar.bg-danger .navbar-nav .nav-link.show,
.navbar.bg-danger .navbar-nav .nav-link.active {
  color: #fff;
}
.navbar.bg-danger .navbar-toggler {
  color: #ffd5ce;
  border-color: rgba(255, 255, 255, 0.15);
}
.navbar.bg-danger .navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3Csvg width='14px' height='11px' viewBox='0 0 14 11' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpath d='M0,0 L14,0 L14,1.75 L0,1.75 L0,0 Z M0,4.375 L14,4.375 L14,6.125 L0,6.125 L0,4.375 Z M0,8.75 L14,8.75 L14,10.5 L0,10.5 L0,8.75 Z' id='path-1'%3E%3C/path%3E%3C/defs%3E%3Cg id='💎-UI-Elements' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='12)-Navbar' transform='translate(-1174.000000, -1290.000000)'%3E%3Cg id='Group' transform='translate(1174.000000, 1288.000000)'%3E%3Cg id='Icon-Color' transform='translate(0.000000, 2.000000)'%3E%3Cuse fill='rgba(255, 255, 255, 0.8)' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.1' fill='rgba(255, 255, 255, 0.8)' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.navbar.bg-danger .navbar-text {
  color: #ffd5ce;
}
.navbar.bg-danger .navbar-text a {
  color: #fff;
}
.navbar.bg-danger .navbar-text a:hover, .navbar.bg-danger .navbar-text a:focus {
  color: #fff;
}
.navbar.bg-danger hr {
  border-color: rgba(255, 255, 255, 0.15);
}

.navbar.bg-dark {
  background-color: #233446 ;
  color: #e4e6e8;
}
.navbar.bg-dark .navbar-brand,
.navbar.bg-dark .navbar-brand a {
  color: #fff;
}
.navbar.bg-dark .navbar-brand:hover, .navbar.bg-dark .navbar-brand:focus,
.navbar.bg-dark .navbar-brand a:hover,
.navbar.bg-dark .navbar-brand a:focus {
  color: #fff;
}
.navbar.bg-dark .navbar-search-wrapper .navbar-search-icon,
.navbar.bg-dark .navbar-search-wrapper .search-input {
  color: #e4e6e8;
}
.navbar.bg-dark .search-input-wrapper .search-input,
.navbar.bg-dark .search-input-wrapper .search-toggler {
  background-color: #233446 ;
  color: #e4e6e8;
}
.navbar.bg-dark .navbar-nav > .nav-link,
.navbar.bg-dark .navbar-nav > .nav-item > .nav-link,
.navbar.bg-dark .navbar-nav > .nav > .nav-item > .nav-link {
  color: #e4e6e8;
}
.navbar.bg-dark .navbar-nav > .nav-link:hover, .navbar.bg-dark .navbar-nav > .nav-link:focus,
.navbar.bg-dark .navbar-nav > .nav-item > .nav-link:hover,
.navbar.bg-dark .navbar-nav > .nav-item > .nav-link:focus,
.navbar.bg-dark .navbar-nav > .nav > .nav-item > .nav-link:hover,
.navbar.bg-dark .navbar-nav > .nav > .nav-item > .nav-link:focus {
  color: #fff;
}
.navbar.bg-dark .navbar-nav > .nav-link.disabled,
.navbar.bg-dark .navbar-nav > .nav-item > .nav-link.disabled,
.navbar.bg-dark .navbar-nav > .nav > .nav-item > .nav-link.disabled {
  color: #979fa7 ;
}
.navbar.bg-dark .navbar-nav .show > .nav-link,
.navbar.bg-dark .navbar-nav .active > .nav-link,
.navbar.bg-dark .navbar-nav .nav-link.show,
.navbar.bg-dark .navbar-nav .nav-link.active {
  color: #fff;
}
.navbar.bg-dark .navbar-toggler {
  color: #e4e6e8;
  border-color: rgba(255, 255, 255, 0.06);
}
.navbar.bg-dark .navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3Csvg width='14px' height='11px' viewBox='0 0 14 11' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpath d='M0,0 L14,0 L14,1.75 L0,1.75 L0,0 Z M0,4.375 L14,4.375 L14,6.125 L0,6.125 L0,4.375 Z M0,8.75 L14,8.75 L14,10.5 L0,10.5 L0,8.75 Z' id='path-1'%3E%3C/path%3E%3C/defs%3E%3Cg id='💎-UI-Elements' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='12)-Navbar' transform='translate(-1174.000000, -1290.000000)'%3E%3Cg id='Group' transform='translate(1174.000000, 1288.000000)'%3E%3Cg id='Icon-Color' transform='translate(0.000000, 2.000000)'%3E%3Cuse fill='rgba(255, 255, 255, 0.8)' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.1' fill='rgba(255, 255, 255, 0.8)' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.navbar.bg-dark .navbar-text {
  color: #e4e6e8;
}
.navbar.bg-dark .navbar-text a {
  color: #fff;
}
.navbar.bg-dark .navbar-text a:hover, .navbar.bg-dark .navbar-text a:focus {
  color: #fff;
}
.navbar.bg-dark hr {
  border-color: rgba(255, 255, 255, 0.06);
}

.navbar.bg-gray {
  background-color: #eceef1 ;
  color: #8291a1;
}
.navbar.bg-gray .navbar-brand,
.navbar.bg-gray .navbar-brand a {
  color: #435971;
}
.navbar.bg-gray .navbar-brand:hover, .navbar.bg-gray .navbar-brand:focus,
.navbar.bg-gray .navbar-brand a:hover,
.navbar.bg-gray .navbar-brand a:focus {
  color: #435971;
}
.navbar.bg-gray .navbar-search-wrapper .navbar-search-icon,
.navbar.bg-gray .navbar-search-wrapper .search-input {
  color: #8291a1;
}
.navbar.bg-gray .search-input-wrapper .search-input,
.navbar.bg-gray .search-input-wrapper .search-toggler {
  background-color: rgba(67, 89, 113, 0.1) ;
  color: #8291a1;
}
.navbar.bg-gray .navbar-nav > .nav-link,
.navbar.bg-gray .navbar-nav > .nav-item > .nav-link,
.navbar.bg-gray .navbar-nav > .nav > .nav-item > .nav-link {
  color: #8291a1;
}
.navbar.bg-gray .navbar-nav > .nav-link:hover, .navbar.bg-gray .navbar-nav > .nav-link:focus,
.navbar.bg-gray .navbar-nav > .nav-item > .nav-link:hover,
.navbar.bg-gray .navbar-nav > .nav-item > .nav-link:focus,
.navbar.bg-gray .navbar-nav > .nav > .nav-item > .nav-link:hover,
.navbar.bg-gray .navbar-nav > .nav > .nav-item > .nav-link:focus {
  color: #435971;
}
.navbar.bg-gray .navbar-nav > .nav-link.disabled,
.navbar.bg-gray .navbar-nav > .nav-item > .nav-link.disabled,
.navbar.bg-gray .navbar-nav > .nav > .nav-item > .nav-link.disabled {
  color: #acb6c1 ;
}
.navbar.bg-gray .navbar-nav .show > .nav-link,
.navbar.bg-gray .navbar-nav .active > .nav-link,
.navbar.bg-gray .navbar-nav .nav-link.show,
.navbar.bg-gray .navbar-nav .nav-link.active {
  color: #435971;
}
.navbar.bg-gray .navbar-toggler {
  color: #8291a1;
  border-color: rgba(67, 89, 113, 0.0783835294);
}
.navbar.bg-gray .navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3Csvg width='14px' height='11px' viewBox='0 0 14 11' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpath d='M0,0 L14,0 L14,1.75 L0,1.75 L0,0 Z M0,4.375 L14,4.375 L14,6.125 L0,6.125 L0,4.375 Z M0,8.75 L14,8.75 L14,10.5 L0,10.5 L0,8.75 Z' id='path-1'%3E%3C/path%3E%3C/defs%3E%3Cg id='💎-UI-Elements' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='12)-Navbar' transform='translate(-1174.000000, -1290.000000)'%3E%3Cg id='Group' transform='translate(1174.000000, 1288.000000)'%3E%3Cg id='Icon-Color' transform='translate(0.000000, 2.000000)'%3E%3Cuse fill='rgba(67, 89, 113, 0.5)' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.1' fill='rgba(67, 89, 113, 0.5)' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.navbar.bg-gray .navbar-text {
  color: #8291a1;
}
.navbar.bg-gray .navbar-text a {
  color: #435971;
}
.navbar.bg-gray .navbar-text a:hover, .navbar.bg-gray .navbar-text a:focus {
  color: #435971;
}
.navbar.bg-gray hr {
  border-color: rgba(67, 89, 113, 0.0783835294);
}

.navbar.bg-white {
  background-color: #fff ;
  color: #a1acb8;
}
.navbar.bg-white .navbar-brand,
.navbar.bg-white .navbar-brand a {
  color: #697a8d;
}
.navbar.bg-white .navbar-brand:hover, .navbar.bg-white .navbar-brand:focus,
.navbar.bg-white .navbar-brand a:hover,
.navbar.bg-white .navbar-brand a:focus {
  color: #697a8d;
}
.navbar.bg-white .navbar-search-wrapper .navbar-search-icon,
.navbar.bg-white .navbar-search-wrapper .search-input {
  color: #a1acb8;
}
.navbar.bg-white .search-input-wrapper .search-input,
.navbar.bg-white .search-input-wrapper .search-toggler {
  background-color: #fff ;
  color: #a1acb8;
}
.navbar.bg-white .navbar-nav > .nav-link,
.navbar.bg-white .navbar-nav > .nav-item > .nav-link,
.navbar.bg-white .navbar-nav > .nav > .nav-item > .nav-link {
  color: #a1acb8;
}
.navbar.bg-white .navbar-nav > .nav-link:hover, .navbar.bg-white .navbar-nav > .nav-link:focus,
.navbar.bg-white .navbar-nav > .nav-item > .nav-link:hover,
.navbar.bg-white .navbar-nav > .nav-item > .nav-link:focus,
.navbar.bg-white .navbar-nav > .nav > .nav-item > .nav-link:hover,
.navbar.bg-white .navbar-nav > .nav > .nav-item > .nav-link:focus {
  color: #697a8d;
}
.navbar.bg-white .navbar-nav > .nav-link.disabled,
.navbar.bg-white .navbar-nav > .nav-item > .nav-link.disabled,
.navbar.bg-white .navbar-nav > .nav > .nav-item > .nav-link.disabled {
  color: #c7cdd4 ;
}
.navbar.bg-white .navbar-nav .show > .nav-link,
.navbar.bg-white .navbar-nav .active > .nav-link,
.navbar.bg-white .navbar-nav .nav-link.show,
.navbar.bg-white .navbar-nav .nav-link.active {
  color: #697a8d;
}
.navbar.bg-white .navbar-toggler {
  color: #a1acb8;
  border-color: rgba(105, 122, 141, 0.075);
}
.navbar.bg-white .navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3Csvg width='14px' height='11px' viewBox='0 0 14 11' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpath d='M0,0 L14,0 L14,1.75 L0,1.75 L0,0 Z M0,4.375 L14,4.375 L14,6.125 L0,6.125 L0,4.375 Z M0,8.75 L14,8.75 L14,10.5 L0,10.5 L0,8.75 Z' id='path-1'%3E%3C/path%3E%3C/defs%3E%3Cg id='💎-UI-Elements' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='12)-Navbar' transform='translate(-1174.000000, -1290.000000)'%3E%3Cg id='Group' transform='translate(1174.000000, 1288.000000)'%3E%3Cg id='Icon-Color' transform='translate(0.000000, 2.000000)'%3E%3Cuse fill='rgba(67, 89, 113, 0.5)' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.1' fill='rgba(67, 89, 113, 0.5)' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.navbar.bg-white .navbar-text {
  color: #a1acb8;
}
.navbar.bg-white .navbar-text a {
  color: #697a8d;
}
.navbar.bg-white .navbar-text a:hover, .navbar.bg-white .navbar-text a:focus {
  color: #697a8d;
}
.navbar.bg-white hr {
  border-color: rgba(105, 122, 141, 0.075);
}

.navbar.bg-light {
  background-color: #eceef1 ;
  color: #a1acb8;
}
.navbar.bg-light .navbar-brand,
.navbar.bg-light .navbar-brand a {
  color: #697a8d;
}
.navbar.bg-light .navbar-brand:hover, .navbar.bg-light .navbar-brand:focus,
.navbar.bg-light .navbar-brand a:hover,
.navbar.bg-light .navbar-brand a:focus {
  color: #697a8d;
}
.navbar.bg-light .navbar-search-wrapper .navbar-search-icon,
.navbar.bg-light .navbar-search-wrapper .search-input {
  color: #a1acb8;
}
.navbar.bg-light .search-input-wrapper .search-input,
.navbar.bg-light .search-input-wrapper .search-toggler {
  background-color: rgba(67, 89, 113, 0.1) ;
  color: #a1acb8;
}
.navbar.bg-light .navbar-nav > .nav-link,
.navbar.bg-light .navbar-nav > .nav-item > .nav-link,
.navbar.bg-light .navbar-nav > .nav > .nav-item > .nav-link {
  color: #a1acb8;
}
.navbar.bg-light .navbar-nav > .nav-link:hover, .navbar.bg-light .navbar-nav > .nav-link:focus,
.navbar.bg-light .navbar-nav > .nav-item > .nav-link:hover,
.navbar.bg-light .navbar-nav > .nav-item > .nav-link:focus,
.navbar.bg-light .navbar-nav > .nav > .nav-item > .nav-link:hover,
.navbar.bg-light .navbar-nav > .nav > .nav-item > .nav-link:focus {
  color: #697a8d;
}
.navbar.bg-light .navbar-nav > .nav-link.disabled,
.navbar.bg-light .navbar-nav > .nav-item > .nav-link.disabled,
.navbar.bg-light .navbar-nav > .nav > .nav-item > .nav-link.disabled {
  color: #bfc6cf ;
}
.navbar.bg-light .navbar-nav .show > .nav-link,
.navbar.bg-light .navbar-nav .active > .nav-link,
.navbar.bg-light .navbar-nav .nav-link.show,
.navbar.bg-light .navbar-nav .nav-link.active {
  color: #697a8d;
}
.navbar.bg-light .navbar-toggler {
  color: #a1acb8;
  border-color: rgba(105, 122, 141, 0.0783835294);
}
.navbar.bg-light .navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3Csvg width='14px' height='11px' viewBox='0 0 14 11' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpath d='M0,0 L14,0 L14,1.75 L0,1.75 L0,0 Z M0,4.375 L14,4.375 L14,6.125 L0,6.125 L0,4.375 Z M0,8.75 L14,8.75 L14,10.5 L0,10.5 L0,8.75 Z' id='path-1'%3E%3C/path%3E%3C/defs%3E%3Cg id='💎-UI-Elements' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='12)-Navbar' transform='translate(-1174.000000, -1290.000000)'%3E%3Cg id='Group' transform='translate(1174.000000, 1288.000000)'%3E%3Cg id='Icon-Color' transform='translate(0.000000, 2.000000)'%3E%3Cuse fill='rgba(67, 89, 113, 0.5)' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.1' fill='rgba(67, 89, 113, 0.5)' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.navbar.bg-light .navbar-text {
  color: #a1acb8;
}
.navbar.bg-light .navbar-text a {
  color: #697a8d;
}
.navbar.bg-light .navbar-text a:hover, .navbar.bg-light .navbar-text a:focus {
  color: #697a8d;
}
.navbar.bg-light hr {
  border-color: rgba(105, 122, 141, 0.0783835294);
}

.footer.bg-white {
  background-color: #fff ;
  color: #a1acb8;
}
.footer.bg-white .footer-link {
  color: #a1acb8;
}
.footer.bg-white .footer-link:hover, .footer.bg-white .footer-link:focus {
  color: #697a8d;
}
.footer.bg-white .footer-link.disabled {
  color: #c7cdd4 ;
}
.footer.bg-white .footer-text {
  color: #697a8d;
}
.footer.bg-white .show > .footer-link,
.footer.bg-white .active > .footer-link,
.footer.bg-white .footer-link.show,
.footer.bg-white .footer-link.active {
  color: #697a8d;
}
.footer.bg-white hr {
  border-color: rgba(105, 122, 141, 0.075);
}

.footer.bg-light {
  background-color: #eceef1 ;
  color: #a1acb8;
}
.footer.bg-light .footer-link {
  color: #a1acb8;
}
.footer.bg-light .footer-link:hover, .footer.bg-light .footer-link:focus {
  color: #697a8d;
}
.footer.bg-light .footer-link.disabled {
  color: #bfc6cf ;
}
.footer.bg-light .footer-text {
  color: #697a8d;
}
.footer.bg-light .show > .footer-link,
.footer.bg-light .active > .footer-link,
.footer.bg-light .footer-link.show,
.footer.bg-light .footer-link.active {
  color: #697a8d;
}
.footer.bg-light hr {
  border-color: rgba(105, 122, 141, 0.0783835294);
}

/*# sourceMappingURL=data:application/json;charset=utf8;base64,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Z0M7QUFDbEM7O0FBRUE7RUFDRSxnQ0FBZ0M7QUFDbEM7O0FBRUE7RUFDRSxnQ0FBZ0M7QUFDbEM7O0FBRUE7RUFDRSxnQ0FBZ0M7QUFDbEM7O0FBRUE7RUFDRSxnQ0FBZ0M7QUFDbEM7O0FBRUE7RUFDRSwrQ0FBK0M7QUFDakQ7O0FBRUE7RUFDRSxnQ0FBZ0M7QUFDbEM7O0FBRUE7RUFDRSwrQ0FBK0M7QUFDakQ7O0FBRUE7RUFDRSw2QkFBNkI7QUFDL0I7O0FBRUE7RUFDRSxvQ0FBb0M7QUFDdEM7O0FBRUE7RUFDRSw0QkFBNEI7QUFDOUI7O0FBRUE7RUFDRSw0QkFBNEI7QUFDOUI7O0FBRUE7RUFDRSw0QkFBNEI7QUFDOUI7O0FBRUE7RUFDRSw0QkFBNEI7QUFDOUI7O0FBRUE7RUFDRSw0QkFBNEI7QUFDOUI7O0FBRUE7RUFDRSxzQkFBc0I7QUFDeEI7O0FBRUE7RUFDRSxzQkFBc0I7QUFDeEI7O0FBRUE7RUFDRSxzQkFBc0I7QUFDeEI7O0FBRUE7RUFDRSxzQkFBc0I7QUFDeEI7O0FBRUE7RUFDRSxzQkFBc0I7QUFDeEI7O0FBRUE7RUFDRSx1QkFBdUI7QUFDekI7O0FBRUE7RUFDRSx1QkFBdUI7QUFDekI7O0FBRUE7RUFDRSx1QkFBdUI7QUFDekI7O0FBRUE7RUFDRSx1QkFBdUI7QUFDekI7O0FBRUE7RUFDRSx1QkFBdUI7QUFDekI7O0FBRUE7RUFDRSx1QkFBdUI7QUFDekI7O0FBRUE7RUFDRSx1QkFBdUI7QUFDekI7O0FBRUE7RUFDRSx1QkFBdUI7QUFDekI7O0FBRUE7RUFDRSx1QkFBdUI7QUFDekI7O0FBRUE7RUFDRSx1QkFBdUI7QUFDekI7O0FBRUE7RUFDRSx1QkFBdUI7QUFDekI7O0FBRUE7RUFDRSxzQkFBc0I7QUFDeEI7O0FBRUE7RUFDRSxxQkFBcUI7QUFDdkI7O0FBRUE7RUFDRSxxQkFBcUI7QUFDdkI7O0FBRUE7RUFDRSxxQkFBcUI7QUFDdkI7O0FBRUE7RUFDRSxzQkFBc0I7QUFDeEI7O0FBRUE7RUFDRSwwQkFBMEI7QUFDNUI7O0FBRUE7RUFDRSx1QkFBdUI7QUFDekI7O0FBRUE7RUFDRSwyQkFBMkI7QUFDN0I7O0FBRUE7RUFDRSx1QkFBdUI7QUFDekI7O0FBRUE7RUFDRSx1QkFBdUI7QUFDekI7O0FBRUE7RUFDRSx1QkFBdUI7QUFDekI7O0FBRUE7RUFDRSx1QkFBdUI7QUFDekI7O0FBRUE7RUFDRSx1QkFBdUI7QUFDekI7O0FBRUE7RUFDRSx3QkFBd0I7QUFDMUI7O0FBRUE7RUFDRSx3QkFBd0I7QUFDMUI7O0FBRUE7RUFDRSx3QkFBd0I7QUFDMUI7O0FBRUE7RUFDRSx3QkFBd0I7QUFDMUI7O0FBRUE7RUFDRSx3QkFBd0I7QUFDMUI7O0FBRUE7RUFDRSx3QkFBd0I7QUFDMUI7O0FBRUE7RUFDRSx3QkFBd0I7QUFDMUI7O0FBRUE7RUFDRSx3QkFBd0I7QUFDMUI7O0FBRUE7RUFDRSx3QkFBd0I7QUFDMUI7O0FBRUE7RUFDRSx3QkFBd0I7QUFDMUI7O0FBRUE7RUFDRSx3QkFBd0I7QUFDMUI7O0FBRUE7RUFDRSx1QkFBdUI7QUFDekI7O0FBRUE7RUFDRSxzQkFBc0I7QUFDeEI7O0FBRUE7RUFDRSxzQkFBc0I7QUFDeEI7O0FBRUE7RUFDRSxzQkFBc0I7QUFDeEI7O0FBRUE7RUFDRSx1QkFBdUI7QUFDekI7O0FBRUE7RUFDRSwyQkFBMkI7QUFDN0I7O0FBRUE7RUFDRSx3QkFBd0I7QUFDMUI7O0FBRUE7RUFDRSw0QkFBNEI7QUFDOUI7O0FBRUE7RUFDRSx5QkFBeUI7QUFDM0I7O0FBRUE7RUFDRSw4QkFBOEI7QUFDaEM7O0FBRUE7RUFDRSxpQ0FBaUM7QUFDbkM7O0FBRUE7RUFDRSxzQ0FBc0M7QUFDeEM7O0FBRUE7RUFDRSx5Q0FBeUM7QUFDM0M7O0FBRUE7RUFDRSx1QkFBdUI7QUFDekI7O0FBRUE7RUFDRSx1QkFBdUI7QUFDekI7O0FBRUE7RUFDRSx5QkFBeUI7QUFDM0I7O0FBRUE7RUFDRSx5QkFBeUI7QUFDM0I7O0FBRUE7RUFDRSwwQkFBMEI7QUFDNUI7O0FBRUE7RUFDRSw0QkFBNEI7QUFDOUI7O0FBRUE7RUFDRSxrQ0FBa0M7QUFDcEM7O0FBRUE7RUFDRSxpQkFBaUI7QUFDbkI7O0FBRUE7RUFDRSx1QkFBdUI7QUFDekI7O0FBRUE7RUFDRSxzQkFBc0I7QUFDeEI7O0FBRUE7RUFDRSxvQkFBb0I7QUFDdEI7O0FBRUE7RUFDRSxzQkFBc0I7QUFDeEI7O0FBRUE7RUFDRSxvQkFBb0I7QUFDdEI7O0FBRUE7RUFDRSxzQ0FBc0M7QUFDeEM7O0FBRUE7RUFDRSxvQ0FBb0M7QUFDdEM7O0FBRUE7RUFDRSxrQ0FBa0M7QUFDcEM7O0FBRUE7RUFDRSx5Q0FBeUM7QUFDM0M7O0FBRUE7RUFDRSx3Q0FBd0M7QUFDMUM7O0FBRUE7RUFDRSx3Q0FBd0M7QUFDMUM7O0FBRUE7RUFDRSxrQ0FBa0M7QUFDcEM7O0FBRUE7RUFDRSxnQ0FBZ0M7QUFDbEM7O0FBRUE7RUFDRSw4QkFBOEI7QUFDaEM7O0FBRUE7RUFDRSxnQ0FBZ0M7QUFDbEM7O0FBRUE7RUFDRSwrQkFBK0I7QUFDakM7O0FBRUE7RUFDRSxvQ0FBb0M7QUFDdEM7O0FBRUE7RUFDRSxrQ0FBa0M7QUFDcEM7O0FBRUE7RUFDRSxnQ0FBZ0M7QUFDbEM7O0FBRUE7RUFDRSx1Q0FBdUM7QUFDekM7O0FBRUE7RUFDRSxzQ0FBc0M7QUFDeEM7O0FBRUE7RUFDRSxpQ0FBaUM7QUFDbkM7O0FBRUE7RUFDRSwyQkFBMkI7QUFDN0I7O0FBRUE7RUFDRSxpQ0FBaUM7QUFDbkM7O0FBRUE7RUFDRSwrQkFBK0I7QUFDakM7O0FBRUE7RUFDRSw2QkFBNkI7QUFDL0I7O0FBRUE7RUFDRSwrQkFBK0I7QUFDakM7O0FBRUE7RUFDRSw4QkFBOEI7QUFDaEM7O0FBRUE7RUFDRSxvQkFBb0I7QUFDdEI7O0FBRUE7RUFDRSxtQkFBbUI7QUFDckI7O0FBRUE7RUFDRSxtQkFBbUI7QUFDckI7O0FBRUE7RUFDRSxtQkFBbUI7QUFDckI7O0FBRUE7RUFDRSxtQkFBbUI7QUFDckI7O0FBRUE7RUFDRSxtQkFBbUI7QUFDckI7O0FBRUE7RUFDRSxtQkFBbUI7QUFDckI7O0FBRUE7RUFDRSxtQkFBbUI7QUFDckI7O0FBRUE7RUFDRSxvQkFBb0I7QUFDdEI7O0FB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RUE7SUFDRSwrQkFBK0I7RUFDakM7O0VBRUE7SUFDRSx3QkFBd0I7RUFDMUI7O0VBRUE7SUFDRSx5QkFBeUI7RUFDM0I7O0VBRUE7SUFDRSw4QkFBOEI7RUFDaEM7O0VBRUE7SUFDRSxpQ0FBaUM7RUFDbkM7O0VBRUE7SUFDRSxzQ0FBc0M7RUFDeEM7O0VBRUE7SUFDRSx5Q0FBeUM7RUFDM0M7O0VBRUE7SUFDRSx1QkFBdUI7RUFDekI7O0VBRUE7SUFDRSx1QkFBdUI7RUFDekI7O0VBRUE7SUFDRSx5QkFBeUI7RUFDM0I7O0VBRUE7SUFDRSx5QkFBeUI7RUFDM0I7O0VBRUE7SUFDRSwwQkFBMEI7RUFDNUI7O0VBRUE7SUFDRSw0QkFBNEI7RUFDOUI7O0VBRUE7SUFDRSxrQ0FBa0M7RUFDcEM7O0VBRUE7SUFDRSxpQkFBaUI7RUFDbkI7O0VBRUE7SUFDRSx1QkFBdUI7RUFDekI7O0VBRUE7SUFDRSxzQkFBc0I7RUFDeEI7O0VBRUE7SUFDRSxvQkFBb0I7RUFDdEI7O0VBRUE7SUFDRSxzQkFBc0I7RUFDeEI7O0VBRUE7SUFDRSxvQkFBb0I7RUFDdEI7O0VBRUE7SUFDRSxzQ0FBc0M7RUFDeEM7O0VBRUE7SUFDRSxvQ0FBb0M7RUFDdEM7O0VBRUE7SUFDRSxrQ0FBa0M7RUFDcEM7O0VBRUE7SUFDRSx5Q0FBeUM7RUFDM0M7O0VBRUE7SUFDRSx3Q0FBd0M7RUFDMUM7O0VBRUE7SUFDRSx3Q0FBd0M7RUFDMUM7O0VBRUE7SUFDRSxrQ0FBa0M7RUFDcEM7O0VBRUE7SUFDRSxnQ0FBZ0M7RUFDbEM7O0VBRUE7SUFDRSw4QkFBOEI7RUFDaEM7O0VBRUE7SUFDRSxnQ0FBZ0M7RUFDbEM7O0VBRUE7SUFDRSwrQkFBK0I7RUFDakM7O0VBRUE7SUFDRSxvQ0FBb0M7RUFDdEM7O0VBRUE7SUFDRSxrQ0FBa0M7RUFDcEM7O0VBRUE7SUFDRSxnQ0FBZ0M7RUFDbEM7O0VBRUE7SUFDRSx1Q0FBdUM7RUFDekM7O0VBRUE7SUFDRSxzQ0FBc0M7RUFDeEM7O0VBRUE7SUFDRSxpQ0FBaUM7RUFDbkM7O0VBRUE7SUFDRSwyQkFB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K0I7RUFDakM7O0VBRUE7SUFDRSw4QkFBOEI7RUFDaEM7O0VBRUE7SUFDRSw0QkFBNEI7RUFDOUI7O0VBRUE7SUFDRSw4QkFBOEI7RUFDaEM7O0VBRUE7SUFDRSw0QkFBNEI7RUFDOUI7O0VBRUE7SUFDRSw0QkFBNEI7RUFDOUI7O0VBRUE7SUFDRSxrQ0FBa0M7RUFDcEM7O0VBRUE7SUFDRSxpQ0FBaUM7RUFDbkM7O0VBRUE7SUFDRSwrQkFBK0I7RUFDakM7O0VBRUE7SUFDRSxpQ0FBaUM7RUFDbkM7O0VBRUE7SUFDRSwrQkFBK0I7RUFDakM7QUFDRjtBQUNBO0VBQ0U7SUFDRSwwQkFBMEI7RUFDNUI7O0VBRUE7SUFDRSxnQ0FBZ0M7RUFDbEM7O0VBRUE7SUFDRSx5QkFBeUI7RUFDM0I7O0VBRUE7SUFDRSx3QkFBd0I7RUFDMUI7O0VBRUE7SUFDRSx5QkFBeUI7RUFDM0I7O0VBRUE7SUFDRSw2QkFBNkI7RUFDL0I7O0VBRUE7SUFDRSw4QkFBOEI7RUFDaEM7O0VBRUE7SUFDRSx3QkFBd0I7RUFDMUI7O0VBRUE7SUFDRSwrQkFBK0I7RUFDakM7O0VBRUE7SUFDRSx3QkFBd0I7RUFDMUI7O0VBRUE7SUFDRSx5QkFBeUI7RUFDM0I7O0VBRUE7SUFDRSw4QkFBOEI7RUFDaEM7O0VBRUE7SUFDRSxpQ0FBaUM7RUFDbkM7O0VBRUE7SUFDRSxzQ0FBc0M7RUFDeEM7O0VBRUE7SUFDRSx5Q0FBeUM7RUFDM0M7O0VBRUE7SUFDRSx1QkFBdUI7RUFDekI7O0VBRUE7SUFDRSx1QkFBdUI7RUFDekI7O0VBRUE7SUFDRSx5QkFBeUI7RUFDM0I7O0VBRUE7SUFDRSx5QkFBeUI7RUFDM0I7O0VBRUE7SUFDRSwwQkFBMEI7RUFDNUI7O0VBRUE7SUFDRSw0QkFBNEI7RUFDOUI7O0VBRUE7SUFDRSxrQ0FBa0M7RUFDcEM7O0VBRUE7SUFDRSxpQkFBaUI7RUFDbkI7O0VBRUE7SUFDRSx1QkFBdUI7RUFDekI7O0VBRUE7SUFDRSxzQkFBc0I7RUFDeEI7O0VBRUE7SUFDRSxvQkFBb0I7RUFDdEI7O0VBRUE7SUFDRSxzQkFBc0I7RUFDeEI7O0VBRUE7SUFDRSxvQkFBb0I7RUFDdEI7O0VBRUE7SUFDRSxzQ0FBc0M7RUFDeEM7O0VBRUE7SUFDRSxvQ0FBb0M7RUFDdEM7O0VBRUE7SUFDRSxrQ0FBa0M7RUFDcEM7O0VBRUE7SUFDRSx5Q0FBeUM7RUFDM0M7O0VBRUE7SUFDRSx3Q0FBd0M7RUFDMUM7O0VBRUE7SUFDRSx3Q0FBd0M7RUFDMUM7O0VBRUE7SUFDRSxrQ0FBa0M7RUFDcEM7O0VBRUE7SUFDRSxnQ0FBZ0M7RUFDbEM7O0VBRUE7SUFDRSw4QkFBOEI7RUFDaEM7O0VBRUE7SUFDRSxnQ0FBZ0M7RUFDbEM7O0VBRUE7SUFDRSwrQkFBK0I7RUFDakM7O0VBRUE7SUFDRSxvQ0FBb0M7RUFDdEM7O0VBRUE7SUFDRSxrQ0FBa0M7RUFDcEM7O0VBRUE7SUFDRSxnQ0FBZ0M7RUFDbEM7O0VBRUE7SUFDRSx1Q0FBdUM7RUFDekM7O0VBRUE7SUFDRSxzQ0FBc0M7RUFDeEM7O0VBRUE7SUFDRSxpQ0FBaUM7RUFDbkM7O0VBRUE7SUFDRSwyQkFBMkI7RUFDN0I7O0VBRUE7SUFDRSxpQ0FBaUM7RUFDbkM7O0VBRUE7SUFDRSwrQkFBK0I7RUFDakM7O0VBRUE7SUFDRSw2QkFBNkI7RUFDL0I7O0VBRUE7SUFDRSwrQkFBK0I7RUFDakM7O0VBRUE7SUFDRSw4QkFBOEI7RUFDaEM7O0VBRUE7SUFDRSxvQkFBb0I7RUFDdEI7O0VBRUE7SUFDRSxtQkFBbUI7RUFDckI7O0VBRUE7SUFDRSxtQkFBbUI7RUFDckI7O0VBRUE7SUFDRSxtQkFBbUI7RUFDckI7O0VBRUE7SUFDRSxtQkFBbUI7RUFDckI7O0VBRUE7SUFDRSxtQkFBbUI7RUFDckI7O0VBRUE7SUFDRSxtQkFBbUI7RUFDckI7O0VBRUE7SUFDRSxtQkFBbUI7RUFDckI7O0VBRUE7SUFDRSxvQkFBb0I7RUFDdEI7O0VBRUE7SUFDRSwwQkFBMEI7RUFDNUI7O0VBRUE7SUFDRSx5QkFBeUI7RUFDM0I7O0VBRUE7SUFDRSx1QkFBdUI7RUFDekI7O0VBRUE7SUFDRSx5QkFBeUI7RUFDM0I7O0VBRUE7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MUI7O0VBRUE7SUFDRSwrQkFBK0I7RUFDakM7O0VBRUE7SUFDRSx3QkFBd0I7RUFDMUI7O0VBRUE7SUFDRSx5QkFBeUI7RUFDM0I7O0VBRUE7SUFDRSw4QkFBOEI7RUFDaEM7O0VBRUE7SUFDRSxpQ0FBaUM7RUFDbkM7O0VBRUE7SUFDRSxzQ0FBc0M7RUFDeEM7O0VBRUE7SUFDRSx5Q0FBeUM7RUFDM0M7O0VBRUE7SUFDRSx1QkFBdUI7RUFDekI7O0VBRUE7SUFDRSx1QkFBdUI7RUFDekI7O0VBRUE7SUFDRSx5QkFBeUI7RUFDM0I7O0VBRUE7SUFDRSx5QkFBeUI7RUFDM0I7O0VBRUE7SUFDRSwwQkFBMEI7RUFDNUI7O0VBRUE7SUFDRSw0QkFBNEI7RUFDOUI7O0VBRUE7SUFDRSxrQ0FBa0M7RUFDcEM7O0VBRUE7SUFDRSxpQkFBaUI7RUFDbkI7O0VBRUE7SUFDRSx1QkFBdUI7RUFDekI7O0VBRUE7SUFDRSxzQkFBc0I7RUFDeEI7O0VBRUE7SUFDRSxvQkFBb0I7RUFDdEI7O0VBRUE7SUFDRSxzQkFBc0I7RUFDeEI7O0VBRUE7SUFDRSxvQkFBb0I7RUFDdEI7O0VBRUE7SUFDRSxzQ0FBc0M7RUFDeEM7O0VBRUE7SUFDRSxvQ0FBb0M7RUFDdEM7O0VBRUE7SUFDRSxrQ0FBa0M7RUFDcEM7O0VBRUE7SUFDRSx5Q0FBeUM7RUFDM0M7O0VBRUE7SUFDRSx3Q0FBd0M7RUFDMUM7O0VBRUE7SUFDRSx3Q0FBd0M7RUFDMUM7O0VBRUE7SUFDRSxrQ0FBa0M7RUFDcEM7O0VBRUE7SUFDRSxnQ0FBZ0M7RUFDbEM7O0VBRUE7SUFDRSw4QkFBOEI7RUFDaEM7O0VBRUE7SUFDRSxnQ0FBZ0M7RUFDbEM7O0VBRUE7SUFDRSwrQkFBK0I7RUFDakM7O0VBRUE7SUFDRSxvQ0FBb0M7RUFDdEM7O0VBRUE7SUFDRSxrQ0FBa0M7RUFDcEM7O0VBRUE7SUFDRSxnQ0FBZ0M7RUFDbEM7O0VBRUE7SUFDRSx1Q0FBdUM7RUFDekM7O0VBRUE7SUFDRSxzQ0FBc0M7RUFDeEM7O0VBRUE7SUFDRSxpQ0FBaUM7RUFDbkM7O0VBRUE7SUFD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RSwrQkFBK0I7RUFDakM7O0VBRUE7SUFDRSw4QkFBOEI7RUFDaEM7O0VBRUE7SUFDRSw0QkFBNEI7RUFDOUI7O0VBRUE7SUFDRSw4QkFBOEI7RUFDaEM7O0VBRUE7SUFDRSw0QkFBNEI7RUFDOUI7O0VBRUE7SUFDRSw0QkFBNEI7RUFDOUI7O0VBRUE7SUFDRSxrQ0FBa0M7RUFDcEM7O0VBRUE7SUFDRSxpQ0FBaUM7RUFDbkM7O0VBRUE7SUFDRSwrQkFBK0I7RUFDakM7O0VBRUE7SUFDRSxpQ0FBaUM7RUFDbkM7O0VBRUE7SUFDRSwrQkFBK0I7RUFDakM7QUFDRjtBQUNBO0VBQ0U7SUFDRSwwQkFBMEI7RUFDNUI7O0VBRUE7SUFDRSxnQ0FBZ0M7RUFDbEM7O0VBRUE7SUFDRSx5QkFBeUI7RUFDM0I7O0VBRUE7SUFDRSx3QkFBd0I7RUFDMUI7O0VBRUE7SUFDRSx5QkFBeUI7RUFDM0I7O0VBRUE7SUFDRSw2QkFBNkI7RUFDL0I7O0VBRUE7SUFDRSw4QkFBOEI7RUFDaEM7O0VBRUE7SUFDRSx3QkFBd0I7RUFDMUI7O0VBRUE7SUFDRSwrQkFBK0I7RUFDakM7O0VBRUE7SUFDRSx3QkFBd0I7RUFDMUI7O0VBRUE7SUFDRSx5QkFBeUI7RUFDM0I7O0VBRUE7SUFDRSw4QkFBOEI7RUFDaEM7O0VBRUE7SUFDRSxpQ0FBaUM7RUFDbkM7O0VBRUE7SUFDRSxzQ0FBc0M7RUFDeEM7O0VBRUE7SUFDRSx5Q0FBeUM7RUFDM0M7O0VBRUE7SUFDRSx1QkFBdUI7RUFDekI7O0VBRUE7SUFDRSx1QkFBdUI7RUFDekI7O0VBRUE7SUFDRSx5QkFBeUI7RUFDM0I7O0VBRUE7SUFDRSx5QkFBeUI7RUFDM0I7O0VBRUE7SUFDRSwwQkFBMEI7RUFDNUI7O0VBRUE7SUFDRSw0QkFBNEI7RUFDOUI7O0VBRUE7SUFDRSxrQ0FBa0M7RUFDcEM7O0VBRUE7SUFDRSxpQkFBaUI7RUFDbkI7O0VBRUE7SUFDRSx1QkFBdUI7RUFDekI7O0VBRUE7SUFDRSxzQkFBc0I7RUFDeEI7O0VBRUE7SUFDRSxvQkFBb0I7RUFDdEI7O0VBRUE7SUFDRSxzQkFBc0I7RUFDeEI7O0VBRUE7SUFDRSxvQkFBb0I7RUFDdEI7O0VBRUE7SUFDRSxzQ0FBc0M7RUFDeEM7O0VBRUE7SUFDRSxvQ0FBb0M7RUFDdEM7O0VBRUE7SUFDRSxrQ0FBa0M7RUFDcEM7O0VBRUE7SUFDRSx5Q0FBeUM7RUFDM0M7O0VBRUE7SUFDRSx3Q0FBd0M7RUFDMUM7O0VBRUE7SUFDRSx3Q0FBd0M7RUFDMUM7O0VBRUE7SUFDRSxrQ0FBa0M7RUFDcEM7O0VBRUE7SUFDRSxnQ0FBZ0M7RUFDbEM7O0VBRUE7SUFDRSw4QkFBOEI7RUFDaEM7O0VBRUE7SUFDRSxnQ0FBZ0M7RUFDbEM7O0VBRUE7SUFDRSwrQkFBK0I7RUFDakM7O0VBRUE7SUFDRSxvQ0FBb0M7RUFDdEM7O0VBRUE7SUFDRSxrQ0FBa0M7RUFDcEM7O0VBRUE7SUFDRSxnQ0FBZ0M7RUFDbEM7O0VBRUE7SUFDRSx1Q0FBdUM7RUFDekM7O0VBRUE7SUFDRSxzQ0FBc0M7RUFDeEM7O0VBRUE7SUFDRSxpQ0FBaUM7RUFDbkM7O0VBRUE7SUFDRSwyQkFBMkI7RUFDN0I7O0VBRUE7SUFDRSxpQ0FBaUM7RUFDbkM7O0VBRUE7SUFDRSwrQkFBK0I7RUFDakM7O0VBRUE7SUFDRSw2QkFBNkI7RUFDL0I7O0VBRUE7SUFDRSwrQkFBK0I7RUFDakM7O0VBRUE7SUFDRSw4QkFBOEI7RUFDaEM7O0VBRUE7SUFDRSxvQkFBb0I7RUFDdEI7O0VBRUE7SUFDRSxtQkFBbUI7RUFDckI7O0VBRUE7SUFDRSxtQkFBbUI7RUFDckI7O0VBRUE7SUFDRSxtQkFBbUI7RUFDckI7O0VBRUE7SUFDRSxtQkFBbUI7RUFDckI7O0VBRUE7SUFDRSxtQkFBbUI7RUFDckI7O0VBRUE7SUFDRSxtQkFBbUI7RUFDckI7O0VBRUE7SUFDRSxtQkFBbUI7RUFDckI7O0VBRUE7SUFDRSxvQkFBb0I7RUFDdEI7O0VBRUE7SUFDRSwwQkFBMEI7RUFDNUI7O0VBRUE7SUFDRSx5QkFBeUI7RUFDM0I7O0VBRUE7SUFDRSx1QkFBdUI7RUFDekI7O0VBRUE7SUFDRSx5QkFBeUI7RUFDM0I7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d0I7RUFDMUI7O0VBRUE7SUFDRSwrQkFBK0I7RUFDakM7O0VBRUE7SUFDRSx3QkFBd0I7RUFDMUI7O0VBRUE7SUFDRSx5QkFBeUI7RUFDM0I7O0VBRUE7SUFDRSw4QkFBOEI7RUFDaEM7O0VBRUE7SUFDRSxpQ0FBaUM7RUFDbkM7O0VBRUE7SUFDRSxzQ0FBc0M7RUFDeEM7O0VBRUE7SUFDRSx5Q0FBeUM7RUFDM0M7O0VBRUE7SUFDRSx1QkFBdUI7RUFDekI7O0VBRUE7SUFDRSx1QkFBdUI7RUFDekI7O0VBRUE7SUFDRSx5QkFBeUI7RUFDM0I7O0VBRUE7SUFDRSx5QkFBeUI7RUFDM0I7O0VBRUE7SUFDRSwwQkFBMEI7RUFDNUI7O0VBRUE7SUFDRSw0QkFBNEI7RUFDOUI7O0VBRUE7SUFDRSxrQ0FBa0M7RUFDcEM7O0VBRUE7SUFDRSxpQkFBaUI7RUFDbkI7O0VBRUE7SUFDRSx1QkFBdUI7RUFDekI7O0VBRUE7SUFDRSxzQkFBc0I7RUFDeEI7O0VBRUE7SUFDRSxvQkFBb0I7RUFDdEI7O0VBRUE7SUFDRSxzQkFBc0I7RUFDeEI7O0VBRUE7SUFDRSxvQkFBb0I7RUFDdEI7O0VBRUE7SUFDRSxzQ0FBc0M7RUFDeEM7O0VBRUE7SUFDRSxvQ0FBb0M7RUFDdEM7O0VBRUE7SUFDRSxrQ0FBa0M7RUFDcEM7O0VBRUE7SUFDRSx5Q0FBeUM7RUFDM0M7O0VBRUE7SUFDRSx3Q0FBd0M7RUFDMUM7O0VBRUE7SUFDRSx3Q0FBd0M7RUFDMUM7O0VBRUE7SUFDRSxrQ0FBa0M7RUFDcEM7O0VBRUE7SUFDRSxnQ0FBZ0M7RUFDbEM7O0VBRUE7SUFDRSw4QkFBOEI7RUFDaEM7O0VBRUE7SUFDRSxnQ0FBZ0M7RUFDbEM7O0VBRUE7SUFDRSwrQkFBK0I7RUFDakM7O0VBRUE7SUFDRSxvQ0FBb0M7RUFDdEM7O0VBRUE7SUFDRSxrQ0FBa0M7RUFDcEM7O0VBRUE7SUFDRSxnQ0FBZ0M7RUFDbEM7O0VBRUE7SUFDRSx1Q0FBdUM7RUFDekM7O0VBRUE7SUFDRSxzQ0FBc0M7RUFDeEM7O0VBRUE7SUFDRSxpQ0FBaUM7RUFDbkM7O0VB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Q0UsK0NBQStDO0FBQ2pEIiwiZmlsZSI6ImNvcmUuY3NzIiwic291cmNlc0NvbnRlbnQiOlsiQGNoYXJzZXQgXCJVVEYtOFwiO1xuOnJvb3Qge1xuICAtLWJzLWJsdWU6ICMwMDdiZmY7XG4gIC0tYnMtaW5kaWdvOiAjNjYxMGYyO1xuICAtLWJzLXB1cnBsZTogIzY5NmNmZjtcbiAgLS1icy1waW5rOiAjZTgzZThjO1xuICAtLWJzLXJlZDogI2ZmM2UxZDtcbiAgLS1icy1vcmFuZ2U6ICNmZDdlMTQ7XG4gIC0tYnMteWVsbG93OiAjZmZhYjAwO1xuICAtLWJzLWdyZWVuOiAjNzFkZDM3O1xuICAtLWJzLXRlYWw6ICMyMGM5OTc7XG4gIC0tYnMtY3lhbjogIzAzYzNlYztcbiAgLS1icy13aGl0ZTogI2ZmZjtcbiAgLS1icy1ncmF5OiByZ2JhKDY3LCA4OSwgMTEzLCAwLjYpO1xuICAtLWJzLWdyYXktZGFyazogcmdiYSg2NywgODksIDExMywgMC44KTtcbiAgLS1icy1ncmF5LTI1OiByZ2JhKDY3LCA4OSwgMTEzLCAwLjAyNSk7XG4gIC0tYnMtZ3JheS01MDogcmdiYSg2NywgODksIDExMywgMC4wNSk7XG4gIC0tYnMtcHJpbWFyeTogIzY5NmNmZjtcbiAgLS1icy1zZWNvbmRhcnk6ICM4NTkyYTM7XG4gIC0tYnMtc3VjY2VzczogIzcxZGQzNztcbiAgLS1icy1pbmZvOiAjMDNjM2VjO1xuICAtLWJzLXdhcm5pbmc6ICNmZmFiMDA7XG4gIC0tYnMtZGFuZ2VyOiAjZmYzZTFkO1xuICAtLWJzLWxpZ2h0OiAjZmNmZGZkO1xuICAtLWJzLWRhcms6ICMyMzM0NDY7XG4gIC0tYnMtZ3JheTogcmdiYSg2NywgODksIDExMywgMC4xKTtcbiAgLS1icy1wcmltYXJ5LXJnYjogMTA1LCAxMDgsIDI1NTtcbiAgLS1icy1zZWNvbmRhcnktcmdiOiAxMzMsIDE0NiwgMTYzO1xuICAtLWJzLXN1Y2Nlc3MtcmdiOiAxMTMsIDIyMSwgNTU7XG4gIC0tYnMtaW5mby1yZ2I6IDMsIDE5NSwgMjM2O1xuICAtLWJzLXdhcm5pbmctcmdiOiAyNTUsIDE3MSwgMDtcbiAgLS1icy1kYW5nZXItcmdiOiAyNTUsIDYyLCAyOTtcbiAgLS1icy1saWdodC1yZ2I6IDI1MiwgMjUzLCAyNTM7XG4gIC0tYnMtZGFyay1yZ2I6IDM1LCA1MiwgNzA7XG4gIC0tYnMtZ3JheS1yZ2I6IDY3LCA4OSwgMTEzO1xuICAtLWJzLXdoaXRlLXJnYjogMjU1LCAyNTUsIDI1NTtcbiAgLS1icy1ibGFjay1yZ2I6IDY3LCA4OSwgMTEzO1xuICAtLWJzLWJvZHktY29sb3ItcmdiOiAxMDUsIDEyMiwgMTQxO1xuICAtLWJzLWJvZHktYmctcmdiOiAyNDUsIDI0NSwgMjQ5O1xuICAtLWJzLWZvbnQtc2Fucy1zZXJpZjogXCJQdWJsaWMgU2Fuc1wiLCAtYXBwbGUtc3lzdGVtLCBCbGlua01hY1N5c3RlbUZvbnQsIFwiU2Vnb2UgVUlcIiwgXCJPeHlnZW5cIiwgXCJVYnVudHVcIiwgXCJDYW50YXJlbGxcIiwgXCJGaXJhIFNhbnNcIiwgXCJEcm9pZCBTYW5zXCIsIFwiSGVsdmV0aWNhIE5ldWVcIiwgc2Fucy1zZXJpZjtcbiAgLS1icy1mb250LW1vbm9zcGFjZTogXCJTRk1vbm8tUmVndWxhclwiLCBNZW5sbywgTW9uYWNvLCBDb25zb2xhcywgXCJMaWJlcmF0aW9uIE1vbm9cIiwgXCJDb3VyaWVyIE5ld1wiLCBtb25vc3BhY2U7XG4gIC0tYnMtZ3JhZGllbnQ6IGxpbmVhci1ncmFkaWVudCgxODBkZWcsIHJnYmEoMjU1LCAyNTUsIDI1NSwgMC4xNSksIHJnYmEoMjU1LCAyNTUsIDI1NSwgMCkpO1xuICAtLWJzLXJvb3QtZm9udC1zaXplOiAxNnB4O1xuICAtLWJzLWJvZHktZm9udC1mYW1pbHk6IHZhcigtLWJzLWZvbnQtc2Fucy1zZXJpZik7XG4gIC0tYnMtYm9keS1mb250LXNpemU6IDAuOTM3NXJlbTtcbiAgLS1icy1ib2R5LWZvbnQtd2VpZ2h0OiA0MDA7XG4gIC0tYnMtYm9keS1saW5lLWhlaWdodDogMS41MztcbiAgLS1icy1ib2R5LWNvbG9yOiAjNjk3YThkO1xuICAtLWJzLWJvZHktYmc6ICNmNWY1Zjk7XG59XG5cbiosXG4qOjpiZWZvcmUsXG4qOjphZnRlciB7XG4gIGJveC1zaXppbmc6IGJvcmRlci1ib3g7XG59XG5cbjpyb290IHtcbiAgZm9udC1zaXplOiB2YXIoLS1icy1yb290LWZvbnQtc2l6ZSk7XG59XG5AbWVkaWEgKHByZWZlcnMtcmVkdWNlZC1tb3Rpb246IG5vLXByZWZlcmVuY2UpIHtcbiAgOnJvb3Qge1xuICAgIHNjcm9sbC1iZWhhdmlvcjogc21vb3RoO1xuICB9XG59XG5cbmJvZHkge1xuICBtYXJnaW46IDA7XG4gIGZvbnQtZmFtaWx5OiB2YXIoLS1icy1ib2R5LWZvbnQtZmFtaWx5KTtcbiAgZm9udC1zaXplOiB2YXIoLS1icy1ib2R5LWZvbnQtc2l6ZSk7XG4gIGZvbnQtd2VpZ2h0OiB2YXIoLS1icy1ib2R5LWZvbnQtd2VpZ2h0KTtcbiAgbGluZS1oZWlnaHQ6IHZhcigtLWJzLWJvZHktbGluZS1oZWlnaHQpO1xuICBjb2xvcjogdmFyKC0tYnMtYm9keS1jb2xvcik7XG4gIHRleHQtYWxpZ246IHZhcigtLWJzLWJvZHktdGV4dC1hbGlnbik7XG4gIGJhY2tncm91bmQtY29sb3I6IHZhcigtLWJzLWJvZHktYmcpO1xuICAtd2Via2l0LXRleHQtc2l6ZS1hZGp1c3Q6IDEwMCU7XG4gIC13ZWJraXQtdGFwLWhpZ2hsaWdodC1jb2xvcjogcmdiYSg2NywgODksIDExMywgMCk7XG59XG5cbmhyIHtcbiAgbWFyZ2luOiAxcmVtIDA7XG4gIGNvbG9yOiAjZDlkZWUzO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiBjdXJyZW50Q29sb3I7XG4gIGJvcmRlcjogMDtcbiAgb3BhY2l0eTogMTtcbn1cblxuaHI6bm90KFtzaXplXSkge1xuICBoZWlnaHQ6IDFweDtcbn1cblxuaDYsIC5oNiwgaDUsIC5oNSwgaDQsIC5oNCwgaDMsIC5oMywgaDIsIC5oMiwgaDEsIC5oMSB7XG4gIG1hcmdpbi10b3A6IDA7XG4gIG1hcmdpbi1ib3R0b206IDFyZW07XG4gIGZvbnQtd2VpZ2h0OiA1MDA7XG4gIGxpbmUtaGVpZ2h0OiAxLjE7XG4gIGNvbG9yOiAjNTY2YTdmO1xufVxuXG5oMSwgLmgxIHtcbiAgZm9udC1zaXplOiBjYWxjKDEuMzYyNXJlbSArIDEuMzV2dyk7XG59XG5AbWVkaWEgKG1pbi13aWR0aDogMTIwMHB4KSB7XG4gIGgxLCAuaDEge1xuICAgIGZvbnQtc2l6ZTogMi4zNzVyZW07XG4gIH1cbn1cblxuaDIsIC5oMiB7XG4gIGZvbnQtc2l6ZTogY2FsYygxLjMyNXJlbSArIDAuOXZ3KTtcbn1cbkBtZWRpYSAobWluLXdpZHRoOiAxMjAwcHgpIHtcbiAgaDIsIC5oMiB7XG4gICAgZm9udC1zaXplOiAycmVtO1xuICB9XG59XG5cbmgzLCAuaDMge1xuICBmb250LXNpemU6IGNhbGMoMS4yODc1cmVtICsgMC40NXZ3KTtcbn1cbkBtZWRpYSAobWluLXdpZHRoOiAxMjAwcHgpIHtcbiAgaDMsIC5oMyB7XG4gICAgZm9udC1zaXplOiAxLjYyNXJlbTtcbiAgfVxufVxuXG5oNCwgLmg0IHtcbiAgZm9udC1zaXplOiBjYWxjKDEuMjYyNXJlbSArIDAuMTV2dyk7XG59XG5AbWVkaWEgKG1pbi13aWR0aDogMTIwMHB4KSB7XG4gIGg0LCAuaDQge1xuICAgIGZvbnQtc2l6ZTogMS4zNzVyZW07XG4gIH1cbn1cblxuaDUsIC5oNSB7XG4gIGZvbnQtc2l6ZTogMS4xMjVyZW07XG59XG5cbmg2LCAuaDYge1xuICBmb250LXNpemU6IDAuOTM3NXJlbTtcbn1cblxucCB7XG4gIG1hcmdpbi10b3A6IDA7XG4gIG1hcmdpbi1ib3R0b206IDFyZW07XG59XG5cbmFiYnJbdGl0bGVdLFxuYWJicltkYXRhLWJzLW9yaWdpbmFsLXRpdGxlXSB7XG4gIHRleHQtZGVjb3JhdGlvbjogdW5kZXJsaW5lIGRvdHRlZDtcbiAgY3Vyc29yOiBoZWxwO1xuICB0ZXh0LWRlY29yYXRpb24tc2tpcC1pbms6IG5vbmU7XG59XG5cbmFkZHJlc3Mge1xuICBtYXJnaW4tYm90dG9tOiAxcmVtO1xuICBmb250LXN0eWxlOiBub3JtYWw7XG4gIGxpbmUtaGVpZ2h0OiBpbmhlcml0O1xufVxuXG5vbCxcbnVsIHtcbiAgcGFkZGluZy1sZWZ0OiAycmVtO1xufVxuXG5vbCxcbnVsLFxuZGwge1xuICBtYXJnaW4tdG9wOiAwO1xuICBtYXJnaW4tYm90dG9tOiAxcmVtO1xufVxuXG5vbCBvbCxcbnVsIHVsLFxub2wgdWwsXG51bCBvbCB7XG4gIG1hcmdpbi1ib3R0b206IDA7XG59XG5cbmR0IHtcbiAgZm9udC13ZWlnaHQ6IDcwMDtcbn1cblxuZGQge1xuICBtYXJnaW4tYm90dG9tOiAwLjVyZW07XG4gIG1hcmdpbi1sZWZ0OiAwO1xufVxuXG5ibG9ja3F1b3RlIHtcbiAgbWFyZ2luOiAwIDAgMXJlbTtcbn1cblxuYixcbnN0cm9uZyB7XG4gIGZvbnQtd2VpZ2h0OiA5MDA7XG59XG5cbnNtYWxsLCAuc21hbGwge1xuICBmb250LXNpemU6IDg1JTtcbn1cblxubWFyaywgLm1hcmsge1xuICBwYWRkaW5nOiAwLjJlbTtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZjZjhlMztcbn1cblxuc3ViLFxuc3VwIHtcbiAgcG9zaXRpb246IHJlbGF0aXZlO1xuICBmb250LXNpemU6IDAuNzVlbTtcbiAgbGluZS1oZWlnaHQ6IDA7XG4gIHZlcnRpY2FsLWFsaWduOiBiYXNlbGluZTtcbn1cblxuc3ViIHtcbiAgYm90dG9tOiAtMC4yNWVtO1xufVxuXG5zdXAge1xuICB0b3A6IC0wLjVlbTtcbn1cblxuYSB7XG4gIGNvbG9yOiAjNjk2Y2ZmO1xuICB0ZXh0LWRlY29yYXRpb246IG5vbmU7XG59XG5hOmhvdmVyIHtcbiAgY29sb3I6ICM1ZjYxZTY7XG59XG5cbmE6bm90KFtocmVmXSk6bm90KFtjbGFzc10pLCBhOm5vdChbaHJlZl0pOm5vdChbY2xhc3NdKTpob3ZlciB7XG4gIGNvbG9yOiBpbmhlcml0O1xuICB0ZXh0LWRlY29yYXRpb246IG5vbmU7XG59XG5cbnByZSxcbmNvZGUsXG5rYmQsXG5zYW1wIHtcbiAgZm9udC1mYW1pbHk6IHZhcigtLWJzLWZvbnQtbW9ub3NwYWNlKTtcbiAgZm9udC1zaXplOiAxZW07XG4gIGRpcmVjdGlvbjogbHRyIC8qIHJ0bDppZ25vcmUgKi87XG4gIHVuaWNvZGUtYmlkaTogYmlkaS1vdmVycmlkZTtcbn1cblxucHJlIHtcbiAgZGlzcGxheTogYmxvY2s7XG4gIG1hcmdpbi10b3A6IDA7XG4gIG1hcmdpbi1ib3R0b206IDFyZW07XG4gIG92ZXJmbG93OiBhdXRvO1xuICBmb250LXNpemU6IDg1JTtcbn1cbnByZSBjb2RlIHtcbiAgZm9udC1zaXplOiBpbmhlcml0O1xuICBjb2xvcjogaW5oZXJpdDtcbiAgd29yZC1icmVhazogbm9ybWFsO1xufVxuXG5jb2RlIHtcbiAgZm9udC1zaXplOiA4NSU7XG4gIGNvbG9yOiAjZTgzZThjO1xuICB3b3JkLXdyYXA6IGJyZWFrLXdvcmQ7XG59XG5hID4gY29kZSB7XG4gIGNvbG9yOiBpbmhlcml0O1xufVxuXG5rYmQge1xuICBwYWRkaW5nOiAwLjJyZW0gMC40cmVtO1xuICBmb250LXNpemU6IDg1JTtcbiAgY29sb3I6ICNmZmY7XG4gIGJhY2tncm91bmQtY29sb3I6IHJnYmEoNjcsIDg5LCAxMTMsIDAuOSk7XG4gIGJvcmRlci1yYWRpdXM6IDAuMjVyZW07XG59XG5rYmQga2JkIHtcbiAgcGFkZGluZzogMDtcbiAgZm9udC1zaXplOiAxZW07XG4gIGZvbnQtd2VpZ2h0OiA3MDA7XG59XG5cbmZpZ3VyZSB7XG4gIG1hcmdpbjogMCAwIDFyZW07XG59XG5cbmltZyxcbnN2ZyB7XG4gIHZlcnRpY2FsLWFsaWduOiBtaWRkbGU7XG59XG5cbnRhYmxlIHtcbiAgY2FwdGlvbi1zaWRlOiBib3R0b207XG4gIGJvcmRlci1jb2xsYXBzZTogY29sbGFwc2U7XG59XG5cbmNhcHRpb24ge1xuICBwYWRkaW5nLXRvcDogMC42MjVyZW07XG4gIHBhZGRpbmctYm90dG9tOiAwLjYyNXJlbTtcbiAgY29sb3I6ICNhMWFjYjg7XG4gIHRleHQtYWxpZ246IGxlZnQ7XG59XG5cbnRoIHtcbiAgZm9udC13ZWlnaHQ6IDYwMDtcbiAgdGV4dC1hbGlnbjogaW5oZXJpdDtcbiAgdGV4dC1hbGlnbjogLXdlYmtpdC1tYXRjaC1wYXJlbnQ7XG59XG5cbnRoZWFkLFxudGJvZHksXG50Zm9vdCxcbnRyLFxudGQsXG50aCB7XG4gIGJvcmRlci1jb2xvcjogaW5oZXJpdDtcbiAgYm9yZGVyLXN0eWxlOiBzb2xpZDtcbiAgYm9yZGVyLXdpZHRoOiAwO1xufVxuXG5sYWJlbCB7XG4gIGRpc3BsYXk6IGlubGluZS1ibG9jaztcbn1cblxuYnV0dG9uIHtcbiAgYm9yZGVyLXJhZGl1czogMDtcbn1cblxuYnV0dG9uOmZvY3VzOm5vdCg6Zm9jdXMtdmlzaWJsZSkge1xuICBvdXRsaW5lOiAwO1xufVxuXG5pbnB1dCxcbmJ1dHRvbixcbnNlbGVjdCxcbm9wdGdyb3VwLFxudGV4dGFyZWEge1xuICBtYXJnaW46IDA7XG4gIGZvbnQtZmFtaWx5OiBpbmhlcml0O1xuICBmb250LXNpemU6IGluaGVyaXQ7XG4gIGxpbmUtaGVpZ2h0OiBpbmhlcml0O1xufVxuXG5idXR0b24sXG5zZWxlY3Qge1xuICB0ZXh0LXRyYW5zZm9ybTogbm9uZTtcbn1cblxuW3JvbGU9YnV0dG9uXSB7XG4gIGN1cnNvcjogcG9pbnRlcjtcbn1cblxuc2VsZWN0IHtcbiAgd29yZC13cmFwOiBub3JtYWw7XG59XG5zZWxlY3Q6ZGlzYWJsZWQge1xuICBvcGFjaXR5OiAxO1xufVxuXG5bbGlzdF06Oi13ZWJraXQtY2FsZW5kYXItcGlja2VyLWluZGljYXRvciB7XG4gIGRpc3BsYXk6IG5vbmU7XG59XG5cbmJ1dHRvbixcblt0eXBlPWJ1dHRvbl0sXG5bdHlwZT1yZXNldF0sXG5bdHlwZT1zdWJtaXRdIHtcbiAgLXdlYmtpdC1hcHBlYXJhbmNlOiBidXR0b247XG59XG5idXR0b246bm90KDpkaXNhYmxlZCksXG5bdHlwZT1idXR0b25dOm5vdCg6ZGlzYWJsZWQpLFxuW3R5cGU9cmVzZXRdOm5vdCg6ZGlzYWJsZWQpLFxuW3R5cGU9c3VibWl0XTpub3QoOmRpc2FibGVkKSB7XG4gIGN1cnNvcjogcG9pbnRlcjtcbn1cblxuOjotbW96LWZvY3VzLWlubmVyIHtcbiAgcGFkZGluZzogMDtcbiAgYm9yZGVyLXN0eWxlOiBub25lO1xufVxuXG50ZXh0YXJlYSB7XG4gIHJlc2l6ZTogdmVydGljYWw7XG59XG5cbmZpZWxkc2V0IHtcbiAgbWluLXdpZHRoOiAwO1xuICBwYWRkaW5nOiAwO1xuICBtYXJnaW46IDA7XG4gIGJvcmRlcjogMDtcbn1cblxubGVnZW5kIHtcbiAgZmxvYXQ6IGxlZnQ7XG4gIHdpZHRoOiAxMDAlO1xuICBwYWRkaW5nOiAwO1xuICBtYXJnaW4tYm90dG9tOiAwLjVyZW07XG4gIGZvbnQtc2l6ZTogY2FsYygxLjI3NXJlbSArIDAuM3Z3KTtcbiAgbGluZS1oZWlnaHQ6IGluaGVyaXQ7XG59XG5AbWVkaWEgKG1pbi13aWR0aDogMTIwMHB4KSB7XG4gIGxlZ2VuZCB7XG4gICAgZm9udC1zaXplOiAxLjVyZW07XG4gIH1cbn1cbmxlZ2VuZCArICoge1xuICBjbGVhcjogbGVmdDtcbn1cblxuOjotd2Via2l0LWRhdGV0aW1lLWVkaXQtZmllbGRzLXdyYXBwZXIsXG46Oi13ZWJraXQtZGF0ZXRpbWUtZWRpdC10ZXh0LFxuOjotd2Via2l0LWRhdGV0aW1lLWVkaXQtbWludXRlLFxuOjotd2Via2l0LWRhdGV0aW1lLWVkaXQtaG91ci1maWVsZCxcbjo6LXdlYmtpdC1kYXRldGltZS1lZGl0LWRheS1maWVsZCxcbjo6LXdlYmtpdC1kYXRldGltZS1lZGl0LW1vbnRoLWZpZWxkLFxuOjotd2Via2l0LWRhdGV0aW1lLWVkaXQteWVhci1maWVsZCB7XG4gIHBhZGRpbmc6IDA7XG59XG5cbjo6LXdlYmtpdC1pbm5lci1zcGluLWJ1dHRvbiB7XG4gIGhlaWdodDogYXV0bztcbn1cblxuW3R5cGU9c2VhcmNoXSB7XG4gIG91dGxpbmUtb2Zmc2V0OiAtMnB4O1xuICAtd2Via2l0LWFwcGVhcmFuY2U6IHRleHRmaWVsZDtcbn1cblxuLyogcnRsOnJhdzpcblt0eXBlPVwidGVsXCJdLFxuW3R5cGU9XCJ1cmxcIl0sXG5bdHlwZT1cImVtYWlsXCJdLFxuW3R5cGU9XCJudW1iZXJcIl0ge1xuICBkaXJlY3Rpb246IGx0cjtcbn1cbiovXG46Oi13ZWJraXQtc2VhcmNoLWRlY29yYXRpb24ge1xuICAtd2Via2l0LWFwcGVhcmFuY2U6IG5vbmU7XG59XG5cbjo6LXdlYmtpdC1jb2xvci1zd2F0Y2gtd3JhcHBlciB7XG4gIHBhZGRpbmc6IDA7XG59XG5cbjo6ZmlsZS1zZWxlY3Rvci1idXR0b24ge1xuICBmb250OiBpbmhlcml0O1xufVxuXG46Oi13ZWJraXQtZmlsZS11cGxvYWQtYnV0dG9uIHtcbiAgZm9udDogaW5oZXJpdDtcbiAgLXdlYmtpdC1hcHBlYXJhbmNlOiBidXR0b247XG59XG5cbm91dHB1dCB7XG4gIGRpc3BsYXk6IGlubGluZS1ibG9jaztcbn1cblxuaWZyYW1lIHtcbiAgYm9yZGVyOiAwO1xufVxuXG5zdW1tYXJ5IHtcbiAgZGlzcGxheTogbGlzdC1pdGVtO1xuICBjdXJzb3I6IHBvaW50ZXI7XG59XG5cbnByb2dyZXNzIHtcbiAgdmVydGljYWwtYWxpZ246IGJhc2VsaW5lO1xufVxuXG5baGlkZGVuXSB7XG4gIGRpc3BsYXk6IG5vbmUgIWltcG9ydGFudDtcbn1cblxuLmxlYWQge1xuICBmb250LXNpemU6IDEuMDU0Njg3NXJlbTtcbiAgZm9udC13ZWlnaHQ6IDQwMDtcbn1cblxuLmRpc3BsYXktMSB7XG4gIGZvbnQtc2l6ZTogY2FsYygxLjUyNXJlbSArIDMuM3Z3KTtcbiAgZm9udC13ZWlnaHQ6IDUwMDtcbiAgbGluZS1oZWlnaHQ6IDEuMTtcbn1cbkBtZWRpYSAobWluLXdpZHRoOiAxMjAwcHgpIHtcbiAgLmRpc3BsYXktMSB7XG4gICAgZm9udC1zaXplOiA0cmVtO1xuICB9XG59XG5cbi5kaXNwbGF5LTIge1xuICBmb250LXNpemU6IGNhbGMoMS40NzVyZW0gKyAyLjd2dyk7XG4gIGZvbnQtd2VpZ2h0OiA1MDA7XG4gIGxpbmUtaGVpZ2h0OiAxLjE7XG59XG5AbWVkaWEgKG1pbi13aWR0aDogMTIwMHB4KSB7XG4gIC5kaXNwbGF5LTIge1xuICAgIGZvbnQtc2l6ZTogMy41cmVtO1xuICB9XG59XG5cbi5kaXNwbGF5LTMge1xuICBmb250LXNpemU6IGNhbGMoMS40MjVyZW0gKyAyLjF2dyk7XG4gIGZvbnQtd2VpZ2h0OiA1MDA7XG4gIGxpbmUtaGVpZ2h0OiAxLjE7XG59XG5AbWVkaWEgKG1pbi13aWR0aDogMTIwMHB4KSB7XG4gIC5kaXNwbGF5LTMge1xuICAgIGZvbnQtc2l6ZTogM3JlbTtcbiAgfVxufVxuXG4uZGlzcGxheS00IHtcbiAgZm9udC1zaXplOiBjYWxjKDEuMzc1cmVtICsgMS41dncpO1xuICBmb250LXdlaWdodDogNTAwO1xuICBsaW5lLWhlaWdodDogMS4xO1xufVxuQG1lZGlhIChtaW4td2lkdGg6IDEyMDBweCkge1xuICAuZGlzcGxheS00IHtcbiAgICBmb250LXNpemU6IDIuNXJlbTtcbiAgfVxufVxuXG4uZGlzcGxheS01IHtcbiAgZm9udC1zaXplOiBjYWxjKDEuMzI1cmVtICsgMC45dncpO1xuICBmb250LXdlaWdodDogNTAwO1xuICBsaW5lLWhlaWdodDogMS4xO1xufVxuQG1lZGlhIChtaW4td2lkdGg6IDEyMDBweCkge1xuICAuZGlzcGxheS01IHtcbiAgICBmb250LXNpemU6IDJyZW07XG4gIH1cbn1cblxuLmRpc3BsYXktNiB7XG4gIGZvbnQtc2l6ZTogY2FsYygxLjI3NXJlbSArIDAuM3Z3KTtcbiAgZm9udC13ZWlnaHQ6IDUwMDtcbiAgbGluZS1oZWlnaHQ6IDEuMTtcbn1cbkBtZWRpYSAobWluLXdpZHRoOiAxMjAwcHgpIHtcbiAgLmRpc3BsYXktNiB7XG4gICAgZm9udC1zaXplOiAxLjVyZW07XG4gIH1cbn1cblxuLmxpc3QtdW5zdHlsZWQge1xuICBwYWRkaW5nLWxlZnQ6IDA7XG4gIGxpc3Qtc3R5bGU6IG5vbmU7XG59XG5cbi5saXN0LWlubGluZSB7XG4gIHBhZGRpbmctbGVmdDogMDtcbiAgbGlzdC1zdHlsZTogbm9uZTtcbn1cblxuLmxpc3QtaW5saW5lLWl0ZW0ge1xuICBkaXNwbGF5OiBpbmxpbmUtYmxvY2s7XG59XG4ubGlzdC1pbmxpbmUtaXRlbTpub3QoOmxhc3QtY2hpbGQpIHtcbiAgbWFyZ2luLXJpZ2h0OiAwLjVyZW07XG59XG5cbi5pbml0aWFsaXNtIHtcbiAgZm9udC1zaXplOiA4NSU7XG4gIHRleHQtdHJhbnNmb3JtOiB1cHBlcmNhc2U7XG59XG5cbi5ibG9ja3F1b3RlIHtcbiAgbWFyZ2luLWJvdHRvbTogMXJlbTtcbiAgZm9udC1zaXplOiAxLjA1NDY4NzVyZW07XG59XG4uYmxvY2txdW90ZSA+IDpsYXN0LWNoaWxkIHtcbiAgbWFyZ2luLWJvdHRvbTogMDtcbn1cblxuLmJsb2NrcXVvdGUtZm9vdGVyIHtcbiAgbWFyZ2luLXRvcDogLTFyZW07XG4gIG1hcmdpbi1ib3R0b206IDFyZW07XG4gIGZvbnQtc2l6ZTogODUlO1xuICBjb2xvcjogcmdiYSg2NywgODksIDExMywgMC42KTtcbn1cbi5ibG9ja3F1b3RlLWZvb3Rlcjo6YmVmb3JlIHtcbiAgY29udGVudDogXCLigJTCoFwiO1xufVxuXG4uaW1nLWZsdWlkIHtcbiAgbWF4LXdpZHRoOiAxMDAlO1xuICBoZWlnaHQ6IGF1dG87XG59XG5cbi5pbWctdGh1bWJuYWlsIHtcbiAgcGFkZGluZzogMDtcbiAgYmFja2dyb3VuZC1jb2xvcjogdHJhbnNwYXJlbnQ7XG4gIGJvcmRlcjogMHB4IHNvbGlkIHJnYmEoNjcsIDg5LCAxMTMsIDAuMyk7XG4gIGJvcmRlci1yYWRpdXM6IDBweDtcbiAgbWF4LXdpZHRoOiAxMDAlO1xuICBoZWlnaHQ6IGF1dG87XG59XG5cbi5maWd1cmUge1xuICBkaXNwbGF5OiBpbmxpbmUtYmxvY2s7XG59XG5cbi5maWd1cmUtaW1nIHtcbiAgbWFyZ2luLWJvdHRvbTogMC41cmVtO1xuICBsaW5lLWhlaWdodDogMTtcbn1cblxuLmZpZ3VyZS1jYXB0aW9uIHtcbiAgZm9udC1zaXplOiA4NSU7XG4gIGNvbG9yOiAjYTFhY2I4O1xufVxuXG4uY29udGFpbmVyLFxuLmNvbnRhaW5lci1mbHVpZCxcbi5jb250YWluZXIteHhsLFxuLmNvbnRhaW5lci14bCxcbi5jb250YWluZXItbGcsXG4uY29udGFpbmVyLW1kLFxuLmNvbnRhaW5lci1zbSB7XG4gIHdpZHRoOiAxMDAlO1xuICBwYWRkaW5nLXJpZ2h0OiB2YXIoLS1icy1ndXR0ZXIteCwgMS42MjVyZW0pO1xuICBwYWRkaW5nLWxlZnQ6IHZhcigtLWJzLWd1dHRlci14LCAxLjYyNXJlbSk7XG4gIG1hcmdpbi1yaWdodDogYXV0bztcbiAgbWFyZ2luLWxlZnQ6IGF1dG87XG59XG5cbkBtZWRpYSAobWluLXdpZHRoOiA1NzZweCkge1xuICAuY29udGFpbmVyLXNtLCAuY29udGFpbmVyIHtcbiAgICBtYXgtd2lkdGg6IDU0MHB4O1xuICB9XG59XG5AbWVkaWEgKG1pbi13aWR0aDogNzY4cHgpIHtcbiAgLmNvbnRhaW5lci1tZCwgLmNvbnRhaW5lci1zbSwgLmNvbnRhaW5lciB7XG4gICAgbWF4LXdpZHRoOiA3MjBweDtcbiAgfVxufVxuQG1lZGlhIChtaW4td2lkdGg6IDk5MnB4KSB7XG4gIC5jb250YWluZXItbGcsIC5jb250YWluZXItbWQsIC5jb250YWluZXItc20sIC5jb250YWluZXIge1xuICAgIG1heC13aWR0aDogOTYwcHg7XG4gIH1cbn1cbkBtZWRpYSAobWluLXdpZHRoOiAxMjAwcHgpIHtcbiAgLmNvbnRhaW5lci14bCwgLmNvbnRhaW5lci1sZywgLmNvbnRhaW5lci1tZCwgLmNvbnRhaW5lci1zbSwgLmNvbnRhaW5lciB7XG4gICAgbWF4LXdpZHRoOiAxMTQwcHg7XG4gIH1cbn1cbkBtZWRpYSAobWluLXdpZHRoOiAxNDAwcHgpIHtcbiAgLmNvbnRhaW5lci14eGwsIC5jb250YWluZXIteGwsIC5jb250YWluZXItbGcsIC5jb250YWluZXItbWQsIC5jb250YWluZXItc20sIC5jb250YWluZXIge1xuICAgIG1heC13aWR0aDogMTQ0MHB4O1xuICB9XG59XG4ucm93IHtcbiAgLS1icy1ndXR0ZXIteDogMS42MjVyZW07XG4gIC0tYnMtZ3V0dGVyLXk6IDA7XG4gIGRpc3BsYXk6IGZsZXg7XG4gIGZsZXgtd3JhcDogd3JhcDtcbiAgbWFyZ2luLXRvcDogY2FsYygtMSAqIHZhcigtLWJzLWd1dHRlci15KSk7XG4gIG1hcmdpbi1yaWdodDogY2FsYygtMC41ICogdmFyKC0tYnMtZ3V0dGVyLXgpKTtcbiAgbWFyZ2luLWxlZnQ6IGNhbGMoLTAuNSAqIHZhcigtLWJzLWd1dHRlci14KSk7XG59XG4ucm93ID4gKiB7XG4gIGZsZXgtc2hyaW5rOiAwO1xuICB3aWR0aDogMTAwJTtcbiAgbWF4LXdpZHRoOiAxMDAlO1xuICBwYWRkaW5nLXJpZ2h0OiBjYWxjKHZhcigtLWJzLWd1dHRlci14KSAqIDAuNSk7XG4gIHBhZGRpbmctbGVmdDogY2FsYyh2YXIoLS1icy1ndXR0ZXIteCkgKiAwLjUpO1xuICBtYXJnaW4tdG9wOiB2YXIoLS1icy1ndXR0ZXIteSk7XG59XG5cbi5jb2wge1xuICBmbGV4OiAxIDAgMCU7XG59XG5cbi5yb3ctY29scy1hdXRvID4gKiB7XG4gIGZsZXg6IDAgMCBhdXRvO1xuICB3aWR0aDogYXV0bztcbn1cblxuLnJvdy1jb2xzLTEgPiAqIHtcbiAgZmxleDogMCAwIGF1dG87XG4gIHdpZHRoOiAxMDAlO1xufVxuXG4ucm93LWNvbHMtMiA+ICoge1xuICBmbGV4OiAwIDAgYXV0bztcbiAgd2lkdGg6IDUwJTtcbn1cblxuLnJvdy1jb2xzLTMgPiAqIHtcbiAgZmxleDogMCAwIGF1dG87XG4gIHdpZHRoOiAzMy4zMzMzMzMzMzMzJTtcbn1cblxuLnJvdy1jb2xzLTQgPiAqIHtcbiAgZmxleDogMCAwIGF1dG87XG4gIHdpZHRoOiAyNSU7XG59XG5cbi5yb3ctY29scy01ID4gKiB7XG4gIGZsZXg6IDAgMCBhdXRvO1xuICB3aWR0aDogMjAlO1xufVxuXG4ucm93LWNvbHMtNiA+ICoge1xuICBmbGV4OiAwIDAgYXV0bztcbiAgd2lkdGg6IDE2LjY2NjY2NjY2NjclO1xufVxuXG4uY29sLWF1dG8ge1xuICBmbGV4OiAwIDAgYXV0bztcbiAgd2lkdGg6IGF1dG87XG59XG5cbi5jb2wtMSB7XG4gIGZsZXg6IDAgMCBhdXRvO1xuICB3aWR0aDogOC4zMzMzMzMzMyU7XG59XG5cbi5jb2wtMiB7XG4gIGZsZXg6IDAgMCBhdXRvO1xuICB3aWR0aDogMTYuNjY2NjY2NjclO1xufVxuXG4uY29sLTMge1xuICBmbGV4OiAwIDAgYXV0bztcbiAgd2lkdGg6IDI1JTtcbn1cblxuLmNvbC00IHtcbiAgZmxleDogMCAwIGF1dG87XG4gIHdpZHRoOiAzMy4zMzMzMzMzMyU7XG59XG5cbi5jb2wtNSB7XG4gIGZsZXg6IDAgMCBhdXRvO1xuICB3aWR0aDogNDEuNjY2NjY2NjclO1xufVxuXG4uY29sLTYge1xuICBmbGV4OiAwIDAgYXV0bztcbiAgd2lkdGg6IDUwJTtcbn1cblxuLmNvbC03IHtcbiAgZmxleDogMCAwIGF1dG87XG4gIHdpZHRoOiA1OC4zMzMzMzMzMyU7XG59XG5cbi5jb2wtOCB7XG4gIGZsZXg6IDAgMCBhdXRvO1xuICB3aWR0aDogNjYuNjY2NjY2NjclO1xufVxuXG4uY29sLTkge1xuICBmbGV4OiAwIDAgYXV0bztcbiAgd2lkdGg6IDc1JTtcbn1cblxuLmNvbC0xMCB7XG4gIGZsZXg6IDAgMCBhdXRvO1xuICB3aWR0aDogODMuMzMzMzMzMzMlO1xufVxuXG4uY29sLTExIHtcbiAgZmxleDogMCAwIGF1dG87XG4gIHdpZHRoOiA5MS42NjY2NjY2NyU7XG59XG5cbi5jb2wtMTIge1xuICBmbGV4OiAwIDAgYXV0bztcbiAgd2lkdGg6IDEwMCU7XG59XG5cbi5vZmZzZXQtMSB7XG4gIG1hcmdpbi1sZWZ0OiA4LjMzMzMzMzMzJTtcbn1cblxuLm9mZnNldC0yIHtcbiAgbWFyZ2luLWxlZnQ6IDE2LjY2NjY2NjY3JTtcbn1cblxuLm9mZnNldC0zIHtcbiAgbWFyZ2luLWxlZnQ6IDI1JTtcbn1cblxuLm9mZnNldC00IHtcbiAgbWFyZ2luLWxlZnQ6IDMzLjMzMzMzMzMzJTtcbn1cblxuLm9mZnNldC01IHtcbiAgbWFyZ2luLWxlZnQ6IDQxLjY2NjY2NjY3JTtcbn1cblxuLm9mZnNldC02IHtcbiAgbWFyZ2luLWxlZnQ6IDUwJTtcbn1cblxuLm9mZnNldC03IHtcbiAgbWFyZ2luLWxlZnQ6IDU4LjMzMzMzMzMzJTtcbn1cblxuLm9mZnNldC04IHtcbiAgbWFyZ2luLWxlZnQ6IDY2LjY2NjY2NjY3JTtcbn1cblxuLm9mZnNldC05IHtcbiAgbWFyZ2luLWxlZnQ6IDc1JTtcbn1cblxuLm9mZnNldC0xMCB7XG4gIG1hcmdpbi1sZWZ0OiA4My4zMzMzMzMzMyU7XG59XG5cbi5vZmZzZXQtMTEge1xuICBtYXJnaW4tbGVmdDogOTEuNjY2NjY2NjclO1xufVxuXG4uZy0wLFxuLmd4LTAge1xuICAtLWJzLWd1dHRlci14OiAwO1xufVxuXG4uZy0wLFxuLmd5LTAge1xuICAtLWJzLWd1dHRlci15OiAwO1xufVxuXG4uZy0xLFxuLmd4LTEge1xuICAtLWJzLWd1dHRlci14OiAwLjI1cmVtO1xufVxuXG4uZy0xLFxuLmd5LTEge1xuICAtLWJzLWd1dHRlci15OiAwLjI1cmVtO1xufVxuXG4uZy0yLFxuLmd4LTIge1xuICAtLWJzLWd1dHRlci14OiAwLjVyZW07XG59XG5cbi5nLTIsXG4uZ3ktMiB7XG4gIC0tYnMtZ3V0dGVyLXk6IDAuNXJlbTtcbn1cblxuLmctMyxcbi5neC0zIHtcbiAgLS1icy1ndXR0ZXIteDogMXJlbTtcbn1cblxuLmctMyxcbi5neS0zIHtcbiAgLS1icy1ndXR0ZXIteTogMXJlbTtcbn1cblxuLmctNCxcbi5neC00IHtcbiAgLS1icy1ndXR0ZXIteDogMS41cmVtO1xufVxuXG4uZy00LFxuLmd5LTQge1xuICAtLWJzLWd1dHRlci15OiAxLjVyZW07XG59XG5cbi5nLTUsXG4uZ3gtNSB7XG4gIC0tYnMtZ3V0dGVyLXg6IDNyZW07XG59XG5cbi5nLTUsXG4uZ3ktNSB7XG4gIC0tYnMtZ3V0dGVyLXk6IDNyZW07XG59XG5cbkBtZWRpYSAobWluLXdpZHRoOiA1NzZweCkge1xuICAuY29sLXNtIHtcbiAgICBmbGV4OiAxIDAgMCU7XG4gIH1cblxuICAucm93LWNvbHMtc20tYXV0byA+ICoge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiBhdXRvO1xuICB9XG5cbiAgLnJvdy1jb2xzLXNtLTEgPiAqIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogMTAwJTtcbiAgfVxuXG4gIC5yb3ctY29scy1zbS0yID4gKiB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDUwJTtcbiAgfVxuXG4gIC5yb3ctY29scy1zbS0zID4gKiB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDMzLjMzMzMzMzMzMzMlO1xuICB9XG5cbiAgLnJvdy1jb2xzLXNtLTQgPiAqIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogMjUlO1xuICB9XG5cbiAgLnJvdy1jb2xzLXNtLTUgPiAqIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogMjAlO1xuICB9XG5cbiAgLnJvdy1jb2xzLXNtLTYgPiAqIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogMTYuNjY2NjY2NjY2NyU7XG4gIH1cblxuICAuY29sLXNtLWF1dG8ge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiBhdXRvO1xuICB9XG5cbiAgLmNvbC1zbS0xIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogOC4zMzMzMzMzMyU7XG4gIH1cblxuICAuY29sLXNtLTIge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiAxNi42NjY2NjY2NyU7XG4gIH1cblxuICAuY29sLXNtLTMge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiAyNSU7XG4gIH1cblxuICAuY29sLXNtLTQge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiAzMy4zMzMzMzMzMyU7XG4gIH1cblxuICAuY29sLXNtLTUge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiA0MS42NjY2NjY2NyU7XG4gIH1cblxuICAuY29sLXNtLTYge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiA1MCU7XG4gIH1cblxuICAuY29sLXNtLTcge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiA1OC4zMzMzMzMzMyU7XG4gIH1cblxuICAuY29sLXNtLTgge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiA2Ni42NjY2NjY2NyU7XG4gIH1cblxuICAuY29sLXNtLTkge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiA3NSU7XG4gIH1cblxuICAuY29sLXNtLTEwIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogODMuMzMzMzMzMzMlO1xuICB9XG5cbiAgLmNvbC1zbS0xMSB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDkxLjY2NjY2NjY3JTtcbiAgfVxuXG4gIC5jb2wtc20tMTIge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiAxMDAlO1xuICB9XG5cbiAgLm9mZnNldC1zbS0wIHtcbiAgICBtYXJnaW4tbGVmdDogMDtcbiAgfVxuXG4gIC5vZmZzZXQtc20tMSB7XG4gICAgbWFyZ2luLWxlZnQ6IDguMzMzMzMzMzMlO1xuICB9XG5cbiAgLm9mZnNldC1zbS0yIHtcbiAgICBtYXJnaW4tbGVmdDogMTYuNjY2NjY2NjclO1xuICB9XG5cbiAgLm9mZnNldC1zbS0zIHtcbiAgICBtYXJnaW4tbGVmdDogMjUlO1xuICB9XG5cbiAgLm9mZnNldC1zbS00IHtcbiAgICBtYXJnaW4tbGVmdDogMzMuMzMzMzMzMzMlO1xuICB9XG5cbiAgLm9mZnNldC1zbS01IHtcbiAgICBtYXJnaW4tbGVmdDogNDEuNjY2NjY2NjclO1xuICB9XG5cbiAgLm9mZnNldC1zbS02IHtcbiAgICBtYXJnaW4tbGVmdDogNTAlO1xuICB9XG5cbiAgLm9mZnNldC1zbS03IHtcbiAgICBtYXJnaW4tbGVmdDogNTguMzMzMzMzMzMlO1xuICB9XG5cbiAgLm9mZnNldC1zbS04IHtcbiAgICBtYXJnaW4tbGVmdDogNjYuNjY2NjY2NjclO1xuICB9XG5cbiAgLm9mZnNldC1zbS05IHtcbiAgICBtYXJnaW4tbGVmdDogNzUlO1xuICB9XG5cbiAgLm9mZnNldC1zbS0xMCB7XG4gICAgbWFyZ2luLWxlZnQ6IDgzLjMzMzMzMzMzJTtcbiAgfVxuXG4gIC5vZmZzZXQtc20tMTEge1xuICAgIG1hcmdpbi1sZWZ0OiA5MS42NjY2NjY2NyU7XG4gIH1cblxuICAuZy1zbS0wLFxuLmd4LXNtLTAge1xuICAgIC0tYnMtZ3V0dGVyLXg6IDA7XG4gIH1cblxuICAuZy1zbS0wLFxuLmd5LXNtLTAge1xuICAgIC0tYnMtZ3V0dGVyLXk6IDA7XG4gIH1cblxuICAuZy1zbS0xLFxuLmd4LXNtLTEge1xuICAgIC0tYnMtZ3V0dGVyLXg6IDAuMjVyZW07XG4gIH1cblxuICAuZy1zbS0xLFxuLmd5LXNtLTEge1xuICAgIC0tYnMtZ3V0dGVyLXk6IDAuMjVyZW07XG4gIH1cblxuICAuZy1zbS0yLFxuLmd4LXNtLTIge1xuICAgIC0tYnMtZ3V0dGVyLXg6IDAuNXJlbTtcbiAgfVxuXG4gIC5nLXNtLTIsXG4uZ3ktc20tMiB7XG4gICAgLS1icy1ndXR0ZXIteTogMC41cmVtO1xuICB9XG5cbiAgLmctc20tMyxcbi5neC1zbS0zIHtcbiAgICAtLWJzLWd1dHRlci14OiAxcmVtO1xuICB9XG5cbiAgLmctc20tMyxcbi5neS1zbS0zIHtcbiAgICAtLWJzLWd1dHRlci15OiAxcmVtO1xuICB9XG5cbiAgLmctc20tNCxcbi5neC1zbS00IHtcbiAgICAtLWJzLWd1dHRlci14OiAxLjVyZW07XG4gIH1cblxuICAuZy1zbS00LFxuLmd5LXNtLTQge1xuICAgIC0tYnMtZ3V0dGVyLXk6IDEuNXJlbTtcbiAgfVxuXG4gIC5nLXNtLTUsXG4uZ3gtc20tNSB7XG4gICAgLS1icy1ndXR0ZXIteDogM3JlbTtcbiAgfVxuXG4gIC5nLXNtLTUsXG4uZ3ktc20tNSB7XG4gICAgLS1icy1ndXR0ZXIteTogM3JlbTtcbiAgfVxufVxuQG1lZGlhIChtaW4td2lkdGg6IDc2OHB4KSB7XG4gIC5jb2wtbWQge1xuICAgIGZsZXg6IDEgMCAwJTtcbiAgfVxuXG4gIC5yb3ctY29scy1tZC1hdXRvID4gKiB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IGF1dG87XG4gIH1cblxuICAucm93LWNvbHMtbWQtMSA+ICoge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiAxMDAlO1xuICB9XG5cbiAgLnJvdy1jb2xzLW1kLTIgPiAqIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogNTAlO1xuICB9XG5cbiAgLnJvdy1jb2xzLW1kLTMgPiAqIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogMzMuMzMzMzMzMzMzMyU7XG4gIH1cblxuICAucm93LWNvbHMtbWQtNCA+ICoge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiAyNSU7XG4gIH1cblxuICAucm93LWNvbHMtbWQtNSA+ICoge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiAyMCU7XG4gIH1cblxuICAucm93LWNvbHMtbWQtNiA+ICoge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiAxNi42NjY2NjY2NjY3JTtcbiAgfVxuXG4gIC5jb2wtbWQtYXV0byB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IGF1dG87XG4gIH1cblxuICAuY29sLW1kLTEge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiA4LjMzMzMzMzMzJTtcbiAgfVxuXG4gIC5jb2wtbWQtMiB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDE2LjY2NjY2NjY3JTtcbiAgfVxuXG4gIC5jb2wtbWQtMyB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDI1JTtcbiAgfVxuXG4gIC5jb2wtbWQtNCB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDMzLjMzMzMzMzMzJTtcbiAgfVxuXG4gIC5jb2wtbWQtNSB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDQxLjY2NjY2NjY3JTtcbiAgfVxuXG4gIC5jb2wtbWQtNiB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDUwJTtcbiAgfVxuXG4gIC5jb2wtbWQtNyB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDU4LjMzMzMzMzMzJTtcbiAgfVxuXG4gIC5jb2wtbWQtOCB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDY2LjY2NjY2NjY3JTtcbiAgfVxuXG4gIC5jb2wtbWQtOSB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDc1JTtcbiAgfVxuXG4gIC5jb2wtbWQtMTAge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiA4My4zMzMzMzMzMyU7XG4gIH1cblxuICAuY29sLW1kLTExIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogOTEuNjY2NjY2NjclO1xuICB9XG5cbiAgLmNvbC1tZC0xMiB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDEwMCU7XG4gIH1cblxuICAub2Zmc2V0LW1kLTAge1xuICAgIG1hcmdpbi1sZWZ0OiAwO1xuICB9XG5cbiAgLm9mZnNldC1tZC0xIHtcbiAgICBtYXJnaW4tbGVmdDogOC4zMzMzMzMzMyU7XG4gIH1cblxuICAub2Zmc2V0LW1kLTIge1xuICAgIG1hcmdpbi1sZWZ0OiAxNi42NjY2NjY2NyU7XG4gIH1cblxuICAub2Zmc2V0LW1kLTMge1xuICAgIG1hcmdpbi1sZWZ0OiAyNSU7XG4gIH1cblxuICAub2Zmc2V0LW1kLTQge1xuICAgIG1hcmdpbi1sZWZ0OiAzMy4zMzMzMzMzMyU7XG4gIH1cblxuICAub2Zmc2V0LW1kLTUge1xuICAgIG1hcmdpbi1sZWZ0OiA0MS42NjY2NjY2NyU7XG4gIH1cblxuICAub2Zmc2V0LW1kLTYge1xuICAgIG1hcmdpbi1sZWZ0OiA1MCU7XG4gIH1cblxuICAub2Zmc2V0LW1kLTcge1xuICAgIG1hcmdpbi1sZWZ0OiA1OC4zMzMzMzMzMyU7XG4gIH1cblxuICAub2Zmc2V0LW1kLTgge1xuICAgIG1hcmdpbi1sZWZ0OiA2Ni42NjY2NjY2NyU7XG4gIH1cblxuICAub2Zmc2V0LW1kLTkge1xuICAgIG1hcmdpbi1sZWZ0OiA3NSU7XG4gIH1cblxuICAub2Zmc2V0LW1kLTEwIHtcbiAgICBtYXJnaW4tbGVmdDogODMuMzMzMzMzMzMlO1xuICB9XG5cbiAgLm9mZnNldC1tZC0xMSB7XG4gICAgbWFyZ2luLWxlZnQ6IDkxLjY2NjY2NjY3JTtcbiAgfVxuXG4gIC5nLW1kLTAsXG4uZ3gtbWQtMCB7XG4gICAgLS1icy1ndXR0ZXIteDogMDtcbiAgfVxuXG4gIC5nLW1kLTAsXG4uZ3ktbWQtMCB7XG4gICAgLS1icy1ndXR0ZXIteTogMDtcbiAgfVxuXG4gIC5nLW1kLTEsXG4uZ3gtbWQtMSB7XG4gICAgLS1icy1ndXR0ZXIteDogMC4yNXJlbTtcbiAgfVxuXG4gIC5nLW1kLTEsXG4uZ3ktbWQtMSB7XG4gICAgLS1icy1ndXR0ZXIteTogMC4yNXJlbTtcbiAgfVxuXG4gIC5nLW1kLTIsXG4uZ3gtbWQtMiB7XG4gICAgLS1icy1ndXR0ZXIteDogMC41cmVtO1xuICB9XG5cbiAgLmctbWQtMixcbi5neS1tZC0yIHtcbiAgICAtLWJzLWd1dHRlci15OiAwLjVyZW07XG4gIH1cblxuICAuZy1tZC0zLFxuLmd4LW1kLTMge1xuICAgIC0tYnMtZ3V0dGVyLXg6IDFyZW07XG4gIH1cblxuICAuZy1tZC0zLFxuLmd5LW1kLTMge1xuICAgIC0tYnMtZ3V0dGVyLXk6IDFyZW07XG4gIH1cblxuICAuZy1tZC00LFxuLmd4LW1kLTQge1xuICAgIC0tYnMtZ3V0dGVyLXg6IDEuNXJlbTtcbiAgfVxuXG4gIC5nLW1kLTQsXG4uZ3ktbWQtNCB7XG4gICAgLS1icy1ndXR0ZXIteTogMS41cmVtO1xuICB9XG5cbiAgLmctbWQtNSxcbi5neC1tZC01IHtcbiAgICAtLWJzLWd1dHRlci14OiAzcmVtO1xuICB9XG5cbiAgLmctbWQtNSxcbi5neS1tZC01IHtcbiAgICAtLWJzLWd1dHRlci15OiAzcmVtO1xuICB9XG59XG5AbWVkaWEgKG1pbi13aWR0aDogOTkycHgpIHtcbiAgLmNvbC1sZyB7XG4gICAgZmxleDogMSAwIDAlO1xuICB9XG5cbiAgLnJvdy1jb2xzLWxnLWF1dG8gPiAqIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogYXV0bztcbiAgfVxuXG4gIC5yb3ctY29scy1sZy0xID4gKiB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDEwMCU7XG4gIH1cblxuICAucm93LWNvbHMtbGctMiA+ICoge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiA1MCU7XG4gIH1cblxuICAucm93LWNvbHMtbGctMyA+ICoge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiAzMy4zMzMzMzMzMzMzJTtcbiAgfVxuXG4gIC5yb3ctY29scy1sZy00ID4gKiB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDI1JTtcbiAgfVxuXG4gIC5yb3ctY29scy1sZy01ID4gKiB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDIwJTtcbiAgfVxuXG4gIC5yb3ctY29scy1sZy02ID4gKiB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDE2LjY2NjY2NjY2NjclO1xuICB9XG5cbiAgLmNvbC1sZy1hdXRvIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogYXV0bztcbiAgfVxuXG4gIC5jb2wtbGctMSB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDguMzMzMzMzMzMlO1xuICB9XG5cbiAgLmNvbC1sZy0yIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogMTYuNjY2NjY2NjclO1xuICB9XG5cbiAgLmNvbC1sZy0zIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogMjUlO1xuICB9XG5cbiAgLmNvbC1sZy00IHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogMzMuMzMzMzMzMzMlO1xuICB9XG5cbiAgLmNvbC1sZy01IHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogNDEuNjY2NjY2NjclO1xuICB9XG5cbiAgLmNvbC1sZy02IHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogNTAlO1xuICB9XG5cbiAgLmNvbC1sZy03IHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogNTguMzMzMzMzMzMlO1xuICB9XG5cbiAgLmNvbC1sZy04IHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogNjYuNjY2NjY2NjclO1xuICB9XG5cbiAgLmNvbC1sZy05IHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogNzUlO1xuICB9XG5cbiAgLmNvbC1sZy0xMCB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDgzLjMzMzMzMzMzJTtcbiAgfVxuXG4gIC5jb2wtbGctMTEge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiA5MS42NjY2NjY2NyU7XG4gIH1cblxuICAuY29sLWxnLTEyIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogMTAwJTtcbiAgfVxuXG4gIC5vZmZzZXQtbGctMCB7XG4gICAgbWFyZ2luLWxlZnQ6IDA7XG4gIH1cblxuICAub2Zmc2V0LWxnLTEge1xuICAgIG1hcmdpbi1sZWZ0OiA4LjMzMzMzMzMzJTtcbiAgfVxuXG4gIC5vZmZzZXQtbGctMiB7XG4gICAgbWFyZ2luLWxlZnQ6IDE2LjY2NjY2NjY3JTtcbiAgfVxuXG4gIC5vZmZzZXQtbGctMyB7XG4gICAgbWFyZ2luLWxlZnQ6IDI1JTtcbiAgfVxuXG4gIC5vZmZzZXQtbGctNCB7XG4gICAgbWFyZ2luLWxlZnQ6IDMzLjMzMzMzMzMzJTtcbiAgfVxuXG4gIC5vZmZzZXQtbGctNSB7XG4gICAgbWFyZ2luLWxlZnQ6IDQxLjY2NjY2NjY3JTtcbiAgfVxuXG4gIC5vZmZzZXQtbGctNiB7XG4gICAgbWFyZ2luLWxlZnQ6IDUwJTtcbiAgfVxuXG4gIC5vZmZzZXQtbGctNyB7XG4gICAgbWFyZ2luLWxlZnQ6IDU4LjMzMzMzMzMzJTtcbiAgfVxuXG4gIC5vZmZzZXQtbGctOCB7XG4gICAgbWFyZ2luLWxlZnQ6IDY2LjY2NjY2NjY3JTtcbiAgfVxuXG4gIC5vZmZzZXQtbGctOSB7XG4gICAgbWFyZ2luLWxlZnQ6IDc1JTtcbiAgfVxuXG4gIC5vZmZzZXQtbGctMTAge1xuICAgIG1hcmdpbi1sZWZ0OiA4My4zMzMzMzMzMyU7XG4gIH1cblxuICAub2Zmc2V0LWxnLTExIHtcbiAgICBtYXJnaW4tbGVmdDogOTEuNjY2NjY2NjclO1xuICB9XG5cbiAgLmctbGctMCxcbi5neC1sZy0wIHtcbiAgICAtLWJzLWd1dHRlci14OiAwO1xuICB9XG5cbiAgLmctbGctMCxcbi5neS1sZy0wIHtcbiAgICAtLWJzLWd1dHRlci15OiAwO1xuICB9XG5cbiAgLmctbGctMSxcbi5neC1sZy0xIHtcbiAgICAtLWJzLWd1dHRlci14OiAwLjI1cmVtO1xuICB9XG5cbiAgLmctbGctMSxcbi5neS1sZy0xIHtcbiAgICAtLWJzLWd1dHRlci15OiAwLjI1cmVtO1xuICB9XG5cbiAgLmctbGctMixcbi5neC1sZy0yIHtcbiAgICAtLWJzLWd1dHRlci14OiAwLjVyZW07XG4gIH1cblxuICAuZy1sZy0yLFxuLmd5LWxnLTIge1xuICAgIC0tYnMtZ3V0dGVyLXk6IDAuNXJlbTtcbiAgfVxuXG4gIC5nLWxnLTMsXG4uZ3gtbGctMyB7XG4gICAgLS1icy1ndXR0ZXIteDogMXJlbTtcbiAgfVxuXG4gIC5nLWxnLTMsXG4uZ3ktbGctMyB7XG4gICAgLS1icy1ndXR0ZXIteTogMXJlbTtcbiAgfVxuXG4gIC5nLWxnLTQsXG4uZ3gtbGctNCB7XG4gICAgLS1icy1ndXR0ZXIteDogMS41cmVtO1xuICB9XG5cbiAgLmctbGctNCxcbi5neS1sZy00IHtcbiAgICAtLWJzLWd1dHRlci15OiAxLjVyZW07XG4gIH1cblxuICAuZy1sZy01LFxuLmd4LWxnLTUge1xuICAgIC0tYnMtZ3V0dGVyLXg6IDNyZW07XG4gIH1cblxuICAuZy1sZy01LFxuLmd5LWxnLTUge1xuICAgIC0tYnMtZ3V0dGVyLXk6IDNyZW07XG4gIH1cbn1cbkBtZWRpYSAobWluLXdpZHRoOiAxMjAwcHgpIHtcbiAgLmNvbC14bCB7XG4gICAgZmxleDogMSAwIDAlO1xuICB9XG5cbiAgLnJvdy1jb2xzLXhsLWF1dG8gPiAqIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogYXV0bztcbiAgfVxuXG4gIC5yb3ctY29scy14bC0xID4gKiB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDEwMCU7XG4gIH1cblxuICAucm93LWNvbHMteGwtMiA+ICoge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiA1MCU7XG4gIH1cblxuICAucm93LWNvbHMteGwtMyA+ICoge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiAzMy4zMzMzMzMzMzMzJTtcbiAgfVxuXG4gIC5yb3ctY29scy14bC00ID4gKiB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDI1JTtcbiAgfVxuXG4gIC5yb3ctY29scy14bC01ID4gKiB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDIwJTtcbiAgfVxuXG4gIC5yb3ctY29scy14bC02ID4gKiB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDE2LjY2NjY2NjY2NjclO1xuICB9XG5cbiAgLmNvbC14bC1hdXRvIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogYXV0bztcbiAgfVxuXG4gIC5jb2wteGwtMSB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDguMzMzMzMzMzMlO1xuICB9XG5cbiAgLmNvbC14bC0yIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogMTYuNjY2NjY2NjclO1xuICB9XG5cbiAgLmNvbC14bC0zIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogMjUlO1xuICB9XG5cbiAgLmNvbC14bC00IHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogMzMuMzMzMzMzMzMlO1xuICB9XG5cbiAgLmNvbC14bC01IHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogNDEuNjY2NjY2NjclO1xuICB9XG5cbiAgLmNvbC14bC02IHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogNTAlO1xuICB9XG5cbiAgLmNvbC14bC03IHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogNTguMzMzMzMzMzMlO1xuICB9XG5cbiAgLmNvbC14bC04IHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogNjYuNjY2NjY2NjclO1xuICB9XG5cbiAgLmNvbC14bC05IHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogNzUlO1xuICB9XG5cbiAgLmNvbC14bC0xMCB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDgzLjMzMzMzMzMzJTtcbiAgfVxuXG4gIC5jb2wteGwtMTEge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiA5MS42NjY2NjY2NyU7XG4gIH1cblxuICAuY29sLXhsLTEyIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogMTAwJTtcbiAgfVxuXG4gIC5vZmZzZXQteGwtMCB7XG4gICAgbWFyZ2luLWxlZnQ6IDA7XG4gIH1cblxuICAub2Zmc2V0LXhsLTEge1xuICAgIG1hcmdpbi1sZWZ0OiA4LjMzMzMzMzMzJTtcbiAgfVxuXG4gIC5vZmZzZXQteGwtMiB7XG4gICAgbWFyZ2luLWxlZnQ6IDE2LjY2NjY2NjY3JTtcbiAgfVxuXG4gIC5vZmZzZXQteGwtMyB7XG4gICAgbWFyZ2luLWxlZnQ6IDI1JTtcbiAgfVxuXG4gIC5vZmZzZXQteGwtNCB7XG4gICAgbWFyZ2luLWxlZnQ6IDMzLjMzMzMzMzMzJTtcbiAgfVxuXG4gIC5vZmZzZXQteGwtNSB7XG4gICAgbWFyZ2luLWxlZnQ6IDQxLjY2NjY2NjY3JTtcbiAgfVxuXG4gIC5vZmZzZXQteGwtNiB7XG4gICAgbWFyZ2luLWxlZnQ6IDUwJTtcbiAgfVxuXG4gIC5vZmZzZXQteGwtNyB7XG4gICAgbWFyZ2luLWxlZnQ6IDU4LjMzMzMzMzMzJTtcbiAgfVxuXG4gIC5vZmZzZXQteGwtOCB7XG4gICAgbWFyZ2luLWxlZnQ6IDY2LjY2NjY2NjY3JTtcbiAgfVxuXG4gIC5vZmZzZXQteGwtOSB7XG4gICAgbWFyZ2luLWxlZnQ6IDc1JTtcbiAgfVxuXG4gIC5vZmZzZXQteGwtMTAge1xuICAgIG1hcmdpbi1sZWZ0OiA4My4zMzMzMzMzMyU7XG4gIH1cblxuICAub2Zmc2V0LXhsLTExIHtcbiAgICBtYXJnaW4tbGVmdDogOTEuNjY2NjY2NjclO1xuICB9XG5cbiAgLmcteGwtMCxcbi5neC14bC0wIHtcbiAgICAtLWJzLWd1dHRlci14OiAwO1xuICB9XG5cbiAgLmcteGwtMCxcbi5neS14bC0wIHtcbiAgICAtLWJzLWd1dHRlci15OiAwO1xuICB9XG5cbiAgLmcteGwtMSxcbi5neC14bC0xIHtcbiAgICAtLWJzLWd1dHRlci14OiAwLjI1cmVtO1xuICB9XG5cbiAgLmcteGwtMSxcbi5neS14bC0xIHtcbiAgICAtLWJzLWd1dHRlci15OiAwLjI1cmVtO1xuICB9XG5cbiAgLmcteGwtMixcbi5neC14bC0yIHtcbiAgICAtLWJzLWd1dHRlci14OiAwLjVyZW07XG4gIH1cblxuICAuZy14bC0yLFxuLmd5LXhsLTIge1xuICAgIC0tYnMtZ3V0dGVyLXk6IDAuNXJlbTtcbiAgfVxuXG4gIC5nLXhsLTMsXG4uZ3gteGwtMyB7XG4gICAgLS1icy1ndXR0ZXIteDogMXJlbTtcbiAgfVxuXG4gIC5nLXhsLTMsXG4uZ3kteGwtMyB7XG4gICAgLS1icy1ndXR0ZXIteTogMXJlbTtcbiAgfVxuXG4gIC5nLXhsLTQsXG4uZ3gteGwtNCB7XG4gICAgLS1icy1ndXR0ZXIteDogMS41cmVtO1xuICB9XG5cbiAgLmcteGwtNCxcbi5neS14bC00IHtcbiAgICAtLWJzLWd1dHRlci15OiAxLjVyZW07XG4gIH1cblxuICAuZy14bC01LFxuLmd4LXhsLTUge1xuICAgIC0tYnMtZ3V0dGVyLXg6IDNyZW07XG4gIH1cblxuICAuZy14bC01LFxuLmd5LXhsLTUge1xuICAgIC0tYnMtZ3V0dGVyLXk6IDNyZW07XG4gIH1cbn1cbkBtZWRpYSAobWluLXdpZHRoOiAxNDAwcHgpIHtcbiAgLmNvbC14eGwge1xuICAgIGZsZXg6IDEgMCAwJTtcbiAgfVxuXG4gIC5yb3ctY29scy14eGwtYXV0byA+ICoge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiBhdXRvO1xuICB9XG5cbiAgLnJvdy1jb2xzLXh4bC0xID4gKiB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDEwMCU7XG4gIH1cblxuICAucm93LWNvbHMteHhsLTIgPiAqIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogNTAlO1xuICB9XG5cbiAgLnJvdy1jb2xzLXh4bC0zID4gKiB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDMzLjMzMzMzMzMzMzMlO1xuICB9XG5cbiAgLnJvdy1jb2xzLXh4bC00ID4gKiB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDI1JTtcbiAgfVxuXG4gIC5yb3ctY29scy14eGwtNSA+ICoge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiAyMCU7XG4gIH1cblxuICAucm93LWNvbHMteHhsLTYgPiAqIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogMTYuNjY2NjY2NjY2NyU7XG4gIH1cblxuICAuY29sLXh4bC1hdXRvIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogYXV0bztcbiAgfVxuXG4gIC5jb2wteHhsLTEge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiA4LjMzMzMzMzMzJTtcbiAgfVxuXG4gIC5jb2wteHhsLTIge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiAxNi42NjY2NjY2NyU7XG4gIH1cblxuICAuY29sLXh4bC0zIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogMjUlO1xuICB9XG5cbiAgLmNvbC14eGwtNCB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDMzLjMzMzMzMzMzJTtcbiAgfVxuXG4gIC5jb2wteHhsLTUge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiA0MS42NjY2NjY2NyU7XG4gIH1cblxuICAuY29sLXh4bC02IHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogNTAlO1xuICB9XG5cbiAgLmNvbC14eGwtNyB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDU4LjMzMzMzMzMzJTtcbiAgfVxuXG4gIC5jb2wteHhsLTgge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiA2Ni42NjY2NjY2NyU7XG4gIH1cblxuICAuY29sLXh4bC05IHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogNzUlO1xuICB9XG5cbiAgLmNvbC14eGwtMTAge1xuICAgIGZsZXg6IDAgMCBhdXRvO1xuICAgIHdpZHRoOiA4My4zMzMzMzMzMyU7XG4gIH1cblxuICAuY29sLXh4bC0xMSB7XG4gICAgZmxleDogMCAwIGF1dG87XG4gICAgd2lkdGg6IDkxLjY2NjY2NjY3JTtcbiAgfVxuXG4gIC5jb2wteHhsLTEyIHtcbiAgICBmbGV4OiAwIDAgYXV0bztcbiAgICB3aWR0aDogMTAwJTtcbiAgfVxuXG4gIC5vZmZzZXQteHhsLTAge1xuICAgIG1hcmdpbi1sZWZ0OiAwO1xuICB9XG5cbiAgLm9mZnNldC14eGwtMSB7XG4gICAgbWFyZ2luLWxlZnQ6IDguMzMzMzMzMzMlO1xuICB9XG5cbiAgLm9mZnNldC14eGwtMiB7XG4gICAgbWFyZ2luLWxlZnQ6IDE2LjY2NjY2NjY3JTtcbiAgfVxuXG4gIC5vZmZzZXQteHhsLTMge1xuICAgIG1hcmdpbi1sZWZ0OiAyNSU7XG4gIH1cblxuICAub2Zmc2V0LXh4bC00IHtcbiAgICBtYXJnaW4tbGVmdDogMzMuMzMzMzMzMzMlO1xuICB9XG5cbiAgLm9mZnNldC14eGwtNSB7XG4gICAgbWFyZ2luLWxlZnQ6IDQxLjY2NjY2NjY3JTtcbiAgfVxuXG4gIC5vZmZzZXQteHhsLTYge1xuICAgIG1hcmdpbi1sZWZ0OiA1MCU7XG4gIH1cblxuICAub2Zmc2V0LXh4bC03IHtcbiAgICBtYXJnaW4tbGVmdDogNTguMzMzMzMzMzMlO1xuICB9XG5cbiAgLm9mZnNldC14eGwtOCB7XG4gICAgbWFyZ2luLWxlZnQ6IDY2LjY2NjY2NjY3JTtcbiAgfVxuXG4gIC5vZmZzZXQteHhsLTkge1xuICAgIG1hcmdpbi1sZWZ0OiA3NSU7XG4gIH1cblxuICAub2Zmc2V0LXh4bC0xMCB7XG4gICAgbWFyZ2luLWxlZnQ6IDgzLjMzMzMzMzMzJTtcbiAgfVxuXG4gIC5vZmZzZXQteHhsLTExIHtcbiAgICBtYXJnaW4tbGVmdDogOTEuNjY2NjY2NjclO1xuICB9XG5cbiAgLmcteHhsLTAsXG4uZ3gteHhsLTAge1xuICAgIC0tYnMtZ3V0dGVyLXg6IDA7XG4gIH1cblxuICAuZy14eGwtMCxcbi5neS14eGwtMCB7XG4gICAgLS1icy1ndXR0ZXIteTogMDtcbiAgfVxuXG4gIC5nLXh4bC0xLFxuLmd4LXh4bC0xIHtcbiAgICAtLWJzLWd1dHRlci14OiAwLjI1cmVtO1xuICB9XG5cbiAgLmcteHhsLTEsXG4uZ3kteHhsLTEge1xuICAgIC0tYnMtZ3V0dGVyLXk6IDAuMjVyZW07XG4gIH1cblxuICAuZy14eGwtMixcbi5neC14eGwtMiB7XG4gICAgLS1icy1ndXR0ZXIteDogMC41cmVtO1xuICB9XG5cbiAgLmcteHhsLTIsXG4uZ3kteHhsLTIge1xuICAgIC0tYnMtZ3V0dGVyLXk6IDAuNXJlbTtcbiAgfVxuXG4gIC5nLXh4bC0zLFxuLmd4LXh4bC0zIHtcbiAgICAtLWJzLWd1dHRlci14OiAxcmVtO1xuICB9XG5cbiAgLmcteHhsLTMsXG4uZ3kteHhsLTMge1xuICAgIC0tYnMtZ3V0dGVyLXk6IDFyZW07XG4gIH1cblxuICAuZy14eGwtNCxcbi5neC14eGwtNCB7XG4gICAgLS1icy1ndXR0ZXIteDogMS41cmVtO1xuICB9XG5cbiAgLmcteHhsLTQsXG4uZ3kteHhsLTQge1xuICAgIC0tYnMtZ3V0dGVyLXk6IDEuNXJlbTtcbiAgfVxuXG4gIC5nLXh4bC01LFxuLmd4LXh4bC01IHtcbiAgICAtLWJzLWd1dHRlci14OiAzcmVtO1xuICB9XG5cbiAgLmcteHhsLTUsXG4uZ3kteHhsLTUge1xuICAgIC0tYnMtZ3V0dGVyLXk6IDNyZW07XG4gIH1cbn1cbi50YWJsZSB7XG4gIC0tYnMtdGFibGUtYmc6IHRyYW5zcGFyZW50O1xuICAtLWJzLXRhYmxlLWFjY2VudC1iZzogdHJhbnNwYXJlbnQ7XG4gIC0tYnMtdGFibGUtc3RyaXBlZC1jb2xvcjogIzY5N2E4ZDtcbiAgLS1icy10YWJsZS1zdHJpcGVkLWJnOiAjZjlmYWZiO1xuICAtLWJzLXRhYmxlLWFjdGl2ZS1jb2xvcjogIzY5N2E4ZDtcbiAgLS1icy10YWJsZS1hY3RpdmUtYmc6IHJnYmEoNjcsIDg5LCAxMTMsIDAuMSk7XG4gIC0tYnMtdGFibGUtaG92ZXItY29sb3I6ICM2OTdhOGQ7XG4gIC0tYnMtdGFibGUtaG92ZXItYmc6IHJnYmEoNjcsIDg5LCAxMTMsIDAuMDYpO1xuICB3aWR0aDogMTAwJTtcbiAgbWFyZ2luLWJvdHRvbTogMXJlbTtcbiAgY29sb3I6ICM2OTdhOGQ7XG4gIHZlcnRpY2FsLWFsaWduOiBtaWRkbGU7XG4gIGJvcmRlci1jb2xvcjogI2Q5ZGVlMztcbn1cbi50YWJsZSA+IDpub3QoY2FwdGlvbikgPiAqID4gKiB7XG4gIHBhZGRpbmc6IDAuNjI1cmVtIDEuMjVyZW07XG4gIGJhY2tncm91bmQtY29sb3I6IHZhcigtLWJzLXRhYmxlLWJnKTtcbiAgYm9yZGVyLWJvdHRvbS13aWR0aDogMXB4O1xuICBib3gtc2hhZG93OiBpbnNldCAwIDAgMCA5OTk5cHggdmFyKC0tYnMtdGFibGUtYWNjZW50LWJnKTtcbn1cbi50YWJsZSA+IHRib2R5IHtcbiAgdmVydGljYWwtYWxpZ246IGluaGVyaXQ7XG59XG4udGFibGUgPiB0aGVhZCB7XG4gIHZlcnRpY2FsLWFsaWduOiBib3R0b207XG59XG4udGFibGUgPiA6bm90KDpmaXJzdC1jaGlsZCkge1xuICBib3JkZXItdG9wOiAycHggc29saWQgI2Q5ZGVlMztcbn1cblxuLmNhcHRpb24tdG9wIHtcbiAgY2FwdGlvbi1zaWRlOiB0b3A7XG59XG5cbi50YWJsZS1zbSA+IDpub3QoY2FwdGlvbikgPiAqID4gKiB7XG4gIHBhZGRpbmc6IDAuMzEyNXJlbSAwLjYyNXJlbTtcbn1cblxuLnRhYmxlLWJvcmRlcmVkID4gOm5vdChjYXB0aW9uKSA+ICoge1xuICBib3JkZXItd2lkdGg6IDFweCAwO1xufVxuLnRhYmxlLWJvcmRlcmVkID4gOm5vdChjYXB0aW9uKSA+ICogPiAqIHtcbiAgYm9yZGVyLXdpZHRoOiAwIDFweDtcbn1cblxuLnRhYmxlLWJvcmRlcmxlc3MgPiA6bm90KGNhcHRpb24pID4gKiA+ICoge1xuICBib3JkZXItYm90dG9tLXdpZHRoOiAwO1xufVxuLnRhYmxlLWJvcmRlcmxlc3MgPiA6bm90KDpmaXJzdC1jaGlsZCkge1xuICBib3JkZXItdG9wLXdpZHRoOiAwO1xufVxuXG4udGFibGUtc3RyaXBlZCA+IHRib2R5ID4gdHI6bnRoLW9mLXR5cGUob2RkKSA+ICoge1xuICAtLWJzLXRhYmxlLWFjY2VudC1iZzogdmFyKC0tYnMtdGFibGUtc3RyaXBlZC1iZyk7XG4gIGNvbG9yOiB2YXIoLS1icy10YWJsZS1zdHJpcGVkLWNvbG9yKTtcbn1cblxuLnRhYmxlLWFjdGl2ZSB7XG4gIC0tYnMtdGFibGUtYWNjZW50LWJnOiB2YXIoLS1icy10YWJsZS1hY3RpdmUtYmcpO1xuICBjb2xvcjogdmFyKC0tYnMtdGFibGUtYWN0aXZlLWNvbG9yKTtcbn1cblxuLnRhYmxlLWhvdmVyID4gdGJvZHkgPiB0cjpob3ZlciA+ICoge1xuICAtLWJzLXRhYmxlLWFjY2VudC1iZzogdmFyKC0tYnMtdGFibGUtaG92ZXItYmcpO1xuICBjb2xvcjogdmFyKC0tYnMtdGFibGUtaG92ZXItY29sb3IpO1xufVxuXG4udGFibGUtcHJpbWFyeSB7XG4gIC0tYnMtdGFibGUtYmc6ICNlMWUyZmY7XG4gIC0tYnMtdGFibGUtc3RyaXBlZC1iZzogI2RjZGVmYjtcbiAgLS1icy10YWJsZS1zdHJpcGVkLWNvbG9yOiAjNDM1OTcxO1xuICAtLWJzLXRhYmxlLWFjdGl2ZS1iZzogI2QxZDRmMTtcbiAgLS1icy10YWJsZS1hY3RpdmUtY29sb3I6ICM0MzU5NzE7XG4gIC0tYnMtdGFibGUtaG92ZXItYmc6ICNkOGRhZjY7XG4gIC0tYnMtdGFibGUtaG92ZXItY29sb3I6ICM0MzU5NzE7XG4gIGNvbG9yOiAjNDM1OTcxO1xuICBib3JkZXItY29sb3I6ICNkMWQ0ZjE7XG59XG5cbi50YWJsZS1zZWNvbmRhcnkge1xuICAtLWJzLXRhYmxlLWJnOiAjZTdlOWVkO1xuICAtLWJzLXRhYmxlLXN0cmlwZWQtYmc6ICNlMmU1ZTk7XG4gIC0tYnMtdGFibGUtc3RyaXBlZC1jb2xvcjogIzQzNTk3MTtcbiAgLS1icy10YWJsZS1hY3RpdmUtYmc6ICNkN2RiZTE7XG4gIC0tYnMtdGFibGUtYWN0aXZlLWNvbG9yOiAjNDM1OTcxO1xuICAtLWJzLXRhYmxlLWhvdmVyLWJnOiAjZGRlMGU2O1xuICAtLWJzLXRhYmxlLWhvdmVyLWNvbG9yOiAjNDM1OTcxO1xuICBjb2xvcjogIzQzNTk3MTtcbiAgYm9yZGVyLWNvbG9yOiAjZDdkYmUxO1xufVxuXG4udGFibGUtc3VjY2VzcyB7XG4gIC0tYnMtdGFibGUtYmc6ICNlM2Y4ZDc7XG4gIC0tYnMtdGFibGUtc3RyaXBlZC1iZzogI2RlZjNkNDtcbiAgLS1icy10YWJsZS1zdHJpcGVkLWNvbG9yOiAjNDM1OTcxO1xuICAtLWJzLXRhYmxlLWFjdGl2ZS1iZzogI2QzZThjZDtcbiAgLS1icy10YWJsZS1hY3RpdmUtY29sb3I6ICM0MzU5NzE7XG4gIC0tYnMtdGFibGUtaG92ZXItYmc6ICNkOWVlZDE7XG4gIC0tYnMtdGFibGUtaG92ZXItY29sb3I6ICM0MzU5NzE7XG4gIGNvbG9yOiAjNDM1OTcxO1xuICBib3JkZXItY29sb3I6ICNkM2U4Y2Q7XG59XG5cbi50YWJsZS1pbmZvIHtcbiAgLS1icy10YWJsZS1iZzogI2NkZjNmYjtcbiAgLS1icy10YWJsZS1zdHJpcGVkLWJnOiAjYzllZWY3O1xuICAtLWJzLXRhYmxlLXN0cmlwZWQtY29sb3I6ICM0MzU5NzE7XG4gIC0tYnMtdGFibGUtYWN0aXZlLWJnOiAjYmZlNGVkO1xuICAtLWJzLXRhYmxlLWFjdGl2ZS1jb2xvcjogIzQzNTk3MTtcbiAgLS1icy10YWJsZS1ob3Zlci1iZzogI2M1ZWFmMztcbiAgLS1icy10YWJsZS1ob3Zlci1jb2xvcjogIzQzNTk3MTtcbiAgY29sb3I6ICM0MzU5NzE7XG4gIGJvcmRlci1jb2xvcjogI2JmZTRlZDtcbn1cblxuLnRhYmxlLXdhcm5pbmcge1xuICAtLWJzLXRhYmxlLWJnOiAjZmZlZWNjO1xuICAtLWJzLXRhYmxlLXN0cmlwZWQtYmc6ICNmOWVhYzk7XG4gIC0tYnMtdGFibGUtc3RyaXBlZC1jb2xvcjogIzQzNTk3MTtcbiAgLS1icy10YWJsZS1hY3RpdmUtYmc6ICNlY2RmYzM7XG4gIC0tYnMtdGFibGUtYWN0aXZlLWNvbG9yOiAjNDM1OTcxO1xuICAtLWJzLXRhYmxlLWhvdmVyLWJnOiAjZjRlNWM3O1xuICAtLWJzLXRhYmxlLWhvdmVyLWNvbG9yOiAjNDM1OTcxO1xuICBjb2xvcjogIzQzNTk3MTtcbiAgYm9yZGVyLWNvbG9yOiAjZWNkZmMzO1xufVxuXG4udGFibGUtZGFuZ2VyIHtcbiAgLS1icy10YWJsZS1iZzogI2ZmZDhkMjtcbiAgLS1icy10YWJsZS1zdHJpcGVkLWJnOiAjZjlkNGNmO1xuICAtLWJzLXRhYmxlLXN0cmlwZWQtY29sb3I6ICM0MzU5NzE7XG4gIC0tYnMtdGFibGUtYWN0aXZlLWJnOiAjZWNjYmM4O1xuICAtLWJzLXRhYmxlLWFjdGl2ZS1jb2xvcjogIzQzNTk3MTtcbiAgLS1icy10YWJsZS1ob3Zlci1iZzogI2Y0ZDBjYztcbiAgLS1icy10YWJsZS1ob3Zlci1jb2xvcjogIzQzNTk3MTtcbiAgY29sb3I6ICM0MzU5NzE7XG4gIGJvcmRlci1jb2xvcjogI2VjY2JjODtcbn1cblxuLnRhYmxlLWxpZ2h0IHtcbiAgLS1icy10YWJsZS1iZzogI2ZjZmRmZDtcbiAgLS1icy10YWJsZS1zdHJpcGVkLWJnOiAjZjZmOGY5O1xuICAtLWJzLXRhYmxlLXN0cmlwZWQtY29sb3I6ICM0MzU5NzE7XG4gIC0tYnMtdGFibGUtYWN0aXZlLWJnOiAjZWFlZGVmO1xuICAtLWJzLXRhYmxlLWFjdGl2ZS1jb2xvcjogIzQzNTk3MTtcbiAgLS1icy10YWJsZS1ob3Zlci1iZzogI2YxZjNmNTtcbiAgLS1icy10YWJsZS1ob3Zlci1jb2xvcjogIzQzNTk3MTtcbiAgY29sb3I6ICM0MzU5NzE7XG4gIGJvcmRlci1jb2xvcjogI2VhZWRlZjtcbn1cblxuLnRhYmxlLWRhcmsge1xuICAtLWJzLXRhYmxlLWJnOiAjMjMzNDQ2O1xuICAtLWJzLXRhYmxlLXN0cmlwZWQtYmc6ICMyYTNhNGM7XG4gIC0tYnMtdGFibGUtc3RyaXBlZC1jb2xvcjogI2ZmZjtcbiAgLS1icy10YWJsZS1hY3RpdmUtYmc6ICMzOTQ4NTk7XG4gIC0tYnMtdGFibGUtYWN0aXZlLWNvbG9yOiAjZmZmO1xuICAtLWJzLXRhYmxlLWhvdmVyLWJnOiAjMzA0MDUxO1xuICAtLWJzLXRhYmxlLWhvdmVyLWNvbG9yOiAjZmZmO1xuICBjb2xvcjogI2ZmZjtcbiAgYm9yZGVyLWNvbG9yOiAjMzk0ODU5O1xufVxuXG4udGFibGUtcmVzcG9uc2l2ZSB7XG4gIG92ZXJmbG93LXg6IGF1dG87XG4gIC13ZWJraXQtb3ZlcmZsb3ctc2Nyb2xsaW5nOiB0b3VjaDtcbn1cblxuQG1lZGlhIChtYXgtd2lkdGg6IDU3NS45OHB4KSB7XG4gIC50YWJsZS1yZXNwb25zaXZlLXNtIHtcbiAgICBvdmVyZmxvdy14OiBhdXRvO1xuICAgIC13ZWJraXQtb3ZlcmZsb3ctc2Nyb2xsaW5nOiB0b3VjaDtcbiAgfVxufVxuQG1lZGlhIChtYXgtd2lkdGg6IDc2Ny45OHB4KSB7XG4gIC50YWJsZS1yZXNwb25zaXZlLW1kIHtcbiAgICBvdmVyZmxvdy14OiBhdXRvO1xuICAgIC13ZWJraXQtb3ZlcmZsb3ctc2Nyb2xsaW5nOiB0b3VjaDtcbiAgfVxufVxuQG1lZGlhIChtYXgtd2lkdGg6IDk5MS45OHB4KSB7XG4gIC50YWJsZS1yZXNwb25zaXZlLWxnIHtcbiAgICBvdmVyZmxvdy14OiBhdXRvO1xuICAgIC13ZWJraXQtb3ZlcmZsb3ctc2Nyb2xsaW5nOiB0b3VjaDtcbiAgfVxufVxuQG1lZGlhIChtYXgtd2lkdGg6IDExOTkuOThweCkge1xuICAudGFibGUtcmVzcG9uc2l2ZS14bCB7XG4gICAgb3ZlcmZsb3cteDogYXV0bztcbiAgICAtd2Via2l0LW92ZXJmbG93LXNjcm9sbGluZzogdG91Y2g7XG4gIH1cbn1cbkBtZWRpYSAobWF4LXdpZHRoOiAxMzk5Ljk4cHgpIHtcbiAgLnRhYmxlLXJlc3BvbnNpdmUteHhsIHtcbiAgICBvdmVyZmxvdy14OiBhdXRvO1xuICAgIC13ZWJraXQtb3ZlcmZsb3ctc2Nyb2xsaW5nOiB0b3VjaDtcbiAgfVxufVxuLmZvcm0tbGFiZWwge1xuICBtYXJnaW4tYm90dG9tOiAwLjVyZW07XG4gIGZvbnQtc2l6ZTogMC43NXJlbTtcbiAgZm9udC13ZWlnaHQ6IDUwMDtcbiAgY29sb3I6ICM1NjZhN2Y7XG59XG5cbi5jb2wtZm9ybS1sYWJlbCB7XG4gIHBhZGRpbmctdG9wOiBjYWxjKDAuNDM3NXJlbSArIDFweCk7XG4gIHBhZGRpbmctYm90dG9tOiBjYWxjKDAuNDM3NXJlbSArIDFweCk7XG4gIG1hcmdpbi1ib3R0b206IDA7XG4gIGZvbnQtc2l6ZTogaW5oZXJpdDtcbiAgZm9udC13ZWlnaHQ6IDUwMDtcbiAgbGluZS1oZWlnaHQ6IDEuNTM7XG4gIGNvbG9yOiAjNTY2YTdmO1xufVxuXG4uY29sLWZvcm0tbGFiZWwtbGcge1xuICBwYWRkaW5nLXRvcDogY2FsYygwLjc1cmVtICsgMXB4KTtcbiAgcGFkZGluZy1ib3R0b206IGNhbGMoMC43NXJlbSArIDFweCk7XG4gIGZvbnQtc2l6ZTogMXJlbTtcbn1cblxuLmNvbC1mb3JtLWxhYmVsLXNtIHtcbiAgcGFkZGluZy10b3A6IGNhbGMoMC4yNXJlbSArIDFweCk7XG4gIHBhZGRpbmctYm90dG9tOiBjYWxjKDAuMjVyZW0gKyAxcHgpO1xuICBmb250LXNpemU6IDAuNzVyZW07XG59XG5cbi5mb3JtLXRleHQge1xuICBtYXJnaW4tdG9wOiAwLjNyZW07XG4gIGZvbnQtc2l6ZTogODUlO1xuICBjb2xvcjogI2I0YmRjNjtcbn1cblxuLmZvcm0tY29udHJvbCB7XG4gIGRpc3BsYXk6IGJsb2NrO1xuICB3aWR0aDogMTAwJTtcbiAgcGFkZGluZzogMC40Mzc1cmVtIDAuODc1cmVtO1xuICBmb250LXNpemU6IDAuOTM3NXJlbTtcbiAgZm9udC13ZWlnaHQ6IDQwMDtcbiAgbGluZS1oZWlnaHQ6IDEuNTM7XG4gIGNvbG9yOiAjNjk3YThkO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNsaXA6IHBhZGRpbmctYm94O1xuICBib3JkZXI6IDFweCBzb2xpZCAjZDlkZWUzO1xuICBhcHBlYXJhbmNlOiBub25lO1xuICBib3JkZXItcmFkaXVzOiAwLjM3NXJlbTtcbiAgdHJhbnNpdGlvbjogYm9yZGVyLWNvbG9yIDAuMTVzIGVhc2UtaW4tb3V0LCBib3gtc2hhZG93IDAuMTVzIGVhc2UtaW4tb3V0O1xufVxuQG1lZGlhIChwcmVmZXJzLXJlZHVjZWQtbW90aW9uOiByZWR1Y2UpIHtcbiAgLmZvcm0tY29udHJvbCB7XG4gICAgdHJhbnNpdGlvbjogbm9uZTtcbiAgfVxufVxuLmZvcm0tY29udHJvbFt0eXBlPWZpbGVdIHtcbiAgb3ZlcmZsb3c6IGhpZGRlbjtcbn1cbi5mb3JtLWNvbnRyb2xbdHlwZT1maWxlXTpub3QoOmRpc2FibGVkKTpub3QoW3JlYWRvbmx5XSkge1xuICBjdXJzb3I6IHBvaW50ZXI7XG59XG4uZm9ybS1jb250cm9sOmZvY3VzIHtcbiAgY29sb3I6ICM2OTdhOGQ7XG4gIGJhY2tncm91bmQtY29sb3I6ICNmZmY7XG4gIGJvcmRlci1jb2xvcjogcmdiYSgyNDksIDI0OSwgMjU1LCAwLjU0KTtcbiAgb3V0bGluZTogMDtcbiAgYm94LXNoYWRvdzogMCAwIDAuMjVyZW0gMC4wNXJlbSByZ2JhKDEwNSwgMTA4LCAyNTUsIDAuMSk7XG59XG4uZm9ybS1jb250cm9sOjotd2Via2l0LWRhdGUtYW5kLXRpbWUtdmFsdWUge1xuICBoZWlnaHQ6IDEuNTNlbTtcbn1cbi5mb3JtLWNvbnRyb2w6OnBsYWNlaG9sZGVyIHtcbiAgY29sb3I6ICNiNGJkYzY7XG4gIG9wYWNpdHk6IDE7XG59XG4uZm9ybS1jb250cm9sOmRpc2FibGVkLCAuZm9ybS1jb250cm9sW3JlYWRvbmx5XSB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNlY2VlZjE7XG4gIG9wYWNpdHk6IDE7XG59XG4uZm9ybS1jb250cm9sOjpmaWxlLXNlbGVjdG9yLWJ1dHRvbiB7XG4gIHBhZGRpbmc6IDAuNDM3NXJlbSAwLjg3NXJlbTtcbiAgbWFyZ2luOiAtMC40Mzc1cmVtIC0wLjg3NXJlbTtcbiAgbWFyZ2luLWlubGluZS1lbmQ6IDAuODc1cmVtO1xuICBjb2xvcjogIzY5N2E4ZDtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZmZjtcbiAgcG9pbnRlci1ldmVudHM6IG5vbmU7XG4gIGJvcmRlci1jb2xvcjogaW5oZXJpdDtcbiAgYm9yZGVyLXN0eWxlOiBzb2xpZDtcbiAgYm9yZGVyLXdpZHRoOiAwO1xuICBib3JkZXItaW5saW5lLWVuZC13aWR0aDogMXB4O1xuICBib3JkZXItcmFkaXVzOiAwO1xuICB0cmFuc2l0aW9uOiBhbGwgMC4ycyBlYXNlLWluLW91dDtcbn1cbkBtZWRpYSAocHJlZmVycy1yZWR1Y2VkLW1vdGlvbjogcmVkdWNlKSB7XG4gIC5mb3JtLWNvbnRyb2w6OmZpbGUtc2VsZWN0b3ItYnV0dG9uIHtcbiAgICB0cmFuc2l0aW9uOiBub25lO1xuICB9XG59XG4uZm9ybS1jb250cm9sOmhvdmVyOm5vdCg6ZGlzYWJsZWQpOm5vdChbcmVhZG9ubHldKTo6ZmlsZS1zZWxlY3Rvci1idXR0b24ge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZjJmMmYyO1xufVxuLmZvcm0tY29udHJvbDo6LXdlYmtpdC1maWxlLXVwbG9hZC1idXR0b24ge1xuICBwYWRkaW5nOiAwLjQzNzVyZW0gMC44NzVyZW07XG4gIG1hcmdpbjogLTAuNDM3NXJlbSAtMC44NzVyZW07XG4gIG1hcmdpbi1pbmxpbmUtZW5kOiAwLjg3NXJlbTtcbiAgY29sb3I6ICM2OTdhOGQ7XG4gIGJhY2tncm91bmQtY29sb3I6ICNmZmY7XG4gIHBvaW50ZXItZXZlbnRzOiBub25lO1xuICBib3JkZXItY29sb3I6IGluaGVyaXQ7XG4gIGJvcmRlci1zdHlsZTogc29saWQ7XG4gIGJvcmRlci13aWR0aDogMDtcbiAgYm9yZGVyLWlubGluZS1lbmQtd2lkdGg6IDFweDtcbiAgYm9yZGVyLXJhZGl1czogMDtcbiAgdHJhbnNpdGlvbjogYWxsIDAuMnMgZWFzZS1pbi1vdXQ7XG59XG5AbWVkaWEgKHByZWZlcnMtcmVkdWNlZC1tb3Rpb246IHJlZHVjZSkge1xuICAuZm9ybS1jb250cm9sOjotd2Via2l0LWZpbGUtdXBsb2FkLWJ1dHRvbiB7XG4gICAgdHJhbnNpdGlvbjogbm9uZTtcbiAgfVxufVxuLmZvcm0tY29udHJvbDpob3Zlcjpub3QoOmRpc2FibGVkKTpub3QoW3JlYWRvbmx5XSk6Oi13ZWJraXQtZmlsZS11cGxvYWQtYnV0dG9uIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2YyZjJmMjtcbn1cblxuLmZvcm0tY29udHJvbC1wbGFpbnRleHQge1xuICBkaXNwbGF5OiBibG9jaztcbiAgd2lkdGg6IDEwMCU7XG4gIHBhZGRpbmc6IDAuNDM3NXJlbSAwO1xuICBtYXJnaW4tYm90dG9tOiAwO1xuICBsaW5lLWhlaWdodDogMS41MztcbiAgY29sb3I6ICM2OTdhOGQ7XG4gIGJhY2tncm91bmQtY29sb3I6IHRyYW5zcGFyZW50O1xuICBib3JkZXI6IHNvbGlkIHRyYW5zcGFyZW50O1xuICBib3JkZXItd2lkdGg6IDFweCAwO1xufVxuLmZvcm0tY29udHJvbC1wbGFpbnRleHQuZm9ybS1jb250cm9sLXNtLCAuZm9ybS1jb250cm9sLXBsYWludGV4dC5mb3JtLWNvbnRyb2wtbGcge1xuICBwYWRkaW5nLXJpZ2h0OiAwO1xuICBwYWRkaW5nLWxlZnQ6IDA7XG59XG5cbi5mb3JtLWNvbnRyb2wtc20ge1xuICBtaW4taGVpZ2h0OiBjYWxjKDEuNTNlbSArIDAuNXJlbSArIDJweCk7XG4gIHBhZGRpbmc6IDAuMjVyZW0gMC42MjVyZW07XG4gIGZvbnQtc2l6ZTogMC43NXJlbTtcbiAgYm9yZGVyLXJhZGl1czogMC4yNXJlbTtcbn1cbi5mb3JtLWNvbnRyb2wtc206OmZpbGUtc2VsZWN0b3ItYnV0dG9uIHtcbiAgcGFkZGluZzogMC4yNXJlbSAwLjYyNXJlbTtcbiAgbWFyZ2luOiAtMC4yNXJlbSAtMC42MjVyZW07XG4gIG1hcmdpbi1pbmxpbmUtZW5kOiAwLjYyNXJlbTtcbn1cbi5mb3JtLWNvbnRyb2wtc206Oi13ZWJraXQtZmlsZS11cGxvYWQtYnV0dG9uIHtcbiAgcGFkZGluZzogMC4yNXJlbSAwLjYyNXJlbTtcbiAgbWFyZ2luOiAtMC4yNXJlbSAtMC42MjVyZW07XG4gIG1hcmdpbi1pbmxpbmUtZW5kOiAwLjYyNXJlbTtcbn1cblxuLmZvcm0tY29udHJvbC1sZyB7XG4gIG1pbi1oZWlnaHQ6IGNhbGMoMS41M2VtICsgMS41cmVtICsgMnB4KTtcbiAgcGFkZGluZzogMC43NXJlbSAxLjI1cmVtO1xuICBmb250LXNpemU6IDFyZW07XG4gIGJvcmRlci1yYWRpdXM6IDAuNXJlbTtcbn1cbi5mb3JtLWNvbnRyb2wtbGc6OmZpbGUtc2VsZWN0b3ItYnV0dG9uIHtcbiAgcGFkZGluZzogMC43NXJlbSAxLjI1cmVtO1xuICBtYXJnaW46IC0wLjc1cmVtIC0xLjI1cmVtO1xuICBtYXJnaW4taW5saW5lLWVuZDogMS4yNXJlbTtcbn1cbi5mb3JtLWNvbnRyb2wtbGc6Oi13ZWJraXQtZmlsZS11cGxvYWQtYnV0dG9uIHtcbiAgcGFkZGluZzogMC43NXJlbSAxLjI1cmVtO1xuICBtYXJnaW46IC0wLjc1cmVtIC0xLjI1cmVtO1xuICBtYXJnaW4taW5saW5lLWVuZDogMS4yNXJlbTtcbn1cblxudGV4dGFyZWEuZm9ybS1jb250cm9sIHtcbiAgbWluLWhlaWdodDogY2FsYygxLjUzZW0gKyAwLjg3NXJlbSArIDJweCk7XG59XG50ZXh0YXJlYS5mb3JtLWNvbnRyb2wtc20ge1xuICBtaW4taGVpZ2h0OiBjYWxjKDEuNTNlbSArIDAuNXJlbSArIDJweCk7XG59XG50ZXh0YXJlYS5mb3JtLWNvbnRyb2wtbGcge1xuICBtaW4taGVpZ2h0OiBjYWxjKDEuNTNlbSArIDEuNXJlbSArIDJweCk7XG59XG5cbi5mb3JtLWNvbnRyb2wtY29sb3Ige1xuICB3aWR0aDogM3JlbTtcbiAgaGVpZ2h0OiBhdXRvO1xuICBwYWRkaW5nOiAwLjQzNzVyZW07XG59XG4uZm9ybS1jb250cm9sLWNvbG9yOm5vdCg6ZGlzYWJsZWQpOm5vdChbcmVhZG9ubHldKSB7XG4gIGN1cnNvcjogcG9pbnRlcjtcbn1cbi5mb3JtLWNvbnRyb2wtY29sb3I6Oi1tb3otY29sb3Itc3dhdGNoIHtcbiAgaGVpZ2h0OiAxLjUzZW07XG4gIGJvcmRlci1yYWRpdXM6IDAuMzc1cmVtO1xufVxuLmZvcm0tY29udHJvbC1jb2xvcjo6LXdlYmtpdC1jb2xvci1zd2F0Y2gge1xuICBoZWlnaHQ6IDEuNTNlbTtcbiAgYm9yZGVyLXJhZGl1czogMC4zNzVyZW07XG59XG5cbi5mb3JtLXNlbGVjdCB7XG4gIGRpc3BsYXk6IGJsb2NrO1xuICB3aWR0aDogMTAwJTtcbiAgcGFkZGluZzogMC40Mzc1cmVtIDEuODc1cmVtIDAuNDM3NXJlbSAwLjg3NXJlbTtcbiAgLW1vei1wYWRkaW5nLXN0YXJ0OiBjYWxjKDAuODc1cmVtIC0gM3B4KTtcbiAgZm9udC1zaXplOiAwLjkzNzVyZW07XG4gIGZvbnQtd2VpZ2h0OiA0MDA7XG4gIGxpbmUtaGVpZ2h0OiAxLjUzO1xuICBjb2xvcjogIzY5N2E4ZDtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZmZjtcbiAgYmFja2dyb3VuZC1pbWFnZTogdXJsKFwiZGF0YTppbWFnZS9zdmcreG1sLCUzY3N2ZyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHZpZXdCb3g9JzAgMCAxNiAxNiclM2UlM2NwYXRoIGZpbGw9J25vbmUnIHN0cm9rZT0ncmdiYSUyODY3LCA4OSwgMTEzLCAwLjYlMjknIHN0cm9rZS1saW5lY2FwPSdyb3VuZCcgc3Ryb2tlLWxpbmVqb2luPSdyb3VuZCcgc3Ryb2tlLXdpZHRoPScyJyBkPSdNMiA1bDYgNiA2LTYnLyUzZSUzYy9zdmclM2VcIik7XG4gIGJhY2tncm91bmQtcmVwZWF0OiBuby1yZXBlYXQ7XG4gIGJhY2tncm91bmQtcG9zaXRpb246IHJpZ2h0IDAuODc1cmVtIGNlbnRlcjtcbiAgYmFja2dyb3VuZC1zaXplOiAxN3B4IDEycHg7XG4gIGJvcmRlcjogMXB4IHNvbGlkICNkOWRlZTM7XG4gIGJvcmRlci1yYWRpdXM6IDAuMzc1cmVtO1xuICB0cmFuc2l0aW9uOiBib3JkZXItY29sb3IgMC4xNXMgZWFzZS1pbi1vdXQsIGJveC1zaGFkb3cgMC4xNXMgZWFzZS1pbi1vdXQ7XG4gIGFwcGVhcmFuY2U6IG5vbmU7XG59XG5AbWVkaWEgKHByZWZlcnMtcmVkdWNlZC1tb3Rpb246IHJlZHVjZSkge1xuICAuZm9ybS1zZWxlY3Qge1xuICAgIHRyYW5zaXRpb246IG5vbmU7XG4gIH1cbn1cbi5mb3JtLXNlbGVjdDpmb2N1cyB7XG4gIGJvcmRlci1jb2xvcjogcmdiYSgyNDksIDI0OSwgMjU1LCAwLjU0KTtcbiAgb3V0bGluZTogMDtcbiAgYm94LXNoYWRvdzogMCAwIDAuMjVyZW0gMC4wNXJlbSByZ2JhKDEwNSwgMTA4LCAyNTUsIDAuMSk7XG59XG4uZm9ybS1zZWxlY3RbbXVsdGlwbGVdLCAuZm9ybS1zZWxlY3Rbc2l6ZV06bm90KFtzaXplPVwiMVwiXSkge1xuICBwYWRkaW5nLXJpZ2h0OiAwLjg3NXJlbTtcbiAgYmFja2dyb3VuZC1pbWFnZTogbm9uZTtcbn1cbi5mb3JtLXNlbGVjdDpkaXNhYmxlZCB7XG4gIGNvbG9yOiAjNjk3YThkO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZWNlZWYxO1xufVxuLmZvcm0tc2VsZWN0Oi1tb3otZm9jdXNyaW5nIHtcbiAgY29sb3I6IHRyYW5zcGFyZW50O1xuICB0ZXh0LXNoYWRvdzogMCAwIDAgIzY5N2E4ZDtcbn1cblxuLmZvcm0tc2VsZWN0LXNtIHtcbiAgcGFkZGluZy10b3A6IDAuMjVyZW07XG4gIHBhZGRpbmctYm90dG9tOiAwLjI1cmVtO1xuICBwYWRkaW5nLWxlZnQ6IDAuNjI1cmVtO1xuICBmb250LXNpemU6IDAuNzVyZW07XG4gIGJvcmRlci1yYWRpdXM6IDAuMjVyZW07XG59XG5cbi5mb3JtLXNlbGVjdC1sZyB7XG4gIHBhZGRpbmctdG9wOiAwLjc1cmVtO1xuICBwYWRkaW5nLWJvdHRvbTogMC43NXJlbTtcbiAgcGFkZGluZy1sZWZ0OiAxLjI1cmVtO1xuICBmb250LXNpemU6IDFyZW07XG4gIGJvcmRlci1yYWRpdXM6IDAuNXJlbTtcbn1cblxuLmZvcm0tY2hlY2sge1xuICBkaXNwbGF5OiBibG9jaztcbiAgbWluLWhlaWdodDogMS40MzQzNzVyZW07XG4gIHBhZGRpbmctbGVmdDogMS43ZW07XG4gIG1hcmdpbi1ib3R0b206IDAuMTI1cmVtO1xufVxuLmZvcm0tY2hlY2sgLmZvcm0tY2hlY2staW5wdXQge1xuICBmbG9hdDogbGVmdDtcbiAgbWFyZ2luLWxlZnQ6IC0xLjdlbTtcbn1cblxuLmZvcm0tY2hlY2staW5wdXQge1xuICB3aWR0aDogMS4yZW07XG4gIGhlaWdodDogMS4yZW07XG4gIG1hcmdpbi10b3A6IDAuMTY1ZW07XG4gIHZlcnRpY2FsLWFsaWduOiB0b3A7XG4gIGJhY2tncm91bmQtY29sb3I6ICNmZmY7XG4gIGJhY2tncm91bmQtcmVwZWF0OiBuby1yZXBlYXQ7XG4gIGJhY2tncm91bmQtcG9zaXRpb246IGNlbnRlcjtcbiAgYmFja2dyb3VuZC1zaXplOiBjb250YWluO1xuICBib3JkZXI6IDFweCBzb2xpZCAjZDlkZWUzO1xuICBhcHBlYXJhbmNlOiBub25lO1xuICBjb2xvci1hZGp1c3Q6IGV4YWN0O1xufVxuLmZvcm0tY2hlY2staW5wdXRbdHlwZT1jaGVja2JveF0ge1xuICBib3JkZXItcmFkaXVzOiAwLjI1ZW07XG59XG4uZm9ybS1jaGVjay1pbnB1dFt0eXBlPXJhZGlvXSB7XG4gIGJvcmRlci1yYWRpdXM6IDUwJTtcbn1cbi5mb3JtLWNoZWNrLWlucHV0OmFjdGl2ZSB7XG4gIGZpbHRlcjogYnJpZ2h0bmVzcyg5MCUpO1xufVxuLmZvcm0tY2hlY2staW5wdXQ6Zm9jdXMge1xuICBib3JkZXItY29sb3I6IHJnYmEoMjQ5LCAyNDksIDI1NSwgMC41NCk7XG4gIG91dGxpbmU6IDA7XG4gIGJveC1zaGFkb3c6IDAgMCAwLjI1cmVtIDAuMDVyZW0gcmdiYSgxMDUsIDEwOCwgMjU1LCAwLjEpO1xufVxuLmZvcm0tY2hlY2staW5wdXQ6Y2hlY2tlZCB7XG4gIGJhY2tncm91bmQtY29sb3I6IHJnYmEoMTA1LCAxMDgsIDI1NSwgMC4wOCk7XG4gIGJvcmRlci1jb2xvcjogcmdiYSgxMDUsIDEwOCwgMjU1LCAwLjA4KTtcbn1cbi5mb3JtLWNoZWNrLWlucHV0OmNoZWNrZWRbdHlwZT1jaGVja2JveF0ge1xuICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoXCJkYXRhOmltYWdlL3N2Zyt4bWwsJTNjc3ZnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2Zycgdmlld0JveD0nMCAwIDIwIDIwJyUzZSUzY3BhdGggZmlsbD0nbm9uZScgc3Ryb2tlPSclMjNmZmYnIHN0cm9rZS1saW5lY2FwPSdyb3VuZCcgc3Ryb2tlLWxpbmVqb2luPSdyb3VuZCcgc3Ryb2tlLXdpZHRoPScyJyBkPSdNNiAxMGwzIDNsNi02Jy8lM2UlM2Mvc3ZnJTNlXCIpO1xufVxuLmZvcm0tY2hlY2staW5wdXQ6Y2hlY2tlZFt0eXBlPXJhZGlvXSB7XG4gIGJhY2tncm91bmQtaW1hZ2U6IHVybChcImRhdGE6aW1hZ2Uvc3ZnK3htbCwlM2NzdmcgeG1sbnM9J2h0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnJyB2aWV3Qm94PSctNCAtNCA4IDgnJTNlJTNjY2lyY2xlIHI9JzEuNScgZmlsbD0nJTIzZmZmJy8lM2UlM2Mvc3ZnJTNlXCIpO1xufVxuLmZvcm0tY2hlY2staW5wdXRbdHlwZT1jaGVja2JveF06aW5kZXRlcm1pbmF0ZSB7XG4gIGJhY2tncm91bmQtY29sb3I6IHJnYmEoMTA1LCAxMDgsIDI1NSwgMC4wOCk7XG4gIGJvcmRlci1jb2xvcjogcmdiYSgxMDUsIDEwOCwgMjU1LCAwLjA4KTtcbiAgYmFja2dyb3VuZC1pbWFnZTogdXJsKFwiZGF0YTppbWFnZS9zdmcreG1sLCUzY3N2ZyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHZpZXdCb3g9JzAgMCAyMCAyMCclM2UlM2NwYXRoIGZpbGw9J25vbmUnIHN0cm9rZT0nJTIzZmZmJyBzdHJva2UtbGluZWNhcD0ncm91bmQnIHN0cm9rZS1saW5lam9pbj0ncm91bmQnIHN0cm9rZS13aWR0aD0nMicgZD0nTTYgMTBoOCcvJTNlJTNjL3N2ZyUzZVwiKTtcbn1cbi5mb3JtLWNoZWNrLWlucHV0OmRpc2FibGVkIHtcbiAgcG9pbnRlci1ldmVudHM6IG5vbmU7XG4gIGZpbHRlcjogbm9uZTtcbiAgb3BhY2l0eTogMC41O1xufVxuLmZvcm0tY2hlY2staW5wdXRbZGlzYWJsZWRdIH4gLmZvcm0tY2hlY2stbGFiZWwsIC5mb3JtLWNoZWNrLWlucHV0OmRpc2FibGVkIH4gLmZvcm0tY2hlY2stbGFiZWwge1xuICBvcGFjaXR5OiAwLjU7XG59XG5cbi5mb3JtLXN3aXRjaCB7XG4gIHBhZGRpbmctbGVmdDogMi41ZW07XG59XG4uZm9ybS1zd2l0Y2ggLmZvcm0tY2hlY2staW5wdXQge1xuICB3aWR0aDogMmVtO1xuICBtYXJnaW4tbGVmdDogLTIuNWVtO1xuICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoXCJkYXRhOmltYWdlL3N2Zyt4bWwsJTNjc3ZnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2Zycgdmlld0JveD0nLTQgLTQgOCA4JyUzZSUzY2NpcmNsZSByPSczJyBmaWxsPSdyZ2JhJTI4NjcsIDg5LCAxMTMsIDAuMyUyOScvJTNlJTNjL3N2ZyUzZVwiKTtcbiAgYmFja2dyb3VuZC1wb3NpdGlvbjogbGVmdCBjZW50ZXI7XG4gIGJvcmRlci1yYWRpdXM6IDJlbTtcbiAgdHJhbnNpdGlvbjogYmFja2dyb3VuZC1wb3NpdGlvbiAwLjE1cyBlYXNlLWluLW91dDtcbn1cbkBtZWRpYSAocHJlZmVycy1yZWR1Y2VkLW1vdGlvbjogcmVkdWNlKSB7XG4gIC5mb3JtLXN3aXRjaCAuZm9ybS1jaGVjay1pbnB1dCB7XG4gICAgdHJhbnNpdGlvbjogbm9uZTtcbiAgfVxufVxuLmZvcm0tc3dpdGNoIC5mb3JtLWNoZWNrLWlucHV0OmZvY3VzIHtcbiAgYmFja2dyb3VuZC1pbWFnZTogdXJsKFwiZGF0YTppbWFnZS9zdmcreG1sLCUzY3N2ZyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHZpZXdCb3g9Jy00IC00IDggOCclM2UlM2NjaXJjbGUgcj0nMycgZmlsbD0ncmdiYSUyODI0OSwgMjQ5LCAyNTUsIDAuNTQlMjknLyUzZSUzYy9zdmclM2VcIik7XG59XG4uZm9ybS1zd2l0Y2ggLmZvcm0tY2hlY2staW5wdXQ6Y2hlY2tlZCB7XG4gIGJhY2tncm91bmQtcG9zaXRpb246IHJpZ2h0IGNlbnRlcjtcbiAgYmFja2dyb3VuZC1pbWFnZTogdXJsKFwiZGF0YTppbWFnZS9zdmcreG1sLCUzY3N2ZyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHZpZXdCb3g9Jy00IC00IDggOCclM2UlM2NjaXJjbGUgcj0nMycgZmlsbD0nJTIzZmZmJy8lM2UlM2Mvc3ZnJTNlXCIpO1xufVxuXG4uZm9ybS1jaGVjay1pbmxpbmUge1xuICBkaXNwbGF5OiBpbmxpbmUtYmxvY2s7XG4gIG1hcmdpbi1yaWdodDogMXJlbTtcbn1cblxuLmJ0bi1jaGVjayB7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgY2xpcDogcmVjdCgwLCAwLCAwLCAwKTtcbiAgcG9pbnRlci1ldmVudHM6IG5vbmU7XG59XG4uYnRuLWNoZWNrW2Rpc2FibGVkXSArIC5idG4sIC5idG4tY2hlY2s6ZGlzYWJsZWQgKyAuYnRuIHtcbiAgcG9pbnRlci1ldmVudHM6IG5vbmU7XG4gIGZpbHRlcjogbm9uZTtcbiAgb3BhY2l0eTogMC42NTtcbn1cblxuLmZvcm0tcmFuZ2Uge1xuICB3aWR0aDogMTAwJTtcbiAgaGVpZ2h0OiAwLjk3NXJlbTtcbiAgcGFkZGluZzogMDtcbiAgYmFja2dyb3VuZC1jb2xvcjogdHJhbnNwYXJlbnQ7XG4gIGFwcGVhcmFuY2U6IG5vbmU7XG59XG4uZm9ybS1yYW5nZTpmb2N1cyB7XG4gIG91dGxpbmU6IDA7XG59XG4uZm9ybS1yYW5nZTpmb2N1czo6LXdlYmtpdC1zbGlkZXItdGh1bWIge1xuICBib3gtc2hhZG93OiAwIDAgOHB4IDBweCByZ2JhKDY3LCA4OSwgMTEzLCAwLjQpO1xufVxuLmZvcm0tcmFuZ2U6Zm9jdXM6Oi1tb3otcmFuZ2UtdGh1bWIge1xuICBib3gtc2hhZG93OiAwIDAgOHB4IDBweCByZ2JhKDY3LCA4OSwgMTEzLCAwLjQpO1xufVxuLmZvcm0tcmFuZ2U6Oi1tb3otZm9jdXMtb3V0ZXIge1xuICBib3JkZXI6IDA7XG59XG4uZm9ybS1yYW5nZTo6LXdlYmtpdC1zbGlkZXItdGh1bWIge1xuICB3aWR0aDogMC44NzVyZW07XG4gIGhlaWdodDogMC44NzVyZW07XG4gIG1hcmdpbi10b3A6IC0wLjI1cmVtO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmO1xuICBib3JkZXI6IDA7XG4gIGJvcmRlci1yYWRpdXM6IDFyZW07XG4gIHRyYW5zaXRpb246IGJhY2tncm91bmQtY29sb3IgMC4xNXMgZWFzZS1pbi1vdXQsIGJvcmRlci1jb2xvciAwLjE1cyBlYXNlLWluLW91dCwgYm94LXNoYWRvdyAwLjE1cyBlYXNlLWluLW91dDtcbiAgYXBwZWFyYW5jZTogbm9uZTtcbn1cbkBtZWRpYSAocHJlZmVycy1yZWR1Y2VkLW1vdGlvbjogcmVkdWNlKSB7XG4gIC5mb3JtLXJhbmdlOjotd2Via2l0LXNsaWRlci10aHVtYiB7XG4gICAgdHJhbnNpdGlvbjogbm9uZTtcbiAgfVxufVxuLmZvcm0tcmFuZ2U6Oi13ZWJraXQtc2xpZGVyLXRodW1iOmFjdGl2ZSB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNmZmY7XG59XG4uZm9ybS1yYW5nZTo6LXdlYmtpdC1zbGlkZXItcnVubmFibGUtdHJhY2sge1xuICB3aWR0aDogMTAwJTtcbiAgaGVpZ2h0OiAwLjM3NXJlbTtcbiAgY29sb3I6IHRyYW5zcGFyZW50O1xuICBjdXJzb3I6IHBvaW50ZXI7XG4gIGJhY2tncm91bmQtY29sb3I6ICNlY2VlZjE7XG4gIGJvcmRlci1jb2xvcjogdHJhbnNwYXJlbnQ7XG4gIGJvcmRlci1yYWRpdXM6IDFyZW07XG59XG4uZm9ybS1yYW5nZTo6LW1vei1yYW5nZS10aHVtYiB7XG4gIHdpZHRoOiAwLjg3NXJlbTtcbiAgaGVpZ2h0OiAwLjg3NXJlbTtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZmZjtcbiAgYm9yZGVyOiAwO1xuICBib3JkZXItcmFkaXVzOiAxcmVtO1xuICB0cmFuc2l0aW9uOiBiYWNrZ3JvdW5kLWNvbG9yIDAuMTVzIGVhc2UtaW4tb3V0LCBib3JkZXItY29sb3IgMC4xNXMgZWFzZS1pbi1vdXQsIGJveC1zaGFkb3cgMC4xNXMgZWFzZS1pbi1vdXQ7XG4gIGFwcGVhcmFuY2U6IG5vbmU7XG59XG5AbWVkaWEgKHByZWZlcnMtcmVkdWNlZC1tb3Rpb246IHJlZHVjZSkge1xuICAuZm9ybS1yYW5nZTo6LW1vei1yYW5nZS10aHVtYiB7XG4gICAgdHJhbnNpdGlvbjogbm9uZTtcbiAgfVxufVxuLmZvcm0tcmFuZ2U6Oi1tb3otcmFuZ2UtdGh1bWI6YWN0aXZlIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZmZjtcbn1cbi5mb3JtLXJhbmdlOjotbW96LXJhbmdlLXRyYWNrIHtcbiAgd2lkdGg6IDEwMCU7XG4gIGhlaWdodDogMC4zNzVyZW07XG4gIGNvbG9yOiB0cmFuc3BhcmVudDtcbiAgY3Vyc29yOiBwb2ludGVyO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZWNlZWYxO1xuICBib3JkZXItY29sb3I6IHRyYW5zcGFyZW50O1xuICBib3JkZXItcmFkaXVzOiAxcmVtO1xufVxuLmZvcm0tcmFuZ2U6ZGlzYWJsZWQge1xuICBwb2ludGVyLWV2ZW50czogbm9uZTtcbn1cbi5mb3JtLXJhbmdlOmRpc2FibGVkOjotd2Via2l0LXNsaWRlci10aHVtYiB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNkOWRlZTM7XG59XG4uZm9ybS1yYW5nZTpkaXNhYmxlZDo6LW1vei1yYW5nZS10aHVtYiB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNkOWRlZTM7XG59XG5cbi5mb3JtLWZsb2F0aW5nIHtcbiAgcG9zaXRpb246IHJlbGF0aXZlO1xufVxuLmZvcm0tZmxvYXRpbmcgPiAuZm9ybS1jb250cm9sLFxuLmZvcm0tZmxvYXRpbmcgPiAuZm9ybS1zZWxlY3Qge1xuICBoZWlnaHQ6IGNhbGMoMy41cmVtICsgMnB4KTtcbiAgbGluZS1oZWlnaHQ6IDEuMjU7XG59XG4uZm9ybS1mbG9hdGluZyA+IGxhYmVsIHtcbiAgcG9zaXRpb246IGFic29sdXRlO1xuICB0b3A6IDA7XG4gIGxlZnQ6IDA7XG4gIGhlaWdodDogMTAwJTtcbiAgcGFkZGluZzogMXJlbSAwLjg3NXJlbTtcbiAgcG9pbnRlci1ldmVudHM6IG5vbmU7XG4gIGJvcmRlcjogMXB4IHNvbGlkIHRyYW5zcGFyZW50O1xuICB0cmFuc2Zvcm0tb3JpZ2luOiAwIDA7XG4gIHRyYW5zaXRpb246IG9wYWNpdHkgMC4ycyBlYXNlLWluLW91dCwgdHJhbnNmb3JtIDAuMnMgZWFzZS1pbi1vdXQ7XG59XG5AbWVkaWEgKHByZWZlcnMtcmVkdWNlZC1tb3Rpb246IHJlZHVjZSkge1xuICAuZm9ybS1mbG9hdGluZyA+IGxhYmVsIHtcbiAgICB0cmFuc2l0aW9uOiBub25lO1xuICB9XG59XG4uZm9ybS1mbG9hdGluZyA+IC5mb3JtLWNvbnRyb2wge1xuICBwYWRkaW5nOiAxcmVtIDAuODc1cmVtO1xufVxuLmZvcm0tZmxvYXRpbmcgPiAuZm9ybS1jb250cm9sOjpwbGFjZWhvbGRlciB7XG4gIGNvbG9yOiB0cmFuc3BhcmVudDtcbn1cbi5mb3JtLWZsb2F0aW5nID4gLmZvcm0tY29udHJvbDpmb2N1cywgLmZvcm0tZmxvYXRpbmcgPiAuZm9ybS1jb250cm9sOm5vdCg6cGxhY2Vob2xkZXItc2hvd24pIHtcbiAgcGFkZGluZy10b3A6IDEuNjI1cmVtO1xuICBwYWRkaW5nLWJvdHRvbTogMC42MjVyZW07XG59XG4uZm9ybS1mbG9hdGluZyA+IC5mb3JtLWNvbnRyb2w6LXdlYmtpdC1hdXRvZmlsbCB7XG4gIHBhZGRpbmctdG9wOiAxLjYyNXJlbTtcbiAgcGFkZGluZy1ib3R0b206IDAuNjI1cmVtO1xufVxuLmZvcm0tZmxvYXRpbmcgPiAuZm9ybS1zZWxlY3Qge1xuICBwYWRkaW5nLXRvcDogMS42MjVyZW07XG4gIHBhZGRpbmctYm90dG9tOiAwLjYyNXJlbTtcbn1cbi5mb3JtLWZsb2F0aW5nID4gLmZvcm0tY29udHJvbDpmb2N1cyB+IGxhYmVsLFxuLmZvcm0tZmxvYXRpbmcgPiAuZm9ybS1jb250cm9sOm5vdCg6cGxhY2Vob2xkZXItc2hvd24pIH4gbGFiZWwsXG4uZm9ybS1mbG9hdGluZyA+IC5mb3JtLXNlbGVjdCB+IGxhYmVsIHtcbiAgb3BhY2l0eTogMC43NTtcbiAgdHJhbnNmb3JtOiBzY2FsZSgwLjg1KSB0cmFuc2xhdGVZKC0wLjVyZW0pIHRyYW5zbGF0ZVgoMC4xNXJlbSk7XG59XG4uZm9ybS1mbG9hdGluZyA+IC5mb3JtLWNvbnRyb2w6LXdlYmtpdC1hdXRvZmlsbCB+IGxhYmVsIHtcbiAgb3BhY2l0eTogMC43NTtcbiAgdHJhbnNmb3JtOiBzY2FsZSgwLjg1KSB0cmFuc2xhdGVZKC0wLjVyZW0pIHRyYW5zbGF0ZVgoMC4xNXJlbSk7XG59XG5cbi5pbnB1dC1ncm91cCB7XG4gIHBvc2l0aW9uOiByZWxhdGl2ZTtcbiAgZGlzcGxheTogZmxleDtcbiAgZmxleC13cmFwOiB3cmFwO1xuICBhbGlnbi1pdGVtczogc3RyZXRjaDtcbiAgd2lkdGg6IDEwMCU7XG59XG4uaW5wdXQtZ3JvdXAgPiAuZm9ybS1jb250cm9sLFxuLmlucHV0LWdyb3VwID4gLmZvcm0tc2VsZWN0IHtcbiAgcG9zaXRpb246IHJlbGF0aXZlO1xuICBmbGV4OiAxIDEgYXV0bztcbiAgd2lkdGg6IDElO1xuICBtaW4td2lkdGg6IDA7XG59XG4uaW5wdXQtZ3JvdXAgPiAuZm9ybS1jb250cm9sOmZvY3VzLFxuLmlucHV0LWdyb3VwID4gLmZvcm0tc2VsZWN0OmZvY3VzIHtcbiAgei1pbmRleDogMztcbn1cbi5pbnB1dC1ncm91cCAuYnRuIHtcbiAgcG9zaXRpb246IHJlbGF0aXZlO1xuICB6LWluZGV4OiAyO1xufVxuLmlucHV0LWdyb3VwIC5idG46Zm9jdXMge1xuICB6LWluZGV4OiAzO1xufVxuXG4uaW5wdXQtZ3JvdXAtdGV4dCB7XG4gIGRpc3BsYXk6IGZsZXg7XG4gIGFsaWduLWl0ZW1zOiBjZW50ZXI7XG4gIHBhZGRpbmc6IDAuNDM3NXJlbSAwLjg3NXJlbTtcbiAgZm9udC1zaXplOiAwLjkzNzVyZW07XG4gIGZvbnQtd2VpZ2h0OiA0MDA7XG4gIGxpbmUtaGVpZ2h0OiAxLjUzO1xuICBjb2xvcjogIzY5N2E4ZDtcbiAgdGV4dC1hbGlnbjogY2VudGVyO1xuICB3aGl0ZS1zcGFjZTogbm93cmFwO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmO1xuICBib3JkZXI6IDFweCBzb2xpZCAjZDlkZWUzO1xuICBib3JkZXItcmFkaXVzOiAwLjM3NXJlbTtcbn1cblxuLmlucHV0LWdyb3VwLWxnID4gLmZvcm0tY29udHJvbCxcbi5pbnB1dC1ncm91cC1sZyA+IC5mb3JtLXNlbGVjdCxcbi5pbnB1dC1ncm91cC1sZyA+IC5pbnB1dC1ncm91cC10ZXh0LFxuLmlucHV0LWdyb3VwLWxnID4gLmJ0biB7XG4gIHBhZGRpbmc6IDAuNzVyZW0gMS4yNXJlbTtcbiAgZm9udC1zaXplOiAxcmVtO1xuICBib3JkZXItcmFkaXVzOiAwLjVyZW07XG59XG5cbi5pbnB1dC1ncm91cC1zbSA+IC5mb3JtLWNvbnRyb2wsXG4uaW5wdXQtZ3JvdXAtc20gPiAuZm9ybS1zZWxlY3QsXG4uaW5wdXQtZ3JvdXAtc20gPiAuaW5wdXQtZ3JvdXAtdGV4dCxcbi5pbnB1dC1ncm91cC1zbSA+IC5idG4ge1xuICBwYWRkaW5nOiAwLjI1cmVtIDAuNjI1cmVtO1xuICBmb250LXNpemU6IDAuNzVyZW07XG4gIGJvcmRlci1yYWRpdXM6IDAuMjVyZW07XG59XG5cbi5pbnB1dC1ncm91cC1sZyA+IC5mb3JtLXNlbGVjdCxcbi5pbnB1dC1ncm91cC1zbSA+IC5mb3JtLXNlbGVjdCB7XG4gIHBhZGRpbmctcmlnaHQ6IDIuNzVyZW07XG59XG5cbi5pbnB1dC1ncm91cDpub3QoLmhhcy12YWxpZGF0aW9uKSA+IDpub3QoOmxhc3QtY2hpbGQpOm5vdCguZHJvcGRvd24tdG9nZ2xlKTpub3QoLmRyb3Bkb3duLW1lbnUpLFxuLmlucHV0LWdyb3VwOm5vdCguaGFzLXZhbGlkYXRpb24pID4gLmRyb3Bkb3duLXRvZ2dsZTpudGgtbGFzdC1jaGlsZChuKzMpIHtcbiAgYm9yZGVyLXRvcC1yaWdodC1yYWRpdXM6IDA7XG4gIGJvcmRlci1ib3R0b20tcmlnaHQtcmFkaXVzOiAwO1xufVxuLmlucHV0LWdyb3VwLmhhcy12YWxpZGF0aW9uID4gOm50aC1sYXN0LWNoaWxkKG4rMyk6bm90KC5kcm9wZG93bi10b2dnbGUpOm5vdCguZHJvcGRvd24tbWVudSksXG4uaW5wdXQtZ3JvdXAuaGFzLXZhbGlkYXRpb24gPiAuZHJvcGRvd24tdG9nZ2xlOm50aC1sYXN0LWNoaWxkKG4rNCkge1xuICBib3JkZXItdG9wLXJpZ2h0LXJhZGl1czogMDtcbiAgYm9yZGVyLWJvdHRvbS1yaWdodC1yYWRpdXM6IDA7XG59XG4uaW5wdXQtZ3JvdXAgPiA6bm90KDpmaXJzdC1jaGlsZCk6bm90KC5kcm9wZG93bi1tZW51KTpub3QoLnZhbGlkLXRvb2x0aXApOm5vdCgudmFsaWQtZmVlZGJhY2spOm5vdCguaW52YWxpZC10b29sdGlwKTpub3QoLmludmFsaWQtZmVlZGJhY2spIHtcbiAgbWFyZ2luLWxlZnQ6IC0xcHg7XG4gIGJvcmRlci10b3AtbGVmdC1yYWRpdXM6IDA7XG4gIGJvcmRlci1ib3R0b20tbGVmdC1yYWRpdXM6IDA7XG59XG5cbi5idG4ge1xuICBkaXNwbGF5OiBpbmxpbmUtYmxvY2s7XG4gIGZvbnQtd2VpZ2h0OiA0MDA7XG4gIGxpbmUtaGVpZ2h0OiAxLjUzO1xuICBjb2xvcjogIzY5N2E4ZDtcbiAgdGV4dC1hbGlnbjogY2VudGVyO1xuICB2ZXJ0aWNhbC1hbGlnbjogbWlkZGxlO1xuICBjdXJzb3I6IHBvaW50ZXI7XG4gIHVzZXItc2VsZWN0OiBub25lO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiB0cmFuc3BhcmVudDtcbiAgYm9yZGVyOiAxcHggc29saWQgdHJhbnNwYXJlbnQ7XG4gIHBhZGRpbmc6IDAuNDM3NXJlbSAxLjI1cmVtO1xuICBmb250LXNpemU6IDAuOTM3NXJlbTtcbiAgYm9yZGVyLXJhZGl1czogMC4zNzVyZW07XG4gIHRyYW5zaXRpb246IGFsbCAwLjJzIGVhc2UtaW4tb3V0O1xufVxuQG1lZGlhIChwcmVmZXJzLXJlZHVjZWQtbW90aW9uOiByZWR1Y2UpIHtcbiAgLmJ0biB7XG4gICAgdHJhbnNpdGlvbjogbm9uZTtcbiAgfVxufVxuLmJ0bjpob3ZlciB7XG4gIGNvbG9yOiAjNjk3YThkO1xufVxuLmJ0bi1jaGVjazpmb2N1cyArIC5idG4sIC5idG46Zm9jdXMge1xuICBvdXRsaW5lOiAwO1xuICBib3gtc2hhZG93OiBub25lO1xufVxuLmJ0bjpkaXNhYmxlZCwgLmJ0bi5kaXNhYmxlZCwgZmllbGRzZXQ6ZGlzYWJsZWQgLmJ0biB7XG4gIHBvaW50ZXItZXZlbnRzOiBub25lO1xuICBvcGFjaXR5OiAwLjY1O1xufVxuXG4uYnRuLWxpbmsge1xuICBmb250LXdlaWdodDogNDAwO1xuICBjb2xvcjogIzY5NmNmZjtcbiAgdGV4dC1kZWNvcmF0aW9uOiBub25lO1xufVxuLmJ0bi1saW5rOmhvdmVyIHtcbiAgY29sb3I6ICM1ZjYxZTY7XG59XG4uYnRuLWxpbms6ZGlzYWJsZWQsIC5idG4tbGluay5kaXNhYmxlZCB7XG4gIGNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjYpO1xufVxuXG4uYnRuLWxnLCAuYnRuLWdyb3VwLWxnID4gLmJ0biB7XG4gIHBhZGRpbmc6IDAuNzVyZW0gMS41cmVtO1xuICBmb250LXNpemU6IDFyZW07XG4gIGJvcmRlci1yYWRpdXM6IDAuNXJlbTtcbn1cblxuLmJ0bi1zbSwgLmJ0bi1ncm91cC1zbSA+IC5idG4ge1xuICBwYWRkaW5nOiAwLjI1cmVtIDAuNjg3NXJlbTtcbiAgZm9udC1zaXplOiAwLjc1cmVtO1xuICBib3JkZXItcmFkaXVzOiAwLjI1cmVtO1xufVxuXG4uZmFkZSB7XG4gIHRyYW5zaXRpb246IG9wYWNpdHkgMC4xNXMgbGluZWFyO1xufVxuQG1lZGlhIChwcmVmZXJzLXJlZHVjZWQtbW90aW9uOiByZWR1Y2UpIHtcbiAgLmZhZGUge1xuICAgIHRyYW5zaXRpb246IG5vbmU7XG4gIH1cbn1cbi5mYWRlOm5vdCguc2hvdykge1xuICBvcGFjaXR5OiAwO1xufVxuXG4uY29sbGFwc2U6bm90KC5zaG93KSB7XG4gIGRpc3BsYXk6IG5vbmU7XG59XG5cbi5jb2xsYXBzaW5nIHtcbiAgaGVpZ2h0OiAwO1xuICBvdmVyZmxvdzogaGlkZGVuO1xuICB0cmFuc2l0aW9uOiBoZWlnaHQgMC4zNXMgZWFzZTtcbn1cbkBtZWRpYSAocHJlZmVycy1yZWR1Y2VkLW1vdGlvbjogcmVkdWNlKSB7XG4gIC5jb2xsYXBzaW5nIHtcbiAgICB0cmFuc2l0aW9uOiBub25lO1xuICB9XG59XG4uY29sbGFwc2luZy5jb2xsYXBzZS1ob3Jpem9udGFsIHtcbiAgd2lkdGg6IDA7XG4gIGhlaWdodDogYXV0bztcbiAgdHJhbnNpdGlvbjogd2lkdGggMC4zNXMgZWFzZTtcbn1cbkBtZWRpYSAocHJlZmVycy1yZWR1Y2VkLW1vdGlvbjogcmVkdWNlKSB7XG4gIC5jb2xsYXBzaW5nLmNvbGxhcHNlLWhvcml6b250YWwge1xuICAgIHRyYW5zaXRpb246IG5vbmU7XG4gIH1cbn1cblxuLmRyb3B1cCxcbi5kcm9wZW5kLFxuLmRyb3Bkb3duLFxuLmRyb3BzdGFydCB7XG4gIHBvc2l0aW9uOiByZWxhdGl2ZTtcbn1cblxuLmRyb3Bkb3duLXRvZ2dsZSB7XG4gIHdoaXRlLXNwYWNlOiBub3dyYXA7XG59XG4uZHJvcGRvd24tdG9nZ2xlOjphZnRlciB7XG4gIGRpc3BsYXk6IGlubGluZS1ibG9jaztcbiAgbWFyZ2luLWxlZnQ6IDAuNWVtO1xuICB2ZXJ0aWNhbC1hbGlnbjogbWlkZGxlO1xuICBjb250ZW50OiBcIlwiO1xuICBtYXJnaW4tdG9wOiAtMC4yOGVtO1xuICB3aWR0aDogMC40MmVtO1xuICBoZWlnaHQ6IDAuNDJlbTtcbiAgYm9yZGVyOiAxcHggc29saWQ7XG4gIGJvcmRlci10b3A6IDA7XG4gIGJvcmRlci1sZWZ0OiAwO1xuICB0cmFuc2Zvcm06IHJvdGF0ZSg0NWRlZyk7XG59XG4uZHJvcGRvd24tdG9nZ2xlOmVtcHR5OjphZnRlciB7XG4gIG1hcmdpbi1sZWZ0OiAwO1xufVxuXG4uZHJvcGRvd24tbWVudSB7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgei1pbmRleDogMTAwMDtcbiAgZGlzcGxheTogbm9uZTtcbiAgbWluLXdpZHRoOiAxMnJlbTtcbiAgcGFkZGluZzogMC4zMTI1cmVtIDA7XG4gIG1hcmdpbjogMDtcbiAgZm9udC1zaXplOiAwLjkzNzVyZW07XG4gIGNvbG9yOiAjNjk3YThkO1xuICB0ZXh0LWFsaWduOiBsZWZ0O1xuICBsaXN0LXN0eWxlOiBub25lO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNsaXA6IHBhZGRpbmctYm94O1xuICBib3JkZXI6IDFweCBzb2xpZCB0cmFuc3BhcmVudDtcbiAgYm9yZGVyLXJhZGl1czogMC4zNzVyZW07XG59XG4uZHJvcGRvd24tbWVudVtkYXRhLWJzLXBvcHBlcl0ge1xuICB0b3A6IDEwMCU7XG4gIGxlZnQ6IDA7XG4gIG1hcmdpbi10b3A6IDAuMTI1cmVtO1xufVxuXG4uZHJvcGRvd24tbWVudS1zdGFydCB7XG4gIC0tYnMtcG9zaXRpb246IHN0YXJ0O1xufVxuLmRyb3Bkb3duLW1lbnUtc3RhcnRbZGF0YS1icy1wb3BwZXJdIHtcbiAgcmlnaHQ6IGF1dG87XG4gIGxlZnQ6IDA7XG59XG5cbi5kcm9wZG93bi1tZW51LWVuZCB7XG4gIC0tYnMtcG9zaXRpb246IGVuZDtcbn1cbi5kcm9wZG93bi1tZW51LWVuZFtkYXRhLWJzLXBvcHBlcl0ge1xuICByaWdodDogMDtcbiAgbGVmdDogYXV0bztcbn1cblxuQG1lZGlhIChtaW4td2lkdGg6IDU3NnB4KSB7XG4gIC5kcm9wZG93bi1tZW51LXNtLXN0YXJ0IHtcbiAgICAtLWJzLXBvc2l0aW9uOiBzdGFydDtcbiAgfVxuICAuZHJvcGRvd24tbWVudS1zbS1zdGFydFtkYXRhLWJzLXBvcHBlcl0ge1xuICAgIHJpZ2h0OiBhdXRvO1xuICAgIGxlZnQ6IDA7XG4gIH1cblxuICAuZHJvcGRvd24tbWVudS1zbS1lbmQge1xuICAgIC0tYnMtcG9zaXRpb246IGVuZDtcbiAgfVxuICAuZHJvcGRvd24tbWVudS1zbS1lbmRbZGF0YS1icy1wb3BwZXJdIHtcbiAgICByaWdodDogMDtcbiAgICBsZWZ0OiBhdXRvO1xuICB9XG59XG5AbWVkaWEgKG1pbi13aWR0aDogNzY4cHgpIHtcbiAgLmRyb3Bkb3duLW1lbnUtbWQtc3RhcnQge1xuICAgIC0tYnMtcG9zaXRpb246IHN0YXJ0O1xuICB9XG4gIC5kcm9wZG93bi1tZW51LW1kLXN0YXJ0W2RhdGEtYnMtcG9wcGVyXSB7XG4gICAgcmlnaHQ6IGF1dG87XG4gICAgbGVmdDogMDtcbiAgfVxuXG4gIC5kcm9wZG93bi1tZW51LW1kLWVuZCB7XG4gICAgLS1icy1wb3NpdGlvbjogZW5kO1xuICB9XG4gIC5kcm9wZG93bi1tZW51LW1kLWVuZFtkYXRhLWJzLXBvcHBlcl0ge1xuICAgIHJpZ2h0OiAwO1xuICAgIGxlZnQ6IGF1dG87XG4gIH1cbn1cbkBtZWRpYSAobWluLXdpZHRoOiA5OTJweCkge1xuICAuZHJvcGRvd24tbWVudS1sZy1zdGFydCB7XG4gICAgLS1icy1wb3NpdGlvbjogc3RhcnQ7XG4gIH1cbiAgLmRyb3Bkb3duLW1lbnUtbGctc3RhcnRbZGF0YS1icy1wb3BwZXJdIHtcbiAgICByaWdodDogYXV0bztcbiAgICBsZWZ0OiAwO1xuICB9XG5cbiAgLmRyb3Bkb3duLW1lbnUtbGctZW5kIHtcbiAgICAtLWJzLXBvc2l0aW9uOiBlbmQ7XG4gIH1cbiAgLmRyb3Bkb3duLW1lbnUtbGctZW5kW2RhdGEtYnMtcG9wcGVyXSB7XG4gICAgcmlnaHQ6IDA7XG4gICAgbGVmdDogYXV0bztcbiAgfVxufVxuQG1lZGlhIChtaW4td2lkdGg6IDEyMDBweCkge1xuICAuZHJvcGRvd24tbWVudS14bC1zdGFydCB7XG4gICAgLS1icy1wb3NpdGlvbjogc3RhcnQ7XG4gIH1cbiAgLmRyb3Bkb3duLW1lbnUteGwtc3RhcnRbZGF0YS1icy1wb3BwZXJdIHtcbiAgICByaWdodDogYXV0bztcbiAgICBsZWZ0OiAwO1xuICB9XG5cbiAgLmRyb3Bkb3duLW1lbnUteGwtZW5kIHtcbiAgICAtLWJzLXBvc2l0aW9uOiBlbmQ7XG4gIH1cbiAgLmRyb3Bkb3duLW1lbnUteGwtZW5kW2RhdGEtYnMtcG9wcGVyXSB7XG4gICAgcmlnaHQ6IDA7XG4gICAgbGVmdDogYXV0bztcbiAgfVxufVxuQG1lZGlhIChtaW4td2lkdGg6IDE0MDBweCkge1xuICAuZHJvcGRvd24tbWVudS14eGwtc3RhcnQge1xuICAgIC0tYnMtcG9zaXRpb246IHN0YXJ0O1xuICB9XG4gIC5kcm9wZG93bi1tZW51LXh4bC1zdGFydFtkYXRhLWJzLXBvcHBlcl0ge1xuICAgIHJpZ2h0OiBhdXRvO1xuICAgIGxlZnQ6IDA7XG4gIH1cblxuICAuZHJvcGRvd24tbWVudS14eGwtZW5kIHtcbiAgICAtLWJzLXBvc2l0aW9uOiBlbmQ7XG4gIH1cbiAgLmRyb3Bkb3duLW1lbnUteHhsLWVuZFtkYXRhLWJzLXBvcHBlcl0ge1xuICAgIHJpZ2h0OiAwO1xuICAgIGxlZnQ6IGF1dG87XG4gIH1cbn1cbi5kcm9wdXAgLmRyb3Bkb3duLW1lbnVbZGF0YS1icy1wb3BwZXJdIHtcbiAgdG9wOiBhdXRvO1xuICBib3R0b206IDEwMCU7XG4gIG1hcmdpbi10b3A6IDA7XG4gIG1hcmdpbi1ib3R0b206IDAuMTI1cmVtO1xufVxuLmRyb3B1cCAuZHJvcGRvd24tdG9nZ2xlOjphZnRlciB7XG4gIGRpc3BsYXk6IGlubGluZS1ibG9jaztcbiAgbWFyZ2luLWxlZnQ6IDAuNWVtO1xuICB2ZXJ0aWNhbC1hbGlnbjogbWlkZGxlO1xuICBjb250ZW50OiBcIlwiO1xuICBtYXJnaW4tdG9wOiAwO1xuICB3aWR0aDogMC40MmVtO1xuICBoZWlnaHQ6IDAuNDJlbTtcbiAgYm9yZGVyOiAxcHggc29saWQ7XG4gIGJvcmRlci1ib3R0b206IDA7XG4gIGJvcmRlci1sZWZ0OiAwO1xuICB0cmFuc2Zvcm06IHJvdGF0ZSgtNDVkZWcpO1xufVxuLmRyb3B1cCAuZHJvcGRvd24tdG9nZ2xlOmVtcHR5OjphZnRlciB7XG4gIG1hcmdpbi1sZWZ0OiAwO1xufVxuXG4uZHJvcGVuZCAuZHJvcGRvd24tbWVudVtkYXRhLWJzLXBvcHBlcl0ge1xuICB0b3A6IDA7XG4gIHJpZ2h0OiBhdXRvO1xuICBsZWZ0OiAxMDAlO1xuICBtYXJnaW4tdG9wOiAwO1xuICBtYXJnaW4tbGVmdDogMC4xMjVyZW07XG59XG4uZHJvcGVuZCAuZHJvcGRvd24tdG9nZ2xlOjphZnRlciB7XG4gIGRpc3BsYXk6IGlubGluZS1ibG9jaztcbiAgbWFyZ2luLWxlZnQ6IDAuNWVtO1xuICB2ZXJ0aWNhbC1hbGlnbjogbWlkZGxlO1xuICBjb250ZW50OiBcIlwiO1xuICBib3JkZXItdG9wOiAwLjQyZW0gc29saWQgdHJhbnNwYXJlbnQ7XG4gIGJvcmRlci1yaWdodDogMDtcbiAgYm9yZGVyLWJvdHRvbTogMC40MmVtIHNvbGlkIHRyYW5zcGFyZW50O1xuICBib3JkZXItbGVmdDogMC40MmVtIHNvbGlkO1xufVxuLmRyb3BlbmQgLmRyb3Bkb3duLXRvZ2dsZTplbXB0eTo6YWZ0ZXIge1xuICBtYXJnaW4tbGVmdDogMDtcbn1cbi5kcm9wZW5kIC5kcm9wZG93bi10b2dnbGU6OmFmdGVyIHtcbiAgdmVydGljYWwtYWxpZ246IDA7XG59XG5cbi5kcm9wc3RhcnQgLmRyb3Bkb3duLW1lbnVbZGF0YS1icy1wb3BwZXJdIHtcbiAgdG9wOiAwO1xuICByaWdodDogMTAwJTtcbiAgbGVmdDogYXV0bztcbiAgbWFyZ2luLXRvcDogMDtcbiAgbWFyZ2luLXJpZ2h0OiAwLjEyNXJlbTtcbn1cbi5kcm9wc3RhcnQgLmRyb3Bkb3duLXRvZ2dsZTo6YWZ0ZXIge1xuICBkaXNwbGF5OiBpbmxpbmUtYmxvY2s7XG4gIG1hcmdpbi1sZWZ0OiAwLjVlbTtcbiAgdmVydGljYWwtYWxpZ246IG1pZGRsZTtcbiAgY29udGVudDogXCJcIjtcbn1cbi5kcm9wc3RhcnQgLmRyb3Bkb3duLXRvZ2dsZTo6YWZ0ZXIge1xuICBkaXNwbGF5OiBub25lO1xufVxuLmRyb3BzdGFydCAuZHJvcGRvd24tdG9nZ2xlOjpiZWZvcmUge1xuICBkaXNwbGF5OiBpbmxpbmUtYmxvY2s7XG4gIG1hcmdpbi1yaWdodDogMC41ZW07XG4gIHZlcnRpY2FsLWFsaWduOiBtaWRkbGU7XG4gIGNvbnRlbnQ6IFwiXCI7XG4gIGJvcmRlci10b3A6IDAuNDJlbSBzb2xpZCB0cmFuc3BhcmVudDtcbiAgYm9yZGVyLXJpZ2h0OiAwLjQyZW0gc29saWQ7XG4gIGJvcmRlci1ib3R0b206IDAuNDJlbSBzb2xpZCB0cmFuc3BhcmVudDtcbn1cbi5kcm9wc3RhcnQgLmRyb3Bkb3duLXRvZ2dsZTplbXB0eTo6YWZ0ZXIge1xuICBtYXJnaW4tbGVmdDogMDtcbn1cbi5kcm9wc3RhcnQgLmRyb3Bkb3duLXRvZ2dsZTo6YmVmb3JlIHtcbiAgdmVydGljYWwtYWxpZ246IDA7XG59XG5cbi5kcm9wZG93bi1kaXZpZGVyIHtcbiAgaGVpZ2h0OiAwO1xuICBtYXJnaW46IDAuNXJlbSAwO1xuICBvdmVyZmxvdzogaGlkZGVuO1xuICBib3JkZXItdG9wOiAxcHggc29saWQgI2Q5ZGVlMztcbn1cblxuLmRyb3Bkb3duLWl0ZW0ge1xuICBkaXNwbGF5OiBibG9jaztcbiAgd2lkdGg6IDEwMCU7XG4gIHBhZGRpbmc6IDAuNTMycmVtIDEuMjVyZW07XG4gIGNsZWFyOiBib3RoO1xuICBmb250LXdlaWdodDogNDAwO1xuICBjb2xvcjogIzY5N2E4ZDtcbiAgdGV4dC1hbGlnbjogaW5oZXJpdDtcbiAgd2hpdGUtc3BhY2U6IG5vd3JhcDtcbiAgYmFja2dyb3VuZC1jb2xvcjogdHJhbnNwYXJlbnQ7XG4gIGJvcmRlcjogMDtcbn1cbi5kcm9wZG93bi1pdGVtOmhvdmVyLCAuZHJvcGRvd24taXRlbTpmb2N1cyB7XG4gIGNvbG9yOiAjNWY2ZTdmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjA0KTtcbn1cbi5kcm9wZG93bi1pdGVtLmFjdGl2ZSwgLmRyb3Bkb3duLWl0ZW06YWN0aXZlIHtcbiAgY29sb3I6ICNmZmY7XG4gIHRleHQtZGVjb3JhdGlvbjogbm9uZTtcbiAgYmFja2dyb3VuZC1jb2xvcjogcmdiYSgxMDUsIDEwOCwgMjU1LCAwLjA4KTtcbn1cbi5kcm9wZG93bi1pdGVtLmRpc2FibGVkLCAuZHJvcGRvd24taXRlbTpkaXNhYmxlZCB7XG4gIGNvbG9yOiAjYzdjZGQ0O1xuICBwb2ludGVyLWV2ZW50czogbm9uZTtcbiAgYmFja2dyb3VuZC1jb2xvcjogdHJhbnNwYXJlbnQ7XG59XG5cbi5kcm9wZG93bi1tZW51LnNob3cge1xuICBkaXNwbGF5OiBibG9jaztcbn1cblxuLmRyb3Bkb3duLWhlYWRlciB7XG4gIGRpc3BsYXk6IGJsb2NrO1xuICBwYWRkaW5nOiAwLjUzMnJlbSAxLjI1cmVtO1xuICBtYXJnaW4tYm90dG9tOiAwO1xuICBmb250LXNpemU6IDAuNzVyZW07XG4gIGNvbG9yOiAjYTFhY2I4O1xuICB3aGl0ZS1zcGFjZTogbm93cmFwO1xufVxuXG4uZHJvcGRvd24taXRlbS10ZXh0IHtcbiAgZGlzcGxheTogYmxvY2s7XG4gIHBhZGRpbmc6IDAuNTMycmVtIDEuMjVyZW07XG4gIGNvbG9yOiAjNjk3YThkO1xufVxuXG4uZHJvcGRvd24tbWVudS1kYXJrIHtcbiAgY29sb3I6IHJnYmEoNjcsIDg5LCAxMTMsIDAuMyk7XG4gIGJhY2tncm91bmQtY29sb3I6IHJnYmEoNjcsIDg5LCAxMTMsIDAuOCk7XG4gIGJvcmRlci1jb2xvcjogdHJhbnNwYXJlbnQ7XG59XG4uZHJvcGRvd24tbWVudS1kYXJrIC5kcm9wZG93bi1pdGVtIHtcbiAgY29sb3I6IHJnYmEoNjcsIDg5LCAxMTMsIDAuMyk7XG59XG4uZHJvcGRvd24tbWVudS1kYXJrIC5kcm9wZG93bi1pdGVtOmhvdmVyLCAuZHJvcGRvd24tbWVudS1kYXJrIC5kcm9wZG93bi1pdGVtOmZvY3VzIHtcbiAgY29sb3I6ICNmZmY7XG4gIGJhY2tncm91bmQtY29sb3I6IHJnYmEoMjU1LCAyNTUsIDI1NSwgMC4xNSk7XG59XG4uZHJvcGRvd24tbWVudS1kYXJrIC5kcm9wZG93bi1pdGVtLmFjdGl2ZSwgLmRyb3Bkb3duLW1lbnUtZGFyayAuZHJvcGRvd24taXRlbTphY3RpdmUge1xuICBjb2xvcjogI2ZmZjtcbiAgYmFja2dyb3VuZC1jb2xvcjogcmdiYSgxMDUsIDEwOCwgMjU1LCAwLjA4KTtcbn1cbi5kcm9wZG93bi1tZW51LWRhcmsgLmRyb3Bkb3duLWl0ZW0uZGlzYWJsZWQsIC5kcm9wZG93bi1tZW51LWRhcmsgLmRyb3Bkb3duLWl0ZW06ZGlzYWJsZWQge1xuICBjb2xvcjogcmdiYSg2NywgODksIDExMywgMC41KTtcbn1cbi5kcm9wZG93bi1tZW51LWRhcmsgLmRyb3Bkb3duLWRpdmlkZXIge1xuICBib3JkZXItY29sb3I6ICNkOWRlZTM7XG59XG4uZHJvcGRvd24tbWVudS1kYXJrIC5kcm9wZG93bi1pdGVtLXRleHQge1xuICBjb2xvcjogcmdiYSg2NywgODksIDExMywgMC4zKTtcbn1cbi5kcm9wZG93bi1tZW51LWRhcmsgLmRyb3Bkb3duLWhlYWRlciB7XG4gIGNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjUpO1xufVxuXG4uYnRuLWdyb3VwLFxuLmJ0bi1ncm91cC12ZXJ0aWNhbCB7XG4gIHBvc2l0aW9uOiByZWxhdGl2ZTtcbiAgZGlzcGxheTogaW5saW5lLWZsZXg7XG4gIHZlcnRpY2FsLWFsaWduOiBtaWRkbGU7XG59XG4uYnRuLWdyb3VwID4gLmJ0bixcbi5idG4tZ3JvdXAtdmVydGljYWwgPiAuYnRuIHtcbiAgcG9zaXRpb246IHJlbGF0aXZlO1xuICBmbGV4OiAxIDEgYXV0bztcbn1cbi5idG4tZ3JvdXAgPiAuYnRuLWNoZWNrOmNoZWNrZWQgKyAuYnRuLFxuLmJ0bi1ncm91cCA+IC5idG4tY2hlY2s6Zm9jdXMgKyAuYnRuLFxuLmJ0bi1ncm91cCA+IC5idG46aG92ZXIsXG4uYnRuLWdyb3VwID4gLmJ0bjpmb2N1cyxcbi5idG4tZ3JvdXAgPiAuYnRuOmFjdGl2ZSxcbi5idG4tZ3JvdXAgPiAuYnRuLmFjdGl2ZSxcbi5idG4tZ3JvdXAtdmVydGljYWwgPiAuYnRuLWNoZWNrOmNoZWNrZWQgKyAuYnRuLFxuLmJ0bi1ncm91cC12ZXJ0aWNhbCA+IC5idG4tY2hlY2s6Zm9jdXMgKyAuYnRuLFxuLmJ0bi1ncm91cC12ZXJ0aWNhbCA+IC5idG46aG92ZXIsXG4uYnRuLWdyb3VwLXZlcnRpY2FsID4gLmJ0bjpmb2N1cyxcbi5idG4tZ3JvdXAtdmVydGljYWwgPiAuYnRuOmFjdGl2ZSxcbi5idG4tZ3JvdXAtdmVydGljYWwgPiAuYnRuLmFjdGl2ZSB7XG4gIHotaW5kZXg6IDE7XG59XG5cbi5idG4tdG9vbGJhciB7XG4gIGRpc3BsYXk6IGZsZXg7XG4gIGZsZXgtd3JhcDogd3JhcDtcbiAganVzdGlmeS1jb250ZW50OiBmbGV4LXN0YXJ0O1xufVxuLmJ0bi10b29sYmFyIC5pbnB1dC1ncm91cCB7XG4gIHdpZHRoOiBhdXRvO1xufVxuXG4uYnRuLWdyb3VwID4gLmJ0bjpub3QoOmZpcnN0LWNoaWxkKSxcbi5idG4tZ3JvdXAgPiAuYnRuLWdyb3VwOm5vdCg6Zmlyc3QtY2hpbGQpIHtcbiAgbWFyZ2luLWxlZnQ6IC0xcHg7XG59XG4uYnRuLWdyb3VwID4gLmJ0bjpub3QoOmxhc3QtY2hpbGQpOm5vdCguZHJvcGRvd24tdG9nZ2xlKSxcbi5idG4tZ3JvdXAgPiAuYnRuLWdyb3VwOm5vdCg6bGFzdC1jaGlsZCkgPiAuYnRuIHtcbiAgYm9yZGVyLXRvcC1yaWdodC1yYWRpdXM6IDA7XG4gIGJvcmRlci1ib3R0b20tcmlnaHQtcmFkaXVzOiAwO1xufVxuLmJ0bi1ncm91cCA+IC5idG46bnRoLWNoaWxkKG4rMyksXG4uYnRuLWdyb3VwID4gOm5vdCguYnRuLWNoZWNrKSArIC5idG4sXG4uYnRuLWdyb3VwID4gLmJ0bi1ncm91cDpub3QoOmZpcnN0LWNoaWxkKSA+IC5idG4ge1xuICBib3JkZXItdG9wLWxlZnQtcmFkaXVzOiAwO1xuICBib3JkZXItYm90dG9tLWxlZnQtcmFkaXVzOiAwO1xufVxuXG4uZHJvcGRvd24tdG9nZ2xlLXNwbGl0IHtcbiAgcGFkZGluZy1yaWdodDogMC45Mzc1cmVtO1xuICBwYWRkaW5nLWxlZnQ6IDAuOTM3NXJlbTtcbn1cbi5kcm9wZG93bi10b2dnbGUtc3BsaXQ6OmFmdGVyLCAuZHJvcHVwIC5kcm9wZG93bi10b2dnbGUtc3BsaXQ6OmFmdGVyLCAuZHJvcGVuZCAuZHJvcGRvd24tdG9nZ2xlLXNwbGl0OjphZnRlciB7XG4gIG1hcmdpbi1sZWZ0OiAwO1xufVxuLmRyb3BzdGFydCAuZHJvcGRvd24tdG9nZ2xlLXNwbGl0OjpiZWZvcmUge1xuICBtYXJnaW4tcmlnaHQ6IDA7XG59XG5cbi5idG4tc20gKyAuZHJvcGRvd24tdG9nZ2xlLXNwbGl0LCAuYnRuLWdyb3VwLXNtID4gLmJ0biArIC5kcm9wZG93bi10b2dnbGUtc3BsaXQge1xuICBwYWRkaW5nLXJpZ2h0OiAwLjUxNTYyNXJlbTtcbiAgcGFkZGluZy1sZWZ0OiAwLjUxNTYyNXJlbTtcbn1cblxuLmJ0bi1sZyArIC5kcm9wZG93bi10b2dnbGUtc3BsaXQsIC5idG4tZ3JvdXAtbGcgPiAuYnRuICsgLmRyb3Bkb3duLXRvZ2dsZS1zcGxpdCB7XG4gIHBhZGRpbmctcmlnaHQ6IDEuMTI1cmVtO1xuICBwYWRkaW5nLWxlZnQ6IDEuMTI1cmVtO1xufVxuXG4uYnRuLWdyb3VwLXZlcnRpY2FsIHtcbiAgZmxleC1kaXJlY3Rpb246IGNvbHVtbjtcbiAgYWxpZ24taXRlbXM6IGZsZXgtc3RhcnQ7XG4gIGp1c3RpZnktY29udGVudDogY2VudGVyO1xufVxuLmJ0bi1ncm91cC12ZXJ0aWNhbCA+IC5idG4sXG4uYnRuLWdyb3VwLXZlcnRpY2FsID4gLmJ0bi1ncm91cCB7XG4gIHdpZHRoOiAxMDAlO1xufVxuLmJ0bi1ncm91cC12ZXJ0aWNhbCA+IC5idG46bm90KDpmaXJzdC1jaGlsZCksXG4uYnRuLWdyb3VwLXZlcnRpY2FsID4gLmJ0bi1ncm91cDpub3QoOmZpcnN0LWNoaWxkKSB7XG4gIG1hcmdpbi10b3A6IC0xcHg7XG59XG4uYnRuLWdyb3VwLXZlcnRpY2FsID4gLmJ0bjpub3QoOmxhc3QtY2hpbGQpOm5vdCguZHJvcGRvd24tdG9nZ2xlKSxcbi5idG4tZ3JvdXAtdmVydGljYWwgPiAuYnRuLWdyb3VwOm5vdCg6bGFzdC1jaGlsZCkgPiAuYnRuIHtcbiAgYm9yZGVyLWJvdHRvbS1yaWdodC1yYWRpdXM6IDA7XG4gIGJvcmRlci1ib3R0b20tbGVmdC1yYWRpdXM6IDA7XG59XG4uYnRuLWdyb3VwLXZlcnRpY2FsID4gLmJ0biB+IC5idG4sXG4uYnRuLWdyb3VwLXZlcnRpY2FsID4gLmJ0bi1ncm91cDpub3QoOmZpcnN0LWNoaWxkKSA+IC5idG4ge1xuICBib3JkZXItdG9wLWxlZnQtcmFkaXVzOiAwO1xuICBib3JkZXItdG9wLXJpZ2h0LXJhZGl1czogMDtcbn1cblxuLm5hdiB7XG4gIGRpc3BsYXk6IGZsZXg7XG4gIGZsZXgtd3JhcDogd3JhcDtcbiAgcGFkZGluZy1sZWZ0OiAwO1xuICBtYXJnaW4tYm90dG9tOiAwO1xuICBsaXN0LXN0eWxlOiBub25lO1xufVxuXG4ubmF2LWxpbmsge1xuICBkaXNwbGF5OiBibG9jaztcbiAgcGFkZGluZzogMC41cmVtIDEuMjVyZW07XG4gIGNvbG9yOiAjOGU5YmFhO1xuICB0cmFuc2l0aW9uOiBjb2xvciAwLjE1cyBlYXNlLWluLW91dCwgYmFja2dyb3VuZC1jb2xvciAwLjE1cyBlYXNlLWluLW91dCwgYm9yZGVyLWNvbG9yIDAuMTVzIGVhc2UtaW4tb3V0O1xufVxuQG1lZGlhIChwcmVmZXJzLXJlZHVjZWQtbW90aW9uOiByZWR1Y2UpIHtcbiAgLm5hdi1saW5rIHtcbiAgICB0cmFuc2l0aW9uOiBub25lO1xuICB9XG59XG4ubmF2LWxpbms6aG92ZXIsIC5uYXYtbGluazpmb2N1cyB7XG4gIGNvbG9yOiAjNWY2MWU2O1xufVxuLm5hdi1saW5rLmRpc2FibGVkIHtcbiAgY29sb3I6ICNjN2NkZDQ7XG4gIHBvaW50ZXItZXZlbnRzOiBub25lO1xuICBjdXJzb3I6IGRlZmF1bHQ7XG59XG5cbi5uYXYtdGFicyB7XG4gIGJvcmRlci1ib3R0b206IDFweCBzb2xpZCAjZmZmO1xufVxuLm5hdi10YWJzIC5uYXYtbGluayB7XG4gIG1hcmdpbi1ib3R0b206IC0xcHg7XG4gIGJhY2tncm91bmQ6IG5vbmU7XG4gIGJvcmRlcjogMXB4IHNvbGlkIHRyYW5zcGFyZW50O1xuICBib3JkZXItdG9wLWxlZnQtcmFkaXVzOiAwLjM3NXJlbTtcbiAgYm9yZGVyLXRvcC1yaWdodC1yYWRpdXM6IDAuMzc1cmVtO1xufVxuLm5hdi10YWJzIC5uYXYtbGluazpob3ZlciwgLm5hdi10YWJzIC5uYXYtbGluazpmb2N1cyB7XG4gIGJvcmRlci1jb2xvcjogcmdiYSg2NywgODksIDExMywgMC4xKTtcbiAgaXNvbGF0aW9uOiBpc29sYXRlO1xufVxuLm5hdi10YWJzIC5uYXYtbGluay5kaXNhYmxlZCB7XG4gIGNvbG9yOiAjYzdjZGQ0O1xuICBiYWNrZ3JvdW5kLWNvbG9yOiB0cmFuc3BhcmVudDtcbiAgYm9yZGVyLWNvbG9yOiB0cmFuc3BhcmVudDtcbn1cbi5uYXYtdGFicyAubmF2LWxpbmsuYWN0aXZlLFxuLm5hdi10YWJzIC5uYXYtaXRlbS5zaG93IC5uYXYtbGluayB7XG4gIGNvbG9yOiAjNjk3YThkO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmO1xuICBib3JkZXItY29sb3I6ICNmZmY7XG59XG4ubmF2LXRhYnMgLmRyb3Bkb3duLW1lbnUge1xuICBtYXJnaW4tdG9wOiAtMXB4O1xuICBib3JkZXItdG9wLWxlZnQtcmFkaXVzOiAwO1xuICBib3JkZXItdG9wLXJpZ2h0LXJhZGl1czogMDtcbn1cblxuLm5hdi1waWxscyAubmF2LWxpbmsge1xuICBiYWNrZ3JvdW5kOiBub25lO1xuICBib3JkZXI6IDA7XG4gIGJvcmRlci1yYWRpdXM6IDAuMzc1cmVtO1xufVxuLm5hdi1waWxscyAubmF2LWxpbmsuYWN0aXZlLFxuLm5hdi1waWxscyAuc2hvdyA+IC5uYXYtbGluayB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiB0cmFuc3BhcmVudDtcbn1cblxuLm5hdi1maWxsID4gLm5hdi1saW5rLFxuLm5hdi1maWxsIC5uYXYtaXRlbSB7XG4gIGZsZXg6IDEgMSBhdXRvO1xuICB0ZXh0LWFsaWduOiBjZW50ZXI7XG59XG5cbi5uYXYtanVzdGlmaWVkID4gLm5hdi1saW5rLFxuLm5hdi1qdXN0aWZpZWQgLm5hdi1pdGVtIHtcbiAgZmxleC1iYXNpczogMDtcbiAgZmxleC1ncm93OiAxO1xuICB0ZXh0LWFsaWduOiBjZW50ZXI7XG59XG5cbi5uYXYtZmlsbCAubmF2LWl0ZW0gLm5hdi1saW5rLFxuLm5hdi1qdXN0aWZpZWQgLm5hdi1pdGVtIC5uYXYtbGluayB7XG4gIHdpZHRoOiAxMDAlO1xufVxuXG4udGFiLWNvbnRlbnQgPiAudGFiLXBhbmUge1xuICBkaXNwbGF5OiBub25lO1xufVxuLnRhYi1jb250ZW50ID4gLmFjdGl2ZSB7XG4gIGRpc3BsYXk6IGJsb2NrO1xufVxuXG4ubmF2YmFyIHtcbiAgcG9zaXRpb246IHJlbGF0aXZlO1xuICBkaXNwbGF5OiBmbGV4O1xuICBmbGV4LXdyYXA6IHdyYXA7XG4gIGFsaWduLWl0ZW1zOiBjZW50ZXI7XG4gIGp1c3RpZnktY29udGVudDogc3BhY2UtYmV0d2VlbjtcbiAgcGFkZGluZy10b3A6IDAuNXJlbTtcbiAgcGFkZGluZy1ib3R0b206IDAuNXJlbTtcbn1cbi5uYXZiYXIgPiAuY29udGFpbmVyLFxuLm5hdmJhciA+IC5jb250YWluZXItZmx1aWQsXG4ubmF2YmFyID4gLmNvbnRhaW5lci1zbSxcbi5uYXZiYXIgPiAuY29udGFpbmVyLW1kLFxuLm5hdmJhciA+IC5jb250YWluZXItbGcsXG4ubmF2YmFyID4gLmNvbnRhaW5lci14bCxcbi5uYXZiYXIgPiAuY29udGFpbmVyLXh4bCB7XG4gIGRpc3BsYXk6IGZsZXg7XG4gIGZsZXgtd3JhcDogaW5oZXJpdDtcbiAgYWxpZ24taXRlbXM6IGNlbnRlcjtcbiAganVzdGlmeS1jb250ZW50OiBzcGFjZS1iZXR3ZWVuO1xufVxuLm5hdmJhci1icmFuZCB7XG4gIHBhZGRpbmctdG9wOiAwLjQ1MjE4NzVyZW07XG4gIHBhZGRpbmctYm90dG9tOiAwLjQ1MjE4NzVyZW07XG4gIG1hcmdpbi1yaWdodDogMXJlbTtcbiAgZm9udC1zaXplOiAxcmVtO1xuICB3aGl0ZS1zcGFjZTogbm93cmFwO1xufVxuLm5hdmJhci1uYXYge1xuICBkaXNwbGF5OiBmbGV4O1xuICBmbGV4LWRpcmVjdGlvbjogY29sdW1uO1xuICBwYWRkaW5nLWxlZnQ6IDA7XG4gIG1hcmdpbi1ib3R0b206IDA7XG4gIGxpc3Qtc3R5bGU6IG5vbmU7XG59XG4ubmF2YmFyLW5hdiAubmF2LWxpbmsge1xuICBwYWRkaW5nLXJpZ2h0OiAwO1xuICBwYWRkaW5nLWxlZnQ6IDA7XG59XG4ubmF2YmFyLW5hdiAuZHJvcGRvd24tbWVudSB7XG4gIHBvc2l0aW9uOiBzdGF0aWM7XG59XG5cbi5uYXZiYXItdGV4dCB7XG4gIHBhZGRpbmctdG9wOiAwLjVyZW07XG4gIHBhZGRpbmctYm90dG9tOiAwLjVyZW07XG59XG5cbi5uYXZiYXItY29sbGFwc2Uge1xuICBmbGV4LWJhc2lzOiAxMDAlO1xuICBmbGV4LWdyb3c6IDE7XG4gIGFsaWduLWl0ZW1zOiBjZW50ZXI7XG59XG5cbi5uYXZiYXItdG9nZ2xlciB7XG4gIHBhZGRpbmc6IDAgMDtcbiAgZm9udC1zaXplOiAwLjc1cmVtO1xuICBsaW5lLWhlaWdodDogMTtcbiAgYmFja2dyb3VuZC1jb2xvcjogdHJhbnNwYXJlbnQ7XG4gIGJvcmRlcjogMXB4IHNvbGlkIHRyYW5zcGFyZW50O1xuICBib3JkZXItcmFkaXVzOiAwLjM3NXJlbTtcbiAgdHJhbnNpdGlvbjogYm94LXNoYWRvdyAwLjE1cyBlYXNlLWluLW91dDtcbn1cbkBtZWRpYSAocHJlZmVycy1yZWR1Y2VkLW1vdGlvbjogcmVkdWNlKSB7XG4gIC5uYXZiYXItdG9nZ2xlciB7XG4gICAgdHJhbnNpdGlvbjogbm9uZTtcbiAgfVxufVxuLm5hdmJhci10b2dnbGVyOmhvdmVyIHtcbiAgdGV4dC1kZWNvcmF0aW9uOiBub25lO1xufVxuLm5hdmJhci10b2dnbGVyOmZvY3VzIHtcbiAgdGV4dC1kZWNvcmF0aW9uOiBub25lO1xuICBvdXRsaW5lOiAwO1xuICBib3gtc2hhZG93OiAwIDAgMCAwLjA1cmVtO1xufVxuXG4ubmF2YmFyLXRvZ2dsZXItaWNvbiB7XG4gIGRpc3BsYXk6IGlubGluZS1ibG9jaztcbiAgd2lkdGg6IDEuNWVtO1xuICBoZWlnaHQ6IDEuNWVtO1xuICB2ZXJ0aWNhbC1hbGlnbjogbWlkZGxlO1xuICBiYWNrZ3JvdW5kLXJlcGVhdDogbm8tcmVwZWF0O1xuICBiYWNrZ3JvdW5kLXBvc2l0aW9uOiBjZW50ZXI7XG4gIGJhY2tncm91bmQtc2l6ZTogMTAwJTtcbn1cblxuLm5hdmJhci1uYXYtc2Nyb2xsIHtcbiAgbWF4LWhlaWdodDogdmFyKC0tYnMtc2Nyb2xsLWhlaWdodCwgNzV2aCk7XG4gIG92ZXJmbG93LXk6IGF1dG87XG59XG5cbkBtZWRpYSAobWluLXdpZHRoOiA1NzZweCkge1xuICAubmF2YmFyLWV4cGFuZC1zbSB7XG4gICAgZmxleC13cmFwOiBub3dyYXA7XG4gICAganVzdGlmeS1jb250ZW50OiBmbGV4LXN0YXJ0O1xuICB9XG4gIC5uYXZiYXItZXhwYW5kLXNtIC5uYXZiYXItbmF2IHtcbiAgICBmbGV4LWRpcmVjdGlvbjogcm93O1xuICB9XG4gIC5uYXZiYXItZXhwYW5kLXNtIC5uYXZiYXItbmF2IC5kcm9wZG93bi1tZW51IHtcbiAgICBwb3NpdGlvbjogYWJzb2x1dGU7XG4gIH1cbiAgLm5hdmJhci1leHBhbmQtc20gLm5hdmJhci1uYXYgLm5hdi1saW5rIHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAwLjVyZW07XG4gICAgcGFkZGluZy1sZWZ0OiAwLjVyZW07XG4gIH1cbiAgLm5hdmJhci1leHBhbmQtc20gLm5hdmJhci1uYXYtc2Nyb2xsIHtcbiAgICBvdmVyZmxvdzogdmlzaWJsZTtcbiAgfVxuICAubmF2YmFyLWV4cGFuZC1zbSAubmF2YmFyLWNvbGxhcHNlIHtcbiAgICBkaXNwbGF5OiBmbGV4ICFpbXBvcnRhbnQ7XG4gICAgZmxleC1iYXNpczogYXV0bztcbiAgfVxuICAubmF2YmFyLWV4cGFuZC1zbSAubmF2YmFyLXRvZ2dsZXIge1xuICAgIGRpc3BsYXk6IG5vbmU7XG4gIH1cbiAgLm5hdmJhci1leHBhbmQtc20gLm9mZmNhbnZhcy1oZWFkZXIge1xuICAgIGRpc3BsYXk6IG5vbmU7XG4gIH1cbiAgLm5hdmJhci1leHBhbmQtc20gLm9mZmNhbnZhcyB7XG4gICAgcG9zaXRpb246IGluaGVyaXQ7XG4gICAgYm90dG9tOiAwO1xuICAgIHotaW5kZXg6IDEwMDA7XG4gICAgZmxleC1ncm93OiAxO1xuICAgIHZpc2liaWxpdHk6IHZpc2libGUgIWltcG9ydGFudDtcbiAgICBiYWNrZ3JvdW5kLWNvbG9yOiB0cmFuc3BhcmVudDtcbiAgICBib3JkZXItcmlnaHQ6IDA7XG4gICAgYm9yZGVyLWxlZnQ6IDA7XG4gICAgdHJhbnNpdGlvbjogbm9uZTtcbiAgICB0cmFuc2Zvcm06IG5vbmU7XG4gIH1cbiAgLm5hdmJhci1leHBhbmQtc20gLm9mZmNhbnZhcy10b3AsXG4ubmF2YmFyLWV4cGFuZC1zbSAub2ZmY2FudmFzLWJvdHRvbSB7XG4gICAgaGVpZ2h0OiBhdXRvO1xuICAgIGJvcmRlci10b3A6IDA7XG4gICAgYm9yZGVyLWJvdHRvbTogMDtcbiAgfVxuICAubmF2YmFyLWV4cGFuZC1zbSAub2ZmY2FudmFzLWJvZHkge1xuICAgIGRpc3BsYXk6IGZsZXg7XG4gICAgZmxleC1ncm93OiAwO1xuICAgIHBhZGRpbmc6IDA7XG4gICAgb3ZlcmZsb3cteTogdmlzaWJsZTtcbiAgfVxufVxuQG1lZGlhIChtaW4td2lkdGg6IDc2OHB4KSB7XG4gIC5uYXZiYXItZXhwYW5kLW1kIHtcbiAgICBmbGV4LXdyYXA6IG5vd3JhcDtcbiAgICBqdXN0aWZ5LWNvbnRlbnQ6IGZsZXgtc3RhcnQ7XG4gIH1cbiAgLm5hdmJhci1leHBhbmQtbWQgLm5hdmJhci1uYXYge1xuICAgIGZsZXgtZGlyZWN0aW9uOiByb3c7XG4gIH1cbiAgLm5hdmJhci1leHBhbmQtbWQgLm5hdmJhci1uYXYgLmRyb3Bkb3duLW1lbnUge1xuICAgIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgfVxuICAubmF2YmFyLWV4cGFuZC1tZCAubmF2YmFyLW5hdiAubmF2LWxpbmsge1xuICAgIHBhZGRpbmctcmlnaHQ6IDAuNXJlbTtcbiAgICBwYWRkaW5nLWxlZnQ6IDAuNXJlbTtcbiAgfVxuICAubmF2YmFyLWV4cGFuZC1tZCAubmF2YmFyLW5hdi1zY3JvbGwge1xuICAgIG92ZXJmbG93OiB2aXNpYmxlO1xuICB9XG4gIC5uYXZiYXItZXhwYW5kLW1kIC5uYXZiYXItY29sbGFwc2Uge1xuICAgIGRpc3BsYXk6IGZsZXggIWltcG9ydGFudDtcbiAgICBmbGV4LWJhc2lzOiBhdXRvO1xuICB9XG4gIC5uYXZiYXItZXhwYW5kLW1kIC5uYXZiYXItdG9nZ2xlciB7XG4gICAgZGlzcGxheTogbm9uZTtcbiAgfVxuICAubmF2YmFyLWV4cGFuZC1tZCAub2ZmY2FudmFzLWhlYWRlciB7XG4gICAgZGlzcGxheTogbm9uZTtcbiAgfVxuICAubmF2YmFyLWV4cGFuZC1tZCAub2ZmY2FudmFzIHtcbiAgICBwb3NpdGlvbjogaW5oZXJpdDtcbiAgICBib3R0b206IDA7XG4gICAgei1pbmRleDogMTAwMDtcbiAgICBmbGV4LWdyb3c6IDE7XG4gICAgdmlzaWJpbGl0eTogdmlzaWJsZSAhaW1wb3J0YW50O1xuICAgIGJhY2tncm91bmQtY29sb3I6IHRyYW5zcGFyZW50O1xuICAgIGJvcmRlci1yaWdodDogMDtcbiAgICBib3JkZXItbGVmdDogMDtcbiAgICB0cmFuc2l0aW9uOiBub25lO1xuICAgIHRyYW5zZm9ybTogbm9uZTtcbiAgfVxuICAubmF2YmFyLWV4cGFuZC1tZCAub2ZmY2FudmFzLXRvcCxcbi5uYXZiYXItZXhwYW5kLW1kIC5vZmZjYW52YXMtYm90dG9tIHtcbiAgICBoZWlnaHQ6IGF1dG87XG4gICAgYm9yZGVyLXRvcDogMDtcbiAgICBib3JkZXItYm90dG9tOiAwO1xuICB9XG4gIC5uYXZiYXItZXhwYW5kLW1kIC5vZmZjYW52YXMtYm9keSB7XG4gICAgZGlzcGxheTogZmxleDtcbiAgICBmbGV4LWdyb3c6IDA7XG4gICAgcGFkZGluZzogMDtcbiAgICBvdmVyZmxvdy15OiB2aXNpYmxlO1xuICB9XG59XG5AbWVkaWEgKG1pbi13aWR0aDogOTkycHgpIHtcbiAgLm5hdmJhci1leHBhbmQtbGcge1xuICAgIGZsZXgtd3JhcDogbm93cmFwO1xuICAgIGp1c3RpZnktY29udGVudDogZmxleC1zdGFydDtcbiAgfVxuICAubmF2YmFyLWV4cGFuZC1sZyAubmF2YmFyLW5hdiB7XG4gICAgZmxleC1kaXJlY3Rpb246IHJvdztcbiAgfVxuICAubmF2YmFyLWV4cGFuZC1sZyAubmF2YmFyLW5hdiAuZHJvcGRvd24tbWVudSB7XG4gICAgcG9zaXRpb246IGFic29sdXRlO1xuICB9XG4gIC5uYXZiYXItZXhwYW5kLWxnIC5uYXZiYXItbmF2IC5uYXYtbGluayB7XG4gICAgcGFkZGluZy1yaWdodDogMC41cmVtO1xuICAgIHBhZGRpbmctbGVmdDogMC41cmVtO1xuICB9XG4gIC5uYXZiYXItZXhwYW5kLWxnIC5uYXZiYXItbmF2LXNjcm9sbCB7XG4gICAgb3ZlcmZsb3c6IHZpc2libGU7XG4gIH1cbiAgLm5hdmJhci1leHBhbmQtbGcgLm5hdmJhci1jb2xsYXBzZSB7XG4gICAgZGlzcGxheTogZmxleCAhaW1wb3J0YW50O1xuICAgIGZsZXgtYmFzaXM6IGF1dG87XG4gIH1cbiAgLm5hdmJhci1leHBhbmQtbGcgLm5hdmJhci10b2dnbGVyIHtcbiAgICBkaXNwbGF5OiBub25lO1xuICB9XG4gIC5uYXZiYXItZXhwYW5kLWxnIC5vZmZjYW52YXMtaGVhZGVyIHtcbiAgICBkaXNwbGF5OiBub25lO1xuICB9XG4gIC5uYXZiYXItZXhwYW5kLWxnIC5vZmZjYW52YXMge1xuICAgIHBvc2l0aW9uOiBpbmhlcml0O1xuICAgIGJvdHRvbTogMDtcbiAgICB6LWluZGV4OiAxMDAwO1xuICAgIGZsZXgtZ3JvdzogMTtcbiAgICB2aXNpYmlsaXR5OiB2aXNpYmxlICFpbXBvcnRhbnQ7XG4gICAgYmFja2dyb3VuZC1jb2xvcjogdHJhbnNwYXJlbnQ7XG4gICAgYm9yZGVyLXJpZ2h0OiAwO1xuICAgIGJvcmRlci1sZWZ0OiAwO1xuICAgIHRyYW5zaXRpb246IG5vbmU7XG4gICAgdHJhbnNmb3JtOiBub25lO1xuICB9XG4gIC5uYXZiYXItZXhwYW5kLWxnIC5vZmZjYW52YXMtdG9wLFxuLm5hdmJhci1leHBhbmQtbGcgLm9mZmNhbnZhcy1ib3R0b20ge1xuICAgIGhlaWdodDogYXV0bztcbiAgICBib3JkZXItdG9wOiAwO1xuICAgIGJvcmRlci1ib3R0b206IDA7XG4gIH1cbiAgLm5hdmJhci1leHBhbmQtbGcgLm9mZmNhbnZhcy1ib2R5IHtcbiAgICBkaXNwbGF5OiBmbGV4O1xuICAgIGZsZXgtZ3JvdzogMDtcbiAgICBwYWRkaW5nOiAwO1xuICAgIG92ZXJmbG93LXk6IHZpc2libGU7XG4gIH1cbn1cbkBtZWRpYSAobWluLXdpZHRoOiAxMjAwcHgpIHtcbiAgLm5hdmJhci1leHBhbmQteGwge1xuICAgIGZsZXgtd3JhcDogbm93cmFwO1xuICAgIGp1c3RpZnktY29udGVudDogZmxleC1zdGFydDtcbiAgfVxuICAubmF2YmFyLWV4cGFuZC14bCAubmF2YmFyLW5hdiB7XG4gICAgZmxleC1kaXJlY3Rpb246IHJvdztcbiAgfVxuICAubmF2YmFyLWV4cGFuZC14bCAubmF2YmFyLW5hdiAuZHJvcGRvd24tbWVudSB7XG4gICAgcG9zaXRpb246IGFic29sdXRlO1xuICB9XG4gIC5uYXZiYXItZXhwYW5kLXhsIC5uYXZiYXItbmF2IC5uYXYtbGluayB7XG4gICAgcGFkZGluZy1yaWdodDogMC41cmVtO1xuICAgIHBhZGRpbmctbGVmdDogMC41cmVtO1xuICB9XG4gIC5uYXZiYXItZXhwYW5kLXhsIC5uYXZiYXItbmF2LXNjcm9sbCB7XG4gICAgb3ZlcmZsb3c6IHZpc2libGU7XG4gIH1cbiAgLm5hdmJhci1leHBhbmQteGwgLm5hdmJhci1jb2xsYXBzZSB7XG4gICAgZGlzcGxheTogZmxleCAhaW1wb3J0YW50O1xuICAgIGZsZXgtYmFzaXM6IGF1dG87XG4gIH1cbiAgLm5hdmJhci1leHBhbmQteGwgLm5hdmJhci10b2dnbGVyIHtcbiAgICBkaXNwbGF5OiBub25lO1xuICB9XG4gIC5uYXZiYXItZXhwYW5kLXhsIC5vZmZjYW52YXMtaGVhZGVyIHtcbiAgICBkaXNwbGF5OiBub25lO1xuICB9XG4gIC5uYXZiYXItZXhwYW5kLXhsIC5vZmZjYW52YXMge1xuICAgIHBvc2l0aW9uOiBpbmhlcml0O1xuICAgIGJvdHRvbTogMDtcbiAgICB6LWluZGV4OiAxMDAwO1xuICAgIGZsZXgtZ3JvdzogMTtcbiAgICB2aXNpYmlsaXR5OiB2aXNpYmxlICFpbXBvcnRhbnQ7XG4gICAgYmFja2dyb3VuZC1jb2xvcjogdHJhbnNwYXJlbnQ7XG4gICAgYm9yZGVyLXJpZ2h0OiAwO1xuICAgIGJvcmRlci1sZWZ0OiAwO1xuICAgIHRyYW5zaXRpb246IG5vbmU7XG4gICAgdHJhbnNmb3JtOiBub25lO1xuICB9XG4gIC5uYXZiYXItZXhwYW5kLXhsIC5vZmZjYW52YXMtdG9wLFxuLm5hdmJhci1leHBhbmQteGwgLm9mZmNhbnZhcy1ib3R0b20ge1xuICAgIGhlaWdodDogYXV0bztcbiAgICBib3JkZXItdG9wOiAwO1xuICAgIGJvcmRlci1ib3R0b206IDA7XG4gIH1cbiAgLm5hdmJhci1leHBhbmQteGwgLm9mZmNhbnZhcy1ib2R5IHtcbiAgICBkaXNwbGF5OiBmbGV4O1xuICAgIGZsZXgtZ3JvdzogMDtcbiAgICBwYWRkaW5nOiAwO1xuICAgIG92ZXJmbG93LXk6IHZpc2libGU7XG4gIH1cbn1cbkBtZWRpYSAobWluLXdpZHRoOiAxNDAwcHgpIHtcbiAgLm5hdmJhci1leHBhbmQteHhsIHtcbiAgICBmbGV4LXdyYXA6IG5vd3JhcDtcbiAgICBqdXN0aWZ5LWNvbnRlbnQ6IGZsZXgtc3RhcnQ7XG4gIH1cbiAgLm5hdmJhci1leHBhbmQteHhsIC5uYXZiYXItbmF2IHtcbiAgICBmbGV4LWRpcmVjdGlvbjogcm93O1xuICB9XG4gIC5uYXZiYXItZXhwYW5kLXh4bCAubmF2YmFyLW5hdiAuZHJvcGRvd24tbWVudSB7XG4gICAgcG9zaXRpb246IGFic29sdXRlO1xuICB9XG4gIC5uYXZiYXItZXhwYW5kLXh4bCAubmF2YmFyLW5hdiAubmF2LWxpbmsge1xuICAgIHBhZGRpbmctcmlnaHQ6IDAuNXJlbTtcbiAgICBwYWRkaW5nLWxlZnQ6IDAuNXJlbTtcbiAgfVxuICAubmF2YmFyLWV4cGFuZC14eGwgLm5hdmJhci1uYXYtc2Nyb2xsIHtcbiAgICBvdmVyZmxvdzogdmlzaWJsZTtcbiAgfVxuICAubmF2YmFyLWV4cGFuZC14eGwgLm5hdmJhci1jb2xsYXBzZSB7XG4gICAgZGlzcGxheTogZmxleCAhaW1wb3J0YW50O1xuICAgIGZsZXgtYmFzaXM6IGF1dG87XG4gIH1cbiAgLm5hdmJhci1leHBhbmQteHhsIC5uYXZiYXItdG9nZ2xlciB7XG4gICAgZGlzcGxheTogbm9uZTtcbiAgfVxuICAubmF2YmFyLWV4cGFuZC14eGwgLm9mZmNhbnZhcy1oZWFkZXIge1xuICAgIGRpc3BsYXk6IG5vbmU7XG4gIH1cbiAgLm5hdmJhci1leHBhbmQteHhsIC5vZmZjYW52YXMge1xuICAgIHBvc2l0aW9uOiBpbmhlcml0O1xuICAgIGJvdHRvbTogMDtcbiAgICB6LWluZGV4OiAxMDAwO1xuICAgIGZsZXgtZ3JvdzogMTtcbiAgICB2aXNpYmlsaXR5OiB2aXNpYmxlICFpbXBvcnRhbnQ7XG4gICAgYmFja2dyb3VuZC1jb2xvcjogdHJhbnNwYXJlbnQ7XG4gICAgYm9yZGVyLXJpZ2h0OiAwO1xuICAgIGJvcmRlci1sZWZ0OiAwO1xuICAgIHRyYW5zaXRpb246IG5vbmU7XG4gICAgdHJhbnNmb3JtOiBub25lO1xuICB9XG4gIC5uYXZiYXItZXhwYW5kLXh4bCAub2ZmY2FudmFzLXRvcCxcbi5uYXZiYXItZXhwYW5kLXh4bCAub2ZmY2FudmFzLWJvdHRvbSB7XG4gICAgaGVpZ2h0OiBhdXRvO1xuICAgIGJvcmRlci10b3A6IDA7XG4gICAgYm9yZGVyLWJvdHRvbTogMDtcbiAgfVxuICAubmF2YmFyLWV4cGFuZC14eGwgLm9mZmNhbnZhcy1ib2R5IHtcbiAgICBkaXNwbGF5OiBmbGV4O1xuICAgIGZsZXgtZ3JvdzogMDtcbiAgICBwYWRkaW5nOiAwO1xuICAgIG92ZXJmbG93LXk6IHZpc2libGU7XG4gIH1cbn1cbi5uYXZiYXItZXhwYW5kIHtcbiAgZmxleC13cmFwOiBub3dyYXA7XG4gIGp1c3RpZnktY29udGVudDogZmxleC1zdGFydDtcbn1cbi5uYXZiYXItZXhwYW5kIC5uYXZiYXItbmF2IHtcbiAgZmxleC1kaXJlY3Rpb246IHJvdztcbn1cbi5uYXZiYXItZXhwYW5kIC5uYXZiYXItbmF2IC5kcm9wZG93bi1tZW51IHtcbiAgcG9zaXRpb246IGFic29sdXRlO1xufVxuLm5hdmJhci1leHBhbmQgLm5hdmJhci1uYXYgLm5hdi1saW5rIHtcbiAgcGFkZGluZy1yaWdodDogMC41cmVtO1xuICBwYWRkaW5nLWxlZnQ6IDAuNXJlbTtcbn1cbi5uYXZiYXItZXhwYW5kIC5uYXZiYXItbmF2LXNjcm9sbCB7XG4gIG92ZXJmbG93OiB2aXNpYmxlO1xufVxuLm5hdmJhci1leHBhbmQgLm5hdmJhci1jb2xsYXBzZSB7XG4gIGRpc3BsYXk6IGZsZXggIWltcG9ydGFudDtcbiAgZmxleC1iYXNpczogYXV0bztcbn1cbi5uYXZiYXItZXhwYW5kIC5uYXZiYXItdG9nZ2xlciB7XG4gIGRpc3BsYXk6IG5vbmU7XG59XG4ubmF2YmFyLWV4cGFuZCAub2ZmY2FudmFzLWhlYWRlciB7XG4gIGRpc3BsYXk6IG5vbmU7XG59XG4ubmF2YmFyLWV4cGFuZCAub2ZmY2FudmFzIHtcbiAgcG9zaXRpb246IGluaGVyaXQ7XG4gIGJvdHRvbTogMDtcbiAgei1pbmRleDogMTAwMDtcbiAgZmxleC1ncm93OiAxO1xuICB2aXNpYmlsaXR5OiB2aXNpYmxlICFpbXBvcnRhbnQ7XG4gIGJhY2tncm91bmQtY29sb3I6IHRyYW5zcGFyZW50O1xuICBib3JkZXItcmlnaHQ6IDA7XG4gIGJvcmRlci1sZWZ0OiAwO1xuICB0cmFuc2l0aW9uOiBub25lO1xuICB0cmFuc2Zvcm06IG5vbmU7XG59XG4ubmF2YmFyLWV4cGFuZCAub2ZmY2FudmFzLXRvcCxcbi5uYXZiYXItZXhwYW5kIC5vZmZjYW52YXMtYm90dG9tIHtcbiAgaGVpZ2h0OiBhdXRvO1xuICBib3JkZXItdG9wOiAwO1xuICBib3JkZXItYm90dG9tOiAwO1xufVxuLm5hdmJhci1leHBhbmQgLm9mZmNhbnZhcy1ib2R5IHtcbiAgZGlzcGxheTogZmxleDtcbiAgZmxleC1ncm93OiAwO1xuICBwYWRkaW5nOiAwO1xuICBvdmVyZmxvdy15OiB2aXNpYmxlO1xufVxuXG4ubmF2YmFyLWxpZ2h0IC5uYXZiYXItYnJhbmQge1xuICBjb2xvcjogIzY5N2E4ZDtcbn1cbi5uYXZiYXItbGlnaHQgLm5hdmJhci1icmFuZDpob3ZlciwgLm5hdmJhci1saWdodCAubmF2YmFyLWJyYW5kOmZvY3VzIHtcbiAgY29sb3I6ICM2OTdhOGQ7XG59XG4ubmF2YmFyLWxpZ2h0IC5uYXZiYXItbmF2IC5uYXYtbGluayB7XG4gIGNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjUpO1xufVxuLm5hdmJhci1saWdodCAubmF2YmFyLW5hdiAubmF2LWxpbms6aG92ZXIsIC5uYXZiYXItbGlnaHQgLm5hdmJhci1uYXYgLm5hdi1saW5rOmZvY3VzIHtcbiAgY29sb3I6ICM2OTdhOGQ7XG59XG4ubmF2YmFyLWxpZ2h0IC5uYXZiYXItbmF2IC5uYXYtbGluay5kaXNhYmxlZCB7XG4gIGNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjMpO1xufVxuLm5hdmJhci1saWdodCAubmF2YmFyLW5hdiAuc2hvdyA+IC5uYXYtbGluayxcbi5uYXZiYXItbGlnaHQgLm5hdmJhci1uYXYgLm5hdi1saW5rLmFjdGl2ZSB7XG4gIGNvbG9yOiAjNjk3YThkO1xufVxuLm5hdmJhci1saWdodCAubmF2YmFyLXRvZ2dsZXIge1xuICBjb2xvcjogcmdiYSg2NywgODksIDExMywgMC41KTtcbiAgYm9yZGVyLWNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjA2KTtcbn1cbi5uYXZiYXItbGlnaHQgLm5hdmJhci10b2dnbGVyLWljb24ge1xuICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoXCJkYXRhOmltYWdlL3N2Zyt4bWwsJTNDc3ZnIHdpZHRoPScxNHB4JyBoZWlnaHQ9JzExcHgnIHZpZXdCb3g9JzAgMCAxNCAxMScgdmVyc2lvbj0nMS4xJyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHhtbG5zOnhsaW5rPSdodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rJyUzRSUzQ2RlZnMlM0UlM0NwYXRoIGQ9J00wLDAgTDE0LDAgTDE0LDEuNzUgTDAsMS43NSBMMCwwIFogTTAsNC4zNzUgTDE0LDQuMzc1IEwxNCw2LjEyNSBMMCw2LjEyNSBMMCw0LjM3NSBaIE0wLDguNzUgTDE0LDguNzUgTDE0LDEwLjUgTDAsMTAuNSBMMCw4Ljc1IFonIGlkPSdwYXRoLTEnJTNFJTNDL3BhdGglM0UlM0MvZGVmcyUzRSUzQ2cgaWQ9J/Cfko4tVUktRWxlbWVudHMnIHN0cm9rZT0nbm9uZScgc3Ryb2tlLXdpZHRoPScxJyBmaWxsPSdub25lJyBmaWxsLXJ1bGU9J2V2ZW5vZGQnJTNFJTNDZyBpZD0nMTIlMjktTmF2YmFyJyB0cmFuc2Zvcm09J3RyYW5zbGF0ZSUyOC0xMTc0LjAwMDAwMCwgLTEyOTAuMDAwMDAwJTI5JyUzRSUzQ2cgaWQ9J0dyb3VwJyB0cmFuc2Zvcm09J3RyYW5zbGF0ZSUyODExNzQuMDAwMDAwLCAxMjg4LjAwMDAwMCUyOSclM0UlM0NnIGlkPSdJY29uLUNvbG9yJyB0cmFuc2Zvcm09J3RyYW5zbGF0ZSUyODAuMDAwMDAwLCAyLjAwMDAwMCUyOSclM0UlM0N1c2UgZmlsbD0ncmdiYSUyODY3LCA4OSwgMTEzLCAwLjUlMjknIHhsaW5rOmhyZWY9JyUyM3BhdGgtMSclM0UlM0MvdXNlJTNFJTNDdXNlIGZpbGwtb3BhY2l0eT0nMC4xJyBmaWxsPSdyZ2JhJTI4NjcsIDg5LCAxMTMsIDAuNSUyOScgeGxpbms6aHJlZj0nJTIzcGF0aC0xJyUzRSUzQy91c2UlM0UlM0MvZyUzRSUzQy9nJTNFJTNDL2clM0UlM0MvZyUzRSUzQy9zdmclM0VcIik7XG59XG4ubmF2YmFyLWxpZ2h0IC5uYXZiYXItdGV4dCB7XG4gIGNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjUpO1xufVxuLm5hdmJhci1saWdodCAubmF2YmFyLXRleHQgYSxcbi5uYXZiYXItbGlnaHQgLm5hdmJhci10ZXh0IGE6aG92ZXIsXG4ubmF2YmFyLWxpZ2h0IC5uYXZiYXItdGV4dCBhOmZvY3VzIHtcbiAgY29sb3I6ICM2OTdhOGQ7XG59XG5cbi5uYXZiYXItZGFyayAubmF2YmFyLWJyYW5kIHtcbiAgY29sb3I6ICNmZmY7XG59XG4ubmF2YmFyLWRhcmsgLm5hdmJhci1icmFuZDpob3ZlciwgLm5hdmJhci1kYXJrIC5uYXZiYXItYnJhbmQ6Zm9jdXMge1xuICBjb2xvcjogI2ZmZjtcbn1cbi5uYXZiYXItZGFyayAubmF2YmFyLW5hdiAubmF2LWxpbmsge1xuICBjb2xvcjogcmdiYSgyNTUsIDI1NSwgMjU1LCAwLjgpO1xufVxuLm5hdmJhci1kYXJrIC5uYXZiYXItbmF2IC5uYXYtbGluazpob3ZlciwgLm5hdmJhci1kYXJrIC5uYXZiYXItbmF2IC5uYXYtbGluazpmb2N1cyB7XG4gIGNvbG9yOiAjZmZmO1xufVxuLm5hdmJhci1kYXJrIC5uYXZiYXItbmF2IC5uYXYtbGluay5kaXNhYmxlZCB7XG4gIGNvbG9yOiByZ2JhKDI1NSwgMjU1LCAyNTUsIDAuNCk7XG59XG4ubmF2YmFyLWRhcmsgLm5hdmJhci1uYXYgLnNob3cgPiAubmF2LWxpbmssXG4ubmF2YmFyLWRhcmsgLm5hdmJhci1uYXYgLm5hdi1saW5rLmFjdGl2ZSB7XG4gIGNvbG9yOiAjZmZmO1xufVxuLm5hdmJhci1kYXJrIC5uYXZiYXItdG9nZ2xlciB7XG4gIGNvbG9yOiByZ2JhKDI1NSwgMjU1LCAyNTUsIDAuOCk7XG4gIGJvcmRlci1jb2xvcjogcmdiYSgyNTUsIDI1NSwgMjU1LCAwLjEpO1xufVxuLm5hdmJhci1kYXJrIC5uYXZiYXItdG9nZ2xlci1pY29uIHtcbiAgYmFja2dyb3VuZC1pbWFnZTogdXJsKFwiZGF0YTppbWFnZS9zdmcreG1sLCUzQ3N2ZyB3aWR0aD0nMTRweCcgaGVpZ2h0PScxMXB4JyB2aWV3Qm94PScwIDAgMTQgMTEnIHZlcnNpb249JzEuMScgeG1sbnM9J2h0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnJyB4bWxuczp4bGluaz0naHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayclM0UlM0NkZWZzJTNFJTNDcGF0aCBkPSdNMCwwIEwxNCwwIEwxNCwxLjc1IEwwLDEuNzUgTDAsMCBaIE0wLDQuMzc1IEwxNCw0LjM3NSBMMTQsNi4xMjUgTDAsNi4xMjUgTDAsNC4zNzUgWiBNMCw4Ljc1IEwxNCw4Ljc1IEwxNCwxMC41IEwwLDEwLjUgTDAsOC43NSBaJyBpZD0ncGF0aC0xJyUzRSUzQy9wYXRoJTNFJTNDL2RlZnMlM0UlM0NnIGlkPSfwn5KOLVVJLUVsZW1lbnRzJyBzdHJva2U9J25vbmUnIHN0cm9rZS13aWR0aD0nMScgZmlsbD0nbm9uZScgZmlsbC1ydWxlPSdldmVub2RkJyUzRSUzQ2cgaWQ9JzEyJTI5LU5hdmJhcicgdHJhbnNmb3JtPSd0cmFuc2xhdGUlMjgtMTE3NC4wMDAwMDAsIC0xMjkwLjAwMDAwMCUyOSclM0UlM0NnIGlkPSdHcm91cCcgdHJhbnNmb3JtPSd0cmFuc2xhdGUlMjgxMTc0LjAwMDAwMCwgMTI4OC4wMDAwMDAlMjknJTNFJTNDZyBpZD0nSWNvbi1Db2xvcicgdHJhbnNmb3JtPSd0cmFuc2xhdGUlMjgwLjAwMDAwMCwgMi4wMDAwMDAlMjknJTNFJTNDdXNlIGZpbGw9J3JnYmElMjgyNTUsIDI1NSwgMjU1LCAwLjglMjknIHhsaW5rOmhyZWY9JyUyM3BhdGgtMSclM0UlM0MvdXNlJTNFJTNDdXNlIGZpbGwtb3BhY2l0eT0nMC4xJyBmaWxsPSdyZ2JhJTI4MjU1LCAyNTUsIDI1NSwgMC44JTI5JyB4bGluazpocmVmPSclMjNwYXRoLTEnJTNFJTNDL3VzZSUzRSUzQy9nJTNFJTNDL2clM0UlM0MvZyUzRSUzQy9nJTNFJTNDL3N2ZyUzRVwiKTtcbn1cbi5uYXZiYXItZGFyayAubmF2YmFyLXRleHQge1xuICBjb2xvcjogcmdiYSgyNTUsIDI1NSwgMjU1LCAwLjgpO1xufVxuLm5hdmJhci1kYXJrIC5uYXZiYXItdGV4dCBhLFxuLm5hdmJhci1kYXJrIC5uYXZiYXItdGV4dCBhOmhvdmVyLFxuLm5hdmJhci1kYXJrIC5uYXZiYXItdGV4dCBhOmZvY3VzIHtcbiAgY29sb3I6ICNmZmY7XG59XG5cbi5jYXJkIHtcbiAgcG9zaXRpb246IHJlbGF0aXZlO1xuICBkaXNwbGF5OiBmbGV4O1xuICBmbGV4LWRpcmVjdGlvbjogY29sdW1uO1xuICBtaW4td2lkdGg6IDA7XG4gIHdvcmQtd3JhcDogYnJlYWstd29yZDtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZmZjtcbiAgYmFja2dyb3VuZC1jbGlwOiBib3JkZXItYm94O1xuICBib3JkZXI6IDAgc29saWQgI2Q5ZGVlMztcbiAgYm9yZGVyLXJhZGl1czogMC41cmVtO1xufVxuLmNhcmQgPiBociB7XG4gIG1hcmdpbi1yaWdodDogMDtcbiAgbWFyZ2luLWxlZnQ6IDA7XG59XG4uY2FyZCA+IC5saXN0LWdyb3VwIHtcbiAgYm9yZGVyLXRvcDogaW5oZXJpdDtcbiAgYm9yZGVyLWJvdHRvbTogaW5oZXJpdDtcbn1cbi5jYXJkID4gLmxpc3QtZ3JvdXA6Zmlyc3QtY2hpbGQge1xuICBib3JkZXItdG9wLXdpZHRoOiAwO1xuICBib3JkZXItdG9wLWxlZnQtcmFkaXVzOiAwLjVyZW07XG4gIGJvcmRlci10b3AtcmlnaHQtcmFkaXVzOiAwLjVyZW07XG59XG4uY2FyZCA+IC5saXN0LWdyb3VwOmxhc3QtY2hpbGQge1xuICBib3JkZXItYm90dG9tLXdpZHRoOiAwO1xuICBib3JkZXItYm90dG9tLXJpZ2h0LXJhZGl1czogMC41cmVtO1xuICBib3JkZXItYm90dG9tLWxlZnQtcmFkaXVzOiAwLjVyZW07XG59XG4uY2FyZCA+IC5jYXJkLWhlYWRlciArIC5saXN0LWdyb3VwLFxuLmNhcmQgPiAubGlzdC1ncm91cCArIC5jYXJkLWZvb3RlciB7XG4gIGJvcmRlci10b3A6IDA7XG59XG5cbi5jYXJkLWJvZHkge1xuICBmbGV4OiAxIDEgYXV0bztcbiAgcGFkZGluZzogMS41cmVtIDEuNXJlbTtcbn1cblxuLmNhcmQtdGl0bGUge1xuICBtYXJnaW4tYm90dG9tOiAwLjg3NXJlbTtcbn1cblxuLmNhcmQtc3VidGl0bGUge1xuICBtYXJnaW4tdG9wOiAtMC40Mzc1cmVtO1xuICBtYXJnaW4tYm90dG9tOiAwO1xufVxuXG4uY2FyZC10ZXh0Omxhc3QtY2hpbGQge1xuICBtYXJnaW4tYm90dG9tOiAwO1xufVxuXG4uY2FyZC1saW5rICsgLmNhcmQtbGluayB7XG4gIG1hcmdpbi1sZWZ0OiAxLjVyZW07XG59XG5cbi5jYXJkLWhlYWRlciB7XG4gIHBhZGRpbmc6IDEuNXJlbSAxLjVyZW07XG4gIG1hcmdpbi1ib3R0b206IDA7XG4gIGJhY2tncm91bmQtY29sb3I6IHRyYW5zcGFyZW50O1xuICBib3JkZXItYm90dG9tOiAwIHNvbGlkICNkOWRlZTM7XG59XG4uY2FyZC1oZWFkZXI6Zmlyc3QtY2hpbGQge1xuICBib3JkZXItcmFkaXVzOiAwLjVyZW0gMC41cmVtIDAgMDtcbn1cblxuLmNhcmQtZm9vdGVyIHtcbiAgcGFkZGluZzogMS41cmVtIDEuNXJlbTtcbiAgYmFja2dyb3VuZC1jb2xvcjogdHJhbnNwYXJlbnQ7XG4gIGJvcmRlci10b3A6IDAgc29saWQgI2Q5ZGVlMztcbn1cbi5jYXJkLWZvb3RlcjpsYXN0LWNoaWxkIHtcbiAgYm9yZGVyLXJhZGl1czogMCAwIDAuNXJlbSAwLjVyZW07XG59XG5cbi5jYXJkLWhlYWRlci10YWJzIHtcbiAgbWFyZ2luLXJpZ2h0OiAtMC43NXJlbTtcbiAgbWFyZ2luLWJvdHRvbTogLTEuNXJlbTtcbiAgbWFyZ2luLWxlZnQ6IC0wLjc1cmVtO1xuICBib3JkZXItYm90dG9tOiAwO1xufVxuXG4uY2FyZC1oZWFkZXItcGlsbHMge1xuICBtYXJnaW4tcmlnaHQ6IC0wLjc1cmVtO1xuICBtYXJnaW4tbGVmdDogLTAuNzVyZW07XG59XG5cbi5jYXJkLWltZy1vdmVybGF5IHtcbiAgcG9zaXRpb246IGFic29sdXRlO1xuICB0b3A6IDA7XG4gIHJpZ2h0OiAwO1xuICBib3R0b206IDA7XG4gIGxlZnQ6IDA7XG4gIHBhZGRpbmc6IDEuNXJlbTtcbiAgYm9yZGVyLXJhZGl1czogMC41cmVtO1xufVxuXG4uY2FyZC1pbWcsXG4uY2FyZC1pbWctdG9wLFxuLmNhcmQtaW1nLWJvdHRvbSB7XG4gIHdpZHRoOiAxMDAlO1xufVxuXG4uY2FyZC1pbWcsXG4uY2FyZC1pbWctdG9wIHtcbiAgYm9yZGVyLXRvcC1sZWZ0LXJhZGl1czogMC41cmVtO1xuICBib3JkZXItdG9wLXJpZ2h0LXJhZGl1czogMC41cmVtO1xufVxuXG4uY2FyZC1pbWcsXG4uY2FyZC1pbWctYm90dG9tIHtcbiAgYm9yZGVyLWJvdHRvbS1yaWdodC1yYWRpdXM6IDAuNXJlbTtcbiAgYm9yZGVyLWJvdHRvbS1sZWZ0LXJhZGl1czogMC41cmVtO1xufVxuXG4uY2FyZC1ncm91cCA+IC5jYXJkIHtcbiAgbWFyZ2luLWJvdHRvbTogMC44MTI1cmVtO1xufVxuQG1lZGlhIChtaW4td2lkdGg6IDU3NnB4KSB7XG4gIC5jYXJkLWdyb3VwIHtcbiAgICBkaXNwbGF5OiBmbGV4O1xuICAgIGZsZXgtZmxvdzogcm93IHdyYXA7XG4gIH1cbiAgLmNhcmQtZ3JvdXAgPiAuY2FyZCB7XG4gICAgZmxleDogMSAwIDAlO1xuICAgIG1hcmdpbi1ib3R0b206IDA7XG4gIH1cbiAgLmNhcmQtZ3JvdXAgPiAuY2FyZCArIC5jYXJkIHtcbiAgICBtYXJnaW4tbGVmdDogMDtcbiAgICBib3JkZXItbGVmdDogMDtcbiAgfVxuICAuY2FyZC1ncm91cCA+IC5jYXJkOm5vdCg6bGFzdC1jaGlsZCkge1xuICAgIGJvcmRlci10b3AtcmlnaHQtcmFkaXVzOiAwO1xuICAgIGJvcmRlci1ib3R0b20tcmlnaHQtcmFkaXVzOiAwO1xuICB9XG4gIC5jYXJkLWdyb3VwID4gLmNhcmQ6bm90KDpsYXN0LWNoaWxkKSAuY2FyZC1pbWctdG9wLFxuLmNhcmQtZ3JvdXAgPiAuY2FyZDpub3QoOmxhc3QtY2hpbGQpIC5jYXJkLWhlYWRlciB7XG4gICAgYm9yZGVyLXRvcC1yaWdodC1yYWRpdXM6IDA7XG4gIH1cbiAgLmNhcmQtZ3JvdXAgPiAuY2FyZDpub3QoOmxhc3QtY2hpbGQpIC5jYXJkLWltZy1ib3R0b20sXG4uY2FyZC1ncm91cCA+IC5jYXJkOm5vdCg6bGFzdC1jaGlsZCkgLmNhcmQtZm9vdGVyIHtcbiAgICBib3JkZXItYm90dG9tLXJpZ2h0LXJhZGl1czogMDtcbiAgfVxuICAuY2FyZC1ncm91cCA+IC5jYXJkOm5vdCg6Zmlyc3QtY2hpbGQpIHtcbiAgICBib3JkZXItdG9wLWxlZnQtcmFkaXVzOiAwO1xuICAgIGJvcmRlci1ib3R0b20tbGVmdC1yYWRpdXM6IDA7XG4gIH1cbiAgLmNhcmQtZ3JvdXAgPiAuY2FyZDpub3QoOmZpcnN0LWNoaWxkKSAuY2FyZC1pbWctdG9wLFxuLmNhcmQtZ3JvdXAgPiAuY2FyZDpub3QoOmZpcnN0LWNoaWxkKSAuY2FyZC1oZWFkZXIge1xuICAgIGJvcmRlci10b3AtbGVmdC1yYWRpdXM6IDA7XG4gIH1cbiAgLmNhcmQtZ3JvdXAgPiAuY2FyZDpub3QoOmZpcnN0LWNoaWxkKSAuY2FyZC1pbWctYm90dG9tLFxuLmNhcmQtZ3JvdXAgPiAuY2FyZDpub3QoOmZpcnN0LWNoaWxkKSAuY2FyZC1mb290ZXIge1xuICAgIGJvcmRlci1ib3R0b20tbGVmdC1yYWRpdXM6IDA7XG4gIH1cbn1cblxuLmFjY29yZGlvbi1idXR0b24ge1xuICBwb3NpdGlvbjogcmVsYXRpdmU7XG4gIGRpc3BsYXk6IGZsZXg7XG4gIGFsaWduLWl0ZW1zOiBjZW50ZXI7XG4gIHdpZHRoOiAxMDAlO1xuICBwYWRkaW5nOiAwLjc5cmVtIDEuMTI1cmVtO1xuICBmb250LXNpemU6IDAuOTM3NXJlbTtcbiAgY29sb3I6ICM1NjZhN2Y7XG4gIHRleHQtYWxpZ246IGxlZnQ7XG4gIGJhY2tncm91bmQtY29sb3I6ICNmZmY7XG4gIGJvcmRlcjogMDtcbiAgYm9yZGVyLXJhZGl1czogMDtcbiAgb3ZlcmZsb3ctYW5jaG9yOiBub25lO1xuICB0cmFuc2l0aW9uOiBhbGwgMC4ycyBlYXNlLWluLW91dCwgYm9yZGVyLXJhZGl1cyAwLjE1cyBlYXNlO1xufVxuQG1lZGlhIChwcmVmZXJzLXJlZHVjZWQtbW90aW9uOiByZWR1Y2UpIHtcbiAgLmFjY29yZGlvbi1idXR0b24ge1xuICAgIHRyYW5zaXRpb246IG5vbmU7XG4gIH1cbn1cbi5hY2NvcmRpb24tYnV0dG9uOm5vdCguY29sbGFwc2VkKSB7XG4gIGNvbG9yOiAjNTY2YTdmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmO1xuICBib3gtc2hhZG93OiBpbnNldCAwIDAgMCAjZDlkZWUzO1xufVxuLmFjY29yZGlvbi1idXR0b246bm90KC5jb2xsYXBzZWQpOjphZnRlciB7XG4gIGJhY2tncm91bmQtaW1hZ2U6IHVybChcImRhdGE6aW1hZ2Uvc3ZnK3htbCwlM0Nzdmcgd2lkdGg9JzEyJyBoZWlnaHQ9JzEyJyB2aWV3Qm94PScwIDAgMTIgMTInIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZycgeG1sbnM6eGxpbms9J2h0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsnJTNFJTNDZGVmcyUzRSUzQ3BhdGggaWQ9J2EnIGQ9J20xLjUzMiAxMiA2LjE4Mi02LTYuMTgyLTZMMCAxLjQ4NyA0LjY1IDYgMCAxMC41MTN6Jy8lM0UlM0MvZGVmcyUzRSUzQ2cgdHJhbnNmb3JtPSd0cmFuc2xhdGUlMjgyLjU3MSUyOScgZmlsbD0nbm9uZScgZmlsbC1ydWxlPSdldmVub2RkJyUzRSUzQ3VzZSBmaWxsPSclMjM0MzU5NzEnIHhsaW5rOmhyZWY9JyUyM2EnLyUzRSUzQ3VzZSBmaWxsLW9wYWNpdHk9Jy4xJyBmaWxsPSclMjM1NjZhN2YnIHhsaW5rOmhyZWY9JyUyM2EnLyUzRSUzQy9nJTNFJTNDL3N2ZyUzRSUwQVwiKTtcbiAgdHJhbnNmb3JtOiByb3RhdGUoOTBkZWcpO1xufVxuLmFjY29yZGlvbi1idXR0b246OmFmdGVyIHtcbiAgZmxleC1zaHJpbms6IDA7XG4gIHdpZHRoOiAwLjc1cmVtO1xuICBoZWlnaHQ6IDAuNzVyZW07XG4gIG1hcmdpbi1sZWZ0OiBhdXRvO1xuICBjb250ZW50OiBcIlwiO1xuICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoXCJkYXRhOmltYWdlL3N2Zyt4bWwsJTNDc3ZnIHdpZHRoPScxMicgaGVpZ2h0PScxMicgdmlld0JveD0nMCAwIDEyIDEyJyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHhtbG5zOnhsaW5rPSdodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rJyUzRSUzQ2RlZnMlM0UlM0NwYXRoIGlkPSdhJyBkPSdtMS41MzIgMTIgNi4xODItNi02LjE4Mi02TDAgMS40ODcgNC42NSA2IDAgMTAuNTEzeicvJTNFJTNDL2RlZnMlM0UlM0NnIHRyYW5zZm9ybT0ndHJhbnNsYXRlJTI4Mi41NzElMjknIGZpbGw9J25vbmUnIGZpbGwtcnVsZT0nZXZlbm9kZCclM0UlM0N1c2UgZmlsbD0nJTIzNDM1OTcxJyB4bGluazpocmVmPSclMjNhJy8lM0UlM0N1c2UgZmlsbC1vcGFjaXR5PScuMScgZmlsbD0nJTIzNTY2YTdmJyB4bGluazpocmVmPSclMjNhJy8lM0UlM0MvZyUzRSUzQy9zdmclM0UlMEFcIik7XG4gIGJhY2tncm91bmQtcmVwZWF0OiBuby1yZXBlYXQ7XG4gIGJhY2tncm91bmQtc2l6ZTogMC43NXJlbTtcbiAgdHJhbnNpdGlvbjogdHJhbnNmb3JtIDAuMnMgZWFzZS1pbi1vdXQ7XG59XG5AbWVkaWEgKHByZWZlcnMtcmVkdWNlZC1tb3Rpb246IHJlZHVjZSkge1xuICAuYWNjb3JkaW9uLWJ1dHRvbjo6YWZ0ZXIge1xuICAgIHRyYW5zaXRpb246IG5vbmU7XG4gIH1cbn1cbi5hY2NvcmRpb24tYnV0dG9uOmhvdmVyIHtcbiAgei1pbmRleDogMjtcbn1cbi5hY2NvcmRpb24tYnV0dG9uOmZvY3VzIHtcbiAgei1pbmRleDogMztcbiAgYm9yZGVyLWNvbG9yOiByZ2JhKDI0OSwgMjQ5LCAyNTUsIDAuNTQpO1xuICBvdXRsaW5lOiAwO1xuICBib3gtc2hhZG93OiBub25lO1xufVxuXG4uYWNjb3JkaW9uLWhlYWRlciB7XG4gIG1hcmdpbi1ib3R0b206IDA7XG59XG5cbi5hY2NvcmRpb24taXRlbSB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNmZmY7XG4gIGJvcmRlcjogMCBzb2xpZCAjZDlkZWUzO1xufVxuLmFjY29yZGlvbi1pdGVtOmZpcnN0LW9mLXR5cGUge1xuICBib3JkZXItdG9wLWxlZnQtcmFkaXVzOiAwLjM3NXJlbTtcbiAgYm9yZGVyLXRvcC1yaWdodC1yYWRpdXM6IDAuMzc1cmVtO1xufVxuLmFjY29yZGlvbi1pdGVtOmZpcnN0LW9mLXR5cGUgLmFjY29yZGlvbi1idXR0b24ge1xuICBib3JkZXItdG9wLWxlZnQtcmFkaXVzOiAwLjM3NXJlbTtcbiAgYm9yZGVyLXRvcC1yaWdodC1yYWRpdXM6IDAuMzc1cmVtO1xufVxuLmFjY29yZGlvbi1pdGVtOm5vdCg6Zmlyc3Qtb2YtdHlwZSkge1xuICBib3JkZXItdG9wOiAwO1xufVxuLmFjY29yZGlvbi1pdGVtOmxhc3Qtb2YtdHlwZSB7XG4gIGJvcmRlci1ib3R0b20tcmlnaHQtcmFkaXVzOiAwLjM3NXJlbTtcbiAgYm9yZGVyLWJvdHRvbS1sZWZ0LXJhZGl1czogMC4zNzVyZW07XG59XG4uYWNjb3JkaW9uLWl0ZW06bGFzdC1vZi10eXBlIC5hY2NvcmRpb24tYnV0dG9uLmNvbGxhcHNlZCB7XG4gIGJvcmRlci1ib3R0b20tcmlnaHQtcmFkaXVzOiAwLjM3NXJlbTtcbiAgYm9yZGVyLWJvdHRvbS1sZWZ0LXJhZGl1czogMC4zNzVyZW07XG59XG4uYWNjb3JkaW9uLWl0ZW06bGFzdC1vZi10eXBlIC5hY2NvcmRpb24tY29sbGFwc2Uge1xuICBib3JkZXItYm90dG9tLXJpZ2h0LXJhZGl1czogMC4zNzVyZW07XG4gIGJvcmRlci1ib3R0b20tbGVmdC1yYWRpdXM6IDAuMzc1cmVtO1xufVxuXG4uYWNjb3JkaW9uLWJvZHkge1xuICBwYWRkaW5nOiAwLjc5cmVtIDEuMTI1cmVtO1xufVxuXG4uYWNjb3JkaW9uLWZsdXNoIC5hY2NvcmRpb24tY29sbGFwc2Uge1xuICBib3JkZXItd2lkdGg6IDA7XG59XG4uYWNjb3JkaW9uLWZsdXNoIC5hY2NvcmRpb24taXRlbSB7XG4gIGJvcmRlci1yaWdodDogMDtcbiAgYm9yZGVyLWxlZnQ6IDA7XG4gIGJvcmRlci1yYWRpdXM6IDA7XG59XG4uYWNjb3JkaW9uLWZsdXNoIC5hY2NvcmRpb24taXRlbTpmaXJzdC1jaGlsZCB7XG4gIGJvcmRlci10b3A6IDA7XG59XG4uYWNjb3JkaW9uLWZsdXNoIC5hY2NvcmRpb24taXRlbTpsYXN0LWNoaWxkIHtcbiAgYm9yZGVyLWJvdHRvbTogMDtcbn1cbi5hY2NvcmRpb24tZmx1c2ggLmFjY29yZGlvbi1pdGVtIC5hY2NvcmRpb24tYnV0dG9uIHtcbiAgYm9yZGVyLXJhZGl1czogMDtcbn1cblxuLmJyZWFkY3J1bWIge1xuICBkaXNwbGF5OiBmbGV4O1xuICBmbGV4LXdyYXA6IHdyYXA7XG4gIHBhZGRpbmc6IDAgMDtcbiAgbWFyZ2luLWJvdHRvbTogMXJlbTtcbiAgbGlzdC1zdHlsZTogbm9uZTtcbiAgYmFja2dyb3VuZC1jb2xvcjogdHJhbnNwYXJlbnQ7XG59XG5cbi5icmVhZGNydW1iLWl0ZW0gKyAuYnJlYWRjcnVtYi1pdGVtIHtcbiAgcGFkZGluZy1sZWZ0OiAwLjVyZW07XG59XG4uYnJlYWRjcnVtYi1pdGVtICsgLmJyZWFkY3J1bWItaXRlbTo6YmVmb3JlIHtcbiAgZmxvYXQ6IGxlZnQ7XG4gIHBhZGRpbmctcmlnaHQ6IDAuNXJlbTtcbiAgY29sb3I6ICNhMWFjYjg7XG4gIGNvbnRlbnQ6IHZhcigtLWJzLWJyZWFkY3J1bWItZGl2aWRlciwgXCIvXCIpIC8qIHJ0bDogdmFyKC0tYnMtYnJlYWRjcnVtYi1kaXZpZGVyLCBcIlxcXFxcIikgKi87XG59XG4uYnJlYWRjcnVtYi1pdGVtLmFjdGl2ZSB7XG4gIGNvbG9yOiAjNjk3YThkO1xufVxuXG4ucGFnaW5hdGlvbiB7XG4gIGRpc3BsYXk6IGZsZXg7XG4gIHBhZGRpbmctbGVmdDogMDtcbiAgbGlzdC1zdHlsZTogbm9uZTtcbn1cblxuLnBhZ2UtbGluayB7XG4gIHBvc2l0aW9uOiByZWxhdGl2ZTtcbiAgZGlzcGxheTogYmxvY2s7XG4gIGNvbG9yOiAjNjk3YThkO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZjBmMmY0O1xuICBib3JkZXI6IDBweCBzb2xpZCAjZDlkZWUzO1xuICB0cmFuc2l0aW9uOiBjb2xvciAwLjE1cyBlYXNlLWluLW91dCwgYmFja2dyb3VuZC1jb2xvciAwLjE1cyBlYXNlLWluLW91dCwgYm9yZGVyLWNvbG9yIDAuMTVzIGVhc2UtaW4tb3V0LCBib3gtc2hhZG93IDAuMTVzIGVhc2UtaW4tb3V0O1xufVxuQG1lZGlhIChwcmVmZXJzLXJlZHVjZWQtbW90aW9uOiByZWR1Y2UpIHtcbiAgLnBhZ2UtbGluayB7XG4gICAgdHJhbnNpdGlvbjogbm9uZTtcbiAgfVxufVxuLnBhZ2UtbGluazpob3ZlciB7XG4gIHotaW5kZXg6IDI7XG4gIGNvbG9yOiAjNjk3YThkO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZTFlNGU4O1xuICBib3JkZXItY29sb3I6IHJnYmEoNjcsIDg5LCAxMTMsIDAuMyk7XG59XG4ucGFnZS1saW5rOmZvY3VzIHtcbiAgei1pbmRleDogMztcbiAgY29sb3I6ICM2OTdhOGQ7XG4gIGJhY2tncm91bmQtY29sb3I6ICNlMWU0ZTg7XG4gIG91dGxpbmU6IDA7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG59XG5cbi5wYWdlLWl0ZW06bm90KDpmaXJzdC1jaGlsZCkgLnBhZ2UtbGluayB7XG4gIG1hcmdpbi1sZWZ0OiAwLjE4NzVyZW07XG59XG4ucGFnZS1pdGVtLmFjdGl2ZSAucGFnZS1saW5rIHtcbiAgei1pbmRleDogMztcbiAgY29sb3I6ICNmZmY7XG4gIGJhY2tncm91bmQtY29sb3I6IHJnYmEoMTA1LCAxMDgsIDI1NSwgMC4wOCk7XG4gIGJvcmRlci1jb2xvcjogcmdiYSgxMDUsIDEwOCwgMjU1LCAwLjA4KTtcbn1cbi5wYWdlLWl0ZW0uZGlzYWJsZWQgLnBhZ2UtbGluayB7XG4gIGNvbG9yOiAjYTFhY2I4O1xuICBwb2ludGVyLWV2ZW50czogbm9uZTtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2Y3ZjhmOTtcbiAgYm9yZGVyLWNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjMpO1xufVxuXG4ucGFnZS1saW5rIHtcbiAgcGFkZGluZzogMC42MjVyZW0gMC41MTI1cmVtO1xufVxuXG4ucGFnZS1pdGVtIC5wYWdlLWxpbmsge1xuICBib3JkZXItcmFkaXVzOiAwLjI1cmVtO1xufVxuXG4ucGFnaW5hdGlvbi1sZyAucGFnZS1saW5rIHtcbiAgcGFkZGluZzogMC45Mzc1cmVtIDAuNXJlbTtcbiAgZm9udC1zaXplOiAxcmVtO1xufVxuLnBhZ2luYXRpb24tbGcgLnBhZ2UtaXRlbSAucGFnZS1saW5rIHtcbiAgYm9yZGVyLXJhZGl1czogMC41cmVtO1xufVxuXG4ucGFnaW5hdGlvbi1zbSAucGFnZS1saW5rIHtcbiAgcGFkZGluZzogMC4zNzVyZW0gMC4yNXJlbTtcbiAgZm9udC1zaXplOiAwLjc1cmVtO1xufVxuLnBhZ2luYXRpb24tc20gLnBhZ2UtaXRlbSAucGFnZS1saW5rIHtcbiAgYm9yZGVyLXJhZGl1czogMC4yNXJlbTtcbn1cblxuLmJhZGdlIHtcbiAgZGlzcGxheTogaW5saW5lLWJsb2NrO1xuICBwYWRkaW5nOiAwLjUyZW0gMC41OTNlbTtcbiAgZm9udC1zaXplOiAwLjgxMjVlbTtcbiAgZm9udC13ZWlnaHQ6IDUwMDtcbiAgbGluZS1oZWlnaHQ6IDE7XG4gIGNvbG9yOiAjZmZmO1xuICB0ZXh0LWFsaWduOiBjZW50ZXI7XG4gIHdoaXRlLXNwYWNlOiBub3dyYXA7XG4gIHZlcnRpY2FsLWFsaWduOiBiYXNlbGluZTtcbiAgYm9yZGVyLXJhZGl1czogMC4yNXJlbTtcbn1cbi5iYWRnZTplbXB0eSB7XG4gIGRpc3BsYXk6IG5vbmU7XG59XG5cbi5idG4gLmJhZGdlIHtcbiAgcG9zaXRpb246IHJlbGF0aXZlO1xuICB0b3A6IC0xcHg7XG59XG5cbi5hbGVydCB7XG4gIHBvc2l0aW9uOiByZWxhdGl2ZTtcbiAgcGFkZGluZzogMC45Mzc1cmVtIDAuOTM3NXJlbTtcbiAgbWFyZ2luLWJvdHRvbTogMXJlbTtcbiAgYm9yZGVyOiAwIHNvbGlkIHRyYW5zcGFyZW50O1xuICBib3JkZXItcmFkaXVzOiAwLjM3NXJlbTtcbn1cblxuLmFsZXJ0LWhlYWRpbmcge1xuICBjb2xvcjogaW5oZXJpdDtcbn1cblxuLmFsZXJ0LWxpbmsge1xuICBmb250LXdlaWdodDogNzAwO1xufVxuXG4uYWxlcnQtZGlzbWlzc2libGUge1xuICBwYWRkaW5nLXJpZ2h0OiAyLjgxMjVyZW07XG59XG4uYWxlcnQtZGlzbWlzc2libGUgLmJ0bi1jbG9zZSB7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgdG9wOiAwO1xuICByaWdodDogMDtcbiAgei1pbmRleDogMjtcbiAgcGFkZGluZzogMS4xNzE4NzVyZW0gMC45Mzc1cmVtO1xufVxuXG5Aa2V5ZnJhbWVzIHByb2dyZXNzLWJhci1zdHJpcGVzIHtcbiAgMCUge1xuICAgIGJhY2tncm91bmQtcG9zaXRpb24teDogMC43NXJlbTtcbiAgfVxufVxuLnByb2dyZXNzIHtcbiAgZGlzcGxheTogZmxleDtcbiAgaGVpZ2h0OiAwLjc1cmVtO1xuICBvdmVyZmxvdzogaGlkZGVuO1xuICBmb250LXNpemU6IDAuNjI1cmVtO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjEpO1xuICBib3JkZXItcmFkaXVzOiAxMHJlbTtcbn1cblxuLnByb2dyZXNzLWJhciB7XG4gIGRpc3BsYXk6IGZsZXg7XG4gIGZsZXgtZGlyZWN0aW9uOiBjb2x1bW47XG4gIGp1c3RpZnktY29udGVudDogY2VudGVyO1xuICBvdmVyZmxvdzogaGlkZGVuO1xuICBjb2xvcjogI2ZmZjtcbiAgdGV4dC1hbGlnbjogY2VudGVyO1xuICB3aGl0ZS1zcGFjZTogbm93cmFwO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjNjk2Y2ZmO1xuICB0cmFuc2l0aW9uOiB3aWR0aCAwLjZzIGVhc2U7XG59XG5AbWVkaWEgKHByZWZlcnMtcmVkdWNlZC1tb3Rpb246IHJlZHVjZSkge1xuICAucHJvZ3Jlc3MtYmFyIHtcbiAgICB0cmFuc2l0aW9uOiBub25lO1xuICB9XG59XG5cbi5wcm9ncmVzcy1iYXItc3RyaXBlZCB7XG4gIGJhY2tncm91bmQtaW1hZ2U6IGxpbmVhci1ncmFkaWVudCg0NWRlZywgcmdiYSgyNTUsIDI1NSwgMjU1LCAwLjE1KSAyNSUsIHRyYW5zcGFyZW50IDI1JSwgdHJhbnNwYXJlbnQgNTAlLCByZ2JhKDI1NSwgMjU1LCAyNTUsIDAuMTUpIDUwJSwgcmdiYSgyNTUsIDI1NSwgMjU1LCAwLjE1KSA3NSUsIHRyYW5zcGFyZW50IDc1JSwgdHJhbnNwYXJlbnQpO1xuICBiYWNrZ3JvdW5kLXNpemU6IDAuNzVyZW0gMC43NXJlbTtcbn1cblxuLnByb2dyZXNzLWJhci1hbmltYXRlZCB7XG4gIGFuaW1hdGlvbjogMXMgbGluZWFyIGluZmluaXRlIHByb2dyZXNzLWJhci1zdHJpcGVzO1xufVxuQG1lZGlhIChwcmVmZXJzLXJlZHVjZWQtbW90aW9uOiByZWR1Y2UpIHtcbiAgLnByb2dyZXNzLWJhci1hbmltYXRlZCB7XG4gICAgYW5pbWF0aW9uOiBub25lO1xuICB9XG59XG5cbi5saXN0LWdyb3VwIHtcbiAgZGlzcGxheTogZmxleDtcbiAgZmxleC1kaXJlY3Rpb246IGNvbHVtbjtcbiAgcGFkZGluZy1sZWZ0OiAwO1xuICBtYXJnaW4tYm90dG9tOiAwO1xuICBib3JkZXItcmFkaXVzOiAwLjVyZW07XG59XG5cbi5saXN0LWdyb3VwLW51bWJlcmVkIHtcbiAgbGlzdC1zdHlsZS10eXBlOiBub25lO1xuICBjb3VudGVyLXJlc2V0OiBzZWN0aW9uO1xufVxuLmxpc3QtZ3JvdXAtbnVtYmVyZWQgPiBsaTo6YmVmb3JlIHtcbiAgY29udGVudDogY291bnRlcnMoc2VjdGlvbiwgXCIuXCIpIFwiLiBcIjtcbiAgY291bnRlci1pbmNyZW1lbnQ6IHNlY3Rpb247XG59XG5cbi5saXN0LWdyb3VwLWl0ZW0tYWN0aW9uIHtcbiAgd2lkdGg6IDEwMCU7XG4gIGNvbG9yOiAjOGU5YmFhO1xuICB0ZXh0LWFsaWduOiBpbmhlcml0O1xufVxuLmxpc3QtZ3JvdXAtaXRlbS1hY3Rpb246aG92ZXIsIC5saXN0LWdyb3VwLWl0ZW0tYWN0aW9uOmZvY3VzIHtcbiAgei1pbmRleDogMTtcbiAgY29sb3I6ICM2OTdhOGQ7XG4gIHRleHQtZGVjb3JhdGlvbjogbm9uZTtcbiAgYmFja2dyb3VuZC1jb2xvcjogcmdiYSg2NywgODksIDExMywgMC4wNik7XG59XG4ubGlzdC1ncm91cC1pdGVtLWFjdGlvbjphY3RpdmUge1xuICBjb2xvcjogIzY5N2E4ZDtcbiAgYmFja2dyb3VuZC1jb2xvcjogcmdiYSg2NywgODksIDExMywgMC4wNSk7XG59XG5cbi5saXN0LWdyb3VwLWl0ZW0ge1xuICBwb3NpdGlvbjogcmVsYXRpdmU7XG4gIGRpc3BsYXk6IGJsb2NrO1xuICBwYWRkaW5nOiAwLjU4cmVtIDAuOTM3NXJlbTtcbiAgY29sb3I6ICM2OTdhOGQ7XG4gIGJhY2tncm91bmQtY29sb3I6IHRyYW5zcGFyZW50O1xuICBib3JkZXI6IDFweCBzb2xpZCAjZDlkZWUzO1xufVxuLmxpc3QtZ3JvdXAtaXRlbTpmaXJzdC1jaGlsZCB7XG4gIGJvcmRlci10b3AtbGVmdC1yYWRpdXM6IGluaGVyaXQ7XG4gIGJvcmRlci10b3AtcmlnaHQtcmFkaXVzOiBpbmhlcml0O1xufVxuLmxpc3QtZ3JvdXAtaXRlbTpsYXN0LWNoaWxkIHtcbiAgYm9yZGVyLWJvdHRvbS1yaWdodC1yYWRpdXM6IGluaGVyaXQ7XG4gIGJvcmRlci1ib3R0b20tbGVmdC1yYWRpdXM6IGluaGVyaXQ7XG59XG4ubGlzdC1ncm91cC1pdGVtLmRpc2FibGVkLCAubGlzdC1ncm91cC1pdGVtOmRpc2FibGVkIHtcbiAgY29sb3I6ICNjN2NkZDQ7XG4gIHBvaW50ZXItZXZlbnRzOiBub25lO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiB0cmFuc3BhcmVudDtcbn1cbi5saXN0LWdyb3VwLWl0ZW0uYWN0aXZlIHtcbiAgei1pbmRleDogMjtcbiAgY29sb3I6ICNmZmY7XG4gIGJhY2tncm91bmQtY29sb3I6IHJnYmEoMTA1LCAxMDgsIDI1NSwgMC4wOCk7XG4gIGJvcmRlci1jb2xvcjogcmdiYSgxMDUsIDEwOCwgMjU1LCAwLjA4KTtcbn1cbi5saXN0LWdyb3VwLWl0ZW0gKyAubGlzdC1ncm91cC1pdGVtIHtcbiAgYm9yZGVyLXRvcC13aWR0aDogMDtcbn1cbi5saXN0LWdyb3VwLWl0ZW0gKyAubGlzdC1ncm91cC1pdGVtLmFjdGl2ZSB7XG4gIG1hcmdpbi10b3A6IC0xcHg7XG4gIGJvcmRlci10b3Atd2lkdGg6IDFweDtcbn1cblxuLmxpc3QtZ3JvdXAtaG9yaXpvbnRhbCB7XG4gIGZsZXgtZGlyZWN0aW9uOiByb3c7XG59XG4ubGlzdC1ncm91cC1ob3Jpem9udGFsID4gLmxpc3QtZ3JvdXAtaXRlbTpmaXJzdC1jaGlsZCB7XG4gIGJvcmRlci1ib3R0b20tbGVmdC1yYWRpdXM6IDAuNXJlbTtcbiAgYm9yZGVyLXRvcC1yaWdodC1yYWRpdXM6IDA7XG59XG4ubGlzdC1ncm91cC1ob3Jpem9udGFsID4gLmxpc3QtZ3JvdXAtaXRlbTpsYXN0LWNoaWxkIHtcbiAgYm9yZGVyLXRvcC1yaWdodC1yYWRpdXM6IDAuNXJlbTtcbiAgYm9yZGVyLWJvdHRvbS1sZWZ0LXJhZGl1czogMDtcbn1cbi5saXN0LWdyb3VwLWhvcml6b250YWwgPiAubGlzdC1ncm91cC1pdGVtLmFjdGl2ZSB7XG4gIG1hcmdpbi10b3A6IDA7XG59XG4ubGlzdC1ncm91cC1ob3Jpem9udGFsID4gLmxpc3QtZ3JvdXAtaXRlbSArIC5saXN0LWdyb3VwLWl0ZW0ge1xuICBib3JkZXItdG9wLXdpZHRoOiAxcHg7XG4gIGJvcmRlci1sZWZ0LXdpZHRoOiAwO1xufVxuLmxpc3QtZ3JvdXAtaG9yaXpvbnRhbCA+IC5saXN0LWdyb3VwLWl0ZW0gKyAubGlzdC1ncm91cC1pdGVtLmFjdGl2ZSB7XG4gIG1hcmdpbi1sZWZ0OiAtMXB4O1xuICBib3JkZXItbGVmdC13aWR0aDogMXB4O1xufVxuXG5AbWVkaWEgKG1pbi13aWR0aDogNTc2cHgpIHtcbiAgLmxpc3QtZ3JvdXAtaG9yaXpvbnRhbC1zbSB7XG4gICAgZmxleC1kaXJlY3Rpb246IHJvdztcbiAgfVxuICAubGlzdC1ncm91cC1ob3Jpem9udGFsLXNtID4gLmxpc3QtZ3JvdXAtaXRlbTpmaXJzdC1jaGlsZCB7XG4gICAgYm9yZGVyLWJvdHRvbS1sZWZ0LXJhZGl1czogMC41cmVtO1xuICAgIGJvcmRlci10b3AtcmlnaHQtcmFkaXVzOiAwO1xuICB9XG4gIC5saXN0LWdyb3VwLWhvcml6b250YWwtc20gPiAubGlzdC1ncm91cC1pdGVtOmxhc3QtY2hpbGQge1xuICAgIGJvcmRlci10b3AtcmlnaHQtcmFkaXVzOiAwLjVyZW07XG4gICAgYm9yZGVyLWJvdHRvbS1sZWZ0LXJhZGl1czogMDtcbiAgfVxuICAubGlzdC1ncm91cC1ob3Jpem9udGFsLXNtID4gLmxpc3QtZ3JvdXAtaXRlbS5hY3RpdmUge1xuICAgIG1hcmdpbi10b3A6IDA7XG4gIH1cbiAgLmxpc3QtZ3JvdXAtaG9yaXpvbnRhbC1zbSA+IC5saXN0LWdyb3VwLWl0ZW0gKyAubGlzdC1ncm91cC1pdGVtIHtcbiAgICBib3JkZXItdG9wLXdpZHRoOiAxcHg7XG4gICAgYm9yZGVyLWxlZnQtd2lkdGg6IDA7XG4gIH1cbiAgLmxpc3QtZ3JvdXAtaG9yaXpvbnRhbC1zbSA+IC5saXN0LWdyb3VwLWl0ZW0gKyAubGlzdC1ncm91cC1pdGVtLmFjdGl2ZSB7XG4gICAgbWFyZ2luLWxlZnQ6IC0xcHg7XG4gICAgYm9yZGVyLWxlZnQtd2lkdGg6IDFweDtcbiAgfVxufVxuQG1lZGlhIChtaW4td2lkdGg6IDc2OHB4KSB7XG4gIC5saXN0LWdyb3VwLWhvcml6b250YWwtbWQge1xuICAgIGZsZXgtZGlyZWN0aW9uOiByb3c7XG4gIH1cbiAgLmxpc3QtZ3JvdXAtaG9yaXpvbnRhbC1tZCA+IC5saXN0LWdyb3VwLWl0ZW06Zmlyc3QtY2hpbGQge1xuICAgIGJvcmRlci1ib3R0b20tbGVmdC1yYWRpdXM6IDAuNXJlbTtcbiAgICBib3JkZXItdG9wLXJpZ2h0LXJhZGl1czogMDtcbiAgfVxuICAubGlzdC1ncm91cC1ob3Jpem9udGFsLW1kID4gLmxpc3QtZ3JvdXAtaXRlbTpsYXN0LWNoaWxkIHtcbiAgICBib3JkZXItdG9wLXJpZ2h0LXJhZGl1czogMC41cmVtO1xuICAgIGJvcmRlci1ib3R0b20tbGVmdC1yYWRpdXM6IDA7XG4gIH1cbiAgLmxpc3QtZ3JvdXAtaG9yaXpvbnRhbC1tZCA+IC5saXN0LWdyb3VwLWl0ZW0uYWN0aXZlIHtcbiAgICBtYXJnaW4tdG9wOiAwO1xuICB9XG4gIC5saXN0LWdyb3VwLWhvcml6b250YWwtbWQgPiAubGlzdC1ncm91cC1pdGVtICsgLmxpc3QtZ3JvdXAtaXRlbSB7XG4gICAgYm9yZGVyLXRvcC13aWR0aDogMXB4O1xuICAgIGJvcmRlci1sZWZ0LXdpZHRoOiAwO1xuICB9XG4gIC5saXN0LWdyb3VwLWhvcml6b250YWwtbWQgPiAubGlzdC1ncm91cC1pdGVtICsgLmxpc3QtZ3JvdXAtaXRlbS5hY3RpdmUge1xuICAgIG1hcmdpbi1sZWZ0OiAtMXB4O1xuICAgIGJvcmRlci1sZWZ0LXdpZHRoOiAxcHg7XG4gIH1cbn1cbkBtZWRpYSAobWluLXdpZHRoOiA5OTJweCkge1xuICAubGlzdC1ncm91cC1ob3Jpem9udGFsLWxnIHtcbiAgICBmbGV4LWRpcmVjdGlvbjogcm93O1xuICB9XG4gIC5saXN0LWdyb3VwLWhvcml6b250YWwtbGcgPiAubGlzdC1ncm91cC1pdGVtOmZpcnN0LWNoaWxkIHtcbiAgICBib3JkZXItYm90dG9tLWxlZnQtcmFkaXVzOiAwLjVyZW07XG4gICAgYm9yZGVyLXRvcC1yaWdodC1yYWRpdXM6IDA7XG4gIH1cbiAgLmxpc3QtZ3JvdXAtaG9yaXpvbnRhbC1sZyA+IC5saXN0LWdyb3VwLWl0ZW06bGFzdC1jaGlsZCB7XG4gICAgYm9yZGVyLXRvcC1yaWdodC1yYWRpdXM6IDAuNXJlbTtcbiAgICBib3JkZXItYm90dG9tLWxlZnQtcmFkaXVzOiAwO1xuICB9XG4gIC5saXN0LWdyb3VwLWhvcml6b250YWwtbGcgPiAubGlzdC1ncm91cC1pdGVtLmFjdGl2ZSB7XG4gICAgbWFyZ2luLXRvcDogMDtcbiAgfVxuICAubGlzdC1ncm91cC1ob3Jpem9udGFsLWxnID4gLmxpc3QtZ3JvdXAtaXRlbSArIC5saXN0LWdyb3VwLWl0ZW0ge1xuICAgIGJvcmRlci10b3Atd2lkdGg6IDFweDtcbiAgICBib3JkZXItbGVmdC13aWR0aDogMDtcbiAgfVxuICAubGlzdC1ncm91cC1ob3Jpem9udGFsLWxnID4gLmxpc3QtZ3JvdXAtaXRlbSArIC5saXN0LWdyb3VwLWl0ZW0uYWN0aXZlIHtcbiAgICBtYXJnaW4tbGVmdDogLTFweDtcbiAgICBib3JkZXItbGVmdC13aWR0aDogMXB4O1xuICB9XG59XG5AbWVkaWEgKG1pbi13aWR0aDogMTIwMHB4KSB7XG4gIC5saXN0LWdyb3VwLWhvcml6b250YWwteGwge1xuICAgIGZsZXgtZGlyZWN0aW9uOiByb3c7XG4gIH1cbiAgLmxpc3QtZ3JvdXAtaG9yaXpvbnRhbC14bCA+IC5saXN0LWdyb3VwLWl0ZW06Zmlyc3QtY2hpbGQge1xuICAgIGJvcmRlci1ib3R0b20tbGVmdC1yYWRpdXM6IDAuNXJlbTtcbiAgICBib3JkZXItdG9wLXJpZ2h0LXJhZGl1czogMDtcbiAgfVxuICAubGlzdC1ncm91cC1ob3Jpem9udGFsLXhsID4gLmxpc3QtZ3JvdXAtaXRlbTpsYXN0LWNoaWxkIHtcbiAgICBib3JkZXItdG9wLXJpZ2h0LXJhZGl1czogMC41cmVtO1xuICAgIGJvcmRlci1ib3R0b20tbGVmdC1yYWRpdXM6IDA7XG4gIH1cbiAgLmxpc3QtZ3JvdXAtaG9yaXpvbnRhbC14bCA+IC5saXN0LWdyb3VwLWl0ZW0uYWN0aXZlIHtcbiAgICBtYXJnaW4tdG9wOiAwO1xuICB9XG4gIC5saXN0LWdyb3VwLWhvcml6b250YWwteGwgPiAubGlzdC1ncm91cC1pdGVtICsgLmxpc3QtZ3JvdXAtaXRlbSB7XG4gICAgYm9yZGVyLXRvcC13aWR0aDogMXB4O1xuICAgIGJvcmRlci1sZWZ0LXdpZHRoOiAwO1xuICB9XG4gIC5saXN0LWdyb3VwLWhvcml6b250YWwteGwgPiAubGlzdC1ncm91cC1pdGVtICsgLmxpc3QtZ3JvdXAtaXRlbS5hY3RpdmUge1xuICAgIG1hcmdpbi1sZWZ0OiAtMXB4O1xuICAgIGJvcmRlci1sZWZ0LXdpZHRoOiAxcHg7XG4gIH1cbn1cbkBtZWRpYSAobWluLXdpZHRoOiAxNDAwcHgpIHtcbiAgLmxpc3QtZ3JvdXAtaG9yaXpvbnRhbC14eGwge1xuICAgIGZsZXgtZGlyZWN0aW9uOiByb3c7XG4gIH1cbiAgLmxpc3QtZ3JvdXAtaG9yaXpvbnRhbC14eGwgPiAubGlzdC1ncm91cC1pdGVtOmZpcnN0LWNoaWxkIHtcbiAgICBib3JkZXItYm90dG9tLWxlZnQtcmFkaXVzOiAwLjVyZW07XG4gICAgYm9yZGVyLXRvcC1yaWdodC1yYWRpdXM6IDA7XG4gIH1cbiAgLmxpc3QtZ3JvdXAtaG9yaXpvbnRhbC14eGwgPiAubGlzdC1ncm91cC1pdGVtOmxhc3QtY2hpbGQge1xuICAgIGJvcmRlci10b3AtcmlnaHQtcmFkaXVzOiAwLjVyZW07XG4gICAgYm9yZGVyLWJvdHRvbS1sZWZ0LXJhZGl1czogMDtcbiAgfVxuICAubGlzdC1ncm91cC1ob3Jpem9udGFsLXh4bCA+IC5saXN0LWdyb3VwLWl0ZW0uYWN0aXZlIHtcbiAgICBtYXJnaW4tdG9wOiAwO1xuICB9XG4gIC5saXN0LWdyb3VwLWhvcml6b250YWwteHhsID4gLmxpc3QtZ3JvdXAtaXRlbSArIC5saXN0LWdyb3VwLWl0ZW0ge1xuICAgIGJvcmRlci10b3Atd2lkdGg6IDFweDtcbiAgICBib3JkZXItbGVmdC13aWR0aDogMDtcbiAgfVxuICAubGlzdC1ncm91cC1ob3Jpem9udGFsLXh4bCA+IC5saXN0LWdyb3VwLWl0ZW0gKyAubGlzdC1ncm91cC1pdGVtLmFjdGl2ZSB7XG4gICAgbWFyZ2luLWxlZnQ6IC0xcHg7XG4gICAgYm9yZGVyLWxlZnQtd2lkdGg6IDFweDtcbiAgfVxufVxuLmxpc3QtZ3JvdXAtZmx1c2gge1xuICBib3JkZXItcmFkaXVzOiAwO1xufVxuLmxpc3QtZ3JvdXAtZmx1c2ggPiAubGlzdC1ncm91cC1pdGVtIHtcbiAgYm9yZGVyLXdpZHRoOiAwIDAgMXB4O1xufVxuLmxpc3QtZ3JvdXAtZmx1c2ggPiAubGlzdC1ncm91cC1pdGVtOmxhc3QtY2hpbGQge1xuICBib3JkZXItYm90dG9tLXdpZHRoOiAwO1xufVxuXG4uYnRuLWNsb3NlIHtcbiAgYm94LXNpemluZzogY29udGVudC1ib3g7XG4gIHdpZHRoOiAwLjhlbTtcbiAgaGVpZ2h0OiAwLjhlbTtcbiAgcGFkZGluZzogMC4yNWVtIDAuMjVlbTtcbiAgY29sb3I6ICNhMWFjYjg7XG4gIGJhY2tncm91bmQ6IHRyYW5zcGFyZW50IHVybChcImRhdGE6aW1hZ2Uvc3ZnK3htbCwlM0Nzdmcgd2lkdGg9JzE1MHB4JyBoZWlnaHQ9JzE1MXB4JyB2aWV3Qm94PScwIDAgMTUwIDE1MScgdmVyc2lvbj0nMS4xJyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHhtbG5zOnhsaW5rPSdodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rJyUzRSUzQ2RlZnMlM0UlM0Nwb2x5Z29uIGlkPSdwYXRoLTEnIHBvaW50cz0nMTMxLjI1MTY1NyAwIDc0Ljk5MzM3MDUgNTYuMjUgMTguNzQ4MzQyNiAwIDAgMTguNzUgNTYuMjQ1MDI3OCA3NSAwIDEzMS4yNSAxOC43NDgzNDI2IDE1MCA3NC45OTMzNzA1IDkzLjc1IDEzMS4yNTE2NTcgMTUwIDE1MCAxMzEuMjUgOTMuNzU0OTcyMiA3NSAxNTAgMTguNzUnJTNFJTNDL3BvbHlnb24lM0UlM0MvZGVmcyUzRSUzQ2cgaWQ9J/CfjqgtJTVCU2V0dXAlNUQ6LUNvbG9ycy0mYW1wOy1TaGFkb3dzJyBzdHJva2U9J25vbmUnIHN0cm9rZS13aWR0aD0nMScgZmlsbD0nbm9uZScgZmlsbC1ydWxlPSdldmVub2RkJyUzRSUzQ2cgaWQ9J0FydGJvYXJkJyB0cmFuc2Zvcm09J3RyYW5zbGF0ZSUyOC0yMjUuMDAwMDAwLCAtMjUwLjAwMDAwMCUyOSclM0UlM0NnIGlkPSdJY29uLUNvbG9yJyB0cmFuc2Zvcm09J3RyYW5zbGF0ZSUyODIyNS4wMDAwMDAsIDI1MC41MDAwMDAlMjknJTNFJTNDdXNlIGZpbGw9JyUyM2ExYWNiOCcgeGxpbms6aHJlZj0nJTIzcGF0aC0xJyUzRSUzQy91c2UlM0UlM0N1c2UgZmlsbC1vcGFjaXR5PScwLjUnIGZpbGw9JyUyM2ExYWNiOCcgeGxpbms6aHJlZj0nJTIzcGF0aC0xJyUzRSUzQy91c2UlM0UlM0MvZyUzRSUzQy9nJTNFJTNDL2clM0UlM0Mvc3ZnJTNFXCIpIGNlbnRlci8wLjhlbSBhdXRvIG5vLXJlcGVhdDtcbiAgYm9yZGVyOiAwO1xuICBib3JkZXItcmFkaXVzOiAwLjM3NXJlbTtcbiAgb3BhY2l0eTogMC45NTtcbn1cbi5idG4tY2xvc2U6aG92ZXIge1xuICBjb2xvcjogI2ExYWNiODtcbiAgdGV4dC1kZWNvcmF0aW9uOiBub25lO1xuICBvcGFjaXR5OiAwLjk1O1xufVxuLmJ0bi1jbG9zZTpmb2N1cyB7XG4gIG91dGxpbmU6IDA7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG4gIG9wYWNpdHk6IDAuOTU7XG59XG4uYnRuLWNsb3NlOmRpc2FibGVkLCAuYnRuLWNsb3NlLmRpc2FibGVkIHtcbiAgcG9pbnRlci1ldmVudHM6IG5vbmU7XG4gIHVzZXItc2VsZWN0OiBub25lO1xuICBvcGFjaXR5OiAwLjI1O1xufVxuXG4uYnRuLWNsb3NlLXdoaXRlIHtcbiAgZmlsdGVyOiBpbnZlcnQoMSkgZ3JheXNjYWxlKDEwMCUpIGJyaWdodG5lc3MoMjAwJSk7XG59XG5cbi50b2FzdCB7XG4gIHdpZHRoOiAzNTBweDtcbiAgbWF4LXdpZHRoOiAxMDAlO1xuICBmb250LXNpemU6IDAuOTM3NXJlbTtcbiAgcG9pbnRlci1ldmVudHM6IGF1dG87XG4gIGJhY2tncm91bmQtY29sb3I6ICNmZmY7XG4gIGJhY2tncm91bmQtY2xpcDogcGFkZGluZy1ib3g7XG4gIGJvcmRlcjogMCBzb2xpZCByZ2JhKDY3LCA4OSwgMTEzLCAwLjEpO1xuICBib3gtc2hhZG93OiAwIDAuMjVyZW0gMXJlbSByZ2JhKDE2MSwgMTcyLCAxODQsIDAuNDUpO1xuICBib3JkZXItcmFkaXVzOiAwLjVyZW07XG59XG4udG9hc3Quc2hvd2luZyB7XG4gIG9wYWNpdHk6IDA7XG59XG4udG9hc3Q6bm90KC5zaG93KSB7XG4gIGRpc3BsYXk6IG5vbmU7XG59XG5cbi50b2FzdC1jb250YWluZXIge1xuICB3aWR0aDogbWF4LWNvbnRlbnQ7XG4gIG1heC13aWR0aDogMTAwJTtcbiAgcG9pbnRlci1ldmVudHM6IG5vbmU7XG59XG4udG9hc3QtY29udGFpbmVyID4gOm5vdCg6bGFzdC1jaGlsZCkge1xuICBtYXJnaW4tYm90dG9tOiAxLjI1cmVtO1xufVxuXG4udG9hc3QtaGVhZGVyIHtcbiAgZGlzcGxheTogZmxleDtcbiAgYWxpZ24taXRlbXM6IGNlbnRlcjtcbiAgcGFkZGluZzogMS4yNXJlbSAxLjI1cmVtO1xuICBjb2xvcjogIzY5N2E4ZDtcbiAgYmFja2dyb3VuZC1jb2xvcjogdHJhbnNwYXJlbnQ7XG4gIGJhY2tncm91bmQtY2xpcDogcGFkZGluZy1ib3g7XG4gIGJvcmRlci1ib3R0b206IDAgc29saWQgdHJhbnNwYXJlbnQ7XG4gIGJvcmRlci10b3AtbGVmdC1yYWRpdXM6IDAuNXJlbTtcbiAgYm9yZGVyLXRvcC1yaWdodC1yYWRpdXM6IDAuNXJlbTtcbn1cbi50b2FzdC1oZWFkZXIgLmJ0bi1jbG9zZSB7XG4gIG1hcmdpbi1yaWdodDogLTAuNjI1cmVtO1xuICBtYXJnaW4tbGVmdDogMS4yNXJlbTtcbn1cblxuLnRvYXN0LWJvZHkge1xuICBwYWRkaW5nOiAxLjI1cmVtO1xuICB3b3JkLXdyYXA6IGJyZWFrLXdvcmQ7XG59XG5cbi5tb2RhbCB7XG4gIHBvc2l0aW9uOiBmaXhlZDtcbiAgdG9wOiAwO1xuICBsZWZ0OiAwO1xuICB6LWluZGV4OiAxMDkwO1xuICBkaXNwbGF5OiBub25lO1xuICB3aWR0aDogMTAwJTtcbiAgaGVpZ2h0OiAxMDAlO1xuICBvdmVyZmxvdy14OiBoaWRkZW47XG4gIG92ZXJmbG93LXk6IGF1dG87XG4gIG91dGxpbmU6IDA7XG59XG5cbi5tb2RhbC1kaWFsb2cge1xuICBwb3NpdGlvbjogcmVsYXRpdmU7XG4gIHdpZHRoOiBhdXRvO1xuICBtYXJnaW46IDEuNXJlbTtcbiAgcG9pbnRlci1ldmVudHM6IG5vbmU7XG59XG4ubW9kYWwuZmFkZSAubW9kYWwtZGlhbG9nIHtcbiAgdHJhbnNpdGlvbjogdHJhbnNmb3JtIDAuMTVzIGVhc2Utb3V0O1xuICB0cmFuc2Zvcm06IHRyYW5zbGF0ZVkoLTEwMHB4KSBzY2FsZSgwLjgpO1xufVxuQG1lZGlhIChwcmVmZXJzLXJlZHVjZWQtbW90aW9uOiByZWR1Y2UpIHtcbiAgLm1vZGFsLmZhZGUgLm1vZGFsLWRpYWxvZyB7XG4gICAgdHJhbnNpdGlvbjogbm9uZTtcbiAgfVxufVxuLm1vZGFsLnNob3cgLm1vZGFsLWRpYWxvZyB7XG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlWSgwKSBzY2FsZSgxKTtcbn1cbi5tb2RhbC5tb2RhbC1zdGF0aWMgLm1vZGFsLWRpYWxvZyB7XG4gIHRyYW5zZm9ybTogc2NhbGUoMS4wMik7XG59XG5cbi5tb2RhbC1kaWFsb2ctc2Nyb2xsYWJsZSB7XG4gIGhlaWdodDogY2FsYygxMDAlIC0gM3JlbSk7XG59XG4ubW9kYWwtZGlhbG9nLXNjcm9sbGFibGUgLm1vZGFsLWNvbnRlbnQge1xuICBtYXgtaGVpZ2h0OiAxMDAlO1xuICBvdmVyZmxvdzogaGlkZGVuO1xufVxuLm1vZGFsLWRpYWxvZy1zY3JvbGxhYmxlIC5tb2RhbC1ib2R5IHtcbiAgb3ZlcmZsb3cteTogYXV0bztcbn1cblxuLm1vZGFsLWRpYWxvZy1jZW50ZXJlZCB7XG4gIGRpc3BsYXk6IGZsZXg7XG4gIGFsaWduLWl0ZW1zOiBjZW50ZXI7XG4gIG1pbi1oZWlnaHQ6IGNhbGMoMTAwJSAtIDNyZW0pO1xufVxuXG4ubW9kYWwtY29udGVudCB7XG4gIHBvc2l0aW9uOiByZWxhdGl2ZTtcbiAgZGlzcGxheTogZmxleDtcbiAgZmxleC1kaXJlY3Rpb246IGNvbHVtbjtcbiAgd2lkdGg6IDEwMCU7XG4gIHBvaW50ZXItZXZlbnRzOiBhdXRvO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNsaXA6IHBhZGRpbmctYm94O1xuICBib3JkZXI6IDBweCBzb2xpZCByZ2JhKDY3LCA4OSwgMTEzLCAwLjIpO1xuICBib3JkZXItcmFkaXVzOiAwLjVyZW07XG4gIG91dGxpbmU6IDA7XG59XG5cbi5tb2RhbC1iYWNrZHJvcCB7XG4gIHBvc2l0aW9uOiBmaXhlZDtcbiAgdG9wOiAwO1xuICBsZWZ0OiAwO1xuICB6LWluZGV4OiAxMDg5O1xuICB3aWR0aDogMTAwdnc7XG4gIGhlaWdodDogMTAwdmg7XG4gIGJhY2tncm91bmQtY29sb3I6ICM0MzU5NzE7XG59XG4ubW9kYWwtYmFja2Ryb3AuZmFkZSB7XG4gIG9wYWNpdHk6IDA7XG59XG4ubW9kYWwtYmFja2Ryb3Auc2hvdyB7XG4gIG9wYWNpdHk6IDAuNTtcbn1cblxuLm1vZGFsLWhlYWRlciB7XG4gIGRpc3BsYXk6IGZsZXg7XG4gIGZsZXgtc2hyaW5rOiAwO1xuICBhbGlnbi1pdGVtczogY2VudGVyO1xuICBqdXN0aWZ5LWNvbnRlbnQ6IHNwYWNlLWJldHdlZW47XG4gIHBhZGRpbmc6IDEuNXJlbSAxLjVyZW0gMC4yNXJlbTtcbiAgYm9yZGVyLWJvdHRvbTogMHB4IHNvbGlkICNkOWRlZTM7XG4gIGJvcmRlci10b3AtbGVmdC1yYWRpdXM6IGNhbGMoMC41cmVtIC0gMHB4KTtcbiAgYm9yZGVyLXRvcC1yaWdodC1yYWRpdXM6IGNhbGMoMC41cmVtIC0gMHB4KTtcbn1cbi5tb2RhbC1oZWFkZXIgLmJ0bi1jbG9zZSB7XG4gIHBhZGRpbmc6IDAuMTI1cmVtIDAuNzVyZW07XG4gIG1hcmdpbjogLTAuMTI1cmVtIC0wLjc1cmVtIC0wLjEyNXJlbSBhdXRvO1xufVxuXG4ubW9kYWwtdGl0bGUge1xuICBtYXJnaW4tYm90dG9tOiAwO1xuICBsaW5lLWhlaWdodDogMS41Mztcbn1cblxuLm1vZGFsLWJvZHkge1xuICBwb3NpdGlvbjogcmVsYXRpdmU7XG4gIGZsZXg6IDEgMSBhdXRvO1xuICBwYWRkaW5nOiAxLjVyZW07XG59XG5cbi5tb2RhbC1mb290ZXIge1xuICBkaXNwbGF5OiBmbGV4O1xuICBmbGV4LXdyYXA6IHdyYXA7XG4gIGZsZXgtc2hyaW5rOiAwO1xuICBhbGlnbi1pdGVtczogY2VudGVyO1xuICBqdXN0aWZ5LWNvbnRlbnQ6IGZsZXgtZW5kO1xuICBwYWRkaW5nOiAxLjI1cmVtO1xuICBib3JkZXItdG9wOiAwcHggc29saWQgI2Q5ZGVlMztcbiAgYm9yZGVyLWJvdHRvbS1yaWdodC1yYWRpdXM6IGNhbGMoMC41cmVtIC0gMHB4KTtcbiAgYm9yZGVyLWJvdHRvbS1sZWZ0LXJhZGl1czogY2FsYygwLjVyZW0gLSAwcHgpO1xufVxuLm1vZGFsLWZvb3RlciA+ICoge1xuICBtYXJnaW46IDAuMjVyZW07XG59XG5cbkBtZWRpYSAobWluLXdpZHRoOiA1NzZweCkge1xuICAubW9kYWwtZGlhbG9nIHtcbiAgICBtYXgtd2lkdGg6IDM1cmVtO1xuICAgIG1hcmdpbjogMS43NXJlbSBhdXRvO1xuICB9XG5cbiAgLm1vZGFsLWRpYWxvZy1zY3JvbGxhYmxlIHtcbiAgICBoZWlnaHQ6IGNhbGMoMTAwJSAtIDMuNXJlbSk7XG4gIH1cblxuICAubW9kYWwtZGlhbG9nLWNlbnRlcmVkIHtcbiAgICBtaW4taGVpZ2h0OiBjYWxjKDEwMCUgLSAzLjVyZW0pO1xuICB9XG5cbiAgLm1vZGFsLXNtIHtcbiAgICBtYXgtd2lkdGg6IDIyLjVyZW07XG4gIH1cbn1cbkBtZWRpYSAobWluLXdpZHRoOiA5OTJweCkge1xuICAubW9kYWwtbGcsXG4ubW9kYWwteGwge1xuICAgIG1heC13aWR0aDogNTByZW07XG4gIH1cbn1cbkBtZWRpYSAobWluLXdpZHRoOiAxMjAwcHgpIHtcbiAgLm1vZGFsLXhsIHtcbiAgICBtYXgtd2lkdGg6IDExNDBweDtcbiAgfVxufVxuLm1vZGFsLWZ1bGxzY3JlZW4ge1xuICB3aWR0aDogMTAwdnc7XG4gIG1heC13aWR0aDogbm9uZTtcbiAgaGVpZ2h0OiAxMDAlO1xuICBtYXJnaW46IDA7XG59XG4ubW9kYWwtZnVsbHNjcmVlbiAubW9kYWwtY29udGVudCB7XG4gIGhlaWdodDogMTAwJTtcbiAgYm9yZGVyOiAwO1xuICBib3JkZXItcmFkaXVzOiAwO1xufVxuLm1vZGFsLWZ1bGxzY3JlZW4gLm1vZGFsLWhlYWRlciB7XG4gIGJvcmRlci1yYWRpdXM6IDA7XG59XG4ubW9kYWwtZnVsbHNjcmVlbiAubW9kYWwtYm9keSB7XG4gIG92ZXJmbG93LXk6IGF1dG87XG59XG4ubW9kYWwtZnVsbHNjcmVlbiAubW9kYWwtZm9vdGVyIHtcbiAgYm9yZGVyLXJhZGl1czogMDtcbn1cblxuQG1lZGlhIChtYXgtd2lkdGg6IDU3NS45OHB4KSB7XG4gIC5tb2RhbC1mdWxsc2NyZWVuLXNtLWRvd24ge1xuICAgIHdpZHRoOiAxMDB2dztcbiAgICBtYXgtd2lkdGg6IG5vbmU7XG4gICAgaGVpZ2h0OiAxMDAlO1xuICAgIG1hcmdpbjogMDtcbiAgfVxuICAubW9kYWwtZnVsbHNjcmVlbi1zbS1kb3duIC5tb2RhbC1jb250ZW50IHtcbiAgICBoZWlnaHQ6IDEwMCU7XG4gICAgYm9yZGVyOiAwO1xuICAgIGJvcmRlci1yYWRpdXM6IDA7XG4gIH1cbiAgLm1vZGFsLWZ1bGxzY3JlZW4tc20tZG93biAubW9kYWwtaGVhZGVyIHtcbiAgICBib3JkZXItcmFkaXVzOiAwO1xuICB9XG4gIC5tb2RhbC1mdWxsc2NyZWVuLXNtLWRvd24gLm1vZGFsLWJvZHkge1xuICAgIG92ZXJmbG93LXk6IGF1dG87XG4gIH1cbiAgLm1vZGFsLWZ1bGxzY3JlZW4tc20tZG93biAubW9kYWwtZm9vdGVyIHtcbiAgICBib3JkZXItcmFkaXVzOiAwO1xuICB9XG59XG5AbWVkaWEgKG1heC13aWR0aDogNzY3Ljk4cHgpIHtcbiAgLm1vZGFsLWZ1bGxzY3JlZW4tbWQtZG93biB7XG4gICAgd2lkdGg6IDEwMHZ3O1xuICAgIG1heC13aWR0aDogbm9uZTtcbiAgICBoZWlnaHQ6IDEwMCU7XG4gICAgbWFyZ2luOiAwO1xuICB9XG4gIC5tb2RhbC1mdWxsc2NyZWVuLW1kLWRvd24gLm1vZGFsLWNvbnRlbnQge1xuICAgIGhlaWdodDogMTAwJTtcbiAgICBib3JkZXI6IDA7XG4gICAgYm9yZGVyLXJhZGl1czogMDtcbiAgfVxuICAubW9kYWwtZnVsbHNjcmVlbi1tZC1kb3duIC5tb2RhbC1oZWFkZXIge1xuICAgIGJvcmRlci1yYWRpdXM6IDA7XG4gIH1cbiAgLm1vZGFsLWZ1bGxzY3JlZW4tbWQtZG93biAubW9kYWwtYm9keSB7XG4gICAgb3ZlcmZsb3cteTogYXV0bztcbiAgfVxuICAubW9kYWwtZnVsbHNjcmVlbi1tZC1kb3duIC5tb2RhbC1mb290ZXIge1xuICAgIGJvcmRlci1yYWRpdXM6IDA7XG4gIH1cbn1cbkBtZWRpYSAobWF4LXdpZHRoOiA5OTEuOThweCkge1xuICAubW9kYWwtZnVsbHNjcmVlbi1sZy1kb3duIHtcbiAgICB3aWR0aDogMTAwdnc7XG4gICAgbWF4LXdpZHRoOiBub25lO1xuICAgIGhlaWdodDogMTAwJTtcbiAgICBtYXJnaW46IDA7XG4gIH1cbiAgLm1vZGFsLWZ1bGxzY3JlZW4tbGctZG93biAubW9kYWwtY29udGVudCB7XG4gICAgaGVpZ2h0OiAxMDAlO1xuICAgIGJvcmRlcjogMDtcbiAgICBib3JkZXItcmFkaXVzOiAwO1xuICB9XG4gIC5tb2RhbC1mdWxsc2NyZWVuLWxnLWRvd24gLm1vZGFsLWhlYWRlciB7XG4gICAgYm9yZGVyLXJhZGl1czogMDtcbiAgfVxuICAubW9kYWwtZnVsbHNjcmVlbi1sZy1kb3duIC5tb2RhbC1ib2R5IHtcbiAgICBvdmVyZmxvdy15OiBhdXRvO1xuICB9XG4gIC5tb2RhbC1mdWxsc2NyZWVuLWxnLWRvd24gLm1vZGFsLWZvb3RlciB7XG4gICAgYm9yZGVyLXJhZGl1czogMDtcbiAgfVxufVxuQG1lZGlhIChtYXgtd2lkdGg6IDExOTkuOThweCkge1xuICAubW9kYWwtZnVsbHNjcmVlbi14bC1kb3duIHtcbiAgICB3aWR0aDogMTAwdnc7XG4gICAgbWF4LXdpZHRoOiBub25lO1xuICAgIGhlaWdodDogMTAwJTtcbiAgICBtYXJnaW46IDA7XG4gIH1cbiAgLm1vZGFsLWZ1bGxzY3JlZW4teGwtZG93biAubW9kYWwtY29udGVudCB7XG4gICAgaGVpZ2h0OiAxMDAlO1xuICAgIGJvcmRlcjogMDtcbiAgICBib3JkZXItcmFkaXVzOiAwO1xuICB9XG4gIC5tb2RhbC1mdWxsc2NyZWVuLXhsLWRvd24gLm1vZGFsLWhlYWRlciB7XG4gICAgYm9yZGVyLXJhZGl1czogMDtcbiAgfVxuICAubW9kYWwtZnVsbHNjcmVlbi14bC1kb3duIC5tb2RhbC1ib2R5IHtcbiAgICBvdmVyZmxvdy15OiBhdXRvO1xuICB9XG4gIC5tb2RhbC1mdWxsc2NyZWVuLXhsLWRvd24gLm1vZGFsLWZvb3RlciB7XG4gICAgYm9yZGVyLXJhZGl1czogMDtcbiAgfVxufVxuQG1lZGlhIChtYXgtd2lkdGg6IDEzOTkuOThweCkge1xuICAubW9kYWwtZnVsbHNjcmVlbi14eGwtZG93biB7XG4gICAgd2lkdGg6IDEwMHZ3O1xuICAgIG1heC13aWR0aDogbm9uZTtcbiAgICBoZWlnaHQ6IDEwMCU7XG4gICAgbWFyZ2luOiAwO1xuICB9XG4gIC5tb2RhbC1mdWxsc2NyZWVuLXh4bC1kb3duIC5tb2RhbC1jb250ZW50IHtcbiAgICBoZWlnaHQ6IDEwMCU7XG4gICAgYm9yZGVyOiAwO1xuICAgIGJvcmRlci1yYWRpdXM6IDA7XG4gIH1cbiAgLm1vZGFsLWZ1bGxzY3JlZW4teHhsLWRvd24gLm1vZGFsLWhlYWRlciB7XG4gICAgYm9yZGVyLXJhZGl1czogMDtcbiAgfVxuICAubW9kYWwtZnVsbHNjcmVlbi14eGwtZG93biAubW9kYWwtYm9keSB7XG4gICAgb3ZlcmZsb3cteTogYXV0bztcbiAgfVxuICAubW9kYWwtZnVsbHNjcmVlbi14eGwtZG93biAubW9kYWwtZm9vdGVyIHtcbiAgICBib3JkZXItcmFkaXVzOiAwO1xuICB9XG59XG4udG9vbHRpcCB7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgei1pbmRleDogMTA5OTtcbiAgZGlzcGxheTogYmxvY2s7XG4gIG1hcmdpbjogMDtcbiAgZm9udC1mYW1pbHk6IHZhcigtLWJzLWZvbnQtc2Fucy1zZXJpZik7XG4gIGZvbnQtc3R5bGU6IG5vcm1hbDtcbiAgZm9udC13ZWlnaHQ6IDQwMDtcbiAgbGluZS1oZWlnaHQ6IDEuNTM7XG4gIHRleHQtYWxpZ246IGxlZnQ7XG4gIHRleHQtYWxpZ246IHN0YXJ0O1xuICB0ZXh0LWRlY29yYXRpb246IG5vbmU7XG4gIHRleHQtc2hhZG93OiBub25lO1xuICB0ZXh0LXRyYW5zZm9ybTogbm9uZTtcbiAgbGV0dGVyLXNwYWNpbmc6IG5vcm1hbDtcbiAgd29yZC1icmVhazogbm9ybWFsO1xuICB3b3JkLXNwYWNpbmc6IG5vcm1hbDtcbiAgd2hpdGUtc3BhY2U6IG5vcm1hbDtcbiAgbGluZS1icmVhazogYXV0bztcbiAgZm9udC1zaXplOiAwLjkzNzVyZW07XG4gIHdvcmQtd3JhcDogYnJlYWstd29yZDtcbiAgb3BhY2l0eTogMDtcbn1cbi50b29sdGlwLnNob3cge1xuICBvcGFjaXR5OiAxO1xufVxuLnRvb2x0aXAgLnRvb2x0aXAtYXJyb3cge1xuICBwb3NpdGlvbjogYWJzb2x1dGU7XG4gIGRpc3BsYXk6IGJsb2NrO1xuICB3aWR0aDogMC44cmVtO1xuICBoZWlnaHQ6IDAuNHJlbTtcbn1cbi50b29sdGlwIC50b29sdGlwLWFycm93OjpiZWZvcmUge1xuICBwb3NpdGlvbjogYWJzb2x1dGU7XG4gIGNvbnRlbnQ6IFwiXCI7XG4gIGJvcmRlci1jb2xvcjogdHJhbnNwYXJlbnQ7XG4gIGJvcmRlci1zdHlsZTogc29saWQ7XG59XG5cbi5icy10b29sdGlwLXRvcCwgLmJzLXRvb2x0aXAtYXV0b1tkYXRhLXBvcHBlci1wbGFjZW1lbnRePXRvcF0ge1xuICBwYWRkaW5nOiAwLjRyZW0gMDtcbn1cbi5icy10b29sdGlwLXRvcCAudG9vbHRpcC1hcnJvdywgLmJzLXRvb2x0aXAtYXV0b1tkYXRhLXBvcHBlci1wbGFjZW1lbnRePXRvcF0gLnRvb2x0aXAtYXJyb3cge1xuICBib3R0b206IDA7XG59XG4uYnMtdG9vbHRpcC10b3AgLnRvb2x0aXAtYXJyb3c6OmJlZm9yZSwgLmJzLXRvb2x0aXAtYXV0b1tkYXRhLXBvcHBlci1wbGFjZW1lbnRePXRvcF0gLnRvb2x0aXAtYXJyb3c6OmJlZm9yZSB7XG4gIHRvcDogLTFweDtcbiAgYm9yZGVyLXdpZHRoOiAwLjRyZW0gMC40cmVtIDA7XG4gIGJvcmRlci10b3AtY29sb3I6ICMyMzM0NDY7XG59XG5cbi5icy10b29sdGlwLWVuZCwgLmJzLXRvb2x0aXAtYXV0b1tkYXRhLXBvcHBlci1wbGFjZW1lbnRePXJpZ2h0XSB7XG4gIHBhZGRpbmc6IDAgMC40cmVtO1xufVxuLmJzLXRvb2x0aXAtZW5kIC50b29sdGlwLWFycm93LCAuYnMtdG9vbHRpcC1hdXRvW2RhdGEtcG9wcGVyLXBsYWNlbWVudF49cmlnaHRdIC50b29sdGlwLWFycm93IHtcbiAgbGVmdDogMDtcbiAgd2lkdGg6IDAuNHJlbTtcbiAgaGVpZ2h0OiAwLjhyZW07XG59XG4uYnMtdG9vbHRpcC1lbmQgLnRvb2x0aXAtYXJyb3c6OmJlZm9yZSwgLmJzLXRvb2x0aXAtYXV0b1tkYXRhLXBvcHBlci1wbGFjZW1lbnRePXJpZ2h0XSAudG9vbHRpcC1hcnJvdzo6YmVmb3JlIHtcbiAgcmlnaHQ6IC0xcHg7XG4gIGJvcmRlci13aWR0aDogMC40cmVtIDAuNHJlbSAwLjRyZW0gMDtcbiAgYm9yZGVyLXJpZ2h0LWNvbG9yOiAjMjMzNDQ2O1xufVxuXG4uYnMtdG9vbHRpcC1ib3R0b20sIC5icy10b29sdGlwLWF1dG9bZGF0YS1wb3BwZXItcGxhY2VtZW50Xj1ib3R0b21dIHtcbiAgcGFkZGluZzogMC40cmVtIDA7XG59XG4uYnMtdG9vbHRpcC1ib3R0b20gLnRvb2x0aXAtYXJyb3csIC5icy10b29sdGlwLWF1dG9bZGF0YS1wb3BwZXItcGxhY2VtZW50Xj1ib3R0b21dIC50b29sdGlwLWFycm93IHtcbiAgdG9wOiAwO1xufVxuLmJzLXRvb2x0aXAtYm90dG9tIC50b29sdGlwLWFycm93OjpiZWZvcmUsIC5icy10b29sdGlwLWF1dG9bZGF0YS1wb3BwZXItcGxhY2VtZW50Xj1ib3R0b21dIC50b29sdGlwLWFycm93OjpiZWZvcmUge1xuICBib3R0b206IC0xcHg7XG4gIGJvcmRlci13aWR0aDogMCAwLjRyZW0gMC40cmVtO1xuICBib3JkZXItYm90dG9tLWNvbG9yOiAjMjMzNDQ2O1xufVxuXG4uYnMtdG9vbHRpcC1zdGFydCwgLmJzLXRvb2x0aXAtYXV0b1tkYXRhLXBvcHBlci1wbGFjZW1lbnRePWxlZnRdIHtcbiAgcGFkZGluZzogMCAwLjRyZW07XG59XG4uYnMtdG9vbHRpcC1zdGFydCAudG9vbHRpcC1hcnJvdywgLmJzLXRvb2x0aXAtYXV0b1tkYXRhLXBvcHBlci1wbGFjZW1lbnRePWxlZnRdIC50b29sdGlwLWFycm93IHtcbiAgcmlnaHQ6IDA7XG4gIHdpZHRoOiAwLjRyZW07XG4gIGhlaWdodDogMC44cmVtO1xufVxuLmJzLXRvb2x0aXAtc3RhcnQgLnRvb2x0aXAtYXJyb3c6OmJlZm9yZSwgLmJzLXRvb2x0aXAtYXV0b1tkYXRhLXBvcHBlci1wbGFjZW1lbnRePWxlZnRdIC50b29sdGlwLWFycm93OjpiZWZvcmUge1xuICBsZWZ0OiAtMXB4O1xuICBib3JkZXItd2lkdGg6IDAuNHJlbSAwIDAuNHJlbSAwLjRyZW07XG4gIGJvcmRlci1sZWZ0LWNvbG9yOiAjMjMzNDQ2O1xufVxuXG4udG9vbHRpcC1pbm5lciB7XG4gIG1heC13aWR0aDogMjAwcHg7XG4gIHBhZGRpbmc6IDAuMjVyZW0gMC43cmVtO1xuICBjb2xvcjogI2ZmZjtcbiAgdGV4dC1hbGlnbjogY2VudGVyO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMjMzNDQ2O1xuICBib3JkZXItcmFkaXVzOiAwLjI1cmVtO1xufVxuXG4ucG9wb3ZlciB7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgdG9wOiAwO1xuICBsZWZ0OiAwIC8qIHJ0bDppZ25vcmUgKi87XG4gIHotaW5kZXg6IDEwOTE7XG4gIGRpc3BsYXk6IGJsb2NrO1xuICBtYXgtd2lkdGg6IDI3NnB4O1xuICBmb250LWZhbWlseTogdmFyKC0tYnMtZm9udC1zYW5zLXNlcmlmKTtcbiAgZm9udC1zdHlsZTogbm9ybWFsO1xuICBmb250LXdlaWdodDogNDAwO1xuICBsaW5lLWhlaWdodDogMS41MztcbiAgdGV4dC1hbGlnbjogbGVmdDtcbiAgdGV4dC1hbGlnbjogc3RhcnQ7XG4gIHRleHQtZGVjb3JhdGlvbjogbm9uZTtcbiAgdGV4dC1zaGFkb3c6IG5vbmU7XG4gIHRleHQtdHJhbnNmb3JtOiBub25lO1xuICBsZXR0ZXItc3BhY2luZzogbm9ybWFsO1xuICB3b3JkLWJyZWFrOiBub3JtYWw7XG4gIHdvcmQtc3BhY2luZzogbm9ybWFsO1xuICB3aGl0ZS1zcGFjZTogbm9ybWFsO1xuICBsaW5lLWJyZWFrOiBhdXRvO1xuICBmb250LXNpemU6IDAuOTM3NXJlbTtcbiAgd29yZC13cmFwOiBicmVhay13b3JkO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNsaXA6IHBhZGRpbmctYm94O1xuICBib3JkZXI6IDBweCBzb2xpZCByZ2JhKDY3LCA4OSwgMTEzLCAwLjIpO1xuICBib3JkZXItcmFkaXVzOiAwLjVyZW07XG59XG4ucG9wb3ZlciAucG9wb3Zlci1hcnJvdyB7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgZGlzcGxheTogYmxvY2s7XG4gIHdpZHRoOiAxcmVtO1xuICBoZWlnaHQ6IDAuNXJlbTtcbn1cbi5wb3BvdmVyIC5wb3BvdmVyLWFycm93OjpiZWZvcmUsIC5wb3BvdmVyIC5wb3BvdmVyLWFycm93OjphZnRlciB7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgZGlzcGxheTogYmxvY2s7XG4gIGNvbnRlbnQ6IFwiXCI7XG4gIGJvcmRlci1jb2xvcjogdHJhbnNwYXJlbnQ7XG4gIGJvcmRlci1zdHlsZTogc29saWQ7XG59XG5cbi5icy1wb3BvdmVyLXRvcCA+IC5wb3BvdmVyLWFycm93LCAuYnMtcG9wb3Zlci1hdXRvW2RhdGEtcG9wcGVyLXBsYWNlbWVudF49dG9wXSA+IC5wb3BvdmVyLWFycm93IHtcbiAgYm90dG9tOiBjYWxjKC0wLjVyZW0gLSAwcHgpO1xufVxuLmJzLXBvcG92ZXItdG9wID4gLnBvcG92ZXItYXJyb3c6OmJlZm9yZSwgLmJzLXBvcG92ZXItYXV0b1tkYXRhLXBvcHBlci1wbGFjZW1lbnRePXRvcF0gPiAucG9wb3Zlci1hcnJvdzo6YmVmb3JlIHtcbiAgYm90dG9tOiAwO1xuICBib3JkZXItd2lkdGg6IDAuNXJlbSAwLjVyZW0gMDtcbiAgYm9yZGVyLXRvcC1jb2xvcjogI2ZmZjtcbn1cbi5icy1wb3BvdmVyLXRvcCA+IC5wb3BvdmVyLWFycm93OjphZnRlciwgLmJzLXBvcG92ZXItYXV0b1tkYXRhLXBvcHBlci1wbGFjZW1lbnRePXRvcF0gPiAucG9wb3Zlci1hcnJvdzo6YWZ0ZXIge1xuICBib3R0b206IDBweDtcbiAgYm9yZGVyLXdpZHRoOiAwLjVyZW0gMC41cmVtIDA7XG4gIGJvcmRlci10b3AtY29sb3I6ICNmZmY7XG59XG5cbi5icy1wb3BvdmVyLWVuZCA+IC5wb3BvdmVyLWFycm93LCAuYnMtcG9wb3Zlci1hdXRvW2RhdGEtcG9wcGVyLXBsYWNlbWVudF49cmlnaHRdID4gLnBvcG92ZXItYXJyb3cge1xuICBsZWZ0OiBjYWxjKC0wLjVyZW0gLSAwcHgpO1xuICB3aWR0aDogMC41cmVtO1xuICBoZWlnaHQ6IDFyZW07XG59XG4uYnMtcG9wb3Zlci1lbmQgPiAucG9wb3Zlci1hcnJvdzo6YmVmb3JlLCAuYnMtcG9wb3Zlci1hdXRvW2RhdGEtcG9wcGVyLXBsYWNlbWVudF49cmlnaHRdID4gLnBvcG92ZXItYXJyb3c6OmJlZm9yZSB7XG4gIGxlZnQ6IDA7XG4gIGJvcmRlci13aWR0aDogMC41cmVtIDAuNXJlbSAwLjVyZW0gMDtcbiAgYm9yZGVyLXJpZ2h0LWNvbG9yOiAjZmZmO1xufVxuLmJzLXBvcG92ZXItZW5kID4gLnBvcG92ZXItYXJyb3c6OmFmdGVyLCAuYnMtcG9wb3Zlci1hdXRvW2RhdGEtcG9wcGVyLXBsYWNlbWVudF49cmlnaHRdID4gLnBvcG92ZXItYXJyb3c6OmFmdGVyIHtcbiAgbGVmdDogMHB4O1xuICBib3JkZXItd2lkdGg6IDAuNXJlbSAwLjVyZW0gMC41cmVtIDA7XG4gIGJvcmRlci1yaWdodC1jb2xvcjogI2ZmZjtcbn1cblxuLmJzLXBvcG92ZXItYm90dG9tID4gLnBvcG92ZXItYXJyb3csIC5icy1wb3BvdmVyLWF1dG9bZGF0YS1wb3BwZXItcGxhY2VtZW50Xj1ib3R0b21dID4gLnBvcG92ZXItYXJyb3cge1xuICB0b3A6IGNhbGMoLTAuNXJlbSAtIDBweCk7XG59XG4uYnMtcG9wb3Zlci1ib3R0b20gPiAucG9wb3Zlci1hcnJvdzo6YmVmb3JlLCAuYnMtcG9wb3Zlci1hdXRvW2RhdGEtcG9wcGVyLXBsYWNlbWVudF49Ym90dG9tXSA+IC5wb3BvdmVyLWFycm93OjpiZWZvcmUge1xuICB0b3A6IDA7XG4gIGJvcmRlci13aWR0aDogMCAwLjVyZW0gMC41cmVtIDAuNXJlbTtcbiAgYm9yZGVyLWJvdHRvbS1jb2xvcjogI2ZmZjtcbn1cbi5icy1wb3BvdmVyLWJvdHRvbSA+IC5wb3BvdmVyLWFycm93OjphZnRlciwgLmJzLXBvcG92ZXItYXV0b1tkYXRhLXBvcHBlci1wbGFjZW1lbnRePWJvdHRvbV0gPiAucG9wb3Zlci1hcnJvdzo6YWZ0ZXIge1xuICB0b3A6IDBweDtcbiAgYm9yZGVyLXdpZHRoOiAwIDAuNXJlbSAwLjVyZW0gMC41cmVtO1xuICBib3JkZXItYm90dG9tLWNvbG9yOiAjZmZmO1xufVxuLmJzLXBvcG92ZXItYm90dG9tIC5wb3BvdmVyLWhlYWRlcjo6YmVmb3JlLCAuYnMtcG9wb3Zlci1hdXRvW2RhdGEtcG9wcGVyLXBsYWNlbWVudF49Ym90dG9tXSAucG9wb3Zlci1oZWFkZXI6OmJlZm9yZSB7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgdG9wOiAwO1xuICBsZWZ0OiA1MCU7XG4gIGRpc3BsYXk6IGJsb2NrO1xuICB3aWR0aDogMXJlbTtcbiAgbWFyZ2luLWxlZnQ6IC0wLjVyZW07XG4gIGNvbnRlbnQ6IFwiXCI7XG4gIGJvcmRlci1ib3R0b206IDBweCBzb2xpZCB0cmFuc3BhcmVudDtcbn1cblxuLmJzLXBvcG92ZXItc3RhcnQgPiAucG9wb3Zlci1hcnJvdywgLmJzLXBvcG92ZXItYXV0b1tkYXRhLXBvcHBlci1wbGFjZW1lbnRePWxlZnRdID4gLnBvcG92ZXItYXJyb3cge1xuICByaWdodDogY2FsYygtMC41cmVtIC0gMHB4KTtcbiAgd2lkdGg6IDAuNXJlbTtcbiAgaGVpZ2h0OiAxcmVtO1xufVxuLmJzLXBvcG92ZXItc3RhcnQgPiAucG9wb3Zlci1hcnJvdzo6YmVmb3JlLCAuYnMtcG9wb3Zlci1hdXRvW2RhdGEtcG9wcGVyLXBsYWNlbWVudF49bGVmdF0gPiAucG9wb3Zlci1hcnJvdzo6YmVmb3JlIHtcbiAgcmlnaHQ6IDA7XG4gIGJvcmRlci13aWR0aDogMC41cmVtIDAgMC41cmVtIDAuNXJlbTtcbiAgYm9yZGVyLWxlZnQtY29sb3I6ICNmZmY7XG59XG4uYnMtcG9wb3Zlci1zdGFydCA+IC5wb3BvdmVyLWFycm93OjphZnRlciwgLmJzLXBvcG92ZXItYXV0b1tkYXRhLXBvcHBlci1wbGFjZW1lbnRePWxlZnRdID4gLnBvcG92ZXItYXJyb3c6OmFmdGVyIHtcbiAgcmlnaHQ6IDBweDtcbiAgYm9yZGVyLXdpZHRoOiAwLjVyZW0gMCAwLjVyZW0gMC41cmVtO1xuICBib3JkZXItbGVmdC1jb2xvcjogI2ZmZjtcbn1cblxuLnBvcG92ZXItaGVhZGVyIHtcbiAgcGFkZGluZzogMCAxLjEyNXJlbTtcbiAgbWFyZ2luLWJvdHRvbTogMDtcbiAgZm9udC1zaXplOiAwLjkzNzVyZW07XG4gIGNvbG9yOiAjNTY2YTdmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiB0cmFuc3BhcmVudDtcbiAgYm9yZGVyLWJvdHRvbTogMHB4IHNvbGlkIHJnYmEoNjcsIDg5LCAxMTMsIDAuMik7XG4gIGJvcmRlci10b3AtbGVmdC1yYWRpdXM6IGNhbGMoMC41cmVtIC0gMHB4KTtcbiAgYm9yZGVyLXRvcC1yaWdodC1yYWRpdXM6IGNhbGMoMC41cmVtIC0gMHB4KTtcbn1cbi5wb3BvdmVyLWhlYWRlcjplbXB0eSB7XG4gIGRpc3BsYXk6IG5vbmU7XG59XG5cbi5wb3BvdmVyLWJvZHkge1xuICBwYWRkaW5nOiAxLjEyNXJlbSAxLjEyNXJlbTtcbiAgY29sb3I6ICM2OTdhOGQ7XG59XG5cbi5jYXJvdXNlbCB7XG4gIHBvc2l0aW9uOiByZWxhdGl2ZTtcbn1cblxuLmNhcm91c2VsLnBvaW50ZXItZXZlbnQge1xuICB0b3VjaC1hY3Rpb246IHBhbi15O1xufVxuXG4uY2Fyb3VzZWwtaW5uZXIge1xuICBwb3NpdGlvbjogcmVsYXRpdmU7XG4gIHdpZHRoOiAxMDAlO1xuICBvdmVyZmxvdzogaGlkZGVuO1xufVxuLmNhcm91c2VsLWlubmVyOjphZnRlciB7XG4gIGRpc3BsYXk6IGJsb2NrO1xuICBjbGVhcjogYm90aDtcbiAgY29udGVudDogXCJcIjtcbn1cblxuLmNhcm91c2VsLWl0ZW0ge1xuICBwb3NpdGlvbjogcmVsYXRpdmU7XG4gIGRpc3BsYXk6IG5vbmU7XG4gIGZsb2F0OiBsZWZ0O1xuICB3aWR0aDogMTAwJTtcbiAgbWFyZ2luLXJpZ2h0OiAtMTAwJTtcbiAgYmFja2ZhY2UtdmlzaWJpbGl0eTogaGlkZGVuO1xuICB0cmFuc2l0aW9uOiB0cmFuc2Zvcm0gMC42cyBlYXNlLWluLW91dDtcbn1cbkBtZWRpYSAocHJlZmVycy1yZWR1Y2VkLW1vdGlvbjogcmVkdWNlKSB7XG4gIC5jYXJvdXNlbC1pdGVtIHtcbiAgICB0cmFuc2l0aW9uOiBub25lO1xuICB9XG59XG5cbi5jYXJvdXNlbC1pdGVtLmFjdGl2ZSxcbi5jYXJvdXNlbC1pdGVtLW5leHQsXG4uY2Fyb3VzZWwtaXRlbS1wcmV2IHtcbiAgZGlzcGxheTogYmxvY2s7XG59XG5cbi8qIHJ0bDpiZWdpbjppZ25vcmUgKi9cbi5jYXJvdXNlbC1pdGVtLW5leHQ6bm90KC5jYXJvdXNlbC1pdGVtLXN0YXJ0KSxcbi5hY3RpdmUuY2Fyb3VzZWwtaXRlbS1lbmQge1xuICB0cmFuc2Zvcm06IHRyYW5zbGF0ZVgoMTAwJSk7XG59XG5cbi5jYXJvdXNlbC1pdGVtLXByZXY6bm90KC5jYXJvdXNlbC1pdGVtLWVuZCksXG4uYWN0aXZlLmNhcm91c2VsLWl0ZW0tc3RhcnQge1xuICB0cmFuc2Zvcm06IHRyYW5zbGF0ZVgoLTEwMCUpO1xufVxuXG4vKiBydGw6ZW5kOmlnbm9yZSAqL1xuLmNhcm91c2VsLWZhZGUgLmNhcm91c2VsLWl0ZW0ge1xuICBvcGFjaXR5OiAwO1xuICB0cmFuc2l0aW9uLXByb3BlcnR5OiBvcGFjaXR5O1xuICB0cmFuc2Zvcm06IG5vbmU7XG59XG4uY2Fyb3VzZWwtZmFkZSAuY2Fyb3VzZWwtaXRlbS5hY3RpdmUsXG4uY2Fyb3VzZWwtZmFkZSAuY2Fyb3VzZWwtaXRlbS1uZXh0LmNhcm91c2VsLWl0ZW0tc3RhcnQsXG4uY2Fyb3VzZWwtZmFkZSAuY2Fyb3VzZWwtaXRlbS1wcmV2LmNhcm91c2VsLWl0ZW0tZW5kIHtcbiAgei1pbmRleDogMTtcbiAgb3BhY2l0eTogMTtcbn1cbi5jYXJvdXNlbC1mYWRlIC5hY3RpdmUuY2Fyb3VzZWwtaXRlbS1zdGFydCxcbi5jYXJvdXNlbC1mYWRlIC5hY3RpdmUuY2Fyb3VzZWwtaXRlbS1lbmQge1xuICB6LWluZGV4OiAwO1xuICBvcGFjaXR5OiAwO1xuICB0cmFuc2l0aW9uOiBvcGFjaXR5IDBzIDAuNnM7XG59XG5AbWVkaWEgKHByZWZlcnMtcmVkdWNlZC1tb3Rpb246IHJlZHVjZSkge1xuICAuY2Fyb3VzZWwtZmFkZSAuYWN0aXZlLmNhcm91c2VsLWl0ZW0tc3RhcnQsXG4uY2Fyb3VzZWwtZmFkZSAuYWN0aXZlLmNhcm91c2VsLWl0ZW0tZW5kIHtcbiAgICB0cmFuc2l0aW9uOiBub25lO1xuICB9XG59XG5cbi5jYXJvdXNlbC1jb250cm9sLXByZXYsXG4uY2Fyb3VzZWwtY29udHJvbC1uZXh0IHtcbiAgcG9zaXRpb246IGFic29sdXRlO1xuICB0b3A6IDA7XG4gIGJvdHRvbTogMDtcbiAgei1pbmRleDogMTtcbiAgZGlzcGxheTogZmxleDtcbiAgYWxpZ24taXRlbXM6IGNlbnRlcjtcbiAganVzdGlmeS1jb250ZW50OiBjZW50ZXI7XG4gIHdpZHRoOiAxNCU7XG4gIHBhZGRpbmc6IDA7XG4gIGNvbG9yOiAjZmZmO1xuICB0ZXh0LWFsaWduOiBjZW50ZXI7XG4gIGJhY2tncm91bmQ6IG5vbmU7XG4gIGJvcmRlcjogMDtcbiAgb3BhY2l0eTogMTtcbiAgdHJhbnNpdGlvbjogb3BhY2l0eSAwLjE1cyBlYXNlO1xufVxuQG1lZGlhIChwcmVmZXJzLXJlZHVjZWQtbW90aW9uOiByZWR1Y2UpIHtcbiAgLmNhcm91c2VsLWNvbnRyb2wtcHJldixcbi5jYXJvdXNlbC1jb250cm9sLW5leHQge1xuICAgIHRyYW5zaXRpb246IG5vbmU7XG4gIH1cbn1cbi5jYXJvdXNlbC1jb250cm9sLXByZXY6aG92ZXIsIC5jYXJvdXNlbC1jb250cm9sLXByZXY6Zm9jdXMsXG4uY2Fyb3VzZWwtY29udHJvbC1uZXh0OmhvdmVyLFxuLmNhcm91c2VsLWNvbnRyb2wtbmV4dDpmb2N1cyB7XG4gIGNvbG9yOiAjZmZmO1xuICB0ZXh0LWRlY29yYXRpb246IG5vbmU7XG4gIG91dGxpbmU6IDA7XG4gIG9wYWNpdHk6IDE7XG59XG5cbi5jYXJvdXNlbC1jb250cm9sLXByZXYge1xuICBsZWZ0OiAwO1xufVxuXG4uY2Fyb3VzZWwtY29udHJvbC1uZXh0IHtcbiAgcmlnaHQ6IDA7XG59XG5cbi5jYXJvdXNlbC1jb250cm9sLXByZXYtaWNvbixcbi5jYXJvdXNlbC1jb250cm9sLW5leHQtaWNvbiB7XG4gIGRpc3BsYXk6IGlubGluZS1ibG9jaztcbiAgd2lkdGg6IDIuNTVyZW07XG4gIGhlaWdodDogMi41NXJlbTtcbiAgYmFja2dyb3VuZC1yZXBlYXQ6IG5vLXJlcGVhdDtcbiAgYmFja2dyb3VuZC1wb3NpdGlvbjogNTAlO1xuICBiYWNrZ3JvdW5kLXNpemU6IDEwMCUgMTAwJTtcbn1cblxuLyogcnRsOm9wdGlvbnM6IHtcbiAgXCJhdXRvUmVuYW1lXCI6IHRydWUsXG4gIFwic3RyaW5nTWFwXCI6WyB7XG4gICAgXCJuYW1lXCIgICAgOiBcInByZXYtbmV4dFwiLFxuICAgIFwic2VhcmNoXCIgIDogXCJwcmV2XCIsXG4gICAgXCJyZXBsYWNlXCIgOiBcIm5leHRcIlxuICB9IF1cbn0gKi9cbi5jYXJvdXNlbC1jb250cm9sLXByZXYtaWNvbiB7XG4gIGJhY2tncm91bmQtaW1hZ2U6IHVybChcImRhdGE6aW1hZ2Uvc3ZnK3htbCwlM0NzdmcgeG1sbnM9J2h0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnJyB3aWR0aD0nMjQnIGhlaWdodD0nMjQnIHZpZXdCb3g9JzAgMCAyNCAyNCcgc3R5bGU9J2ZpbGw6ICUyM2ZmZjt0cmFuc2Zvcm06IDttc0ZpbHRlcjo7JyUzRSUzQ3BhdGggZD0nTTEzLjI5MyA2LjI5MyA3LjU4NiAxMmw1LjcwNyA1LjcwNyAxLjQxNC0xLjQxNEwxMC40MTQgMTJsNC4yOTMtNC4yOTN6JyUzRSUzQy9wYXRoJTNFJTNDL3N2ZyUzRVwiKTtcbn1cblxuLmNhcm91c2VsLWNvbnRyb2wtbmV4dC1pY29uIHtcbiAgYmFja2dyb3VuZC1pbWFnZTogdXJsKFwiZGF0YTppbWFnZS9zdmcreG1sLCUzQ3N2ZyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHdpZHRoPScyNCcgaGVpZ2h0PScyNCcgdmlld0JveD0nMCAwIDI0IDI0JyBzdHlsZT0nZmlsbDogJTIzZmZmO3RyYW5zZm9ybTogO21zRmlsdGVyOjsnJTNFJTNDcGF0aCBkPSdNMTAuNzA3IDE3LjcwNyAxNi40MTQgMTJsLTUuNzA3LTUuNzA3LTEuNDE0IDEuNDE0TDEzLjU4NiAxMmwtNC4yOTMgNC4yOTN6JyUzRSUzQy9wYXRoJTNFJTNDL3N2ZyUzRVwiKTtcbn1cblxuLmNhcm91c2VsLWluZGljYXRvcnMge1xuICBwb3NpdGlvbjogYWJzb2x1dGU7XG4gIHJpZ2h0OiAwO1xuICBib3R0b206IDA7XG4gIGxlZnQ6IDA7XG4gIHotaW5kZXg6IDI7XG4gIGRpc3BsYXk6IGZsZXg7XG4gIGp1c3RpZnktY29udGVudDogY2VudGVyO1xuICBwYWRkaW5nOiAwO1xuICBtYXJnaW4tcmlnaHQ6IDE0JTtcbiAgbWFyZ2luLWJvdHRvbTogMXJlbTtcbiAgbWFyZ2luLWxlZnQ6IDE0JTtcbiAgbGlzdC1zdHlsZTogbm9uZTtcbn1cbi5jYXJvdXNlbC1pbmRpY2F0b3JzIFtkYXRhLWJzLXRhcmdldF0ge1xuICBib3gtc2l6aW5nOiBjb250ZW50LWJveDtcbiAgZmxleDogMCAxIGF1dG87XG4gIHdpZHRoOiAzMHB4O1xuICBoZWlnaHQ6IDNweDtcbiAgcGFkZGluZzogMDtcbiAgbWFyZ2luLXJpZ2h0OiAzcHg7XG4gIG1hcmdpbi1sZWZ0OiAzcHg7XG4gIHRleHQtaW5kZW50OiAtOTk5cHg7XG4gIGN1cnNvcjogcG9pbnRlcjtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZmZjtcbiAgYmFja2dyb3VuZC1jbGlwOiBwYWRkaW5nLWJveDtcbiAgYm9yZGVyOiAwO1xuICBib3JkZXItdG9wOiAxMHB4IHNvbGlkIHRyYW5zcGFyZW50O1xuICBib3JkZXItYm90dG9tOiAxMHB4IHNvbGlkIHRyYW5zcGFyZW50O1xuICBvcGFjaXR5OiAwLjU7XG4gIHRyYW5zaXRpb246IG9wYWNpdHkgMC42cyBlYXNlO1xufVxuQG1lZGlhIChwcmVmZXJzLXJlZHVjZWQtbW90aW9uOiByZWR1Y2UpIHtcbiAgLmNhcm91c2VsLWluZGljYXRvcnMgW2RhdGEtYnMtdGFyZ2V0XSB7XG4gICAgdHJhbnNpdGlvbjogbm9uZTtcbiAgfVxufVxuLmNhcm91c2VsLWluZGljYXRvcnMgLmFjdGl2ZSB7XG4gIG9wYWNpdHk6IDE7XG59XG5cbi5jYXJvdXNlbC1jYXB0aW9uIHtcbiAgcG9zaXRpb246IGFic29sdXRlO1xuICByaWdodDogMTUlO1xuICBib3R0b206IDEuMjVyZW07XG4gIGxlZnQ6IDE1JTtcbiAgcGFkZGluZy10b3A6IDEuMjVyZW07XG4gIHBhZGRpbmctYm90dG9tOiAxLjI1cmVtO1xuICBjb2xvcjogI2ZmZjtcbiAgdGV4dC1hbGlnbjogY2VudGVyO1xufVxuXG4uY2Fyb3VzZWwtZGFyayAuY2Fyb3VzZWwtY29udHJvbC1wcmV2LWljb24sXG4uY2Fyb3VzZWwtZGFyayAuY2Fyb3VzZWwtY29udHJvbC1uZXh0LWljb24ge1xuICBmaWx0ZXI6IGludmVydCgxKSBncmF5c2NhbGUoMTAwKTtcbn1cbi5jYXJvdXNlbC1kYXJrIC5jYXJvdXNlbC1pbmRpY2F0b3JzIFtkYXRhLWJzLXRhcmdldF0ge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjNDM1OTcxO1xufVxuLmNhcm91c2VsLWRhcmsgLmNhcm91c2VsLWNhcHRpb24ge1xuICBjb2xvcjogIzQzNTk3MTtcbn1cblxuQGtleWZyYW1lcyBzcGlubmVyLWJvcmRlciB7XG4gIHRvIHtcbiAgICB0cmFuc2Zvcm06IHJvdGF0ZSgzNjBkZWcpIC8qIHJ0bDppZ25vcmUgKi87XG4gIH1cbn1cbi5zcGlubmVyLWJvcmRlciB7XG4gIGRpc3BsYXk6IGlubGluZS1ibG9jaztcbiAgd2lkdGg6IDJyZW07XG4gIGhlaWdodDogMnJlbTtcbiAgdmVydGljYWwtYWxpZ246IC0wLjEyNWVtO1xuICBib3JkZXI6IDAuMjVlbSBzb2xpZCBjdXJyZW50Q29sb3I7XG4gIGJvcmRlci1yaWdodC1jb2xvcjogdHJhbnNwYXJlbnQ7XG4gIGJvcmRlci1yYWRpdXM6IDUwJTtcbiAgYW5pbWF0aW9uOiAwLjc1cyBsaW5lYXIgaW5maW5pdGUgc3Bpbm5lci1ib3JkZXI7XG59XG5cbi5zcGlubmVyLWJvcmRlci1zbSB7XG4gIHdpZHRoOiAxcmVtO1xuICBoZWlnaHQ6IDFyZW07XG4gIGJvcmRlci13aWR0aDogMC4yZW07XG59XG5cbkBrZXlmcmFtZXMgc3Bpbm5lci1ncm93IHtcbiAgMCUge1xuICAgIHRyYW5zZm9ybTogc2NhbGUoMCk7XG4gIH1cbiAgNTAlIHtcbiAgICBvcGFjaXR5OiAxO1xuICAgIHRyYW5zZm9ybTogbm9uZTtcbiAgfVxufVxuLnNwaW5uZXItZ3JvdyB7XG4gIGRpc3BsYXk6IGlubGluZS1ibG9jaztcbiAgd2lkdGg6IDJyZW07XG4gIGhlaWdodDogMnJlbTtcbiAgdmVydGljYWwtYWxpZ246IC0wLjEyNWVtO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiBjdXJyZW50Q29sb3I7XG4gIGJvcmRlci1yYWRpdXM6IDUwJTtcbiAgb3BhY2l0eTogMDtcbiAgYW5pbWF0aW9uOiAwLjc1cyBsaW5lYXIgaW5maW5pdGUgc3Bpbm5lci1ncm93O1xufVxuXG4uc3Bpbm5lci1ncm93LXNtIHtcbiAgd2lkdGg6IDFyZW07XG4gIGhlaWdodDogMXJlbTtcbn1cblxuQG1lZGlhIChwcmVmZXJzLXJlZHVjZWQtbW90aW9uOiByZWR1Y2UpIHtcbiAgLnNwaW5uZXItYm9yZGVyLFxuLnNwaW5uZXItZ3JvdyB7XG4gICAgYW5pbWF0aW9uLWR1cmF0aW9uOiAxLjVzO1xuICB9XG59XG4ub2ZmY2FudmFzIHtcbiAgcG9zaXRpb246IGZpeGVkO1xuICBib3R0b206IDA7XG4gIHotaW5kZXg6IDEwOTA7XG4gIGRpc3BsYXk6IGZsZXg7XG4gIGZsZXgtZGlyZWN0aW9uOiBjb2x1bW47XG4gIG1heC13aWR0aDogMTAwJTtcbiAgdmlzaWJpbGl0eTogaGlkZGVuO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNsaXA6IHBhZGRpbmctYm94O1xuICBvdXRsaW5lOiAwO1xuICB0cmFuc2l0aW9uOiB0cmFuc2Zvcm0gMC4yNXMgZWFzZS1pbi1vdXQ7XG59XG5AbWVkaWEgKHByZWZlcnMtcmVkdWNlZC1tb3Rpb246IHJlZHVjZSkge1xuICAub2ZmY2FudmFzIHtcbiAgICB0cmFuc2l0aW9uOiBub25lO1xuICB9XG59XG5cbi5vZmZjYW52YXMtYmFja2Ryb3Age1xuICBwb3NpdGlvbjogZml4ZWQ7XG4gIHRvcDogMDtcbiAgbGVmdDogMDtcbiAgei1pbmRleDogMTA4OTtcbiAgd2lkdGg6IDEwMHZ3O1xuICBoZWlnaHQ6IDEwMHZoO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjNDM1OTcxO1xufVxuLm9mZmNhbnZhcy1iYWNrZHJvcC5mYWRlIHtcbiAgb3BhY2l0eTogMDtcbn1cbi5vZmZjYW52YXMtYmFja2Ryb3Auc2hvdyB7XG4gIG9wYWNpdHk6IDAuNTtcbn1cblxuLm9mZmNhbnZhcy1oZWFkZXIge1xuICBkaXNwbGF5OiBmbGV4O1xuICBhbGlnbi1pdGVtczogY2VudGVyO1xuICBqdXN0aWZ5LWNvbnRlbnQ6IHNwYWNlLWJldHdlZW47XG4gIHBhZGRpbmc6IDEuNXJlbSAxLjVyZW07XG59XG4ub2ZmY2FudmFzLWhlYWRlciAuYnRuLWNsb3NlIHtcbiAgcGFkZGluZzogMC43NXJlbSAwLjc1cmVtO1xuICBtYXJnaW4tdG9wOiAtMC43NXJlbTtcbiAgbWFyZ2luLXJpZ2h0OiAtMC43NXJlbTtcbiAgbWFyZ2luLWJvdHRvbTogLTAuNzVyZW07XG59XG5cbi5vZmZjYW52YXMtdGl0bGUge1xuICBtYXJnaW4tYm90dG9tOiAwO1xuICBsaW5lLWhlaWdodDogMS41Mztcbn1cblxuLm9mZmNhbnZhcy1ib2R5IHtcbiAgZmxleC1ncm93OiAxO1xuICBwYWRkaW5nOiAxLjVyZW0gMS41cmVtO1xuICBvdmVyZmxvdy15OiBhdXRvO1xufVxuXG4ub2ZmY2FudmFzLXN0YXJ0IHtcbiAgdG9wOiAwO1xuICBsZWZ0OiAwO1xuICB3aWR0aDogNDAwcHg7XG4gIGJvcmRlci1yaWdodDogMHB4IHNvbGlkIHJnYmEoNjcsIDg5LCAxMTMsIDAuMik7XG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlWCgtMTAwJSk7XG59XG5cbi5vZmZjYW52YXMtZW5kIHtcbiAgdG9wOiAwO1xuICByaWdodDogMDtcbiAgd2lkdGg6IDQwMHB4O1xuICBib3JkZXItbGVmdDogMHB4IHNvbGlkIHJnYmEoNjcsIDg5LCAxMTMsIDAuMik7XG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlWCgxMDAlKTtcbn1cblxuLm9mZmNhbnZhcy10b3Age1xuICB0b3A6IDA7XG4gIHJpZ2h0OiAwO1xuICBsZWZ0OiAwO1xuICBoZWlnaHQ6IDMwdmg7XG4gIG1heC1oZWlnaHQ6IDEwMCU7XG4gIGJvcmRlci1ib3R0b206IDBweCBzb2xpZCByZ2JhKDY3LCA4OSwgMTEzLCAwLjIpO1xuICB0cmFuc2Zvcm06IHRyYW5zbGF0ZVkoLTEwMCUpO1xufVxuXG4ub2ZmY2FudmFzLWJvdHRvbSB7XG4gIHJpZ2h0OiAwO1xuICBsZWZ0OiAwO1xuICBoZWlnaHQ6IDMwdmg7XG4gIG1heC1oZWlnaHQ6IDEwMCU7XG4gIGJvcmRlci10b3A6IDBweCBzb2xpZCByZ2JhKDY3LCA4OSwgMTEzLCAwLjIpO1xuICB0cmFuc2Zvcm06IHRyYW5zbGF0ZVkoMTAwJSk7XG59XG5cbi5vZmZjYW52YXMuc2hvdyB7XG4gIHRyYW5zZm9ybTogbm9uZTtcbn1cblxuLnBsYWNlaG9sZGVyIHtcbiAgZGlzcGxheTogaW5saW5lLWJsb2NrO1xuICBtaW4taGVpZ2h0OiAxZW07XG4gIHZlcnRpY2FsLWFsaWduOiBtaWRkbGU7XG4gIGN1cnNvcjogd2FpdDtcbiAgYmFja2dyb3VuZC1jb2xvcjogY3VycmVudENvbG9yO1xuICBvcGFjaXR5OiAwLjU7XG59XG4ucGxhY2Vob2xkZXIuYnRuOjpiZWZvcmUge1xuICBkaXNwbGF5OiBpbmxpbmUtYmxvY2s7XG4gIGNvbnRlbnQ6IFwiXCI7XG59XG5cbi5wbGFjZWhvbGRlci14cyB7XG4gIG1pbi1oZWlnaHQ6IDAuNmVtO1xufVxuXG4ucGxhY2Vob2xkZXItc20ge1xuICBtaW4taGVpZ2h0OiAwLjhlbTtcbn1cblxuLnBsYWNlaG9sZGVyLWxnIHtcbiAgbWluLWhlaWdodDogMS4yZW07XG59XG5cbi5wbGFjZWhvbGRlci1nbG93IC5wbGFjZWhvbGRlciB7XG4gIGFuaW1hdGlvbjogcGxhY2Vob2xkZXItZ2xvdyAycyBlYXNlLWluLW91dCBpbmZpbml0ZTtcbn1cblxuQGtleWZyYW1lcyBwbGFjZWhvbGRlci1nbG93IHtcbiAgNTAlIHtcbiAgICBvcGFjaXR5OiAwLjI7XG4gIH1cbn1cbi5wbGFjZWhvbGRlci13YXZlIHtcbiAgbWFzay1pbWFnZTogbGluZWFyLWdyYWRpZW50KDEzMGRlZywgIzQzNTk3MSA1NSUsIHJnYmEoMCwgMCwgMCwgMC44KSA3NSUsICM0MzU5NzEgOTUlKTtcbiAgbWFzay1zaXplOiAyMDAlIDEwMCU7XG4gIGFuaW1hdGlvbjogcGxhY2Vob2xkZXItd2F2ZSAycyBsaW5lYXIgaW5maW5pdGU7XG59XG5cbkBrZXlmcmFtZXMgcGxhY2Vob2xkZXItd2F2ZSB7XG4gIDEwMCUge1xuICAgIG1hc2stcG9zaXRpb246IC0yMDAlIDAlO1xuICB9XG59XG4uY2xlYXJmaXg6OmFmdGVyIHtcbiAgZGlzcGxheTogYmxvY2s7XG4gIGNsZWFyOiBib3RoO1xuICBjb250ZW50OiBcIlwiO1xufVxuXG4ubGluay1wcmltYXJ5IHtcbiAgY29sb3I6ICM2OTZjZmY7XG59XG4ubGluay1wcmltYXJ5OmhvdmVyLCAubGluay1wcmltYXJ5OmZvY3VzIHtcbiAgY29sb3I6ICM1ZjYxZTY7XG59XG5cbi5saW5rLXNlY29uZGFyeSB7XG4gIGNvbG9yOiAjODU5MmEzO1xufVxuLmxpbmstc2Vjb25kYXJ5OmhvdmVyLCAubGluay1zZWNvbmRhcnk6Zm9jdXMge1xuICBjb2xvcjogIzc4ODM5Mztcbn1cblxuLmxpbmstc3VjY2VzcyB7XG4gIGNvbG9yOiAjNzFkZDM3O1xufVxuLmxpbmstc3VjY2Vzczpob3ZlciwgLmxpbmstc3VjY2Vzczpmb2N1cyB7XG4gIGNvbG9yOiAjNjZjNzMyO1xufVxuXG4ubGluay1pbmZvIHtcbiAgY29sb3I6ICMwM2MzZWM7XG59XG4ubGluay1pbmZvOmhvdmVyLCAubGluay1pbmZvOmZvY3VzIHtcbiAgY29sb3I6ICMwM2IwZDQ7XG59XG5cbi5saW5rLXdhcm5pbmcge1xuICBjb2xvcjogI2ZmYWIwMDtcbn1cbi5saW5rLXdhcm5pbmc6aG92ZXIsIC5saW5rLXdhcm5pbmc6Zm9jdXMge1xuICBjb2xvcjogI2U2OWEwMDtcbn1cblxuLmxpbmstZGFuZ2VyIHtcbiAgY29sb3I6ICNmZjNlMWQ7XG59XG4ubGluay1kYW5nZXI6aG92ZXIsIC5saW5rLWRhbmdlcjpmb2N1cyB7XG4gIGNvbG9yOiAjZTYzODFhO1xufVxuXG4ubGluay1saWdodCB7XG4gIGNvbG9yOiAjZmNmZGZkO1xufVxuLmxpbmstbGlnaHQ6aG92ZXIsIC5saW5rLWxpZ2h0OmZvY3VzIHtcbiAgY29sb3I6ICNmY2ZkZmQ7XG59XG5cbi5saW5rLWRhcmsge1xuICBjb2xvcjogIzIzMzQ0Njtcbn1cbi5saW5rLWRhcms6aG92ZXIsIC5saW5rLWRhcms6Zm9jdXMge1xuICBjb2xvcjogIzIwMmYzZjtcbn1cblxuLmxpbmstZ3JheSB7XG4gIGNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjEpO1xufVxuLmxpbmstZ3JheTpob3ZlciwgLmxpbmstZ3JheTpmb2N1cyB7XG4gIGNvbG9yOiByZ2JhKDIyLCAyOSwgMzYsIDAuMTkpO1xufVxuXG4ucmF0aW8ge1xuICBwb3NpdGlvbjogcmVsYXRpdmU7XG4gIHdpZHRoOiAxMDAlO1xufVxuLnJhdGlvOjpiZWZvcmUge1xuICBkaXNwbGF5OiBibG9jaztcbiAgcGFkZGluZy10b3A6IHZhcigtLWJzLWFzcGVjdC1yYXRpbyk7XG4gIGNvbnRlbnQ6IFwiXCI7XG59XG4ucmF0aW8gPiAqIHtcbiAgcG9zaXRpb246IGFic29sdXRlO1xuICB0b3A6IDA7XG4gIGxlZnQ6IDA7XG4gIHdpZHRoOiAxMDAlO1xuICBoZWlnaHQ6IDEwMCU7XG59XG5cbi5yYXRpby0xeDEge1xuICAtLWJzLWFzcGVjdC1yYXRpbzogMTAwJTtcbn1cblxuLnJhdGlvLTR4MyB7XG4gIC0tYnMtYXNwZWN0LXJhdGlvOiA3NSU7XG59XG5cbi5yYXRpby0xNng5IHtcbiAgLS1icy1hc3BlY3QtcmF0aW86IDU2LjI1JTtcbn1cblxuLnJhdGlvLTIxeDkge1xuICAtLWJzLWFzcGVjdC1yYXRpbzogNDIuODU3MTQyODU3MSU7XG59XG5cbi5maXhlZC10b3Age1xuICBwb3NpdGlvbjogZml4ZWQ7XG4gIHRvcDogMDtcbiAgcmlnaHQ6IDA7XG4gIGxlZnQ6IDA7XG4gIHotaW5kZXg6IDEwMzA7XG59XG5cbi5maXhlZC1ib3R0b20ge1xuICBwb3NpdGlvbjogZml4ZWQ7XG4gIHJpZ2h0OiAwO1xuICBib3R0b206IDA7XG4gIGxlZnQ6IDA7XG4gIHotaW5kZXg6IDEwMzA7XG59XG5cbi5zdGlja3ktdG9wIHtcbiAgcG9zaXRpb246IHN0aWNreTtcbiAgdG9wOiAwO1xuICB6LWluZGV4OiAxMDIwO1xufVxuXG5AbWVkaWEgKG1pbi13aWR0aDogNTc2cHgpIHtcbiAgLnN0aWNreS1zbS10b3Age1xuICAgIHBvc2l0aW9uOiBzdGlja3k7XG4gICAgdG9wOiAwO1xuICAgIHotaW5kZXg6IDEwMjA7XG4gIH1cbn1cbkBtZWRpYSAobWluLXdpZHRoOiA3NjhweCkge1xuICAuc3RpY2t5LW1kLXRvcCB7XG4gICAgcG9zaXRpb246IHN0aWNreTtcbiAgICB0b3A6IDA7XG4gICAgei1pbmRleDogMTAyMDtcbiAgfVxufVxuQG1lZGlhIChtaW4td2lkdGg6IDk5MnB4KSB7XG4gIC5zdGlja3ktbGctdG9wIHtcbiAgICBwb3NpdGlvbjogc3RpY2t5O1xuICAgIHRvcDogMDtcbiAgICB6LWluZGV4OiAxMDIwO1xuICB9XG59XG5AbWVkaWEgKG1pbi13aWR0aDogMTIwMHB4KSB7XG4gIC5zdGlja3kteGwtdG9wIHtcbiAgICBwb3NpdGlvbjogc3RpY2t5O1xuICAgIHRvcDogMDtcbiAgICB6LWluZGV4OiAxMDIwO1xuICB9XG59XG5AbWVkaWEgKG1pbi13aWR0aDogMTQwMHB4KSB7XG4gIC5zdGlja3kteHhsLXRvcCB7XG4gICAgcG9zaXRpb246IHN0aWNreTtcbiAgICB0b3A6IDA7XG4gICAgei1pbmRleDogMTAyMDtcbiAgfVxufVxuLmhzdGFjayB7XG4gIGRpc3BsYXk6IGZsZXg7XG4gIGZsZXgtZGlyZWN0aW9uOiByb3c7XG4gIGFsaWduLWl0ZW1zOiBjZW50ZXI7XG4gIGFsaWduLXNlbGY6IHN0cmV0Y2g7XG59XG5cbi52c3RhY2sge1xuICBkaXNwbGF5OiBmbGV4O1xuICBmbGV4OiAxIDEgYXV0bztcbiAgZmxleC1kaXJlY3Rpb246IGNvbHVtbjtcbiAgYWxpZ24tc2VsZjogc3RyZXRjaDtcbn1cblxuLnZpc3VhbGx5LWhpZGRlbixcbi52aXN1YWxseS1oaWRkZW4tZm9jdXNhYmxlOm5vdCg6Zm9jdXMpOm5vdCg6Zm9jdXMtd2l0aGluKSB7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZSAhaW1wb3J0YW50O1xuICB3aWR0aDogMXB4ICFpbXBvcnRhbnQ7XG4gIGhlaWdodDogMXB4ICFpbXBvcnRhbnQ7XG4gIHBhZGRpbmc6IDAgIWltcG9ydGFudDtcbiAgbWFyZ2luOiAtMXB4ICFpbXBvcnRhbnQ7XG4gIG92ZXJmbG93OiBoaWRkZW4gIWltcG9ydGFudDtcbiAgY2xpcDogcmVjdCgwLCAwLCAwLCAwKSAhaW1wb3J0YW50O1xuICB3aGl0ZS1zcGFjZTogbm93cmFwICFpbXBvcnRhbnQ7XG4gIGJvcmRlcjogMCAhaW1wb3J0YW50O1xufVxuXG4uc3RyZXRjaGVkLWxpbms6OmFmdGVyIHtcbiAgcG9zaXRpb246IGFic29sdXRlO1xuICB0b3A6IDA7XG4gIHJpZ2h0OiAwO1xuICBib3R0b206IDA7XG4gIGxlZnQ6IDA7XG4gIHotaW5kZXg6IDE7XG4gIGNvbnRlbnQ6IFwiXCI7XG59XG5cbi50ZXh0LXRydW5jYXRlIHtcbiAgb3ZlcmZsb3c6IGhpZGRlbjtcbiAgdGV4dC1vdmVyZmxvdzogZWxsaXBzaXM7XG4gIHdoaXRlLXNwYWNlOiBub3dyYXA7XG59XG5cbi52ciB7XG4gIGRpc3BsYXk6IGlubGluZS1ibG9jaztcbiAgYWxpZ24tc2VsZjogc3RyZXRjaDtcbiAgd2lkdGg6IDFweDtcbiAgbWluLWhlaWdodDogMWVtO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiBjdXJyZW50Q29sb3I7XG4gIG9wYWNpdHk6IDE7XG59XG5cbjpyb290IHtcbiAgY29sb3Itc2NoZW1lOiBsaWdodDtcbn1cblxuYixcbnN0cm9uZyB7XG4gIGZvbnQtd2VpZ2h0OiA3MDA7XG59XG5cbmE6bm90KFtocmVmXSkge1xuICBjb2xvcjogaW5oZXJpdDtcbiAgdGV4dC1kZWNvcmF0aW9uOiBub25lO1xufVxuYTpub3QoW2hyZWZdKTpob3ZlciB7XG4gIGNvbG9yOiBpbmhlcml0O1xuICB0ZXh0LWRlY29yYXRpb246IG5vbmU7XG59XG5cbmlucHV0Oi13ZWJraXQtYXV0b2ZpbGwsXG5pbnB1dDotd2Via2l0LWF1dG9maWxsOmhvdmVyLFxuaW5wdXQ6LXdlYmtpdC1hdXRvZmlsbDpmb2N1cyxcbnRleHRhcmVhOi13ZWJraXQtYXV0b2ZpbGwsXG50ZXh0YXJlYTotd2Via2l0LWF1dG9maWxsOmhvdmVyLFxudGV4dGFyZWE6LXdlYmtpdC1hdXRvZmlsbDpmb2N1cyxcbnNlbGVjdDotd2Via2l0LWF1dG9maWxsLFxuc2VsZWN0Oi13ZWJraXQtYXV0b2ZpbGw6aG92ZXIsXG5zZWxlY3Q6LXdlYmtpdC1hdXRvZmlsbDpmb2N1cyxcbmlucHV0Oi1pbnRlcm5hbC1hdXRvZmlsbC1zZWxlY3RlZCB7XG4gIGJhY2tncm91bmQtY2xpcDogdGV4dCAhaW1wb3J0YW50O1xuICAtd2Via2l0LWJhY2tncm91bmQtY2xpcDogdGV4dCAhaW1wb3J0YW50O1xufVxuXG4ucm93LWJvcmRlcmVkIHtcbiAgb3ZlcmZsb3c6IGhpZGRlbjtcbn1cbi5yb3ctYm9yZGVyZWQgPiAuY29sLFxuLnJvdy1ib3JkZXJlZCA+IFtjbGFzc149Y29sLV0sXG4ucm93LWJvcmRlcmVkID4gW2NsYXNzKj1cIiBjb2wtXCJdLFxuLnJvdy1ib3JkZXJlZCA+IFtjbGFzc149XCJjb2wgXCJdLFxuLnJvdy1ib3JkZXJlZCA+IFtjbGFzcyo9XCIgY29sIFwiXSxcbi5yb3ctYm9yZGVyZWQgPiBbY2xhc3MkPVwiIGNvbFwiXSxcbi5yb3ctYm9yZGVyZWQgPiBbY2xhc3M9Y29sXSB7XG4gIHBvc2l0aW9uOiByZWxhdGl2ZTtcbiAgcGFkZGluZy10b3A6IDFweDtcbn1cbi5yb3ctYm9yZGVyZWQgPiAuY29sOjpiZWZvcmUsXG4ucm93LWJvcmRlcmVkID4gW2NsYXNzXj1jb2wtXTo6YmVmb3JlLFxuLnJvdy1ib3JkZXJlZCA+IFtjbGFzcyo9XCIgY29sLVwiXTo6YmVmb3JlLFxuLnJvdy1ib3JkZXJlZCA+IFtjbGFzc149XCJjb2wgXCJdOjpiZWZvcmUsXG4ucm93LWJvcmRlcmVkID4gW2NsYXNzKj1cIiBjb2wgXCJdOjpiZWZvcmUsXG4ucm93LWJvcmRlcmVkID4gW2NsYXNzJD1cIiBjb2xcIl06OmJlZm9yZSxcbi5yb3ctYm9yZGVyZWQgPiBbY2xhc3M9Y29sXTo6YmVmb3JlIHtcbiAgY29udGVudDogXCJcIjtcbiAgcG9zaXRpb246IGFic29sdXRlO1xuICByaWdodDogMDtcbiAgYm90dG9tOiAtMXB4O1xuICBsZWZ0OiAwO1xuICBkaXNwbGF5OiBibG9jaztcbiAgaGVpZ2h0OiAwO1xuICBib3JkZXItdG9wOiAxcHggc29saWQgI2Q5ZGVlMztcbn1cbi5yb3ctYm9yZGVyZWQgPiAuY29sOjphZnRlcixcbi5yb3ctYm9yZGVyZWQgPiBbY2xhc3NePWNvbC1dOjphZnRlcixcbi5yb3ctYm9yZGVyZWQgPiBbY2xhc3MqPVwiIGNvbC1cIl06OmFmdGVyLFxuLnJvdy1ib3JkZXJlZCA+IFtjbGFzc149XCJjb2wgXCJdOjphZnRlcixcbi5yb3ctYm9yZGVyZWQgPiBbY2xhc3MqPVwiIGNvbCBcIl06OmFmdGVyLFxuLnJvdy1ib3JkZXJlZCA+IFtjbGFzcyQ9XCIgY29sXCJdOjphZnRlcixcbi5yb3ctYm9yZGVyZWQgPiBbY2xhc3M9Y29sXTo6YWZ0ZXIge1xuICBjb250ZW50OiBcIlwiO1xuICBwb3NpdGlvbjogYWJzb2x1dGU7XG4gIHRvcDogMDtcbiAgYm90dG9tOiAwO1xuICBsZWZ0OiAtMXB4O1xuICBkaXNwbGF5OiBibG9jaztcbiAgd2lkdGg6IDA7XG4gIGJvcmRlci1sZWZ0OiAxcHggc29saWQgI2Q5ZGVlMztcbn1cbi5yb3ctYm9yZGVyZWQucm93LWJvcmRlci1saWdodCA+IC5jb2w6OmJlZm9yZSwgLnJvdy1ib3JkZXJlZC5yb3ctYm9yZGVyLWxpZ2h0ID4gLmNvbDo6YWZ0ZXIsXG4ucm93LWJvcmRlcmVkLnJvdy1ib3JkZXItbGlnaHQgPiBbY2xhc3NePWNvbC1dOjpiZWZvcmUsXG4ucm93LWJvcmRlcmVkLnJvdy1ib3JkZXItbGlnaHQgPiBbY2xhc3NePWNvbC1dOjphZnRlcixcbi5yb3ctYm9yZGVyZWQucm93LWJvcmRlci1saWdodCA+IFtjbGFzcyo9XCIgY29sLVwiXTo6YmVmb3JlLFxuLnJvdy1ib3JkZXJlZC5yb3ctYm9yZGVyLWxpZ2h0ID4gW2NsYXNzKj1cIiBjb2wtXCJdOjphZnRlcixcbi5yb3ctYm9yZGVyZWQucm93LWJvcmRlci1saWdodCA+IFtjbGFzc149XCJjb2wgXCJdOjpiZWZvcmUsXG4ucm93LWJvcmRlcmVkLnJvdy1ib3JkZXItbGlnaHQgPiBbY2xhc3NePVwiY29sIFwiXTo6YWZ0ZXIsXG4ucm93LWJvcmRlcmVkLnJvdy1ib3JkZXItbGlnaHQgPiBbY2xhc3MqPVwiIGNvbCBcIl06OmJlZm9yZSxcbi5yb3ctYm9yZGVyZWQucm93LWJvcmRlci1saWdodCA+IFtjbGFzcyo9XCIgY29sIFwiXTo6YWZ0ZXIsXG4ucm93LWJvcmRlcmVkLnJvdy1ib3JkZXItbGlnaHQgPiBbY2xhc3MkPVwiIGNvbFwiXTo6YmVmb3JlLFxuLnJvdy1ib3JkZXJlZC5yb3ctYm9yZGVyLWxpZ2h0ID4gW2NsYXNzJD1cIiBjb2xcIl06OmFmdGVyLFxuLnJvdy1ib3JkZXJlZC5yb3ctYm9yZGVyLWxpZ2h0ID4gW2NsYXNzPWNvbF06OmJlZm9yZSxcbi5yb3ctYm9yZGVyZWQucm93LWJvcmRlci1saWdodCA+IFtjbGFzcz1jb2xdOjphZnRlciB7XG4gIGJvcmRlci1jb2xvcjogcmdiYSg2NywgODksIDExMywgMC4xKTtcbn1cblxuLmJnLWxhYmVsLXNlY29uZGFyeSB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNlYmVlZjAgIWltcG9ydGFudDtcbiAgY29sb3I6ICM4NTkyYTMgIWltcG9ydGFudDtcbn1cblxuLmJvcmRlci1sYWJlbC1zZWNvbmRhcnkge1xuICBib3JkZXI6IDNweCBzb2xpZCAjY2VkM2RhICFpbXBvcnRhbnQ7XG59XG5cbi5ib3JkZXItbGlnaHQtc2Vjb25kYXJ5IHtcbiAgYm9yZGVyOiAzcHggc29saWQgcmdiYSgxMzMsIDE0NiwgMTYzLCAwLjA4KTtcbn1cblxuLmJnLWxhYmVsLXN1Y2Nlc3Mge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZThmYWRmICFpbXBvcnRhbnQ7XG4gIGNvbG9yOiAjNzFkZDM3ICFpbXBvcnRhbnQ7XG59XG5cbi5ib3JkZXItbGFiZWwtc3VjY2VzcyB7XG4gIGJvcmRlcjogM3B4IHNvbGlkICNjNmYxYWYgIWltcG9ydGFudDtcbn1cblxuLmJvcmRlci1saWdodC1zdWNjZXNzIHtcbiAgYm9yZGVyOiAzcHggc29saWQgcmdiYSgxMTMsIDIyMSwgNTUsIDAuMDgpO1xufVxuXG4uYmctbGFiZWwtaW5mbyB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNkN2Y1ZmMgIWltcG9ydGFudDtcbiAgY29sb3I6ICMwM2MzZWMgIWltcG9ydGFudDtcbn1cblxuLmJvcmRlci1sYWJlbC1pbmZvIHtcbiAgYm9yZGVyOiAzcHggc29saWQgIzlhZTdmNyAhaW1wb3J0YW50O1xufVxuXG4uYm9yZGVyLWxpZ2h0LWluZm8ge1xuICBib3JkZXI6IDNweCBzb2xpZCByZ2JhKDMsIDE5NSwgMjM2LCAwLjA4KTtcbn1cblxuLmJnLWxhYmVsLXdhcm5pbmcge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmMmQ2ICFpbXBvcnRhbnQ7XG4gIGNvbG9yOiAjZmZhYjAwICFpbXBvcnRhbnQ7XG59XG5cbi5ib3JkZXItbGFiZWwtd2FybmluZyB7XG4gIGJvcmRlcjogM3B4IHNvbGlkICNmZmRkOTkgIWltcG9ydGFudDtcbn1cblxuLmJvcmRlci1saWdodC13YXJuaW5nIHtcbiAgYm9yZGVyOiAzcHggc29saWQgcmdiYSgyNTUsIDE3MSwgMCwgMC4wOCk7XG59XG5cbi5iZy1sYWJlbC1kYW5nZXIge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZlMGRiICFpbXBvcnRhbnQ7XG4gIGNvbG9yOiAjZmYzZTFkICFpbXBvcnRhbnQ7XG59XG5cbi5ib3JkZXItbGFiZWwtZGFuZ2VyIHtcbiAgYm9yZGVyOiAzcHggc29saWQgI2ZmYjJhNSAhaW1wb3J0YW50O1xufVxuXG4uYm9yZGVyLWxpZ2h0LWRhbmdlciB7XG4gIGJvcmRlcjogM3B4IHNvbGlkIHJnYmEoMjU1LCA2MiwgMjksIDAuMDgpO1xufVxuXG4uYmctbGFiZWwtbGlnaHQge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiB3aGl0ZSAhaW1wb3J0YW50O1xuICBjb2xvcjogI2ZjZmRmZCAhaW1wb3J0YW50O1xufVxuXG4uYm9yZGVyLWxhYmVsLWxpZ2h0IHtcbiAgYm9yZGVyOiAzcHggc29saWQgI2ZlZmVmZSAhaW1wb3J0YW50O1xufVxuXG4uYm9yZGVyLWxpZ2h0LWxpZ2h0IHtcbiAgYm9yZGVyOiAzcHggc29saWQgcmdiYSgyNTIsIDI1MywgMjUzLCAwLjA4KTtcbn1cblxuLmJnLWxhYmVsLWRhcmsge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZGNkZmUxICFpbXBvcnRhbnQ7XG4gIGNvbG9yOiAjMjMzNDQ2ICFpbXBvcnRhbnQ7XG59XG5cbi5ib3JkZXItbGFiZWwtZGFyayB7XG4gIGJvcmRlcjogM3B4IHNvbGlkICNhN2FlYjUgIWltcG9ydGFudDtcbn1cblxuLmJvcmRlci1saWdodC1kYXJrIHtcbiAgYm9yZGVyOiAzcHggc29saWQgcmdiYSgzNSwgNTIsIDcwLCAwLjA4KTtcbn1cblxuLmJnLWxhYmVsLWdyYXkge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2JhKDI1MywgMjUzLCAyNTQsIDAuODU2KSAhaW1wb3J0YW50O1xuICBjb2xvcjogcmdiYSg2NywgODksIDExMywgMC4xKSAhaW1wb3J0YW50O1xufVxuXG4uYm9yZGVyLWxhYmVsLWdyYXkge1xuICBib3JkZXI6IDNweCBzb2xpZCByZ2JhKDI0OSwgMjQ5LCAyNTAsIDAuNjQpICFpbXBvcnRhbnQ7XG59XG5cbi5ib3JkZXItbGlnaHQtZ3JheSB7XG4gIGJvcmRlcjogM3B4IHNvbGlkIHJnYmEoNjcsIDg5LCAxMTMsIDAuMDgpO1xufVxuXG5hLmJnLWRhcms6aG92ZXIsIGEuYmctZGFyazpmb2N1cyB7XG4gIGJhY2tncm91bmQtY29sb3I6IHJnYmEoNjcsIDg5LCAxMTMsIDAuOSkgIWltcG9ydGFudDtcbn1cblxuYS5iZy1saWdodDpob3ZlciwgYS5iZy1saWdodDpmb2N1cyB7XG4gIGJhY2tncm91bmQtY29sb3I6IHJnYmEoNjcsIDg5LCAxMTMsIDAuMikgIWltcG9ydGFudDtcbn1cblxuYS5iZy1saWdodGVyOmhvdmVyLCBhLmJnLWxpZ2h0ZXI6Zm9jdXMge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjEpICFpbXBvcnRhbnQ7XG59XG5cbmEuYmctbGlnaHRlc3Q6aG92ZXIsIGEuYmctbGlnaHRlc3Q6Zm9jdXMge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjA1KSAhaW1wb3J0YW50O1xufVxuXG4udGV4dC1tdXRlZFtocmVmXTpob3ZlciwgLnRleHQtbXV0ZWRbaHJlZl06Zm9jdXMge1xuICBjb2xvcjogIzhlOWJhYSAhaW1wb3J0YW50O1xufVxuXG4udGV4dC1saWdodCB7XG4gIGNvbG9yOiAjYjRiZGM2ICFpbXBvcnRhbnQ7XG59XG4udGV4dC1saWdodFtocmVmXTpob3ZlciwgLnRleHQtbGlnaHRbaHJlZl06Zm9jdXMge1xuICBjb2xvcjogIzhlOWJhYSAhaW1wb3J0YW50O1xufVxuXG4udGV4dC1saWdodGVyIHtcbiAgY29sb3I6ICNjN2NkZDQgIWltcG9ydGFudDtcbn1cbi50ZXh0LWxpZ2h0ZXJbaHJlZl06aG92ZXIsIC50ZXh0LWxpZ2h0ZXJbaHJlZl06Zm9jdXMge1xuICBjb2xvcjogIzhlOWJhYSAhaW1wb3J0YW50O1xufVxuXG4udGV4dC1saWdodGVzdCB7XG4gIGNvbG9yOiAjZDlkZWUzICFpbXBvcnRhbnQ7XG59XG4udGV4dC1saWdodGVzdFtocmVmXTpob3ZlciwgLnRleHQtbGlnaHRlc3RbaHJlZl06Zm9jdXMge1xuICBjb2xvcjogIzhlOWJhYSAhaW1wb3J0YW50O1xufVxuXG4uaW52ZXJ0LXRleHQtd2hpdGUge1xuICBjb2xvcjogI2ZmZiAhaW1wb3J0YW50O1xufVxuXG4uaW52ZXJ0LXRleHQtd2hpdGVbaHJlZl06aG92ZXI6aG92ZXIsIC5pbnZlcnQtdGV4dC13aGl0ZVtocmVmXTpob3Zlcjpmb2N1cyB7XG4gIGNvbG9yOiAjZmZmICFpbXBvcnRhbnQ7XG59XG5cbi5pbnZlcnQtdGV4dC1kYXJrIHtcbiAgY29sb3I6ICM0MzU5NzEgIWltcG9ydGFudDtcbn1cblxuLmludmVydC10ZXh0LWRhcmtbaHJlZl06aG92ZXI6aG92ZXIsIC5pbnZlcnQtdGV4dC1kYXJrW2hyZWZdOmhvdmVyOmZvY3VzIHtcbiAgY29sb3I6ICM0MzU5NzEgIWltcG9ydGFudDtcbn1cblxuLmludmVydC1iZy13aGl0ZSB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNmZmYgIWltcG9ydGFudDtcbn1cblxuYS5pbnZlcnQtYmctd2hpdGU6aG92ZXIsIGEuaW52ZXJ0LWJnLXdoaXRlOmZvY3VzIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZmZiAhaW1wb3J0YW50O1xufVxuXG4uaW52ZXJ0LWJnLWRhcmsge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjkpICFpbXBvcnRhbnQ7XG59XG5cbmEuaW52ZXJ0LWJnLWRhcms6aG92ZXIsIGEuaW52ZXJ0LWJnLWRhcms6Zm9jdXMge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjkpICFpbXBvcnRhbnQ7XG59XG5cbi5pbnZlcnQtYm9yZGVyLWRhcmsge1xuICBib3JkZXItY29sb3I6ICMyMzM0NDYgIWltcG9ydGFudDtcbn1cblxuLmludmVydC1ib3JkZXItd2hpdGUge1xuICBib3JkZXItY29sb3I6ICNmZmYgIWltcG9ydGFudDtcbn1cblxuLmNvbnRhaW5lci1wLXgge1xuICBwYWRkaW5nLXJpZ2h0OiAxcmVtICFpbXBvcnRhbnQ7XG4gIHBhZGRpbmctbGVmdDogMXJlbSAhaW1wb3J0YW50O1xufVxuQG1lZGlhIChtaW4td2lkdGg6IDk5MnB4KSB7XG4gIC5jb250YWluZXItcC14IHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAxLjYyNXJlbSAhaW1wb3J0YW50O1xuICAgIHBhZGRpbmctbGVmdDogMS42MjVyZW0gIWltcG9ydGFudDtcbiAgfVxufVxuXG4uY29udGFpbmVyLW0tbngge1xuICBtYXJnaW4tcmlnaHQ6IC0xcmVtICFpbXBvcnRhbnQ7XG4gIG1hcmdpbi1sZWZ0OiAtMXJlbSAhaW1wb3J0YW50O1xufVxuQG1lZGlhIChtaW4td2lkdGg6IDk5MnB4KSB7XG4gIC5jb250YWluZXItbS1ueCB7XG4gICAgbWFyZ2luLXJpZ2h0OiAtMS42MjVyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tbGVmdDogLTEuNjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cbn1cblxuLmNvbnRhaW5lci1wLXk6bm90KFtjbGFzc149cHQtXSk6bm90KFtjbGFzcyo9XCIgcHQtXCJdKSB7XG4gIHBhZGRpbmctdG9wOiAxLjYyNXJlbSAhaW1wb3J0YW50O1xufVxuLmNvbnRhaW5lci1wLXk6bm90KFtjbGFzc149cGItXSk6bm90KFtjbGFzcyo9XCIgcGItXCJdKSB7XG4gIHBhZGRpbmctYm90dG9tOiAxLjYyNXJlbSAhaW1wb3J0YW50O1xufVxuXG4uY29udGFpbmVyLW0tbnk6bm90KFtjbGFzc149bXQtXSk6bm90KFtjbGFzcyo9XCIgbXQtXCJdKSB7XG4gIG1hcmdpbi10b3A6IC0xLjYyNXJlbSAhaW1wb3J0YW50O1xufVxuLmNvbnRhaW5lci1tLW55Om5vdChbY2xhc3NePW1iLV0pOm5vdChbY2xhc3MqPVwiIG1iLVwiXSkge1xuICBtYXJnaW4tYm90dG9tOiAtMS42MjVyZW0gIWltcG9ydGFudDtcbn1cblxuLmNlbGwtZml0IHtcbiAgd2lkdGg6IDAuMSU7XG4gIHdoaXRlLXNwYWNlOiBub3dyYXA7XG59XG5cbi50YWJsZS1zZWNvbmRhcnkge1xuICAtLWJzLXRhYmxlLWJnOiAjZTdlOWVkO1xuICAtLWJzLXRhYmxlLXN0cmlwZWQtYmc6ICNlMmU1ZTk7XG4gIC0tYnMtdGFibGUtc3RyaXBlZC1jb2xvcjogIzQzNTk3MTtcbiAgLS1icy10YWJsZS1hY3RpdmUtYmc6ICNkN2RiZTE7XG4gIC0tYnMtdGFibGUtYWN0aXZlLWNvbG9yOiAjNDM1OTcxO1xuICAtLWJzLXRhYmxlLWhvdmVyLWJnOiAjZGRlMGU2O1xuICAtLWJzLXRhYmxlLWhvdmVyLWNvbG9yOiAjNDM1OTcxO1xuICBjb2xvcjogIzQzNTk3MTtcbiAgYm9yZGVyLWNvbG9yOiAjZDdkYmUxO1xufVxuLnRhYmxlLXNlY29uZGFyeSB0aCB7XG4gIGJvcmRlci1ib3R0b20tY29sb3I6IGluaGVyaXQgIWltcG9ydGFudDtcbn1cbi50YWJsZS1zZWNvbmRhcnkgLmJ0bi1pY29uIHtcbiAgY29sb3I6ICM0MzU5NzE7XG59XG5cbi50YWJsZS1zdWNjZXNzIHtcbiAgLS1icy10YWJsZS1iZzogI2UzZjhkNztcbiAgLS1icy10YWJsZS1zdHJpcGVkLWJnOiAjZGVmM2Q0O1xuICAtLWJzLXRhYmxlLXN0cmlwZWQtY29sb3I6ICM0MzU5NzE7XG4gIC0tYnMtdGFibGUtYWN0aXZlLWJnOiAjZDNlOGNkO1xuICAtLWJzLXRhYmxlLWFjdGl2ZS1jb2xvcjogIzQzNTk3MTtcbiAgLS1icy10YWJsZS1ob3Zlci1iZzogI2Q5ZWVkMTtcbiAgLS1icy10YWJsZS1ob3Zlci1jb2xvcjogIzQzNTk3MTtcbiAgY29sb3I6ICM0MzU5NzE7XG4gIGJvcmRlci1jb2xvcjogI2QzZThjZDtcbn1cbi50YWJsZS1zdWNjZXNzIHRoIHtcbiAgYm9yZGVyLWJvdHRvbS1jb2xvcjogaW5oZXJpdCAhaW1wb3J0YW50O1xufVxuLnRhYmxlLXN1Y2Nlc3MgLmJ0bi1pY29uIHtcbiAgY29sb3I6ICM0MzU5NzE7XG59XG5cbi50YWJsZS1pbmZvIHtcbiAgLS1icy10YWJsZS1iZzogI2NkZjNmYjtcbiAgLS1icy10YWJsZS1zdHJpcGVkLWJnOiAjYzllZWY3O1xuICAtLWJzLXRhYmxlLXN0cmlwZWQtY29sb3I6ICM0MzU5NzE7XG4gIC0tYnMtdGFibGUtYWN0aXZlLWJnOiAjYmZlNGVkO1xuICAtLWJzLXRhYmxlLWFjdGl2ZS1jb2xvcjogIzQzNTk3MTtcbiAgLS1icy10YWJsZS1ob3Zlci1iZzogI2M1ZWFmMztcbiAgLS1icy10YWJsZS1ob3Zlci1jb2xvcjogIzQzNTk3MTtcbiAgY29sb3I6ICM0MzU5NzE7XG4gIGJvcmRlci1jb2xvcjogI2JmZTRlZDtcbn1cbi50YWJsZS1pbmZvIHRoIHtcbiAgYm9yZGVyLWJvdHRvbS1jb2xvcjogaW5oZXJpdCAhaW1wb3J0YW50O1xufVxuLnRhYmxlLWluZm8gLmJ0bi1pY29uIHtcbiAgY29sb3I6ICM0MzU5NzE7XG59XG5cbi50YWJsZS13YXJuaW5nIHtcbiAgLS1icy10YWJsZS1iZzogI2ZmZWVjYztcbiAgLS1icy10YWJsZS1zdHJpcGVkLWJnOiAjZjllYWM5O1xuICAtLWJzLXRhYmxlLXN0cmlwZWQtY29sb3I6ICM0MzU5NzE7XG4gIC0tYnMtdGFibGUtYWN0aXZlLWJnOiAjZWNkZmMzO1xuICAtLWJzLXRhYmxlLWFjdGl2ZS1jb2xvcjogIzQzNTk3MTtcbiAgLS1icy10YWJsZS1ob3Zlci1iZzogI2Y0ZTVjNztcbiAgLS1icy10YWJsZS1ob3Zlci1jb2xvcjogIzQzNTk3MTtcbiAgY29sb3I6ICM0MzU5NzE7XG4gIGJvcmRlci1jb2xvcjogI2VjZGZjMztcbn1cbi50YWJsZS13YXJuaW5nIHRoIHtcbiAgYm9yZGVyLWJvdHRvbS1jb2xvcjogaW5oZXJpdCAhaW1wb3J0YW50O1xufVxuLnRhYmxlLXdhcm5pbmcgLmJ0bi1pY29uIHtcbiAgY29sb3I6ICM0MzU5NzE7XG59XG5cbi50YWJsZS1kYW5nZXIge1xuICAtLWJzLXRhYmxlLWJnOiAjZmZkOGQyO1xuICAtLWJzLXRhYmxlLXN0cmlwZWQtYmc6ICNmOWQ0Y2Y7XG4gIC0tYnMtdGFibGUtc3RyaXBlZC1jb2xvcjogIzQzNTk3MTtcbiAgLS1icy10YWJsZS1hY3RpdmUtYmc6ICNlY2NiYzg7XG4gIC0tYnMtdGFibGUtYWN0aXZlLWNvbG9yOiAjNDM1OTcxO1xuICAtLWJzLXRhYmxlLWhvdmVyLWJnOiAjZjRkMGNjO1xuICAtLWJzLXRhYmxlLWhvdmVyLWNvbG9yOiAjNDM1OTcxO1xuICBjb2xvcjogIzQzNTk3MTtcbiAgYm9yZGVyLWNvbG9yOiAjZWNjYmM4O1xufVxuLnRhYmxlLWRhbmdlciB0aCB7XG4gIGJvcmRlci1ib3R0b20tY29sb3I6IGluaGVyaXQgIWltcG9ydGFudDtcbn1cbi50YWJsZS1kYW5nZXIgLmJ0bi1pY29uIHtcbiAgY29sb3I6ICM0MzU5NzE7XG59XG5cbi50YWJsZS1saWdodCB7XG4gIC0tYnMtdGFibGUtYmc6ICNmY2ZkZmQ7XG4gIC0tYnMtdGFibGUtc3RyaXBlZC1iZzogI2Y2ZjhmOTtcbiAgLS1icy10YWJsZS1zdHJpcGVkLWNvbG9yOiAjNDM1OTcxO1xuICAtLWJzLXRhYmxlLWFjdGl2ZS1iZzogI2VhZWRlZjtcbiAgLS1icy10YWJsZS1hY3RpdmUtY29sb3I6ICM0MzU5NzE7XG4gIC0tYnMtdGFibGUtaG92ZXItYmc6ICNmMWYzZjU7XG4gIC0tYnMtdGFibGUtaG92ZXItY29sb3I6ICM0MzU5NzE7XG4gIGNvbG9yOiAjNDM1OTcxO1xuICBib3JkZXItY29sb3I6ICNlYWVkZWY7XG59XG4udGFibGUtbGlnaHQgdGgge1xuICBib3JkZXItYm90dG9tLWNvbG9yOiBpbmhlcml0ICFpbXBvcnRhbnQ7XG59XG4udGFibGUtbGlnaHQgLmJ0bi1pY29uIHtcbiAgY29sb3I6ICM0MzU5NzE7XG59XG5cbi50YWJsZS1kYXJrIHtcbiAgLS1icy10YWJsZS1iZzogIzIzMzQ0NjtcbiAgLS1icy10YWJsZS1zdHJpcGVkLWJnOiAjMmEzYTRjO1xuICAtLWJzLXRhYmxlLXN0cmlwZWQtY29sb3I6ICNmZmY7XG4gIC0tYnMtdGFibGUtYWN0aXZlLWJnOiAjMzk0ODU5O1xuICAtLWJzLXRhYmxlLWFjdGl2ZS1jb2xvcjogI2ZmZjtcbiAgLS1icy10YWJsZS1ob3Zlci1iZzogIzMwNDA1MTtcbiAgLS1icy10YWJsZS1ob3Zlci1jb2xvcjogI2ZmZjtcbiAgY29sb3I6ICNmZmY7XG4gIGJvcmRlci1jb2xvcjogIzM5NDg1OTtcbn1cbi50YWJsZS1kYXJrIHRoIHtcbiAgYm9yZGVyLWJvdHRvbS1jb2xvcjogIzM5NDg1OSAhaW1wb3J0YW50O1xufVxuLnRhYmxlLWRhcmsgLmJ0bi1pY29uIHtcbiAgY29sb3I6ICNmZmY7XG59XG5cbi5jYXJkIC50YWJsZSB7XG4gIG1hcmdpbi1ib3R0b206IDA7XG59XG5cbkBzdXBwb3J0cyAoLW1vei1hcHBlYXJhbmNlOiBub25lKSB7XG4gIC50YWJsZSAuZHJvcGRvd24tbWVudS5zaG93IHtcbiAgICBkaXNwbGF5OiBpbmxpbmUtdGFibGU7XG4gIH1cbn1cbi50YWJsZSB0aCB7XG4gIHRleHQtdHJhbnNmb3JtOiB1cHBlcmNhc2U7XG4gIGZvbnQtc2l6ZTogMC43NXJlbTtcbiAgbGV0dGVyLXNwYWNpbmc6IDFweDtcbn1cbi50YWJsZTpub3QoLnRhYmxlLWRhcmspIHRoIHtcbiAgY29sb3I6ICM1NjZhN2Y7XG59XG5cbi50YWJsZS1ib3JkZXItYm90dG9tLTAgdHI6bGFzdC1jaGlsZCB0ZCxcbi50YWJsZS1ib3JkZXItYm90dG9tLTAgdHI6bGFzdC1jaGlsZCB0aCB7XG4gIGJvcmRlci1ib3R0b20td2lkdGg6IDA7XG59XG5cbi50YWJsZS50YWJsZS1kYXJrIC5idG4uYnRuLWljb24ge1xuICBjb2xvcjogI2Q5ZGVlMztcbn1cblxuLnRhYmxlLnRhYmxlLWZsdXNoLXNwYWNpbmcgdGhlYWQgdHIgPiB0ZDpmaXJzdC1jaGlsZCxcbi50YWJsZS50YWJsZS1mbHVzaC1zcGFjaW5nIHRib2R5IHRyID4gdGQ6Zmlyc3QtY2hpbGQge1xuICBwYWRkaW5nLWxlZnQ6IDA7XG59XG4udGFibGUudGFibGUtZmx1c2gtc3BhY2luZyB0aGVhZCB0ciA+IHRkOmxhc3QtY2hpbGQsXG4udGFibGUudGFibGUtZmx1c2gtc3BhY2luZyB0Ym9keSB0ciA+IHRkOmxhc3QtY2hpbGQge1xuICBwYWRkaW5nLXJpZ2h0OiAwO1xufVxuXG4ubmF2LWFsaWduLXRvcCAudGFibGU6bm90KC50YWJsZS1kYXJrKSxcbi5uYXYtYWxpZ24tdG9wIC50YWJsZTpub3QoLnRhYmxlLWRhcmspIHRoZWFkOm5vdCgudGFibGUtZGFyaykgdGgsXG4ubmF2LWFsaWduLXRvcCAudGFibGU6bm90KC50YWJsZS1kYXJrKSB0Zm9vdDpub3QoLnRhYmxlLWRhcmspIHRoLFxuLm5hdi1hbGlnbi10b3AgLnRhYmxlOm5vdCgudGFibGUtZGFyaykgdGQsXG4ubmF2LWFsaWduLXJpZ2h0IC50YWJsZTpub3QoLnRhYmxlLWRhcmspLFxuLm5hdi1hbGlnbi1yaWdodCAudGFibGU6bm90KC50YWJsZS1kYXJrKSB0aGVhZDpub3QoLnRhYmxlLWRhcmspIHRoLFxuLm5hdi1hbGlnbi1yaWdodCAudGFibGU6bm90KC50YWJsZS1kYXJrKSB0Zm9vdDpub3QoLnRhYmxlLWRhcmspIHRoLFxuLm5hdi1hbGlnbi1yaWdodCAudGFibGU6bm90KC50YWJsZS1kYXJrKSB0ZCxcbi5uYXYtYWxpZ24tYm90dG9tIC50YWJsZTpub3QoLnRhYmxlLWRhcmspLFxuLm5hdi1hbGlnbi1ib3R0b20gLnRhYmxlOm5vdCgudGFibGUtZGFyaykgdGhlYWQ6bm90KC50YWJsZS1kYXJrKSB0aCxcbi5uYXYtYWxpZ24tYm90dG9tIC50YWJsZTpub3QoLnRhYmxlLWRhcmspIHRmb290Om5vdCgudGFibGUtZGFyaykgdGgsXG4ubmF2LWFsaWduLWJvdHRvbSAudGFibGU6bm90KC50YWJsZS1kYXJrKSB0ZCxcbi5uYXYtYWxpZ24tbGVmdCAudGFibGU6bm90KC50YWJsZS1kYXJrKSxcbi5uYXYtYWxpZ24tbGVmdCAudGFibGU6bm90KC50YWJsZS1kYXJrKSB0aGVhZDpub3QoLnRhYmxlLWRhcmspIHRoLFxuLm5hdi1hbGlnbi1sZWZ0IC50YWJsZTpub3QoLnRhYmxlLWRhcmspIHRmb290Om5vdCgudGFibGUtZGFyaykgdGgsXG4ubmF2LWFsaWduLWxlZnQgLnRhYmxlOm5vdCgudGFibGUtZGFyaykgdGQge1xuICBib3JkZXItY29sb3I6ICNkOWRlZTM7XG59XG5cbi5idG4ge1xuICBjdXJzb3I6IHBvaW50ZXI7XG59XG4uYnRuLmRpc2FibGVkLCAuYnRuOmRpc2FibGVkIHtcbiAgY3Vyc29yOiBkZWZhdWx0O1xufVxuXG4uYnRuIC5iYWRnZSB7XG4gIHRyYW5zaXRpb246IGFsbCAwLjJzIGVhc2UtaW4tb3V0O1xufVxuQG1lZGlhIChwcmVmZXJzLXJlZHVjZWQtbW90aW9uOiByZWR1Y2UpIHtcbiAgLmJ0biAuYmFkZ2Uge1xuICAgIHRyYW5zaXRpb246IG5vbmU7XG4gIH1cbn1cblxubGFiZWwuYnRuIHtcbiAgbWFyZ2luLWJvdHRvbTogMDtcbn1cblxuLmJ0bi14bCwgLmJ0bi1ncm91cC14bCA+IC5idG4ge1xuICBwYWRkaW5nOiAwLjg3NXJlbSAyLjEyNXJlbTtcbiAgZm9udC1zaXplOiAxLjI1cmVtO1xuICBib3JkZXItcmFkaXVzOiAwLjYyNXJlbTtcbn1cblxuLmJ0bi14cywgLmJ0bi1ncm91cC14cyA+IC5idG4ge1xuICBwYWRkaW5nOiAwIDAuNXJlbTtcbiAgZm9udC1zaXplOiAwLjc1cmVtO1xuICBib3JkZXItcmFkaXVzOiAwLjEyNXJlbTtcbn1cblxuLmJ0bi1zZWNvbmRhcnkge1xuICBjb2xvcjogI2ZmZjtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzg1OTJhMztcbiAgYm9yZGVyLWNvbG9yOiAjODU5MmEzO1xuICBib3gtc2hhZG93OiAwIDAuMTI1cmVtIDAuMjVyZW0gMCByZ2JhKDEzMywgMTQ2LCAxNjMsIDAuNCk7XG59XG4uYnRuLXNlY29uZGFyeTpob3ZlciB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjNzg4MzkzO1xuICBib3JkZXItY29sb3I6ICM3ODgzOTM7XG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlWSgtMXB4KTtcbn1cbi5idG4tY2hlY2s6Zm9jdXMgKyAuYnRuLXNlY29uZGFyeSwgLmJ0bi1zZWNvbmRhcnk6Zm9jdXMsIC5idG4tc2Vjb25kYXJ5LmZvY3VzIHtcbiAgY29sb3I6ICNmZmY7XG4gIGJhY2tncm91bmQtY29sb3I6ICM3ODgzOTM7XG4gIGJvcmRlci1jb2xvcjogIzc4ODM5MztcbiAgdHJhbnNmb3JtOiB0cmFuc2xhdGVZKDApO1xuICBib3gtc2hhZG93OiBub25lO1xufVxuLmJ0bi1jaGVjazpjaGVja2VkICsgLmJ0bi1zZWNvbmRhcnksIC5idG4tY2hlY2s6YWN0aXZlICsgLmJ0bi1zZWNvbmRhcnksIC5idG4tc2Vjb25kYXJ5OmFjdGl2ZSwgLmJ0bi1zZWNvbmRhcnkuYWN0aXZlLCAuc2hvdyA+IC5idG4tc2Vjb25kYXJ5LmRyb3Bkb3duLXRvZ2dsZSB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjNzE3YzhiO1xuICBib3JkZXItY29sb3I6ICM3MTdjOGI7XG59XG4uYnRuLWNoZWNrOmNoZWNrZWQgKyAuYnRuLXNlY29uZGFyeTpmb2N1cywgLmJ0bi1jaGVjazphY3RpdmUgKyAuYnRuLXNlY29uZGFyeTpmb2N1cywgLmJ0bi1zZWNvbmRhcnk6YWN0aXZlOmZvY3VzLCAuYnRuLXNlY29uZGFyeS5hY3RpdmU6Zm9jdXMsIC5zaG93ID4gLmJ0bi1zZWNvbmRhcnkuZHJvcGRvd24tdG9nZ2xlOmZvY3VzIHtcbiAgYm94LXNoYWRvdzogbm9uZTtcbn1cbi5idG4tc2Vjb25kYXJ5LmRpc2FibGVkLCAuYnRuLXNlY29uZGFyeTpkaXNhYmxlZCB7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG59XG5cbi5idG4tb3V0bGluZS1zZWNvbmRhcnkge1xuICBjb2xvcjogIzg1OTJhMztcbiAgYm9yZGVyLWNvbG9yOiAjODU5MmEzO1xuICBiYWNrZ3JvdW5kOiB0cmFuc3BhcmVudDtcbn1cbi5idG4tb3V0bGluZS1zZWNvbmRhcnk6aG92ZXIge1xuICBjb2xvcjogI2ZmZjtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzc4ODM5MztcbiAgYm9yZGVyLWNvbG9yOiAjNzg4MzkzO1xuICBib3gtc2hhZG93OiAwIDAuMTI1cmVtIDAuMjVyZW0gMCByZ2JhKDEzMywgMTQ2LCAxNjMsIDAuNCk7XG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlWSgtMXB4KTtcbn1cbi5idG4tY2hlY2s6Zm9jdXMgKyAuYnRuLW91dGxpbmUtc2Vjb25kYXJ5LCAuYnRuLW91dGxpbmUtc2Vjb25kYXJ5OmZvY3VzIHtcbiAgY29sb3I6ICNmZmY7XG4gIGJhY2tncm91bmQtY29sb3I6ICM3ODgzOTM7XG4gIGJvcmRlci1jb2xvcjogIzc4ODM5MztcbiAgYm94LXNoYWRvdzogbm9uZTtcbiAgdHJhbnNmb3JtOiB0cmFuc2xhdGVZKDApO1xufVxuLmJ0bi1jaGVjazpjaGVja2VkICsgLmJ0bi1vdXRsaW5lLXNlY29uZGFyeSwgLmJ0bi1jaGVjazphY3RpdmUgKyAuYnRuLW91dGxpbmUtc2Vjb25kYXJ5LCAuYnRuLW91dGxpbmUtc2Vjb25kYXJ5OmFjdGl2ZSwgLmJ0bi1vdXRsaW5lLXNlY29uZGFyeS5hY3RpdmUsIC5idG4tb3V0bGluZS1zZWNvbmRhcnkuZHJvcGRvd24tdG9nZ2xlLnNob3cge1xuICBjb2xvcjogI2ZmZjtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzcxN2M4YjtcbiAgYm9yZGVyLWNvbG9yOiAjNzE3YzhiO1xufVxuLmJ0bi1jaGVjazpjaGVja2VkICsgLmJ0bi1vdXRsaW5lLXNlY29uZGFyeTpmb2N1cywgLmJ0bi1jaGVjazphY3RpdmUgKyAuYnRuLW91dGxpbmUtc2Vjb25kYXJ5OmZvY3VzLCAuYnRuLW91dGxpbmUtc2Vjb25kYXJ5OmFjdGl2ZTpmb2N1cywgLmJ0bi1vdXRsaW5lLXNlY29uZGFyeS5hY3RpdmU6Zm9jdXMsIC5idG4tb3V0bGluZS1zZWNvbmRhcnkuZHJvcGRvd24tdG9nZ2xlLnNob3c6Zm9jdXMge1xuICBib3gtc2hhZG93OiBub25lO1xufVxuLmJ0bi1vdXRsaW5lLXNlY29uZGFyeS5kaXNhYmxlZCwgLmJ0bi1vdXRsaW5lLXNlY29uZGFyeTpkaXNhYmxlZCB7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG59XG5cbi5idG4tb3V0bGluZS1zZWNvbmRhcnkgLmJhZGdlIHtcbiAgYmFja2dyb3VuZDogIzg1OTJhMztcbiAgYm9yZGVyLWNvbG9yOiAjODU5MmEzO1xuICBjb2xvcjogI2ZmZjtcbn1cblxuLmJ0bi1vdXRsaW5lLXNlY29uZGFyeTpob3ZlciAuYmFkZ2UsXG4uYnRuLW91dGxpbmUtc2Vjb25kYXJ5OmZvY3VzOmhvdmVyIC5iYWRnZSxcbi5idG4tb3V0bGluZS1zZWNvbmRhcnk6YWN0aXZlIC5iYWRnZSxcbi5idG4tb3V0bGluZS1zZWNvbmRhcnkuYWN0aXZlIC5iYWRnZSxcbi5zaG93ID4gLmJ0bi1vdXRsaW5lLXNlY29uZGFyeS5kcm9wZG93bi10b2dnbGUgLmJhZGdlIHtcbiAgYmFja2dyb3VuZDogI2ZmZjtcbiAgYm9yZGVyLWNvbG9yOiAjZmZmO1xuICBjb2xvcjogIzg1OTJhMztcbn1cblxuLmJ0bi1zdWNjZXNzIHtcbiAgY29sb3I6ICNmZmY7XG4gIGJhY2tncm91bmQtY29sb3I6ICM3MWRkMzc7XG4gIGJvcmRlci1jb2xvcjogIzcxZGQzNztcbiAgYm94LXNoYWRvdzogMCAwLjEyNXJlbSAwLjI1cmVtIDAgcmdiYSgxMTMsIDIyMSwgNTUsIDAuNCk7XG59XG4uYnRuLXN1Y2Nlc3M6aG92ZXIge1xuICBjb2xvcjogI2ZmZjtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzY2YzczMjtcbiAgYm9yZGVyLWNvbG9yOiAjNjZjNzMyO1xuICB0cmFuc2Zvcm06IHRyYW5zbGF0ZVkoLTFweCk7XG59XG4uYnRuLWNoZWNrOmZvY3VzICsgLmJ0bi1zdWNjZXNzLCAuYnRuLXN1Y2Nlc3M6Zm9jdXMsIC5idG4tc3VjY2Vzcy5mb2N1cyB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjNjZjNzMyO1xuICBib3JkZXItY29sb3I6ICM2NmM3MzI7XG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlWSgwKTtcbiAgYm94LXNoYWRvdzogbm9uZTtcbn1cbi5idG4tY2hlY2s6Y2hlY2tlZCArIC5idG4tc3VjY2VzcywgLmJ0bi1jaGVjazphY3RpdmUgKyAuYnRuLXN1Y2Nlc3MsIC5idG4tc3VjY2VzczphY3RpdmUsIC5idG4tc3VjY2Vzcy5hY3RpdmUsIC5zaG93ID4gLmJ0bi1zdWNjZXNzLmRyb3Bkb3duLXRvZ2dsZSB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjNjBiYzJmO1xuICBib3JkZXItY29sb3I6ICM2MGJjMmY7XG59XG4uYnRuLWNoZWNrOmNoZWNrZWQgKyAuYnRuLXN1Y2Nlc3M6Zm9jdXMsIC5idG4tY2hlY2s6YWN0aXZlICsgLmJ0bi1zdWNjZXNzOmZvY3VzLCAuYnRuLXN1Y2Nlc3M6YWN0aXZlOmZvY3VzLCAuYnRuLXN1Y2Nlc3MuYWN0aXZlOmZvY3VzLCAuc2hvdyA+IC5idG4tc3VjY2Vzcy5kcm9wZG93bi10b2dnbGU6Zm9jdXMge1xuICBib3gtc2hhZG93OiBub25lO1xufVxuLmJ0bi1zdWNjZXNzLmRpc2FibGVkLCAuYnRuLXN1Y2Nlc3M6ZGlzYWJsZWQge1xuICBib3gtc2hhZG93OiBub25lO1xufVxuXG4uYnRuLW91dGxpbmUtc3VjY2VzcyB7XG4gIGNvbG9yOiAjNzFkZDM3O1xuICBib3JkZXItY29sb3I6ICM3MWRkMzc7XG4gIGJhY2tncm91bmQ6IHRyYW5zcGFyZW50O1xufVxuLmJ0bi1vdXRsaW5lLXN1Y2Nlc3M6aG92ZXIge1xuICBjb2xvcjogI2ZmZjtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzY2YzczMjtcbiAgYm9yZGVyLWNvbG9yOiAjNjZjNzMyO1xuICBib3gtc2hhZG93OiAwIDAuMTI1cmVtIDAuMjVyZW0gMCByZ2JhKDExMywgMjIxLCA1NSwgMC40KTtcbiAgdHJhbnNmb3JtOiB0cmFuc2xhdGVZKC0xcHgpO1xufVxuLmJ0bi1jaGVjazpmb2N1cyArIC5idG4tb3V0bGluZS1zdWNjZXNzLCAuYnRuLW91dGxpbmUtc3VjY2Vzczpmb2N1cyB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjNjZjNzMyO1xuICBib3JkZXItY29sb3I6ICM2NmM3MzI7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlWSgwKTtcbn1cbi5idG4tY2hlY2s6Y2hlY2tlZCArIC5idG4tb3V0bGluZS1zdWNjZXNzLCAuYnRuLWNoZWNrOmFjdGl2ZSArIC5idG4tb3V0bGluZS1zdWNjZXNzLCAuYnRuLW91dGxpbmUtc3VjY2VzczphY3RpdmUsIC5idG4tb3V0bGluZS1zdWNjZXNzLmFjdGl2ZSwgLmJ0bi1vdXRsaW5lLXN1Y2Nlc3MuZHJvcGRvd24tdG9nZ2xlLnNob3cge1xuICBjb2xvcjogI2ZmZjtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzYwYmMyZjtcbiAgYm9yZGVyLWNvbG9yOiAjNjBiYzJmO1xufVxuLmJ0bi1jaGVjazpjaGVja2VkICsgLmJ0bi1vdXRsaW5lLXN1Y2Nlc3M6Zm9jdXMsIC5idG4tY2hlY2s6YWN0aXZlICsgLmJ0bi1vdXRsaW5lLXN1Y2Nlc3M6Zm9jdXMsIC5idG4tb3V0bGluZS1zdWNjZXNzOmFjdGl2ZTpmb2N1cywgLmJ0bi1vdXRsaW5lLXN1Y2Nlc3MuYWN0aXZlOmZvY3VzLCAuYnRuLW91dGxpbmUtc3VjY2Vzcy5kcm9wZG93bi10b2dnbGUuc2hvdzpmb2N1cyB7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG59XG4uYnRuLW91dGxpbmUtc3VjY2Vzcy5kaXNhYmxlZCwgLmJ0bi1vdXRsaW5lLXN1Y2Nlc3M6ZGlzYWJsZWQge1xuICBib3gtc2hhZG93OiBub25lO1xufVxuXG4uYnRuLW91dGxpbmUtc3VjY2VzcyAuYmFkZ2Uge1xuICBiYWNrZ3JvdW5kOiAjNzFkZDM3O1xuICBib3JkZXItY29sb3I6ICM3MWRkMzc7XG4gIGNvbG9yOiAjZmZmO1xufVxuXG4uYnRuLW91dGxpbmUtc3VjY2Vzczpob3ZlciAuYmFkZ2UsXG4uYnRuLW91dGxpbmUtc3VjY2Vzczpmb2N1czpob3ZlciAuYmFkZ2UsXG4uYnRuLW91dGxpbmUtc3VjY2VzczphY3RpdmUgLmJhZGdlLFxuLmJ0bi1vdXRsaW5lLXN1Y2Nlc3MuYWN0aXZlIC5iYWRnZSxcbi5zaG93ID4gLmJ0bi1vdXRsaW5lLXN1Y2Nlc3MuZHJvcGRvd24tdG9nZ2xlIC5iYWRnZSB7XG4gIGJhY2tncm91bmQ6ICNmZmY7XG4gIGJvcmRlci1jb2xvcjogI2ZmZjtcbiAgY29sb3I6ICM3MWRkMzc7XG59XG5cbi5idG4taW5mbyB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMDNjM2VjO1xuICBib3JkZXItY29sb3I6ICMwM2MzZWM7XG4gIGJveC1zaGFkb3c6IDAgMC4xMjVyZW0gMC4yNXJlbSAwIHJnYmEoMywgMTk1LCAyMzYsIDAuNCk7XG59XG4uYnRuLWluZm86aG92ZXIge1xuICBjb2xvcjogI2ZmZjtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzAzYjBkNDtcbiAgYm9yZGVyLWNvbG9yOiAjMDNiMGQ0O1xuICB0cmFuc2Zvcm06IHRyYW5zbGF0ZVkoLTFweCk7XG59XG4uYnRuLWNoZWNrOmZvY3VzICsgLmJ0bi1pbmZvLCAuYnRuLWluZm86Zm9jdXMsIC5idG4taW5mby5mb2N1cyB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMDNiMGQ0O1xuICBib3JkZXItY29sb3I6ICMwM2IwZDQ7XG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlWSgwKTtcbiAgYm94LXNoYWRvdzogbm9uZTtcbn1cbi5idG4tY2hlY2s6Y2hlY2tlZCArIC5idG4taW5mbywgLmJ0bi1jaGVjazphY3RpdmUgKyAuYnRuLWluZm8sIC5idG4taW5mbzphY3RpdmUsIC5idG4taW5mby5hY3RpdmUsIC5zaG93ID4gLmJ0bi1pbmZvLmRyb3Bkb3duLXRvZ2dsZSB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMDNhNmM5O1xuICBib3JkZXItY29sb3I6ICMwM2E2Yzk7XG59XG4uYnRuLWNoZWNrOmNoZWNrZWQgKyAuYnRuLWluZm86Zm9jdXMsIC5idG4tY2hlY2s6YWN0aXZlICsgLmJ0bi1pbmZvOmZvY3VzLCAuYnRuLWluZm86YWN0aXZlOmZvY3VzLCAuYnRuLWluZm8uYWN0aXZlOmZvY3VzLCAuc2hvdyA+IC5idG4taW5mby5kcm9wZG93bi10b2dnbGU6Zm9jdXMge1xuICBib3gtc2hhZG93OiBub25lO1xufVxuLmJ0bi1pbmZvLmRpc2FibGVkLCAuYnRuLWluZm86ZGlzYWJsZWQge1xuICBib3gtc2hhZG93OiBub25lO1xufVxuXG4uYnRuLW91dGxpbmUtaW5mbyB7XG4gIGNvbG9yOiAjMDNjM2VjO1xuICBib3JkZXItY29sb3I6ICMwM2MzZWM7XG4gIGJhY2tncm91bmQ6IHRyYW5zcGFyZW50O1xufVxuLmJ0bi1vdXRsaW5lLWluZm86aG92ZXIge1xuICBjb2xvcjogI2ZmZjtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzAzYjBkNDtcbiAgYm9yZGVyLWNvbG9yOiAjMDNiMGQ0O1xuICBib3gtc2hhZG93OiAwIDAuMTI1cmVtIDAuMjVyZW0gMCByZ2JhKDMsIDE5NSwgMjM2LCAwLjQpO1xuICB0cmFuc2Zvcm06IHRyYW5zbGF0ZVkoLTFweCk7XG59XG4uYnRuLWNoZWNrOmZvY3VzICsgLmJ0bi1vdXRsaW5lLWluZm8sIC5idG4tb3V0bGluZS1pbmZvOmZvY3VzIHtcbiAgY29sb3I6ICNmZmY7XG4gIGJhY2tncm91bmQtY29sb3I6ICMwM2IwZDQ7XG4gIGJvcmRlci1jb2xvcjogIzAzYjBkNDtcbiAgYm94LXNoYWRvdzogbm9uZTtcbiAgdHJhbnNmb3JtOiB0cmFuc2xhdGVZKDApO1xufVxuLmJ0bi1jaGVjazpjaGVja2VkICsgLmJ0bi1vdXRsaW5lLWluZm8sIC5idG4tY2hlY2s6YWN0aXZlICsgLmJ0bi1vdXRsaW5lLWluZm8sIC5idG4tb3V0bGluZS1pbmZvOmFjdGl2ZSwgLmJ0bi1vdXRsaW5lLWluZm8uYWN0aXZlLCAuYnRuLW91dGxpbmUtaW5mby5kcm9wZG93bi10b2dnbGUuc2hvdyB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMDNhNmM5O1xuICBib3JkZXItY29sb3I6ICMwM2E2Yzk7XG59XG4uYnRuLWNoZWNrOmNoZWNrZWQgKyAuYnRuLW91dGxpbmUtaW5mbzpmb2N1cywgLmJ0bi1jaGVjazphY3RpdmUgKyAuYnRuLW91dGxpbmUtaW5mbzpmb2N1cywgLmJ0bi1vdXRsaW5lLWluZm86YWN0aXZlOmZvY3VzLCAuYnRuLW91dGxpbmUtaW5mby5hY3RpdmU6Zm9jdXMsIC5idG4tb3V0bGluZS1pbmZvLmRyb3Bkb3duLXRvZ2dsZS5zaG93OmZvY3VzIHtcbiAgYm94LXNoYWRvdzogbm9uZTtcbn1cbi5idG4tb3V0bGluZS1pbmZvLmRpc2FibGVkLCAuYnRuLW91dGxpbmUtaW5mbzpkaXNhYmxlZCB7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG59XG5cbi5idG4tb3V0bGluZS1pbmZvIC5iYWRnZSB7XG4gIGJhY2tncm91bmQ6ICMwM2MzZWM7XG4gIGJvcmRlci1jb2xvcjogIzAzYzNlYztcbiAgY29sb3I6ICNmZmY7XG59XG5cbi5idG4tb3V0bGluZS1pbmZvOmhvdmVyIC5iYWRnZSxcbi5idG4tb3V0bGluZS1pbmZvOmZvY3VzOmhvdmVyIC5iYWRnZSxcbi5idG4tb3V0bGluZS1pbmZvOmFjdGl2ZSAuYmFkZ2UsXG4uYnRuLW91dGxpbmUtaW5mby5hY3RpdmUgLmJhZGdlLFxuLnNob3cgPiAuYnRuLW91dGxpbmUtaW5mby5kcm9wZG93bi10b2dnbGUgLmJhZGdlIHtcbiAgYmFja2dyb3VuZDogI2ZmZjtcbiAgYm9yZGVyLWNvbG9yOiAjZmZmO1xuICBjb2xvcjogIzAzYzNlYztcbn1cblxuLmJ0bi13YXJuaW5nIHtcbiAgY29sb3I6ICNmZmY7XG4gIGJhY2tncm91bmQtY29sb3I6ICNmZmFiMDA7XG4gIGJvcmRlci1jb2xvcjogI2ZmYWIwMDtcbiAgYm94LXNoYWRvdzogMCAwLjEyNXJlbSAwLjI1cmVtIDAgcmdiYSgyNTUsIDE3MSwgMCwgMC40KTtcbn1cbi5idG4td2FybmluZzpob3ZlciB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZTY5YTAwO1xuICBib3JkZXItY29sb3I6ICNlNjlhMDA7XG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlWSgtMXB4KTtcbn1cbi5idG4tY2hlY2s6Zm9jdXMgKyAuYnRuLXdhcm5pbmcsIC5idG4td2FybmluZzpmb2N1cywgLmJ0bi13YXJuaW5nLmZvY3VzIHtcbiAgY29sb3I6ICNmZmY7XG4gIGJhY2tncm91bmQtY29sb3I6ICNlNjlhMDA7XG4gIGJvcmRlci1jb2xvcjogI2U2OWEwMDtcbiAgdHJhbnNmb3JtOiB0cmFuc2xhdGVZKDApO1xuICBib3gtc2hhZG93OiBub25lO1xufVxuLmJ0bi1jaGVjazpjaGVja2VkICsgLmJ0bi13YXJuaW5nLCAuYnRuLWNoZWNrOmFjdGl2ZSArIC5idG4td2FybmluZywgLmJ0bi13YXJuaW5nOmFjdGl2ZSwgLmJ0bi13YXJuaW5nLmFjdGl2ZSwgLnNob3cgPiAuYnRuLXdhcm5pbmcuZHJvcGRvd24tdG9nZ2xlIHtcbiAgY29sb3I6ICNmZmY7XG4gIGJhY2tncm91bmQtY29sb3I6ICNkOTkxMDA7XG4gIGJvcmRlci1jb2xvcjogI2Q5OTEwMDtcbn1cbi5idG4tY2hlY2s6Y2hlY2tlZCArIC5idG4td2FybmluZzpmb2N1cywgLmJ0bi1jaGVjazphY3RpdmUgKyAuYnRuLXdhcm5pbmc6Zm9jdXMsIC5idG4td2FybmluZzphY3RpdmU6Zm9jdXMsIC5idG4td2FybmluZy5hY3RpdmU6Zm9jdXMsIC5zaG93ID4gLmJ0bi13YXJuaW5nLmRyb3Bkb3duLXRvZ2dsZTpmb2N1cyB7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG59XG4uYnRuLXdhcm5pbmcuZGlzYWJsZWQsIC5idG4td2FybmluZzpkaXNhYmxlZCB7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG59XG5cbi5idG4tb3V0bGluZS13YXJuaW5nIHtcbiAgY29sb3I6ICNmZmFiMDA7XG4gIGJvcmRlci1jb2xvcjogI2ZmYWIwMDtcbiAgYmFja2dyb3VuZDogdHJhbnNwYXJlbnQ7XG59XG4uYnRuLW91dGxpbmUtd2FybmluZzpob3ZlciB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZTY5YTAwO1xuICBib3JkZXItY29sb3I6ICNlNjlhMDA7XG4gIGJveC1zaGFkb3c6IDAgMC4xMjVyZW0gMC4yNXJlbSAwIHJnYmEoMjU1LCAxNzEsIDAsIDAuNCk7XG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlWSgtMXB4KTtcbn1cbi5idG4tY2hlY2s6Zm9jdXMgKyAuYnRuLW91dGxpbmUtd2FybmluZywgLmJ0bi1vdXRsaW5lLXdhcm5pbmc6Zm9jdXMge1xuICBjb2xvcjogI2ZmZjtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2U2OWEwMDtcbiAgYm9yZGVyLWNvbG9yOiAjZTY5YTAwO1xuICBib3gtc2hhZG93OiBub25lO1xuICB0cmFuc2Zvcm06IHRyYW5zbGF0ZVkoMCk7XG59XG4uYnRuLWNoZWNrOmNoZWNrZWQgKyAuYnRuLW91dGxpbmUtd2FybmluZywgLmJ0bi1jaGVjazphY3RpdmUgKyAuYnRuLW91dGxpbmUtd2FybmluZywgLmJ0bi1vdXRsaW5lLXdhcm5pbmc6YWN0aXZlLCAuYnRuLW91dGxpbmUtd2FybmluZy5hY3RpdmUsIC5idG4tb3V0bGluZS13YXJuaW5nLmRyb3Bkb3duLXRvZ2dsZS5zaG93IHtcbiAgY29sb3I6ICNmZmY7XG4gIGJhY2tncm91bmQtY29sb3I6ICNkOTkxMDA7XG4gIGJvcmRlci1jb2xvcjogI2Q5OTEwMDtcbn1cbi5idG4tY2hlY2s6Y2hlY2tlZCArIC5idG4tb3V0bGluZS13YXJuaW5nOmZvY3VzLCAuYnRuLWNoZWNrOmFjdGl2ZSArIC5idG4tb3V0bGluZS13YXJuaW5nOmZvY3VzLCAuYnRuLW91dGxpbmUtd2FybmluZzphY3RpdmU6Zm9jdXMsIC5idG4tb3V0bGluZS13YXJuaW5nLmFjdGl2ZTpmb2N1cywgLmJ0bi1vdXRsaW5lLXdhcm5pbmcuZHJvcGRvd24tdG9nZ2xlLnNob3c6Zm9jdXMge1xuICBib3gtc2hhZG93OiBub25lO1xufVxuLmJ0bi1vdXRsaW5lLXdhcm5pbmcuZGlzYWJsZWQsIC5idG4tb3V0bGluZS13YXJuaW5nOmRpc2FibGVkIHtcbiAgYm94LXNoYWRvdzogbm9uZTtcbn1cblxuLmJ0bi1vdXRsaW5lLXdhcm5pbmcgLmJhZGdlIHtcbiAgYmFja2dyb3VuZDogI2ZmYWIwMDtcbiAgYm9yZGVyLWNvbG9yOiAjZmZhYjAwO1xuICBjb2xvcjogI2ZmZjtcbn1cblxuLmJ0bi1vdXRsaW5lLXdhcm5pbmc6aG92ZXIgLmJhZGdlLFxuLmJ0bi1vdXRsaW5lLXdhcm5pbmc6Zm9jdXM6aG92ZXIgLmJhZGdlLFxuLmJ0bi1vdXRsaW5lLXdhcm5pbmc6YWN0aXZlIC5iYWRnZSxcbi5idG4tb3V0bGluZS13YXJuaW5nLmFjdGl2ZSAuYmFkZ2UsXG4uc2hvdyA+IC5idG4tb3V0bGluZS13YXJuaW5nLmRyb3Bkb3duLXRvZ2dsZSAuYmFkZ2Uge1xuICBiYWNrZ3JvdW5kOiAjZmZmO1xuICBib3JkZXItY29sb3I6ICNmZmY7XG4gIGNvbG9yOiAjZmZhYjAwO1xufVxuXG4uYnRuLWRhbmdlciB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmYzZTFkO1xuICBib3JkZXItY29sb3I6ICNmZjNlMWQ7XG4gIGJveC1zaGFkb3c6IDAgMC4xMjVyZW0gMC4yNXJlbSAwIHJnYmEoMjU1LCA2MiwgMjksIDAuNCk7XG59XG4uYnRuLWRhbmdlcjpob3ZlciB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZTYzODFhO1xuICBib3JkZXItY29sb3I6ICNlNjM4MWE7XG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlWSgtMXB4KTtcbn1cbi5idG4tY2hlY2s6Zm9jdXMgKyAuYnRuLWRhbmdlciwgLmJ0bi1kYW5nZXI6Zm9jdXMsIC5idG4tZGFuZ2VyLmZvY3VzIHtcbiAgY29sb3I6ICNmZmY7XG4gIGJhY2tncm91bmQtY29sb3I6ICNlNjM4MWE7XG4gIGJvcmRlci1jb2xvcjogI2U2MzgxYTtcbiAgdHJhbnNmb3JtOiB0cmFuc2xhdGVZKDApO1xuICBib3gtc2hhZG93OiBub25lO1xufVxuLmJ0bi1jaGVjazpjaGVja2VkICsgLmJ0bi1kYW5nZXIsIC5idG4tY2hlY2s6YWN0aXZlICsgLmJ0bi1kYW5nZXIsIC5idG4tZGFuZ2VyOmFjdGl2ZSwgLmJ0bi1kYW5nZXIuYWN0aXZlLCAuc2hvdyA+IC5idG4tZGFuZ2VyLmRyb3Bkb3duLXRvZ2dsZSB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZDkzNTE5O1xuICBib3JkZXItY29sb3I6ICNkOTM1MTk7XG59XG4uYnRuLWNoZWNrOmNoZWNrZWQgKyAuYnRuLWRhbmdlcjpmb2N1cywgLmJ0bi1jaGVjazphY3RpdmUgKyAuYnRuLWRhbmdlcjpmb2N1cywgLmJ0bi1kYW5nZXI6YWN0aXZlOmZvY3VzLCAuYnRuLWRhbmdlci5hY3RpdmU6Zm9jdXMsIC5zaG93ID4gLmJ0bi1kYW5nZXIuZHJvcGRvd24tdG9nZ2xlOmZvY3VzIHtcbiAgYm94LXNoYWRvdzogbm9uZTtcbn1cbi5idG4tZGFuZ2VyLmRpc2FibGVkLCAuYnRuLWRhbmdlcjpkaXNhYmxlZCB7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG59XG5cbi5idG4tb3V0bGluZS1kYW5nZXIge1xuICBjb2xvcjogI2ZmM2UxZDtcbiAgYm9yZGVyLWNvbG9yOiAjZmYzZTFkO1xuICBiYWNrZ3JvdW5kOiB0cmFuc3BhcmVudDtcbn1cbi5idG4tb3V0bGluZS1kYW5nZXI6aG92ZXIge1xuICBjb2xvcjogI2ZmZjtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2U2MzgxYTtcbiAgYm9yZGVyLWNvbG9yOiAjZTYzODFhO1xuICBib3gtc2hhZG93OiAwIDAuMTI1cmVtIDAuMjVyZW0gMCByZ2JhKDI1NSwgNjIsIDI5LCAwLjQpO1xuICB0cmFuc2Zvcm06IHRyYW5zbGF0ZVkoLTFweCk7XG59XG4uYnRuLWNoZWNrOmZvY3VzICsgLmJ0bi1vdXRsaW5lLWRhbmdlciwgLmJ0bi1vdXRsaW5lLWRhbmdlcjpmb2N1cyB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZTYzODFhO1xuICBib3JkZXItY29sb3I6ICNlNjM4MWE7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlWSgwKTtcbn1cbi5idG4tY2hlY2s6Y2hlY2tlZCArIC5idG4tb3V0bGluZS1kYW5nZXIsIC5idG4tY2hlY2s6YWN0aXZlICsgLmJ0bi1vdXRsaW5lLWRhbmdlciwgLmJ0bi1vdXRsaW5lLWRhbmdlcjphY3RpdmUsIC5idG4tb3V0bGluZS1kYW5nZXIuYWN0aXZlLCAuYnRuLW91dGxpbmUtZGFuZ2VyLmRyb3Bkb3duLXRvZ2dsZS5zaG93IHtcbiAgY29sb3I6ICNmZmY7XG4gIGJhY2tncm91bmQtY29sb3I6ICNkOTM1MTk7XG4gIGJvcmRlci1jb2xvcjogI2Q5MzUxOTtcbn1cbi5idG4tY2hlY2s6Y2hlY2tlZCArIC5idG4tb3V0bGluZS1kYW5nZXI6Zm9jdXMsIC5idG4tY2hlY2s6YWN0aXZlICsgLmJ0bi1vdXRsaW5lLWRhbmdlcjpmb2N1cywgLmJ0bi1vdXRsaW5lLWRhbmdlcjphY3RpdmU6Zm9jdXMsIC5idG4tb3V0bGluZS1kYW5nZXIuYWN0aXZlOmZvY3VzLCAuYnRuLW91dGxpbmUtZGFuZ2VyLmRyb3Bkb3duLXRvZ2dsZS5zaG93OmZvY3VzIHtcbiAgYm94LXNoYWRvdzogbm9uZTtcbn1cbi5idG4tb3V0bGluZS1kYW5nZXIuZGlzYWJsZWQsIC5idG4tb3V0bGluZS1kYW5nZXI6ZGlzYWJsZWQge1xuICBib3gtc2hhZG93OiBub25lO1xufVxuXG4uYnRuLW91dGxpbmUtZGFuZ2VyIC5iYWRnZSB7XG4gIGJhY2tncm91bmQ6ICNmZjNlMWQ7XG4gIGJvcmRlci1jb2xvcjogI2ZmM2UxZDtcbiAgY29sb3I6ICNmZmY7XG59XG5cbi5idG4tb3V0bGluZS1kYW5nZXI6aG92ZXIgLmJhZGdlLFxuLmJ0bi1vdXRsaW5lLWRhbmdlcjpmb2N1czpob3ZlciAuYmFkZ2UsXG4uYnRuLW91dGxpbmUtZGFuZ2VyOmFjdGl2ZSAuYmFkZ2UsXG4uYnRuLW91dGxpbmUtZGFuZ2VyLmFjdGl2ZSAuYmFkZ2UsXG4uc2hvdyA+IC5idG4tb3V0bGluZS1kYW5nZXIuZHJvcGRvd24tdG9nZ2xlIC5iYWRnZSB7XG4gIGJhY2tncm91bmQ6ICNmZmY7XG4gIGJvcmRlci1jb2xvcjogI2ZmZjtcbiAgY29sb3I6ICNmZjNlMWQ7XG59XG5cbi5idG4tbGlnaHQge1xuICBjb2xvcjogIzQzNTk3MTtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZjZmRmZDtcbiAgYm9yZGVyLWNvbG9yOiAjZmNmZGZkO1xuICBib3gtc2hhZG93OiAwIDAuMTI1cmVtIDAuMjVyZW0gMCByZ2JhKDI1MiwgMjUzLCAyNTMsIDAuNCk7XG59XG4uYnRuLWxpZ2h0OmhvdmVyIHtcbiAgY29sb3I6ICM0MzU5NzE7XG4gIGJhY2tncm91bmQtY29sb3I6ICNmY2ZkZmQ7XG4gIGJvcmRlci1jb2xvcjogI2ZjZmRmZDtcbiAgdHJhbnNmb3JtOiB0cmFuc2xhdGVZKC0xcHgpO1xufVxuLmJ0bi1jaGVjazpmb2N1cyArIC5idG4tbGlnaHQsIC5idG4tbGlnaHQ6Zm9jdXMsIC5idG4tbGlnaHQuZm9jdXMge1xuICBjb2xvcjogIzQzNTk3MTtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZjZmRmZDtcbiAgYm9yZGVyLWNvbG9yOiAjZmNmZGZkO1xuICB0cmFuc2Zvcm06IHRyYW5zbGF0ZVkoMCk7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG59XG4uYnRuLWNoZWNrOmNoZWNrZWQgKyAuYnRuLWxpZ2h0LCAuYnRuLWNoZWNrOmFjdGl2ZSArIC5idG4tbGlnaHQsIC5idG4tbGlnaHQ6YWN0aXZlLCAuYnRuLWxpZ2h0LmFjdGl2ZSwgLnNob3cgPiAuYnRuLWxpZ2h0LmRyb3Bkb3duLXRvZ2dsZSB7XG4gIGNvbG9yOiAjNDM1OTcxO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmNmZGZkO1xuICBib3JkZXItY29sb3I6ICNmY2ZkZmQ7XG59XG4uYnRuLWNoZWNrOmNoZWNrZWQgKyAuYnRuLWxpZ2h0OmZvY3VzLCAuYnRuLWNoZWNrOmFjdGl2ZSArIC5idG4tbGlnaHQ6Zm9jdXMsIC5idG4tbGlnaHQ6YWN0aXZlOmZvY3VzLCAuYnRuLWxpZ2h0LmFjdGl2ZTpmb2N1cywgLnNob3cgPiAuYnRuLWxpZ2h0LmRyb3Bkb3duLXRvZ2dsZTpmb2N1cyB7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG59XG4uYnRuLWxpZ2h0LmRpc2FibGVkLCAuYnRuLWxpZ2h0OmRpc2FibGVkIHtcbiAgYm94LXNoYWRvdzogbm9uZTtcbn1cblxuLmJ0bi1vdXRsaW5lLWxpZ2h0IHtcbiAgY29sb3I6ICNmY2ZkZmQ7XG4gIGJvcmRlci1jb2xvcjogI2ZjZmRmZDtcbiAgYmFja2dyb3VuZDogdHJhbnNwYXJlbnQ7XG59XG4uYnRuLW91dGxpbmUtbGlnaHQ6aG92ZXIge1xuICBjb2xvcjogIzQzNTk3MTtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZjZmRmZDtcbiAgYm9yZGVyLWNvbG9yOiAjZmNmZGZkO1xuICBib3gtc2hhZG93OiAwIDAuMTI1cmVtIDAuMjVyZW0gMCByZ2JhKDI1MiwgMjUzLCAyNTMsIDAuNCk7XG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlWSgtMXB4KTtcbn1cbi5idG4tY2hlY2s6Zm9jdXMgKyAuYnRuLW91dGxpbmUtbGlnaHQsIC5idG4tb3V0bGluZS1saWdodDpmb2N1cyB7XG4gIGNvbG9yOiAjNDM1OTcxO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmNmZGZkO1xuICBib3JkZXItY29sb3I6ICNmY2ZkZmQ7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlWSgwKTtcbn1cbi5idG4tY2hlY2s6Y2hlY2tlZCArIC5idG4tb3V0bGluZS1saWdodCwgLmJ0bi1jaGVjazphY3RpdmUgKyAuYnRuLW91dGxpbmUtbGlnaHQsIC5idG4tb3V0bGluZS1saWdodDphY3RpdmUsIC5idG4tb3V0bGluZS1saWdodC5hY3RpdmUsIC5idG4tb3V0bGluZS1saWdodC5kcm9wZG93bi10b2dnbGUuc2hvdyB7XG4gIGNvbG9yOiAjNDM1OTcxO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmNmZGZkO1xuICBib3JkZXItY29sb3I6ICNmY2ZkZmQ7XG59XG4uYnRuLWNoZWNrOmNoZWNrZWQgKyAuYnRuLW91dGxpbmUtbGlnaHQ6Zm9jdXMsIC5idG4tY2hlY2s6YWN0aXZlICsgLmJ0bi1vdXRsaW5lLWxpZ2h0OmZvY3VzLCAuYnRuLW91dGxpbmUtbGlnaHQ6YWN0aXZlOmZvY3VzLCAuYnRuLW91dGxpbmUtbGlnaHQuYWN0aXZlOmZvY3VzLCAuYnRuLW91dGxpbmUtbGlnaHQuZHJvcGRvd24tdG9nZ2xlLnNob3c6Zm9jdXMge1xuICBib3gtc2hhZG93OiBub25lO1xufVxuLmJ0bi1vdXRsaW5lLWxpZ2h0LmRpc2FibGVkLCAuYnRuLW91dGxpbmUtbGlnaHQ6ZGlzYWJsZWQge1xuICBib3gtc2hhZG93OiBub25lO1xufVxuXG4uYnRuLW91dGxpbmUtbGlnaHQgLmJhZGdlIHtcbiAgYmFja2dyb3VuZDogI2ZjZmRmZDtcbiAgYm9yZGVyLWNvbG9yOiAjZmNmZGZkO1xuICBjb2xvcjogIzQzNTk3MTtcbn1cblxuLmJ0bi1vdXRsaW5lLWxpZ2h0OmhvdmVyIC5iYWRnZSxcbi5idG4tb3V0bGluZS1saWdodDpmb2N1czpob3ZlciAuYmFkZ2UsXG4uYnRuLW91dGxpbmUtbGlnaHQ6YWN0aXZlIC5iYWRnZSxcbi5idG4tb3V0bGluZS1saWdodC5hY3RpdmUgLmJhZGdlLFxuLnNob3cgPiAuYnRuLW91dGxpbmUtbGlnaHQuZHJvcGRvd24tdG9nZ2xlIC5iYWRnZSB7XG4gIGJhY2tncm91bmQ6ICM0MzU5NzE7XG4gIGJvcmRlci1jb2xvcjogIzQzNTk3MTtcbiAgY29sb3I6ICNmY2ZkZmQ7XG59XG5cbi5idG4tZGFyayB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMjMzNDQ2O1xuICBib3JkZXItY29sb3I6ICMyMzM0NDY7XG4gIGJveC1zaGFkb3c6IDAgMC4xMjVyZW0gMC4yNXJlbSAwIHJnYmEoMzUsIDUyLCA3MCwgMC40KTtcbn1cbi5idG4tZGFyazpob3ZlciB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMjAyZjNmO1xuICBib3JkZXItY29sb3I6ICMyMDJmM2Y7XG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlWSgtMXB4KTtcbn1cbi5idG4tY2hlY2s6Zm9jdXMgKyAuYnRuLWRhcmssIC5idG4tZGFyazpmb2N1cywgLmJ0bi1kYXJrLmZvY3VzIHtcbiAgY29sb3I6ICNmZmY7XG4gIGJhY2tncm91bmQtY29sb3I6ICMyMDJmM2Y7XG4gIGJvcmRlci1jb2xvcjogIzIwMmYzZjtcbiAgdHJhbnNmb3JtOiB0cmFuc2xhdGVZKDApO1xuICBib3gtc2hhZG93OiBub25lO1xufVxuLmJ0bi1jaGVjazpjaGVja2VkICsgLmJ0bi1kYXJrLCAuYnRuLWNoZWNrOmFjdGl2ZSArIC5idG4tZGFyaywgLmJ0bi1kYXJrOmFjdGl2ZSwgLmJ0bi1kYXJrLmFjdGl2ZSwgLnNob3cgPiAuYnRuLWRhcmsuZHJvcGRvd24tdG9nZ2xlIHtcbiAgY29sb3I6ICNmZmY7XG4gIGJhY2tncm91bmQtY29sb3I6ICMxZTJjM2M7XG4gIGJvcmRlci1jb2xvcjogIzFlMmMzYztcbn1cbi5idG4tY2hlY2s6Y2hlY2tlZCArIC5idG4tZGFyazpmb2N1cywgLmJ0bi1jaGVjazphY3RpdmUgKyAuYnRuLWRhcms6Zm9jdXMsIC5idG4tZGFyazphY3RpdmU6Zm9jdXMsIC5idG4tZGFyay5hY3RpdmU6Zm9jdXMsIC5zaG93ID4gLmJ0bi1kYXJrLmRyb3Bkb3duLXRvZ2dsZTpmb2N1cyB7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG59XG4uYnRuLWRhcmsuZGlzYWJsZWQsIC5idG4tZGFyazpkaXNhYmxlZCB7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG59XG5cbi5idG4tb3V0bGluZS1kYXJrIHtcbiAgY29sb3I6ICMyMzM0NDY7XG4gIGJvcmRlci1jb2xvcjogIzIzMzQ0NjtcbiAgYmFja2dyb3VuZDogdHJhbnNwYXJlbnQ7XG59XG4uYnRuLW91dGxpbmUtZGFyazpob3ZlciB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMjAyZjNmO1xuICBib3JkZXItY29sb3I6ICMyMDJmM2Y7XG4gIGJveC1zaGFkb3c6IDAgMC4xMjVyZW0gMC4yNXJlbSAwIHJnYmEoMzUsIDUyLCA3MCwgMC40KTtcbiAgdHJhbnNmb3JtOiB0cmFuc2xhdGVZKC0xcHgpO1xufVxuLmJ0bi1jaGVjazpmb2N1cyArIC5idG4tb3V0bGluZS1kYXJrLCAuYnRuLW91dGxpbmUtZGFyazpmb2N1cyB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMjAyZjNmO1xuICBib3JkZXItY29sb3I6ICMyMDJmM2Y7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlWSgwKTtcbn1cbi5idG4tY2hlY2s6Y2hlY2tlZCArIC5idG4tb3V0bGluZS1kYXJrLCAuYnRuLWNoZWNrOmFjdGl2ZSArIC5idG4tb3V0bGluZS1kYXJrLCAuYnRuLW91dGxpbmUtZGFyazphY3RpdmUsIC5idG4tb3V0bGluZS1kYXJrLmFjdGl2ZSwgLmJ0bi1vdXRsaW5lLWRhcmsuZHJvcGRvd24tdG9nZ2xlLnNob3cge1xuICBjb2xvcjogI2ZmZjtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzFlMmMzYztcbiAgYm9yZGVyLWNvbG9yOiAjMWUyYzNjO1xufVxuLmJ0bi1jaGVjazpjaGVja2VkICsgLmJ0bi1vdXRsaW5lLWRhcms6Zm9jdXMsIC5idG4tY2hlY2s6YWN0aXZlICsgLmJ0bi1vdXRsaW5lLWRhcms6Zm9jdXMsIC5idG4tb3V0bGluZS1kYXJrOmFjdGl2ZTpmb2N1cywgLmJ0bi1vdXRsaW5lLWRhcmsuYWN0aXZlOmZvY3VzLCAuYnRuLW91dGxpbmUtZGFyay5kcm9wZG93bi10b2dnbGUuc2hvdzpmb2N1cyB7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG59XG4uYnRuLW91dGxpbmUtZGFyay5kaXNhYmxlZCwgLmJ0bi1vdXRsaW5lLWRhcms6ZGlzYWJsZWQge1xuICBib3gtc2hhZG93OiBub25lO1xufVxuXG4uYnRuLW91dGxpbmUtZGFyayAuYmFkZ2Uge1xuICBiYWNrZ3JvdW5kOiAjMjMzNDQ2O1xuICBib3JkZXItY29sb3I6ICMyMzM0NDY7XG4gIGNvbG9yOiAjZmZmO1xufVxuXG4uYnRuLW91dGxpbmUtZGFyazpob3ZlciAuYmFkZ2UsXG4uYnRuLW91dGxpbmUtZGFyazpmb2N1czpob3ZlciAuYmFkZ2UsXG4uYnRuLW91dGxpbmUtZGFyazphY3RpdmUgLmJhZGdlLFxuLmJ0bi1vdXRsaW5lLWRhcmsuYWN0aXZlIC5iYWRnZSxcbi5zaG93ID4gLmJ0bi1vdXRsaW5lLWRhcmsuZHJvcGRvd24tdG9nZ2xlIC5iYWRnZSB7XG4gIGJhY2tncm91bmQ6ICNmZmY7XG4gIGJvcmRlci1jb2xvcjogI2ZmZjtcbiAgY29sb3I6ICMyMzM0NDY7XG59XG5cbi5idG4tZ3JheSB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjEpO1xuICBib3JkZXItY29sb3I6IHJnYmEoNjcsIDg5LCAxMTMsIDAuMSk7XG4gIGJveC1zaGFkb3c6IDAgMC4xMjVyZW0gMC4yNXJlbSAwIHJnYmEoNjcsIDg5LCAxMTMsIDAuNCk7XG59XG4uYnRuLWdyYXk6aG92ZXIge1xuICBjb2xvcjogI2ZmZjtcbiAgYmFja2dyb3VuZC1jb2xvcjogcmdiYSgyMiwgMjksIDM2LCAwLjE5KTtcbiAgYm9yZGVyLWNvbG9yOiByZ2JhKDIyLCAyOSwgMzYsIDAuMTkpO1xuICB0cmFuc2Zvcm06IHRyYW5zbGF0ZVkoLTFweCk7XG59XG4uYnRuLWNoZWNrOmZvY3VzICsgLmJ0bi1ncmF5LCAuYnRuLWdyYXk6Zm9jdXMsIC5idG4tZ3JheS5mb2N1cyB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2JhKDIyLCAyOSwgMzYsIDAuMTkpO1xuICBib3JkZXItY29sb3I6IHJnYmEoMjIsIDI5LCAzNiwgMC4xOSk7XG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlWSgwKTtcbiAgYm94LXNoYWRvdzogbm9uZTtcbn1cbi5idG4tY2hlY2s6Y2hlY2tlZCArIC5idG4tZ3JheSwgLmJ0bi1jaGVjazphY3RpdmUgKyAuYnRuLWdyYXksIC5idG4tZ3JheTphY3RpdmUsIC5idG4tZ3JheS5hY3RpdmUsIC5zaG93ID4gLmJ0bi1ncmF5LmRyb3Bkb3duLXRvZ2dsZSB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2JhKDE1LCAyMCwgMjYsIDAuMjM1KTtcbiAgYm9yZGVyLWNvbG9yOiByZ2JhKDE1LCAyMCwgMjYsIDAuMjM1KTtcbn1cbi5idG4tY2hlY2s6Y2hlY2tlZCArIC5idG4tZ3JheTpmb2N1cywgLmJ0bi1jaGVjazphY3RpdmUgKyAuYnRuLWdyYXk6Zm9jdXMsIC5idG4tZ3JheTphY3RpdmU6Zm9jdXMsIC5idG4tZ3JheS5hY3RpdmU6Zm9jdXMsIC5zaG93ID4gLmJ0bi1ncmF5LmRyb3Bkb3duLXRvZ2dsZTpmb2N1cyB7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG59XG4uYnRuLWdyYXkuZGlzYWJsZWQsIC5idG4tZ3JheTpkaXNhYmxlZCB7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG59XG5cbi5idG4tb3V0bGluZS1ncmF5IHtcbiAgY29sb3I6IHJnYmEoNjcsIDg5LCAxMTMsIDAuMSk7XG4gIGJvcmRlci1jb2xvcjogcmdiYSg2NywgODksIDExMywgMC4xKTtcbiAgYmFja2dyb3VuZDogdHJhbnNwYXJlbnQ7XG59XG4uYnRuLW91dGxpbmUtZ3JheTpob3ZlciB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2JhKDIyLCAyOSwgMzYsIDAuMTkpO1xuICBib3JkZXItY29sb3I6IHJnYmEoMjIsIDI5LCAzNiwgMC4xOSk7XG4gIGJveC1zaGFkb3c6IDAgMC4xMjVyZW0gMC4yNXJlbSAwIHJnYmEoNjcsIDg5LCAxMTMsIDAuNCk7XG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlWSgtMXB4KTtcbn1cbi5idG4tY2hlY2s6Zm9jdXMgKyAuYnRuLW91dGxpbmUtZ3JheSwgLmJ0bi1vdXRsaW5lLWdyYXk6Zm9jdXMge1xuICBjb2xvcjogI2ZmZjtcbiAgYmFja2dyb3VuZC1jb2xvcjogcmdiYSgyMiwgMjksIDM2LCAwLjE5KTtcbiAgYm9yZGVyLWNvbG9yOiByZ2JhKDIyLCAyOSwgMzYsIDAuMTkpO1xuICBib3gtc2hhZG93OiBub25lO1xuICB0cmFuc2Zvcm06IHRyYW5zbGF0ZVkoMCk7XG59XG4uYnRuLWNoZWNrOmNoZWNrZWQgKyAuYnRuLW91dGxpbmUtZ3JheSwgLmJ0bi1jaGVjazphY3RpdmUgKyAuYnRuLW91dGxpbmUtZ3JheSwgLmJ0bi1vdXRsaW5lLWdyYXk6YWN0aXZlLCAuYnRuLW91dGxpbmUtZ3JheS5hY3RpdmUsIC5idG4tb3V0bGluZS1ncmF5LmRyb3Bkb3duLXRvZ2dsZS5zaG93IHtcbiAgY29sb3I6ICNmZmY7XG4gIGJhY2tncm91bmQtY29sb3I6IHJnYmEoMTUsIDIwLCAyNiwgMC4yMzUpO1xuICBib3JkZXItY29sb3I6IHJnYmEoMTUsIDIwLCAyNiwgMC4yMzUpO1xufVxuLmJ0bi1jaGVjazpjaGVja2VkICsgLmJ0bi1vdXRsaW5lLWdyYXk6Zm9jdXMsIC5idG4tY2hlY2s6YWN0aXZlICsgLmJ0bi1vdXRsaW5lLWdyYXk6Zm9jdXMsIC5idG4tb3V0bGluZS1ncmF5OmFjdGl2ZTpmb2N1cywgLmJ0bi1vdXRsaW5lLWdyYXkuYWN0aXZlOmZvY3VzLCAuYnRuLW91dGxpbmUtZ3JheS5kcm9wZG93bi10b2dnbGUuc2hvdzpmb2N1cyB7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG59XG4uYnRuLW91dGxpbmUtZ3JheS5kaXNhYmxlZCwgLmJ0bi1vdXRsaW5lLWdyYXk6ZGlzYWJsZWQge1xuICBib3gtc2hhZG93OiBub25lO1xufVxuXG4uYnRuLW91dGxpbmUtZ3JheSAuYmFkZ2Uge1xuICBiYWNrZ3JvdW5kOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjEpO1xuICBib3JkZXItY29sb3I6IHJnYmEoNjcsIDg5LCAxMTMsIDAuMSk7XG4gIGNvbG9yOiAjZmZmO1xufVxuXG4uYnRuLW91dGxpbmUtZ3JheTpob3ZlciAuYmFkZ2UsXG4uYnRuLW91dGxpbmUtZ3JheTpmb2N1czpob3ZlciAuYmFkZ2UsXG4uYnRuLW91dGxpbmUtZ3JheTphY3RpdmUgLmJhZGdlLFxuLmJ0bi1vdXRsaW5lLWdyYXkuYWN0aXZlIC5iYWRnZSxcbi5zaG93ID4gLmJ0bi1vdXRsaW5lLWdyYXkuZHJvcGRvd24tdG9nZ2xlIC5iYWRnZSB7XG4gIGJhY2tncm91bmQ6ICNmZmY7XG4gIGJvcmRlci1jb2xvcjogI2ZmZjtcbiAgY29sb3I6ICM0MzU5NzE7XG59XG5cbi5idG4taWNvbiB7XG4gIHBhZGRpbmc6IDA7XG4gIHdpZHRoOiBjYWxjKDIuMzA5Mzc1cmVtICsgMnB4KTtcbiAgaGVpZ2h0OiBjYWxjKDIuMzA5Mzc1cmVtICsgMnB4KTtcbiAgZGlzcGxheTogaW5saW5lLWZsZXg7XG4gIGZsZXgtc2hyaW5rOiAwO1xuICBqdXN0aWZ5LWNvbnRlbnQ6IGNlbnRlcjtcbiAgYWxpZ24taXRlbXM6IGNlbnRlcjtcbn1cbi5idG4taWNvbi5idG4teGwsIC5idG4tZ3JvdXAteGwgPiAuYnRuLWljb24uYnRuIHtcbiAgd2lkdGg6IGNhbGMoMy42MjVyZW0gKyAycHgpO1xuICBoZWlnaHQ6IGNhbGMoMy42MjVyZW0gKyAycHgpO1xufVxuLmJ0bi1pY29uLmJ0bi14bCA+IHNwYW4sIC5idG4tZ3JvdXAteGwgPiAuYnRuLWljb24uYnRuID4gc3BhbiB7XG4gIGZvbnQtc2l6ZTogMS4yNXJlbTtcbn1cbi5idG4taWNvbi5idG4tbGcsIC5idG4tZ3JvdXAtbGcgPiAuYnRuLWljb24uYnRuIHtcbiAgd2lkdGg6IGNhbGMoM3JlbSArIDJweCk7XG4gIGhlaWdodDogY2FsYygzcmVtICsgMnB4KTtcbiAgZm9udC1zaXplOiAxcmVtO1xufVxuLmJ0bi1pY29uLmJ0bi1zbSwgLmJ0bi1ncm91cC1zbSA+IC5idG4taWNvbi5idG4ge1xuICB3aWR0aDogY2FsYygxLjYyNXJlbSArIDJweCk7XG4gIGhlaWdodDogY2FsYygxLjYyNXJlbSArIDJweCk7XG4gIGZvbnQtc2l6ZTogMC43NXJlbTtcbn1cbi5idG4taWNvbi5idG4teHMsIC5idG4tZ3JvdXAteHMgPiAuYnRuLWljb24uYnRuIHtcbiAgd2lkdGg6IGNhbGMoMS4xMjVyZW0gKyAycHgpO1xuICBoZWlnaHQ6IGNhbGMoMS4xMjVyZW0gKyAycHgpO1xuICBmb250LXNpemU6IDAuNzVyZW07XG59XG5cbi5idG4uYm9yZGVybGVzczpub3QoLmFjdGl2ZSk6bm90KDphY3RpdmUpOm5vdCg6aG92ZXIpOm5vdCg6Zm9jdXMpLCA6bm90KC5zaG93KSA+IC5idG4uYm9yZGVybGVzcy5kcm9wZG93bi10b2dnbGU6bm90KDpob3Zlcik6bm90KDpmb2N1cykge1xuICBib3JkZXItY29sb3I6IHRyYW5zcGFyZW50O1xuICBib3gtc2hhZG93OiBub25lO1xufVxuXG4uYnRuLmJ0bi1saW5rIHtcbiAgZm9udC1zaXplOiBpbmhlcml0O1xufVxuXG4uYnRuLXBpbm5lZCB7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgdG9wOiAwLjc1cmVtO1xuICByaWdodDogMC43NXJlbTtcbn1cblxuYnV0dG9uOmZvY3VzIHtcbiAgb3V0bGluZTogbm9uZTtcbn1cblxuLmRyb3Bkb3duLXRvZ2dsZS1zcGxpdCxcbi5idG4tbGcgKyAuZHJvcGRvd24tdG9nZ2xlLXNwbGl0LFxuLmJ0bi1ncm91cC1sZyA+IC5idG4gKyAuZHJvcGRvd24tdG9nZ2xlLXNwbGl0LFxuLmlucHV0LWdyb3VwLWxnIC5idG4gKyAuZHJvcGRvd24tdG9nZ2xlLXNwbGl0LFxuLmJ0bi14bCArIC5kcm9wZG93bi10b2dnbGUtc3BsaXQsXG4uYnRuLWdyb3VwLXhsID4gLmJ0biArIC5kcm9wZG93bi10b2dnbGUtc3BsaXQge1xuICBwYWRkaW5nLXJpZ2h0OiAwLjdlbTtcbiAgcGFkZGluZy1sZWZ0OiAwLjdlbTtcbn1cblxuLmJ0bi1zbSArIC5kcm9wZG93bi10b2dnbGUtc3BsaXQsXG4uYnRuLWdyb3VwLXNtID4gLmJ0biArIC5kcm9wZG93bi10b2dnbGUtc3BsaXQsXG4uaW5wdXQtZ3JvdXAtc20gLmJ0biArIC5kcm9wZG93bi10b2dnbGUtc3BsaXQge1xuICBwYWRkaW5nLXJpZ2h0OiAwLjZlbTtcbiAgcGFkZGluZy1sZWZ0OiAwLjZlbTtcbn1cblxuLmJ0bi14cyArIC5kcm9wZG93bi10b2dnbGUtc3BsaXQsXG4uYnRuLWdyb3VwLXhzID4gLmJ0biArIC5kcm9wZG93bi10b2dnbGUtc3BsaXQge1xuICBwYWRkaW5nLXJpZ2h0OiAwLjVlbTtcbiAgcGFkZGluZy1sZWZ0OiAwLjVlbTtcbn1cblxuLmJ0bi1ncm91cCA+IC5idG4tZ3JvdXA6Zmlyc3QtY2hpbGQgPiAuYnRuOm5vdChbY2xhc3MqPWJ0bi1vdXRsaW5lLV0pOmZpcnN0LWNoaWxkLFxuLmlucHV0LWdyb3VwID4gLmJ0bjpub3QoW2NsYXNzKj1idG4tb3V0bGluZS1dKTpmaXJzdC1jaGlsZCxcbjpub3QoLmJ0bi1ncm91cCk6bm90KC5pbnB1dC1ncm91cCkgPiAuYnRuLWdyb3VwID4gLmJ0bjpub3QoW2NsYXNzKj1idG4tb3V0bGluZS1dKTpmaXJzdC1jaGlsZCxcbi5pbnB1dC1ncm91cCA+IC5idG4tZ3JvdXA6Zmlyc3QtY2hpbGQgPiAuYnRuOm5vdChbY2xhc3MqPWJ0bi1vdXRsaW5lLV0pOmZpcnN0LWNoaWxkIHtcbiAgYm9yZGVyLWxlZnQtY29sb3I6IHRyYW5zcGFyZW50O1xufVxuXG4uYnRuLWdyb3VwID4gLmJ0bi1ncm91cDpsYXN0LWNoaWxkID4gLmJ0bjpub3QoW2NsYXNzKj1idG4tb3V0bGluZS1dKTpsYXN0LW9mLXR5cGUsXG4uaW5wdXQtZ3JvdXAgPiAuYnRuOm5vdChbY2xhc3MqPWJ0bi1vdXRsaW5lLV0pOmxhc3Qtb2YtdHlwZSxcbjpub3QoLmJ0bi1ncm91cCk6bm90KC5pbnB1dC1ncm91cCkgPiAuYnRuLWdyb3VwID4gLmJ0bjpub3QoW2NsYXNzKj1idG4tb3V0bGluZS1dKTpsYXN0LW9mLXR5cGUsXG4uaW5wdXQtZ3JvdXAgPiAuYnRuLWdyb3VwOmxhc3QtY2hpbGQgPiAuYnRuOm5vdChbY2xhc3MqPWJ0bi1vdXRsaW5lLV0pOmxhc3Qtb2YtdHlwZSB7XG4gIGJvcmRlci1yaWdodC1jb2xvcjogdHJhbnNwYXJlbnQ7XG59XG5cbi5iYWRnZSB7XG4gIHRleHQtdHJhbnNmb3JtOiB1cHBlcmNhc2U7XG4gIGxpbmUtaGVpZ2h0OiAwLjc1O1xufVxuXG4uYmFkZ2UtY2VudGVyIHtcbiAgZGlzcGxheTogaW5saW5lLWZsZXg7XG4gIGp1c3RpZnktY29udGVudDogY2VudGVyO1xuICBhbGlnbi1pdGVtczogY2VudGVyO1xuICBoZWlnaHQ6IDEuNXJlbTtcbiAgd2lkdGg6IDEuNXJlbTtcbiAgZm9udC1zaXplOiAwLjgxMjVlbTtcbn1cbi5iYWRnZS1jZW50ZXIgaSB7XG4gIGZvbnQtc2l6ZTogMC44cmVtO1xufVxuXG5bZGF0YS10cmlnZ2VyPWhvdmVyXSB7XG4gIG91dGxpbmU6IDA7XG59XG5cbi5kcm9wZG93bi1tZW51IHtcbiAgbWFyZ2luOiAwLjEyNXJlbSAwO1xuICBib3gtc2hhZG93OiAwIDAuMjVyZW0gMXJlbSByZ2JhKDE2MSwgMTcyLCAxODQsIDAuNDUpO1xuICBhbmltYXRpb246IGRyb3Bkb3duQW5pbWF0aW9uIDAuMXM7XG59XG4ubWVnYS1kcm9wZG93biA+IC5kcm9wZG93bi1tZW51IHtcbiAgbGVmdDogMCAhaW1wb3J0YW50O1xuICByaWdodDogMCAhaW1wb3J0YW50O1xufVxuLmRyb3Bkb3duLW1lbnUgLmJhZGdlW2NsYXNzXj1mbG9hdC1dLFxuLmRyb3Bkb3duLW1lbnUgLmJhZGdlW2NsYXNzKj1cIiBmbG9hdC1cIl0ge1xuICBwb3NpdGlvbjogcmVsYXRpdmU7XG4gIHRvcDogMC4wNzFlbTtcbn1cblxuLmRyb3Bkb3duLWl0ZW0ge1xuICBsaW5lLWhlaWdodDogMS41NDtcbn1cblxuLmRyb3Bkb3duLXRvZ2dsZS5oaWRlLWFycm93OjpiZWZvcmUsIC5kcm9wZG93bi10b2dnbGUuaGlkZS1hcnJvdzo6YWZ0ZXIsXG4uZHJvcGRvd24tdG9nZ2xlLWhpZGUtYXJyb3cgPiAuZHJvcGRvd24tdG9nZ2xlOjpiZWZvcmUsXG4uZHJvcGRvd24tdG9nZ2xlLWhpZGUtYXJyb3cgPiAuZHJvcGRvd24tdG9nZ2xlOjphZnRlciB7XG4gIGRpc3BsYXk6IG5vbmU7XG59XG5cbi5kcm9wZG93bi10b2dnbGU6OmFmdGVyIHtcbiAgbWFyZ2luLXRvcDogLTAuMjhlbTtcbiAgd2lkdGg6IDAuNDJlbTtcbiAgaGVpZ2h0OiAwLjQyZW07XG4gIGJvcmRlcjogMXB4IHNvbGlkO1xuICBib3JkZXItdG9wOiAwO1xuICBib3JkZXItbGVmdDogMDtcbiAgdHJhbnNmb3JtOiByb3RhdGUoNDVkZWcpO1xufVxuXG4uZHJvcGVuZCAuZHJvcGRvd24tdG9nZ2xlOjphZnRlciB7XG4gIG1hcmdpbi10b3A6IC0wLjE2OGVtO1xuICB3aWR0aDogMC40MmVtO1xuICBoZWlnaHQ6IDAuNDJlbTtcbiAgYm9yZGVyOiAxcHggc29saWQ7XG4gIGJvcmRlci10b3A6IDA7XG4gIGJvcmRlci1sZWZ0OiAwO1xuICB0cmFuc2Zvcm06IHJvdGF0ZSgtNDVkZWcpO1xufVxuXG4uZHJvcHN0YXJ0IC5kcm9wZG93bi10b2dnbGU6OmJlZm9yZSB7XG4gIG1hcmdpbi10b3A6IC0wLjE2OGVtO1xuICB3aWR0aDogMC40MmVtO1xuICBoZWlnaHQ6IDAuNDJlbTtcbiAgYm9yZGVyOiAxcHggc29saWQ7XG4gIGJvcmRlci10b3A6IDA7XG4gIGJvcmRlci1yaWdodDogMDtcbiAgdHJhbnNmb3JtOiByb3RhdGUoNDVkZWcpO1xufVxuXG4uZHJvcHVwIC5kcm9wZG93bi10b2dnbGU6OmFmdGVyIHtcbiAgbWFyZ2luLXRvcDogMDtcbiAgd2lkdGg6IDAuNDJlbTtcbiAgaGVpZ2h0OiAwLjQyZW07XG4gIGJvcmRlcjogMXB4IHNvbGlkO1xuICBib3JkZXItYm90dG9tOiAwO1xuICBib3JkZXItbGVmdDogMDtcbiAgdHJhbnNmb3JtOiByb3RhdGUoLTQ1ZGVnKTtcbn1cblxuLmRyb3BzdGFydCAuZHJvcGRvd24tdG9nZ2xlOjpiZWZvcmUsXG4uZHJvcGVuZCAuZHJvcGRvd24tdG9nZ2xlOjphZnRlciB7XG4gIHZlcnRpY2FsLWFsaWduOiBtaWRkbGU7XG59XG5cbi5uYXYgLm5hdi1pdGVtLFxuLm5hdiAubmF2LWxpbmssXG4udGFiLXBhbmUsXG4udGFiLXBhbmUgLmNhcmQtYm9keSB7XG4gIG91dGxpbmU6IG5vbmUgIWltcG9ydGFudDtcbn1cblxuLm5hdi10YWJzIC5uYXYtaXRlbSAubmF2LWxpbmsge1xuICBjb2xvcjogIzU2NmE3ZjtcbiAgYm9yZGVyOiAwO1xuICBib3JkZXItcmFkaXVzOiAwO1xufVxuLm5hdi10YWJzIC5uYXYtaXRlbSAubmF2LWxpbms6aG92ZXIsIC5uYXYtdGFicyAubmF2LWl0ZW0gLm5hdi1saW5rOmZvY3VzIHtcbiAgY29sb3I6ICM1NjZhN2Y7XG59XG4ubmF2LXRhYnMgLm5hdi1pdGVtIC5uYXYtbGluazpub3QoLmFjdGl2ZSkge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZWNlZWYxO1xufVxuLm5hdi10YWJzIC5uYXYtaXRlbSAubmF2LWxpbmsuZGlzYWJsZWQge1xuICBjb2xvcjogI2M3Y2RkNDtcbn1cblxuLm5hdi10YWJzOm5vdCgubmF2LWZpbGwpOm5vdCgubmF2LWp1c3RpZmllZCkgLm5hdi1saW5rLFxuLm5hdi1waWxsczpub3QoLm5hdi1maWxsKTpub3QoLm5hdi1qdXN0aWZpZWQpIC5uYXYtbGluayB7XG4gIHdpZHRoOiAxMDAlO1xufVxuXG4ubmF2LXBpbGxzIC5uYXYtbGluazpub3QoLmFjdGl2ZSwgLmRpc2FibGVkKSB7XG4gIGNvbG9yOiAjNTY2YTdmO1xufVxuXG4udGFiLWNvbnRlbnQge1xuICBwYWRkaW5nOiAxLjVyZW07XG4gIGJvcmRlci1yYWRpdXM6IDAuMzc1cmVtO1xufVxuXG4ubmF2LXNjcm9sbGFibGUge1xuICBkaXNwbGF5OiAtd2Via2l0LWlubGluZS1ib3g7XG4gIGRpc3BsYXk6IC1tb3otaW5saW5lLWJveDtcbiAgd2lkdGg6IDEwMCU7XG4gIG92ZXJmbG93LXk6IGF1dG87XG4gIGZsZXgtd3JhcDogbm93cmFwO1xufVxuXG4ubmF2LXRhYnMgLm5hdi1saW5rIHtcbiAgYmFja2dyb3VuZC1jbGlwOiBwYWRkaW5nLWJveDtcbn1cbi5uYXYtdGFicyAubmF2LWxpbmsuYWN0aXZlIHtcbiAgYm9yZGVyLWJvdHRvbS1jb2xvcjogI2ZmZjtcbn1cbi5uYXYtdGFicyAubmF2LWxpbmsuYWN0aXZlOmhvdmVyLCAubmF2LXRhYnMgLm5hdi1saW5rLmFjdGl2ZTpmb2N1cyB7XG4gIGJvcmRlci1ib3R0b20tY29sb3I6ICNmZmY7XG59XG4ubmF2LXRhYnMgLm5hdi1saW5rOmhvdmVyLCAubmF2LXRhYnMgLm5hdi1saW5rOmZvY3VzIHtcbiAgYm9yZGVyLWJvdHRvbS1jb2xvcjogdHJhbnNwYXJlbnQ7XG59XG5cbi5uYXYtc20gPiAubmF2IC5uYXYtbGluaywgLm5hdi1zbS5uYXYgLm5hdi1saW5rIHtcbiAgcGFkZGluZzogMC4zMTI1cmVtIDAuODc1cmVtO1xuICBmb250LXNpemU6IDAuNzVyZW07XG4gIGxpbmUtaGVpZ2h0OiAxLjU7XG59XG5cbi5uYXYtbGcgPiAubmF2IC5uYXYtbGluaywgLm5hdi1sZy5uYXYgLm5hdi1saW5rIHtcbiAgcGFkZGluZzogMC44NzVyZW0gMS4zMTI1cmVtO1xuICBmb250LXNpemU6IDFyZW07XG4gIGxpbmUtaGVpZ2h0OiAxLjU7XG59XG5cbi5uYXYtYWxpZ24tdG9wLFxuLm5hdi1hbGlnbi1yaWdodCxcbi5uYXYtYWxpZ24tYm90dG9tLFxuLm5hdi1hbGlnbi1sZWZ0IHtcbiAgZGlzcGxheTogZmxleDtcbn1cbi5uYXYtYWxpZ24tdG9wID4gLm5hdixcbi5uYXYtYWxpZ24tdG9wID4gZGl2ID4gLm5hdixcbi5uYXYtYWxpZ24tcmlnaHQgPiAubmF2LFxuLm5hdi1hbGlnbi1yaWdodCA+IGRpdiA+IC5uYXYsXG4ubmF2LWFsaWduLWJvdHRvbSA+IC5uYXYsXG4ubmF2LWFsaWduLWJvdHRvbSA+IGRpdiA+IC5uYXYsXG4ubmF2LWFsaWduLWxlZnQgPiAubmF2LFxuLm5hdi1hbGlnbi1sZWZ0ID4gZGl2ID4gLm5hdiB7XG4gIGJvcmRlcjogMDtcbiAgei1pbmRleDogMTtcbiAgcG9zaXRpb246IHJlbGF0aXZlO1xufVxuLm5hdi1hbGlnbi10b3AgPiAubmF2IC5uYXYtbGluazpob3ZlciwgLm5hdi1hbGlnbi10b3AgPiAubmF2IC5uYXYtbGluazpmb2N1cyxcbi5uYXYtYWxpZ24tdG9wID4gZGl2ID4gLm5hdiAubmF2LWxpbms6aG92ZXIsXG4ubmF2LWFsaWduLXRvcCA+IGRpdiA+IC5uYXYgLm5hdi1saW5rOmZvY3VzLFxuLm5hdi1hbGlnbi1yaWdodCA+IC5uYXYgLm5hdi1saW5rOmhvdmVyLFxuLm5hdi1hbGlnbi1yaWdodCA+IC5uYXYgLm5hdi1saW5rOmZvY3VzLFxuLm5hdi1hbGlnbi1yaWdodCA+IGRpdiA+IC5uYXYgLm5hdi1saW5rOmhvdmVyLFxuLm5hdi1hbGlnbi1yaWdodCA+IGRpdiA+IC5uYXYgLm5hdi1saW5rOmZvY3VzLFxuLm5hdi1hbGlnbi1ib3R0b20gPiAubmF2IC5uYXYtbGluazpob3Zlcixcbi5uYXYtYWxpZ24tYm90dG9tID4gLm5hdiAubmF2LWxpbms6Zm9jdXMsXG4ubmF2LWFsaWduLWJvdHRvbSA+IGRpdiA+IC5uYXYgLm5hdi1saW5rOmhvdmVyLFxuLm5hdi1hbGlnbi1ib3R0b20gPiBkaXYgPiAubmF2IC5uYXYtbGluazpmb2N1cyxcbi5uYXYtYWxpZ24tbGVmdCA+IC5uYXYgLm5hdi1saW5rOmhvdmVyLFxuLm5hdi1hbGlnbi1sZWZ0ID4gLm5hdiAubmF2LWxpbms6Zm9jdXMsXG4ubmF2LWFsaWduLWxlZnQgPiBkaXYgPiAubmF2IC5uYXYtbGluazpob3Zlcixcbi5uYXYtYWxpZ24tbGVmdCA+IGRpdiA+IC5uYXYgLm5hdi1saW5rOmZvY3VzIHtcbiAgaXNvbGF0aW9uOiBhdXRvO1xufVxuLm5hdi1hbGlnbi10b3AgLnJvdy1ib3JkZXJlZCA+IFtjbGFzc149Y29sLV06OmJlZm9yZSwgLm5hdi1hbGlnbi10b3AgLnJvdy1ib3JkZXJlZCA+IFtjbGFzc149Y29sLV06OmFmdGVyLFxuLm5hdi1hbGlnbi10b3AgLnJvdy1ib3JkZXJlZCA+IFtjbGFzcyo9XCIgY29sLVwiXTo6YmVmb3JlLFxuLm5hdi1hbGlnbi10b3AgLnJvdy1ib3JkZXJlZCA+IFtjbGFzcyo9XCIgY29sLVwiXTo6YWZ0ZXIsXG4ubmF2LWFsaWduLXRvcCAucm93LWJvcmRlcmVkID4gW2NsYXNzXj1cImNvbCBcIl06OmJlZm9yZSxcbi5uYXYtYWxpZ24tdG9wIC5yb3ctYm9yZGVyZWQgPiBbY2xhc3NePVwiY29sIFwiXTo6YWZ0ZXIsXG4ubmF2LWFsaWduLXRvcCAucm93LWJvcmRlcmVkID4gW2NsYXNzKj1cIiBjb2wgXCJdOjpiZWZvcmUsXG4ubmF2LWFsaWduLXRvcCAucm93LWJvcmRlcmVkID4gW2NsYXNzKj1cIiBjb2wgXCJdOjphZnRlcixcbi5uYXYtYWxpZ24tdG9wIC5yb3ctYm9yZGVyZWQgPiBbY2xhc3MkPVwiIGNvbFwiXTo6YmVmb3JlLFxuLm5hdi1hbGlnbi10b3AgLnJvdy1ib3JkZXJlZCA+IFtjbGFzcyQ9XCIgY29sXCJdOjphZnRlcixcbi5uYXYtYWxpZ24tdG9wIC5yb3ctYm9yZGVyZWQgPiBbY2xhc3M9Y29sXTo6YmVmb3JlLFxuLm5hdi1hbGlnbi10b3AgLnJvdy1ib3JkZXJlZCA+IFtjbGFzcz1jb2xdOjphZnRlcixcbi5uYXYtYWxpZ24tcmlnaHQgLnJvdy1ib3JkZXJlZCA+IFtjbGFzc149Y29sLV06OmJlZm9yZSxcbi5uYXYtYWxpZ24tcmlnaHQgLnJvdy1ib3JkZXJlZCA+IFtjbGFzc149Y29sLV06OmFmdGVyLFxuLm5hdi1hbGlnbi1yaWdodCAucm93LWJvcmRlcmVkID4gW2NsYXNzKj1cIiBjb2wtXCJdOjpiZWZvcmUsXG4ubmF2LWFsaWduLXJpZ2h0IC5yb3ctYm9yZGVyZWQgPiBbY2xhc3MqPVwiIGNvbC1cIl06OmFmdGVyLFxuLm5hdi1hbGlnbi1yaWdodCAucm93LWJvcmRlcmVkID4gW2NsYXNzXj1cImNvbCBcIl06OmJlZm9yZSxcbi5uYXYtYWxpZ24tcmlnaHQgLnJvdy1ib3JkZXJlZCA+IFtjbGFzc149XCJjb2wgXCJdOjphZnRlcixcbi5uYXYtYWxpZ24tcmlnaHQgLnJvdy1ib3JkZXJlZCA+IFtjbGFzcyo9XCIgY29sIFwiXTo6YmVmb3JlLFxuLm5hdi1hbGlnbi1yaWdodCAucm93LWJvcmRlcmVkID4gW2NsYXNzKj1cIiBjb2wgXCJdOjphZnRlcixcbi5uYXYtYWxpZ24tcmlnaHQgLnJvdy1ib3JkZXJlZCA+IFtjbGFzcyQ9XCIgY29sXCJdOjpiZWZvcmUsXG4ubmF2LWFsaWduLXJpZ2h0IC5yb3ctYm9yZGVyZWQgPiBbY2xhc3MkPVwiIGNvbFwiXTo6YWZ0ZXIsXG4ubmF2LWFsaWduLXJpZ2h0IC5yb3ctYm9yZGVyZWQgPiBbY2xhc3M9Y29sXTo6YmVmb3JlLFxuLm5hdi1hbGlnbi1yaWdodCAucm93LWJvcmRlcmVkID4gW2NsYXNzPWNvbF06OmFmdGVyLFxuLm5hdi1hbGlnbi1ib3R0b20gLnJvdy1ib3JkZXJlZCA+IFtjbGFzc149Y29sLV06OmJlZm9yZSxcbi5uYXYtYWxpZ24tYm90dG9tIC5yb3ctYm9yZGVyZWQgPiBbY2xhc3NePWNvbC1dOjphZnRlcixcbi5uYXYtYWxpZ24tYm90dG9tIC5yb3ctYm9yZGVyZWQgPiBbY2xhc3MqPVwiIGNvbC1cIl06OmJlZm9yZSxcbi5uYXYtYWxpZ24tYm90dG9tIC5yb3ctYm9yZGVyZWQgPiBbY2xhc3MqPVwiIGNvbC1cIl06OmFmdGVyLFxuLm5hdi1hbGlnbi1ib3R0b20gLnJvdy1ib3JkZXJlZCA+IFtjbGFzc149XCJjb2wgXCJdOjpiZWZvcmUsXG4ubmF2LWFsaWduLWJvdHRvbSAucm93LWJvcmRlcmVkID4gW2NsYXNzXj1cImNvbCBcIl06OmFmdGVyLFxuLm5hdi1hbGlnbi1ib3R0b20gLnJvdy1ib3JkZXJlZCA+IFtjbGFzcyo9XCIgY29sIFwiXTo6YmVmb3JlLFxuLm5hdi1hbGlnbi1ib3R0b20gLnJvdy1ib3JkZXJlZCA+IFtjbGFzcyo9XCIgY29sIFwiXTo6YWZ0ZXIsXG4ubmF2LWFsaWduLWJvdHRvbSAucm93LWJvcmRlcmVkID4gW2NsYXNzJD1cIiBjb2xcIl06OmJlZm9yZSxcbi5uYXYtYWxpZ24tYm90dG9tIC5yb3ctYm9yZGVyZWQgPiBbY2xhc3MkPVwiIGNvbFwiXTo6YWZ0ZXIsXG4ubmF2LWFsaWduLWJvdHRvbSAucm93LWJvcmRlcmVkID4gW2NsYXNzPWNvbF06OmJlZm9yZSxcbi5uYXYtYWxpZ24tYm90dG9tIC5yb3ctYm9yZGVyZWQgPiBbY2xhc3M9Y29sXTo6YWZ0ZXIsXG4ubmF2LWFsaWduLWxlZnQgLnJvdy1ib3JkZXJlZCA+IFtjbGFzc149Y29sLV06OmJlZm9yZSxcbi5uYXYtYWxpZ24tbGVmdCAucm93LWJvcmRlcmVkID4gW2NsYXNzXj1jb2wtXTo6YWZ0ZXIsXG4ubmF2LWFsaWduLWxlZnQgLnJvdy1ib3JkZXJlZCA+IFtjbGFzcyo9XCIgY29sLVwiXTo6YmVmb3JlLFxuLm5hdi1hbGlnbi1sZWZ0IC5yb3ctYm9yZGVyZWQgPiBbY2xhc3MqPVwiIGNvbC1cIl06OmFmdGVyLFxuLm5hdi1hbGlnbi1sZWZ0IC5yb3ctYm9yZGVyZWQgPiBbY2xhc3NePVwiY29sIFwiXTo6YmVmb3JlLFxuLm5hdi1hbGlnbi1sZWZ0IC5yb3ctYm9yZGVyZWQgPiBbY2xhc3NePVwiY29sIFwiXTo6YWZ0ZXIsXG4ubmF2LWFsaWduLWxlZnQgLnJvdy1ib3JkZXJlZCA+IFtjbGFzcyo9XCIgY29sIFwiXTo6YmVmb3JlLFxuLm5hdi1hbGlnbi1sZWZ0IC5yb3ctYm9yZGVyZWQgPiBbY2xhc3MqPVwiIGNvbCBcIl06OmFmdGVyLFxuLm5hdi1hbGlnbi1sZWZ0IC5yb3ctYm9yZGVyZWQgPiBbY2xhc3MkPVwiIGNvbFwiXTo6YmVmb3JlLFxuLm5hdi1hbGlnbi1sZWZ0IC5yb3ctYm9yZGVyZWQgPiBbY2xhc3MkPVwiIGNvbFwiXTo6YWZ0ZXIsXG4ubmF2LWFsaWduLWxlZnQgLnJvdy1ib3JkZXJlZCA+IFtjbGFzcz1jb2xdOjpiZWZvcmUsXG4ubmF2LWFsaWduLWxlZnQgLnJvdy1ib3JkZXJlZCA+IFtjbGFzcz1jb2xdOjphZnRlciB7XG4gIGJvcmRlci1jb2xvcjogI2Q5ZGVlMztcbn1cblxuLm5hdi1hbGlnbi1yaWdodCxcbi5uYXYtYWxpZ24tbGVmdCB7XG4gIGFsaWduLWl0ZW1zOiBzdHJldGNoO1xufVxuLm5hdi1hbGlnbi1yaWdodCA+IC5uYXYsXG4ubmF2LWFsaWduLXJpZ2h0ID4gZGl2ID4gLm5hdixcbi5uYXYtYWxpZ24tbGVmdCA+IC5uYXYsXG4ubmF2LWFsaWduLWxlZnQgPiBkaXYgPiAubmF2IHtcbiAgZmxleC1ncm93OiAwO1xuICBmbGV4LWRpcmVjdGlvbjogY29sdW1uO1xufVxuLm5hdi1hbGlnbi1yaWdodCA+IC50YWItY29udGVudCxcbi5uYXYtYWxpZ24tbGVmdCA+IC50YWItY29udGVudCB7XG4gIGZsZXgtZ3JvdzogMTtcbn1cblxuLm5hdi1hbGlnbi10b3Age1xuICBmbGV4LWRpcmVjdGlvbjogY29sdW1uO1xufVxuLm5hdi1hbGlnbi10b3AgLm5hdi10YWJzIH4gLnRhYi1jb250ZW50IHtcbiAgei1pbmRleDogMTtcbiAgYm94LXNoYWRvdzogMHB4IDZweCA3cHggLTFweCByZ2JhKDY3LCA4OSwgMTEzLCAwLjEyKTtcbn1cbi5uYXYtYWxpZ24tdG9wIC5uYXYtdGFicyAubmF2LWl0ZW06Zmlyc3QtY2hpbGQgLm5hdi1saW5rIHtcbiAgYm9yZGVyLXRvcC1sZWZ0LXJhZGl1czogMC4zNzVyZW07XG59XG4ubmF2LWFsaWduLXRvcCAubmF2LXRhYnMgLm5hdi1pdGVtOmxhc3QtY2hpbGQgLm5hdi1saW5rIHtcbiAgYm9yZGVyLXRvcC1yaWdodC1yYWRpdXM6IDAuMzc1cmVtO1xufVxuLm5hdi1hbGlnbi10b3AgLm5hdi10YWJzIC5uYXYtaXRlbTpub3QoOmZpcnN0LWNoaWxkKSAubmF2LWxpbmsge1xuICBib3JkZXItbGVmdDogMXB4IHNvbGlkICNmZmY7XG59XG4ubmF2LWFsaWduLXRvcCAubmF2LXRhYnMgLm5hdi1saW5rLmFjdGl2ZSB7XG4gIGJveC1zaGFkb3c6IDAgMnB4IDZweCAwIHJnYmEoNjcsIDg5LCAxMTMsIDAuMTIpO1xufVxuXG4ubmF2LWFsaWduLXJpZ2h0IHtcbiAgZmxleC1kaXJlY3Rpb246IHJvdy1yZXZlcnNlO1xufVxuLm5hdi1hbGlnbi1yaWdodCA+IC5uYXYgLm5hdi1pdGVtLFxuLm5hdi1hbGlnbi1yaWdodCA+IGRpdiA+IC5uYXYgLm5hdi1pdGVtIHtcbiAgbWFyZ2luLWxlZnQ6IC0xcHg7XG4gIG1hcmdpbi1ib3R0b206IDA7XG59XG4ubmF2LWFsaWduLXJpZ2h0IC5uYXYtbGluayB7XG4gIHRleHQtYWxpZ246IHJpZ2h0O1xufVxuLm5hdi1hbGlnbi1yaWdodCAubmF2LXRhYnMgfiAudGFiLWNvbnRlbnQge1xuICBib3gtc2hhZG93OiAwIDJweCA2cHggMCByZ2JhKDY3LCA4OSwgMTEzLCAwLjEyKTtcbn1cbi5uYXYtYWxpZ24tcmlnaHQgLm5hdi10YWJzIC5uYXYtaXRlbTpub3QoOmZpcnN0LWNoaWxkKSAubmF2LWxpbmsge1xuICBib3JkZXItdG9wOiAxcHggc29saWQgI2ZmZjtcbn1cbi5uYXYtYWxpZ24tcmlnaHQgLm5hdi10YWJzIC5uYXYtaXRlbTpmaXJzdC1jaGlsZCAubmF2LWxpbmsge1xuICBib3JkZXItdG9wLXJpZ2h0LXJhZGl1czogMC4zNzVyZW07XG59XG4ubmF2LWFsaWduLXJpZ2h0IC5uYXYtdGFicyAubmF2LWl0ZW06bGFzdC1jaGlsZCAubmF2LWxpbmsge1xuICBib3JkZXItYm90dG9tLXJpZ2h0LXJhZGl1czogMC4zNzVyZW07XG59XG4ubmF2LWFsaWduLXJpZ2h0IC5uYXYtdGFicyAubmF2LWxpbmsuYWN0aXZlIHtcbiAgYm94LXNoYWRvdzogNXB4IDRweCA2cHggMCByZ2JhKDY3LCA4OSwgMTEzLCAwLjEyKTtcbn1cblxuLm5hdi1hbGlnbi1ib3R0b20ge1xuICBmbGV4LWRpcmVjdGlvbjogY29sdW1uLXJldmVyc2U7XG59XG4ubmF2LWFsaWduLWJvdHRvbSA+IC5uYXYgLm5hdi1pdGVtLFxuLm5hdi1hbGlnbi1ib3R0b20gPiBkaXYgPiAubmF2IC5uYXYtaXRlbSB7XG4gIG1hcmdpbi1ib3R0b206IDA7XG4gIG1hcmdpbi10b3A6IC0xcHg7XG59XG4ubmF2LWFsaWduLWJvdHRvbSAubmF2LXRhYnMgfiAudGFiLWNvbnRlbnQge1xuICBib3gtc2hhZG93OiAwIDJweCA2cHggMCByZ2JhKDY3LCA4OSwgMTEzLCAwLjEyKTtcbn1cbi5uYXYtYWxpZ24tYm90dG9tIC5uYXYtdGFicyAubmF2LWl0ZW06Zmlyc3QtY2hpbGQgLm5hdi1saW5rIHtcbiAgYm9yZGVyLWJvdHRvbS1sZWZ0LXJhZGl1czogMC4zNzVyZW07XG59XG4ubmF2LWFsaWduLWJvdHRvbSAubmF2LXRhYnMgLm5hdi1pdGVtOmxhc3QtY2hpbGQgLm5hdi1saW5rIHtcbiAgYm9yZGVyLWJvdHRvbS1yaWdodC1yYWRpdXM6IDAuMzc1cmVtO1xufVxuLm5hdi1hbGlnbi1ib3R0b20gLm5hdi10YWJzIC5uYXYtaXRlbTpub3QoOmZpcnN0LWNoaWxkKSAubmF2LWxpbmsge1xuICBib3JkZXItbGVmdDogMXB4IHNvbGlkICNmZmY7XG59XG4ubmF2LWFsaWduLWJvdHRvbSAubmF2LXRhYnMgLm5hdi1saW5rLmFjdGl2ZSB7XG4gIGJveC1zaGFkb3c6IDAgNHB4IDZweCAwIHJnYmEoNjcsIDg5LCAxMTMsIDAuMTIpO1xufVxuXG4ubmF2LWFsaWduLWxlZnQgPiAubmF2IC5uYXYtaXRlbSxcbi5uYXYtYWxpZ24tbGVmdCA+IGRpdiA+IC5uYXYgLm5hdi1pdGVtIHtcbiAgbWFyZ2luLXJpZ2h0OiAtMXB4O1xuICBtYXJnaW4tYm90dG9tOiAwO1xufVxuLm5hdi1hbGlnbi1sZWZ0IC5uYXYtbGluayB7XG4gIHRleHQtYWxpZ246IGxlZnQ7XG59XG4ubmF2LWFsaWduLWxlZnQgLm5hdi10YWJzIH4gLnRhYi1jb250ZW50IHtcbiAgYm94LXNoYWRvdzogMCAycHggNnB4IDAgcmdiYSg2NywgODksIDExMywgMC4xMik7XG59XG4ubmF2LWFsaWduLWxlZnQgLm5hdi10YWJzIC5uYXYtaXRlbTpub3QoOmZpcnN0LWNoaWxkKSAubmF2LWxpbmsge1xuICBib3JkZXItdG9wOiAxcHggc29saWQgI2ZmZjtcbn1cbi5uYXYtYWxpZ24tbGVmdCAubmF2LXRhYnMgLm5hdi1pdGVtOmZpcnN0LWNoaWxkIC5uYXYtbGluayB7XG4gIGJvcmRlci10b3AtbGVmdC1yYWRpdXM6IDAuMzc1cmVtO1xufVxuLm5hdi1hbGlnbi1sZWZ0IC5uYXYtdGFicyAubmF2LWl0ZW06bGFzdC1jaGlsZCAubmF2LWxpbmsge1xuICBib3JkZXItYm90dG9tLWxlZnQtcmFkaXVzOiAwLjM3NXJlbTtcbn1cbi5uYXYtYWxpZ24tbGVmdCAubmF2LXRhYnMgLm5hdi1saW5rLmFjdGl2ZSB7XG4gIGJveC1zaGFkb3c6IC01cHggMnB4IDZweCAwIHJnYmEoNjcsIDg5LCAxMTMsIDAuMTIpO1xufVxuXG4ubmF2LWFsaWduLXRvcCA+IC50YWItY29udGVudCxcbi5uYXYtYWxpZ24tcmlnaHQgPiAudGFiLWNvbnRlbnQsXG4ubmF2LWFsaWduLWJvdHRvbSA+IC50YWItY29udGVudCxcbi5uYXYtYWxpZ24tbGVmdCA+IC50YWItY29udGVudCB7XG4gIGZsZXgtc2hyaW5rOiAxO1xuICBib3JkZXI6IDAgc29saWQgI2Q5ZGVlMztcbiAgYm94LXNoYWRvdzogMCAycHggNnB4IDAgcmdiYSg2NywgODksIDExMywgMC4xMik7XG4gIGJhY2tncm91bmQtY2xpcDogcGFkZGluZy1ib3g7XG4gIGJhY2tncm91bmQ6ICNmZmY7XG59XG5cbi5uYXYtYWxpZ24tdG9wIDpub3QoLm5hdi1waWxscykgfiAudGFiLWNvbnRlbnQge1xuICBib3JkZXItcmFkaXVzOiAwIDAgMC4zNzVyZW0gMC4zNzVyZW07XG59XG5cbi5uYXYtYWxpZ24tdG9wIC5uYXYtdGFiczpub3QoLm5hdi1maWxsKSB+IC50YWItY29udGVudCB7XG4gIGJvcmRlci10b3AtcmlnaHQtcmFkaXVzOiAwLjM3NXJlbTtcbn1cblxuLm5hdi1hbGlnbi1yaWdodCA6bm90KC5uYXYtcGlsbHMpIH4gLnRhYi1jb250ZW50IHtcbiAgYm9yZGVyLXJhZGl1czogMC4zNzVyZW0gMCAwIDAuMzc1cmVtO1xufVxuXG4ubmF2LWFsaWduLWJvdHRvbSA6bm90KC5uYXYtcGlsbHMpIH4gLnRhYi1jb250ZW50IHtcbiAgYm9yZGVyLXJhZGl1czogMC4zNzVyZW0gMC4zNzVyZW0gMCAwO1xufVxuXG4ubmF2LWFsaWduLWxlZnQgOm5vdCgubmF2LXBpbGxzKSB+IC50YWItY29udGVudCB7XG4gIGJvcmRlci1yYWRpdXM6IDAgMC4zNzVyZW0gMC4zNzVyZW0gMDtcbn1cblxuLm5hdi1hbGlnbi1sZWZ0ID4gLnRhYi1jb250ZW50IHtcbiAgYm9yZGVyLXJhZGl1czogMCAwLjM3NXJlbSAwLjM3NXJlbSAwLjM3NXJlbTtcbn1cblxuLnBhZ2UtaXRlbS5maXJzdCAucGFnZS1saW5rLCAucGFnZS1pdGVtLmxhc3QgLnBhZ2UtbGluaywgLnBhZ2UtaXRlbS5uZXh0IC5wYWdlLWxpbmssIC5wYWdlLWl0ZW0ucHJldiAucGFnZS1saW5rLCAucGFnZS1pdGVtLnByZXZpb3VzIC5wYWdlLWxpbmsge1xuICBwYWRkaW5nLXRvcDogMC41cmVtO1xuICBwYWRkaW5nLWJvdHRvbTogMC41cmVtO1xufVxuLnBhZ2UtaXRlbS5kaXNhYmxlZCAucGFnZS1saW5rIHtcbiAgYm9yZGVyLWNvbG9yOiAjZDlkZWUzO1xufVxuLnBhZ2UtaXRlbS5hY3RpdmUgLnBhZ2UtbGluayB7XG4gIG1hcmdpbjogMCAwLjFyZW0gMCAwLjNyZW07XG59XG5cbi5wYWdlLWxpbmssXG4ucGFnZS1saW5rID4gYSB7XG4gIGJvcmRlci1yYWRpdXM6IDAuMzc1cmVtO1xuICBsaW5lLWhlaWdodDogMTtcbiAgdGV4dC1hbGlnbjogY2VudGVyO1xuICBtaW4td2lkdGg6IGNhbGMoXG4gICAgMi4xODc1cmVtICsgMHB4XG4gICk7XG59XG4ucGFnZS1saW5rOmZvY3VzLFxuLnBhZ2UtbGluayA+IGE6Zm9jdXMge1xuICBjb2xvcjogIzY5N2E4ZDtcbn1cblxuLnBhZ2UtbGluay5idG4tcHJpbWFyeSB7XG4gIGJveC1zaGFkb3c6IG5vbmUgIWltcG9ydGFudDtcbn1cblxuLnBhZ2luYXRpb24tbGcgLnBhZ2UtbGluayxcbi5wYWdpbmF0aW9uLWxnID4gbGkgPiBhOm5vdCgucGFnZS1saW5rKSB7XG4gIG1pbi13aWR0aDogY2FsYyhcbiAgICAyLjg3NXJlbSArIDBweFxuICApO1xufVxuXG4ucGFnaW5hdGlvbi1sZyA+IC5wYWdlLWl0ZW0uZmlyc3QgLnBhZ2UtbGluaywgLnBhZ2luYXRpb24tbGcgPiAucGFnZS1pdGVtLmxhc3QgLnBhZ2UtbGluaywgLnBhZ2luYXRpb24tbGcgPiAucGFnZS1pdGVtLm5leHQgLnBhZ2UtbGluaywgLnBhZ2luYXRpb24tbGcgPiAucGFnZS1pdGVtLnByZXYgLnBhZ2UtbGluaywgLnBhZ2luYXRpb24tbGcgPiAucGFnZS1pdGVtLnByZXZpb3VzIC5wYWdlLWxpbmsge1xuICBwYWRkaW5nLXRvcDogMC44NTNyZW07XG4gIHBhZGRpbmctYm90dG9tOiAwLjg1M3JlbTtcbn1cblxuLnBhZ2luYXRpb24tc20gLnBhZ2UtbGluayxcbi5wYWdpbmF0aW9uLXNtID4gbGkgPiBhOm5vdCgucGFnZS1saW5rKSB7XG4gIG1pbi13aWR0aDogY2FsYyhcbiAgICAxLjVyZW0gKyAwcHhcbiAgKTtcbn1cbi5wYWdpbmF0aW9uLXNtIC5wYWdlLWxpbmsgLnRmLWljb24sXG4ucGFnaW5hdGlvbi1zbSA+IGxpID4gYTpub3QoLnBhZ2UtbGluaykgLnRmLWljb24ge1xuICBmb250LXNpemU6IDAuOTM3NXJlbTtcbn1cblxuLnBhZ2luYXRpb24tc20gPiAucGFnZS1pdGVtLmZpcnN0IC5wYWdlLWxpbmssIC5wYWdpbmF0aW9uLXNtID4gLnBhZ2UtaXRlbS5sYXN0IC5wYWdlLWxpbmssIC5wYWdpbmF0aW9uLXNtID4gLnBhZ2UtaXRlbS5uZXh0IC5wYWdlLWxpbmssIC5wYWdpbmF0aW9uLXNtID4gLnBhZ2UtaXRlbS5wcmV2IC5wYWdlLWxpbmssIC5wYWdpbmF0aW9uLXNtID4gLnBhZ2UtaXRlbS5wcmV2aW91cyAucGFnZS1saW5rIHtcbiAgcGFkZGluZy10b3A6IDAuM3JlbTtcbiAgcGFkZGluZy1ib3R0b206IDAuM3JlbTtcbn1cblxuLmFsZXJ0LXNlY29uZGFyeSB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNlYmVlZjA7XG4gIGJvcmRlci1jb2xvcjogI2RhZGVlMztcbiAgY29sb3I6ICM4NTkyYTM7XG59XG4uYWxlcnQtc2Vjb25kYXJ5IC5idG4tY2xvc2Uge1xuICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoXCJkYXRhOmltYWdlL3N2Zyt4bWwsJTNDc3ZnIHdpZHRoPScxNTBweCcgaGVpZ2h0PScxNTFweCcgdmlld0JveD0nMCAwIDE1MCAxNTEnIHZlcnNpb249JzEuMScgeG1sbnM9J2h0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnJyB4bWxuczp4bGluaz0naHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayclM0UlM0NkZWZzJTNFJTNDcG9seWdvbiBpZD0ncGF0aC0xJyBwb2ludHM9JzEzMS4yNTE2NTcgMCA3NC45OTMzNzA1IDU2LjI1IDE4Ljc0ODM0MjYgMCAwIDE4Ljc1IDU2LjI0NTAyNzggNzUgMCAxMzEuMjUgMTguNzQ4MzQyNiAxNTAgNzQuOTkzMzcwNSA5My43NSAxMzEuMjUxNjU3IDE1MCAxNTAgMTMxLjI1IDkzLjc1NDk3MjIgNzUgMTUwIDE4Ljc1JyUzRSUzQy9wb2x5Z29uJTNFJTNDL2RlZnMlM0UlM0NnIGlkPSfwn46oLSU1QlNldHVwJTVEOi1Db2xvcnMtJmFtcDstU2hhZG93cycgc3Ryb2tlPSdub25lJyBzdHJva2Utd2lkdGg9JzEnIGZpbGw9J25vbmUnIGZpbGwtcnVsZT0nZXZlbm9kZCclM0UlM0NnIGlkPSdBcnRib2FyZCcgdHJhbnNmb3JtPSd0cmFuc2xhdGUoLTIyNS4wMDAwMDAsIC0yNTAuMDAwMDAwKSclM0UlM0NnIGlkPSdJY29uLUNvbG9yJyB0cmFuc2Zvcm09J3RyYW5zbGF0ZSgyMjUuMDAwMDAwLCAyNTAuNTAwMDAwKSclM0UlM0N1c2UgZmlsbD0nJTIzODU5MmEzJyB4bGluazpocmVmPSclMjNwYXRoLTEnJTNFJTNDL3VzZSUzRSUzQ3VzZSBmaWxsLW9wYWNpdHk9JzAuNScgZmlsbD0nJTIzODU5MmEzJyB4bGluazpocmVmPSclMjNwYXRoLTEnJTNFJTNDL3VzZSUzRSUzQy9nJTNFJTNDL2clM0UlM0MvZyUzRSUzQy9zdmclM0VcIik7XG59XG4uYWxlcnQtc2Vjb25kYXJ5IC5hbGVydC1saW5rIHtcbiAgY29sb3I6ICM4NTkyYTM7XG59XG5cbi5jYXJkIC5hbGVydC1zZWNvbmRhcnkgaHIge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjODU5MmEzICFpbXBvcnRhbnQ7XG59XG5cbi5hbGVydC1zdWNjZXNzIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2U4ZmFkZjtcbiAgYm9yZGVyLWNvbG9yOiAjZDRmNWMzO1xuICBjb2xvcjogIzcxZGQzNztcbn1cbi5hbGVydC1zdWNjZXNzIC5idG4tY2xvc2Uge1xuICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoXCJkYXRhOmltYWdlL3N2Zyt4bWwsJTNDc3ZnIHdpZHRoPScxNTBweCcgaGVpZ2h0PScxNTFweCcgdmlld0JveD0nMCAwIDE1MCAxNTEnIHZlcnNpb249JzEuMScgeG1sbnM9J2h0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnJyB4bWxuczp4bGluaz0naHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayclM0UlM0NkZWZzJTNFJTNDcG9seWdvbiBpZD0ncGF0aC0xJyBwb2ludHM9JzEzMS4yNTE2NTcgMCA3NC45OTMzNzA1IDU2LjI1IDE4Ljc0ODM0MjYgMCAwIDE4Ljc1IDU2LjI0NTAyNzggNzUgMCAxMzEuMjUgMTguNzQ4MzQyNiAxNTAgNzQuOTkzMzcwNSA5My43NSAxMzEuMjUxNjU3IDE1MCAxNTAgMTMxLjI1IDkzLjc1NDk3MjIgNzUgMTUwIDE4Ljc1JyUzRSUzQy9wb2x5Z29uJTNFJTNDL2RlZnMlM0UlM0NnIGlkPSfwn46oLSU1QlNldHVwJTVEOi1Db2xvcnMtJmFtcDstU2hhZG93cycgc3Ryb2tlPSdub25lJyBzdHJva2Utd2lkdGg9JzEnIGZpbGw9J25vbmUnIGZpbGwtcnVsZT0nZXZlbm9kZCclM0UlM0NnIGlkPSdBcnRib2FyZCcgdHJhbnNmb3JtPSd0cmFuc2xhdGUoLTIyNS4wMDAwMDAsIC0yNTAuMDAwMDAwKSclM0UlM0NnIGlkPSdJY29uLUNvbG9yJyB0cmFuc2Zvcm09J3RyYW5zbGF0ZSgyMjUuMDAwMDAwLCAyNTAuNTAwMDAwKSclM0UlM0N1c2UgZmlsbD0nJTIzNzFkZDM3JyB4bGluazpocmVmPSclMjNwYXRoLTEnJTNFJTNDL3VzZSUzRSUzQ3VzZSBmaWxsLW9wYWNpdHk9JzAuNScgZmlsbD0nJTIzNzFkZDM3JyB4bGluazpocmVmPSclMjNwYXRoLTEnJTNFJTNDL3VzZSUzRSUzQy9nJTNFJTNDL2clM0UlM0MvZyUzRSUzQy9zdmclM0VcIik7XG59XG4uYWxlcnQtc3VjY2VzcyAuYWxlcnQtbGluayB7XG4gIGNvbG9yOiAjNzFkZDM3O1xufVxuXG4uY2FyZCAuYWxlcnQtc3VjY2VzcyBociB7XG4gIGJhY2tncm91bmQtY29sb3I6ICM3MWRkMzcgIWltcG9ydGFudDtcbn1cblxuLmFsZXJ0LWluZm8ge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZDdmNWZjO1xuICBib3JkZXItY29sb3I6ICNiM2VkZjk7XG4gIGNvbG9yOiAjMDNjM2VjO1xufVxuLmFsZXJ0LWluZm8gLmJ0bi1jbG9zZSB7XG4gIGJhY2tncm91bmQtaW1hZ2U6IHVybChcImRhdGE6aW1hZ2Uvc3ZnK3htbCwlM0Nzdmcgd2lkdGg9JzE1MHB4JyBoZWlnaHQ9JzE1MXB4JyB2aWV3Qm94PScwIDAgMTUwIDE1MScgdmVyc2lvbj0nMS4xJyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHhtbG5zOnhsaW5rPSdodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rJyUzRSUzQ2RlZnMlM0UlM0Nwb2x5Z29uIGlkPSdwYXRoLTEnIHBvaW50cz0nMTMxLjI1MTY1NyAwIDc0Ljk5MzM3MDUgNTYuMjUgMTguNzQ4MzQyNiAwIDAgMTguNzUgNTYuMjQ1MDI3OCA3NSAwIDEzMS4yNSAxOC43NDgzNDI2IDE1MCA3NC45OTMzNzA1IDkzLjc1IDEzMS4yNTE2NTcgMTUwIDE1MCAxMzEuMjUgOTMuNzU0OTcyMiA3NSAxNTAgMTguNzUnJTNFJTNDL3BvbHlnb24lM0UlM0MvZGVmcyUzRSUzQ2cgaWQ9J/CfjqgtJTVCU2V0dXAlNUQ6LUNvbG9ycy0mYW1wOy1TaGFkb3dzJyBzdHJva2U9J25vbmUnIHN0cm9rZS13aWR0aD0nMScgZmlsbD0nbm9uZScgZmlsbC1ydWxlPSdldmVub2RkJyUzRSUzQ2cgaWQ9J0FydGJvYXJkJyB0cmFuc2Zvcm09J3RyYW5zbGF0ZSgtMjI1LjAwMDAwMCwgLTI1MC4wMDAwMDApJyUzRSUzQ2cgaWQ9J0ljb24tQ29sb3InIHRyYW5zZm9ybT0ndHJhbnNsYXRlKDIyNS4wMDAwMDAsIDI1MC41MDAwMDApJyUzRSUzQ3VzZSBmaWxsPSclMjMwM2MzZWMnIHhsaW5rOmhyZWY9JyUyM3BhdGgtMSclM0UlM0MvdXNlJTNFJTNDdXNlIGZpbGwtb3BhY2l0eT0nMC41JyBmaWxsPSclMjMwM2MzZWMnIHhsaW5rOmhyZWY9JyUyM3BhdGgtMSclM0UlM0MvdXNlJTNFJTNDL2clM0UlM0MvZyUzRSUzQy9nJTNFJTNDL3N2ZyUzRVwiKTtcbn1cbi5hbGVydC1pbmZvIC5hbGVydC1saW5rIHtcbiAgY29sb3I6ICMwM2MzZWM7XG59XG5cbi5jYXJkIC5hbGVydC1pbmZvIGhyIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzAzYzNlYyAhaW1wb3J0YW50O1xufVxuXG4uYWxlcnQtd2FybmluZyB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNmZmYyZDY7XG4gIGJvcmRlci1jb2xvcjogI2ZmZTZiMztcbiAgY29sb3I6ICNmZmFiMDA7XG59XG4uYWxlcnQtd2FybmluZyAuYnRuLWNsb3NlIHtcbiAgYmFja2dyb3VuZC1pbWFnZTogdXJsKFwiZGF0YTppbWFnZS9zdmcreG1sLCUzQ3N2ZyB3aWR0aD0nMTUwcHgnIGhlaWdodD0nMTUxcHgnIHZpZXdCb3g9JzAgMCAxNTAgMTUxJyB2ZXJzaW9uPScxLjEnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZycgeG1sbnM6eGxpbms9J2h0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsnJTNFJTNDZGVmcyUzRSUzQ3BvbHlnb24gaWQ9J3BhdGgtMScgcG9pbnRzPScxMzEuMjUxNjU3IDAgNzQuOTkzMzcwNSA1Ni4yNSAxOC43NDgzNDI2IDAgMCAxOC43NSA1Ni4yNDUwMjc4IDc1IDAgMTMxLjI1IDE4Ljc0ODM0MjYgMTUwIDc0Ljk5MzM3MDUgOTMuNzUgMTMxLjI1MTY1NyAxNTAgMTUwIDEzMS4yNSA5My43NTQ5NzIyIDc1IDE1MCAxOC43NSclM0UlM0MvcG9seWdvbiUzRSUzQy9kZWZzJTNFJTNDZyBpZD0n8J+OqC0lNUJTZXR1cCU1RDotQ29sb3JzLSZhbXA7LVNoYWRvd3MnIHN0cm9rZT0nbm9uZScgc3Ryb2tlLXdpZHRoPScxJyBmaWxsPSdub25lJyBmaWxsLXJ1bGU9J2V2ZW5vZGQnJTNFJTNDZyBpZD0nQXJ0Ym9hcmQnIHRyYW5zZm9ybT0ndHJhbnNsYXRlKC0yMjUuMDAwMDAwLCAtMjUwLjAwMDAwMCknJTNFJTNDZyBpZD0nSWNvbi1Db2xvcicgdHJhbnNmb3JtPSd0cmFuc2xhdGUoMjI1LjAwMDAwMCwgMjUwLjUwMDAwMCknJTNFJTNDdXNlIGZpbGw9JyUyM2ZmYWIwMCcgeGxpbms6aHJlZj0nJTIzcGF0aC0xJyUzRSUzQy91c2UlM0UlM0N1c2UgZmlsbC1vcGFjaXR5PScwLjUnIGZpbGw9JyUyM2ZmYWIwMCcgeGxpbms6aHJlZj0nJTIzcGF0aC0xJyUzRSUzQy91c2UlM0UlM0MvZyUzRSUzQy9nJTNFJTNDL2clM0UlM0Mvc3ZnJTNFXCIpO1xufVxuLmFsZXJ0LXdhcm5pbmcgLmFsZXJ0LWxpbmsge1xuICBjb2xvcjogI2ZmYWIwMDtcbn1cblxuLmNhcmQgLmFsZXJ0LXdhcm5pbmcgaHIge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZhYjAwICFpbXBvcnRhbnQ7XG59XG5cbi5hbGVydC1kYW5nZXIge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZlMGRiO1xuICBib3JkZXItY29sb3I6ICNmZmM1YmI7XG4gIGNvbG9yOiAjZmYzZTFkO1xufVxuLmFsZXJ0LWRhbmdlciAuYnRuLWNsb3NlIHtcbiAgYmFja2dyb3VuZC1pbWFnZTogdXJsKFwiZGF0YTppbWFnZS9zdmcreG1sLCUzQ3N2ZyB3aWR0aD0nMTUwcHgnIGhlaWdodD0nMTUxcHgnIHZpZXdCb3g9JzAgMCAxNTAgMTUxJyB2ZXJzaW9uPScxLjEnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZycgeG1sbnM6eGxpbms9J2h0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsnJTNFJTNDZGVmcyUzRSUzQ3BvbHlnb24gaWQ9J3BhdGgtMScgcG9pbnRzPScxMzEuMjUxNjU3IDAgNzQuOTkzMzcwNSA1Ni4yNSAxOC43NDgzNDI2IDAgMCAxOC43NSA1Ni4yNDUwMjc4IDc1IDAgMTMxLjI1IDE4Ljc0ODM0MjYgMTUwIDc0Ljk5MzM3MDUgOTMuNzUgMTMxLjI1MTY1NyAxNTAgMTUwIDEzMS4yNSA5My43NTQ5NzIyIDc1IDE1MCAxOC43NSclM0UlM0MvcG9seWdvbiUzRSUzQy9kZWZzJTNFJTNDZyBpZD0n8J+OqC0lNUJTZXR1cCU1RDotQ29sb3JzLSZhbXA7LVNoYWRvd3MnIHN0cm9rZT0nbm9uZScgc3Ryb2tlLXdpZHRoPScxJyBmaWxsPSdub25lJyBmaWxsLXJ1bGU9J2V2ZW5vZGQnJTNFJTNDZyBpZD0nQXJ0Ym9hcmQnIHRyYW5zZm9ybT0ndHJhbnNsYXRlKC0yMjUuMDAwMDAwLCAtMjUwLjAwMDAwMCknJTNFJTNDZyBpZD0nSWNvbi1Db2xvcicgdHJhbnNmb3JtPSd0cmFuc2xhdGUoMjI1LjAwMDAwMCwgMjUwLjUwMDAwMCknJTNFJTNDdXNlIGZpbGw9JyUyM2ZmM2UxZCcgeGxpbms6aHJlZj0nJTIzcGF0aC0xJyUzRSUzQy91c2UlM0UlM0N1c2UgZmlsbC1vcGFjaXR5PScwLjUnIGZpbGw9JyUyM2ZmM2UxZCcgeGxpbms6aHJlZj0nJTIzcGF0aC0xJyUzRSUzQy91c2UlM0UlM0MvZyUzRSUzQy9nJTNFJTNDL2clM0UlM0Mvc3ZnJTNFXCIpO1xufVxuLmFsZXJ0LWRhbmdlciAuYWxlcnQtbGluayB7XG4gIGNvbG9yOiAjZmYzZTFkO1xufVxuXG4uY2FyZCAuYWxlcnQtZGFuZ2VyIGhyIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZmM2UxZCAhaW1wb3J0YW50O1xufVxuXG4uYWxlcnQtZGFyayB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNkY2RmZTE7XG4gIGJvcmRlci1jb2xvcjogI2JkYzJjODtcbiAgY29sb3I6ICMyMzM0NDY7XG59XG4uYWxlcnQtZGFyayAuYnRuLWNsb3NlIHtcbiAgYmFja2dyb3VuZC1pbWFnZTogdXJsKFwiZGF0YTppbWFnZS9zdmcreG1sLCUzQ3N2ZyB3aWR0aD0nMTUwcHgnIGhlaWdodD0nMTUxcHgnIHZpZXdCb3g9JzAgMCAxNTAgMTUxJyB2ZXJzaW9uPScxLjEnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZycgeG1sbnM6eGxpbms9J2h0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsnJTNFJTNDZGVmcyUzRSUzQ3BvbHlnb24gaWQ9J3BhdGgtMScgcG9pbnRzPScxMzEuMjUxNjU3IDAgNzQuOTkzMzcwNSA1Ni4yNSAxOC43NDgzNDI2IDAgMCAxOC43NSA1Ni4yNDUwMjc4IDc1IDAgMTMxLjI1IDE4Ljc0ODM0MjYgMTUwIDc0Ljk5MzM3MDUgOTMuNzUgMTMxLjI1MTY1NyAxNTAgMTUwIDEzMS4yNSA5My43NTQ5NzIyIDc1IDE1MCAxOC43NSclM0UlM0MvcG9seWdvbiUzRSUzQy9kZWZzJTNFJTNDZyBpZD0n8J+OqC0lNUJTZXR1cCU1RDotQ29sb3JzLSZhbXA7LVNoYWRvd3MnIHN0cm9rZT0nbm9uZScgc3Ryb2tlLXdpZHRoPScxJyBmaWxsPSdub25lJyBmaWxsLXJ1bGU9J2V2ZW5vZGQnJTNFJTNDZyBpZD0nQXJ0Ym9hcmQnIHRyYW5zZm9ybT0ndHJhbnNsYXRlKC0yMjUuMDAwMDAwLCAtMjUwLjAwMDAwMCknJTNFJTNDZyBpZD0nSWNvbi1Db2xvcicgdHJhbnNmb3JtPSd0cmFuc2xhdGUoMjI1LjAwMDAwMCwgMjUwLjUwMDAwMCknJTNFJTNDdXNlIGZpbGw9JyUyMzIzMzQ0NicgeGxpbms6aHJlZj0nJTIzcGF0aC0xJyUzRSUzQy91c2UlM0UlM0N1c2UgZmlsbC1vcGFjaXR5PScwLjUnIGZpbGw9JyUyMzIzMzQ0NicgeGxpbms6aHJlZj0nJTIzcGF0aC0xJyUzRSUzQy91c2UlM0UlM0MvZyUzRSUzQy9nJTNFJTNDL2clM0UlM0Mvc3ZnJTNFXCIpO1xufVxuLmFsZXJ0LWRhcmsgLmFsZXJ0LWxpbmsge1xuICBjb2xvcjogIzIzMzQ0Njtcbn1cblxuLmNhcmQgLmFsZXJ0LWRhcmsgaHIge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMjMzNDQ2ICFpbXBvcnRhbnQ7XG59XG5cbi5hbGVydC1ncmF5IHtcbiAgYmFja2dyb3VuZC1jb2xvcjogcmdiYSgyNTMsIDI1MywgMjU0LCAwLjg1Nik7XG4gIGJvcmRlci1jb2xvcjogcmdiYSgyNTEsIDI1MSwgMjUyLCAwLjczKTtcbiAgY29sb3I6IHJnYmEoNjcsIDg5LCAxMTMsIDAuMSk7XG59XG4uYWxlcnQtZ3JheSAuYnRuLWNsb3NlIHtcbiAgYmFja2dyb3VuZC1pbWFnZTogdXJsKFwiZGF0YTppbWFnZS9zdmcreG1sLCUzQ3N2ZyB3aWR0aD0nMTUwcHgnIGhlaWdodD0nMTUxcHgnIHZpZXdCb3g9JzAgMCAxNTAgMTUxJyB2ZXJzaW9uPScxLjEnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZycgeG1sbnM6eGxpbms9J2h0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsnJTNFJTNDZGVmcyUzRSUzQ3BvbHlnb24gaWQ9J3BhdGgtMScgcG9pbnRzPScxMzEuMjUxNjU3IDAgNzQuOTkzMzcwNSA1Ni4yNSAxOC43NDgzNDI2IDAgMCAxOC43NSA1Ni4yNDUwMjc4IDc1IDAgMTMxLjI1IDE4Ljc0ODM0MjYgMTUwIDc0Ljk5MzM3MDUgOTMuNzUgMTMxLjI1MTY1NyAxNTAgMTUwIDEzMS4yNSA5My43NTQ5NzIyIDc1IDE1MCAxOC43NSclM0UlM0MvcG9seWdvbiUzRSUzQy9kZWZzJTNFJTNDZyBpZD0n8J+OqC0lNUJTZXR1cCU1RDotQ29sb3JzLSZhbXA7LVNoYWRvd3MnIHN0cm9rZT0nbm9uZScgc3Ryb2tlLXdpZHRoPScxJyBmaWxsPSdub25lJyBmaWxsLXJ1bGU9J2V2ZW5vZGQnJTNFJTNDZyBpZD0nQXJ0Ym9hcmQnIHRyYW5zZm9ybT0ndHJhbnNsYXRlKC0yMjUuMDAwMDAwLCAtMjUwLjAwMDAwMCknJTNFJTNDZyBpZD0nSWNvbi1Db2xvcicgdHJhbnNmb3JtPSd0cmFuc2xhdGUoMjI1LjAwMDAwMCwgMjUwLjUwMDAwMCknJTNFJTNDdXNlIGZpbGw9J3JnYmEoNjcsIDg5LCAxMTMsIDAuMSknIHhsaW5rOmhyZWY9JyUyM3BhdGgtMSclM0UlM0MvdXNlJTNFJTNDdXNlIGZpbGwtb3BhY2l0eT0nMC41JyBmaWxsPSdyZ2JhKDY3LCA4OSwgMTEzLCAwLjEpJyB4bGluazpocmVmPSclMjNwYXRoLTEnJTNFJTNDL3VzZSUzRSUzQy9nJTNFJTNDL2clM0UlM0MvZyUzRSUzQy9zdmclM0VcIik7XG59XG4uYWxlcnQtZ3JheSAuYWxlcnQtbGluayB7XG4gIGNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjEpO1xufVxuXG4uY2FyZCAuYWxlcnQtZ3JheSBociB7XG4gIGJhY2tncm91bmQtY29sb3I6IHJnYmEoNjcsIDg5LCAxMTMsIDAuMSkgIWltcG9ydGFudDtcbn1cblxuLm1vZGFsLW9wZW4gLnRvb2x0aXAge1xuICB6LWluZGV4OiAxMDkyO1xufVxuXG4udG9vbHRpcC1pbm5lciB7XG4gIGJveC1zaGFkb3c6IDAgMC4xMjVyZW0gMC4yNXJlbSByZ2JhKDE2MSwgMTcyLCAxODQsIDAuNCk7XG59XG5cbi5tb2RhbC1vcGVuIC5wb3BvdmVyIHtcbiAgei1pbmRleDogMTA5MTtcbn1cblxuLnBvcG92ZXIge1xuICBib3gtc2hhZG93OiAwIDAuMjVyZW0gMXJlbSByZ2JhKDE2MSwgMTcyLCAxODQsIDAuNDUpO1xufVxuLnBvcG92ZXIgLnBvcG92ZXItYXJyb3cge1xuICB6LWluZGV4OiAxO1xufVxuLnBvcG92ZXIuYnMtcG9wb3Zlci1ib3R0b20gPiAucG9wb3Zlci1hcnJvdzo6YWZ0ZXIsIC5wb3BvdmVyLmJzLXBvcG92ZXItYXV0b1tkYXRhLXBvcHBlci1wbGFjZW1lbnRePWJvdHRvbV0gPiAucG9wb3Zlci1hcnJvdzo6YWZ0ZXIge1xuICBib3JkZXItYm90dG9tLWNvbG9yOiB3aGl0ZTtcbiAgdG9wOiAycHg7XG59XG4ucG9wb3Zlci5icy1wb3BvdmVyLWJvdHRvbSA+IC5wb3BvdmVyLWFycm93OmJlZm9yZSwgLnBvcG92ZXIuYnMtcG9wb3Zlci1hdXRvW2RhdGEtcG9wcGVyLXBsYWNlbWVudF49Ym90dG9tXSA+IC5wb3BvdmVyLWFycm93OmJlZm9yZSB7XG4gIHRvcDogMXB4O1xufVxuXG4ucG9wb3Zlci1oZWFkZXIge1xuICBwYWRkaW5nOiAxLjEyNXJlbSAxLjEyNXJlbSAwO1xuICBmb250LXNpemU6IDEuMTI1cmVtO1xufVxuXG4uZm9ybS1sYWJlbCxcbi5jb2wtZm9ybS1sYWJlbCB7XG4gIGZvbnQtc2l6ZTogMC43NXJlbTtcbiAgdGV4dC10cmFuc2Zvcm06IHVwcGVyY2FzZTtcbiAgbGV0dGVyLXNwYWNpbmc6IGluaGVyaXQ7XG59XG5cbi5mb3JtLWxhYmVsLWxnIHtcbiAgZm9udC1zaXplOiAxcmVtO1xufVxuXG4uZm9ybS1sYWJlbC1zbSB7XG4gIGZvbnQtc2l6ZTogMC43NXJlbTtcbn1cblxuLmZvcm0tY29udHJvbDo6cGxhY2Vob2xkZXIge1xuICB0cmFuc2l0aW9uOiBhbGwgMC4yNXMgZWFzZTtcbn1cbi5mb3JtLWNvbnRyb2w6Zm9jdXM6OnBsYWNlaG9sZGVyIHtcbiAgdHJhbnNmb3JtOiB0cmFuc2xhdGUoNXB4KTtcbiAgdHJhbnNpdGlvbjogYWxsIDAuMjVzIGVhc2U7XG59XG5cbi5mb3JtLXNlbGVjdCB7XG4gIGJhY2tncm91bmQtY2xpcDogcGFkZGluZy1ib3g7XG59XG5cbi5mb3JtLXJhbmdlOjotd2Via2l0LXNsaWRlci10aHVtYiB7XG4gIGJveC1zaGFkb3c6IDAgMCA2cHggMCByZ2JhKDY3LCA4OSwgMTEzLCAwLjQpO1xuICB0cmFuc2l0aW9uOiB0cmFuc2Zvcm0gMC4ycztcbiAgdHJhbnNmb3JtLW9yaWdpbjogY2VudGVyO1xufVxuLmZvcm0tcmFuZ2U6Oi13ZWJraXQtc2xpZGVyLXRodW1iOmZvY3VzIHtcbiAgYm94LXNoYWRvdzogMCAwIDhweCAwcHggcmdiYSg2NywgODksIDExMywgMC40KTtcbn1cbi5mb3JtLXJhbmdlOjotd2Via2l0LXNsaWRlci10aHVtYjphY3RpdmUge1xuICB0cmFuc2Zvcm06IHNjYWxlKDEuNCwgMS40KTtcbn1cbi5mb3JtLXJhbmdlOjotbW96LXJhbmdlLXRodW1iIHtcbiAgYm94LXNoYWRvdzogMCAwIDZweCAwIHJnYmEoNjcsIDg5LCAxMTMsIDAuNCk7XG4gIHRyYW5zaXRpb246IHRyYW5zZm9ybSAwLjJzO1xuICB0cmFuc2Zvcm0tb3JpZ2luOiBjZW50ZXI7XG59XG4uZm9ybS1yYW5nZTo6LW1vei1yYW5nZS10aHVtYjpmb2N1cyB7XG4gIGJveC1zaGFkb3c6IDAgMCA4cHggMHB4IHJnYmEoNjcsIDg5LCAxMTMsIDAuNCk7XG59XG4uZm9ybS1yYW5nZTo6LW1vei1yYW5nZS10aHVtYjphY3RpdmUge1xuICB0cmFuc2Zvcm06IHNjYWxlKDEuNCwgMS40KTtcbn1cbi5mb3JtLXJhbmdlOmRpc2FibGVkOjotd2Via2l0LXNsaWRlci1ydW5uYWJsZS10cmFjayB7XG4gIGJhY2tncm91bmQtY29sb3I6IHJnYmEoNjcsIDg5LCAxMTMsIDAuMDUpO1xufVxuLmZvcm0tcmFuZ2U6ZGlzYWJsZWQ6Oi1tb3otcmFuZ2UtdHJhY2sge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjA1KTtcbiAgYm94LXNoYWRvdzogbm9uZTtcbn1cbi5mb3JtLXJhbmdlOmRpc2FibGVkOjotd2Via2l0LXNsaWRlci10aHVtYiB7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG59XG4uZm9ybS1yYW5nZTpkaXNhYmxlZDo6LW1vei1yYW5nZS10aHVtYiB7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG59XG5cbi5pbnB1dC1ncm91cDpmb2N1cy13aXRoaW4ge1xuICBib3gtc2hhZG93OiAwIDAgMC4yNXJlbSAwLjA1cmVtIHJnYmEoMTA1LCAxMDgsIDI1NSwgMC4xKTtcbn1cbi5pbnB1dC1ncm91cDpmb2N1cy13aXRoaW4gLmZvcm0tY29udHJvbCxcbi5pbnB1dC1ncm91cDpmb2N1cy13aXRoaW4gLmlucHV0LWdyb3VwLXRleHQge1xuICBib3gtc2hhZG93OiBub25lO1xufVxuLmlucHV0LWdyb3VwLmRpc2FibGVkIC5pbnB1dC1ncm91cC10ZXh0IHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2VjZWVmMTtcbn1cblxuLmlucHV0LWdyb3VwLXRleHQge1xuICBiYWNrZ3JvdW5kLWNsaXA6IHBhZGRpbmctYm94O1xufVxuLmlucHV0LWdyb3VwLXRleHQgaSB7XG4gIGZvbnQtc2l6ZTogMC45Mzc1cmVtO1xufVxuXG4uaW5wdXQtZ3JvdXAtbGcgPiAuaW5wdXQtZ3JvdXAtdGV4dCBpIHtcbiAgZm9udC1zaXplOiAxcmVtO1xufVxuXG4uaW5wdXQtZ3JvdXAtc20gPiAuaW5wdXQtZ3JvdXAtdGV4dCBpIHtcbiAgZm9udC1zaXplOiAwLjc1cmVtO1xufVxuXG4uaW5wdXQtZ3JvdXAtbWVyZ2UgLmlucHV0LWdyb3VwLXRleHQ6Zmlyc3QtY2hpbGQge1xuICBib3JkZXItcmlnaHQ6IDA7XG59XG4uaW5wdXQtZ3JvdXAtbWVyZ2UgLmlucHV0LWdyb3VwLXRleHQ6bGFzdC1jaGlsZCB7XG4gIGJvcmRlci1sZWZ0OiAwO1xufVxuLmlucHV0LWdyb3VwLW1lcmdlIC5mb3JtLWNvbnRyb2w6bm90KDpmaXJzdC1jaGlsZCkge1xuICBwYWRkaW5nLWxlZnQ6IDA7XG4gIGJvcmRlci1sZWZ0OiAwO1xufVxuLmlucHV0LWdyb3VwLW1lcmdlIC5mb3JtLWNvbnRyb2w6bm90KDpsYXN0LWNoaWxkKSB7XG4gIHBhZGRpbmctcmlnaHQ6IDA7XG4gIGJvcmRlci1yaWdodDogMDtcbn1cblxuLmlucHV0LWdyb3VwLXRleHQge1xuICB0cmFuc2l0aW9uOiBib3JkZXItY29sb3IgMC4xNXMgZWFzZS1pbi1vdXQsIGJveC1zaGFkb3cgMC4xNXMgZWFzZS1pbi1vdXQ7XG59XG5AbWVkaWEgKHByZWZlcnMtcmVkdWNlZC1tb3Rpb246IHJlZHVjZSkge1xuICAuaW5wdXQtZ3JvdXAtdGV4dCB7XG4gICAgdHJhbnNpdGlvbjogbm9uZTtcbiAgfVxufVxuXG4uZm9ybS1mbG9hdGluZyA+IC5mb3JtLWNvbnRyb2w6Zm9jdXM6OnBsYWNlaG9sZGVyLFxuLmZvcm0tZmxvYXRpbmcgPiAuZm9ybS1jb250cm9sOm5vdCg6cGxhY2Vob2xkZXItc2hvd24pOjpwbGFjZWhvbGRlciB7XG4gIGNvbG9yOiAjYjRiZGM2O1xufVxuXG4udmFsaWQtZmVlZGJhY2sge1xuICBkaXNwbGF5OiBub25lO1xuICB3aWR0aDogMTAwJTtcbiAgbWFyZ2luLXRvcDogMC4zcmVtO1xuICBmb250LXNpemU6IDg1JTtcbiAgY29sb3I6ICM3MWRkMzc7XG59XG5cbi52YWxpZC10b29sdGlwIHtcbiAgcG9zaXRpb246IGFic29sdXRlO1xuICB0b3A6IDEwMCU7XG4gIHotaW5kZXg6IDU7XG4gIGRpc3BsYXk6IG5vbmU7XG4gIG1heC13aWR0aDogMTAwJTtcbiAgcGFkZGluZzogMC4yNXJlbSAwLjdyZW07XG4gIG1hcmdpbi10b3A6IDAuMXJlbTtcbiAgZm9udC1zaXplOiAwLjkzNzVyZW07XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjNzFkZDM3O1xuICBib3JkZXItcmFkaXVzOiAwLjI1cmVtO1xufVxuXG4ud2FzLXZhbGlkYXRlZCA6dmFsaWQgfiAudmFsaWQtZmVlZGJhY2ssXG4ud2FzLXZhbGlkYXRlZCA6dmFsaWQgfiAudmFsaWQtdG9vbHRpcCxcbi5pcy12YWxpZCB+IC52YWxpZC1mZWVkYmFjayxcbi5pcy12YWxpZCB+IC52YWxpZC10b29sdGlwIHtcbiAgZGlzcGxheTogYmxvY2s7XG59XG5cbi53YXMtdmFsaWRhdGVkIC5mb3JtLWNvbnRyb2w6dmFsaWQsIC5mb3JtLWNvbnRyb2wuaXMtdmFsaWQge1xuICBib3JkZXItY29sb3I6ICM3MWRkMzc7XG59XG4uZGFyay1zdHlsZSAud2FzLXZhbGlkYXRlZCAuZm9ybS1jb250cm9sOnZhbGlkLCAuZGFyay1zdHlsZSAuZm9ybS1jb250cm9sLmlzLXZhbGlkIHtcbiAgYm9yZGVyLWNvbG9yOiAjNzFkZDM3ICFpbXBvcnRhbnQ7XG59XG4ud2FzLXZhbGlkYXRlZCAuZm9ybS1jb250cm9sOnZhbGlkOmZvY3VzLCAuZm9ybS1jb250cm9sLmlzLXZhbGlkOmZvY3VzIHtcbiAgYm9yZGVyLWNvbG9yOiAjNzFkZDM3O1xuICBib3gtc2hhZG93OiAwIDAgMC4yNXJlbSAwLjA1cmVtIHJnYmEoMTEzLCAyMjEsIDU1LCAwLjEpO1xufVxuXG4ud2FzLXZhbGlkYXRlZCAuZm9ybS1zZWxlY3Q6dmFsaWQsIC5mb3JtLXNlbGVjdC5pcy12YWxpZCB7XG4gIGJvcmRlci1jb2xvcjogIzcxZGQzNztcbn1cbi53YXMtdmFsaWRhdGVkIC5mb3JtLXNlbGVjdDp2YWxpZDpmb2N1cywgLmZvcm0tc2VsZWN0LmlzLXZhbGlkOmZvY3VzIHtcbiAgYm9yZGVyLWNvbG9yOiAjNzFkZDM3O1xuICBib3gtc2hhZG93OiAwIDAgMC4yNXJlbSAwLjA1cmVtIHJnYmEoMTEzLCAyMjEsIDU1LCAwLjEpO1xufVxuXG4ud2FzLXZhbGlkYXRlZCAuZm9ybS1jaGVjay1pbnB1dDp2YWxpZCwgLmZvcm0tY2hlY2staW5wdXQuaXMtdmFsaWQge1xuICBib3JkZXItY29sb3I6ICM3MWRkMzc7XG59XG4ud2FzLXZhbGlkYXRlZCAuZm9ybS1jaGVjay1pbnB1dDp2YWxpZDpjaGVja2VkLCAuZm9ybS1jaGVjay1pbnB1dC5pcy12YWxpZDpjaGVja2VkIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzcxZGQzNztcbiAgYm9yZGVyLWNvbG9yOiAjNzFkZDM3O1xufVxuLndhcy12YWxpZGF0ZWQgLmZvcm0tY2hlY2staW5wdXQ6dmFsaWQ6Zm9jdXMsIC5mb3JtLWNoZWNrLWlucHV0LmlzLXZhbGlkOmZvY3VzIHtcbiAgYm94LXNoYWRvdzogMCAwIDAuMjVyZW0gMC4wNXJlbSByZ2JhKDExMywgMjIxLCA1NSwgMC4xKTtcbiAgYm9yZGVyLWNvbG9yOiAjNzFkZDM3O1xufVxuLndhcy12YWxpZGF0ZWQgLmZvcm0tY2hlY2staW5wdXQ6dmFsaWQgfiAuZm9ybS1jaGVjay1sYWJlbCwgLmZvcm0tY2hlY2staW5wdXQuaXMtdmFsaWQgfiAuZm9ybS1jaGVjay1sYWJlbCB7XG4gIGNvbG9yOiAjNzFkZDM3O1xufVxuXG4uZm9ybS1jaGVjay1pbmxpbmUgLmZvcm0tY2hlY2staW5wdXQgfiAudmFsaWQtZmVlZGJhY2sge1xuICBtYXJnaW4tbGVmdDogMC41ZW07XG59XG5cbi53YXMtdmFsaWRhdGVkIC5pbnB1dC1ncm91cCAuZm9ybS1jb250cm9sOnZhbGlkIH4gLmlucHV0LWdyb3VwLXRleHQsIC5pbnB1dC1ncm91cCAuZm9ybS1jb250cm9sLmlzLXZhbGlkIH4gLmlucHV0LWdyb3VwLXRleHQge1xuICBib3JkZXItY29sb3I6ICM3MWRkMzc7XG59XG4ud2FzLXZhbGlkYXRlZCAuaW5wdXQtZ3JvdXAgLmZvcm0tY29udHJvbDp2YWxpZDpmb2N1cywgLmlucHV0LWdyb3VwIC5mb3JtLWNvbnRyb2wuaXMtdmFsaWQ6Zm9jdXMge1xuICBib3JkZXItY29sb3I6ICM3MWRkMzc7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG59XG4ud2FzLXZhbGlkYXRlZCAuaW5wdXQtZ3JvdXAgLmZvcm0tY29udHJvbDp2YWxpZDpmb2N1cyB+IC5pbnB1dC1ncm91cC10ZXh0LCAuaW5wdXQtZ3JvdXAgLmZvcm0tY29udHJvbC5pcy12YWxpZDpmb2N1cyB+IC5pbnB1dC1ncm91cC10ZXh0IHtcbiAgYm9yZGVyLWNvbG9yOiAjNzFkZDM3O1xufVxuXG4ud2FzLXZhbGlkYXRlZCAuaW5wdXQtZ3JvdXAgLmZvcm0tY29udHJvbDp2YWxpZCwgLmlucHV0LWdyb3VwIC5mb3JtLWNvbnRyb2wuaXMtdmFsaWQsXG4ud2FzLXZhbGlkYXRlZCAuaW5wdXQtZ3JvdXAgLmZvcm0tc2VsZWN0OnZhbGlkLFxuLmlucHV0LWdyb3VwIC5mb3JtLXNlbGVjdC5pcy12YWxpZCB7XG4gIHotaW5kZXg6IDM7XG59XG5cbi5pbnZhbGlkLWZlZWRiYWNrIHtcbiAgZGlzcGxheTogbm9uZTtcbiAgd2lkdGg6IDEwMCU7XG4gIG1hcmdpbi10b3A6IDAuM3JlbTtcbiAgZm9udC1zaXplOiA4NSU7XG4gIGNvbG9yOiAjZmYzZTFkO1xufVxuXG4uaW52YWxpZC10b29sdGlwIHtcbiAgcG9zaXRpb246IGFic29sdXRlO1xuICB0b3A6IDEwMCU7XG4gIHotaW5kZXg6IDU7XG4gIGRpc3BsYXk6IG5vbmU7XG4gIG1heC13aWR0aDogMTAwJTtcbiAgcGFkZGluZzogMC4yNXJlbSAwLjdyZW07XG4gIG1hcmdpbi10b3A6IDAuMXJlbTtcbiAgZm9udC1zaXplOiAwLjkzNzVyZW07XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmYzZTFkO1xuICBib3JkZXItcmFkaXVzOiAwLjI1cmVtO1xufVxuXG4ud2FzLXZhbGlkYXRlZCA6aW52YWxpZCB+IC5pbnZhbGlkLWZlZWRiYWNrLFxuLndhcy12YWxpZGF0ZWQgOmludmFsaWQgfiAuaW52YWxpZC10b29sdGlwLFxuLmlzLWludmFsaWQgfiAuaW52YWxpZC1mZWVkYmFjayxcbi5pcy1pbnZhbGlkIH4gLmludmFsaWQtdG9vbHRpcCB7XG4gIGRpc3BsYXk6IGJsb2NrO1xufVxuXG4ud2FzLXZhbGlkYXRlZCAuZm9ybS1jb250cm9sOmludmFsaWQsIC5mb3JtLWNvbnRyb2wuaXMtaW52YWxpZCB7XG4gIGJvcmRlci1jb2xvcjogI2ZmM2UxZDtcbn1cbi5kYXJrLXN0eWxlIC53YXMtdmFsaWRhdGVkIC5mb3JtLWNvbnRyb2w6aW52YWxpZCwgLmRhcmstc3R5bGUgLmZvcm0tY29udHJvbC5pcy1pbnZhbGlkIHtcbiAgYm9yZGVyLWNvbG9yOiAjZmYzZTFkICFpbXBvcnRhbnQ7XG59XG4ud2FzLXZhbGlkYXRlZCAuZm9ybS1jb250cm9sOmludmFsaWQ6Zm9jdXMsIC5mb3JtLWNvbnRyb2wuaXMtaW52YWxpZDpmb2N1cyB7XG4gIGJvcmRlci1jb2xvcjogI2ZmM2UxZDtcbiAgYm94LXNoYWRvdzogMCAwIDAuMjVyZW0gMC4wNXJlbSByZ2JhKDI1NSwgNjIsIDI5LCAwLjEpO1xufVxuXG4ud2FzLXZhbGlkYXRlZCAuZm9ybS1zZWxlY3Q6aW52YWxpZCwgLmZvcm0tc2VsZWN0LmlzLWludmFsaWQge1xuICBib3JkZXItY29sb3I6ICNmZjNlMWQ7XG59XG4ud2FzLXZhbGlkYXRlZCAuZm9ybS1zZWxlY3Q6aW52YWxpZDpmb2N1cywgLmZvcm0tc2VsZWN0LmlzLWludmFsaWQ6Zm9jdXMge1xuICBib3JkZXItY29sb3I6ICNmZjNlMWQ7XG4gIGJveC1zaGFkb3c6IDAgMCAwLjI1cmVtIDAuMDVyZW0gcmdiYSgyNTUsIDYyLCAyOSwgMC4xKTtcbn1cblxuLndhcy12YWxpZGF0ZWQgLmZvcm0tY2hlY2staW5wdXQ6aW52YWxpZCwgLmZvcm0tY2hlY2staW5wdXQuaXMtaW52YWxpZCB7XG4gIGJvcmRlci1jb2xvcjogI2ZmM2UxZDtcbn1cbi53YXMtdmFsaWRhdGVkIC5mb3JtLWNoZWNrLWlucHV0OmludmFsaWQ6Y2hlY2tlZCwgLmZvcm0tY2hlY2staW5wdXQuaXMtaW52YWxpZDpjaGVja2VkIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZmM2UxZDtcbiAgYm9yZGVyLWNvbG9yOiAjZmYzZTFkO1xufVxuLndhcy12YWxpZGF0ZWQgLmZvcm0tY2hlY2staW5wdXQ6aW52YWxpZDpmb2N1cywgLmZvcm0tY2hlY2staW5wdXQuaXMtaW52YWxpZDpmb2N1cyB7XG4gIGJveC1zaGFkb3c6IDAgMCAwLjI1cmVtIDAuMDVyZW0gcmdiYSgyNTUsIDYyLCAyOSwgMC4xKTtcbiAgYm9yZGVyLWNvbG9yOiAjZmYzZTFkO1xufVxuLndhcy12YWxpZGF0ZWQgLmZvcm0tY2hlY2staW5wdXQ6aW52YWxpZCB+IC5mb3JtLWNoZWNrLWxhYmVsLCAuZm9ybS1jaGVjay1pbnB1dC5pcy1pbnZhbGlkIH4gLmZvcm0tY2hlY2stbGFiZWwge1xuICBjb2xvcjogI2ZmM2UxZDtcbn1cblxuLmZvcm0tY2hlY2staW5saW5lIC5mb3JtLWNoZWNrLWlucHV0IH4gLmludmFsaWQtZmVlZGJhY2sge1xuICBtYXJnaW4tbGVmdDogMC41ZW07XG59XG5cbi53YXMtdmFsaWRhdGVkIC5pbnB1dC1ncm91cCAuZm9ybS1jb250cm9sOmludmFsaWQgfiAuaW5wdXQtZ3JvdXAtdGV4dCwgLmlucHV0LWdyb3VwIC5mb3JtLWNvbnRyb2wuaXMtaW52YWxpZCB+IC5pbnB1dC1ncm91cC10ZXh0IHtcbiAgYm9yZGVyLWNvbG9yOiAjZmYzZTFkO1xufVxuLndhcy12YWxpZGF0ZWQgLmlucHV0LWdyb3VwIC5mb3JtLWNvbnRyb2w6aW52YWxpZDpmb2N1cywgLmlucHV0LWdyb3VwIC5mb3JtLWNvbnRyb2wuaXMtaW52YWxpZDpmb2N1cyB7XG4gIGJvcmRlci1jb2xvcjogI2ZmM2UxZDtcbiAgYm94LXNoYWRvdzogbm9uZTtcbn1cbi53YXMtdmFsaWRhdGVkIC5pbnB1dC1ncm91cCAuZm9ybS1jb250cm9sOmludmFsaWQ6Zm9jdXMgfiAuaW5wdXQtZ3JvdXAtdGV4dCwgLmlucHV0LWdyb3VwIC5mb3JtLWNvbnRyb2wuaXMtaW52YWxpZDpmb2N1cyB+IC5pbnB1dC1ncm91cC10ZXh0IHtcbiAgYm9yZGVyLWNvbG9yOiAjZmYzZTFkO1xufVxuXG4ud2FzLXZhbGlkYXRlZCAuaW5wdXQtZ3JvdXAgLmZvcm0tY29udHJvbDppbnZhbGlkLCAuaW5wdXQtZ3JvdXAgLmZvcm0tY29udHJvbC5pcy1pbnZhbGlkLFxuLndhcy12YWxpZGF0ZWQgLmlucHV0LWdyb3VwIC5mb3JtLXNlbGVjdDppbnZhbGlkLFxuLmlucHV0LWdyb3VwIC5mb3JtLXNlbGVjdC5pcy1pbnZhbGlkIHtcbiAgei1pbmRleDogMztcbn1cblxuZm9ybSAuZXJyb3I6bm90KGxpKTpub3QoaW5wdXQpIHtcbiAgY29sb3I6ICNmZjNlMWQ7XG4gIGZvbnQtc2l6ZTogODUlO1xuICBtYXJnaW4tdG9wOiAwLjI1cmVtO1xufVxuZm9ybSAuaW52YWxpZCxcbmZvcm0gLmlzLWludmFsaWQgLmludmFsaWQ6YmVmb3JlLFxuZm9ybSAuaXMtaW52YWxpZDo6YmVmb3JlIHtcbiAgYm9yZGVyLWNvbG9yOiAjZmYzZTFkICFpbXBvcnRhbnQ7XG59XG5mb3JtIC5mb3JtLWxhYmVsLmludmFsaWQsIGZvcm0gLmZvcm0tbGFiZWwuaXMtaW52YWxpZCB7XG4gIGJvcmRlci1jb2xvcjogI2ZmM2UxZDtcbiAgYm94LXNoYWRvdzogMCAwIDAgMnB4IHJnYmEoMjU1LCA2MiwgMjksIDAuNCkgIWltcG9ydGFudDtcbn1cbmZvcm0gc2VsZWN0LmludmFsaWQgfiAuc2VsZWN0MiAuc2VsZWN0Mi1zZWxlY3Rpb24ge1xuICBib3JkZXItY29sb3I6ICNmZjNlMWQ7XG59XG5mb3JtIHNlbGVjdC5pcy1pbnZhbGlkIH4gLnNlbGVjdDIgLnNlbGVjdDItc2VsZWN0aW9uIHtcbiAgYm9yZGVyLWNvbG9yOiAjZmYzZTFkICFpbXBvcnRhbnQ7XG59XG5mb3JtIHNlbGVjdC5zZWxlY3RwaWNrZXIuaXMtaW52YWxpZCB+IC5idG4ge1xuICBib3JkZXItY29sb3I6IDFweCBzb2xpZCAjZmYzZTFkO1xuICBib3JkZXItY29sb3I6ICNmZjNlMWQ7XG59XG5cbi5tb2RhbC1jb250ZW50IHtcbiAgYm94LXNoYWRvdzogMCAycHggMTZweCAwIHJnYmEoNjcsIDg5LCAxMTMsIDAuNDUpO1xufVxuXG4ubW9kYWwgLmJ0bi1jbG9zZSB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNmZmY7XG4gIGJvcmRlci1yYWRpdXM6IDAuNXJlbTtcbiAgb3BhY2l0eTogMTtcbiAgcGFkZGluZzogMC42MzVyZW07XG4gIGJveC1zaGFkb3c6IDAgMC4xMjVyZW0gMC4yNXJlbSByZ2JhKDE2MSwgMTcyLCAxODQsIDAuNCk7XG4gIHRyYW5zaXRpb246IGFsbCAwLjIzcyBlYXNlIDAuMXM7XG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlKDIzcHgsIC0yNXB4KTtcbn1cbi5tb2RhbCAuYnRuLWNsb3NlOmhvdmVyLCAubW9kYWwgLmJ0bi1jbG9zZTpmb2N1cywgLm1vZGFsIC5idG4tY2xvc2U6YWN0aXZlIHtcbiAgb3BhY2l0eTogMTtcbiAgb3V0bGluZTogbm9uZTtcbiAgdHJhbnNmb3JtOiB0cmFuc2xhdGUoMjBweCwgLTIwcHgpO1xufVxuLm1vZGFsIC5tb2RhbC1oZWFkZXIgLmJ0bi1jbG9zZSB7XG4gIG1hcmdpbi10b3A6IC0xLjI1cmVtO1xufVxuXG4ubW9kYWwtZm9vdGVyIHtcbiAgcGFkZGluZzogMC4yNXJlbSAxLjVyZW0gMS41cmVtO1xufVxuXG4ubW9kYWwtZGlhbG9nLXNjcm9sbGFibGUgLmJ0bi1jbG9zZSxcbi5tb2RhbC1mdWxsc2NyZWVuIC5idG4tY2xvc2UsXG4ubW9kYWwtdG9wIC5idG4tY2xvc2Uge1xuICBib3gtc2hhZG93OiBub25lO1xuICB0cmFuc2Zvcm06IHRyYW5zbGF0ZSgwLCAwKSAhaW1wb3J0YW50O1xufVxuLm1vZGFsLWRpYWxvZy1zY3JvbGxhYmxlIC5idG4tY2xvc2U6aG92ZXIsXG4ubW9kYWwtZnVsbHNjcmVlbiAuYnRuLWNsb3NlOmhvdmVyLFxuLm1vZGFsLXRvcCAuYnRuLWNsb3NlOmhvdmVyIHtcbiAgdHJhbnNmb3JtOiB0cmFuc2xhdGUoMCwgMCkgIWltcG9ydGFudDtcbn1cblxuLm1vZGFsLXRvcCAubW9kYWwtZGlhbG9nIHtcbiAgbWFyZ2luLXRvcDogMDtcbn1cbi5tb2RhbC10b3AgLm1vZGFsLWNvbnRlbnQge1xuICBib3JkZXItdG9wLWxlZnQtcmFkaXVzOiAwO1xuICBib3JkZXItdG9wLXJpZ2h0LXJhZGl1czogMDtcbn1cblxuQG1lZGlhIChtYXgtd2lkdGg6IDk5MS45OHB4KSB7XG4gIC5tb2RhbC1vbmJvYXJkaW5nIC5vbmJvYXJkaW5nLWhvcml6b250YWwge1xuICAgIGZsZXgtZGlyZWN0aW9uOiBjb2x1bW47XG4gIH1cbn1cbkBtZWRpYSAobWF4LXdpZHRoOiA3NjcuOThweCkge1xuICAubW9kYWwgLm1vZGFsLWRpYWxvZzpub3QoLm1vZGFsLWZ1bGxzY3JlZW4pIHtcbiAgICBwYWRkaW5nOiAwIDAuNzVyZW07XG4gICAgcGFkZGluZy1sZWZ0OiAwLjc1cmVtICFpbXBvcnRhbnQ7XG4gIH1cbiAgLm1vZGFsIC5jYXJvdXNlbC1jb250cm9sLXByZXYsXG4ubW9kYWwgLmNhcm91c2VsLWNvbnRyb2wtbmV4dCB7XG4gICAgZGlzcGxheTogbm9uZTtcbiAgfVxufVxuQG1lZGlhIChtaW4td2lkdGg6IDU3NnB4KSB7XG4gIC5tb2RhbC1jb250ZW50IHtcbiAgICBib3gtc2hhZG93OiAwIDJweCAyMHB4IDAgcmdiYSg2NywgODksIDExMywgMC40NSk7XG4gIH1cblxuICAubW9kYWwtc20gLm1vZGFsLWRpYWxvZyB7XG4gICAgbWF4LXdpZHRoOiAyMi41cmVtO1xuICB9XG59XG5AbWVkaWEgKG1pbi13aWR0aDogMTIwMHB4KSB7XG4gIC5tb2RhbC14bCAubW9kYWwtZGlhbG9nIHtcbiAgICBtYXgtd2lkdGg6IDExNDBweDtcbiAgfVxufVxuLnByb2dyZXNzIHtcbiAgb3ZlcmZsb3c6IGluaXRpYWw7XG59XG5cbi5wcm9ncmVzcy1iYXIuYmctc2Vjb25kYXJ5IHtcbiAgYm94LXNoYWRvdzogMCAycHggNHB4IDAgcmdiYSgxMzMsIDE0NiwgMTYzLCAwLjQpO1xufVxuXG4ucHJvZ3Jlc3MtYmFyLmJnLXN1Y2Nlc3Mge1xuICBib3gtc2hhZG93OiAwIDJweCA0cHggMCByZ2JhKDExMywgMjIxLCA1NSwgMC40KTtcbn1cblxuLnByb2dyZXNzLWJhci5iZy1pbmZvIHtcbiAgYm94LXNoYWRvdzogMCAycHggNHB4IDAgcmdiYSgzLCAxOTUsIDIzNiwgMC40KTtcbn1cblxuLnByb2dyZXNzLWJhci5iZy13YXJuaW5nIHtcbiAgYm94LXNoYWRvdzogMCAycHggNHB4IDAgcmdiYSgyNTUsIDE3MSwgMCwgMC40KTtcbn1cblxuLnByb2dyZXNzLWJhci5iZy1kYW5nZXIge1xuICBib3gtc2hhZG93OiAwIDJweCA0cHggMCByZ2JhKDI1NSwgNjIsIDI5LCAwLjQpO1xufVxuXG4ucHJvZ3Jlc3MtYmFyLmJnLWxpZ2h0IHtcbiAgYm94LXNoYWRvdzogMCAycHggNHB4IDAgcmdiYSgyNTIsIDI1MywgMjUzLCAwLjQpO1xufVxuXG4ucHJvZ3Jlc3MtYmFyLmJnLWRhcmsge1xuICBib3gtc2hhZG93OiAwIDJweCA0cHggMCByZ2JhKDM1LCA1MiwgNzAsIDAuNCk7XG59XG5cbi5wcm9ncmVzcy1iYXIuYmctZ3JheSB7XG4gIGJveC1zaGFkb3c6IDAgMnB4IDRweCAwIHJnYmEoNjcsIDg5LCAxMTMsIDAuNCk7XG59XG5cbi5wcm9ncmVzcy1iYXItc3RyaXBlZCB7XG4gIGJhY2tncm91bmQtaW1hZ2U6IGxpbmVhci1ncmFkaWVudCg0NWRlZywgcmdiYSgyNTUsIDI1NSwgMjU1LCAwLjA3KSAyNSUsIHRyYW5zcGFyZW50IDI1JSwgdHJhbnNwYXJlbnQgNTAlLCByZ2JhKDI1NSwgMjU1LCAyNTUsIDAuMDcpIDUwJSwgcmdiYSgyNTUsIDI1NSwgMjU1LCAwLjA3KSA3NSUsIHRyYW5zcGFyZW50IDc1JSwgdHJhbnNwYXJlbnQpO1xufVxuXG4ucHJvZ3Jlc3MgLnByb2dyZXNzLWJhcjpsYXN0LWNoaWxkIHtcbiAgYm9yZGVyLXRvcC1yaWdodC1yYWRpdXM6IDEwcmVtO1xuICBib3JkZXItYm90dG9tLXJpZ2h0LXJhZGl1czogMTByZW07XG59XG4ucHJvZ3Jlc3MgLnByb2dyZXNzLWJhcjpmaXJzdC1jaGlsZCB7XG4gIGJvcmRlci10b3AtbGVmdC1yYWRpdXM6IDEwcmVtO1xuICBib3JkZXItYm90dG9tLWxlZnQtcmFkaXVzOiAxMHJlbTtcbn1cblxuLmJyZWFkY3J1bWItaXRlbSxcbi5icmVhZGNydW1iLWl0ZW0gYSB7XG4gIGNvbG9yOiAjNjk3YThkO1xufVxuLmJyZWFkY3J1bWItaXRlbTpob3ZlciwgLmJyZWFkY3J1bWItaXRlbTpmb2N1cyxcbi5icmVhZGNydW1iLWl0ZW0gYTpob3Zlcixcbi5icmVhZGNydW1iLWl0ZW0gYTpmb2N1cyB7XG4gIGNvbG9yOiAjNjk3YThkO1xufVxuLmJyZWFkY3J1bWItaXRlbS5hY3RpdmUsXG4uYnJlYWRjcnVtYi1pdGVtIGEuYWN0aXZlIHtcbiAgZm9udC13ZWlnaHQ6IDYwMDtcbn1cbi5icmVhZGNydW1iLWl0ZW0uYWN0aXZlOjpiZWZvcmUsXG4uYnJlYWRjcnVtYi1pdGVtIGEuYWN0aXZlOjpiZWZvcmUge1xuICBmb250LXdlaWdodDogNDAwO1xufVxuXG4uYnJlYWRjcnVtYi1pdGVtLmFjdGl2ZSBhLCAuYnJlYWRjcnVtYi1pdGVtLmFjdGl2ZSBhOmhvdmVyLCAuYnJlYWRjcnVtYi1pdGVtLmFjdGl2ZSBhOmZvY3VzLCAuYnJlYWRjcnVtYi1pdGVtLmFjdGl2ZSBhOmFjdGl2ZSB7XG4gIGNvbG9yOiBpbmhlcml0O1xufVxuXG4uYnJlYWRjcnVtYi1zdHlsZTEgLmJyZWFkY3J1bWItaXRlbSArIC5icmVhZGNydW1iLWl0ZW06OmJlZm9yZSxcbi5icmVhZGNydW1iLXN0eWxlMiAuYnJlYWRjcnVtYi1pdGVtICsgLmJyZWFkY3J1bWItaXRlbTo6YmVmb3JlIHtcbiAgZm9udC1mYW1pbHk6IGJveGljb25zO1xuICB2ZXJ0aWNhbC1hbGlnbjogbWlkZGxlO1xufVxuXG4uYnJlYWRjcnVtYi1zdHlsZTEgLmJyZWFkY3J1bWItaXRlbSArIC5icmVhZGNydW1iLWl0ZW06OmJlZm9yZSB7XG4gIGNvbnRlbnQ6IFwiXFxlY2IzXCI7XG4gIGZvbnQtc2l6ZTogMS4xMjVyZW07XG4gIGxpbmUtaGVpZ2h0OiAxLjQ7XG59XG5cbi5icmVhZGNydW1iLXN0eWxlMiAuYnJlYWRjcnVtYi1pdGVtICsgLmJyZWFkY3J1bWItaXRlbTo6YmVmb3JlIHtcbiAgY29udGVudDogXCJcXGVlNGFcIjtcbiAgZm9udC1zaXplOiAxcmVtO1xuICBsaW5lLWhlaWdodDogMS4zNXJlbTtcbn1cblxuLmxpc3QtZ3JvdXAtaXRlbS1zZWNvbmRhcnkge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZTdlOWVkO1xuICBjb2xvcjogIzg1OTJhMyAhaW1wb3J0YW50O1xufVxuXG5hLmxpc3QtZ3JvdXAtaXRlbS1zZWNvbmRhcnksXG5idXR0b24ubGlzdC1ncm91cC1pdGVtLXNlY29uZGFyeSB7XG4gIGNvbG9yOiAjODU5MmEzO1xufVxuYS5saXN0LWdyb3VwLWl0ZW0tc2Vjb25kYXJ5OmhvdmVyLCBhLmxpc3QtZ3JvdXAtaXRlbS1zZWNvbmRhcnk6Zm9jdXMsXG5idXR0b24ubGlzdC1ncm91cC1pdGVtLXNlY29uZGFyeTpob3ZlcixcbmJ1dHRvbi5saXN0LWdyb3VwLWl0ZW0tc2Vjb25kYXJ5OmZvY3VzIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2RiZGRlMTtcbiAgY29sb3I6ICM4NTkyYTM7XG59XG5hLmxpc3QtZ3JvdXAtaXRlbS1zZWNvbmRhcnkuYWN0aXZlLFxuYnV0dG9uLmxpc3QtZ3JvdXAtaXRlbS1zZWNvbmRhcnkuYWN0aXZlIHtcbiAgYm9yZGVyLWNvbG9yOiAjODU5MmEzO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjODU5MmEzO1xuICBjb2xvcjogIzg1OTJhMztcbn1cblxuLmxpc3QtZ3JvdXAtaXRlbS1zdWNjZXNzIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2UzZjhkNztcbiAgY29sb3I6ICM3MWRkMzcgIWltcG9ydGFudDtcbn1cblxuYS5saXN0LWdyb3VwLWl0ZW0tc3VjY2VzcyxcbmJ1dHRvbi5saXN0LWdyb3VwLWl0ZW0tc3VjY2VzcyB7XG4gIGNvbG9yOiAjNzFkZDM3O1xufVxuYS5saXN0LWdyb3VwLWl0ZW0tc3VjY2Vzczpob3ZlciwgYS5saXN0LWdyb3VwLWl0ZW0tc3VjY2Vzczpmb2N1cyxcbmJ1dHRvbi5saXN0LWdyb3VwLWl0ZW0tc3VjY2Vzczpob3ZlcixcbmJ1dHRvbi5saXN0LWdyb3VwLWl0ZW0tc3VjY2Vzczpmb2N1cyB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNkOGVjY2M7XG4gIGNvbG9yOiAjNzFkZDM3O1xufVxuYS5saXN0LWdyb3VwLWl0ZW0tc3VjY2Vzcy5hY3RpdmUsXG5idXR0b24ubGlzdC1ncm91cC1pdGVtLXN1Y2Nlc3MuYWN0aXZlIHtcbiAgYm9yZGVyLWNvbG9yOiAjNzFkZDM3O1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjNzFkZDM3O1xuICBjb2xvcjogIzcxZGQzNztcbn1cblxuLmxpc3QtZ3JvdXAtaXRlbS1pbmZvIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2NkZjNmYjtcbiAgY29sb3I6ICMwM2MzZWMgIWltcG9ydGFudDtcbn1cblxuYS5saXN0LWdyb3VwLWl0ZW0taW5mbyxcbmJ1dHRvbi5saXN0LWdyb3VwLWl0ZW0taW5mbyB7XG4gIGNvbG9yOiAjMDNjM2VjO1xufVxuYS5saXN0LWdyb3VwLWl0ZW0taW5mbzpob3ZlciwgYS5saXN0LWdyb3VwLWl0ZW0taW5mbzpmb2N1cyxcbmJ1dHRvbi5saXN0LWdyb3VwLWl0ZW0taW5mbzpob3ZlcixcbmJ1dHRvbi5saXN0LWdyb3VwLWl0ZW0taW5mbzpmb2N1cyB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNjM2U3ZWU7XG4gIGNvbG9yOiAjMDNjM2VjO1xufVxuYS5saXN0LWdyb3VwLWl0ZW0taW5mby5hY3RpdmUsXG5idXR0b24ubGlzdC1ncm91cC1pdGVtLWluZm8uYWN0aXZlIHtcbiAgYm9yZGVyLWNvbG9yOiAjMDNjM2VjO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMDNjM2VjO1xuICBjb2xvcjogIzAzYzNlYztcbn1cblxuLmxpc3QtZ3JvdXAtaXRlbS13YXJuaW5nIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZmZWVjYztcbiAgY29sb3I6ICNmZmFiMDAgIWltcG9ydGFudDtcbn1cblxuYS5saXN0LWdyb3VwLWl0ZW0td2FybmluZyxcbmJ1dHRvbi5saXN0LWdyb3VwLWl0ZW0td2FybmluZyB7XG4gIGNvbG9yOiAjZmZhYjAwO1xufVxuYS5saXN0LWdyb3VwLWl0ZW0td2FybmluZzpob3ZlciwgYS5saXN0LWdyb3VwLWl0ZW0td2FybmluZzpmb2N1cyxcbmJ1dHRvbi5saXN0LWdyb3VwLWl0ZW0td2FybmluZzpob3ZlcixcbmJ1dHRvbi5saXN0LWdyb3VwLWl0ZW0td2FybmluZzpmb2N1cyB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNmMmUyYzI7XG4gIGNvbG9yOiAjZmZhYjAwO1xufVxuYS5saXN0LWdyb3VwLWl0ZW0td2FybmluZy5hY3RpdmUsXG5idXR0b24ubGlzdC1ncm91cC1pdGVtLXdhcm5pbmcuYWN0aXZlIHtcbiAgYm9yZGVyLWNvbG9yOiAjZmZhYjAwO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZhYjAwO1xuICBjb2xvcjogI2ZmYWIwMDtcbn1cblxuLmxpc3QtZ3JvdXAtaXRlbS1kYW5nZXIge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZkOGQyO1xuICBjb2xvcjogI2ZmM2UxZCAhaW1wb3J0YW50O1xufVxuXG5hLmxpc3QtZ3JvdXAtaXRlbS1kYW5nZXIsXG5idXR0b24ubGlzdC1ncm91cC1pdGVtLWRhbmdlciB7XG4gIGNvbG9yOiAjZmYzZTFkO1xufVxuYS5saXN0LWdyb3VwLWl0ZW0tZGFuZ2VyOmhvdmVyLCBhLmxpc3QtZ3JvdXAtaXRlbS1kYW5nZXI6Zm9jdXMsXG5idXR0b24ubGlzdC1ncm91cC1pdGVtLWRhbmdlcjpob3ZlcixcbmJ1dHRvbi5saXN0LWdyb3VwLWl0ZW0tZGFuZ2VyOmZvY3VzIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2YyY2RjODtcbiAgY29sb3I6ICNmZjNlMWQ7XG59XG5hLmxpc3QtZ3JvdXAtaXRlbS1kYW5nZXIuYWN0aXZlLFxuYnV0dG9uLmxpc3QtZ3JvdXAtaXRlbS1kYW5nZXIuYWN0aXZlIHtcbiAgYm9yZGVyLWNvbG9yOiAjZmYzZTFkO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmYzZTFkO1xuICBjb2xvcjogI2ZmM2UxZDtcbn1cblxuLmxpc3QtZ3JvdXAtaXRlbS1kYXJrIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2QzZDZkYTtcbiAgY29sb3I6ICMyMzM0NDYgIWltcG9ydGFudDtcbn1cblxuYS5saXN0LWdyb3VwLWl0ZW0tZGFyayxcbmJ1dHRvbi5saXN0LWdyb3VwLWl0ZW0tZGFyayB7XG4gIGNvbG9yOiAjMjMzNDQ2O1xufVxuYS5saXN0LWdyb3VwLWl0ZW0tZGFyazpob3ZlciwgYS5saXN0LWdyb3VwLWl0ZW0tZGFyazpmb2N1cyxcbmJ1dHRvbi5saXN0LWdyb3VwLWl0ZW0tZGFyazpob3ZlcixcbmJ1dHRvbi5saXN0LWdyb3VwLWl0ZW0tZGFyazpmb2N1cyB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNjOGNiY2Y7XG4gIGNvbG9yOiAjMjMzNDQ2O1xufVxuYS5saXN0LWdyb3VwLWl0ZW0tZGFyay5hY3RpdmUsXG5idXR0b24ubGlzdC1ncm91cC1pdGVtLWRhcmsuYWN0aXZlIHtcbiAgYm9yZGVyLWNvbG9yOiAjMjMzNDQ2O1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMjMzNDQ2O1xuICBjb2xvcjogIzIzMzQ0Njtcbn1cblxuLmxpc3QtZ3JvdXAtaXRlbS1ncmF5IHtcbiAgYmFja2dyb3VuZC1jb2xvcjogcmdiYSgyNTMsIDI1MywgMjUzLCAwLjgyKTtcbiAgY29sb3I6IHJnYmEoNjcsIDg5LCAxMTMsIDAuMSkgIWltcG9ydGFudDtcbn1cblxuYS5saXN0LWdyb3VwLWl0ZW0tZ3JheSxcbmJ1dHRvbi5saXN0LWdyb3VwLWl0ZW0tZ3JheSB7XG4gIGNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjEpO1xufVxuYS5saXN0LWdyb3VwLWl0ZW0tZ3JheTpob3ZlciwgYS5saXN0LWdyb3VwLWl0ZW0tZ3JheTpmb2N1cyxcbmJ1dHRvbi5saXN0LWdyb3VwLWl0ZW0tZ3JheTpob3ZlcixcbmJ1dHRvbi5saXN0LWdyb3VwLWl0ZW0tZ3JheTpmb2N1cyB7XG4gIGJhY2tncm91bmQtY29sb3I6IHJnYmEoMjM1LCAyMzUsIDIzNSwgMC44MjkpO1xuICBjb2xvcjogcmdiYSg2NywgODksIDExMywgMC4xKTtcbn1cbmEubGlzdC1ncm91cC1pdGVtLWdyYXkuYWN0aXZlLFxuYnV0dG9uLmxpc3QtZ3JvdXAtaXRlbS1ncmF5LmFjdGl2ZSB7XG4gIGJvcmRlci1jb2xvcjogcmdiYSg2NywgODksIDExMywgMC4xKTtcbiAgYmFja2dyb3VuZC1jb2xvcjogcmdiYSg2NywgODksIDExMywgMC4xKTtcbiAgY29sb3I6IHJnYmEoNjcsIDg5LCAxMTMsIDAuMSk7XG59XG5cbi5saXN0LWdyb3VwLmxpc3QtZ3JvdXAtdGltZWxpbmUge1xuICBwb3NpdGlvbjogcmVsYXRpdmU7XG59XG4ubGlzdC1ncm91cC5saXN0LWdyb3VwLXRpbWVsaW5lOmJlZm9yZSB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNkOWRlZTM7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgY29udGVudDogXCJcIjtcbiAgd2lkdGg6IDFweDtcbiAgaGVpZ2h0OiAxMDAlO1xuICB0b3A6IDA7XG4gIGJvdHRvbTogMDtcbiAgbGVmdDogMC4ycmVtO1xufVxuLmxpc3QtZ3JvdXAubGlzdC1ncm91cC10aW1lbGluZSAubGlzdC1ncm91cC1pdGVtIHtcbiAgYm9yZGVyOiBub25lO1xuICBwYWRkaW5nLWxlZnQ6IDEuMjVyZW07XG59XG4ubGlzdC1ncm91cC5saXN0LWdyb3VwLXRpbWVsaW5lIC5saXN0LWdyb3VwLWl0ZW06YmVmb3JlIHtcbiAgcG9zaXRpb246IGFic29sdXRlO1xuICBkaXNwbGF5OiBibG9jaztcbiAgY29udGVudDogXCJcIjtcbiAgd2lkdGg6IDdweDtcbiAgaGVpZ2h0OiA3cHg7XG4gIGxlZnQ6IDA7XG4gIHRvcDogNTAlO1xuICBtYXJnaW4tdG9wOiAtMy41cHg7XG4gIGJvcmRlci1yYWRpdXM6IDEwMCU7XG59XG4ubGlzdC1ncm91cCAubGlzdC1ncm91cC1pdGVtLmFjdGl2ZSBoMSxcbi5saXN0LWdyb3VwIC5saXN0LWdyb3VwLWl0ZW0uYWN0aXZlIC5oMSxcbi5saXN0LWdyb3VwIC5saXN0LWdyb3VwLWl0ZW0uYWN0aXZlIGgyLFxuLmxpc3QtZ3JvdXAgLmxpc3QtZ3JvdXAtaXRlbS5hY3RpdmUgLmgyLFxuLmxpc3QtZ3JvdXAgLmxpc3QtZ3JvdXAtaXRlbS5hY3RpdmUgaDMsXG4ubGlzdC1ncm91cCAubGlzdC1ncm91cC1pdGVtLmFjdGl2ZSAuaDMsXG4ubGlzdC1ncm91cCAubGlzdC1ncm91cC1pdGVtLmFjdGl2ZSBoNCxcbi5saXN0LWdyb3VwIC5saXN0LWdyb3VwLWl0ZW0uYWN0aXZlIC5oNCxcbi5saXN0LWdyb3VwIC5saXN0LWdyb3VwLWl0ZW0uYWN0aXZlIGg1LFxuLmxpc3QtZ3JvdXAgLmxpc3QtZ3JvdXAtaXRlbS5hY3RpdmUgLmg1LFxuLmxpc3QtZ3JvdXAgLmxpc3QtZ3JvdXAtaXRlbS5hY3RpdmUgaDYsXG4ubGlzdC1ncm91cCAubGlzdC1ncm91cC1pdGVtLmFjdGl2ZSAuaDYge1xuICBjb2xvcjogI2ZmZjtcbn1cblxuLm5hdmJhciB7XG4gIHotaW5kZXg6IDI7XG59XG4ubmF2YmFyIC5kcm9wZG93bjpmb2N1cyxcbi5uYXZiYXIgLmRyb3Bkb3duLXRvZ2dsZTpmb2N1cyB7XG4gIG91dGxpbmU6IDA7XG59XG4ubmF2YmFyIC5uYXZiYXItdG9nZ2xlciB7XG4gIGJvcmRlcjogbm9uZTtcbn1cbi5uYXZiYXIgLm5hdmJhci10b2dnbGVyOmZvY3VzIHtcbiAgYm94LXNoYWRvdzogbm9uZTtcbn1cblxuLmZpeGVkLXRvcCB7XG4gIHotaW5kZXg6IDEwMzA7XG59XG5cbi5uYXZiYXIubmF2YmFyLWxpZ2h0IHtcbiAgY29sb3I6IHJnYmEoNjcsIDg5LCAxMTMsIDAuNSk7XG59XG5cbi5uYXZiYXItbGlnaHQgLm5hdmJhci1uYXYgLm5hdi1saW5rLmRpc2FibGVkIHtcbiAgY29sb3I6IHJnYmEoNjcsIDg5LCAxMTMsIDAuMykgIWltcG9ydGFudDtcbn1cblxuLm5hdmJhci5uYXZiYXItZGFyayB7XG4gIGNvbG9yOiByZ2JhKDI1NSwgMjU1LCAyNTUsIDAuOCk7XG59XG5cbi5uYXZiYXItZGFyayAubmF2YmFyLW5hdiAubmF2LWxpbmsuZGlzYWJsZWQge1xuICBjb2xvcjogcmdiYSgyNTUsIDI1NSwgMjU1LCAwLjQpICFpbXBvcnRhbnQ7XG59XG5cbi5uYXZiYXItY29sbGFwc2UsXG4ubmF2YmFyLWJyYW5kLFxuLm5hdmJhci10ZXh0IHtcbiAgZmxleC1zaHJpbms6IDE7XG59XG5cbi5uYXZiYXItZGFyayBociB7XG4gIGJvcmRlci1jb2xvcjogcmdiYSgyNTUsIDI1NSwgMjU1LCAwLjEpO1xufVxuXG4ubmF2YmFyLWxpZ2h0IGhyIHtcbiAgYm9yZGVyLWNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjEpO1xufVxuXG4uY2FyZCB7XG4gIGJhY2tncm91bmQtY2xpcDogcGFkZGluZy1ib3g7XG4gIGJveC1zaGFkb3c6IDAgMnB4IDZweCAwIHJnYmEoNjcsIDg5LCAxMTMsIDAuMTIpO1xufVxuLmNhcmQgLmNhcmQtbGluayB7XG4gIGRpc3BsYXk6IGlubGluZS1ibG9jaztcbn1cbi5jYXJkIC5jYXJkLWhlYWRlciArIC5jYXJkLWJvZHksXG4uY2FyZCAuY2FyZC1oZWFkZXIgKyAuY2FyZC1jb250ZW50ID4gLmNhcmQtYm9keTpmaXJzdC1vZi10eXBlIHtcbiAgcGFkZGluZy10b3A6IDA7XG59XG5cbi5jYXJkLWFjdGlvbi5jYXJkLWZ1bGxzY3JlZW4ge1xuICBkaXNwbGF5OiBibG9jaztcbiAgei1pbmRleDogOTk5OTtcbiAgcG9zaXRpb246IGZpeGVkO1xuICB3aWR0aDogMTAwJSAhaW1wb3J0YW50O1xuICBoZWlnaHQ6IDEwMCUgIWltcG9ydGFudDtcbiAgdG9wOiAwO1xuICByaWdodDogMDtcbiAgbGVmdDogMDtcbiAgYm90dG9tOiAwO1xuICBvdmVyZmxvdzogYXV0bztcbiAgYm9yZGVyOiBub25lO1xuICBib3JkZXItcmFkaXVzOiAwO1xufVxuLmNhcmQtYWN0aW9uIC5jYXJkLWFsZXJ0IHtcbiAgcG9zaXRpb246IGFic29sdXRlO1xuICB3aWR0aDogMTAwJTtcbiAgei1pbmRleDogOTk5O1xufVxuLmNhcmQtYWN0aW9uIC5jYXJkLWFsZXJ0IC5hbGVydCB7XG4gIGJvcmRlci1ib3R0b20tcmlnaHQtcmFkaXVzOiAwcHg7XG4gIGJvcmRlci1ib3R0b20tbGVmdC1yYWRpdXM6IDBweDtcbn1cbi5jYXJkLWFjdGlvbiAuY2FyZC1oZWFkZXIuY29sbGFwc2VkIHtcbiAgYm9yZGVyLWJvdHRvbTogMDtcbn1cbi5jYXJkLWFjdGlvbiAuY2FyZC1oZWFkZXIge1xuICBkaXNwbGF5OiBmbGV4O1xuICBsaW5lLWhlaWdodDogMS41NDtcbn1cbi5jYXJkLWFjdGlvbiAuY2FyZC1oZWFkZXIgLmNhcmQtYWN0aW9uLXRpdGxlIHtcbiAgZmxleC1ncm93OiAxO1xuICBtYXJnaW4tcmlnaHQ6IDAuNXJlbTtcbn1cbi5jYXJkLWFjdGlvbiAuY2FyZC1oZWFkZXIgLmNhcmQtYWN0aW9uLWVsZW1lbnQge1xuICBmbGV4LXNocmluazogMDtcbiAgYmFja2dyb3VuZC1jb2xvcjogaW5oZXJpdDtcbiAgdG9wOiAxcmVtO1xuICByaWdodDogMS41cmVtO1xuICBjb2xvcjogIzY5N2E4ZDtcbn1cbi5jYXJkLWFjdGlvbiAuY2FyZC1oZWFkZXIgLmNhcmQtYWN0aW9uLWVsZW1lbnQgYSB7XG4gIGNvbG9yOiAjNjk3YThkO1xufVxuLmNhcmQtYWN0aW9uIC5jYXJkLWhlYWRlciAuY2FyZC1hY3Rpb24tZWxlbWVudCBhIC5jb2xsYXBzZS1pY29uOjphZnRlciB7XG4gIG1hcmdpbi10b3A6IC0wLjE1cmVtO1xufVxuLmNhcmQtYWN0aW9uIC5ibG9ja1VJIC5zay1mb2xkIHtcbiAgbWFyZ2luOiAwIGF1dG87XG59XG4uY2FyZC1hY3Rpb24gLmJsb2NrVUkgaDUsIC5jYXJkLWFjdGlvbiAuYmxvY2tVSSAuaDUge1xuICBjb2xvcjogIzY5N2E4ZDtcbiAgbWFyZ2luOiAxcmVtIDAgMCAwO1xufVxuXG4uY2FyZC1oZWFkZXIsXG4uY2FyZC1mb290ZXIge1xuICBib3JkZXItY29sb3I6ICNkOWRlZTM7XG59XG5cbi5jYXJkIGhyIHtcbiAgY29sb3I6ICNkOWRlZTM7XG59XG5cbi5jYXJkIC5yb3ctYm9yZGVyZWQgPiBbY2xhc3MqPVwiIGNvbCBcIl0gLmNhcmQgLnJvdy1ib3JkZXJlZCA+IFtjbGFzcyQ9XCIgY29sXCJdLCAuY2FyZCAucm93LWJvcmRlcmVkID4gW2NsYXNzKj1cIiBjb2wgXCJdOjpiZWZvcmUsIC5jYXJkIC5yb3ctYm9yZGVyZWQgPiBbY2xhc3MqPVwiIGNvbCBcIl06OmFmdGVyLFxuLmNhcmQgLnJvdy1ib3JkZXJlZCA+IFtjbGFzc149XCJjb2wgXCJdIC5jYXJkIC5yb3ctYm9yZGVyZWQgPiBbY2xhc3MkPVwiIGNvbFwiXSxcbi5jYXJkIC5yb3ctYm9yZGVyZWQgPiBbY2xhc3NePVwiY29sIFwiXTo6YmVmb3JlLFxuLmNhcmQgLnJvdy1ib3JkZXJlZCA+IFtjbGFzc149XCJjb2wgXCJdOjphZnRlcixcbi5jYXJkIC5yb3ctYm9yZGVyZWQgPiBbY2xhc3MqPVwiIGNvbC1cIl0gLmNhcmQgLnJvdy1ib3JkZXJlZCA+IFtjbGFzcyQ9XCIgY29sXCJdLFxuLmNhcmQgLnJvdy1ib3JkZXJlZCA+IFtjbGFzcyo9XCIgY29sLVwiXTo6YmVmb3JlLFxuLmNhcmQgLnJvdy1ib3JkZXJlZCA+IFtjbGFzcyo9XCIgY29sLVwiXTo6YWZ0ZXIsXG4uY2FyZCAucm93LWJvcmRlcmVkID4gW2NsYXNzXj1jb2wtXSAuY2FyZCAucm93LWJvcmRlcmVkID4gW2NsYXNzJD1cIiBjb2xcIl0sXG4uY2FyZCAucm93LWJvcmRlcmVkID4gW2NsYXNzXj1jb2wtXTo6YmVmb3JlLFxuLmNhcmQgLnJvdy1ib3JkZXJlZCA+IFtjbGFzc149Y29sLV06OmFmdGVyLFxuLmNhcmQgLnJvdy1ib3JkZXJlZCA+IFtjbGFzcz1jb2xdIC5jYXJkIC5yb3ctYm9yZGVyZWQgPiBbY2xhc3MkPVwiIGNvbFwiXSxcbi5jYXJkIC5yb3ctYm9yZGVyZWQgPiBbY2xhc3M9Y29sXTo6YmVmb3JlLFxuLmNhcmQgLnJvdy1ib3JkZXJlZCA+IFtjbGFzcz1jb2xdOjphZnRlciB7XG4gIGJvcmRlci1jb2xvcjogI2Q5ZGVlMztcbn1cblxuLmNhcmQtaGVhZGVyLmhlYWRlci1lbGVtZW50cyxcbi5jYXJkLXRpdGxlLmhlYWRlci1lbGVtZW50cyB7XG4gIGRpc3BsYXk6IGZsZXg7XG4gIHdpZHRoOiAxMDAlO1xuICBhbGlnbi1pdGVtczogY2VudGVyO1xuICBmbGV4LXdyYXA6IHdyYXA7XG59XG5cbi5jYXJkLWhlYWRlci5jYXJkLWhlYWRlci1lbGVtZW50cyB7XG4gIHBhZGRpbmctdG9wOiAwLjc1cmVtO1xuICBwYWRkaW5nLWJvdHRvbTogMC43NXJlbTtcbn1cbi5jYXJkLWhlYWRlciAuY2FyZC1oZWFkZXItZWxlbWVudHMge1xuICBwYWRkaW5nLXRvcDogMC4yNXJlbTtcbiAgcGFkZGluZy1ib3R0b206IDAuMjVyZW07XG59XG5cbi5jYXJkLWhlYWRlci1lbGVtZW50cyxcbi5jYXJkLXRpdGxlLWVsZW1lbnRzIHtcbiAgZGlzcGxheTogZmxleDtcbiAgZmxleC13cmFwOiB3cmFwO1xuICBhbGlnbi1pdGVtczogY2VudGVyO1xufVxuLmNhcmQtaGVhZGVyLWVsZW1lbnRzICsgLmNhcmQtaGVhZGVyLWVsZW1lbnRzLFxuLmNhcmQtaGVhZGVyLWVsZW1lbnRzID4gKiArICosXG4uY2FyZC1oZWFkZXItZWxlbWVudHMgKyAuY2FyZC10aXRsZS1lbGVtZW50cyxcbi5jYXJkLXRpdGxlLWVsZW1lbnRzID4gKiArICosXG4uY2FyZC10aXRsZS1lbGVtZW50cyArIC5jYXJkLWhlYWRlci1lbGVtZW50cyxcbi5jYXJkLXRpdGxlLWVsZW1lbnRzICsgLmNhcmQtdGl0bGUtZWxlbWVudHMge1xuICBtYXJnaW4tbGVmdDogMC4yNXJlbTtcbn1cblxuLmNhcmQtaW1nLWxlZnQge1xuICBib3JkZXItdG9wLWxlZnQtcmFkaXVzOiAwLjVyZW07XG4gIGJvcmRlci1ib3R0b20tbGVmdC1yYWRpdXM6IDAuNXJlbTtcbiAgYm9yZGVyLXRvcC1yaWdodC1yYWRpdXM6IDA7XG4gIGJvcmRlci1ib3R0b20tcmlnaHQtcmFkaXVzOiAwO1xufVxuQG1lZGlhIChtYXgtd2lkdGg6IDc2Ny45OHB4KSB7XG4gIC5jYXJkLWltZy1sZWZ0IHtcbiAgICBib3JkZXItdG9wLWxlZnQtcmFkaXVzOiAwLjVyZW07XG4gICAgYm9yZGVyLXRvcC1yaWdodC1yYWRpdXM6IDAuNXJlbTtcbiAgICBib3JkZXItYm90dG9tLXJpZ2h0LXJhZGl1czogMDtcbiAgICBib3JkZXItYm90dG9tLWxlZnQtcmFkaXVzOiAwO1xuICB9XG59XG5cbi5jYXJkLWltZy1yaWdodCB7XG4gIGJvcmRlci10b3AtcmlnaHQtcmFkaXVzOiAwLjVyZW07XG4gIGJvcmRlci1ib3R0b20tcmlnaHQtcmFkaXVzOiAwLjVyZW07XG4gIGJvcmRlci10b3AtbGVmdC1yYWRpdXM6IDA7XG4gIGJvcmRlci1ib3R0b20tbGVmdC1yYWRpdXM6IDA7XG59XG5AbWVkaWEgKG1heC13aWR0aDogNzY3Ljk4cHgpIHtcbiAgLmNhcmQtaW1nLXJpZ2h0IHtcbiAgICBib3JkZXItYm90dG9tLXJpZ2h0LXJhZGl1czogMC41cmVtO1xuICAgIGJvcmRlci1ib3R0b20tbGVmdC1yYWRpdXM6IDAuNXJlbTtcbiAgICBib3JkZXItdG9wLWxlZnQtcmFkaXVzOiAwO1xuICAgIGJvcmRlci10b3AtcmlnaHQtcmFkaXVzOiAwO1xuICB9XG59XG5cbi5jYXJkID4gLmxpc3QtZ3JvdXAgLmxpc3QtZ3JvdXAtaXRlbSB7XG4gIHBhZGRpbmctbGVmdDogMS41cmVtO1xuICBwYWRkaW5nLXJpZ2h0OiAxLjVyZW07XG59XG5cbi5jYXJkIC5jYXJkLXNlcGFyYXRvciB7XG4gIGJvcmRlci1yaWdodDogMXB4IHNvbGlkICNkOWRlZTM7XG59XG5cbkBtZWRpYSAobWF4LXdpZHRoOiA3NjcuOThweCkge1xuICAuY2FyZCAuY2FyZC1zZXBhcmF0b3Ige1xuICAgIGJvcmRlci1ib3R0b206IDFweCBzb2xpZCAjZDlkZWUzO1xuICAgIHBhZGRpbmctYm90dG9tOiAxLjVyZW07XG4gICAgYm9yZGVyLXJpZ2h0LXdpZHRoOiAwICFpbXBvcnRhbnQ7XG4gIH1cbn1cbi5hY2NvcmRpb24taGVhZGVyICsgLmFjY29yZGlvbi1jb2xsYXBzZSAuYWNjb3JkaW9uLWJvZHkge1xuICBwYWRkaW5nLXRvcDogMDtcbn1cblxuLmFjY29yZGlvbi5hY2NvcmRpb24td2l0aG91dC1hcnJvdyAuYWNjb3JkaW9uLWJ1dHRvbjo6YWZ0ZXIge1xuICBiYWNrZ3JvdW5kLWltYWdlOiBub25lICFpbXBvcnRhbnQ7XG59XG4uYWNjb3JkaW9uIC5hY2NvcmRpb24taXRlbS5hY3RpdmUge1xuICBib3gtc2hhZG93OiAwIDAuMjVyZW0gMXJlbSByZ2JhKDE2MSwgMTcyLCAxODQsIDAuNDUpO1xufVxuXG4uY2FyZC5hY2NvcmRpb24taXRlbSB7XG4gIGJveC1zaGFkb3c6IDAgMC4xMjVyZW0gMC4yNXJlbSByZ2JhKDE2MSwgMTcyLCAxODQsIDAuNCk7XG59XG5cbi5hY2NvcmRpb24tYnV0dG9uLmNvbGxhcHNlZDpmb2N1cyB7XG4gIGJveC1zaGFkb3c6IG5vbmU7XG59XG5cbi5hY2NvcmRpb24tYnV0dG9uIHtcbiAgYm94LXNoYWRvdzogbm9uZTtcbn1cblxuLmFjY29yZGlvbi1oZWFkZXIge1xuICBsaW5lLWhlaWdodDogMS41NDtcbn1cblxuLmFjY29yZGlvbi1pdGVtOm5vdCg6Zmlyc3Qtb2YtdHlwZSkge1xuICBib3JkZXItdG9wOiAwIHNvbGlkICNkOWRlZTM7XG59XG5cbi5hY2NvcmRpb24tYnV0dG9uIHtcbiAgZm9udC13ZWlnaHQ6IGluaGVyaXQ7XG4gIGJvcmRlci10b3AtbGVmdC1yYWRpdXM6IDAuMzc1cmVtO1xuICBib3JkZXItdG9wLXJpZ2h0LXJhZGl1czogMC4zNzVyZW07XG59XG4uYWNjb3JkaW9uLWJ1dHRvbi5jb2xsYXBzZWQge1xuICBib3JkZXItcmFkaXVzOiAwLjM3NXJlbTtcbn1cblxuLmFjY29yZGlvbiA+IC5jYXJkOm5vdCg6bGFzdC1vZi10eXBlKSB7XG4gIGJvcmRlci1yYWRpdXM6IDAuMzc1cmVtICFpbXBvcnRhbnQ7XG4gIG1hcmdpbi1ib3R0b206IDAuNjg3NXJlbTtcbn1cblxuLmNsb3NlOmZvY3VzIHtcbiAgb3V0bGluZTogMDtcbn1cblxuLmJnLXNlY29uZGFyeS50b2FzdCwgLmJnLXNlY29uZGFyeS5icy10b2FzdCB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2JhKDEzMywgMTQ2LCAxNjMsIDAuODUpICFpbXBvcnRhbnQ7XG4gIGJveC1zaGFkb3c6IDAgMC4yNXJlbSAxcmVtIHJnYmEoMTMzLCAxNDYsIDE2MywgMC40KTtcbn1cbi5iZy1zZWNvbmRhcnkudG9hc3QgLnRvYXN0LWhlYWRlciwgLmJnLXNlY29uZGFyeS5icy10b2FzdCAudG9hc3QtaGVhZGVyIHtcbiAgY29sb3I6ICNmZmY7XG59XG4uYmctc2Vjb25kYXJ5LnRvYXN0IC50b2FzdC1oZWFkZXIgLmJ0bi1jbG9zZSwgLmJnLXNlY29uZGFyeS5icy10b2FzdCAudG9hc3QtaGVhZGVyIC5idG4tY2xvc2Uge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjODU5MmEzICFpbXBvcnRhbnQ7XG4gIGJhY2tncm91bmQtaW1hZ2U6IHVybChcImRhdGE6aW1hZ2Uvc3ZnK3htbCwlM0Nzdmcgd2lkdGg9JzE1MHB4JyBoZWlnaHQ9JzE1MXB4JyB2aWV3Qm94PScwIDAgMTUwIDE1MScgdmVyc2lvbj0nMS4xJyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHhtbG5zOnhsaW5rPSdodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rJyUzRSUzQ2RlZnMlM0UlM0Nwb2x5Z29uIGlkPSdwYXRoLTEnIHBvaW50cz0nMTMxLjI1MTY1NyAwIDc0Ljk5MzM3MDUgNTYuMjUgMTguNzQ4MzQyNiAwIDAgMTguNzUgNTYuMjQ1MDI3OCA3NSAwIDEzMS4yNSAxOC43NDgzNDI2IDE1MCA3NC45OTMzNzA1IDkzLjc1IDEzMS4yNTE2NTcgMTUwIDE1MCAxMzEuMjUgOTMuNzU0OTcyMiA3NSAxNTAgMTguNzUnJTNFJTNDL3BvbHlnb24lM0UlM0MvZGVmcyUzRSUzQ2cgaWQ9J/CfjqgtJTVCU2V0dXAlNUQ6LUNvbG9ycy0mYW1wOy1TaGFkb3dzJyBzdHJva2U9J25vbmUnIHN0cm9rZS13aWR0aD0nMScgZmlsbD0nbm9uZScgZmlsbC1ydWxlPSdldmVub2RkJyUzRSUzQ2cgaWQ9J0FydGJvYXJkJyB0cmFuc2Zvcm09J3RyYW5zbGF0ZSgtMjI1LjAwMDAwMCwgLTI1MC4wMDAwMDApJyUzRSUzQ2cgaWQ9J0ljb24tQ29sb3InIHRyYW5zZm9ybT0ndHJhbnNsYXRlKDIyNS4wMDAwMDAsIDI1MC41MDAwMDApJyUzRSUzQ3VzZSBmaWxsPSclMjNmZmYnIHhsaW5rOmhyZWY9JyUyM3BhdGgtMSclM0UlM0MvdXNlJTNFJTNDdXNlIGZpbGwtb3BhY2l0eT0nMScgZmlsbD0nJTIzZmZmJyB4bGluazpocmVmPSclMjNwYXRoLTEnJTNFJTNDL3VzZSUzRSUzQy9nJTNFJTNDL2clM0UlM0MvZyUzRSUzQy9zdmclM0VcIik7XG4gIGJveC1zaGFkb3c6IDAgMC4xODc1cmVtIDAuMzc1cmVtIDAgcmdiYSgxMzMsIDE0NiwgMTYzLCAwLjQpICFpbXBvcnRhbnQ7XG59XG5cbi5iZy1zdWNjZXNzLnRvYXN0LCAuYmctc3VjY2Vzcy5icy10b2FzdCB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2JhKDExMywgMjIxLCA1NSwgMC44NSkgIWltcG9ydGFudDtcbiAgYm94LXNoYWRvdzogMCAwLjI1cmVtIDFyZW0gcmdiYSgxMTMsIDIyMSwgNTUsIDAuNCk7XG59XG4uYmctc3VjY2Vzcy50b2FzdCAudG9hc3QtaGVhZGVyLCAuYmctc3VjY2Vzcy5icy10b2FzdCAudG9hc3QtaGVhZGVyIHtcbiAgY29sb3I6ICNmZmY7XG59XG4uYmctc3VjY2Vzcy50b2FzdCAudG9hc3QtaGVhZGVyIC5idG4tY2xvc2UsIC5iZy1zdWNjZXNzLmJzLXRvYXN0IC50b2FzdC1oZWFkZXIgLmJ0bi1jbG9zZSB7XG4gIGJhY2tncm91bmQtY29sb3I6ICM3MWRkMzcgIWltcG9ydGFudDtcbiAgYmFja2dyb3VuZC1pbWFnZTogdXJsKFwiZGF0YTppbWFnZS9zdmcreG1sLCUzQ3N2ZyB3aWR0aD0nMTUwcHgnIGhlaWdodD0nMTUxcHgnIHZpZXdCb3g9JzAgMCAxNTAgMTUxJyB2ZXJzaW9uPScxLjEnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZycgeG1sbnM6eGxpbms9J2h0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsnJTNFJTNDZGVmcyUzRSUzQ3BvbHlnb24gaWQ9J3BhdGgtMScgcG9pbnRzPScxMzEuMjUxNjU3IDAgNzQuOTkzMzcwNSA1Ni4yNSAxOC43NDgzNDI2IDAgMCAxOC43NSA1Ni4yNDUwMjc4IDc1IDAgMTMxLjI1IDE4Ljc0ODM0MjYgMTUwIDc0Ljk5MzM3MDUgOTMuNzUgMTMxLjI1MTY1NyAxNTAgMTUwIDEzMS4yNSA5My43NTQ5NzIyIDc1IDE1MCAxOC43NSclM0UlM0MvcG9seWdvbiUzRSUzQy9kZWZzJTNFJTNDZyBpZD0n8J+OqC0lNUJTZXR1cCU1RDotQ29sb3JzLSZhbXA7LVNoYWRvd3MnIHN0cm9rZT0nbm9uZScgc3Ryb2tlLXdpZHRoPScxJyBmaWxsPSdub25lJyBmaWxsLXJ1bGU9J2V2ZW5vZGQnJTNFJTNDZyBpZD0nQXJ0Ym9hcmQnIHRyYW5zZm9ybT0ndHJhbnNsYXRlKC0yMjUuMDAwMDAwLCAtMjUwLjAwMDAwMCknJTNFJTNDZyBpZD0nSWNvbi1Db2xvcicgdHJhbnNmb3JtPSd0cmFuc2xhdGUoMjI1LjAwMDAwMCwgMjUwLjUwMDAwMCknJTNFJTNDdXNlIGZpbGw9JyUyM2ZmZicgeGxpbms6aHJlZj0nJTIzcGF0aC0xJyUzRSUzQy91c2UlM0UlM0N1c2UgZmlsbC1vcGFjaXR5PScxJyBmaWxsPSclMjNmZmYnIHhsaW5rOmhyZWY9JyUyM3BhdGgtMSclM0UlM0MvdXNlJTNFJTNDL2clM0UlM0MvZyUzRSUzQy9nJTNFJTNDL3N2ZyUzRVwiKTtcbiAgYm94LXNoYWRvdzogMCAwLjE4NzVyZW0gMC4zNzVyZW0gMCByZ2JhKDExMywgMjIxLCA1NSwgMC40KSAhaW1wb3J0YW50O1xufVxuXG4uYmctaW5mby50b2FzdCwgLmJnLWluZm8uYnMtdG9hc3Qge1xuICBjb2xvcjogI2ZmZjtcbiAgYmFja2dyb3VuZC1jb2xvcjogcmdiYSgzLCAxOTUsIDIzNiwgMC44NSkgIWltcG9ydGFudDtcbiAgYm94LXNoYWRvdzogMCAwLjI1cmVtIDFyZW0gcmdiYSgzLCAxOTUsIDIzNiwgMC40KTtcbn1cbi5iZy1pbmZvLnRvYXN0IC50b2FzdC1oZWFkZXIsIC5iZy1pbmZvLmJzLXRvYXN0IC50b2FzdC1oZWFkZXIge1xuICBjb2xvcjogI2ZmZjtcbn1cbi5iZy1pbmZvLnRvYXN0IC50b2FzdC1oZWFkZXIgLmJ0bi1jbG9zZSwgLmJnLWluZm8uYnMtdG9hc3QgLnRvYXN0LWhlYWRlciAuYnRuLWNsb3NlIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzAzYzNlYyAhaW1wb3J0YW50O1xuICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoXCJkYXRhOmltYWdlL3N2Zyt4bWwsJTNDc3ZnIHdpZHRoPScxNTBweCcgaGVpZ2h0PScxNTFweCcgdmlld0JveD0nMCAwIDE1MCAxNTEnIHZlcnNpb249JzEuMScgeG1sbnM9J2h0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnJyB4bWxuczp4bGluaz0naHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayclM0UlM0NkZWZzJTNFJTNDcG9seWdvbiBpZD0ncGF0aC0xJyBwb2ludHM9JzEzMS4yNTE2NTcgMCA3NC45OTMzNzA1IDU2LjI1IDE4Ljc0ODM0MjYgMCAwIDE4Ljc1IDU2LjI0NTAyNzggNzUgMCAxMzEuMjUgMTguNzQ4MzQyNiAxNTAgNzQuOTkzMzcwNSA5My43NSAxMzEuMjUxNjU3IDE1MCAxNTAgMTMxLjI1IDkzLjc1NDk3MjIgNzUgMTUwIDE4Ljc1JyUzRSUzQy9wb2x5Z29uJTNFJTNDL2RlZnMlM0UlM0NnIGlkPSfwn46oLSU1QlNldHVwJTVEOi1Db2xvcnMtJmFtcDstU2hhZG93cycgc3Ryb2tlPSdub25lJyBzdHJva2Utd2lkdGg9JzEnIGZpbGw9J25vbmUnIGZpbGwtcnVsZT0nZXZlbm9kZCclM0UlM0NnIGlkPSdBcnRib2FyZCcgdHJhbnNmb3JtPSd0cmFuc2xhdGUoLTIyNS4wMDAwMDAsIC0yNTAuMDAwMDAwKSclM0UlM0NnIGlkPSdJY29uLUNvbG9yJyB0cmFuc2Zvcm09J3RyYW5zbGF0ZSgyMjUuMDAwMDAwLCAyNTAuNTAwMDAwKSclM0UlM0N1c2UgZmlsbD0nJTIzZmZmJyB4bGluazpocmVmPSclMjNwYXRoLTEnJTNFJTNDL3VzZSUzRSUzQ3VzZSBmaWxsLW9wYWNpdHk9JzEnIGZpbGw9JyUyM2ZmZicgeGxpbms6aHJlZj0nJTIzcGF0aC0xJyUzRSUzQy91c2UlM0UlM0MvZyUzRSUzQy9nJTNFJTNDL2clM0UlM0Mvc3ZnJTNFXCIpO1xuICBib3gtc2hhZG93OiAwIDAuMTg3NXJlbSAwLjM3NXJlbSAwIHJnYmEoMywgMTk1LCAyMzYsIDAuNCkgIWltcG9ydGFudDtcbn1cblxuLmJnLXdhcm5pbmcudG9hc3QsIC5iZy13YXJuaW5nLmJzLXRvYXN0IHtcbiAgY29sb3I6ICNmZmY7XG4gIGJhY2tncm91bmQtY29sb3I6IHJnYmEoMjU1LCAxNzEsIDAsIDAuODUpICFpbXBvcnRhbnQ7XG4gIGJveC1zaGFkb3c6IDAgMC4yNXJlbSAxcmVtIHJnYmEoMjU1LCAxNzEsIDAsIDAuNCk7XG59XG4uYmctd2FybmluZy50b2FzdCAudG9hc3QtaGVhZGVyLCAuYmctd2FybmluZy5icy10b2FzdCAudG9hc3QtaGVhZGVyIHtcbiAgY29sb3I6ICNmZmY7XG59XG4uYmctd2FybmluZy50b2FzdCAudG9hc3QtaGVhZGVyIC5idG4tY2xvc2UsIC5iZy13YXJuaW5nLmJzLXRvYXN0IC50b2FzdC1oZWFkZXIgLmJ0bi1jbG9zZSB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNmZmFiMDAgIWltcG9ydGFudDtcbiAgYmFja2dyb3VuZC1pbWFnZTogdXJsKFwiZGF0YTppbWFnZS9zdmcreG1sLCUzQ3N2ZyB3aWR0aD0nMTUwcHgnIGhlaWdodD0nMTUxcHgnIHZpZXdCb3g9JzAgMCAxNTAgMTUxJyB2ZXJzaW9uPScxLjEnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZycgeG1sbnM6eGxpbms9J2h0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsnJTNFJTNDZGVmcyUzRSUzQ3BvbHlnb24gaWQ9J3BhdGgtMScgcG9pbnRzPScxMzEuMjUxNjU3IDAgNzQuOTkzMzcwNSA1Ni4yNSAxOC43NDgzNDI2IDAgMCAxOC43NSA1Ni4yNDUwMjc4IDc1IDAgMTMxLjI1IDE4Ljc0ODM0MjYgMTUwIDc0Ljk5MzM3MDUgOTMuNzUgMTMxLjI1MTY1NyAxNTAgMTUwIDEzMS4yNSA5My43NTQ5NzIyIDc1IDE1MCAxOC43NSclM0UlM0MvcG9seWdvbiUzRSUzQy9kZWZzJTNFJTNDZyBpZD0n8J+OqC0lNUJTZXR1cCU1RDotQ29sb3JzLSZhbXA7LVNoYWRvd3MnIHN0cm9rZT0nbm9uZScgc3Ryb2tlLXdpZHRoPScxJyBmaWxsPSdub25lJyBmaWxsLXJ1bGU9J2V2ZW5vZGQnJTNFJTNDZyBpZD0nQXJ0Ym9hcmQnIHRyYW5zZm9ybT0ndHJhbnNsYXRlKC0yMjUuMDAwMDAwLCAtMjUwLjAwMDAwMCknJTNFJTNDZyBpZD0nSWNvbi1Db2xvcicgdHJhbnNmb3JtPSd0cmFuc2xhdGUoMjI1LjAwMDAwMCwgMjUwLjUwMDAwMCknJTNFJTNDdXNlIGZpbGw9JyUyM2ZmZicgeGxpbms6aHJlZj0nJTIzcGF0aC0xJyUzRSUzQy91c2UlM0UlM0N1c2UgZmlsbC1vcGFjaXR5PScxJyBmaWxsPSclMjNmZmYnIHhsaW5rOmhyZWY9JyUyM3BhdGgtMSclM0UlM0MvdXNlJTNFJTNDL2clM0UlM0MvZyUzRSUzQy9nJTNFJTNDL3N2ZyUzRVwiKTtcbiAgYm94LXNoYWRvdzogMCAwLjE4NzVyZW0gMC4zNzVyZW0gMCByZ2JhKDI1NSwgMTcxLCAwLCAwLjQpICFpbXBvcnRhbnQ7XG59XG5cbi5iZy1kYW5nZXIudG9hc3QsIC5iZy1kYW5nZXIuYnMtdG9hc3Qge1xuICBjb2xvcjogI2ZmZjtcbiAgYmFja2dyb3VuZC1jb2xvcjogcmdiYSgyNTUsIDYyLCAyOSwgMC44NSkgIWltcG9ydGFudDtcbiAgYm94LXNoYWRvdzogMCAwLjI1cmVtIDFyZW0gcmdiYSgyNTUsIDYyLCAyOSwgMC40KTtcbn1cbi5iZy1kYW5nZXIudG9hc3QgLnRvYXN0LWhlYWRlciwgLmJnLWRhbmdlci5icy10b2FzdCAudG9hc3QtaGVhZGVyIHtcbiAgY29sb3I6ICNmZmY7XG59XG4uYmctZGFuZ2VyLnRvYXN0IC50b2FzdC1oZWFkZXIgLmJ0bi1jbG9zZSwgLmJnLWRhbmdlci5icy10b2FzdCAudG9hc3QtaGVhZGVyIC5idG4tY2xvc2Uge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmYzZTFkICFpbXBvcnRhbnQ7XG4gIGJhY2tncm91bmQtaW1hZ2U6IHVybChcImRhdGE6aW1hZ2Uvc3ZnK3htbCwlM0Nzdmcgd2lkdGg9JzE1MHB4JyBoZWlnaHQ9JzE1MXB4JyB2aWV3Qm94PScwIDAgMTUwIDE1MScgdmVyc2lvbj0nMS4xJyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHhtbG5zOnhsaW5rPSdodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rJyUzRSUzQ2RlZnMlM0UlM0Nwb2x5Z29uIGlkPSdwYXRoLTEnIHBvaW50cz0nMTMxLjI1MTY1NyAwIDc0Ljk5MzM3MDUgNTYuMjUgMTguNzQ4MzQyNiAwIDAgMTguNzUgNTYuMjQ1MDI3OCA3NSAwIDEzMS4yNSAxOC43NDgzNDI2IDE1MCA3NC45OTMzNzA1IDkzLjc1IDEzMS4yNTE2NTcgMTUwIDE1MCAxMzEuMjUgOTMuNzU0OTcyMiA3NSAxNTAgMTguNzUnJTNFJTNDL3BvbHlnb24lM0UlM0MvZGVmcyUzRSUzQ2cgaWQ9J/CfjqgtJTVCU2V0dXAlNUQ6LUNvbG9ycy0mYW1wOy1TaGFkb3dzJyBzdHJva2U9J25vbmUnIHN0cm9rZS13aWR0aD0nMScgZmlsbD0nbm9uZScgZmlsbC1ydWxlPSdldmVub2RkJyUzRSUzQ2cgaWQ9J0FydGJvYXJkJyB0cmFuc2Zvcm09J3RyYW5zbGF0ZSgtMjI1LjAwMDAwMCwgLTI1MC4wMDAwMDApJyUzRSUzQ2cgaWQ9J0ljb24tQ29sb3InIHRyYW5zZm9ybT0ndHJhbnNsYXRlKDIyNS4wMDAwMDAsIDI1MC41MDAwMDApJyUzRSUzQ3VzZSBmaWxsPSclMjNmZmYnIHhsaW5rOmhyZWY9JyUyM3BhdGgtMSclM0UlM0MvdXNlJTNFJTNDdXNlIGZpbGwtb3BhY2l0eT0nMScgZmlsbD0nJTIzZmZmJyB4bGluazpocmVmPSclMjNwYXRoLTEnJTNFJTNDL3VzZSUzRSUzQy9nJTNFJTNDL2clM0UlM0MvZyUzRSUzQy9zdmclM0VcIik7XG4gIGJveC1zaGFkb3c6IDAgMC4xODc1cmVtIDAuMzc1cmVtIDAgcmdiYSgyNTUsIDYyLCAyOSwgMC40KSAhaW1wb3J0YW50O1xufVxuXG4uYmctbGlnaHQudG9hc3QsIC5iZy1saWdodC5icy10b2FzdCB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2JhKDI1MiwgMjUzLCAyNTMsIDAuODUpICFpbXBvcnRhbnQ7XG4gIGJveC1zaGFkb3c6IDAgMC4yNXJlbSAxcmVtIHJnYmEoMjUyLCAyNTMsIDI1MywgMC40KTtcbn1cbi5iZy1saWdodC50b2FzdCAudG9hc3QtaGVhZGVyLCAuYmctbGlnaHQuYnMtdG9hc3QgLnRvYXN0LWhlYWRlciB7XG4gIGNvbG9yOiAjZmZmO1xufVxuLmJnLWxpZ2h0LnRvYXN0IC50b2FzdC1oZWFkZXIgLmJ0bi1jbG9zZSwgLmJnLWxpZ2h0LmJzLXRvYXN0IC50b2FzdC1oZWFkZXIgLmJ0bi1jbG9zZSB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNmY2ZkZmQgIWltcG9ydGFudDtcbiAgYmFja2dyb3VuZC1pbWFnZTogdXJsKFwiZGF0YTppbWFnZS9zdmcreG1sLCUzQ3N2ZyB3aWR0aD0nMTUwcHgnIGhlaWdodD0nMTUxcHgnIHZpZXdCb3g9JzAgMCAxNTAgMTUxJyB2ZXJzaW9uPScxLjEnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZycgeG1sbnM6eGxpbms9J2h0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsnJTNFJTNDZGVmcyUzRSUzQ3BvbHlnb24gaWQ9J3BhdGgtMScgcG9pbnRzPScxMzEuMjUxNjU3IDAgNzQuOTkzMzcwNSA1Ni4yNSAxOC43NDgzNDI2IDAgMCAxOC43NSA1Ni4yNDUwMjc4IDc1IDAgMTMxLjI1IDE4Ljc0ODM0MjYgMTUwIDc0Ljk5MzM3MDUgOTMuNzUgMTMxLjI1MTY1NyAxNTAgMTUwIDEzMS4yNSA5My43NTQ5NzIyIDc1IDE1MCAxOC43NSclM0UlM0MvcG9seWdvbiUzRSUzQy9kZWZzJTNFJTNDZyBpZD0n8J+OqC0lNUJTZXR1cCU1RDotQ29sb3JzLSZhbXA7LVNoYWRvd3MnIHN0cm9rZT0nbm9uZScgc3Ryb2tlLXdpZHRoPScxJyBmaWxsPSdub25lJyBmaWxsLXJ1bGU9J2V2ZW5vZGQnJTNFJTNDZyBpZD0nQXJ0Ym9hcmQnIHRyYW5zZm9ybT0ndHJhbnNsYXRlKC0yMjUuMDAwMDAwLCAtMjUwLjAwMDAwMCknJTNFJTNDZyBpZD0nSWNvbi1Db2xvcicgdHJhbnNmb3JtPSd0cmFuc2xhdGUoMjI1LjAwMDAwMCwgMjUwLjUwMDAwMCknJTNFJTNDdXNlIGZpbGw9JyUyM2ZmZicgeGxpbms6aHJlZj0nJTIzcGF0aC0xJyUzRSUzQy91c2UlM0UlM0N1c2UgZmlsbC1vcGFjaXR5PScxJyBmaWxsPSclMjNmZmYnIHhsaW5rOmhyZWY9JyUyM3BhdGgtMSclM0UlM0MvdXNlJTNFJTNDL2clM0UlM0MvZyUzRSUzQy9nJTNFJTNDL3N2ZyUzRVwiKTtcbiAgYm94LXNoYWRvdzogMCAwLjE4NzVyZW0gMC4zNzVyZW0gMCByZ2JhKDI1MiwgMjUzLCAyNTMsIDAuNCkgIWltcG9ydGFudDtcbn1cblxuLmJnLWRhcmsudG9hc3QsIC5iZy1kYXJrLmJzLXRvYXN0IHtcbiAgY29sb3I6ICNmZmY7XG4gIGJhY2tncm91bmQtY29sb3I6IHJnYmEoMzUsIDUyLCA3MCwgMC44NSkgIWltcG9ydGFudDtcbiAgYm94LXNoYWRvdzogMCAwLjI1cmVtIDFyZW0gcmdiYSgzNSwgNTIsIDcwLCAwLjQpO1xufVxuLmJnLWRhcmsudG9hc3QgLnRvYXN0LWhlYWRlciwgLmJnLWRhcmsuYnMtdG9hc3QgLnRvYXN0LWhlYWRlciB7XG4gIGNvbG9yOiAjZmZmO1xufVxuLmJnLWRhcmsudG9hc3QgLnRvYXN0LWhlYWRlciAuYnRuLWNsb3NlLCAuYmctZGFyay5icy10b2FzdCAudG9hc3QtaGVhZGVyIC5idG4tY2xvc2Uge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMjMzNDQ2ICFpbXBvcnRhbnQ7XG4gIGJhY2tncm91bmQtaW1hZ2U6IHVybChcImRhdGE6aW1hZ2Uvc3ZnK3htbCwlM0Nzdmcgd2lkdGg9JzE1MHB4JyBoZWlnaHQ9JzE1MXB4JyB2aWV3Qm94PScwIDAgMTUwIDE1MScgdmVyc2lvbj0nMS4xJyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHhtbG5zOnhsaW5rPSdodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rJyUzRSUzQ2RlZnMlM0UlM0Nwb2x5Z29uIGlkPSdwYXRoLTEnIHBvaW50cz0nMTMxLjI1MTY1NyAwIDc0Ljk5MzM3MDUgNTYuMjUgMTguNzQ4MzQyNiAwIDAgMTguNzUgNTYuMjQ1MDI3OCA3NSAwIDEzMS4yNSAxOC43NDgzNDI2IDE1MCA3NC45OTMzNzA1IDkzLjc1IDEzMS4yNTE2NTcgMTUwIDE1MCAxMzEuMjUgOTMuNzU0OTcyMiA3NSAxNTAgMTguNzUnJTNFJTNDL3BvbHlnb24lM0UlM0MvZGVmcyUzRSUzQ2cgaWQ9J/CfjqgtJTVCU2V0dXAlNUQ6LUNvbG9ycy0mYW1wOy1TaGFkb3dzJyBzdHJva2U9J25vbmUnIHN0cm9rZS13aWR0aD0nMScgZmlsbD0nbm9uZScgZmlsbC1ydWxlPSdldmVub2RkJyUzRSUzQ2cgaWQ9J0FydGJvYXJkJyB0cmFuc2Zvcm09J3RyYW5zbGF0ZSgtMjI1LjAwMDAwMCwgLTI1MC4wMDAwMDApJyUzRSUzQ2cgaWQ9J0ljb24tQ29sb3InIHRyYW5zZm9ybT0ndHJhbnNsYXRlKDIyNS4wMDAwMDAsIDI1MC41MDAwMDApJyUzRSUzQ3VzZSBmaWxsPSclMjNmZmYnIHhsaW5rOmhyZWY9JyUyM3BhdGgtMSclM0UlM0MvdXNlJTNFJTNDdXNlIGZpbGwtb3BhY2l0eT0nMScgZmlsbD0nJTIzZmZmJyB4bGluazpocmVmPSclMjNwYXRoLTEnJTNFJTNDL3VzZSUzRSUzQy9nJTNFJTNDL2clM0UlM0MvZyUzRSUzQy9zdmclM0VcIik7XG4gIGJveC1zaGFkb3c6IDAgMC4xODc1cmVtIDAuMzc1cmVtIDAgcmdiYSgzNSwgNTIsIDcwLCAwLjQpICFpbXBvcnRhbnQ7XG59XG5cbi5iZy1ncmF5LnRvYXN0LCAuYmctZ3JheS5icy10b2FzdCB7XG4gIGNvbG9yOiAjZmZmO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjg1KSAhaW1wb3J0YW50O1xuICBib3gtc2hhZG93OiAwIDAuMjVyZW0gMXJlbSByZ2JhKDY3LCA4OSwgMTEzLCAwLjQpO1xufVxuLmJnLWdyYXkudG9hc3QgLnRvYXN0LWhlYWRlciwgLmJnLWdyYXkuYnMtdG9hc3QgLnRvYXN0LWhlYWRlciB7XG4gIGNvbG9yOiAjZmZmO1xufVxuLmJnLWdyYXkudG9hc3QgLnRvYXN0LWhlYWRlciAuYnRuLWNsb3NlLCAuYmctZ3JheS5icy10b2FzdCAudG9hc3QtaGVhZGVyIC5idG4tY2xvc2Uge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjEpICFpbXBvcnRhbnQ7XG4gIGJhY2tncm91bmQtaW1hZ2U6IHVybChcImRhdGE6aW1hZ2Uvc3ZnK3htbCwlM0Nzdmcgd2lkdGg9JzE1MHB4JyBoZWlnaHQ9JzE1MXB4JyB2aWV3Qm94PScwIDAgMTUwIDE1MScgdmVyc2lvbj0nMS4xJyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHhtbG5zOnhsaW5rPSdodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rJyUzRSUzQ2RlZnMlM0UlM0Nwb2x5Z29uIGlkPSdwYXRoLTEnIHBvaW50cz0nMTMxLjI1MTY1NyAwIDc0Ljk5MzM3MDUgNTYuMjUgMTguNzQ4MzQyNiAwIDAgMTguNzUgNTYuMjQ1MDI3OCA3NSAwIDEzMS4yNSAxOC43NDgzNDI2IDE1MCA3NC45OTMzNzA1IDkzLjc1IDEzMS4yNTE2NTcgMTUwIDE1MCAxMzEuMjUgOTMuNzU0OTcyMiA3NSAxNTAgMTguNzUnJTNFJTNDL3BvbHlnb24lM0UlM0MvZGVmcyUzRSUzQ2cgaWQ9J/CfjqgtJTVCU2V0dXAlNUQ6LUNvbG9ycy0mYW1wOy1TaGFkb3dzJyBzdHJva2U9J25vbmUnIHN0cm9rZS13aWR0aD0nMScgZmlsbD0nbm9uZScgZmlsbC1ydWxlPSdldmVub2RkJyUzRSUzQ2cgaWQ9J0FydGJvYXJkJyB0cmFuc2Zvcm09J3RyYW5zbGF0ZSgtMjI1LjAwMDAwMCwgLTI1MC4wMDAwMDApJyUzRSUzQ2cgaWQ9J0ljb24tQ29sb3InIHRyYW5zZm9ybT0ndHJhbnNsYXRlKDIyNS4wMDAwMDAsIDI1MC41MDAwMDApJyUzRSUzQ3VzZSBmaWxsPSclMjNmZmYnIHhsaW5rOmhyZWY9JyUyM3BhdGgtMSclM0UlM0MvdXNlJTNFJTNDdXNlIGZpbGwtb3BhY2l0eT0nMScgZmlsbD0nJTIzZmZmJyB4bGluazpocmVmPSclMjNwYXRoLTEnJTNFJTNDL3VzZSUzRSUzQy9nJTNFJTNDL2clM0UlM0MvZyUzRSUzQy9zdmclM0VcIik7XG4gIGJveC1zaGFkb3c6IDAgMC4xODc1cmVtIDAuMzc1cmVtIDAgcmdiYSg2NywgODksIDExMywgMC40KSAhaW1wb3J0YW50O1xufVxuXG4uYnMtdG9hc3RbY2xhc3NePWJnLV0sXG4uYnMtdG9hc3RbY2xhc3MqPVwiIGJnLVwiXSB7XG4gIGJvcmRlcjogbm9uZTtcbn1cblxuLnRvYXN0LmJzLXRvYXN0IHtcbiAgYmFja2dyb3VuZC1jb2xvcjogcmdiYSgyNTUsIDI1NSwgMjU1LCAwLjg1KTtcbiAgei1pbmRleDogMTA5NTtcbn1cbi50b2FzdC5icy10b2FzdCAudG9hc3QtaGVhZGVyIHtcbiAgcGFkZGluZy1ib3R0b206IDAuNXJlbTtcbiAgcG9zaXRpb246IHJlbGF0aXZlO1xufVxuLnRvYXN0LmJzLXRvYXN0IC50b2FzdC1oZWFkZXIgLmJ0bi1jbG9zZSB7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgdG9wOiAtOHB4O1xuICBib3JkZXItcmFkaXVzOiAwLjM3NXJlbTtcbiAgcGFkZGluZzogMC40NXJlbTtcbiAgYmFja2dyb3VuZC1zaXplOiAwLjYyNWVtO1xuICB0cmFuc2l0aW9uOiBhbGwgMC4yM3MgZWFzZSAwLjFzO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmO1xuICBib3gtc2hhZG93OiAwIDAuMTI1cmVtIDAuMjVyZW0gcmdiYSgxNjEsIDE3MiwgMTg0LCAwLjQpO1xuICByaWdodDogMnB4O1xufVxuLnRvYXN0LmJzLXRvYXN0IC50b2FzdC1oZWFkZXIgLmJ0bi1jbG9zZTpob3ZlciwgLnRvYXN0LmJzLXRvYXN0IC50b2FzdC1oZWFkZXIgLmJ0bi1jbG9zZTpmb2N1cywgLnRvYXN0LmJzLXRvYXN0IC50b2FzdC1oZWFkZXIgLmJ0bi1jbG9zZTphY3RpdmUge1xuICBvcGFjaXR5OiAxO1xuICBvdXRsaW5lOiBub25lO1xufVxuLnRvYXN0LmJzLXRvYXN0IC50b2FzdC1oZWFkZXIgfiAudG9hc3QtYm9keSB7XG4gIHBhZGRpbmctdG9wOiAwO1xufVxuXG4udG9hc3QtZXgge1xuICBwb3NpdGlvbjogZml4ZWQ7XG4gIHRvcDogNC4xcmVtO1xuICByaWdodDogMi41cmVtO1xufVxuXG4udG9hc3QtcGxhY2VtZW50LWV4IHtcbiAgcG9zaXRpb246IGZpeGVkO1xufVxuXG4uY2Fyb3VzZWwgLmNhcm91c2VsLWl0ZW0uYWN0aXZlIGgxLFxuLmNhcm91c2VsIC5jYXJvdXNlbC1pdGVtLmFjdGl2ZSAuaDEsXG4uY2Fyb3VzZWwgLmNhcm91c2VsLWl0ZW0uYWN0aXZlIGgyLFxuLmNhcm91c2VsIC5jYXJvdXNlbC1pdGVtLmFjdGl2ZSAuaDIsXG4uY2Fyb3VzZWwgLmNhcm91c2VsLWl0ZW0uYWN0aXZlIGgzLFxuLmNhcm91c2VsIC5jYXJvdXNlbC1pdGVtLmFjdGl2ZSAuaDMsXG4uY2Fyb3VzZWwgLmNhcm91c2VsLWl0ZW0uYWN0aXZlIGg0LFxuLmNhcm91c2VsIC5jYXJvdXNlbC1pdGVtLmFjdGl2ZSAuaDQsXG4uY2Fyb3VzZWwgLmNhcm91c2VsLWl0ZW0uYWN0aXZlIGg1LFxuLmNhcm91c2VsIC5jYXJvdXNlbC1pdGVtLmFjdGl2ZSAuaDUsXG4uY2Fyb3VzZWwgLmNhcm91c2VsLWl0ZW0uYWN0aXZlIGg2LFxuLmNhcm91c2VsIC5jYXJvdXNlbC1pdGVtLmFjdGl2ZSAuaDYsXG4uY2Fyb3VzZWwgLmNhcm91c2VsLWl0ZW0uY2Fyb3VzZWwtaXRlbS1zdGFydCBoMSxcbi5jYXJvdXNlbCAuY2Fyb3VzZWwtaXRlbS5jYXJvdXNlbC1pdGVtLXN0YXJ0IC5oMSxcbi5jYXJvdXNlbCAuY2Fyb3VzZWwtaXRlbS5jYXJvdXNlbC1pdGVtLXN0YXJ0IGgyLFxuLmNhcm91c2VsIC5jYXJvdXNlbC1pdGVtLmNhcm91c2VsLWl0ZW0tc3RhcnQgLmgyLFxuLmNhcm91c2VsIC5jYXJvdXNlbC1pdGVtLmNhcm91c2VsLWl0ZW0tc3RhcnQgaDMsXG4uY2Fyb3VzZWwgLmNhcm91c2VsLWl0ZW0uY2Fyb3VzZWwtaXRlbS1zdGFydCAuaDMsXG4uY2Fyb3VzZWwgLmNhcm91c2VsLWl0ZW0uY2Fyb3VzZWwtaXRlbS1zdGFydCBoNCxcbi5jYXJvdXNlbCAuY2Fyb3VzZWwtaXRlbS5jYXJvdXNlbC1pdGVtLXN0YXJ0IC5oNCxcbi5jYXJvdXNlbCAuY2Fyb3VzZWwtaXRlbS5jYXJvdXNlbC1pdGVtLXN0YXJ0IGg1LFxuLmNhcm91c2VsIC5jYXJvdXNlbC1pdGVtLmNhcm91c2VsLWl0ZW0tc3RhcnQgLmg1LFxuLmNhcm91c2VsIC5jYXJvdXNlbC1pdGVtLmNhcm91c2VsLWl0ZW0tc3RhcnQgaDYsXG4uY2Fyb3VzZWwgLmNhcm91c2VsLWl0ZW0uY2Fyb3VzZWwtaXRlbS1zdGFydCAuaDYge1xuICBjb2xvcjogI2ZmZjtcbn1cblxuLmNhcm91c2VsLmNhcm91c2VsLWRhcmsgLmNhcm91c2VsLWl0ZW0uYWN0aXZlIGgxLFxuLmNhcm91c2VsLmNhcm91c2VsLWRhcmsgLmNhcm91c2VsLWl0ZW0uYWN0aXZlIC5oMSxcbi5jYXJvdXNlbC5jYXJvdXNlbC1kYXJrIC5jYXJvdXNlbC1pdGVtLmFjdGl2ZSBoMixcbi5jYXJvdXNlbC5jYXJvdXNlbC1kYXJrIC5jYXJvdXNlbC1pdGVtLmFjdGl2ZSAuaDIsXG4uY2Fyb3VzZWwuY2Fyb3VzZWwtZGFyayAuY2Fyb3VzZWwtaXRlbS5hY3RpdmUgaDMsXG4uY2Fyb3VzZWwuY2Fyb3VzZWwtZGFyayAuY2Fyb3VzZWwtaXRlbS5hY3RpdmUgLmgzLFxuLmNhcm91c2VsLmNhcm91c2VsLWRhcmsgLmNhcm91c2VsLWl0ZW0uYWN0aXZlIGg0LFxuLmNhcm91c2VsLmNhcm91c2VsLWRhcmsgLmNhcm91c2VsLWl0ZW0uYWN0aXZlIC5oNCxcbi5jYXJvdXNlbC5jYXJvdXNlbC1kYXJrIC5jYXJvdXNlbC1pdGVtLmFjdGl2ZSBoNSxcbi5jYXJvdXNlbC5jYXJvdXNlbC1kYXJrIC5jYXJvdXNlbC1pdGVtLmFjdGl2ZSAuaDUsXG4uY2Fyb3VzZWwuY2Fyb3VzZWwtZGFyayAuY2Fyb3VzZWwtaXRlbS5hY3RpdmUgaDYsXG4uY2Fyb3VzZWwuY2Fyb3VzZWwtZGFyayAuY2Fyb3VzZWwtaXRlbS5hY3RpdmUgLmg2LFxuLmNhcm91c2VsLmNhcm91c2VsLWRhcmsgLmNhcm91c2VsLWl0ZW0uY2Fyb3VzZWwtaXRlbS1zdGFydCBoMSxcbi5jYXJvdXNlbC5jYXJvdXNlbC1kYXJrIC5jYXJvdXNlbC1pdGVtLmNhcm91c2VsLWl0ZW0tc3RhcnQgLmgxLFxuLmNhcm91c2VsLmNhcm91c2VsLWRhcmsgLmNhcm91c2VsLWl0ZW0uY2Fyb3VzZWwtaXRlbS1zdGFydCBoMixcbi5jYXJvdXNlbC5jYXJvdXNlbC1kYXJrIC5jYXJvdXNlbC1pdGVtLmNhcm91c2VsLWl0ZW0tc3RhcnQgLmgyLFxuLmNhcm91c2VsLmNhcm91c2VsLWRhcmsgLmNhcm91c2VsLWl0ZW0uY2Fyb3VzZWwtaXRlbS1zdGFydCBoMyxcbi5jYXJvdXNlbC5jYXJvdXNlbC1kYXJrIC5jYXJvdXNlbC1pdGVtLmNhcm91c2VsLWl0ZW0tc3RhcnQgLmgzLFxuLmNhcm91c2VsLmNhcm91c2VsLWRhcmsgLmNhcm91c2VsLWl0ZW0uY2Fyb3VzZWwtaXRlbS1zdGFydCBoNCxcbi5jYXJvdXNlbC5jYXJvdXNlbC1kYXJrIC5jYXJvdXNlbC1pdGVtLmNhcm91c2VsLWl0ZW0tc3RhcnQgLmg0LFxuLmNhcm91c2VsLmNhcm91c2VsLWRhcmsgLmNhcm91c2VsLWl0ZW0uY2Fyb3VzZWwtaXRlbS1zdGFydCBoNSxcbi5jYXJvdXNlbC5jYXJvdXNlbC1kYXJrIC5jYXJvdXNlbC1pdGVtLmNhcm91c2VsLWl0ZW0tc3RhcnQgLmg1LFxuLmNhcm91c2VsLmNhcm91c2VsLWRhcmsgLmNhcm91c2VsLWl0ZW0uY2Fyb3VzZWwtaXRlbS1zdGFydCBoNixcbi5jYXJvdXNlbC5jYXJvdXNlbC1kYXJrIC5jYXJvdXNlbC1pdGVtLmNhcm91c2VsLWl0ZW0tc3RhcnQgLmg2IHtcbiAgY29sb3I6ICM0MzU5NzE7XG59XG5cbi5zcGlubmVyLWJvcmRlci1sZyB7XG4gIHdpZHRoOiAzcmVtO1xuICBoZWlnaHQ6IDNyZW07XG4gIGJvcmRlci13aWR0aDogMC4zZW07XG59XG5cbi5zcGlubmVyLWdyb3ctbGcge1xuICB3aWR0aDogM3JlbTtcbiAgaGVpZ2h0OiAzcmVtO1xuICBib3JkZXItd2lkdGg6IDAuM2VtO1xufVxuXG5ALXdlYmtpdC1rZXlmcmFtZXMgc3Bpbm5lci1ib3JkZXItcnRsIHtcbiAgdG8ge1xuICAgIHRyYW5zZm9ybTogcm90YXRlKC0zNjBkZWcpO1xuICB9XG59XG5ALW1vei1rZXlmcmFtZXMgc3Bpbm5lci1ib3JkZXItcnRsIHtcbiAgdG8ge1xuICAgIHRyYW5zZm9ybTogcm90YXRlKC0zNjBkZWcpO1xuICB9XG59XG5Aa2V5ZnJhbWVzIHNwaW5uZXItYm9yZGVyLXJ0bCB7XG4gIHRvIHtcbiAgICB0cmFuc2Zvcm06IHJvdGF0ZSgtMzYwZGVnKTtcbiAgfVxufVxuLm9mZmNhbnZhcy1oZWFkZXIge1xuICBwYWRkaW5nLWJvdHRvbTogMC43NXJlbTtcbn1cblxuLm9mZmNhbnZhcy1ib2R5IHtcbiAgcGFkZGluZy10b3A6IDAuNzVyZW07XG59XG5cbi5hbGlnbi1iYXNlbGluZSB7XG4gIHZlcnRpY2FsLWFsaWduOiBiYXNlbGluZSAhaW1wb3J0YW50O1xufVxuXG4uYWxpZ24tdG9wIHtcbiAgdmVydGljYWwtYWxpZ246IHRvcCAhaW1wb3J0YW50O1xufVxuXG4uYWxpZ24tbWlkZGxlIHtcbiAgdmVydGljYWwtYWxpZ246IG1pZGRsZSAhaW1wb3J0YW50O1xufVxuXG4uYWxpZ24tYm90dG9tIHtcbiAgdmVydGljYWwtYWxpZ246IGJvdHRvbSAhaW1wb3J0YW50O1xufVxuXG4uYWxpZ24tdGV4dC1ib3R0b20ge1xuICB2ZXJ0aWNhbC1hbGlnbjogdGV4dC1ib3R0b20gIWltcG9ydGFudDtcbn1cblxuLmFsaWduLXRleHQtdG9wIHtcbiAgdmVydGljYWwtYWxpZ246IHRleHQtdG9wICFpbXBvcnRhbnQ7XG59XG5cbi5vdmVyZmxvdy1hdXRvIHtcbiAgb3ZlcmZsb3c6IGF1dG8gIWltcG9ydGFudDtcbn1cblxuLm92ZXJmbG93LWhpZGRlbiB7XG4gIG92ZXJmbG93OiBoaWRkZW4gIWltcG9ydGFudDtcbn1cblxuLm92ZXJmbG93LXZpc2libGUge1xuICBvdmVyZmxvdzogdmlzaWJsZSAhaW1wb3J0YW50O1xufVxuXG4ub3ZlcmZsb3ctc2Nyb2xsIHtcbiAgb3ZlcmZsb3c6IHNjcm9sbCAhaW1wb3J0YW50O1xufVxuXG4uZC1pbmxpbmUge1xuICBkaXNwbGF5OiBpbmxpbmUgIWltcG9ydGFudDtcbn1cblxuLmQtaW5saW5lLWJsb2NrIHtcbiAgZGlzcGxheTogaW5saW5lLWJsb2NrICFpbXBvcnRhbnQ7XG59XG5cbi5kLWJsb2NrIHtcbiAgZGlzcGxheTogYmxvY2sgIWltcG9ydGFudDtcbn1cblxuLmQtZ3JpZCB7XG4gIGRpc3BsYXk6IGdyaWQgIWltcG9ydGFudDtcbn1cblxuLmQtdGFibGUge1xuICBkaXNwbGF5OiB0YWJsZSAhaW1wb3J0YW50O1xufVxuXG4uZC10YWJsZS1yb3cge1xuICBkaXNwbGF5OiB0YWJsZS1yb3cgIWltcG9ydGFudDtcbn1cblxuLmQtdGFibGUtY2VsbCB7XG4gIGRpc3BsYXk6IHRhYmxlLWNlbGwgIWltcG9ydGFudDtcbn1cblxuLmQtZmxleCB7XG4gIGRpc3BsYXk6IGZsZXggIWltcG9ydGFudDtcbn1cblxuLmQtaW5saW5lLWZsZXgge1xuICBkaXNwbGF5OiBpbmxpbmUtZmxleCAhaW1wb3J0YW50O1xufVxuXG4uZC1ub25lIHtcbiAgZGlzcGxheTogbm9uZSAhaW1wb3J0YW50O1xufVxuXG4uc2hhZG93IHtcbiAgYm94LXNoYWRvdzogMCAwLjI1cmVtIDFyZW0gcmdiYSgxNjEsIDE3MiwgMTg0LCAwLjQ1KSAhaW1wb3J0YW50O1xufVxuXG4uc2hhZG93LXNtIHtcbiAgYm94LXNoYWRvdzogMCAwLjEyNXJlbSAwLjI1cmVtIHJnYmEoMTYxLCAxNzIsIDE4NCwgMC40KSAhaW1wb3J0YW50O1xufVxuXG4uc2hhZG93LWxnIHtcbiAgYm94LXNoYWRvdzogMCAwLjYyNXJlbSAxLjI1cmVtIHJnYmEoMTYxLCAxNzIsIDE4NCwgMC41KSAhaW1wb3J0YW50O1xufVxuXG4uc2hhZG93LW5vbmUge1xuICBib3gtc2hhZG93OiBub25lICFpbXBvcnRhbnQ7XG59XG5cbi5wb3NpdGlvbi1zdGF0aWMge1xuICBwb3NpdGlvbjogc3RhdGljICFpbXBvcnRhbnQ7XG59XG5cbi5wb3NpdGlvbi1yZWxhdGl2ZSB7XG4gIHBvc2l0aW9uOiByZWxhdGl2ZSAhaW1wb3J0YW50O1xufVxuXG4ucG9zaXRpb24tYWJzb2x1dGUge1xuICBwb3NpdGlvbjogYWJzb2x1dGUgIWltcG9ydGFudDtcbn1cblxuLnBvc2l0aW9uLWZpeGVkIHtcbiAgcG9zaXRpb246IGZpeGVkICFpbXBvcnRhbnQ7XG59XG5cbi5wb3NpdGlvbi1zdGlja3kge1xuICBwb3NpdGlvbjogc3RpY2t5ICFpbXBvcnRhbnQ7XG59XG5cbi50b3AtMCB7XG4gIHRvcDogMCAhaW1wb3J0YW50O1xufVxuXG4udG9wLTUwIHtcbiAgdG9wOiA1MCUgIWltcG9ydGFudDtcbn1cblxuLnRvcC0xMDAge1xuICB0b3A6IDEwMCUgIWltcG9ydGFudDtcbn1cblxuLmJvdHRvbS0wIHtcbiAgYm90dG9tOiAwICFpbXBvcnRhbnQ7XG59XG5cbi5ib3R0b20tNTAge1xuICBib3R0b206IDUwJSAhaW1wb3J0YW50O1xufVxuXG4uYm90dG9tLTEwMCB7XG4gIGJvdHRvbTogMTAwJSAhaW1wb3J0YW50O1xufVxuXG4uemluZGV4LTEge1xuICB6LWluZGV4OiAxICFpbXBvcnRhbnQ7XG59XG5cbi56aW5kZXgtMiB7XG4gIHotaW5kZXg6IDIgIWltcG9ydGFudDtcbn1cblxuLnppbmRleC0zIHtcbiAgei1pbmRleDogMyAhaW1wb3J0YW50O1xufVxuXG4uemluZGV4LTQge1xuICB6LWluZGV4OiA0ICFpbXBvcnRhbnQ7XG59XG5cbi56aW5kZXgtNSB7XG4gIHotaW5kZXg6IDUgIWltcG9ydGFudDtcbn1cblxuLmJvcmRlciB7XG4gIGJvcmRlcjogMXB4IHNvbGlkICNkOWRlZTMgIWltcG9ydGFudDtcbn1cblxuLmJvcmRlci0wIHtcbiAgYm9yZGVyOiAwICFpbXBvcnRhbnQ7XG59XG5cbi5ib3JkZXItdG9wIHtcbiAgYm9yZGVyLXRvcDogMXB4IHNvbGlkICNkOWRlZTMgIWltcG9ydGFudDtcbn1cblxuLmJvcmRlci10b3AtMCB7XG4gIGJvcmRlci10b3A6IDAgIWltcG9ydGFudDtcbn1cblxuLmJvcmRlci1ib3R0b20ge1xuICBib3JkZXItYm90dG9tOiAxcHggc29saWQgI2Q5ZGVlMyAhaW1wb3J0YW50O1xufVxuXG4uYm9yZGVyLWJvdHRvbS0wIHtcbiAgYm9yZGVyLWJvdHRvbTogMCAhaW1wb3J0YW50O1xufVxuXG4uYm9yZGVyLXByaW1hcnkge1xuICBib3JkZXItY29sb3I6ICM2OTZjZmYgIWltcG9ydGFudDtcbn1cblxuLmJvcmRlci1zZWNvbmRhcnkge1xuICBib3JkZXItY29sb3I6ICM4NTkyYTMgIWltcG9ydGFudDtcbn1cblxuLmJvcmRlci1zdWNjZXNzIHtcbiAgYm9yZGVyLWNvbG9yOiAjNzFkZDM3ICFpbXBvcnRhbnQ7XG59XG5cbi5ib3JkZXItaW5mbyB7XG4gIGJvcmRlci1jb2xvcjogIzAzYzNlYyAhaW1wb3J0YW50O1xufVxuXG4uYm9yZGVyLXdhcm5pbmcge1xuICBib3JkZXItY29sb3I6ICNmZmFiMDAgIWltcG9ydGFudDtcbn1cblxuLmJvcmRlci1kYW5nZXIge1xuICBib3JkZXItY29sb3I6ICNmZjNlMWQgIWltcG9ydGFudDtcbn1cblxuLmJvcmRlci1saWdodCB7XG4gIGJvcmRlci1jb2xvcjogcmdiYSg2NywgODksIDExMywgMC4xKSAhaW1wb3J0YW50O1xufVxuXG4uYm9yZGVyLWRhcmsge1xuICBib3JkZXItY29sb3I6ICMyMzM0NDYgIWltcG9ydGFudDtcbn1cblxuLmJvcmRlci1ncmF5IHtcbiAgYm9yZGVyLWNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjEpICFpbXBvcnRhbnQ7XG59XG5cbi5ib3JkZXItd2hpdGUge1xuICBib3JkZXItY29sb3I6ICNmZmYgIWltcG9ydGFudDtcbn1cblxuLmJvcmRlci10cmFuc3BhcmVudCB7XG4gIGJvcmRlci1jb2xvcjogdHJhbnNwYXJlbnQgIWltcG9ydGFudDtcbn1cblxuLmJvcmRlci0xIHtcbiAgYm9yZGVyLXdpZHRoOiAxcHggIWltcG9ydGFudDtcbn1cblxuLmJvcmRlci0yIHtcbiAgYm9yZGVyLXdpZHRoOiAycHggIWltcG9ydGFudDtcbn1cblxuLmJvcmRlci0zIHtcbiAgYm9yZGVyLXdpZHRoOiAzcHggIWltcG9ydGFudDtcbn1cblxuLmJvcmRlci00IHtcbiAgYm9yZGVyLXdpZHRoOiA0cHggIWltcG9ydGFudDtcbn1cblxuLmJvcmRlci01IHtcbiAgYm9yZGVyLXdpZHRoOiA1cHggIWltcG9ydGFudDtcbn1cblxuLnctcHgtMjAge1xuICB3aWR0aDogMjBweCAhaW1wb3J0YW50O1xufVxuXG4udy1weC0zMCB7XG4gIHdpZHRoOiAzMHB4ICFpbXBvcnRhbnQ7XG59XG5cbi53LXB4LTQwIHtcbiAgd2lkdGg6IDQwcHggIWltcG9ydGFudDtcbn1cblxuLnctcHgtNTAge1xuICB3aWR0aDogNTBweCAhaW1wb3J0YW50O1xufVxuXG4udy1weC03NSB7XG4gIHdpZHRoOiA3NXB4ICFpbXBvcnRhbnQ7XG59XG5cbi53LXB4LTEwMCB7XG4gIHdpZHRoOiAxMDBweCAhaW1wb3J0YW50O1xufVxuXG4udy1weC0xNTAge1xuICB3aWR0aDogMTUwcHggIWltcG9ydGFudDtcbn1cblxuLnctcHgtMjAwIHtcbiAgd2lkdGg6IDIwMHB4ICFpbXBvcnRhbnQ7XG59XG5cbi53LXB4LTI1MCB7XG4gIHdpZHRoOiAyNTBweCAhaW1wb3J0YW50O1xufVxuXG4udy1weC0zMDAge1xuICB3aWR0aDogMzAwcHggIWltcG9ydGFudDtcbn1cblxuLnctcHgtMzUwIHtcbiAgd2lkdGg6IDM1MHB4ICFpbXBvcnRhbnQ7XG59XG5cbi53LXB4LTQwMCB7XG4gIHdpZHRoOiA0MDBweCAhaW1wb3J0YW50O1xufVxuXG4udy1weC01MDAge1xuICB3aWR0aDogNTAwcHggIWltcG9ydGFudDtcbn1cblxuLnctcHgtNjAwIHtcbiAgd2lkdGg6IDYwMHB4ICFpbXBvcnRhbnQ7XG59XG5cbi53LXB4LTcwMCB7XG4gIHdpZHRoOiA3MDBweCAhaW1wb3J0YW50O1xufVxuXG4udy1weC04MDAge1xuICB3aWR0aDogODAwcHggIWltcG9ydGFudDtcbn1cblxuLnctYXV0byB7XG4gIHdpZHRoOiBhdXRvICFpbXBvcnRhbnQ7XG59XG5cbi53LTI1IHtcbiAgd2lkdGg6IDI1JSAhaW1wb3J0YW50O1xufVxuXG4udy01MCB7XG4gIHdpZHRoOiA1MCUgIWltcG9ydGFudDtcbn1cblxuLnctNzUge1xuICB3aWR0aDogNzUlICFpbXBvcnRhbnQ7XG59XG5cbi53LTEwMCB7XG4gIHdpZHRoOiAxMDAlICFpbXBvcnRhbnQ7XG59XG5cbi5tdy0xMDAge1xuICBtYXgtd2lkdGg6IDEwMCUgIWltcG9ydGFudDtcbn1cblxuLnZ3LTEwMCB7XG4gIHdpZHRoOiAxMDB2dyAhaW1wb3J0YW50O1xufVxuXG4ubWluLXZ3LTEwMCB7XG4gIG1pbi13aWR0aDogMTAwdncgIWltcG9ydGFudDtcbn1cblxuLmgtcHgtMjAge1xuICBoZWlnaHQ6IDIwcHggIWltcG9ydGFudDtcbn1cblxuLmgtcHgtMzAge1xuICBoZWlnaHQ6IDMwcHggIWltcG9ydGFudDtcbn1cblxuLmgtcHgtNDAge1xuICBoZWlnaHQ6IDQwcHggIWltcG9ydGFudDtcbn1cblxuLmgtcHgtNTAge1xuICBoZWlnaHQ6IDUwcHggIWltcG9ydGFudDtcbn1cblxuLmgtcHgtNzUge1xuICBoZWlnaHQ6IDc1cHggIWltcG9ydGFudDtcbn1cblxuLmgtcHgtMTAwIHtcbiAgaGVpZ2h0OiAxMDBweCAhaW1wb3J0YW50O1xufVxuXG4uaC1weC0xNTAge1xuICBoZWlnaHQ6IDE1MHB4ICFpbXBvcnRhbnQ7XG59XG5cbi5oLXB4LTIwMCB7XG4gIGhlaWdodDogMjAwcHggIWltcG9ydGFudDtcbn1cblxuLmgtcHgtMjUwIHtcbiAgaGVpZ2h0OiAyNTBweCAhaW1wb3J0YW50O1xufVxuXG4uaC1weC0zMDAge1xuICBoZWlnaHQ6IDMwMHB4ICFpbXBvcnRhbnQ7XG59XG5cbi5oLXB4LTM1MCB7XG4gIGhlaWdodDogMzUwcHggIWltcG9ydGFudDtcbn1cblxuLmgtcHgtNDAwIHtcbiAgaGVpZ2h0OiA0MDBweCAhaW1wb3J0YW50O1xufVxuXG4uaC1weC01MDAge1xuICBoZWlnaHQ6IDUwMHB4ICFpbXBvcnRhbnQ7XG59XG5cbi5oLXB4LTYwMCB7XG4gIGhlaWdodDogNjAwcHggIWltcG9ydGFudDtcbn1cblxuLmgtcHgtNzAwIHtcbiAgaGVpZ2h0OiA3MDBweCAhaW1wb3J0YW50O1xufVxuXG4uaC1weC04MDAge1xuICBoZWlnaHQ6IDgwMHB4ICFpbXBvcnRhbnQ7XG59XG5cbi5oLWF1dG8ge1xuICBoZWlnaHQ6IGF1dG8gIWltcG9ydGFudDtcbn1cblxuLmgtMjUge1xuICBoZWlnaHQ6IDI1JSAhaW1wb3J0YW50O1xufVxuXG4uaC01MCB7XG4gIGhlaWdodDogNTAlICFpbXBvcnRhbnQ7XG59XG5cbi5oLTc1IHtcbiAgaGVpZ2h0OiA3NSUgIWltcG9ydGFudDtcbn1cblxuLmgtMTAwIHtcbiAgaGVpZ2h0OiAxMDAlICFpbXBvcnRhbnQ7XG59XG5cbi5taC0xMDAge1xuICBtYXgtaGVpZ2h0OiAxMDAlICFpbXBvcnRhbnQ7XG59XG5cbi52aC0xMDAge1xuICBoZWlnaHQ6IDEwMHZoICFpbXBvcnRhbnQ7XG59XG5cbi5taW4tdmgtMTAwIHtcbiAgbWluLWhlaWdodDogMTAwdmggIWltcG9ydGFudDtcbn1cblxuLmZsZXgtZmlsbCB7XG4gIGZsZXg6IDEgMSBhdXRvICFpbXBvcnRhbnQ7XG59XG5cbi5mbGV4LXJvdyB7XG4gIGZsZXgtZGlyZWN0aW9uOiByb3cgIWltcG9ydGFudDtcbn1cblxuLmZsZXgtY29sdW1uIHtcbiAgZmxleC1kaXJlY3Rpb246IGNvbHVtbiAhaW1wb3J0YW50O1xufVxuXG4uZmxleC1yb3ctcmV2ZXJzZSB7XG4gIGZsZXgtZGlyZWN0aW9uOiByb3ctcmV2ZXJzZSAhaW1wb3J0YW50O1xufVxuXG4uZmxleC1jb2x1bW4tcmV2ZXJzZSB7XG4gIGZsZXgtZGlyZWN0aW9uOiBjb2x1bW4tcmV2ZXJzZSAhaW1wb3J0YW50O1xufVxuXG4uZmxleC1ncm93LTAge1xuICBmbGV4LWdyb3c6IDAgIWltcG9ydGFudDtcbn1cblxuLmZsZXgtZ3Jvdy0xIHtcbiAgZmxleC1ncm93OiAxICFpbXBvcnRhbnQ7XG59XG5cbi5mbGV4LXNocmluay0wIHtcbiAgZmxleC1zaHJpbms6IDAgIWltcG9ydGFudDtcbn1cblxuLmZsZXgtc2hyaW5rLTEge1xuICBmbGV4LXNocmluazogMSAhaW1wb3J0YW50O1xufVxuXG4uZmxleC13cmFwIHtcbiAgZmxleC13cmFwOiB3cmFwICFpbXBvcnRhbnQ7XG59XG5cbi5mbGV4LW5vd3JhcCB7XG4gIGZsZXgtd3JhcDogbm93cmFwICFpbXBvcnRhbnQ7XG59XG5cbi5mbGV4LXdyYXAtcmV2ZXJzZSB7XG4gIGZsZXgtd3JhcDogd3JhcC1yZXZlcnNlICFpbXBvcnRhbnQ7XG59XG5cbi5nYXAtMCB7XG4gIGdhcDogMCAhaW1wb3J0YW50O1xufVxuXG4uZ2FwLTEge1xuICBnYXA6IDAuMjVyZW0gIWltcG9ydGFudDtcbn1cblxuLmdhcC0yIHtcbiAgZ2FwOiAwLjVyZW0gIWltcG9ydGFudDtcbn1cblxuLmdhcC0zIHtcbiAgZ2FwOiAxcmVtICFpbXBvcnRhbnQ7XG59XG5cbi5nYXAtNCB7XG4gIGdhcDogMS41cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5nYXAtNSB7XG4gIGdhcDogM3JlbSAhaW1wb3J0YW50O1xufVxuXG4uanVzdGlmeS1jb250ZW50LXN0YXJ0IHtcbiAganVzdGlmeS1jb250ZW50OiBmbGV4LXN0YXJ0ICFpbXBvcnRhbnQ7XG59XG5cbi5qdXN0aWZ5LWNvbnRlbnQtZW5kIHtcbiAganVzdGlmeS1jb250ZW50OiBmbGV4LWVuZCAhaW1wb3J0YW50O1xufVxuXG4uanVzdGlmeS1jb250ZW50LWNlbnRlciB7XG4gIGp1c3RpZnktY29udGVudDogY2VudGVyICFpbXBvcnRhbnQ7XG59XG5cbi5qdXN0aWZ5LWNvbnRlbnQtYmV0d2VlbiB7XG4gIGp1c3RpZnktY29udGVudDogc3BhY2UtYmV0d2VlbiAhaW1wb3J0YW50O1xufVxuXG4uanVzdGlmeS1jb250ZW50LWFyb3VuZCB7XG4gIGp1c3RpZnktY29udGVudDogc3BhY2UtYXJvdW5kICFpbXBvcnRhbnQ7XG59XG5cbi5qdXN0aWZ5LWNvbnRlbnQtZXZlbmx5IHtcbiAganVzdGlmeS1jb250ZW50OiBzcGFjZS1ldmVubHkgIWltcG9ydGFudDtcbn1cblxuLmFsaWduLWl0ZW1zLXN0YXJ0IHtcbiAgYWxpZ24taXRlbXM6IGZsZXgtc3RhcnQgIWltcG9ydGFudDtcbn1cblxuLmFsaWduLWl0ZW1zLWVuZCB7XG4gIGFsaWduLWl0ZW1zOiBmbGV4LWVuZCAhaW1wb3J0YW50O1xufVxuXG4uYWxpZ24taXRlbXMtY2VudGVyIHtcbiAgYWxpZ24taXRlbXM6IGNlbnRlciAhaW1wb3J0YW50O1xufVxuXG4uYWxpZ24taXRlbXMtYmFzZWxpbmUge1xuICBhbGlnbi1pdGVtczogYmFzZWxpbmUgIWltcG9ydGFudDtcbn1cblxuLmFsaWduLWl0ZW1zLXN0cmV0Y2gge1xuICBhbGlnbi1pdGVtczogc3RyZXRjaCAhaW1wb3J0YW50O1xufVxuXG4uYWxpZ24tY29udGVudC1zdGFydCB7XG4gIGFsaWduLWNvbnRlbnQ6IGZsZXgtc3RhcnQgIWltcG9ydGFudDtcbn1cblxuLmFsaWduLWNvbnRlbnQtZW5kIHtcbiAgYWxpZ24tY29udGVudDogZmxleC1lbmQgIWltcG9ydGFudDtcbn1cblxuLmFsaWduLWNvbnRlbnQtY2VudGVyIHtcbiAgYWxpZ24tY29udGVudDogY2VudGVyICFpbXBvcnRhbnQ7XG59XG5cbi5hbGlnbi1jb250ZW50LWJldHdlZW4ge1xuICBhbGlnbi1jb250ZW50OiBzcGFjZS1iZXR3ZWVuICFpbXBvcnRhbnQ7XG59XG5cbi5hbGlnbi1jb250ZW50LWFyb3VuZCB7XG4gIGFsaWduLWNvbnRlbnQ6IHNwYWNlLWFyb3VuZCAhaW1wb3J0YW50O1xufVxuXG4uYWxpZ24tY29udGVudC1zdHJldGNoIHtcbiAgYWxpZ24tY29udGVudDogc3RyZXRjaCAhaW1wb3J0YW50O1xufVxuXG4uYWxpZ24tc2VsZi1hdXRvIHtcbiAgYWxpZ24tc2VsZjogYXV0byAhaW1wb3J0YW50O1xufVxuXG4uYWxpZ24tc2VsZi1zdGFydCB7XG4gIGFsaWduLXNlbGY6IGZsZXgtc3RhcnQgIWltcG9ydGFudDtcbn1cblxuLmFsaWduLXNlbGYtZW5kIHtcbiAgYWxpZ24tc2VsZjogZmxleC1lbmQgIWltcG9ydGFudDtcbn1cblxuLmFsaWduLXNlbGYtY2VudGVyIHtcbiAgYWxpZ24tc2VsZjogY2VudGVyICFpbXBvcnRhbnQ7XG59XG5cbi5hbGlnbi1zZWxmLWJhc2VsaW5lIHtcbiAgYWxpZ24tc2VsZjogYmFzZWxpbmUgIWltcG9ydGFudDtcbn1cblxuLmFsaWduLXNlbGYtc3RyZXRjaCB7XG4gIGFsaWduLXNlbGY6IHN0cmV0Y2ggIWltcG9ydGFudDtcbn1cblxuLm9yZGVyLWZpcnN0IHtcbiAgb3JkZXI6IC0xICFpbXBvcnRhbnQ7XG59XG5cbi5vcmRlci0wIHtcbiAgb3JkZXI6IDAgIWltcG9ydGFudDtcbn1cblxuLm9yZGVyLTEge1xuICBvcmRlcjogMSAhaW1wb3J0YW50O1xufVxuXG4ub3JkZXItMiB7XG4gIG9yZGVyOiAyICFpbXBvcnRhbnQ7XG59XG5cbi5vcmRlci0zIHtcbiAgb3JkZXI6IDMgIWltcG9ydGFudDtcbn1cblxuLm9yZGVyLTQge1xuICBvcmRlcjogNCAhaW1wb3J0YW50O1xufVxuXG4ub3JkZXItNSB7XG4gIG9yZGVyOiA1ICFpbXBvcnRhbnQ7XG59XG5cbi5vcmRlci1sYXN0IHtcbiAgb3JkZXI6IDYgIWltcG9ydGFudDtcbn1cblxuLm0tMCB7XG4gIG1hcmdpbjogMCAhaW1wb3J0YW50O1xufVxuXG4ubS0xIHtcbiAgbWFyZ2luOiAwLjI1cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5tLTIge1xuICBtYXJnaW46IDAuNXJlbSAhaW1wb3J0YW50O1xufVxuXG4ubS0zIHtcbiAgbWFyZ2luOiAxcmVtICFpbXBvcnRhbnQ7XG59XG5cbi5tLTQge1xuICBtYXJnaW46IDEuNXJlbSAhaW1wb3J0YW50O1xufVxuXG4ubS01IHtcbiAgbWFyZ2luOiAzcmVtICFpbXBvcnRhbnQ7XG59XG5cbi5tLWF1dG8ge1xuICBtYXJnaW46IGF1dG8gIWltcG9ydGFudDtcbn1cblxuLm14LTAge1xuICBtYXJnaW4tcmlnaHQ6IDAgIWltcG9ydGFudDtcbiAgbWFyZ2luLWxlZnQ6IDAgIWltcG9ydGFudDtcbn1cblxuLm14LTEge1xuICBtYXJnaW4tcmlnaHQ6IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgbWFyZ2luLWxlZnQ6IDAuMjVyZW0gIWltcG9ydGFudDtcbn1cblxuLm14LTIge1xuICBtYXJnaW4tcmlnaHQ6IDAuNXJlbSAhaW1wb3J0YW50O1xuICBtYXJnaW4tbGVmdDogMC41cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5teC0zIHtcbiAgbWFyZ2luLXJpZ2h0OiAxcmVtICFpbXBvcnRhbnQ7XG4gIG1hcmdpbi1sZWZ0OiAxcmVtICFpbXBvcnRhbnQ7XG59XG5cbi5teC00IHtcbiAgbWFyZ2luLXJpZ2h0OiAxLjVyZW0gIWltcG9ydGFudDtcbiAgbWFyZ2luLWxlZnQ6IDEuNXJlbSAhaW1wb3J0YW50O1xufVxuXG4ubXgtNSB7XG4gIG1hcmdpbi1yaWdodDogM3JlbSAhaW1wb3J0YW50O1xuICBtYXJnaW4tbGVmdDogM3JlbSAhaW1wb3J0YW50O1xufVxuXG4ubXgtYXV0byB7XG4gIG1hcmdpbi1yaWdodDogYXV0byAhaW1wb3J0YW50O1xuICBtYXJnaW4tbGVmdDogYXV0byAhaW1wb3J0YW50O1xufVxuXG4ubXktMCB7XG4gIG1hcmdpbi10b3A6IDAgIWltcG9ydGFudDtcbiAgbWFyZ2luLWJvdHRvbTogMCAhaW1wb3J0YW50O1xufVxuXG4ubXktMSB7XG4gIG1hcmdpbi10b3A6IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgbWFyZ2luLWJvdHRvbTogMC4yNXJlbSAhaW1wb3J0YW50O1xufVxuXG4ubXktMiB7XG4gIG1hcmdpbi10b3A6IDAuNXJlbSAhaW1wb3J0YW50O1xuICBtYXJnaW4tYm90dG9tOiAwLjVyZW0gIWltcG9ydGFudDtcbn1cblxuLm15LTMge1xuICBtYXJnaW4tdG9wOiAxcmVtICFpbXBvcnRhbnQ7XG4gIG1hcmdpbi1ib3R0b206IDFyZW0gIWltcG9ydGFudDtcbn1cblxuLm15LTQge1xuICBtYXJnaW4tdG9wOiAxLjVyZW0gIWltcG9ydGFudDtcbiAgbWFyZ2luLWJvdHRvbTogMS41cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5teS01IHtcbiAgbWFyZ2luLXRvcDogM3JlbSAhaW1wb3J0YW50O1xuICBtYXJnaW4tYm90dG9tOiAzcmVtICFpbXBvcnRhbnQ7XG59XG5cbi5teS1hdXRvIHtcbiAgbWFyZ2luLXRvcDogYXV0byAhaW1wb3J0YW50O1xuICBtYXJnaW4tYm90dG9tOiBhdXRvICFpbXBvcnRhbnQ7XG59XG5cbi5tdC0wIHtcbiAgbWFyZ2luLXRvcDogMCAhaW1wb3J0YW50O1xufVxuXG4ubXQtMSB7XG4gIG1hcmdpbi10b3A6IDAuMjVyZW0gIWltcG9ydGFudDtcbn1cblxuLm10LTIge1xuICBtYXJnaW4tdG9wOiAwLjVyZW0gIWltcG9ydGFudDtcbn1cblxuLm10LTMge1xuICBtYXJnaW4tdG9wOiAxcmVtICFpbXBvcnRhbnQ7XG59XG5cbi5tdC00IHtcbiAgbWFyZ2luLXRvcDogMS41cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5tdC01IHtcbiAgbWFyZ2luLXRvcDogM3JlbSAhaW1wb3J0YW50O1xufVxuXG4ubXQtYXV0byB7XG4gIG1hcmdpbi10b3A6IGF1dG8gIWltcG9ydGFudDtcbn1cblxuLm1iLTAge1xuICBtYXJnaW4tYm90dG9tOiAwICFpbXBvcnRhbnQ7XG59XG5cbi5tYi0xIHtcbiAgbWFyZ2luLWJvdHRvbTogMC4yNXJlbSAhaW1wb3J0YW50O1xufVxuXG4ubWItMiB7XG4gIG1hcmdpbi1ib3R0b206IDAuNXJlbSAhaW1wb3J0YW50O1xufVxuXG4ubWItMyB7XG4gIG1hcmdpbi1ib3R0b206IDFyZW0gIWltcG9ydGFudDtcbn1cblxuLm1iLTQge1xuICBtYXJnaW4tYm90dG9tOiAxLjVyZW0gIWltcG9ydGFudDtcbn1cblxuLm1iLTUge1xuICBtYXJnaW4tYm90dG9tOiAzcmVtICFpbXBvcnRhbnQ7XG59XG5cbi5tYi1hdXRvIHtcbiAgbWFyZ2luLWJvdHRvbTogYXV0byAhaW1wb3J0YW50O1xufVxuXG4ubS1uMSB7XG4gIG1hcmdpbjogLTAuMjVyZW0gIWltcG9ydGFudDtcbn1cblxuLm0tbjIge1xuICBtYXJnaW46IC0wLjVyZW0gIWltcG9ydGFudDtcbn1cblxuLm0tbjMge1xuICBtYXJnaW46IC0xcmVtICFpbXBvcnRhbnQ7XG59XG5cbi5tLW40IHtcbiAgbWFyZ2luOiAtMS41cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5tLW41IHtcbiAgbWFyZ2luOiAtM3JlbSAhaW1wb3J0YW50O1xufVxuXG4ubXgtbjEge1xuICBtYXJnaW4tcmlnaHQ6IC0wLjI1cmVtICFpbXBvcnRhbnQ7XG4gIG1hcmdpbi1sZWZ0OiAtMC4yNXJlbSAhaW1wb3J0YW50O1xufVxuXG4ubXgtbjIge1xuICBtYXJnaW4tcmlnaHQ6IC0wLjVyZW0gIWltcG9ydGFudDtcbiAgbWFyZ2luLWxlZnQ6IC0wLjVyZW0gIWltcG9ydGFudDtcbn1cblxuLm14LW4zIHtcbiAgbWFyZ2luLXJpZ2h0OiAtMXJlbSAhaW1wb3J0YW50O1xuICBtYXJnaW4tbGVmdDogLTFyZW0gIWltcG9ydGFudDtcbn1cblxuLm14LW40IHtcbiAgbWFyZ2luLXJpZ2h0OiAtMS41cmVtICFpbXBvcnRhbnQ7XG4gIG1hcmdpbi1sZWZ0OiAtMS41cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5teC1uNSB7XG4gIG1hcmdpbi1yaWdodDogLTNyZW0gIWltcG9ydGFudDtcbiAgbWFyZ2luLWxlZnQ6IC0zcmVtICFpbXBvcnRhbnQ7XG59XG5cbi5teS1uMSB7XG4gIG1hcmdpbi10b3A6IC0wLjI1cmVtICFpbXBvcnRhbnQ7XG4gIG1hcmdpbi1ib3R0b206IC0wLjI1cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5teS1uMiB7XG4gIG1hcmdpbi10b3A6IC0wLjVyZW0gIWltcG9ydGFudDtcbiAgbWFyZ2luLWJvdHRvbTogLTAuNXJlbSAhaW1wb3J0YW50O1xufVxuXG4ubXktbjMge1xuICBtYXJnaW4tdG9wOiAtMXJlbSAhaW1wb3J0YW50O1xuICBtYXJnaW4tYm90dG9tOiAtMXJlbSAhaW1wb3J0YW50O1xufVxuXG4ubXktbjQge1xuICBtYXJnaW4tdG9wOiAtMS41cmVtICFpbXBvcnRhbnQ7XG4gIG1hcmdpbi1ib3R0b206IC0xLjVyZW0gIWltcG9ydGFudDtcbn1cblxuLm15LW41IHtcbiAgbWFyZ2luLXRvcDogLTNyZW0gIWltcG9ydGFudDtcbiAgbWFyZ2luLWJvdHRvbTogLTNyZW0gIWltcG9ydGFudDtcbn1cblxuLm10LW4xIHtcbiAgbWFyZ2luLXRvcDogLTAuMjVyZW0gIWltcG9ydGFudDtcbn1cblxuLm10LW4yIHtcbiAgbWFyZ2luLXRvcDogLTAuNXJlbSAhaW1wb3J0YW50O1xufVxuXG4ubXQtbjMge1xuICBtYXJnaW4tdG9wOiAtMXJlbSAhaW1wb3J0YW50O1xufVxuXG4ubXQtbjQge1xuICBtYXJnaW4tdG9wOiAtMS41cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5tdC1uNSB7XG4gIG1hcmdpbi10b3A6IC0zcmVtICFpbXBvcnRhbnQ7XG59XG5cbi5tYi1uMSB7XG4gIG1hcmdpbi1ib3R0b206IC0wLjI1cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5tYi1uMiB7XG4gIG1hcmdpbi1ib3R0b206IC0wLjVyZW0gIWltcG9ydGFudDtcbn1cblxuLm1iLW4zIHtcbiAgbWFyZ2luLWJvdHRvbTogLTFyZW0gIWltcG9ydGFudDtcbn1cblxuLm1iLW40IHtcbiAgbWFyZ2luLWJvdHRvbTogLTEuNXJlbSAhaW1wb3J0YW50O1xufVxuXG4ubWItbjUge1xuICBtYXJnaW4tYm90dG9tOiAtM3JlbSAhaW1wb3J0YW50O1xufVxuXG4ucC0wIHtcbiAgcGFkZGluZzogMCAhaW1wb3J0YW50O1xufVxuXG4ucC0xIHtcbiAgcGFkZGluZzogMC4yNXJlbSAhaW1wb3J0YW50O1xufVxuXG4ucC0yIHtcbiAgcGFkZGluZzogMC41cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5wLTMge1xuICBwYWRkaW5nOiAxcmVtICFpbXBvcnRhbnQ7XG59XG5cbi5wLTQge1xuICBwYWRkaW5nOiAxLjVyZW0gIWltcG9ydGFudDtcbn1cblxuLnAtNSB7XG4gIHBhZGRpbmc6IDNyZW0gIWltcG9ydGFudDtcbn1cblxuLnB4LTAge1xuICBwYWRkaW5nLXJpZ2h0OiAwICFpbXBvcnRhbnQ7XG4gIHBhZGRpbmctbGVmdDogMCAhaW1wb3J0YW50O1xufVxuXG4ucHgtMSB7XG4gIHBhZGRpbmctcmlnaHQ6IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgcGFkZGluZy1sZWZ0OiAwLjI1cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5weC0yIHtcbiAgcGFkZGluZy1yaWdodDogMC41cmVtICFpbXBvcnRhbnQ7XG4gIHBhZGRpbmctbGVmdDogMC41cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5weC0zIHtcbiAgcGFkZGluZy1yaWdodDogMXJlbSAhaW1wb3J0YW50O1xuICBwYWRkaW5nLWxlZnQ6IDFyZW0gIWltcG9ydGFudDtcbn1cblxuLnB4LTQge1xuICBwYWRkaW5nLXJpZ2h0OiAxLjVyZW0gIWltcG9ydGFudDtcbiAgcGFkZGluZy1sZWZ0OiAxLjVyZW0gIWltcG9ydGFudDtcbn1cblxuLnB4LTUge1xuICBwYWRkaW5nLXJpZ2h0OiAzcmVtICFpbXBvcnRhbnQ7XG4gIHBhZGRpbmctbGVmdDogM3JlbSAhaW1wb3J0YW50O1xufVxuXG4ucHktMCB7XG4gIHBhZGRpbmctdG9wOiAwICFpbXBvcnRhbnQ7XG4gIHBhZGRpbmctYm90dG9tOiAwICFpbXBvcnRhbnQ7XG59XG5cbi5weS0xIHtcbiAgcGFkZGluZy10b3A6IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgcGFkZGluZy1ib3R0b206IDAuMjVyZW0gIWltcG9ydGFudDtcbn1cblxuLnB5LTIge1xuICBwYWRkaW5nLXRvcDogMC41cmVtICFpbXBvcnRhbnQ7XG4gIHBhZGRpbmctYm90dG9tOiAwLjVyZW0gIWltcG9ydGFudDtcbn1cblxuLnB5LTMge1xuICBwYWRkaW5nLXRvcDogMXJlbSAhaW1wb3J0YW50O1xuICBwYWRkaW5nLWJvdHRvbTogMXJlbSAhaW1wb3J0YW50O1xufVxuXG4ucHktNCB7XG4gIHBhZGRpbmctdG9wOiAxLjVyZW0gIWltcG9ydGFudDtcbiAgcGFkZGluZy1ib3R0b206IDEuNXJlbSAhaW1wb3J0YW50O1xufVxuXG4ucHktNSB7XG4gIHBhZGRpbmctdG9wOiAzcmVtICFpbXBvcnRhbnQ7XG4gIHBhZGRpbmctYm90dG9tOiAzcmVtICFpbXBvcnRhbnQ7XG59XG5cbi5wdC0wIHtcbiAgcGFkZGluZy10b3A6IDAgIWltcG9ydGFudDtcbn1cblxuLnB0LTEge1xuICBwYWRkaW5nLXRvcDogMC4yNXJlbSAhaW1wb3J0YW50O1xufVxuXG4ucHQtMiB7XG4gIHBhZGRpbmctdG9wOiAwLjVyZW0gIWltcG9ydGFudDtcbn1cblxuLnB0LTMge1xuICBwYWRkaW5nLXRvcDogMXJlbSAhaW1wb3J0YW50O1xufVxuXG4ucHQtNCB7XG4gIHBhZGRpbmctdG9wOiAxLjVyZW0gIWltcG9ydGFudDtcbn1cblxuLnB0LTUge1xuICBwYWRkaW5nLXRvcDogM3JlbSAhaW1wb3J0YW50O1xufVxuXG4ucGItMCB7XG4gIHBhZGRpbmctYm90dG9tOiAwICFpbXBvcnRhbnQ7XG59XG5cbi5wYi0xIHtcbiAgcGFkZGluZy1ib3R0b206IDAuMjVyZW0gIWltcG9ydGFudDtcbn1cblxuLnBiLTIge1xuICBwYWRkaW5nLWJvdHRvbTogMC41cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5wYi0zIHtcbiAgcGFkZGluZy1ib3R0b206IDFyZW0gIWltcG9ydGFudDtcbn1cblxuLnBiLTQge1xuICBwYWRkaW5nLWJvdHRvbTogMS41cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5wYi01IHtcbiAgcGFkZGluZy1ib3R0b206IDNyZW0gIWltcG9ydGFudDtcbn1cblxuLmZvbnQtbW9ub3NwYWNlIHtcbiAgZm9udC1mYW1pbHk6IHZhcigtLWJzLWZvbnQtbW9ub3NwYWNlKSAhaW1wb3J0YW50O1xufVxuXG4uZnMtMSB7XG4gIGZvbnQtc2l6ZTogY2FsYygxLjM2MjVyZW0gKyAxLjM1dncpICFpbXBvcnRhbnQ7XG59XG5cbi5mcy0yIHtcbiAgZm9udC1zaXplOiBjYWxjKDEuMzI1cmVtICsgMC45dncpICFpbXBvcnRhbnQ7XG59XG5cbi5mcy0zIHtcbiAgZm9udC1zaXplOiBjYWxjKDEuMjg3NXJlbSArIDAuNDV2dykgIWltcG9ydGFudDtcbn1cblxuLmZzLTQge1xuICBmb250LXNpemU6IGNhbGMoMS4yNjI1cmVtICsgMC4xNXZ3KSAhaW1wb3J0YW50O1xufVxuXG4uZnMtNSB7XG4gIGZvbnQtc2l6ZTogMS4xMjVyZW0gIWltcG9ydGFudDtcbn1cblxuLmZzLTYge1xuICBmb250LXNpemU6IDAuOTM3NXJlbSAhaW1wb3J0YW50O1xufVxuXG4uZnMtdGlueSB7XG4gIGZvbnQtc2l6ZTogNzAlICFpbXBvcnRhbnQ7XG59XG5cbi5mcy1iaWcge1xuICBmb250LXNpemU6IDExMiUgIWltcG9ydGFudDtcbn1cblxuLmZzLWxhcmdlIHtcbiAgZm9udC1zaXplOiAxNTAlICFpbXBvcnRhbnQ7XG59XG5cbi5mcy14bGFyZ2Uge1xuICBmb250LXNpemU6IDE3MCUgIWltcG9ydGFudDtcbn1cblxuLmZzdC1pdGFsaWMge1xuICBmb250LXN0eWxlOiBpdGFsaWMgIWltcG9ydGFudDtcbn1cblxuLmZzdC1ub3JtYWwge1xuICBmb250LXN0eWxlOiBub3JtYWwgIWltcG9ydGFudDtcbn1cblxuLmZ3LWxpZ2h0IHtcbiAgZm9udC13ZWlnaHQ6IDMwMCAhaW1wb3J0YW50O1xufVxuXG4uZnctbGlnaHRlciB7XG4gIGZvbnQtd2VpZ2h0OiAxMDAgIWltcG9ydGFudDtcbn1cblxuLmZ3LW5vcm1hbCB7XG4gIGZvbnQtd2VpZ2h0OiA0MDAgIWltcG9ydGFudDtcbn1cblxuLmZ3LWJvbGQge1xuICBmb250LXdlaWdodDogNzAwICFpbXBvcnRhbnQ7XG59XG5cbi5mdy1zZW1pYm9sZCB7XG4gIGZvbnQtd2VpZ2h0OiA2MDAgIWltcG9ydGFudDtcbn1cblxuLmZ3LWJvbGRlciB7XG4gIGZvbnQtd2VpZ2h0OiA5MDAgIWltcG9ydGFudDtcbn1cblxuLmxoLTEge1xuICBsaW5lLWhlaWdodDogMSAhaW1wb3J0YW50O1xufVxuXG4ubGgtaW5oZXJpdCB7XG4gIGxpbmUtaGVpZ2h0OiBpbmhlcml0ICFpbXBvcnRhbnQ7XG59XG5cbi5saC1zbSB7XG4gIGxpbmUtaGVpZ2h0OiAxLjUgIWltcG9ydGFudDtcbn1cblxuLmxoLWJhc2Uge1xuICBsaW5lLWhlaWdodDogMS41MyAhaW1wb3J0YW50O1xufVxuXG4ubGgtbGcge1xuICBsaW5lLWhlaWdodDogMS41ICFpbXBvcnRhbnQ7XG59XG5cbi50ZXh0LWRlY29yYXRpb24tbm9uZSB7XG4gIHRleHQtZGVjb3JhdGlvbjogbm9uZSAhaW1wb3J0YW50O1xufVxuXG4udGV4dC1kZWNvcmF0aW9uLXVuZGVybGluZSB7XG4gIHRleHQtZGVjb3JhdGlvbjogdW5kZXJsaW5lICFpbXBvcnRhbnQ7XG59XG5cbi50ZXh0LWRlY29yYXRpb24tbGluZS10aHJvdWdoIHtcbiAgdGV4dC1kZWNvcmF0aW9uOiBsaW5lLXRocm91Z2ggIWltcG9ydGFudDtcbn1cblxuLnRleHQtbm9uZSB7XG4gIHRleHQtdHJhbnNmb3JtOiBub25lICFpbXBvcnRhbnQ7XG59XG5cbi50ZXh0LWxvd2VyY2FzZSB7XG4gIHRleHQtdHJhbnNmb3JtOiBsb3dlcmNhc2UgIWltcG9ydGFudDtcbn1cblxuLnRleHQtdXBwZXJjYXNlIHtcbiAgdGV4dC10cmFuc2Zvcm06IHVwcGVyY2FzZSAhaW1wb3J0YW50O1xufVxuXG4udGV4dC1jYXBpdGFsaXplIHtcbiAgdGV4dC10cmFuc2Zvcm06IGNhcGl0YWxpemUgIWltcG9ydGFudDtcbn1cblxuLnRleHQtd3JhcCB7XG4gIHdoaXRlLXNwYWNlOiBub3JtYWwgIWltcG9ydGFudDtcbn1cblxuLnRleHQtbm93cmFwIHtcbiAgd2hpdGUtc3BhY2U6IG5vd3JhcCAhaW1wb3J0YW50O1xufVxuXG4vKiBydGw6YmVnaW46cmVtb3ZlICovXG4udGV4dC1icmVhayB7XG4gIHdvcmQtd3JhcDogYnJlYWstd29yZCAhaW1wb3J0YW50O1xuICB3b3JkLWJyZWFrOiBicmVhay13b3JkICFpbXBvcnRhbnQ7XG59XG5cbi8qIHJ0bDplbmQ6cmVtb3ZlICovXG4udGV4dC1wcmltYXJ5IHtcbiAgLS1icy10ZXh0LW9wYWNpdHk6IDE7XG4gIGNvbG9yOiByZ2JhKHZhcigtLWJzLXByaW1hcnktcmdiKSwgdmFyKC0tYnMtdGV4dC1vcGFjaXR5KSkgIWltcG9ydGFudDtcbn1cblxuLnRleHQtc2Vjb25kYXJ5IHtcbiAgLS1icy10ZXh0LW9wYWNpdHk6IDE7XG4gIGNvbG9yOiByZ2JhKHZhcigtLWJzLXNlY29uZGFyeS1yZ2IpLCB2YXIoLS1icy10ZXh0LW9wYWNpdHkpKSAhaW1wb3J0YW50O1xufVxuXG4udGV4dC1zdWNjZXNzIHtcbiAgLS1icy10ZXh0LW9wYWNpdHk6IDE7XG4gIGNvbG9yOiByZ2JhKHZhcigtLWJzLXN1Y2Nlc3MtcmdiKSwgdmFyKC0tYnMtdGV4dC1vcGFjaXR5KSkgIWltcG9ydGFudDtcbn1cblxuLnRleHQtaW5mbyB7XG4gIC0tYnMtdGV4dC1vcGFjaXR5OiAxO1xuICBjb2xvcjogcmdiYSh2YXIoLS1icy1pbmZvLXJnYiksIHZhcigtLWJzLXRleHQtb3BhY2l0eSkpICFpbXBvcnRhbnQ7XG59XG5cbi50ZXh0LXdhcm5pbmcge1xuICAtLWJzLXRleHQtb3BhY2l0eTogMTtcbiAgY29sb3I6IHJnYmEodmFyKC0tYnMtd2FybmluZy1yZ2IpLCB2YXIoLS1icy10ZXh0LW9wYWNpdHkpKSAhaW1wb3J0YW50O1xufVxuXG4udGV4dC1kYW5nZXIge1xuICAtLWJzLXRleHQtb3BhY2l0eTogMTtcbiAgY29sb3I6IHJnYmEodmFyKC0tYnMtZGFuZ2VyLXJnYiksIHZhcigtLWJzLXRleHQtb3BhY2l0eSkpICFpbXBvcnRhbnQ7XG59XG5cbi50ZXh0LWxpZ2h0IHtcbiAgLS1icy10ZXh0LW9wYWNpdHk6IDE7XG4gIGNvbG9yOiAjYjRiZGM2ICFpbXBvcnRhbnQ7XG59XG5cbi50ZXh0LWRhcmsge1xuICAtLWJzLXRleHQtb3BhY2l0eTogMTtcbiAgY29sb3I6IHJnYmEodmFyKC0tYnMtZGFyay1yZ2IpLCB2YXIoLS1icy10ZXh0LW9wYWNpdHkpKSAhaW1wb3J0YW50O1xufVxuXG4udGV4dC1ncmF5IHtcbiAgLS1icy10ZXh0LW9wYWNpdHk6IDE7XG4gIGNvbG9yOiByZ2JhKHZhcigtLWJzLWdyYXktcmdiKSwgdmFyKC0tYnMtdGV4dC1vcGFjaXR5KSkgIWltcG9ydGFudDtcbn1cblxuLnRleHQtYmxhY2sge1xuICAtLWJzLXRleHQtb3BhY2l0eTogMTtcbiAgY29sb3I6IHJnYmEodmFyKC0tYnMtYmxhY2stcmdiKSwgdmFyKC0tYnMtdGV4dC1vcGFjaXR5KSkgIWltcG9ydGFudDtcbn1cblxuLnRleHQtd2hpdGUge1xuICAtLWJzLXRleHQtb3BhY2l0eTogMTtcbiAgY29sb3I6ICNmZmYgIWltcG9ydGFudDtcbn1cblxuLnRleHQtYm9keSB7XG4gIC0tYnMtdGV4dC1vcGFjaXR5OiAxO1xuICBjb2xvcjogIzY5N2E4ZCAhaW1wb3J0YW50O1xufVxuXG4udGV4dC1tdXRlZCB7XG4gIC0tYnMtdGV4dC1vcGFjaXR5OiAxO1xuICBjb2xvcjogI2ExYWNiOCAhaW1wb3J0YW50O1xufVxuXG4udGV4dC1ibGFjay01MCB7XG4gIC0tYnMtdGV4dC1vcGFjaXR5OiAxO1xuICBjb2xvcjogcmdiYSg2NywgODksIDExMywgMC41KSAhaW1wb3J0YW50O1xufVxuXG4udGV4dC13aGl0ZS01MCB7XG4gIC0tYnMtdGV4dC1vcGFjaXR5OiAxO1xuICBjb2xvcjogcmdiYSgyNTUsIDI1NSwgMjU1LCAwLjUpICFpbXBvcnRhbnQ7XG59XG5cbi50ZXh0LXJlc2V0IHtcbiAgLS1icy10ZXh0LW9wYWNpdHk6IDE7XG4gIGNvbG9yOiBpbmhlcml0ICFpbXBvcnRhbnQ7XG59XG5cbi5iZy1wcmltYXJ5IHtcbiAgLS1icy1iZy1vcGFjaXR5OiAxO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2JhKHZhcigtLWJzLXByaW1hcnktcmdiKSwgdmFyKC0tYnMtYmctb3BhY2l0eSkpICFpbXBvcnRhbnQ7XG59XG5cbi5iZy1zZWNvbmRhcnkge1xuICAtLWJzLWJnLW9wYWNpdHk6IDE7XG4gIGJhY2tncm91bmQtY29sb3I6IHJnYmEodmFyKC0tYnMtc2Vjb25kYXJ5LXJnYiksIHZhcigtLWJzLWJnLW9wYWNpdHkpKSAhaW1wb3J0YW50O1xufVxuXG4uYmctc3VjY2VzcyB7XG4gIC0tYnMtYmctb3BhY2l0eTogMTtcbiAgYmFja2dyb3VuZC1jb2xvcjogcmdiYSh2YXIoLS1icy1zdWNjZXNzLXJnYiksIHZhcigtLWJzLWJnLW9wYWNpdHkpKSAhaW1wb3J0YW50O1xufVxuXG4uYmctaW5mbyB7XG4gIC0tYnMtYmctb3BhY2l0eTogMTtcbiAgYmFja2dyb3VuZC1jb2xvcjogcmdiYSh2YXIoLS1icy1pbmZvLXJnYiksIHZhcigtLWJzLWJnLW9wYWNpdHkpKSAhaW1wb3J0YW50O1xufVxuXG4uYmctd2FybmluZyB7XG4gIC0tYnMtYmctb3BhY2l0eTogMTtcbiAgYmFja2dyb3VuZC1jb2xvcjogcmdiYSh2YXIoLS1icy13YXJuaW5nLXJnYiksIHZhcigtLWJzLWJnLW9wYWNpdHkpKSAhaW1wb3J0YW50O1xufVxuXG4uYmctZGFuZ2VyIHtcbiAgLS1icy1iZy1vcGFjaXR5OiAxO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2JhKHZhcigtLWJzLWRhbmdlci1yZ2IpLCB2YXIoLS1icy1iZy1vcGFjaXR5KSkgIWltcG9ydGFudDtcbn1cblxuLmJnLWxpZ2h0IHtcbiAgLS1icy1iZy1vcGFjaXR5OiAxO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2JhKHZhcigtLWJzLWxpZ2h0LXJnYiksIHZhcigtLWJzLWJnLW9wYWNpdHkpKSAhaW1wb3J0YW50O1xufVxuXG4uYmctZGFyayB7XG4gIC0tYnMtYmctb3BhY2l0eTogMTtcbiAgYmFja2dyb3VuZC1jb2xvcjogcmdiYSh2YXIoLS1icy1kYXJrLXJnYiksIHZhcigtLWJzLWJnLW9wYWNpdHkpKSAhaW1wb3J0YW50O1xufVxuXG4uYmctZ3JheSB7XG4gIC0tYnMtYmctb3BhY2l0eTogMTtcbiAgYmFja2dyb3VuZC1jb2xvcjogcmdiYSh2YXIoLS1icy1ncmF5LXJnYiksIHZhcigtLWJzLWJnLW9wYWNpdHkpKSAhaW1wb3J0YW50O1xufVxuXG4uYmctYmxhY2sge1xuICAtLWJzLWJnLW9wYWNpdHk6IDE7XG4gIGJhY2tncm91bmQtY29sb3I6IHJnYmEodmFyKC0tYnMtYmxhY2stcmdiKSwgdmFyKC0tYnMtYmctb3BhY2l0eSkpICFpbXBvcnRhbnQ7XG59XG5cbi5iZy13aGl0ZSB7XG4gIC0tYnMtYmctb3BhY2l0eTogMTtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZmZiAhaW1wb3J0YW50O1xufVxuXG4uYmctYm9keSB7XG4gIC0tYnMtYmctb3BhY2l0eTogMTtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2Y1ZjVmOSAhaW1wb3J0YW50O1xufVxuXG4uYmctdHJhbnNwYXJlbnQge1xuICAtLWJzLWJnLW9wYWNpdHk6IDE7XG4gIGJhY2tncm91bmQtY29sb3I6IHRyYW5zcGFyZW50ICFpbXBvcnRhbnQ7XG59XG5cbi5iZy1saWdodGVyIHtcbiAgLS1icy1iZy1vcGFjaXR5OiAxO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjA1KSAhaW1wb3J0YW50O1xufVxuXG4uYmctbGlnaHRlc3Qge1xuICAtLWJzLWJnLW9wYWNpdHk6IDE7XG4gIGJhY2tncm91bmQtY29sb3I6IHJnYmEoNjcsIDg5LCAxMTMsIDAuMDI1KSAhaW1wb3J0YW50O1xufVxuXG4uYmctZ3JhZGllbnQge1xuICBiYWNrZ3JvdW5kLWltYWdlOiB2YXIoLS1icy1ncmFkaWVudCkgIWltcG9ydGFudDtcbn1cblxuLnVzZXItc2VsZWN0LWFsbCB7XG4gIHVzZXItc2VsZWN0OiBhbGwgIWltcG9ydGFudDtcbn1cblxuLnVzZXItc2VsZWN0LWF1dG8ge1xuICB1c2VyLXNlbGVjdDogYXV0byAhaW1wb3J0YW50O1xufVxuXG4udXNlci1zZWxlY3Qtbm9uZSB7XG4gIHVzZXItc2VsZWN0OiBub25lICFpbXBvcnRhbnQ7XG59XG5cbi5wZS1ub25lIHtcbiAgcG9pbnRlci1ldmVudHM6IG5vbmUgIWltcG9ydGFudDtcbn1cblxuLnBlLWF1dG8ge1xuICBwb2ludGVyLWV2ZW50czogYXV0byAhaW1wb3J0YW50O1xufVxuXG4ucm91bmRlZCB7XG4gIGJvcmRlci1yYWRpdXM6IDAuMzc1cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5yb3VuZGVkLTAge1xuICBib3JkZXItcmFkaXVzOiAwICFpbXBvcnRhbnQ7XG59XG5cbi5yb3VuZGVkLTEge1xuICBib3JkZXItcmFkaXVzOiAwLjI1cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5yb3VuZGVkLTIge1xuICBib3JkZXItcmFkaXVzOiAwLjM3NXJlbSAhaW1wb3J0YW50O1xufVxuXG4ucm91bmRlZC0zIHtcbiAgYm9yZGVyLXJhZGl1czogMC41cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5yb3VuZGVkLWNpcmNsZSB7XG4gIGJvcmRlci1yYWRpdXM6IDUwJSAhaW1wb3J0YW50O1xufVxuXG4ucm91bmRlZC1waWxsIHtcbiAgYm9yZGVyLXJhZGl1czogNTByZW0gIWltcG9ydGFudDtcbn1cblxuLnJvdW5kZWQtdG9wIHtcbiAgYm9yZGVyLXRvcC1sZWZ0LXJhZGl1czogMC4zNzVyZW0gIWltcG9ydGFudDtcbiAgYm9yZGVyLXRvcC1yaWdodC1yYWRpdXM6IDAuMzc1cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5yb3VuZGVkLWJvdHRvbSB7XG4gIGJvcmRlci1ib3R0b20tcmlnaHQtcmFkaXVzOiAwLjM3NXJlbSAhaW1wb3J0YW50O1xuICBib3JkZXItYm90dG9tLWxlZnQtcmFkaXVzOiAwLjM3NXJlbSAhaW1wb3J0YW50O1xufVxuXG4udmlzaWJsZSB7XG4gIHZpc2liaWxpdHk6IHZpc2libGUgIWltcG9ydGFudDtcbn1cblxuLmludmlzaWJsZSB7XG4gIHZpc2liaWxpdHk6IGhpZGRlbiAhaW1wb3J0YW50O1xufVxuXG4uY3Vyc29yLXBvaW50ZXIge1xuICBjdXJzb3I6IHBvaW50ZXIgIWltcG9ydGFudDtcbn1cblxuLmN1cnNvci1tb3ZlIHtcbiAgY3Vyc29yOiBtb3ZlICFpbXBvcnRhbnQ7XG59XG5cbi5jdXJzb3ItZ3JhYiB7XG4gIGN1cnNvcjogZ3JhYiAhaW1wb3J0YW50O1xufVxuXG5AbWVkaWEgKG1pbi13aWR0aDogNTc2cHgpIHtcbiAgLmQtc20taW5saW5lIHtcbiAgICBkaXNwbGF5OiBpbmxpbmUgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLXNtLWlubGluZS1ibG9jayB7XG4gICAgZGlzcGxheTogaW5saW5lLWJsb2NrICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZC1zbS1ibG9jayB7XG4gICAgZGlzcGxheTogYmxvY2sgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLXNtLWdyaWQge1xuICAgIGRpc3BsYXk6IGdyaWQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLXNtLXRhYmxlIHtcbiAgICBkaXNwbGF5OiB0YWJsZSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmQtc20tdGFibGUtcm93IHtcbiAgICBkaXNwbGF5OiB0YWJsZS1yb3cgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLXNtLXRhYmxlLWNlbGwge1xuICAgIGRpc3BsYXk6IHRhYmxlLWNlbGwgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLXNtLWZsZXgge1xuICAgIGRpc3BsYXk6IGZsZXggIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLXNtLWlubGluZS1mbGV4IHtcbiAgICBkaXNwbGF5OiBpbmxpbmUtZmxleCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmQtc20tbm9uZSB7XG4gICAgZGlzcGxheTogbm9uZSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZsZXgtc20tZmlsbCB7XG4gICAgZmxleDogMSAxIGF1dG8gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5mbGV4LXNtLXJvdyB7XG4gICAgZmxleC1kaXJlY3Rpb246IHJvdyAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZsZXgtc20tY29sdW1uIHtcbiAgICBmbGV4LWRpcmVjdGlvbjogY29sdW1uICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxleC1zbS1yb3ctcmV2ZXJzZSB7XG4gICAgZmxleC1kaXJlY3Rpb246IHJvdy1yZXZlcnNlICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxleC1zbS1jb2x1bW4tcmV2ZXJzZSB7XG4gICAgZmxleC1kaXJlY3Rpb246IGNvbHVtbi1yZXZlcnNlICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxleC1zbS1ncm93LTAge1xuICAgIGZsZXgtZ3JvdzogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZsZXgtc20tZ3Jvdy0xIHtcbiAgICBmbGV4LWdyb3c6IDEgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5mbGV4LXNtLXNocmluay0wIHtcbiAgICBmbGV4LXNocmluazogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZsZXgtc20tc2hyaW5rLTEge1xuICAgIGZsZXgtc2hyaW5rOiAxICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxleC1zbS13cmFwIHtcbiAgICBmbGV4LXdyYXA6IHdyYXAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5mbGV4LXNtLW5vd3JhcCB7XG4gICAgZmxleC13cmFwOiBub3dyYXAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5mbGV4LXNtLXdyYXAtcmV2ZXJzZSB7XG4gICAgZmxleC13cmFwOiB3cmFwLXJldmVyc2UgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5nYXAtc20tMCB7XG4gICAgZ2FwOiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZ2FwLXNtLTEge1xuICAgIGdhcDogMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmdhcC1zbS0yIHtcbiAgICBnYXA6IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmdhcC1zbS0zIHtcbiAgICBnYXA6IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5nYXAtc20tNCB7XG4gICAgZ2FwOiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5nYXAtc20tNSB7XG4gICAgZ2FwOiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuanVzdGlmeS1jb250ZW50LXNtLXN0YXJ0IHtcbiAgICBqdXN0aWZ5LWNvbnRlbnQ6IGZsZXgtc3RhcnQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5qdXN0aWZ5LWNvbnRlbnQtc20tZW5kIHtcbiAgICBqdXN0aWZ5LWNvbnRlbnQ6IGZsZXgtZW5kICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuanVzdGlmeS1jb250ZW50LXNtLWNlbnRlciB7XG4gICAganVzdGlmeS1jb250ZW50OiBjZW50ZXIgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5qdXN0aWZ5LWNvbnRlbnQtc20tYmV0d2VlbiB7XG4gICAganVzdGlmeS1jb250ZW50OiBzcGFjZS1iZXR3ZWVuICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuanVzdGlmeS1jb250ZW50LXNtLWFyb3VuZCB7XG4gICAganVzdGlmeS1jb250ZW50OiBzcGFjZS1hcm91bmQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5qdXN0aWZ5LWNvbnRlbnQtc20tZXZlbmx5IHtcbiAgICBqdXN0aWZ5LWNvbnRlbnQ6IHNwYWNlLWV2ZW5seSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLWl0ZW1zLXNtLXN0YXJ0IHtcbiAgICBhbGlnbi1pdGVtczogZmxleC1zdGFydCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLWl0ZW1zLXNtLWVuZCB7XG4gICAgYWxpZ24taXRlbXM6IGZsZXgtZW5kICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24taXRlbXMtc20tY2VudGVyIHtcbiAgICBhbGlnbi1pdGVtczogY2VudGVyICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24taXRlbXMtc20tYmFzZWxpbmUge1xuICAgIGFsaWduLWl0ZW1zOiBiYXNlbGluZSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLWl0ZW1zLXNtLXN0cmV0Y2gge1xuICAgIGFsaWduLWl0ZW1zOiBzdHJldGNoICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24tY29udGVudC1zbS1zdGFydCB7XG4gICAgYWxpZ24tY29udGVudDogZmxleC1zdGFydCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLWNvbnRlbnQtc20tZW5kIHtcbiAgICBhbGlnbi1jb250ZW50OiBmbGV4LWVuZCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLWNvbnRlbnQtc20tY2VudGVyIHtcbiAgICBhbGlnbi1jb250ZW50OiBjZW50ZXIgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1jb250ZW50LXNtLWJldHdlZW4ge1xuICAgIGFsaWduLWNvbnRlbnQ6IHNwYWNlLWJldHdlZW4gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1jb250ZW50LXNtLWFyb3VuZCB7XG4gICAgYWxpZ24tY29udGVudDogc3BhY2UtYXJvdW5kICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24tY29udGVudC1zbS1zdHJldGNoIHtcbiAgICBhbGlnbi1jb250ZW50OiBzdHJldGNoICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24tc2VsZi1zbS1hdXRvIHtcbiAgICBhbGlnbi1zZWxmOiBhdXRvICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24tc2VsZi1zbS1zdGFydCB7XG4gICAgYWxpZ24tc2VsZjogZmxleC1zdGFydCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLXNlbGYtc20tZW5kIHtcbiAgICBhbGlnbi1zZWxmOiBmbGV4LWVuZCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLXNlbGYtc20tY2VudGVyIHtcbiAgICBhbGlnbi1zZWxmOiBjZW50ZXIgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1zZWxmLXNtLWJhc2VsaW5lIHtcbiAgICBhbGlnbi1zZWxmOiBiYXNlbGluZSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLXNlbGYtc20tc3RyZXRjaCB7XG4gICAgYWxpZ24tc2VsZjogc3RyZXRjaCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm9yZGVyLXNtLWZpcnN0IHtcbiAgICBvcmRlcjogLTEgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5vcmRlci1zbS0wIHtcbiAgICBvcmRlcjogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm9yZGVyLXNtLTEge1xuICAgIG9yZGVyOiAxICFpbXBvcnRhbnQ7XG4gIH1cblxuICAub3JkZXItc20tMiB7XG4gICAgb3JkZXI6IDIgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5vcmRlci1zbS0zIHtcbiAgICBvcmRlcjogMyAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm9yZGVyLXNtLTQge1xuICAgIG9yZGVyOiA0ICFpbXBvcnRhbnQ7XG4gIH1cblxuICAub3JkZXItc20tNSB7XG4gICAgb3JkZXI6IDUgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5vcmRlci1zbS1sYXN0IHtcbiAgICBvcmRlcjogNiAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm0tc20tMCB7XG4gICAgbWFyZ2luOiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS1zbS0xIHtcbiAgICBtYXJnaW46IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tLXNtLTIge1xuICAgIG1hcmdpbjogMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS1zbS0zIHtcbiAgICBtYXJnaW46IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tLXNtLTQge1xuICAgIG1hcmdpbjogMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS1zbS01IHtcbiAgICBtYXJnaW46IDNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tLXNtLWF1dG8ge1xuICAgIG1hcmdpbjogYXV0byAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm14LXNtLTAge1xuICAgIG1hcmdpbi1yaWdodDogMCAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXgtc20tMSB7XG4gICAgbWFyZ2luLXJpZ2h0OiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWxlZnQ6IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teC1zbS0yIHtcbiAgICBtYXJnaW4tcmlnaHQ6IDAuNXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teC1zbS0zIHtcbiAgICBtYXJnaW4tcmlnaHQ6IDFyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tbGVmdDogMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm14LXNtLTQge1xuICAgIG1hcmdpbi1yaWdodDogMS41cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWxlZnQ6IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm14LXNtLTUge1xuICAgIG1hcmdpbi1yaWdodDogM3JlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXgtc20tYXV0byB7XG4gICAgbWFyZ2luLXJpZ2h0OiBhdXRvICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWxlZnQ6IGF1dG8gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teS1zbS0wIHtcbiAgICBtYXJnaW4tdG9wOiAwICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWJvdHRvbTogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm15LXNtLTEge1xuICAgIG1hcmdpbi10b3A6IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tYm90dG9tOiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXktc20tMiB7XG4gICAgbWFyZ2luLXRvcDogMC41cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWJvdHRvbTogMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXktc20tMyB7XG4gICAgbWFyZ2luLXRvcDogMXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1ib3R0b206IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teS1zbS00IHtcbiAgICBtYXJnaW4tdG9wOiAxLjVyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tYm90dG9tOiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teS1zbS01IHtcbiAgICBtYXJnaW4tdG9wOiAzcmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWJvdHRvbTogM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm15LXNtLWF1dG8ge1xuICAgIG1hcmdpbi10b3A6IGF1dG8gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tYm90dG9tOiBhdXRvICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXQtc20tMCB7XG4gICAgbWFyZ2luLXRvcDogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm10LXNtLTEge1xuICAgIG1hcmdpbi10b3A6IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tdC1zbS0yIHtcbiAgICBtYXJnaW4tdG9wOiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tdC1zbS0zIHtcbiAgICBtYXJnaW4tdG9wOiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXQtc20tNCB7XG4gICAgbWFyZ2luLXRvcDogMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXQtc20tNSB7XG4gICAgbWFyZ2luLXRvcDogM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm10LXNtLWF1dG8ge1xuICAgIG1hcmdpbi10b3A6IGF1dG8gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi1zbS0wIHtcbiAgICBtYXJnaW4tYm90dG9tOiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWItc20tMSB7XG4gICAgbWFyZ2luLWJvdHRvbTogMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1iLXNtLTIge1xuICAgIG1hcmdpbi1ib3R0b206IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1iLXNtLTMge1xuICAgIG1hcmdpbi1ib3R0b206IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi1zbS00IHtcbiAgICBtYXJnaW4tYm90dG9tOiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi1zbS01IHtcbiAgICBtYXJnaW4tYm90dG9tOiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWItc20tYXV0byB7XG4gICAgbWFyZ2luLWJvdHRvbTogYXV0byAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm0tc20tbjEge1xuICAgIG1hcmdpbjogLTAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tLXNtLW4yIHtcbiAgICBtYXJnaW46IC0wLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tLXNtLW4zIHtcbiAgICBtYXJnaW46IC0xcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS1zbS1uNCB7XG4gICAgbWFyZ2luOiAtMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS1zbS1uNSB7XG4gICAgbWFyZ2luOiAtM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm14LXNtLW4xIHtcbiAgICBtYXJnaW4tcmlnaHQ6IC0wLjI1cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWxlZnQ6IC0wLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXgtc20tbjIge1xuICAgIG1hcmdpbi1yaWdodDogLTAuNXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiAtMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXgtc20tbjMge1xuICAgIG1hcmdpbi1yaWdodDogLTFyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tbGVmdDogLTFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teC1zbS1uNCB7XG4gICAgbWFyZ2luLXJpZ2h0OiAtMS41cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWxlZnQ6IC0xLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teC1zbS1uNSB7XG4gICAgbWFyZ2luLXJpZ2h0OiAtM3JlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiAtM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm15LXNtLW4xIHtcbiAgICBtYXJnaW4tdG9wOiAtMC4yNXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1ib3R0b206IC0wLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXktc20tbjIge1xuICAgIG1hcmdpbi10b3A6IC0wLjVyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tYm90dG9tOiAtMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXktc20tbjMge1xuICAgIG1hcmdpbi10b3A6IC0xcmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWJvdHRvbTogLTFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teS1zbS1uNCB7XG4gICAgbWFyZ2luLXRvcDogLTEuNXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1ib3R0b206IC0xLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teS1zbS1uNSB7XG4gICAgbWFyZ2luLXRvcDogLTNyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tYm90dG9tOiAtM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm10LXNtLW4xIHtcbiAgICBtYXJnaW4tdG9wOiAtMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm10LXNtLW4yIHtcbiAgICBtYXJnaW4tdG9wOiAtMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXQtc20tbjMge1xuICAgIG1hcmdpbi10b3A6IC0xcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXQtc20tbjQge1xuICAgIG1hcmdpbi10b3A6IC0xLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tdC1zbS1uNSB7XG4gICAgbWFyZ2luLXRvcDogLTNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi1zbS1uMSB7XG4gICAgbWFyZ2luLWJvdHRvbTogLTAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi1zbS1uMiB7XG4gICAgbWFyZ2luLWJvdHRvbTogLTAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1iLXNtLW4zIHtcbiAgICBtYXJnaW4tYm90dG9tOiAtMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1iLXNtLW40IHtcbiAgICBtYXJnaW4tYm90dG9tOiAtMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWItc20tbjUge1xuICAgIG1hcmdpbi1ib3R0b206IC0zcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucC1zbS0wIHtcbiAgICBwYWRkaW5nOiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucC1zbS0xIHtcbiAgICBwYWRkaW5nOiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucC1zbS0yIHtcbiAgICBwYWRkaW5nOiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wLXNtLTMge1xuICAgIHBhZGRpbmc6IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wLXNtLTQge1xuICAgIHBhZGRpbmc6IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnAtc20tNSB7XG4gICAgcGFkZGluZzogM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB4LXNtLTAge1xuICAgIHBhZGRpbmctcmlnaHQ6IDAgIWltcG9ydGFudDtcbiAgICBwYWRkaW5nLWxlZnQ6IDAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weC1zbS0xIHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1sZWZ0OiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHgtc20tMiB7XG4gICAgcGFkZGluZy1yaWdodDogMC41cmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1sZWZ0OiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weC1zbS0zIHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAxcmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1sZWZ0OiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHgtc20tNCB7XG4gICAgcGFkZGluZy1yaWdodDogMS41cmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1sZWZ0OiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weC1zbS01IHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAzcmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1sZWZ0OiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHktc20tMCB7XG4gICAgcGFkZGluZy10b3A6IDAgIWltcG9ydGFudDtcbiAgICBwYWRkaW5nLWJvdHRvbTogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB5LXNtLTEge1xuICAgIHBhZGRpbmctdG9wOiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1ib3R0b206IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weS1zbS0yIHtcbiAgICBwYWRkaW5nLXRvcDogMC41cmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1ib3R0b206IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB5LXNtLTMge1xuICAgIHBhZGRpbmctdG9wOiAxcmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1ib3R0b206IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weS1zbS00IHtcbiAgICBwYWRkaW5nLXRvcDogMS41cmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1ib3R0b206IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB5LXNtLTUge1xuICAgIHBhZGRpbmctdG9wOiAzcmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1ib3R0b206IDNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wdC1zbS0wIHtcbiAgICBwYWRkaW5nLXRvcDogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB0LXNtLTEge1xuICAgIHBhZGRpbmctdG9wOiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHQtc20tMiB7XG4gICAgcGFkZGluZy10b3A6IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB0LXNtLTMge1xuICAgIHBhZGRpbmctdG9wOiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHQtc20tNCB7XG4gICAgcGFkZGluZy10b3A6IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB0LXNtLTUge1xuICAgIHBhZGRpbmctdG9wOiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucGItc20tMCB7XG4gICAgcGFkZGluZy1ib3R0b206IDAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wYi1zbS0xIHtcbiAgICBwYWRkaW5nLWJvdHRvbTogMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBiLXNtLTIge1xuICAgIHBhZGRpbmctYm90dG9tOiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wYi1zbS0zIHtcbiAgICBwYWRkaW5nLWJvdHRvbTogMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBiLXNtLTQge1xuICAgIHBhZGRpbmctYm90dG9tOiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wYi1zbS01IHtcbiAgICBwYWRkaW5nLWJvdHRvbTogM3JlbSAhaW1wb3J0YW50O1xuICB9XG59XG5AbWVkaWEgKG1pbi13aWR0aDogNzY4cHgpIHtcbiAgLmQtbWQtaW5saW5lIHtcbiAgICBkaXNwbGF5OiBpbmxpbmUgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLW1kLWlubGluZS1ibG9jayB7XG4gICAgZGlzcGxheTogaW5saW5lLWJsb2NrICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZC1tZC1ibG9jayB7XG4gICAgZGlzcGxheTogYmxvY2sgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLW1kLWdyaWQge1xuICAgIGRpc3BsYXk6IGdyaWQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLW1kLXRhYmxlIHtcbiAgICBkaXNwbGF5OiB0YWJsZSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmQtbWQtdGFibGUtcm93IHtcbiAgICBkaXNwbGF5OiB0YWJsZS1yb3cgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLW1kLXRhYmxlLWNlbGwge1xuICAgIGRpc3BsYXk6IHRhYmxlLWNlbGwgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLW1kLWZsZXgge1xuICAgIGRpc3BsYXk6IGZsZXggIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLW1kLWlubGluZS1mbGV4IHtcbiAgICBkaXNwbGF5OiBpbmxpbmUtZmxleCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmQtbWQtbm9uZSB7XG4gICAgZGlzcGxheTogbm9uZSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZsZXgtbWQtZmlsbCB7XG4gICAgZmxleDogMSAxIGF1dG8gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5mbGV4LW1kLXJvdyB7XG4gICAgZmxleC1kaXJlY3Rpb246IHJvdyAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZsZXgtbWQtY29sdW1uIHtcbiAgICBmbGV4LWRpcmVjdGlvbjogY29sdW1uICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxleC1tZC1yb3ctcmV2ZXJzZSB7XG4gICAgZmxleC1kaXJlY3Rpb246IHJvdy1yZXZlcnNlICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxleC1tZC1jb2x1bW4tcmV2ZXJzZSB7XG4gICAgZmxleC1kaXJlY3Rpb246IGNvbHVtbi1yZXZlcnNlICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxleC1tZC1ncm93LTAge1xuICAgIGZsZXgtZ3JvdzogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZsZXgtbWQtZ3Jvdy0xIHtcbiAgICBmbGV4LWdyb3c6IDEgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5mbGV4LW1kLXNocmluay0wIHtcbiAgICBmbGV4LXNocmluazogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZsZXgtbWQtc2hyaW5rLTEge1xuICAgIGZsZXgtc2hyaW5rOiAxICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxleC1tZC13cmFwIHtcbiAgICBmbGV4LXdyYXA6IHdyYXAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5mbGV4LW1kLW5vd3JhcCB7XG4gICAgZmxleC13cmFwOiBub3dyYXAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5mbGV4LW1kLXdyYXAtcmV2ZXJzZSB7XG4gICAgZmxleC13cmFwOiB3cmFwLXJldmVyc2UgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5nYXAtbWQtMCB7XG4gICAgZ2FwOiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZ2FwLW1kLTEge1xuICAgIGdhcDogMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmdhcC1tZC0yIHtcbiAgICBnYXA6IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmdhcC1tZC0zIHtcbiAgICBnYXA6IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5nYXAtbWQtNCB7XG4gICAgZ2FwOiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5nYXAtbWQtNSB7XG4gICAgZ2FwOiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuanVzdGlmeS1jb250ZW50LW1kLXN0YXJ0IHtcbiAgICBqdXN0aWZ5LWNvbnRlbnQ6IGZsZXgtc3RhcnQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5qdXN0aWZ5LWNvbnRlbnQtbWQtZW5kIHtcbiAgICBqdXN0aWZ5LWNvbnRlbnQ6IGZsZXgtZW5kICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuanVzdGlmeS1jb250ZW50LW1kLWNlbnRlciB7XG4gICAganVzdGlmeS1jb250ZW50OiBjZW50ZXIgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5qdXN0aWZ5LWNvbnRlbnQtbWQtYmV0d2VlbiB7XG4gICAganVzdGlmeS1jb250ZW50OiBzcGFjZS1iZXR3ZWVuICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuanVzdGlmeS1jb250ZW50LW1kLWFyb3VuZCB7XG4gICAganVzdGlmeS1jb250ZW50OiBzcGFjZS1hcm91bmQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5qdXN0aWZ5LWNvbnRlbnQtbWQtZXZlbmx5IHtcbiAgICBqdXN0aWZ5LWNvbnRlbnQ6IHNwYWNlLWV2ZW5seSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLWl0ZW1zLW1kLXN0YXJ0IHtcbiAgICBhbGlnbi1pdGVtczogZmxleC1zdGFydCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLWl0ZW1zLW1kLWVuZCB7XG4gICAgYWxpZ24taXRlbXM6IGZsZXgtZW5kICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24taXRlbXMtbWQtY2VudGVyIHtcbiAgICBhbGlnbi1pdGVtczogY2VudGVyICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24taXRlbXMtbWQtYmFzZWxpbmUge1xuICAgIGFsaWduLWl0ZW1zOiBiYXNlbGluZSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLWl0ZW1zLW1kLXN0cmV0Y2gge1xuICAgIGFsaWduLWl0ZW1zOiBzdHJldGNoICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24tY29udGVudC1tZC1zdGFydCB7XG4gICAgYWxpZ24tY29udGVudDogZmxleC1zdGFydCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLWNvbnRlbnQtbWQtZW5kIHtcbiAgICBhbGlnbi1jb250ZW50OiBmbGV4LWVuZCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLWNvbnRlbnQtbWQtY2VudGVyIHtcbiAgICBhbGlnbi1jb250ZW50OiBjZW50ZXIgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1jb250ZW50LW1kLWJldHdlZW4ge1xuICAgIGFsaWduLWNvbnRlbnQ6IHNwYWNlLWJldHdlZW4gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1jb250ZW50LW1kLWFyb3VuZCB7XG4gICAgYWxpZ24tY29udGVudDogc3BhY2UtYXJvdW5kICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24tY29udGVudC1tZC1zdHJldGNoIHtcbiAgICBhbGlnbi1jb250ZW50OiBzdHJldGNoICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24tc2VsZi1tZC1hdXRvIHtcbiAgICBhbGlnbi1zZWxmOiBhdXRvICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24tc2VsZi1tZC1zdGFydCB7XG4gICAgYWxpZ24tc2VsZjogZmxleC1zdGFydCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLXNlbGYtbWQtZW5kIHtcbiAgICBhbGlnbi1zZWxmOiBmbGV4LWVuZCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLXNlbGYtbWQtY2VudGVyIHtcbiAgICBhbGlnbi1zZWxmOiBjZW50ZXIgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1zZWxmLW1kLWJhc2VsaW5lIHtcbiAgICBhbGlnbi1zZWxmOiBiYXNlbGluZSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLXNlbGYtbWQtc3RyZXRjaCB7XG4gICAgYWxpZ24tc2VsZjogc3RyZXRjaCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm9yZGVyLW1kLWZpcnN0IHtcbiAgICBvcmRlcjogLTEgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5vcmRlci1tZC0wIHtcbiAgICBvcmRlcjogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm9yZGVyLW1kLTEge1xuICAgIG9yZGVyOiAxICFpbXBvcnRhbnQ7XG4gIH1cblxuICAub3JkZXItbWQtMiB7XG4gICAgb3JkZXI6IDIgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5vcmRlci1tZC0zIHtcbiAgICBvcmRlcjogMyAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm9yZGVyLW1kLTQge1xuICAgIG9yZGVyOiA0ICFpbXBvcnRhbnQ7XG4gIH1cblxuICAub3JkZXItbWQtNSB7XG4gICAgb3JkZXI6IDUgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5vcmRlci1tZC1sYXN0IHtcbiAgICBvcmRlcjogNiAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm0tbWQtMCB7XG4gICAgbWFyZ2luOiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS1tZC0xIHtcbiAgICBtYXJnaW46IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tLW1kLTIge1xuICAgIG1hcmdpbjogMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS1tZC0zIHtcbiAgICBtYXJnaW46IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tLW1kLTQge1xuICAgIG1hcmdpbjogMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS1tZC01IHtcbiAgICBtYXJnaW46IDNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tLW1kLWF1dG8ge1xuICAgIG1hcmdpbjogYXV0byAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm14LW1kLTAge1xuICAgIG1hcmdpbi1yaWdodDogMCAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXgtbWQtMSB7XG4gICAgbWFyZ2luLXJpZ2h0OiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWxlZnQ6IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teC1tZC0yIHtcbiAgICBtYXJnaW4tcmlnaHQ6IDAuNXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teC1tZC0zIHtcbiAgICBtYXJnaW4tcmlnaHQ6IDFyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tbGVmdDogMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm14LW1kLTQge1xuICAgIG1hcmdpbi1yaWdodDogMS41cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWxlZnQ6IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm14LW1kLTUge1xuICAgIG1hcmdpbi1yaWdodDogM3JlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXgtbWQtYXV0byB7XG4gICAgbWFyZ2luLXJpZ2h0OiBhdXRvICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWxlZnQ6IGF1dG8gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teS1tZC0wIHtcbiAgICBtYXJnaW4tdG9wOiAwICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWJvdHRvbTogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm15LW1kLTEge1xuICAgIG1hcmdpbi10b3A6IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tYm90dG9tOiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXktbWQtMiB7XG4gICAgbWFyZ2luLXRvcDogMC41cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWJvdHRvbTogMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXktbWQtMyB7XG4gICAgbWFyZ2luLXRvcDogMXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1ib3R0b206IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teS1tZC00IHtcbiAgICBtYXJnaW4tdG9wOiAxLjVyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tYm90dG9tOiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teS1tZC01IHtcbiAgICBtYXJnaW4tdG9wOiAzcmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWJvdHRvbTogM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm15LW1kLWF1dG8ge1xuICAgIG1hcmdpbi10b3A6IGF1dG8gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tYm90dG9tOiBhdXRvICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXQtbWQtMCB7XG4gICAgbWFyZ2luLXRvcDogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm10LW1kLTEge1xuICAgIG1hcmdpbi10b3A6IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tdC1tZC0yIHtcbiAgICBtYXJnaW4tdG9wOiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tdC1tZC0zIHtcbiAgICBtYXJnaW4tdG9wOiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXQtbWQtNCB7XG4gICAgbWFyZ2luLXRvcDogMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXQtbWQtNSB7XG4gICAgbWFyZ2luLXRvcDogM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm10LW1kLWF1dG8ge1xuICAgIG1hcmdpbi10b3A6IGF1dG8gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi1tZC0wIHtcbiAgICBtYXJnaW4tYm90dG9tOiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWItbWQtMSB7XG4gICAgbWFyZ2luLWJvdHRvbTogMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1iLW1kLTIge1xuICAgIG1hcmdpbi1ib3R0b206IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1iLW1kLTMge1xuICAgIG1hcmdpbi1ib3R0b206IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi1tZC00IHtcbiAgICBtYXJnaW4tYm90dG9tOiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi1tZC01IHtcbiAgICBtYXJnaW4tYm90dG9tOiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWItbWQtYXV0byB7XG4gICAgbWFyZ2luLWJvdHRvbTogYXV0byAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm0tbWQtbjEge1xuICAgIG1hcmdpbjogLTAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tLW1kLW4yIHtcbiAgICBtYXJnaW46IC0wLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tLW1kLW4zIHtcbiAgICBtYXJnaW46IC0xcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS1tZC1uNCB7XG4gICAgbWFyZ2luOiAtMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS1tZC1uNSB7XG4gICAgbWFyZ2luOiAtM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm14LW1kLW4xIHtcbiAgICBtYXJnaW4tcmlnaHQ6IC0wLjI1cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWxlZnQ6IC0wLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXgtbWQtbjIge1xuICAgIG1hcmdpbi1yaWdodDogLTAuNXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiAtMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXgtbWQtbjMge1xuICAgIG1hcmdpbi1yaWdodDogLTFyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tbGVmdDogLTFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teC1tZC1uNCB7XG4gICAgbWFyZ2luLXJpZ2h0OiAtMS41cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWxlZnQ6IC0xLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teC1tZC1uNSB7XG4gICAgbWFyZ2luLXJpZ2h0OiAtM3JlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiAtM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm15LW1kLW4xIHtcbiAgICBtYXJnaW4tdG9wOiAtMC4yNXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1ib3R0b206IC0wLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXktbWQtbjIge1xuICAgIG1hcmdpbi10b3A6IC0wLjVyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tYm90dG9tOiAtMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXktbWQtbjMge1xuICAgIG1hcmdpbi10b3A6IC0xcmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWJvdHRvbTogLTFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teS1tZC1uNCB7XG4gICAgbWFyZ2luLXRvcDogLTEuNXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1ib3R0b206IC0xLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teS1tZC1uNSB7XG4gICAgbWFyZ2luLXRvcDogLTNyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tYm90dG9tOiAtM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm10LW1kLW4xIHtcbiAgICBtYXJnaW4tdG9wOiAtMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm10LW1kLW4yIHtcbiAgICBtYXJnaW4tdG9wOiAtMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXQtbWQtbjMge1xuICAgIG1hcmdpbi10b3A6IC0xcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXQtbWQtbjQge1xuICAgIG1hcmdpbi10b3A6IC0xLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tdC1tZC1uNSB7XG4gICAgbWFyZ2luLXRvcDogLTNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi1tZC1uMSB7XG4gICAgbWFyZ2luLWJvdHRvbTogLTAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi1tZC1uMiB7XG4gICAgbWFyZ2luLWJvdHRvbTogLTAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1iLW1kLW4zIHtcbiAgICBtYXJnaW4tYm90dG9tOiAtMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1iLW1kLW40IHtcbiAgICBtYXJnaW4tYm90dG9tOiAtMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWItbWQtbjUge1xuICAgIG1hcmdpbi1ib3R0b206IC0zcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucC1tZC0wIHtcbiAgICBwYWRkaW5nOiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucC1tZC0xIHtcbiAgICBwYWRkaW5nOiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucC1tZC0yIHtcbiAgICBwYWRkaW5nOiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wLW1kLTMge1xuICAgIHBhZGRpbmc6IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wLW1kLTQge1xuICAgIHBhZGRpbmc6IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnAtbWQtNSB7XG4gICAgcGFkZGluZzogM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB4LW1kLTAge1xuICAgIHBhZGRpbmctcmlnaHQ6IDAgIWltcG9ydGFudDtcbiAgICBwYWRkaW5nLWxlZnQ6IDAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weC1tZC0xIHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1sZWZ0OiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHgtbWQtMiB7XG4gICAgcGFkZGluZy1yaWdodDogMC41cmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1sZWZ0OiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weC1tZC0zIHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAxcmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1sZWZ0OiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHgtbWQtNCB7XG4gICAgcGFkZGluZy1yaWdodDogMS41cmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1sZWZ0OiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weC1tZC01IHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAzcmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1sZWZ0OiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHktbWQtMCB7XG4gICAgcGFkZGluZy10b3A6IDAgIWltcG9ydGFudDtcbiAgICBwYWRkaW5nLWJvdHRvbTogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB5LW1kLTEge1xuICAgIHBhZGRpbmctdG9wOiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1ib3R0b206IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weS1tZC0yIHtcbiAgICBwYWRkaW5nLXRvcDogMC41cmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1ib3R0b206IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB5LW1kLTMge1xuICAgIHBhZGRpbmctdG9wOiAxcmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1ib3R0b206IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weS1tZC00IHtcbiAgICBwYWRkaW5nLXRvcDogMS41cmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1ib3R0b206IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB5LW1kLTUge1xuICAgIHBhZGRpbmctdG9wOiAzcmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1ib3R0b206IDNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wdC1tZC0wIHtcbiAgICBwYWRkaW5nLXRvcDogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB0LW1kLTEge1xuICAgIHBhZGRpbmctdG9wOiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHQtbWQtMiB7XG4gICAgcGFkZGluZy10b3A6IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB0LW1kLTMge1xuICAgIHBhZGRpbmctdG9wOiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHQtbWQtNCB7XG4gICAgcGFkZGluZy10b3A6IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB0LW1kLTUge1xuICAgIHBhZGRpbmctdG9wOiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucGItbWQtMCB7XG4gICAgcGFkZGluZy1ib3R0b206IDAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wYi1tZC0xIHtcbiAgICBwYWRkaW5nLWJvdHRvbTogMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBiLW1kLTIge1xuICAgIHBhZGRpbmctYm90dG9tOiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wYi1tZC0zIHtcbiAgICBwYWRkaW5nLWJvdHRvbTogMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBiLW1kLTQge1xuICAgIHBhZGRpbmctYm90dG9tOiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wYi1tZC01IHtcbiAgICBwYWRkaW5nLWJvdHRvbTogM3JlbSAhaW1wb3J0YW50O1xuICB9XG59XG5AbWVkaWEgKG1pbi13aWR0aDogOTkycHgpIHtcbiAgLmQtbGctaW5saW5lIHtcbiAgICBkaXNwbGF5OiBpbmxpbmUgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLWxnLWlubGluZS1ibG9jayB7XG4gICAgZGlzcGxheTogaW5saW5lLWJsb2NrICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZC1sZy1ibG9jayB7XG4gICAgZGlzcGxheTogYmxvY2sgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLWxnLWdyaWQge1xuICAgIGRpc3BsYXk6IGdyaWQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLWxnLXRhYmxlIHtcbiAgICBkaXNwbGF5OiB0YWJsZSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmQtbGctdGFibGUtcm93IHtcbiAgICBkaXNwbGF5OiB0YWJsZS1yb3cgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLWxnLXRhYmxlLWNlbGwge1xuICAgIGRpc3BsYXk6IHRhYmxlLWNlbGwgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLWxnLWZsZXgge1xuICAgIGRpc3BsYXk6IGZsZXggIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLWxnLWlubGluZS1mbGV4IHtcbiAgICBkaXNwbGF5OiBpbmxpbmUtZmxleCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmQtbGctbm9uZSB7XG4gICAgZGlzcGxheTogbm9uZSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZsZXgtbGctZmlsbCB7XG4gICAgZmxleDogMSAxIGF1dG8gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5mbGV4LWxnLXJvdyB7XG4gICAgZmxleC1kaXJlY3Rpb246IHJvdyAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZsZXgtbGctY29sdW1uIHtcbiAgICBmbGV4LWRpcmVjdGlvbjogY29sdW1uICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxleC1sZy1yb3ctcmV2ZXJzZSB7XG4gICAgZmxleC1kaXJlY3Rpb246IHJvdy1yZXZlcnNlICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxleC1sZy1jb2x1bW4tcmV2ZXJzZSB7XG4gICAgZmxleC1kaXJlY3Rpb246IGNvbHVtbi1yZXZlcnNlICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxleC1sZy1ncm93LTAge1xuICAgIGZsZXgtZ3JvdzogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZsZXgtbGctZ3Jvdy0xIHtcbiAgICBmbGV4LWdyb3c6IDEgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5mbGV4LWxnLXNocmluay0wIHtcbiAgICBmbGV4LXNocmluazogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZsZXgtbGctc2hyaW5rLTEge1xuICAgIGZsZXgtc2hyaW5rOiAxICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxleC1sZy13cmFwIHtcbiAgICBmbGV4LXdyYXA6IHdyYXAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5mbGV4LWxnLW5vd3JhcCB7XG4gICAgZmxleC13cmFwOiBub3dyYXAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5mbGV4LWxnLXdyYXAtcmV2ZXJzZSB7XG4gICAgZmxleC13cmFwOiB3cmFwLXJldmVyc2UgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5nYXAtbGctMCB7XG4gICAgZ2FwOiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZ2FwLWxnLTEge1xuICAgIGdhcDogMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmdhcC1sZy0yIHtcbiAgICBnYXA6IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmdhcC1sZy0zIHtcbiAgICBnYXA6IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5nYXAtbGctNCB7XG4gICAgZ2FwOiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5nYXAtbGctNSB7XG4gICAgZ2FwOiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuanVzdGlmeS1jb250ZW50LWxnLXN0YXJ0IHtcbiAgICBqdXN0aWZ5LWNvbnRlbnQ6IGZsZXgtc3RhcnQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5qdXN0aWZ5LWNvbnRlbnQtbGctZW5kIHtcbiAgICBqdXN0aWZ5LWNvbnRlbnQ6IGZsZXgtZW5kICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuanVzdGlmeS1jb250ZW50LWxnLWNlbnRlciB7XG4gICAganVzdGlmeS1jb250ZW50OiBjZW50ZXIgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5qdXN0aWZ5LWNvbnRlbnQtbGctYmV0d2VlbiB7XG4gICAganVzdGlmeS1jb250ZW50OiBzcGFjZS1iZXR3ZWVuICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuanVzdGlmeS1jb250ZW50LWxnLWFyb3VuZCB7XG4gICAganVzdGlmeS1jb250ZW50OiBzcGFjZS1hcm91bmQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5qdXN0aWZ5LWNvbnRlbnQtbGctZXZlbmx5IHtcbiAgICBqdXN0aWZ5LWNvbnRlbnQ6IHNwYWNlLWV2ZW5seSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLWl0ZW1zLWxnLXN0YXJ0IHtcbiAgICBhbGlnbi1pdGVtczogZmxleC1zdGFydCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLWl0ZW1zLWxnLWVuZCB7XG4gICAgYWxpZ24taXRlbXM6IGZsZXgtZW5kICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24taXRlbXMtbGctY2VudGVyIHtcbiAgICBhbGlnbi1pdGVtczogY2VudGVyICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24taXRlbXMtbGctYmFzZWxpbmUge1xuICAgIGFsaWduLWl0ZW1zOiBiYXNlbGluZSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLWl0ZW1zLWxnLXN0cmV0Y2gge1xuICAgIGFsaWduLWl0ZW1zOiBzdHJldGNoICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24tY29udGVudC1sZy1zdGFydCB7XG4gICAgYWxpZ24tY29udGVudDogZmxleC1zdGFydCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLWNvbnRlbnQtbGctZW5kIHtcbiAgICBhbGlnbi1jb250ZW50OiBmbGV4LWVuZCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLWNvbnRlbnQtbGctY2VudGVyIHtcbiAgICBhbGlnbi1jb250ZW50OiBjZW50ZXIgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1jb250ZW50LWxnLWJldHdlZW4ge1xuICAgIGFsaWduLWNvbnRlbnQ6IHNwYWNlLWJldHdlZW4gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1jb250ZW50LWxnLWFyb3VuZCB7XG4gICAgYWxpZ24tY29udGVudDogc3BhY2UtYXJvdW5kICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24tY29udGVudC1sZy1zdHJldGNoIHtcbiAgICBhbGlnbi1jb250ZW50OiBzdHJldGNoICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24tc2VsZi1sZy1hdXRvIHtcbiAgICBhbGlnbi1zZWxmOiBhdXRvICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24tc2VsZi1sZy1zdGFydCB7XG4gICAgYWxpZ24tc2VsZjogZmxleC1zdGFydCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLXNlbGYtbGctZW5kIHtcbiAgICBhbGlnbi1zZWxmOiBmbGV4LWVuZCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLXNlbGYtbGctY2VudGVyIHtcbiAgICBhbGlnbi1zZWxmOiBjZW50ZXIgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1zZWxmLWxnLWJhc2VsaW5lIHtcbiAgICBhbGlnbi1zZWxmOiBiYXNlbGluZSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLXNlbGYtbGctc3RyZXRjaCB7XG4gICAgYWxpZ24tc2VsZjogc3RyZXRjaCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm9yZGVyLWxnLWZpcnN0IHtcbiAgICBvcmRlcjogLTEgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5vcmRlci1sZy0wIHtcbiAgICBvcmRlcjogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm9yZGVyLWxnLTEge1xuICAgIG9yZGVyOiAxICFpbXBvcnRhbnQ7XG4gIH1cblxuICAub3JkZXItbGctMiB7XG4gICAgb3JkZXI6IDIgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5vcmRlci1sZy0zIHtcbiAgICBvcmRlcjogMyAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm9yZGVyLWxnLTQge1xuICAgIG9yZGVyOiA0ICFpbXBvcnRhbnQ7XG4gIH1cblxuICAub3JkZXItbGctNSB7XG4gICAgb3JkZXI6IDUgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5vcmRlci1sZy1sYXN0IHtcbiAgICBvcmRlcjogNiAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm0tbGctMCB7XG4gICAgbWFyZ2luOiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS1sZy0xIHtcbiAgICBtYXJnaW46IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tLWxnLTIge1xuICAgIG1hcmdpbjogMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS1sZy0zIHtcbiAgICBtYXJnaW46IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tLWxnLTQge1xuICAgIG1hcmdpbjogMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS1sZy01IHtcbiAgICBtYXJnaW46IDNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tLWxnLWF1dG8ge1xuICAgIG1hcmdpbjogYXV0byAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm14LWxnLTAge1xuICAgIG1hcmdpbi1yaWdodDogMCAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXgtbGctMSB7XG4gICAgbWFyZ2luLXJpZ2h0OiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWxlZnQ6IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teC1sZy0yIHtcbiAgICBtYXJnaW4tcmlnaHQ6IDAuNXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teC1sZy0zIHtcbiAgICBtYXJnaW4tcmlnaHQ6IDFyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tbGVmdDogMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm14LWxnLTQge1xuICAgIG1hcmdpbi1yaWdodDogMS41cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWxlZnQ6IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm14LWxnLTUge1xuICAgIG1hcmdpbi1yaWdodDogM3JlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXgtbGctYXV0byB7XG4gICAgbWFyZ2luLXJpZ2h0OiBhdXRvICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWxlZnQ6IGF1dG8gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teS1sZy0wIHtcbiAgICBtYXJnaW4tdG9wOiAwICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWJvdHRvbTogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm15LWxnLTEge1xuICAgIG1hcmdpbi10b3A6IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tYm90dG9tOiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXktbGctMiB7XG4gICAgbWFyZ2luLXRvcDogMC41cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWJvdHRvbTogMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXktbGctMyB7XG4gICAgbWFyZ2luLXRvcDogMXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1ib3R0b206IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teS1sZy00IHtcbiAgICBtYXJnaW4tdG9wOiAxLjVyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tYm90dG9tOiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teS1sZy01IHtcbiAgICBtYXJnaW4tdG9wOiAzcmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWJvdHRvbTogM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm15LWxnLWF1dG8ge1xuICAgIG1hcmdpbi10b3A6IGF1dG8gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tYm90dG9tOiBhdXRvICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXQtbGctMCB7XG4gICAgbWFyZ2luLXRvcDogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm10LWxnLTEge1xuICAgIG1hcmdpbi10b3A6IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tdC1sZy0yIHtcbiAgICBtYXJnaW4tdG9wOiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tdC1sZy0zIHtcbiAgICBtYXJnaW4tdG9wOiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXQtbGctNCB7XG4gICAgbWFyZ2luLXRvcDogMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXQtbGctNSB7XG4gICAgbWFyZ2luLXRvcDogM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm10LWxnLWF1dG8ge1xuICAgIG1hcmdpbi10b3A6IGF1dG8gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi1sZy0wIHtcbiAgICBtYXJnaW4tYm90dG9tOiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWItbGctMSB7XG4gICAgbWFyZ2luLWJvdHRvbTogMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1iLWxnLTIge1xuICAgIG1hcmdpbi1ib3R0b206IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1iLWxnLTMge1xuICAgIG1hcmdpbi1ib3R0b206IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi1sZy00IHtcbiAgICBtYXJnaW4tYm90dG9tOiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi1sZy01IHtcbiAgICBtYXJnaW4tYm90dG9tOiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWItbGctYXV0byB7XG4gICAgbWFyZ2luLWJvdHRvbTogYXV0byAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm0tbGctbjEge1xuICAgIG1hcmdpbjogLTAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tLWxnLW4yIHtcbiAgICBtYXJnaW46IC0wLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tLWxnLW4zIHtcbiAgICBtYXJnaW46IC0xcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS1sZy1uNCB7XG4gICAgbWFyZ2luOiAtMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS1sZy1uNSB7XG4gICAgbWFyZ2luOiAtM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm14LWxnLW4xIHtcbiAgICBtYXJnaW4tcmlnaHQ6IC0wLjI1cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWxlZnQ6IC0wLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXgtbGctbjIge1xuICAgIG1hcmdpbi1yaWdodDogLTAuNXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiAtMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXgtbGctbjMge1xuICAgIG1hcmdpbi1yaWdodDogLTFyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tbGVmdDogLTFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teC1sZy1uNCB7XG4gICAgbWFyZ2luLXJpZ2h0OiAtMS41cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWxlZnQ6IC0xLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teC1sZy1uNSB7XG4gICAgbWFyZ2luLXJpZ2h0OiAtM3JlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiAtM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm15LWxnLW4xIHtcbiAgICBtYXJnaW4tdG9wOiAtMC4yNXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1ib3R0b206IC0wLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXktbGctbjIge1xuICAgIG1hcmdpbi10b3A6IC0wLjVyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tYm90dG9tOiAtMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXktbGctbjMge1xuICAgIG1hcmdpbi10b3A6IC0xcmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWJvdHRvbTogLTFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teS1sZy1uNCB7XG4gICAgbWFyZ2luLXRvcDogLTEuNXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1ib3R0b206IC0xLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teS1sZy1uNSB7XG4gICAgbWFyZ2luLXRvcDogLTNyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tYm90dG9tOiAtM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm10LWxnLW4xIHtcbiAgICBtYXJnaW4tdG9wOiAtMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm10LWxnLW4yIHtcbiAgICBtYXJnaW4tdG9wOiAtMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXQtbGctbjMge1xuICAgIG1hcmdpbi10b3A6IC0xcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXQtbGctbjQge1xuICAgIG1hcmdpbi10b3A6IC0xLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tdC1sZy1uNSB7XG4gICAgbWFyZ2luLXRvcDogLTNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi1sZy1uMSB7XG4gICAgbWFyZ2luLWJvdHRvbTogLTAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi1sZy1uMiB7XG4gICAgbWFyZ2luLWJvdHRvbTogLTAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1iLWxnLW4zIHtcbiAgICBtYXJnaW4tYm90dG9tOiAtMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1iLWxnLW40IHtcbiAgICBtYXJnaW4tYm90dG9tOiAtMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWItbGctbjUge1xuICAgIG1hcmdpbi1ib3R0b206IC0zcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucC1sZy0wIHtcbiAgICBwYWRkaW5nOiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucC1sZy0xIHtcbiAgICBwYWRkaW5nOiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucC1sZy0yIHtcbiAgICBwYWRkaW5nOiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wLWxnLTMge1xuICAgIHBhZGRpbmc6IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wLWxnLTQge1xuICAgIHBhZGRpbmc6IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnAtbGctNSB7XG4gICAgcGFkZGluZzogM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB4LWxnLTAge1xuICAgIHBhZGRpbmctcmlnaHQ6IDAgIWltcG9ydGFudDtcbiAgICBwYWRkaW5nLWxlZnQ6IDAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weC1sZy0xIHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1sZWZ0OiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHgtbGctMiB7XG4gICAgcGFkZGluZy1yaWdodDogMC41cmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1sZWZ0OiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weC1sZy0zIHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAxcmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1sZWZ0OiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHgtbGctNCB7XG4gICAgcGFkZGluZy1yaWdodDogMS41cmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1sZWZ0OiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weC1sZy01IHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAzcmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1sZWZ0OiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHktbGctMCB7XG4gICAgcGFkZGluZy10b3A6IDAgIWltcG9ydGFudDtcbiAgICBwYWRkaW5nLWJvdHRvbTogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB5LWxnLTEge1xuICAgIHBhZGRpbmctdG9wOiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1ib3R0b206IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weS1sZy0yIHtcbiAgICBwYWRkaW5nLXRvcDogMC41cmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1ib3R0b206IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB5LWxnLTMge1xuICAgIHBhZGRpbmctdG9wOiAxcmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1ib3R0b206IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weS1sZy00IHtcbiAgICBwYWRkaW5nLXRvcDogMS41cmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1ib3R0b206IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB5LWxnLTUge1xuICAgIHBhZGRpbmctdG9wOiAzcmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1ib3R0b206IDNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wdC1sZy0wIHtcbiAgICBwYWRkaW5nLXRvcDogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB0LWxnLTEge1xuICAgIHBhZGRpbmctdG9wOiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHQtbGctMiB7XG4gICAgcGFkZGluZy10b3A6IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB0LWxnLTMge1xuICAgIHBhZGRpbmctdG9wOiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHQtbGctNCB7XG4gICAgcGFkZGluZy10b3A6IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB0LWxnLTUge1xuICAgIHBhZGRpbmctdG9wOiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucGItbGctMCB7XG4gICAgcGFkZGluZy1ib3R0b206IDAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wYi1sZy0xIHtcbiAgICBwYWRkaW5nLWJvdHRvbTogMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBiLWxnLTIge1xuICAgIHBhZGRpbmctYm90dG9tOiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wYi1sZy0zIHtcbiAgICBwYWRkaW5nLWJvdHRvbTogMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBiLWxnLTQge1xuICAgIHBhZGRpbmctYm90dG9tOiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wYi1sZy01IHtcbiAgICBwYWRkaW5nLWJvdHRvbTogM3JlbSAhaW1wb3J0YW50O1xuICB9XG59XG5AbWVkaWEgKG1pbi13aWR0aDogMTIwMHB4KSB7XG4gIC5kLXhsLWlubGluZSB7XG4gICAgZGlzcGxheTogaW5saW5lICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZC14bC1pbmxpbmUtYmxvY2sge1xuICAgIGRpc3BsYXk6IGlubGluZS1ibG9jayAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmQteGwtYmxvY2sge1xuICAgIGRpc3BsYXk6IGJsb2NrICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZC14bC1ncmlkIHtcbiAgICBkaXNwbGF5OiBncmlkICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZC14bC10YWJsZSB7XG4gICAgZGlzcGxheTogdGFibGUgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLXhsLXRhYmxlLXJvdyB7XG4gICAgZGlzcGxheTogdGFibGUtcm93ICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZC14bC10YWJsZS1jZWxsIHtcbiAgICBkaXNwbGF5OiB0YWJsZS1jZWxsICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZC14bC1mbGV4IHtcbiAgICBkaXNwbGF5OiBmbGV4ICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZC14bC1pbmxpbmUtZmxleCB7XG4gICAgZGlzcGxheTogaW5saW5lLWZsZXggIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLXhsLW5vbmUge1xuICAgIGRpc3BsYXk6IG5vbmUgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5mbGV4LXhsLWZpbGwge1xuICAgIGZsZXg6IDEgMSBhdXRvICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxleC14bC1yb3cge1xuICAgIGZsZXgtZGlyZWN0aW9uOiByb3cgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5mbGV4LXhsLWNvbHVtbiB7XG4gICAgZmxleC1kaXJlY3Rpb246IGNvbHVtbiAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZsZXgteGwtcm93LXJldmVyc2Uge1xuICAgIGZsZXgtZGlyZWN0aW9uOiByb3ctcmV2ZXJzZSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZsZXgteGwtY29sdW1uLXJldmVyc2Uge1xuICAgIGZsZXgtZGlyZWN0aW9uOiBjb2x1bW4tcmV2ZXJzZSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZsZXgteGwtZ3Jvdy0wIHtcbiAgICBmbGV4LWdyb3c6IDAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5mbGV4LXhsLWdyb3ctMSB7XG4gICAgZmxleC1ncm93OiAxICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxleC14bC1zaHJpbmstMCB7XG4gICAgZmxleC1zaHJpbms6IDAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5mbGV4LXhsLXNocmluay0xIHtcbiAgICBmbGV4LXNocmluazogMSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZsZXgteGwtd3JhcCB7XG4gICAgZmxleC13cmFwOiB3cmFwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxleC14bC1ub3dyYXAge1xuICAgIGZsZXgtd3JhcDogbm93cmFwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxleC14bC13cmFwLXJldmVyc2Uge1xuICAgIGZsZXgtd3JhcDogd3JhcC1yZXZlcnNlICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZ2FwLXhsLTAge1xuICAgIGdhcDogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmdhcC14bC0xIHtcbiAgICBnYXA6IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5nYXAteGwtMiB7XG4gICAgZ2FwOiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5nYXAteGwtMyB7XG4gICAgZ2FwOiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZ2FwLXhsLTQge1xuICAgIGdhcDogMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZ2FwLXhsLTUge1xuICAgIGdhcDogM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmp1c3RpZnktY29udGVudC14bC1zdGFydCB7XG4gICAganVzdGlmeS1jb250ZW50OiBmbGV4LXN0YXJ0ICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuanVzdGlmeS1jb250ZW50LXhsLWVuZCB7XG4gICAganVzdGlmeS1jb250ZW50OiBmbGV4LWVuZCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmp1c3RpZnktY29udGVudC14bC1jZW50ZXIge1xuICAgIGp1c3RpZnktY29udGVudDogY2VudGVyICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuanVzdGlmeS1jb250ZW50LXhsLWJldHdlZW4ge1xuICAgIGp1c3RpZnktY29udGVudDogc3BhY2UtYmV0d2VlbiAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmp1c3RpZnktY29udGVudC14bC1hcm91bmQge1xuICAgIGp1c3RpZnktY29udGVudDogc3BhY2UtYXJvdW5kICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuanVzdGlmeS1jb250ZW50LXhsLWV2ZW5seSB7XG4gICAganVzdGlmeS1jb250ZW50OiBzcGFjZS1ldmVubHkgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1pdGVtcy14bC1zdGFydCB7XG4gICAgYWxpZ24taXRlbXM6IGZsZXgtc3RhcnQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1pdGVtcy14bC1lbmQge1xuICAgIGFsaWduLWl0ZW1zOiBmbGV4LWVuZCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLWl0ZW1zLXhsLWNlbnRlciB7XG4gICAgYWxpZ24taXRlbXM6IGNlbnRlciAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLWl0ZW1zLXhsLWJhc2VsaW5lIHtcbiAgICBhbGlnbi1pdGVtczogYmFzZWxpbmUgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1pdGVtcy14bC1zdHJldGNoIHtcbiAgICBhbGlnbi1pdGVtczogc3RyZXRjaCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLWNvbnRlbnQteGwtc3RhcnQge1xuICAgIGFsaWduLWNvbnRlbnQ6IGZsZXgtc3RhcnQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1jb250ZW50LXhsLWVuZCB7XG4gICAgYWxpZ24tY29udGVudDogZmxleC1lbmQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1jb250ZW50LXhsLWNlbnRlciB7XG4gICAgYWxpZ24tY29udGVudDogY2VudGVyICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24tY29udGVudC14bC1iZXR3ZWVuIHtcbiAgICBhbGlnbi1jb250ZW50OiBzcGFjZS1iZXR3ZWVuICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24tY29udGVudC14bC1hcm91bmQge1xuICAgIGFsaWduLWNvbnRlbnQ6IHNwYWNlLWFyb3VuZCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLWNvbnRlbnQteGwtc3RyZXRjaCB7XG4gICAgYWxpZ24tY29udGVudDogc3RyZXRjaCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLXNlbGYteGwtYXV0byB7XG4gICAgYWxpZ24tc2VsZjogYXV0byAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLXNlbGYteGwtc3RhcnQge1xuICAgIGFsaWduLXNlbGY6IGZsZXgtc3RhcnQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1zZWxmLXhsLWVuZCB7XG4gICAgYWxpZ24tc2VsZjogZmxleC1lbmQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1zZWxmLXhsLWNlbnRlciB7XG4gICAgYWxpZ24tc2VsZjogY2VudGVyICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24tc2VsZi14bC1iYXNlbGluZSB7XG4gICAgYWxpZ24tc2VsZjogYmFzZWxpbmUgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1zZWxmLXhsLXN0cmV0Y2gge1xuICAgIGFsaWduLXNlbGY6IHN0cmV0Y2ggIWltcG9ydGFudDtcbiAgfVxuXG4gIC5vcmRlci14bC1maXJzdCB7XG4gICAgb3JkZXI6IC0xICFpbXBvcnRhbnQ7XG4gIH1cblxuICAub3JkZXIteGwtMCB7XG4gICAgb3JkZXI6IDAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5vcmRlci14bC0xIHtcbiAgICBvcmRlcjogMSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm9yZGVyLXhsLTIge1xuICAgIG9yZGVyOiAyICFpbXBvcnRhbnQ7XG4gIH1cblxuICAub3JkZXIteGwtMyB7XG4gICAgb3JkZXI6IDMgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5vcmRlci14bC00IHtcbiAgICBvcmRlcjogNCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm9yZGVyLXhsLTUge1xuICAgIG9yZGVyOiA1ICFpbXBvcnRhbnQ7XG4gIH1cblxuICAub3JkZXIteGwtbGFzdCB7XG4gICAgb3JkZXI6IDYgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tLXhsLTAge1xuICAgIG1hcmdpbjogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm0teGwtMSB7XG4gICAgbWFyZ2luOiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS14bC0yIHtcbiAgICBtYXJnaW46IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm0teGwtMyB7XG4gICAgbWFyZ2luOiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS14bC00IHtcbiAgICBtYXJnaW46IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm0teGwtNSB7XG4gICAgbWFyZ2luOiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS14bC1hdXRvIHtcbiAgICBtYXJnaW46IGF1dG8gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teC14bC0wIHtcbiAgICBtYXJnaW4tcmlnaHQ6IDAgIWltcG9ydGFudDtcbiAgICBtYXJnaW4tbGVmdDogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm14LXhsLTEge1xuICAgIG1hcmdpbi1yaWdodDogMC4yNXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXgteGwtMiB7XG4gICAgbWFyZ2luLXJpZ2h0OiAwLjVyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tbGVmdDogMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXgteGwtMyB7XG4gICAgbWFyZ2luLXJpZ2h0OiAxcmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWxlZnQ6IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teC14bC00IHtcbiAgICBtYXJnaW4tcmlnaHQ6IDEuNXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teC14bC01IHtcbiAgICBtYXJnaW4tcmlnaHQ6IDNyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tbGVmdDogM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm14LXhsLWF1dG8ge1xuICAgIG1hcmdpbi1yaWdodDogYXV0byAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiBhdXRvICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXkteGwtMCB7XG4gICAgbWFyZ2luLXRvcDogMCAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1ib3R0b206IDAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teS14bC0xIHtcbiAgICBtYXJnaW4tdG9wOiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWJvdHRvbTogMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm15LXhsLTIge1xuICAgIG1hcmdpbi10b3A6IDAuNXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1ib3R0b206IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm15LXhsLTMge1xuICAgIG1hcmdpbi10b3A6IDFyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tYm90dG9tOiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXkteGwtNCB7XG4gICAgbWFyZ2luLXRvcDogMS41cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWJvdHRvbTogMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXkteGwtNSB7XG4gICAgbWFyZ2luLXRvcDogM3JlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1ib3R0b206IDNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teS14bC1hdXRvIHtcbiAgICBtYXJnaW4tdG9wOiBhdXRvICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWJvdHRvbTogYXV0byAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm10LXhsLTAge1xuICAgIG1hcmdpbi10b3A6IDAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tdC14bC0xIHtcbiAgICBtYXJnaW4tdG9wOiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXQteGwtMiB7XG4gICAgbWFyZ2luLXRvcDogMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXQteGwtMyB7XG4gICAgbWFyZ2luLXRvcDogMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm10LXhsLTQge1xuICAgIG1hcmdpbi10b3A6IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm10LXhsLTUge1xuICAgIG1hcmdpbi10b3A6IDNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tdC14bC1hdXRvIHtcbiAgICBtYXJnaW4tdG9wOiBhdXRvICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWIteGwtMCB7XG4gICAgbWFyZ2luLWJvdHRvbTogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1iLXhsLTEge1xuICAgIG1hcmdpbi1ib3R0b206IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi14bC0yIHtcbiAgICBtYXJnaW4tYm90dG9tOiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi14bC0zIHtcbiAgICBtYXJnaW4tYm90dG9tOiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWIteGwtNCB7XG4gICAgbWFyZ2luLWJvdHRvbTogMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWIteGwtNSB7XG4gICAgbWFyZ2luLWJvdHRvbTogM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1iLXhsLWF1dG8ge1xuICAgIG1hcmdpbi1ib3R0b206IGF1dG8gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tLXhsLW4xIHtcbiAgICBtYXJnaW46IC0wLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS14bC1uMiB7XG4gICAgbWFyZ2luOiAtMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS14bC1uMyB7XG4gICAgbWFyZ2luOiAtMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm0teGwtbjQge1xuICAgIG1hcmdpbjogLTEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm0teGwtbjUge1xuICAgIG1hcmdpbjogLTNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teC14bC1uMSB7XG4gICAgbWFyZ2luLXJpZ2h0OiAtMC4yNXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiAtMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm14LXhsLW4yIHtcbiAgICBtYXJnaW4tcmlnaHQ6IC0wLjVyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tbGVmdDogLTAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm14LXhsLW4zIHtcbiAgICBtYXJnaW4tcmlnaHQ6IC0xcmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWxlZnQ6IC0xcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXgteGwtbjQge1xuICAgIG1hcmdpbi1yaWdodDogLTEuNXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiAtMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXgteGwtbjUge1xuICAgIG1hcmdpbi1yaWdodDogLTNyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tbGVmdDogLTNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teS14bC1uMSB7XG4gICAgbWFyZ2luLXRvcDogLTAuMjVyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tYm90dG9tOiAtMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm15LXhsLW4yIHtcbiAgICBtYXJnaW4tdG9wOiAtMC41cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWJvdHRvbTogLTAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm15LXhsLW4zIHtcbiAgICBtYXJnaW4tdG9wOiAtMXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1ib3R0b206IC0xcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXkteGwtbjQge1xuICAgIG1hcmdpbi10b3A6IC0xLjVyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tYm90dG9tOiAtMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXkteGwtbjUge1xuICAgIG1hcmdpbi10b3A6IC0zcmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWJvdHRvbTogLTNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tdC14bC1uMSB7XG4gICAgbWFyZ2luLXRvcDogLTAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tdC14bC1uMiB7XG4gICAgbWFyZ2luLXRvcDogLTAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm10LXhsLW4zIHtcbiAgICBtYXJnaW4tdG9wOiAtMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm10LXhsLW40IHtcbiAgICBtYXJnaW4tdG9wOiAtMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXQteGwtbjUge1xuICAgIG1hcmdpbi10b3A6IC0zcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWIteGwtbjEge1xuICAgIG1hcmdpbi1ib3R0b206IC0wLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWIteGwtbjIge1xuICAgIG1hcmdpbi1ib3R0b206IC0wLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi14bC1uMyB7XG4gICAgbWFyZ2luLWJvdHRvbTogLTFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi14bC1uNCB7XG4gICAgbWFyZ2luLWJvdHRvbTogLTEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1iLXhsLW41IHtcbiAgICBtYXJnaW4tYm90dG9tOiAtM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnAteGwtMCB7XG4gICAgcGFkZGluZzogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnAteGwtMSB7XG4gICAgcGFkZGluZzogMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnAteGwtMiB7XG4gICAgcGFkZGluZzogMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucC14bC0zIHtcbiAgICBwYWRkaW5nOiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucC14bC00IHtcbiAgICBwYWRkaW5nOiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wLXhsLTUge1xuICAgIHBhZGRpbmc6IDNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weC14bC0wIHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAwICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1sZWZ0OiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHgteGwtMSB7XG4gICAgcGFkZGluZy1yaWdodDogMC4yNXJlbSAhaW1wb3J0YW50O1xuICAgIHBhZGRpbmctbGVmdDogMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB4LXhsLTIge1xuICAgIHBhZGRpbmctcmlnaHQ6IDAuNXJlbSAhaW1wb3J0YW50O1xuICAgIHBhZGRpbmctbGVmdDogMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHgteGwtMyB7XG4gICAgcGFkZGluZy1yaWdodDogMXJlbSAhaW1wb3J0YW50O1xuICAgIHBhZGRpbmctbGVmdDogMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB4LXhsLTQge1xuICAgIHBhZGRpbmctcmlnaHQ6IDEuNXJlbSAhaW1wb3J0YW50O1xuICAgIHBhZGRpbmctbGVmdDogMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHgteGwtNSB7XG4gICAgcGFkZGluZy1yaWdodDogM3JlbSAhaW1wb3J0YW50O1xuICAgIHBhZGRpbmctbGVmdDogM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB5LXhsLTAge1xuICAgIHBhZGRpbmctdG9wOiAwICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1ib3R0b206IDAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weS14bC0xIHtcbiAgICBwYWRkaW5nLXRvcDogMC4yNXJlbSAhaW1wb3J0YW50O1xuICAgIHBhZGRpbmctYm90dG9tOiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHkteGwtMiB7XG4gICAgcGFkZGluZy10b3A6IDAuNXJlbSAhaW1wb3J0YW50O1xuICAgIHBhZGRpbmctYm90dG9tOiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weS14bC0zIHtcbiAgICBwYWRkaW5nLXRvcDogMXJlbSAhaW1wb3J0YW50O1xuICAgIHBhZGRpbmctYm90dG9tOiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHkteGwtNCB7XG4gICAgcGFkZGluZy10b3A6IDEuNXJlbSAhaW1wb3J0YW50O1xuICAgIHBhZGRpbmctYm90dG9tOiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weS14bC01IHtcbiAgICBwYWRkaW5nLXRvcDogM3JlbSAhaW1wb3J0YW50O1xuICAgIHBhZGRpbmctYm90dG9tOiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHQteGwtMCB7XG4gICAgcGFkZGluZy10b3A6IDAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wdC14bC0xIHtcbiAgICBwYWRkaW5nLXRvcDogMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB0LXhsLTIge1xuICAgIHBhZGRpbmctdG9wOiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wdC14bC0zIHtcbiAgICBwYWRkaW5nLXRvcDogMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB0LXhsLTQge1xuICAgIHBhZGRpbmctdG9wOiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wdC14bC01IHtcbiAgICBwYWRkaW5nLXRvcDogM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBiLXhsLTAge1xuICAgIHBhZGRpbmctYm90dG9tOiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucGIteGwtMSB7XG4gICAgcGFkZGluZy1ib3R0b206IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wYi14bC0yIHtcbiAgICBwYWRkaW5nLWJvdHRvbTogMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucGIteGwtMyB7XG4gICAgcGFkZGluZy1ib3R0b206IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wYi14bC00IHtcbiAgICBwYWRkaW5nLWJvdHRvbTogMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucGIteGwtNSB7XG4gICAgcGFkZGluZy1ib3R0b206IDNyZW0gIWltcG9ydGFudDtcbiAgfVxufVxuQG1lZGlhIChtaW4td2lkdGg6IDE0MDBweCkge1xuICAuZC14eGwtaW5saW5lIHtcbiAgICBkaXNwbGF5OiBpbmxpbmUgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLXh4bC1pbmxpbmUtYmxvY2sge1xuICAgIGRpc3BsYXk6IGlubGluZS1ibG9jayAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmQteHhsLWJsb2NrIHtcbiAgICBkaXNwbGF5OiBibG9jayAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmQteHhsLWdyaWQge1xuICAgIGRpc3BsYXk6IGdyaWQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLXh4bC10YWJsZSB7XG4gICAgZGlzcGxheTogdGFibGUgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLXh4bC10YWJsZS1yb3cge1xuICAgIGRpc3BsYXk6IHRhYmxlLXJvdyAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmQteHhsLXRhYmxlLWNlbGwge1xuICAgIGRpc3BsYXk6IHRhYmxlLWNlbGwgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLXh4bC1mbGV4IHtcbiAgICBkaXNwbGF5OiBmbGV4ICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZC14eGwtaW5saW5lLWZsZXgge1xuICAgIGRpc3BsYXk6IGlubGluZS1mbGV4ICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZC14eGwtbm9uZSB7XG4gICAgZGlzcGxheTogbm9uZSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZsZXgteHhsLWZpbGwge1xuICAgIGZsZXg6IDEgMSBhdXRvICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxleC14eGwtcm93IHtcbiAgICBmbGV4LWRpcmVjdGlvbjogcm93ICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxleC14eGwtY29sdW1uIHtcbiAgICBmbGV4LWRpcmVjdGlvbjogY29sdW1uICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxleC14eGwtcm93LXJldmVyc2Uge1xuICAgIGZsZXgtZGlyZWN0aW9uOiByb3ctcmV2ZXJzZSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZsZXgteHhsLWNvbHVtbi1yZXZlcnNlIHtcbiAgICBmbGV4LWRpcmVjdGlvbjogY29sdW1uLXJldmVyc2UgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5mbGV4LXh4bC1ncm93LTAge1xuICAgIGZsZXgtZ3JvdzogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZsZXgteHhsLWdyb3ctMSB7XG4gICAgZmxleC1ncm93OiAxICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxleC14eGwtc2hyaW5rLTAge1xuICAgIGZsZXgtc2hyaW5rOiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxleC14eGwtc2hyaW5rLTEge1xuICAgIGZsZXgtc2hyaW5rOiAxICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxleC14eGwtd3JhcCB7XG4gICAgZmxleC13cmFwOiB3cmFwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxleC14eGwtbm93cmFwIHtcbiAgICBmbGV4LXdyYXA6IG5vd3JhcCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZsZXgteHhsLXdyYXAtcmV2ZXJzZSB7XG4gICAgZmxleC13cmFwOiB3cmFwLXJldmVyc2UgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5nYXAteHhsLTAge1xuICAgIGdhcDogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmdhcC14eGwtMSB7XG4gICAgZ2FwOiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZ2FwLXh4bC0yIHtcbiAgICBnYXA6IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmdhcC14eGwtMyB7XG4gICAgZ2FwOiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZ2FwLXh4bC00IHtcbiAgICBnYXA6IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmdhcC14eGwtNSB7XG4gICAgZ2FwOiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuanVzdGlmeS1jb250ZW50LXh4bC1zdGFydCB7XG4gICAganVzdGlmeS1jb250ZW50OiBmbGV4LXN0YXJ0ICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuanVzdGlmeS1jb250ZW50LXh4bC1lbmQge1xuICAgIGp1c3RpZnktY29udGVudDogZmxleC1lbmQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5qdXN0aWZ5LWNvbnRlbnQteHhsLWNlbnRlciB7XG4gICAganVzdGlmeS1jb250ZW50OiBjZW50ZXIgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5qdXN0aWZ5LWNvbnRlbnQteHhsLWJldHdlZW4ge1xuICAgIGp1c3RpZnktY29udGVudDogc3BhY2UtYmV0d2VlbiAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmp1c3RpZnktY29udGVudC14eGwtYXJvdW5kIHtcbiAgICBqdXN0aWZ5LWNvbnRlbnQ6IHNwYWNlLWFyb3VuZCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmp1c3RpZnktY29udGVudC14eGwtZXZlbmx5IHtcbiAgICBqdXN0aWZ5LWNvbnRlbnQ6IHNwYWNlLWV2ZW5seSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLWl0ZW1zLXh4bC1zdGFydCB7XG4gICAgYWxpZ24taXRlbXM6IGZsZXgtc3RhcnQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1pdGVtcy14eGwtZW5kIHtcbiAgICBhbGlnbi1pdGVtczogZmxleC1lbmQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1pdGVtcy14eGwtY2VudGVyIHtcbiAgICBhbGlnbi1pdGVtczogY2VudGVyICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24taXRlbXMteHhsLWJhc2VsaW5lIHtcbiAgICBhbGlnbi1pdGVtczogYmFzZWxpbmUgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1pdGVtcy14eGwtc3RyZXRjaCB7XG4gICAgYWxpZ24taXRlbXM6IHN0cmV0Y2ggIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1jb250ZW50LXh4bC1zdGFydCB7XG4gICAgYWxpZ24tY29udGVudDogZmxleC1zdGFydCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLWNvbnRlbnQteHhsLWVuZCB7XG4gICAgYWxpZ24tY29udGVudDogZmxleC1lbmQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1jb250ZW50LXh4bC1jZW50ZXIge1xuICAgIGFsaWduLWNvbnRlbnQ6IGNlbnRlciAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLWNvbnRlbnQteHhsLWJldHdlZW4ge1xuICAgIGFsaWduLWNvbnRlbnQ6IHNwYWNlLWJldHdlZW4gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1jb250ZW50LXh4bC1hcm91bmQge1xuICAgIGFsaWduLWNvbnRlbnQ6IHNwYWNlLWFyb3VuZCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmFsaWduLWNvbnRlbnQteHhsLXN0cmV0Y2gge1xuICAgIGFsaWduLWNvbnRlbnQ6IHN0cmV0Y2ggIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1zZWxmLXh4bC1hdXRvIHtcbiAgICBhbGlnbi1zZWxmOiBhdXRvICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24tc2VsZi14eGwtc3RhcnQge1xuICAgIGFsaWduLXNlbGY6IGZsZXgtc3RhcnQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1zZWxmLXh4bC1lbmQge1xuICAgIGFsaWduLXNlbGY6IGZsZXgtZW5kICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuYWxpZ24tc2VsZi14eGwtY2VudGVyIHtcbiAgICBhbGlnbi1zZWxmOiBjZW50ZXIgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1zZWxmLXh4bC1iYXNlbGluZSB7XG4gICAgYWxpZ24tc2VsZjogYmFzZWxpbmUgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5hbGlnbi1zZWxmLXh4bC1zdHJldGNoIHtcbiAgICBhbGlnbi1zZWxmOiBzdHJldGNoICFpbXBvcnRhbnQ7XG4gIH1cblxuICAub3JkZXIteHhsLWZpcnN0IHtcbiAgICBvcmRlcjogLTEgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5vcmRlci14eGwtMCB7XG4gICAgb3JkZXI6IDAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5vcmRlci14eGwtMSB7XG4gICAgb3JkZXI6IDEgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5vcmRlci14eGwtMiB7XG4gICAgb3JkZXI6IDIgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5vcmRlci14eGwtMyB7XG4gICAgb3JkZXI6IDMgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5vcmRlci14eGwtNCB7XG4gICAgb3JkZXI6IDQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5vcmRlci14eGwtNSB7XG4gICAgb3JkZXI6IDUgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5vcmRlci14eGwtbGFzdCB7XG4gICAgb3JkZXI6IDYgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tLXh4bC0wIHtcbiAgICBtYXJnaW46IDAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tLXh4bC0xIHtcbiAgICBtYXJnaW46IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tLXh4bC0yIHtcbiAgICBtYXJnaW46IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm0teHhsLTMge1xuICAgIG1hcmdpbjogMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm0teHhsLTQge1xuICAgIG1hcmdpbjogMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS14eGwtNSB7XG4gICAgbWFyZ2luOiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS14eGwtYXV0byB7XG4gICAgbWFyZ2luOiBhdXRvICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXgteHhsLTAge1xuICAgIG1hcmdpbi1yaWdodDogMCAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXgteHhsLTEge1xuICAgIG1hcmdpbi1yaWdodDogMC4yNXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXgteHhsLTIge1xuICAgIG1hcmdpbi1yaWdodDogMC41cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWxlZnQ6IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm14LXh4bC0zIHtcbiAgICBtYXJnaW4tcmlnaHQ6IDFyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tbGVmdDogMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm14LXh4bC00IHtcbiAgICBtYXJnaW4tcmlnaHQ6IDEuNXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teC14eGwtNSB7XG4gICAgbWFyZ2luLXJpZ2h0OiAzcmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWxlZnQ6IDNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teC14eGwtYXV0byB7XG4gICAgbWFyZ2luLXJpZ2h0OiBhdXRvICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWxlZnQ6IGF1dG8gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teS14eGwtMCB7XG4gICAgbWFyZ2luLXRvcDogMCAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1ib3R0b206IDAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teS14eGwtMSB7XG4gICAgbWFyZ2luLXRvcDogMC4yNXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1ib3R0b206IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teS14eGwtMiB7XG4gICAgbWFyZ2luLXRvcDogMC41cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWJvdHRvbTogMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXkteHhsLTMge1xuICAgIG1hcmdpbi10b3A6IDFyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tYm90dG9tOiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXkteHhsLTQge1xuICAgIG1hcmdpbi10b3A6IDEuNXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1ib3R0b206IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm15LXh4bC01IHtcbiAgICBtYXJnaW4tdG9wOiAzcmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWJvdHRvbTogM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm15LXh4bC1hdXRvIHtcbiAgICBtYXJnaW4tdG9wOiBhdXRvICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWJvdHRvbTogYXV0byAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm10LXh4bC0wIHtcbiAgICBtYXJnaW4tdG9wOiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXQteHhsLTEge1xuICAgIG1hcmdpbi10b3A6IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tdC14eGwtMiB7XG4gICAgbWFyZ2luLXRvcDogMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXQteHhsLTMge1xuICAgIG1hcmdpbi10b3A6IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tdC14eGwtNCB7XG4gICAgbWFyZ2luLXRvcDogMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXQteHhsLTUge1xuICAgIG1hcmdpbi10b3A6IDNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tdC14eGwtYXV0byB7XG4gICAgbWFyZ2luLXRvcDogYXV0byAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1iLXh4bC0wIHtcbiAgICBtYXJnaW4tYm90dG9tOiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWIteHhsLTEge1xuICAgIG1hcmdpbi1ib3R0b206IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi14eGwtMiB7XG4gICAgbWFyZ2luLWJvdHRvbTogMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWIteHhsLTMge1xuICAgIG1hcmdpbi1ib3R0b206IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi14eGwtNCB7XG4gICAgbWFyZ2luLWJvdHRvbTogMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWIteHhsLTUge1xuICAgIG1hcmdpbi1ib3R0b206IDNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi14eGwtYXV0byB7XG4gICAgbWFyZ2luLWJvdHRvbTogYXV0byAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm0teHhsLW4xIHtcbiAgICBtYXJnaW46IC0wLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS14eGwtbjIge1xuICAgIG1hcmdpbjogLTAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm0teHhsLW4zIHtcbiAgICBtYXJnaW46IC0xcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubS14eGwtbjQge1xuICAgIG1hcmdpbjogLTEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm0teHhsLW41IHtcbiAgICBtYXJnaW46IC0zcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXgteHhsLW4xIHtcbiAgICBtYXJnaW4tcmlnaHQ6IC0wLjI1cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWxlZnQ6IC0wLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXgteHhsLW4yIHtcbiAgICBtYXJnaW4tcmlnaHQ6IC0wLjVyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tbGVmdDogLTAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm14LXh4bC1uMyB7XG4gICAgbWFyZ2luLXJpZ2h0OiAtMXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1sZWZ0OiAtMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm14LXh4bC1uNCB7XG4gICAgbWFyZ2luLXJpZ2h0OiAtMS41cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWxlZnQ6IC0xLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teC14eGwtbjUge1xuICAgIG1hcmdpbi1yaWdodDogLTNyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tbGVmdDogLTNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teS14eGwtbjEge1xuICAgIG1hcmdpbi10b3A6IC0wLjI1cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWJvdHRvbTogLTAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5teS14eGwtbjIge1xuICAgIG1hcmdpbi10b3A6IC0wLjVyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tYm90dG9tOiAtMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXkteHhsLW4zIHtcbiAgICBtYXJnaW4tdG9wOiAtMXJlbSAhaW1wb3J0YW50O1xuICAgIG1hcmdpbi1ib3R0b206IC0xcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXkteHhsLW40IHtcbiAgICBtYXJnaW4tdG9wOiAtMS41cmVtICFpbXBvcnRhbnQ7XG4gICAgbWFyZ2luLWJvdHRvbTogLTEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm15LXh4bC1uNSB7XG4gICAgbWFyZ2luLXRvcDogLTNyZW0gIWltcG9ydGFudDtcbiAgICBtYXJnaW4tYm90dG9tOiAtM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm10LXh4bC1uMSB7XG4gICAgbWFyZ2luLXRvcDogLTAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tdC14eGwtbjIge1xuICAgIG1hcmdpbi10b3A6IC0wLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tdC14eGwtbjMge1xuICAgIG1hcmdpbi10b3A6IC0xcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXQteHhsLW40IHtcbiAgICBtYXJnaW4tdG9wOiAtMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXQteHhsLW41IHtcbiAgICBtYXJnaW4tdG9wOiAtM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1iLXh4bC1uMSB7XG4gICAgbWFyZ2luLWJvdHRvbTogLTAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi14eGwtbjIge1xuICAgIG1hcmdpbi1ib3R0b206IC0wLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tYi14eGwtbjMge1xuICAgIG1hcmdpbi1ib3R0b206IC0xcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWIteHhsLW40IHtcbiAgICBtYXJnaW4tYm90dG9tOiAtMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWIteHhsLW41IHtcbiAgICBtYXJnaW4tYm90dG9tOiAtM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnAteHhsLTAge1xuICAgIHBhZGRpbmc6IDAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wLXh4bC0xIHtcbiAgICBwYWRkaW5nOiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucC14eGwtMiB7XG4gICAgcGFkZGluZzogMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucC14eGwtMyB7XG4gICAgcGFkZGluZzogMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnAteHhsLTQge1xuICAgIHBhZGRpbmc6IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnAteHhsLTUge1xuICAgIHBhZGRpbmc6IDNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weC14eGwtMCB7XG4gICAgcGFkZGluZy1yaWdodDogMCAhaW1wb3J0YW50O1xuICAgIHBhZGRpbmctbGVmdDogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB4LXh4bC0xIHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1sZWZ0OiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHgteHhsLTIge1xuICAgIHBhZGRpbmctcmlnaHQ6IDAuNXJlbSAhaW1wb3J0YW50O1xuICAgIHBhZGRpbmctbGVmdDogMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHgteHhsLTMge1xuICAgIHBhZGRpbmctcmlnaHQ6IDFyZW0gIWltcG9ydGFudDtcbiAgICBwYWRkaW5nLWxlZnQ6IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weC14eGwtNCB7XG4gICAgcGFkZGluZy1yaWdodDogMS41cmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1sZWZ0OiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weC14eGwtNSB7XG4gICAgcGFkZGluZy1yaWdodDogM3JlbSAhaW1wb3J0YW50O1xuICAgIHBhZGRpbmctbGVmdDogM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB5LXh4bC0wIHtcbiAgICBwYWRkaW5nLXRvcDogMCAhaW1wb3J0YW50O1xuICAgIHBhZGRpbmctYm90dG9tOiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHkteHhsLTEge1xuICAgIHBhZGRpbmctdG9wOiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1ib3R0b206IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weS14eGwtMiB7XG4gICAgcGFkZGluZy10b3A6IDAuNXJlbSAhaW1wb3J0YW50O1xuICAgIHBhZGRpbmctYm90dG9tOiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5weS14eGwtMyB7XG4gICAgcGFkZGluZy10b3A6IDFyZW0gIWltcG9ydGFudDtcbiAgICBwYWRkaW5nLWJvdHRvbTogMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB5LXh4bC00IHtcbiAgICBwYWRkaW5nLXRvcDogMS41cmVtICFpbXBvcnRhbnQ7XG4gICAgcGFkZGluZy1ib3R0b206IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB5LXh4bC01IHtcbiAgICBwYWRkaW5nLXRvcDogM3JlbSAhaW1wb3J0YW50O1xuICAgIHBhZGRpbmctYm90dG9tOiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHQteHhsLTAge1xuICAgIHBhZGRpbmctdG9wOiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHQteHhsLTEge1xuICAgIHBhZGRpbmctdG9wOiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHQteHhsLTIge1xuICAgIHBhZGRpbmctdG9wOiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wdC14eGwtMyB7XG4gICAgcGFkZGluZy10b3A6IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wdC14eGwtNCB7XG4gICAgcGFkZGluZy10b3A6IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnB0LXh4bC01IHtcbiAgICBwYWRkaW5nLXRvcDogM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBiLXh4bC0wIHtcbiAgICBwYWRkaW5nLWJvdHRvbTogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBiLXh4bC0xIHtcbiAgICBwYWRkaW5nLWJvdHRvbTogMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBiLXh4bC0yIHtcbiAgICBwYWRkaW5nLWJvdHRvbTogMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucGIteHhsLTMge1xuICAgIHBhZGRpbmctYm90dG9tOiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucGIteHhsLTQge1xuICAgIHBhZGRpbmctYm90dG9tOiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wYi14eGwtNSB7XG4gICAgcGFkZGluZy1ib3R0b206IDNyZW0gIWltcG9ydGFudDtcbiAgfVxufVxuQG1lZGlhIChtaW4td2lkdGg6IDEyMDBweCkge1xuICAuZnMtMSB7XG4gICAgZm9udC1zaXplOiAyLjM3NXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZzLTIge1xuICAgIGZvbnQtc2l6ZTogMnJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZzLTMge1xuICAgIGZvbnQtc2l6ZTogMS42MjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5mcy00IHtcbiAgICBmb250LXNpemU6IDEuMzc1cmVtICFpbXBvcnRhbnQ7XG4gIH1cbn1cbkBtZWRpYSBwcmludCB7XG4gIC5kLXByaW50LWlubGluZSB7XG4gICAgZGlzcGxheTogaW5saW5lICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZC1wcmludC1pbmxpbmUtYmxvY2sge1xuICAgIGRpc3BsYXk6IGlubGluZS1ibG9jayAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmQtcHJpbnQtYmxvY2sge1xuICAgIGRpc3BsYXk6IGJsb2NrICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZC1wcmludC1ncmlkIHtcbiAgICBkaXNwbGF5OiBncmlkICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZC1wcmludC10YWJsZSB7XG4gICAgZGlzcGxheTogdGFibGUgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLXByaW50LXRhYmxlLXJvdyB7XG4gICAgZGlzcGxheTogdGFibGUtcm93ICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZC1wcmludC10YWJsZS1jZWxsIHtcbiAgICBkaXNwbGF5OiB0YWJsZS1jZWxsICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZC1wcmludC1mbGV4IHtcbiAgICBkaXNwbGF5OiBmbGV4ICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZC1wcmludC1pbmxpbmUtZmxleCB7XG4gICAgZGlzcGxheTogaW5saW5lLWZsZXggIWltcG9ydGFudDtcbiAgfVxuXG4gIC5kLXByaW50LW5vbmUge1xuICAgIGRpc3BsYXk6IG5vbmUgIWltcG9ydGFudDtcbiAgfVxufVxuLnppbmRleC0xIHtcbiAgei1pbmRleDogMSAhaW1wb3J0YW50O1xufVxuXG4uemluZGV4LTIge1xuICB6LWluZGV4OiAyICFpbXBvcnRhbnQ7XG59XG5cbi56aW5kZXgtMyB7XG4gIHotaW5kZXg6IDMgIWltcG9ydGFudDtcbn1cblxuLnppbmRleC00IHtcbiAgei1pbmRleDogNCAhaW1wb3J0YW50O1xufVxuXG4uemluZGV4LTUge1xuICB6LWluZGV4OiA1ICFpbXBvcnRhbnQ7XG59XG5cbi5mbG9hdC1zdGFydCB7XG4gIGZsb2F0OiBsZWZ0ICFpbXBvcnRhbnQ7XG59XG5cbi5mbG9hdC1lbmQge1xuICBmbG9hdDogcmlnaHQgIWltcG9ydGFudDtcbn1cblxuLmZsb2F0LW5vbmUge1xuICBmbG9hdDogbm9uZSAhaW1wb3J0YW50O1xufVxuXG4uZW5kLTAge1xuICByaWdodDogMCAhaW1wb3J0YW50O1xufVxuXG4uZW5kLTUwIHtcbiAgcmlnaHQ6IDUwJSAhaW1wb3J0YW50O1xufVxuXG4uZW5kLTEwMCB7XG4gIHJpZ2h0OiAxMDAlICFpbXBvcnRhbnQ7XG59XG5cbi5zdGFydC0wIHtcbiAgbGVmdDogMCAhaW1wb3J0YW50O1xufVxuXG4uc3RhcnQtNTAge1xuICBsZWZ0OiA1MCUgIWltcG9ydGFudDtcbn1cblxuLnN0YXJ0LTEwMCB7XG4gIGxlZnQ6IDEwMCUgIWltcG9ydGFudDtcbn1cblxuLnRyYW5zbGF0ZS1taWRkbGUge1xuICB0cmFuc2Zvcm06IHRyYW5zbGF0ZSgtNTAlLCAtNTAlKSAhaW1wb3J0YW50O1xufVxuXG4udHJhbnNsYXRlLW1pZGRsZS14IHtcbiAgdHJhbnNmb3JtOiB0cmFuc2xhdGVYKC01MCUpICFpbXBvcnRhbnQ7XG59XG5cbi50cmFuc2xhdGUtbWlkZGxlLXkge1xuICB0cmFuc2Zvcm06IHRyYW5zbGF0ZVkoLTUwJSkgIWltcG9ydGFudDtcbn1cblxuLmJvcmRlci1lbmQge1xuICBib3JkZXItcmlnaHQ6IDFweCBzb2xpZCAjZDlkZWUzICFpbXBvcnRhbnQ7XG59XG5cbi5ib3JkZXItZW5kLTAge1xuICBib3JkZXItcmlnaHQ6IDAgIWltcG9ydGFudDtcbn1cblxuLmJvcmRlci1zdGFydCB7XG4gIGJvcmRlci1sZWZ0OiAxcHggc29saWQgI2Q5ZGVlMyAhaW1wb3J0YW50O1xufVxuXG4uYm9yZGVyLXN0YXJ0LTAge1xuICBib3JkZXItbGVmdDogMCAhaW1wb3J0YW50O1xufVxuXG4udGV4dC1zdGFydCB7XG4gIHRleHQtYWxpZ246IGxlZnQgIWltcG9ydGFudDtcbn1cblxuLnRleHQtZW5kIHtcbiAgdGV4dC1hbGlnbjogcmlnaHQgIWltcG9ydGFudDtcbn1cblxuLnRleHQtY2VudGVyIHtcbiAgdGV4dC1hbGlnbjogY2VudGVyICFpbXBvcnRhbnQ7XG59XG5cbi5yb3VuZGVkLWVuZCB7XG4gIGJvcmRlci10b3AtcmlnaHQtcmFkaXVzOiAwLjM3NXJlbSAhaW1wb3J0YW50O1xuICBib3JkZXItYm90dG9tLXJpZ2h0LXJhZGl1czogMC4zNzVyZW0gIWltcG9ydGFudDtcbn1cblxuLnJvdW5kZWQtc3RhcnQge1xuICBib3JkZXItYm90dG9tLWxlZnQtcmFkaXVzOiAwLjM3NXJlbSAhaW1wb3J0YW50O1xuICBib3JkZXItdG9wLWxlZnQtcmFkaXVzOiAwLjM3NXJlbSAhaW1wb3J0YW50O1xufVxuXG4ucm91bmRlZC1zdGFydC10b3Age1xuICBib3JkZXItdG9wLWxlZnQtcmFkaXVzOiAwLjM3NXJlbSAhaW1wb3J0YW50O1xufVxuXG4ucm91bmRlZC1zdGFydC1ib3R0b20ge1xuICBib3JkZXItYm90dG9tLWxlZnQtcmFkaXVzOiAwLjM3NXJlbSAhaW1wb3J0YW50O1xufVxuXG4ucm91bmRlZC1lbmQtdG9wIHtcbiAgYm9yZGVyLXRvcC1yaWdodC1yYWRpdXM6IDAuMzc1cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5yb3VuZGVkLWVuZC1ib3R0b20ge1xuICBib3JkZXItYm90dG9tLXJpZ2h0LXJhZGl1czogMC4zNzVyZW0gIWltcG9ydGFudDtcbn1cblxuLm1lLTAge1xuICBtYXJnaW4tcmlnaHQ6IDAgIWltcG9ydGFudDtcbn1cblxuLm1lLTEge1xuICBtYXJnaW4tcmlnaHQ6IDAuMjVyZW0gIWltcG9ydGFudDtcbn1cblxuLm1lLTIge1xuICBtYXJnaW4tcmlnaHQ6IDAuNXJlbSAhaW1wb3J0YW50O1xufVxuXG4ubWUtMyB7XG4gIG1hcmdpbi1yaWdodDogMXJlbSAhaW1wb3J0YW50O1xufVxuXG4ubWUtNCB7XG4gIG1hcmdpbi1yaWdodDogMS41cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5tZS01IHtcbiAgbWFyZ2luLXJpZ2h0OiAzcmVtICFpbXBvcnRhbnQ7XG59XG5cbi5tZS1hdXRvIHtcbiAgbWFyZ2luLXJpZ2h0OiBhdXRvICFpbXBvcnRhbnQ7XG59XG5cbi5tcy0wIHtcbiAgbWFyZ2luLWxlZnQ6IDAgIWltcG9ydGFudDtcbn1cblxuLm1zLTEge1xuICBtYXJnaW4tbGVmdDogMC4yNXJlbSAhaW1wb3J0YW50O1xufVxuXG4ubXMtMiB7XG4gIG1hcmdpbi1sZWZ0OiAwLjVyZW0gIWltcG9ydGFudDtcbn1cblxuLm1zLTMge1xuICBtYXJnaW4tbGVmdDogMXJlbSAhaW1wb3J0YW50O1xufVxuXG4ubXMtNCB7XG4gIG1hcmdpbi1sZWZ0OiAxLjVyZW0gIWltcG9ydGFudDtcbn1cblxuLm1zLTUge1xuICBtYXJnaW4tbGVmdDogM3JlbSAhaW1wb3J0YW50O1xufVxuXG4ubXMtYXV0byB7XG4gIG1hcmdpbi1sZWZ0OiBhdXRvICFpbXBvcnRhbnQ7XG59XG5cbi5tZS1uMSB7XG4gIG1hcmdpbi1yaWdodDogLTAuMjVyZW0gIWltcG9ydGFudDtcbn1cblxuLm1lLW4yIHtcbiAgbWFyZ2luLXJpZ2h0OiAtMC41cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5tZS1uMyB7XG4gIG1hcmdpbi1yaWdodDogLTFyZW0gIWltcG9ydGFudDtcbn1cblxuLm1lLW40IHtcbiAgbWFyZ2luLXJpZ2h0OiAtMS41cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5tZS1uNSB7XG4gIG1hcmdpbi1yaWdodDogLTNyZW0gIWltcG9ydGFudDtcbn1cblxuLm1zLW4xIHtcbiAgbWFyZ2luLWxlZnQ6IC0wLjI1cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5tcy1uMiB7XG4gIG1hcmdpbi1sZWZ0OiAtMC41cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5tcy1uMyB7XG4gIG1hcmdpbi1sZWZ0OiAtMXJlbSAhaW1wb3J0YW50O1xufVxuXG4ubXMtbjQge1xuICBtYXJnaW4tbGVmdDogLTEuNXJlbSAhaW1wb3J0YW50O1xufVxuXG4ubXMtbjUge1xuICBtYXJnaW4tbGVmdDogLTNyZW0gIWltcG9ydGFudDtcbn1cblxuLnBlLTAge1xuICBwYWRkaW5nLXJpZ2h0OiAwICFpbXBvcnRhbnQ7XG59XG5cbi5wZS0xIHtcbiAgcGFkZGluZy1yaWdodDogMC4yNXJlbSAhaW1wb3J0YW50O1xufVxuXG4ucGUtMiB7XG4gIHBhZGRpbmctcmlnaHQ6IDAuNXJlbSAhaW1wb3J0YW50O1xufVxuXG4ucGUtMyB7XG4gIHBhZGRpbmctcmlnaHQ6IDFyZW0gIWltcG9ydGFudDtcbn1cblxuLnBlLTQge1xuICBwYWRkaW5nLXJpZ2h0OiAxLjVyZW0gIWltcG9ydGFudDtcbn1cblxuLnBlLTUge1xuICBwYWRkaW5nLXJpZ2h0OiAzcmVtICFpbXBvcnRhbnQ7XG59XG5cbi5wcy0wIHtcbiAgcGFkZGluZy1sZWZ0OiAwICFpbXBvcnRhbnQ7XG59XG5cbi5wcy0xIHtcbiAgcGFkZGluZy1sZWZ0OiAwLjI1cmVtICFpbXBvcnRhbnQ7XG59XG5cbi5wcy0yIHtcbiAgcGFkZGluZy1sZWZ0OiAwLjVyZW0gIWltcG9ydGFudDtcbn1cblxuLnBzLTMge1xuICBwYWRkaW5nLWxlZnQ6IDFyZW0gIWltcG9ydGFudDtcbn1cblxuLnBzLTQge1xuICBwYWRkaW5nLWxlZnQ6IDEuNXJlbSAhaW1wb3J0YW50O1xufVxuXG4ucHMtNSB7XG4gIHBhZGRpbmctbGVmdDogM3JlbSAhaW1wb3J0YW50O1xufVxuXG4ucm90YXRlLTAge1xuICB0cmFuc2Zvcm06IHJvdGF0ZSgwZGVnKSAhaW1wb3J0YW50O1xufVxuXG4ucm90YXRlLTkwIHtcbiAgdHJhbnNmb3JtOiByb3RhdGUoOTBkZWcpICFpbXBvcnRhbnQ7XG59XG5cbi5yb3RhdGUtMTgwIHtcbiAgdHJhbnNmb3JtOiByb3RhdGUoMTgwZGVnKSAhaW1wb3J0YW50O1xufVxuXG4ucm90YXRlLTI3MCB7XG4gIHRyYW5zZm9ybTogcm90YXRlKDI3MGRlZykgIWltcG9ydGFudDtcbn1cblxuLnJvdGF0ZS1uOTAge1xuICB0cmFuc2Zvcm06IHJvdGF0ZSgtOTBkZWcpICFpbXBvcnRhbnQ7XG59XG5cbi5yb3RhdGUtbjE4MCB7XG4gIHRyYW5zZm9ybTogcm90YXRlKC0xODBkZWcpICFpbXBvcnRhbnQ7XG59XG5cbi5yb3RhdGUtbjI3MCB7XG4gIHRyYW5zZm9ybTogcm90YXRlKC0yNzBkZWcpICFpbXBvcnRhbnQ7XG59XG5cbi5zY2FsZVgtbjEge1xuICB0cmFuc2Zvcm06IHNjYWxlWCgtMSkgIWltcG9ydGFudDtcbn1cblxuLnNjYWxlWS1uMSB7XG4gIHRyYW5zZm9ybTogc2NhbGVZKC0xKSAhaW1wb3J0YW50O1xufVxuXG5AbWVkaWEgKG1pbi13aWR0aDogNTc2cHgpIHtcbiAgLmZsb2F0LXNtLXN0YXJ0IHtcbiAgICBmbG9hdDogbGVmdCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZsb2F0LXNtLWVuZCB7XG4gICAgZmxvYXQ6IHJpZ2h0ICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxvYXQtc20tbm9uZSB7XG4gICAgZmxvYXQ6IG5vbmUgIWltcG9ydGFudDtcbiAgfVxuXG4gIC50ZXh0LXNtLXN0YXJ0IHtcbiAgICB0ZXh0LWFsaWduOiBsZWZ0ICFpbXBvcnRhbnQ7XG4gIH1cblxuICAudGV4dC1zbS1lbmQge1xuICAgIHRleHQtYWxpZ246IHJpZ2h0ICFpbXBvcnRhbnQ7XG4gIH1cblxuICAudGV4dC1zbS1jZW50ZXIge1xuICAgIHRleHQtYWxpZ246IGNlbnRlciAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1lLXNtLTAge1xuICAgIG1hcmdpbi1yaWdodDogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1lLXNtLTEge1xuICAgIG1hcmdpbi1yaWdodDogMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1lLXNtLTIge1xuICAgIG1hcmdpbi1yaWdodDogMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWUtc20tMyB7XG4gICAgbWFyZ2luLXJpZ2h0OiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWUtc20tNCB7XG4gICAgbWFyZ2luLXJpZ2h0OiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tZS1zbS01IHtcbiAgICBtYXJnaW4tcmlnaHQ6IDNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tZS1zbS1hdXRvIHtcbiAgICBtYXJnaW4tcmlnaHQ6IGF1dG8gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tcy1zbS0wIHtcbiAgICBtYXJnaW4tbGVmdDogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1zLXNtLTEge1xuICAgIG1hcmdpbi1sZWZ0OiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXMtc20tMiB7XG4gICAgbWFyZ2luLWxlZnQ6IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1zLXNtLTMge1xuICAgIG1hcmdpbi1sZWZ0OiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXMtc20tNCB7XG4gICAgbWFyZ2luLWxlZnQ6IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1zLXNtLTUge1xuICAgIG1hcmdpbi1sZWZ0OiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXMtc20tYXV0byB7XG4gICAgbWFyZ2luLWxlZnQ6IGF1dG8gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tZS1zbS1uMSB7XG4gICAgbWFyZ2luLXJpZ2h0OiAtMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1lLXNtLW4yIHtcbiAgICBtYXJnaW4tcmlnaHQ6IC0wLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tZS1zbS1uMyB7XG4gICAgbWFyZ2luLXJpZ2h0OiAtMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1lLXNtLW40IHtcbiAgICBtYXJnaW4tcmlnaHQ6IC0xLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tZS1zbS1uNSB7XG4gICAgbWFyZ2luLXJpZ2h0OiAtM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1zLXNtLW4xIHtcbiAgICBtYXJnaW4tbGVmdDogLTAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tcy1zbS1uMiB7XG4gICAgbWFyZ2luLWxlZnQ6IC0wLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tcy1zbS1uMyB7XG4gICAgbWFyZ2luLWxlZnQ6IC0xcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXMtc20tbjQge1xuICAgIG1hcmdpbi1sZWZ0OiAtMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXMtc20tbjUge1xuICAgIG1hcmdpbi1sZWZ0OiAtM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBlLXNtLTAge1xuICAgIHBhZGRpbmctcmlnaHQ6IDAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wZS1zbS0xIHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucGUtc20tMiB7XG4gICAgcGFkZGluZy1yaWdodDogMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucGUtc20tMyB7XG4gICAgcGFkZGluZy1yaWdodDogMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBlLXNtLTQge1xuICAgIHBhZGRpbmctcmlnaHQ6IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBlLXNtLTUge1xuICAgIHBhZGRpbmctcmlnaHQ6IDNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wcy1zbS0wIHtcbiAgICBwYWRkaW5nLWxlZnQ6IDAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wcy1zbS0xIHtcbiAgICBwYWRkaW5nLWxlZnQ6IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wcy1zbS0yIHtcbiAgICBwYWRkaW5nLWxlZnQ6IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBzLXNtLTMge1xuICAgIHBhZGRpbmctbGVmdDogMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBzLXNtLTQge1xuICAgIHBhZGRpbmctbGVmdDogMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHMtc20tNSB7XG4gICAgcGFkZGluZy1sZWZ0OiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cbn1cbkBtZWRpYSAobWluLXdpZHRoOiA3NjhweCkge1xuICAuZmxvYXQtbWQtc3RhcnQge1xuICAgIGZsb2F0OiBsZWZ0ICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxvYXQtbWQtZW5kIHtcbiAgICBmbG9hdDogcmlnaHQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5mbG9hdC1tZC1ub25lIHtcbiAgICBmbG9hdDogbm9uZSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnRleHQtbWQtc3RhcnQge1xuICAgIHRleHQtYWxpZ246IGxlZnQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC50ZXh0LW1kLWVuZCB7XG4gICAgdGV4dC1hbGlnbjogcmlnaHQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC50ZXh0LW1kLWNlbnRlciB7XG4gICAgdGV4dC1hbGlnbjogY2VudGVyICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWUtbWQtMCB7XG4gICAgbWFyZ2luLXJpZ2h0OiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWUtbWQtMSB7XG4gICAgbWFyZ2luLXJpZ2h0OiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWUtbWQtMiB7XG4gICAgbWFyZ2luLXJpZ2h0OiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tZS1tZC0zIHtcbiAgICBtYXJnaW4tcmlnaHQ6IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tZS1tZC00IHtcbiAgICBtYXJnaW4tcmlnaHQ6IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1lLW1kLTUge1xuICAgIG1hcmdpbi1yaWdodDogM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1lLW1kLWF1dG8ge1xuICAgIG1hcmdpbi1yaWdodDogYXV0byAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1zLW1kLTAge1xuICAgIG1hcmdpbi1sZWZ0OiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXMtbWQtMSB7XG4gICAgbWFyZ2luLWxlZnQ6IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tcy1tZC0yIHtcbiAgICBtYXJnaW4tbGVmdDogMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXMtbWQtMyB7XG4gICAgbWFyZ2luLWxlZnQ6IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tcy1tZC00IHtcbiAgICBtYXJnaW4tbGVmdDogMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXMtbWQtNSB7XG4gICAgbWFyZ2luLWxlZnQ6IDNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tcy1tZC1hdXRvIHtcbiAgICBtYXJnaW4tbGVmdDogYXV0byAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1lLW1kLW4xIHtcbiAgICBtYXJnaW4tcmlnaHQ6IC0wLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWUtbWQtbjIge1xuICAgIG1hcmdpbi1yaWdodDogLTAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1lLW1kLW4zIHtcbiAgICBtYXJnaW4tcmlnaHQ6IC0xcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWUtbWQtbjQge1xuICAgIG1hcmdpbi1yaWdodDogLTEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1lLW1kLW41IHtcbiAgICBtYXJnaW4tcmlnaHQ6IC0zcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXMtbWQtbjEge1xuICAgIG1hcmdpbi1sZWZ0OiAtMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1zLW1kLW4yIHtcbiAgICBtYXJnaW4tbGVmdDogLTAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1zLW1kLW4zIHtcbiAgICBtYXJnaW4tbGVmdDogLTFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tcy1tZC1uNCB7XG4gICAgbWFyZ2luLWxlZnQ6IC0xLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tcy1tZC1uNSB7XG4gICAgbWFyZ2luLWxlZnQ6IC0zcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucGUtbWQtMCB7XG4gICAgcGFkZGluZy1yaWdodDogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBlLW1kLTEge1xuICAgIHBhZGRpbmctcmlnaHQ6IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wZS1tZC0yIHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wZS1tZC0zIHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucGUtbWQtNCB7XG4gICAgcGFkZGluZy1yaWdodDogMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucGUtbWQtNSB7XG4gICAgcGFkZGluZy1yaWdodDogM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBzLW1kLTAge1xuICAgIHBhZGRpbmctbGVmdDogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBzLW1kLTEge1xuICAgIHBhZGRpbmctbGVmdDogMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBzLW1kLTIge1xuICAgIHBhZGRpbmctbGVmdDogMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHMtbWQtMyB7XG4gICAgcGFkZGluZy1sZWZ0OiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHMtbWQtNCB7XG4gICAgcGFkZGluZy1sZWZ0OiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wcy1tZC01IHtcbiAgICBwYWRkaW5nLWxlZnQ6IDNyZW0gIWltcG9ydGFudDtcbiAgfVxufVxuQG1lZGlhIChtaW4td2lkdGg6IDk5MnB4KSB7XG4gIC5mbG9hdC1sZy1zdGFydCB7XG4gICAgZmxvYXQ6IGxlZnQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5mbG9hdC1sZy1lbmQge1xuICAgIGZsb2F0OiByaWdodCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZsb2F0LWxnLW5vbmUge1xuICAgIGZsb2F0OiBub25lICFpbXBvcnRhbnQ7XG4gIH1cblxuICAudGV4dC1sZy1zdGFydCB7XG4gICAgdGV4dC1hbGlnbjogbGVmdCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnRleHQtbGctZW5kIHtcbiAgICB0ZXh0LWFsaWduOiByaWdodCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnRleHQtbGctY2VudGVyIHtcbiAgICB0ZXh0LWFsaWduOiBjZW50ZXIgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tZS1sZy0wIHtcbiAgICBtYXJnaW4tcmlnaHQ6IDAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tZS1sZy0xIHtcbiAgICBtYXJnaW4tcmlnaHQ6IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tZS1sZy0yIHtcbiAgICBtYXJnaW4tcmlnaHQ6IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1lLWxnLTMge1xuICAgIG1hcmdpbi1yaWdodDogMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1lLWxnLTQge1xuICAgIG1hcmdpbi1yaWdodDogMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWUtbGctNSB7XG4gICAgbWFyZ2luLXJpZ2h0OiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWUtbGctYXV0byB7XG4gICAgbWFyZ2luLXJpZ2h0OiBhdXRvICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXMtbGctMCB7XG4gICAgbWFyZ2luLWxlZnQ6IDAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tcy1sZy0xIHtcbiAgICBtYXJnaW4tbGVmdDogMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1zLWxnLTIge1xuICAgIG1hcmdpbi1sZWZ0OiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tcy1sZy0zIHtcbiAgICBtYXJnaW4tbGVmdDogMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1zLWxnLTQge1xuICAgIG1hcmdpbi1sZWZ0OiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tcy1sZy01IHtcbiAgICBtYXJnaW4tbGVmdDogM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1zLWxnLWF1dG8ge1xuICAgIG1hcmdpbi1sZWZ0OiBhdXRvICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWUtbGctbjEge1xuICAgIG1hcmdpbi1yaWdodDogLTAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tZS1sZy1uMiB7XG4gICAgbWFyZ2luLXJpZ2h0OiAtMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWUtbGctbjMge1xuICAgIG1hcmdpbi1yaWdodDogLTFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tZS1sZy1uNCB7XG4gICAgbWFyZ2luLXJpZ2h0OiAtMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWUtbGctbjUge1xuICAgIG1hcmdpbi1yaWdodDogLTNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tcy1sZy1uMSB7XG4gICAgbWFyZ2luLWxlZnQ6IC0wLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXMtbGctbjIge1xuICAgIG1hcmdpbi1sZWZ0OiAtMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXMtbGctbjMge1xuICAgIG1hcmdpbi1sZWZ0OiAtMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1zLWxnLW40IHtcbiAgICBtYXJnaW4tbGVmdDogLTEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1zLWxnLW41IHtcbiAgICBtYXJnaW4tbGVmdDogLTNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wZS1sZy0wIHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucGUtbGctMSB7XG4gICAgcGFkZGluZy1yaWdodDogMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBlLWxnLTIge1xuICAgIHBhZGRpbmctcmlnaHQ6IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBlLWxnLTMge1xuICAgIHBhZGRpbmctcmlnaHQ6IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wZS1sZy00IHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wZS1sZy01IHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHMtbGctMCB7XG4gICAgcGFkZGluZy1sZWZ0OiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHMtbGctMSB7XG4gICAgcGFkZGluZy1sZWZ0OiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHMtbGctMiB7XG4gICAgcGFkZGluZy1sZWZ0OiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wcy1sZy0zIHtcbiAgICBwYWRkaW5nLWxlZnQ6IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wcy1sZy00IHtcbiAgICBwYWRkaW5nLWxlZnQ6IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBzLWxnLTUge1xuICAgIHBhZGRpbmctbGVmdDogM3JlbSAhaW1wb3J0YW50O1xuICB9XG59XG5AbWVkaWEgKG1pbi13aWR0aDogMTIwMHB4KSB7XG4gIC5mbG9hdC14bC1zdGFydCB7XG4gICAgZmxvYXQ6IGxlZnQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5mbG9hdC14bC1lbmQge1xuICAgIGZsb2F0OiByaWdodCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmZsb2F0LXhsLW5vbmUge1xuICAgIGZsb2F0OiBub25lICFpbXBvcnRhbnQ7XG4gIH1cblxuICAudGV4dC14bC1zdGFydCB7XG4gICAgdGV4dC1hbGlnbjogbGVmdCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnRleHQteGwtZW5kIHtcbiAgICB0ZXh0LWFsaWduOiByaWdodCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnRleHQteGwtY2VudGVyIHtcbiAgICB0ZXh0LWFsaWduOiBjZW50ZXIgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tZS14bC0wIHtcbiAgICBtYXJnaW4tcmlnaHQ6IDAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tZS14bC0xIHtcbiAgICBtYXJnaW4tcmlnaHQ6IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tZS14bC0yIHtcbiAgICBtYXJnaW4tcmlnaHQ6IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1lLXhsLTMge1xuICAgIG1hcmdpbi1yaWdodDogMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1lLXhsLTQge1xuICAgIG1hcmdpbi1yaWdodDogMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWUteGwtNSB7XG4gICAgbWFyZ2luLXJpZ2h0OiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWUteGwtYXV0byB7XG4gICAgbWFyZ2luLXJpZ2h0OiBhdXRvICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXMteGwtMCB7XG4gICAgbWFyZ2luLWxlZnQ6IDAgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tcy14bC0xIHtcbiAgICBtYXJnaW4tbGVmdDogMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1zLXhsLTIge1xuICAgIG1hcmdpbi1sZWZ0OiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tcy14bC0zIHtcbiAgICBtYXJnaW4tbGVmdDogMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1zLXhsLTQge1xuICAgIG1hcmdpbi1sZWZ0OiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tcy14bC01IHtcbiAgICBtYXJnaW4tbGVmdDogM3JlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1zLXhsLWF1dG8ge1xuICAgIG1hcmdpbi1sZWZ0OiBhdXRvICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWUteGwtbjEge1xuICAgIG1hcmdpbi1yaWdodDogLTAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tZS14bC1uMiB7XG4gICAgbWFyZ2luLXJpZ2h0OiAtMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWUteGwtbjMge1xuICAgIG1hcmdpbi1yaWdodDogLTFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tZS14bC1uNCB7XG4gICAgbWFyZ2luLXJpZ2h0OiAtMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWUteGwtbjUge1xuICAgIG1hcmdpbi1yaWdodDogLTNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tcy14bC1uMSB7XG4gICAgbWFyZ2luLWxlZnQ6IC0wLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXMteGwtbjIge1xuICAgIG1hcmdpbi1sZWZ0OiAtMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXMteGwtbjMge1xuICAgIG1hcmdpbi1sZWZ0OiAtMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1zLXhsLW40IHtcbiAgICBtYXJnaW4tbGVmdDogLTEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1zLXhsLW41IHtcbiAgICBtYXJnaW4tbGVmdDogLTNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wZS14bC0wIHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucGUteGwtMSB7XG4gICAgcGFkZGluZy1yaWdodDogMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBlLXhsLTIge1xuICAgIHBhZGRpbmctcmlnaHQ6IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBlLXhsLTMge1xuICAgIHBhZGRpbmctcmlnaHQ6IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wZS14bC00IHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wZS14bC01IHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHMteGwtMCB7XG4gICAgcGFkZGluZy1sZWZ0OiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHMteGwtMSB7XG4gICAgcGFkZGluZy1sZWZ0OiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHMteGwtMiB7XG4gICAgcGFkZGluZy1sZWZ0OiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wcy14bC0zIHtcbiAgICBwYWRkaW5nLWxlZnQ6IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wcy14bC00IHtcbiAgICBwYWRkaW5nLWxlZnQ6IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBzLXhsLTUge1xuICAgIHBhZGRpbmctbGVmdDogM3JlbSAhaW1wb3J0YW50O1xuICB9XG59XG5AbWVkaWEgKG1pbi13aWR0aDogMTQwMHB4KSB7XG4gIC5mbG9hdC14eGwtc3RhcnQge1xuICAgIGZsb2F0OiBsZWZ0ICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxvYXQteHhsLWVuZCB7XG4gICAgZmxvYXQ6IHJpZ2h0ICFpbXBvcnRhbnQ7XG4gIH1cblxuICAuZmxvYXQteHhsLW5vbmUge1xuICAgIGZsb2F0OiBub25lICFpbXBvcnRhbnQ7XG4gIH1cblxuICAudGV4dC14eGwtc3RhcnQge1xuICAgIHRleHQtYWxpZ246IGxlZnQgIWltcG9ydGFudDtcbiAgfVxuXG4gIC50ZXh0LXh4bC1lbmQge1xuICAgIHRleHQtYWxpZ246IHJpZ2h0ICFpbXBvcnRhbnQ7XG4gIH1cblxuICAudGV4dC14eGwtY2VudGVyIHtcbiAgICB0ZXh0LWFsaWduOiBjZW50ZXIgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tZS14eGwtMCB7XG4gICAgbWFyZ2luLXJpZ2h0OiAwICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWUteHhsLTEge1xuICAgIG1hcmdpbi1yaWdodDogMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1lLXh4bC0yIHtcbiAgICBtYXJnaW4tcmlnaHQ6IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1lLXh4bC0zIHtcbiAgICBtYXJnaW4tcmlnaHQ6IDFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tZS14eGwtNCB7XG4gICAgbWFyZ2luLXJpZ2h0OiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tZS14eGwtNSB7XG4gICAgbWFyZ2luLXJpZ2h0OiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWUteHhsLWF1dG8ge1xuICAgIG1hcmdpbi1yaWdodDogYXV0byAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1zLXh4bC0wIHtcbiAgICBtYXJnaW4tbGVmdDogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1zLXh4bC0xIHtcbiAgICBtYXJnaW4tbGVmdDogMC4yNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1zLXh4bC0yIHtcbiAgICBtYXJnaW4tbGVmdDogMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXMteHhsLTMge1xuICAgIG1hcmdpbi1sZWZ0OiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXMteHhsLTQge1xuICAgIG1hcmdpbi1sZWZ0OiAxLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tcy14eGwtNSB7XG4gICAgbWFyZ2luLWxlZnQ6IDNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tcy14eGwtYXV0byB7XG4gICAgbWFyZ2luLWxlZnQ6IGF1dG8gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tZS14eGwtbjEge1xuICAgIG1hcmdpbi1yaWdodDogLTAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tZS14eGwtbjIge1xuICAgIG1hcmdpbi1yaWdodDogLTAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1lLXh4bC1uMyB7XG4gICAgbWFyZ2luLXJpZ2h0OiAtMXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLm1lLXh4bC1uNCB7XG4gICAgbWFyZ2luLXJpZ2h0OiAtMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubWUteHhsLW41IHtcbiAgICBtYXJnaW4tcmlnaHQ6IC0zcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXMteHhsLW4xIHtcbiAgICBtYXJnaW4tbGVmdDogLTAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tcy14eGwtbjIge1xuICAgIG1hcmdpbi1sZWZ0OiAtMC41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXMteHhsLW4zIHtcbiAgICBtYXJnaW4tbGVmdDogLTFyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5tcy14eGwtbjQge1xuICAgIG1hcmdpbi1sZWZ0OiAtMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAubXMteHhsLW41IHtcbiAgICBtYXJnaW4tbGVmdDogLTNyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wZS14eGwtMCB7XG4gICAgcGFkZGluZy1yaWdodDogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBlLXh4bC0xIHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAwLjI1cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucGUteHhsLTIge1xuICAgIHBhZGRpbmctcmlnaHQ6IDAuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBlLXh4bC0zIHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucGUteHhsLTQge1xuICAgIHBhZGRpbmctcmlnaHQ6IDEuNXJlbSAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBlLXh4bC01IHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAzcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHMteHhsLTAge1xuICAgIHBhZGRpbmctbGVmdDogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLnBzLXh4bC0xIHtcbiAgICBwYWRkaW5nLWxlZnQ6IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wcy14eGwtMiB7XG4gICAgcGFkZGluZy1sZWZ0OiAwLjVyZW0gIWltcG9ydGFudDtcbiAgfVxuXG4gIC5wcy14eGwtMyB7XG4gICAgcGFkZGluZy1sZWZ0OiAxcmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHMteHhsLTQge1xuICAgIHBhZGRpbmctbGVmdDogMS41cmVtICFpbXBvcnRhbnQ7XG4gIH1cblxuICAucHMteHhsLTUge1xuICAgIHBhZGRpbmctbGVmdDogM3JlbSAhaW1wb3J0YW50O1xuICB9XG59XG5ib2R5IHtcbiAgdGV4dC1yZW5kZXJpbmc6IG9wdGltaXplTGVnaWJpbGl0eTtcbiAgZm9udC1zbW9vdGhpbmc6IGFudGlhbGlhc2VkO1xuICAtbW96LWZvbnQtZmVhdHVyZS1zZXR0aW5nczogXCJsaWdhXCIgb247XG4gIC13ZWJraXQtZm9udC1zbW9vdGhpbmc6IGFudGlhbGlhc2VkO1xuICAtbW96LW9zeC1mb250LXNtb290aGluZzogZ3JheXNjYWxlO1xufVxuXG5AbWVkaWEgKG1pbi13aWR0aDogNzY4cHgpIHtcbiAgYnV0dG9uLmxpc3QtZ3JvdXAtaXRlbSB7XG4gICAgb3V0bGluZTogbm9uZTtcbiAgfVxufVxuLmFwcC1vdmVybGF5IHtcbiAgcG9zaXRpb246IGFic29sdXRlO1xuICB0b3A6IDA7XG4gIGxlZnQ6IDA7XG4gIHJpZ2h0OiAwO1xuICBib3R0b206IDA7XG4gIGJhY2tncm91bmQtY29sb3I6IHJnYmEoNjcsIDg5LCAxMTMsIDAuNSk7XG4gIHZpc2liaWxpdHk6IGhpZGRlbjtcbiAgei1pbmRleDogMztcbiAgdHJhbnNpdGlvbjogYWxsIDAuMjVzIGVhc2U7XG59XG4uYXBwLW92ZXJsYXkuc2hvdyB7XG4gIHZpc2liaWxpdHk6IHZpc2libGU7XG59XG5cbi5jb250YWluZXIsXG4uY29udGFpbmVyLWZsdWlkLFxuLmNvbnRhaW5lci1zbSxcbi5jb250YWluZXItbWQsXG4uY29udGFpbmVyLWxnLFxuLmNvbnRhaW5lci14bCxcbi5jb250YWluZXIteHhsIHtcbiAgcGFkZGluZy1yaWdodDogMXJlbTtcbiAgcGFkZGluZy1sZWZ0OiAxcmVtO1xufVxuQG1lZGlhIChtaW4td2lkdGg6IDk5MnB4KSB7XG4gIC5jb250YWluZXIsXG4uY29udGFpbmVyLWZsdWlkLFxuLmNvbnRhaW5lci1zbSxcbi5jb250YWluZXItbWQsXG4uY29udGFpbmVyLWxnLFxuLmNvbnRhaW5lci14bCxcbi5jb250YWluZXIteHhsIHtcbiAgICBwYWRkaW5nLXJpZ2h0OiAxLjYyNXJlbTtcbiAgICBwYWRkaW5nLWxlZnQ6IDEuNjI1cmVtO1xuICB9XG59XG5cbi5pbWctdGh1bWJuYWlsIHtcbiAgcG9zaXRpb246IHJlbGF0aXZlO1xuICBkaXNwbGF5OiBibG9jaztcbn1cbi5pbWctdGh1bWJuYWlsIGltZyB7XG4gIHotaW5kZXg6IDE7XG59XG5cbi5pbWctdGh1bWJuYWlsLWNvbnRlbnQge1xuICBwb3NpdGlvbjogYWJzb2x1dGU7XG4gIHRvcDogNTAlO1xuICBsZWZ0OiA1MCU7XG4gIHotaW5kZXg6IDM7XG4gIGRpc3BsYXk6IGJsb2NrO1xuICBvcGFjaXR5OiAwO1xuICB0cmFuc2l0aW9uOiBhbGwgMC4ycyBlYXNlLWluLW91dDtcbiAgdHJhbnNmb3JtOiB0cmFuc2xhdGUoLTUwJSwgLTUwJSk7XG59XG4uaW1nLXRodW1ibmFpbDpob3ZlciAuaW1nLXRodW1ibmFpbC1jb250ZW50LCAuaW1nLXRodW1ibmFpbDpmb2N1cyAuaW1nLXRodW1ibmFpbC1jb250ZW50IHtcbiAgb3BhY2l0eTogMTtcbn1cblxuLmltZy10aHVtYm5haWwtb3ZlcmxheSB7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgdG9wOiAwO1xuICByaWdodDogMDtcbiAgYm90dG9tOiAwO1xuICBsZWZ0OiAwO1xuICB6LWluZGV4OiAyO1xuICBkaXNwbGF5OiBibG9jaztcbiAgdHJhbnNpdGlvbjogYWxsIDAuMnMgZWFzZS1pbi1vdXQ7XG59XG4uaW1nLXRodW1ibmFpbDpub3QoOmhvdmVyKTpub3QoOmZvY3VzKSAuaW1nLXRodW1ibmFpbC1vdmVybGF5IHtcbiAgb3BhY2l0eTogMCAhaW1wb3J0YW50O1xufVxuXG4uaW1nLXRodW1ibmFpbC1zaGFkb3cge1xuICB0cmFuc2l0aW9uOiBib3gtc2hhZG93IDAuMnM7XG59XG4uaW1nLXRodW1ibmFpbC1zaGFkb3c6aG92ZXIsIC5pbWctdGh1bWJuYWlsLXNoYWRvdzpmb2N1cyB7XG4gIGJveC1zaGFkb3c6IDAgNXB4IDIwcHggcmdiYSg2NywgODksIDExMywgMC40KTtcbn1cblxuLmltZy10aHVtYm5haWwtem9vbS1pbiB7XG4gIG92ZXJmbG93OiBoaWRkZW47XG59XG4uaW1nLXRodW1ibmFpbC16b29tLWluIGltZyB7XG4gIHRyYW5zaXRpb246IGFsbCAwLjNzIGVhc2UtaW4tb3V0O1xuICB0cmFuc2Zvcm06IHRyYW5zbGF0ZTNkKDApO1xufVxuLmltZy10aHVtYm5haWwtem9vbS1pbiAuaW1nLXRodW1ibmFpbC1jb250ZW50IHtcbiAgdHJhbnNmb3JtOiB0cmFuc2xhdGUoLTUwJSwgLTUwJSkgc2NhbGUoMC42KTtcbn1cbi5pbWctdGh1bWJuYWlsLXpvb20taW46aG92ZXIgaW1nLCAuaW1nLXRodW1ibmFpbC16b29tLWluOmZvY3VzIGltZyB7XG4gIHRyYW5zZm9ybTogc2NhbGUoMS4xKTtcbn1cbi5pbWctdGh1bWJuYWlsLXpvb20taW46aG92ZXIgLmltZy10aHVtYm5haWwtY29udGVudCwgLmltZy10aHVtYm5haWwtem9vbS1pbjpmb2N1cyAuaW1nLXRodW1ibmFpbC1jb250ZW50IHtcbiAgdHJhbnNmb3JtOiB0cmFuc2xhdGUoLTUwJSwgLTUwJSkgc2NhbGUoMSk7XG59XG5cbkBtZWRpYSBhbGwgYW5kICgtbXMtaGlnaC1jb250cmFzdDogbm9uZSksICgtbXMtaGlnaC1jb250cmFzdDogYWN0aXZlKSB7XG4gIC5jYXJkLFxuLmNhcmQtYm9keSxcbi5tZWRpYSxcbi5mbGV4LWNvbHVtbixcbi50YWItY29udGVudCB7XG4gICAgbWluLWhlaWdodDogMXB4O1xuICB9XG5cbiAgaW1nIHtcbiAgICBtaW4taGVpZ2h0OiAxcHg7XG4gICAgaGVpZ2h0OiBhdXRvO1xuICB9XG59XG4uYnV5LW5vdyAuYnRuLWJ1eS1ub3cge1xuICBwb3NpdGlvbjogZml4ZWQ7XG4gIGJvdHRvbTogM3JlbTtcbiAgcmlnaHQ6IDEuNjI1cmVtO1xuICB6LWluZGV4OiA5OTk5OTk7XG4gIGJveC1zaGFkb3c6IDAgMXB4IDIwcHggMXB4ICNmZjNlMWQ7XG59XG4uYnV5LW5vdyAuYnRuLWJ1eS1ub3c6aG92ZXIge1xuICBib3gtc2hhZG93OiBub25lO1xufVxuXG4udWktc3F1YXJlLFxuLnVpLXJlY3QsXG4udWktcmVjdC0zMCxcbi51aS1yZWN0LTYwLFxuLnVpLXJlY3QtNjcsXG4udWktcmVjdC03NSB7XG4gIHBvc2l0aW9uOiByZWxhdGl2ZSAhaW1wb3J0YW50O1xuICBkaXNwbGF5OiBibG9jayAhaW1wb3J0YW50O1xuICBwYWRkaW5nLXRvcDogMTAwJSAhaW1wb3J0YW50O1xuICB3aWR0aDogMTAwJSAhaW1wb3J0YW50O1xufVxuXG4udWktc3F1YXJlIHtcbiAgcGFkZGluZy10b3A6IDEwMCUgIWltcG9ydGFudDtcbn1cblxuLnVpLXJlY3Qge1xuICBwYWRkaW5nLXRvcDogNTAlICFpbXBvcnRhbnQ7XG59XG5cbi51aS1yZWN0LTMwIHtcbiAgcGFkZGluZy10b3A6IDMwJSAhaW1wb3J0YW50O1xufVxuXG4udWktcmVjdC02MCB7XG4gIHBhZGRpbmctdG9wOiA2MCUgIWltcG9ydGFudDtcbn1cblxuLnVpLXJlY3QtNjcge1xuICBwYWRkaW5nLXRvcDogNjclICFpbXBvcnRhbnQ7XG59XG5cbi51aS1yZWN0LTc1IHtcbiAgcGFkZGluZy10b3A6IDc1JSAhaW1wb3J0YW50O1xufVxuXG4udWktc3F1YXJlLWNvbnRlbnQsXG4udWktcmVjdC1jb250ZW50IHtcbiAgcG9zaXRpb246IGFic29sdXRlICFpbXBvcnRhbnQ7XG4gIHRvcDogMCAhaW1wb3J0YW50O1xuICByaWdodDogMCAhaW1wb3J0YW50O1xuICBib3R0b206IDAgIWltcG9ydGFudDtcbiAgbGVmdDogMCAhaW1wb3J0YW50O1xufVxuXG4udGV4dC1zdHJpa2UtdGhyb3VnaCB7XG4gIHRleHQtZGVjb3JhdGlvbjogbGluZS10aHJvdWdoO1xufVxuXG4ubGluZS1jbGFtcC0xIHtcbiAgb3ZlcmZsb3c6IGhpZGRlbjtcbiAgZGlzcGxheTogLXdlYmtpdC1ib3g7XG4gIC13ZWJraXQtbGluZS1jbGFtcDogMTtcbiAgLXdlYmtpdC1ib3gtb3JpZW50OiB2ZXJ0aWNhbDtcbn1cblxuLmxpbmUtY2xhbXAtMiB7XG4gIG92ZXJmbG93OiBoaWRkZW47XG4gIGRpc3BsYXk6IC13ZWJraXQtYm94O1xuICAtd2Via2l0LWxpbmUtY2xhbXA6IDI7XG4gIC13ZWJraXQtYm94LW9yaWVudDogdmVydGljYWw7XG59XG5cbi5saW5lLWNsYW1wLTMge1xuICBvdmVyZmxvdzogaGlkZGVuO1xuICBkaXNwbGF5OiAtd2Via2l0LWJveDtcbiAgLXdlYmtpdC1saW5lLWNsYW1wOiAzO1xuICAtd2Via2l0LWJveC1vcmllbnQ6IHZlcnRpY2FsO1xufVxuXG4udWktc3RhcnMsXG4udWktc3Rhcixcbi51aS1zdGFyID4gKiB7XG4gIGhlaWdodDogMS4xZW07XG4gIC13ZWJraXQtdXNlci1kcmFnOiBub25lO1xuICAta2h0bWwtdXNlci1kcmFnOiBub25lO1xuICAtbW96LXVzZXItZHJhZzogbm9uZTtcbiAgLW8tdXNlci1kcmFnOiBub25lO1xuICB1c2VyLWRyYWc6IG5vbmU7XG59XG5cbi51aS1zdGFycyB7XG4gIGRpc3BsYXk6IGlubGluZS1ibG9jaztcbiAgdmVydGljYWwtYWxpZ246IG1pZGRsZTtcbiAgd2hpdGUtc3BhY2U6IG5vd3JhcDtcbn1cblxuLnVpLXN0YXIge1xuICBwb3NpdGlvbjogcmVsYXRpdmU7XG4gIGRpc3BsYXk6IGJsb2NrO1xuICBmbG9hdDogbGVmdDtcbiAgd2lkdGg6IDEuMWVtO1xuICBoZWlnaHQ6IDEuMWVtO1xuICB0ZXh0LWRlY29yYXRpb246IG5vbmUgIWltcG9ydGFudDtcbiAgZm9udC1zaXplOiAxLjFlbTtcbiAgbGluZS1oZWlnaHQ6IDE7XG4gIHVzZXItc2VsZWN0OiBub25lO1xufVxuLnVpLXN0YXIgKyAudWktc3RhciB7XG4gIG1hcmdpbi1sZWZ0OiAtMC4xZW07XG59XG4udWktc3RhciA+ICosXG4udWktc3RhciA+ICo6OmJlZm9yZSxcbi51aS1zdGFyID4gKjo6YWZ0ZXIge1xuICBwb3NpdGlvbjogYWJzb2x1dGU7XG4gIGxlZnQ6IDAuNTVlbTtcbiAgaGVpZ2h0OiAxMDAlO1xuICBmb250LXNpemU6IDFlbTtcbiAgbGluZS1oZWlnaHQ6IDE7XG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlWCgtNTAlKTtcbn1cbi51aS1zdGFyID4gKiB7XG4gIHRvcDogMDtcbiAgd2lkdGg6IDEwMCU7XG4gIHRleHQtYWxpZ246IGNlbnRlcjtcbn1cbi51aS1zdGFyID4gKjpmaXJzdC1jaGlsZCB7XG4gIHotaW5kZXg6IDEwO1xuICBkaXNwbGF5OiBub25lO1xuICBvdmVyZmxvdzogaGlkZGVuO1xuICBjb2xvcjogI2ZmYWIwMDtcbn1cbi51aS1zdGFyID4gKjpsYXN0LWNoaWxkIHtcbiAgei1pbmRleDogNTtcbiAgZGlzcGxheTogYmxvY2s7XG59XG4udWktc3Rhci5oYWxmLWZpbGxlZCA+ICo6Zmlyc3QtY2hpbGQge1xuICB3aWR0aDogNTAlO1xuICB0cmFuc2Zvcm06IHRyYW5zbGF0ZVgoLTEwMCUpO1xufVxuLnVpLXN0YXIuZmlsbGVkID4gKjpmaXJzdC1jaGlsZCwgLnVpLXN0YXIuaGFsZi1maWxsZWQgPiAqOmZpcnN0LWNoaWxkIHtcbiAgZGlzcGxheTogYmxvY2s7XG59XG4udWktc3Rhci5maWxsZWQgPiAqOmxhc3QtY2hpbGQge1xuICBkaXNwbGF5OiBub25lO1xufVxuXG4udWktc3RhcnMuaG92ZXJhYmxlIC51aS1zdGFyID4gKjpmaXJzdC1jaGlsZCB7XG4gIGRpc3BsYXk6IGJsb2NrO1xufVxuXG4udWktc3RhcnMuaG92ZXJhYmxlIC51aS1zdGFyOmZpcnN0LWNoaWxkOm5vdCguZmlsbGVkKSA+ICo6Zmlyc3QtY2hpbGQsXG4udWktc3RhcnMuaG92ZXJhYmxlIC51aS1zdGFyOmZpcnN0LWNoaWxkOm5vdCguZmlsbGVkKSB+IC51aS1zdGFyID4gKjpmaXJzdC1jaGlsZCxcbi51aS1zdGFycy5ob3ZlcmFibGUgLnVpLXN0YXI6Zmlyc3QtY2hpbGQ6bm90KC5oYWxmLWZpbGxlZCkgPiAqOmZpcnN0LWNoaWxkLFxuLnVpLXN0YXJzLmhvdmVyYWJsZSAudWktc3RhcjpmaXJzdC1jaGlsZDpub3QoLmhhbGYtZmlsbGVkKSB+IC51aS1zdGFyID4gKjpmaXJzdC1jaGlsZCB7XG4gIGRpc3BsYXk6IG5vbmU7XG59XG5cbi51aS1zdGFycy5ob3ZlcmFibGUgLnVpLXN0YXIuZmlsbGVkID4gKjpmaXJzdC1jaGlsZCxcbi51aS1zdGFycy5ob3ZlcmFibGUgLnVpLXN0YXIuaGFsZi1maWxsZWQgPiAqOmZpcnN0LWNoaWxkIHtcbiAgZGlzcGxheTogYmxvY2sgIWltcG9ydGFudDtcbn1cblxuLnVpLXN0YXJzLmhvdmVyYWJsZTpob3ZlciAudWktc3RhciA+ICo6Zmlyc3QtY2hpbGQge1xuICBkaXNwbGF5OiBibG9jayAhaW1wb3J0YW50O1xuICB3aWR0aDogMTAwJSAhaW1wb3J0YW50O1xuICB0cmFuc2Zvcm06IHRyYW5zbGF0ZVgoLTUwJSkgIWltcG9ydGFudDtcbn1cblxuLnVpLXN0YXJzLmhvdmVyYWJsZSAudWktc3Rhcjpob3ZlciB+IC51aS1zdGFyID4gKjpmaXJzdC1jaGlsZCB7XG4gIGRpc3BsYXk6IG5vbmUgIWltcG9ydGFudDtcbn1cbi51aS1zdGFycy5ob3ZlcmFibGUgLnVpLXN0YXI6aG92ZXIgfiAudWktc3RhciA+ICo6bGFzdC1jaGlsZCB7XG4gIGRpc3BsYXk6IGJsb2NrICFpbXBvcnRhbnQ7XG59XG5cbi51aS1iZy1jb3ZlciB7XG4gIGJhY2tncm91bmQtY29sb3I6IHJnYmEoMCwgMCwgMCwgMCk7XG4gIGJhY2tncm91bmQtcG9zaXRpb246IGNlbnRlciBjZW50ZXI7XG4gIGJhY2tncm91bmQtc2l6ZTogY292ZXI7XG59XG5cbi51aS1iZy1vdmVybGF5LWNvbnRhaW5lcixcbi51aS1iZy12aWRlby1jb250YWluZXIge1xuICBwb3NpdGlvbjogcmVsYXRpdmU7XG59XG4udWktYmctb3ZlcmxheS1jb250YWluZXIgPiAqLFxuLnVpLWJnLXZpZGVvLWNvbnRhaW5lciA+ICoge1xuICBwb3NpdGlvbjogcmVsYXRpdmU7XG59XG5cbi51aS1iZy1vdmVybGF5LWNvbnRhaW5lciAudWktYmctb3ZlcmxheSB7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgdG9wOiAwO1xuICByaWdodDogMDtcbiAgYm90dG9tOiAwO1xuICBsZWZ0OiAwO1xuICBkaXNwbGF5OiBibG9jaztcbn1cblxuLmxpZ2h0LXN0eWxlIC51aS1ib3JkZXJlZCB7XG4gIGJvcmRlcjogMXB4IHNvbGlkICNkOWRlZTM7XG59XG4ubGlnaHQtc3R5bGUgLnVpLXN0YXIgPiAqOmxhc3QtY2hpbGQge1xuICBjb2xvcjogcmdiYSg2NywgODksIDExMywgMC4yKTtcbn1cblxuLm1lbnUge1xuICBkaXNwbGF5OiBmbGV4O1xufVxuLm1lbnUgLmFwcC1icmFuZCB7XG4gIHdpZHRoOiAxMDAlO1xufVxuLm1lbnUgLnBzX190aHVtYi15LFxuLm1lbnUgLnBzX19yYWlsLXkge1xuICB3aWR0aDogMC4xMjVyZW0gIWltcG9ydGFudDtcbn1cbi5tZW51IC5wc19fcmFpbC15IHtcbiAgcmlnaHQ6IDAuMjVyZW0gIWltcG9ydGFudDtcbiAgbGVmdDogYXV0byAhaW1wb3J0YW50O1xuICBiYWNrZ3JvdW5kOiBub25lICFpbXBvcnRhbnQ7XG59XG4ubWVudSAucHNfX3JhaWwteTpob3Zlcixcbi5tZW51IC5wc19fcmFpbC15OmZvY3VzLFxuLm1lbnUgLnBzX19yYWlsLXkucHMtLWNsaWNraW5nLFxuLm1lbnUgLnBzX19yYWlsLXk6aG92ZXIgPiAucHNfX3RodW1iLXksXG4ubWVudSAucHNfX3JhaWwteTpmb2N1cyA+IC5wc19fdGh1bWIteSxcbi5tZW51IC5wc19fcmFpbC15LnBzLS1jbGlja2luZyA+IC5wc19fdGh1bWIteSB7XG4gIHdpZHRoOiAwLjM3NXJlbSAhaW1wb3J0YW50O1xufVxuXG4ubWVudS1pbm5lciB7XG4gIGRpc3BsYXk6IGZsZXg7XG4gIGFsaWduLWl0ZW1zOiBmbGV4LXN0YXJ0O1xuICBqdXN0aWZ5LWNvbnRlbnQ6IGZsZXgtc3RhcnQ7XG4gIG1hcmdpbjogMDtcbiAgcGFkZGluZzogMDtcbiAgaGVpZ2h0OiAxMDAlO1xufVxuXG4ubWVudS1pbm5lci1zaGFkb3cge1xuICBkaXNwbGF5OiBub25lO1xuICBwb3NpdGlvbjogYWJzb2x1dGU7XG4gIHRvcDogNC4yMjVyZW07XG4gIGhlaWdodDogM3JlbTtcbiAgd2lkdGg6IDEwMCU7XG4gIHBvaW50ZXItZXZlbnRzOiBub25lO1xuICB6LWluZGV4OiAyO1xufVxuaHRtbDpub3QoLmxheW91dC1tZW51LWZpeGVkKSAubWVudS1pbm5lci1zaGFkb3cge1xuICBkaXNwbGF5OiBub25lICFpbXBvcnRhbnQ7XG59XG5cbi5tZW51LWl0ZW0ge1xuICBhbGlnbi1pdGVtczogZmxleC1zdGFydDtcbiAganVzdGlmeS1jb250ZW50OiBmbGV4LXN0YXJ0O1xufVxuLm1lbnUtaXRlbS5tZW51LWl0ZW0tYW5pbWF0aW5nIHtcbiAgdHJhbnNpdGlvbjogaGVpZ2h0IDAuM3MgZWFzZS1pbi1vdXQ7XG59XG5cbi5tZW51LWl0ZW0sXG4ubWVudS1oZWFkZXIsXG4ubWVudS1kaXZpZGVyLFxuLm1lbnUtYmxvY2sge1xuICBmbGV4OiAwIDAgYXV0bztcbiAgZmxleC1kaXJlY3Rpb246IGNvbHVtbjtcbiAgbWFyZ2luOiAwO1xuICBwYWRkaW5nOiAwO1xuICBsaXN0LXN0eWxlOiBub25lO1xufVxuXG4ubWVudS1oZWFkZXIge1xuICBvcGFjaXR5OiAxO1xuICB0cmFuc2l0aW9uOiBvcGFjaXR5IDAuM3MgZWFzZS1pbi1vdXQ7XG59XG5cbi5tZW51LWljb24ge1xuICBmbGV4LWdyb3c6IDA7XG4gIGZsZXgtc2hyaW5rOiAwO1xuICBtYXJnaW4tcmlnaHQ6IDAuNXJlbTtcbiAgZm9udC1zaXplOiAxLjI1cmVtO1xufVxuLm1lbnU6bm90KC5tZW51LW5vLWFuaW1hdGlvbikgLm1lbnUtaWNvbiB7XG4gIHRyYW5zaXRpb246IG1hcmdpbi1yaWdodCAwLjNzIGVhc2U7XG59XG5cbi5tZW51LWxpbmsge1xuICBwb3NpdGlvbjogcmVsYXRpdmU7XG4gIGRpc3BsYXk6IGZsZXg7XG4gIGFsaWduLWl0ZW1zOiBjZW50ZXI7XG4gIGZsZXg6IDAgMSBhdXRvO1xuICBtYXJnaW46IDA7XG59XG4ubWVudS1pdGVtLmRpc2FibGVkIC5tZW51LWxpbmsge1xuICBjdXJzb3I6IG5vdC1hbGxvd2VkICFpbXBvcnRhbnQ7XG59XG4ubWVudTpub3QoLm1lbnUtbm8tYW5pbWF0aW9uKSAubWVudS1saW5rIHtcbiAgdHJhbnNpdGlvbi1kdXJhdGlvbjogMC4zcztcbiAgdHJhbnNpdGlvbi1wcm9wZXJ0eTogY29sb3IsIGJhY2tncm91bmQtY29sb3I7XG59XG4ubWVudS1saW5rID4gOm5vdCgubWVudS1pY29uKSB7XG4gIGZsZXg6IDAgMSBhdXRvO1xuICBvcGFjaXR5OiAxO1xufVxuLm1lbnU6bm90KC5tZW51LW5vLWFuaW1hdGlvbikgLm1lbnUtbGluayA+IDpub3QoLm1lbnUtaWNvbikge1xuICB0cmFuc2l0aW9uOiBvcGFjaXR5IDAuM3MgZWFzZS1pbi1vdXQ7XG59XG5cbi5tZW51LXN1YiB7XG4gIGRpc3BsYXk6IG5vbmU7XG4gIGZsZXgtZGlyZWN0aW9uOiBjb2x1bW47XG4gIG1hcmdpbjogMDtcbiAgcGFkZGluZzogMDtcbn1cbi5tZW51Om5vdCgubWVudS1uby1hbmltYXRpb24pIC5tZW51LXN1YiB7XG4gIHRyYW5zaXRpb246IGJhY2tncm91bmQtY29sb3IgMC4zcztcbn1cbi5tZW51LWl0ZW0ub3BlbiA+IC5tZW51LXN1YiB7XG4gIGRpc3BsYXk6IGZsZXg7XG59XG5cbi5tZW51LXRvZ2dsZTo6YWZ0ZXIge1xuICBjb250ZW50OiBcIlwiO1xuICBwb3NpdGlvbjogYWJzb2x1dGU7XG4gIHRvcDogNTAlO1xuICBkaXNwbGF5OiBibG9jaztcbiAgd2lkdGg6IDAuNDJlbTtcbiAgaGVpZ2h0OiAwLjQyZW07XG4gIGJvcmRlcjogMXB4IHNvbGlkO1xuICBib3JkZXItYm90dG9tOiAwO1xuICBib3JkZXItbGVmdDogMDtcbiAgdHJhbnNmb3JtOiB0cmFuc2xhdGVZKC01MCUpIHJvdGF0ZSg0NWRlZyk7XG59XG4ubWVudS1pdGVtLm9wZW46bm90KC5tZW51LWl0ZW0tY2xvc2luZykgPiAubWVudS10b2dnbGU6OmFmdGVyIHtcbiAgdHJhbnNmb3JtOiB0cmFuc2xhdGVZKC01MCUpIHJvdGF0ZSgxMzVkZWcpO1xufVxuLm1lbnU6bm90KC5tZW51LW5vLWFuaW1hdGlvbikgLm1lbnUtdG9nZ2xlOjphZnRlciB7XG4gIHRyYW5zaXRpb24tZHVyYXRpb246IDAuM3M7XG4gIHRyYW5zaXRpb24tcHJvcGVydHk6IC13ZWJraXQtdHJhbnNmb3JtLCB0cmFuc2Zvcm07XG59XG5cbi5tZW51LWRpdmlkZXIge1xuICB3aWR0aDogMTAwJTtcbiAgYm9yZGVyOiAwO1xuICBib3JkZXItdG9wOiAxcHggc29saWQ7XG59XG5cbi5tZW51LXZlcnRpY2FsIHtcbiAgZmxleC1kaXJlY3Rpb246IGNvbHVtbjtcbn1cbi5tZW51LXZlcnRpY2FsOm5vdCgubWVudS1uby1hbmltYXRpb24pIHtcbiAgdHJhbnNpdGlvbjogd2lkdGggMC4zcztcbn1cbi5tZW51LXZlcnRpY2FsLFxuLm1lbnUtdmVydGljYWwgLm1lbnUtYmxvY2ssXG4ubWVudS12ZXJ0aWNhbCAubWVudS1pbm5lciA+IC5tZW51LWl0ZW0sXG4ubWVudS12ZXJ0aWNhbCAubWVudS1pbm5lciA+IC5tZW51LWhlYWRlciB7XG4gIHdpZHRoOiAxNi4yNXJlbTtcbn1cbi5tZW51LXZlcnRpY2FsIC5tZW51LWlubmVyIHtcbiAgZmxleC1kaXJlY3Rpb246IGNvbHVtbjtcbiAgZmxleDogMSAxIGF1dG87XG59XG4ubWVudS12ZXJ0aWNhbCAubWVudS1pbm5lciA+IC5tZW51LWl0ZW0ge1xuICBtYXJnaW46IDAuMDYyNXJlbSAwO1xufVxuLm1lbnUtdmVydGljYWwgLm1lbnUtaW5uZXIgPiAubWVudS1pdGVtIC5tZW51LWxpbmsge1xuICBtYXJnaW46IDByZW0gMXJlbTtcbn1cbi5tZW51LXZlcnRpY2FsIC5tZW51LWl0ZW0gLm1lbnUtbGluayxcbi5tZW51LXZlcnRpY2FsIC5tZW51LWJsb2NrIHtcbiAgcGFkZGluZzogMC42MjVyZW0gMXJlbTtcbn1cbi5tZW51LXZlcnRpY2FsIC5tZW51LWhlYWRlciB7XG4gIG1hcmdpbjogMXJlbSAwIDAuNXJlbSAwO1xuICBwYWRkaW5nOiAwLjYyNXJlbSAycmVtIDAuNjI1cmVtIDJyZW07XG59XG4ubWVudS12ZXJ0aWNhbCAubWVudS1pdGVtIC5tZW51LWxpbmsge1xuICBmb250LXNpemU6IDAuOTM3NXJlbTtcbn1cbi5tZW51LXZlcnRpY2FsIC5tZW51LWl0ZW0uYWN0aXZlOm5vdCgub3BlbikgPiAubWVudS1saW5rIHtcbiAgZm9udC13ZWlnaHQ6IDYwMDtcbn1cbi5tZW51LXZlcnRpY2FsIC5tZW51LWl0ZW0gLm1lbnUtdG9nZ2xlIHtcbiAgcGFkZGluZy1yaWdodDogY2FsYygxcmVtICsgMS4yNmVtKTtcbn1cbi5tZW51LXZlcnRpY2FsIC5tZW51LWl0ZW0gLm1lbnUtdG9nZ2xlOjphZnRlciB7XG4gIHJpZ2h0OiAxcmVtO1xufVxuLm1lbnUtdmVydGljYWwgLm1lbnUtZGl2aWRlciB7XG4gIG1hcmdpbi10b3A6IDAuNjI1cmVtO1xuICBtYXJnaW4tYm90dG9tOiAwLjYyNXJlbTtcbiAgcGFkZGluZzogMDtcbn1cbi5tZW51LXZlcnRpY2FsIC5tZW51LXN1YiB7XG4gIHBhZGRpbmctdG9wOiAwLjMxMjVyZW07XG4gIHBhZGRpbmctYm90dG9tOiAwLjMxMjVyZW07XG59XG4ubWVudS12ZXJ0aWNhbCAubWVudS1zdWIgLm1lbnUtbGluayB7XG4gIHBhZGRpbmctdG9wOiAwLjYyNXJlbTtcbiAgcGFkZGluZy1ib3R0b206IDAuNjI1cmVtO1xufVxuLm1lbnUtdmVydGljYWwgLm1lbnUtaWNvbiB7XG4gIHdpZHRoOiAxLjVyZW07XG59XG4ubWVudS12ZXJ0aWNhbCAubWVudS1zdWIgLm1lbnUtaWNvbiB7XG4gIG1hcmdpbi1yaWdodDogMDtcbn1cbkBtZWRpYSAobWF4LXdpZHRoOiAxMTk5Ljk4cHgpIHtcbiAgLm1lbnUtdmVydGljYWwgLm1lbnUtc3ViIC5tZW51LWljb24ge1xuICAgIGRpc3BsYXk6IG5vbmU7XG4gIH1cbn1cbi5tZW51LXZlcnRpY2FsIC5tZW51LWhvcml6b250YWwtd3JhcHBlciB7XG4gIGZsZXg6IG5vbmU7XG59XG4ubWVudS12ZXJ0aWNhbCAubWVudS1zdWIgLm1lbnUtbGluayB7XG4gIHBhZGRpbmctbGVmdDogM3JlbTtcbn1cbi5tZW51LXZlcnRpY2FsIC5tZW51LXN1YiAubWVudS1zdWIgLm1lbnUtbGluayB7XG4gIHBhZGRpbmctbGVmdDogMy42NXJlbTtcbn1cbi5tZW51LXZlcnRpY2FsIC5tZW51LXN1YiAubWVudS1zdWIgLm1lbnUtc3ViIC5tZW51LWxpbmsge1xuICBwYWRkaW5nLWxlZnQ6IDQuM3JlbTtcbn1cbi5tZW51LXZlcnRpY2FsIC5tZW51LXN1YiAubWVudS1zdWIgLm1lbnUtc3ViIC5tZW51LXN1YiAubWVudS1saW5rIHtcbiAgcGFkZGluZy1sZWZ0OiA0Ljk1cmVtO1xufVxuLm1lbnUtdmVydGljYWwgLm1lbnUtc3ViIC5tZW51LXN1YiAubWVudS1zdWIgLm1lbnUtc3ViIC5tZW51LXN1YiAubWVudS1saW5rIHtcbiAgcGFkZGluZy1sZWZ0OiA1LjZyZW07XG59XG5cbi5tZW51LWNvbGxhcHNlZDpub3QoOmhvdmVyKSB7XG4gIHdpZHRoOiA1LjI1cmVtO1xufVxuLm1lbnUtY29sbGFwc2VkOm5vdCg6aG92ZXIpIC5tZW51LWlubmVyID4gLm1lbnUtaXRlbSB7XG4gIHdpZHRoOiA1LjI1cmVtO1xufVxuLm1lbnUtY29sbGFwc2VkOm5vdCg6aG92ZXIpIC5tZW51LWlubmVyID4gLm1lbnUtaXRlbSA+IC5tZW51LWxpbmsge1xuICBwYWRkaW5nLWxlZnQ6IDFyZW07XG59XG4ubWVudS1jb2xsYXBzZWQ6bm90KDpob3ZlcikgLm1lbnUtaW5uZXIgPiAubWVudS1oZWFkZXIsXG4ubWVudS1jb2xsYXBzZWQ6bm90KDpob3ZlcikgLm1lbnUtYmxvY2sge1xuICBwb3NpdGlvbjogcmVsYXRpdmU7XG4gIG1hcmdpbi1sZWZ0OiAxcmVtO1xuICBwYWRkaW5nLXJpZ2h0OiAxLjVyZW07XG4gIHBhZGRpbmctbGVmdDogMC41cmVtO1xuICB3aWR0aDogMTYuMjVyZW07XG4gIHRleHQtaW5kZW50OiAtOTk5OXB4O1xuICB0ZXh0LW92ZXJmbG93OiBlbGxpcHNpcztcbiAgd2hpdGUtc3BhY2U6IG5vd3JhcDtcbn1cbi5tZW51LWNvbGxhcHNlZDpub3QoOmhvdmVyKSAubWVudS1pbm5lciA+IC5tZW51LWhlYWRlciAubWVudS1oZWFkZXItdGV4dCxcbi5tZW51LWNvbGxhcHNlZDpub3QoOmhvdmVyKSAubWVudS1ibG9jayAubWVudS1oZWFkZXItdGV4dCB7XG4gIG92ZXJmbG93OiBoaWRkZW47XG4gIG9wYWNpdHk6IDA7XG59XG4ubWVudS1jb2xsYXBzZWQ6bm90KDpob3ZlcikgLm1lbnUtaW5uZXIgPiAubWVudS1oZWFkZXI6OmJlZm9yZSxcbi5tZW51LWNvbGxhcHNlZDpub3QoOmhvdmVyKSAubWVudS1ibG9jazo6YmVmb3JlIHtcbiAgY29udGVudDogXCJcIjtcbiAgcG9zaXRpb246IGFic29sdXRlO1xuICBsZWZ0OiAxLjEyNXJlbTtcbiAgZGlzcGxheTogYmxvY2s7XG4gIHdpZHRoOiAxcmVtO1xuICB0ZXh0LWFsaWduOiBjZW50ZXI7XG4gIHRvcDogMS4xODc1cmVtO1xufVxuLm1lbnUtY29sbGFwc2VkOm5vdCg6aG92ZXIpIC5tZW51LWJsb2NrOjpiZWZvcmUge1xuICBib3R0b206IDAuNzVyZW07XG59XG4ubWVudS1jb2xsYXBzZWQ6bm90KDpob3ZlcikgLm1lbnUtaW5uZXIgPiAubWVudS1pdGVtIGRpdjpub3QoLm1lbnUtYmxvY2spIHtcbiAgb3ZlcmZsb3c6IGhpZGRlbjtcbiAgdGV4dC1vdmVyZmxvdzogZWxsaXBzaXM7XG4gIHdoaXRlLXNwYWNlOiBub3dyYXA7XG4gIG9wYWNpdHk6IDA7XG59XG4ubWVudS1jb2xsYXBzZWQ6bm90KDpob3ZlcikgLm1lbnUtaW5uZXIgPiAubWVudS1pdGVtID4gLm1lbnUtc3ViLFxuLm1lbnUtY29sbGFwc2VkOm5vdCg6aG92ZXIpIC5tZW51LWlubmVyID4gLm1lbnUtaXRlbS5vcGVuID4gLm1lbnUtc3ViIHtcbiAgZGlzcGxheTogbm9uZTtcbn1cbi5tZW51LWNvbGxhcHNlZDpub3QoOmhvdmVyKSAubWVudS1pbm5lciA+IC5tZW51LWl0ZW0gPiAubWVudS10b2dnbGU6OmFmdGVyIHtcbiAgZGlzcGxheTogbm9uZTtcbn1cbi5tZW51LWNvbGxhcHNlZDpub3QoOmhvdmVyKSAubWVudS1pbm5lciA+IC5tZW51LWl0ZW0gPiAubWVudS1saW5rIC5tZW51LWljb24ge1xuICBtYXJnaW4tbGVmdDogLTJyZW07XG4gIHdpZHRoOiA1LjI1cmVtO1xuICB0ZXh0LWFsaWduOiBjZW50ZXI7XG4gIG1hcmdpbi1yaWdodDogMDtcbn1cblxuLmxheW91dC1jb250YWluZXIge1xuICBtaW4taGVpZ2h0OiAxMDB2aDtcbn1cblxuLmxheW91dC13cmFwcGVyLFxuLmxheW91dC1jb250YWluZXIge1xuICB3aWR0aDogMTAwJTtcbiAgZGlzcGxheTogZmxleDtcbiAgZmxleDogMSAxIGF1dG87XG4gIGFsaWduLWl0ZW1zOiBzdHJldGNoO1xufVxuXG4ubGF5b3V0LXBhZ2UsXG4uY29udGVudC13cmFwcGVyLFxuLmNvbnRlbnQtd3JhcHBlciA+ICosXG4ubGF5b3V0LW1lbnUge1xuICBtaW4taGVpZ2h0OiAxcHg7XG59XG5cbi5sYXlvdXQtbmF2YmFyLFxuLmNvbnRlbnQtZm9vdGVyIHtcbiAgZmxleDogMCAwIGF1dG87XG59XG5cbi5sYXlvdXQtcGFnZSB7XG4gIGRpc3BsYXk6IGZsZXg7XG4gIGZsZXg6IDEgMSBhdXRvO1xuICBhbGlnbi1pdGVtczogc3RyZXRjaDtcbiAgcGFkZGluZzogMDtcbn1cbi5sYXlvdXQtd2l0aG91dC1tZW51IC5sYXlvdXQtcGFnZSB7XG4gIHBhZGRpbmctcmlnaHQ6IDAgIWltcG9ydGFudDtcbiAgcGFkZGluZy1sZWZ0OiAwICFpbXBvcnRhbnQ7XG59XG5cbi5jb250ZW50LXdyYXBwZXIge1xuICBkaXNwbGF5OiBmbGV4O1xuICBhbGlnbi1pdGVtczogc3RyZXRjaDtcbiAgZmxleDogMSAxIGF1dG87XG4gIGZsZXgtZGlyZWN0aW9uOiBjb2x1bW47XG4gIGp1c3RpZnktY29udGVudDogc3BhY2UtYmV0d2Vlbjtcbn1cblxuLmNvbnRlbnQtYmFja2Ryb3Age1xuICBwb3NpdGlvbjogZml4ZWQ7XG4gIHRvcDogMDtcbiAgbGVmdDogMDtcbiAgei1pbmRleDogMTtcbiAgd2lkdGg6IDEwMHZ3O1xuICBoZWlnaHQ6IDEwMHZoO1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjNDM1OTcxO1xufVxuLmNvbnRlbnQtYmFja2Ryb3AuZmFkZSB7XG4gIG9wYWNpdHk6IDA7XG59XG4uY29udGVudC1iYWNrZHJvcC5zaG93IHtcbiAgb3BhY2l0eTogMC41O1xufVxuLmxheW91dC1tZW51LWZpeGVkIC5jb250ZW50LWJhY2tkcm9wIHtcbiAgei1pbmRleDogMTA7XG59XG4uY29udGVudC1iYWNrZHJvcC5mYWRlIHtcbiAgei1pbmRleDogLTE7XG59XG5cbi5sYXlvdXQtbmF2YmFyIHtcbiAgcG9zaXRpb246IHJlbGF0aXZlO1xuICBwYWRkaW5nLXRvcDogMC4yNXJlbTtcbiAgcGFkZGluZy1ib3R0b206IDAuMnJlbTtcbiAgaGVpZ2h0OiAzLjg3NXJlbTtcbiAgZmxleC13cmFwOiBub3dyYXA7XG4gIGNvbG9yOiAjNjk3YThkO1xuICB6LWluZGV4OiAyO1xufVxuLmxheW91dC1uYXZiYXIgLm5hdmJhciB7XG4gIHRyYW5zZm9ybTogdHJhbnNsYXRlM2QoMCwgMCwgMCk7XG59XG4ubGF5b3V0LW5hdmJhciAubmF2YmFyLW5hdi1yaWdodCB7XG4gIGZsZXgtYmFzaXM6IDEwMCU7XG59XG4ubGF5b3V0LW5hdmJhciAubmF2YmFyLXNlYXJjaC13cmFwcGVyIC5zZWFyY2gtaW5wdXQsXG4ubGF5b3V0LW5hdmJhciAubmF2YmFyLXNlYXJjaC13cmFwcGVyIC5pbnB1dC1ncm91cC10ZXh0IHtcbiAgYmFja2dyb3VuZC1jb2xvcjogdHJhbnNwYXJlbnQ7XG59XG4ubGF5b3V0LW5hdmJhci5uYXZiYXItZGV0YWNoZWQge1xuICB3aWR0aDogY2FsYygxMDAlIC0gKDEuNjI1cmVtICogMikpO1xuICBtYXJnaW46IDAuNzVyZW0gYXV0byAwO1xuICBib3JkZXItcmFkaXVzOiAwLjM3NXJlbTtcbiAgcGFkZGluZzogMCAxLjVyZW07XG59XG4ubGF5b3V0LW5hdmJhci5uYXZiYXItZGV0YWNoZWQuY29udGFpbmVyLXh4bCB7XG4gIG1heC13aWR0aDogY2FsYygxNDQwcHggLSBjYWxjKDEuNjI1cmVtICogMikpO1xufVxuLmxheW91dC1uYXZiYXItZml4ZWQgLmxheW91dC1uYXZiYXIubmF2YmFyLWRldGFjaGVkIHtcbiAgd2lkdGg6IGNhbGMoMTAwJSAtIGNhbGMoMS42MjVyZW0gKiAyKSAtIDE2LjI1cmVtKTtcbn1cbkBtZWRpYSAobWF4LXdpZHRoOiAxMTk5Ljk4cHgpIHtcbiAgLmxheW91dC1uYXZiYXItZml4ZWQgLmxheW91dC1uYXZiYXIubmF2YmFyLWRldGFjaGVkIHtcbiAgICB3aWR0aDogY2FsYygxMDAlIC0gKDEuNjI1cmVtICogMikpICFpbXBvcnRhbnQ7XG4gIH1cbn1cbkBtZWRpYSAobWF4LXdpZHRoOiA5OTEuOThweCkge1xuICAubGF5b3V0LW5hdmJhci1maXhlZCAubGF5b3V0LW5hdmJhci5uYXZiYXItZGV0YWNoZWQge1xuICAgIHdpZHRoOiBjYWxjKDEwMCUgLSAoMXJlbSAqIDIpKSAhaW1wb3J0YW50O1xuICB9XG59XG4ubGF5b3V0LW5hdmJhci1maXhlZC5sYXlvdXQtbWVudS1jb2xsYXBzZWQgLmxheW91dC1uYXZiYXIubmF2YmFyLWRldGFjaGVkIHtcbiAgd2lkdGg6IGNhbGMoMTAwJSAtIGNhbGMoMS42MjVyZW0gKiAyKSAtIDUuMjVyZW0pO1xufVxuQG1lZGlhIChtYXgtd2lkdGg6IDExOTkuOThweCkge1xuICAubGF5b3V0LW5hdmJhci5uYXZiYXItZGV0YWNoZWQge1xuICAgIHdpZHRoOiBjYWxjKDEwMHZ3IC0gKDEwMHZ3IC0gMTAwJSkgLSAoMS42MjVyZW0gKiAyKSkgIWltcG9ydGFudDtcbiAgfVxufVxuQG1lZGlhIChtYXgtd2lkdGg6IDk5MS45OHB4KSB7XG4gIC5sYXlvdXQtbmF2YmFyLm5hdmJhci1kZXRhY2hlZCB7XG4gICAgd2lkdGg6IGNhbGMoMTAwdncgLSAoMTAwdncgLSAxMDAlKSAtICgxcmVtICogMikpICFpbXBvcnRhbnQ7XG4gIH1cbn1cbi5sYXlvdXQtbWVudS1jb2xsYXBzZWQgLmxheW91dC1uYXZiYXIubmF2YmFyLWRldGFjaGVkLCAubGF5b3V0LXdpdGhvdXQtbWVudSAubGF5b3V0LW5hdmJhci5uYXZiYXItZGV0YWNoZWQge1xuICB3aWR0aDogY2FsYygxMDAlIC0gKDEuNjI1cmVtICogMikpO1xufVxuLmxheW91dC1uYXZiYXIgLnNlYXJjaC1pbnB1dC13cmFwcGVyIC5zZWFyY2gtdG9nZ2xlciB7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgdG9wOiAxLjI1cmVtO1xuICByaWdodDogMXJlbTtcbiAgei1pbmRleDogMTtcbn1cbi5sYXlvdXQtbmF2YmFyIC5zZWFyY2gtaW5wdXQtd3JhcHBlciAuc2VhcmNoLWlucHV0IHtcbiAgaGVpZ2h0OiAxMDAlO1xuICBib3gtc2hhZG93OiBub25lO1xufVxuLmxheW91dC1uYXZiYXJbY2xhc3MqPWJnLV06bm90KC5iZy1uYXZiYXItdGhlbWUpIC5uYXYtaXRlbSAuaW5wdXQtZ3JvdXAtdGV4dCxcbi5sYXlvdXQtbmF2YmFyW2NsYXNzKj1iZy1dOm5vdCguYmctbmF2YmFyLXRoZW1lKSAubmF2LWl0ZW0gLmRyb3Bkb3duLXRvZ2dsZSB7XG4gIGNvbG9yOiAjZmZmO1xufVxuQG1lZGlhIChtYXgtd2lkdGg6IDExOTkuOThweCkge1xuICAubGF5b3V0LW5hdmJhciAubmF2YmFyLW5hdiAubmF2LWl0ZW0uZHJvcGRvd24gLmRyb3Bkb3duLW1lbnUge1xuICAgIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgfVxuICAubGF5b3V0LW5hdmJhciAubmF2YmFyLW5hdiAubmF2LWl0ZW0uZHJvcGRvd24gLmRyb3Bkb3duLW1lbnUgLmxhc3QtbG9naW4ge1xuICAgIHdoaXRlLXNwYWNlOiBub3dyYXA7XG4gIH1cbn1cbkBtZWRpYSAobWF4LXdpZHRoOiA3NjcuOThweCkge1xuICAubGF5b3V0LW5hdmJhciAubmF2YmFyLW5hdiAubmF2LWl0ZW0uZHJvcGRvd24ge1xuICAgIHBvc2l0aW9uOiBzdGF0aWM7XG4gICAgZmxvYXQ6IGxlZnQ7XG4gIH1cbiAgLmxheW91dC1uYXZiYXIgLm5hdmJhci1uYXYgLm5hdi1pdGVtLmRyb3Bkb3duIC5iYWRnZS1ub3RpZmljYXRpb25zIHtcbiAgICB0b3A6IGF1dG87XG4gIH1cbiAgLmxheW91dC1uYXZiYXIgLm5hdmJhci1uYXYgLm5hdi1pdGVtLmRyb3Bkb3duIC5kcm9wZG93bi1tZW51IHtcbiAgICBwb3NpdGlvbjogYWJzb2x1dGU7XG4gICAgbGVmdDogMC45cmVtO1xuICAgIG1pbi13aWR0aDogYXV0bztcbiAgICB3aWR0aDogOTIlO1xuICB9XG59XG5cbkBtZWRpYSAobWF4LXdpZHRoOiAxMTk5Ljk4cHgpIHtcbiAgLmxheW91dC1uYXZiYXIge1xuICAgIHotaW5kZXg6IDEwODA7XG4gIH1cbn1cbi5sYXlvdXQtbWVudSB7XG4gIHBvc2l0aW9uOiByZWxhdGl2ZTtcbiAgZmxleDogMSAwIGF1dG87XG59XG4ubGF5b3V0LW1lbnUgLm1lbnUge1xuICB0cmFuc2Zvcm06IHRyYW5zbGF0ZTNkKDAsIDAsIDApO1xufVxuLmxheW91dC1tZW51IC5tZW51LXZlcnRpY2FsIHtcbiAgaGVpZ2h0OiAxMDAlO1xufVxuXG4ubGF5b3V0LWNvbnRlbnQtbmF2YmFyIC5sYXlvdXQtcGFnZSB7XG4gIGZsZXgtYmFzaXM6IDEwMCU7XG4gIGZsZXgtZGlyZWN0aW9uOiBjb2x1bW47XG4gIHdpZHRoOiAwO1xuICBtaW4td2lkdGg6IDA7XG4gIG1heC13aWR0aDogMTAwJTtcbn1cbi5sYXlvdXQtY29udGVudC1uYXZiYXIgLmNvbnRlbnQtd3JhcHBlciB7XG4gIHdpZHRoOiAxMDAlO1xufVxuXG5AbWVkaWEgKG1pbi13aWR0aDogMTIwMHB4KSB7XG4gIC5sYXlvdXQtbWVudS1maXhlZCAubGF5b3V0LW1lbnUsXG4ubGF5b3V0LW1lbnUtZml4ZWQtb2ZmY2FudmFzIC5sYXlvdXQtbWVudSB7XG4gICAgcG9zaXRpb246IGZpeGVkO1xuICAgIHRvcDogMDtcbiAgICBib3R0b206IDA7XG4gICAgbGVmdDogMDtcbiAgICBtYXJnaW4tcmlnaHQ6IDAgIWltcG9ydGFudDtcbiAgICBtYXJnaW4tbGVmdDogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgLmxheW91dC1tZW51LWZpeGVkOm5vdCgubGF5b3V0LW1lbnUtY29sbGFwc2VkKSAubGF5b3V0LXBhZ2UsXG4ubGF5b3V0LW1lbnUtZml4ZWQtb2ZmY2FudmFzOm5vdCgubGF5b3V0LW1lbnUtY29sbGFwc2VkKSAubGF5b3V0LXBhZ2Uge1xuICAgIHBhZGRpbmctbGVmdDogMTYuMjVyZW07XG4gIH1cbn1cbmh0bWw6bm90KC5sYXlvdXQtbmF2YmFyLWZpeGVkKTpub3QoLmxheW91dC1tZW51LWZpeGVkKTpub3QoLmxheW91dC1tZW51LWZpeGVkLW9mZmNhbnZhcykgLmxheW91dC1wYWdlLFxuaHRtbDpub3QoLmxheW91dC1uYXZiYXItZml4ZWQpIC5sYXlvdXQtY29udGVudC1uYXZiYXIgLmxheW91dC1wYWdlIHtcbiAgcGFkZGluZy10b3A6IDAgIWltcG9ydGFudDtcbn1cblxuaHRtbDpub3QoLmxheW91dC1mb290ZXItZml4ZWQpIC5jb250ZW50LXdyYXBwZXIge1xuICBwYWRkaW5nLWJvdHRvbTogMCAhaW1wb3J0YW50O1xufVxuXG5AbWVkaWEgKG1heC13aWR0aDogMTE5OS45OHB4KSB7XG4gIC5sYXlvdXQtbWVudS1maXhlZCAubGF5b3V0LXdyYXBwZXIubGF5b3V0LW5hdmJhci1mdWxsIC5sYXlvdXQtbWVudSxcbi5sYXlvdXQtbWVudS1maXhlZC1vZmZjYW52YXMgLmxheW91dC13cmFwcGVyLmxheW91dC1uYXZiYXItZnVsbCAubGF5b3V0LW1lbnUge1xuICAgIHRvcDogMCAhaW1wb3J0YW50O1xuICB9XG5cbiAgaHRtbDpub3QoLmxheW91dC1uYXZiYXItZml4ZWQpIC5sYXlvdXQtbmF2YmFyLWZ1bGwgLmxheW91dC1wYWdlIHtcbiAgICBwYWRkaW5nLXRvcDogMCAhaW1wb3J0YW50O1xuICB9XG59XG4ubGF5b3V0LW5hdmJhci1maXhlZCAubGF5b3V0LW5hdmJhciB7XG4gIHBvc2l0aW9uOiBmaXhlZDtcbiAgdG9wOiAwO1xuICByaWdodDogMDtcbiAgbGVmdDogMDtcbn1cblxuQG1lZGlhIChtaW4td2lkdGg6IDEyMDBweCkge1xuICAubGF5b3V0LW1lbnUtZml4ZWQgLmxheW91dC1uYXZiYXItZnVsbCAubGF5b3V0LW5hdmJhcixcbi5sYXlvdXQtbWVudS1maXhlZC1vZmZjYW52YXMgLmxheW91dC1uYXZiYXItZnVsbCAubGF5b3V0LW5hdmJhciB7XG4gICAgcG9zaXRpb246IGZpeGVkO1xuICAgIHRvcDogMDtcbiAgICByaWdodDogMDtcbiAgICBsZWZ0OiAwO1xuICB9XG5cbiAgLmxheW91dC1uYXZiYXItZml4ZWQ6bm90KC5sYXlvdXQtbWVudS1jb2xsYXBzZWQpIC5sYXlvdXQtY29udGVudC1uYXZiYXI6bm90KC5sYXlvdXQtd2l0aG91dC1tZW51KSAubGF5b3V0LW5hdmJhcixcbi5sYXlvdXQtbWVudS1maXhlZC5sYXlvdXQtbmF2YmFyLWZpeGVkOm5vdCgubGF5b3V0LW1lbnUtY29sbGFwc2VkKSAubGF5b3V0LWNvbnRlbnQtbmF2YmFyOm5vdCgubGF5b3V0LXdpdGhvdXQtbWVudSkgLmxheW91dC1uYXZiYXIsXG4ubGF5b3V0LW1lbnUtZml4ZWQtb2ZmY2FudmFzLmxheW91dC1uYXZiYXItZml4ZWQ6bm90KC5sYXlvdXQtbWVudS1jb2xsYXBzZWQpIC5sYXlvdXQtY29udGVudC1uYXZiYXI6bm90KC5sYXlvdXQtd2l0aG91dC1tZW51KSAubGF5b3V0LW5hdmJhciB7XG4gICAgbGVmdDogMTYuMjVyZW07XG4gIH1cbn1cbi5sYXlvdXQtZm9vdGVyLWZpeGVkIC5jb250ZW50LWZvb3RlciB7XG4gIHBvc2l0aW9uOiBmaXhlZDtcbiAgYm90dG9tOiAwO1xuICBsZWZ0OiAwO1xuICByaWdodDogMDtcbn1cblxuQG1lZGlhIChtaW4td2lkdGg6IDEyMDBweCkge1xuICAubGF5b3V0LWZvb3Rlci1maXhlZDpub3QoLmxheW91dC1tZW51LWNvbGxhcHNlZCkgLmxheW91dC13cmFwcGVyOm5vdCgubGF5b3V0LXdpdGhvdXQtbWVudSkgLmNvbnRlbnQtZm9vdGVyIHtcbiAgICBsZWZ0OiAxNi4yNXJlbTtcbiAgfVxufVxuQG1lZGlhIChtYXgtd2lkdGg6IDExOTkuOThweCkge1xuICAubGF5b3V0LW1lbnUge1xuICAgIHBvc2l0aW9uOiBmaXhlZCAhaW1wb3J0YW50O1xuICAgIHRvcDogMCAhaW1wb3J0YW50O1xuICAgIGhlaWdodDogMTAwJSAhaW1wb3J0YW50O1xuICAgIGxlZnQ6IDAgIWltcG9ydGFudDtcbiAgICBtYXJnaW4tcmlnaHQ6IDAgIWltcG9ydGFudDtcbiAgICBtYXJnaW4tbGVmdDogMCAhaW1wb3J0YW50O1xuICAgIHRyYW5zZm9ybTogdHJhbnNsYXRlM2QoLTEwMCUsIDAsIDApO1xuICAgIHdpbGwtY2hhbmdlOiB0cmFuc2Zvcm0sIC13ZWJraXQtdHJhbnNmb3JtO1xuICB9XG4gIC5sYXlvdXQtbWVudS1leHBhbmRlZCAubGF5b3V0LW1lbnUge1xuICAgIHRyYW5zZm9ybTogdHJhbnNsYXRlM2QoMCwgMCwgMCkgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5sYXlvdXQtbWVudS1leHBhbmRlZCBib2R5IHtcbiAgICBvdmVyZmxvdzogaGlkZGVuO1xuICB9XG5cbiAgLmxheW91dC1vdmVybGF5IHtcbiAgICBwb3NpdGlvbjogZml4ZWQ7XG4gICAgdG9wOiAwO1xuICAgIHJpZ2h0OiAwO1xuICAgIGhlaWdodDogMTAwJSAhaW1wb3J0YW50O1xuICAgIGxlZnQ6IDA7XG4gICAgZGlzcGxheTogbm9uZTtcbiAgICBiYWNrZ3JvdW5kOiAjNDM1OTcxO1xuICAgIG9wYWNpdHk6IDAuNTtcbiAgICBjdXJzb3I6IHBvaW50ZXI7XG4gIH1cbiAgLmxheW91dC1tZW51LWV4cGFuZGVkIC5sYXlvdXQtb3ZlcmxheSB7XG4gICAgZGlzcGxheTogYmxvY2s7XG4gIH1cblxuICAubGF5b3V0LW1lbnUtMTAwdmggLmxheW91dC1tZW51LFxuLmxheW91dC1tZW51LTEwMHZoIC5sYXlvdXQtb3ZlcmxheSB7XG4gICAgaGVpZ2h0OiAxMDB2aCAhaW1wb3J0YW50O1xuICB9XG59XG4ubGF5b3V0LW5hdmJhci1maXhlZCBib2R5Om5vdCgubW9kYWwtb3BlbikgLmxheW91dC1uYXZiYXItZnVsbCAubGF5b3V0LW5hdmJhcixcbi5sYXlvdXQtbWVudS1maXhlZCBib2R5Om5vdCgubW9kYWwtb3BlbikgLmxheW91dC1uYXZiYXItZnVsbCAubGF5b3V0LW5hdmJhcixcbi5sYXlvdXQtbWVudS1maXhlZC1vZmZjYW52YXMgYm9keTpub3QoLm1vZGFsLW9wZW4pIC5sYXlvdXQtbmF2YmFyLWZ1bGwgLmxheW91dC1uYXZiYXIge1xuICB6LWluZGV4OiAxMDgwO1xufVxuLmxheW91dC1uYXZiYXItZml4ZWQgYm9keTpub3QoLm1vZGFsLW9wZW4pIC5sYXlvdXQtY29udGVudC1uYXZiYXIgLmxheW91dC1uYXZiYXIsXG4ubGF5b3V0LW1lbnUtZml4ZWQgYm9keTpub3QoLm1vZGFsLW9wZW4pIC5sYXlvdXQtY29udGVudC1uYXZiYXIgLmxheW91dC1uYXZiYXIsXG4ubGF5b3V0LW1lbnUtZml4ZWQtb2ZmY2FudmFzIGJvZHk6bm90KC5tb2RhbC1vcGVuKSAubGF5b3V0LWNvbnRlbnQtbmF2YmFyIC5sYXlvdXQtbmF2YmFyIHtcbiAgei1pbmRleDogMTA3NTtcbn1cblxuLmxheW91dC1mb290ZXItZml4ZWQgLmNvbnRlbnQtZm9vdGVyIHtcbiAgei1pbmRleDogMTAzMDtcbn1cblxuQG1lZGlhIChtYXgtd2lkdGg6IDExOTkuOThweCkge1xuICAubGF5b3V0LW1lbnUge1xuICAgIHotaW5kZXg6IDExMDA7XG4gIH1cblxuICAubGF5b3V0LW92ZXJsYXkge1xuICAgIHotaW5kZXg6IDEwOTk7XG4gIH1cbn1cbkBtZWRpYSAobWluLXdpZHRoOiAxMjAwcHgpIHtcbiAgLmxheW91dC1uYXZiYXItZnVsbCAubGF5b3V0LW5hdmJhciB7XG4gICAgei1pbmRleDogMTA7XG4gIH1cbiAgLmxheW91dC1uYXZiYXItZnVsbCAubGF5b3V0LW1lbnUge1xuICAgIHotaW5kZXg6IDk7XG4gIH1cblxuICAubGF5b3V0LWNvbnRlbnQtbmF2YmFyIC5sYXlvdXQtbmF2YmFyIHtcbiAgICB6LWluZGV4OiA5O1xuICB9XG4gIC5sYXlvdXQtY29udGVudC1uYXZiYXIgLmxheW91dC1tZW51IHtcbiAgICB6LWluZGV4OiAxMDtcbiAgfVxuXG4gIC5sYXlvdXQtbWVudS1maXhlZCBib2R5Om5vdCgubW9kYWwtb3BlbikgLmxheW91dC1uYXZiYXItZnVsbCAubGF5b3V0LW1lbnUsXG4ubGF5b3V0LW1lbnUtZml4ZWQtb2ZmY2FudmFzIGJvZHk6bm90KC5tb2RhbC1vcGVuKSAubGF5b3V0LW5hdmJhci1mdWxsIC5sYXlvdXQtbWVudSB7XG4gICAgei1pbmRleDogMTA3NTtcbiAgfVxuXG4gIC5sYXlvdXQtbmF2YmFyLWZpeGVkIGJvZHk6bm90KC5tb2RhbC1vcGVuKSAubGF5b3V0LWNvbnRlbnQtbmF2YmFyIC5sYXlvdXQtbWVudSxcbi5sYXlvdXQtbWVudS1maXhlZCBib2R5Om5vdCgubW9kYWwtb3BlbikgLmxheW91dC1jb250ZW50LW5hdmJhciAubGF5b3V0LW1lbnUsXG4ubGF5b3V0LW1lbnUtZml4ZWQtb2ZmY2FudmFzIGJvZHk6bm90KC5tb2RhbC1vcGVuKSAubGF5b3V0LWNvbnRlbnQtbmF2YmFyIC5sYXlvdXQtbWVudSB7XG4gICAgei1pbmRleDogMTA4MDtcbiAgfVxufVxuLmxheW91dC1tZW51LWxpbmstbm8tdHJhbnNpdGlvbiAubGF5b3V0LW1lbnUgLm1lbnUtbGluayxcbi5sYXlvdXQtbWVudS1saW5rLW5vLXRyYW5zaXRpb24gLmxheW91dC1tZW51LWhvcml6b250YWwgLm1lbnUtbGluayB7XG4gIHRyYW5zaXRpb246IG5vbmUgIWltcG9ydGFudDtcbiAgYW5pbWF0aW9uOiBub25lICFpbXBvcnRhbnQ7XG59XG5cbi5sYXlvdXQtbm8tdHJhbnNpdGlvbiAubGF5b3V0LW1lbnUsIC5sYXlvdXQtbm8tdHJhbnNpdGlvbiAubGF5b3V0LW1lbnUgLm1lbnUsIC5sYXlvdXQtbm8tdHJhbnNpdGlvbiAubGF5b3V0LW1lbnUgLm1lbnUtaXRlbSxcbi5sYXlvdXQtbm8tdHJhbnNpdGlvbiAubGF5b3V0LW1lbnUtaG9yaXpvbnRhbCxcbi5sYXlvdXQtbm8tdHJhbnNpdGlvbiAubGF5b3V0LW1lbnUtaG9yaXpvbnRhbCAubWVudSxcbi5sYXlvdXQtbm8tdHJhbnNpdGlvbiAubGF5b3V0LW1lbnUtaG9yaXpvbnRhbCAubWVudS1pdGVtIHtcbiAgdHJhbnNpdGlvbjogbm9uZSAhaW1wb3J0YW50O1xuICBhbmltYXRpb246IG5vbmUgIWltcG9ydGFudDtcbn1cblxuQG1lZGlhIChtYXgtd2lkdGg6IDExOTkuOThweCkge1xuICAubGF5b3V0LXRyYW5zaXRpb25pbmcgLmxheW91dC1vdmVybGF5IHtcbiAgICBhbmltYXRpb246IG1lbnVBbmltYXRpb24gMC4zcztcbiAgfVxuICAubGF5b3V0LXRyYW5zaXRpb25pbmcgLmxheW91dC1tZW51IHtcbiAgICB0cmFuc2l0aW9uLWR1cmF0aW9uOiAwLjNzO1xuICAgIHRyYW5zaXRpb24tcHJvcGVydHk6IHRyYW5zZm9ybSwgLXdlYmtpdC10cmFuc2Zvcm07XG4gIH1cbn1cbkBtZWRpYSAobWluLXdpZHRoOiAxMjAwcHgpIHtcbiAgLmxheW91dC1tZW51LWNvbGxhcHNlZDpub3QoLmxheW91dC10cmFuc2l0aW9uaW5nKTpub3QoLmxheW91dC1tZW51LW9mZmNhbnZhcyk6bm90KC5sYXlvdXQtbWVudS1maXhlZCk6bm90KC5sYXlvdXQtbWVudS1maXhlZC1vZmZjYW52YXMpIC5sYXlvdXQtbWVudSB7XG4gICAgdHJhbnNpdGlvbi1kdXJhdGlvbjogMC4zcztcbiAgICB0cmFuc2l0aW9uLXByb3BlcnR5OiBtYXJnaW4tbGVmdCwgbWFyZ2luLXJpZ2h0LCB3aWR0aDtcbiAgfVxuXG4gIC5sYXlvdXQtdHJhbnNpdGlvbmluZy5sYXlvdXQtbWVudS1vZmZjYW52YXMgLmxheW91dC1tZW51IHtcbiAgICB0cmFuc2l0aW9uLWR1cmF0aW9uOiAwLjNzO1xuICAgIHRyYW5zaXRpb24tcHJvcGVydHk6IG1hcmdpbi1sZWZ0LCBtYXJnaW4tcmlnaHQsIHRyYW5zZm9ybSwgLXdlYmtpdC10cmFuc2Zvcm07XG4gIH1cbiAgLmxheW91dC10cmFuc2l0aW9uaW5nLmxheW91dC1tZW51LWZpeGVkIC5sYXlvdXQtcGFnZSwgLmxheW91dC10cmFuc2l0aW9uaW5nLmxheW91dC1tZW51LWZpeGVkLW9mZmNhbnZhcyAubGF5b3V0LXBhZ2Uge1xuICAgIHRyYW5zaXRpb24tZHVyYXRpb246IDAuM3M7XG4gICAgdHJhbnNpdGlvbi1wcm9wZXJ0eTogcGFkZGluZy1sZWZ0LCBwYWRkaW5nLXJpZ2h0O1xuICB9XG4gIC5sYXlvdXQtdHJhbnNpdGlvbmluZy5sYXlvdXQtbWVudS1maXhlZCAubGF5b3V0LW1lbnUge1xuICAgIHRyYW5zaXRpb246IHdpZHRoIDAuM3M7XG4gIH1cbiAgLmxheW91dC10cmFuc2l0aW9uaW5nLmxheW91dC1tZW51LWZpeGVkLW9mZmNhbnZhcyAubGF5b3V0LW1lbnUge1xuICAgIHRyYW5zaXRpb24tZHVyYXRpb246IDAuM3M7XG4gICAgdHJhbnNpdGlvbi1wcm9wZXJ0eTogdHJhbnNmb3JtLCAtd2Via2l0LXRyYW5zZm9ybTtcbiAgfVxuICAubGF5b3V0LXRyYW5zaXRpb25pbmcubGF5b3V0LW5hdmJhci1maXhlZCAubGF5b3V0LWNvbnRlbnQtbmF2YmFyIC5sYXlvdXQtbmF2YmFyLCAubGF5b3V0LXRyYW5zaXRpb25pbmcubGF5b3V0LWZvb3Rlci1maXhlZCAuY29udGVudC1mb290ZXIge1xuICAgIHRyYW5zaXRpb24tZHVyYXRpb246IDAuM3M7XG4gICAgdHJhbnNpdGlvbi1wcm9wZXJ0eTogbGVmdCwgcmlnaHQ7XG4gIH1cbiAgLmxheW91dC10cmFuc2l0aW9uaW5nOm5vdCgubGF5b3V0LW1lbnUtb2ZmY2FudmFzKTpub3QoLmxheW91dC1tZW51LWZpeGVkKTpub3QoLmxheW91dC1tZW51LWZpeGVkLW9mZmNhbnZhcykgLmxheW91dC1tZW51IHtcbiAgICB0cmFuc2l0aW9uLWR1cmF0aW9uOiAwLjNzO1xuICAgIHRyYW5zaXRpb24tcHJvcGVydHk6IG1hcmdpbi1sZWZ0LCBtYXJnaW4tcmlnaHQsIHdpZHRoO1xuICB9XG59XG5AbWVkaWEgYWxsIGFuZCAoLW1zLWhpZ2gtY29udHJhc3Q6IG5vbmUpLCAoLW1zLWhpZ2gtY29udHJhc3Q6IGFjdGl2ZSkge1xuICAubWVudSxcbi5sYXlvdXQtbWVudSxcbi5sYXlvdXQtcGFnZSxcbi5sYXlvdXQtbmF2YmFyLFxuLmNvbnRlbnQtZm9vdGVyIHtcbiAgICB0cmFuc2l0aW9uOiBub25lICFpbXBvcnRhbnQ7XG4gICAgdHJhbnNpdGlvbi1kdXJhdGlvbjogMHMgIWltcG9ydGFudDtcbiAgfVxuXG4gIC5sYXlvdXQtb3ZlcmxheSB7XG4gICAgYW5pbWF0aW9uOiBub25lICFpbXBvcnRhbnQ7XG4gIH1cbn1cbkAtd2Via2l0LWtleWZyYW1lcyBtZW51QW5pbWF0aW9uIHtcbiAgMCUge1xuICAgIG9wYWNpdHk6IDA7XG4gIH1cbiAgMTAwJSB7XG4gICAgb3BhY2l0eTogMC41O1xuICB9XG59XG5ALW1vei1rZXlmcmFtZXMgbWVudUFuaW1hdGlvbiB7XG4gIDAlIHtcbiAgICBvcGFjaXR5OiAwO1xuICB9XG4gIDEwMCUge1xuICAgIG9wYWNpdHk6IDAuNTtcbiAgfVxufVxuQGtleWZyYW1lcyBtZW51QW5pbWF0aW9uIHtcbiAgMCUge1xuICAgIG9wYWNpdHk6IDA7XG4gIH1cbiAgMTAwJSB7XG4gICAgb3BhY2l0eTogMC41O1xuICB9XG59XG4uYXBwLWJyYW5kIHtcbiAgZGlzcGxheTogZmxleDtcbiAgZmxleC1ncm93OiAwO1xuICBmbGV4LXNocmluazogMDtcbiAgb3ZlcmZsb3c6IGhpZGRlbjtcbiAgbGluZS1oZWlnaHQ6IDE7XG4gIG1pbi1oZWlnaHQ6IDFweDtcbiAgYWxpZ24taXRlbXM6IGNlbnRlcjtcbn1cblxuLmFwcC1icmFuZC1saW5rIHtcbiAgZGlzcGxheTogZmxleDtcbiAgYWxpZ24taXRlbXM6IGNlbnRlcjtcbn1cblxuLmFwcC1icmFuZC1sb2dvIHtcbiAgZGlzcGxheTogYmxvY2s7XG4gIGZsZXgtZ3JvdzogMDtcbiAgZmxleC1zaHJpbms6IDA7XG4gIG92ZXJmbG93OiBoaWRkZW47XG4gIG1pbi1oZWlnaHQ6IDFweDtcbn1cbi5hcHAtYnJhbmQtbG9nbyBpbWcsXG4uYXBwLWJyYW5kLWxvZ28gc3ZnIHtcbiAgZGlzcGxheTogYmxvY2s7XG59XG5cbi5hcHAtYnJhbmQtdGV4dCB7XG4gIGZsZXgtc2hyaW5rOiAwO1xuICBvcGFjaXR5OiAxO1xuICB0cmFuc2l0aW9uOiBvcGFjaXR5IDAuMTVzIGVhc2UtaW4tb3V0O1xufVxuXG4uYXBwLWJyYW5kLWltZy1jb2xsYXBzZWQge1xuICBkaXNwbGF5OiBub25lO1xufVxuXG4ubWVudS12ZXJ0aWNhbCAuYXBwLWJyYW5kIHtcbiAgcGFkZGluZy1yaWdodDogMnJlbTtcbiAgcGFkZGluZy1sZWZ0OiAycmVtO1xufVxuXG4ubWVudS1ob3Jpem9udGFsIC5hcHAtYnJhbmQsXG4ubWVudS1ob3Jpem9udGFsIC5hcHAtYnJhbmQgKyAubWVudS1kaXZpZGVyIHtcbiAgZGlzcGxheTogbm9uZSAhaW1wb3J0YW50O1xufVxuXG46bm90KC5sYXlvdXQtbWVudSkgPiAubWVudS12ZXJ0aWNhbC5tZW51LWNvbGxhcHNlZDpub3QoLmxheW91dC1tZW51KTpub3QoOmhvdmVyKSAuYXBwLWJyYW5kIHtcbiAgd2lkdGg6IDUuMjVyZW07XG59XG46bm90KC5sYXlvdXQtbWVudSkgPiAubWVudS12ZXJ0aWNhbC5tZW51LWNvbGxhcHNlZDpub3QoLmxheW91dC1tZW51KTpub3QoOmhvdmVyKSAuYXBwLWJyYW5kLWxvZ28sXG46bm90KC5sYXlvdXQtbWVudSkgPiAubWVudS12ZXJ0aWNhbC5tZW51LWNvbGxhcHNlZDpub3QoLmxheW91dC1tZW51KTpub3QoOmhvdmVyKSAuYXBwLWJyYW5kLWxpbmssXG46bm90KC5sYXlvdXQtbWVudSkgPiAubWVudS12ZXJ0aWNhbC5tZW51LWNvbGxhcHNlZDpub3QoLmxheW91dC1tZW51KTpub3QoOmhvdmVyKSAuYXBwLWJyYW5kLXRleHQge1xuICBtYXJnaW4tcmlnaHQ6IGF1dG87XG4gIG1hcmdpbi1sZWZ0OiBhdXRvO1xufVxuOm5vdCgubGF5b3V0LW1lbnUpID4gLm1lbnUtdmVydGljYWwubWVudS1jb2xsYXBzZWQ6bm90KC5sYXlvdXQtbWVudSk6bm90KDpob3ZlcikgLmFwcC1icmFuZC1sb2dvIH4gLmFwcC1icmFuZC10ZXh0IHtcbiAgb3ZlcmZsb3c6IGhpZGRlbjtcbiAgdGV4dC1vdmVyZmxvdzogZWxsaXBzaXM7XG4gIHdoaXRlLXNwYWNlOiBub3dyYXA7XG4gIG9wYWNpdHk6IDA7XG59XG46bm90KC5sYXlvdXQtbWVudSkgPiAubWVudS12ZXJ0aWNhbC5tZW51LWNvbGxhcHNlZDpub3QoLmxheW91dC1tZW51KTpub3QoOmhvdmVyKSAuYXBwLWJyYW5kIC5sYXlvdXQtbWVudS10b2dnbGUge1xuICBkaXNwbGF5OiBub25lICFpbXBvcnRhbnQ7XG59XG46bm90KC5sYXlvdXQtbWVudSkgPiAubWVudS12ZXJ0aWNhbC5tZW51LWNvbGxhcHNlZDpub3QoLmxheW91dC1tZW51KTpub3QoOmhvdmVyKSAuYXBwLWJyYW5kLWltZyB7XG4gIGRpc3BsYXk6IG5vbmU7XG59XG46bm90KC5sYXlvdXQtbWVudSkgPiAubWVudS12ZXJ0aWNhbC5tZW51LWNvbGxhcHNlZDpub3QoLmxheW91dC1tZW51KTpub3QoOmhvdmVyKSAuYXBwLWJyYW5kLWltZy1jb2xsYXBzZWQge1xuICBkaXNwbGF5OiBibG9jaztcbn1cblxuQG1lZGlhIChtaW4td2lkdGg6IDEyMDBweCkge1xuICAubGF5b3V0LW1lbnUtY29sbGFwc2VkOm5vdCgubGF5b3V0LW1lbnUtaG92ZXIpOm5vdCgubGF5b3V0LW1lbnUtb2ZmY2FudmFzKTpub3QoLmxheW91dC1tZW51LWZpeGVkLW9mZmNhbnZhcykgLmxheW91dC1tZW51IC5hcHAtYnJhbmQge1xuICAgIHdpZHRoOiA1LjI1cmVtO1xuICB9XG4gIC5sYXlvdXQtbWVudS1jb2xsYXBzZWQ6bm90KC5sYXlvdXQtbWVudS1ob3Zlcik6bm90KC5sYXlvdXQtbWVudS1vZmZjYW52YXMpOm5vdCgubGF5b3V0LW1lbnUtZml4ZWQtb2ZmY2FudmFzKSAubGF5b3V0LW1lbnUgLmFwcC1icmFuZC1sb2dvLFxuLmxheW91dC1tZW51LWNvbGxhcHNlZDpub3QoLmxheW91dC1tZW51LWhvdmVyKTpub3QoLmxheW91dC1tZW51LW9mZmNhbnZhcyk6bm90KC5sYXlvdXQtbWVudS1maXhlZC1vZmZjYW52YXMpIC5sYXlvdXQtbWVudSAuYXBwLWJyYW5kLWxpbmssXG4ubGF5b3V0LW1lbnUtY29sbGFwc2VkOm5vdCgubGF5b3V0LW1lbnUtaG92ZXIpOm5vdCgubGF5b3V0LW1lbnUtb2ZmY2FudmFzKTpub3QoLmxheW91dC1tZW51LWZpeGVkLW9mZmNhbnZhcykgLmxheW91dC1tZW51IC5hcHAtYnJhbmQtdGV4dCB7XG4gICAgbWFyZ2luLXJpZ2h0OiBhdXRvO1xuICAgIG1hcmdpbi1sZWZ0OiBhdXRvO1xuICB9XG4gIC5sYXlvdXQtbWVudS1jb2xsYXBzZWQ6bm90KC5sYXlvdXQtbWVudS1ob3Zlcik6bm90KC5sYXlvdXQtbWVudS1vZmZjYW52YXMpOm5vdCgubGF5b3V0LW1lbnUtZml4ZWQtb2ZmY2FudmFzKSAubGF5b3V0LW1lbnUgLmFwcC1icmFuZC1sb2dvIH4gLmFwcC1icmFuZC10ZXh0IHtcbiAgICBvdmVyZmxvdzogaGlkZGVuO1xuICAgIHRleHQtb3ZlcmZsb3c6IGVsbGlwc2lzO1xuICAgIHdoaXRlLXNwYWNlOiBub3dyYXA7XG4gICAgb3BhY2l0eTogMDtcbiAgfVxuICAubGF5b3V0LW1lbnUtY29sbGFwc2VkOm5vdCgubGF5b3V0LW1lbnUtaG92ZXIpOm5vdCgubGF5b3V0LW1lbnUtb2ZmY2FudmFzKTpub3QoLmxheW91dC1tZW51LWZpeGVkLW9mZmNhbnZhcykgLmxheW91dC1tZW51IC5hcHAtYnJhbmQgLmxheW91dC1tZW51LXRvZ2dsZSB7XG4gICAgZGlzcGxheTogbm9uZSAhaW1wb3J0YW50O1xuICB9XG4gIC5sYXlvdXQtbWVudS1jb2xsYXBzZWQ6bm90KC5sYXlvdXQtbWVudS1ob3Zlcik6bm90KC5sYXlvdXQtbWVudS1vZmZjYW52YXMpOm5vdCgubGF5b3V0LW1lbnUtZml4ZWQtb2ZmY2FudmFzKSAubGF5b3V0LW1lbnUgLmFwcC1icmFuZC1pbWcge1xuICAgIGRpc3BsYXk6IG5vbmU7XG4gIH1cbiAgLmxheW91dC1tZW51LWNvbGxhcHNlZDpub3QoLmxheW91dC1tZW51LWhvdmVyKTpub3QoLmxheW91dC1tZW51LW9mZmNhbnZhcyk6bm90KC5sYXlvdXQtbWVudS1maXhlZC1vZmZjYW52YXMpIC5sYXlvdXQtbWVudSAuYXBwLWJyYW5kLWltZy1jb2xsYXBzZWQge1xuICAgIGRpc3BsYXk6IGJsb2NrO1xuICB9XG59XG4uYXZhdGFyIHtcbiAgcG9zaXRpb246IHJlbGF0aXZlO1xuICB3aWR0aDogMi4zNzVyZW07XG4gIGhlaWdodDogMi4zNzVyZW07XG4gIGN1cnNvcjogcG9pbnRlcjtcbn1cbi5hdmF0YXIgaW1nIHtcbiAgd2lkdGg6IDEwMCU7XG4gIGhlaWdodDogMTAwJTtcbn1cbi5hdmF0YXIgLmF2YXRhci1pbml0aWFsIHtcbiAgcG9zaXRpb246IGFic29sdXRlO1xuICB0b3A6IDA7XG4gIGxlZnQ6IDA7XG4gIHJpZ2h0OiAwO1xuICBib3R0b206IDA7XG4gIHRleHQtdHJhbnNmb3JtOiB1cHBlcmNhc2U7XG4gIGRpc3BsYXk6IGZsZXg7XG4gIGFsaWduLWl0ZW1zOiBjZW50ZXI7XG4gIGp1c3RpZnktY29udGVudDogY2VudGVyO1xuICBjb2xvcjogI2ZmZjtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzg1OTJhMztcbiAgZm9udC13ZWlnaHQ6IDcwMDtcbn1cbi5hdmF0YXIuYXZhdGFyLW9ubGluZTphZnRlciwgLmF2YXRhci5hdmF0YXItb2ZmbGluZTphZnRlciwgLmF2YXRhci5hdmF0YXItYXdheTphZnRlciwgLmF2YXRhci5hdmF0YXItYnVzeTphZnRlciB7XG4gIGNvbnRlbnQ6IFwiXCI7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgYm90dG9tOiAwO1xuICByaWdodDogM3B4O1xuICB3aWR0aDogOHB4O1xuICBoZWlnaHQ6IDhweDtcbiAgYm9yZGVyLXJhZGl1czogMTAwJTtcbiAgYm94LXNoYWRvdzogMCAwIDAgMnB4ICNmZmY7XG59XG4uYXZhdGFyLmF2YXRhci1vbmxpbmU6YWZ0ZXIge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjNzFkZDM3O1xufVxuLmF2YXRhci5hdmF0YXItb2ZmbGluZTphZnRlciB7XG4gIGJhY2tncm91bmQtY29sb3I6ICM4NTkyYTM7XG59XG4uYXZhdGFyLmF2YXRhci1hd2F5OmFmdGVyIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZmYWIwMDtcbn1cbi5hdmF0YXIuYXZhdGFyLWJ1c3k6YWZ0ZXIge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmYzZTFkO1xufVxuXG4ucHVsbC11cCB7XG4gIHRyYW5zaXRpb246IGFsbCAwLjI1cyBlYXNlO1xufVxuLnB1bGwtdXA6aG92ZXIge1xuICB0cmFuc2Zvcm06IHRyYW5zbGF0ZVkoLTRweCkgc2NhbGUoMS4wMik7XG4gIGJveC1zaGFkb3c6IDAgMC4yNXJlbSAxcmVtIHJnYmEoMTYxLCAxNzIsIDE4NCwgMC40NSk7XG4gIHotaW5kZXg6IDMwO1xuICBib3JkZXItcmFkaXVzOiA1MCU7XG59XG5cbi5hdmF0YXIteHMge1xuICB3aWR0aDogMS42MjVyZW07XG4gIGhlaWdodDogMS42MjVyZW07XG59XG4uYXZhdGFyLXhzIC5hdmF0YXItaW5pdGlhbCB7XG4gIGZvbnQtc2l6ZTogMC42MjVyZW07XG59XG4uYXZhdGFyLXhzLmF2YXRhci1vbmxpbmU6YWZ0ZXIsIC5hdmF0YXIteHMuYXZhdGFyLW9mZmxpbmU6YWZ0ZXIsIC5hdmF0YXIteHMuYXZhdGFyLWF3YXk6YWZ0ZXIsIC5hdmF0YXIteHMuYXZhdGFyLWJ1c3k6YWZ0ZXIge1xuICB3aWR0aDogMC4zMjVyZW07XG4gIGhlaWdodDogMC4zMjVyZW07XG4gIHJpZ2h0OiAxcHg7XG59XG5cbi5hdmF0YXItc20ge1xuICB3aWR0aDogMnJlbTtcbiAgaGVpZ2h0OiAycmVtO1xufVxuLmF2YXRhci1zbSAuYXZhdGFyLWluaXRpYWwge1xuICBmb250LXNpemU6IDAuNzVyZW07XG59XG4uYXZhdGFyLXNtLmF2YXRhci1vbmxpbmU6YWZ0ZXIsIC5hdmF0YXItc20uYXZhdGFyLW9mZmxpbmU6YWZ0ZXIsIC5hdmF0YXItc20uYXZhdGFyLWF3YXk6YWZ0ZXIsIC5hdmF0YXItc20uYXZhdGFyLWJ1c3k6YWZ0ZXIge1xuICB3aWR0aDogMC40cmVtO1xuICBoZWlnaHQ6IDAuNHJlbTtcbiAgcmlnaHQ6IDJweDtcbn1cblxuLmF2YXRhci1tZCB7XG4gIHdpZHRoOiAzcmVtO1xuICBoZWlnaHQ6IDNyZW07XG59XG4uYXZhdGFyLW1kIC5hdmF0YXItaW5pdGlhbCB7XG4gIGZvbnQtc2l6ZTogMS4xMjVyZW07XG59XG4uYXZhdGFyLW1kLmF2YXRhci1vbmxpbmU6YWZ0ZXIsIC5hdmF0YXItbWQuYXZhdGFyLW9mZmxpbmU6YWZ0ZXIsIC5hdmF0YXItbWQuYXZhdGFyLWF3YXk6YWZ0ZXIsIC5hdmF0YXItbWQuYXZhdGFyLWJ1c3k6YWZ0ZXIge1xuICB3aWR0aDogMC42cmVtO1xuICBoZWlnaHQ6IDAuNnJlbTtcbiAgcmlnaHQ6IDRweDtcbn1cblxuLmF2YXRhci1sZyB7XG4gIHdpZHRoOiA0cmVtO1xuICBoZWlnaHQ6IDRyZW07XG59XG4uYXZhdGFyLWxnIC5hdmF0YXItaW5pdGlhbCB7XG4gIGZvbnQtc2l6ZTogMS41cmVtO1xufVxuLmF2YXRhci1sZy5hdmF0YXItb25saW5lOmFmdGVyLCAuYXZhdGFyLWxnLmF2YXRhci1vZmZsaW5lOmFmdGVyLCAuYXZhdGFyLWxnLmF2YXRhci1hd2F5OmFmdGVyLCAuYXZhdGFyLWxnLmF2YXRhci1idXN5OmFmdGVyIHtcbiAgd2lkdGg6IDAuOHJlbTtcbiAgaGVpZ2h0OiAwLjhyZW07XG4gIHJpZ2h0OiA1cHg7XG59XG5cbi5hdmF0YXIteGwge1xuICB3aWR0aDogNC41cmVtO1xuICBoZWlnaHQ6IDQuNXJlbTtcbn1cbi5hdmF0YXIteGwgLmF2YXRhci1pbml0aWFsIHtcbiAgZm9udC1zaXplOiAxLjg3NXJlbTtcbn1cbi5hdmF0YXIteGwuYXZhdGFyLW9ubGluZTphZnRlciwgLmF2YXRhci14bC5hdmF0YXItb2ZmbGluZTphZnRlciwgLmF2YXRhci14bC5hdmF0YXItYXdheTphZnRlciwgLmF2YXRhci14bC5hdmF0YXItYnVzeTphZnRlciB7XG4gIHdpZHRoOiAwLjlyZW07XG4gIGhlaWdodDogMC45cmVtO1xuICByaWdodDogNnB4O1xufVxuXG4uYXZhdGFyLWdyb3VwIC5hdmF0YXIge1xuICB0cmFuc2l0aW9uOiBhbGwgMC4yNXMgZWFzZTtcbn1cbi5hdmF0YXItZ3JvdXAgLmF2YXRhciBpbWcsXG4uYXZhdGFyLWdyb3VwIC5hdmF0YXIgLmF2YXRhci1pbml0aWFsIHtcbiAgYm9yZGVyOiAycHggc29saWQgI2ZmZjtcbn1cbi5hdmF0YXItZ3JvdXAgLmF2YXRhciAuYXZhdGFyLWluaXRpYWwge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjOWRhOGI1O1xufVxuLmF2YXRhci1ncm91cCAuYXZhdGFyOmhvdmVyIHtcbiAgei1pbmRleDogMzA7XG4gIHRyYW5zaXRpb246IGFsbCAwLjI1cyBlYXNlO1xufVxuLmF2YXRhci1ncm91cCAuYXZhdGFyIHtcbiAgbWFyZ2luLWxlZnQ6IC0wLjhyZW07XG59XG4uYXZhdGFyLWdyb3VwIC5hdmF0YXI6Zmlyc3QtY2hpbGQge1xuICBtYXJnaW4tbGVmdDogMDtcbn1cbi5hdmF0YXItZ3JvdXAgLmF2YXRhci14cyB7XG4gIG1hcmdpbi1sZWZ0OiAtMC42NXJlbTtcbn1cbi5hdmF0YXItZ3JvdXAgLmF2YXRhci1zbSB7XG4gIG1hcmdpbi1sZWZ0OiAtMC43NXJlbTtcbn1cbi5hdmF0YXItZ3JvdXAgLmF2YXRhci1tZCB7XG4gIG1hcmdpbi1sZWZ0OiAtMC45cmVtO1xufVxuLmF2YXRhci1ncm91cCAuYXZhdGFyLWxnIHtcbiAgbWFyZ2luLWxlZnQ6IC0xLjVyZW07XG59XG4uYXZhdGFyLWdyb3VwIC5hdmF0YXIteGwge1xuICBtYXJnaW4tbGVmdDogLTEuNzVyZW07XG59XG5cbi5kaXZpZGVyIHtcbiAgZGlzcGxheTogYmxvY2s7XG4gIHRleHQtYWxpZ246IGNlbnRlcjtcbiAgbWFyZ2luOiAxcmVtIDA7XG4gIG92ZXJmbG93OiBoaWRkZW47XG4gIHdoaXRlLXNwYWNlOiBub3dyYXA7XG59XG4uZGl2aWRlciAuZGl2aWRlci10ZXh0IHtcbiAgcG9zaXRpb246IHJlbGF0aXZlO1xuICBkaXNwbGF5OiBpbmxpbmUtYmxvY2s7XG4gIGZvbnQtc2l6ZTogMC44cmVtO1xuICBwYWRkaW5nOiAwcmVtIDFyZW07XG59XG4uZGl2aWRlciAuZGl2aWRlci10ZXh0IGkge1xuICBmb250LXNpemU6IDFyZW07XG59XG4uZGl2aWRlciAuZGl2aWRlci10ZXh0OmJlZm9yZSwgLmRpdmlkZXIgLmRpdmlkZXItdGV4dDphZnRlciB7XG4gIGNvbnRlbnQ6IFwiXCI7XG4gIHBvc2l0aW9uOiBhYnNvbHV0ZTtcbiAgdG9wOiA1MCU7XG4gIHdpZHRoOiAxMDB2dztcbiAgYm9yZGVyLXRvcDogMXB4IHNvbGlkIHJnYmEoNjcsIDg5LCAxMTMsIDAuMik7XG59XG4uZGl2aWRlciAuZGl2aWRlci10ZXh0OmJlZm9yZSB7XG4gIHJpZ2h0OiAxMDAlO1xufVxuLmRpdmlkZXIgLmRpdmlkZXItdGV4dDphZnRlciB7XG4gIGxlZnQ6IDEwMCU7XG59XG4uZGl2aWRlci50ZXh0LXN0YXJ0IC5kaXZpZGVyLXRleHQge1xuICBwYWRkaW5nLWxlZnQ6IDA7XG59XG4uZGl2aWRlci50ZXh0LWVuZCAuZGl2aWRlci10ZXh0IHtcbiAgcGFkZGluZy1yaWdodDogMDtcbn1cbi5kaXZpZGVyLnRleHQtc3RhcnQtY2VudGVyIC5kaXZpZGVyLXRleHQge1xuICBsZWZ0OiAtMjUlO1xufVxuLmRpdmlkZXIudGV4dC1lbmQtY2VudGVyIC5kaXZpZGVyLXRleHQge1xuICByaWdodDogLTI1JTtcbn1cbi5kaXZpZGVyLmRpdmlkZXItZG90dGVkIC5kaXZpZGVyLXRleHQ6YmVmb3JlLCAuZGl2aWRlci5kaXZpZGVyLWRvdHRlZCAuZGl2aWRlci10ZXh0OmFmdGVyIHtcbiAgYm9yZGVyLXN0eWxlOiBkb3R0ZWQ7XG4gIGJvcmRlci13aWR0aDogMCAxcHggMXB4O1xuICBib3JkZXItY29sb3I6IHJnYmEoNjcsIDg5LCAxMTMsIDAuMik7XG59XG4uZGl2aWRlci5kaXZpZGVyLWRhc2hlZCAuZGl2aWRlci10ZXh0OmJlZm9yZSwgLmRpdmlkZXIuZGl2aWRlci1kYXNoZWQgLmRpdmlkZXItdGV4dDphZnRlciB7XG4gIGJvcmRlci1zdHlsZTogZGFzaGVkO1xuICBib3JkZXItd2lkdGg6IDAgMXB4IDFweDtcbiAgYm9yZGVyLWNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjIpO1xufVxuXG4uZGl2aWRlci5kaXZpZGVyLmRpdmlkZXItc2Vjb25kYXJ5IC5kaXZpZGVyLXRleHQ6YmVmb3JlLCAuZGl2aWRlci5kaXZpZGVyLmRpdmlkZXItc2Vjb25kYXJ5IC5kaXZpZGVyLXRleHQ6YWZ0ZXIge1xuICBib3JkZXItY29sb3I6ICM4NTkyYTM7XG59XG5cbi5kaXZpZGVyLmRpdmlkZXIuZGl2aWRlci1zdWNjZXNzIC5kaXZpZGVyLXRleHQ6YmVmb3JlLCAuZGl2aWRlci5kaXZpZGVyLmRpdmlkZXItc3VjY2VzcyAuZGl2aWRlci10ZXh0OmFmdGVyIHtcbiAgYm9yZGVyLWNvbG9yOiAjNzFkZDM3O1xufVxuXG4uZGl2aWRlci5kaXZpZGVyLmRpdmlkZXItaW5mbyAuZGl2aWRlci10ZXh0OmJlZm9yZSwgLmRpdmlkZXIuZGl2aWRlci5kaXZpZGVyLWluZm8gLmRpdmlkZXItdGV4dDphZnRlciB7XG4gIGJvcmRlci1jb2xvcjogIzAzYzNlYztcbn1cblxuLmRpdmlkZXIuZGl2aWRlci5kaXZpZGVyLXdhcm5pbmcgLmRpdmlkZXItdGV4dDpiZWZvcmUsIC5kaXZpZGVyLmRpdmlkZXIuZGl2aWRlci13YXJuaW5nIC5kaXZpZGVyLXRleHQ6YWZ0ZXIge1xuICBib3JkZXItY29sb3I6ICNmZmFiMDA7XG59XG5cbi5kaXZpZGVyLmRpdmlkZXIuZGl2aWRlci1kYW5nZXIgLmRpdmlkZXItdGV4dDpiZWZvcmUsIC5kaXZpZGVyLmRpdmlkZXIuZGl2aWRlci1kYW5nZXIgLmRpdmlkZXItdGV4dDphZnRlciB7XG4gIGJvcmRlci1jb2xvcjogI2ZmM2UxZDtcbn1cblxuLmRpdmlkZXIuZGl2aWRlci5kaXZpZGVyLWRhcmsgLmRpdmlkZXItdGV4dDpiZWZvcmUsIC5kaXZpZGVyLmRpdmlkZXIuZGl2aWRlci1kYXJrIC5kaXZpZGVyLXRleHQ6YWZ0ZXIge1xuICBib3JkZXItY29sb3I6ICMyMzM0NDY7XG59XG5cbi5kaXZpZGVyLmRpdmlkZXIuZGl2aWRlci1ncmF5IC5kaXZpZGVyLXRleHQ6YmVmb3JlLCAuZGl2aWRlci5kaXZpZGVyLmRpdmlkZXItZ3JheSAuZGl2aWRlci10ZXh0OmFmdGVyIHtcbiAgYm9yZGVyLWNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjEpO1xufVxuXG4uZm9vdGVyLWxpbmsge1xuICBkaXNwbGF5OiBpbmxpbmUtYmxvY2s7XG59XG5cbi5mb290ZXItbGlnaHQge1xuICBjb2xvcjogcmdiYSg2NywgODksIDExMywgMC41KTtcbn1cbi5mb290ZXItbGlnaHQgLmZvb3Rlci10ZXh0IHtcbiAgY29sb3I6ICM2OTdhOGQ7XG59XG4uZm9vdGVyLWxpZ2h0IC5mb290ZXItbGluayB7XG4gIGNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjUpO1xufVxuLmZvb3Rlci1saWdodCAuZm9vdGVyLWxpbms6aG92ZXIsIC5mb290ZXItbGlnaHQgLmZvb3Rlci1saW5rOmZvY3VzIHtcbiAgY29sb3I6ICM2OTdhOGQ7XG59XG4uZm9vdGVyLWxpZ2h0IC5mb290ZXItbGluay5kaXNhYmxlZCB7XG4gIGNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjMpICFpbXBvcnRhbnQ7XG59XG4uZm9vdGVyLWxpZ2h0IC5zaG93ID4gLmZvb3Rlci1saW5rLFxuLmZvb3Rlci1saWdodCAuYWN0aXZlID4gLmZvb3Rlci1saW5rLFxuLmZvb3Rlci1saWdodCAuZm9vdGVyLWxpbmsuc2hvdyxcbi5mb290ZXItbGlnaHQgLmZvb3Rlci1saW5rLmFjdGl2ZSB7XG4gIGNvbG9yOiAjNjk3YThkO1xufVxuLmZvb3Rlci1saWdodCBociB7XG4gIGJvcmRlci1jb2xvcjogcmdiYSgwLCAwLCAwLCAwLjA2KTtcbn1cblxuLm5hdmJhci5iZy1zZWNvbmRhcnkge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjODU5MmEzICFpbXBvcnRhbnQ7XG4gIGNvbG9yOiAjZWFlY2VmO1xufVxuLm5hdmJhci5iZy1zZWNvbmRhcnkgLm5hdmJhci1icmFuZCxcbi5uYXZiYXIuYmctc2Vjb25kYXJ5IC5uYXZiYXItYnJhbmQgYSB7XG4gIGNvbG9yOiAjZmZmO1xufVxuLm5hdmJhci5iZy1zZWNvbmRhcnkgLm5hdmJhci1icmFuZDpob3ZlciwgLm5hdmJhci5iZy1zZWNvbmRhcnkgLm5hdmJhci1icmFuZDpmb2N1cyxcbi5uYXZiYXIuYmctc2Vjb25kYXJ5IC5uYXZiYXItYnJhbmQgYTpob3Zlcixcbi5uYXZiYXIuYmctc2Vjb25kYXJ5IC5uYXZiYXItYnJhbmQgYTpmb2N1cyB7XG4gIGNvbG9yOiAjZmZmO1xufVxuLm5hdmJhci5iZy1zZWNvbmRhcnkgLm5hdmJhci1zZWFyY2gtd3JhcHBlciAubmF2YmFyLXNlYXJjaC1pY29uLFxuLm5hdmJhci5iZy1zZWNvbmRhcnkgLm5hdmJhci1zZWFyY2gtd3JhcHBlciAuc2VhcmNoLWlucHV0IHtcbiAgY29sb3I6ICNlYWVjZWY7XG59XG4ubmF2YmFyLmJnLXNlY29uZGFyeSAuc2VhcmNoLWlucHV0LXdyYXBwZXIgLnNlYXJjaC1pbnB1dCxcbi5uYXZiYXIuYmctc2Vjb25kYXJ5IC5zZWFyY2gtaW5wdXQtd3JhcHBlciAuc2VhcmNoLXRvZ2dsZXIge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjODU5MmEzICFpbXBvcnRhbnQ7XG4gIGNvbG9yOiAjZWFlY2VmO1xufVxuLm5hdmJhci5iZy1zZWNvbmRhcnkgLm5hdmJhci1uYXYgPiAubmF2LWxpbmssXG4ubmF2YmFyLmJnLXNlY29uZGFyeSAubmF2YmFyLW5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluayxcbi5uYXZiYXIuYmctc2Vjb25kYXJ5IC5uYXZiYXItbmF2ID4gLm5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluayB7XG4gIGNvbG9yOiAjZWFlY2VmO1xufVxuLm5hdmJhci5iZy1zZWNvbmRhcnkgLm5hdmJhci1uYXYgPiAubmF2LWxpbms6aG92ZXIsIC5uYXZiYXIuYmctc2Vjb25kYXJ5IC5uYXZiYXItbmF2ID4gLm5hdi1saW5rOmZvY3VzLFxuLm5hdmJhci5iZy1zZWNvbmRhcnkgLm5hdmJhci1uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbms6aG92ZXIsXG4ubmF2YmFyLmJnLXNlY29uZGFyeSAubmF2YmFyLW5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluazpmb2N1cyxcbi5uYXZiYXIuYmctc2Vjb25kYXJ5IC5uYXZiYXItbmF2ID4gLm5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluazpob3Zlcixcbi5uYXZiYXIuYmctc2Vjb25kYXJ5IC5uYXZiYXItbmF2ID4gLm5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluazpmb2N1cyB7XG4gIGNvbG9yOiAjZmZmO1xufVxuLm5hdmJhci5iZy1zZWNvbmRhcnkgLm5hdmJhci1uYXYgPiAubmF2LWxpbmsuZGlzYWJsZWQsXG4ubmF2YmFyLmJnLXNlY29uZGFyeSAubmF2YmFyLW5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluay5kaXNhYmxlZCxcbi5uYXZiYXIuYmctc2Vjb25kYXJ5IC5uYXZiYXItbmF2ID4gLm5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluay5kaXNhYmxlZCB7XG4gIGNvbG9yOiAjYzJjOGQxICFpbXBvcnRhbnQ7XG59XG4ubmF2YmFyLmJnLXNlY29uZGFyeSAubmF2YmFyLW5hdiAuc2hvdyA+IC5uYXYtbGluayxcbi5uYXZiYXIuYmctc2Vjb25kYXJ5IC5uYXZiYXItbmF2IC5hY3RpdmUgPiAubmF2LWxpbmssXG4ubmF2YmFyLmJnLXNlY29uZGFyeSAubmF2YmFyLW5hdiAubmF2LWxpbmsuc2hvdyxcbi5uYXZiYXIuYmctc2Vjb25kYXJ5IC5uYXZiYXItbmF2IC5uYXYtbGluay5hY3RpdmUge1xuICBjb2xvcjogI2ZmZjtcbn1cbi5uYXZiYXIuYmctc2Vjb25kYXJ5IC5uYXZiYXItdG9nZ2xlciB7XG4gIGNvbG9yOiAjZWFlY2VmO1xuICBib3JkZXItY29sb3I6IHJnYmEoMjU1LCAyNTUsIDI1NSwgMC4xNSk7XG59XG4ubmF2YmFyLmJnLXNlY29uZGFyeSAubmF2YmFyLXRvZ2dsZXItaWNvbiB7XG4gIGJhY2tncm91bmQtaW1hZ2U6IHVybChcImRhdGE6aW1hZ2Uvc3ZnK3htbCwlM0Nzdmcgd2lkdGg9JzE0cHgnIGhlaWdodD0nMTFweCcgdmlld0JveD0nMCAwIDE0IDExJyB2ZXJzaW9uPScxLjEnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZycgeG1sbnM6eGxpbms9J2h0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsnJTNFJTNDZGVmcyUzRSUzQ3BhdGggZD0nTTAsMCBMMTQsMCBMMTQsMS43NSBMMCwxLjc1IEwwLDAgWiBNMCw0LjM3NSBMMTQsNC4zNzUgTDE0LDYuMTI1IEwwLDYuMTI1IEwwLDQuMzc1IFogTTAsOC43NSBMMTQsOC43NSBMMTQsMTAuNSBMMCwxMC41IEwwLDguNzUgWicgaWQ9J3BhdGgtMSclM0UlM0MvcGF0aCUzRSUzQy9kZWZzJTNFJTNDZyBpZD0n8J+Sji1VSS1FbGVtZW50cycgc3Ryb2tlPSdub25lJyBzdHJva2Utd2lkdGg9JzEnIGZpbGw9J25vbmUnIGZpbGwtcnVsZT0nZXZlbm9kZCclM0UlM0NnIGlkPScxMiktTmF2YmFyJyB0cmFuc2Zvcm09J3RyYW5zbGF0ZSgtMTE3NC4wMDAwMDAsIC0xMjkwLjAwMDAwMCknJTNFJTNDZyBpZD0nR3JvdXAnIHRyYW5zZm9ybT0ndHJhbnNsYXRlKDExNzQuMDAwMDAwLCAxMjg4LjAwMDAwMCknJTNFJTNDZyBpZD0nSWNvbi1Db2xvcicgdHJhbnNmb3JtPSd0cmFuc2xhdGUoMC4wMDAwMDAsIDIuMDAwMDAwKSclM0UlM0N1c2UgZmlsbD0ncmdiYSgyNTUsIDI1NSwgMjU1LCAwLjgpJyB4bGluazpocmVmPSclMjNwYXRoLTEnJTNFJTNDL3VzZSUzRSUzQ3VzZSBmaWxsLW9wYWNpdHk9JzAuMScgZmlsbD0ncmdiYSgyNTUsIDI1NSwgMjU1LCAwLjgpJyB4bGluazpocmVmPSclMjNwYXRoLTEnJTNFJTNDL3VzZSUzRSUzQy9nJTNFJTNDL2clM0UlM0MvZyUzRSUzQy9nJTNFJTNDL3N2ZyUzRVwiKTtcbn1cbi5uYXZiYXIuYmctc2Vjb25kYXJ5IC5uYXZiYXItdGV4dCB7XG4gIGNvbG9yOiAjZWFlY2VmO1xufVxuLm5hdmJhci5iZy1zZWNvbmRhcnkgLm5hdmJhci10ZXh0IGEge1xuICBjb2xvcjogI2ZmZjtcbn1cbi5uYXZiYXIuYmctc2Vjb25kYXJ5IC5uYXZiYXItdGV4dCBhOmhvdmVyLCAubmF2YmFyLmJnLXNlY29uZGFyeSAubmF2YmFyLXRleHQgYTpmb2N1cyB7XG4gIGNvbG9yOiAjZmZmO1xufVxuLm5hdmJhci5iZy1zZWNvbmRhcnkgaHIge1xuICBib3JkZXItY29sb3I6IHJnYmEoMjU1LCAyNTUsIDI1NSwgMC4xNSk7XG59XG5cbi5uYXZiYXIuYmctc3VjY2VzcyB7XG4gIGJhY2tncm91bmQtY29sb3I6ICM3MWRkMzcgIWltcG9ydGFudDtcbiAgY29sb3I6ICNlY2ZhZTQ7XG59XG4ubmF2YmFyLmJnLXN1Y2Nlc3MgLm5hdmJhci1icmFuZCxcbi5uYXZiYXIuYmctc3VjY2VzcyAubmF2YmFyLWJyYW5kIGEge1xuICBjb2xvcjogI2ZmZjtcbn1cbi5uYXZiYXIuYmctc3VjY2VzcyAubmF2YmFyLWJyYW5kOmhvdmVyLCAubmF2YmFyLmJnLXN1Y2Nlc3MgLm5hdmJhci1icmFuZDpmb2N1cyxcbi5uYXZiYXIuYmctc3VjY2VzcyAubmF2YmFyLWJyYW5kIGE6aG92ZXIsXG4ubmF2YmFyLmJnLXN1Y2Nlc3MgLm5hdmJhci1icmFuZCBhOmZvY3VzIHtcbiAgY29sb3I6ICNmZmY7XG59XG4ubmF2YmFyLmJnLXN1Y2Nlc3MgLm5hdmJhci1zZWFyY2gtd3JhcHBlciAubmF2YmFyLXNlYXJjaC1pY29uLFxuLm5hdmJhci5iZy1zdWNjZXNzIC5uYXZiYXItc2VhcmNoLXdyYXBwZXIgLnNlYXJjaC1pbnB1dCB7XG4gIGNvbG9yOiAjZWNmYWU0O1xufVxuLm5hdmJhci5iZy1zdWNjZXNzIC5zZWFyY2gtaW5wdXQtd3JhcHBlciAuc2VhcmNoLWlucHV0LFxuLm5hdmJhci5iZy1zdWNjZXNzIC5zZWFyY2gtaW5wdXQtd3JhcHBlciAuc2VhcmNoLXRvZ2dsZXIge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjNzFkZDM3ICFpbXBvcnRhbnQ7XG4gIGNvbG9yOiAjZWNmYWU0O1xufVxuLm5hdmJhci5iZy1zdWNjZXNzIC5uYXZiYXItbmF2ID4gLm5hdi1saW5rLFxuLm5hdmJhci5iZy1zdWNjZXNzIC5uYXZiYXItbmF2ID4gLm5hdi1pdGVtID4gLm5hdi1saW5rLFxuLm5hdmJhci5iZy1zdWNjZXNzIC5uYXZiYXItbmF2ID4gLm5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluayB7XG4gIGNvbG9yOiAjZWNmYWU0O1xufVxuLm5hdmJhci5iZy1zdWNjZXNzIC5uYXZiYXItbmF2ID4gLm5hdi1saW5rOmhvdmVyLCAubmF2YmFyLmJnLXN1Y2Nlc3MgLm5hdmJhci1uYXYgPiAubmF2LWxpbms6Zm9jdXMsXG4ubmF2YmFyLmJnLXN1Y2Nlc3MgLm5hdmJhci1uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbms6aG92ZXIsXG4ubmF2YmFyLmJnLXN1Y2Nlc3MgLm5hdmJhci1uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbms6Zm9jdXMsXG4ubmF2YmFyLmJnLXN1Y2Nlc3MgLm5hdmJhci1uYXYgPiAubmF2ID4gLm5hdi1pdGVtID4gLm5hdi1saW5rOmhvdmVyLFxuLm5hdmJhci5iZy1zdWNjZXNzIC5uYXZiYXItbmF2ID4gLm5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluazpmb2N1cyB7XG4gIGNvbG9yOiAjZmZmO1xufVxuLm5hdmJhci5iZy1zdWNjZXNzIC5uYXZiYXItbmF2ID4gLm5hdi1saW5rLmRpc2FibGVkLFxuLm5hdmJhci5iZy1zdWNjZXNzIC5uYXZiYXItbmF2ID4gLm5hdi1pdGVtID4gLm5hdi1saW5rLmRpc2FibGVkLFxuLm5hdmJhci5iZy1zdWNjZXNzIC5uYXZiYXItbmF2ID4gLm5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluay5kaXNhYmxlZCB7XG4gIGNvbG9yOiAjYmJlZTlmICFpbXBvcnRhbnQ7XG59XG4ubmF2YmFyLmJnLXN1Y2Nlc3MgLm5hdmJhci1uYXYgLnNob3cgPiAubmF2LWxpbmssXG4ubmF2YmFyLmJnLXN1Y2Nlc3MgLm5hdmJhci1uYXYgLmFjdGl2ZSA+IC5uYXYtbGluayxcbi5uYXZiYXIuYmctc3VjY2VzcyAubmF2YmFyLW5hdiAubmF2LWxpbmsuc2hvdyxcbi5uYXZiYXIuYmctc3VjY2VzcyAubmF2YmFyLW5hdiAubmF2LWxpbmsuYWN0aXZlIHtcbiAgY29sb3I6ICNmZmY7XG59XG4ubmF2YmFyLmJnLXN1Y2Nlc3MgLm5hdmJhci10b2dnbGVyIHtcbiAgY29sb3I6ICNlY2ZhZTQ7XG4gIGJvcmRlci1jb2xvcjogcmdiYSgyNTUsIDI1NSwgMjU1LCAwLjE1KTtcbn1cbi5uYXZiYXIuYmctc3VjY2VzcyAubmF2YmFyLXRvZ2dsZXItaWNvbiB7XG4gIGJhY2tncm91bmQtaW1hZ2U6IHVybChcImRhdGE6aW1hZ2Uvc3ZnK3htbCwlM0Nzdmcgd2lkdGg9JzE0cHgnIGhlaWdodD0nMTFweCcgdmlld0JveD0nMCAwIDE0IDExJyB2ZXJzaW9uPScxLjEnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZycgeG1sbnM6eGxpbms9J2h0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsnJTNFJTNDZGVmcyUzRSUzQ3BhdGggZD0nTTAsMCBMMTQsMCBMMTQsMS43NSBMMCwxLjc1IEwwLDAgWiBNMCw0LjM3NSBMMTQsNC4zNzUgTDE0LDYuMTI1IEwwLDYuMTI1IEwwLDQuMzc1IFogTTAsOC43NSBMMTQsOC43NSBMMTQsMTAuNSBMMCwxMC41IEwwLDguNzUgWicgaWQ9J3BhdGgtMSclM0UlM0MvcGF0aCUzRSUzQy9kZWZzJTNFJTNDZyBpZD0n8J+Sji1VSS1FbGVtZW50cycgc3Ryb2tlPSdub25lJyBzdHJva2Utd2lkdGg9JzEnIGZpbGw9J25vbmUnIGZpbGwtcnVsZT0nZXZlbm9kZCclM0UlM0NnIGlkPScxMiktTmF2YmFyJyB0cmFuc2Zvcm09J3RyYW5zbGF0ZSgtMTE3NC4wMDAwMDAsIC0xMjkwLjAwMDAwMCknJTNFJTNDZyBpZD0nR3JvdXAnIHRyYW5zZm9ybT0ndHJhbnNsYXRlKDExNzQuMDAwMDAwLCAxMjg4LjAwMDAwMCknJTNFJTNDZyBpZD0nSWNvbi1Db2xvcicgdHJhbnNmb3JtPSd0cmFuc2xhdGUoMC4wMDAwMDAsIDIuMDAwMDAwKSclM0UlM0N1c2UgZmlsbD0ncmdiYSgyNTUsIDI1NSwgMjU1LCAwLjgpJyB4bGluazpocmVmPSclMjNwYXRoLTEnJTNFJTNDL3VzZSUzRSUzQ3VzZSBmaWxsLW9wYWNpdHk9JzAuMScgZmlsbD0ncmdiYSgyNTUsIDI1NSwgMjU1LCAwLjgpJyB4bGluazpocmVmPSclMjNwYXRoLTEnJTNFJTNDL3VzZSUzRSUzQy9nJTNFJTNDL2clM0UlM0MvZyUzRSUzQy9nJTNFJTNDL3N2ZyUzRVwiKTtcbn1cbi5uYXZiYXIuYmctc3VjY2VzcyAubmF2YmFyLXRleHQge1xuICBjb2xvcjogI2VjZmFlNDtcbn1cbi5uYXZiYXIuYmctc3VjY2VzcyAubmF2YmFyLXRleHQgYSB7XG4gIGNvbG9yOiAjZmZmO1xufVxuLm5hdmJhci5iZy1zdWNjZXNzIC5uYXZiYXItdGV4dCBhOmhvdmVyLCAubmF2YmFyLmJnLXN1Y2Nlc3MgLm5hdmJhci10ZXh0IGE6Zm9jdXMge1xuICBjb2xvcjogI2ZmZjtcbn1cbi5uYXZiYXIuYmctc3VjY2VzcyBociB7XG4gIGJvcmRlci1jb2xvcjogcmdiYSgyNTUsIDI1NSwgMjU1LCAwLjE1KTtcbn1cblxuLm5hdmJhci5iZy1pbmZvIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzAzYzNlYyAhaW1wb3J0YW50O1xuICBjb2xvcjogI2QyZjRmYztcbn1cbi5uYXZiYXIuYmctaW5mbyAubmF2YmFyLWJyYW5kLFxuLm5hdmJhci5iZy1pbmZvIC5uYXZiYXItYnJhbmQgYSB7XG4gIGNvbG9yOiAjZmZmO1xufVxuLm5hdmJhci5iZy1pbmZvIC5uYXZiYXItYnJhbmQ6aG92ZXIsIC5uYXZiYXIuYmctaW5mbyAubmF2YmFyLWJyYW5kOmZvY3VzLFxuLm5hdmJhci5iZy1pbmZvIC5uYXZiYXItYnJhbmQgYTpob3Zlcixcbi5uYXZiYXIuYmctaW5mbyAubmF2YmFyLWJyYW5kIGE6Zm9jdXMge1xuICBjb2xvcjogI2ZmZjtcbn1cbi5uYXZiYXIuYmctaW5mbyAubmF2YmFyLXNlYXJjaC13cmFwcGVyIC5uYXZiYXItc2VhcmNoLWljb24sXG4ubmF2YmFyLmJnLWluZm8gLm5hdmJhci1zZWFyY2gtd3JhcHBlciAuc2VhcmNoLWlucHV0IHtcbiAgY29sb3I6ICNkMmY0ZmM7XG59XG4ubmF2YmFyLmJnLWluZm8gLnNlYXJjaC1pbnB1dC13cmFwcGVyIC5zZWFyY2gtaW5wdXQsXG4ubmF2YmFyLmJnLWluZm8gLnNlYXJjaC1pbnB1dC13cmFwcGVyIC5zZWFyY2gtdG9nZ2xlciB7XG4gIGJhY2tncm91bmQtY29sb3I6ICMwM2MzZWMgIWltcG9ydGFudDtcbiAgY29sb3I6ICNkMmY0ZmM7XG59XG4ubmF2YmFyLmJnLWluZm8gLm5hdmJhci1uYXYgPiAubmF2LWxpbmssXG4ubmF2YmFyLmJnLWluZm8gLm5hdmJhci1uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbmssXG4ubmF2YmFyLmJnLWluZm8gLm5hdmJhci1uYXYgPiAubmF2ID4gLm5hdi1pdGVtID4gLm5hdi1saW5rIHtcbiAgY29sb3I6ICNkMmY0ZmM7XG59XG4ubmF2YmFyLmJnLWluZm8gLm5hdmJhci1uYXYgPiAubmF2LWxpbms6aG92ZXIsIC5uYXZiYXIuYmctaW5mbyAubmF2YmFyLW5hdiA+IC5uYXYtbGluazpmb2N1cyxcbi5uYXZiYXIuYmctaW5mbyAubmF2YmFyLW5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluazpob3Zlcixcbi5uYXZiYXIuYmctaW5mbyAubmF2YmFyLW5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluazpmb2N1cyxcbi5uYXZiYXIuYmctaW5mbyAubmF2YmFyLW5hdiA+IC5uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbms6aG92ZXIsXG4ubmF2YmFyLmJnLWluZm8gLm5hdmJhci1uYXYgPiAubmF2ID4gLm5hdi1pdGVtID4gLm5hdi1saW5rOmZvY3VzIHtcbiAgY29sb3I6ICNmZmY7XG59XG4ubmF2YmFyLmJnLWluZm8gLm5hdmJhci1uYXYgPiAubmF2LWxpbmsuZGlzYWJsZWQsXG4ubmF2YmFyLmJnLWluZm8gLm5hdmJhci1uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbmsuZGlzYWJsZWQsXG4ubmF2YmFyLmJnLWluZm8gLm5hdmJhci1uYXYgPiAubmF2ID4gLm5hdi1pdGVtID4gLm5hdi1saW5rLmRpc2FibGVkIHtcbiAgY29sb3I6ICM3ZmUwZjYgIWltcG9ydGFudDtcbn1cbi5uYXZiYXIuYmctaW5mbyAubmF2YmFyLW5hdiAuc2hvdyA+IC5uYXYtbGluayxcbi5uYXZiYXIuYmctaW5mbyAubmF2YmFyLW5hdiAuYWN0aXZlID4gLm5hdi1saW5rLFxuLm5hdmJhci5iZy1pbmZvIC5uYXZiYXItbmF2IC5uYXYtbGluay5zaG93LFxuLm5hdmJhci5iZy1pbmZvIC5uYXZiYXItbmF2IC5uYXYtbGluay5hY3RpdmUge1xuICBjb2xvcjogI2ZmZjtcbn1cbi5uYXZiYXIuYmctaW5mbyAubmF2YmFyLXRvZ2dsZXIge1xuICBjb2xvcjogI2QyZjRmYztcbiAgYm9yZGVyLWNvbG9yOiByZ2JhKDI1NSwgMjU1LCAyNTUsIDAuMTUpO1xufVxuLm5hdmJhci5iZy1pbmZvIC5uYXZiYXItdG9nZ2xlci1pY29uIHtcbiAgYmFja2dyb3VuZC1pbWFnZTogdXJsKFwiZGF0YTppbWFnZS9zdmcreG1sLCUzQ3N2ZyB3aWR0aD0nMTRweCcgaGVpZ2h0PScxMXB4JyB2aWV3Qm94PScwIDAgMTQgMTEnIHZlcnNpb249JzEuMScgeG1sbnM9J2h0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnJyB4bWxuczp4bGluaz0naHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayclM0UlM0NkZWZzJTNFJTNDcGF0aCBkPSdNMCwwIEwxNCwwIEwxNCwxLjc1IEwwLDEuNzUgTDAsMCBaIE0wLDQuMzc1IEwxNCw0LjM3NSBMMTQsNi4xMjUgTDAsNi4xMjUgTDAsNC4zNzUgWiBNMCw4Ljc1IEwxNCw4Ljc1IEwxNCwxMC41IEwwLDEwLjUgTDAsOC43NSBaJyBpZD0ncGF0aC0xJyUzRSUzQy9wYXRoJTNFJTNDL2RlZnMlM0UlM0NnIGlkPSfwn5KOLVVJLUVsZW1lbnRzJyBzdHJva2U9J25vbmUnIHN0cm9rZS13aWR0aD0nMScgZmlsbD0nbm9uZScgZmlsbC1ydWxlPSdldmVub2RkJyUzRSUzQ2cgaWQ9JzEyKS1OYXZiYXInIHRyYW5zZm9ybT0ndHJhbnNsYXRlKC0xMTc0LjAwMDAwMCwgLTEyOTAuMDAwMDAwKSclM0UlM0NnIGlkPSdHcm91cCcgdHJhbnNmb3JtPSd0cmFuc2xhdGUoMTE3NC4wMDAwMDAsIDEyODguMDAwMDAwKSclM0UlM0NnIGlkPSdJY29uLUNvbG9yJyB0cmFuc2Zvcm09J3RyYW5zbGF0ZSgwLjAwMDAwMCwgMi4wMDAwMDApJyUzRSUzQ3VzZSBmaWxsPSdyZ2JhKDI1NSwgMjU1LCAyNTUsIDAuOCknIHhsaW5rOmhyZWY9JyUyM3BhdGgtMSclM0UlM0MvdXNlJTNFJTNDdXNlIGZpbGwtb3BhY2l0eT0nMC4xJyBmaWxsPSdyZ2JhKDI1NSwgMjU1LCAyNTUsIDAuOCknIHhsaW5rOmhyZWY9JyUyM3BhdGgtMSclM0UlM0MvdXNlJTNFJTNDL2clM0UlM0MvZyUzRSUzQy9nJTNFJTNDL2clM0UlM0Mvc3ZnJTNFXCIpO1xufVxuLm5hdmJhci5iZy1pbmZvIC5uYXZiYXItdGV4dCB7XG4gIGNvbG9yOiAjZDJmNGZjO1xufVxuLm5hdmJhci5iZy1pbmZvIC5uYXZiYXItdGV4dCBhIHtcbiAgY29sb3I6ICNmZmY7XG59XG4ubmF2YmFyLmJnLWluZm8gLm5hdmJhci10ZXh0IGE6aG92ZXIsIC5uYXZiYXIuYmctaW5mbyAubmF2YmFyLXRleHQgYTpmb2N1cyB7XG4gIGNvbG9yOiAjZmZmO1xufVxuLm5hdmJhci5iZy1pbmZvIGhyIHtcbiAgYm9yZGVyLWNvbG9yOiByZ2JhKDI1NSwgMjU1LCAyNTUsIDAuMTUpO1xufVxuXG4ubmF2YmFyLmJnLXdhcm5pbmcge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZhYjAwICFpbXBvcnRhbnQ7XG4gIGNvbG9yOiAjZmZmNWUwO1xufVxuLm5hdmJhci5iZy13YXJuaW5nIC5uYXZiYXItYnJhbmQsXG4ubmF2YmFyLmJnLXdhcm5pbmcgLm5hdmJhci1icmFuZCBhIHtcbiAgY29sb3I6ICNmZmY7XG59XG4ubmF2YmFyLmJnLXdhcm5pbmcgLm5hdmJhci1icmFuZDpob3ZlciwgLm5hdmJhci5iZy13YXJuaW5nIC5uYXZiYXItYnJhbmQ6Zm9jdXMsXG4ubmF2YmFyLmJnLXdhcm5pbmcgLm5hdmJhci1icmFuZCBhOmhvdmVyLFxuLm5hdmJhci5iZy13YXJuaW5nIC5uYXZiYXItYnJhbmQgYTpmb2N1cyB7XG4gIGNvbG9yOiAjZmZmO1xufVxuLm5hdmJhci5iZy13YXJuaW5nIC5uYXZiYXItc2VhcmNoLXdyYXBwZXIgLm5hdmJhci1zZWFyY2gtaWNvbixcbi5uYXZiYXIuYmctd2FybmluZyAubmF2YmFyLXNlYXJjaC13cmFwcGVyIC5zZWFyY2gtaW5wdXQge1xuICBjb2xvcjogI2ZmZjVlMDtcbn1cbi5uYXZiYXIuYmctd2FybmluZyAuc2VhcmNoLWlucHV0LXdyYXBwZXIgLnNlYXJjaC1pbnB1dCxcbi5uYXZiYXIuYmctd2FybmluZyAuc2VhcmNoLWlucHV0LXdyYXBwZXIgLnNlYXJjaC10b2dnbGVyIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZmYWIwMCAhaW1wb3J0YW50O1xuICBjb2xvcjogI2ZmZjVlMDtcbn1cbi5uYXZiYXIuYmctd2FybmluZyAubmF2YmFyLW5hdiA+IC5uYXYtbGluayxcbi5uYXZiYXIuYmctd2FybmluZyAubmF2YmFyLW5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluayxcbi5uYXZiYXIuYmctd2FybmluZyAubmF2YmFyLW5hdiA+IC5uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbmsge1xuICBjb2xvcjogI2ZmZjVlMDtcbn1cbi5uYXZiYXIuYmctd2FybmluZyAubmF2YmFyLW5hdiA+IC5uYXYtbGluazpob3ZlciwgLm5hdmJhci5iZy13YXJuaW5nIC5uYXZiYXItbmF2ID4gLm5hdi1saW5rOmZvY3VzLFxuLm5hdmJhci5iZy13YXJuaW5nIC5uYXZiYXItbmF2ID4gLm5hdi1pdGVtID4gLm5hdi1saW5rOmhvdmVyLFxuLm5hdmJhci5iZy13YXJuaW5nIC5uYXZiYXItbmF2ID4gLm5hdi1pdGVtID4gLm5hdi1saW5rOmZvY3VzLFxuLm5hdmJhci5iZy13YXJuaW5nIC5uYXZiYXItbmF2ID4gLm5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluazpob3Zlcixcbi5uYXZiYXIuYmctd2FybmluZyAubmF2YmFyLW5hdiA+IC5uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbms6Zm9jdXMge1xuICBjb2xvcjogI2ZmZjtcbn1cbi5uYXZiYXIuYmctd2FybmluZyAubmF2YmFyLW5hdiA+IC5uYXYtbGluay5kaXNhYmxlZCxcbi5uYXZiYXIuYmctd2FybmluZyAubmF2YmFyLW5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluay5kaXNhYmxlZCxcbi5uYXZiYXIuYmctd2FybmluZyAubmF2YmFyLW5hdiA+IC5uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbmsuZGlzYWJsZWQge1xuICBjb2xvcjogI2ZmZDc4NiAhaW1wb3J0YW50O1xufVxuLm5hdmJhci5iZy13YXJuaW5nIC5uYXZiYXItbmF2IC5zaG93ID4gLm5hdi1saW5rLFxuLm5hdmJhci5iZy13YXJuaW5nIC5uYXZiYXItbmF2IC5hY3RpdmUgPiAubmF2LWxpbmssXG4ubmF2YmFyLmJnLXdhcm5pbmcgLm5hdmJhci1uYXYgLm5hdi1saW5rLnNob3csXG4ubmF2YmFyLmJnLXdhcm5pbmcgLm5hdmJhci1uYXYgLm5hdi1saW5rLmFjdGl2ZSB7XG4gIGNvbG9yOiAjZmZmO1xufVxuLm5hdmJhci5iZy13YXJuaW5nIC5uYXZiYXItdG9nZ2xlciB7XG4gIGNvbG9yOiAjZmZmNWUwO1xuICBib3JkZXItY29sb3I6IHJnYmEoMjU1LCAyNTUsIDI1NSwgMC4xNSk7XG59XG4ubmF2YmFyLmJnLXdhcm5pbmcgLm5hdmJhci10b2dnbGVyLWljb24ge1xuICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoXCJkYXRhOmltYWdlL3N2Zyt4bWwsJTNDc3ZnIHdpZHRoPScxNHB4JyBoZWlnaHQ9JzExcHgnIHZpZXdCb3g9JzAgMCAxNCAxMScgdmVyc2lvbj0nMS4xJyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHhtbG5zOnhsaW5rPSdodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rJyUzRSUzQ2RlZnMlM0UlM0NwYXRoIGQ9J00wLDAgTDE0LDAgTDE0LDEuNzUgTDAsMS43NSBMMCwwIFogTTAsNC4zNzUgTDE0LDQuMzc1IEwxNCw2LjEyNSBMMCw2LjEyNSBMMCw0LjM3NSBaIE0wLDguNzUgTDE0LDguNzUgTDE0LDEwLjUgTDAsMTAuNSBMMCw4Ljc1IFonIGlkPSdwYXRoLTEnJTNFJTNDL3BhdGglM0UlM0MvZGVmcyUzRSUzQ2cgaWQ9J/Cfko4tVUktRWxlbWVudHMnIHN0cm9rZT0nbm9uZScgc3Ryb2tlLXdpZHRoPScxJyBmaWxsPSdub25lJyBmaWxsLXJ1bGU9J2V2ZW5vZGQnJTNFJTNDZyBpZD0nMTIpLU5hdmJhcicgdHJhbnNmb3JtPSd0cmFuc2xhdGUoLTExNzQuMDAwMDAwLCAtMTI5MC4wMDAwMDApJyUzRSUzQ2cgaWQ9J0dyb3VwJyB0cmFuc2Zvcm09J3RyYW5zbGF0ZSgxMTc0LjAwMDAwMCwgMTI4OC4wMDAwMDApJyUzRSUzQ2cgaWQ9J0ljb24tQ29sb3InIHRyYW5zZm9ybT0ndHJhbnNsYXRlKDAuMDAwMDAwLCAyLjAwMDAwMCknJTNFJTNDdXNlIGZpbGw9J3JnYmEoMjU1LCAyNTUsIDI1NSwgMC44KScgeGxpbms6aHJlZj0nJTIzcGF0aC0xJyUzRSUzQy91c2UlM0UlM0N1c2UgZmlsbC1vcGFjaXR5PScwLjEnIGZpbGw9J3JnYmEoMjU1LCAyNTUsIDI1NSwgMC44KScgeGxpbms6aHJlZj0nJTIzcGF0aC0xJyUzRSUzQy91c2UlM0UlM0MvZyUzRSUzQy9nJTNFJTNDL2clM0UlM0MvZyUzRSUzQy9zdmclM0VcIik7XG59XG4ubmF2YmFyLmJnLXdhcm5pbmcgLm5hdmJhci10ZXh0IHtcbiAgY29sb3I6ICNmZmY1ZTA7XG59XG4ubmF2YmFyLmJnLXdhcm5pbmcgLm5hdmJhci10ZXh0IGEge1xuICBjb2xvcjogI2ZmZjtcbn1cbi5uYXZiYXIuYmctd2FybmluZyAubmF2YmFyLXRleHQgYTpob3ZlciwgLm5hdmJhci5iZy13YXJuaW5nIC5uYXZiYXItdGV4dCBhOmZvY3VzIHtcbiAgY29sb3I6ICNmZmY7XG59XG4ubmF2YmFyLmJnLXdhcm5pbmcgaHIge1xuICBib3JkZXItY29sb3I6IHJnYmEoMjU1LCAyNTUsIDI1NSwgMC4xNSk7XG59XG5cbi5uYXZiYXIuYmctZGFuZ2VyIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZmM2UxZCAhaW1wb3J0YW50O1xuICBjb2xvcjogI2ZmZDVjZTtcbn1cbi5uYXZiYXIuYmctZGFuZ2VyIC5uYXZiYXItYnJhbmQsXG4ubmF2YmFyLmJnLWRhbmdlciAubmF2YmFyLWJyYW5kIGEge1xuICBjb2xvcjogI2ZmZjtcbn1cbi5uYXZiYXIuYmctZGFuZ2VyIC5uYXZiYXItYnJhbmQ6aG92ZXIsIC5uYXZiYXIuYmctZGFuZ2VyIC5uYXZiYXItYnJhbmQ6Zm9jdXMsXG4ubmF2YmFyLmJnLWRhbmdlciAubmF2YmFyLWJyYW5kIGE6aG92ZXIsXG4ubmF2YmFyLmJnLWRhbmdlciAubmF2YmFyLWJyYW5kIGE6Zm9jdXMge1xuICBjb2xvcjogI2ZmZjtcbn1cbi5uYXZiYXIuYmctZGFuZ2VyIC5uYXZiYXItc2VhcmNoLXdyYXBwZXIgLm5hdmJhci1zZWFyY2gtaWNvbixcbi5uYXZiYXIuYmctZGFuZ2VyIC5uYXZiYXItc2VhcmNoLXdyYXBwZXIgLnNlYXJjaC1pbnB1dCB7XG4gIGNvbG9yOiAjZmZkNWNlO1xufVxuLm5hdmJhci5iZy1kYW5nZXIgLnNlYXJjaC1pbnB1dC13cmFwcGVyIC5zZWFyY2gtaW5wdXQsXG4ubmF2YmFyLmJnLWRhbmdlciAuc2VhcmNoLWlucHV0LXdyYXBwZXIgLnNlYXJjaC10b2dnbGVyIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZmM2UxZCAhaW1wb3J0YW50O1xuICBjb2xvcjogI2ZmZDVjZTtcbn1cbi5uYXZiYXIuYmctZGFuZ2VyIC5uYXZiYXItbmF2ID4gLm5hdi1saW5rLFxuLm5hdmJhci5iZy1kYW5nZXIgLm5hdmJhci1uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbmssXG4ubmF2YmFyLmJnLWRhbmdlciAubmF2YmFyLW5hdiA+IC5uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbmsge1xuICBjb2xvcjogI2ZmZDVjZTtcbn1cbi5uYXZiYXIuYmctZGFuZ2VyIC5uYXZiYXItbmF2ID4gLm5hdi1saW5rOmhvdmVyLCAubmF2YmFyLmJnLWRhbmdlciAubmF2YmFyLW5hdiA+IC5uYXYtbGluazpmb2N1cyxcbi5uYXZiYXIuYmctZGFuZ2VyIC5uYXZiYXItbmF2ID4gLm5hdi1pdGVtID4gLm5hdi1saW5rOmhvdmVyLFxuLm5hdmJhci5iZy1kYW5nZXIgLm5hdmJhci1uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbms6Zm9jdXMsXG4ubmF2YmFyLmJnLWRhbmdlciAubmF2YmFyLW5hdiA+IC5uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbms6aG92ZXIsXG4ubmF2YmFyLmJnLWRhbmdlciAubmF2YmFyLW5hdiA+IC5uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbms6Zm9jdXMge1xuICBjb2xvcjogI2ZmZjtcbn1cbi5uYXZiYXIuYmctZGFuZ2VyIC5uYXZiYXItbmF2ID4gLm5hdi1saW5rLmRpc2FibGVkLFxuLm5hdmJhci5iZy1kYW5nZXIgLm5hdmJhci1uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbmsuZGlzYWJsZWQsXG4ubmF2YmFyLmJnLWRhbmdlciAubmF2YmFyLW5hdiA+IC5uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbmsuZGlzYWJsZWQge1xuICBjb2xvcjogI2ZmOTk4NyAhaW1wb3J0YW50O1xufVxuLm5hdmJhci5iZy1kYW5nZXIgLm5hdmJhci1uYXYgLnNob3cgPiAubmF2LWxpbmssXG4ubmF2YmFyLmJnLWRhbmdlciAubmF2YmFyLW5hdiAuYWN0aXZlID4gLm5hdi1saW5rLFxuLm5hdmJhci5iZy1kYW5nZXIgLm5hdmJhci1uYXYgLm5hdi1saW5rLnNob3csXG4ubmF2YmFyLmJnLWRhbmdlciAubmF2YmFyLW5hdiAubmF2LWxpbmsuYWN0aXZlIHtcbiAgY29sb3I6ICNmZmY7XG59XG4ubmF2YmFyLmJnLWRhbmdlciAubmF2YmFyLXRvZ2dsZXIge1xuICBjb2xvcjogI2ZmZDVjZTtcbiAgYm9yZGVyLWNvbG9yOiByZ2JhKDI1NSwgMjU1LCAyNTUsIDAuMTUpO1xufVxuLm5hdmJhci5iZy1kYW5nZXIgLm5hdmJhci10b2dnbGVyLWljb24ge1xuICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoXCJkYXRhOmltYWdlL3N2Zyt4bWwsJTNDc3ZnIHdpZHRoPScxNHB4JyBoZWlnaHQ9JzExcHgnIHZpZXdCb3g9JzAgMCAxNCAxMScgdmVyc2lvbj0nMS4xJyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHhtbG5zOnhsaW5rPSdodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rJyUzRSUzQ2RlZnMlM0UlM0NwYXRoIGQ9J00wLDAgTDE0LDAgTDE0LDEuNzUgTDAsMS43NSBMMCwwIFogTTAsNC4zNzUgTDE0LDQuMzc1IEwxNCw2LjEyNSBMMCw2LjEyNSBMMCw0LjM3NSBaIE0wLDguNzUgTDE0LDguNzUgTDE0LDEwLjUgTDAsMTAuNSBMMCw4Ljc1IFonIGlkPSdwYXRoLTEnJTNFJTNDL3BhdGglM0UlM0MvZGVmcyUzRSUzQ2cgaWQ9J/Cfko4tVUktRWxlbWVudHMnIHN0cm9rZT0nbm9uZScgc3Ryb2tlLXdpZHRoPScxJyBmaWxsPSdub25lJyBmaWxsLXJ1bGU9J2V2ZW5vZGQnJTNFJTNDZyBpZD0nMTIpLU5hdmJhcicgdHJhbnNmb3JtPSd0cmFuc2xhdGUoLTExNzQuMDAwMDAwLCAtMTI5MC4wMDAwMDApJyUzRSUzQ2cgaWQ9J0dyb3VwJyB0cmFuc2Zvcm09J3RyYW5zbGF0ZSgxMTc0LjAwMDAwMCwgMTI4OC4wMDAwMDApJyUzRSUzQ2cgaWQ9J0ljb24tQ29sb3InIHRyYW5zZm9ybT0ndHJhbnNsYXRlKDAuMDAwMDAwLCAyLjAwMDAwMCknJTNFJTNDdXNlIGZpbGw9J3JnYmEoMjU1LCAyNTUsIDI1NSwgMC44KScgeGxpbms6aHJlZj0nJTIzcGF0aC0xJyUzRSUzQy91c2UlM0UlM0N1c2UgZmlsbC1vcGFjaXR5PScwLjEnIGZpbGw9J3JnYmEoMjU1LCAyNTUsIDI1NSwgMC44KScgeGxpbms6aHJlZj0nJTIzcGF0aC0xJyUzRSUzQy91c2UlM0UlM0MvZyUzRSUzQy9nJTNFJTNDL2clM0UlM0MvZyUzRSUzQy9zdmclM0VcIik7XG59XG4ubmF2YmFyLmJnLWRhbmdlciAubmF2YmFyLXRleHQge1xuICBjb2xvcjogI2ZmZDVjZTtcbn1cbi5uYXZiYXIuYmctZGFuZ2VyIC5uYXZiYXItdGV4dCBhIHtcbiAgY29sb3I6ICNmZmY7XG59XG4ubmF2YmFyLmJnLWRhbmdlciAubmF2YmFyLXRleHQgYTpob3ZlciwgLm5hdmJhci5iZy1kYW5nZXIgLm5hdmJhci10ZXh0IGE6Zm9jdXMge1xuICBjb2xvcjogI2ZmZjtcbn1cbi5uYXZiYXIuYmctZGFuZ2VyIGhyIHtcbiAgYm9yZGVyLWNvbG9yOiByZ2JhKDI1NSwgMjU1LCAyNTUsIDAuMTUpO1xufVxuXG4ubmF2YmFyLmJnLWRhcmsge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjMjMzNDQ2ICFpbXBvcnRhbnQ7XG4gIGNvbG9yOiAjZTRlNmU4O1xufVxuLm5hdmJhci5iZy1kYXJrIC5uYXZiYXItYnJhbmQsXG4ubmF2YmFyLmJnLWRhcmsgLm5hdmJhci1icmFuZCBhIHtcbiAgY29sb3I6ICNmZmY7XG59XG4ubmF2YmFyLmJnLWRhcmsgLm5hdmJhci1icmFuZDpob3ZlciwgLm5hdmJhci5iZy1kYXJrIC5uYXZiYXItYnJhbmQ6Zm9jdXMsXG4ubmF2YmFyLmJnLWRhcmsgLm5hdmJhci1icmFuZCBhOmhvdmVyLFxuLm5hdmJhci5iZy1kYXJrIC5uYXZiYXItYnJhbmQgYTpmb2N1cyB7XG4gIGNvbG9yOiAjZmZmO1xufVxuLm5hdmJhci5iZy1kYXJrIC5uYXZiYXItc2VhcmNoLXdyYXBwZXIgLm5hdmJhci1zZWFyY2gtaWNvbixcbi5uYXZiYXIuYmctZGFyayAubmF2YmFyLXNlYXJjaC13cmFwcGVyIC5zZWFyY2gtaW5wdXQge1xuICBjb2xvcjogI2U0ZTZlODtcbn1cbi5uYXZiYXIuYmctZGFyayAuc2VhcmNoLWlucHV0LXdyYXBwZXIgLnNlYXJjaC1pbnB1dCxcbi5uYXZiYXIuYmctZGFyayAuc2VhcmNoLWlucHV0LXdyYXBwZXIgLnNlYXJjaC10b2dnbGVyIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogIzIzMzQ0NiAhaW1wb3J0YW50O1xuICBjb2xvcjogI2U0ZTZlODtcbn1cbi5uYXZiYXIuYmctZGFyayAubmF2YmFyLW5hdiA+IC5uYXYtbGluayxcbi5uYXZiYXIuYmctZGFyayAubmF2YmFyLW5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluayxcbi5uYXZiYXIuYmctZGFyayAubmF2YmFyLW5hdiA+IC5uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbmsge1xuICBjb2xvcjogI2U0ZTZlODtcbn1cbi5uYXZiYXIuYmctZGFyayAubmF2YmFyLW5hdiA+IC5uYXYtbGluazpob3ZlciwgLm5hdmJhci5iZy1kYXJrIC5uYXZiYXItbmF2ID4gLm5hdi1saW5rOmZvY3VzLFxuLm5hdmJhci5iZy1kYXJrIC5uYXZiYXItbmF2ID4gLm5hdi1pdGVtID4gLm5hdi1saW5rOmhvdmVyLFxuLm5hdmJhci5iZy1kYXJrIC5uYXZiYXItbmF2ID4gLm5hdi1pdGVtID4gLm5hdi1saW5rOmZvY3VzLFxuLm5hdmJhci5iZy1kYXJrIC5uYXZiYXItbmF2ID4gLm5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluazpob3Zlcixcbi5uYXZiYXIuYmctZGFyayAubmF2YmFyLW5hdiA+IC5uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbms6Zm9jdXMge1xuICBjb2xvcjogI2ZmZjtcbn1cbi5uYXZiYXIuYmctZGFyayAubmF2YmFyLW5hdiA+IC5uYXYtbGluay5kaXNhYmxlZCxcbi5uYXZiYXIuYmctZGFyayAubmF2YmFyLW5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluay5kaXNhYmxlZCxcbi5uYXZiYXIuYmctZGFyayAubmF2YmFyLW5hdiA+IC5uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbmsuZGlzYWJsZWQge1xuICBjb2xvcjogIzk3OWZhNyAhaW1wb3J0YW50O1xufVxuLm5hdmJhci5iZy1kYXJrIC5uYXZiYXItbmF2IC5zaG93ID4gLm5hdi1saW5rLFxuLm5hdmJhci5iZy1kYXJrIC5uYXZiYXItbmF2IC5hY3RpdmUgPiAubmF2LWxpbmssXG4ubmF2YmFyLmJnLWRhcmsgLm5hdmJhci1uYXYgLm5hdi1saW5rLnNob3csXG4ubmF2YmFyLmJnLWRhcmsgLm5hdmJhci1uYXYgLm5hdi1saW5rLmFjdGl2ZSB7XG4gIGNvbG9yOiAjZmZmO1xufVxuLm5hdmJhci5iZy1kYXJrIC5uYXZiYXItdG9nZ2xlciB7XG4gIGNvbG9yOiAjZTRlNmU4O1xuICBib3JkZXItY29sb3I6IHJnYmEoMjU1LCAyNTUsIDI1NSwgMC4wNik7XG59XG4ubmF2YmFyLmJnLWRhcmsgLm5hdmJhci10b2dnbGVyLWljb24ge1xuICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoXCJkYXRhOmltYWdlL3N2Zyt4bWwsJTNDc3ZnIHdpZHRoPScxNHB4JyBoZWlnaHQ9JzExcHgnIHZpZXdCb3g9JzAgMCAxNCAxMScgdmVyc2lvbj0nMS4xJyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHhtbG5zOnhsaW5rPSdodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rJyUzRSUzQ2RlZnMlM0UlM0NwYXRoIGQ9J00wLDAgTDE0LDAgTDE0LDEuNzUgTDAsMS43NSBMMCwwIFogTTAsNC4zNzUgTDE0LDQuMzc1IEwxNCw2LjEyNSBMMCw2LjEyNSBMMCw0LjM3NSBaIE0wLDguNzUgTDE0LDguNzUgTDE0LDEwLjUgTDAsMTAuNSBMMCw4Ljc1IFonIGlkPSdwYXRoLTEnJTNFJTNDL3BhdGglM0UlM0MvZGVmcyUzRSUzQ2cgaWQ9J/Cfko4tVUktRWxlbWVudHMnIHN0cm9rZT0nbm9uZScgc3Ryb2tlLXdpZHRoPScxJyBmaWxsPSdub25lJyBmaWxsLXJ1bGU9J2V2ZW5vZGQnJTNFJTNDZyBpZD0nMTIpLU5hdmJhcicgdHJhbnNmb3JtPSd0cmFuc2xhdGUoLTExNzQuMDAwMDAwLCAtMTI5MC4wMDAwMDApJyUzRSUzQ2cgaWQ9J0dyb3VwJyB0cmFuc2Zvcm09J3RyYW5zbGF0ZSgxMTc0LjAwMDAwMCwgMTI4OC4wMDAwMDApJyUzRSUzQ2cgaWQ9J0ljb24tQ29sb3InIHRyYW5zZm9ybT0ndHJhbnNsYXRlKDAuMDAwMDAwLCAyLjAwMDAwMCknJTNFJTNDdXNlIGZpbGw9J3JnYmEoMjU1LCAyNTUsIDI1NSwgMC44KScgeGxpbms6aHJlZj0nJTIzcGF0aC0xJyUzRSUzQy91c2UlM0UlM0N1c2UgZmlsbC1vcGFjaXR5PScwLjEnIGZpbGw9J3JnYmEoMjU1LCAyNTUsIDI1NSwgMC44KScgeGxpbms6aHJlZj0nJTIzcGF0aC0xJyUzRSUzQy91c2UlM0UlM0MvZyUzRSUzQy9nJTNFJTNDL2clM0UlM0MvZyUzRSUzQy9zdmclM0VcIik7XG59XG4ubmF2YmFyLmJnLWRhcmsgLm5hdmJhci10ZXh0IHtcbiAgY29sb3I6ICNlNGU2ZTg7XG59XG4ubmF2YmFyLmJnLWRhcmsgLm5hdmJhci10ZXh0IGEge1xuICBjb2xvcjogI2ZmZjtcbn1cbi5uYXZiYXIuYmctZGFyayAubmF2YmFyLXRleHQgYTpob3ZlciwgLm5hdmJhci5iZy1kYXJrIC5uYXZiYXItdGV4dCBhOmZvY3VzIHtcbiAgY29sb3I6ICNmZmY7XG59XG4ubmF2YmFyLmJnLWRhcmsgaHIge1xuICBib3JkZXItY29sb3I6IHJnYmEoMjU1LCAyNTUsIDI1NSwgMC4wNik7XG59XG5cbi5uYXZiYXIuYmctZ3JheSB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNlY2VlZjEgIWltcG9ydGFudDtcbiAgY29sb3I6ICM4MjkxYTE7XG59XG4ubmF2YmFyLmJnLWdyYXkgLm5hdmJhci1icmFuZCxcbi5uYXZiYXIuYmctZ3JheSAubmF2YmFyLWJyYW5kIGEge1xuICBjb2xvcjogIzQzNTk3MTtcbn1cbi5uYXZiYXIuYmctZ3JheSAubmF2YmFyLWJyYW5kOmhvdmVyLCAubmF2YmFyLmJnLWdyYXkgLm5hdmJhci1icmFuZDpmb2N1cyxcbi5uYXZiYXIuYmctZ3JheSAubmF2YmFyLWJyYW5kIGE6aG92ZXIsXG4ubmF2YmFyLmJnLWdyYXkgLm5hdmJhci1icmFuZCBhOmZvY3VzIHtcbiAgY29sb3I6ICM0MzU5NzE7XG59XG4ubmF2YmFyLmJnLWdyYXkgLm5hdmJhci1zZWFyY2gtd3JhcHBlciAubmF2YmFyLXNlYXJjaC1pY29uLFxuLm5hdmJhci5iZy1ncmF5IC5uYXZiYXItc2VhcmNoLXdyYXBwZXIgLnNlYXJjaC1pbnB1dCB7XG4gIGNvbG9yOiAjODI5MWExO1xufVxuLm5hdmJhci5iZy1ncmF5IC5zZWFyY2gtaW5wdXQtd3JhcHBlciAuc2VhcmNoLWlucHV0LFxuLm5hdmJhci5iZy1ncmF5IC5zZWFyY2gtaW5wdXQtd3JhcHBlciAuc2VhcmNoLXRvZ2dsZXIge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjEpICFpbXBvcnRhbnQ7XG4gIGNvbG9yOiAjODI5MWExO1xufVxuLm5hdmJhci5iZy1ncmF5IC5uYXZiYXItbmF2ID4gLm5hdi1saW5rLFxuLm5hdmJhci5iZy1ncmF5IC5uYXZiYXItbmF2ID4gLm5hdi1pdGVtID4gLm5hdi1saW5rLFxuLm5hdmJhci5iZy1ncmF5IC5uYXZiYXItbmF2ID4gLm5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluayB7XG4gIGNvbG9yOiAjODI5MWExO1xufVxuLm5hdmJhci5iZy1ncmF5IC5uYXZiYXItbmF2ID4gLm5hdi1saW5rOmhvdmVyLCAubmF2YmFyLmJnLWdyYXkgLm5hdmJhci1uYXYgPiAubmF2LWxpbms6Zm9jdXMsXG4ubmF2YmFyLmJnLWdyYXkgLm5hdmJhci1uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbms6aG92ZXIsXG4ubmF2YmFyLmJnLWdyYXkgLm5hdmJhci1uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbms6Zm9jdXMsXG4ubmF2YmFyLmJnLWdyYXkgLm5hdmJhci1uYXYgPiAubmF2ID4gLm5hdi1pdGVtID4gLm5hdi1saW5rOmhvdmVyLFxuLm5hdmJhci5iZy1ncmF5IC5uYXZiYXItbmF2ID4gLm5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluazpmb2N1cyB7XG4gIGNvbG9yOiAjNDM1OTcxO1xufVxuLm5hdmJhci5iZy1ncmF5IC5uYXZiYXItbmF2ID4gLm5hdi1saW5rLmRpc2FibGVkLFxuLm5hdmJhci5iZy1ncmF5IC5uYXZiYXItbmF2ID4gLm5hdi1pdGVtID4gLm5hdi1saW5rLmRpc2FibGVkLFxuLm5hdmJhci5iZy1ncmF5IC5uYXZiYXItbmF2ID4gLm5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluay5kaXNhYmxlZCB7XG4gIGNvbG9yOiAjYWNiNmMxICFpbXBvcnRhbnQ7XG59XG4ubmF2YmFyLmJnLWdyYXkgLm5hdmJhci1uYXYgLnNob3cgPiAubmF2LWxpbmssXG4ubmF2YmFyLmJnLWdyYXkgLm5hdmJhci1uYXYgLmFjdGl2ZSA+IC5uYXYtbGluayxcbi5uYXZiYXIuYmctZ3JheSAubmF2YmFyLW5hdiAubmF2LWxpbmsuc2hvdyxcbi5uYXZiYXIuYmctZ3JheSAubmF2YmFyLW5hdiAubmF2LWxpbmsuYWN0aXZlIHtcbiAgY29sb3I6ICM0MzU5NzE7XG59XG4ubmF2YmFyLmJnLWdyYXkgLm5hdmJhci10b2dnbGVyIHtcbiAgY29sb3I6ICM4MjkxYTE7XG4gIGJvcmRlci1jb2xvcjogcmdiYSg2NywgODksIDExMywgMC4wNzgzODM1Mjk0KTtcbn1cbi5uYXZiYXIuYmctZ3JheSAubmF2YmFyLXRvZ2dsZXItaWNvbiB7XG4gIGJhY2tncm91bmQtaW1hZ2U6IHVybChcImRhdGE6aW1hZ2Uvc3ZnK3htbCwlM0Nzdmcgd2lkdGg9JzE0cHgnIGhlaWdodD0nMTFweCcgdmlld0JveD0nMCAwIDE0IDExJyB2ZXJzaW9uPScxLjEnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZycgeG1sbnM6eGxpbms9J2h0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsnJTNFJTNDZGVmcyUzRSUzQ3BhdGggZD0nTTAsMCBMMTQsMCBMMTQsMS43NSBMMCwxLjc1IEwwLDAgWiBNMCw0LjM3NSBMMTQsNC4zNzUgTDE0LDYuMTI1IEwwLDYuMTI1IEwwLDQuMzc1IFogTTAsOC43NSBMMTQsOC43NSBMMTQsMTAuNSBMMCwxMC41IEwwLDguNzUgWicgaWQ9J3BhdGgtMSclM0UlM0MvcGF0aCUzRSUzQy9kZWZzJTNFJTNDZyBpZD0n8J+Sji1VSS1FbGVtZW50cycgc3Ryb2tlPSdub25lJyBzdHJva2Utd2lkdGg9JzEnIGZpbGw9J25vbmUnIGZpbGwtcnVsZT0nZXZlbm9kZCclM0UlM0NnIGlkPScxMiktTmF2YmFyJyB0cmFuc2Zvcm09J3RyYW5zbGF0ZSgtMTE3NC4wMDAwMDAsIC0xMjkwLjAwMDAwMCknJTNFJTNDZyBpZD0nR3JvdXAnIHRyYW5zZm9ybT0ndHJhbnNsYXRlKDExNzQuMDAwMDAwLCAxMjg4LjAwMDAwMCknJTNFJTNDZyBpZD0nSWNvbi1Db2xvcicgdHJhbnNmb3JtPSd0cmFuc2xhdGUoMC4wMDAwMDAsIDIuMDAwMDAwKSclM0UlM0N1c2UgZmlsbD0ncmdiYSg2NywgODksIDExMywgMC41KScgeGxpbms6aHJlZj0nJTIzcGF0aC0xJyUzRSUzQy91c2UlM0UlM0N1c2UgZmlsbC1vcGFjaXR5PScwLjEnIGZpbGw9J3JnYmEoNjcsIDg5LCAxMTMsIDAuNSknIHhsaW5rOmhyZWY9JyUyM3BhdGgtMSclM0UlM0MvdXNlJTNFJTNDL2clM0UlM0MvZyUzRSUzQy9nJTNFJTNDL2clM0UlM0Mvc3ZnJTNFXCIpO1xufVxuLm5hdmJhci5iZy1ncmF5IC5uYXZiYXItdGV4dCB7XG4gIGNvbG9yOiAjODI5MWExO1xufVxuLm5hdmJhci5iZy1ncmF5IC5uYXZiYXItdGV4dCBhIHtcbiAgY29sb3I6ICM0MzU5NzE7XG59XG4ubmF2YmFyLmJnLWdyYXkgLm5hdmJhci10ZXh0IGE6aG92ZXIsIC5uYXZiYXIuYmctZ3JheSAubmF2YmFyLXRleHQgYTpmb2N1cyB7XG4gIGNvbG9yOiAjNDM1OTcxO1xufVxuLm5hdmJhci5iZy1ncmF5IGhyIHtcbiAgYm9yZGVyLWNvbG9yOiByZ2JhKDY3LCA4OSwgMTEzLCAwLjA3ODM4MzUyOTQpO1xufVxuXG4ubmF2YmFyLmJnLXdoaXRlIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2ZmZiAhaW1wb3J0YW50O1xuICBjb2xvcjogI2ExYWNiODtcbn1cbi5uYXZiYXIuYmctd2hpdGUgLm5hdmJhci1icmFuZCxcbi5uYXZiYXIuYmctd2hpdGUgLm5hdmJhci1icmFuZCBhIHtcbiAgY29sb3I6ICM2OTdhOGQ7XG59XG4ubmF2YmFyLmJnLXdoaXRlIC5uYXZiYXItYnJhbmQ6aG92ZXIsIC5uYXZiYXIuYmctd2hpdGUgLm5hdmJhci1icmFuZDpmb2N1cyxcbi5uYXZiYXIuYmctd2hpdGUgLm5hdmJhci1icmFuZCBhOmhvdmVyLFxuLm5hdmJhci5iZy13aGl0ZSAubmF2YmFyLWJyYW5kIGE6Zm9jdXMge1xuICBjb2xvcjogIzY5N2E4ZDtcbn1cbi5uYXZiYXIuYmctd2hpdGUgLm5hdmJhci1zZWFyY2gtd3JhcHBlciAubmF2YmFyLXNlYXJjaC1pY29uLFxuLm5hdmJhci5iZy13aGl0ZSAubmF2YmFyLXNlYXJjaC13cmFwcGVyIC5zZWFyY2gtaW5wdXQge1xuICBjb2xvcjogI2ExYWNiODtcbn1cbi5uYXZiYXIuYmctd2hpdGUgLnNlYXJjaC1pbnB1dC13cmFwcGVyIC5zZWFyY2gtaW5wdXQsXG4ubmF2YmFyLmJnLXdoaXRlIC5zZWFyY2gtaW5wdXQtd3JhcHBlciAuc2VhcmNoLXRvZ2dsZXIge1xuICBiYWNrZ3JvdW5kLWNvbG9yOiAjZmZmICFpbXBvcnRhbnQ7XG4gIGNvbG9yOiAjYTFhY2I4O1xufVxuLm5hdmJhci5iZy13aGl0ZSAubmF2YmFyLW5hdiA+IC5uYXYtbGluayxcbi5uYXZiYXIuYmctd2hpdGUgLm5hdmJhci1uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbmssXG4ubmF2YmFyLmJnLXdoaXRlIC5uYXZiYXItbmF2ID4gLm5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluayB7XG4gIGNvbG9yOiAjYTFhY2I4O1xufVxuLm5hdmJhci5iZy13aGl0ZSAubmF2YmFyLW5hdiA+IC5uYXYtbGluazpob3ZlciwgLm5hdmJhci5iZy13aGl0ZSAubmF2YmFyLW5hdiA+IC5uYXYtbGluazpmb2N1cyxcbi5uYXZiYXIuYmctd2hpdGUgLm5hdmJhci1uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbms6aG92ZXIsXG4ubmF2YmFyLmJnLXdoaXRlIC5uYXZiYXItbmF2ID4gLm5hdi1pdGVtID4gLm5hdi1saW5rOmZvY3VzLFxuLm5hdmJhci5iZy13aGl0ZSAubmF2YmFyLW5hdiA+IC5uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbms6aG92ZXIsXG4ubmF2YmFyLmJnLXdoaXRlIC5uYXZiYXItbmF2ID4gLm5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluazpmb2N1cyB7XG4gIGNvbG9yOiAjNjk3YThkO1xufVxuLm5hdmJhci5iZy13aGl0ZSAubmF2YmFyLW5hdiA+IC5uYXYtbGluay5kaXNhYmxlZCxcbi5uYXZiYXIuYmctd2hpdGUgLm5hdmJhci1uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbmsuZGlzYWJsZWQsXG4ubmF2YmFyLmJnLXdoaXRlIC5uYXZiYXItbmF2ID4gLm5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluay5kaXNhYmxlZCB7XG4gIGNvbG9yOiAjYzdjZGQ0ICFpbXBvcnRhbnQ7XG59XG4ubmF2YmFyLmJnLXdoaXRlIC5uYXZiYXItbmF2IC5zaG93ID4gLm5hdi1saW5rLFxuLm5hdmJhci5iZy13aGl0ZSAubmF2YmFyLW5hdiAuYWN0aXZlID4gLm5hdi1saW5rLFxuLm5hdmJhci5iZy13aGl0ZSAubmF2YmFyLW5hdiAubmF2LWxpbmsuc2hvdyxcbi5uYXZiYXIuYmctd2hpdGUgLm5hdmJhci1uYXYgLm5hdi1saW5rLmFjdGl2ZSB7XG4gIGNvbG9yOiAjNjk3YThkO1xufVxuLm5hdmJhci5iZy13aGl0ZSAubmF2YmFyLXRvZ2dsZXIge1xuICBjb2xvcjogI2ExYWNiODtcbiAgYm9yZGVyLWNvbG9yOiByZ2JhKDEwNSwgMTIyLCAxNDEsIDAuMDc1KTtcbn1cbi5uYXZiYXIuYmctd2hpdGUgLm5hdmJhci10b2dnbGVyLWljb24ge1xuICBiYWNrZ3JvdW5kLWltYWdlOiB1cmwoXCJkYXRhOmltYWdlL3N2Zyt4bWwsJTNDc3ZnIHdpZHRoPScxNHB4JyBoZWlnaHQ9JzExcHgnIHZpZXdCb3g9JzAgMCAxNCAxMScgdmVyc2lvbj0nMS4xJyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHhtbG5zOnhsaW5rPSdodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rJyUzRSUzQ2RlZnMlM0UlM0NwYXRoIGQ9J00wLDAgTDE0LDAgTDE0LDEuNzUgTDAsMS43NSBMMCwwIFogTTAsNC4zNzUgTDE0LDQuMzc1IEwxNCw2LjEyNSBMMCw2LjEyNSBMMCw0LjM3NSBaIE0wLDguNzUgTDE0LDguNzUgTDE0LDEwLjUgTDAsMTAuNSBMMCw4Ljc1IFonIGlkPSdwYXRoLTEnJTNFJTNDL3BhdGglM0UlM0MvZGVmcyUzRSUzQ2cgaWQ9J/Cfko4tVUktRWxlbWVudHMnIHN0cm9rZT0nbm9uZScgc3Ryb2tlLXdpZHRoPScxJyBmaWxsPSdub25lJyBmaWxsLXJ1bGU9J2V2ZW5vZGQnJTNFJTNDZyBpZD0nMTIpLU5hdmJhcicgdHJhbnNmb3JtPSd0cmFuc2xhdGUoLTExNzQuMDAwMDAwLCAtMTI5MC4wMDAwMDApJyUzRSUzQ2cgaWQ9J0dyb3VwJyB0cmFuc2Zvcm09J3RyYW5zbGF0ZSgxMTc0LjAwMDAwMCwgMTI4OC4wMDAwMDApJyUzRSUzQ2cgaWQ9J0ljb24tQ29sb3InIHRyYW5zZm9ybT0ndHJhbnNsYXRlKDAuMDAwMDAwLCAyLjAwMDAwMCknJTNFJTNDdXNlIGZpbGw9J3JnYmEoNjcsIDg5LCAxMTMsIDAuNSknIHhsaW5rOmhyZWY9JyUyM3BhdGgtMSclM0UlM0MvdXNlJTNFJTNDdXNlIGZpbGwtb3BhY2l0eT0nMC4xJyBmaWxsPSdyZ2JhKDY3LCA4OSwgMTEzLCAwLjUpJyB4bGluazpocmVmPSclMjNwYXRoLTEnJTNFJTNDL3VzZSUzRSUzQy9nJTNFJTNDL2clM0UlM0MvZyUzRSUzQy9nJTNFJTNDL3N2ZyUzRVwiKTtcbn1cbi5uYXZiYXIuYmctd2hpdGUgLm5hdmJhci10ZXh0IHtcbiAgY29sb3I6ICNhMWFjYjg7XG59XG4ubmF2YmFyLmJnLXdoaXRlIC5uYXZiYXItdGV4dCBhIHtcbiAgY29sb3I6ICM2OTdhOGQ7XG59XG4ubmF2YmFyLmJnLXdoaXRlIC5uYXZiYXItdGV4dCBhOmhvdmVyLCAubmF2YmFyLmJnLXdoaXRlIC5uYXZiYXItdGV4dCBhOmZvY3VzIHtcbiAgY29sb3I6ICM2OTdhOGQ7XG59XG4ubmF2YmFyLmJnLXdoaXRlIGhyIHtcbiAgYm9yZGVyLWNvbG9yOiByZ2JhKDEwNSwgMTIyLCAxNDEsIDAuMDc1KTtcbn1cblxuLm5hdmJhci5iZy1saWdodCB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNlY2VlZjEgIWltcG9ydGFudDtcbiAgY29sb3I6ICNhMWFjYjg7XG59XG4ubmF2YmFyLmJnLWxpZ2h0IC5uYXZiYXItYnJhbmQsXG4ubmF2YmFyLmJnLWxpZ2h0IC5uYXZiYXItYnJhbmQgYSB7XG4gIGNvbG9yOiAjNjk3YThkO1xufVxuLm5hdmJhci5iZy1saWdodCAubmF2YmFyLWJyYW5kOmhvdmVyLCAubmF2YmFyLmJnLWxpZ2h0IC5uYXZiYXItYnJhbmQ6Zm9jdXMsXG4ubmF2YmFyLmJnLWxpZ2h0IC5uYXZiYXItYnJhbmQgYTpob3Zlcixcbi5uYXZiYXIuYmctbGlnaHQgLm5hdmJhci1icmFuZCBhOmZvY3VzIHtcbiAgY29sb3I6ICM2OTdhOGQ7XG59XG4ubmF2YmFyLmJnLWxpZ2h0IC5uYXZiYXItc2VhcmNoLXdyYXBwZXIgLm5hdmJhci1zZWFyY2gtaWNvbixcbi5uYXZiYXIuYmctbGlnaHQgLm5hdmJhci1zZWFyY2gtd3JhcHBlciAuc2VhcmNoLWlucHV0IHtcbiAgY29sb3I6ICNhMWFjYjg7XG59XG4ubmF2YmFyLmJnLWxpZ2h0IC5zZWFyY2gtaW5wdXQtd3JhcHBlciAuc2VhcmNoLWlucHV0LFxuLm5hdmJhci5iZy1saWdodCAuc2VhcmNoLWlucHV0LXdyYXBwZXIgLnNlYXJjaC10b2dnbGVyIHtcbiAgYmFja2dyb3VuZC1jb2xvcjogcmdiYSg2NywgODksIDExMywgMC4xKSAhaW1wb3J0YW50O1xuICBjb2xvcjogI2ExYWNiODtcbn1cbi5uYXZiYXIuYmctbGlnaHQgLm5hdmJhci1uYXYgPiAubmF2LWxpbmssXG4ubmF2YmFyLmJnLWxpZ2h0IC5uYXZiYXItbmF2ID4gLm5hdi1pdGVtID4gLm5hdi1saW5rLFxuLm5hdmJhci5iZy1saWdodCAubmF2YmFyLW5hdiA+IC5uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbmsge1xuICBjb2xvcjogI2ExYWNiODtcbn1cbi5uYXZiYXIuYmctbGlnaHQgLm5hdmJhci1uYXYgPiAubmF2LWxpbms6aG92ZXIsIC5uYXZiYXIuYmctbGlnaHQgLm5hdmJhci1uYXYgPiAubmF2LWxpbms6Zm9jdXMsXG4ubmF2YmFyLmJnLWxpZ2h0IC5uYXZiYXItbmF2ID4gLm5hdi1pdGVtID4gLm5hdi1saW5rOmhvdmVyLFxuLm5hdmJhci5iZy1saWdodCAubmF2YmFyLW5hdiA+IC5uYXYtaXRlbSA+IC5uYXYtbGluazpmb2N1cyxcbi5uYXZiYXIuYmctbGlnaHQgLm5hdmJhci1uYXYgPiAubmF2ID4gLm5hdi1pdGVtID4gLm5hdi1saW5rOmhvdmVyLFxuLm5hdmJhci5iZy1saWdodCAubmF2YmFyLW5hdiA+IC5uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbms6Zm9jdXMge1xuICBjb2xvcjogIzY5N2E4ZDtcbn1cbi5uYXZiYXIuYmctbGlnaHQgLm5hdmJhci1uYXYgPiAubmF2LWxpbmsuZGlzYWJsZWQsXG4ubmF2YmFyLmJnLWxpZ2h0IC5uYXZiYXItbmF2ID4gLm5hdi1pdGVtID4gLm5hdi1saW5rLmRpc2FibGVkLFxuLm5hdmJhci5iZy1saWdodCAubmF2YmFyLW5hdiA+IC5uYXYgPiAubmF2LWl0ZW0gPiAubmF2LWxpbmsuZGlzYWJsZWQge1xuICBjb2xvcjogI2JmYzZjZiAhaW1wb3J0YW50O1xufVxuLm5hdmJhci5iZy1saWdodCAubmF2YmFyLW5hdiAuc2hvdyA+IC5uYXYtbGluayxcbi5uYXZiYXIuYmctbGlnaHQgLm5hdmJhci1uYXYgLmFjdGl2ZSA+IC5uYXYtbGluayxcbi5uYXZiYXIuYmctbGlnaHQgLm5hdmJhci1uYXYgLm5hdi1saW5rLnNob3csXG4ubmF2YmFyLmJnLWxpZ2h0IC5uYXZiYXItbmF2IC5uYXYtbGluay5hY3RpdmUge1xuICBjb2xvcjogIzY5N2E4ZDtcbn1cbi5uYXZiYXIuYmctbGlnaHQgLm5hdmJhci10b2dnbGVyIHtcbiAgY29sb3I6ICNhMWFjYjg7XG4gIGJvcmRlci1jb2xvcjogcmdiYSgxMDUsIDEyMiwgMTQxLCAwLjA3ODM4MzUyOTQpO1xufVxuLm5hdmJhci5iZy1saWdodCAubmF2YmFyLXRvZ2dsZXItaWNvbiB7XG4gIGJhY2tncm91bmQtaW1hZ2U6IHVybChcImRhdGE6aW1hZ2Uvc3ZnK3htbCwlM0Nzdmcgd2lkdGg9JzE0cHgnIGhlaWdodD0nMTFweCcgdmlld0JveD0nMCAwIDE0IDExJyB2ZXJzaW9uPScxLjEnIHhtbG5zPSdodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZycgeG1sbnM6eGxpbms9J2h0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsnJTNFJTNDZGVmcyUzRSUzQ3BhdGggZD0nTTAsMCBMMTQsMCBMMTQsMS43NSBMMCwxLjc1IEwwLDAgWiBNMCw0LjM3NSBMMTQsNC4zNzUgTDE0LDYuMTI1IEwwLDYuMTI1IEwwLDQuMzc1IFogTTAsOC43NSBMMTQsOC43NSBMMTQsMTAuNSBMMCwxMC41IEwwLDguNzUgWicgaWQ9J3BhdGgtMSclM0UlM0MvcGF0aCUzRSUzQy9kZWZzJTNFJTNDZyBpZD0n8J+Sji1VSS1FbGVtZW50cycgc3Ryb2tlPSdub25lJyBzdHJva2Utd2lkdGg9JzEnIGZpbGw9J25vbmUnIGZpbGwtcnVsZT0nZXZlbm9kZCclM0UlM0NnIGlkPScxMiktTmF2YmFyJyB0cmFuc2Zvcm09J3RyYW5zbGF0ZSgtMTE3NC4wMDAwMDAsIC0xMjkwLjAwMDAwMCknJTNFJTNDZyBpZD0nR3JvdXAnIHRyYW5zZm9ybT0ndHJhbnNsYXRlKDExNzQuMDAwMDAwLCAxMjg4LjAwMDAwMCknJTNFJTNDZyBpZD0nSWNvbi1Db2xvcicgdHJhbnNmb3JtPSd0cmFuc2xhdGUoMC4wMDAwMDAsIDIuMDAwMDAwKSclM0UlM0N1c2UgZmlsbD0ncmdiYSg2NywgODksIDExMywgMC41KScgeGxpbms6aHJlZj0nJTIzcGF0aC0xJyUzRSUzQy91c2UlM0UlM0N1c2UgZmlsbC1vcGFjaXR5PScwLjEnIGZpbGw9J3JnYmEoNjcsIDg5LCAxMTMsIDAuNSknIHhsaW5rOmhyZWY9JyUyM3BhdGgtMSclM0UlM0MvdXNlJTNFJTNDL2clM0UlM0MvZyUzRSUzQy9nJTNFJTNDL2clM0UlM0Mvc3ZnJTNFXCIpO1xufVxuLm5hdmJhci5iZy1saWdodCAubmF2YmFyLXRleHQge1xuICBjb2xvcjogI2ExYWNiODtcbn1cbi5uYXZiYXIuYmctbGlnaHQgLm5hdmJhci10ZXh0IGEge1xuICBjb2xvcjogIzY5N2E4ZDtcbn1cbi5uYXZiYXIuYmctbGlnaHQgLm5hdmJhci10ZXh0IGE6aG92ZXIsIC5uYXZiYXIuYmctbGlnaHQgLm5hdmJhci10ZXh0IGE6Zm9jdXMge1xuICBjb2xvcjogIzY5N2E4ZDtcbn1cbi5uYXZiYXIuYmctbGlnaHQgaHIge1xuICBib3JkZXItY29sb3I6IHJnYmEoMTA1LCAxMjIsIDE0MSwgMC4wNzgzODM1Mjk0KTtcbn1cblxuLmZvb3Rlci5iZy13aGl0ZSB7XG4gIGJhY2tncm91bmQtY29sb3I6ICNmZmYgIWltcG9ydGFudDtcbiAgY29sb3I6ICNhMWFjYjg7XG59XG4uZm9vdGVyLmJnLXdoaXRlIC5mb290ZXItbGluayB7XG4gIGNvbG9yOiAjYTFhY2I4O1xufVxuLmZvb3Rlci5iZy13aGl0ZSAuZm9vdGVyLWxpbms6aG92ZXIsIC5mb290ZXIuYmctd2hpdGUgLmZvb3Rlci1saW5rOmZvY3VzIHtcbiAgY29sb3I6ICM2OTdhOGQ7XG59XG4uZm9vdGVyLmJnLXdoaXRlIC5mb290ZXItbGluay5kaXNhYmxlZCB7XG4gIGNvbG9yOiAjYzdjZGQ0ICFpbXBvcnRhbnQ7XG59XG4uZm9vdGVyLmJnLXdoaXRlIC5mb290ZXItdGV4dCB7XG4gIGNvbG9yOiAjNjk3YThkO1xufVxuLmZvb3Rlci5iZy13aGl0ZSAuc2hvdyA+IC5mb290ZXItbGluayxcbi5mb290ZXIuYmctd2hpdGUgLmFjdGl2ZSA+IC5mb290ZXItbGluayxcbi5mb290ZXIuYmctd2hpdGUgLmZvb3Rlci1saW5rLnNob3csXG4uZm9vdGVyLmJnLXdoaXRlIC5mb290ZXItbGluay5hY3RpdmUge1xuICBjb2xvcjogIzY5N2E4ZDtcbn1cbi5mb290ZXIuYmctd2hpdGUgaHIge1xuICBib3JkZXItY29sb3I6IHJnYmEoMTA1LCAxMjIsIDE0MSwgMC4wNzUpO1xufVxuXG4uZm9vdGVyLmJnLWxpZ2h0IHtcbiAgYmFja2dyb3VuZC1jb2xvcjogI2VjZWVmMSAhaW1wb3J0YW50O1xuICBjb2xvcjogI2ExYWNiODtcbn1cbi5mb290ZXIuYmctbGlnaHQgLmZvb3Rlci1saW5rIHtcbiAgY29sb3I6ICNhMWFjYjg7XG59XG4uZm9vdGVyLmJnLWxpZ2h0IC5mb290ZXItbGluazpob3ZlciwgLmZvb3Rlci5iZy1saWdodCAuZm9vdGVyLWxpbms6Zm9jdXMge1xuICBjb2xvcjogIzY5N2E4ZDtcbn1cbi5mb290ZXIuYmctbGlnaHQgLmZvb3Rlci1saW5rLmRpc2FibGVkIHtcbiAgY29sb3I6ICNiZmM2Y2YgIWltcG9ydGFudDtcbn1cbi5mb290ZXIuYmctbGlnaHQgLmZvb3Rlci10ZXh0IHtcbiAgY29sb3I6ICM2OTdhOGQ7XG59XG4uZm9vdGVyLmJnLWxpZ2h0IC5zaG93ID4gLmZvb3Rlci1saW5rLFxuLmZvb3Rlci5iZy1saWdodCAuYWN0aXZlID4gLmZvb3Rlci1saW5rLFxuLmZvb3Rlci5iZy1saWdodCAuZm9vdGVyLWxpbmsuc2hvdyxcbi5mb290ZXIuYmctbGlnaHQgLmZvb3Rlci1saW5rLmFjdGl2ZSB7XG4gIGNvbG9yOiAjNjk3YThkO1xufVxuLmZvb3Rlci5iZy1saWdodCBociB7XG4gIGJvcmRlci1jb2xvcjogcmdiYSgxMDUsIDEyMiwgMTQxLCAwLjA3ODM4MzUyOTQpO1xufVxuIl19 */
@charset "UTF-8";
.layout-navbar-fixed .layout-wrapper:not(.layout-horizontal) .layout-page:before {
  content: "";
  width: 100%;
  height: 0.75rem;
  position: fixed;
  top: 0px;
  z-index: 10;
}


.layout-wrapper:not(.layout-horizontal) .bg-menu-theme .menu-inner .menu-item .menu-link {
  border-radius: 0.375rem;
}
.layout-horizontal .bg-menu-theme .menu-inner > .menu-item > .menu-link {
  border-radius: 0.375rem;
}
@media (min-width: 1200px) {
  .layout-horizontal .bg-menu-theme .menu-inner > .menu-item {
    margin: 0.565rem 0;
  }
  .layout-horizontal .bg-menu-theme .menu-inner > .menu-item:not(:first-child) {
    margin-left: 0.0625rem;
  }
  .layout-horizontal .bg-menu-theme .menu-inner > .menu-item:not(:last-child) {
    margin-right: 0.0625rem;
  }
  .layout-horizontal .bg-menu-theme .menu-inner > .menu-item .menu-sub {
    box-shadow: 0 0.25rem 1rem rgba(161, 172, 184, 0.45);
  }
}
.layout-wrapper:not(.layout-horizontal) .bg-menu-theme .menu-inner > .menu-item.active:before {
  content: "";
  position: absolute;
  right: 0;
  width: 0.25rem;
  height: 2.6845rem;
  border-radius: 0.375rem 0 0 0.375rem;
}
.bg-menu-theme .menu-sub > .menu-item > .menu-link:before {
  content: "";
  position: absolute;
  left: 1.4375rem;
  width: 0.375rem;
  height: 0.375rem;
  border-radius: 50%;
}
.layout-horizontal .bg-menu-theme .menu-sub > .menu-item > .menu-link:before {
  left: 1.3rem;
}
.bg-menu-theme .menu-horizontal-wrapper > .menu-inner > .menu-item > .menu-sub > .menu-item > .menu-link:before {
  display: none;
}
.bg-menu-theme .menu-sub > .menu-item.active > .menu-link:not(.menu-toggle):before {
  left: 1.1875rem;
  width: 0.875rem;
  height: 0.875rem;
}
.layout-horizontal .bg-menu-theme .menu-sub > .menu-item.active > .menu-link:not(.menu-toggle):before {
  left: 1.1rem;
}

.layout-menu-hover .layout-menu {
  box-shadow: 0 0.625rem 1.25rem rgba(161, 172, 184, 0.5);
  transition: all 0.3s ease-in-out;
}

.app-brand .layout-menu-toggle {
  position: absolute;
  left: 15rem;
  border-radius: 50%;
}
.app-brand .layout-menu-toggle i {
  width: 1.5rem;
  height: 1.5rem;
  transition: all 0.3s ease-in-out;
}
@media (max-width: 1199.98px) {
  .app-brand .layout-menu-toggle {
    display: none ;
  }
  .layout-menu-expanded .app-brand .layout-menu-toggle {
    display: block ;
  }
}

.text-primary {
  color: #696cff ;
}

.text-body[href]:hover {
  color: #5f61e6 ;
}

.bg-primary {
  background-color: #696cff ;
}

a.bg-primary:hover, a.bg-primary:focus {
  background-color: #6467f2 ;
}

.dropdown-notifications-item:not(.mark-as-read) .dropdown-notifications-read span {
  background-color: #696cff;
}

.bg-label-primary {
  background-color: #e7e7ff ;
  color: #696cff ;
}

.border-label-primary {
  border: 3px solid #c3c4ff ;
}

.border-light-primary {
  border: 3px solid rgba(105, 108, 255, 0.08);
}

.page-item.active .page-link, .page-item.active .page-link:hover, .page-item.active .page-link:focus,
.pagination li.active > a:not(.page-link),
.pagination li.active > a:not(.page-link):hover,
.pagination li.active > a:not(.page-link):focus {
  border-color: #696cff;
  background-color: #696cff;
  color: #fff;
  box-shadow: 0 0.125rem 0.25rem rgba(105, 108, 255, 0.4);
}

.progress-bar {
  background-color: #696cff;
  color: #fff;
  box-shadow: 0 2px 4px 0 rgba(105, 108, 255, 0.4);
}

.list-group-item-primary {
  background-color: #e1e2ff;
  color: #696cff ;
}

a.list-group-item-primary,
button.list-group-item-primary {
  color: #696cff;
}
a.list-group-item-primary:hover, a.list-group-item-primary:focus,
button.list-group-item-primary:hover,
button.list-group-item-primary:focus {
  background-color: #d6d7f2;
  color: #696cff;
}
a.list-group-item-primary.active,
button.list-group-item-primary.active {
  border-color: #696cff;
  background-color: #696cff;
  color: #696cff;
}

.list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus {
  border-color: #696cff;
  background-color: #696cff;
}

.alert-primary {
  background-color: #e7e7ff;
  border-color: #d2d3ff;
  color: #696cff;
}
.alert-primary .btn-close {
  background-image: url("data:image/svg+xml,%3Csvg width='150px' height='151px' viewBox='0 0 150 151' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpolygon id='path-1' points='131.251657 0 74.9933705 56.25 18.7483426 0 0 18.75 56.2450278 75 0 131.25 18.7483426 150 74.9933705 93.75 131.251657 150 150 131.25 93.7549722 75 150 18.75'%3E%3C/polygon%3E%3C/defs%3E%3Cg id='🎨-%5BSetup%5D:-Colors-&amp;-Shadows' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Artboard' transform='translate(-225.000000, -250.000000)'%3E%3Cg id='Icon-Color' transform='translate(225.000000, 250.500000)'%3E%3Cuse fill='%23696cff' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.5' fill='%23696cff' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.alert-primary .alert-link {
  color: #696cff;
}

.card .alert-primary hr {
  background-color: #696cff ;
}

.table-primary {
  --bs-table-bg: #e1e2ff;
  --bs-table-striped-bg: #dcdefb;
  --bs-table-striped-color: #435971;
  --bs-table-active-bg: #d1d4f1;
  --bs-table-active-color: #435971;
  --bs-table-hover-bg: #d8daf6;
  --bs-table-hover-color: #435971;
  color: #435971;
  border-color: #d1d4f1;
}
.table-primary th {
  border-bottom-color: inherit ;
}
.table-primary .btn-icon {
  color: #435971;
}

.btn-primary {
  color: #fff;
  background-color: #696cff;
  border-color: #696cff;
  box-shadow: 0 0.125rem 0.25rem 0 rgba(105, 108, 255, 0.4);
}
.btn-primary:hover {
  color: #fff;
  background-color: #5f61e6;
  border-color: #5f61e6;
  transform: translateY(-1px);
}
.btn-check:focus + .btn-primary, .btn-primary:focus, .btn-primary.focus {
  color: #fff;
  background-color: #5f61e6;
  border-color: #5f61e6;
  transform: translateY(0);
  box-shadow: none;
}
.btn-check:checked + .btn-primary, .btn-check:active + .btn-primary, .btn-primary:active, .btn-primary.active, .show > .btn-primary.dropdown-toggle {
  color: #fff;
  background-color: #595cd9;
  border-color: #595cd9;
}
.btn-check:checked + .btn-primary:focus, .btn-check:active + .btn-primary:focus, .btn-primary:active:focus, .btn-primary.active:focus, .show > .btn-primary.dropdown-toggle:focus {
  box-shadow: none;
}
.btn-primary.disabled, .btn-primary:disabled {
  box-shadow: none;
}

.btn-outline-primary {
  color: #696cff;
  border-color: #696cff;
  background: transparent;
}
.btn-outline-primary:hover {
  color: #fff;
  background-color: #5f61e6;
  border-color: #5f61e6;
  box-shadow: 0 0.125rem 0.25rem 0 rgba(105, 108, 255, 0.4);
  transform: translateY(-1px);
}
.btn-check:focus + .btn-outline-primary, .btn-outline-primary:focus {
  color: #fff;
  background-color: #5f61e6;
  border-color: #5f61e6;
  box-shadow: none;
  transform: translateY(0);
}
.btn-check:checked + .btn-outline-primary, .btn-check:active + .btn-outline-primary, .btn-outline-primary:active, .btn-outline-primary.active, .btn-outline-primary.dropdown-toggle.show {
  color: #fff;
  background-color: #595cd9;
  border-color: #595cd9;
}
.btn-check:checked + .btn-outline-primary:focus, .btn-check:active + .btn-outline-primary:focus, .btn-outline-primary:active:focus, .btn-outline-primary.active:focus, .btn-outline-primary.dropdown-toggle.show:focus {
  box-shadow: none;
}
.btn-outline-primary.disabled, .btn-outline-primary:disabled {
  box-shadow: none;
}

.btn-outline-primary .badge {
  background: #696cff;
  border-color: #696cff;
  color: #fff;
}

.btn-outline-primary:hover .badge,
.btn-outline-primary:focus:hover .badge,
.btn-outline-primary:active .badge,
.btn-outline-primary.active .badge,
.show > .btn-outline-primary.dropdown-toggle .badge {
  background: #fff;
  border-color: #fff;
  color: #696cff;
}

.dropdown-item:not(.disabled).active,
.dropdown-item:not(.disabled):active {
  background-color: rgba(105, 108, 255, 0.08);
  color: #696cff ;
}

.dropdown-menu > li:not(.disabled) > a:not(.dropdown-item):active,
.dropdown-menu > li.active:not(.disabled) > a:not(.dropdown-item) {
  background-color: rgba(105, 108, 255, 0.08);
  color: #696cff ;
}

.nav .nav-link:hover, .nav .nav-link:focus {
  color: #5f61e6;
}

.nav-pills .nav-link.active, .nav-pills .nav-link.active:hover, .nav-pills .nav-link.active:focus {
  background-color: #696cff;
  color: #fff;
  box-shadow: 0 2px 4px 0 rgba(105, 108, 255, 0.4);
}

.form-control:focus,
.form-select:focus {
  border-color: #696cff;
}

.input-group:focus-within .form-control,
.input-group:focus-within .input-group-text {
  border-color: #696cff;
}

.form-check-input:focus {
  border-color: #696cff;
  box-shadow: 0 2px 4px 0 rgba(105, 108, 255, 0.4);
}
.form-check-input:disabled {
  background-color: #eceef1;
}
.form-check-input:checked, .form-check-input[type=checkbox]:indeterminate {
  background-color: #696cff;
  border-color: #696cff;
  box-shadow: 0 2px 4px 0 rgba(105, 108, 255, 0.4);
}

.custom-option.checked {
  border: 1px solid #696cff;
}

.form-switch .form-check-input:focus {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23696cff'/%3e%3c/svg%3e");
}
.form-switch .form-check-input:checked {
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23fff'/%3e%3c/svg%3e");
}

.form-control:focus ~ .form-label {
  border-color: #696cff;
}
.form-control:focus ~ .form-label::after {
  border-color: inherit;
}

.divider.divider-primary .divider-text:before, .divider.divider-primary .divider-text:after {
  border-color: #696cff;
}

.navbar.bg-primary {
  background-color: #696cff ;
  color: #e0e1ff;
}
.navbar.bg-primary .navbar-brand,
.navbar.bg-primary .navbar-brand a {
  color: #fff;
}
.navbar.bg-primary .navbar-brand:hover, .navbar.bg-primary .navbar-brand:focus,
.navbar.bg-primary .navbar-brand a:hover,
.navbar.bg-primary .navbar-brand a:focus {
  color: #fff;
}
.navbar.bg-primary .navbar-search-wrapper .navbar-search-icon,
.navbar.bg-primary .navbar-search-wrapper .search-input {
  color: #e0e1ff;
}
.navbar.bg-primary .search-input-wrapper .search-input,
.navbar.bg-primary .search-input-wrapper .search-toggler {
  background-color: #696cff ;
  color: #e0e1ff;
}
.navbar.bg-primary .navbar-nav > .nav-link,
.navbar.bg-primary .navbar-nav > .nav-item > .nav-link,
.navbar.bg-primary .navbar-nav > .nav > .nav-item > .nav-link {
  color: #e0e1ff;
}
.navbar.bg-primary .navbar-nav > .nav-link:hover, .navbar.bg-primary .navbar-nav > .nav-link:focus,
.navbar.bg-primary .navbar-nav > .nav-item > .nav-link:hover,
.navbar.bg-primary .navbar-nav > .nav-item > .nav-link:focus,
.navbar.bg-primary .navbar-nav > .nav > .nav-item > .nav-link:hover,
.navbar.bg-primary .navbar-nav > .nav > .nav-item > .nav-link:focus {
  color: #fff;
}
.navbar.bg-primary .navbar-nav > .nav-link.disabled,
.navbar.bg-primary .navbar-nav > .nav-item > .nav-link.disabled,
.navbar.bg-primary .navbar-nav > .nav > .nav-item > .nav-link.disabled {
  color: #b0b2ff ;
}
.navbar.bg-primary .navbar-nav .show > .nav-link,
.navbar.bg-primary .navbar-nav .active > .nav-link,
.navbar.bg-primary .navbar-nav .nav-link.show,
.navbar.bg-primary .navbar-nav .nav-link.active {
  color: #fff;
}
.navbar.bg-primary .navbar-toggler {
  color: #e0e1ff;
  border-color: rgba(255, 255, 255, 0.15);
}
.navbar.bg-primary .navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3Csvg width='14px' height='11px' viewBox='0 0 14 11' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpath d='M0,0 L14,0 L14,1.75 L0,1.75 L0,0 Z M0,4.375 L14,4.375 L14,6.125 L0,6.125 L0,4.375 Z M0,8.75 L14,8.75 L14,10.5 L0,10.5 L0,8.75 Z' id='path-1'%3E%3C/path%3E%3C/defs%3E%3Cg id='💎-UI-Elements' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='12)-Navbar' transform='translate(-1174.000000, -1290.000000)'%3E%3Cg id='Group' transform='translate(1174.000000, 1288.000000)'%3E%3Cg id='Icon-Color' transform='translate(0.000000, 2.000000)'%3E%3Cuse fill='rgba(255, 255, 255, 0.8)' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.1' fill='rgba(255, 255, 255, 0.8)' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.navbar.bg-primary .navbar-text {
  color: #e0e1ff;
}
.navbar.bg-primary .navbar-text a {
  color: #fff;
}
.navbar.bg-primary .navbar-text a:hover, .navbar.bg-primary .navbar-text a:focus {
  color: #fff;
}
.navbar.bg-primary hr {
  border-color: rgba(255, 255, 255, 0.15);
}

.menu.bg-primary {
  background-color: #696cff ;
  color: #e0e1ff;
}
.menu.bg-primary .menu-link,
.menu.bg-primary .menu-horizontal-prev,
.menu.bg-primary .menu-horizontal-next {
  color: #e0e1ff;
}
.menu.bg-primary .menu-link:hover, .menu.bg-primary .menu-link:focus,
.menu.bg-primary .menu-horizontal-prev:hover,
.menu.bg-primary .menu-horizontal-prev:focus,
.menu.bg-primary .menu-horizontal-next:hover,
.menu.bg-primary .menu-horizontal-next:focus {
  color: #fff;
}
.menu.bg-primary .menu-link.active,
.menu.bg-primary .menu-horizontal-prev.active,
.menu.bg-primary .menu-horizontal-next.active {
  color: #fff;
}
.menu.bg-primary .menu-item.disabled .menu-link,
.menu.bg-primary .menu-horizontal-prev.disabled,
.menu.bg-primary .menu-horizontal-next.disabled {
  color: #b0b2ff ;
}
.menu.bg-primary .menu-item.open:not(.menu-item-closing) > .menu-toggle,
.menu.bg-primary .menu-item.active > .menu-link {
  color: #fff;
}
.menu.bg-primary .menu-item.active > .menu-link:not(.menu-toggle) {
  background-color: #6d70ff;
}
.menu.bg-primary.menu-horizontal .menu-sub > .menu-item.active > .menu-link:not(.menu-toggle) {
  background-color: #7174ff;
}
.menu.bg-primary.menu-horizontal .menu-inner .menu-item:not(.menu-item-closing) > .menu-sub, .menu.bg-primary.menu-horizontal .menu-inner .menu-item.open > .menu-toggle {
  background: #6d70ff;
}
.menu.bg-primary .menu-inner > .menu-item.menu-item-closing .menu-item.open .menu-sub,
.menu.bg-primary .menu-inner > .menu-item.menu-item-closing .menu-item.open .menu-toggle {
  background: transparent;
  color: #e0e1ff;
}
.menu.bg-primary .menu-inner-shadow {
  background: linear-gradient(#696cff 41%, rgba(105, 108, 255, 0.11) 95%, rgba(105, 108, 255, 0));
}
.menu.bg-primary .menu-text {
  color: #fff;
}
.menu.bg-primary .menu-header {
  color: #c2c4ff;
}
.menu.bg-primary hr,
.menu.bg-primary .menu-divider,
.menu.bg-primary .menu-inner > .menu-item.open > .menu-sub::before {
  border-color: rgba(255, 255, 255, 0.15) ;
}
.menu.bg-primary .menu-inner > .menu-header::before {
  background-color: rgba(255, 255, 255, 0.15);
}
.menu.bg-primary .menu-block::before {
  background-color: #c2c4ff;
}
.menu.bg-primary .menu-inner > .menu-item.open .menu-item.open > .menu-toggle::before {
  background-color: #8385ff;
}
.menu.bg-primary .menu-inner > .menu-item.open .menu-item.active > .menu-link::before {
  background-color: #fff;
}
.menu.bg-primary .menu-inner > .menu-item.open .menu-item.open > .menu-toggle::before,
.menu.bg-primary .menu-inner > .menu-item.open .menu-item.active > .menu-link::before {
  box-shadow: 0 0 0 2px #6d70ff;
}
.menu.bg-primary .ps__thumb-y,
.menu.bg-primary .ps__rail-y.ps--clicking > .ps__thumb-y {
  background: rgba(255, 255, 255, 0.5942917647) ;
}

.footer.bg-primary {
  background-color: #696cff ;
  color: #e0e1ff;
}
.footer.bg-primary .footer-link {
  color: #e0e1ff;
}
.footer.bg-primary .footer-link:hover, .footer.bg-primary .footer-link:focus {
  color: #fff;
}
.footer.bg-primary .footer-link.disabled {
  color: #b0b2ff ;
}
.footer.bg-primary .footer-text {
  color: #fff;
}
.footer.bg-primary .show > .footer-link,
.footer.bg-primary .active > .footer-link,
.footer.bg-primary .footer-link.show,
.footer.bg-primary .footer-link.active {
  color: #fff;
}
.footer.bg-primary hr {
  border-color: rgba(255, 255, 255, 0.15);
}

.bg-primary.toast, .bg-primary.bs-toast {
  color: #fff;
  background-color: rgba(105, 108, 255, 0.85) ;
  box-shadow: 0 0.25rem 1rem rgba(105, 108, 255, 0.4);
}
.bg-primary.toast .toast-header, .bg-primary.bs-toast .toast-header {
  color: #fff;
}
.bg-primary.toast .toast-header .btn-close, .bg-primary.bs-toast .toast-header .btn-close {
  background-color: #696cff ;
  background-image: url("data:image/svg+xml,%3Csvg width='150px' height='151px' viewBox='0 0 150 151' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpolygon id='path-1' points='131.251657 0 74.9933705 56.25 18.7483426 0 0 18.75 56.2450278 75 0 131.25 18.7483426 150 74.9933705 93.75 131.251657 150 150 131.25 93.7549722 75 150 18.75'%3E%3C/polygon%3E%3C/defs%3E%3Cg id='🎨-%5BSetup%5D:-Colors-&amp;-Shadows' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='Artboard' transform='translate(-225.000000, -250.000000)'%3E%3Cg id='Icon-Color' transform='translate(225.000000, 250.500000)'%3E%3Cuse fill='%23fff' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='1' fill='%23fff' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  box-shadow: 0 0.1875rem 0.375rem 0 rgba(105, 108, 255, 0.4) ;
}

.form-floating > .form-control:not(:-moz-placeholder-shown) ~ label {
  color: #696cff;
}

.form-floating > .form-control:focus ~ label,
.form-floating > .form-control:not(:placeholder-shown) ~ label,
.form-floating > .form-select ~ label {
  color: #696cff;
}
.form-floating > .form-control:-webkit-autofill ~ label {
  color: #696cff;
}

.svg-illustration svg {
  fill: #696cff;
}

html:not([dir=rtl]) .border-primary,
html[dir=rtl] .border-primary {
  border-color: #696cff ;
}

a {
  color: #696cff;
}
a:hover {
  color: #787bff;
}

.fill-primary {
  fill: #696cff;
}

.bg-navbar-theme {
  background-color: #fff ;
  color: #697a8d;
}
.bg-navbar-theme .navbar-brand,
.bg-navbar-theme .navbar-brand a {
  color: #566a7f;
}
.bg-navbar-theme .navbar-brand:hover, .bg-navbar-theme .navbar-brand:focus,
.bg-navbar-theme .navbar-brand a:hover,
.bg-navbar-theme .navbar-brand a:focus {
  color: #566a7f;
}
.bg-navbar-theme .navbar-search-wrapper .navbar-search-icon,
.bg-navbar-theme .navbar-search-wrapper .search-input {
  color: #697a8d;
}
.bg-navbar-theme .search-input-wrapper .search-input,
.bg-navbar-theme .search-input-wrapper .search-toggler {
  background-color: #fff ;
  color: #697a8d;
}
.bg-navbar-theme .navbar-nav > .nav-link,
.bg-navbar-theme .navbar-nav > .nav-item > .nav-link,
.bg-navbar-theme .navbar-nav > .nav > .nav-item > .nav-link {
  color: #697a8d;
}
.bg-navbar-theme .navbar-nav > .nav-link:hover, .bg-navbar-theme .navbar-nav > .nav-link:focus,
.bg-navbar-theme .navbar-nav > .nav-item > .nav-link:hover,
.bg-navbar-theme .navbar-nav > .nav-item > .nav-link:focus,
.bg-navbar-theme .navbar-nav > .nav > .nav-item > .nav-link:hover,
.bg-navbar-theme .navbar-nav > .nav > .nav-item > .nav-link:focus {
  color: #566a7f;
}
.bg-navbar-theme .navbar-nav > .nav-link.disabled,
.bg-navbar-theme .navbar-nav > .nav-item > .nav-link.disabled,
.bg-navbar-theme .navbar-nav > .nav > .nav-item > .nav-link.disabled {
  color: #a5afbb ;
}
.bg-navbar-theme .navbar-nav .show > .nav-link,
.bg-navbar-theme .navbar-nav .active > .nav-link,
.bg-navbar-theme .navbar-nav .nav-link.show,
.bg-navbar-theme .navbar-nav .nav-link.active {
  color: #566a7f;
}
.bg-navbar-theme .navbar-toggler {
  color: #697a8d;
  border-color: rgba(86, 106, 127, 0.075);
}
.bg-navbar-theme .navbar-toggler-icon {
  background-image: url("data:image/svg+xml,%3Csvg width='14px' height='11px' viewBox='0 0 14 11' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Cdefs%3E%3Cpath d='M0,0 L14,0 L14,1.75 L0,1.75 L0,0 Z M0,4.375 L14,4.375 L14,6.125 L0,6.125 L0,4.375 Z M0,8.75 L14,8.75 L14,10.5 L0,10.5 L0,8.75 Z' id='path-1'%3E%3C/path%3E%3C/defs%3E%3Cg id='💎-UI-Elements' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'%3E%3Cg id='12)-Navbar' transform='translate(-1174.000000, -1290.000000)'%3E%3Cg id='Group' transform='translate(1174.000000, 1288.000000)'%3E%3Cg id='Icon-Color' transform='translate(0.000000, 2.000000)'%3E%3Cuse fill='rgba(67, 89, 113, 0.5)' xlink:href='%23path-1'%3E%3C/use%3E%3Cuse fill-opacity='0.1' fill='rgba(67, 89, 113, 0.5)' xlink:href='%23path-1'%3E%3C/use%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
}
.bg-navbar-theme .navbar-text {
  color: #697a8d;
}
.bg-navbar-theme .navbar-text a {
  color: #566a7f;
}
.bg-navbar-theme .navbar-text a:hover, .bg-navbar-theme .navbar-text a:focus {
  color: #566a7f;
}
.bg-navbar-theme hr {
  border-color: rgba(86, 106, 127, 0.075);
}

.layout-navbar {
  background-color: rgba(255, 255, 255, 0.95) ;
  -webkit-backdrop-filter: saturate(200%) blur(6px);
          backdrop-filter: saturate(200%) blur(6px);
}

.navbar-detached {
  box-shadow: 0 0 0.375rem 0.25rem rgba(161, 172, 184, 0.15);
}

.layout-navbar-fixed .layout-page:before {
  -webkit-backdrop-filter: saturate(200%) blur(10px);
          backdrop-filter: saturate(200%) blur(10px);
  background: rgba(245, 245, 249, 0.6);
}

.bg-menu-theme {
  background-color: #fff ;
  color: #697a8d;
}
.bg-menu-theme .menu-link,
.bg-menu-theme .menu-horizontal-prev,
.bg-menu-theme .menu-horizontal-next {
  color: #697a8d;
}
.bg-menu-theme .menu-link:hover, .bg-menu-theme .menu-link:focus,
.bg-menu-theme .menu-horizontal-prev:hover,
.bg-menu-theme .menu-horizontal-prev:focus,
.bg-menu-theme .menu-horizontal-next:hover,
.bg-menu-theme .menu-horizontal-next:focus {
  color: #566a7f;
}
.bg-menu-theme .menu-link.active,
.bg-menu-theme .menu-horizontal-prev.active,
.bg-menu-theme .menu-horizontal-next.active {
  color: #566a7f;
}
.bg-menu-theme .menu-item.disabled .menu-link,
.bg-menu-theme .menu-horizontal-prev.disabled,
.bg-menu-theme .menu-horizontal-next.disabled {
  color: #a5afbb ;
}
.bg-menu-theme .menu-item.open:not(.menu-item-closing) > .menu-toggle,
.bg-menu-theme .menu-item.active > .menu-link {
  color: #566a7f;
}
.bg-menu-theme .menu-item.active > .menu-link:not(.menu-toggle) {
  background-color: #fff;
}
.bg-menu-theme.menu-horizontal .menu-sub > .menu-item.active > .menu-link:not(.menu-toggle) {
  background-color: white;
}
.bg-menu-theme.menu-horizontal .menu-inner .menu-item:not(.menu-item-closing) > .menu-sub, .bg-menu-theme.menu-horizontal .menu-inner .menu-item.open > .menu-toggle {
  background: #fff;
}
.bg-menu-theme .menu-inner > .menu-item.menu-item-closing .menu-item.open .menu-sub,
.bg-menu-theme .menu-inner > .menu-item.menu-item-closing .menu-item.open .menu-toggle {
  background: transparent;
  color: #697a8d;
}
.bg-menu-theme .menu-inner-shadow {
  background: linear-gradient(#fff 41%, rgba(255, 255, 255, 0.11) 95%, rgba(255, 255, 255, 0));
}
.bg-menu-theme .menu-text {
  color: #566a7f;
}
.bg-menu-theme .menu-header {
  color: #8f9baa;
}
.bg-menu-theme hr,
.bg-menu-theme .menu-divider,
.bg-menu-theme .menu-inner > .menu-item.open > .menu-sub::before {
  border-color: transparent ;
}
.bg-menu-theme .menu-inner > .menu-header::before {
  background-color: transparent;
}
.bg-menu-theme .menu-block::before {
  background-color: #8f9baa;
}
.bg-menu-theme .menu-inner > .menu-item.open .menu-item.open > .menu-toggle::before {
  background-color: white;
}
.bg-menu-theme .menu-inner > .menu-item.open .menu-item.active > .menu-link::before {
  background-color: #566a7f;
}
.bg-menu-theme .menu-inner > .menu-item.open .menu-item.open > .menu-toggle::before,
.bg-menu-theme .menu-inner > .menu-item.open .menu-item.active > .menu-link::before {
  box-shadow: 0 0 0 2px #fff;
}
.bg-menu-theme .ps__thumb-y,
.bg-menu-theme .ps__rail-y.ps--clicking > .ps__thumb-y {
  background: rgba(86, 106, 127, 0.2) ;
}

@media (min-width: 1200px) {
  .bg-menu-theme.menu-vertical {
    box-shadow: 0 0.125rem 0.375rem 0 rgba(161, 172, 184, 0.12);
  }
}
.bg-menu-theme .menu-header {
  color: #a1acb8;
}
.bg-menu-theme .menu-header:before {
  background-color: #a1acb8 ;
}
.bg-menu-theme.menu-vertical {
  box-shadow: 0 0.125rem 0.375rem 0 rgba(161, 172, 184, 0.12);
}
html:not(.layout-menu-collapsed) .bg-menu-theme .menu-inner .menu-item.open > .menu-link, .layout-menu-hover.layout-menu-collapsed .bg-menu-theme .menu-inner .menu-item.open > .menu-link,
html:not(.layout-menu-collapsed) .bg-menu-theme .menu-inner .menu-item .menu-link:not(.active):hover,
.layout-menu-hover.layout-menu-collapsed .bg-menu-theme .menu-inner .menu-item .menu-link:not(.active):hover {
  background-color: rgba(67, 89, 113, 0.04);
}
.bg-menu-theme .menu-inner .menu-sub > .menu-item.active > .menu-link.menu-toggle {
  background-color: rgba(67, 89, 113, 0.04);
}
.bg-menu-theme .menu-inner .menu-sub > .menu-item.active .menu-icon {
  color: #696cff;
}
.bg-menu-theme .menu-inner > .menu-item.active > .menu-link {
  color: #696cff;
  background-color: rgba(105, 108, 255, 0.16) ;
}
.bg-menu-theme .menu-inner > .menu-item.active:before {
  background: #696cff;
}
.bg-menu-theme .menu-sub > .menu-item > .menu-link:before {
  background-color: #b4bdc6 ;
}
.bg-menu-theme .menu-sub > .menu-item.active > .menu-link:not(.menu-toggle):before {
  background-color: #696cff ;
  border: 3px solid #e7e7ff ;
}

.app-brand .layout-menu-toggle {
  background-color: #696cff;
  border: 7px solid #f5f5f9;
}
.app-brand .layout-menu-toggle i {
  color: #fff;
}
.app-brand .layout-menu-toggle .menu-inner > .menu-header::before {
  background-color: #b4bdc6;
}

.bg-footer-theme {
  background-color: #f5f5f9 ;
  color: #697a8d;
}
.bg-footer-theme .footer-link {
  color: #697a8d;
}
.bg-footer-theme .footer-link:hover, .bg-footer-theme .footer-link:focus {
  color: #566a7f;
}
.bg-footer-theme .footer-link.disabled {
  color: #a1abb8 ;
}
.bg-footer-theme .footer-text {
  color: #566a7f;
}
.bg-footer-theme .show > .footer-link,
.bg-footer-theme .active > .footer-link,
.bg-footer-theme .footer-link.show,
.bg-footer-theme .footer-link.active {
  color: #566a7f;
}
.bg-footer-theme hr {
  border-color: rgba(86, 106, 127, 0.0768713725);
}

.layout-footer-fixed .content-footer {
  box-shadow: 0 0 0.375rem 0.25rem rgba(161, 172, 184, 0.15);
}
/*
 * Container style
 */
.ps {
  overflow: hidden !important;
  overflow-anchor: none;
  -ms-overflow-style: none;
  touch-action: auto;
  -ms-touch-action: auto;
}

/*
 * Scrollbar rail styles
 */
.ps__rail-x {
  display: none;
  opacity: 0;
  transition: background-color 0.2s linear, opacity 0.2s linear;
  -webkit-transition: background-color 0.2s linear, opacity 0.2s linear;
  height: 15px;
  /* there must be 'bottom' or 'top' for ps__rail-x */
  bottom: 0px;
  /* please don't change 'position' */
  position: absolute;
}

.ps__rail-y {
  display: none;
  opacity: 0;
  transition: background-color 0.2s linear, opacity 0.2s linear;
  -webkit-transition: background-color 0.2s linear, opacity 0.2s linear;
  width: 15px;
  /* there must be 'right' or 'left' for ps__rail-y */
  right: 0;
  /* please don't change 'position' */
  position: absolute;
}

.ps--active-x > .ps__rail-x,
.ps--active-y > .ps__rail-y {
  display: block;
  background-color: transparent;
}

.ps:hover > .ps__rail-x,
.ps:hover > .ps__rail-y,
.ps--focus > .ps__rail-x,
.ps--focus > .ps__rail-y,
.ps--scrolling-x > .ps__rail-x,
.ps--scrolling-y > .ps__rail-y {
  opacity: 0.6;
}

.ps .ps__rail-x:hover,
.ps .ps__rail-y:hover,
.ps .ps__rail-x:focus,
.ps .ps__rail-y:focus,
.ps .ps__rail-x.ps--clicking,
.ps .ps__rail-y.ps--clicking {
  background-color: #eee;
  opacity: 0.9;
}

/*
 * Scrollbar thumb styles
 */
.ps__thumb-x {
  background-color: #aaa;
  border-radius: 6px;
  transition: background-color 0.2s linear, height 0.2s ease-in-out;
  -webkit-transition: background-color 0.2s linear, height 0.2s ease-in-out;
  height: 6px;
  /* there must be 'bottom' for ps__thumb-x */
  bottom: 2px;
  /* please don't change 'position' */
  position: absolute;
}

.ps__thumb-y {
  background-color: #aaa;
  border-radius: 6px;
  transition: background-color 0.2s linear, width 0.2s ease-in-out;
  -webkit-transition: background-color 0.2s linear, width 0.2s ease-in-out;
  width: 6px;
  /* there must be 'right' for ps__thumb-y */
  right: 2px;
  /* please don't change 'position' */
  position: absolute;
}

.ps__rail-x:hover > .ps__thumb-x,
.ps__rail-x:focus > .ps__thumb-x,
.ps__rail-x.ps--clicking .ps__thumb-x {
  background-color: #999;
  height: 11px;
}

.ps__rail-y:hover > .ps__thumb-y,
.ps__rail-y:focus > .ps__thumb-y,
.ps__rail-y.ps--clicking .ps__thumb-y {
  background-color: #999;
  width: 11px;
}

/* MS supports */
@supports (-ms-overflow-style: none) {
  .ps {
    overflow: auto !important;
  }
}
@media screen and (-ms-high-contrast: active), (-ms-high-contrast: none) {
  .ps {
    overflow: auto !important;
  }
}
.ps {
  position: relative;
}

.ps__rail-x {
  height: 0.25rem;
}

.ps__rail-y {
  width: 0.25rem;
}

.ps__rail-x,
.ps__rail-y,
.ps__thumb-x,
.ps__thumb-y {
  border-radius: 10rem;
}

.ps__rail-x:hover,
.ps__rail-x:focus,
.ps__rail-x.ps--clicking,
.ps__rail-x:hover > .ps__thumb-x,
.ps__rail-x:focus > .ps__thumb-x,
.ps__rail-x.ps--clicking > .ps__thumb-x {
  height: 0.375rem;
}

.ps__rail-y:hover,
.ps__rail-y:focus,
.ps__rail-y.ps--clicking,
.ps__rail-y:hover > .ps__thumb-y,
.ps__rail-y:focus > .ps__thumb-y,
.ps__rail-y.ps--clicking > .ps__thumb-y {
  width: 0.375rem;
}

.ps__thumb-x {
  height: 0.25rem;
  bottom: 0;
}

.ps__thumb-y {
  width: 0.25rem;
  right: 0;
}

.light-style .ps__thumb-x,
.light-style .ps__thumb-y {
  background-color: rgba(67, 89, 113, 0.4);
}
.light-style .ps__rail-x:hover,
.light-style .ps__rail-y:hover,
.light-style .ps__rail-x:focus,
.light-style .ps__rail-y:focus,
.light-style .ps__rail-x.ps--clicking,
.light-style .ps__rail-y.ps--clicking {
  background-color: rgba(67, 89, 113, 0.2);
}
.light-style .ps__rail-x:hover > .ps__thumb-x,
.light-style .ps__rail-y:hover > .ps__thumb-y,
.light-style .ps__rail-x:focus > .ps__thumb-x,
.light-style .ps__rail-y:focus > .ps__thumb-y,
.light-style .ps__rail-x.ps--clicking > .ps__thumb-x,
.light-style .ps__rail-y.ps--clicking > .ps__thumb-y {
  background-color: rgba(67, 89, 113, 0.7);
}
.light-style .ps-inverted .ps__rail-x:hover,
.light-style .ps-inverted .ps__rail-y:hover,
.light-style .ps-inverted .ps__rail-x:focus,
.light-style .ps-inverted .ps__rail-y:focus,
.light-style .ps-inverted .ps__rail-x.ps--clicking,
.light-style .ps-inverted .ps__rail-y.ps--clicking {
  background-color: rgba(255, 255, 255, 0.5);
}
.light-style .ps-inverted .ps__thumb-x,
.light-style .ps-inverted .ps__thumb-y {
  background-color: rgba(255, 255, 255, 0.7);
}
.light-style .ps-inverted .ps__rail-x:hover > .ps__thumb-x,
.light-style .ps-inverted .ps__rail-y:hover > .ps__thumb-y,
.light-style .ps-inverted .ps__rail-x:focus > .ps__thumb-x,
.light-style .ps-inverted .ps__rail-y:focus > .ps__thumb-y,
.light-style .ps-inverted .ps__rail-x.ps--clicking > .ps__thumb-x,
.light-style .ps-inverted .ps__rail-y.ps--clicking > .ps__thumb-y {
  background-color: #fff;
}

@supports (-moz-appearance: none) {
  #both-scrollbars-example {
    max-width: 1080px;
    margin: 0 auto;
    padding-left: 0;
    padding-right: 0;
  }
}
    </style>
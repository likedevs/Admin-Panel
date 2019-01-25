<!DOCTYPE html>
<html lang="{{$lang->lang}}">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-129451698-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-129451698-1');
</script>
  <meta charset="utf-8">
  <meta name="robots" content="nofollow,noindex">
  <meta name="googlebot" content="noindex, nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="_token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

  <title>{{ @$seoData['seo_title'] }}</title>
  <link rel="stylesheet" href="{{  asset('fronts/css/resets.css?'.uniqid('', true)) }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{  asset('fronts/css/style.css?'.uniqid('', true)) }}">
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

</head>

<body>
    <div class="julia-zoom">
         <div class="closeZoomImg"></div>

        <img class="zoomImg" src='' width='100%' />
        <div id="controlZoomImg">
        </div>
     </div>

  <div id="cover">
    <div class="container-fluid">
        @yield('content')
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="{{  asset('fronts/js/actions.js?'.uniqid('', true)) }}"></script>
  <script src="{{  asset('fronts/js/main.js?'.uniqid('', true)) }}"></script>

  <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f.fbq)f.fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '1967232043325036');
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1"
src="https://www.facebook.com/tr?id=1967232043325036&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->

<!-- Global site tag (gtag.js) - Google Ads: 878159902 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-878159902"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-878159902');
</script>

<script>
  gtag('event', 'page_view', {
    'send_to': 'AW-878159902',
    'user_id': 'replace with value'
  });
</script>
</body>

</html>

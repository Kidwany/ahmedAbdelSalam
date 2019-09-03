<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> د. احمد عبد السلام -    @yield('title')</title>


    @yield('open-graph')

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{assetPath('website/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{assetPath('website/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{assetPath('website/css/linearicons.css')}}">
    <link rel="stylesheet" href="{{assetPath('website/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{assetPath('website/css/featherIcons.css')}}">
    <link rel="stylesheet" href="{{assetPath('website/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{assetPath('website/css/slick.css')}}">
    <link rel="stylesheet" href="{{assetPath('website/css/fotorama.css')}}">
    <link rel="stylesheet" href="{{assetPath('website/css/lightgallery.css')}}">
    <link rel="stylesheet" href="{{assetPath('website/css/aos.css')}}">
    <link rel="stylesheet" href="{{assetPath('website/css/hamburgers.css')}}">
    <link rel="stylesheet" href="{{assetPath('website/css/index.css')}}">
    <link rel="shortcut icon" href="{{assetPath('website/images/favicon.png')}}" type="image/png" sizes="16x16 32x32">
    <!-- canonical links-->
    <link rel="canonical" href="{{url('/')}}"/>
    <!-- end canonical links-->
    <title>Dr. Ahmed Abd El Salam</title>
    <!--Define social media profiles with schema.org markup -->
    <script type="application/ld+json">
	{
	  "@context" : "http://schema.org",
	  "@type" : "Organization",
	  "name" : "Vanhoutte Inc.",
	  "url" : "http://vanhoutte.be",
	  "sameAs" : [
	  @foreach($sameAs as $same)
            "{{$same->url}}",
      @endforeach
        ]
      }

</script>


    <!--Define social media profiles with schema.org markup -->
    <script type="application/ld+json">
	{
	    "@type" : "Organization",
	    "@context" : "http://schema.org",
	}
	"name" : "3elagy",
	"url" : "https://3elagy.com",
	"sameAs" : [
      @foreach($sameAs as $same)
            "{{$same->url}}",
      @endforeach
        ]
</script>
    @yield('customizedStyle')


    @yield('header-code')



</head>







<body class="hold-transition skin-blue sidebar-mini">
<div id="app">
    <main>
        <!-- Define social media profiles with schema.org markup -->
        <span itemscope itemtype="http://schema.org/3alajy">
            <link itemprop="url" href="{{url('/')}}">
            @foreach($sameAs as $same)
                <a itemprop="{{$same->item_prop}}" href="{{$same->url}}">{{$same->name}}</a>
            @endforeach
        </span>
        <!-- end -->

        @include('website.layouts.header')

        @yield('content')

        @include('website.layouts.footer')
    </main>
</div>




<!-- WhatsHelp.io widget -->
{{--<script type="text/javascript">
    (function () {
        var options = {
            facebook: "547193558740132", // Facebook page ID
            whatsapp: "+201100960900", // WhatsApp number
            call_to_action: "Message us", // Call to action
            button_color: "#666666", // Color of button
            position: "left", // Position may be 'right' or 'left'
            order: "facebook,whatsapp", // Order of buttons
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>--}}
<!-- /WhatsHelp.io widget -->

{{--<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>--}}
<!-- JS
============================================ -->

<script src="{{assetPath('website/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{assetPath('website/js/bootstrap.min.js')}}"></script>
<script src="{{assetPath('website/js/popper.min.js')}}"></script>
<script src="{{assetPath('website/js/jquery.counterup.js')}}"></script>
<script src="{{assetPath('website/js/jquery.waypoints.min.js')}}"></script>
<script src="{{assetPath('website/js/jquery-ui.min.js')}}"></script>
<script src="{{assetPath('website/js/swiper.min.js')}}"></script>
<script src="{{assetPath('website/js/slick.min.js')}}"></script>
<script src="{{assetPath('website/js/aos.js')}}"></script>
<script src="{{assetPath('website/js/fotorama.js')}}"></script>
<script src="{{assetPath('website/js/lightgallery.js')}}"></script>
<script src="{{assetPath('website/js/lg-thumbnail.js')}}"></script>
<script src="{{assetPath('website/js/index.js')}}"></script>

@yield('customizedScript')

</body>
</html>

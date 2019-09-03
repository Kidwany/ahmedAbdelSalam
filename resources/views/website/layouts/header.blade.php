<!-- start header -->
<div class="header-md">
    <div class="logo-lines">
        <div class="container">
            <div class="lines hamburger hamburger--elastic">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </div>
            <div class="logo-img">
                <a href="{{url('/')}}">
                    <img src="{{assetPath($setting->image->path)}}" alt="img">
                </a>
            </div>
        </div>
    </div>

    <div class="main-header-md-ul-div">
        <ul class="main-header-md-ul">
            <li class="active-li">
                <a href="{{url('/')}}">
            <span>
              الرئيسية
            </span>
                </a>
            </li>
            <li>
                <a href="{{url('/about')}}">
            <span>
              عن العيادة
            </span>
                </a>
            </li>
            <li class="drop-li">
                <a href="{{url('/service')}}" class="drop-a">
            <span>
              خدماتنا
            </span>
                    <i class="ion-chevron-left"></i>
                </a>
                <ul class="dropped-ul">
                    @if($mainServices)
                        @foreach($mainServices as $mainService)
                            @if(count($mainService->childService) > 0)
                                <li class="drop-li">
                                    <a class="drop-a">
                                        <span>
                                            {{$mainService->{'service_'.currentLang()}->title }}
                                        </span>
                                        <i class="ion-chevron-left"></i>
                                    </a>
                                    <ul class="dropped-ul">
                                        @foreach($mainService->childService as $childService)
                                            <li>
                                                <a href="./service-details.html">
                                            <span>
                                                {{$childService->{'service_'.currentLang()}->title }}
                                            </span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>

                                @else
                                <li>
                                    <a href="./service-details.html">
                                        <span>
                                            {{$mainService->{'service_'.currentLang()}->title }}
                                        </span>
                                    </a>
                                </li>
                            @endif

                        @endforeach
                    @endif
                    {{--<li class="drop-li">
                        <a class="drop-a">
                            <span>
                                تكميم المعدة
                            </span>
                            <i class="ion-chevron-left"></i>
                        </a>
                        <ul class="dropped-ul">
                            <li>
                                <a href="./service-details.html">
                                    <span>
                                        تكميم جزئى
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="./service-details.html">
                                    <span>
                                        تكميم كلى
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="./service-details.html">
                                    <span>
                                        التكميم الدقيق
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="./service-details.html">
                            <span>
                                حزام المعدة
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="./service-details.html">
                            <span>
                                بالون المعدة
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="./service-details.html">
                            <span>
                                مناظير المعدة
                            </span>
                        </a>
                    </li>--}}
                </ul>
            </li>
            <li>
                <a href="{{url('/blog')}}">
                    <span>
                        مقالات طبية
                    </span>
                </a>
            </li>
            <li class="drop-li">
                <a class="drop-a">
                    <span>
                        استوديو
                    </span>
                    <i class="ion-chevron-left"></i>
                </a>
                <ul class="dropped-ul">
                    @foreach($albums as $album)
                        <li>
                            <a href="{{url('album/'.str_slug($album->{'album_en'}->title ))}}">
                            <span>
                                {{$album->{'album_'.currentLang()}->title}}
                            </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="{{url('/testimonials')}}">
                    <span>
                        أراء العملاء
                    </span>
                </a>
            </li>
            <li>
                <a href="{{url('/contact')}}">
                    <span>
                        تواصل معنا
                    </span>
                </a>
            </li>
            <li>
                <a href="{{url('reserve')}}">
                    <span>
                        احجز موعدك
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="header-lg">
    <div class="header-lg-top">
        <div class="container">
            <div class="email">
                <i class="ion-ios-email-outline"></i>
                <span>{{$contact->email}}</span>
            </div>
            <div class="phone">
                <i class="ion-ios-telephone-outline"></i>
                <span>{{$contact->phone}} - {{$contact->phone_alt}}</span>
            </div>
        </div>
    </div>
    <div class="header-lg-bottom">
        <ul class="main-header-lg-ul">
            <li class="active-li">
                <a href="{{url('/')}}">
            <span>
              الرئيسية
            </span>
                </a>
            </li>
            <li>
                <a href="{{url('/about')}}">
            <span>
              عن العيادة
            </span>
                </a>
            </li>
            <li class="hover-li">
                <a href="{{url('service')}}" class="hover-a">
                    <i class="feather icon-chevron-down"></i>
                    <span>
                        خدماتنا
                    </span>
                </a>
                <ul class="hovered-ul">
                    <li class="hover-li">
                        @if($mainServices)
                            @foreach($mainServices as $mainService)
                                @if(count($mainService->childService) > 0)
                                    <a class="hover-a">
                                        <span>
                                            {{$mainService->{'service_'.currentLang()}->title }}
                                        </span>
                                        <i class="feather icon-chevron-left"></i>
                                    </a>
                                    <ul class="hovered-ul side-ul">
                                        @foreach($mainService->childService as $childService)
                                            <li>
                                                <a href="./service-details.html">
                                                <span>
                                                    {{$childService->{'service_'.currentLang()}->title }}
                                                </span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                <li>
                                    <a href="./service-details.html">
                                    <span>
                                        {{$mainService->{'service_'.currentLang()}->title }}
                                    </span>
                                    </a>
                                </li>

                                @endif
                            @endforeach
                        @endif
                </ul>
            </li>
            <li>
                <a href="{{url('/blog')}}">
                    <span>
                        مقالات طبية
                    </span>
                </a>
            </li>
            <li class="img-li">
                <a href="{{url('/')}}">
                    <img src="{{assetPath($setting->image->path)}}" alt="img">
                </a>
            </li>
            <li class="hover-li">
                <a class="hover-a">
                    <i class="feather icon-chevron-down"></i>
                    <span>
                        استوديو
                    </span>
                </a>
                <ul class="hovered-ul">
                    @foreach($albums as $album)
                        <li>
                            <a href="{{url('album/'.str_slug($album->{'album_en'}->title ))}}">
                            <span>
                                {{$album->{'album_' .currentLang()}->title }}
                            </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li>
                <a href="{{url('/testimonials')}}">
            <span>
              أراء العملاء
            </span>
                </a>
            </li>
            <li>
                <a href="{{url('/contact')}}">
            <span>
              تواصل معنا
            </span>
                </a>
            </li>
            <li>
                <a href="{{url('/reserve')}}">
            <span>
              احجز موعدك
            </span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- end header -->

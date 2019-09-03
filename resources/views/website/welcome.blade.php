@extends('website.layouts.layouts')
@section('title', 'الرئيسية')

@section('open-graph')
        <meta name="description" content="{{$og->description}}">
        <meta name="keywords" content="{{$og->key_words}}">
        <!-- open graph meta-->
        <meta property="og:title" content="{{$og->open_graph->og_title}}"/>
        <meta property="og:type" content="{{$og->open_graph->og_type}}"/>
        <meta property="og:url" content="{{url('/')}}"/>
        <meta property="og:image" content="{{$og->open_graph->image_url ? $og->open_graph->image_url : asset($og->open_graph->open_graph_image->path)}}"/>
        <meta property="og:description" content="{{$og->open_graph->og_description}}"/>
        <meta property="og:site_name" content="{{$og->open_graph->og_site_name}}"/>
@endsection

@section('header-code')
    {!! $headerCode->header_code ? $headerCode->header_code : '' !!}
@endsection


@section('content')


    <!-- start home main slider -->
    <div class="swiper-container home-main-slider">
        <div class="swiper-wrapper">
            @if($slides)
                @foreach($slides as $slide)
                    <div class="swiper-slide">
                        <div class="slider-img">
                            <img src="{{assetPath($slide->image->path)}}" alt="img">
                        </div>
                    </div>
                @endforeach
            @endif

        </div>

        <!-- rtl code -->
        <div class="swiper-button-prev home-main-slider-prev">
            <span class="ion-android-arrow-forward"></span>
        </div>
        <div class="swiper-button-next home-main-slider-next">
            <span class="ion-android-arrow-back"></span>
        </div>
        <!-- rtl code -->

        <!-- ltr code -->
        <!-- <div class="swiper-button-next home-main-slider-next">
          <span class="ion-android-arrow-forward"></span>
        </div>
        <div class="swiper-button-prev home-main-slider-prev">
          <span class="ion-android-arrow-back"></span>
        </div> -->
        <!-- ltr code -->

        <div class="swiper-pagination home-main-slider-pagination"></div>
    </div>
    <!-- end home main slider -->

    <!-- start home about section -->
    <div class="home-about-section">
        <div class="first-section">
            <div class="text">
                <div class="heading">
                    <p>
                        عن عيادتنا
                    </p>
                </div>
                <div class="body">
                    <p>
                        {{$about->{'about_' . currentLang()}->description }}
                    </p>
                </div>
            </div>
            <div class="ceo">
                <div class="img-div">
                    <img src="{{assetPath('website/')}}/images/ceo/ceo.jpg" alt="img">
                </div>
                <div class="dr-name-title-brief">
                    <p>
                        د. أحمد عبدالسلام
                    </p>
                    <p>
                        <i class="linearicons-pulse"></i>
                        رئيس الأطباء
                    </p>
                    <div class="brief">
                        <ul class="doctor-ul">
                            <li>
                                <p>
                                    مدرس و استشاري الجراحة العامة والمناظير و السمنة المفرطة كلية الطب - قصر العيني
                                </p>
                            </li>
                            <li>
                                <p>
                                    دكتوراه الجراحة العامة و المناظير- جامعة القاهرة
                                </p>
                            </li>
                            <li>
                                <p>
                                    عضو كلية الجراحين الملكية بلندن
                                </p>
                            </li>
                            <li>
                                <p>
                                    عضو الجمعية المصرية لجراحة المناظير
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="second-section">
            <ul>
                @foreach($features as $feature)
                    <li>
                        <div class="li-div">
                            <div class="li-icon">
                                <i class="{{$feature->{'feature_' . currentLang()}->slug }}"></i>
                            </div>
                            <div class="li-heading">
                                <p>
                                    {{$feature->{'feature_' . currentLang()}->title }}
                                </p>
                            </div>
                            <div class="li-text">
                                <p>
                                    {{$feature->{'feature_' . currentLang()}->description }}
                                </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- end home about section -->

    <!-- start home services section -->
    <div class="home-services-section">
        <div class="container">
            <div class="section-heading">
                <p>
                    خدماتنا
                </p>
            </div>

            <div class="section-body">
                <ul class="main-section-ul">
                    @foreach($mainServices as $service)
                        <li>
                            <a href="{{url('service/' . $service->url)}}">
                                <div class="img-div">
                                    <img src="{{assetPath($service->image->path)}}" alt="img">
                                </div>
                                <div class="service-body">
                                    <p>
                                        {{$service->{'service_'.currentLang()}->title }}
                                    </p>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- end home services section -->

    <!-- BMI section -->
    <div class="bmi-section">
        <div class="container">
            <div class="section-heading">
                <p>
                    احسب مؤشر كتلة الجسم
                </p>
            </div>
            <div class="section-body">
                <div class="form-wrapper">
                    <form class="bmi-form">
                        <div class="form-div">
                            <label for="weight">
                                <span>
                                    الوزن ( كجم )
                                </span>
                                <input type="text" id="weight" class="weight-input">
                                <i class="linearicons-weight"></i>
                            </label>
                        </div>
                        <div class="form-div">
                            <label for="height">
                                <span>
                                    الطول ( سم )
                                </span>
                                <input type="text" id="height" class="height-input">
                                <i class="linearicons-height"></i>
                            </label>
                        </div>
                        <button type="submit">
                            <span>
                                <i class="linearicons-calculator2"></i>
                                أحسب
                            </span>
                        </button>
                    </form>
                    <div class="bmi-result">
                        <div class="bmi-loading">
                            <img src="{{assetPath('website/images/icons/bmi-loading.gif')}}" alt="img">
                        </div>
                        <div class="bmi-body">
                            <div class="output">
                                <p class="number"></p>
                                <p class="output-message"></p>
                            </div>
                            <div class="try-again">
                                <span>
                                    <i class="linearicons-redo2"></i>
                                    احسب مرة أخرى
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bmi-table">
                    <div class="heading">
                        <p>
                            BMI categories
                        </p>
                    </div>
                    <ul class="table-ul">
                        <li>
                            <span>
                                BMI below 18.5
                            </span>
                            <span>
                                Under Weight
                            </span>
                        </li>
                        <li>
                            <span>
                                BMI 18.5 --> 24.99
                            </span>
                            <span>
                                Healthy Weight
                            </span>
                        </li>
                        <li>
                            <span>
                                BMI 25 --> 29.99
                            </span>
                            <span>
                                Overweight
                            </span>
                        </li>
                        <li>
                            <span>
                                BMI 30 --> 34.99
                            </span>
                            <span>
                                Obese Class 1
                            </span>
                        </li>
                        <li>
                            <span>
                                BMI 35 --> 39.99
                            </span>
                            <span>
                                Obese Class 2
                            </span>
                        </li>
                        <li>
                            <span>
                                BMI 40 --> 49.99
                            </span>
                            <span>
                                Morbid Obese
                            </span>
                        </li>
                        <li>
                            <span>
                                BMI 50 --> 59.99
                            </span>
                            <span>
                                Super Morbid Obese
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ./BMI section -->


    <!-- start appointment section -->
    <div class="appointment-section" id="contact">
        <div class="container">
            @include('dashboard.layouts.messages')

            <div class="service-appointment-form" data-aos="zoom-in" data-aos-duration="1500">
                <div class="form-heading">
                    <p>
                        احجز الموعد المناسب
                    </p>
                </div>
                <form action="{{url('reserve')}}" method="post" href="{{url('/#contact')}}">
                    @csrf
                    @method('post')
                    <div class="form-div">
                        <input type="text" placeholder="الإســم" id="name" name="name" value="{{old('name')}}">
                        <label for="name">
                            <i class="ion-ios-personadd-outline"></i>
                        </label>
                    </div>
                    <div class="form-div">
                        <input type="text" id="datepicker" placeholder="تاريخ الكشف" name="birth_date" value="{{old('birth_date')}}">
                        <label for="datepicker">
                            <i class="ion-ios-calendar-outline"></i>
                        </label>
                    </div>
                    <div class="form-div">
                        <input id="phone" type="text" placeholder="رقم الهاتف" name="phone" value="{{old('phone')}}">
                        <label for="phone">
                            <i class="ion-ios-telephone-outline"></i>
                        </label>
                    </div>
                    <div class="form-div">
                        <textarea id="" placeholder="الرسالة" name="message">{{old('message')}}</textarea>
                    </div>
                    <div class="form-div">
                        <input id="email" type="email" placeholder="البريد الإلكترونى" name="email" value="{{old('email')}}">
                        <label for="email">
                            <i class="ion-ios-email-outline"></i>
                        </label>
                    </div>
                    <div class="form-div submit-div">
                        <button type="submit">
                            <i class="ion-ios-paperplane"></i>
                            <span>
                                تأكيد الحجز
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end appointment section -->

    <!-- start testimonials section -->
    <div class="home-testimonials-section">
        <div class="section-heading">
            <p>
                ماذا يقول عملائنا
            </p>
        </div>
        <div class="testimonials-slick-slider">
            @if($testimonials)
                @foreach($testimonials as $testimonial)
                    <div class="item-wrapper">
                        <div class="item-inner">
                            <div class="img-div">
                                <img src="{{assetPath($testimonial->image->path)}}" alt="img">
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
    <!-- end testimonials section -->

    <!-- start map section -->
    <div class="map-section">
        <iframe
            src="{{$contact->location}}"
            frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <!-- end map section -->

@endsection

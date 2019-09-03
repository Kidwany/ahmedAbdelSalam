<!-- side social links -->
<div class="side-social-links">
    <ul class="main-ul">
        @if($contact->facebook)
            <li>
                <a target="_blank" href="{{url($contact->facebook)}}">
                    <i class="ion-social-facebook"></i>
                </a>
            </li>
        @endif
        @if($contact->twitter)
            <li>
                <a target="_blank" href="{{url($contact->twitter)}}">
                    <i class="ion-social-twitter"></i>
                </a>
            </li>
        @endif
        @if($contact->instagram)
            <li>
                <a target="_blank" href="{{url($contact->instagram)}}">
                    <i class="ion-social-instagram"></i>
                </a>
            </li>
        @endif
        @if($contact->youtube)
            <li>
                <a target="_blank" href="{{url($contact->youtube)}}">
                    <i class="ion-social-youtube"></i>
                </a>
            </li>
        @endif



    </ul>
</div>
<!-- side social links -->

<!-- start all footer -->
<footer>
    <div class="top-footer">
        <div class="container">

            <div class="section-one">
                <div class="section-body">
                    <a href="{{url('/')}}" class="logo-img">
                        <img src="{{assetPath($setting->image->path)}}" alt="img">
                    </a>
                    <div class="text">
                        <p>
                            {{$about->{'about_' . currentLang()}->description }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="section-two">
                <div class="section-heading">
                    <p>
                        روابط سريعة
                    </p>
                </div>
                <div class="section-body">
                    <ul class="main-section-ul">
                        <li>
                            <a href="{{url('/')}}">
                                <span>
                                    الرئيسية
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{url('/service')}}">
                                <span>
                                    خدماتنا
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
                        <li>
                            <a href="{{url('blog')}}">
                                <span>
                                    مقالات طبية
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
                        <li>
                            <a href="{{url('testimonials')}}">
                                <span>
                                    آراء العملاء
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section-three">
                <div class="section-heading">
                    <p>
                        اتصل بنا
                    </p>
                </div>
                <div class="section-body">
                    <ul class="main-section-ul contacts-wrapper">
                        <li>
                            <div class="phone">
                                <span>
                                    الهاتف
                                </span>
                                <div>
                                    <i class="ion-ios-telephone-outline"></i>
                                    <p>
                                       {{$contact->phone}}
                                    </p>
                                </div>
                            </div>
                            <div class="address">
                                <span>
                                    الموقع
                                </span>
                                <div>
                                    <i class="ion-android-pin"></i>
                                    <p>
                                        {{$contact->{'address_' .currentLang()} }}
                                    </p>
                                </div>
                            </div>
                            <div class="email">
                                <span>
                                    البريد الإلكترونى
                                </span>
                                <div>
                                    <i class="ion-ios-email-outline"></i>
                                    <p>
                                       {{$contact->email}}
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section-four">
                <div class="section-heading">
                    <p>
                        النشرة الإخبارية
                    </p>
                    <p>
                        اشترك فى نشرتنا الإخبارية
                    </p>
                </div>
                <div class="section-body">
                    <div class="news-letter">
                        <form action="">
                            <input type="email" placeholder="البريد الإلكترونى">
                            <button type="submit">إشترك</button>
                        </form>
                    </div>

                    <ul class="social-links">
                        @if($contact->facebook)
                            <li>
                                <a target="_blank" href="{{url($contact->facebook)}}">
                                    <i class="feather icon-facebook"></i>
                                </a>
                            </li>
                        @endif
                        @if($contact->twitter)
                            <li>
                                <a target="_blank" href="{{url($contact->twitter)}}">
                                    <i class="feather icon-twitter"></i>
                                </a>
                            </li>
                        @endif
                        @if($contact->instagram)
                            <li>
                                <a target="_blank" href="{{url($contact->instagram)}}">
                                    <i class="feather icon-instagram"></i>
                                </a>
                            </li>
                        @endif
                        @if($contact->youtube)
                            <li>
                                <a target="_blank" href="{{url($contact->youtube)}}">
                                    <i class="feather icon-youtube"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom-footer">
        <div class="container">
            <p>
                <!-- 2019 &copy; جميع الحقوق محفوظة لشركة بى جروب -->
                2019 &copy Begroup All rights reserved
            </p>
        </div>
    </div>
</footer>
<!-- end all footer -->

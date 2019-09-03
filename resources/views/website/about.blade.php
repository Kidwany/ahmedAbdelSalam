@extends('website.layouts.layouts')
@section('title', 'من نحن')

@section('open-graph')
    <meta name="description" content="{{$og->description ? $og->description : $mainOpenGraph->description}}">
    <meta name="keywords" content="{{$og->key_words ? $og->key_words : $mainOpenGraph->key_words}}">
    <!-- open graph meta-->
    <meta property="og:title" content="{{$og->open_graph->og_title ? $og->open_graph->og_title : $mainOpenGraph->open_graph->og_title}}"/>
    <meta property="og:type" content="{{$og->open_graph->og_type ? $og->open_graph->og_type : $mainOpenGraph->open_graph->og_type}}"/>
    <meta property="og:url" content="{{url('/about')}}"/>
    <meta property="og:image" content="
    @if($og->open_graph->image_url)
    {{$og->open_graph->image_url}}
    @elseif($og->open_graph->open_graph_image)
    {{asset($og->open_graph->open_graph_image->path)}}
    @else
    {{$mainOpenGraph->open_graph->image_url}}
    @endif
    {{--{{$object->open_graph->image_url ? $object->open_graph->image_url : asset($object->open_graph->open_graph_image->path)}}--}}"
    />
    <meta property="og:description" content="{{$og->open_graph->og_description ? $og->open_graph->og_description : $mainOpenGraph->open_graph->og_description}}"/>
    <meta property="og:site_name" content="{{$og->open_graph->og_site_name ? $og->open_graph->og_site_name : $mainOpenGraph->open_graph->og_site_name}}"/>
@endsection

@section('header-code')
    {!! $headerCode->header_code ? $headerCode->header_code : '' !!}
@endsection

@section('content')


    <!-- start about page -->
    <div class="about-page">
        <div class="page-heading">
            <p>
                عن العيادة
            </p>
        </div>

        <div class="page-body">
            <div class="container">
                <div class="about-wrapper">
                    <ul class="main-section-ul">
                        <li>
                            <div class="about-drop-div" data-img="vision-img">
                                <div class="about-drop-heading">
                                    <p>
                                        رؤيتـنــا
                                    </p>
                                </div>
                                <div class="about-drop-icon">
                                    <div class="v-line"></div>
                                    <i class="linearicons-plus"></i>
                                </div>
                            </div>
                            <ul class="about-dropped">
                                <li>
                                    <i class="ion-lightbulb"></i>
                                    <span>
                                        {{$about->{'about_'.currentLang()}->vision }}
                                    </span>
                                </li>
                                {{--<li>
                                    <i class="ion-lightbulb"></i>
                                    <span>
                                        تحت اشراف نخبة من اساتذة الجامعات تقدم جمييع الخدمات لكافة التخصصات الطبية بما فيها خدمة المعمل.
                                    </span>
                                </li>
                                <li>
                                    <i class="ion-lightbulb"></i>
                                    <span>
                                        نحرص علي بناء علاقة وطيدة وشخصية بين فريق العمل وعملائنا
                                    </span>
                                </li>
                                <li>
                                    <i class="ion-lightbulb"></i>
                                    <span>
                                        تحت اشراف نخبة من اساتذة الجامعات تقدم جمييع الخدمات لكافة التخصصات الطبية بما فيها خدمة المعمل.
                                    </span>
                                </li>
                                <li>
                                    <i class="ion-lightbulb"></i>
                                    <span>
                                        نحرص علي بناء علاقة وطيدة وشخصية بين فريق العمل وعملائنا
                                    </span>
                                </li>
                                <li>
                                    <i class="ion-lightbulb"></i>
                                    <span>
                                        تحت اشراف نخبة من اساتذة الجامعات تقدم جمييع الخدمات لكافة التخصصات الطبية بما فيها خدمة المعمل.
                                    </span>
                                </li>--}}
                            </ul>
                        </li>
                        <li>
                            <div class="about-drop-div" data-img="mission-img">
                                <div class="about-drop-heading">
                                    <p>
                                        مهمتنــا
                                    </p>
                                </div>
                                <div class="about-drop-icon">
                                    <div class="v-line"></div>
                                    <i class="linearicons-plus"></i>
                                </div>
                            </div>
                            <ul class="about-dropped">
                                <li>
                                    <i class="ion-lightbulb"></i>
                                    <span>
                                        نحرص علي بناء علاقة وطيدة وشخصية بين فريق العمل وعملائنا
                                    </span>
                                </li>
                                <li>
                                    <i class="ion-lightbulb"></i>
                                    <span>
                                        تحت اشراف نخبة من اساتذة الجامعات تقدم جمييع الخدمات لكافة التخصصات الطبية بما فيها خدمة المعمل.
                                    </span>
                                </li>
                                <li>
                                    <i class="ion-lightbulb"></i>
                                    <span>
                                        نحرص علي بناء علاقة وطيدة وشخصية بين فريق العمل وعملائنا
                                    </span>
                                </li>
                                <li>
                                    <i class="ion-lightbulb"></i>
                                    <span>
                                        تحت اشراف نخبة من اساتذة الجامعات تقدم جمييع الخدمات لكافة التخصصات الطبية بما فيها خدمة المعمل.
                                    </span>
                                </li>
                                <li>
                                    <i class="ion-lightbulb"></i>
                                    <span>
                                        نحرص علي بناء علاقة وطيدة وشخصية بين فريق العمل وعملائنا
                                    </span>
                                </li>
                                <li>
                                    <i class="ion-lightbulb"></i>
                                    <span>
                                        تحت اشراف نخبة من اساتذة الجامعات تقدم جمييع الخدمات لكافة التخصصات الطبية بما فيها خدمة المعمل.
                                    </span>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="about-drop-div" data-img="values-img">
                                <div class="about-drop-heading">
                                    <p>
                                        قيمنــا
                                    </p>
                                </div>
                                <div class="about-drop-icon">
                                    <div class="v-line"></div>
                                    <i class="linearicons-plus"></i>
                                </div>
                            </div>
                            <ul class="about-dropped">
                                <li>
                                    <i class="ion-lightbulb"></i>
                                    <span>
                                        نحرص علي بناء علاقة وطيدة وشخصية بين فريق العمل وعملائنا
                                    </span>
                                </li>
                                <li>
                                    <i class="ion-lightbulb"></i>
                                    <span>
                                        تحت اشراف نخبة من اساتذة الجامعات تقدم جمييع الخدمات لكافة التخصصات الطبية بما فيها خدمة المعمل.
                                    </span>
                                </li>
                                <li>
                                    <i class="ion-lightbulb"></i>
                                    <span>
                                        نحرص علي بناء علاقة وطيدة وشخصية بين فريق العمل وعملائنا
                                    </span>
                                </li>
                                <li>
                                    <i class="ion-lightbulb"></i>
                                    <span>
                                        تحت اشراف نخبة من اساتذة الجامعات تقدم جمييع الخدمات لكافة التخصصات الطبية بما فيها خدمة المعمل.
                                    </span>
                                </li>
                                <li>
                                    <i class="ion-lightbulb"></i>
                                    <span>
                                        نحرص علي بناء علاقة وطيدة وشخصية بين فريق العمل وعملائنا
                                    </span>
                                </li>
                                <li>
                                    <i class="ion-lightbulb"></i>
                                    <span>
                                        تحت اشراف نخبة من اساتذة الجامعات تقدم جمييع الخدمات لكافة التخصصات الطبية بما فيها خدمة المعمل.
                                    </span>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <div class="images-wrapper">
                        <ul>
                            <li class="vision-img active-li-img">
                                <div class="img-div">
                                    <img src="./images/about/vision.jpg" alt="">
                                </div>
                            </li>
                            <li class="mission-img">
                                <div class="img-div">
                                    <img src="./images/about/mission.jpg" alt="">
                                </div>
                            </li>
                            <li class="values-img">
                                <div class="img-div">
                                    <img src="./images/about/values.jpg" alt="">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end about page -->


@endsection

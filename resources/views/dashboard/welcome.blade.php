@extends('dashboard.layouts.layouts')
@section('title', 'Dashboard')
<!-- Drop Your Customized Style Here -->
@section('customizedStyle')
@endsection
<!-- Drop Your Customized Scripts Here -->
@section('customizedScript')
@endsection
<!-- Start of content section -->
@section('content')


    <!-- Main content -->
    <section class="content container-fluid">
        <div class="rgs-wrapper">


            <!-- start stats section -->
            <div class="stats-section">
                <div class="section-heading">
                    <i class="ion-stats-bars"></i>
                    <p>
                        Statistics
                    </p>
                </div>
                <div class="section-body">
                    <ul>
                        <li>
                            <a href="#">
                                <div class="li-left">
                                    <div class="counter">
                                        <p>
                                            {{$services}}
                                        </p>
                                    </div>
                                    <div class="title">
                                        <p>
                                            Services
                                        </p>
                                    </div>
                                </div>
                                <div class="li-right">
                                    <i class="ion ion-document-text"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="li-left">
                                    <div class="counter">
                                        <p>
                                            {{$videos}}
                                        </p>
                                    </div>
                                    <div class="title">
                                        <p>
                                           Videos
                                        </p>
                                    </div>
                                </div>
                                <div class="li-right">
                                    <i class="ion ion-videocamera"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="li-left">
                                    <div class="counter">
                                        <p>
                                            {{$images}}
                                        </p>
                                    </div>
                                    <div class="title">
                                        <p>
                                            Images
                                        </p>
                                    </div>
                                </div>
                                <div class="li-right">
                                    <i class="ion-ios-albums-outline"></i>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="li-left">
                                    <div class="counter">
                                        <p>
                                            {{$messages}}
                                        </p>
                                    </div>
                                    <div class="title">
                                        <p>
                                           Messages
                                        </p>
                                    </div>
                                </div>
                                <div class="li-right">
                                    <i class="ion-ios-email-outline"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end stats section -->


            <!-- start shortcuts section -->
            <div class="shortcuts-section">
                <div class="section-heading">
                    <i class="ion-shuffle"></i>
                    <p>
                        Shortcuts
                    </p>
                </div>
                <div class="section-body">
                    <ul>
                        <li>
                            <a href="{{adminUrl('contact/edit')}}">
                                <div class="li-img">
                                    <img src="{{asset('dashboard/img/shortcuts/phone-call.png')}}" alt="img">
                                </div>
                                <div class="li-title">
                                    <p>
                                        Edit Contact Info
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{adminUrl('service/create')}}">
                                <div class="li-img">
                                    <img src="{{asset('dashboard/img/welcome/setting.png')}}" alt="img">
                                </div>
                                <div class="li-title">
                                    <p>
                                        Add Service
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{adminUrl('video/create')}}">
                                <div class="li-img">
                                    <img src="{{asset('dashboard/img/welcome/video.png')}}" alt="img">
                                </div>
                                <div class="li-title">
                                    <p>
                                        Add Video
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{adminUrl('slider/create')}}">
                                <div class="li-img">
                                    <img src="{{asset('dashboard/img/welcome/slider.png')}}" alt="img">
                                </div>
                                <div class="li-title">
                                    <p>
                                        Add Slide
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{adminUrl('gallery/create')}}">
                                <div class="li-img">
                                    <img src="{{asset('dashboard/img/welcome/upload.png')}}" alt="img">
                                </div>
                                <div class="li-title">
                                    <p>
                                        Add Image to Gallery
                                    </p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{adminUrl('setting/edit')}}">
                                <div class="li-img">
                                    <img src="{{asset('dashboard/img/welcome/settings.png')}}" alt="img">
                                </div>
                                <div class="li-title">
                                    <p>
                                       Edit Setting
                                    </p>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end shortcuts section -->



            {{--<!-- start info section -->
            <div class="info-section">
                <div class="section-heading">
                    <i class="ion-information-circled"></i>
                    <p>
                        General Info
                    </p>
                </div>
                <div class="section-body">
                    <ul>
                        <li>
                            <a href="#">
                                <i class="ion-ios-people-outline"></i>
                                <div class="title-counter">
                                    <p>
                                        Managments
                                    </p>
                                    <span>
                        7
                      </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ion-android-people"></i>
                                <div class="title-counter">
                                    <p>
                                        Customers
                                    </p>
                                    <span>
                        0
                      </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ion-android-apps"></i>
                                <div class="title-counter">
                                    <p>
                                        Services
                                    </p>
                                    <span>
                        12
                      </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ion-ios-person-outline"></i>
                                <div class="title-counter">
                                    <p>
                                        Adminstrators
                                    </p>
                                    <span>
                        8
                      </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ion-ios-cart-outline"></i>
                                <div class="title-counter">
                                    <p>
                                        Products
                                    </p>
                                    <span>
                        4
                      </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ion-person"></i>
                                <div class="title-counter">
                                    <p>
                                        Total Agents
                                    </p>
                                    <span>
                        0
                      </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ion-card"></i>
                                <div class="title-counter">
                                    <p>
                                        Month Tickets
                                    </p>
                                    <span>
                        3
                      </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="ion-ios-telephone-outline"></i>
                                <div class="title-counter">
                                    <p>
                                        Calls
                                    </p>
                                    <span>
                        120
                      </span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end info section -->--}}

            <!-- start charts section -->


            {{--<div class="row">
                <div class="col-xs-12 col-md-6">
                    <!-- Bar chart -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-bar-chart-o"></i>

                            <h3 class="box-title">Bar Chart</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div id="bar-chart" style="height: 300px;"></div>
                        </div>
                        <!-- /.box-body-->
                    </div>
                    <!-- /.box -->
                </div>

                <div class="col-xs-12 col-md-6">
                    <!-- Donut chart -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <i class="fa fa-bar-chart-o"></i>

                            <h3 class="box-title">Donut Chart</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                            </div>
                        </div>
                        <div class="box-body">
                            <div id="donut-chart" style="height: 300px;"></div>
                        </div>
                        <!-- /.box-body-->
                    </div>
                    <!-- /.box -->
                </div>
            </div>--}}

            <!-- end charts section -->

          {{--  <!-- tables section -->
            <div class="tables-section">
                <!-- start todaty calls table -->
                <div class="today-calls-table table-section">
                    <div class="section-heading">
                        <p>
                            Today Calls
                        </p>
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Call Type</th>
                            <th scope="col">Managments</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <td>Jacob</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <td>Larry</td>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end todaty calls table -->

                <!-- start today tickets table -->
                <div class="today-calls-table table-section">
                    <div class="section-heading">
                        <p>
                            Today Tickets
                        </p>
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Call Type</th>
                            <th scope="col">Managments</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <td>Jacob</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <td>Larry</td>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end todaty tickets table -->

                <!-- start today contracts table -->
                <div class="today-contracts-table table-section">
                    <table class="table table-striped">
                        <div class="section-heading">
                            <p>
                                Today Contracts
                            </p>
                        </div>
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Call Type</th>
                            <th scope="col">Managments</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <td>Jacob</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <td>Larry</td>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end todaty contracts table -->

            </div>
            <!-- end tables section -->--}}

        </div>
    </section>
    <!-- /.content -->


@endsection

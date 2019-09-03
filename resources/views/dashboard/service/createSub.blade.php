@extends('dashboard.layouts.layouts')
@section('title', 'Dashboard')
{{--Drop Your Customized Style Codes Here--}}
@section('customizedStyle')
@endsection
{{--Drop Your Customized Scripts Codes Here--}}
@section('customizedScript')
    <script>
        //Initialize Select2 Elements
        $('.select2').select2()
    </script>
@endsection
{{-- Start of page Content --}}
@section('content')

    <section class="content-header">
        <h1>
            Services
            <small>Add Sub Service</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/service')}}">Service</a></li>
            <li class="active">Add Service</li>
        </ol>
    </section>


    <section class="content">
        @include('dashboard.layouts.messages')
        <form role="form" action="{{adminUrl('sub-service/create')}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('post')
            <input type="hidden" name="created_by">
            <input type="hidden" value="{{$service->id}}" name="service_id">
            <div class="row">
                <!-- English Side -->
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                        <h3 class="box-title">Add Service Info</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">

                            <div class="col-lg-12">
                                <label for="exampleInputEmail1"> Main Service</label>
                                <input type="text" class="form-control" disabled="disabled" name="main_service" id="exampleInputEmail1" placeholder="Enter Service Title" value="{{$service->service_en->title}}">
                                <p class="help-block">This is The Parent service of the one you will add</p>
                            </div>

                            <div class="col-lg-12">
                                <label for="exampleInputEmail1"> Title</label>
                                <input type="text" class="form-control" name="title_en" id="exampleInputEmail1" placeholder="Enter Service Title" value="{{old('title_en')}}">
                                <p class="help-block">Enter title of service</p>
                            </div>

                            <div class="col-lg-12">
                                <label for="exampleInputEmail1">Service Slug</label>
                                <input type="text" class="form-control" name="slug_en" id="exampleInputEmail1" placeholder="Enter Service slug" value="{{old('slug_en')}}">
                                <p class="help-block">Enter Title of Service</p>
                            </div>

                            <div class="col-lg-12">
                                <label for="exampleInputEmail1">Service Url</label>
                                <input type="text" class="form-control" name="url" id="exampleInputEmail1" placeholder="Enter Service slug" value="{{old('slug_en')}}">
                                <p class="help-block">Enter Url of Article which will shown in url <strong>If Url is empty, system will choose article title as url by Default</strong></p>
                            </div>

                            <div class="col-lg-12">
                                <label for="exampleInputEmail1"> Service Description</label>
                                <textarea  class="form-control" name="description_en" id="exampleInputEmail1" placeholder="Enter Service Description" rows="6">{{old('description_en')}}</textarea>
                                <p class="help-block">Enter Description of Service</p>
                            </div>

                            <div class="col-lg-12">
                                <label for="exampleInputEmail1"> Image</label>
                                <input type="file" class="form-control" name="image_id" id="exampleInputEmail1" placeholder="Enter Service text">
                                <p class="help-block"> Upload Service Image </p>
                            </div>

                            <div class="col-lg-12">
                                <label for="exampleInputEmail1"> Alt Text</label>
                                <input type="text" class="form-control" name="alt" id="exampleInputEmail1" placeholder="Enter Alt Text" value="{{old('alt')}}">
                                <p class="help-block"> Enter Alt Text for Image to show it if image isn't loaded </p>
                            </div>

                            {{--<div class="col-lg-12">
                                <label for="exampleInputEmail1"> Video Url</label>
                                <input type="url" class="form-control" name="video_url" id="exampleInputEmail1" placeholder="Enter Service Title" value="{{old('title_en')}}">
                                <p class="help-block"> Enter Youtube Video Embed Url </p>
                            </div>--}}

                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Arabic Side -->
                <div class="col-md-6 arab_dir">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">أضف بيانات الصورة</h3>
                        </div>
                        <!-- .box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> عنوان الخدمة</label>
                                    <input type="text" class="form-control" name="title_ar" id="exampleInputEmail1" placeholder="ادخل عنوان الخدمة" value="{{old('title_ar')}}">
                                    <p class="help-block">أضف عنوان الخدمة</p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> نبذة عن الخدمة</label>
                                    <input type="text" class="form-control" name="slug_ar" id="exampleInputEmail1" placeholder="ادخل  نبذة عن الخدمة" value="{{old('slug_ar')}}">
                                    <p class="help-block">ادخل  نبذة عن الخدمة</p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1">وصف الخدمة</label>
                                    <textarea class="form-control" name="description_ar" id="exampleInputEmail1" placeholder="ادخل  وصف الخدمة" rows="6" >{{old('description_ar')}}</textarea>
                                    <p class="help-block">ادخل وصفا دقيقا عن الخدمة</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>


@endsection

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
            Page
            <small>Update Form Info</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/seo/form')}}">Forms</a></li>
            <li class="active">Update Form</li>
        </ol>
    </section>


    <section class="content">
        @include('dashboard.layouts.messages')
        <form role="form" action="{{adminUrl('seo/form/edit/'.$form->id )}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('patch')
            {{--
                        <input type="hidden" name="created_by">
            --}}
            <div class="row">
                <!-- English Side -->
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Page Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1"> Page Name</label>
                                    <input type="text" class="form-control" name="name" disabled id="exampleInputEmail1" placeholder="Enter Page Name" value="{{$form->name}}">
                                    <p class="help-block">Enter Page Name</p>
                                </div>

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1"> Form ID</label>
                                    <input type="text" class="form-control" name="formId" id="exampleInputEmail1" disabled="disabled" value="{{'#' . str_slug($form->name)}}">
                                    <p class="help-block">Html Form ID</p>
                                </div>

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1"> Tracking Code</label>
                                    <input type="text" class="form-control" name="tracking_id" id="exampleInputEmail1" placeholder="Enter Form Tracking ID" value="{{$form->tracking_id}}">
                                    <p class="help-block">Enter Tracking Id Or UA-ID</p>
                                </div>

                                <div class="col-lg-6 mt-5">
                                    <label for="exampleInputEmail1">Header Code</label>
                                    <textarea class="textarea" placeholder="Enter Page Description" name="header_code"
                                              style="width: 100%; resize: none; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$form->header_code}}</textarea>
                                    <p class="help-block">Enter Header Code if exist</p>
                                </div>

                                <div class="col-lg-6 mt-5">
                                    <label for="exampleInputEmail1">Body Code</label>
                                    <textarea class="textarea" placeholder="Enter Page keywords" name="body_code"
                                              style="width: 100%; resize: none; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$form->body_code}}</textarea>
                                    <p class="help-block">Enter Body Code if exist </p>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

@endsection

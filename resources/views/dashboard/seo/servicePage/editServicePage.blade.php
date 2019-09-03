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
            <small>Update Page Info</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/website-main-pages')}}">Website Main Pages</a></li>
            <li class="active">Update Clinic</li>
        </ol>
    </section>


    <section class="content">
        @include('dashboard.layouts.messages')
        <form role="form" action="{{url('/3elajiAdmin/seo/website-main-pages/edit/}}" enctype="multipart/form-data" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="PATCH">
            <input type="hidden" name="created_by">
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
                                    <input type="text" class="form-control" name="name" disabled="disabled" id="exampleInputEmail1" placeholder="Enter Page Name" value="">
                                    <p class="help-block">Enter Page Name</p>
                                </div>

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1"> URL</label>
                                    <input type="url" class="form-control" name="url" disabled="disabled" id="exampleInputEmail1" placeholder="Enter Clinic URL" value="">
                                    <p class="help-block">Url of Page on website</p>
                                </div>

                                <div class="col-lg-6 mt-5">
                                    <label for="exampleInputEmail1">Page Description</label>
                                    <textarea class="textarea" placeholder="Enter Page Description" name="description"
                                              style="width: 100%; resize: none; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('description')}}</textarea>
                                    <p class="help-block">Enter Page Description if exist</p>
                                </div>

                                <div class="col-lg-6 mt-5">
                                    <label for="exampleInputEmail1">Page Keywords</label>
                                    <textarea class="textarea" placeholder="Enter Page keywords" name="keywords"
                                              style="width: 100%; resize: none; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('keywords')}}</textarea>
                                    <p class="help-block">Please Enter page key words if exist and put Comma(,) after every keyword </p>
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

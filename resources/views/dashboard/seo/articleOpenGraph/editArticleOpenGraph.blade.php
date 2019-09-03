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
            Open Graph
            <small>Update Open Graph Info</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/seo/main-pages-open-graph')}}">Open Graph</a></li>
            <li class="active">Update Open Graph</li>
        </ol>
    </section>

    <section class="content">
        @include('dashboard.layouts.messages')
        <form role="form" action="#" enctype="multipart/form-data" method="post">
            @csrf
            @method('patch')
            <input type="hidden" name="created_by">
            <div class="row">
                <!-- English Side -->
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Open Graph Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1"> Page Name</label>
                                    <input type="text" class="form-control" disabled="disabled" name="name" id="exampleInputEmail1" placeholder="Enter Page Name" value="Dr.Mohamed Magdy Clinic">
                                    <p class="help-block">Enter Page Name</p>
                                </div>

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">og:url</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">{{url('')}}/</span>
                                        <input type="url" class="form-control" placeholder="Enter Open Graph URL" name="og_url" value="">
                                    </div>
                                    <p class="help-block">If you don't enter any url, the url will be the website domain by default.</p>
                                </div>

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">og:type</label>
                                    <input type="text" class="form-control" name="og_type" id="exampleInputEmail1" placeholder="Enter og:type" value="{{old('og_type')}}">
                                    <p class="help-block">If you don't enter any og:type, the type will be set to the website og:type by default.</p>
                                </div>

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">og:site_name</label>
                                    <input type="text" class="form-control" name="og_site_name" id="exampleInputEmail1" placeholder="Enter og:site_name" value="{{old('og_site_name')}}">
                                    <p class="help-block">If you don't enter any og:site_name, the type will be set to the website og:site_name by default.</p>
                                </div>

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">og:title</label>
                                    <input type="text" class="form-control" name="og_title" id="exampleInputEmail1" placeholder="Enter og:title" value="{{old('og_title')}}">
                                    <p class="help-block">If you don't enter any og:title, the type will be set to the website og:title by default.</p>
                                </div>

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">og:image</label>
                                    <input type="file" class="form-control" name="og_image" id="exampleInputEmail1" placeholder="Enter og:image" value="{{old('og_image')}}">
                                    <p class="help-block">If you don't enter any og:image, the type will be set to the main website og:image by default.</p>
                                </div>

                                <div class="col-lg-6 mt-5">
                                    <label for="exampleInputEmail1">og:Description</label>
                                    <textarea class="textarea" placeholder="Enter Page Description" name="og_description"
                                              style="width: 100%; resize: none; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('og_description')}}</textarea>
                                    <p class="help-block">Enter Open Graph Description if exist <strong>If You didn't enter description, page will take the website og:description by default</strong></p>
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

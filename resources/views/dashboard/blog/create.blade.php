@extends('dashboard.layouts.layouts')
@section('title', 'Dashboard')
{{--Drop Your Customized Style Codes Here--}}
@section('customizedStyle')
@endsection
{{--Drop Your Customized Scripts Codes Here--}}
@section('customizedScript')
    <script src="{{assetPath('dashboard/js/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script>
        //Initialize Select2 Elements
        //$('.select2').select2()

       /* $('.textarea').wysihtml5()
        $('.textarea_ar').wysihtml5()*/
    </script>
@endsection
{{-- Start of page Content --}}
@section('content')

    <section class="content-header">
        <h1>
            Blog
            <small>Add New Article</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/blog')}}">Blog</a></li>
            <li class="active">Add Blog</li>
        </ol>
    </section>


    <section class="content">
        @include('dashboard.layouts.messages')
        <form role="form" action="{{route('blog.store')}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('post')
            <input type="hidden" name="created_by">
            <div class="row">
                <!-- English Side -->
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                        <h3 class="box-title">Add Blog Info</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">

                            <div class="col-lg-12">
                                <label for="exampleInputEmail1"> Title</label>
                                <input type="text" class="form-control" name="title_en" id="exampleInputEmail1" placeholder="Enter Title" value="{{old('title_en')}}">
                                <p class="help-block">Enter Title of Article</p>
                            </div>

                            <div class="col-lg-12">
                                <label for="exampleInputEmail1"> URL</label>
                                <input type="text" class="form-control" name="url" id="exampleInputEmail1" placeholder="Enter URL" value="{{old('url')}}">
                                <p class="help-block">Enter Url of Article which will shown in url <strong>If Url is empty, system will choose article title as url by Default</strong></p>
                            </div>

                            <div class="col-lg-12 mt-5">
                                <label for="exampleInputEmail1">Article Body</label>
                                <textarea class="textarea" placeholder="Enter Clinic Description" name="body_en"
                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('body_en')}}</textarea>
                                <p class="help-block">Enter Article Body</p>
                            </div>


                            <div class="col-lg-12">
                                <label for="exampleInputEmail1"> Image</label>
                                <input type="file" class="form-control" name="image_id" id="exampleInputEmail1" placeholder="Enter button text">
                                <p class="help-block"> Upload Article Image </p>
                            </div>

                            <div class="col-lg-12">
                                <label for="exampleInputEmail1"> Alt Text</label>
                                <input type="text" class="form-control" name="alt" id="exampleInputEmail1" placeholder="Enter Alt Text" value="{{old('alt')}}">
                                <p class="help-block"> Enter Alt Text for Image to show it if image isn't loaded </p>
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

                <!-- Arabic Side -->
                <div class="col-md-6 arab_dir">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">أضف بيانات المقال</h3>
                        </div>
                        <!-- .box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> عنوان المقال</label>
                                    <input type="text" class="form-control" name="title_ar" id="exampleInputEmail1" placeholder="ادخل عنوان الصورة" value="{{old('title_ar')}}">
                                    <p class="help-block">أضف عنوانا مناسبا للمقال</p>
                                </div>

                                <div class="col-lg-12 mt-5">
                                    <label for="exampleInputEmail1">محتوى المقال </label>
                                    <textarea class="textarea_ar" placeholder="ادخل محتوى المقال" name="body_ar"
                                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('body_ar')}}</textarea>
                                    <p class="help-block">ادخل محتوى المقال</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

@endsection

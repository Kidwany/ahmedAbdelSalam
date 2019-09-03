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
            Same As
            <small>Add Same As</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('seo/same-as')}}">Same As</a></li>
            <li class="active">Add Same As</li>
        </ol>
    </section>

    <section class="content">
        @include('dashboard.layouts.messages')
        <form role="form" action="{{adminUrl('seo/create-same-as/create')}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('post')
            <input type="hidden" name="created_by">
            <div class="row">
                <!-- English Side -->
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Same As Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">  Name</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Same As Name" value="{{old('name')}}">
                                    <p class="help-block">Enter Same As Name</p>
                                </div>

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1"> URL</label>
                                    <input type="url" class="form-control" name="url"  id="exampleInputEmail1" placeholder="Enter Same As URL" value="{{old('url')}}">
                                    <p class="help-block">Enter Same As Url </p>
                                </div>

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1"> Rel</label>
                                    <input type="text" class="form-control" name="rel" id="exampleInputEmail1" placeholder="Enter Same As Rel" value="{{old('rel')}}">
                                    <p class="help-block">Enter Same As Rel </p>
                                </div>

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1"> Item Prop</label>
                                    <input type="text" class="form-control" name="item_prop" id="exampleInputEmail1" placeholder="Enter Same As Item Prop" value="{{old('item_prop')}}">
                                    <p class="help-block">Enter Same As  Item Prop </p>
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

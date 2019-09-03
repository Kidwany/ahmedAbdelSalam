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
            <small>Update Same As</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('seo/same-as')}}">Same As</a></li>
            <li class="active">Update Same As</li>
        </ol>
    </section>

    <section class="content">
        @include('dashboard.layouts.messages')
        <form role="form" action="{{adminUrl('seo/edit-same-as/edit/' . $sameAs->id)}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('patch')
            <input type="hidden" name="created_by">
            <div class="row">
                <!-- English Side -->
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Same As Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">  Name</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Same As Name" value="{{$sameAs->name}}">
                                    <p class="help-block">Enter Same As Name</p>
                                </div>

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1"> URL</label>
                                    <input type="url" class="form-control" name="url"  id="exampleInputEmail1" placeholder="Enter Same As URL" value="{{$sameAs->url}}">
                                    <p class="help-block">Enter Same As Url </p>
                                </div>

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1"> Rel</label>
                                    <input type="text" class="form-control" name="rel" id="exampleInputEmail1" placeholder="Enter Same As Rel" value="{{$sameAs->rel}}">
                                    <p class="help-block">Enter Same As Rel </p>
                                </div>

                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1"> Item Prop</label>
                                    <input type="text" class="form-control" name="item_prop" id="exampleInputEmail1" placeholder="Enter Same As Item Prop" value="{{$sameAs->item_prop}}">
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

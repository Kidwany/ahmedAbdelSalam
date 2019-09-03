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
            Employees
            <small>Add New Employee</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/users')}}">Employee</a></li>
            <li class="active">Add Employee</li>
        </ol>
    </section>


    <section class="content">
        @include('dashboard.layouts.messages')
        <form role="form" action="{{route('users.store')}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('post')
            <input type="hidden" name="created_by">
            <div class="row">
                <!-- English Side -->
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                        <h3 class="box-title">Add Employee Info</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Name</label>
                                    <input type="text" name="name" class="form-control" id="password" placeholder="Enter User Name" value=" {{old('name')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email2">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="email2" placeholder="Enter Email" value=" {{old('email')}}">
                                    <small id="emailHelp2" class="form-text text-muted">you can add email according to your domain name or traditional email.</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="password" placeholder="Password">
                                </div>
                            </div>
                            {{--<div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Role</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="role_id">
                                        <option>Choose User Role</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->role}}</option>
                                        @endforeach
                                    </select>
                                </div>
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
            </div>
        </form>
    </section>

@endsection

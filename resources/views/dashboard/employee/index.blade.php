@extends('dashboard.layouts.layouts')
@section('title', 'Dashboard')
{{--Drop Your Customized Style Codes Here--}}
@section('customizedStyle')
@endsection
{{--Drop Your Customized Scripts Codes Here--}}
@section('customizedScript')
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection
{{-- Start of page Content --}}
@section('content')

    <section class="content-header">
        <h1>
            Employees
            <small>All Employees</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/users')}}">Employee</a></li>
            <li class="active">Add Employee</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary" style="padding: 15px">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Articles Info</h3>
                        <a href="{{adminUrl('blog/create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New Article </a>
                    </div>
                    @include('dashboard.layouts.messages')
                    <!-- /.box-header -->
                    <!-- form start -->
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At/th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at->diffForHumans()}}</td>
                                <td>
                                    <a href="{{route('users.edit', $user->id)}}" class style="font-size: 20px"><i class="fa fa-pencil-square-o"></i> </a>
                                    <button type="button" class data-toggle="modal" data-target="#delete{{$user->id}}" style="font-size: 20px">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                    @if($users)
                        @foreach($users as $user)
                            <div class="modal modal-danger fade" id="delete{{$user->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Delete Article</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are You Sure You Want To Delete Article <strong>{{$user->name}}</strong></p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('users.destroy', $user->id)}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <div class="d-flex flex-row">
                                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal" style="margin-right: 5px">
                                                        cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-danger">
                                                        Delete
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        @endforeach
                    @endif


                </div>
            </div>
        </div>
    </section>

@endsection

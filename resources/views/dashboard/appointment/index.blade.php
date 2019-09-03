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
            Appointments
            <small>All Appointments</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/appointment')}}">Appointments</a></li>
            <li class="active">All Appointments</li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary" style="padding: 15px">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Appointments Info</h3>
                    </div>
                @include('dashboard.layouts.messages')
                <!-- /.box-header -->
                    <!-- form start -->
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Service</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Service</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        @if($appointments)
                            @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{$appointment->id}}</td>
                                    <td>{{$appointment->name}}</td>
                                    <td>{{$appointment->phone}}</td>
                                    <td>{{$appointment->service->service_en->title}}</td>
                                    <td>{{$appointment->created_at ? $appointment->created_at->diffForHumans() : ''}}</td>
                                    <td>
                                        <a href="{{route('appointment.show', $appointment->id)}}" class style="font-size: 20px"><i class="fa fa-eye"></i> </a>
                                        <button type="button" class data-toggle="modal" data-target="#delete{{$appointment->id}}" style="font-size: 20px">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif


                        </tbody>
                    </table>
                    @foreach($appointments as $appointment)
                            <div class="modal modal-danger fade" id="delete{{$appointment->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Delete Appointment</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are You Sure You Want To Delete Appointment <strong>{{$appointment->name}}</strong></p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('appointment.destroy', $appointment->id)}}" method="post">
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

                </div>
            </div>
        </div>
    </section>

@endsection

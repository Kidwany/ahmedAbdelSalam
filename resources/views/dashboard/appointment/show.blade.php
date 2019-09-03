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
        <div class="tables-section">
            <!-- start todaty calls table -->
            <div class="today-calls-table table-section">
                <div class="section-heading">
                    <p>
                        Appointment Details
                    </p>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Attribute</th>
                        <th scope="col">Details</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><strong>Name</strong></td>
                        <td>{{$appointment->name}}</td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td>{{$appointment->email}}</td>
                    </tr>
                    <tr>
                        <td><strong>Phone</strong></td>
                        <td>{{$appointment->phone}}</td>
                    </tr>
                    <tr>
                        <td><strong>Birth Date</strong></td>
                        <td>{{$appointment->birth_date}}</td>
                    </tr>
                    <tr>
                        <td><strong>Gender</strong></td>
                        @if($appointment->gender = 1)
                            <td>Child</td>
                        @elseif($appointment->gender = 2)
                            <td>Male</td>
                        @elseif($appointment->gender = 3)
                            <td>Female</td>
                        @endif
                    </tr>
                    <tr>
                        <td><strong>Service</strong></td>
                        <td>{{$appointment->service->service_en->title}}</td>
                    </tr>
                    <tr>
                        <td><strong>Message</strong></td>
                        <td>{{$appointment->message}}</td>
                    </tr>
                    <tr>
                        <td><strong>Sent</strong></td>
                        <td>{{$appointment->created_at->diffForHumans()}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- end todaty calls table -->

        </div>
    </section>

@endsection

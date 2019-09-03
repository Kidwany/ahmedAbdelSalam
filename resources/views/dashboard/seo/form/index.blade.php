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
            Forms
            <small>All Forms</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/seo/form')}}"> Forms</a></li>
            <li class="active">All Forms</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary" style="padding: 15px">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Forms Info</h3>
                    </div>
                @include('dashboard.layouts.messages')
                <!-- /.box-header -->
                    <!-- form start -->
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Page Name</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Page Name</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if($forms)
                            @foreach($forms as $form)

                                    <tr>
                                        <td>{{$form->id}}</td>
                                        {{--<td><img src="{{$page->open_graph->og_image ? assetPath($page->open_graph->open_graph_image->path) : asset('dashboard/img/picture.png')}}" style="width: 50px" alt="og:image" > </td>--}}
                                        <td>{{$form->clinic->clinic_en->name}} Clinic Page</td>
                                        <td>{{$form->created_at->diffForHumans()}}</td>
                                        <td>{{$form->updated_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{adminUrl('seo/form/edit/'.$form->id)}}" class style="font-size: 20px"><i class="fa fa-pencil-square-o"></i> </a>
                                        </td>
                                    </tr>

                            @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>

@endsection

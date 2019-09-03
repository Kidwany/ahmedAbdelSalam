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
            Website Main Pages
            <small>All Website Main Pages</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/website-main-pages')}}"> Website Main Pages</a></li>
            <li class="active">All Website Main Pages</li>
        </ol>
    </section>



    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary" style="padding: 15px">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Pages Info</h3>
                    </div>
                @include('dashboard.layouts.messages')
                <!-- /.box-header -->
                    <!-- form start -->
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>URL</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>URL</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if($mainPages)
                            @foreach($mainPages as $mainPage)
                                <tr>
                                    <td>{{$mainPage->id}}</td>
                                    <td>{{$mainPage->name}} </td>
                                    <td>{{$mainPage->url}}</td>
                                    <td>{{$mainPage->created_at->diffForHumans()}}</td>
                                    <td>{{$mainPage->updated_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{adminUrl('seo/website-page/edit/'.$mainPage->id )}}" class style="font-size: 20px"><i class="fa fa-pencil-square-o"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>


                    @if($mainPages)
                        @foreach($mainPages as $mainPage)
                        <div class="modal modal-danger fade" id="delete{{$mainPage->id}}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Delete User</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are You Sure You Want To Delete User <strong></strong></p>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('slider.destroy', 5)}}" method="post">
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

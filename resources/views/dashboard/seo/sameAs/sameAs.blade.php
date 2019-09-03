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
                'autoWidth'   : false,
                responsive : true,
            })
        })
    </script>
@endsection
{{-- Start of page Content --}}
@section('content')

    <section class="content-header">
        <h1>
            Same As Links
            <small>All Same As Links</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/seo/same-as')}}"> Same As Links</a></li>
            <li class="active">All Same As Links</li>
        </ol>
    </section>



    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary" style="padding: 15px">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Same As Links Info</h3>
                        <a href="{{adminUrl('seo/create-same-as')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add Same As </a>
                    </div>
                    @include('dashboard.layouts.messages')
                    <!-- /.box-header -->
                    <!-- form start -->
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Url</th>
                            <th>Item Prop</th>
                            <th>Created By</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Name</th>
                            <th>Url</th>
                            <th>Item Prop</th>
                            <th>Created By</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if($sameAses)
                            @foreach($sameAses as $sameAs)
                                <tr>
                                    <td>{{$sameAs->id}}</td>
                                    <td>{{$sameAs->name}}</td>
                                    <td>{{$sameAs->url}}</td>
                                    <td>{{$sameAs->item_prop}}</td>
                                    <td>{{$sameAs->createdBy->name}}</td>
                                    <td>{{$sameAs->created_at->diffForHumans()}}</td>
                                    <td>{{$sameAs->updated_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{adminUrl('seo/edit-same-as/edit/' . $sameAs->id)}}" class style="font-size: 20px"><i class="fa fa-pencil-square-o"></i> </a>
                                        <button type="button" class data-toggle="modal" data-target="#delete{{$sameAs->id}}" style="font-size: 20px">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif


                        </tbody>
                    </table>


                    @if($sameAses)
                        @foreach($sameAses as $sameAs)
                            <div class="modal modal-danger fade" id="delete{{$sameAs->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Delete User</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are You Sure You Want To Delete Same As <strong>{{$sameAs->name}}</strong></p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{adminUrl('seo/delete-same-as/'.$sameAs->id)}}" method="post">
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

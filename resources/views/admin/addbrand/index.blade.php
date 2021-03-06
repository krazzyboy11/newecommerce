@extends('layouts.app')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/vendors/datatables/css/dataTables.bootstrap.css')}}"
          xmlns="http://www.w3.org/1999/html"/>
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/vendors/datatables/css/buttons.bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/vendors/datatables/css/colReorder.bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/vendors/datatables/css/dataTables.bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/vendors/datatables/css/rowReorder.bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/vendors/datatables/css/buttons.bootstrap.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/vendors/datatables/css/scroller.bootstrap.css')}}" />
    <link href="{{asset('/backend/css/pages/tables.css')}}}" rel="stylesheet" type="text/css">

@endpush

@section('content')
    <div>
        <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1>All Category</h1>

            </section>
            <!--section ends-->
            <section class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <a  class="btn btn-info" href="{{route('brand.create')}}">Add New</a>
                        @include('layouts.partial.msg')
                        <div class="panel panel-primary filterable">
                            <div class="panel-heading clearfix  ">
                                <div class="panel-title pull-left">
                                    <div class="caption">
                                        <i class="livicon" data-name="camera" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Categories
                                    </div>
                                </div>
                                <div class="tools pull-right"></div>
                            </div>
                            <div class="panel-body table-responsive">
                                <table class="table table-striped table-bordered" id="table2">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Brand Name</th>
                                        <th>Brand Slug</th>
                                        <th>Brand Image</th>
                                        <th>
                                            Created At
                                        </th>
                                        <th>
                                            Update At
                                        </th>
                                        <th>
                                            Action
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($brands as $key => $brand)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{$brand->brand_name}}</td>
                                        <td>{{$brand->brand_slug}}</td>
                                        <td>{{$brand->brand_image}}</td>
                                        <td>
                                          {{$brand->created_at}}
                                        </td>
                                        <td>
                                            {{$brand->created_at}}
                                        </td>
                                        <td>

                                                <div class="col-sm-2 text-center">
                                                <a href="{{route('brand.edit',$brand->id)}}">
                                                    <i class="livicon" data-name="edit" data-size="30" data-c="red" data-hc="red" data-loop="true"></i>
                                                </a>
                                            </div>
                                            <div></div>
                                                <div class="col-sm-2 text-center">
                                                    <form id="delete-form-{{ $brand->id }}" action="{{ route('brand.destroy',$brand->id) }}" style="display: none;" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                    <a href="" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $brand->id }}').submit();
                                                            }else {
                                                            event.preventDefault();
                                                            }">
                                                        <i class="livicon" data-name="trash" data-size="30" data-c="red" data-hc="red" data-loop="true"></i>
                                                    </a>
                                                </div>



                                        </td>
                                    </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row-->

                <!-- Third Basic Table Ends Here-->
                <!--delete modal starts here-->
            {{--
                        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title custom_align" id="edit">
                                            Delete this entry
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="alert alert-warning">
                                            <span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?
                                        </div>
                                    </div>
                                    <div class="modal-footer ">
                                        <button type="button" class="btn btn-warning">
                                            <span class="glyphicon glyphicon-ok-sign"></span> Yes
                                        </button>
                                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                                            <span class="glyphicon glyphicon-remove"></span> No
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
            --}}
            <!-- /.modal ends here -->
            </section>
            <!-- content -->
        </aside><aside class="right-side">

            <!-- content -->
        </aside>
    </div>




@endsection
@push('scripts')
    <!-- end of global js -->
    <!-- begining of page level js -->
    <script type="text/javascript" src="{{asset('/backend/vendors/datatables/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('/backend/vendors/jeditable/js/jquery.jeditable.js')}}"></script>
    <script type="text/javascript" src="{{asset('/backend/vendors/datatables/js/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('/backend/vendors/datatables/js/dataTables.buttons.js')}}"></script>
    <script type="text/javascript" src="{{asset('/backend/vendors/datatables/js/dataTables.colReorder.js')}}"></script>
    <script type="text/javascript" src="{{asset('/backend/vendors/datatables/js/dataTables.responsive.js')}}"></script>
    <script type="text/javascript" src="{{asset('/backend/vendors/datatables/js/dataTables.rowReorder.js')}}"></script>
    <script type="text/javascript" src="{{asset('/backend/vendors/datatables/js/buttons.colVis.js')}}"></script>
    <script type="text/javascript" src="{{asset('/backend/vendors/datatables/js/buttons.html5.js')}}"></script>
    <script type="text/javascript" src="{{asset('/backend/vendors/datatables/js/buttons.print.js')}}"></script>
    <script type="text/javascript" src="{{asset('/backend/vendors/datatables/js/buttons.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('/backend/vendors/datatables/js/pdfmake.js')}}"></script>
    <script type="text/javascript" src="{{asset('/backend/vendors/datatables/js/vfs_fonts.js')}}"></script>
    <script type="text/javascript" src="{{asset('/backend/vendors/datatables/js/dataTables.scroller.js')}}"></script>
    <script type="text/javascript" src="{{asset('/backend/js/pages/table-advanced.js')}}"></script>
@endpush
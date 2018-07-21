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
                        <a  class="btn btn-info" href="{{route('product.create')}}">Add New</a>
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
                                        <th>Product Name</th>
                                        <th>Product Category</th>
                                        <th>Product Brand</th>
                                        <th>Regular Price</th>
                                        <th>Sale Price</th>
                                        <th>Product Image</th>
                                        <th>Product Gallery</th>
                                        <th>Product Quantity</th>
                                        <th>Product SKU</th>
                                        <th>Feature Product</th>
                                        <th>Product Status</th>
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
                                    @foreach($products as $key => $product)
                                    <tr>
                                        <td>{{ $key +1 }}</td>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product->childcategory->child_cat_name}}</td>
                                        <td>
                                            @if($product->brand)
                                            {{$product->brand->brand_name}}
                                                @endif
                                        </td>
                                        <td>{{$product->product_regular_price}}</td>
                                        <td>{{$product->product_sale_price}}</td>
                                        <td><img style="width: 140px;" src="{{asset('uploads/ProductImage/'.$product->product_image)}}" alt=""></td>
                                        <td><a href="#" class="btn btn-sm btn-primary"> View</a></td>
                                        <td>{{$product->product_quantity}}</td>
                                        <td>{{$product->product_sku}}</td>
                                        <td>{{$product->product_feature}}</td>
                                        <td>{{$product->product_status}}</td>

                                        <td>
                                          {{$product->created_at}}
                                        </td>
                                        <td>
                                            {{$product->created_at}}
                                        </td>
                                        <td>

                                            <div class="col-sm-2 text-center">
                                                <a href="{{route('product.edit',$product->id)}}">
                                                    <i class="livicon" data-name="edit" data-size="30" data-c="red" data-hc="red" data-loop="true"></i>
                                                </a>
                                            </div>
                                            <div></div>
                                                <div class="col-sm-2 text-center">
                                                    <form id="delete-form-{{ $product->id }}" action="{{ route('product.destroy',$product->id) }}" style="display: none;" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                    <a href="" onclick="if(confirm('Are you sure? You want to delete this?')){
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $product->id }}').submit();
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
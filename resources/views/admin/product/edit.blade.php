@extends('layouts.app')

@push('css')
    <link href="{{asset('/backend/vendors/jasny-bootstrap/css/jasny-bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('/backend/vendors/iCheck/css/all.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/vendors/iCheck/css/line/line.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/vendors/iCheck/css/line/line.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/vendors/bootstrap-switch/css/bootstrap-switch.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/vendors/switchery/css/switchery.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/vendors/awesome-bootstrap-checkbox/css/awesome-bootstrap-checkbox.css')}}">
    <link rel="stylesheet" href="{{asset('/backend/css/pages/radio_checkbox.css')}}">
    <link href="{{asset('/backend/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" media="screen"/>
    <link href="{{asset('backend/vendors/summernote/summernote.css')}}" rel="stylesheet"  type="text/css"/>
    <link href="{{asset('/backend/vendors/trumbowyg/css/trumbowyg.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/backend/css/pages/editor.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('/backend/css/dropzone.css')}}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-3 ">
            <!--lg-6 starts-->
            <!--basic form starts-->
            <div class="panel panel-primary" id="hidepanel1">
                @include('layouts.partial.msg')
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="clock" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Create Sub Category
                    </h3>

                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="{{route('product.update',$products->id)}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <fieldset>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Product Name</label>
                                <div class="col-md-9">
                                    <input id="name" name="productname" type="text" placeholder="" class="form-control" value="{{$products->product_name}}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Choose Category</label>
                                <div class="col-md-9">
                                    <select name="categoryname" class="form-control">
                                        @foreach($childcategories as $childcategory)
                                            <option value="{{$childcategory->id}}">{{$childcategory->child_cat_name}} ({{$childcategory->subcategory->category->cat_title}})</option>
                                        @endforeach
                                    </select></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Choose Category</label>
                                <div class="col-md-9">
                                    <select name="brandname" class="form-control">
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                        @endforeach
                                    </select></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Product Regular Price</label>
                                <div class="col-md-9">
                                    <input id="name" name="productregularprice" type="text" placeholder="" class="form-control" value="{{$products->product_regular_price}}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Product Sale Price</label>
                                <div class="col-md-9">
                                    <input id="name" name="productsaleprice" type="text" placeholder="" class="form-control" value=" {{$products->product_sale_price}}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Product Quantity</label>
                                <div class="col-md-9">
                                    <input id="name" name="productquantity" type="text" placeholder="" class="form-control" value="{{$products->product_quantity}}"></div>
                            </div>
                            <div class="form-group" >
                                <label class="col-md-3 control-label">Product Short Description</label>
                                <!-- /.box-header -->
                                <div class='box-body col-md-9'>
                                    <textarea name="shortdesciption" class="textarea editor-cls" placeholder="Product Short Description" > {{$products->product_short_description}}</textarea>

                                </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-md-3 control-label">Product Long Description</label>
                                <!-- /.box-header -->
                                <div class='box-body col-md-9'>
                                    <textarea name="longdesciption" class="textarea editor-cls" placeholder="Product Long Description">{{$products->product_long_description}}</textarea>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Product Tag</label>
                                <div class="col-md-9">
                                    <input id="name" name="producttag" type="text" placeholder="" class="form-control" value="{{$products->product_tag}}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Product SKU</label>
                                <div class="col-md-9">
                                    <input id="name" name="productsku" type="text" placeholder="" class="form-control" value="{{$products->product_sku}}"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Product Image</label>
                                <div class="col-md-9">
                                    <input type="file"  name="productimage" />
                                </div>
                            </div>
                        {{--  <div class="form-group">
                              <label class="col-md-3 control-label" for="name">Category Image</label>
                              <div class="col-md-9">
                                  --}}{{--<div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                      <div class="form-control" data-trigger="fileinput">
                                          <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                          <span class="fileinput-filename"></span>
                                      </div>
                                      <span class="input-group-addon btn btn-default btn-file">
                                                      <span class="fileinput-new">Select image</span>
                                                      <span class="fileinput-exists">Change</span>
                                                      <input type="file" name="image"></span>
                                      <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                  </div>--}}{{--
                                  <input type="file" name="image">
                              </div>
                          </div>--}}
                        <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <a class="btn btn-responsive btn-danger btn-sm" href="{{route('product.index')}}">Back</a>
                                    <button type="submit" class="btn btn-responsive btn-primary btn-sm">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>

        </div>

    </div>

    <script type="text/javascript" src="{{asset('/backend/vendors/iCheck/js/icheck.js')}}"></script>
    <script type="text/javascript" src="{{asset('/backend/vendors/bootstrap-switch/js/bootstrap-switch.js')}}"></script>
    <script type="text/javascript" src="{{asset('/backend/vendors/switchery/js/switchery.js')}}"></script>
    <script type="text/javascript" src="{{asset('/backend/vendors/bootstrap-maxlength/js/bootstrap-maxlength.js')}}"></script>
    <script type="text/javascript" src="{{asset('/backend/vendors/card/lib/js/jquery.card.js')}}"></script>
    <script type="text/javascript" src="{{asset('/backend/js/pages/radio_checkbox.js')}}"></script>
    <script  src="{{asset('/backend/vendors/bootstrap3-wysihtml5-bower/js/bootstrap3-wysihtml5.all.min.js')}}" type="text/javascript"></script>
    <script  src="{{asset('/backend/vendors/bootstrap3-wysihtml5-bower/js/bootstrap3-wysihtml5.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/backend/vendors/summernote/summernote.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/backend/vendors/trumbowyg/js/trumbowyg.js')}}" type="text/javascript"></script>
    <script  src="{{asset('/backend/js/pages/editor2.js')}}" type="text/javascript"></script>


@endsection
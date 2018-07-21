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
    <style>

    #formdiv {
    text-align: center;
    }
    #file {
    color: green;
    padding: 5px;
    border: 1px dashed #123456;
    background-color: #f9ffe5;
    }
    #img {
    width: 17px;
    border: none;
    height: 17px;
    margin-left: -20px;
    margin-bottom: 191px;
    }
    .upload {
    width: 100%;
    height: 30px;
    }
    .previewBox {
    text-align: center;
    position: relative;
    width: 150px;
    height: 150px;
    margin-right: 10px;
    margin-bottom: 20px;
    float: left;
    }
    .previewBox img {
    height: 150px;
    width: 150px;
    padding: 5px;
    border: 1px solid rgb(232, 222, 189);
    }
    .delete {
    color: red;
    font-weight: bold;
    position: absolute;
    top: 0;
    cursor: pointer;
    width: 20px;
    height:  20px;
    border-radius: 50%;
    background: #ccc;
    }
    </style>

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
                    <form class="form-horizontal " action="{{route('product.store')}}" method="POST"
                    enctype="multipart/form-data">
                        @csrf
                        <fieldset>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Product Name</label>
                                <div class="col-md-9">
                                    <input id="name" name="productname" type="text" placeholder="" class="form-control"></div>
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
                                        <option value="">SELECT ONE</option>

                                    @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                        @endforeach
                                    </select></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Product Regular Price</label>
                                <div class="col-md-9">
                                    <input id="name" name="productregularprice" type="text" placeholder="" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Product Sale Price</label>
                                <div class="col-md-9">
                                    <input id="name" name="productsaleprice" type="text" placeholder="" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Product Quantity</label>
                                <div class="col-md-9">
                                    <input id="name" name="productquantity" type="text" placeholder="" class="form-control"></div>
                            </div>
                            <div class="form-group" >
                                <label class="col-md-3 control-label">Product Short Description</label>
                                    <!-- /.box-header -->
                                    <div class='box-body col-md-9'>
                                            <textarea name="shortdesciption" class="textarea editor-cls" placeholder="Product Short Description"></textarea>

                                    </div>
                            </div>
                            <div class="form-group" >
                                <label class="col-md-3 control-label">Product Long Description</label>
                                <!-- /.box-header -->
                                <div class='box-body col-md-9'>
                                    <textarea name="longdesciption" class="textarea editor-cls" placeholder="Product Long Description"></textarea>

                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Feature Product</label>
                                <div class="col-md-9">
                                  <input type="checkbox" class="flat-red " name="featureproduct" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Publication Status</label>
                                <div class="col-md-9">
                                    <input type="checkbox" class="flat-red " name="publicationstatus" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Product Tag</label>
                                <div class="col-md-9">
                                    <input id="name" name="producttag" type="text" placeholder="" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Product SKU</label>
                                <div class="col-md-9">
                                    <input id="name" name="productsku" type="text" placeholder="" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Product Image</label>
                                <div class="col-md-9">
                                    <input type="file"  name="productimage" />
                                </div>
                            </div>


                            {{--<div class="form-group ">
                                <label class="col-md-3 control-label" for="name">Feature Product</label>
                                    <div class="col-md-9" data-provides="fileinput">
                                        <input type="file" class="form-control" id="images" name="image" onchange="preview_images();"/>
                                        <div class="row" id="image_preview"></div>
                                    </div>
                            </div>--}}

{{--
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Category Image</label>
                                <div class="col-md-9">
                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                        <div class="form-control" data-trigger="fileinput">
                                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                            <span class="fileinput-filename"></span>
                                        </div>
                                        <span class="input-group-addon btn btn-default btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="image"></span>
                                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                    <input type="file" name="image">
                                </div>
                            </div>
--}}
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
            <!--basic form 2 starts-->
            {{--<div class="panel panel-info" id="hidepanel2">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="help" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Basic Form 2
                    </h3>
                    <span class="pull-right">
                                            <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                            <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                        </span>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="#" method="post">
                        <fieldset>
                            <!-- Name input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name1">E-mail Address</label>
                                <div class="col-md-9">
                                    <input id="name1" name="name" type="text" placeholder="Enter your Email" class="form-control"></div>
                            </div>
                            <!-- Email input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="password">Password</label>
                                <div class="col-md-9">
                                    <input id="password" name="password" type="password" placeholder="Enter your Password" class="form-control"></div>
                            </div>
                            <div class="checkbox" style="margin-left:130px;">
                                <label>
                                    <input type="checkbox" class="custom-checkbox">&nbsp; Stay signed in</label>
                            </div>
                            <!-- Form actions -->
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-responsive btn-info btn-sm">Sign in</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <!--panel body ends--> </div>
            <!--input form starts-->
            <div class="panel panel-warning" id="hidepanel5">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="gift" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Form Inputs
                    </h3>
                    <span class="pull-right">
                                            <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                            <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                        </span>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <div class="form-group input-group">
                            <span class="input-group-addon">@</span>
                            <input type="text" class="form-control" placeholder="User name"></div>
                        <div class="form-group input-group">
                            <input type="text" class="form-control">
                            <span class="input-group-addon">.00</span>
                        </div>
                        <div class="form-group input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-eur"></i>
                                                </span>
                            <input type="text" class="form-control" placeholder="Font Awesome Icon"></div>
                        <div class="form-group input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" class="form-control">
                            <span class="input-group-addon">.00</span>
                        </div>
                        <div class="form-group input-group">
                            <input type="text" class="form-control">
                            <span class="input-group-btn">
                                                    <button class="btn btn-default" type="button">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </span>
                        </div>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                            <div>
                                                    <span class="btn btn-default btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="..."></span>
                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>--}}
        </div>

    </div>

@push('scripts')

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
    <script>
        function preview_images()
        {
            var total_file=document.getElementById("images").files.length;
            for(var i=0;i<total_file;i++)
            {
                $('#image_preview').append("<div class='col-md-3'><img class='img-responsive' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
            }
        }
    </script>
@endpush
@endsection
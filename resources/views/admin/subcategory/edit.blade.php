@extends('layouts.app')

@push('css')
    <link href="{{asset('/backend/vendors/jasny-bootstrap/css/jasny-bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('/backend/vendors/iCheck/css/all.css')}}" rel="stylesheet" type="text/css" />
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
                    <form class="form-horizontal" action="{{route('subcategory.update',$subcategories->id)}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <fieldset>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Sub Category Title</label>
                                <div class="col-md-9">
                                    <input value="{{$subcategories->sub_category_name}}" id="name" name="subname" type="text" placeholder="" class="form-control"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Parent Category</label>
                                <div class="col-md-9">
                                    <select name="parentcategory" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->cat_title}}</option>
                                        @endforeach
                                    </select></div>
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
                                    <a class="btn btn-responsive btn-danger btn-sm" href="{{route('subcategory.index')}}">Back</a>
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


@endsection
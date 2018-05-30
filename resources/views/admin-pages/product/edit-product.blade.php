@extends('layouts.master-layout')
@section('title','Edit Product')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Product Details
                            </details>
                            <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                        </span>
                        </header>
                        <div class="panel-body">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form class="form-horizontal form-label-left" method="post"
                                  action="/admin/product/save-edited-product"
                                  enctype="multipart/form-data">
                                <br>
                                <div class="col-md-12">
                                    <div class="form-group" style="display: none">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_id">user id
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="product_id" class="form-control col-md-7 col-xs-12"
                                                   data-validate-length-range="6" data-validate-words="2"
                                                   name="product_id" placeholder="" required="required"
                                                   type="text" value=" {{$result->product_id}}">
                                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_name">Product Name
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="product_name" class="form-control col-md-7 col-xs-12"
                                                   data-validate-length-range="6" data-validate-words="2"
                                                   name="product_name" placeholder="" required="required"
                                                   type="text" value=" {{$result->product_name}}">
                                        </div>
                                    </div>

                                    <div class="form-group last">
                                        <label class="control-label col-md-3">Product Upload</label>
                                        <div class="col-md-9">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail"
                                                     style="width: 200px; height: 150px;">
                                                    <img src="/product-image/{{ $result->product_image }}"
                                                         alt="">
                                                </div>
                                                <div class="fileupload-preview fileupload-exists thumbnail"
                                                     style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                <div>
                                                <span class="btn btn-white btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input class="default" type="file" name="input_product_img">
                                                </span>
                                                    <a href="#" class="btn btn-danger fileupload-exists"
                                                       data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                                </div>
                                            </div>
                                            <!--<span class="label label-danger">NOTE!</span>-->
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_size">Product Size<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="product_size" class="form-control col-md-7 col-xs-12"
                                                   data-validate-length-range="6" data-validate-words="2"
                                                   name="product_size" placeholder="" required="required"
                                                   placeholder="" required="required" type="text"
                                                   value="{{$result->product_size}}">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">
                                            Product Price
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="price" class="form-control col-md-7 col-xs-12"
                                                   data-validate-length-range="6" data-validate-words="2"
                                                   name="price" type="text"
                                                   placeholder="" required="required" type="text"
                                                   value="{{$result->price}}"
                                            >
                                        </div>
                                    </div>
                                    <div class="col-md-offset-3 col-md-6">
                                        <button type="submit" class="btn btn-info">
                                            Update Details
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


@endsection
@extends('layouts.master-layout')
@section('title','Add Product')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <section class="panel">
                        <header class="panel-heading">
                            Personal Details
                            </details>
                            <span class="tools pull-right">
                        <a href="javascript:;" class="fa fa-chevron-down"></a>
                        <a href="javascript:;" class="fa fa-times"></a>
                        </span>
                        </header>
                        <div class="panel-body">

                            @if (session('success'))
                                <div class="alert alert-success">

                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('decline'))
                                <div class="alert alert-danger">

                                    {{ session('decline') }}
                                </div>
                            @endif

                            <form class="form-horizontal form-label-left" method="post" action="/admin/product/save-product" enctype="multipart/form-data">
                                <br>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_name">Product Name
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="product_name" class="form-control col-md-7 col-xs-12"
                                                   data-validate-length-range="6" data-validate-words="2"
                                                   name="product_name" placeholder="" required="required"
                                                   type="text">
                                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                        </div>
                                    </div>
                                    <div class="form-group last">
                                        <label class="control-label col-md-3">Product Image</label>
                                        <div class="col-md-9">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail"
                                                     style="width: 200px; height: 150px;">
                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
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

                                    //Category
{{--                                    <div class="form-group">
                                        <label for="field-2" class="col-sm-3 control-label">Category
                                            <span class="required">*</span></label>
                                        <div class="col-sm-7">
                                            @if(isset($category))

                                                @if(count($category)<=0)
                                                    <a href="/admin/category/category-setup" class="btn btn-info">+ Add
                                                        Category First To Continue</a>
                                                @else
                                                    <select name="category_name" class="form-control" id="category"
                                                            class="required"
                                                            required="true">
                                                        <option>Select A Category First</option>
                                                        @foreach( $category as $cat)
                                                            <option value="{{ $cat->category_id}}">
                                                                {{ $dept->category_name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                @endif

                                            @endif
                                        </div>
                                    </div>--}}
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_size">Product Size<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="product_size" class="form-control col-md-7 col-xs-12"
                                                   data-validate-length-range="6" data-validate-words="2"
                                                   name="product_size"
                                                   placeholder="" required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">
                                            Product Price
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="price" class="form-control col-md-7 col-xs-12"
                                                   data-validate-length-range="6" data-validate-words="2"
                                                   name="price"
                                                   placeholder="" type="text">
                                        </div>
                                    </div>

                                    <div class="col-md-offset-3 col-md-6">
                                        <button type="submit" class="btn btn-info">
                                            Save Details
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

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <script src="/assets/advanced-datatable/media/js/jquery.js"></script>
    <script>
        $("#category").change(function () {
            var v = $('#category').val();
            console.log(v);
            console.log(url);

            $.get(url, function (data, status) {
                console.log(data);

                var option = '';
                option += '<option value="Select one...">' + 'Select one...' + '</option>';

                $.each(data, function (key, value) {
                    //console( key + ": " + value );
                    option += '<option value="' + value.category_id + '">' + value.category_name + '</option>';
                });
                $('#category').empty().append(option);
            });
        });

    </script>

@endsection
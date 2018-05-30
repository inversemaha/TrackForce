@extends('layouts.master-layout')
@section('title','Add Category')
@section('content')
    <section id="main-content">
        <section class="wrapper min-height-fix">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <section class="panel">
                        <header class="panel-heading">
                            Add Category
                            <span class="tools pull-right">
                                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                                    <a href="javascript:;" class="fa fa-times"></a>
                                </span>
                        </header>
                        @if (session('success'))
                            <div class="alert alert-success fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('decline'))

                            <div class="alert alert-danger fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                                {{ session('decline') }}
                            </div>

                        @endif

                        <div class="panel-body">


                            <form class="form-horizontal form-label-left" method="post"
                                  action="/admin/category/save-category"
                                  enctype="multipart/form-data">


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Category Name</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control" placeholder="" type="text"
                                               name="category_name" required="true">
                                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </section>
                </div>
            </div>

        </section>
    </section>

@endsection

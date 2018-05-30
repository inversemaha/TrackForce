@extends('layouts.master-layout')
@section('title','View Product')
@section('content')


    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">

            <div class="row">
                <div class="col-lg-12">
                    <!--breadcrumbs start -->
                    <ul class="breadcrumb">
                        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#">Product</a></li>
                        <li class="active">View Product</li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-block alert-success fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>{{ session('success') }}</strong>
                </div>
            @elseif (session('decline'))
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong> {{session('decline')}} </strong>
                </div>
            @elseif (session('status')=='declined')
                <div class="alert alert-block alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="fa fa-times"></i>
                    </button>

                </div>


        @endif

        <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel" id="printableArea">


                        <header class="panel-heading">
                            Product Table
                        </header>
                        <div class="panel-body">
                            @if(isset($result))
                                <?php $i = 1;?>
                                <div class="adv-table">
                                    <table class="display table table-bordered table-striped" id="example">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Product Size</th>
                                            <th>Product Price</th>
                                            <th>Product Picture</th>
                                            <th>Active</th>
                                            <th><i class=" fa fa-edit"></i> Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($result as $res)


                                            <tr class="gradeA">
                                                <td> {{ $res->product_id }}</td>
                                                <td> {{ $res->product_name }}</td>

                                                <td> {{ $res->category }}</td>
                                                <td> {{ $res->product_size }}</td>

                                                <td> {{ $res->price }}</td>
                                                <td><img src="/product-image/{{ $res->product_image }}" class="img-rounded" alt="Cinque Terre" width="150" height="110"></td>
                                                <td> {{ $res->status }}</td>
                                                <td>
                                                    {{--<a href="/admin/product/view/{{ $res->product_id }}"
                                                       class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>--}}
                                                    <a href="/admin/product/edit/{{ $res->product_id }}"
                                                       class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                                <!--<a href="/admin/employee/delete/{{ $res->product_id }}"
                                                       class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>-->
                                                    <a href="/admin/product/update-active-status/{{ $res->product_id }}/{{$res->status}}"
                                                       class="btn btn-danger btn-xs"
                                                       onclick="return confirm('Are you sure you want to Delete this Product?');"><i
                                                                class="fa fa-trash-o "></i></a>
                                                </td>


                                                </td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif


                        </div>


                    </section>
                    <div class="panel">
                        <div class="panel-body center-block">
                            <div class="add-task-row row">
                                <a href="/admin/product/add-product" class="btn btn-success">+ New Product</a>
                                <a href="/admin/product/archive-product" class="btn btn-success">Archived Product</a>
                                <a href="#" type="submit" class="btn btn-info" onclick="printDiv('printableArea')">Print
                                    List </a>

                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <!-- page end-->


        </section>
    </section>

    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

@endsection
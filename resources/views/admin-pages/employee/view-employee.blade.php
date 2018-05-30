@extends('layouts.master-layout')
@section('title','View Employee')
@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">

            <div class="row">
                <div class="col-lg-12">
                    <!--breadcrumbs start -->
                    <ul class="breadcrumb">
                        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="#">Employee</a></li>
                        <li class="active">View Employee</li>
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
                            Employee Table
                        </header>
                        <div class="panel-body">
                            @if(isset($result))
                                <?php $i = 1;?>
                                <div class="adv-table">
                                    <table class="display table table-bordered table-striped" id="example">
                                        <thead>
                                        <tr>
                                            <th>UserName</th>
                                            <th>Full Name</th>

                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Designation</th>
                                            <th>Profile Picture</th>
                                            <th>Blood Group</th>
                                            <th>Active</th>
                                            <th><i class=" fa fa-edit"></i> Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($result as $res)


                                            <tr class="gradeA">
                                                <td> {{ $res->username }}</td>
                                                <td> {{ $res->fullname }}</td>

                                                <td> {{ $res->email }}</td>
                                                <td> {{ $res->phone }}</td>

                                                <td> {{ $res->designation }}</td>
                                                <td><img src="/employee-image/{{ $res->imageref }}" class="img-rounded" alt="Cinque Terre" width="150" height="110"></td>
                                                <td> {{ $res->blood_group }}</td>
                                                <td> {{ $res->active_status }}</td>
                                                <td>
                                                    <a href="/admin/employee/view/{{ $res->user_id }}"
                                                       class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
                                                    <a href="/admin/employee/edit/{{ $res->user_id }}"
                                                       class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                                <!--<a href="/admin/employee/delete/{{ $res->user_id }}"
                                                       class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>-->
                                                    <a href="/admin/employee/update-active-status/{{ $res->user_id }}/{{$res->active_status}}"
                                                       class="btn btn-danger btn-xs"
                                                       onclick="return confirm('Are you sure you want to deactivate this employee?');"><i
                                                                class="fa fa-trash-o "></i></a>
                                                </td>


                                                </td>
                                            </tr>

                                        @endforeach
                                    </table>
                                </div>
                            @endif


                        </div>


                    </section>
                    <div class="panel">
                        <div class="panel-body center-block">
                            <div class="add-task-row row">
                                <a href="/admin/employee/add-employee" class="btn btn-success">+ New Employee</a>
                                <a href="/admin/employee/archive-employee" class="btn btn-success">Archived Employee</a>
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
@extends('layouts.master-layout')
@section('title','Employee Profile')
@section('content')

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            <div class="row">
                <div class="col-lg-12">
                    <!--breadcrumbs start -->
                    <ul class="breadcrumb">
                        <li><a href="/"><i class="fa fa-home"></i> Home</a></li>
                        <li><a href="/admin/employee/view-employee">All Employee</a></li>
                        <li class="active">Employee Profile</li>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <!--widget start-->
                    <section class="panel">
                        <div class="twt-feed blue-bg">
                            <h1>{{ $result->username }}</h1>
                            <p>Employee Id: {{ $result->user_id }}</p>
                            <a href="#">

                                <img src="/employee-image/{{ $result->imageref }}" alt="Image">
                            </a>
                        </div>
                        <div class="weather-category twt-category custom-divider">
                            <ul>
                                <li>
                                    Designation
                                    <h5>{{ $result->designation }}</h5>

                                </li>

                            </ul>
                        </div>
                        <hr>
                        <footer class="twt-footer">
                            <a href="/admin/employee/edit/{{ $result->user_id }}" type="button"
                               class="btn btn-info center-block"><i class="fa fa-refresh"></i> Update</a>
                        </footer>
                    </section>
                    <!--widget end-->
                </div>
                <div class="col-lg-8">

                    <section class="panel">
                        <!--<div class="bio-graph-heading" style="max-height: 30px;">
                            Education is the backbone of a nation.
                        </div>-->
                        <div class="panel-body bio-graph-info">
                            <h1>Personal Details</h1>
                            <div class="row">
                                <div class="bio-row">
                                    <p><span>Full Name</span>: {{ $result->fullname }}</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Email</span>: {{ $result->email }}</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Phone Number</span>: {{ $result->phone }}</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Designation </span>: {{ $result->designation }}</p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Blood Group</span>: {{$result->blood_group}}</p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>

@endsection
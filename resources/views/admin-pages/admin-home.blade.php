@extends('layouts.master-layout')
@section('title','Admin Home')
@section('content')

    <section id="main-content">
        <section class="wrapper">
            <!--state overview start-->
            <div class="row state-overview">
                <div class="col-lg-3 col-sm-6">
                    <section class="panel">
                        <div class="symbol terques">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="value">
                            <p>Total Employee</p>
                            <h1 class="">
                                0
                            </h1>

                        </div>
                    </section>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel">
                        <div class="symbol red">
                            <i class="fa fa-tags"></i>
                        </div>
                        <div class="value">
                            <p>Total Employee</p>
                            <h1 class=" count2">
                                0
                            </h1>

                        </div>
                    </section>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel">
                        <div class="symbol yellow">
                            <i class="fa fa-shopping-cart"></i>
                        </div>
                        <div class="value">
                            <p>Total Employee</p>
                            <h1 class=" count3">
                                0
                            </h1>

                        </div>
                    </section>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <section class="panel">
                        <div class="symbol blue">
                            <i class="fa fa-bar-chart-o"></i>
                        </div>
                        <div class="value">
                            <p>Total Employee</p>
                            <h1 class=" count4">
                                89
                            </h1>

                        </div>
                    </section>
                </div>
            </div>
            <!--state overview end-->

            <div class="row">
                <div class="col-lg-8">
                    <!--latest product info start-->
                    <section class="panel post-wrap pro-box">
                        <aside>
                            <div class="post-info">
                                <span class="arrow-pro right"></span>
                                <div class="panel-body">
                                    <h1><strong>popular</strong> <br> Brand of this week</h1>
                                    <div class="desk yellow">
                                        <h3>Dimond Ring</h3>
                                        <p>Lorem ipsum dolor set amet lorem ipsum dolor set amet ipsum dolor set
                                            amet</p>
                                    </div>
                                    <div class="post-btn">
                                        <a href="javascript:;">
                                            <i class="fa fa-chevron-circle-left"></i>
                                        </a>
                                        <a href="javascript:;">
                                            <i class="fa fa-chevron-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <aside class="post-highlight yellow v-align">
                            <div class="panel-body text-center">
                                <div class="pro-thumb">
                                    <img src="img/ring.jpg" alt="">
                                </div>
                            </div>
                        </aside>
                    </section>
                    <!--latest product info end-->

                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <section class="panel">
                            <div class="weather-bg">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <i class="fa fa-cloud"></i>
                                            California
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="degree">
                                                24°
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <footer class="weather-category">
                                <ul>
                                    <li class="active">
                                        <h5>humidity</h5>
                                        56%
                                    </li>
                                    <li>
                                        <h5>precip</h5>
                                        1.50 in
                                    </li>
                                    <li>
                                        <h5>winds</h5>
                                        10 mph
                                    </li>
                                </ul>
                            </footer>

                        </section>
                        <!--weather statement end-->
                    </div>
                </div>
            </div>

        </section>
    </section>

@endsection()
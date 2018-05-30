@extends('layouts.master-layout')
@section('title','View Category')
@section('content')

    <section id="main-content">
        <section class="wrapper min-height-fix">
            <div class="row">

                <div class="col-md-10 col-md-offset-1">
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
                    <section class="panel">


                        <header class="panel-heading">
                            Department View
                        </header>
                        @if(isset($result))
                            <table class="table table-advance table-hover">
                                <thead>
                                <tr>
                                    <th><i class="fa fa-bullhorn"></i> SL</th>
                                    <th><i class="fa fa-bookmark"></i> Category Name</th>
                                    <th><i class=" fa fa-edit"></i> Action</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $counter = 1;?>
                                @foreach($result as $res)
                                    <tr>
                                        <td><a href="#">{{ $counter++ }}</a></td>
                                        <td class="hidden-phone">{{ $res->category_name }}</td>

                                        <td>

                                           {{-- <a href="/admin/category/delete//{{$res->category_id}}"
                                               class="btn btn-primary btn-xs"><i class="fa fa-trash-o"></i></a>--}}
                                            <a href="/admin/category/edit/{{$res->category_id}}"
                                               class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                            <a href="/admin/category/delete/{{$res->category_id}}"
                                               class="btn btn-danger btn-xs"
                                               onclick="return confirm('Are you sure you want to Deactivate this Category?');"><i
                                                        class="fa fa-trash-o "></i></a>
                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        @endif


                        <div class="panel">
                            <div class="panel-body center-block">
                                <div class="add-task-row row">
                                    <a href="/admin/category/category-setup" class="btn btn-success">+ Add Category</a>

                                </div>
                            </div>
                        </div>

                    </section>
                </div>

            </div>

        </section>
    </section>


@endsection
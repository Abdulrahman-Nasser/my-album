@extends('layouts.app')
@section('title', 'Album | Add Album')
@section('content')

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute"
        data-header-position="absolute" data-boxed-layout="full">

        <!-- header content -->
        @include('shared.header')

        <!-- asside content -->
        @include('asside.asside')

        <!-- main content -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Album </h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Album</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Album</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <form action="{{ route('album.update' , $albums->id) }}" method="POST">
                        @csrf
                        <div class="col-md-12">

                            @if (Session::has('done'))
                                <div class="alert alert-success bg-success text-center text-light text-bold">
                                    <span>{{ Session::get('done') }}</span>
                                </div>
                            @endif


                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-center">Edit Album : {{ $albums->name }}</h4>
                                    <div class="form-group">
                                        <label for="hue-demo">Album Name :</label>
                                        <input type="text" name="name"
                                            class="form-control demo  @error('name') is-invalid @enderror"value="{{$albums->name }}">
                                    </div>

                                    @error('name')
                                        <span class="invalid-feedback mt-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-warning text-white w-100">Edit</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>


                </div>

            </div>

        </div>

    </div>

@endsection

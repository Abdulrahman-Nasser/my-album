@extends('layouts.app')

@section('content')
    <!-- loader -->
    @include('pre-loader.loader')
    <!-- Main -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute"
        data-header-position="absolute" data-boxed-layout="full">

        {{-- header --}}
        @include('shared.header')
        {{-- end header --}}

        {{-- asside --}}
        @include('asside.asside')
        {{-- end asside --}}


        <!-- Page wrapper  -->
        <div class="page-wrapper">

            <!-- Bread crumb and right sidebar toggle -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title"> Album</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-6">
                        <a href="{{ route('album.getAdd') }}">
                            <div class="card card-hover">
                                <div class="box bg-cyan text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                                    <h6 class="text-white">Add Album</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-6">
                        <a href="{{ route('album.getAll') }}">
                            <div class="card card-hover">
                                <div class="box bg-success text-center">
                                    <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                                    <h6 class="text-white">Show Albums</h6>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>


            </div>

            <!-- Container fluid  -->
            @include('shared.footer')

        </div>

    </div>
@endsection

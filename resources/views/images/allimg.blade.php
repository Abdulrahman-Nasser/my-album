@extends('layouts.app')
@section('title', 'Album | Show All Images')
@section('content')

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
                        <h4 class="page-title">Images </h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Images</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Show All Images</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">

                <div class="row el-element-overlay">
                    @forelse ($images as $data)
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="el-card-item">
                                    <div class="el-card-avatar el-overlay-1"> <img src="{{ asset("img/$data->image") }}"
                                            alt="user" />
                                        <div class="el-overlay">

                                        </div>
                                    </div>
                                    <div class="el-card-content">
                                        <h4 class="mb-0">{{ $data->name }}</h4>


                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty

                    <div class="col-lg-12">
                        <div class="alert alert-danger bg-danger text-center text-light">
                            <span>Empty Album ...</span>
                        </div>
                        
                    </div>
                    @endforelse

                </div>

            </div>
            @include('shared.footer')
        </div>

    </div>
@endsection

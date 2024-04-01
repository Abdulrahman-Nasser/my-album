@extends('layouts.app')
@section('title', 'Album | Show All Albums')
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
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Album</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Albume</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Show All Albums</li>
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

                @if (Session::has('delete'))
                    <div class="alert alert-success bg-success text-center text-light text-bold">
                        <span>{{ Session::get('done') }}</span>
                    </div>
                @endif

                @if (Session::has('done'))
                    <div class="alert alert-success bg-success text-center text-light text-bold">
                        <span>{{ Session::get('done') }}</span>
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-danger bg-danger text-center text-light text-bold">
                        <span>{{ Session::get('error') }}</span>
                    </div>
                @endif

                <div class="row el-element-overlay">
                    @forelse ($album as $data)
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="el-card-item">
                                    <div class="el-card-avatar el-overlay-1"> <img src="./assets/images/big/img1.jpg"
                                            alt="user" />
                                        <div class="el-overlay">

                                        </div>
                                    </div>
                                    <div class="el-card-content">
                                        <h4 class="mb-0">{{ $data->name }}</h4>

                                        <hr>

                                        <div class="action d-flex justify-content-center">
                                            <a href="{{ route('album.edit', $data->id) }}">
                                                <i class="bi bi-pencil text-light btn btn-warning edit"></i>
                                            </a>

                                            {{-- <a href="#">
                                                <i class="bi bi-trash text-light mx-2  btn btn-danger"></i>
                                            </a> --}}

                                            <!-- Button trigger modal -->
                                            <button type="button" class="border-0 bg-transparent deleteButton"
                                                data-bs-toggle="modal" data-bs-target="#deleteMoveModal{{ $data->id }}"
                                                data-id="{{ $data->id }}">
                                                <i class="bi bi-trash text-light mx-2 m-0  btn btn-danger"></i>
                                            </button>

                                            <!-- Modal for Delete and Move actions -->
                                            <div class="modal fade" id="deleteMoveModal{{ $data->id }}" tabindex="-1"
                                                aria-labelledby="deleteMoveModalLabel{{ $data->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="deleteMoveModalLabel{{ $data->id }}">Delete or Move
                                                                Images</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Do you want to delete all images or move them to another
                                                                album?</p>
                                                            <div class="modal-action-btns d-flex justify-content-center">
                                                                <form
                                                                    action="{{ route('album.destroyAll', ['id' => $data->id]) }}"
                                                                    method="GET">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-danger deleteImagesBtn text-light mx-2">Delete
                                                                        All Images</button>
                                                                </form>

                                                                <button type="button" class="border-0 btn btn-primary"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#moveConfirmationModal">
                                                                    Move Images
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal for Move Image Confirmation -->
                                            <div class="modal fade" id="moveConfirmationModal" tabindex="-1"
                                                aria-labelledby="moveConfirmationModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="moveConfirmationModalLabel">Move
                                                                Images to Another Album</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('images.move') }}" method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <label for="destinationAlbumSelect">Select Destination
                                                                    Album:</label>
                                                                <select
                                                                    class="form-select @error('album') is-invalid @enderror"
                                                                    name="album" id="destinationAlbumSelect">
                                                                    <!-- Populate options dynamically -->

                                                                </select>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-primary confirmMoveBtn">Move
                                                                    Images</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <a href="{{ route('images.showAll', $data->id) }}">
                                                <i class="bi bi-eye text-light btn btn-success"></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-12">
                            <div class="alert alert-danger bg-danger text-center text-light">
                                <span>Not Found Any Album ...</span>
                            </div>

                        </div>
                    @endforelse

                </div>

            </div>
            @include('shared.footer')
        </div>

    </div>

@endsection

@if (!empty(count($album)))
    @section('jquery')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Function to populate the dropdown with albums
                function populateDestinationAlbumSelect() {
                    $.ajax({
                        url: '/albumsAll/',
                        method: 'GET',
                        success: function(response) {
                            var albums = response.albums;
                            var destinationAlbumSelect = document.getElementById("destinationAlbumSelect");
                            destinationAlbumSelect.innerHTML =
                                '<option value="" disabled selected>Select Destination Album:</option>';
                            albums.forEach(function(album) {
                                var option = document.createElement("option");
                                option.value = album.id;
                                option.text = album.name;
                                destinationAlbumSelect.add(option);
                            });
                        },

                    });
                }

                // Initially populate the dropdown with albums excluding the current album
                populateDestinationAlbumSelect('{{ session('selected_album_id') }}');

                // Event listener for updating the dropdown when the modal is shown
                $('#moveConfirmationModal').on('show.bs.modal', function() {
                    populateDestinationAlbumSelect('{{ session('selected_album_id') }}');
                });

                // Reload the page when the modal is closed
                $('#moveConfirmationModal').on('hidden.bs.modal', function() {
                    location.reload();
                });
            })
        </script>
    @endsection
@endif

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
                        <h4 class="page-title">Images </h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Images</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Add img</li>
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
                    <form action="{{ route('images.store.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">

                            @if (Session::has('done'))
                                <div class="alert alert-success bg-success text-center text-light text-bold">
                                    <span>{{ Session::get('done') }}</span>
                                </div>
                            @endif


                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title text-center">Add New image</h4>
                                    <div class="form-group">
                                        <label for="hue-demo">Image Name :</label>
                                        <input type="text" name="name"
                                            class="form-control demo  @error('name') is-invalid @enderror"value="{{ old('name') }}">
                                        @error('name')
                                            <span class="invalid-feedback mt-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="hue-demo">Album Name :</label>
                                        <select name="album" class="form-control  @error('album') is-invalid @enderror"
                                            id="">
                                            @foreach ($album as $data)
                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('album')
                                            <span class="invalid-feedback mt-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="hue-demo">Import Image :</label>
                                        <input type="file" multiple name="image"
                                            class="filepond @error('image') is-invalid @enderror"value="{{ old('image') }}">
                                        @error('image')
                                            <span class="invalid-feedback mt-3" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>


                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-success text-white w-100">Create</button>
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



@section('scripts')
    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);

        // Get a reference to the file input element
        const inputElement = document.querySelector('input[type="file"]');
        // Create a FilePond instance
        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
            server: {
                process: './image-upload',
                revert: './delete-image',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            },
        });
    </script>
@endsection

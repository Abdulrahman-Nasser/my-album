@extends('layouts.app')
@section('title', 'Album | Login ')
@section('content')
    <div class="main-wrapper">

        <!-- Loader -->
        @include('pre-loader.loader')


        <!-- Login box.scss -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    <div class="text-center pt-3 pb-3">
                        <span class="db text-light">Wlecome Back to Album</span>
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal mt-3" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row pb-4">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i
                                                class="ti-user"></i></span>
                                    </div>
                                    <input type="email" name="email"
                                        class="form-control form-control-lg @error('email') is-invalid @enderror"
                                        placeholder="E-mail" aria-label="Username" aria-describedby="basic-addon1"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback mt-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i
                                                class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password"
                                        class="form-control @error('password') is-invalid @enderror form-control-lg"
                                        placeholder="Password" aria-label="Password" name="password"
                                        aria-describedby="basic-addon1" required="">

                                    @error('password')
                                        <span class="invalid-feedback mt-3" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="pt-3">

                                        <button class="btn btn-success float-end text-white w-100"
                                            type="submit">Login</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="pt-3">
                                        <a href="{{ route('register') }}" class="btn btn-info w-100" id="to-recover"
                                            type="button"><i class="fa fa-lock me-1"></i> Sign up</a>
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

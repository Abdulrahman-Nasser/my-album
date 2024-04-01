@extends('layouts.app')

@section('content')
@extends('layouts.app')

@section('content')
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
        <div class="auth-box bg-dark border-top border-secondary">
            <div>
                <div class="text-center pt-3 pb-3">
                    <span class="db text-light"><img src="{{ asset('assets/images/logo-icon.png') }}" class="mb-3"
                            width="50" alt="logo" /> <br>
                        Become A Member and join us</span>
                </div>
                <!-- Form -->
                <form class="form-horizontal mt-3" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="row pb-4">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i
                                            class="ti-user"></i></span>
                                </div>
                                <input type="text"
                                    class="form-control form-control-lg   @error('name') is-invalid @enderror"
                                    placeholder="Username" aria-label="Username" name="name"
                                    aria-describedby="basic-addon1" value="{{old('username')}}" required>

                                @error('name')
                                    <span class="invalid-feedback mt-3" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- email -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white h-100" id="basic-addon1"><i
                                            class="ti-email"></i></span>
                                </div>
                                <input type="text"
                                    class="form-control form-control-lg  @error('email') is-invalid @enderror"
                                    placeholder="Email Address" aria-label="Username" name="email"
                                    aria-describedby="basic-addon1" value="{{old('email')}}" required>

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
                                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                                    placeholder="Password" aria-label="Password" name="password"
                                    aria-describedby="basic-addon1" required>

                                @error('password')
                                    <span class="invalid-feedback mt-3" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-info text-white h-100" id="basic-addon2"><i
                                            class="ti-pencil"></i></span>
                                </div>
                                <input type="password"
                                    class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                                    placeholder=" Confirm Password" aria-label="Password" name="password_confirmation"
                                    aria-describedby="basic-addon1"  required>

                                @error('password_confirmation')
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
                                <div class="pt-3 d-grid">
                                    <button class="btn btn-block btn-lg btn-info" type="submit">Sign Up</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@endsection

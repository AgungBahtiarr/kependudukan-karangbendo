@extends('layouts.auth')

@section('content')
<section class="login-content">
    <div class="container h-100">
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-12">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <h2 class="mb-2">Login</h2>
                        <p>Silahkan login terlebih dahulu untuk masuk ke dalam sistem</p>
                        <form action="{{ route('login') }}" method="POST" id="login" name="login">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="floating-label form-group">
                                        <input class="floating-input form-control @error('username') is-invalid @enderror" type="text" placeholder=" " name="username" value="{{ old('username') }}">
                                        <label>Username</label>
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="floating-label form-group">
                                        <input class="floating-input form-control @error('password') is-invalid @enderror" type="password" placeholder=" " name="password">
                                        <label>Password</label>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="d-block btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login</button>
                        </form>
                    </div>
                    <div class="col-lg-7 mb-lg-0 mb-4 mt-lg-0 mt-4 d-none d-lg-block text-center">
                        <img src="{{ asset('assets/images/pages/login.png') }}" class="img-fluid" style="width: 100%; max-width: 450px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
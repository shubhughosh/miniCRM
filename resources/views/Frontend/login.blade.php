@extends('Frontend.base')

@section('content')

    <div class="container my-5">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card border-0 shadow-sm mt-2">
                    <div class="card-body">
                        <h4 class="text-center"> Account Sign In</h4>
                        <p class="text-center">Please sign in with your Email and Password below:</p>

                        <div class="container">
                            <x-jet-validation-errors class="mb-4 text-danger" />
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group mt-4 mb-3">
                                    <label for="email" class="text-muted small m-0 p-0">Email ID</label>
                                    <input type="email" id="email" name="email" class="form-control shadow-none form-control-sm" placeholder="Enter your email id" required autofocus>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password" class="text-muted small m-0 p-0">Password</label>
                                    <input type="password" id="password" name="password" class="form-control shadow-none form-control-sm" placeholder="Enter your password" required>
                                </div>
                                <div class="d-grid mt-4 mb-3">
                                    <button type="submit" class="btn btn-primary btn-sm shadow-none" type="button">Sign In</button>
                                </div>
                                <div class="text-center">
                                    <a href="{{route('password.request')}}" class="forgot-password"><small>Forgot Your Password?</small></a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.app')


@section('content')

<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label>
                                        <input required name="email" class="form-control py-4" id="inputEmailAddress"
                                               type="email" placeholder="Enter email address" /></div>
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input required name="password" class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" /></div>
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <span class="text-danger">{{ session('login_error') }}</span>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><button type="submit" id="loginButton" class="btn btn-primary">Login</button></div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a id="signUp" href="register">Need an account? Sign up!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</div>

@endsection


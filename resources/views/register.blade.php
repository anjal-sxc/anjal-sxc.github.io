@extends('layouts.app')

@section('content')


<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group"><label class="small mb-1" for="inputFirstName">First Name</label><input required name="first_name" class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter first name" /></div>
                                        </div>
                                        @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="col-md-6">
                                            <div class="form-group"><label class="small mb-1" for="inputLastName">Last Name</label><input required name="last_name" class="form-control py-4" id="inputLastName" type="text" placeholder="Enter last name" /></div>
                                        </div>
                                        @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input required name="email" class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" /></div>
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input required name="password" class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" /></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"><label class="small mb-1" for="inputConfirmPassword">Confirm Password</label><input
                                                class="form-control py-4" id="inputConfirmPassword" name="password_confirmation"
                                                placeholder="Confirm password" required
                                                type="password"/></div>
                                        </div>
                                    </div>
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="form-group mt-4 mb-0"><button type="submit" class="btn btn-primary btn-block">Create Account</button></div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="login">Have an account? Go to login</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

</div>

@endsection




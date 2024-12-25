@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css">

{{-- <div id="main-wrapper" class="container">
    
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="p-5" style="background-color: beige">
                                <div class="mb-5">
                                    <div style="text-align:center">
                                        <img src="https://utar.edu.my/rvtest/images/1560407830010rvcopy_1560407805.jpg?n=1560407830282set"
                                            alt="Universiti Tunku Abdul Rahman" style="height: 80px; width: 150px">
                                    </div>
                                    <br><br>
                                    <h4 style="border: 3px solid black; text-align: center ; padding : 5px; background-color: gray; color: white"></h4>
                                </div>

                                <h6 class="h7 mb-0">Please confirm your personal login phrase !</h6>
                                <!-- <p class="text-muted mt-2 mb-5">Enter your student id to login here !</p> -->

                                <form method="POST" action="login_phrase">
                                    @csrf

                                    <div class="form-group">
                                        <label for="student_id">Student ID</label>
                                        <input type="text" class="form-control @error('student_id') is-invalid @enderror" id="student_id" name="student_id" required>

                                        @error('student_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- JUST TO SPACE -->
                                    <div class="form-group mb-5"></div>

                                    <button type="submit" class="btn-theme1">Login</button>
                                    <a href="#l" class="forgot-link float-right text-primary">Forgot password?</a>
                                </form>

                            </div>
                        </div>

                        <div class="col-lg-6 d-none d-lg-inline-block">
                            <div class="account-block rounded-right">
                                <div class="overlay rounded-right"></div>
                                <div class="account-testimonial">
                                    <h4 class="text-white mb-4">Universiti Tunku Abdul Rahman</h4>
                                    <p class="lead text-white">"Engage, connect, and build relationship with others here
                                        !"</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->

            <!-- end row -->
        </div>
        <!-- end col -->
    </div>
    <!-- Row -->
</div> --}}

{{-- <p>password page{{$s_id}}</p> --}}

<div id="main-wrapper" class="container">

    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="card border-0">
                <div class="card-body p-0 shadow-lg body-tertiary rounded">
                    <div class="row no-gutters">
                        <div class="col-lg-6">
                            <div class="p-5" style="background-color: beige">
                                <div class="mb-5">
                                    <div style="text-align:center">
                                        <img src="https://utar.edu.my/rvtest/images/1560407830010rvcopy_1560407805.jpg?n=1560407830282set"
                                            alt="Universiti Tunku Abdul Rahman" style="height: 80px; width: 150px">
                                    </div>
                                    <br><br>
                                    <h3 class="h4 font-weight-bold text-theme">Login</h3>
                                </div>

                                <h6 class="h5 mb-0">Welcome to UTAR Alumni website!</h6>
                                <p class="text-muted mt-2 mb-5">Enter your password to login here !</p>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <!-- STUDENT ID -->
                                    <div class="form-group">
                                        <label for="student_id">Student ID</label>
                                        <input type="text"
                                            class="form-control"
                                            id="student_id" name="student_id" readonly="readonly" 
                                            value="{{ old('student_id') ?? $student_id }}">
                                    </div>

                                    <!-- PASSWORD -->
                                    <div class="form-group">
                                        <label for="student_id">Password</label>
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>

                                        @enderror
                                    </div>

                                    <button type="submit" class="btn-theme1">Login</button>
                                </form>

                            </div>
                        </div>

                        <div class="col-lg-6 d-none d-lg-inline-block">
                            <div class="account-block rounded-right">
                                <div class="overlay rounded-right"></div>
                                <div class="account-testimonial">
                                    <h4 class="text-white mb-4">Universiti Tunku Abdul Rahman</h4>
                                    <p class="lead text-white">"Engage, connect, and build relationship with others here
                                        !"</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->

            <!-- end row -->

        </div>
        <!-- end col -->
    </div>
    <!-- Row -->
</div>


<style>
    body {
        margin-top: 60px;
        background-color: white;
    }

    .account-block {
        padding: 0;
        background-image: url(https://dccpr.utar.edu.my/images/1557975331076rvcopy_1557975303.jpg?n=1557975331658set);
        background-repeat: no-repeat;
        background-size: cover;
        height: 100%;
        position: relative;
    }

    .account-block .overlay {
        -webkit-box-flex: 1;
        -ms-flex: 1;
        flex: 1;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .account-block .account-testimonial {
        text-align: center;
        color: #fff;
        position: absolute;
        margin: 0 auto;
        padding: 0 1.75rem;
        bottom: 3rem;
        left: 0;
        right: 0;
    }

    .text-theme {
        color: #5369f8 !important;
    }

    .btn-theme1 {
        background-color: #5369f8;
        border-color: #5369f8;
        color: #fff;
        padding: 5px 25px;
        border-radius: 10px
    }
</style>

@endsection
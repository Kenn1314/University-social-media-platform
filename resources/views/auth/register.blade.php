@extends('layouts.app')

@section('content')

<!-- ORI CODE -->
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- NAME -->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="off">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- EMAIL -->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="off">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- STUDENT ID -->
                        <div class="row mb-3">
                            <label for="student_id" class="col-md-4 col-form-label text-md-end">{{ __('Student
                                ID')}}</label>

                            <div class="col-md-6">
                                <input id="student_id" type="string"
                                    class="form-control @error('student_id') is-invalid @enderror" name="student_id"
                                    value="{{ old('student_id') }}" required autocomplete="off">

                                @error('student_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- 01733757754 -->
                        <!-- PHONE NUMBER -->
                        <div class="row mb-3">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-end">{{
                                __('Phone')}}</label>
                            <div class="col-md-6">
                                <input id="phone_number" type="text"
                                    class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                    value="{{ old('phone_number') }}" required autocomplete="off">

                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- LKC FES -->
                        <!-- FACULTY -->
                        <div class="row mb-3">
                            <label for="faculty" class="col-md-4 col-form-label text-md-end">{{ __('Faculty')}}</label>
                            <div class="col-md-6">
                                <input id="faculty" type="text"
                                    class="form-control @error('faculty') is-invalid @enderror" name="faculty"
                                    value="{{ old('faculty') }}" required autocomplete="off">

                                @error('faculty')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Bachelor of Science (Hons) Software engineering -->
                        <!-- COURSE -->
                        <div class="row mb-3">
                            <label for="course" class="col-md-4 col-form-label text-md-end">{{ __('Course')}}</label>
                            <div class="col-md-6">
                                <input id="course" type="text"
                                    class="form-control @error('course') is-invalid @enderror" name="course" required
                                    value="{{ old('course') }}" autocomplete="off">

                                @error('course')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- 225252-56-8989 -->
                        <!-- IC -->
                        <div class="row mb-3">
                            <label for="ic" class="col-md-4 col-form-label text-md-end">{{ __('IC')}}</label>
                            <div class="col-md-6">
                                <input id="ic" type="text" class="form-control @error('ic') is-invalid @enderror"
                                    name="ic" value="{{ old('ic') }}" required autocomplete="off">

                                @error('ic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- PERSONAL LOGIN PHRASE -->
                        <div class="row mb-3">
                            <label for="personal_login_phrase" class="col-md-4 col-form-label text-md-end">{{
                                __('Personal')}}</label>

                            <div class="col-md-6">
                                <input id="personal_login_phrase" type="text"
                                    class="form-control @error('personal_login_phrase') is-invalid @enderror"
                                    name="personal_login_phrase" value="{{ old('personal_login_phrase') }}" required
                                    autocomplete="off">

                                @error('personal_login_phrase')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="off">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm
                                Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="off">
                            </div>
                        </div>

                        <!-- REGISTER BUTTON -->
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="container shadow-lg p-3 mb-5 body-tertiary rounded" style="background-color: beige;">
    <div class="row">
        <div class="col-lg-6 image-container">
            <img src="https://priunimsia.files.wordpress.com/2016/02/utar-kampar-grand-hall1.jpg?w=1462" alt=""
                class="img-fluid mb-4" style="height:100%">
        </div>

        <div class="col-lg-6 form-container">
            <!-- Registration form code here -->
            @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">

                    <!-- NAME -->
                    <div class="input-group mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="off" placeholder="Name">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- IC NUMBER -->
                    <div class="input-group mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                            <input id="ic" type="text" class="form-control @error('ic') is-invalid @enderror" name="ic"
                                value="{{ old('ic') }}" required autocomplete="off" placeholder="IC number">

                            @error('ic')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- STUDENT ID-->
                    <div class="input-group mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                            <input id="student_id" type="string"
                                class="form-control @error('student_id') is-invalid @enderror" name="student_id"
                                value="{{ old('student_id') }}" required autocomplete="off"
                                placeholder="UTAR student Id">

                            @error('student_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- EMAIL -->
                    <div class="input-group mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="off"
                                placeholder="Email address">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- PHONE_NUMBER -->
                    <div class="input-group mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                            <input id="phone_number" type="string"
                                class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                value="{{ old('phone_number') }}" required autocomplete="off"
                                placeholder="Please enter your phone number here">

                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- PHONE NUMBER -->
                    {{-- <div class="input-group mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-phone-square text-muted"></i>
                            </span>
                            <select id="countryCode" name="countryCode" style="max-width: 80px"
                                class="form-select custom-select bg-white border-left-0 border-md h-100 font-weight-bold text-muted">
                                <option value="">+60</option>
                                <option value="">+65</option>
                                <!--SINGAPORE-->
                                <option value="">+62</option>
                                <!--INDONESIA-->
                                <option value="">+66</option>
                                <!--THAILAND-->
                            </select>
                            <input id="phone_number" type="tel" name="phone_number" placeholder="Phone Number"
                                class="form-control bg-white border-md border-left-0 pl-3">
                        </div>
                    </div> --}}

                    {{--
                    <!-- FACULTY -->
                    <div class="input-group mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                            <select id="faculty" name="faculty"
                                class="form-control custom-select bg-white border-left-0 border-md">
                                <option value="">Choose your faculty</option>
                                <option value="FAS, FBF">FAS, FBF</option>
                                <option value="FEGT, FICT. FSc. ICS">FEGT, FICT. FSc. ICS</option>
                                <option value="FAM, FCI">FAM, FCI</option>
                                <option value="LKC FES">LKC FES</option>
                                <option value="MK FMHS">MK FMHS</option>
                            </select>
                        </div>
                    </div>

                    <!-- COURSE -->
                    <div class="input-group mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-black-tie text-muted"></i>
                            </span>
                            <select id="course" name="course"
                                class="form-control custom-select bg-white border-left-0 border-md">
                                <option value="">Choose your course</option>
                                <option value="Bachelor of Science (Honours) Software Engineering">Bachelor of Science
                                    (Honours) Software Engineering</option>
                                <option value="Bachelor of Science (Honours) Physics">Bachelor of Science (Honours)
                                    Physics</option>
                                <option value="Bachelor of Science (Honours) Quantity Surveying">Bachelor of Science
                                    (Honours) Quantity Surveying</option>
                            </select>
                        </div>
                    </div> --}}

                    @livewire('faculty-course')

                    <!-- PERSONAL LOGIN PHRASE -->
                    <div class="input-group mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-user text-muted"></i>
                            </span>
                            <input id="personal_login_phrase" type="text"
                                class="form-control @error('personal_login_phrase') is-invalid @enderror"
                                name="personal_login_phrase" value="{{ old('personal_login_phrase') }}" required
                                autocomplete="off" placeholder="Personal Login Phrase">

                            @error('personal_login_phrase')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- PASSWORD -->
                    <div class="input-group mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="off" placeholder="Please enter password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <!-- PASSWORD CONFIRMATION -->
                    <div class="input-group mb-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fa fa-lock text-muted"></i>
                            </span>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="off"
                                placeholder="Please enter your password again">
                        </div>
                    </div>

                    <!-- SUBMIT BTN -->
                    <div class="form-group col-lg-12 mx-auto mb-0 text-center">
                        <button type="submit" class="btn btn-primary btn-block py-2">
                            <span class="font-weight-bold">Create your account</span>
                        </button>
                    </div>
                </div>
            </form>
            <!-- Already Registered -->
            <div class="text-center w-100">
                <p class="text-muted font-weight-bold"> Already Registered?
                    <a href="/" class="text-primary ml-2">Login</a>
                </p>
            </div>
        </div>
    </div>
</div>


<style>
    html,
    body {
        height: 100%;
        /* margin-top: 60px; */
        /* background-color: white; */
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
    }

    .image-container,
    .form-container {
        padding: 20px;
    }

    @media (max-width: 768px) {

        .image-container,
        .form-container {
            padding: 10px;
        }
    }
</style>

@endsection
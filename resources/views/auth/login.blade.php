{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                        old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css">
{{--
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"> --}}
    
<div class="container">

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
                                <p class="text-muted mt-2 mb-5">Enter your student id to login here !</p>

                                <!-- STUDENT ID LABEL AND INPUT FIELD -->
                                <label for="student_id">Student ID</label> <br>
                                <input type="text" class="form-control" name="student_id" id="student_id" required>

                                <!-- ERROR MESSAGE -->
                                <p id="error_Msg" style="color:#FF6347" hidden></p> <br>

                                <!-- LOGIN BUTTON -->
                                <button onclick="validateID()" class="btn-theme1">Login</button>
                                <a href="#l" class="forgot-link float-right text-primary">Forgot password?</a>

                                <!-- PERSONAL LOGIN PHRASE MODAL -->
                                <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog  modal-dialog-centered justify-content-center "
                                        role="document">
                                        <div class="modal-content  border-0 mx-3">
                                            <div class="modal-body  p-0">
                                                <div class="card text-center">

                                                    <!-- HEADER -->
                                                    <div class="card-header pb-0 bg-white border-0">
                                                        <div class="row">
                                                            <div class="col ml-auto">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close" onclick="closeModal()">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        {{-- <img src="https://i.imgur.com/vHkq1Gb.jpg"
                                                            class="img-fluid mt-5" /> --}}
                                                        <h3>Security confirmation</h3>
                                                    </div>


                                                    <!-- BODY -->
                                                    <div class="card-body px-sm-5 mb-5">
                                                        <h4 id="personal_login_phrase"
                                                            style="border: 3px solid black; text-align: center ; padding : 5px; background-color: gray; color: white">
                                                        </h4>
                                                        <p class="text-muted">Is this your personal login phrase ?</p>
                                                        <div class="row justify-content-center mt-4 px-sm-5 ">
                                                            <div class="col">
                                                                <button type="submit"
                                                                    class="btn btn-inverse btn-block  font-weight-bold text-dark text-uppercase"
                                                                    data-dismiss="modal" onclick="closeModal()"><span class="plan">No</span>
                                                                </button>
                                                            </div>
                                                            <div class="col">
                                                                <button type="button"
                                                                    class="btn btn-primary btn-block  text-dark font-weight-bold text-uppercase"
                                                                    data-dismiss="modal"
                                                                    onclick="navigateToPassword()"><span
                                                                        class="plan">Yes</span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 d-none d-lg-inline-block">
                            <div class="account-block rounded-right">
                                <div class="overlay rounded-right"></div>
                                <div class="account-testimonial">
                                    <h4 class="text-white mb-4">Universiti Tunku Abdul Rahman</h4>
                                    <p class="lead text-white">"Engage, connect, and build relationship with others here !"</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->

            <p class="text-muted text-center mt-3 mb-0">Register an account here :  <a href="{{ route('register') }}"
                    class="text-primary ml-1">Sign up</a></p>

            <!-- end row -->

        </div>
        <!-- end col -->
    </div>
    <!-- Row -->
</div>

<style>

    body {
        margin-top: 80px;
        /* background-color: white; */
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

    .close {
        cursor: pointer;
    }
</style>


<script>
    var users = @json($users); // ALL USERS' STUDENT ID
    // console.log(users);

    var errorMsg = document.getElementById('error_Msg'); // GET ERROR MESSAGE <p> TAG

    var modal = document.getElementById('myModal');

    // Prevent closing the modal when clicking outside of it
    // modal.addEventListener('click', function(event) {
    //     // if (event.target === modal) {
    //     //     event.stopPropagation();
    //     // }
    //     console.log("clicked")
    // });


    // VALIDATE THE INPUT FIELD
    function validateID() {
        let input_Id = document.getElementById('student_id').value; // GET STUDENT ID INPUT FIELD VALUE
        // console.log('input_Id : ' + input_Id);

        // SEARCH FOR THE INPUT ID
        let auth_User = users.filter(function (u_id) { return u_id['student_id'] == input_Id; });

        // IF INPUT ID NOT ENTERED
        if(input_Id === "") {

            errorMsg.innerHTML = "Must be at least 7 characters long."; // HERE MAYBE I CAN CHANGE TO ENTER AT LEAST HOW MANY CHARACTERS
            // errorMsg.removeAttribute('hidden');
            errorMsg.hidden = false;
            // console.log("here1")
        } 
        else if(auth_User.length == 1) { // IF EXISTED IN OUR DATABASE

            // console.log(users.filter(function (u_id) { return u_id['student_id'] == input_Id; }))

            // HIDE THE ERROR MESSAGE
            errorMsg.hidden = true;

            // GET THE PERSONAL LOGIN PHRASE DISPLAY
            let loginPhrase_Display = document.getElementById('personal_login_phrase');
            loginPhrase_Display.innerHTML = auth_User[0]['personal_login_phrase'];

            // OPEN THE MODAL
            $('#myModal').modal({backdrop: 'static', keyboard: false});
            $('#myModal').modal('show');
            
            // console.log("here2")
           
        } else { // IF INPUT ID IS NOT EXISTED IN OUR DATABASE
            errorMsg.innerHTML = "Please enter a valid id."; 
            errorMsg.hidden = false;
            // console.log("here3");
        }

    }

    // CLOSE MODAL FUNCTION
    function closeModal() {
        $('#myModal').modal('hide');
    }

    // NAVIGATE TO PASSWORD PAGE
    function navigateToPassword () {
        
        let input_Id = document.getElementById('student_id').value; // GET STUDENT ID INPUT FIELD VALUE

        // SEARCH FOR THE INPUT ID
        let auth_User = users.filter(function (u_id) { return u_id['student_id'] == input_Id; });
        console.log('/auth_pass/' + auth_User[0]['student_id'])
        
        // window.location = '/auth_pass/' + auth_User[0]['student_id'];
        // window.location = '/auth_pass?id=' + auth_User[0]['student_id'];
        

        // Create a form element
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = '/auth_pass';

        // Create a hidden input field to hold the student ID
        var studentIdInput = document.createElement('input');
        studentIdInput.type = 'hidden';
        studentIdInput.name = 'student_id';
        studentIdInput.value = auth_User[0]['student_id'];

        // Append the input field to the form
        form.appendChild(studentIdInput);

        // Set the CSRF token value if needed
        var csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (csrfToken) {
            var csrfTokenInput = document.createElement('input');
            csrfTokenInput.type = 'hidden';
            csrfTokenInput.name = '_token';
            csrfTokenInput.value = csrfToken.content;
            form.appendChild(csrfTokenInput);
        }

        // Append the form to the document body
        document.body.appendChild(form);

        // Submit the form
        form.submit();
    }
    
</script>

@endsection
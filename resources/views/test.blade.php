@extends('layouts.app')

@section('content')
<!-- ORI CODE -->
<div class="container">
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
</div>


<!-- BACKUP PROFILE PAGE -->
{{-- <div class="wrapper">
  <div class="box">
    <div class="row row-offcanvas row-offcanvas-left">


      <!-- sidebar -->
      <div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">

        <ul class="nav">
          <li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i
                class="glyphicon glyphicon-chevron-right"></i></a></li>
        </ul>

        <ul class="nav hidden-xs" id="lg-menu">
          <li class="active"><a href="#featured"><i class="glyphicon glyphicon-list-alt"></i> Featured</a></li>
          <li><a href="#stories"><i class="glyphicon glyphicon-list"></i> Stories</a></li>
          <li><a href="#"><i class="glyphicon glyphicon-paperclip"></i> Saved</a></li>
          <li><a href="#"><i class="glyphicon glyphicon-refresh"></i> Refresh</a></li>
        </ul>
        <ul class="list-unstyled hidden-xs" id="sidebar-footer">
          <li>
            <a href="http://www.bootply.com">
              <h3>Bootstrap</h3> <i class="glyphicon glyphicon-heart-empty"></i> Bootply
            </a>
          </li>
        </ul>

        <!-- tiny only nav-->
        <ul class="nav visible-xs" id="xs-menu">
          <li><a href="#featured" class="text-center"><i class="glyphicon glyphicon-list-alt"></i></a></li>
          <li><a href="#stories" class="text-center"><i class="glyphicon glyphicon-list"></i></a></li>
          <li><a href="#" class="text-center"><i class="glyphicon glyphicon-paperclip"></i></a></li>
          <li><a href="#" class="text-center"><i class="glyphicon glyphicon-refresh"></i></a></li>
        </ul>

      </div>
      <!-- /sidebar -->

      <!-- main right col -->
      <div class="column col-sm-10 col-xs-11" id="main">

        <!-- top nav -->
        <div class="navbar navbar-blue navbar-static-top">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand logo">b</a>
          </div>
          <nav class="collapse navbar-collapse" role="navigation">
            <form class="navbar-form navbar-left">
              <div class="input-group input-group-sm" style="max-width:360px;">
                <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                <div class="input-group-btn">
                  <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
              </div>
            </form>
            <ul class="nav navbar-nav">
              <li>
                <a href="#"><i class="glyphicon glyphicon-home"></i> Home</a>
              </li>
              <li>
                <a href="#postModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Post</a>
              </li>
              <li>
                <a href="#"><span class="badge">badge</span></a>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i></a>
                <ul class="dropdown-menu">
                  <li><a href="">More</a></li>
                  <li><a href="">More</a></li>
                  <li><a href="">More</a></li>
                  <li><a href="">More</a></li>
                  <li><a href="">More</a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
        <!-- /top nav -->

        <div class="padding">
          <div class="full col-sm-9">

            <!-- content -->
            <div class="row">

              <!-- main col left -->
              <div class="col-sm-5">

                <div class="panel panel-default">
                  <div class="panel-thumbnail"><img src="/assets/example/bg_5.jpg" class="img-responsive"></div>
                  <div class="panel-body">
                    <p class="lead">Urbanization</p>
                    <p>45 Followers, 13 Posts</p>

                    <p>
                      <img src="https://lh3.googleusercontent.com/uFp_tsTJboUY7kue5XAsGA=s28" width="28px"
                        height="28px">
                    </p>
                  </div>
                </div>


                <div class="panel panel-default">
                  <div class="panel-heading"><a href="#" class="pull-right">View all</a>
                    <h4>Bootstrap Examples</h4>
                  </div>
                  <div class="panel-body">
                    <div class="list-group">
                      <a href="http://bootply.com/tagged/modal" class="list-group-item">Modal / Dialog</a>
                      <a href="http://bootply.com/tagged/datetime" class="list-group-item">Datetime Examples</a>
                      <a href="http://bootply.com/tagged/datatable" class="list-group-item">Data Grids</a>
                    </div>
                  </div>
                </div>

                <div class="well">
                  <form class="form-horizontal" role="form">
                    <h4>What's New</h4>
                    <div class="form-group" style="padding:14px;">
                      <textarea class="form-control" placeholder="Update your status"></textarea>
                    </div>
                    <button class="btn btn-primary pull-right" type="button">Post</button>
                    <ul class="list-inline">
                      <li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li>
                      <li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li>
                      <li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li>
                    </ul>
                  </form>
                </div>

                <div class="panel panel-default">
                  <div class="panel-heading"><a href="#" class="pull-right">View all</a>
                    <h4>More Templates</h4>
                  </div>
                  <div class="panel-body">
                    <img src="//placehold.it/150x150" class="img-circle pull-right"> <a href="#">Free @Bootply</a>
                    <div class="clearfix"></div>
                    There a load of new free Bootstrap 3 ready templates at Bootply. All of these templates are free and
                    don't require extensive customization to the Bootstrap baseline.
                    <hr>
                    <ul class="list-unstyled">
                      <li><a href="http://www.bootply.com/templates">Dashboard</a></li>
                      <li><a href="http://www.bootply.com/templates">Darkside</a></li>
                      <li><a href="http://www.bootply.com/templates">Greenfield</a></li>
                    </ul>
                  </div>
                </div>

                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4>What Is Bootstrap?</h4>
                  </div>
                  <div class="panel-body">
                    Bootstrap is front end frameworkto build custom web applications that are fast, responsive &amp;
                    intuitive. It consist of CSS and HTML for typography, forms, buttons, tables, grids, and navigation
                    along with custom-built jQuery plug-ins and support for responsive layouts. With dozens of reusable
                    components for navigation, pagination, labels, alerts etc.. </div>
                </div>



              </div>

              <!-- main col right -->
              <div class="col-sm-7">

                <div class="well">
                  <form class="form">
                    <h4>Sign-up</h4>
                    <div class="input-group text-center">
                      <input type="text" class="form-control input-lg" placeholder="Enter your email address">
                      <span class="input-group-btn"><button class="btn btn-lg btn-primary"
                          type="button">OK</button></span>
                    </div>
                  </form>
                </div>

                <div class="panel panel-default">
                  <div class="panel-heading"><a href="#" class="pull-right">View all</a>
                    <h4>Bootply Editor &amp; Code Library</h4>
                  </div>
                  <div class="panel-body">
                    <p><img src="//placehold.it/150x150" class="img-circle pull-right"> <a href="#">The Bootstrap
                        Playground</a></p>
                    <div class="clearfix"></div>
                    <hr>
                    Design, build, test, and prototype using Bootstrap in real-time from your Web browser. Bootply
                    combines the power of hand-coded HTML, CSS and JavaScript with the benefits of responsive design
                    using Bootstrap. Find and showcase Bootstrap-ready snippets in the 100% free Bootply.com code
                    repository.
                  </div>
                </div>

                <div class="panel panel-default">
                  <div class="panel-heading"><a href="#" class="pull-right">View all</a>
                    <h4>Stackoverflow</h4>
                  </div>
                  <div class="panel-body">
                    <img src="//placehold.it/150x150" class="img-circle pull-right"> <a href="#">Keyword: Bootstrap</a>
                    <div class="clearfix"></div>
                    <hr>

                    <p>If you're looking for help with Bootstrap code, the <code>twitter-bootstrap</code> tag at <a
                        href="http://stackoverflow.com/questions/tagged/twitter-bootstrap">Stackoverflow</a> is a good
                      place to find answers.</p>

                    <hr>
                    <form>
                      <div class="input-group">
                        <div class="input-group-btn">
                          <button class="btn btn-default">+1</button><button class="btn btn-default"><i
                              class="glyphicon glyphicon-share"></i></button>
                        </div>
                        <input type="text" class="form-control" placeholder="Add a comment..">
                      </div>
                    </form>

                  </div>
                </div>

                <div class="panel panel-default">
                  <div class="panel-heading"><a href="#" class="pull-right">View all</a>
                    <h4>Portlet Heading</h4>
                  </div>
                  <div class="panel-body">
                    <ul class="list-group">
                      <li class="list-group-item">Modals</li>
                      <li class="list-group-item">Sliders / Carousel</li>
                      <li class="list-group-item">Thumbnails</li>
                    </ul>
                  </div>
                </div>

                <div class="panel panel-default">
                  <div class="panel-thumbnail"><img src="/assets/example/bg_4.jpg" class="img-responsive"></div>
                  <div class="panel-body">
                    <p class="lead">Social Good</p>
                    <p>1,200 Followers, 83 Posts</p>

                    <p>
                      <img
                        src="https://lh6.googleusercontent.com/-5cTTMHjjnzs/AAAAAAAAAAI/AAAAAAAAAFk/vgza68M4p2s/s28-c-k-no/photo.jpg"
                        width="28px" height="28px">
                      <img
                        src="https://lh4.googleusercontent.com/-6aFMDiaLg5M/AAAAAAAAAAI/AAAAAAAABdM/XjnG8z60Ug0/s28-c-k-no/photo.jpg"
                        width="28px" height="28px">
                      <img
                        src="https://lh4.googleusercontent.com/-9Yw2jNffJlE/AAAAAAAAAAI/AAAAAAAAAAA/u3WcFXvK-g8/s28-c-k-no/photo.jpg"
                        width="28px" height="28px">
                    </p>
                  </div>
                </div>

              </div>
            </div>
            <!--/row-->

            <div class="row">
              <div class="col-sm-6">
                <a href="#">Twitter</a> <small class="text-muted">|</small> <a href="#">Facebook</a> <small
                  class="text-muted">|</small> <a href="#">Google+</a>
              </div>
            </div>

            <div class="row" id="footer">
              <div class="col-sm-6">

              </div>
              <div class="col-sm-6">
                <p>
                  <a href="#" class="pull-right">©Copyright 2013</a>
                </p>
              </div>
            </div>

            <hr>

            <h4 class="text-center">
              <a href="http://bootply.com/96266" target="ext">Download this Template @Bootply</a>
            </h4>

            <hr>


          </div><!-- /col-9 -->
        </div><!-- /padding -->
      </div>
      <!-- /main -->

    </div>
  </div>
</div>


<!--post modal-->
<div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        Update Status
      </div>
      <div class="modal-body">
        <form class="form center-block">
          <div class="form-group">
            <textarea class="form-control input-lg" autofocus="" placeholder="What do you want to share?"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <div>
          <button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true">Post</button>
          <ul class="pull-left list-inline">
            <li><a href=""><i class="glyphicon glyphicon-upload"></i></a></li>
            <li><a href=""><i class="glyphicon glyphicon-camera"></i></a></li>
            <li><a href=""><i class="glyphicon glyphicon-map-marker"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div> --}}
{{-- <div class="page-content">
  <div class="form-v1-content">
    <div class="wizard-form">
      <form class="form-register" action="#" method="post">
        <div id="form-total">
          <!-- SECTION 1 -->
          <h2>
            <p class="step-icon"><span>01</span></p>
            <span class="step-text">Peronal Infomation</span>
          </h2>
          <section>
            <div class="inner">
              <div class="wizard-header">
                <h3 class="heading">Peronal Infomation</h3>
                <p>Please enter your infomation and proceed to the next step so we can build your accounts. </p>
              </div>
              <div class="form-row">
                <div class="form-holder">
                  <fieldset>
                    <legend>First Name</legend>
                    <input type="text" class="form-control" id="first-name" name="first-name" placeholder="First Name"
                      required>
                  </fieldset>
                </div>
                <div class="form-holder">
                  <fieldset>
                    <legend>Last Name</legend>
                    <input type="text" class="form-control" id="last-name" name="last-name" placeholder="Last Name"
                      required>
                  </fieldset>
                </div>
              </div>
              <div class="form-row">
                <div class="form-holder form-holder-2">
                  <fieldset>
                    <legend>Your Email</legend>
                    <input type="text" name="your_email" id="your_email" class="form-control"
                      pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="example@email.com" required>
                  </fieldset>
                </div>
              </div>
              <div class="form-row">
                <div class="form-holder form-holder-2">
                  <fieldset>
                    <legend>Phone Number</legend>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="+1 888-999-7777"
                      required>
                  </fieldset>
                </div>
              </div>
              <div class="form-row form-row-date">
                <div class="form-holder form-holder-2">
                  <label class="special-label">Birth Date:</label>
                  <select name="month" id="month">
                    <option value="MM" disabled selected>MM</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                  </select>
                  <select name="date" id="date">
                    <option value="DD" disabled selected>DD</option>
                    <option value="Feb">Feb</option>
                    <option value="Mar">Mar</option>
                    <option value="Apr">Apr</option>
                    <option value="May">May</option>
                  </select>
                  <select name="year" id="year">
                    <option value="YYYY" disabled selected>YYYY</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-holder form-holder-2">
                  <input type="text" class="form-control input-border" id="ssn" name="ssn" placeholder="SSN" required>
                </div>
              </div>
            </div>
          </section>
          <!-- SECTION 2 -->
          <h2>
            <p class="step-icon"><span>02</span></p>
            <span class="step-text">Connect Bank Account</span>
          </h2>
          <section>
            <div class="inner">
              <div class="wizard-header">
                <h3 class="heading">Connect Bank Account</h3>
                <p>Please enter your infomation and proceed to the next step so we can build your accounts.</p>
              </div>
              <div class="form-row">
                <div class="form-holder form-holder-1">
                  <input type="text" name="find_bank" id="find_bank" placeholder="Find Your Bank" class="form-control"
                    required>
                </div>
              </div>
              <div class="form-row-total">
                <div class="form-row">
                  <div class="form-holder form-holder-2 form-holder-3">
                    <input type="radio" class="radio" name="bank-1" id="bank-1" value="bank-1" checked>
                    <label class="bank-images label-above bank-1-label" for="bank-1">
                      <img src="images/form-v1-1.png" alt="bank-1">
                    </label>
                    <input type="radio" class="radio" name="bank-2" id="bank-2" value="bank-2">
                    <label class="bank-images label-above bank-2-label" for="bank-2">
                      <img src="images/form-v1-2.png" alt="bank-2">
                    </label>
                    <input type="radio" class="radio" name="bank-3" id="bank-3" value="bank-3">
                    <label class="bank-images label-above bank-3-label" for="bank-3">
                      <img src="images/form-v1-3.png" alt="bank-3">
                    </label>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-holder form-holder-2 form-holder-3">
                    <input type="radio" class="radio" name="bank-4" id="bank-4" value="bank-4">
                    <label class="bank-images bank-4-label" for="bank-4">
                      <img src="images/form-v1-4.png" alt="bank-4">
                    </label>
                    <input type="radio" class="radio" name="bank-5" id="bank-5" value="bank-5">
                    <label class="bank-images bank-5-label" for="bank-5">
                      <img src="images/form-v1-5.png" alt="bank-5">
                    </label>
                    <input type="radio" class="radio" name="bank-6" id="bank-6" value="bank-6">
                    <label class="bank-images bank-6-label" for="bank-6">
                      <img src="images/form-v1-6.png" alt="bank-6">
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- SECTION 3 -->
          <h2>
            <p class="step-icon"><span>03</span></p>
            <span class="step-text">Set Financial Goals</span>
          </h2>
          <section>
            <div class="inner">
              <div class="wizard-header">
                <h3 class="heading">Set Financial Goals</h3>
                <p>Please enter your infomation and proceed to the next step so we can build your accounts.</p>
              </div>
              <div class="form-row">
                <div class="form-holder form-holder-2">
                  <input type="radio" class="radio" name="radio1" id="plan-1" value="plan-1">
                  <label class="plan-icon plan-1-label" for="plan-1">
                    <img src="images/form-v1-icon-2.png" alt="pay-1">
                  </label>
                  <div class="plan-total">
                    <span class="plan-title">Specific Plan</span>
                    <p class="plan-text">Pellentesque nec nam aliquam sem et volutpat consequat mauris nunc congue nisi.
                    </p>
                  </div>
                  <input type="radio" class="radio" name="radio1" id="plan-2" value="plan-2">
                  <label class="plan-icon plan-2-label" for="plan-2">
                    <img src="images/form-v1-icon-2.png" alt="pay-1">
                  </label>
                  <div class="plan-total">
                    <span class="plan-title">Medium Plan</span>
                    <p class="plan-text">Pellentesque nec nam aliquam sem et volutpat consequat mauris nunc congue nisi.
                    </p>
                  </div>
                  <input type="radio" class="radio" name="radio1" id="plan-3" value="plan-3" checked>
                  <label class="plan-icon plan-3-label" for="plan-3">
                    <img src="images/form-v1-icon-3.png" alt="pay-2">
                  </label>
                  <div class="plan-total">
                    <span class="plan-title">Special Plan</span>
                    <p class="plan-text">Pellentesque nec nam aliquam sem et volutpat consequat mauris nunc congue nisi.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </form>
    </div>
  </div>
</div> --}}
{{--
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">


  <title>bs4 beta profile and timeline - Bootdey.com</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">
    body {
      background: #eee;
    }

    .social-wallpaper {
      position: relative;
      height: 300px;
      background: url(https://bootdey.com/img/Content/bg1.jpg) no-repeat;
      background-size: cover;
      background-color: #00b5ec;
    }

    .card.social-tabs {
      border-top: none;
    }

    .timeline-right .card,
    .timeline-left .card {
      border-top: none;
      box-shadow: 0 0 1px 2px rgba(0, 0, 0, 0.05), 0 -2px 1px -2px rgba(0, 0, 0, 0.04), 0 0 0 -1px rgba(0, 0, 0, 0.05);
      transition: all 180ms linear;
    }

    .timeline-right .card:hover,
    .timeline-left .card:hover {
      box-shadow: 0 0 25px -5px #9e9c9e;
      transition: all 180ms linear;
    }

    .timeline-icon {
      z-index: 1;
    }

    .tab-pane form .md-add-on i {
      font-size: 20px;
    }

    .wall-elips {
      position: absolute;
      right: 15px;
    }



    .social-profile {
      position: relative;
      padding-top: 15px;
    }

    .timeline-btn {
      position: absolute;
      bottom: 0;
      right: 30px;
    }

    .nav-tabs.md-tabs.tab-timeline li a {
      padding: 20px 0 10px;
      color: #666666;
      font-size: 18px;
    }

    .social-timeline-left {
      position: absolute;
      top: -200px;
    }

    .post-input {
      padding: 10px 10px 10px 5px;
      display: block;
      width: 100%;
      border: none;
      resize: none;
    }

    .user-box .media-object,
    .friend-box .media-object {
      height: 45px;
      width: 45px;
      display: inline-block;
    }

    .friend-box img {
      margin-right: 10px;
      margin-bottom: 10px;
    }

    .user-box .media-left {
      position: relative;
    }

    .chat-header {
      color: #222222;
    }

    .live-status {
      height: 7px;
      width: 7px;
      position: absolute;
      bottom: 0;
      right: 17px;
      border-radius: 100%;
      border: 1px solid;
    }

    .tab-timeline .slide {
      bottom: -1px;
    }

    .image-upload input {
      visibility: hidden;
      max-width: 0;
      max-height: 0
    }

    .file-upload-lbl {
      max-width: 15px;
      padding: 5px 0 0;
    }

    .ellipsis::after {
      top: 15px;
      border: none;
      position: absolute;
      content: '\f142';
      font-family: FontAwesome;
    }

    .elipsis-box {
      box-shadow: 0 0 5px 1px rgba(0, 0, 0, 0.11);
      top: 40px;
      right: -10px;
    }

    .elipsis-box:after {
      content: '';
      height: 13px;
      width: 13px;
      background: #fff;
      position: absolute;
      top: -5px;
      right: 10px;
      -webkit-transform: rotate(45deg);
      -moz-transform: rotate(45deg);
      transform: rotate(45deg);
      box-shadow: -3px -3px 11px 1px rgba(170, 170, 170, 0.22);
    }

    .friend-elipsis {
      left: -10px;
      top: -10px;
    }

    .social-profile:hover .profile-hvr,
    .social-wallpaper:hover .profile-hvr {
      opacity: 1;
      transition: all ease-in-out 0.3s;
    }

    .profile-hvr {
      opacity: 0;
      position: absolute;
      text-align: center;
      width: 100%;
      font-size: 20px;
      padding: 10px;
      top: 0;
      color: #fff;
      background-color: rgba(0, 0, 0, 0.61);
      transition: all ease-in-out 0.3s;
    }

    .social-profile {
      margin: 0 15px;
    }

    .social-follower {
      text-align: center;
    }

    .social-follower h4 {
      font-size: 18px;
      margin-bottom: 10px;
      font-style: normal;
    }

    .social-follower h5 {
      font-size: 14px;
      font-weight: 300;
    }

    .social-follower .follower-counter {
      text-align: center;
      margin-top: 25px;
      margin-bottom: 25px;
      font-size: 13px;
    }

    .social-follower .follower-counter .txt-primary {
      font-size: 24px;
    }

    .timeline-icon {
      height: 45px;
      width: 45px;
      display: block;
      margin: 0 auto;
      border: 4px #fff solid;
    }

    .social-timelines-left:after {
      height: 3px;
      width: 25%;
      position: absolute;
      background: #cccccc;
      top: 20px;
      content: "";
      right: 0;
      z-index: 0;
    }

    .social-timelines:before {
      position: absolute;
      content: ' ';
      width: 3px;
      background: #cccccc;
      left: 4%;
      z-index: 0;
      height: 100%;
      top: 0;
    }

    .timeline-dot:after,
    .timeline-dot:before {
      content: "";
      position: absolute;
      height: 9px;
      width: 9px;
      background-color: #cccccc;
      left: 3.8%;
      border-radius: 100%;
    }

    .user-box .social-designation,
    .post-timelines .social-time {
      font-size: 13px;
    }

    .social-msg span {
      color: #666;
      padding-left: 10px;
      padding-right: 10px;
      margin-right: 10px;
    }

    .view-info .social-label,
    .contact-info .social-label,
    .work-info .social-label {
      font-size: 15px;
      padding-left: 0;
      padding-top: 0;
    }

    .view-info .social-user-name,
    .contact-info .social-user-name,
    .work-info .social-user-name {
      font-size: 14px;
      padding-left: 0;
    }

    .friend-elipsis .social-designation {
      font-size: 13px;
    }

    .social-client-description {
      padding-bottom: 20px;
    }

    .user-box .media-body {
      padding-top: 6px;
    }

    .timeline-details p {
      padding-top: 10px;
    }

    .timeline-details .chat-header,
    .post-timelines .chat-header {
      font-size: 15px;
    }

    .social-client-description {
      padding-bottom: 20px;
    }

    .social-client-description p {
      margin-top: 5px;
    }

    .social-client-description span {
      font-size: 12px;
      margin-left: 10px;
    }

    .social-client-description .chat-header {
      font-size: 13px;
    }

    .social-tabs a {
      font-size: 18px;
    }

    .timeline-btn a {
      margin-bottom: 20px;
    }

    .profile-hvr i {
      cursor: pointer;
    }

    .social-timelines:before {
      position: absolute;
      content: ' ';
      width: 3px;
      background: #cccccc;
      left: 4%;
      z-index: 0;
      height: 100%;
      top: 0;
    }

    .timeline-dot:after,
    .timeline-dot:before {
      content: "";
      position: absolute;
      height: 9px;
      width: 9px;
      background-color: #cccccc;
      left: 3.8%;
      border-radius: 100%;
    }

    ul#profile-lightgallery {
      display: inline-flex;
    }

    .social-timeline .btn i {
      margin-right: 0;
    }

    .card .card-block {
      padding: 25px;
    }

    .social-follower {
      text-align: center;
    }

    .media-left {
      padding-right: 20px;
    }

    .live-status {
      height: 9px;
      width: 9px;
      position: absolute;
      bottom: 0;
      right: 17px;
      border-radius: 100%;
      border: 1px solid;
      top: 5px;
    }

    .live-status {
      height: 10px;
      width: 10px;
      position: absolute;
      top: 20px;
      right: 20px;
      border-radius: 100%;
      border: 1px solid;
    }

    .bg-danger {
      background-color: #FF5370 !important;
      color: #fff;
    }

    .card {
      border-radius: 5px;
      -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
      box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
      border: none;
      margin-bottom: 30px;
      -webkit-transition: all 0.3s ease-in-out;
      transition: all 0.3s ease-in-out;
    }

    .user-box .media-object,
    .friend-box .media-object {
      height: 45px;
      width: 45px;
      display: inline-block;
      cursor: pointer;
    }

    .md-tabs .nav-item {
      width: calc(100%/ 4);
      text-align: center;
    }

    .md-tabs .nav-item .nav-link.active~.slide {
      opacity: 1;
      -webkit-transition: all 0.3s ease-out;
      transition: all 0.3s ease-out;
    }

    .md-tabs .nav-item .nav-link~.slide {
      opacity: 0;
      -webkit-transition: all 0.3s ease-out;
      transition: all 0.3s ease-out;
    }

    .tab-timeline .slide {
      bottom: -1px;
    }

    .nav-tabs .slide {
      background: #4099ff;
      width: calc(100%/ 4);
      height: 4px;
      position: absolute;
      -webkit-transition: left 0.3s ease-out;
      transition: left 0.3s ease-out;
      bottom: 0;
    }
  </style>
</head>

<body>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div>
          <div class="content social-timeline">
            <div class>
              <div class="row">
                <div class="col-md-12">
                  <div class="social-wallpaper">
                    <div class="profile-hvr">
                      <i class="icofont icofont-ui-edit p-r-10"></i>
                      <i class="icofont icofont-ui-delete"></i>
                    </div>
                  </div>
                  <div class="timeline-btn">
                    <a href="#" class="btn btn-primary waves-effect waves-light m-r-10">follows</a>
                    <a href="#" class="btn btn-primary waves-effect waves-light">Send Message</a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-4 col-xs-12">
                  <div class="social-timeline-left">
                    <div class="card">
                      <div class="social-profile">
                        <img class="img-fluid width-100" src="https://bootdey.com/img/Content/avatar/avatar7.png" alt>
                        <div class="profile-hvr m-t-15">
                          <i class="icofont icofont-ui-edit p-r-10"></i>
                          <i class="icofont icofont-ui-delete"></i>
                        </div>
                      </div>
                      <div class="card-block social-follower">
                        <h4>Josephin Villa</h4>
                        <h5>Softwear Engineer</h5>
                        <div class="row follower-counter">
                          <div class="col-4">
                            <button class="btn btn-primary btn-icon" data-toggle="tooltip" data-placement="top" title
                              data-original-title="485">
                              <i class="fa fa-user"></i>
                            </button>
                          </div>
                          <div class="col-4">
                            <button class="btn btn-danger btn-icon" data-toggle="tooltip" data-placement="top" title
                              data-original-title="2k">
                              <i class="fa fa-thumbs-o-up"></i>
                            </button>
                          </div>
                          <div class="col-4">
                            <button class="btn btn-success btn-icon" data-toggle="tooltip" data-placement="top" title
                              data-original-title="90">
                              <i class="fa fa-eye"></i>
                            </button>
                          </div>
                        </div>
                        <div class>
                          <button type="button" class="btn btn-outline-primary waves-effect btn-block"><i
                              class="icofont icofont-ui-user m-r-10"></i> Add as Friend</button>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header">
                        <h5 class="card-header-text">Who to follow</h5>
                      </div>
                      <div class="card-block user-box">
                        <div class="media m-b-10">
                          <a class="media-left" href="#!">
                            <img class="media-object img-radius"
                              src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Generic placeholder image"
                              data-toggle="tooltip" data-placement="top" title data-original-title="user image">
                            <div class="live-status bg-danger"></div>
                          </a>
                          <div class="media-body">
                            <div class="chat-header">Josephin Doe</div>
                            <div class="text-muted social-designation">Softwear Engineer</div>
                          </div>
                        </div>
                        <div class="media m-b-10">
                          <a class="media-left" href="#!">
                            <img class="media-object img-radius"
                              src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="Generic placeholder image"
                              data-toggle="tooltip" data-placement="top" title data-original-title="user image">
                            <div class="live-status bg-success"></div>
                          </a>
                          <div class="media-body">
                            <div class="chat-header">Josephin Doe</div>
                            <div class="text-muted social-designation">Softwear Engineer</div>
                          </div>
                        </div>
                        <div class="media m-b-10">
                          <a class="media-left" href="#!">
                            <img class="media-object img-radius"
                              src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="Generic placeholder image"
                              data-toggle="tooltip" data-placement="top" title data-original-title="user image">
                            <div class="live-status bg-danger"></div>
                          </a>
                          <div class="media-body">
                            <div class="chat-header">Josephin Doe</div>
                            <div class="text-muted social-designation">Softwear Engineer</div>
                          </div>
                        </div>
                        <div class="media m-b-10">
                          <a class="media-left" href="#!">
                            <img class="media-object img-radius"
                              src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="Generic placeholder image"
                              data-toggle="tooltip" data-placement="top" title data-original-title="user image">
                            <div class="live-status bg-success"></div>
                          </a>
                          <div class="media-body">
                            <div class="chat-header">Josephin Doe</div>
                            <div class="text-muted social-designation">Softwear Engineer</div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-header">
                        <h5 class="card-header-text d-inline-block">Friends</h5>
                        <span class="label label-primary f-right"> See 12 More </span>
                      </div>
                      <div class="card-block friend-box">
                        <img class="media-object img-radius" src="https://bootdey.com/img/Content/avatar/avatar1.png"
                          alt data-toggle="tooltip" data-placement="top" title data-original-title="user image">
                        <img class="media-object img-radius" src="https://bootdey.com/img/Content/avatar/avatar2.png"
                          alt data-toggle="tooltip" data-placement="top" title data-original-title="user image">
                        <img class="media-object img-radius" src="https://bootdey.com/img/Content/avatar/avatar3.png"
                          alt data-toggle="tooltip" data-placement="top" title data-original-title="user image">
                        <img class="media-object img-radius" src="https://bootdey.com/img/Content/avatar/avatar4.png"
                          alt data-toggle="tooltip" data-placement="top" title data-original-title="user image">
                        <img class="media-object img-radius" src="https://bootdey.com/img/Content/avatar/avatar5.png"
                          alt data-toggle="tooltip" data-placement="top" title data-original-title="user image">
                        <img class="media-object img-radius" src="https://bootdey.com/img/Content/avatar/avatar6.png"
                          alt data-toggle="tooltip" data-placement="top" title data-original-title="user image">
                        <img class="media-object img-radius" src="https://bootdey.com/img/Content/avatar/avatar7.png"
                          alt data-toggle="tooltip" data-placement="top" title data-original-title="user image">
                        <img class="media-object img-radius" src="https://bootdey.com/img/Content/avatar/avatar1.png"
                          alt data-toggle="tooltip" data-placement="top" title data-original-title="user image">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-8 col-xs-12 ">
                  <div class="card social-tabs">
                    <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">Timeline</a>
                        <div class="slide"></div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#about" role="tab">About</a>
                        <div class="slide"></div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#photos" role="tab">Photos</a>
                        <div class="slide"></div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#friends" role="tab">Friends</a>
                        <div class="slide"></div>
                      </li>
                    </ul>
                  </div>
                  <div class="tab-content">
                    <div class="tab-pane active" id="timeline">
                      <div class="row">
                        <div class="col-md-12 timeline-dot">
                          <div class="social-timelines p-relative">
                            <div class="row timeline-right p-t-35">
                              <div class="col-2 col-sm-2 col-xl-1">
                                <div class="social-timelines-left">
                                  <img class="img-radius timeline-icon"
                                    src="https://bootdey.com/img/Content/avatar/avatar7.png" alt>
                                </div>
                              </div>
                              <div class="col-10 col-sm-10 col-xl-11 p-l-5 p-b-35">
                                <div class="card">
                                  <div class="card-block post-timelines">
                                    <span class="dropdown-toggle addon-btn text-muted f-right service-btn"
                                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
                                      role="tooltip"></span>
                                    <div class="dropdown-menu dropdown-menu-right b-none services-list">
                                      <a class="dropdown-item" href="#">Remove tag</a>
                                      <a class="dropdown-item" href="#">Report Photo</a>
                                      <a class="dropdown-item" href="#">Hide From Timeline</a>
                                      <a class="dropdown-item" href="#">Blog User</a>
                                    </div>
                                    <div class="chat-header f-w-600">Josephin Doe posted on your timeline</div>
                                    <div class="social-time text-muted">50 minutes ago</div>
                                  </div>
                                  <img src="https://www.bootdey.com/image/800x350/87CEFA/000000"
                                    class="img-fluid width-100" alt>
                                  <div class="card-block">
                                    <div class="timeline-details">
                                      <div class="chat-header">Josephin Doe posted on your timeline</div>
                                      <p class="text-muted">lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                      </p>
                                    </div>
                                  </div>
                                  <div class="card-block b-b-theme b-t-theme social-msg">
                                    <a href="#"> <i class="icofont icofont-heart-alt text-muted"></i><span
                                        class="b-r-muted">Like (20)</span> </a>
                                    <a href="#"> <i class="icofont icofont-comment text-muted"></i> <span
                                        class="b-r-muted">Comments (25)</span></a>
                                    <a href="#"> <i class="icofont icofont-share text-muted"></i> <span>Share
                                        (10)</span></a>
                                  </div>
                                  <div class="card-block user-box">
                                    <div class="p-b-30"> <span class="f-14"><a href="#">Comments (110)</a></span><span
                                        class="f-right">see all comments</span></div>
                                    <div class="media m-b-20">
                                      <a class="media-left" href="#">
                                        <img class="media-object img-radius m-r-20"
                                          src="https://bootdey.com/img/Content/avatar/avatar2.png"
                                          alt="Generic placeholder image">
                                      </a>
                                      <div class="media-body b-b-muted social-client-description">
                                        <div class="chat-header">About Marta Williams<span class="text-muted">Jane 10,
                                            2015</span></div>
                                        <p class="text-muted">lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum
                                          dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                          ut labore et dolore magna aliqua.</p>
                                      </div>
                                    </div>
                                    <div class="media m-b-20">
                                      <a class="media-left" href="#">
                                        <img class="media-object img-radius m-r-20"
                                          src="https://bootdey.com/img/Content/avatar/avatar3.png"
                                          alt="Generic placeholder image">
                                      </a>
                                      <div class="media-body b-b-muted social-client-description">
                                        <div class="chat-header">About Marta Williams<span class="text-muted">Jane 11,
                                            2015</span></div>
                                        <p class="text-muted">lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum
                                          dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                          ut labore et dolore magna aliqua.</p>
                                      </div>
                                    </div>
                                    <div class="media">
                                      <a class="media-left" href="#">
                                        <img class="media-object img-radius m-r-20"
                                          src="https://bootdey.com/img/Content/avatar/avatar4.png"
                                          alt="Generic placeholder image">
                                      </a>
                                      <div class="media-body">
                                        <form class>
                                          <div class>
                                            <textarea rows="5" cols="5" class="form-control"
                                              placeholder="Write Something here..."></textarea>
                                            <div class="text-right m-t-20"><a href="#"
                                                class="btn btn-primary waves-effect waves-light">Post</a></div>
                                          </div>
                                        </form>
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
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
  </script>
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
  <script type="text/javascript">

  </script>
</body>

</html> --}}
@endsection
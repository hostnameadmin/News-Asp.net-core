@extends('main')
@section('title', $data['title'])
@section('content')
@if (!$token)
<div class="hk-wrapper hk-pg-auth" data-footer="simple">
    <!-- Main Content -->
    <div class="hk-pg-wrapper pt-0 pb-xl-0 pb-5">
        <div class="hk-pg-body pt-0 pb-xl-0">
            <!-- Container -->
            <div class="container-xxl">
                <!-- Row -->
                <div class="row">
                    <div class="col-sm-10 position-relative mx-auto">
                        <div class="auth-content py-8">
                            <form class="w-100" method="post" action="{{route('send_token')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-5 col-md-7 col-sm-10 mx-auto">
                                        <div class="text-center mb-7">
                                            <a class="navbar-brand me-0" href="index.html">
                                                <img class="brand-img d-inline-block" src="dist/img/logo-light.png" alt="brand">
                                            </a>
                                        </div>
                                        <div class="card card-flush">
                                            <div class="card-body text-center">
                                                <h4>Reset your Password</h4>
                                                <p class="mb-4">No worries we will mail you 6 digit code to your recovery email address to reset your password</p>
                                                @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <h6 class="heading-wth-icon alert-heading"><i class="fas fa-exclamation-triangle"></i><b> Danger!</b></h6>
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                                @if (session('success'))
                                                <div class="alert alert-success">
                                                    <h6 class="heading-wth-icon alert-heading"><i class="fa fa-check"></i><b> Success!</b></h6>
                                                    {{ session('success') }}
                                                </div>
                                                @endif
                                                <div class="row gx-3">
                                                    <div class="form-group col-lg-12">
                                                        <div class="form-label-group">
                                                            <label for="userName">Email</label>
                                                            <a href="#" class="fs-7 fw-medium">Forgot Username ?</a>
                                                        </div>
                                                        <input class="form-control" placeholder="Recovery email ID" name="email" value="" type="email">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary btn-uppercase btn-block">Send Code</button>
                                                <p class="p-xs mt-2 text-center">Did not receive code? <a href="#"><u>Send again</u></a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Row -->
            </div>
            <!-- /Container -->
        </div>
        <!-- /Page Body -->

        <!-- Page Footer -->
        <div class="hk-footer border-0">
            <footer class="container-xxl footer">
                <div class="row">
                    <div class="col-xl-8 text-center">
                        <p class="footer-text pb-0"><span class="copy-text">Jampack © 2022 All rights reserved.</span> <a href="#" class="" target="_blank">Privacy Policy</a><span class="footer-link-sep">|</span><a href="#" class="" target="_blank">T&C</a><span class="footer-link-sep">|</span><a href="#" class="" target="_blank">System Status</a></p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- / Page Footer -->

    </div>
    <!-- /Main Content -->
</div>
@else
<div class="hk-wrapper hk-pg-auth" data-footer="simple">
    <!-- Main Content -->
    <div class="hk-pg-wrapper pt-0 pb-xl-0 pb-5">
        <div class="hk-pg-body pt-0 pb-xl-0">
            <!-- Container -->
            <div class="container-xxl">
                <!-- Row -->
                <div class="row">
                    <div class="col-sm-10 position-relative mx-auto">
                        <div class="auth-content py-8">
                            <form class="w-100" method="post" action="{{route('new_password')}}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="row">
                                    <div class="col-lg-5 col-md-7 col-sm-10 mx-auto">
                                        <div class="text-center mb-7">
                                            <a class="navbar-brand me-0" href="index.html">
                                                <img class="brand-img d-inline-block" src="dist/img/logo-light.png" alt="brand">
                                            </a>
                                        </div>
                                        <div class="card card-flush">
                                            <div class="card-body text-center">
                                                <h4>Reset your Password</h4>
                                                <p class="mb-4">No worries we will mail you 6 digit code to your recovery email address to reset your password</p>
                                                @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <h6 class="heading-wth-icon alert-heading"><i class="fas fa-exclamation-triangle"></i><b> Danger!</b></h6>
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                @endif
                                                @if (session('success'))
                                                <div class="alert alert-success">
                                                    <h6 class="heading-wth-icon alert-heading"><i class="fa fa-check"></i><b> Success!</b></h6>
                                                    {{ session('success') }}
                                                </div>
                                                @endif
                                                <div class="row gx-3">
                                                    <div class="form-group col-lg-12">
                                                        <div class="form-label-group">
                                                            <label for="userName">Password</label>
                                                            <!-- <a href="#" class="fs-7 fw-medium">Forgot Username ?</a> -->
                                                        </div>
                                                        <input class="form-control" placeholder="Recovery email ID" value="" name="password" type="password">
                                                    </div>
                                                    <div class="form-group col-lg-12">
                                                        <div class="form-label-group">
                                                            <label for="userName">Confirm Password</label>
                                                            <!-- <a href="#" class="fs-7 fw-medium">Forgot Username ?</a> -->
                                                        </div>
                                                        <input class="form-control" placeholder="Recovery email ID" value="" name="password_confirmation" type="password">
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary btn-uppercase btn-block">Reset</button>
                                                <p class="p-xs mt-2 text-center">Did not receive code? <a href="#"><u>Send again</u></a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Row -->
            </div>
            <!-- /Container -->
        </div>
        <!-- /Page Body -->

        <!-- Page Footer -->
        <div class="hk-footer border-0">
            <footer class="container-xxl footer">
                <div class="row">
                    <div class="col-xl-8 text-center">
                        <p class="footer-text pb-0"><span class="copy-text">Jampack © 2022 All rights reserved.</span> <a href="#" class="" target="_blank">Privacy Policy</a><span class="footer-link-sep">|</span><a href="#" class="" target="_blank">T&C</a><span class="footer-link-sep">|</span><a href="#" class="" target="_blank">System Status</a></p>
                    </div>
                </div>
            </footer>
        </div>
        <!-- / Page Footer -->

    </div>
    <!-- /Main Content -->
</div>
@endif
@endsection
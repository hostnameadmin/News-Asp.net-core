@extends('main')
@section('title', $data['title'])
@section('content')
    <div class="hk-wrapper hk-pg-auth" data-footer="simple">
        <!-- Main Content -->
        <div class="hk-pg-wrapper py-0">
            <div class="hk-pg-body py-0">
                <!-- Container -->
                <div class="container-fluid">
                    <!-- Row -->
                    <div class="row auth-split">
                        <div class="col-xl-5 col-lg-6 col-md-7 position-relative mx-auto">
                            <div class="auth-content flex-column pt-8 pb-md-8 pb-13">
                                <div class="text-center mb-7">
                                    <a class="navbar-brand me-0" href="index.html">
                                        @foreach ($data['logo'] as $value)
                                            @if ($value['key'] == 'logo')
                                                <img class="brand-img d-inline-block" src="{{ $value['value'] }}"
                                                    alt="brand">
                                            @endif
                                        @endforeach
                                    </a>
                                </div>
                                <form class="w-100" method="post" action="{{ route('login_send') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-7 col-sm-10 mx-auto">
                                            <div class="text-center mb-4">
                                                <h4>{{ $data['title'] }}</h4>
                                                <p>Đăng nhập vào hệ thống để trải nghiệm tất cả dịch vụ!</p>
                                            </div>
                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <h6 class="heading-wth-icon alert-heading"><i
                                                            class="fas fa-exclamation-triangle"></i><b> Danger!</b></h6>
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    <h6 class="heading-wth-icon alert-heading"><i
                                                            class="fa fa-check"></i><b> Success!</b></h6>
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                                            <div class="row gx-3">
                                                <div class="form-group col-lg-12">
                                                    <div class="form-label-group">
                                                        <label>Email</label>
                                                    </div>
                                                    <input class="form-control" placeholder="Enter username or email ID"
                                                        name="email" value="" type="email">
                                                </div>
                                                <div class="form-group col-lg-12">
                                                    <div class="form-label-group">
                                                        <label>Password</label>
                                                        <a href="{{ route('reset_password') }}"
                                                            class="fs-7 fw-medium">Forgot Password ?</a>
                                                    </div>
                                                    <div class="input-group password-check">
                                                        <span class="input-affix-wrapper affix-wth-text">
                                                            <input class="form-control" placeholder="Enter your password"
                                                                name="password" value="" type="password">
                                                            <a href="#"
                                                                class="input-suffix text-primary text-uppercase fs-8 fw-medium">
                                                                <span>Show</span>
                                                                <span class="d-none">Hide</span>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="form-check form-check-sm mb-3">
                                                    <input type="checkbox" class="form-check-input" id="logged_in" checked>
                                                    <label class="form-check-label text-muted fs-7" for="logged_in">Keep me
                                                        logged in</label>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-uppercase btn-block">Login</button>
                                            <p class="p-xs mt-2 text-center">New to Jampack? <a
                                                    href="{{ route('register') }}"><u>Create new account</u></a></p>
                                            <a href="#" class="d-block extr-link text-center mt-4"><span
                                                    class="feather-icon"><i data-feather="external-link"></i></span><u
                                                    class="text-muted">Send feedback to our help forum</u></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Page Footer -->
                            <div class="hk-footer border-0">
                                <footer class="container-xxl footer">
                                    <div class="row">
                                        <div class="col-xl-8 text-center">
                                            <p class="footer-text pb-0"><span class="copy-text">Jampack © 2022 All rights
                                                    reserved.</span> <a href="#" class=""
                                                    target="_blank">Privacy Policy</a><span
                                                    class="footer-link-sep">|</span><a href="#" class=""
                                                    target="_blank">T&C</a><span class="footer-link-sep">|</span><a
                                                    href="#" class="" target="_blank">System Status</a></p>
                                        </div>
                                    </div>
                                </footer>
                            </div>
                            <!-- / Page Footer -->
                        </div>
                        <div
                            class="col-xl-7 col-lg-6 col-md-5 col-sm-10 d-md-block d-none position-relative bg-primary-light-5">
                            <div class="auth-content flex-column text-center py-8">
                                <div class="row">
                                    <div class="col-xxl-7 col-xl-8 col-lg-11 mx-auto">
                                        <h2 class="mb-4">Đăng nhập hệ thống</h2>
                                        <p>Đăng nhập vào hệ thống để trải nghiệm tất cả dịch vụ !</p>
                                        <button class="btn  btn-flush-primary btn-uppercase mt-2">Take Tour</button>
                                    </div>
                                </div>
                                <img src="{{ asset('theme/html/classic') }}/dist/img/macaroni-logged-out.png"
                                    class="img-fluid w-sm-50 mt-7" alt="login" />
                            </div>
                            <p class="p-xs credit-text opacity-55">All illustration are powered by <a
                                    href="https://icons8.com/ouch/" target="_blank" class="text-light"><u>Icons8</u></a></p>
                        </div>
                    </div>
                    <!-- /Row -->
                </div>
                <!-- /Container -->
            </div>
            <!-- /Page Body -->
        </div>
        <!-- /Main Content -->
    </div>
@endsection

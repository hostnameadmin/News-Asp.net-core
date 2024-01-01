@extends('main')
@section('title', $data['title'])
@section('content')
<!-- Wrapper -->
<div class="hk-wrapper hk-pg-auth" data-footer="simple">
    <!-- Main Content -->
    <div class="hk-pg-wrapper py-0">
        <div class="hk-pg-body py-0">
            <!-- Container -->
            <div class="container-fluid">
                <!-- Row -->
                <div class="row auth-split">
                    <div class="col-xl-5 col-lg-6 col-md-5 d-md-block d-none bg-primary-dark-3 bg-opacity-85 position-relative">
                        <img class="bg-img" src="dist/img/signup-bg.jpg" alt="bg-img">
                        <div class="auth-content py-8">
                            <div class="row">
                                <div class="col-xxl-8 mx-auto">
                                    <div class="text-center">
                                        <h3 class="text-white mb-2">Đăng ký tài khoản để trải nghiệm dịch vụ</h3>
                                    </div>
                                    <ul class="list-icon text-white mt-4">
                                        <li class="mb-1">
                                            <p><i class="ri-check-fill"></i><span>There are many variations of passages of Lorem Ipsum available, in some form, by injected humour</span></p>
                                        </li>
                                        <li class="mb-1">
                                            <p><i class="ri-check-fill"></i><span>There are many variations of passages of Lorem Ipsum available, in some form, by injected humour</span></p>
                                        </li>
                                    </ul>
                                    <div class="row gx-3 mt-7">
                                        <div class="col-lg-6">
                                            <div class="card card-shadow">
                                                <img class="card-img-top" src="dist/img/slide1.jpg" alt="Card image cap">
                                                <div class="card-body">
                                                    <h5 class="card-title text-uppercase">Help Centre</h5>
                                                    <p class="card-text">This is a wider card with supporting text.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card card-shadow">
                                                <img class="card-img-top" src="dist/img/slide2.jpg" alt="Card image cap">
                                                <div class="card-body">
                                                    <h5 class="card-title text-uppercase">Research Centre</h5>
                                                    <p class="card-text">This is a wider card with supporting text.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="p-xs text-white credit-text opacity-55">All illustration are powered by <a href="https://icons8.com/ouch/" target="_blank" class="link-white"><u>OUCH</u></a></p>
                    </div>
                    <div class="col-xl-7 col-lg-6 col-md-7 col-sm-10 position-relative mx-auto">
                        <div class="auth-content flex-column pt-8 pb-md-8 pb-13">
                            <div class="text-center mb-7">
                                <a class="navbar-brand me-0" href="index.html">
                                    <img class="brand-img d-inline-block" src="dist/img/logo-light.png" alt="brand">
                                </a>
                            </div>
                            <form class="w-100" method="post" action="{{ route('confirm_register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-xxl-5 col-xl-7 col-lg-10 mx-auto">
                                        <h4 class="text-center mb-4">{{$data['title']}}</h4>
                                        <button class="btn btn-outline-dark btn-rounded btn-block mb-3"><span><span class="icon"><i class="fab fa-google"></i></span><span>Sign Up with Gmail</span></span></button>
                                        <button class="btn btn-social btn-social-facebook btn-rounded btn-block"><span><span class="icon"><i class="fab fa-facebook"></i></span><span>Sign Up with Facebook</span></span></button>
                                        <div class="title-sm title-wth-divider divider-center my-4"><span>Or</span></div>
                                        @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <h6 class="heading-wth-icon alert-heading"><i class="fas fa-exclamation-triangle"></i><b> Danger!</b></h6>
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <div class="row gx-3">
                                            <div class="form-group col-lg-6">
                                                <label class="form-label">Name</label>
                                                <input class="form-control" placeholder="Enter your name" name="name" value="" type="text">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label class="form-label">Username</label>
                                                <input class="form-control" placeholder="Enter username" name="username" value="" type="text">
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label class="form-label">Email</label>
                                                <input class="form-control" placeholder="Enter your email id" name="email" value="" type="text">
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label class="form-label">Password</label>
                                                <div class="input-group password-check">
                                                    <span class="input-affix-wrapper affix-wth-text">
                                                        <input class="form-control" placeholder="6+ characters" name="password" value="" type="password">
                                                        <a href="#" class="input-suffix text-primary text-uppercase fs-8 fw-medium">
                                                            <span>Show</span>
                                                            <span class="d-none">Hide</span>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-check form-check-sm mb-3">
                                            <input type="checkbox" class="form-check-input" id="logged_in" checked>
                                            <label class="form-check-label text-muted fs-8" for="logged_in">By creating an account you specify that you have read and agree with our <a href="#">Tearms of use</a> and <a href="#">Privacy policy</a>. We may keep you inform about latest updates through our default <a href="#">notification settings</a></label>
                                        </div>
                                        <button class="btn btn-primary btn-rounded btn-uppercase btn-block">Create account</button>
                                        <p class="p-xs mt-2 text-center">Already a member ? <a href="{{ route('login') }}"><u>Sign In</u></a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
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
@extends('main')
@section('title', $data['title'])
@section('content')
    @include('nav')
    @include('menu')
    <div class="hk-pg-wrapper">
        <!-- Page Body -->
        <div class="hk-pg-body">
            <div class="container-xxl" id="app">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5>
                                    Khôi phục tài khoản
                                </h5>

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
                                        <h6 class="heading-wth-icon alert-heading"><i class="fa fa-check"></i><b>
                                                Success!</b></h6>
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <div class="mt-4">
                                    <form submit-ajax="true" action="{{ route('backup_balance') }}" method="post"
                                        url_redirect="reload">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Tên đăng nhập</label>
                                            <input type="text" class="form-control" name="username"
                                                placeholder="Nhập tên đăng nhập">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Địa chỉ Email</label>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Nhập địa chỉ Email">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Mật khẩu</label>
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Nhập mật khẩu">
                                        </div>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-lock"></i> Thực
                                                hiện</button>
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
    <!-- /Page Body -->

    <!-- Page Footer -->
    <div class="hk-footer">
        <footer class="container-xxl footer">
            <div class="row">
                <div class="col-xl-8">
                    <p class="footer-text"><span class="copy-text">{{ $data['title'] }} © 2022 All rights
                            reserved.</span>
                        <a href="#" class="" target="_blank">Privacy Policy</a><span
                            class="footer-link-sep">|</span><a href="#" class=""
                            target="_blank">T&amp;C</a><span class="footer-link-sep">|</span><a href="#"
                            class="" target="_blank">System Status</a>
                    </p>
                </div>
                <div class="col-xl-4">
                    <a href="#" class="footer-extr-link link-default"><span class="feather-icon"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-external-link">
                                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                <polyline points="15 3 21 3 21 9"></polyline>
                                <line x1="10" y1="14" x2="21" y2="3"></line>
                            </svg></span><u>Send feedback to our help
                            forum</u></a>
                </div>
            </div>
        </footer>
    </div>
    <!-- / Page Footer -->

    </div>
@endsection

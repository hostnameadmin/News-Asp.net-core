@extends('main')
@section('title', $data['title'])
@section('content')
    <!-- Wrapper -->
    <div class="hk-wrapper" data-layout="vertical" data-layout-style="default" data-menu="light" data-footer="simple">
        <!-- Top Navbar -->
        <nav class="hk-navbar navbar navbar-expand-xl navbar-light fixed-top">
            <div class="container-fluid">
                <!-- Start Nav -->
                <div class="nav-start-wrap">
                    <button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle d-xl-none"><span
                            class="icon"><span class="feather-icon"><i
                                    data-feather="align-left"></i></span></span></button>

                    <!-- Search -->
                    <form class="dropdown navbar-search">
                        <div class="dropdown-toggle no-caret" data-bs-toggle="dropdown" data-dropdown-animation
                            data-bs-auto-close="outside">
                            <a href="#"
                                class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover  d-xl-none"><span
                                    class="icon"><span class="feather-icon"><i
                                            data-feather="search"></i></span></span></a>
                            <div class="input-group d-xl-flex d-none">
                                <span class="input-affix-wrapper input-search affix-border">
                                    <input type="text" class="form-control  bg-transparent"
                                        data-navbar-search-close="false" placeholder="Search..." aria-label="Search">
                                    <span class="input-suffix"><span>/</span>
                                        <span class="btn-input-clear"><i class="bi bi-x-circle-fill"></i></span>
                                        <span class="spinner-border spinner-border-sm input-loader text-primary"
                                            role="status">
                                            <span class="sr-only">Loading...</span>
                                        </span>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="dropdown-menu p-0">
                            <!-- Mobile Search -->
                            <div class="dropdown-item d-xl-none bg-transparent">
                                <div class="input-group mobile-search">
                                    <span class="input-affix-wrapper input-search">
                                        <input type="text" class="form-control" placeholder="Search..."
                                            aria-label="Search">
                                        <span class="input-suffix">
                                            <span class="btn-input-clear"><i class="bi bi-x-circle-fill"></i></span>
                                            <span class="spinner-border spinner-border-sm input-loader text-primary"
                                                role="status">
                                                <span class="sr-only">Loading...</span>
                                            </span>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <!--/ Mobile Search -->
                            <div data-simplebar class="dropdown-body p-2">
                                <h6 class="dropdown-header">Recent Search
                                </h6>
                                <div class="dropdown-item bg-transparent">
                                    <a href="#" class="badge badge-pill badge-soft-secondary">Grunt</a>
                                    <a href="#" class="badge badge-pill badge-soft-secondary">Node JS</a>
                                    <a href="#" class="badge badge-pill badge-soft-secondary">SCSS</a>
                                </div>
                                <div class="dropdown-divider"></div>
                                <h6 class="dropdown-header">Help
                                </h6>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <div class="media align-items-center">
                                        <div class="media-head me-2">
                                            <div class="avatar avatar-icon avatar-xs avatar-soft-light avatar-rounded">
                                                <span class="initial-wrap">
                                                    <span class="svg-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-corner-down-right"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M6 6v6a3 3 0 0 0 3 3h10l-4 -4m0 8l4 -4"></path>
                                                        </svg>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            How to setup theme?
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <div class="media align-items-center">
                                        <div class="media-head me-2">
                                            <div class="avatar avatar-icon avatar-xs avatar-soft-light avatar-rounded">
                                                <span class="initial-wrap">
                                                    <span class="svg-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-corner-down-right"
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            stroke-width="2" stroke="currentColor" fill="none"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M6 6v6a3 3 0 0 0 3 3h10l-4 -4m0 8l4 -4"></path>
                                                        </svg>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            View detail documentation
                                        </div>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <h6 class="dropdown-header">Users
                                </h6>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <div class="media align-items-center">
                                        <div class="media-head me-2">
                                            <div class="avatar avatar-xs avatar-rounded">
                                                <img src="{{ asset('theme/html/classic') }}/dist/img/avatar3.jpg"
                                                    alt="user" class="avatar-img">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            Sarah Jone
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <div class="media align-items-center">
                                        <div class="media-head me-2">
                                            <div class="avatar avatar-xs avatar-soft-primary avatar-rounded">
                                                <span class="initial-wrap">J</span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            Joe Jackson
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <div class="media align-items-center">
                                        <div class="media-head me-2">
                                            <div class="avatar avatar-xs avatar-rounded">
                                                <img src="" alt="user" class="avatar-img">
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            Maria Richard
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer d-xl-flex d-none"><a href="#"><u>Search all</u></a></div>
                        </div>
                    </form>
                    <!-- /Search -->
                </div>
                <!-- /Start Nav -->

                <!-- End Nav -->
                <div class="nav-end-wrap">
                    <ul class="navbar-nav flex-row">
                        <li class="nav-item">
                            <a href="email.html" class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover"><span
                                    class="icon"><span class=" position-relative"><span class="feather-icon"><i
                                                data-feather="inbox"></i></span><span
                                            class="badge badge-sm badge-soft-primary badge-sm badge-pill position-top-end-overflow-1">4</span></span></span></a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown dropdown-notifications">
                                <a href="#"
                                    class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover dropdown-toggle no-caret"
                                    data-bs-toggle="dropdown" data-dropdown-animation role="button" aria-haspopup="true"
                                    aria-expanded="false"><span class="icon"><span class="position-relative"><span
                                                class="feather-icon"><i data-feather="bell"></i></span><span
                                                class="badge badge-success badge-indicator position-top-end-overflow-1"></span></span></span></a>
                                <div class="dropdown-menu dropdown-menu-end p-0">
                                    <h6 class="dropdown-header px-4 fs-6">Notifications<a href="#"
                                            class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"><span
                                                class="icon"><span class="feather-icon"><i
                                                        data-feather="settings"></i></span></span></a>
                                    </h6>
                                    <div data-simplebar class="dropdown-body  p-2">
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <div class="media">
                                                <div class="media-head">
                                                    <div class="avatar avatar-rounded avatar-sm">
                                                        <img src="{{ asset('theme/html/classic') }}/dist/img/avatar2.jpg"
                                                            alt="user" class="avatar-img">
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div>
                                                        <div class="notifications-text">Morgan Freeman accepted your
                                                            invitation to join the team</div>
                                                        <div class="notifications-info">
                                                            <span class="badge badge-soft-success">Collaboration</span>
                                                            <div class="notifications-time">Today, 10:14 PM</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <div class="media">
                                                <div class="media-head">
                                                    <div
                                                        class="avatar  avatar-icon avatar-sm avatar-success avatar-rounded">
                                                        <span class="initial-wrap">
                                                            <span class="feather-icon"><i data-feather="inbox"></i></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div>
                                                        <div class="notifications-text">New message received from Alan
                                                            Rickman</div>
                                                        <div class="notifications-info">
                                                            <div class="notifications-time">Today, 7:51 AM</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <div class="media">
                                                <div class="media-head">
                                                    <div class="avatar  avatar-icon avatar-sm avatar-pink avatar-rounded">
                                                        <span class="initial-wrap">
                                                            <span class="feather-icon"><i data-feather="clock"></i></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div>
                                                        <div class="notifications-text">You have a follow up with Jampack
                                                            Head on Friday, Dec 19 at 9:30 am</div>
                                                        <div class="notifications-info">
                                                            <div class="notifications-time">Yesterday, 9:25 PM</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <div class="media">
                                                <div class="media-head">
                                                    <div class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{ asset('theme/html/classic') }}/dist/img/avatar3.jpg"
                                                            alt="user" class="avatar-img">
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div>
                                                        <div class="notifications-text">Application of Sarah Williams is
                                                            waiting for your approval</div>
                                                        <div class="notifications-info">
                                                            <div class="notifications-time">Today 10:14 PM</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <div class="media">
                                                <div class="media-head">
                                                    <div class="avatar avatar-sm avatar-rounded">
                                                        <img src="{{ asset('theme/html/classic') }}/dist/img/avatar10.jpg"
                                                            alt="user" class="avatar-img">
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div>
                                                        <div class="notifications-text">Winston Churchil shared a document
                                                            with you</div>
                                                        <div class="notifications-info">
                                                            <span class="badge badge-soft-violet">File Manager</span>
                                                            <div class="notifications-time">2 Oct, 2021</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="javascript:void(0);" class="dropdown-item">
                                            <div class="media">
                                                <div class="media-head">
                                                    <div
                                                        class="avatar  avatar-icon avatar-sm avatar-danger avatar-rounded">
                                                        <span class="initial-wrap">
                                                            <span class="feather-icon"><i
                                                                    data-feather="calendar"></i></span>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div>
                                                        <div class="notifications-text">Last 2 days left for the project to
                                                            be completed</div>
                                                        <div class="notifications-info">
                                                            <span class="badge badge-soft-orange">Updates</span>
                                                            <div class="notifications-time">14 Sep, 2021</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="dropdown-footer"><a href="#"><u>View all notifications</u></a></div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown ps-2">
                                <a class=" dropdown-toggle no-caret" href="#" role="button"
                                    data-bs-display="static" data-bs-toggle="dropdown" data-dropdown-animation
                                    data-bs-auto-close="outside" aria-expanded="false">
                                    <div class="avatar avatar-rounded avatar-xs">
                                        <img src="{{ asset('theme/html/classic') }}/dist/img/avatar12.jpg" alt="user"
                                            class="avatar-img">
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="p-2">
                                        <div class="media">
                                            <div class="media-head me-2">
                                                <div class="avatar avatar-primary avatar-sm avatar-rounded">
                                                    <span class="initial-wrap">TTSL</span>
                                                </div>
                                            </div>
                                            @if (Auth::check())
                                                <div class="media-body">
                                                    <div class="dropdown">
                                                        <a href="#"
                                                            class="d-block dropdown-toggle link-dark fw-medium"
                                                            data-bs-toggle="dropdown" data-dropdown-animation
                                                            data-bs-auto-close="inside">
                                                            {{ Auth::user()->name }}
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <div class="p-2">
                                                                <div class="media align-items-center active-user mb-3">
                                                                    <div class="media-head me-2">
                                                                        <div
                                                                            class="avatar avatar-primary avatar-xs avatar-rounded">
                                                                            <span
                                                                                class="initial-wrap">{{ Auth::user()->name }}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <a href="#"
                                                                            class="d-flex align-items-center link-dark">{{ Auth::user()->name }}
                                                                            <i
                                                                                class="ri-checkbox-circle-fill fs-7 text-primary ms-1"></i></a>
                                                                        <a href="#"
                                                                            class="d-block fs-8 link-secondary"><u>Manage
                                                                                your account</u></a>
                                                                    </div>
                                                                </div>
                                                                <div class="media align-items-center mb-3">
                                                                    <div class="media-head me-2">
                                                                        <div class="avatar avatar-xs avatar-rounded">
                                                                            <img src="{{ asset('theme/html/classic') }}/dist/img/avatar12.jpg"
                                                                                alt="user" class="avatar-img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <a href="#"
                                                                            class="d-block link-dark">Jampack Team</a>
                                                                        <a href="#"
                                                                            class="d-block fs-8 link-secondary">{{ Auth::user()->email }}</a>
                                                                    </div>
                                                                </div>
                                                                <button class="btn btn-block btn-outline-light btn-sm">
                                                                    <span><span class="icon"><span
                                                                                class="feather-icon"><i
                                                                                    data-feather="plus"></i></span></span>
                                                                        <span>Add Account</span></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="fs-7">{{ Auth::user()->email }}</div>
                                                    <div class="fs-7">Số dư :
                                                        {{ str_replace(',', '.', number_format(Auth::user()->balance)) }}
                                                    </div>
                                                    <a href="{{ route('logout') }}"
                                                        class="d-block fs-8 link-secondary"><u>Đăng xuất</u></a>
                                                </div>
                                        </div>

                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="profile.html">Profile</a>
                                    <a class="dropdown-item" href="#"><span class="me-2">Offers</span><span
                                            class="badge badge-sm badge-soft-pink">2</span></a>
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header">Manage Account</h6>
                                    <a class="dropdown-item" href="#"><span class="dropdown-icon feather-icon"><i
                                                data-feather="credit-card"></i></span><span>Payment methods</span></a>
                                    <a class="dropdown-item" href="#"><span class="dropdown-icon feather-icon"><i
                                                data-feather="check-square"></i></span><span>Subscriptions</span></a>
                                    <a class="dropdown-item" href="#"><span class="dropdown-icon feather-icon"><i
                                                data-feather="settings"></i></span><span>Settings</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"><span class="dropdown-icon feather-icon"><i
                                                data-feather="tag"></i></span><span>Raise a ticket</span></a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Terms & Conditions</a>
                                    <a class="dropdown-item" href="#">Help & Support</a>
                                </div>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- /End Nav -->
            </div>
        </nav>
        <!-- /Top Navbar -->

        <!-- Vertical Nav -->
        <div class="hk-menu">
            <!-- Brand -->
            <div class="menu-header">
                <span>
                    <a class="navbar-brand" href="index.html">
                        <img class="brand-img img-fluid" src="{{ asset('theme/html/classic') }}/dist/img/brand-sm.svg"
                            alt="brand" />
                        <img class="brand-img img-fluid" src="{{ asset('theme/html/classic') }}/dist/img/Jampack.svg"
                            alt="brand" />
                    </a>
                    <button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle">
                        <span class="icon">
                            <span class="svg-icon fs-5">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-arrow-bar-to-left" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="10" y1="12" x2="20" y2="12"></line>
                                    <line x1="10" y1="12" x2="14" y2="16"></line>
                                    <line x1="10" y1="12" x2="14" y2="8"></line>
                                    <line x1="4" y1="4" x2="4" y2="20"></line>
                                </svg>
                            </span>
                        </span>
                    </button>
                </span>
            </div>
            <!-- /Brand -->

            @include('menu', ['data' => Session::get('data')])

            <!-- /Main Menu -->
        </div>
        <div id="hk_menu_backdrop" class="hk-menu-backdrop"></div>
        <div class="hk-pg-wrapper">
            <div class="container-xxl">
                <!-- Page Header -->
                <div class="hk-pg-header pg-header-wth-tab pt-7">
                    <div class="d-flex">
                        <div class="d-flex flex-wrap justify-content-between flex-1">
                            <div class="col-md-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="">Tuongtacsale.com</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">{{ $data['title'] }}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    <!-- Page Body -->
                    <style>
                        .checkbox:checked+img {
                            border: 3px solid #21da11;
                            position: relative;
                            top: -3px;
                            transform: scale(1.2);
                        }
                    </style>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <ul
                                        class="nav nav-justified nav-light nav-tabs nav-segmented-tabs segmented-tabs-filled">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#tab_order">
                                                <span class="nav-icon-wrap"><span class="feather-icon"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-check-circle">
                                                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                        </svg></span></span>
                                                <span class="nav-link-text">Thêm đơn</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#tab_list">
                                                <span class="nav-icon-wrap"><span class="feather-icon"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-file-text">
                                                            <path
                                                                d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                            </path>
                                                            <polyline points="14 2 14 8 20 8"></polyline>
                                                            <line x1="16" y1="13" x2="8"
                                                                y2="13"></line>
                                                            <line x1="16" y1="17" x2="8"
                                                                y2="17"></line>
                                                            <polyline points="10 9 9 9 8 9"></polyline>
                                                        </svg></span></span>
                                                <span class="nav-link-text">Quản lý đơn</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="tab_order">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <form submit-ajax="true"
                                                        action="https://subgiare.vn/api/service/facebook/like-post-sale/order"
                                                        method="post" confirm_order="true" class="mb-3">
                                                        <div class="form-group row mb-3">
                                                            <label for="" class="form-label col-md-3">Link bài
                                                                viết
                                                            </label>
                                                            <div class="col-md-9">
                                                                <input type="url" class="form-control"
                                                                    name="link_post"
                                                                    placeholder="Nhập link bài viết cần tăng">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-3">
                                                            <label for="" class="form-label col-md-3">Máy chủ
                                                            </label>
                                                            <div class="col-md-9">
                                                                <div class="mb-2">
                                                                    <div class="mb-1">
                                                                        @foreach ($data['server'] as $value)
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    id="sv9" type="radio"
                                                                                    detail="Tốc độ ổn 5k/ngày, không hỗ trợ bài viết chia sẻ video, bài viết trong nhóm, bài viết hoặc video đang chạy ads."
                                                                                    name="server_order" onchange="bill();"
                                                                                    value="sv9" reaction-show="like">
                                                                                <label class="form-check-label"
                                                                                    for="sv9">{{ $value['name'] }}
                                                                                    (Like clone nuôi, max 3m like <b
                                                                                        class="text-info">(nên
                                                                                        dùng ổn
                                                                                        định)</b>)
                                                                                    &nbsp;<span
                                                                                        class="badge bg-success ">{{ $value['price'] }}
                                                                                        coin / 1 like</span>&nbsp;<b
                                                                                        class="text-warning">(Hoạt
                                                                                        động)</b></label>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                <div id="detailServer"></div>
                                                            </div>
                                                        </div>
                                                        @if ($data['service']['reaction'] == 1)
                                                            <div class="form-group row mb-3">
                                                                <label for="" class="form-label col-md-3">Cảm
                                                                    xúc</label>
                                                                <div class="col-md-9">
                                                                    <div class="">
                                                                        <div
                                                                            class=" form-check
                                        form-check-inline">
                                                                            <label class="form-check-label "
                                                                                for="reaction0">
                                                                                <input
                                                                                    class="form-check-input checkbox d-none"
                                                                                    type="radio" data-prices="101"
                                                                                    id="reaction0" name="reaction"
                                                                                    value="like" checked=""><img
                                                                                    src="https://subgiare.vn/assets/images/fb-reaction/like.png"
                                                                                    alt="image"
                                                                                    class="d-block ml-2 rounded-circle"
                                                                                    width="35">
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <label class="form-check-label "
                                                                                for="reaction1">
                                                                                <input
                                                                                    class="form-check-input checkbox d-none"
                                                                                    type="radio" data-prices="100"
                                                                                    id="reaction1" name="reaction"
                                                                                    value="love"><img
                                                                                    src="https://subgiare.vn/assets/images/fb-reaction/love.png"
                                                                                    alt="image"
                                                                                    class="d-block ml-2 rounded-circle"
                                                                                    width="35">
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <label class="form-check-label "
                                                                                for="reaction2">
                                                                                <input
                                                                                    class="form-check-input checkbox d-none"
                                                                                    type="radio" data-prices="100"
                                                                                    id="reaction2" name="reaction"
                                                                                    value="care"><img
                                                                                    src="https://subgiare.vn/assets/images/fb-reaction/care.png"
                                                                                    alt="image"
                                                                                    class="d-block ml-2 rounded-circle"
                                                                                    width="35">
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <label class="form-check-label "
                                                                                for="reaction3">
                                                                                <input
                                                                                    class="form-check-input checkbox d-none"
                                                                                    type="radio" data-prices="100"
                                                                                    id="reaction3" name="reaction"
                                                                                    value="haha"><img
                                                                                    src="https://subgiare.vn/assets/images/fb-reaction/haha.png"
                                                                                    alt="image"
                                                                                    class="d-block ml-2 rounded-circle"
                                                                                    width="35">
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <label class="form-check-label "
                                                                                for="reaction4">
                                                                                <input
                                                                                    class="form-check-input checkbox d-none"
                                                                                    type="radio" data-prices="100"
                                                                                    id="reaction4" name="reaction"
                                                                                    value="wow"><img
                                                                                    src="https://subgiare.vn/assets/images/fb-reaction/wow.png"
                                                                                    alt="image"
                                                                                    class="d-block ml-2 rounded-circle"
                                                                                    width="35">
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <label class="form-check-label "
                                                                                for="reaction6">
                                                                                <input
                                                                                    class="form-check-input checkbox d-none"
                                                                                    type="radio" data-prices="100"
                                                                                    id="reaction6" name="reaction"
                                                                                    value="sad"><img
                                                                                    src="https://subgiare.vn/assets/images/fb-reaction/sad.png"
                                                                                    alt="image"
                                                                                    class="d-block ml-2 rounded-circle"
                                                                                    width="35">
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check form-check-inline">
                                                                            <label class="form-check-label "
                                                                                for="reaction7">
                                                                                <input
                                                                                    class="form-check-input checkbox d-none"
                                                                                    type="radio" data-prices="100"
                                                                                    id="reaction7" name="reaction"
                                                                                    value="angry"><img
                                                                                    src="https://subgiare.vn/assets/images/fb-reaction/angry.png"
                                                                                    alt="image"
                                                                                    class="d-block ml-2 rounded-circle"
                                                                                    width="35">
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($data['service']['vip'] == 1)
                                                            <div class="form-group row mb-3">
                                                                <label for="" class="form-label col-md-3">Số bài
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <div class="form-control-wrap">
                                                                        <select class="form-select" data-search="on"
                                                                            name="post" onchange="bill();">
                                                                            <option value="5">5 bài</option>
                                                                            <option value="7">7 bài</option>
                                                                            <option value="10">10 bài</option>
                                                                            <option value="15">15 bài</option>
                                                                            <option value="20">20 bài</option>
                                                                            <option value="30">30 bài</option>
                                                                            <option value="40">40 bài</option>
                                                                            <option value="50">50 bài</option>
                                                                            <option value="60">60 bài</option>
                                                                            <option value="70">70 bài</option>
                                                                            <option value="80">80 bài</option>
                                                                            <option value="90">90 bài</option>
                                                                            <option value="100">100 bài</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-3">
                                                                <label for="" class="form-label col-md-3">Số ngày
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <div class="form-control-wrap">
                                                                        <select class="form-select" data-search="on"
                                                                            name="post" onchange="bill();">
                                                                            <option value="5">5 bài</option>
                                                                            <option value="7">7 bài</option>
                                                                            <option value="10">10 bài</option>
                                                                            <option value="15">15 bài</option>
                                                                            <option value="20">20 bài</option>
                                                                            <option value="30">30 bài</option>
                                                                            <option value="40">40 bài</option>
                                                                            <option value="50">50 bài</option>
                                                                            <option value="60">60 bài</option>
                                                                            <option value="70">70 bài</option>
                                                                            <option value="80">80 bài</option>
                                                                            <option value="90">90 bài</option>
                                                                            <option value="100">100 bài</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        @if ($data['service']['vip'] == 0 && $data['service']['comment'] == 0)
                                                            <div class="form-group row mb-3">
                                                                <label for="" class="form-label col-md-3">Số lượng
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <input type="text" class="form-control mb-3"
                                                                        name="amount" onkeyup="bill();" value="100"
                                                                        placeholder="Nhập số lượng cần tăng">
                                                                    <div class="alert text-white bg-info text-center"
                                                                        role="alert">
                                                                        <strong>Tổng tiền = (Số lượng) x (Giá 1
                                                                            like)</strong>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @elseif($data['service']['comment'] == 1)
                                                            <div class="form-group row mb-3">
                                                                <label for="" class="form-label col-md-3">Bình
                                                                    Luận
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <textarea class="form-control mb-3" name="note" rows="3" placeholder="Nhập ghi chú nếu cần"></textarea>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="form-group row mb-3">
                                                                <label for="" class="form-label col-md-3">Số lượng
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <div class="form-control-wrap">
                                                                        <select class="form-select" data-search="on"
                                                                            name="post" onchange="bill();">
                                                                            <option value="5">5 bài</option>
                                                                            <option value="7">7 bài</option>
                                                                            <option value="10">10 bài</option>
                                                                            <option value="15">15 bài</option>
                                                                            <option value="20">20 bài</option>
                                                                            <option value="30">30 bài</option>
                                                                            <option value="40">40 bài</option>
                                                                            <option value="50">50 bài</option>
                                                                            <option value="60">60 bài</option>
                                                                            <option value="70">70 bài</option>
                                                                            <option value="80">80 bài</option>
                                                                            <option value="90">90 bài</option>
                                                                            <option value="100">100 bài</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        <div class="form-group row mb-3">
                                                            <label for="" class="form-label col-md-3">Ghi chú
                                                            </label>
                                                            <div class="col-md-9">
                                                                <textarea class="form-control mb-3" name="note" rows="3" placeholder="Nhập ghi chú nếu cần"></textarea>
                                                                <div class="alert bg-danger text-white" role="alert">
                                                                    <h4 class="text-white">Vui lòng đọc tránh mất tiền</h4>
                                                                    - <b>Mua bằng link bài viết ở chế độ công khai, phải có
                                                                        nút
                                                                        like.</b>.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row mb-3">
                                                            <div class="col-sm-12 text-center">
                                                                <div class="alert text-white bg-success " role="alert">
                                                                    <h3 class="font-bold text-white">Tổng thanh toán: <span
                                                                            class="bold green"><span id="total_payment"
                                                                                class="text-danger">0</span> coin</span>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="d-grid gap-2">
                                                            <button type="submit" class="btn btn-primary" id="buy"
                                                                order="Bạn có muốn thanh toán đơn hàng?, chúng tôi sẽ không hoàn tiền với đơn đã thanh toán."><img
                                                                    src="https://subgiare.vn/assets/images/svg/buy.svg"
                                                                    alt="" width="30" height="30"> Thanh
                                                                toán</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="alert bg-secondary text-white" role="alert">
                                                                <h4 class="text-white">Các trường hợp đơn bị hủy hoặc không
                                                                    lên
                                                                    like
                                                                </h4>
                                                                <ul>
                                                                    <li>
                                                                        <p>Bài viết không mở công khai hoặc lấy sai link,
                                                                            id.
                                                                        </p>
                                                                    </li>
                                                                    <li>
                                                                        <p>Nếu tăng like cho group công khai ,video và live
                                                                            hãy
                                                                            mua thử
                                                                            số lượng nhỏ xem server đó có chạy không vì 1 số
                                                                            server
                                                                            không hỗ trợ.</p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="alert bg-danger text-white" role="alert">
                                                                <h4 class="text-white">Lưu ý</h4>
                                                                <ul>
                                                                    <li>
                                                                        <p>Nghiêm cấm buff các đơn có nội dung vi phạm pháp
                                                                            luật, chính trị, đồ trụy... Nếu cố tình buff bạn
                                                                            sẽ
                                                                            bị trừ hết tiền và ban khỏi hệ thống vĩnh viễn,
                                                                            và
                                                                            phải chịu hoàn toàn trách nhiệm trước pháp
                                                                            luật.</p>
                                                                    </li>
                                                                    <li>
                                                                        <p>Nếu đơn đang chạy trên hệ thống mà bạn vẫn mua ở
                                                                            các
                                                                            hệ thống bên khác hoặc đè nhiều đơn, nếu có tình
                                                                            trạng hụt,
                                                                            thiếu
                                                                            số lượng giữa 2 bên thì sẽ không được xử lí.</p>
                                                                    </li>
                                                                    <li>
                                                                        <p>Đơn cài sai thông tin hoặc lỗi trong quá trình
                                                                            tăng
                                                                            hệ thống sẽ không hoàn lại tiền.</p>
                                                                    </li>
                                                                    <li>
                                                                        <p>Nếu gặp lỗi hãy nhắn tin hỗ trợ phía bên phải góc
                                                                            màn
                                                                            hình hoặc vào mục liên hệ hỗ trợ để được hỗ
                                                                            trợ
                                                                            tốt nhất</p>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab_list">
                                            <div class="table-responsive">

                                                <table class="table table-bordered table-hover no-footer text-nowrap"
                                                    id="listOrders">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="text-center">ID</th>
                                                            <th class="text-center">Thao tác</th>
                                                            <th class="text-center">Thời gian</th>
                                                            <th class="text-center">Mã đơn</th>
                                                            <th class="text-center">Link bài viết</th>
                                                            <th class="text-center">Máy chủ</th>
                                                            <th class="text-center">Cảm xúc</th>
                                                            <th class="text-center">Số lượng</th>
                                                            <th class="text-center">Bắt đầu</th>
                                                            <th class="text-center">Đã tăng</th>
                                                            <th class="text-center">Giá</th>
                                                            <th class="text-center">Tổng thanh toán</th>
                                                            <th class="text-center">Ghi chú</th>
                                                            <th class="text-center">Trạng thái</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody role="alert" aria-live="polite" aria-relevant="all"
                                                        class="">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Page Footer -->
                    <div class="hk-footer">
                        <footer class="container-xxl footer">
                            <div class="row">
                                <div class="col-xl-8">
                                    <p class="footer-text"><span class="copy-text">Jampack © 2022 All rights
                                            reserved.</span> <a href="#" class="" target="_blank">Privacy
                                            Policy</a><span class="footer-link-sep">|</span><a href="#"
                                            class="" target="_blank">T&C</a><span
                                            class="footer-link-sep">|</span><a href="#" class=""
                                            target="_blank">System Status</a></p>
                                </div>
                                <div class="col-xl-4">
                                    <a href="#" class="footer-extr-link link-default"><span class="feather-icon"><i
                                                data-feather="external-link"></i></span><u>Send
                                            feedback to our help forum</u></a>
                                </div>
                            </div>
                    </div>
                    <!-- / Page Footer -->

                </div>
                <!-- /Main Content -->
            </div>
        @endsection

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
                <button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle d-xl-none"><span class="icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span></button>

                <!-- Search -->
                <form class="dropdown navbar-search">
                    <div class="dropdown-toggle no-caret" data-bs-toggle="dropdown" data-dropdown-animation data-bs-auto-close="outside">
                        <a href="#" class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover  d-xl-none"><span class="icon"><span class="feather-icon"><i data-feather="search"></i></span></span></a>
                        <div class="input-group d-xl-flex d-none">
                            <span class="input-affix-wrapper input-search affix-border">
                                <input type="text" class="form-control  bg-transparent" data-navbar-search-close="false" placeholder="Search..." aria-label="Search">
                                <span class="input-suffix"><span>/</span>
                                    <span class="btn-input-clear"><i class="bi bi-x-circle-fill"></i></span>
                                    <span class="spinner-border spinner-border-sm input-loader text-primary" role="status">
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
                                    <input type="text" class="form-control" placeholder="Search..." aria-label="Search">
                                    <span class="input-suffix">
                                        <span class="btn-input-clear"><i class="bi bi-x-circle-fill"></i></span>
                                        <span class="spinner-border spinner-border-sm input-loader text-primary" role="status">
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-corner-down-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-corner-down-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                            <img src="dist/img/avatar3.jpg" alt="user" class="avatar-img">
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
                                            <img src="dist/img/avatar4.jpg" alt="user" class="avatar-img">
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
                        <a href="email.html" class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover"><span class="icon"><span class=" position-relative"><span class="feather-icon"><i data-feather="inbox"></i></span><span class="badge badge-sm badge-soft-primary badge-sm badge-pill position-top-end-overflow-1">4</span></span></span></a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown dropdown-notifications">
                            <a href="#" class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover dropdown-toggle no-caret" data-bs-toggle="dropdown" data-dropdown-animation role="button" aria-haspopup="true" aria-expanded="false"><span class="icon"><span class="position-relative"><span class="feather-icon"><i data-feather="bell"></i></span><span class="badge badge-success badge-indicator position-top-end-overflow-1"></span></span></span></a>
                            <div class="dropdown-menu dropdown-menu-end p-0">
                                <h6 class="dropdown-header px-4 fs-6">Notifications<a href="#" class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"><span class="icon"><span class="feather-icon"><i data-feather="settings"></i></span></span></a>
                                </h6>
                                <div data-simplebar class="dropdown-body  p-2">
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <div class="media">
                                            <div class="media-head">
                                                <div class="avatar avatar-rounded avatar-sm">
                                                    <img src="dist/img/avatar2.jpg" alt="user" class="avatar-img">
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <div class="notifications-text">Morgan Freeman accepted your invitation to join the team</div>
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
                                                <div class="avatar  avatar-icon avatar-sm avatar-success avatar-rounded">
                                                    <span class="initial-wrap">
                                                        <span class="feather-icon"><i data-feather="inbox"></i></span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <div class="notifications-text">New message received from Alan Rickman</div>
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
                                                    <div class="notifications-text">You have a follow up with Jampack Head on Friday, Dec 19 at 9:30 am</div>
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
                                                    <img src="dist/img/avatar3.jpg" alt="user" class="avatar-img">
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <div class="notifications-text">Application of Sarah Williams is waiting for your approval</div>
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
                                                    <img src="dist/img/avatar10.jpg" alt="user" class="avatar-img">
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <div class="notifications-text">Winston Churchil shared a document with you</div>
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
                                                <div class="avatar  avatar-icon avatar-sm avatar-danger avatar-rounded">
                                                    <span class="initial-wrap">
                                                        <span class="feather-icon"><i data-feather="calendar"></i></span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <div>
                                                    <div class="notifications-text">Last 2 days left for the project to be completed</div>
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
                            <a class=" dropdown-toggle no-caret" href="#" role="button" data-bs-display="static" data-bs-toggle="dropdown" data-dropdown-animation data-bs-auto-close="outside" aria-expanded="false">
                                <div class="avatar avatar-rounded avatar-xs">
                                    <img src="dist/img/avatar12.jpg" alt="user" class="avatar-img">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="p-2">
                                    <div class="media">
                                        <div class="media-head me-2">
                                            <div class="avatar avatar-primary avatar-sm avatar-rounded">
                                                <span class="initial-wrap">Hk</span>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="dropdown">
                                                <a href="#" class="d-block dropdown-toggle link-dark fw-medium" data-bs-toggle="dropdown" data-dropdown-animation data-bs-auto-close="inside">Hencework</a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <div class="p-2">
                                                        <div class="media align-items-center active-user mb-3">
                                                            <div class="media-head me-2">
                                                                <div class="avatar avatar-primary avatar-xs avatar-rounded">
                                                                    <span class="initial-wrap">Hk</span>
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <a href="#" class="d-flex align-items-center link-dark">Hencework <i class="ri-checkbox-circle-fill fs-7 text-primary ms-1"></i></a>
                                                                <a href="#" class="d-block fs-8 link-secondary"><u>Manage your account</u></a>
                                                            </div>
                                                        </div>
                                                        <div class="media align-items-center mb-3">
                                                            <div class="media-head me-2">
                                                                <div class="avatar avatar-xs avatar-rounded">
                                                                    <img src="dist/img/avatar12.jpg" alt="user" class="avatar-img">
                                                                </div>
                                                            </div>
                                                            <div class="media-body">
                                                                <a href="#" class="d-block link-dark">Jampack Team</a>
                                                                <a href="#" class="d-block fs-8 link-secondary">contact@hencework.com</a>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-block btn-outline-light btn-sm">
                                                            <span><span class="icon"><span class="feather-icon"><i data-feather="plus"></i></span></span>
                                                                <span>Add Account</span></span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="fs-7">contact@hencework.com</div>
                                            <a href="#" class="d-block fs-8 link-secondary"><u>Sign Out</u></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="profile.html">Profile</a>
                                <a class="dropdown-item" href="#"><span class="me-2">Offers</span><span class="badge badge-sm badge-soft-pink">2</span></a>
                                <div class="dropdown-divider"></div>
                                <h6 class="dropdown-header">Manage Account</h6>
                                <a class="dropdown-item" href="#"><span class="dropdown-icon feather-icon"><i data-feather="credit-card"></i></span><span>Payment methods</span></a>
                                <a class="dropdown-item" href="#"><span class="dropdown-icon feather-icon"><i data-feather="check-square"></i></span><span>Subscriptions</span></a>
                                <a class="dropdown-item" href="#"><span class="dropdown-icon feather-icon"><i data-feather="settings"></i></span><span>Settings</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><span class="dropdown-icon feather-icon"><i data-feather="tag"></i></span><span>Raise a ticket</span></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Terms & Conditions</a>
                                <a class="dropdown-item" href="#">Help & Support</a>
                            </div>
                        </div>
                    </li>
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
                    <img class="brand-img img-fluid" src="dist/img/brand-sm.svg" alt="brand" />
                    <img class="brand-img img-fluid" src="dist/img/Jampack.svg" alt="brand" />
                </a>
                <button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle">
                    <span class="icon">
                        <span class="svg-icon ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-bar-to-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
        @include('menu')

    </div>
    <div id="hk_menu_backdrop" class="hk-menu-backdrop"></div>
    <!-- /Vertical Nav -->

    <!-- Main Content -->
    <div class="hk-pg-wrapper">
        <div class="container-xxl">
            <!-- Page Header -->
            <div class="hk-pg-header pt-7 pb-4">
                <h1 class="pg-title">Edit Profile</h1>
                <p>The Avatar component is used to represent a user, and displays the profile picture, initials or fallback icon.</p>
            </div>
            <!-- /Page Header -->

            <!-- Page Body -->
            <div class="hk-pg-body">
                <div class="row edit-profile-wrap">
                    <div class="col-lg-2 col-sm-3 col-4">
                        <div class="nav-profile mt-4">
                            <div class="nav-header">
                                <span>Account</span>
                            </div>
                            <ul class="nav nav-light nav-vertical nav-tabs">
                                <li class="nav-item">
                                    <a data-bs-toggle="tab" href="#tab_block_1" class="nav-link active">
                                        <span class="nav-link-text">Public Profile</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a data-bs-toggle="tab" href="#tab_block_2" class="nav-link">
                                        <span class="nav-link-text">Account Settings</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a data-bs-toggle="tab" href="#tab_block_3" class="nav-link">
                                        <span class="nav-link-text">Privacy Settings</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a data-bs-toggle="tab" href="#tab_block_4" class="nav-link">
                                        <span class="nav-link-text">Login & Security</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <span class="nav-link-text">Notifications</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll="" href="#" class="nav-link">
                                        <span class="nav-link-text">Connections</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a data-scroll="" href="#" class="nav-link">
                                        <span class="nav-link-text">Billing Info</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-10 col-sm-9 col-8">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab_block_1">
                                <form>
                                    <div class="row gx-3">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="media align-items-center">
                                                    <div class="media-head me-5">
                                                        <div class="avatar avatar-rounded avatar-xxl">
                                                            <img src="dist/img/avatar3.jpg" alt="user" class="avatar-img">
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="btn btn-soft-primary btn-file mb-1">
                                                            Upload Photo
                                                            <input type="file" class="upload">
                                                        </div>
                                                        <div class="form-text text-muted">
                                                            For better preview recommended size is 450px x 450px. Max size 5mb.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title title-xs title-wth-divider text-primary text-uppercase my-4"><span>Personal Info</span></div>
                                    <div class="row gx-3">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">First Name</label>
                                                <input class="form-control" type="text" value="Kate" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Last Name</label>
                                                <input class="form-control" type="text" value="Jones" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Location</label>
                                                <input class="form-control" type="text" value="Lane no 1, Newyork" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="form-label-group">
                                                    <label class="form-label">Bio</label>
                                                    <small class="text-muted">1200</small>
                                                </div>
                                                <textarea class="form-control" rows="8" placeholder="Write an internal note"></textarea>
                                                <small class="form-text text-muted">
                                                    Brief bio about yourself. This will be displayed on your profile page.
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title title-xs title-wth-divider text-primary text-uppercase my-4"><span>Additional Info</span></div>
                                    <div class="row gx-3">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Personal Website</label>
                                                <input class="form-control" type="text" value="hencework.com" />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Phone</label>
                                                <input class="form-control" type="text" value="xxxxxxx987" />
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customCheckList4">
                                                <label class="form-check-label" for="customCheckList4">
                                                    Keep my number private
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary mt-5">Save Changes</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tab_block_2">
                                <div class="title-lg fs-4"><span>Account Settings</span></div>
                                <p class="mb-4">The Avatar component is used to represent a user, and displays the profile picture, initials or fallback icon.</p>
                                <form>
                                    <div class="row gx-3">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Username</label>
                                                <input class="form-control" type="text" value="Kate" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <input class="form-control" type="text" value="Lane no 1, Newyork" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gx-3">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">URL</label>
                                                <input class="form-control" type="text" value="hencework.com" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title title-xs title-wth-divider text-primary text-uppercase my-4"><span>Tracking Code</span></div>
                                    <div class="row gx-3">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Google Analytics tracking code</label>
                                                <input class="form-control" type="text" value="UA-1387652-1" />
                                                <small class="form-text text-muted">
                                                    Track shot and profile views in your Google analytics account, eg. UA-0000000-0
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title title-xs title-wth-divider text-primary text-uppercase my-4"><span>Account Changes</span></div>
                                    <div class="row gx-3">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <a href="#" class="h5 d-block mb-0">Delete Account</a>
                                                <small class="form-text text-muted">
                                                    Delete account and all your data
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-end">
                                            <div class="form-group">
                                                <button type="button" class="btn btn-danger">Close account</button>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary mt-5">Save Changes</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tab_block_3">
                                <div class="title-lg fs-4 mb-4"><span>Privacy Settings</span></div>
                                <form>
                                    <div class="row gx-3">
                                        <div class="col-sm-12">
                                            <div class="form-check form-check-lg">
                                                <input type="checkbox" class="form-check-input" id="customChecks1">
                                                <label class="form-check-label mt-0" for="customChecks1">let others find me by email address</label>
                                                <small class="form-text text-muted d-block">People who have your email address will be able to connect you by Jampack</small>
                                            </div>
                                            <div class="separator"></div>
                                            <div class="form-check form-check-lg">
                                                <input type="checkbox" class="form-check-input" id="customChecks2">
                                                <label class="form-check-label mt-0" for="customChecks2">Keep my phone number private</label>
                                                <small class="form-text text-muted d-block">No one can find you by your phone number. Your phone number will not be shared with your contact anymore.</small>
                                            </div>
                                            <div class="separator"></div>
                                            <div class="form-check form-check-lg">
                                                <input type="checkbox" class="form-check-input" id="customChecks3">
                                                <label class="form-check-label mt-0" for="customChecks3">All Keep my location sharing on</label>
                                                <small class="form-text text-muted d-block">Jmapack webapp shares your location wherever you go</small>
                                            </div>
                                            <div class="separator"></div>
                                            <div class="form-check form-check-lg">
                                                <input type="checkbox" class="form-check-input" id="customChecks4">
                                                <label class="form-check-label mt-0" for="customChecks4">Share data through select partnerships</label>
                                                <small class="form-text text-muted d-block">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque condimentum mauris volutpat enim ornare iaculis. Curabitur euismod rutrum lorem id lobortis. Cras ut ex dui. Nulla sed blandit tortor. In quam diam, efficitur sit amet pulvinar eget, consequat placerat arcu.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-primary mt-5">Save Changes</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="tab_block_4">
                                <div class="title-lg fs-4"><span>Login & Security</span></div>
                                <p class="mb-4">The Avatar component is used to represent a user, and displays the profile picture, initials or fallback icon.</p>
                                <form>
                                    <div class="title title-xs title-wth-divider text-primary text-uppercase my-4"><span>Password Settings</span></div>
                                    <div class="row gx-3">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Password</label>
                                                <input class="form-control" type="password" value="Katervewe" />
                                                <button type="button" class="btn btn-primary mt-3">Changes password</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="title title-xs title-wth-divider text-primary text-uppercase my-4"><span>Additional Security</span></div>
                                    <div class="row gx-3">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label ">2-Step Verification (2FA)</label>
                                                <small class="form-text text-muted d-block">
                                                    2-step verification drastically reduces the chances of having the personal information in your Google account stolen by someone else. Why? Because hackers would have to not only get your password and your username, they'd have to get a hold of your phone. A <a href="#" class="text-primary">6-digit</a> code may be sent to a number you’ve previously provided. Codes can be sent in a text message (SMS) or through a voice call, which depends on the setting you chose. To verify it’s you, enter the code on the sign-in screen.
                                                </small>
                                                <button type="button" class="btn btn-primary mt-3">Add Authentication</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Body -->
        </div>

        <!-- Page Footer -->
        <div class="hk-footer">
            <footer class="container-xxl footer">
                <div class="row">
                    <div class="col-xl-8">
                        <p class="footer-text"><span class="copy-text">Jampack © 2022 All rights reserved.</span> <a href="#" class="" target="_blank">Privacy Policy</a><span class="footer-link-sep">|</span><a href="#" class="" target="_blank">T&C</a><span class="footer-link-sep">|</span><a href="#" class="" target="_blank">System Status</a></p>
                    </div>
                    <div class="col-xl-4">
                        <a href="#" class="footer-extr-link link-default"><span class="feather-icon"><i data-feather="external-link"></i></span><u>Send feedback to our help forum</u></a>
                    </div>
                </div>
            </footer>
        </div>
        <!-- / Page Footer -->

    </div>
    <!-- /Main Content -->
</div>
@endsection
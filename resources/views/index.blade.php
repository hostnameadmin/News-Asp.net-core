@extends('main')
@section('content')
    @include('nav')
    @include('menu')


    <div id="hk_menu_backdrop" class="hk-menu-backdrop"></div>
    <!-- /Vertical Nav -->
    <!-- Chat Popup -->
    <div class="hk-chatbot-popup">
        <header>
            <div class="chatbot-head-top">
                <a class="btn btn-sm btn-icon btn-dark btn-rounded" href="javascript:void(0);" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="icon"><span class="feather-icon"><i data-feather="more-horizontal"></i></span></span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#"><i
                            class="dropdown-icon zmdi zmdi-notifications-active"></i><span>Send push
                            notifications</span></a>
                    <a class="dropdown-item" href="#"><i class="dropdown-icon zmdi zmdi-volume-off"></i><span>Mute
                            Chat</span></a>
                </div>
                <span class="text-white">Chat with Us</span>
                <a id="minimize_chatbot" href="javascript:void(0);" class="btn btn-sm btn-icon btn-dark btn-rounded">
                    <span class="icon"><span class="feather-icon"><i data-feather="minus"></i></span></span>
                </a>
            </div>
            <div class="separator-full separator-light mt-0 opacity-10"></div>
            <div class="media-wrap">
                <div class="media">
                    <div class="media-head">
                        <div class="avatar avatar-sm avatar-soft-primary avatar-icon avatar-rounded position-relative">
                            <span class="initial-wrap">
                                <i class="ri-customer-service-2-line"></i>
                            </span>
                            <span
                                class="badge badge-success badge-indicator badge-indicator-lg badge-indicator-nobdr position-bottom-end-overflow-1"></span>
                        </div>
                    </div>
                    <div class="media-body">
                        <div class="user-name">Chat Robot</div>
                        <div class="user-status">Online</div>
                    </div>
                </div>
            </div>
        </header>
        <div class="chatbot-popup-body">
            <div data-simplebar class="nicescroll-bar">
                <div>
                    <div class="init-content-wrap">
                        <div class="card card-shadow">
                            <div class="card-body">
                                <p class="card-text">Hey I am chat robot 😈<br>Do yo have any question regarding our
                                    tools?<br><br>Select the topic or start chatting.</p>
                                <button class="btn btn-block btn-primary text-nonecase start-conversation">Start a
                                    conversation</button>
                            </div>
                        </div>
                        <div class="btn-wrap">
                            <button class="btn btn-soft-primary text-nonecase btn-rounded start-conversation"><span><span
                                        class="icon"><span class="feather-icon"><i
                                                data-feather="eye"></i></span></span><span class="btn-text">Just
                                        browsing</span></span></button>
                            <button class="btn btn-soft-danger text-nonecase btn-rounded start-conversation"><span><span
                                        class="icon"><span class="feather-icon"><i
                                                data-feather="credit-card"></i></span></span><span class="btn-text">I
                                        have a question regarding pricing</span></span></button>
                            <button class="btn btn-soft-warning text-nonecase btn-rounded start-conversation"><span><span
                                        class="icon"><span class="feather-icon"><i
                                                data-feather="cpu"></i></span></span><span class="btn-text">Need help
                                        for technical query</span></span></button>
                            <button class="btn btn-soft-success text-nonecase btn-rounded start-conversation"><span><span
                                        class="icon"><span class="feather-icon"><i
                                                data-feather="zap"></i></span></span><span class="btn-text">I have a
                                        pre purchase question</span></span></button>
                        </div>
                    </div>
                    <ul class="list-unstyled d-none">
                        <li class="media sent">
                            <div class="media-body">
                                <div class="msg-box">
                                    <div>
                                        <p>I have a plan regarding pricing</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="media received">
                            <div class="avatar avatar-xs avatar-soft-primary avatar-icon avatar-rounded">
                                <span class="initial-wrap">
                                    <i class="ri-customer-service-2-line"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <div class="msg-box">
                                    <div>
                                        <p>Welcome back!<br>Are you looking to upgrade your existing plan?</p>
                                    </div>
                                </div>
                                <div class="msg-box typing-wrap">
                                    <div>
                                        <div class="typing">
                                            <div class="dot"></div>
                                            <div class="dot"></div>
                                            <div class="dot"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <footer>
            <div class="chatbot-intro-text fs-7">
                <div class="separator-full separator-light"></div>
                <p class="mb-2">This is jampack's beta version please sign up now to get early access to our full
                    version</p>
                <a class="d-block mb-2" href="#"><u>Give Feedback</u></a>
            </div>
            <div class="input-group d-none">
                <div class="input-group-text overflow-show border-0">
                    <button class="btn btn-icon btn-flush-dark flush-soft-hover btn-rounded dropdown-toggle no-caret"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="icon"><span class="feather-icon"><i data-feather="share"></i></span></span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-icon avatar-xs avatar-soft-primary avatar-rounded me-3">
                                    <span class="initial-wrap">
                                        <i class="ri-image-line"></i>
                                    </span>
                                </div>
                                <div>
                                    <span class="h6 mb-0">Photo or Video Library</span>
                                </div>
                            </div>
                        </a>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-icon avatar-xs avatar-soft-info avatar-rounded me-3">
                                    <span class="initial-wrap">
                                        <i class="ri-file-4-line"></i>
                                    </span>
                                </div>
                                <div>
                                    <span class="h6 mb-0">Documents</span>
                                </div>
                            </div>
                        </a>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-icon avatar-xs avatar-soft-success avatar-rounded me-3">
                                    <span class="initial-wrap">
                                        <i class="ri-map-pin-line"></i>
                                    </span>
                                </div>
                                <div>
                                    <span class="h6 mb-0">Location</span>
                                </div>
                            </div>
                        </a>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-icon avatar-xs avatar-soft-blue avatar-rounded me-3">
                                    <span class="initial-wrap">
                                        <i class="ri-contacts-line"></i>
                                    </span>
                                </div>
                                <div>
                                    <span class="h6 mb-0">Contact</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <input type="text" id="input_msg_chat_popup" name="send-msg"
                    class="input-msg-send form-control border-0 shadow-none" placeholder="Type something...">
                <div class="input-group-text overflow-show border-0">
                    <button class="btn btn-icon btn-flush-dark flush-soft-hover btn-rounded">
                        <span class="icon"><span class="feather-icon"><i data-feather="smile"></i></span></span>
                    </button>
                </div>
            </div>
            <div class="footer-copy-text">Powered by <a class="brand-link" href="#"><img
                        src="{{ asset('theme/html/classic') }}/dist/img/logo-light.png" alt="logo-brand"></a></div>
        </footer>
    </div>
    <a href="#" class="btn btn-icon btn-floating btn-primary btn-lg btn-rounded btn-popup-open">
        <span class="icon">
            <span class="feather-icon"><i data-feather="message-circle"></i></span>
        </span>
    </a>
    <div class="chat-popover shadow-xl">
        <p>Try Jampack Chat for free and connect with your customers now!</p>
    </div>
    <!-- /Chat Popup -->

    <!-- Main Content -->
    <div class="hk-pg-wrapper">
        <div class="container-xxl">
            <!-- Page Header -->
            <div class="hk-pg-header pg-header-wth-tab pt-7">
                <div class="d-flex">
                    <h3>Tuongtacsale.com</h3>
                    <div class="d-flex flex-wrap justify-content-between flex-1">
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            <!-- Page Body -->

            <br>
            <div class="row">



                <div class="col-md-3">
                    <div class="bg-secondary text-white border rounded-5 mb-3">
                        <div class="card-body">
                            <div class="media fmapp-info-trigger">
                                <div class="media-head me-3">
                                    <div class="avatar avatar-icon avatar-sm avatar-soft-secondary">
                                        <span class="initial-wrap"><i class="ri-coins-line"></i></span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="fs-5">Số dư</div>
                                    <div class="text-truncate fs-6 mb-2">
                                        {{ str_replace(',', '.', number_format(Auth::user()->balance)) }} VND</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bg-primary text-white border rounded-5 mb-3">
                        <div class="card-body">
                            <div class="media fmapp-info-trigger">
                                <div class="media-head me-3">
                                    <div class="avatar avatar-icon avatar-sm avatar-soft-primary">
                                        <span class="initial-wrap"><i class="ri-money-dollar-circle-line"></i></span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="fs-5">Nạp tháng</div>
                                    <div class="text-truncate fs-6 mb-2">20.000.000 VND</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bg-danger text-white border rounded-5 mb-3">
                        <div class="card-body">
                            <div class="media fmapp-info-trigger">
                                <div class="media-head me-3">
                                    <div class="avatar avatar-icon avatar-sm avatar-soft-danger">
                                        <span class="initial-wrap"><i class="ri-copper-coin-line"></i></span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="fs-5">Tổng nạp</div>
                                    <div class="text-truncate fs-6 mb-2">129.000.000 VND</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="bg-info text-white border rounded-5 mb-3">
                        <div class="card-body">
                            <div class="media fmapp-info-trigger">
                                <div class="media-head me-3">
                                    <div class="avatar avatar-icon avatar-sm avatar-soft-info">
                                        <span class="initial-wrap"><i class="ri-user-star-line"></i></span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="fs-5">Cấp độ</div>
                                    <div class="text-truncate fs-6 mb-2">Siêu cấp vip pro</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="hk-pg-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab_block_1">
                            <div class="row">
                                <div class="col-xxl-9 col-lg-8 col-md-7 mb-md-4 mb-3">
                                    <div class="card card-border mb-0 h-100">
                                        <div class="card-header card-header-action">
                                            <h6>Audience Overview</h6>
                                            <div class="card-action-wrap">
                                                <div class="btn-group d-lg-flex d-none" role="group"
                                                    aria-label="Basic outlined example">
                                                    <button type="button"
                                                        class="btn btn-outline-light active">All</button>
                                                    <button type="button" class="btn btn-outline-light">Sessions</button>
                                                    <button type="button" class="btn btn-outline-light">Source</button>
                                                    <button type="button"
                                                        class="btn btn-outline-light">Referrals</button>
                                                </div>
                                                <select class="form-select d-lg-none d-flex">
                                                    <option selected="" value="1">All</option>
                                                    <option value="2">Sessions</option>
                                                    <option value="3">Source</option>
                                                    <option value="4">Referrals</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="text-center">
                                                <div class="d-inline-block">
                                                    <span class="badge-status">
                                                        <span
                                                            class="badge bg-primary badge-indicator badge-indicator-nobdr"></span>
                                                        <span class="badge-label">Direct</span>
                                                    </span>
                                                </div>
                                                <div class="d-inline-block ms-3">
                                                    <span class="badge-status">
                                                        <span
                                                            class="badge bg-primary-light-2 badge-indicator badge-indicator-nobdr"></span>
                                                        <span class="badge-label">Organic search</span>
                                                    </span>
                                                </div>
                                                <div class="d-inline-block ms-3">
                                                    <span class="badge-status">
                                                        <span
                                                            class="badge bg-primary-light-4 badge-indicator badge-indicator-nobdr"></span>
                                                        <span class="badge-label">Referral</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div id="column_chart_2"></div>
                                            <div class="separator-full mt-5"></div>
                                            <div class="flex-grow-1 ms-lg-3">
                                                <div class="row">
                                                    <div class="col-xxl-3 col-sm-6 mb-xxl-0 mb-3">
                                                        <span class="d-block fw-medium fs-7">Users</span>
                                                        <div class="d-flex align-items-center">
                                                            <span class="d-block fs-4 fw-medium text-dark mb-0">8.8k</span>
                                                            <span class="badge badge-sm badge-soft-success ms-1">
                                                                <i class="bi bi-arrow-up"></i> 7.5%
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-3 col-sm-6 mb-xxl-0 mb-3">
                                                        <span class="d-block fw-medium fs-7">Sessions</span>
                                                        <div class="d-flex align-items-center">
                                                            <span
                                                                class="d-block fs-4 fw-medium text-dark mb-0">18.2k</span>
                                                            <span class="badge badge-sm badge-soft-success ms-1">
                                                                <i class="bi bi-arrow-up"></i> 7.2%
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-3 col-sm-6 mb-xxl-0 mb-3">
                                                        <span class="d-block fw-medium fs-7">Bounce rate</span>
                                                        <div class="d-flex align-items-center">
                                                            <span
                                                                class="d-block fs-4 fw-medium text-dark mb-0">46.2%</span>
                                                            <span class="badge badge-sm badge-soft-danger ms-1">
                                                                <i class="bi bi-arrow-down"></i> 0.2%
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-3 col-sm-6">
                                                        <span class="d-block fw-medium fs-7">Session
                                                            duration</span>
                                                        <div class="d-flex align-items-center">
                                                            <span class="d-block fs-4 fw-medium text-dark mb-0">4m
                                                                24s</span>
                                                            <span class="badge badge-sm badge-soft-success ms-1">
                                                                <i class="bi bi-arrow-up"></i> 10.8%
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-lg-4 col-md-5 mb-md-4 mb-3">
                                    <div class="card card-border mb-0  h-100">
                                        <div class="card-header card-header-action">
                                            <h6>Returning Customers</h6>
                                            <div class="card-action-wrap">
                                                <a class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover dropdown-toggle no-caret"
                                                    href="#" data-bs-toggle="dropdown"><span class="icon"><span
                                                            class="feather-icon"><i
                                                                data-feather="more-vertical"></i></span></span></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else
                                                        here</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Separated link</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body text-center">
                                            <div id="radial_chart_2"></div>
                                            <div class="d-inline-block mt-4">
                                                <div class="mb-4">
                                                    <span class="d-block badge-status lh-1">
                                                        <span
                                                            class="badge bg-primary badge-indicator badge-indicator-nobdr d-inline-block"></span>
                                                        <span class="badge-label d-inline-block">Organic</span>
                                                    </span>
                                                    <span class="d-block text-dark fs-5 fw-medium mb-0 mt-1">$243.50</span>
                                                </div>
                                                <div>
                                                    <span class="badge-status lh-1">
                                                        <span
                                                            class="badge bg-primary-light-2 badge-indicator badge-indicator-nobdr"></span>
                                                        <span class="badge-label">Marketing</span>
                                                    </span>
                                                    <span class="d-block text-dark fs-5 fw-medium mb-0 mt-1">$1469</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-md-4 mb-3">
                                    <div class="card card-border mb-0 h-100">
                                        <div class="card-header card-header-action">
                                            <h6>Active users</h6>
                                            <div class="card-action-wrap">
                                                <button type="button" class="btn btn-outline-light">Real time
                                                    chart</button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div id="anim_map_2" class="h-300p"></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="media align-items-center mb-3">
                                                        <div class="media-head me-3">
                                                            <div class="avatar avatar-xxs avatar-rounded">
                                                                <img src="{{ asset('theme/html/classic') }}/dist/fonts/flags/4x3/us.svg"
                                                                    alt="user" class="avatar-img">
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="progress-lb-wrap">
                                                                <label class="progress-label mb-0">United
                                                                    States</label>
                                                                <div class="d-flex align-items-center">
                                                                    <div
                                                                        class="progress progress-bar-rounded progress-bar-xs flex-1">
                                                                        <div class="progress-bar bg-blue-dark-3 w-80"
                                                                            role="progressbar" aria-valuenow="80"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                        </div>
                                                                    </div>
                                                                    <div class="fs-8 mnw-30p ms-3">80%</div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="media align-items-center mb-3">
                                                        <div class="media-head me-3">
                                                            <div class="avatar avatar-xxs avatar-rounded">
                                                                <img src="{{ asset('theme/html/classic') }}/dist/fonts/flags/4x3/in.svg"
                                                                    alt="user" class="avatar-img">
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="progress-lb-wrap">
                                                                <label class="progress-label mb-0">India</label>
                                                                <div class="d-flex align-items-center">
                                                                    <div
                                                                        class="progress progress-bar-rounded progress-bar-xs flex-1">
                                                                        <div class="progress-bar bg-blue w-50"
                                                                            role="progressbar" aria-valuenow="50"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                        </div>
                                                                    </div>
                                                                    <div class="fs-8 mnw-30p ms-3">50%</div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="media align-items-center mb-3">
                                                        <div class="media-head me-3">
                                                            <div class="avatar avatar-xxs avatar-rounded">
                                                                <img src="{{ asset('theme/html/classic') }}/dist/fonts/flags/4x3/gb.svg"
                                                                    alt="user" class="avatar-img">
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="progress-lb-wrap">
                                                                <label class="progress-label mb-0">United
                                                                    Kingdom</label>
                                                                <div class="d-flex align-items-center">
                                                                    <div
                                                                        class="progress progress-bar-rounded progress-bar-xs flex-1">
                                                                        <div class="progress-bar bg-primary w-30"
                                                                            role="progressbar" aria-valuenow="30"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                        </div>
                                                                    </div>
                                                                    <div class="fs-8 mnw-30p ms-3">30%</div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="media align-items-center mb-3">
                                                        <div class="media-head me-3">
                                                            <div class="avatar avatar-xxs avatar-rounded">
                                                                <img src="{{ asset('theme/html/classic') }}/dist/fonts/flags/4x3/au.svg"
                                                                    alt="user" class="avatar-img">
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="progress-lb-wrap">
                                                                <label class="progress-label mb-0">Australia</label>
                                                                <div class="d-flex align-items-center">
                                                                    <div
                                                                        class="progress progress-bar-rounded progress-bar-xs flex-1">
                                                                        <div class="progress-bar bg-grey-dark-2 w-15"
                                                                            role="progressbar" aria-valuenow="15"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                        </div>
                                                                    </div>
                                                                    <div class="fs-8 mnw-30p ms-3">15%</div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="media align-items-center">
                                                        <div class="media-head me-3">
                                                            <div class="avatar avatar-xxs avatar-rounded">
                                                                <img src="{{ asset('theme/html/classic') }}/dist/fonts/flags/4x3/ca.svg"
                                                                    alt="user" class="avatar-img">
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="progress-lb-wrap">
                                                                <label class="progress-label mb-0">Canada</label>
                                                                <div class="d-flex align-items-center">
                                                                    <div
                                                                        class="progress progress-bar-rounded progress-bar-xs flex-1">
                                                                        <div class="progress-bar bg-grey w-10"
                                                                            role="progressbar" aria-valuenow="10"
                                                                            aria-valuemin="0" aria-valuemax="100">
                                                                        </div>
                                                                    </div>
                                                                    <div class="fs-8 mnw-30p ms-3">10%</div>
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
                            <div class="row">
                                <div class="col-md-12 mb-md-4 mb-3">
                                    <div class="card card-border mb-0 h-100">
                                        <div class="card-header card-header-action">
                                            <h6>New Customers
                                                <span class="badge badge-sm badge-light ms-1">240</span>
                                            </h6>
                                            <div class="card-action-wrap">
                                                <button class="btn btn-sm btn-outline-light"><span><span
                                                            class="icon"><span class="feather-icon"><i
                                                                    data-feather="upload"></i></span></span><span
                                                            class="btn-text">import</span></span></button>
                                                <button class="btn btn-sm btn-primary ms-3"><span><span
                                                            class="icon"><span class="feather-icon"><i
                                                                    data-feather="plus"></i></span></span><span
                                                            class="btn-text">Add new</span></span></button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="contact-list-view">
                                                <table id="datable_1" class="table nowrap w-100 mb-5">
                                                    <thead>
                                                        <tr>
                                                            <th><span class="form-check fs-6 mb-0">
                                                                    <input type="checkbox"
                                                                        class="form-check-input check-select-all"
                                                                        id="customCheck1">
                                                                    <label class="form-check-label"
                                                                        for="customCheck1"></label>
                                                                </span></th>
                                                            <th>Name</th>
                                                            <th class="w-25">Usage</th>
                                                            <th>Last Update</th>
                                                            <th>Tags</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                            </td>
                                                            <td>
                                                                <div class="media align-items-center">
                                                                    <div class="media-head me-2">
                                                                        <div class="avatar avatar-xs avatar-rounded">
                                                                            <img src="{{ asset('theme/html/classic') }}/dist/img/logo-avatar-1.png"
                                                                                alt="user" class="avatar-img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <div class="text-high-em">Phone Pay</div>
                                                                        <div class="fs-7"><a href="#"
                                                                                class="table-link-text link-medium-em">phonepay.in</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="progress-lb-wrap">
                                                                    <div class="d-flex align-items-center">
                                                                        <div
                                                                            class="progress progress-bar-rounded progress-bar-xs flex-1">
                                                                            <div class="progress-bar bg-blue-dark-3 w-90"
                                                                                role="progressbar" aria-valuenow="90"
                                                                                aria-valuemin="0" aria-valuemax="100">
                                                                            </div>
                                                                        </div>
                                                                        <div class="fs-8 ms-3">90%</div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>10 June, 2022</td>
                                                            <td>
                                                                <span
                                                                    class="badge badge-soft-secondary  my-1  me-2">admin</span>
                                                                <span
                                                                    class="badge badge-soft-secondary my-1  me-2">Finance</span>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="" data-bs-original-title="Edit"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i
                                                                                    data-feather="edit-2"></i></span></span></a>
                                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="" data-bs-original-title="Delete"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i
                                                                                    data-feather="trash"></i></span></span></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                            </td>
                                                            <td>
                                                                <div class="media align-items-center">
                                                                    <div class="media-head me-2">
                                                                        <div class="avatar avatar-xs avatar-rounded">
                                                                            <img src="{{ asset('theme/html/classic') }}/dist/img/logo-avatar-2.png"
                                                                                alt="user" class="avatar-img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <div class="text-high-em">Swiggy</div>
                                                                        <div class="fs-7"><a href="#"
                                                                                class="table-link-text link-medium-em">swiggy.com</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="progress-lb-wrap">
                                                                    <div class="d-flex align-items-center">
                                                                        <div
                                                                            class="progress progress-bar-rounded progress-bar-xs flex-1">
                                                                            <div class="progress-bar bg-blue w-75"
                                                                                role="progressbar" aria-valuenow="75"
                                                                                aria-valuemin="0" aria-valuemax="100">
                                                                            </div>
                                                                        </div>
                                                                        <div class="fs-8 ms-3">75%</div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>09 July, 2022</td>
                                                            <td>
                                                                <span
                                                                    class="badge badge-soft-secondary my-1  me-2">customer
                                                                    data</span>
                                                                <span
                                                                    class="badge badge-soft-secondary  my-1  me-2">admin</span>
                                                                <span
                                                                    class="badge badge-soft-secondary  my-1  me-2">+4</span>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="" data-bs-original-title="Edit"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i
                                                                                    data-feather="edit-2"></i></span></span></a>
                                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="" data-bs-original-title="Delete"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i
                                                                                    data-feather="trash"></i></span></span></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                            </td>
                                                            <td>
                                                                <div class="media align-items-center">
                                                                    <div class="media-head me-2">
                                                                        <div class="avatar avatar-xs avatar-rounded">
                                                                            <img src="{{ asset('theme/html/classic') }}/dist/img/logo-avatar-3.png"
                                                                                alt="user" class="avatar-img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <div class="text-high-em">Coursera</div>
                                                                        <div class="fs-7"><a href="#"
                                                                                class="table-link-text link-medium-em">coursera.com</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="progress-lb-wrap">
                                                                    <div class="d-flex align-items-center">
                                                                        <div
                                                                            class="progress progress-bar-rounded progress-bar-xs flex-1">
                                                                            <div class="progress-bar bg-primary w-50"
                                                                                role="progressbar" aria-valuenow="50"
                                                                                aria-valuemin="0" aria-valuemax="100">
                                                                            </div>
                                                                        </div>
                                                                        <div class="fs-8 ms-3">50%</div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>24 Aug, 2022</td>
                                                            <td>
                                                                <span
                                                                    class="badge badge-soft-secondary my-1  me-2">education</span>
                                                                <span
                                                                    class="badge badge-soft-secondary  my-1  me-2">admin</span>
                                                                <span
                                                                    class="badge badge-soft-secondary  my-1  me-2">+3</span>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="" data-bs-original-title="Edit"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i
                                                                                    data-feather="edit-2"></i></span></span></a>
                                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="" data-bs-original-title="Delete"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i
                                                                                    data-feather="trash"></i></span></span></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                            </td>
                                                            <td>
                                                                <div class="media align-items-center">
                                                                    <div class="media-head me-2">
                                                                        <div class="avatar avatar-xs avatar-rounded">
                                                                            <img src="{{ asset('theme/html/classic') }}/dist/img/logo-avatar-4.png"
                                                                                alt="user" class="avatar-img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <div class="text-high-em">Tinder</div>
                                                                        <div class="fs-7"><a href="#"
                                                                                class="table-link-text link-medium-em">tinder.com</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="progress-lb-wrap">
                                                                    <div class="d-flex align-items-center">
                                                                        <div
                                                                            class="progress progress-bar-rounded progress-bar-xs flex-1">
                                                                            <div class="progress-bar bg-primary-dark-2 w-60"
                                                                                role="progressbar" aria-valuenow="60"
                                                                                aria-valuemin="0" aria-valuemax="100">
                                                                            </div>
                                                                        </div>
                                                                        <div class="fs-8 ms-3">60%</div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>17 May, 2022</td>
                                                            <td>
                                                                <span
                                                                    class="badge badge-soft-secondary my-1  me-2">Social</span>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="" data-bs-original-title="Edit"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i
                                                                                    data-feather="edit-2"></i></span></span></a>
                                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="" data-bs-original-title="Delete"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i
                                                                                    data-feather="trash"></i></span></span></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                            </td>
                                                            <td>
                                                                <div class="media align-items-center">
                                                                    <div class="media-head me-2">
                                                                        <div class="avatar avatar-xs avatar-rounded">
                                                                            <img src="{{ asset('theme/html/classic') }}/dist/img/logo-avatar-5.png"
                                                                                alt="user" class="avatar-img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <div class="text-high-em">PCD</div>
                                                                        <div class="fs-7"><a href="#"
                                                                                class="table-link-text link-medium-em">pcdeals.com</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="progress-lb-wrap">
                                                                    <div class="d-flex align-items-center">
                                                                        <div
                                                                            class="progress progress-bar-rounded progress-bar-xs flex-1">
                                                                            <div class="progress-bar bg-grey w-30"
                                                                                role="progressbar" aria-valuenow="30"
                                                                                aria-valuemin="0" aria-valuemax="100">
                                                                            </div>
                                                                        </div>
                                                                        <div class="fs-8 ms-3">30%</div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>13 July, 2022</td>
                                                            <td>
                                                                <span
                                                                    class="badge badge-soft-secondary my-1  me-2">Portal</span>
                                                                <span
                                                                    class="badge badge-soft-secondary  my-1  me-2">admin</span>
                                                                <span
                                                                    class="badge badge-soft-secondary  my-1  me-2">+3</span>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="" data-bs-original-title="Edit"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i
                                                                                    data-feather="edit-2"></i></span></span></a>
                                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="" data-bs-original-title="Delete"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i
                                                                                    data-feather="trash"></i></span></span></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                            </td>
                                                            <td>
                                                                <div class="media align-items-center">
                                                                    <div class="media-head me-2">
                                                                        <div class="avatar avatar-xs avatar-rounded">
                                                                            <img src="{{ asset('theme/html/classic') }}/dist/img/logo-avatar-6.png"
                                                                                alt="user" class="avatar-img">
                                                                        </div>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <div class="text-high-em">Icons 8</div>
                                                                        <div class="fs-7"><a href="#"
                                                                                class="table-link-text link-medium-em">icons8.com</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="progress-lb-wrap">
                                                                    <div class="d-flex align-items-center">
                                                                        <div
                                                                            class="progress progress-bar-rounded progress-bar-xs flex-1">
                                                                            <div class="progress-bar bg-green-dark-1 w-45"
                                                                                role="progressbar" aria-valuenow="45"
                                                                                aria-valuemin="0" aria-valuemax="100">
                                                                            </div>
                                                                        </div>
                                                                        <div class="fs-8 ms-3">45%</div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>14 July, 2022</td>
                                                            <td>
                                                                <span
                                                                    class="badge badge-soft-secondary my-1  me-2">Library</span>
                                                                <span
                                                                    class="badge badge-soft-secondary  my-1  me-2">Asset</span>
                                                            </td>
                                                            <td>
                                                                <div class="d-flex align-items-center">
                                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="" data-bs-original-title="Edit"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i
                                                                                    data-feather="edit-2"></i></span></span></a>
                                                                    <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button"
                                                                        data-bs-toggle="tooltip" data-placement="top"
                                                                        title="" data-bs-original-title="Delete"
                                                                        href="#"><span class="icon"><span
                                                                                class="feather-icon"><i
                                                                                    data-feather="trash"></i></span></span></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Page Body -->
            </div>

            <!-- Page Footer -->
            <!-- / Page Footer -->
        @endsection

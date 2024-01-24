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

                @php
                    switch (Auth::user()->level) {
                        case '0':
                            Auth::user()->level = 'Cơ bản';
                            break;
                        case '1':
                            Auth::user()->level = 'CTV PRO';
                            break;
                        case '2':
                            Auth::user()->level = 'CTV VIP';
                            break;
                        case '3':
                            Auth::user()->level = 'Đại lý PRO';
                            break;
                        case '4':
                            Auth::user()->level = 'Đại lý VIP';
                            break;
                        case '5':
                            Auth::user()->level = 'Nhà phân phối VIP';
                            break;
                    }
                @endphp

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
                                    <div class="text-truncate fs-6 mb-2">
                                        {{ str_replace(',', '.', number_format($data['amount_month'])) }} VNĐ</div>
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
                                    <div class="text-truncate fs-6 mb-2">
                                        {{ str_replace(',', '.', number_format($data['amount_total'])) }} VNĐ</div>
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
                                    <div class="text-truncate fs-6 mb-2">{{ Auth::user()->level }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-xlg-8 col-md-6">
                    <div class="row">
                        @foreach ($data['news'] as $value)
                            <div class="col-md-12">
                                <div class="card card-border card-profile-feed mb-lg-4 mb-3">
                                    <div class="card-header card-header-action">
                                        <div class="media align-items-center">
                                            <div class="media-head me-2">
                                                <div class="avatar avatar-sm avatar-rounded">
                                                    <img src="https://tuongtacsale.com/wp-content/uploads/2023/10/Chua-co-ten-234-x-59-px-3.png"
                                                        alt="user" class="avatar-img">
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <div class="fw-medium text-dark">{{ $data['title'] }}</div>
                                                <div class="fs-7">{{ $value['created_at'] }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        {!! $value['content'] !!}
                                    </div>
                                    <div class="card-footer justify-content-between">
                                        <div>
                                            <a href="#"><i class="bi bi-heart-fill text-primary"></i> 30K</a>
                                        </div>
                                        <div>
                                            <a href="#">1K comments</a>
                                            <a href="#">12 shares</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4 col-xlg-4 col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5>
                                Cập nhật mới
                            </h5>

                            <div class="mt-4">
                                <ul class="list-group list-group-flush new_updates">
                                    <li class="list-group-item border-0 px-0">
                                        <a href="#">
                                            <div class="media align-items-center">
                                                <div class="media-head me-3">
                                                    <div class="avatar avatar-sm avatar-logo">
                                                        <span class="initial-wrap bg-success-light-5">
                                                            <img src="https://subgiare.vn/jampack/dist/img/svg/update.svg"
                                                                alt="logo">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="media-body d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <div class="fs-7 text-muted">Hạ giá like page sale sv8 nhé mọi
                                                            người</div>
                                                        <div class="d-flex align-items-center fs-8 text-muted"><i
                                                                class="ri-time-fill fs-7 me-1 text-primary"></i>2024-01-20
                                                            01:10:24
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5>
                                Thống kê &amp; tiến trình đơn
                            </h5>

                            <div class="mt-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card overflow-hidden mb-3 bg-secondary text-white">
                                            <!--/.bg-holder-->
                                            <div class="card-body position-relative text-center">
                                                <div class="display-4 fs-3 mb-2 font-weight-normal font-sans-serif text-white"
                                                    id="totalOrder">826</div>
                                                <h6 class="ml-1 text-white">Đơn đã mua</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card overflow-hidden mb-3 bg-info text-white">
                                            <!--/.bg-holder-->
                                            <div class="card-body position-relative text-center">
                                                <div class="display-4 fs-3 mb-2 font-weight-normal font-sans-serif text-white"
                                                    id="totalActive">32</div>
                                                <h6 class="ml-1 text-white">Đơn đang chạy</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card overflow-hidden mb-3 bg-success text-white">
                                            <!--/.bg-holder-->
                                            <div class="card-body position-relative text-center">
                                                <div class="display-4 fs-3 mb-2 font-weight-normal font-sans-serif text-white"
                                                    id="totalSuccess">780</div>
                                                <h6 class="ml-1 text-white">Đơn hoàn thành</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card overflow-hidden mb-3 bg-dark text-white">
                                            <!--/.bg-holder-->
                                            <div class="card-body position-relative text-center">
                                                <div class="display-4 fs-3 mb-2 font-weight-normal font-sans-serif text-white"
                                                    id="totalRefund">10</div>
                                                <h6 class="ml-1 text-white">Đơn hoàn tiền</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card overflow-hidden mb-3 bg-warning text-white">
                                            <!--/.bg-holder-->
                                            <div class="card-body position-relative text-center">
                                                <div class="display-4 fs-3 mb-2 font-weight-normal font-sans-serif text-white"
                                                    id="totalReport">4</div>
                                                <h6 class="ml-1 text-white">Đơn tạm dừng</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card overflow-hidden mb-3 bg-danger text-white">
                                            <!--/.bg-holder-->
                                            <div class="card-body position-relative text-center">
                                                <div class="display-4 fs-3 mb-2 font-weight-normal font-sans-serif text-white"
                                                    id="totalPause">0</div>
                                                <h6 class="ml-1 text-white">Đơn đã hủy</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" id="showProcess"
                                                style="width: 96%" aria-valuenow="96" aria-valuemin="0"
                                                aria-valuemax="100">96%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Footer -->
            <!-- / Page Footer -->
        @endsection

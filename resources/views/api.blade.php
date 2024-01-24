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
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="https://subgiare.vn/home">{{ $data['title'] }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tạo website riêng</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5>
                                    Thông tin &amp; cấu hình
                                </h5>

                                <div class="mt-4">
                                    <div class="row">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>API URL</td>
                                                            <td>{{ route('api_v2') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>API Key</td>
                                                            <td> <span onclick="location.href='{{ route('info') }}'"
                                                                    class="badge badge-success">Lấy ở đây</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td>HTTP Method</td>
                                                            <td>POST</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Content-Type</td>
                                                            <td>application/x-www-form-urlencoded</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Response</td>
                                                            <td>JSON</td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>

                                        </div>
                                        <ul class="nav nav-light nav-pills">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="pill" href="#order">
                                                    <span class="nav-link-text">Order</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="pill" href="#status">
                                                    <span class="nav-link-text">Status</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="pill" href="#multistatus">
                                                    <span class="nav-link-text">Multistatus</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="pill" href="#balance">
                                                    <span class="nav-link-text">Balance</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="order">
                                                <h3>Thêm Oder</h3>
                                                <select class="form-control input-sm" id="service_type"
                                                    onchange="checkpoint()">
                                                    <option value="0">Default</option>
                                                    <!---option value="10">Package</option--->
                                                    <option value="2">Custom Comments</option>
                                                    <option value="9">Mentions</option>
                                                    <option value="15">Comment Likes</option>
                                                    <option value="100">Subscriptions</option>
                                                </select>
                                                <br>

                                                <div name="info" id="info">
                                                    <table class="table mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <td>Parameters</td>
                                                                <td>Description</td>
                                                            </tr>
                                                            <tr>
                                                                <td>key</td>
                                                                <td>API Key</td>
                                                            </tr>
                                                            <tr>
                                                                <td>action</td>
                                                                <td>add</td>
                                                            </tr>
                                                            <tr>
                                                                <td>service</td>
                                                                <td>Service ID</td>
                                                            </tr>
                                                            <tr>
                                                                <td>link</td>
                                                                <td>Link</td>
                                                            </tr>
                                                            <tr>
                                                                <td>quantity</td>
                                                                <td>Needed quantity</td>
                                                            </tr>
                                                            <tr>
                                                                <td>reaction (optional)</td>
                                                                <td>like,haha,wow,care,love,sad,angry (default like)</td>
                                                            </tr>
                                                            <tr>
                                                                <td>minutes (optional)</td>
                                                                <td>30,45,60,90,120,150,180,210,240,270,300 (default 30)
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>dayvip (optional)</td>
                                                                <td>7,15,30,60,90,120,150,180 (default 30)</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <p>
                                                    Example response
                                                </p>
                                                <pre class="language-html">{
                                                    "order": 99999
                                                }
                                                </pre>
                                                <p></p>

                                            </div>
                                            <div class="tab-pane fade" id="status">
                                                <h3>Trạng thái đơn</h3>
                                                <table class="table mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>Parameters</td>
                                                            <td>Description</td>
                                                        </tr>
                                                        <tr>
                                                            <td>key</td>
                                                            <td>API Key</td>
                                                        </tr>
                                                        <tr>
                                                            <td>action</td>
                                                            <td>status</td>
                                                        </tr>
                                                        <tr>
                                                            <td>order</td>
                                                            <td>Order ID</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p>
                                                    Example response
                                                </p>
                                                <pre class="language-html">{
                                                    "charge": "2.5",
                                                    "start_count": "168",
                                                    "status": "Completed",
                                                    "remains": "-2"
                                                }
                                                </pre>
                                                Status: Pending, Processing, In progress, Completed, Partial, Canceled
                                                <p></p>
                                            </div>
                                            <div class="tab-pane fade" id="multistatus">
                                                <h3>Nhiều trạng thái đơn</h3>
                                                <table class="table mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>Parameters</td>
                                                            <td>Description</td>
                                                        </tr>
                                                        <tr>
                                                            <td>key</td>
                                                            <td>API Key</td>
                                                        </tr>
                                                        <tr>
                                                            <td>action</td>
                                                            <td>status</td>
                                                        </tr>
                                                        <tr>
                                                            <td>orders</td>
                                                            <td>Order IDs separated by comma (E.g: 123,456,789)</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <p>
                                                    Example response
                                                </p>
                                                <pre class="language-html">{
                                                    "123": {
                                                        "charge": "0.27819",
                                                        "start_count": "3572",
                                                        "status": "Partial",
                                                        "remains": "157"
                                                    },
                                                    "456": {
                                                        "error": "Incorrect order ID"
                                                    },
                                                    "789": {
                                                        "charge": "1.44219",
                                                        "start_count": "234",
                                                        "status": "In progress",
                                                        "remains": "10"
                                                    }
                                                }
                                                </pre>
                                                Status: Pending, Processing, In progress, Completed, Partial, Canceled
                                                <p></p>
                                            </div>
                                            <div class="tab-pane fade" id="balance">
                                                <h3>Số dư</h3>
                                                <table class="table mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>Parameters</td>
                                                            <td>Description</td>
                                                        </tr>
                                                        <tr>
                                                            <td>key</td>
                                                            <td>API Key</td>
                                                        </tr>
                                                        <tr>
                                                            <td>action</td>
                                                            <td>balance</td>
                                                        </tr>

                                                    </tbody>
                                                </table>
                                                <p>
                                                    Example response
                                                </p>
                                                <pre class="language-html">{
                                                    "balance": "68.6868",
                                                    "currency": "VND"
                                                }
                                                </pre>
                                                <p></p>
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
                        <p class="footer-text"><span class="copy-text">SubGiaRe.V{{ $data['title'] }} © 2022 All rights
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

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
                                <li class="breadcrumb-item active" aria-current="page">Nạp tiền chuyển khoản</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="card mb-4 card-tab">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6 d-grid gap-2">
                                        <a href="" class="btn btn-primary"><img
                                                src="https://subgiare.vn/assets/images/svg/bank.svg" alt=""
                                                width="25" height="25">
                                            Ngân hàng</a>
                                    </div>
                                    {{-- <div class="col-6 d-grid gap-2">
                                        <a href="" class="btn btn-outline-primary"><img
                                                src="https://subgiare.vn/assets/images/svg/card.svg" alt=""
                                                width="25" height="25">
                                            Thẻ cào</a>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">


                                    <div class="col-md-12">
                                        <h5 class="text-primary">Nội dung chuyển khoản</h5>
                                        <div class="alert text-white bg-info mb-3" role="alert">
                                            <h4 class="text-white bg-heading font-weight-semi-bold text-center"><a
                                                    href="javascript:;" onclick="coppy('content_codeRecharge');"><b
                                                        id="content_codeRecharge">{{ $data['settings']['value'] }}
                                                        {{ Auth::user()->username }}</b> <i class="fa fa-clone"></i></a>
                                            </h4>
                                        </div>
                                    </div>
                                    @foreach ($data['banking'] as $value)
                                        <div class="mb-3 col-sm-6">
                                            <h5 class="text-info text-center"><img src="{{ $value['logo'] }}"
                                                    height="45px">
                                            </h5>
                                            <div class="alert text-white bg-success " role="alert">
                                                <div>
                                                    Số tài khoản: <b id="{{ $value['type'] }}"
                                                        class="text-right text-primary"
                                                        onclick="coppy('{{ $value['type'] }}');">{{ $value['account_number'] }}</b>
                                                </div>
                                                <div>
                                                    Chủ tài khoản: <b class="text-right">{{ $value['account_name'] }}</b>
                                                </div>
                                                <div>
                                                    Tỉ giá: <b class="text-right">1 VNĐ</b> = <b class="text-right">1
                                                        coin</b>.
                                                </div>
                                                <div>
                                                    Nạp tối thiểu: <b class="text-right">10,000 VNĐ</b>
                                                </div>
                                                <center>
                                                    <img style="width: 250px; height: 250px;"
                                                        src="https://img.vietqr.io/image/{{ $value['type'] }}-{{ $value['account_number'] }}-qr_only.jpg?addInfo=tuongtacsale {{ Auth::user()->username }}&accountName={{ $value['account_name'] }}">
                                                </center>
                                            </div>
                                        </div>
                                    @endforeach

                                    {{-- <div class="mb-3 col-sm-6">
                                        <h5 class="text-info text-center"><img
                                                src="/assets/images/2000px-Binance_logo.svg.png" height="45px"></h5>
                                        <div class="alert text-white bg-success " role="alert">
                                            <div>
                                                Binance ID: <b id="binance_id" class="text-right text-primary"
                                                    onclick="coppy('binance_id');">450412968</b>
                                            </div>
                                            <div>
                                                Chủ tài khoản: <b class="text-right">subgiare</b>
                                            </div>
                                            <div>
                                                Tỉ giá: <b class="text-right">1 USDT</b> = <b class="text-right">24,000
                                                    coin</b>.
                                            </div>
                                            <div>
                                                Nạp tối thiểu: <b class="text-right">1 USDT</b>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-md-12">
                                        <div class="alert text-white bg-warning mb-3" role="alert">
                                            <h5 class="text-white bg-heading font-weight-semi-bold">Lưu ý</h5>
                                            <p>
                                                - Cố tình nạp dưới mức nạp không hỗ trợ <br>
                                                - Nạp sai cú pháp, sai số tài khoản, sai ngân hàng sẽ bị trừ 20% phí giao
                                                dịch. Vd: nạp
                                                100k sai nội
                                                dung sẽ chỉ nhận được 80k coin và phải liên hệ admin để cộng tay.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5>
                                    Lịch sử nạp
                                </h5>

                                <div class="mt-4">
                                    <div class="table-responsive">

                                        <div id="listHistoryRechargeBanking_wrapper"
                                            class="dataTables_wrapper dt-bootstrap5 no-footer">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="dataTables_length" id="listHistoryRechargeBanking_length">
                                                        <label>Xem <select name="listHistoryRechargeBanking_length"
                                                                aria-controls="listHistoryRechargeBanking"
                                                                class="form-select form-select-sm">
                                                                <option value="5">5</option>
                                                                <option value="10">10</option>
                                                                <option value="15">15</option>
                                                                <option value="50">50</option>
                                                                <option value="100">100</option>
                                                                <option value="200">200</option>
                                                                <option value="500">500</option>
                                                                <option value="1000">1,000</option>
                                                                <option value="5000">5,000</option>
                                                                <option value="-1">All</option>
                                                            </select> mục</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div id="listHistoryRechargeBanking_filter" class="dataTables_filter">
                                                        <label>Tìm kiếm <input type="search"
                                                                class="form-control form-control-sm"
                                                                placeholder="nhập từ khóa..."
                                                                aria-controls="listHistoryRechargeBanking"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="dataTables_scroll">
                                                        <div class="dataTables_scrollHead"
                                                            style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                                                            <div class="dataTables_scrollHeadInner"
                                                                style="box-sizing: content-box; width: 1655.16px; padding-right: 0px;">
                                                                <table
                                                                    class="table table-bordered table-hover no-footer text-nowrap dataTable"
                                                                    role="grid"
                                                                    style="margin-left: 0px; width: 1655.16px;">
                                                                    <thead>
                                                                        <tr role="row">
                                                                            <th class="text-center sorting sorting_desc"
                                                                                tabindex="0"
                                                                                aria-controls="listHistoryRechargeBanking"
                                                                                rowspan="1" colspan="1"
                                                                                style="width: 55.0625px;"
                                                                                aria-sort="descending"
                                                                                aria-label="ID: activate to sort column ascending">
                                                                                ID</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listHistoryRechargeBanking"
                                                                                rowspan="1" colspan="1"
                                                                                style="width: 146.375px;"
                                                                                aria-label="Thời gian: activate to sort column ascending">
                                                                                Thời gian</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listHistoryRechargeBanking"
                                                                                rowspan="1" colspan="1"
                                                                                style="width: 91.6875px;"
                                                                                aria-label="Loại: activate to sort column ascending">
                                                                                Loại</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listHistoryRechargeBanking"
                                                                                rowspan="1" colspan="1"
                                                                                style="width: 93.3594px;"
                                                                                aria-label="Mã giao dịch: activate to sort column ascending">
                                                                                Mã giao dịch</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listHistoryRechargeBanking"
                                                                                rowspan="1" colspan="1"
                                                                                style="width: 103.141px;"
                                                                                aria-label="Người chuyển: activate to sort column ascending">
                                                                                Người chuyển</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listHistoryRechargeBanking"
                                                                                rowspan="1" colspan="1"
                                                                                style="width: 93.3906px;"
                                                                                aria-label="Thực nhận: activate to sort column ascending">
                                                                                Thực nhận</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listHistoryRechargeBanking"
                                                                                rowspan="1" colspan="1"
                                                                                style="width: 714.141px;"
                                                                                aria-label="Nội dung: activate to sort column ascending">
                                                                                Nội dung</th>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="dataTables_scrollBody"
                                                            style="position: relative; overflow: auto; width: 100%; max-height: 55vh;">
                                                            <table
                                                                class="table table-bordered table-hover no-footer text-nowrap dataTable"
                                                                id="listHistoryRechargeBanking" role="grid"
                                                                aria-describedby="listHistoryRechargeBanking_info">
                                                                <thead>
                                                                    <tr role="row" style="height: 2px;">
                                                                        <th class="text-center sorting sorting_desc"
                                                                            aria-controls="listHistoryRechargeBanking"
                                                                            rowspan="1" colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 55.0625px;"
                                                                            aria-sort="descending"
                                                                            aria-label="ID: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">ID
                                                                            </div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listHistoryRechargeBanking"
                                                                            rowspan="1" colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 146.375px;"
                                                                            aria-label="Thời gian: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Thời
                                                                                gian</div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listHistoryRechargeBanking"
                                                                            rowspan="1" colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 91.6875px;"
                                                                            aria-label="Loại: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Loại
                                                                            </div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listHistoryRechargeBanking"
                                                                            rowspan="1" colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 93.3594px;"
                                                                            aria-label="Mã giao dịch: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Mã
                                                                                giao dịch</div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listHistoryRechargeBanking"
                                                                            rowspan="1" colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 103.141px;"
                                                                            aria-label="Người chuyển: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">
                                                                                Người chuyển</div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listHistoryRechargeBanking"
                                                                            rowspan="1" colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 93.3906px;"
                                                                            aria-label="Thực nhận: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Thực
                                                                                nhận</div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listHistoryRechargeBanking"
                                                                            rowspan="1" colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 714.141px;"
                                                                            aria-label="Nội dung: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Nội
                                                                                dung</div>
                                                                        </th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody role="alert" aria-live="polite"
                                                                    aria-relevant="all" class="">
                                                                    <tr class="odd">
                                                                        <td class="sorting_1">1096489</td>
                                                                        <td>2023-12-25 20:10:50</td>
                                                                        <td><span
                                                                                class="badge bg-primary my-1 me-2">Vietcombank</span>
                                                                        </td>
                                                                        <td>5387 - 29168</td>
                                                                        <td>Không xác định</td>
                                                                        <td><b class="text-danger">75,000</b>
                                                                            <sup>coin</sup>
                                                                        </td>
                                                                        <td>020097042212252007272023nbuc104952.29168.200709.thanh
                                                                            toan qr-subgiare20091</td>
                                                                    </tr>
                                                                    <tr class="even">
                                                                        <td class="sorting_1">1027508</td>
                                                                        <td>2023-11-01 16:20:24</td>
                                                                        <td><span
                                                                                class="badge bg-primary my-1 me-2">Momo</span>
                                                                        </td>
                                                                        <td>47729637132</td>
                                                                        <td>01269498678</td>
                                                                        <td><b class="text-danger">1,100,000</b>
                                                                            <sup>coin</sup>
                                                                        </td>
                                                                        <td>subgiare20091</td>
                                                                    </tr>
                                                                    <tr class="odd">
                                                                        <td class="sorting_1">1010607</td>
                                                                        <td>2023-10-17 09:33:44</td>
                                                                        <td><span
                                                                                class="badge bg-primary my-1 me-2">Vietcombank</span>
                                                                        </td>
                                                                        <td>5242 - 84241</td>
                                                                        <td>Không xác định</td>
                                                                        <td><b class="text-danger">100,000</b>
                                                                            <sup>coin</sup>
                                                                        </td>
                                                                        <td>mbvcb.4432552022.subgiare20091.ct tu 5520999999
                                                                            ho dang vinh toi1021572769 hoang van linh</td>
                                                                    </tr>
                                                                    <tr class="even">
                                                                        <td class="sorting_1">1006722</td>
                                                                        <td>2023-10-13 19:34:09</td>
                                                                        <td><span
                                                                                class="badge bg-primary my-1 me-2">Vietcombank</span>
                                                                        </td>
                                                                        <td>5242 - 30452</td>
                                                                        <td>Không xác định</td>
                                                                        <td><b class="text-danger">300,000</b>
                                                                            <sup>coin</sup>
                                                                        </td>
                                                                        <td>mbvcb.4406449203.subgiare20091.ct tu 5520999999
                                                                            ho dang vinh toi1021572769 hoang van linh</td>
                                                                    </tr>
                                                                    <tr class="odd">
                                                                        <td class="sorting_1">1005766</td>
                                                                        <td>2023-10-12 19:57:43</td>
                                                                        <td><span
                                                                                class="badge bg-primary my-1 me-2">Vietcombank</span>
                                                                        </td>
                                                                        <td>5078 - 46772</td>
                                                                        <td>Không xác định</td>
                                                                        <td><b class="text-danger">700,000</b>
                                                                            <sup>coin</sup>
                                                                        </td>
                                                                        <td>mbvcb.4402413997.subgiare20091.ct tu 5520999999
                                                                            ho dang vinh toi1021572769 hoang van linh</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div id="listHistoryRechargeBanking_processing"
                                                        class="dataTables_processing card" style="display: none;">Đang xử
                                                        lý...</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="listHistoryRechargeBanking_info"
                                                        role="status" aria-live="polite">Đang xem 1 đến 5 trong tổng số
                                                        107 mục</div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                        id="listHistoryRechargeBanking_paginate">
                                                        <ul class="pagination custom-pagination pagination-simple">
                                                            <li class="paginate_button page-item previous disabled"
                                                                id="listHistoryRechargeBanking_previous"><a href="#"
                                                                    aria-controls="listHistoryRechargeBanking"
                                                                    data-dt-idx="0" tabindex="0" class="page-link"><i
                                                                        class="ri-arrow-left-s-line"></i></a></li>
                                                            <li class="paginate_button page-item active"><a href="#"
                                                                    aria-controls="listHistoryRechargeBanking"
                                                                    data-dt-idx="1" tabindex="0"
                                                                    class="page-link">1</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="listHistoryRechargeBanking"
                                                                    data-dt-idx="2" tabindex="0"
                                                                    class="page-link">2</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="listHistoryRechargeBanking"
                                                                    data-dt-idx="3" tabindex="0"
                                                                    class="page-link">3</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="listHistoryRechargeBanking"
                                                                    data-dt-idx="4" tabindex="0"
                                                                    class="page-link">4</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="listHistoryRechargeBanking"
                                                                    data-dt-idx="5" tabindex="0"
                                                                    class="page-link">5</a></li>
                                                            <li class="paginate_button page-item disabled"
                                                                id="listHistoryRechargeBanking_ellipsis"><a href="#"
                                                                    aria-controls="listHistoryRechargeBanking"
                                                                    data-dt-idx="6" tabindex="0"
                                                                    class="page-link">…</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="listHistoryRechargeBanking"
                                                                    data-dt-idx="7" tabindex="0"
                                                                    class="page-link">22</a></li>
                                                            <li class="paginate_button page-item next"
                                                                id="listHistoryRechargeBanking_next"><a href="#"
                                                                    aria-controls="listHistoryRechargeBanking"
                                                                    data-dt-idx="8" tabindex="0" class="page-link"><i
                                                                        class="ri-arrow-right-s-line"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
        <!-- /Page Body -->




        <!-- Page Footer -->
        <div class="hk-footer">
            <footer class="container-xxl footer">
                <div class="row">
                    <div class="col-xl-8">
                        <p class="footer-text"><span class="copy-text">SubGiaRe.Vn © 2022 All rights
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

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
                                <li class="breadcrumb-item"><a href="https://subgiare.vn/home">SubGiaRe.Vn</a></li>
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
                                        <a href="https://subgiare.vn/recharge/banking" class="btn btn-primary"><img
                                                src="/assets/images/svg/bank.svg" alt="" width="25"
                                                height="25">
                                            Ngân hàng</a>
                                    </div>
                                    <div class="col-6 d-grid gap-2">
                                        <a href="https://subgiare.vn/recharge/card" class="btn btn-outline-primary"><img
                                                src="/assets/images/svg/card.svg" alt="" width="25"
                                                height="25">
                                            Thẻ cào</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">


                                    <div class="col-md-12">
                                        <h5 class="text-primary">Nội dung chuyển khoản</h5>
                                        <div class="alert text-white bg-info mb-3" role="alert">
                                            <h4 class="text-white bg-heading font-weight-semi-bold text-center"><a
                                                    href="javascript:;" onclick="coppy('content_codeRecharge');"><b
                                                        id="content_codeRecharge">subgiare20091</b> <i
                                                        class="fa fa-clone"></i></a></h4>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-sm-6">
                                        <h5 class="text-info text-center"><img src="/assets/images/vcb.png" height="45px">
                                        </h5>
                                        <div class="alert text-white bg-success " role="alert">
                                            <div>
                                                Số tài khoản: <b id="stk_vcb" class="text-right text-primary"
                                                    onclick="coppy('stk_vcb');">1021572769</b>
                                            </div>
                                            <div>
                                                Chủ tài khoản: <b class="text-right">HOANG VAN LINH</b>
                                            </div>
                                            <div>
                                                Tỉ giá: <b class="text-right">1 VNĐ</b> = <b class="text-right">1 coin</b>.
                                            </div>
                                            <div>
                                                Nạp tối thiểu: <b class="text-right">10,000 VNĐ</b>
                                            </div>
                                            <center>
                                                <img
                                                    src="data:image/png;base64, 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 ">
                                            </center>
                                        </div>
                                    </div>


                                    <div class="mb-3 col-sm-6">
                                        <h5 class="text-info text-center"><img src="/assets/images/momo.png" height="45px">
                                        </h5>
                                        <div class="alert text-white bg-success " role="alert">
                                            <div>
                                                Số điện thoại: <b id="phone_momo" class="text-right text-primary"
                                                    onclick="coppy('phone_momo');">0819123666</b>
                                            </div>
                                            <div>
                                                Chủ tài khoản: <b class="text-right">Hoàng Văn Lĩnh</b>
                                            </div>
                                            <div>
                                                Tỉ giá: <b class="text-right">1 VNĐ</b> = <b class="text-right">1 coin</b>.
                                            </div>
                                            <div>
                                                Nạp tối thiểu: <b class="text-right">10,000 VNĐ</b>
                                            </div>
                                            <center>
                                                <img
                                                    src="data:image/png;base64, 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 ">
                                            </center>
                                        </div>
                                    </div>



                                    <div class="mb-3 col-sm-6">
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
                                    </div>
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
                <div class="row">
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
                </div>

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

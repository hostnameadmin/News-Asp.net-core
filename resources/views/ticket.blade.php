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
                                <li class="breadcrumb-item active" aria-current="page">Hỗ trợ - khiếu nại</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-12">
                            <div class="card-body">
                                <h5>
                                    Hỗ trợ - khiếu nại
                                </h5>
                                <div class="form-group row mb-3">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <h6 class="heading-wth-icon alert-heading"><i
                                                    class="fas fa-exclamation-triangle"></i><b>
                                                    Danger!</b>
                                            </h6>
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
                                        <div class="row">
                                            <div class="form-group col-md-6 mb-3">
                                                <label class="form-label" for="">Họ và tên</label>
                                                <input type="text" class="form-control"
                                                    value="{{ Auth::user()->username }}" readonly="">
                                            </div>
                                            <div class="form-group col-md-6 mb-3">
                                                <label class="form-label" for="">Email</label>
                                                <input type="text" class="form-control" value="{{ Auth::user()->email }}"
                                                    readonly="">
                                            </div>
                                        </div>
                                        <form method="post" action="{{ route('ticket_send') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-md-6 mb-3">
                                                    <label class="form-label" for="">Đơn hàng</label>
                                                    <select type="text" class="form-control" name="id_order">
                                                        @foreach ($data['order'] as $value)
                                                            <option value="{{ $value['id_order'] }}">
                                                                {{ $value['id_order'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6 mb-3">
                                                    <label class="form-label" for="">Độ ưu tiên</label>
                                                    <select type="text" class="form-control" name="level">
                                                        <option value="0">Thấp</option>
                                                        <option value="1">Trung bình</option>
                                                        <option value="2">Cao</option>
                                                        <option value="3">Khẩn cấp</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12 mb-3">
                                                    <label class="form-label" for="">Tiêu đề</label>
                                                    <input type="text" name="title" class="form-control">
                                                </div>
                                                <div class="form-group col-md-12 mb-3">
                                                    <label class="form-label" for="">Nội dung</label>
                                                    <textarea name="content" id="content" class="form-control"></textarea>
                                                </div>
                                            </div>

                                            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-lock"></i>
                                                    Thực hiện</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-md-12">

                        <div class="card mb-4">
                            <div class="card-body">
                                <h5>
                                    Nhật kí hoạt động
                                </h5>

                                <div class="mt-4">
                                    <div class="table-responsive">

                                        <div id="listDiary_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="dataTables_length" id="listDiary_length"><label>Xem
                                                            <select name="listDiary_length" aria-controls="listDiary"
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
                                                            </select> mục</label></div>
                                                </div>
                                                <div class="col-sm-12 col-md-6">
                                                    <div id="listDiary_filter" class="dataTables_filter"><label>Tìm kiếm
                                                            <input type="search" class="form-control form-control-sm"
                                                                placeholder="nhập từ khóa..."
                                                                aria-controls="listDiary"></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="dataTables_scroll">
                                                        <div class="dataTables_scrollHead"
                                                            style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                                                            <div class="dataTables_scrollHeadInner"
                                                                style="box-sizing: content-box; width: 1254px; padding-right: 0px;">
                                                                <table
                                                                    class="table table-bordered table-hover no-footer text-nowrap dataTable"
                                                                    role="grid"
                                                                    style="margin-left: 0px; width: 1254px;">
                                                                    <thead>
                                                                        <tr role="row">
                                                                            <th class="text-center sorting sorting_desc"
                                                                                tabindex="0" aria-controls="listDiary"
                                                                                rowspan="1" colspan="1"
                                                                                aria-sort="descending"
                                                                                aria-label="ID: activate to sort column ascending"
                                                                                style="width: 123.531px;">ID</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listDiary" rowspan="1"
                                                                                colspan="1"
                                                                                aria-label="Thời gian: activate to sort column ascending"
                                                                                style="width: 259.328px;">Thời gian</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listDiary" rowspan="1"
                                                                                colspan="1"
                                                                                aria-label="Nội dung: activate to sort column ascending"
                                                                                style="width: 717.141px;">Nội dung</th>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="dataTables_scrollBody"
                                                            style="position: relative; overflow: auto; width: 100%; max-height: 55vh;">
                                                            <table
                                                                class="table table-bordered table-hover no-footer text-nowrap dataTable"
                                                                id="listDiary" role="grid"
                                                                aria-describedby="listDiary_info">
                                                                <thead>
                                                                    <tr role="row" style="height: 2px;">
                                                                        <th class="text-center sorting sorting_desc"
                                                                            aria-controls="listDiary" rowspan="1"
                                                                            colspan="1" aria-sort="descending"
                                                                            aria-label="ID: activate to sort column ascending"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 123.531px;">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">ID
                                                                            </div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listDiary" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="Thời gian: activate to sort column ascending"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 259.328px;">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Thời
                                                                                gian</div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listDiary" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="Nội dung: activate to sort column ascending"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 717.141px;">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Nội
                                                                                dung</div>
                                                                        </th>
                                                                    </tr>
                                                                </thead>

                                                                <tbody role="alert" aria-live="polite"
                                                                    aria-relevant="all" class="">
                                                                    <tr class="odd">
                                                                        <td class="sorting_1">24031523</td>
                                                                        <td>2024-01-23 20:08:34</td>
                                                                        <td>Đã nhập tài khoản IP:
                                                                            2402:800:6136:327c:56b:9f75:3e91:cd8f</td>
                                                                    </tr>
                                                                    <tr class="even">
                                                                        <td class="sorting_1">23963017</td>
                                                                        <td>2024-01-21 20:25:22</td>
                                                                        <td>Đã nhập tài khoản IP:
                                                                            2402:800:6136:327c:990a:2f70:2a1a:1813</td>
                                                                    </tr>
                                                                    <tr class="odd">
                                                                        <td class="sorting_1">23929614</td>
                                                                        <td>2024-01-20 18:35:49</td>
                                                                        <td>Đã nhập tài khoản IP:
                                                                            2402:800:6136:6b6a:ec72:1178:be5c:3c12</td>
                                                                    </tr>
                                                                    <tr class="even">
                                                                        <td class="sorting_1">23927116</td>
                                                                        <td>2024-01-20 17:01:14</td>
                                                                        <td>Đã nhập tài khoản IP: 113.160.171.93</td>
                                                                    </tr>
                                                                    <tr class="odd">
                                                                        <td class="sorting_1">23761145</td>
                                                                        <td>2024-01-15 08:43:22</td>
                                                                        <td>Đã nhập tài khoản IP: 113.160.171.93</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div id="listDiary_processing" class="dataTables_processing card"
                                                        style="display: none;">Đang xử lý...</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="listDiary_info" role="status"
                                                        aria-live="polite">Đang xem 1 đến 5 trong tổng số 110 mục</div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                        id="listDiary_paginate">
                                                        <ul class="pagination custom-pagination pagination-simple">
                                                            <li class="paginate_button page-item previous disabled"
                                                                id="listDiary_previous"><a href="#"
                                                                    aria-controls="listDiary" data-dt-idx="0"
                                                                    tabindex="0" class="page-link"><i
                                                                        class="ri-arrow-left-s-line"></i></a>
                                                            </li>
                                                            <li class="paginate_button page-item active"><a href="#"
                                                                    aria-controls="listDiary" data-dt-idx="1"
                                                                    tabindex="0" class="page-link">1</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="listDiary" data-dt-idx="2"
                                                                    tabindex="0" class="page-link">2</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="listDiary" data-dt-idx="3"
                                                                    tabindex="0" class="page-link">3</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="listDiary" data-dt-idx="4"
                                                                    tabindex="0" class="page-link">4</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="listDiary" data-dt-idx="5"
                                                                    tabindex="0" class="page-link">5</a></li>
                                                            <li class="paginate_button page-item disabled"
                                                                id="listDiary_ellipsis"><a href="#"
                                                                    aria-controls="listDiary" data-dt-idx="6"
                                                                    tabindex="0" class="page-link">…</a></li>
                                                            <li class="paginate_button page-item "><a href="#"
                                                                    aria-controls="listDiary" data-dt-idx="7"
                                                                    tabindex="0" class="page-link">22</a></li>
                                                            <li class="paginate_button page-item next"
                                                                id="listDiary_next"><a href="#"
                                                                    aria-controls="listDiary" data-dt-idx="8"
                                                                    tabindex="0" class="page-link"><i
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

@extends('main')
@section('title', $data['title'])
@section('content')
    @include('nav')
    @include('menu')
    <div class="hk-pg-wrapper">
        <div class="hk-pg-body">
            <div class="container-xxl" id="app">

                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="https://subgiare.vn/home">{{ $data['title'] }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Lịch sử tài khoản</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5>
                                    Nhật kí tài khoản
                                </h5>

                                <div class="mt-4">
                                    <div class="table-responsive">

                                        <div id="listHistory_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="dataTables_length" id="listHistory_length"><label>Xem
                                                            <select name="listHistory_length" aria-controls="listHistory"
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
                                                    <div id="listHistory_filter" class="dataTables_filter"><label>Tìm kiếm
                                                            <input type="search" class="form-control form-control-sm"
                                                                placeholder="nhập từ khóa..."
                                                                aria-controls="listHistory"></label></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="dataTables_scroll">
                                                        <div class="dataTables_scrollHead"
                                                            style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                                                            <div class="dataTables_scrollHeadInner"
                                                                style="box-sizing: content-box; width: 1815.42px; padding-right: 5px;">
                                                                <table
                                                                    class="table table-bordered table-hover no-footer text-nowrap dataTable"
                                                                    role="grid"
                                                                    style="margin-left: 0px; width: 1815.42px;">
                                                                    <thead>
                                                                        <tr role="row">
                                                                            <th class="text-center sorting sorting_desc"
                                                                                tabindex="0" aria-controls="listHistory"
                                                                                rowspan="1" colspan="1"
                                                                                style="width: 67.0469px;"
                                                                                aria-sort="descending"
                                                                                aria-label="ID: activate to sort column ascending">
                                                                                ID</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listHistory" rowspan="1"
                                                                                colspan="1" style="width: 148.391px;"
                                                                                aria-label="Thời gian: activate to sort column ascending">
                                                                                Thời gian</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listHistory" rowspan="1"
                                                                                colspan="1" style="width: 26.8906px;"
                                                                                aria-label="Loại: activate to sort column ascending">
                                                                                Loại</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listHistory" rowspan="1"
                                                                                colspan="1" style="width: 215.766px;"
                                                                                aria-label="Hành Động: activate to sort column ascending">
                                                                                Hành Động</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listHistory" rowspan="1"
                                                                                colspan="1" style="width: 1101.33px;"
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
                                                                id="listHistory" role="grid"
                                                                aria-describedby="listHistory_info">
                                                                <thead>
                                                                    <tr role="row" style="height: 2px;">
                                                                        <th class="text-center sorting sorting_desc"
                                                                            aria-controls="listHistory" rowspan="1"
                                                                            colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 67.0469px;"
                                                                            aria-sort="descending"
                                                                            aria-label="ID: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">ID
                                                                            </div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listHistory" rowspan="1"
                                                                            colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 148.391px;"
                                                                            aria-label="Thời gian: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Thời
                                                                                gian</div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listHistory" rowspan="1"
                                                                            colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 26.8906px;"
                                                                            aria-label="Loại: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Loại
                                                                            </div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listHistory" rowspan="1"
                                                                            colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 215.766px;"
                                                                            aria-label="Hành Động: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Hành
                                                                                Động</div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listHistory" rowspan="1"
                                                                            colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 1101.33px;"
                                                                            aria-label="Nội dung: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Nội
                                                                                dung
                                                                            </div>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody role="alert" aria-live="polite"
                                                                    aria-relevant="all" class="">
                                                                    @if (isset($data['history']) && count($data['history']) > 0)
                                                                        @foreach ($data['history'] as $value)
                                                                            <tr class="odd">
                                                                                <td class="sorting_1">{{ $value['id'] }}
                                                                                </td>
                                                                                <td>{{ $value['created_at'] }}</td>
                                                                                <td>{{ $value['type'] }}</td>
                                                                                <td> <span
                                                                                        class="badge bg-warning">{{ $value['begin_balance'] }}</span>
                                                                                    {{ $value['type'] }} <span
                                                                                        class="badge bg-danger">{{ $value['quantity_balance'] }}</span>
                                                                                    = <span
                                                                                        class="badge bg-success">{{ $value['change_balance'] }}</span>
                                                                                </td>
                                                                                <td>{{ $value['note'] }}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div id="listHistory_processing" class="dataTables_processing card"
                                                        style="display: none;">Đang xử lý...</div>
                                                </div>
                                            </div>
                                            <div class="dataTables_info" id="listOrders_info" role="status"
                                                aria-live="polite">
                                                {{ $data['history']->links('vendor.pagination.custom') }}

                                            </div>
                                            Đang xem {{ $data['history']->firstItem() }} đến
                                            {{ $data['history']->lastItem() }} trong tổng số
                                            {{ $data['history']->total() }} mục
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
@endsection

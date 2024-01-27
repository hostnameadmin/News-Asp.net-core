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
                                <li class="breadcrumb-item active" aria-current="page">Thông tin tài khoản</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5>
                                    Thông tin tài khoản
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
                                                Success!</b>
                                        </h6>
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="mt-4">
                                    <div class="row">
                                        <div class="form-group col-md-6 mb-3">
                                            <label class="form-label" for="">Họ và tên</label>
                                            <input type="text" class="form-control" value="{{ $data['info']->name }}"
                                                readonly="">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label class="form-label" for="">Email</label>
                                            <input type="text" class="form-control" value="{{ $data['info']->email }}"
                                                readonly="">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label class="form-label" for="">Tài khoản</label>
                                            <input type="text" class="form-control" value="{{ $data['info']->username }}"
                                                readonly="">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label class="form-label" for="">Số dư</label>
                                            <input type="text" class="form-control"
                                                value="{{ str_replace(',', '.', number_format($data['info']->balance)) }}"
                                                readonly="">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label class="form-label" for="">Cấp độ</label>
                                            <input type="text" class="form-control" value="Đại lý" readonly="">
                                        </div>
                                        <div class="form-group col-md-6 mb-3">
                                            <label class="form-label" for="">Thời gian tham gia</label>
                                            <input type="text" class="form-control" value="2021-12-24 16:08:15"
                                                readonly="">
                                        </div>
                                        <form submit-ajax="true" action="{{ route('change_token') }}" method="post"
                                            url_redirect="reload">
                                            @csrf
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="">Api Token</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="text"
                                                        value="{{ $data['info']->token }}" name="token" readonly="">
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class="fa fa-sync"></i>
                                                        Thay
                                                        đổi</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5>
                                    Đổi mật khẩu
                                </h5>
                                <div class="mt-4">
                                    <form submit-ajax="true" action="{{ route('change_password') }}" method="post"
                                        url_redirect="reload">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Mật khẩu cũ</label>
                                            <input type="password" class="form-control" name="old_password"
                                                placeholder="Nhập mật khẩu cũ">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Mật khẩu mới</label>
                                            <input type="password" class="form-control" name="new_password"
                                                placeholder="Nhập mật khẩu mới">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Mật khẩu mới</label>
                                            <input type="password" class="form-control" name="new_password_confirmation"
                                                placeholder="Nhập lại mật khẩu mới">
                                        </div>
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-lock"></i>
                                                Thay
                                                đổi</button>
                                        </div>
                                    </form>
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
                                                                aria-controls="listDiary"></label></div>
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
                                                                                style="width: 131.562px;"
                                                                                aria-sort="descending"
                                                                                aria-label="ID: activate to sort column ascending">
                                                                                ID</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listDiary" rowspan="1"
                                                                                colspan="1" style="width: 255.578px;"
                                                                                aria-label="Thời gian: activate to sort column ascending">
                                                                                Thời gian</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listDiary" rowspan="1"
                                                                                colspan="1" style="width: 712.859px;"
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
                                                                id="listDiary" role="grid"
                                                                aria-describedby="listDiary_info">
                                                                <thead>
                                                                    <tr role="row" style="height: 2px;">
                                                                        <th class="text-center sorting sorting_desc"
                                                                            aria-controls="listDiary" rowspan="1"
                                                                            colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 131.562px;"
                                                                            aria-sort="descending"
                                                                            aria-label="ID: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">ID
                                                                            </div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listDiary" rowspan="1"
                                                                            colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 255.578px;"
                                                                            aria-label="Thời gian: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Thời
                                                                                gian</div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listDiary" rowspan="1"
                                                                            colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 712.859px;"
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
                                                                    @if (isset($data['activity_log']) && count($data['activity_log']) > 0)
                                                                        @foreach ($data['activity_log'] as $value)
                                                                            <tr class="odd">
                                                                                <td class="sorting_1">{{ $value['id'] }}
                                                                                </td>
                                                                                <td>{{ $value['updated_at'] }}</td>
                                                                                <td>{{ $value['content'] }}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @else
                                                                        Không có bản ghi
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div id="listDiary_processing" class="dataTables_processing card"
                                                        style="display: none;">Đang xử lý...</div>
                                                </div>
                                            </div>
                                            <div class="dataTables_info" id="listOrders_info" role="status"
                                                aria-live="polite">
                                                {{ $data['activity_log']->links('vendor.pagination.custom') }}

                                            </div>
                                            Đang xem {{ $data['activity_log']->firstItem() }} đến
                                            {{ $data['activity_log']->lastItem() }} trong tổng số
                                            {{ $data['activity_log']->total() }} mục
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

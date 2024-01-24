@extends('admin.main')
@section('title', $data['title'])
@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quản lý Hỗ trợ - khiếu nại</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Quản lý Hỗ trợ - khiếu nại</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Danh sách hỗ trợ - khiếu nại</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Ngân hàng</th>
                                                <th>Số tài khoản</th>
                                                <th>Chủ tài khoản</th>
                                                <th>Logo</th>
                                                <th>Trạng thái</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['banking'] as $value)
                                                @php
                                                    switch ($value['status']) {
                                                        case '1':
                                                            $value['status'] = '<td><span class="badge badge-success">Kích hoạt</span></td>';
                                                            break;
                                                        case '0':
                                                            $value['status'] = '<td><span class="badge badge-danger">Tắt</span></td>';
                                                            break;
                                                        default:
                                                            $statusLabel = '<span class="badge badge-secondary">Không xác định</span>';
                                                            break;
                                                    }
                                                @endphp
                                                <tr>

                                                    <td>{{ $value['id'] }}</td>
                                                    <td>{{ $value['type'] }}</td>
                                                    <td>{{ $value['account_number'] }}</td>
                                                    <td>{{ $value['account_name'] }}</td>
                                                    <td>
                                                        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                                            <div class="image"><img class="img-circle elevation-2"
                                                                    src="{{ $value['logo'] }}"</div></div>
                                                    </td>
                                                    <td>{!! $value['status'] !!}</td>
                                                    <td>Khóa</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="load"></div>
                    </div>
                </div>
        </section>
    </div>
    {{-- <div id="modal_custom"></div> --}}
@endsection

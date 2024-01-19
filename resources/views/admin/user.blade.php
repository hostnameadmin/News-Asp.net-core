@extends('admin.main')
@section('title', $data['title'])
@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quản lý Khách hàng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Quản lý Khách hàng</li>
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
                                <h3 class="card-title">Danh sách Khách hàng</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên khác hàng</th>
                                                <th>Tên tài khoản</th>
                                                <th>Địa chỉ Email</th>
                                                <th>Số dư</th>
                                                <th>Token</th>
                                                <th>Loại tài khoản</th>
                                                <th>Cấp độ</th>
                                                <th>Trạng Thái</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['user'] as $value)
                                                @php
                                                    switch ($value['status']) {
                                                        case '1':
                                                            $value['status'] = '<td><span class="badge badge-success">Hoạt động</span></td>';
                                                            break;
                                                        case '0':
                                                            $value['status'] = '<td><span class="badge badge-danger">Bị khóa</span></td>';
                                                            break;
                                                    }
                                                @endphp
                                                <tr>
                                                    <td>{{ $value['id'] }}</td>
                                                    <td>{{ $value['name'] }}</td>
                                                    <td>#{{ $value['username'] }}</td>
                                                    <td>{{ $value['email'] }}</td>
                                                    <td>{{ str_replace(',', '.', number_format($value['balance'])) }}</td>
                                                    <td>{{ $value['token'] }}</td>
                                                    <td>{{ $value['role'] }}</td>
                                                    <td>{{ $value['level'] }}</td>
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

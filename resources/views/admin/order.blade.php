@extends('admin.main')
@section('title', $data['title'])
@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quản lý Đơn hàng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Quản lý Đơn hàng</li>
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
                                <h3 class="card-title">Danh sách Đơn hàng</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Khách hàng</th>
                                                <th>Mã đơn hàng</th>
                                                <th>Link</th>
                                                <th>Máy chủ</th>
                                                <th>Cảm xúc</th>
                                                <th>Bình luận</th>
                                                <th>VIP</th>
                                                <th>Số lượng</th>
                                                <th>Ghi chú</th>
                                                <th>Tiến trình</th>
                                                <th>Phản hồi</th>
                                                <th>Trạng Thái</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['order'] as $value)
                                                @php
                                                    switch ($value['status']) {
                                                        case 'pending':
                                                            $status = '<td><span class="badge badge-secondary">Pending</span></td>';
                                                            break;
                                                        case 'partial':
                                                            $status = '<td><span class="badge badge-warning">Partial</span></td>';
                                                            break;
                                                        case 'success':
                                                            $status = '<td><span class="badge badge-success">Successfully</span></td>';
                                                            break;
                                                        case 'inprogress':
                                                            $status = '<td><span class="badge badge-primary">In Progress</span></td>';
                                                            break;
                                                        case 'processing':
                                                            $status = '<td><span class="badge badge-primary">Processing</span></td>';
                                                            break;
                                                        case 'error':
                                                            $status = '<td><span class="badge badge-danger">Error</span></td>';
                                                            break;
                                                    }
                                                @endphp
                                                <tr>

                                                    <td>{{ $value['id'] }}</td>
                                                    <td>{{ $value['username'] }}</td>
                                                    <td>#{{ $value['id_order'] }}</td>
                                                    <td>
                                                        <textarea class="form-control" readonly="" rows="5" style="width:120px">{{ $value['link'] }}</textarea>
                                                    </td>
                                                    <td>{{ $value['server'] }}</td>
                                                    <td>{{ $value['reaction'] }}</td>
                                                    <td>
                                                        <textarea class="form-control" readonly="" rows="5" style="width:200px">{{ $value['comments'] }}</textarea>
                                                    </td>
                                                    <td>{{ $value['vip'] }}</td>
                                                    <td>{{ $value['quantity'] }}</td>
                                                    <td>
                                                        <textarea class="form-control" readonly="" rows="5" style="width:120px;height:120px;">{{ $value['note'] }}</textarea>
                                                    </td>
                                                    <td>Bắt đầu : {{ $value['start'] }} đã chạy : {{ $value['run'] }} còn
                                                        lại : {{ $value['quantity'] - $value['run'] }} </td>
                                                    <td>
                                                        <textarea class="form-control" readonly="" rows="5" style="width:200px">{{ $value['response_smm'] }}</textarea>
                                                    </td>
                                                    <td>{!! $status !!}</td>
                                                    <td>
                                                        @if ($value['status'] != 'error' && $value['status'] != 'partial' && $value['status'] != 'success')
                                                            <button type="button"
                                                                onclick="order_change_status({{ $value['id'] }},'error');"
                                                                class="btn btn-danger btn-sm d-inline-block">Error</button>
                                                            <button type="button" <button type="button"
                                                                onclick="order_change_status({{ $value['id'] }},'refund');"
                                                                class="btn btn-warning btn-sm d-inline-block">Refund</button>
                                                            <button type="button"
                                                                onclick="order_change_status({{ $value['id'] }},'success');"
                                                                class="btn btn-success btn-sm d-inline-block">Successfully
                                                            </button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $data['order']->links('admin.custom') }}
                            </div>
                        </div>
                        <div id="load"></div>
                    </div>
                </div>
        </section>
    </div>
    {{-- <div id="modal_custom"></div> --}}
@endsection

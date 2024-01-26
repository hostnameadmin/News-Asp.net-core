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
                                                <th>Tiêu đề</th>
                                                <th>Nội dung</th>
                                                <th>Thời gian</th>
                                                <th>Cấp độ</th>
                                                <th>Trạng thái</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['ticket'] as $value)
                                                @php
                                                    switch ($value['status']) {
                                                        case '1':
                                                            $status = '<td><span class="badge badge-success">Đã xử lý</span></td>';
                                                            break;
                                                        case '0':
                                                            $status = '<td><span class="badge badge-warning">Chờ xử lý</span></td>';
                                                            break;
                                                        case '2':
                                                            $status = '<td><span class="badge badge-danger">Hủy</span></td>';
                                                            break;
                                                    }

                                                    switch ($value['level']) {
                                                        case '0':
                                                            $level = '<td><span class="badge badge-primary">Thấp</span></td>';
                                                            break;
                                                        case '1':
                                                            $level = '<td><span class="badge badge-primary">Trung bình</span></td>';
                                                            break;
                                                        case '3':
                                                            $level = '<td><span class="badge badge-warning">Cao</span></td>';
                                                            break;
                                                        case '4':
                                                            $level = '<td><span class="badge badge-primary">Khẩn cấp</span></td>';
                                                            break;
                                                    }
                                                @endphp
                                                <tr>

                                                    <td>{{ $value['id'] }}</td>
                                                    <td>{{ $value['title'] }}</td>
                                                    <td>
                                                        {!! $value['content'] !!}
                                                    </td>
                                                    <td>{{ $value['created_at'] }}</td>
                                                    <td>{!! $level !!}</td>
                                                    <td>{!! $status !!}</td>
                                                    <td>
                                                        @if ($value['status'] == 0)
                                                            <button type="button"
                                                                onclick="ticket_change_status({{ $value['id'] }});"
                                                                class="btn btn-success btn-sm d-inline-block">Hoàn
                                                                thành</button>
                                                            <button type="button"
                                                                onclick="ticket_change_status({{ $value['id'] }});"
                                                                class="btn btn-danger btn-sm d-inline-block">Hủy</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $data['ticket']->links('admin.custom') }}
                            </div>
                        </div>
                        <div id="load"></div>
                    </div>
                </div>
        </section>
    </div>
    {{-- <div id="modal_custom"></div> --}}
@endsection

@extends('admin.main')
@section('title', $data['title'])
@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Danh sách nạp tiền</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Danh sách nạp tiền</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Danh sách nạp tiền ngân hàng</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Khách hàng</th>
                                                <th>Ngân hàng</th>
                                                <th>Số tiền</th>
                                                <th>Nội dung</th>
                                                <th>Thời gian</th>
                                                <th>Trạng thái</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['transaction'] as $value)
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
                                                    <td>{{ $value['username'] }}</td>
                                                    <td>{{ $value['type'] }}</td>
                                                    <td>{{ $value['amount'] }}</td>
                                                    <td>
                                                        <textarea class="form-control" readonly="" rows="5" style="width:200px">{{ $value['description'] }}</textarea>
                                                    </td>
                                                    <td>{{ $value['created_at'] }}</td>
                                                    <td>{!! $value['status'] !!}</td>
                                                    <td>Khóa</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $data['transaction']->links('admin.custom') }}
                            </div>
                        </div>
                        <div id="load"></div>
                    </div>
                </div>
        </section>
    </div>
    {{-- <div id="modal_custom"></div> --}}
@endsection

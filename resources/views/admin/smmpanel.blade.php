@extends('admin.main')
@section('title', $data['title'])
@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quản lý SMM Panel</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Quản lý SMM Panel</li>
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
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Thêm mới SMM Panel</h3>
                            </div>

                            <form action="{{ route('admin_add_smmpanel') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Link API</label>
                                        <input type="url" name="link" class="form-control"
                                            placeholder="Nhập link API">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Token</label>
                                        <input type="token" name="token" class="form-control"
                                            placeholder="Nhập mã Token">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">API - Token đã thêm</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Link API</th>
                                                <th>Trạng Thái</th>
                                                <th>Số dư</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['smmpanel'] as $value)
                                                <tr>

                                                    <td>{{ $value['id'] }}</td>
                                                    <td>{{ $value['link'] }}</td>
                                                    @php
                                                        if ($value['status'] == 1) {
                                                            $status = '<span class="badge badge-success">Kích hoạt</span>';
                                                        } else {
                                                            $status = '<span class="badge badge-danger">Tắt</span>';
                                                        }
                                                    @endphp
                                                    <td>{!! $status !!}</td>
                                                    <td>6</td>
                                                    <td>
                                                        @if ($value['status'] == 1)
                                                            <a onclick="load('{{ $value['id'] }}');"
                                                                class="btn btn-success">Lấy danh sách</a>
                                                            <a onclick="load('{{ $value['id'] }}');"
                                                                class="btn btn-danger">Tắt</a>
                                                        @else
                                                            <a onclick="load('{{ $value['id'] }}');"
                                                                class="btn btn-success">Kích hoạt</a>
                                                        @endif
                                                        <a onclick="return confirm('Hành động nguy hiểm - Hành động này có thể gây nguy hại đến tính năng trên website , xác nhận xóa nhấn OK, chưa chắc nhấn Hủy')"
                                                            href="/administrator/smm.html?action=del&amp;target=6"
                                                            class="btn btn-primary">Chỉnh sửa</a>
                                                        <a onclick="return confirm('Hành động nguy hiểm - Hành động này có thể gây nguy hại đến tính năng trên website , xác nhận xóa nhấn OK, chưa chắc nhấn Hủy')"
                                                            href="/administrator/smm.html?action=del&amp;target=6"
                                                            class="btn btn-danger">Xóa</a>
                                                    </td>

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

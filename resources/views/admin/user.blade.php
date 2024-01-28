@extends('admin.main')
@section('title', $data['title'])
@section('content')
    @if (!$id)
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
                                                    <th>Địa chỉ IP</th>
                                                    <th>Trạng Thái</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data['user'] as $value)
                                                    @php
                                                        switch ($value['status']) {
                                                            case '1':
                                                                $statusLabel = '<span class="badge badge-success">Hoạt động</span>';
                                                                break;
                                                            case '0':
                                                                $statusLabel = '<span class="badge badge-danger">Bị khóa</span>';
                                                                break;
                                                        }
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $value['id'] }}</td>
                                                        <td>{{ $value['name'] }}</td>
                                                        <td>#{{ $value['username'] }}</td>
                                                        <td>{{ $value['email'] }}</td>
                                                        <td>{{ str_replace(',', '.', number_format($value['balance'])) }}
                                                        </td>
                                                        <td>{{ $value['token'] }}</td>
                                                        <td>{{ $value['role'] }}</td>
                                                        <td>{{ $value['level'] }}</td>
                                                        <td>{{ $value['ip_address'] }}</td>
                                                        <td>{!! $statusLabel !!}</td>
                                                        <td>
                                                            <a type="button"
                                                                href="{{ route('admin_user') }}/{{ $value['id'] }}"
                                                                class="btn btn-primary btn-sm d-inline-block">Cập
                                                                nhật</a>
                                                            @if ($value['status'] == 1)
                                                                <button type="button"
                                                                    onclick="user_change_status({{ $value['id'] }});"
                                                                    class="btn btn-danger btn-sm d-inline-block">Khóa</button>
                                                            @else
                                                                <button type="button"
                                                                    onclick="user_change_status({{ $value['id'] }});"
                                                                    class="btn btn-success btn-sm d-inline-block">Kích hoạt
                                                                </button>
                                                            @endif
                                                            <button type="button"
                                                                onclick="delete_category({{ $value['id'] }});"
                                                                class="btn btn-danger btn-sm d-inline-block">Xóa</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{ $data['user']->links('admin.custom') }}
                                </div>
                            </div>
                            <div id="load"></div>
                        </div>
                    </div>
            </section>
        </div>
    @else
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
                                    <h3 class="card-title">Cập nhật tài khoản</h3>
                                </div>
                                @php
                                    $status = ['0' => 'Khóa', '1' => 'Hoạt động'];
                                    $level = ['0' => 'Tài khoản thường', '1' => 'Cấp độ 1', '2' => 'Cấp độ 2', '3' => 'Cấp độ 3', '4' => 'Cấp độ 4', '5' => 'Cấp độ 5'];
                                @endphp
                                <form action="{{ route('admin_update_user') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tên tài khoản</label>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Tên dịch vụ" value="{{ $data['user']['name'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tên đăng nhập</label>
                                                    <input type="text" name="username" class="form-control"
                                                        placeholder="Tên dịch vụ" value="{{ $data['user']['username'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Địa chỉ Email</label>
                                                    <input type="email" name="email" class="form-control"
                                                        placeholder="Tên dịch vụ" value="{{ $data['user']['email'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Mật khẩu</label>
                                                    <input type="password" name="password" class="form-control"
                                                        placeholder="Tên dịch vụ"
                                                        value="{{ $data['user']['password'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Số dư</label>
                                                    <input type="text" name="balance" class="form-control"
                                                        placeholder="Tên dịch vụ" value="{{ $data['user']['balance'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Token</label>
                                                    <input type="text" name="token" class="form-control"
                                                        placeholder="Tên dịch vụ" value="{{ $data['user']['token'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Cấp độ</label>
                                                    <select name="level" class="form-control">
                                                        @foreach ($level as $key => $value)
                                                            @if ($data['user']['level'] == $key)
                                                                <option value="{{ $key }}" selected>
                                                                    {{ $value }}
                                                                </option>
                                                            @else
                                                                <option value="{{ $key }}">
                                                                    {{ $value }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Địa chỉ IP</label>
                                                    <input type="text" name="ip_address" class="form-control"
                                                        placeholder="Địa chỉ IP" readonly disabled
                                                        value="{{ $data['user']['ip_address'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Trạng thái</label>
                                                    <select name="status" class="form-control">
                                                        @foreach ($status as $key => $value)
                                                            @if ($data['user']['status'] == $key)
                                                                <option value="{{ $key }}" selected>
                                                                    {{ $value }}
                                                                </option>
                                                            @else
                                                                <option value="{{ $key }}">
                                                                    {{ $value }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                </form>
                            </div>
                            <div id="load"></div>
                        </div>
                    </div>
            </section>
        </div>
    @endif
    {{-- <div id="modal_custom"></div> --}}
@endsection

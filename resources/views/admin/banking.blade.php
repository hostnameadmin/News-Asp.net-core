@extends('admin.main')
@section('title', $data['title'])
@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quản lý Ngân hàng</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Quản lý Ngân hàng</li>
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
                                <h3 class="card-title">Thêm mới Ngân hàng</h3>
                            </div>
                            @php
                                $bank = ['mbbank' => 'MB BANK', 'acb' => 'ACB - Á Châu', 'vcb' => 'Vietcombank'];
                            @endphp
                            <form action="{{ route('admin_add_banking') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Ngân hàng</label>
                                                <select name="type" class="form-control">
                                                    @foreach ($bank as $key => $value)
                                                        <option value="{{ $key }}">
                                                            {{ $value }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tài khoản đăng nhập</label>
                                                <input type="text" name="username" class="form-control"
                                                    placeholder="Tên đăng nhập">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Mật khẩu đăng nhập</label>
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Mật khẩu dăng nhập">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Số tài khoản</label>
                                                <input type="number" name="account_number" class="form-control"
                                                    placeholder="Số tài khoản">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Chủ tài khoản</label>
                                                <input type="text" name="account_name" class="form-control"
                                                    placeholder="Chủ tài khoản">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Mã token</label>
                                                <input type="text" name="token" class="form-control"
                                                    placeholder="Mã Token">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Logo</label>
                                                <input type="url" name="logo" class="form-control"
                                                    placeholder="Logo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                            </form>
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Danh sách Danh mục</h3>
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

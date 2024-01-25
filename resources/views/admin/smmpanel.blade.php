@extends('admin.main')
@section('title', $data['title'])
@section('content')
    @if (!$id)
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
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Tên API</label>
                                            <input type="token" name="name" class="form-control"
                                                placeholder="Nhập tên API">
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
                                                    <th>Tên API</th>
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
                                                        <td>{{ $value['name'] }}</td>
                                                        @php
                                                            switch ($value['status']) {
                                                                case '1':
                                                                    $statusLabel = '<span class="badge badge-success">Kích hoạt</span>';
                                                                    break;
                                                                case '0':
                                                                    $statusLabel = '<span class="badge badge-danger">Tắt</span>';
                                                                    break;
                                                            }
                                                        @endphp
                                                        <td>{!! $statusLabel !!}</td>
                                                        <td>{{ str_replace(',', '.', number_format($value['balance'])) }}
                                                        </td>
                                                        <td>
                                                            <a type="button"
                                                                href="{{ route('admin_smmpanel') }}/{{ $value['id'] }}"
                                                                class="btn btn-primary btn-sm d-inline-block">Cập
                                                                nhật</a>
                                                            @if ($value['status'] == 1)
                                                                <button type="button" onclick="load({{ $value['id'] }});"
                                                                    class="btn btn-primary btn-sm d-inline-block">Lấy danh
                                                                    sách</button>
                                                                <button type="button"
                                                                    onclick="balance({{ $value['id'] }});"
                                                                    class="btn btn-primary btn-sm d-inline-block">Lấy số
                                                                    dư</button>
                                                                <button type="button"
                                                                    onclick="smm_change_status({{ $value['id'] }});"
                                                                    class="btn btn-danger btn-sm d-inline-block">Tắt</button>
                                                            @else
                                                                <button type="button"
                                                                    onclick="smm_change_status({{ $value['id'] }});"
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
                                    {{ $data['smmpanel']->links('admin.custom') }}
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
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Cập nhật SMM Panel</h3>
                                </div>

                                <form action="{{ route('admin_update_smmpanel') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Link API</label>
                                            <input type="url" name="link" class="form-control"
                                                placeholder="Nhập link API" value="{{ $data['smmpanel']['link'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Token</label>
                                            <input type="token" name="token" class="form-control"
                                                placeholder="Nhập mã Token" value="{{ $data['smmpanel']['token'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Tên API</label>
                                            <input type="token" name="name" class="form-control"
                                                placeholder="Nhập tên API" value="{{ $data['smmpanel']['name'] }}">
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
        {{-- <div id="modal_custom"></div> --}}
    @endif
@endsection

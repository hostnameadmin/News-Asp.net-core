@extends('admin.main')
@section('title', $data['title'])
@section('content')
    @if (!$id)
        <div class="content-wrapper" style="min-height: 1345.31px;">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Quản lý dịch vụ</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Quản lý dịch vụ</li>
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
                                    <h3 class="card-title">Thêm mới Dịch vụ</h3>
                                </div>

                                <form action="{{ route('admin_add_service') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tên dịch vụ</label>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Tên dịch vụ">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Danh mục phụ</label>
                                                    <select name="id_subcategory" class="form-control">
                                                        @foreach ($data['subcategory'] as $subcategory)
                                                            <option value="{{ $subcategory['id'] }}">
                                                                {{ $subcategory['name'] }}
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

                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Danh sách Dịch vụ</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Tên dịch vụ</th>
                                                    <th>Danh mục con</th>
                                                    <th>Trạng thái</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data['services'] as $value)
                                                    @php
                                                        switch ($value['status']) {
                                                            case '1':
                                                                $status = '<td><span class="badge badge-success">Kích hoạt</span></td>';
                                                                break;
                                                            case '0':
                                                                $status = '<td><span class="badge badge-danger">Tắt</span></td>';
                                                                break;
                                                        }
                                                    @endphp
                                                    <tr>

                                                        <td>{{ $value['id'] }}</td>
                                                        <td>{{ $value['name'] }}</td>
                                                        <td>{{ $value['id_subcategory'] }}</td>
                                                        <td>{!! $status !!}</td>
                                                        <td>
                                                            <a type="button"
                                                                href="{{ route('admin_service') }}/{{ $value['id'] }}"
                                                                class="btn btn-primary btn-sm d-inline-block">Cập
                                                                nhật</a>
                                                            @if ($value['status'] == 1)
                                                                <button type="button"
                                                                    onclick="service_change_status({{ $value['id'] }});"
                                                                    class="btn btn-danger btn-sm d-inline-block">Tắt</button>
                                                            @else
                                                                <button type="button"
                                                                    onclick="service_change_status({{ $value['id'] }});"
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
                                    {{ $data['services']->links('admin.custom') }}
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
                            <h1>Quản lý dịch vụ</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Quản lý dịch vụ</li>
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
                                    <h3 class="card-title">Cập nhật Dịch vụ</h3>
                                </div>

                                <form action="{{ route('admin_update_service') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tên dịch vụ</label>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Tên dịch vụ" value="{{ $data['service']['name'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Danh mục phụ</label>
                                                    <select name="id_subcategory" class="form-control">
                                                        @foreach ($data['subcategory'] as $subcategory)
                                                            @if ($subcategory['id'] == $data['service']['id_subcategory'])
                                                                <option value="{{ $subcategory['id'] }}" selected>
                                                                    {{ $subcategory['name'] }}
                                                                </option>
                                                            @else
                                                                <option value="{{ $subcategory['id'] }}">
                                                                    {{ $subcategory['name'] }}
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
@extends('admin.main')
@section('title', $data['title'])
@section('content')
    @if (!$id)
        <div class="content-wrapper" style="min-height: 1345.31px;">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Quản lý bài đăng</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Quản lý bài đăng</li>
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
                                    <h3 class="card-title">Thêm mới bài đăng</h3>
                                </div>
                                <form action="{{ route('admin_add_news') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tiêu đề</label>
                                                    <input type="text" name="title" class="form-control"
                                                        placeholder="Tiêu đề">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nội dung</label>
                                                    <textarea id="content" name="content" class="form-control"></textarea>
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
                                                    <th>Tiêu đề</th>
                                                    <th>Nội dung</th>
                                                    <th>Thời gian</th>
                                                    <th>Trạng thái</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data['news'] as $value)
                                                    @php
                                                        switch ($value['status']) {
                                                            case '1':
                                                                $status = '<td><span class="badge badge-success">Hiển thị</span></td>';
                                                                break;
                                                            case '0':
                                                                $status = '<td><span class="badge badge-danger">Ẩn</span></td>';
                                                                break;
                                                        }
                                                    @endphp
                                                    <tr>

                                                        <td>{{ $value['id'] }}</td>
                                                        <td>{{ $value['title'] }}</td>
                                                        <td>
                                                            <textarea class="form-control" readonly="" rows="5" style="width:200px">{{ $value['content'] }}</textarea>
                                                        </td>
                                                        <td>{{ $value['created_at'] }}</td>
                                                        <td>{!! $status !!}</td>
                                                        <td>
                                                            <a type="button"
                                                                href="{{ route('admin_news') }}/{{ $value['id'] }}"
                                                                class="btn btn-primary btn-sm d-inline-block">Cập
                                                                nhật</a>
                                                            @if ($value['status'] == 1)
                                                                <button type="button"
                                                                    onclick="news_change_status({{ $value['id'] }});"
                                                                    class="btn btn-danger btn-sm d-inline-block">Tắt</button>
                                                            @else
                                                                <button type="button"
                                                                    onclick="news_change_status({{ $value['id'] }});"
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
                                    {{ $data['news']->links('admin.custom') }}
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
                            <h1>Quản lý bài đăng</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Quản lý bài đăng</li>
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
                                    <h3 class="card-title">Cập nhật bài đăng</h3>
                                </div>
                                <form action="{{ route('admin_update_news') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tiêu đề</label>
                                                    <input type="text" name="title" class="form-control"
                                                        placeholder="Tiêu đề" value="{{ $data['news']['title'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nội dung</label>
                                                    <textarea id="content" name="content" class="form-control">{{ $data['news']['content'] }}</textarea>
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

@extends('admin.main')
@section('title', $data['title'])
@section('content')
    @if (!$id)
        <div class="content-wrapper" style="min-height: 1345.31px;">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Quản lý Danh mục</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Quản lý Danh mục</li>
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
                                    <h3 class="card-title">Thêm mới Danh mục</h3>
                                </div>

                                <form action="{{ route('admin_add_category') }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Tên danh mục">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Icon</label>
                                                    <input type="url" name="icon" class="form-control"
                                                        placeholder="Link icon">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Ưu tiên</label>
                                                    <input type="number" name="priority" class="form-control"
                                                        placeholder="Ưu tiên">
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
                                                    <th>Tên danh mục</th>
                                                    <th>Link icon</th>
                                                    <th>Ưu tiên</th>
                                                    <th>Trạng thái</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data['category'] as $value)
                                                    @php
                                                        switch ($value['status']) {
                                                            case '1':
                                                                $statusLabel = '<span class="badge badge-success">Active</span>';
                                                                break;
                                                            case '0':
                                                                $statusLabel = '<span class="badge badge-danger">Off</span>';
                                                                break;
                                                        }
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $value['id'] }}</td>
                                                        <td>{{ $value['name'] }}</td>
                                                        <td>
                                                            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                                                <div class="image"><img class="img-circle elevation-2"
                                                                        src="{{ $value['icon'] }}"</div></div>
                                                        </td>
                                                        <td>{{ $value['priority'] }}</td>
                                                        <td>{!! $statusLabel !!}</td>
                                                        <td>
                                                            <a type="button"
                                                                href="{{ route('admin_category') }}/{{ $value['id'] }}"
                                                                class="btn btn-primary btn-sm d-inline-block">Edit</a>
                                                            @if ($value['status'] == 1)
                                                                <button type="button"
                                                                    onclick="category_change_status({{ $value['id'] }});"
                                                                    class="btn btn-danger btn-sm d-inline-block">Off</button>
                                                            @else
                                                                <button type="button"
                                                                    onclick="category_change_status({{ $value['id'] }});"
                                                                    class="btn btn-success btn-sm d-inline-block">On
                                                                </button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    {{ $data['category']->links('admin.custom') }}
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
                            <h1>Quản lý Danh mục</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Quản lý Danh mục</li>
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
                                    <h3 class="card-title">Chỉnh sửa danh mục</h3>
                                </div>

                                <form action="{{ route('admin_update_category') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                                    <input type="text" name="name" class="form-control"
                                                        value="{{ $data['category']['name'] }}"
                                                        placeholder="Tên danh mục">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Icon</label>
                                                    <input type="url" name="icon" class="form-control"
                                                        value="{{ $data['category']['icon'] }}" placeholder="Link icon">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Ưu tiên</label>
                                                    <input type="number" name="priority" class="form-control"
                                                        value="{{ $data['category']['priority'] }}"
                                                        placeholder="Ưu tiên">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </section>
        </div>

        {{-- <div id="modal_custom"></div> --}}
    @endif
@endsection

@extends('admin.main')
@section('title', $data['title'])
@section('content')
    <div class="content-wrapper" style="min-height: 1345.31px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quản lý Server</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Quản lý Server</li>
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
                                <h3 class="card-title">Thêm mới Server</h3>
                            </div>

                            <form action="{{ route('admin_add_server') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tên Server</label>
                                                <input type="url" name="link" class="form-control"
                                                    placeholder="Nhập link API">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Thông tin</label>
                                                <input type="url" name="link" class="form-control"
                                                    placeholder="Nhập link API">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Giá tiền</label>
                                                <input type="url" name="link" class="form-control"
                                                    placeholder="Nhập link API">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Dịch vụ</label>
                                                <input type="url" name="link" class="form-control"
                                                    placeholder="Nhập link API">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">ID SMM Panel</label>
                                                <input type="url" name="link" class="form-control"
                                                    placeholder="Nhập link API">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Giá gốc SMM Panel</label>
                                                <input type="url" name="link" class="form-control"
                                                    placeholder="Nhập link API">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Server gốc SMM Panel</label>
                                                <input type="url" name="link" class="form-control"
                                                    placeholder="Nhập link API">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tối thiểu</label>
                                                <input type="url" name="link" class="form-control"
                                                    placeholder="Nhập link API">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tối đa</label>
                                                <input type="url" name="link" class="form-control"
                                                    placeholder="Nhập link API">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Giá Level 1</label>
                                                <input type="url" name="link" class="form-control"
                                                    placeholder="Nhập link API">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Giá Level 2</label>
                                                <input type="url" name="link" class="form-control"
                                                    placeholder="Nhập link API">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Giá Level 3</label>
                                                <input type="url" name="link" class="form-control"
                                                    placeholder="Nhập link API">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Giá Level 4</label>
                                                <input type="url" name="link" class="form-control"
                                                    placeholder="Nhập link API">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Giá Level 5</label>
                                                <input type="url" name="link" class="form-control"
                                                    placeholder="Nhập link API">
                                            </div>
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
                                <h3 class="card-title">Danh sách Server</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Tên Server</th>
                                                <th>Thông tin</th>
                                                <th>Giá tiền</th>
                                                <th>ID SMM Panel</th>
                                                <th>Giá gốc SMM Panel</th>
                                                <th>Server gốc SMM Panel</th>
                                                <th>Giá Level 1</th>
                                                <th>Giá Level 2</th>
                                                <th>Giá Level 3</th>
                                                <th>Giá Level 4</th>
                                                <th>Giá Level 5</th>
                                                <th>Tối thiểu</th>
                                                <th>Tối đa</th>
                                                <th>Dịch vụ</th>
                                                <th>Trạng Thái</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['server'] as $value)
                                                <tr>

                                                    <td>{{ $value['id'] }}</td>
                                                    <td>{{ $value['name'] }}</td>
                                                    <td>{{ $value['detail'] }}</td>
                                                    <td>{{ $value['price'] }}</td>
                                                    <td>{{ $value['smmpanel'] }}</td>
                                                    <td>{{ $value['price_smm'] }}</td>
                                                    <td>{{ $value['server_smm'] }}</td>
                                                    <td>{{ $value['level1'] }}</td>
                                                    <td>{{ $value['level2'] }}</td>
                                                    <td>{{ $value['level3'] }}</td>
                                                    <td>{{ $value['level4'] }}</td>
                                                    <td>{{ $value['level5'] }}</td>
                                                    <td>{{ $value['min'] }}</td>
                                                    <td>{{ $value['max'] }}</td>
                                                    <td>{{ $value['id_service'] }}</td>
                                                    <td>{{ $value['status'] }}</td>
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

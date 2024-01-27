@extends('admin.main')
@section('title', $data['title'])
@section('content')
    @if (!$id)
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
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Tên server">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Thông tin</label>
                                                    <input type="text" name="detail" class="form-control"
                                                        placeholder="Thông tin">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Giá tiền</label>
                                                    <input type="text" name="price" class="form-control"
                                                        placeholder="Giá tiền">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Dịch vụ</label>
                                                    <select name="id_service" class="form-control">
                                                        @foreach ($data['services'] as $service)
                                                            <option value="{{ $service['id'] }}">{{ $service['name'] }}
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Lưu ý ( tránh mất tiền )</label>
                                                    <textarea name="note" id="note" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Lưu ý ( hủy đơn )</label>
                                                    <textarea name="note_cancel" id="note_cancel" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Bình luận</label>
                                                    <select name="comment" class="form-control">
                                                        <option value="0">Tắt</option>
                                                        <option value="1">Bật</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">VIP</label>
                                                    <select name="dayvip" class="form-control">
                                                        <option value="0">Tắt</option>
                                                        <option value="1">Bật</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Hủy đơn</label>
                                                    <select name="dayvip" class="form-control">
                                                        <option value="0">Tắt</option>
                                                        <option value="1">Bật</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tăng tốc</label>
                                                    <select name="dayvip" class="form-control">
                                                        <option value="0">Tắt</option>
                                                        <option value="1">Bật</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">SMM Panel</label>
                                                    <select name="smmpanel" class="form-control">
                                                        @foreach ($data['smmpanel'] as $smmpanel)
                                                            <option value="{{ $smmpanel['id'] }}">{{ $smmpanel['name'] }}
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Giá gốc SMM Panel</label>
                                                    <input type="text" name="price_smm" class="form-control"
                                                        placeholder="Giá gốc SMM Panel">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">ID Server gốc SMM Panel</label>
                                                    <input type="text" name="server_smm" class="form-control"
                                                        placeholder="Server gốc SMM Panel">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tối thiểu</label>
                                                    <input type="text" name="min" class="form-control"
                                                        placeholder="Tối thiểu">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tối đa</label>
                                                    <input type="text" name="max" class="form-control"
                                                        placeholder="Tối đa">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Giá cấp 1</label>
                                                    <input type="text" name="level1" class="form-control"
                                                        placeholder="Giá cấp 1">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Giá cấp 2</label>
                                                    <input type="text" name="level2" class="form-control"
                                                        placeholder="Giá cấp 2">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Giá cấp 3</label>
                                                    <input type="text" name="level3" class="form-control"
                                                        placeholder="Giá cấp 3">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Giá cấp 4</label>
                                                    <input type="text" name="level4" class="form-control"
                                                        placeholder="Giá cấp 4">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Giá cấp 5</label>
                                                    <input type="text" name="level5" class="form-control"
                                                        placeholder="Giá cấp 5">
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
                                                    <th>Cảm xúc</th>
                                                    <th>Bình Luận</th>
                                                    <th>VIP</th>
                                                    <th>Tăng tốc</th>
                                                    <th>Hủy đơn</th>
                                                    <th>Trạng Thái</th>
                                                    <th>Mở rộng</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data['server'] as $value)
                                                    @php
                                                        switch ($value['status']) {
                                                            case '1':
                                                                $status = '<td><span class="badge badge-success">Kích hoạt</span></td>';
                                                                break;
                                                            case '0':
                                                                $status = '<td><span class="badge badge-danger">Tắt</span></td>';
                                                                break;
                                                        }

                                                        switch ($value['comment']) {
                                                            case '1':
                                                                $comment = 'Bật';
                                                                break;

                                                            default:
                                                                $comment = 'Tắt';
                                                                break;
                                                        }
                                                        switch ($value['dayvip']) {
                                                            case '1':
                                                                $dayvip = 'Bật';
                                                                break;

                                                            default:
                                                                $dayvip = 'Tắt';
                                                                break;
                                                        }
                                                        switch ($value['cancel']) {
                                                            case '1':
                                                                $cancel = 'Bật';
                                                                break;

                                                            default:
                                                                $cancel = 'Tắt';
                                                                break;
                                                        }
                                                        switch ($value['speed']) {
                                                            case '1':
                                                                $speed = 'Bật';
                                                                break;

                                                            default:
                                                                $speed = 'Tắt';
                                                                break;
                                                        }
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $value['id'] }}</td>
                                                        <td>{{ $value['name'] }}</td>
                                                        <td>{{ $value['detail'] }}</td>
                                                        <td>{{ str_replace(',', '.', number_format($value['price'])) }}
                                                        </td>
                                                        <td>{{ $value['smmpanel'] }}</td>
                                                        <td>{{ $value['price_smm'] }}</td>
                                                        <td>{{ $value['server_smm'] }}</td>
                                                        <td>{{ str_replace(',', '.', number_format($value['level1'])) }}
                                                        </td>
                                                        <td>{{ str_replace(',', '.', number_format($value['level2'])) }}
                                                        </td>
                                                        <td>{{ str_replace(',', '.', number_format($value['level3'])) }}
                                                        </td>
                                                        <td>{{ str_replace(',', '.', number_format($value['level4'])) }}
                                                        </td>
                                                        <td>{{ str_replace(',', '.', number_format($value['level5'])) }}
                                                        </td>
                                                        <td>{{ str_replace(',', '.', number_format($value['min'])) }}</td>
                                                        <td>{{ str_replace(',', '.', number_format($value['max'])) }}</td>
                                                        <td>{{ $value['id_service'] }}</td>
                                                        <td>{{ $value['reaction'] }}</td>
                                                        <td>{{ $comment }}</td>
                                                        <td>{{ $dayvip }}</td>
                                                        <td>{{ $cancel }}</td>
                                                        <td>{{ $speed }}</td>
                                                        <td>{!! $status !!}</td>
                                                        <td>
                                                            <a type="button"
                                                                href="{{ route('admin_server') }}/{{ $value['id'] }}"
                                                                class="btn btn-primary btn-sm d-inline-block">Cập
                                                                nhật</a>
                                                            @if ($value['status'] == 1)
                                                                <button type="button"
                                                                    onclick="server_change_status({{ $value['id'] }});"
                                                                    class="btn btn-danger btn-sm d-inline-block">Tắt</button>
                                                            @else
                                                                <button type="button"
                                                                    onclick="server_change_status({{ $value['id'] }});"
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
                                    {{ $data['server']->links('admin.custom') }}
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
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Cập nhật Server</h3>
                                </div>

                                <form action="{{ route('admin_update_server') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tên Server</label>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Tên server" value="{{ $data['server']['name'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Thông tin</label>
                                                    <input type="text" name="detail" class="form-control"
                                                        placeholder="Thông tin" value="{{ $data['server']['detail'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Giá tiền</label>
                                                    <input type="text" name="price" class="form-control"
                                                        placeholder="Giá tiền" value="{{ $data['server']['price'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Dịch vụ</label>
                                                    <select name="id_service" class="form-control">
                                                        @foreach ($data['services'] as $service)
                                                            @if ($service['id'] == $data['server']['id_service'])
                                                                <option value="{{ $service['id'] }}" selected>
                                                                    {{ $service['name'] }}
                                                                </option>
                                                            @else
                                                                <option value="{{ $service['id'] }}">
                                                                    {{ $service['name'] }}
                                                                </option>
                                                            @endif
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Lưu ý ( tránh mất tiền )</label>
                                                    <textarea name="note" id="note" class="form-control">{{ $data['server']['note'] }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Lưu ý ( hủy đơn )</label>
                                                    <textarea name="note_cancel" id="note_cancel" class="form-control">{{ $data['server']['note_cancel'] }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Bình luận</label>
                                                    <select name="comments" class="form-control">
                                                        <option value="0">Tắt</option>
                                                        <option value="1">Bật</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">VIP</label>
                                                    <select name="dayvip" class="form-control">
                                                        <option value="0">Tắt</option>
                                                        <option value="1">Bật</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Hủy đơn</label>
                                                    <select name="dayvip" class="form-control">
                                                        <option value="0">Tắt</option>
                                                        <option value="1">Bật</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tăng tốc</label>
                                                    <select name="dayvip" class="form-control">
                                                        <option value="0">Tắt</option>
                                                        <option value="1">Bật</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">SMM Panel</label>
                                                    <select name="smmpanel" class="form-control">
                                                        @foreach ($data['smmpanel'] as $smmpanel)
                                                            @if ($data['server']['smmpanel'] == $smmpanel['id'])
                                                                <option value="{{ $smmpanel['id'] }}" selected>
                                                                    {{ $smmpanel['name'] }}</option>
                                                            @else
                                                                <option value="{{ $smmpanel['id'] }}">
                                                                    {{ $smmpanel['name'] }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Giá gốc SMM Panel</label>
                                                    <input type="text" name="price_smm" class="form-control"
                                                        placeholder="Giá gốc SMM Panel"
                                                        value="{{ $data['server']['price_smm'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">ID Server gốc SMM Panel</label>
                                                    <input type="text" name="server_smm" class="form-control"
                                                        placeholder="Server gốc SMM Panel"
                                                        value="{{ $data['server']['server_smm'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tối thiểu</label>
                                                    <input type="text" name="min" class="form-control"
                                                        placeholder="Tối thiểu" value="{{ $data['server']['min'] }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tối đa</label>
                                                    <input type="text" name="max" class="form-control"
                                                        placeholder="Tối đa" value="{{ $data['server']['max'] }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Giá cấp 1</label>
                                                    <input type="text" name="level1" class="form-control"
                                                        placeholder="Giá cấp 1" value="{{ $data['server']['level1'] }}">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Giá cấp 2</label>
                                                    <input type="text" name="level2" class="form-control"
                                                        placeholder="Giá cấp 2" value="{{ $data['server']['level2'] }}">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Giá cấp 3</label>
                                                    <input type="text" name="level3" class="form-control"
                                                        placeholder="Giá cấp 3" value="{{ $data['server']['level3'] }}">
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Giá cấp 4</label>
                                                    <input type="text" name="level4" class="form-control"
                                                        placeholder="Giá cấp 4" value="{{ $data['server']['level4'] }}">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Giá cấp 5</label>
                                                    <input type="text" name="level5" class="form-control"
                                                        placeholder="Giá cấp 5" value="{{ $data['server']['level5'] }}">
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

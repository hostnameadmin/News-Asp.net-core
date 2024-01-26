@extends('admin.main')
@section('title', $data['title'])
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard v2</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v2</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-check"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Thành viên mới hôm nay</span>
                                <span class="info-box-number">
                                    {{ $data['new_user_today'] }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-shopping-bag"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Tiền nạp hôm nay</span>
                                <span
                                    class="info-box-number">{{ str_replace(',', '.', number_format($data['amount_today'])) }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Tổng dùng hôm nay</span>
                                <span
                                    class="info-box-number">{{ str_replace(',', '.', number_format($data['spending_today'])) }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Lợi nhuận hôm nay</span>
                                <span class="info-box-number">0</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-check"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Thành viên</span>
                                <span class="info-box-number">
                                    {{ $data['user'] }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-money-check-alt"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Số dư</span>
                                <span
                                    class="info-box-number">{{ str_replace(',', '.', number_format($data['balance'])) }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fa fa-shopping-bag"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Tổng nạp</span>
                                <span
                                    class="info-box-number">{{ str_replace(',', '.', number_format($data['total_amount'])) }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Tổng dùng</span>
                                <span
                                    class="info-box-number">{{ str_replace(',', '.', number_format($data['total_order_amount'])) }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-bag"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Tổng đơn hàng</span>
                                <span class="info-box-number">
                                    {{ str_replace(',', '.', number_format($data['total_order'])) }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-check-square"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Đơn đã xử lý</span>
                                <span
                                    class="info-box-number">{{ str_replace(',', '.', number_format($data['total_order_process'])) }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-download"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Đơn chưa xử lý</span>
                                <span
                                    class="info-box-number">{{ str_replace(',', '.', number_format($data['total_order_pending'])) }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-backspace"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Đơn hoàn tiền</span>
                                <span
                                    class="info-box-number">{{ str_replace(',', '.', number_format($data['total_order_partial_count'])) }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shopping-bag"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Tổng tiền đơn</span>
                                <span class="info-box-number">
                                    {{ str_replace(',', '.', number_format($data['total_order_amount'])) }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-backward"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Tiền đơn lỗi</span>
                                <span
                                    class="info-box-number">{{ str_replace(',', '.', number_format($data['total_order_error'])) }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Tiền hoàn đơn</span>
                                <span
                                    class="info-box-number">{{ str_replace(',', '.', number_format($data['total_order_partial_amount'])) }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i
                                    class="fas fa-money-check-alt"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Tổng lợi nhuận</span>
                                <span class="info-box-number">2,000</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">

                                <h5 class="card-title"><i class="fas fa-wrench"></i> Cài đặt hệ thống</h5>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="{{ route('settings') }}" method="post">
                                            @csrf
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Tiêu đề</label>
                                                            @foreach ($data['settings'] as $value)
                                                                @if ($value['key'] == 'title')
                                                                    <input type="text" name="title"
                                                                        class="form-control" placeholder="Tên dịch vụ"
                                                                        value="{{ $value['value'] }}">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Miêu tả</label>
                                                            @foreach ($data['settings'] as $value)
                                                                @if ($value['key'] == 'description')
                                                                    <textarea type="text" name="description" class="form-control" placeholder="Tên dịch vụ">{{ $value['value'] }}</textarea>
                                                                @endif
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Từ khóa tìm kiếm</label>
                                                            @foreach ($data['settings'] as $value)
                                                                @if ($value['key'] == 'keyword')
                                                                    <textarea type="text" name="keyword" class="form-control" placeholder="Tên dịch vụ">{{ $value['value'] }}</textarea>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Logo</label>
                                                            @foreach ($data['settings'] as $value)
                                                                @if ($value['key'] == 'logo')
                                                                    <input type="text" name="logo"
                                                                        class="form-control" placeholder="Tên dịch vụ"
                                                                        value="{{ $value['value'] }}">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">API Telegram</label>
                                                            @foreach ($data['settings'] as $value)
                                                                @if ($value['key'] == 'telegram')
                                                                    <input type="text" name="telegram"
                                                                        class="form-control" placeholder="Tên dịch vụ"
                                                                        value="{{ $value['value'] }}">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Hỗ trợ</label>
                                                            @foreach ($data['settings'] as $value)
                                                                @if ($value['key'] == 'support')
                                                                    <input type="text" name="support"
                                                                        class="form-control" placeholder="Tên dịch vụ"
                                                                        value="{{ $value['value'] }}">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Facebook</label>
                                                            @foreach ($data['settings'] as $value)
                                                                @if ($value['key'] == 'facebook')
                                                                    <input type="text" name="facebook"
                                                                        class="form-control" placeholder="Tên dịch vụ"
                                                                        value="{{ $value['value'] }}">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Tên ADMIN</label>
                                                            @foreach ($data['settings'] as $value)
                                                                @if ($value['key'] == 'admin')
                                                                    <input type="text" name="admin"
                                                                        class="form-control" placeholder="Tên dịch vụ"
                                                                        value="{{ $value['value'] }}">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Hotline</label>
                                                            @foreach ($data['settings'] as $value)
                                                                @if ($value['key'] == 'hotline')
                                                                    <input type="text" name="hotline"
                                                                        class="form-control" placeholder="Tên dịch vụ"
                                                                        value="{{ $value['value'] }}">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Cú pháp nạp tiền</label>
                                                            @foreach ($data['settings'] as $value)
                                                                @if ($value['key'] == 'syntax')
                                                                    <input type="text" name="syntax"
                                                                        class="form-control" placeholder="Tên dịch vụ"
                                                                        value="{{ $value['value'] }}">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Sự kiện</label>
                                                            @foreach ($data['settings'] as $value)
                                                                @if ($value['key'] == 'promotion')
                                                                    <input type="text" name="promotion"
                                                                        class="form-control" placeholder="Tên dịch vụ"
                                                                        value="{{ $value['value'] }}">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Cấp độ 1</label>
                                                            @foreach ($data['settings'] as $value)
                                                                @if ($value['key'] == 'level1')
                                                                    <input type="text" name="level1"
                                                                        class="form-control" placeholder="Tên dịch vụ"
                                                                        value="{{ $value['value'] }}">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Cấp độ 2</label>
                                                            @foreach ($data['settings'] as $value)
                                                                @if ($value['key'] == 'level2')
                                                                    <input type="text" name="level2"
                                                                        class="form-control" placeholder="Tên dịch vụ"
                                                                        value="{{ $value['value'] }}">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Cấp độ 3</label>
                                                            @foreach ($data['settings'] as $value)
                                                                @if ($value['key'] == 'level3')
                                                                    <input type="text" name="level3"
                                                                        class="form-control" placeholder="Tên dịch vụ"
                                                                        value="{{ $value['value'] }}">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Cấp độ 4</label>
                                                            @foreach ($data['settings'] as $value)
                                                                @if ($value['key'] == 'level4')
                                                                    <input type="text" name="level4"
                                                                        class="form-control" placeholder="Tên dịch vụ"
                                                                        value="{{ $value['value'] }}">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Cấp độ 5</label>
                                                            @foreach ($data['settings'] as $value)
                                                                @if ($value['key'] == 'level5')
                                                                    <input type="text" name="level5"
                                                                        class="form-control" placeholder="Tên dịch vụ"
                                                                        value="{{ $value['value'] }}">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- ./card-body -->
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Main row -->
                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

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
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">

                                <h5 class="card-title"><i class="fas fa-wrench"></i> Tỉ lệ % Auto Giá SMM PANEL </h5>
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
                                        <form action="{{ route('admin_update_smmpanel_percent') }}" method="post">
                                            @csrf
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Thường</label>
                                                            @foreach ($data['smmpanel_percent'] as $value)
                                                                @if ($value['key'] == 'price')
                                                                    <input type="text" name="price"
                                                                        class="form-control" placeholder="Tên dịch vụ"
                                                                        value="{{ $value['value'] }}">
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Cấp 1</label>
                                                            @foreach ($data['smmpanel_percent'] as $value)
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
                                                            <label for="exampleInputEmail1">Cấp 2</label>
                                                            @foreach ($data['smmpanel_percent'] as $value)
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
                                                            <label for="exampleInputEmail1">Cấp 3</label>
                                                            @foreach ($data['smmpanel_percent'] as $value)
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
                                                            <label for="exampleInputEmail1">Cấp 4</label>
                                                            @foreach ($data['smmpanel_percent'] as $value)
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
                                                            <label for="exampleInputEmail1">Cấp 5</label>
                                                            @foreach ($data['smmpanel_percent'] as $value)
                                                                @if ($value['key'] == 'level5')
                                                                    <input type="text" name="level5"
                                                                        class="form-control" placeholder="Tên dịch vụ"
                                                                        value="{{ $value['value'] }}">
                                                                @endif
                                                            @endforeach
                                                        </div>
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

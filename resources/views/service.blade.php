@extends('main')
@section('title', $data['title'])
@section('content')
    @include('nav')
    @include('menu')
    <div class="hk-pg-wrapper">
        <div class="hk-pg-body">
            <div class="container-xxl" id="app">

                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="https://subgiare.vn/home">SubGiaRe.Vn</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tăng like bài viết sale Facebook</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-justified nav-light nav-tabs nav-segmented-tabs segmented-tabs-filled">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#tab_order">
                                            <span class="nav-icon-wrap"><span class="feather-icon"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-check-circle">
                                                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                    </svg></span></span>
                                            <span class="nav-link-text">Thêm đơn</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#tab_list">
                                            <span class="nav-icon-wrap"><span class="feather-icon"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-file-text">
                                                        <path
                                                            d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                        </path>
                                                        <polyline points="14 2 14 8 20 8"></polyline>
                                                        <line x1="16" y1="13" x2="8" y2="13">
                                                        </line>
                                                        <line x1="16" y1="17" x2="8" y2="17">
                                                        </line>
                                                        <polyline points="10 9 9 9 8 9"></polyline>
                                                    </svg></span></span>
                                            <span class="nav-link-text">Quản lý đơn</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="tab_order">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <form submit-ajax="true" action="{{ route('order') }}" method="post"
                                                    confirm_order="true" class="mb-3">
                                                    @csrf
                                                    <div class="form-group row mb-3">
                                                        @if ($errors->any())
                                                            <div class="alert alert-danger">
                                                                <h6 class="heading-wth-icon alert-heading"><i
                                                                        class="fas fa-exclamation-triangle"></i><b>
                                                                        Danger!</b>
                                                                </h6>
                                                                <ul>
                                                                    @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif
                                                        @if (session('success'))
                                                            <div class="alert alert-success">
                                                                <h6 class="heading-wth-icon alert-heading"><i
                                                                        class="fa fa-check"></i><b> Success!</b></h6>
                                                                {{ session('success') }}
                                                            </div>
                                                        @endif
                                                        <label for="" class="form-label col-md-3">Link bài viết
                                                        </label>
                                                        <div class="col-md-9">
                                                            <input type="url" class="form-control" name="link"
                                                                placeholder="Nhập link bài viết cần tăng">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label for="" class="form-label col-md-3">Máy chủ</label>
                                                        <div class="col-md-9">
                                                            <div class="form-control-wrap">
                                                                <select class="form-select" data-search="on" name="server"
                                                                    id="server">
                                                                    <option>Chọn máy chủ</option>
                                                                    @foreach ($data['server'] as $value)
                                                                        <option value="{{ $value['id'] }}">
                                                                            {{ $value['name'] . ' - ' . $value['detail'] }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="reaction">
                                                        <div class="form-group row mb-3">
                                                            <label for="" class="form-label col-md-3">Cảm
                                                                xúc</label>
                                                            <div class="col-md-9">
                                                                <div class="">
                                                                    <div
                                                                        class=" form-check
                        form-check-inline">
                                                                        <label class="form-check-label " for="reaction0">
                                                                            <input class="form-check-input checkbox d-none"
                                                                                type="radio" data-prices="101"
                                                                                id="reaction0" name="reaction"
                                                                                value="like" checked=""><img
                                                                                src="https://subgiare.vn/assets/images/fb-reaction/like.png"
                                                                                alt="image"
                                                                                class="d-block ml-2 rounded-circle"
                                                                                width="35">
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <label class="form-check-label " for="reaction1">
                                                                            <input class="form-check-input checkbox d-none"
                                                                                type="radio" data-prices="100"
                                                                                id="reaction1" name="reaction"
                                                                                value="love"><img
                                                                                src="https://subgiare.vn/assets/images/fb-reaction/love.png"
                                                                                alt="image"
                                                                                class="d-block ml-2 rounded-circle"
                                                                                width="35">
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <label class="form-check-label " for="reaction2">
                                                                            <input class="form-check-input checkbox d-none"
                                                                                type="radio" data-prices="100"
                                                                                id="reaction2" name="reaction"
                                                                                value="care"><img
                                                                                src="https://subgiare.vn/assets/images/fb-reaction/care.png"
                                                                                alt="image"
                                                                                class="d-block ml-2 rounded-circle"
                                                                                width="35">
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <label class="form-check-label " for="reaction3">
                                                                            <input class="form-check-input checkbox d-none"
                                                                                type="radio" data-prices="100"
                                                                                id="reaction3" name="reaction"
                                                                                value="haha"><img
                                                                                src="https://subgiare.vn/assets/images/fb-reaction/haha.png"
                                                                                alt="image"
                                                                                class="d-block ml-2 rounded-circle"
                                                                                width="35">
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <label class="form-check-label " for="reaction4">
                                                                            <input class="form-check-input checkbox d-none"
                                                                                type="radio" data-prices="100"
                                                                                id="reaction4" name="reaction"
                                                                                value="wow"><img
                                                                                src="https://subgiare.vn/assets/images/fb-reaction/wow.png"
                                                                                alt="image"
                                                                                class="d-block ml-2 rounded-circle"
                                                                                width="35">
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <label class="form-check-label " for="reaction6">
                                                                            <input class="form-check-input checkbox d-none"
                                                                                type="radio" data-prices="100"
                                                                                id="reaction6" name="reaction"
                                                                                value="sad"><img
                                                                                src="https://subgiare.vn/assets/images/fb-reaction/sad.png"
                                                                                alt="image"
                                                                                class="d-block ml-2 rounded-circle"
                                                                                width="35">
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-inline">
                                                                        <label class="form-check-label " for="reaction7">
                                                                            <input class="form-check-input checkbox d-none"
                                                                                type="radio" data-prices="100"
                                                                                id="reaction7" name="reaction"
                                                                                value="angry"><img
                                                                                src="https://subgiare.vn/assets/images/fb-reaction/angry.png"
                                                                                alt="image"
                                                                                class="d-block ml-2 rounded-circle"
                                                                                width="35">
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="quantity">
                                                        <div class="form-group row mb-3">
                                                            <label for="" class="form-label col-md-3">Số lượng
                                                            </label>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control mb-3"
                                                                    name="quantity" value="100"
                                                                    placeholder="Nhập số lượng cần tăng"
                                                                    onkeyup="bill();">
                                                                <div class="alert text-white bg-info text-center"
                                                                    role="alert">
                                                                    <strong>Tổng tiền = (Số lượng) x (Giá 1
                                                                        Seeding)</strong>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="comment"></div>
                                                    <div class="form-group row mb-3">
                                                        <label for="" class="form-label col-md-3">Ghi chú </label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control mb-3" name="note" rows="3" placeholder="Nhập ghi chú nếu cần"></textarea>
                                                            <div class="alert bg-danger text-white" role="alert">
                                                                <h4 class="text-white">Vui lòng đọc tránh mất tiền</h4>
                                                                - <b>Mua bằng link bài viết ở chế độ công khai, phải có nút
                                                                    like.</b>.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <div class="col-sm-12 text-center">
                                                            <div class="alert text-white bg-success " role="alert">
                                                                <h3 class="font-bold text-white">Tổng thanh toán: <span
                                                                        class="bold green"><span id="total_payment"
                                                                            class="text-danger">0</span> VNĐ</span></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="d-grid gap-2">
                                                        <button type="submit" class="btn btn-primary" id="buy"
                                                            order="Bạn có muốn thanh toán đơn hàng?, chúng tôi sẽ không hoàn tiền với đơn đã thanh toán."><img
                                                                src="https://subgiare.vn/assets/images/svg/buy.svg"
                                                                alt="" width="30" height="30"> Thanh
                                                            toán</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="alert bg-secondary text-white" role="alert">
                                                            <h4 class="text-white">Các trường hợp đơn bị hủy hoặc không lên
                                                                like
                                                            </h4>
                                                            <ul>
                                                                <li>
                                                                    <p>Bài viết không mở công khai hoặc lấy sai link, id.
                                                                    </p>
                                                                </li>
                                                                <li>
                                                                    <p>Nếu tăng like cho group công khai ,video và live hãy
                                                                        mua
                                                                        thử
                                                                        số lượng nhỏ xem server đó có chạy không vì 1 số
                                                                        server
                                                                        không hỗ trợ.</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="alert bg-danger text-white" role="alert">
                                                            <h4 class="text-white">Lưu ý</h4>
                                                            <ul>
                                                                <li>
                                                                    <p>Nghiêm cấm buff các đơn có nội dung vi phạm pháp
                                                                        luật,
                                                                        chính trị, đồ trụy... Nếu cố tình buff bạn
                                                                        sẽ
                                                                        bị trừ hết tiền và ban khỏi hệ thống vĩnh viễn, và
                                                                        phải
                                                                        chịu hoàn toàn trách nhiệm trước pháp
                                                                        luật.</p>
                                                                </li>
                                                                <li>
                                                                    <p>Nếu đơn đang chạy trên hệ thống mà bạn vẫn mua ở các
                                                                        hệ
                                                                        thống bên khác hoặc đè nhiều đơn, nếu có tình trạng
                                                                        hụt,
                                                                        thiếu
                                                                        số lượng giữa 2 bên thì sẽ không được xử lí.</p>
                                                                </li>
                                                                <li>
                                                                    <p>Đơn cài sai thông tin hoặc lỗi trong quá trình tăng
                                                                        hệ
                                                                        thống sẽ không hoàn lại tiền.</p>
                                                                </li>
                                                                <li>
                                                                    <p>Nếu gặp lỗi hãy nhắn tin hỗ trợ phía bên phải góc màn
                                                                        hình hoặc vào mục liên hệ hỗ trợ để được hỗ
                                                                        trợ
                                                                        tốt nhất</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab_list">
                                        <div class="table-responsive">

                                            <div id="listOrders_wrapper"
                                                class="dataTables_wrapper dt-bootstrap5 no-footer">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6">
                                                        <div class="dataTables_length" id="listOrders_length"><label>Xem
                                                                <select name="listOrders_length"
                                                                    aria-controls="listOrders"
                                                                    class="form-select form-select-sm">
                                                                    <option value="5">5</option>
                                                                    <option value="10">10</option>
                                                                    <option value="15">15</option>
                                                                    <option value="50">50</option>
                                                                    <option value="100">100</option>
                                                                    <option value="200">200</option>
                                                                    <option value="500">500</option>
                                                                    <option value="1000">1,000</option>
                                                                    <option value="5000">5,000</option>
                                                                    <option value="-1">All</option>
                                                                </select> mục</label></div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-6">
                                                        <div id="listOrders_filter" class="dataTables_filter"><label>Tìm
                                                                kiếm
                                                                <input type="search" class="form-control form-control-sm"
                                                                    placeholder="nhập từ khóa..."
                                                                    aria-controls="listOrders"></label></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="dataTables_scroll">
                                                            <div class="dataTables_scrollHead"
                                                                style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                                                                <div class="dataTables_scrollHeadInner"
                                                                    style="box-sizing: content-box; width: 3050.73px; padding-right: 5px;">
                                                                    <table
                                                                        class="table table-bordered table-hover no-footer text-nowrap dataTable"
                                                                        role="grid"
                                                                        style="margin-left: 0px; width: 3050.73px;">
                                                                        <thead>
                                                                            <tr role="row">
                                                                                <th class="text-center sorting sorting_desc"
                                                                                    tabindex="0"
                                                                                    aria-controls="listOrders"
                                                                                    rowspan="1" colspan="1"
                                                                                    style="width: 53.8906px;"
                                                                                    aria-sort="descending"
                                                                                    aria-label="ID: activate to sort column ascending">
                                                                                    ID</th>
                                                                                <th class="text-center sorting"
                                                                                    tabindex="0"
                                                                                    aria-controls="listOrders"
                                                                                    rowspan="1" colspan="1"
                                                                                    style="width: 129.453px;"
                                                                                    aria-label="Thao tác: activate to sort column ascending">
                                                                                    Thao tác</th>
                                                                                <th class="text-center sorting"
                                                                                    tabindex="0"
                                                                                    aria-controls="listOrders"
                                                                                    rowspan="1" colspan="1"
                                                                                    style="width: 156.141px;"
                                                                                    aria-label="Thời gian: activate to sort column ascending">
                                                                                    Thời gian</th>
                                                                                <th class="text-center sorting"
                                                                                    tabindex="0"
                                                                                    aria-controls="listOrders"
                                                                                    rowspan="1" colspan="1"
                                                                                    style="width: 234.484px;"
                                                                                    aria-label="Mã đơn: activate to sort column ascending">
                                                                                    Mã đơn</th>
                                                                                <th class="text-center sorting"
                                                                                    tabindex="0"
                                                                                    aria-controls="listOrders"
                                                                                    rowspan="1" colspan="1"
                                                                                    style="width: 1042.59px;"
                                                                                    aria-label="Link bài viết: activate to sort column ascending">
                                                                                    Link bài viết</th>
                                                                                <th class="text-center sorting"
                                                                                    tabindex="0"
                                                                                    aria-controls="listOrders"
                                                                                    rowspan="1" colspan="1"
                                                                                    style="width: 57.2812px;"
                                                                                    aria-label="Máy chủ: activate to sort column ascending">
                                                                                    Máy chủ</th>
                                                                                <th class="text-center sorting"
                                                                                    tabindex="0"
                                                                                    aria-controls="listOrders"
                                                                                    rowspan="1" colspan="1"
                                                                                    style="width: 58.9531px;"
                                                                                    aria-label="Cảm xúc: activate to sort column ascending">
                                                                                    Cảm xúc</th>
                                                                                <th class="text-center sorting"
                                                                                    tabindex="0"
                                                                                    aria-controls="listOrders"
                                                                                    rowspan="1" colspan="1"
                                                                                    style="width: 61.8906px;"
                                                                                    aria-label="Số lượng: activate to sort column ascending">
                                                                                    Số lượng</th>
                                                                                <th class="text-center sorting"
                                                                                    tabindex="0"
                                                                                    aria-controls="listOrders"
                                                                                    rowspan="1" colspan="1"
                                                                                    style="width: 51.6094px;"
                                                                                    aria-label="Bắt đầu: activate to sort column ascending">
                                                                                    Bắt đầu</th>
                                                                                <th class="text-center sorting"
                                                                                    tabindex="0"
                                                                                    aria-controls="listOrders"
                                                                                    rowspan="1" colspan="1"
                                                                                    style="width: 53.375px;"
                                                                                    aria-label="Đã tăng: activate to sort column ascending">
                                                                                    Đã tăng</th>
                                                                                <th class="text-center sorting"
                                                                                    tabindex="0"
                                                                                    aria-controls="listOrders"
                                                                                    rowspan="1" colspan="1"
                                                                                    style="width: 41.6562px;"
                                                                                    aria-label="Giá: activate to sort column ascending">
                                                                                    Giá</th>
                                                                                <th class="text-center sorting"
                                                                                    tabindex="0"
                                                                                    aria-controls="listOrders"
                                                                                    rowspan="1" colspan="1"
                                                                                    style="width: 110.859px;"
                                                                                    aria-label="Tổng thanh toán: activate to sort column ascending">
                                                                                    Tổng thanh toán</th>
                                                                                <th class="text-center sorting"
                                                                                    tabindex="0"
                                                                                    aria-controls="listOrders"
                                                                                    rowspan="1" colspan="1"
                                                                                    style="width: 190px;"
                                                                                    aria-label="Ghi chú: activate to sort column ascending">
                                                                                    Ghi chú</th>
                                                                                <th class="text-center sorting"
                                                                                    tabindex="0"
                                                                                    aria-controls="listOrders"
                                                                                    rowspan="1" colspan="1"
                                                                                    style="width: 93.5469px;"
                                                                                    aria-label="Trạng thái: activate to sort column ascending">
                                                                                    Trạng thái</th>
                                                                            </tr>
                                                                        </thead>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="dataTables_scrollBody"
                                                                style="position: relative; overflow: auto; width: 100%; max-height: 55vh;">
                                                                <table
                                                                    class="table table-bordered table-hover no-footer text-nowrap dataTable"
                                                                    id="listOrders" role="grid"
                                                                    aria-describedby="listOrders_info">
                                                                    <thead>
                                                                        <tr role="row" style="height: 2px;">
                                                                            <th class="text-center sorting sorting_desc"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1"
                                                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 53.8906px;"
                                                                                aria-sort="descending"
                                                                                aria-label="ID: activate to sort column ascending">
                                                                                <div class="dataTables_sizing"
                                                                                    style="height: 0px; overflow: hidden;">
                                                                                    ID
                                                                                </div>
                                                                            </th>
                                                                            <th class="text-center sorting"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1"
                                                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 129.453px;"
                                                                                aria-label="Thao tác: activate to sort column ascending">
                                                                                <div class="dataTables_sizing"
                                                                                    style="height: 0px; overflow: hidden;">
                                                                                    Thao
                                                                                    tác</div>
                                                                            </th>
                                                                            <th class="text-center sorting"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1"
                                                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 156.141px;"
                                                                                aria-label="Thời gian: activate to sort column ascending">
                                                                                <div class="dataTables_sizing"
                                                                                    style="height: 0px; overflow: hidden;">
                                                                                    Thời
                                                                                    gian</div>
                                                                            </th>
                                                                            <th class="text-center sorting"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1"
                                                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 234.484px;"
                                                                                aria-label="Mã đơn: activate to sort column ascending">
                                                                                <div class="dataTables_sizing"
                                                                                    style="height: 0px; overflow: hidden;">
                                                                                    Mã
                                                                                    đơn</div>
                                                                            </th>
                                                                            <th class="text-center sorting"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1"
                                                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 1042.59px;"
                                                                                aria-label="Link bài viết: activate to sort column ascending">
                                                                                <div class="dataTables_sizing"
                                                                                    style="height: 0px; overflow: hidden;">
                                                                                    Link
                                                                                    bài viết</div>
                                                                            </th>
                                                                            <th class="text-center sorting"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1"
                                                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 57.2812px;"
                                                                                aria-label="Máy chủ: activate to sort column ascending">
                                                                                <div class="dataTables_sizing"
                                                                                    style="height: 0px; overflow: hidden;">
                                                                                    Máy
                                                                                    chủ</div>
                                                                            </th>
                                                                            <th class="text-center sorting"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1"
                                                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 58.9531px;"
                                                                                aria-label="Cảm xúc: activate to sort column ascending">
                                                                                <div class="dataTables_sizing"
                                                                                    style="height: 0px; overflow: hidden;">
                                                                                    Cảm
                                                                                    xúc</div>
                                                                            </th>
                                                                            <th class="text-center sorting"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1"
                                                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 61.8906px;"
                                                                                aria-label="Số lượng: activate to sort column ascending">
                                                                                <div class="dataTables_sizing"
                                                                                    style="height: 0px; overflow: hidden;">
                                                                                    Số
                                                                                    lượng</div>
                                                                            </th>
                                                                            <th class="text-center sorting"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1"
                                                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 51.6094px;"
                                                                                aria-label="Bắt đầu: activate to sort column ascending">
                                                                                <div class="dataTables_sizing"
                                                                                    style="height: 0px; overflow: hidden;">
                                                                                    Bắt
                                                                                    đầu</div>
                                                                            </th>
                                                                            <th class="text-center sorting"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1"
                                                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 53.375px;"
                                                                                aria-label="Đã tăng: activate to sort column ascending">
                                                                                <div class="dataTables_sizing"
                                                                                    style="height: 0px; overflow: hidden;">
                                                                                    Đã
                                                                                    tăng</div>
                                                                            </th>
                                                                            <th class="text-center sorting"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1"
                                                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 41.6562px;"
                                                                                aria-label="Giá: activate to sort column ascending">
                                                                                <div class="dataTables_sizing"
                                                                                    style="height: 0px; overflow: hidden;">
                                                                                    Giá
                                                                                </div>
                                                                            </th>
                                                                            <th class="text-center sorting"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1"
                                                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 110.859px;"
                                                                                aria-label="Tổng thanh toán: activate to sort column ascending">
                                                                                <div class="dataTables_sizing"
                                                                                    style="height: 0px; overflow: hidden;">
                                                                                    Tổng
                                                                                    thanh toán</div>
                                                                            </th>
                                                                            <th class="text-center sorting"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1"
                                                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 190px;"
                                                                                aria-label="Ghi chú: activate to sort column ascending">
                                                                                <div class="dataTables_sizing"
                                                                                    style="height: 0px; overflow: hidden;">
                                                                                    Ghi
                                                                                    chú</div>
                                                                            </th>
                                                                            <th class="text-center sorting"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1"
                                                                                style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 93.5469px;"
                                                                                aria-label="Trạng thái: activate to sort column ascending">
                                                                                <div class="dataTables_sizing"
                                                                                    style="height: 0px; overflow: hidden;">
                                                                                    Trạng thái</div>
                                                                            </th>
                                                                        </tr>

                                                                    </thead>

                                                                    <tbody role="alert" aria-live="polite"
                                                                        aria-relevant="all" class="">
                                                                        @if (isset($data['order']) && count($data['order']) > 0)
                                                                            @foreach ($data['order'] as $value)
                                                                                @php
                                                                                    if ($value['status'] == 'success') {
                                                                                        $value['status'] = '<td><span
                                                                                    class="badge bg-success bg-sm bg-dim">Hoàn thành</span>
                                                                            </td>';
                                                                                    } elseif ($value['status'] == 'partial') {
                                                                                        $value['status'] = '<td><span
                                                                                    class="badge bg-warning bg-sm bg-dim">Hoàn tiền</span>
                                                                            </td>';
                                                                                    } elseif ($value['status'] == 'inprogress') {
                                                                                        $value['status'] = '<td><span
                                                                                    class="badge bg-primary bg-sm bg-dim">Đang chạy</span>
                                                                            </td>';
                                                                                    } elseif ($value['status'] == 'pending') {
                                                                                        $value['status'] = '<td><span
                                                                                    class="badge bg-warning bg-sm bg-dim">Chờ duyệt</span>
                                                                            </td>';
                                                                                    } else {
                                                                                        $value['status'] = '<td><span
                                                                                    class="badge bg-danger bg-sm bg-dim">Hủy</span>
                                                                            </td>';
                                                                                    }
                                                                                @endphp
                                                                                <tr class="odd">
                                                                                    <td class="sorting_1">
                                                                                        {{ $value['order_smm'] }}
                                                                                    </td>
                                                                                    <td></td>
                                                                                    <td>{{ $value['created_at'] }}</td>
                                                                                    <td>{{ $value['order_smm'] }}</td>
                                                                                    <td><a href="{{ $value['link'] }}"
                                                                                            target="_blank"
                                                                                            rel="noopener noreferrer">{{ $value['link'] }}</a>
                                                                                    </td>
                                                                                    <td><span
                                                                                            class="badge bg-primary bg-sm bg-dim">Server
                                                                                            {{ $value['server'] }}</span>
                                                                                    </td>
                                                                                    <td>like</td>
                                                                                    <td>200</td>
                                                                                    <td>0</td>
                                                                                    <td>200</td>
                                                                                    <td><b
                                                                                            class="text-danger">{{ str_replace(',', '.', number_format($value['total'])) }}</b>
                                                                                        <sup>VND</sup>
                                                                                    </td>
                                                                                    <td><b class="text-danger">1,900</b>
                                                                                        <sup>coin</sup>
                                                                                    </td>
                                                                                    <td>
                                                                                        <textarea class="form-control note" rows="3" readonly="" style="min-width: 200px;">{{ $value['comments'] }}</textarea>
                                                                                    </td>
                                                                                    {!! $value['status'] !!}
                                                                                </tr>
                                                                            @endforeach
                                                                        @else
                                                                    <tbody role="alert" aria-live="polite"
                                                                        aria-relevant="all" class="">
                                                                        <tr class="odd">
                                                                            <td valign="top" colspan="12"
                                                                                class="dataTables_empty">Không tìm thấy
                                                                                dòng
                                                                                nào phù hợp</td>
                                                                        </tr>
                                                                    </tbody>
                                                                    @endif
                                                                    </tbody>

                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div id="listOrders_processing" class="dataTables_processing card"
                                                            style="display: none;">Đang xử lý...</div>
                                                    </div>
                                                </div>
                                                <div class="dataTables_info" id="listOrders_info" role="status"
                                                    aria-live="polite">
                                                    {{ $data['order']->links('vendor.pagination.custom') }}

                                                </div>
                                                Đang xem {{ $data['order']->firstItem() }} đến
                                                {{ $data['order']->lastItem() }} trong tổng số
                                                {{ $data['order']->total() }} mục
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

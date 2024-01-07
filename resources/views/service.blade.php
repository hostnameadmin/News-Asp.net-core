@extends('main')
@section('title', $data['title'])
@section('content')
    @include('nav')
    @include('menu')
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
                                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
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
                                            <form submit-ajax="true"
                                                action="https://subgiare.vn/api/service/facebook/like-post-sale/order"
                                                method="post" confirm_order="true" class="mb-3">
                                                <div class="form-group row mb-3">
                                                    <label for="" class="form-label col-md-3">Link bài viết </label>
                                                    <div class="col-md-9">
                                                        <input type="url" class="form-control" name="link_post"
                                                            placeholder="Nhập link bài viết cần tăng">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="" class="form-label col-md-3">Máy chủ </label>
                                                    <div class="col-md-9">
                                                        <div class="mb-2">
                                                            <div class="mb-1">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" id="sv9"
                                                                        type="radio"
                                                                        detail="Tốc độ ổn 5k/ngày, không hỗ trợ bài viết chia sẻ video, bài viết trong nhóm, bài viết hoặc video đang chạy ads."
                                                                        name="server_order" onchange="bill();"
                                                                        value="sv9" reaction-show="like">
                                                                    <label class="form-check-label" for="sv9">Sv9
                                                                        (Like clone nuôi, max 3m like <b
                                                                            class="text-info">(nên
                                                                            dùng ổn
                                                                            định)</b>)&nbsp;<span
                                                                            class="badge bg-success ">6.5
                                                                            coin / 1 like</span>&nbsp;<b
                                                                            class="text-warning">(Hoạt động)</b></label>
                                                                </div>
                                                                <div class="alert bg-warning text-white detailServer mt-2 mb-2"
                                                                    role="alert">
                                                                    - <b>Tốc độ ổn 5k/ngày, không hỗ trợ bài viết chia sẻ
                                                                        video, bài viết trong nhóm, bài viết hoặc video đang
                                                                        chạy ads.</b></div>
                                                            </div>

                                                            <div class="mb-1">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" id="sv11"
                                                                        type="radio"
                                                                        detail="Tốc độ ổn 10k/ngày, không hỗ trợ bài viết chia sẻ video, bài viết trong nhóm, bài viết hoặc video đang chạy ads."
                                                                        name="server_order" onchange="bill();"
                                                                        value="sv11" reaction-show="like">
                                                                    <label class="form-check-label" for="sv11">Sv11
                                                                        (Like clone nuôi, max 3m like <b
                                                                            class="text-info">(nên
                                                                            dùng ổn
                                                                            định)</b>)&nbsp;<span
                                                                            class="badge bg-success ">9.5
                                                                            coin / 1 like</span>&nbsp;<b
                                                                            class="text-warning">(Hoạt động)</b></label>
                                                                </div>
                                                            </div>
                                                            <div class="mb-1">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" id="sv12"
                                                                        type="radio"
                                                                        detail="Tốc độ ổn 5k/ngày, không hỗ trợ bài viết chia sẻ video, bài viết trong nhóm, bài viết hoặc video đang chạy ads."
                                                                        name="server_order" onchange="bill();"
                                                                        value="sv12">
                                                                    <label class="form-check-label" for="sv12">Sv12
                                                                        (Like clone nuôi, max 3m like <b
                                                                            class="text-info">(nên
                                                                            dùng ổn
                                                                            định)</b>)&nbsp;<span
                                                                            class="badge bg-success ">8.5
                                                                            coin / 1 like</span>&nbsp;<b
                                                                            class="text-warning">(Hoạt động)</b></label>
                                                                </div>
                                                            </div>

                                                            <div class="mb-1">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" id="sv14"
                                                                        type="radio"
                                                                        detail="Tốc độ ổn 10k/ngày, không hỗ trợ bài viết chia sẻ video, bài viết trong nhóm, bài viết hoặc video đang chạy ads."
                                                                        name="server_order" onchange="bill();"
                                                                        value="sv14">
                                                                    <label class="form-check-label" for="sv14">Sv14
                                                                        (Like clone nuôi, max 3m like <b
                                                                            class="text-info">(nên
                                                                            dùng ổn
                                                                            định)</b>)&nbsp;<span
                                                                            class="badge bg-success ">12.5
                                                                            coin / 1 like</span>&nbsp;<b
                                                                            class="text-warning">(Hoạt động)</b></label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div id="detailServer"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="" class="form-label col-md-3">Cảm xúc</label>
                                                    <div class="col-md-9">
                                                        <div class="">
                                                            <div
                                                                class=" form-check
                        form-check-inline">
                                                                <label class="form-check-label " for="reaction0">
                                                                    <input class="form-check-input checkbox d-none"
                                                                        type="radio" data-prices="101" id="reaction0"
                                                                        name="reaction" value="like"
                                                                        checked=""><img
                                                                        src="https://subgiare.vn/assets/images/fb-reaction/like.png"
                                                                        alt="image" class="d-block ml-2 rounded-circle"
                                                                        width="35">
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label " for="reaction1">
                                                                    <input class="form-check-input checkbox d-none"
                                                                        type="radio" data-prices="100" id="reaction1"
                                                                        name="reaction" value="love"><img
                                                                        src="https://subgiare.vn/assets/images/fb-reaction/love.png"
                                                                        alt="image" class="d-block ml-2 rounded-circle"
                                                                        width="35">
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label " for="reaction2">
                                                                    <input class="form-check-input checkbox d-none"
                                                                        type="radio" data-prices="100" id="reaction2"
                                                                        name="reaction" value="care"><img
                                                                        src="https://subgiare.vn/assets/images/fb-reaction/care.png"
                                                                        alt="image" class="d-block ml-2 rounded-circle"
                                                                        width="35">
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label " for="reaction3">
                                                                    <input class="form-check-input checkbox d-none"
                                                                        type="radio" data-prices="100" id="reaction3"
                                                                        name="reaction" value="haha"><img
                                                                        src="https://subgiare.vn/assets/images/fb-reaction/haha.png"
                                                                        alt="image" class="d-block ml-2 rounded-circle"
                                                                        width="35">
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label " for="reaction4">
                                                                    <input class="form-check-input checkbox d-none"
                                                                        type="radio" data-prices="100" id="reaction4"
                                                                        name="reaction" value="wow"><img
                                                                        src="https://subgiare.vn/assets/images/fb-reaction/wow.png"
                                                                        alt="image" class="d-block ml-2 rounded-circle"
                                                                        width="35">
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label " for="reaction6">
                                                                    <input class="form-check-input checkbox d-none"
                                                                        type="radio" data-prices="100" id="reaction6"
                                                                        name="reaction" value="sad"><img
                                                                        src="https://subgiare.vn/assets/images/fb-reaction/sad.png"
                                                                        alt="image" class="d-block ml-2 rounded-circle"
                                                                        width="35">
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <label class="form-check-label " for="reaction7">
                                                                    <input class="form-check-input checkbox d-none"
                                                                        type="radio" data-prices="100" id="reaction7"
                                                                        name="reaction" value="angry"><img
                                                                        src="https://subgiare.vn/assets/images/fb-reaction/angry.png"
                                                                        alt="image" class="d-block ml-2 rounded-circle"
                                                                        width="35">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label for="" class="form-label col-md-3">Số lượng </label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control mb-3" name="amount"
                                                            onkeyup="bill();" value="100"
                                                            placeholder="Nhập số lượng cần tăng">
                                                        <div class="alert text-white bg-info text-center" role="alert">
                                                            <strong>Tổng tiền = (Số lượng) x (Giá 1 like)</strong>
                                                        </div>
                                                    </div>
                                                </div>

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
                                                                        class="text-danger">650</span> coin</span></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-grid gap-2">
                                                    <button type="submit" class="btn btn-primary" id="buy"
                                                        order="Bạn có muốn thanh toán đơn hàng?, chúng tôi sẽ không hoàn tiền với đơn đã thanh toán."><img
                                                            src="/assets/images/svg/buy.svg" alt=""
                                                            width="30" height="30"> Thanh
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
                                                                <p>Bài viết không mở công khai hoặc lấy sai link, id.</p>
                                                            </li>
                                                            <li>
                                                                <p>Nếu tăng like cho group công khai ,video và live hãy mua
                                                                    thử
                                                                    số lượng nhỏ xem server đó có chạy không vì 1 số server
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
                                                                <p>Nghiêm cấm buff các đơn có nội dung vi phạm pháp luật,
                                                                    chính trị, đồ trụy... Nếu cố tình buff bạn
                                                                    sẽ
                                                                    bị trừ hết tiền và ban khỏi hệ thống vĩnh viễn, và phải
                                                                    chịu hoàn toàn trách nhiệm trước pháp
                                                                    luật.</p>
                                                            </li>
                                                            <li>
                                                                <p>Nếu đơn đang chạy trên hệ thống mà bạn vẫn mua ở các hệ
                                                                    thống bên khác hoặc đè nhiều đơn, nếu có tình trạng hụt,
                                                                    thiếu
                                                                    số lượng giữa 2 bên thì sẽ không được xử lí.</p>
                                                            </li>
                                                            <li>
                                                                <p>Đơn cài sai thông tin hoặc lỗi trong quá trình tăng hệ
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

                                        <div id="listOrders_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="dataTables_length" id="listOrders_length"><label>Xem
                                                            <select name="listOrders_length" aria-controls="listOrders"
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
                                                    <div id="listOrders_filter" class="dataTables_filter"><label>Tìm kiếm
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
                                                                                tabindex="0" aria-controls="listOrders"
                                                                                rowspan="1" colspan="1"
                                                                                style="width: 53.8906px;"
                                                                                aria-sort="descending"
                                                                                aria-label="ID: activate to sort column ascending">
                                                                                ID</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1" style="width: 129.453px;"
                                                                                aria-label="Thao tác: activate to sort column ascending">
                                                                                Thao tác</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1" style="width: 156.141px;"
                                                                                aria-label="Thời gian: activate to sort column ascending">
                                                                                Thời gian</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1" style="width: 234.484px;"
                                                                                aria-label="Mã đơn: activate to sort column ascending">
                                                                                Mã đơn</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1" style="width: 1042.59px;"
                                                                                aria-label="Link bài viết: activate to sort column ascending">
                                                                                Link bài viết</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1" style="width: 57.2812px;"
                                                                                aria-label="Máy chủ: activate to sort column ascending">
                                                                                Máy chủ</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1" style="width: 58.9531px;"
                                                                                aria-label="Cảm xúc: activate to sort column ascending">
                                                                                Cảm xúc</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1" style="width: 61.8906px;"
                                                                                aria-label="Số lượng: activate to sort column ascending">
                                                                                Số lượng</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1" style="width: 51.6094px;"
                                                                                aria-label="Bắt đầu: activate to sort column ascending">
                                                                                Bắt đầu</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1" style="width: 53.375px;"
                                                                                aria-label="Đã tăng: activate to sort column ascending">
                                                                                Đã tăng</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1" style="width: 41.6562px;"
                                                                                aria-label="Giá: activate to sort column ascending">
                                                                                Giá</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1" style="width: 110.859px;"
                                                                                aria-label="Tổng thanh toán: activate to sort column ascending">
                                                                                Tổng thanh toán</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1" style="width: 190px;"
                                                                                aria-label="Ghi chú: activate to sort column ascending">
                                                                                Ghi chú</th>
                                                                            <th class="text-center sorting" tabindex="0"
                                                                                aria-controls="listOrders" rowspan="1"
                                                                                colspan="1" style="width: 93.5469px;"
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
                                                                                style="height: 0px; overflow: hidden;">ID
                                                                            </div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listOrders" rowspan="1"
                                                                            colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 129.453px;"
                                                                            aria-label="Thao tác: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Thao
                                                                                tác</div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listOrders" rowspan="1"
                                                                            colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 156.141px;"
                                                                            aria-label="Thời gian: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Thời
                                                                                gian</div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listOrders" rowspan="1"
                                                                            colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 234.484px;"
                                                                            aria-label="Mã đơn: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Mã
                                                                                đơn</div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listOrders" rowspan="1"
                                                                            colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 1042.59px;"
                                                                            aria-label="Link bài viết: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Link
                                                                                bài viết</div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listOrders" rowspan="1"
                                                                            colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 57.2812px;"
                                                                            aria-label="Máy chủ: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Máy
                                                                                chủ</div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listOrders" rowspan="1"
                                                                            colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 58.9531px;"
                                                                            aria-label="Cảm xúc: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Cảm
                                                                                xúc</div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listOrders" rowspan="1"
                                                                            colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 61.8906px;"
                                                                            aria-label="Số lượng: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Số
                                                                                lượng</div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listOrders" rowspan="1"
                                                                            colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 51.6094px;"
                                                                            aria-label="Bắt đầu: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Bắt
                                                                                đầu</div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listOrders" rowspan="1"
                                                                            colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 53.375px;"
                                                                            aria-label="Đã tăng: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Đã
                                                                                tăng</div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listOrders" rowspan="1"
                                                                            colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 41.6562px;"
                                                                            aria-label="Giá: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Giá
                                                                            </div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listOrders" rowspan="1"
                                                                            colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 110.859px;"
                                                                            aria-label="Tổng thanh toán: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Tổng
                                                                                thanh toán</div>
                                                                        </th>
                                                                        <th class="text-center sorting"
                                                                            aria-controls="listOrders" rowspan="1"
                                                                            colspan="1"
                                                                            style="padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px; width: 190px;"
                                                                            aria-label="Ghi chú: activate to sort column ascending">
                                                                            <div class="dataTables_sizing"
                                                                                style="height: 0px; overflow: hidden;">Ghi
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
                                                                    <tr class="odd">
                                                                        <td class="sorting_1">1705733</td>
                                                                        <td></td>
                                                                        <td>2023-09-14 16:22:09</td>
                                                                        <td>FbLikePostSale_2H3HDH746RR7</td>
                                                                        <td><a href="https://www.facebook.com/groups/816552086007855/posts/1045927489736979/"
                                                                                target="_blank"
                                                                                rel="noopener noreferrer">https://www.facebook.com/groups/816552086007855/posts/1045927489736979/</a>
                                                                        </td>
                                                                        <td><span
                                                                                class="badge bg-primary bg-sm bg-dim">Server
                                                                                11</span></td>
                                                                        <td>like</td>
                                                                        <td>200</td>
                                                                        <td>0</td>
                                                                        <td>200</td>
                                                                        <td><b class="text-danger">9.5</b> <sup>coin</sup>
                                                                        </td>
                                                                        <td><b class="text-danger">1,900</b>
                                                                            <sup>coin</sup></td>
                                                                        <td>
                                                                            <textarea class="form-control note" rows="3" readonly="" style="min-width: 200px;"></textarea>
                                                                        </td>
                                                                        <td><span class="badge bg-success bg-sm bg-dim">Đã
                                                                                hoàn thành</span></td>
                                                                    </tr>
                                                                    <tr class="even">
                                                                        <td class="sorting_1">1705569</td>
                                                                        <td><button
                                                                                class="btn btn-danger btn-CancelOrder btn-sm me-2"
                                                                                title="Hủy đơn #FbLikePostSale_5WS0IYV2IOC9"
                                                                                data-url="https://subgiare.vn/api/service/facebook/like-post-sale/confirm"
                                                                                data-id="1705569"
                                                                                data-code_order="FbLikePostSale_5WS0IYV2IOC9">
                                                                                <i class="fas fa-trash"></i>
                                                                            </button><button
                                                                                class="btn btn-info btn-DetailReportOrder btn-sm me-2"
                                                                                title="Chi tiết lỗi đơn #FbLikePostSale_5WS0IYV2IOC9"
                                                                                data-url="https://subgiare.vn/api/service/facebook/like-post-sale/list"
                                                                                data-id="1705569"
                                                                                data-code_order="FbLikePostSale_5WS0IYV2IOC9">
                                                                                <i class="fas fa-info-circle"></i>
                                                                            </button><button
                                                                                class="btn btn-success btn-ReportOrder btn-sm me-2"
                                                                                title="Kích hoạt đơn #FbLikePostSale_5WS0IYV2IOC9"
                                                                                data-url="https://subgiare.vn/api/service/facebook/like-post-sale/confirm"
                                                                                data-id="1705569"
                                                                                data-code_order="FbLikePostSale_5WS0IYV2IOC9">
                                                                                <i class="fas fa-check-circle"></i>
                                                                            </button></td>
                                                                        <td>2023-09-14 11:46:49</td>
                                                                        <td>FbLikePostSale_5WS0IYV2IOC9</td>
                                                                        <td><a href="https://www.facebook.com/anhyeuem3737/posts/pfbid02h6rAZJhY9bXJ8dANpfcfk9X6vtWDDcLAtSVcwKWhCV5hBVphYheuQEuaytQveTHAl"
                                                                                target="_blank"
                                                                                rel="noopener noreferrer">https://www.facebook.com/anhyeuem3737/posts/pfbid02h6rAZJhY9bXJ8dANpfcfk9X6vtWDDcLAtSVcwKWhCV5hBVphYheuQEuaytQveTHAl</a>
                                                                        </td>
                                                                        <td><span
                                                                                class="badge bg-primary bg-sm bg-dim">Server
                                                                                9</span></td>
                                                                        <td>like</td>
                                                                        <td>100</td>
                                                                        <td>0</td>
                                                                        <td>22</td>
                                                                        <td><b class="text-danger">6.5</b> <sup>coin</sup>
                                                                        </td>
                                                                        <td><b class="text-danger">650</b> <sup>coin</sup>
                                                                        </td>
                                                                        <td>
                                                                            <textarea class="form-control note" rows="3" readonly="" style="min-width: 200px;"></textarea>
                                                                        </td>
                                                                        <td><span class="badge bg-warning bg-sm bg-dim">Tạm
                                                                                dừng</span></td>
                                                                    </tr>
                                                                    <tr class="odd">
                                                                        <td class="sorting_1">1705568</td>
                                                                        <td><button
                                                                                class="btn btn-danger btn-CancelOrder btn-sm me-2"
                                                                                title="Hủy đơn #FbLikePostSale_77GMQA8ISRYD"
                                                                                data-url="https://subgiare.vn/api/service/facebook/like-post-sale/confirm"
                                                                                data-id="1705568"
                                                                                data-code_order="FbLikePostSale_77GMQA8ISRYD">
                                                                                <i class="fas fa-trash"></i>
                                                                            </button><button
                                                                                class="btn btn-info btn-DetailReportOrder btn-sm me-2"
                                                                                title="Chi tiết lỗi đơn #FbLikePostSale_77GMQA8ISRYD"
                                                                                data-url="https://subgiare.vn/api/service/facebook/like-post-sale/list"
                                                                                data-id="1705568"
                                                                                data-code_order="FbLikePostSale_77GMQA8ISRYD">
                                                                                <i class="fas fa-info-circle"></i>
                                                                            </button><button
                                                                                class="btn btn-success btn-ReportOrder btn-sm me-2"
                                                                                title="Kích hoạt đơn #FbLikePostSale_77GMQA8ISRYD"
                                                                                data-url="https://subgiare.vn/api/service/facebook/like-post-sale/confirm"
                                                                                data-id="1705568"
                                                                                data-code_order="FbLikePostSale_77GMQA8ISRYD">
                                                                                <i class="fas fa-check-circle"></i>
                                                                            </button></td>
                                                                        <td>2023-09-14 11:46:31</td>
                                                                        <td>FbLikePostSale_77GMQA8ISRYD</td>
                                                                        <td><a href="https://www.facebook.com/anhyeuem3737/posts/pfbid02jX5EeJ94LKk98QyLNWy1fG53oeeWrwXvavSn2asqDuraBnXf2Rg73S8we1gscbkbl"
                                                                                target="_blank"
                                                                                rel="noopener noreferrer">https://www.facebook.com/anhyeuem3737/posts/pfbid02jX5EeJ94LKk98QyLNWy1fG53oeeWrwXvavSn2asqDuraBnXf2Rg73S8we1gscbkbl</a>
                                                                        </td>
                                                                        <td><span
                                                                                class="badge bg-primary bg-sm bg-dim">Server
                                                                                9</span></td>
                                                                        <td>like</td>
                                                                        <td>100</td>
                                                                        <td>0</td>
                                                                        <td>25</td>
                                                                        <td><b class="text-danger">6.5</b> <sup>coin</sup>
                                                                        </td>
                                                                        <td><b class="text-danger">650</b> <sup>coin</sup>
                                                                        </td>
                                                                        <td>
                                                                            <textarea class="form-control note" rows="3" readonly="" style="min-width: 200px;"></textarea>
                                                                        </td>
                                                                        <td><span class="badge bg-warning bg-sm bg-dim">Tạm
                                                                                dừng</span></td>
                                                                    </tr>
                                                                    <tr class="even">
                                                                        <td class="sorting_1">1705567</td>
                                                                        <td><button
                                                                                class="btn btn-danger btn-CancelOrder btn-sm me-2"
                                                                                title="Hủy đơn #FbLikePostSale_KSNFNPAA40SO"
                                                                                data-url="https://subgiare.vn/api/service/facebook/like-post-sale/confirm"
                                                                                data-id="1705567"
                                                                                data-code_order="FbLikePostSale_KSNFNPAA40SO">
                                                                                <i class="fas fa-trash"></i>
                                                                            </button><button
                                                                                class="btn btn-info btn-DetailReportOrder btn-sm me-2"
                                                                                title="Chi tiết lỗi đơn #FbLikePostSale_KSNFNPAA40SO"
                                                                                data-url="https://subgiare.vn/api/service/facebook/like-post-sale/list"
                                                                                data-id="1705567"
                                                                                data-code_order="FbLikePostSale_KSNFNPAA40SO">
                                                                                <i class="fas fa-info-circle"></i>
                                                                            </button><button
                                                                                class="btn btn-success btn-ReportOrder btn-sm me-2"
                                                                                title="Kích hoạt đơn #FbLikePostSale_KSNFNPAA40SO"
                                                                                data-url="https://subgiare.vn/api/service/facebook/like-post-sale/confirm"
                                                                                data-id="1705567"
                                                                                data-code_order="FbLikePostSale_KSNFNPAA40SO">
                                                                                <i class="fas fa-check-circle"></i>
                                                                            </button></td>
                                                                        <td>2023-09-14 11:46:18</td>
                                                                        <td>FbLikePostSale_KSNFNPAA40SO</td>
                                                                        <td><a href="https://www.facebook.com/anhyeuem3737/posts/pfbid033gjVNsTm5kGGbnv5AWQiu9PqhuLKubgtH4mair9zBe7MjsXJ5FvrrbsoYE2oVvoLl"
                                                                                target="_blank"
                                                                                rel="noopener noreferrer">https://www.facebook.com/anhyeuem3737/posts/pfbid033gjVNsTm5kGGbnv5AWQiu9PqhuLKubgtH4mair9zBe7MjsXJ5FvrrbsoYE2oVvoLl</a>
                                                                        </td>
                                                                        <td><span
                                                                                class="badge bg-primary bg-sm bg-dim">Server
                                                                                9</span></td>
                                                                        <td>like</td>
                                                                        <td>100</td>
                                                                        <td>0</td>
                                                                        <td>34</td>
                                                                        <td><b class="text-danger">6.5</b> <sup>coin</sup>
                                                                        </td>
                                                                        <td><b class="text-danger">650</b> <sup>coin</sup>
                                                                        </td>
                                                                        <td>
                                                                            <textarea class="form-control note" rows="3" readonly="" style="min-width: 200px;"></textarea>
                                                                        </td>
                                                                        <td><span class="badge bg-warning bg-sm bg-dim">Tạm
                                                                                dừng</span></td>
                                                                    </tr>
                                                                    <tr class="odd">
                                                                        <td class="sorting_1">1705566</td>
                                                                        <td><button
                                                                                class="btn btn-danger btn-CancelOrder btn-sm me-2"
                                                                                title="Hủy đơn #FbLikePostSale_8PXK4ANHEWC2"
                                                                                data-url="https://subgiare.vn/api/service/facebook/like-post-sale/confirm"
                                                                                data-id="1705566"
                                                                                data-code_order="FbLikePostSale_8PXK4ANHEWC2">
                                                                                <i class="fas fa-trash"></i>
                                                                            </button><button
                                                                                class="btn btn-info btn-DetailReportOrder btn-sm me-2"
                                                                                title="Chi tiết lỗi đơn #FbLikePostSale_8PXK4ANHEWC2"
                                                                                data-url="https://subgiare.vn/api/service/facebook/like-post-sale/list"
                                                                                data-id="1705566"
                                                                                data-code_order="FbLikePostSale_8PXK4ANHEWC2">
                                                                                <i class="fas fa-info-circle"></i>
                                                                            </button><button
                                                                                class="btn btn-success btn-ReportOrder btn-sm me-2"
                                                                                title="Kích hoạt đơn #FbLikePostSale_8PXK4ANHEWC2"
                                                                                data-url="https://subgiare.vn/api/service/facebook/like-post-sale/confirm"
                                                                                data-id="1705566"
                                                                                data-code_order="FbLikePostSale_8PXK4ANHEWC2">
                                                                                <i class="fas fa-check-circle"></i>
                                                                            </button></td>
                                                                        <td>2023-09-14 11:46:05</td>
                                                                        <td>FbLikePostSale_8PXK4ANHEWC2</td>
                                                                        <td><a href="https://www.facebook.com/anhyeuem3737/posts/pfbid0Y1oScTFMGcm65teLsH94Fmaho6zPUdYdchCMNdWMcDbym6BkSRmog1KVgYcWqfSCl"
                                                                                target="_blank"
                                                                                rel="noopener noreferrer">https://www.facebook.com/anhyeuem3737/posts/pfbid0Y1oScTFMGcm65teLsH94Fmaho6zPUdYdchCMNdWMcDbym6BkSRmog1KVgYcWqfSCl</a>
                                                                        </td>
                                                                        <td><span
                                                                                class="badge bg-primary bg-sm bg-dim">Server
                                                                                9</span></td>
                                                                        <td>like</td>
                                                                        <td>150</td>
                                                                        <td>0</td>
                                                                        <td>22</td>
                                                                        <td><b class="text-danger">6.5</b> <sup>coin</sup>
                                                                        </td>
                                                                        <td><b class="text-danger">975</b> <sup>coin</sup>
                                                                        </td>
                                                                        <td>
                                                                            <textarea class="form-control note" rows="3" readonly="" style="min-width: 200px;"></textarea>
                                                                        </td>
                                                                        <td><span class="badge bg-warning bg-sm bg-dim">Tạm
                                                                                dừng</span></td>
                                                                    </tr>
                                                                    <tr class="even">
                                                                        <td class="sorting_1">1705563</td>
                                                                        <td></td>
                                                                        <td>2023-09-14 11:43:17</td>
                                                                        <td>FbLikePostSale_JGTRL6EC841S</td>
                                                                        <td><a href="https://www.facebook.com/anhyeuem3737/posts/pfbid02EqNGS69VPoJrWhTJfYXZad4EnW2opkb4HE7Mpw7oEJngRoHvQKaY8R2rzTQCMhnol"
                                                                                target="_blank"
                                                                                rel="noopener noreferrer">https://www.facebook.com/anhyeuem3737/posts/pfbid02EqNGS69VPoJrWhTJfYXZad4EnW2opkb4HE7Mpw7oEJngRoHvQKaY8R2rzTQCMhnol</a>
                                                                        </td>
                                                                        <td><span
                                                                                class="badge bg-primary bg-sm bg-dim">Server
                                                                                9</span></td>
                                                                        <td>like</td>
                                                                        <td>200</td>
                                                                        <td>0</td>
                                                                        <td>29</td>
                                                                        <td><b class="text-danger">6.5</b> <sup>coin</sup>
                                                                        </td>
                                                                        <td><b class="text-danger">1,300</b>
                                                                            <sup>coin</sup></td>
                                                                        <td>
                                                                            <textarea class="form-control note" rows="3" readonly="" style="min-width: 200px;"></textarea>
                                                                        </td>
                                                                        <td><span class="badge bg-dark bg-sm bg-dim">Đã
                                                                                hoàn tiền</span></td>
                                                                    </tr>
                                                                    <tr class="odd">
                                                                        <td class="sorting_1">1454420</td>
                                                                        <td></td>
                                                                        <td>2023-06-03 20:46:22</td>
                                                                        <td>FbLikePostSale_XDRFBNJ5PKCA</td>
                                                                        <td><a href="https://www.facebook.com/106971425472597/videos/784395966692343"
                                                                                target="_blank"
                                                                                rel="noopener noreferrer">https://www.facebook.com/106971425472597/videos/784395966692343</a>
                                                                        </td>
                                                                        <td><span
                                                                                class="badge bg-primary bg-sm bg-dim">Server
                                                                                9</span></td>
                                                                        <td>like</td>
                                                                        <td>200</td>
                                                                        <td>0</td>
                                                                        <td>210</td>
                                                                        <td><b class="text-danger">6.5</b> <sup>coin</sup>
                                                                        </td>
                                                                        <td><b class="text-danger">1,300</b>
                                                                            <sup>coin</sup></td>
                                                                        <td>
                                                                            <textarea class="form-control note" rows="3" readonly="" style="min-width: 200px;"></textarea>
                                                                        </td>
                                                                        <td><span class="badge bg-success bg-sm bg-dim">Đã
                                                                                hoàn thành</span></td>
                                                                    </tr>
                                                                    <tr class="even">
                                                                        <td class="sorting_1">1331239</td>
                                                                        <td></td>
                                                                        <td>2023-05-03 19:47:43</td>
                                                                        <td>FbLikePostSale_TL0RV74TN2ID</td>
                                                                        <td><a href="https://www.facebook.com/photo?fbid=735904524935534&amp;set=a.191802879345704"
                                                                                target="_blank"
                                                                                rel="noopener noreferrer">https://www.facebook.com/photo?fbid=735904524935534&amp;set=a.191802879345704</a>
                                                                        </td>
                                                                        <td><span
                                                                                class="badge bg-primary bg-sm bg-dim">Server
                                                                                9</span></td>
                                                                        <td>like</td>
                                                                        <td>200</td>
                                                                        <td>0</td>
                                                                        <td>201</td>
                                                                        <td><b class="text-danger">7</b> <sup>coin</sup>
                                                                        </td>
                                                                        <td><b class="text-danger">1,400</b>
                                                                            <sup>coin</sup></td>
                                                                        <td>
                                                                            <textarea class="form-control note" rows="3" readonly="" style="min-width: 200px;"></textarea>
                                                                        </td>
                                                                        <td><span class="badge bg-success bg-sm bg-dim">Đã
                                                                                hoàn thành</span></td>
                                                                    </tr>
                                                                    <tr class="odd">
                                                                        <td class="sorting_1">1193953</td>
                                                                        <td></td>
                                                                        <td>2023-03-23 17:26:56</td>
                                                                        <td>FbLikePostSale_D1MBD4ZQNVE4</td>
                                                                        <td><a href="https://www.facebook.com/photo/?fbid=101995922855446&amp;set=a.101373476251024"
                                                                                target="_blank"
                                                                                rel="noopener noreferrer">https://www.facebook.com/photo/?fbid=101995922855446&amp;set=a.101373476251024</a>
                                                                        </td>
                                                                        <td><span
                                                                                class="badge bg-primary bg-sm bg-dim">Server
                                                                                9</span></td>
                                                                        <td>like</td>
                                                                        <td>1,000</td>
                                                                        <td>0</td>
                                                                        <td>1,002</td>
                                                                        <td><b class="text-danger">4</b> <sup>coin</sup>
                                                                        </td>
                                                                        <td><b class="text-danger">4,000</b>
                                                                            <sup>coin</sup></td>
                                                                        <td>
                                                                            <textarea class="form-control note" rows="3" readonly="" style="min-width: 200px;"></textarea>
                                                                        </td>
                                                                        <td><span class="badge bg-success bg-sm bg-dim">Đã
                                                                                hoàn thành</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div id="listOrders_processing" class="dataTables_processing card"
                                                        style="display: none;">Đang xử lý...</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-5">
                                                    <div class="dataTables_info" id="listOrders_info" role="status"
                                                        aria-live="polite">Đang xem 1 đến 9 trong tổng số 9 mục</div>
                                                </div>
                                                <div class="col-sm-12 col-md-7">
                                                    <div class="dataTables_paginate paging_simple_numbers"
                                                        id="listOrders_paginate">
                                                        <ul class="pagination custom-pagination pagination-simple">
                                                            <li class="paginate_button page-item previous disabled"
                                                                id="listOrders_previous"><a href="#"
                                                                    aria-controls="listOrders" data-dt-idx="0"
                                                                    tabindex="0" class="page-link"><i
                                                                        class="ri-arrow-left-s-line"></i></a></li>
                                                            <li class="paginate_button page-item active"><a href="#"
                                                                    aria-controls="listOrders" data-dt-idx="1"
                                                                    tabindex="0" class="page-link">1</a></li>
                                                            <li class="paginate_button page-item next disabled"
                                                                id="listOrders_next"><a href="#"
                                                                    aria-controls="listOrders" data-dt-idx="2"
                                                                    tabindex="0" class="page-link"><i
                                                                        class="ri-arrow-right-s-line"></i></a></li>
                                                        </ul>
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

        </div>
    </div>
@endsection

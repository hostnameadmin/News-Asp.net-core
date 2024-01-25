<style>
    .svg-icon img {
        width: 24px;
        height: 24px;
    }
</style>
<div class="hk-menu">
    <!-- Brand -->
    <div class="menu-header">
        <span>
            <a class="navbar-brand" href="index">
                <img class="brand-img img-fluid"
                    src="https://tuongtacsale.com/wp-content/uploads/2023/10/Chua-co-ten-234-x-59-px-3.png"
                    alt="brand" />
                <img class="brand-img img-fluid"
                    src="https://tuongtacsale.com/wp-content/uploads/2023/10/Chua-co-ten-234-x-59-px-3.png"
                    alt="brand" />
            </a>
            <button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle">
                <span class="icon">
                    <span class="svg-icon fs-5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-bar-to-left"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="10" y1="12" x2="20" y2="12"></line>
                            <line x1="10" y1="12" x2="14" y2="16"></line>
                            <line x1="10" y1="12" x2="14" y2="8"></line>
                            <line x1="4" y1="4" x2="4" y2="20"></line>
                        </svg>
                    </span>
                </span>
            </button>
        </span>
    </div>
    <div data-simplebar class="nicescroll-bar">
        <div class="menu-content-wrap">
            <div class="menu-group">
                <ul class="navbar-nav flex-column">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <img src="https://i.imgur.com/QwtRDs7.png" alt="">
                                </span>
                            </span>
                            <span class="nav-link-text">Trang chủ</span>
                            <span class="badge badge-sm badge-soft-pink ms-auto">Hot</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('info') }}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <img src="https://i.imgur.com/ZVKj2fV.png" alt="">
                                </span>
                            </span>
                            <span class="nav-link-text">Thông tin tài khoản</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('banking') }}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <img src="https://i.imgur.com/5H0slm5.png" alt="">
                                </span>
                            </span>
                            <span class="nav-link-text">Nạp tiền tài khoản</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('history') }}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <img src="https://i.imgur.com/G9mDKMa.png" alt="">
                                </span>
                            </span>
                            <span class="nav-link-text">Lịch sử giao dịch</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <img src="https://i.imgur.com/bGqyt5e.png" alt="">
                                </span>
                            </span>
                            <span class="nav-link-text">Tạo website riêng</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ticket') }}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <img src="https://i.imgur.com/wrHHDZy.png" alt="">
                                </span>
                            </span>
                            <span class="nav-link-text">Hỗ trợ - Báo lỗi</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('api') }}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <img src="https://i.imgur.com/LQxElsd.png" alt="">
                                </span>
                            </span>
                            <span class="nav-link-text">Kết nối API</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('backup') }}">
                            <span class="nav-icon-wrap">
                                <span class="svg-icon">
                                    <img src="https://i.imgur.com/tRKVGH6.png" alt="">
                                </span>
                            </span>
                            <span class="nav-link-text">Khôi phục tài khoản</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
            <div class="menu-gap"></div>
            <div class="menu-group">
                <div class="nav-header">
                    <span>Sản phẩm & dịch vụ</span>
                </div>
                <ul class="navbar-nav flex-column">
                    @foreach ($menu['category'] as $category)
                        <li class="nav-item">
                            <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse"
                                data-bs-target="#category_{{ $category['id'] }}" aria-expanded="false">
                                <span class="nav-icon-wrap">
                                    <span class="svg-icon">
                                        <img src="{!! $category['icon'] !!}" alt="">
                                    </span>
                                </span>
                                <span class="nav-link-text">{{ $category['name'] }}</span>
                            </a>
                            <ul id="category_{{ $category['id'] }}" class="nav flex-column nav-children collapse">
                                @foreach ($category['subcategory'] as $subcategory)
                                    <li class="nav-item">
                                        <a class="nav-link collapsed" href="javascript:void(0);"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#subcategory_{{ $subcategory['id'] }}"
                                            aria-expanded="false">
                                            <span class="nav-link-text">{{ $subcategory['name'] }}</span>
                                        </a>
                                        <ul id="subcategory_{{ $subcategory['id'] }}"
                                            class="nav flex-column nav-children collapse">
                                            @foreach ($subcategory['service'] as $service)
                                                @php
                                                    $slug = Str::slug($service['name'], '-');
                                                @endphp
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                        href="{{ route('service', ['category' => strtolower($category['name']), 'service' => $slug]) }}">
                                                        <span class="nav-link-text">{{ $service['name'] }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

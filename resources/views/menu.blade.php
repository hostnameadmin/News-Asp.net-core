<div class="hk-menu">
    <!-- Brand -->
    <div class="menu-header">
        <span>
            <a class="navbar-brand" href="index.html">
                <img class="brand-img img-fluid" src="https://tuongtacsale.com/wp-content/uploads/2023/10/Chua-co-ten-234-x-59-px-3.png"
                    alt="brand" />
                <img class="brand-img img-fluid" src="https://tuongtacsale.com/wp-content/uploads/2023/10/Chua-co-ten-234-x-59-px-3.png"
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
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-template" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <rect x="4" y="4" width="16" height="4" rx="1" />
                                        <rect x="4" y="12" width="6" height="8" rx="1" />
                                        <line x1="14" y1="12" x2="20" y2="12" />
                                        <line x1="14" y1="16" x2="20" y2="16" />
                                        <line x1="14" y1="20" x2="20" y2="20" />
                                    </svg>
                                </span>
                            </span>
                            <span class="nav-link-text">Trang chủ</span>
                            <span class="badge badge-sm badge-soft-pink ms-auto">Hot</span>
                        </a>
                    </li>
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
                                        {!! $category['icon'] !!}
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

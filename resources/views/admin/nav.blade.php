<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Hệ thống
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin_category') }}" class="nav-link">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                    Danh mục chính
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin_subcategory') }}" class="nav-link">
                <i class="nav-icon fas fa-folder-open"></i>
                <p>
                    Danh mục con
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin_service') }}" class="nav-link">
                <i class="nav-icon fas fa-plug"></i>
                <p>
                    Dịch vụ
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin_server') }}" class="nav-link">
                <i class="nav-icon fas fa-server"></i>
                <p>
                    Máy chủ
                </p>
            </a>

        </li>
        <li class="nav-item">
            <a href="{{ route('admin_smmpanel') }}" class="nav-link">
                <i class="nav-icon fas fa-link"></i>
                <p>
                    Đối tác
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin_user') }}" class="nav-link">
                <i class="nav-icon fas fa-user-check"></i>
                <p>
                    Khách hàng
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin_news') }}" class="nav-link">
                <i class="nav-icon fas fa-bell"></i>
                <p>
                    Thông báo
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin_banking') }}" class="nav-link">
                <i class="nav-icon fas fa-donate"></i>
                <p>
                    Ngân hàng
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin_transaction') }}" class="nav-link">
                <i class="nav-icon fa fa-shopping-bag"></i>
                <p>
                    Lịch sử nạp tiền
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin_order') }}" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                    Đơn hàng
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin_ticket') }}" class="nav-link">
                <i class="nav-icon fas fa-exclamation-triangle"></i>
                <p>
                    Hỗ trợ - khiếu nại
                </p>
            </a>
        </li>
    </ul>
</nav>

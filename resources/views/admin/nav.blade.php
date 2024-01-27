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
            <a href="{{ route('admin_index') }}" class="nav-link" id="index">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Trang chủ
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin_category') }}" class="nav-link" id="category">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                    Danh mục chính
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin_subcategory') }}" class="nav-link" id="subcategory">
                <i class="nav-icon fas fa-folder-open"></i>
                <p>
                    Danh mục con
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin_service') }}" class="nav-link" id="service">
                <i class="nav-icon fas fa-plug"></i>
                <p>
                    Dịch vụ
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin_server') }}" class="nav-link" id="server">
                <i class="nav-icon fas fa-server"></i>
                <p>
                    Server
                </p>
            </a>

        </li>
        <li class="nav-item">
            <a href="{{ route('admin_smmpanel') }}" class="nav-link" id="smmpanel">
                <i class="nav-icon fas fa-link"></i>
                <p>
                    SMM PANEL
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin_smmpanel_activity') }}" class="nav-link" id="smmpanel_activity">
                <i class="nav-icon fas fa-link"></i>
                <p>
                    Nhật ký SMM PANEL
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin_user') }}" class="nav-link" id="user">
                <i class="nav-icon fas fas fa-user-alt"></i>
                <p>
                    Khách hàng
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin_news') }}" class="nav-link" id="news">
                <i class="nav-icon fas fa-bell"></i>
                <p>
                    Thông báo
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin_banking') }}" class="nav-link" id="banking">
                <i class="nav-icon fas fa-landmark"></i>
                <p>
                    Ngân hàng
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin_transaction') }}" class="nav-link" id="transaction">
                <i class="nav-icon fa fa-shopping-bag"></i>
                <p>
                    Lịch sử nạp tiền
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin_order') }}" class="nav-link" id="order">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                    Đơn hàng
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin_history_order') }}" class="nav-link" id="history_order">
                <i class="nav-icon fas fa-user-clock"></i>
                <p>
                    Nhật ký khách hàng
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin_ticket') }}" class="nav-link" id="ticket">
                <i class="nav-icon fas fa-exclamation-triangle"></i>
                <p>
                    Hỗ trợ - khiếu nại
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin_activity_log') }}" class="nav-link" id="activity_log">
                <i class="nav-icon fas fa-database"></i>
                <p>
                    Nhật ký hệ thống
                </p>
            </a>
        </li>
    </ul>
</nav>

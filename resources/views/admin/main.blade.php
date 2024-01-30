<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Quản trị - Tuongtacsales.com') </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('theme/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('theme/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('theme/admin/dist/css/adminlte.min.css') }}">
    <link href="
https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css
" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" rel="stylesheet">

</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png"
                alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="https://tuongtacsale.com/wp-content/uploads/2023/10/Chua-co-ten-234-x-59-px-3.png"
                    alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                @include('admin.nav')
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        @yield('content')
        <!-- Content Wrapper. Contains page content -->

        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->



    <!-- jQuery -->
    <script src="{{ asset('theme/admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('theme/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('theme/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('theme/admin/dist/js/adminlte.js') }}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('theme/admin/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('theme/admin/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('theme/admin/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('theme/admin/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('theme/admin/plugins/chart.js') }}/Chart.min.js')}}"></script>

    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('theme/admin/dist/js/demo.js') }}"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('theme/admin/dist/js/pages/dashboard2.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
    <script>
        $(document).ready(function() {
            $('#note').summernote({
                height: 150,
                minHeight: null,
                maxHeight: null,
                focus: true
            });
            $('#note_cancel').summernote({
                height: 150,
                minHeight: null,
                maxHeight: null,
                focus: true
            });
        });
    </script>
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        function category_change_status(id) {
            var categoryChangeStatusUrl = "{{ route('admin_category_change_status') }}";
            $.ajax({
                type: 'POST',
                url: categoryChangeStatusUrl,
                data: {
                    'id': id
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status == 'success') {
                        toastr['success'](response.message);
                    } else {
                        toastr['error'](response.message);
                    }
                    setTimeout(function() {
                        window.location.href = 'category';
                    }, 2000);
                }
            })
        };

        function smm_change_status(id) {
            var admin_smm_change_status = "{{ route('admin_smm_change_status') }}";
            $.ajax({
                type: 'POST',
                url: admin_smm_change_status,
                data: {
                    'id': id
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status == 'success') {
                        toastr['success'](response.message);
                    } else {
                        toastr['error'](response.message);
                    }
                    setTimeout(function() {
                        window.location.href = 'smmpanel';
                    }, 2000);
                }
            })
        };

        function service_change_status(id) {
            var admin_service_change_status = "{{ route('admin_service_change_status') }}";
            $.ajax({
                type: 'POST',
                url: admin_service_change_status,
                data: {
                    'id': id
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status == 'success') {
                        toastr['success'](response.message);
                    } else {
                        toastr['error'](response.message);
                    }
                    setTimeout(function() {
                        window.location.href = 'service';
                    }, 2000);
                }
            })
        };

        function server_change_status(id) {
            var admin_server_change_status = "{{ route('admin_server_change_status') }}";
            $.ajax({
                type: 'POST',
                url: admin_server_change_status,
                data: {
                    'id': id
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status == 'success') {
                        toastr['success'](response.message);
                    } else {
                        toastr['error'](response.message);
                    }
                    setTimeout(function() {
                        window.location.href = 'server';
                    }, 2000);
                }
            })
        };

        function user_change_status(id) {
            var admin_user_change_status = "{{ route('admin_user_change_status') }}";
            $.ajax({
                type: 'POST',
                url: admin_user_change_status,
                data: {
                    'id': id
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status == 'success') {
                        toastr['success'](response.message);
                    } else {
                        toastr['error'](response.message);
                    }
                    setTimeout(function() {
                        window.location.href = 'user';
                    }, 2000);
                }
            })
        };

        function news_change_status(id) {
            var admin_news_change_status = "{{ route('admin_news_change_status') }}";
            $.ajax({
                type: 'POST',
                url: admin_news_change_status,
                data: {
                    'id': id
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status == 'success') {
                        toastr['success'](response.message);
                    } else {
                        toastr['error'](response.message);
                    }
                    setTimeout(function() {
                        window.location.href = 'news';
                    }, 2000);
                }
            })
        };

        function subcategory_change_status(id) {
            var admin_subcategory_change_status = "{{ route('admin_subcategory_change_status') }}";
            $.ajax({
                type: 'POST',
                url: admin_subcategory_change_status,
                data: {
                    'id': id
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status == 'success') {
                        toastr['success'](response.message);
                    } else {
                        toastr['error'](response.message);
                    }
                    setTimeout(function() {
                        window.location.href = 'subcategory';
                    }, 2000);
                }
            })
        };

        function ticket_change_status(id, status) {
            var admin_ticket_change_status = "{{ route('admin_ticket_change_status') }}";
            $.ajax({
                type: 'POST',
                url: admin_ticket_change_status,
                data: {
                    'id': id,
                    'status': status
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status == 'success') {
                        toastr['success'](response.message);
                    } else {
                        toastr['error'](response.message);
                    }
                    setTimeout(function() {
                        window.location.href = 'ticket';
                    }, 2000);
                }
            })
        };

        function banking_change_status(id) {
            var admin_banking_change_status = "{{ route('admin_banking_change_status') }}";
            $.ajax({
                type: 'POST',
                url: admin_banking_change_status,
                data: {
                    'id': id
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status == 'success') {
                        toastr['success'](response.message);
                    } else {
                        toastr['error'](response.message);
                    }
                    setTimeout(function() {
                        window.location.href = 'banking';
                    }, 2000);
                }
            })
        };

        function order_change_status(id, status) {
            if (confirm("bạn có chắc chắn muốn thực hiện?") == true) {
                var admin_order_change_status = "{{ route('admin_order_change_status') }}";
                $.ajax({
                    type: 'POST',
                    url: admin_order_change_status,
                    data: {
                        'id': id,
                        'status': status
                    },
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            toastr['success'](response.message);
                        } else {
                            toastr['error'](response.message);
                        }
                        setTimeout(function() {
                            window.location.href = 'order';
                        }, 2000);
                    }
                })
            }
        }

        function load(id) {
            var adminGetServicesUrl = "{{ route('admin_get_services') }}";
            $.ajax({
                type: 'POST',
                url: adminGetServicesUrl,
                data: {
                    'id': id
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status == 'success') {
                        toastr['success']('Thành công');
                        var tableHtml = buildTable(id, response.data);
                        $('#load').html(tableHtml);
                    } else {
                        toastr['error'](response.data);
                    }
                },
                error: function() {
                    toastr['error']('Có lỗi xảy ra trong quá trình yêu cầu.');
                }
            });
        }

        function buildTable(id, data) {
            var html = `
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách dịch vụ</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Dịch vụ</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Danh mục</th>
                                        <th>Giá</th>
                                        <th>Tối thiểu</th>
                                        <th>Tối đa</th>
                                    </tr>
                                </thead>
                                <tbody>`;

            data.forEach(function(row) {
                html += `
                            <tr>
                                <td>${row.service}</td>
                                <td>${row.name}</td>
                                <td>${row.type}</td>
                                <td>${row.category}</td>
                                <td>${row.rate}</td>
                                <td>${row.min}</td>
                                <td>${row.max}</td>
                            </tr>`;
            });

            html += `        </tbody>
                            </table>
                        </div>
                    </div>
                </div>`;
            return html;
        }

        function balance(id) {
            var adminGetBalanceUrl = "{{ route('admin_get_balance') }}";
            $.ajax({
                type: 'POST',
                url: adminGetBalanceUrl,
                data: {
                    'id': id
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    if (response.status == 'success') {
                        toastr['success']('Thành công');
                        setTimeout(function() {
                            window.location.href = 'smmpanel';
                        }, 2000);
                    } else {
                        toastr['error'](response.data);
                    }
                },
                error: function() {
                    toastr['error']('Có lỗi xảy ra trong quá trình yêu cầu.');
                }
            });
        }
    </script>
    <script>
        var currentUrl = window.location.href;
        var urlParts = currentUrl.split('/');
        var lastSegment = urlParts[urlParts.length - 1];
        lastSegment = (lastSegment == 'admin' || lastSegment == 'admin/') ? 'index' : urlParts[urlParts.length - 1];
        var element = document.getElementById(lastSegment);
        if (element) {
            element.classList.add('active');
        }
    </script>
</body>

</html>

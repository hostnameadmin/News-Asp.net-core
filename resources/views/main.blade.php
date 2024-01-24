<!DOCTYPE html>
<!--
Jampack
Author: Hencework
Contact: contact@hencework.com
-->
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Home - Tuongtacsales.com')</title>
    <meta name="description"
        content="A modern CRM Dashboard Template with reusable and flexible components for your SaaS web applications by hencework. Based on Bootstrap." />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Daterangepicker CSS -->
    <link href="{{ asset('theme/html/classic/vendors/daterangepicker/daterangepicker.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Data Table CSS -->
    <link href="{{ asset('theme/html/classic/vendors/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ asset('theme/html/classic/vendors/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- CSS -->
    <link href="{{ asset('theme/html/classic/dist/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('theme/html/classic/dist/css/custom.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>
    @yield('content')
</body>

</html>
<!-- jQuery -->
<script src="{{ asset('theme/html/classic/vendors/jquery/dist/jquery.min.js') }}"></script>

<!-- Bootstrap Core JS -->
<script src="{{ asset('theme/html/classic/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

<!-- FeatherIcons JS -->
<script src="{{ asset('theme/html/classic/dist/js/feather.min.js') }}"></script>

<!-- Fancy Dropdown JS -->
<script src="{{ asset('theme/html/classic/dist/js/dropdown-bootstrap-extended.js') }}"></script>

<!-- Simplebar JS -->
<script src="{{ asset('theme/html/classic/vendors/simplebar/dist/simplebar.min.js') }}"></script>

<!-- Data Table JS -->
<script src="{{ asset('theme/html/classic/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('theme/html/classic/vendors/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ asset('theme/html/classic/vendors/datatables.net-select/js/dataTables.select.min.js') }}"></script>

<!-- Daterangepicker JS -->
<script src="{{ asset('theme/html/classic/vendors/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('theme/html/classic/vendors/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('theme/html/classic/dist/js/daterangepicker-data.js') }}"></script>

<!-- Amcharts Maps JS -->
<script src="{{ asset('theme/html/classic/vendors/@amcharts/amcharts4/core.js') }}"></script>
<script src="{{ asset('theme/html/classic/vendors/@amcharts/amcharts4/maps.js') }}"></script>
<script src="{{ asset('theme/html/classic/vendors/@amcharts/amcharts4-geodata/worldLow.js') }}"></script>
<script src="{{ asset('theme/html/classic/vendors/@amcharts/amcharts4-geodata/worldHigh.js') }}"></script>
<script src="{{ asset('theme/html/classic/vendors/@amcharts/amcharts4/themes/animated.js') }}"></script>

<!-- Apex JS -->
<script src="{{ asset('theme/html/classic/vendors/apexcharts/dist/apexcharts.min.js') }}"></script>

<!-- Init JS -->
<script src="{{ asset('theme/html/classic/dist/js/init.js') }}"></script>
<script src="{{ asset('theme/html/classic/dist/js/chips-init.js') }}"></script>
<script src="{{ asset('theme/html/classic/dist/js/dashboard-data.js') }}"></script>
<script src="{{ asset('theme/html/classic/dist/js/custom.js') }}"></script>
<!-- Sweetalert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Sweetalert JS -->
<script src="vendors/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

<script>
    function clickbuy() {
        Swal.fire({
            title: "Bạn có chắc chắn không?",
            text: "Sau khi xác nhận, đơn hàng sẽ được tiến hành!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Có, tiếp tục!',
            cancelButtonText: 'Không, hủy bỏ!',
            showClass: {
                popup: 'animate__animated animate__fadeInDown animate__faster'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp animate__faster'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('order_service').submit();
            }
        });
    }
</script>
<script>
    $("#server").on("change", function() {
        $.ajax({
            url: '{{ route('option') }}',
            type: 'POST',
            contentType: 'application/x-www-form-urlencoded',
            data: {
                server: $('#server').val(),
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                if (data.status == 'success') {
                    $("#comment").html(data.data).show();
                    $("#quantity, #reaction").hide();
                } else {
                    $("#quantity, #reaction").show();
                    $("#comment").hide();
                }
            }
        });
    });

    function bill() {
        let server = $('#server').val();
        if (!server) return;
        let quantity = parseInt($('[name=quantity]').val()) || 0;
        let comments = $('[name=comments]').val();
        if (comments) {
            quantity = countLines(comments);
            $("#total_comment").html(quantity);
        }

        function countLines(text) {
            return text.split("\n").length;
        }
        if (quantity) {
            $.ajax({
                url: '{{ route('price') }}',
                type: 'POST',
                contentType: 'application/x-www-form-urlencoded',
                data: {
                    server: server,
                    quantity: quantity,
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    if (data.total) {
                        $('#total_payment').html(data.total);
                    }
                }
            });
        }
    }

    function coppy(id) {
        var content = document.getElementById(id).innerText;
        navigator.clipboard.writeText(content)
            .then(() => {
                Swal.fire({
                    title: "Thông báo",
                    text: "Coppy nội dung thành công",
                    icon: 'success',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown animate__faster'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp animate__faster'
                    }
                });
            })
            .catch(err => {
                console.error('Lỗi khi sao chép: ', err);
            });

    }
</script>
<script>
    CKEDITOR.replace('content');
</script>

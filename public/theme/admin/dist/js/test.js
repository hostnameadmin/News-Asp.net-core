$(document).ready(function() {

  CKEDITOR.replace('content');

  // var admin_category_change_status = {{ route('admin_category_change_status') }};

  function category_change_status(id) {
      $.ajax({
          type: 'POST',
          url: 123,
          data: {
              'id': id
          },
          dataType: 'json',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response) {
              if (response.status == 'success') {
                  alert(response.message);
              }
          }
      });
  }

  // var adminGetServicesUrl = "{{ route('admin_get_services') }}";

  function load(id) {
      $.ajax({
              type: 'POST',
              url: 123,
              data: {
                  'id': id,
              },
              dataType: 'json',
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }

          ,success: function(response) {
              if (response.status == 'success') {
                  Command: toastr[response.status]('Thành công')

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
                  }
                  var tableHtml = buildTable(id, response.data);
                  $('#load').html(tableHtml);
              }
              else {
                  Command: toastr[response.status](response.data)
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
                  }
              }

          }
  });
  }

  function buildTable(id, data) {
      var html =
          '<div class="card card-primary"><div class ="card-header"><h3 class="card-title"> Danh sách dịch vụ</h3> </div> <div class="card-body"><div class="table-responsive"><table class="table table-striped">';
      html +=
          '<thead><tr><th>Dịch vụ</th><th>Name</th><th>Type</th><th>Danh mục</th><th>Giá</th><th>Tối thiểu</th><th>Tối đa</th></tr></thead>';
      html += '<tbody>';

      data.forEach(function(row) {
          html += '<tr>';
          html += '<td>' + row.service + '</td>';
          html += '<td>' + row.name + '</td>';
          html += '<td>' + row.type + '</td>';
          html += '<td>' + row.category + '</td>';
          html += '<td>' + row.rate + '</td>';
          html += '<td>' + row.min + '</td>';
          html += '<td>' + row.max + '</td>';
      });
      html += '</tbody></table></div></div></div>';

      return html;
  }

  var adminGetBalanceUrl = "{{ route('admin_get_balance') }}";

  function balance(id) {
      $.ajax({
              type: 'POST',
              url: 123,
              data: {
                  'id': id,
              },
              dataType: 'json',
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
          success: function(response) {
              if (response.status == 'success') {
                  Command: toastr[response.status]('Thành công')

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
                  }
                  setTimeout(function() {
                      window.location.href = 'smmpanel';
                  }, 2000);
              }
              else {
                  Command: toastr[response.status](response.data)
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
                  }
              }

          }
  });
}
});

@extends('layouts.admin.app')
@section('content')
<div class="container my-5">
    <div class="row">
        <!-- Thông tin phim -->
        <div class="col-md-4">
            <img src="{{ $film->poster_img }}"
            class="img-fluid rounded"
            alt="Poster phim"
            style="width: 300px; height: auto;">
        </div>

        <!-- Thông tin chi tiết -->
        <div class="col-md-8">
            <h2>Tên phim: <strong>{{ $film->name }}</strong></h2>
            <p>
                <strong>Thể loại:</strong>
                @foreach ($film->category as $category)
                    @if ($loop->index == $film->category->count() - 1)
                        {{ $category->name }}
                    @else
                        {{ $category->name }},
                    @endif
                @endforeach
            </p>
            <p><strong>Số tập:</strong> {{ $film->number_episodes }}</p>
            <p><strong>Quốc gia:</strong> {{ $film->national }}</p>
            <p><strong>Đạo diễn:</strong> {{ $film->director }}</p>
            <p><strong>Mô tả:</strong> {{ $film->description }}</p>

            <!-- Diễn viên -->
            <h4>Diễn viên chính:</h4>
            <ul>
                <li>{{ $film->performer }}</li>
            </ul>

            {{-- <!-- Đánh giá phim -->
            <div class="mt-4">
                <h5>Đánh giá:</h5>
                <div class="d-flex align-items-center">
                    <span class="mr-2">⭐⭐⭐⭐☆</span> <!-- 4/5 stars -->
                    <span>4/5</span>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
@section('custom_js')
<!-- Datatables -->
<script src="{{ asset('assets/admin/js/plugin/datatables/datatables.min.js') }}"></script>
<script>
    $(document).ready(function () {
      $("#basic-datatables").DataTable({});

      $("#multi-filter-select").DataTable({
        pageLength: 5,
        initComplete: function () {
          this.api()
            .columns()
            .every(function () {
              var column = this;
              var select = $(
                '<select class="form-select"><option value=""></option></select>'
              )
                .appendTo($(column.footer()).empty())
                .on("change", function () {
                  var val = $.fn.dataTable.util.escapeRegex($(this).val());

                  column
                    .search(val ? "^" + val + "$" : "", true, false)
                    .draw();
                });

              column
                .data()
                .unique()
                .sort()
                .each(function (d, j) {
                  select.append(
                    '<option value="' + d + '">' + d + "</option>"
                  );
                });
            });
        },
      });

      // Add Row
      $("#add-row").DataTable({
        pageLength: 5,
      });

      var action =
        '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

      $("#addRowButton").click(function () {
        $("#add-row")
          .dataTable()
          .fnAddData([
            $("#addName").val(),
            $("#addPosition").val(),
            $("#addOffice").val(),
            action,
          ]);
        $("#addRowModal").modal("hide");
      });
    });


    function deleteRecord(id) {
    Swal.fire({
        title: 'Xác nhận xoá?',
        text: "Bạn có chắc chắn muốn xoá bản ghi này không?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Xoá',
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            // Thay thế URL bên dưới bằng URL mà bạn muốn gửi yêu cầu xoá
            const deleteUrl = route('admin.users.destroy',id);

            fetch(deleteUrl, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF token nếu cần
                }
            })
            .then(response => {
                if (response.ok) {
                    // Xử lý thành công
                    window.location.reload(); // Hoặc cập nhật giao diện
                } else {
                    Swal.fire('Có lỗi xảy ra khi xoá.', '', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire('Có lỗi xảy ra khi xoá.', '', 'error');
            });
        }
    });
}
  </script>
@endsection

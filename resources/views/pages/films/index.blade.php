@extends('layouts.admin.app')
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title">User Manager</h4>
                <button type="button" class="btn btn-success m-2">
                  <a class="text-white" href="{{ route('admin.films.create') }}">Create</a>
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="basic-datatables" class="display table table-striped table-hover dataTable"
                                    role="grid" aria-describedby="basic-datatables_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 242.312px;">Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 187.375px;">National</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Office: activate to sort column ascending"
                                                style="width: 187.375px;">Performer</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Age: activate to sort column ascending"
                                                style="width: 84.3125px;">Director</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Start date: activate to sort column ascending"
                                                style="width: 183.922px;">Number Episode</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 156.047px;">Created At</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 156.047px;">Updated At</th>
                                            <th class="sorting" tabindex="0" aria-controls="basic-datatables"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 500.031px;">Custom</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($films as $film )
                                            <tr role="row" class="@if ($loop->index % 2 == 0) even @else odd @endif" >
                                                <td class="sorting_1">{{ $film->name }}</td>
                                                <td>{{ $film->national }}</td>
                                                <td>{{ $film->performer }}</td>
                                                <td>{{ $film->director }}</td>
                                                <td>{{ $film->number_episodes }}</td>
                                                <td>{{ $film->created_at }}</td>
                                                <td>{{ $film->updated_at }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('admin.films.show',$film->id  ) }}" class="btn btn-outline-secondary">Detail</a>
                                                    @include('pages.films.edit')
                                                    <!-- Nút Xoá với ID -->
                                                    <form action="" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline-danger" onclick="confirm('Bạn chắc chắn muốn xoá ?')">Xoá</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
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

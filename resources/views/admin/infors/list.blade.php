@extends('layouts.admin_app')
@section('title')
Service Management
@endsection
@push('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="{{ asset('admin_assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('admin_assets') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endpush
@push('content_header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ trans('global.list') }} {{ trans('menu.infos') }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                    <li class="breadcrumb-item active">info</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endpush

@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="float-left">{{ trans('global.list') }} {{ trans('menu.infos') }}</h3>

        <a class="btn btn-primary float-right" href="{{ route('info.create') }}">
            <i class="fas fa-plus"></i> {{ trans('global.new') }}
        </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="data_table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Working</th>
                    <th>Map</th>
                    <th>Facebook</th>
                    <th>Twitter</th>
                    <th>Youtube</th>
                    <th>Linkedin</th>
                    <th>Instagram</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($info as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>
                        <?php echo $row->name ?>
                    </td>
                    <td>{{ $row->address }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->phone }}</td>
                    <td>{{ $row->working }}</td>
                    <td>{{ $row->map }}</td>
                    <td>{{ $row->facebook }}</td>
                    <td>{{ $row->twitter }}</td>
                    <td>{{ $row->youtube }}</td>
                    <td>{{ $row->linkedin }}</td>
                    <td>{{ $row->instagram }}</td>
                    
                    <td>
                        <img class="info-box-icon" height="32" src="{{ url('storage/infor/'.$row->photo) }}"
                        alt="{{ $row->photo }}">
                    </td>
                    <td class="align-middle">
                        <form action="{{route('info.destroy',$row->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" show_confirm data-toggle="tooltip"
                                title='Delete'><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Working</th>
                    <th>Map</th>
                    <th>Facebook</th>
                    <th>Twitter</th>
                    <th>Youtube</th>
                    <th>Linkedin</th>
                    <th>Instagram</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>


@endsection


@push('scripts')
<!-- DataTables  & Plugins -->
<script src="{{ asset('admin_assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('admin_assets') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script>
    $(function () {
        $("#data_table").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#data_table_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });


        });
</script>

<script type="text/javascript">
    $('.show_confirm').click(function(event) {
         var form =  $(this).closest("form");
         var name = $(this).data("name");
         event.preventDefault();
         swal({
             title: `Are you sure you want to delete this record?`,
             text: "If you delete this, it will be gone forever.",
             icon: "warning",
             buttons: true,
             dangerMode: true,
         })
         .then((willDelete) => {
           if (willDelete) {
             form.submit();
           }
         });
     });
 
</script>
@endpush
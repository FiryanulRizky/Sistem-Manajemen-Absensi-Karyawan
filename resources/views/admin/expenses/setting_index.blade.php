@extends('layouts.app')        

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Setting Lembur</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">Admin Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Setting Lembur
                        </li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <!-- general form elements -->
                    @include('messages.alerts')
                    @error('status')
                        <div class="alert alert-danger">
                            Pilih Status Validasi
                        </div>
                    @enderror
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Setting Lembur</h3>
                        </div>
                        <div class="card-body">
                            @if ($departments->count())
                            <table class="table table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Department</th>
                                        <th>Jam Batas Mulai Lembur</th>
                                        <th>Jam Batas Selesai Lembur</th>
                                        <th>Upah Lembur per Jam</th>
                                        <td class="none">Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($departments as $index => $department)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $department->name }}</td>
                                        <td>{{ $department->overtime_start }}</td>
                                        <td>{{ $department->overtime_end }}</td>
                                        <td>{{ $department->overtime_cost }}</td>
                                        <td>
                                            <a href="{{ route('admin.expenses.setting_edit', $department->id) }}" class="btn btn-flat btn-warning">Edit</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <div class="alert alert-info text-center" style="width:50%; margin: 0 auto">
                                <h4>Tidak Ada Data</h4>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection

@section('extra-js')

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
    $('.popover-dismiss').popover({
        trigger: 'focus'
    });
    $('#dataTable').DataTable({
        responsive:true,
        autoWidth: false,
        columnDefs: [
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: 1 },
            { responsivePriority: 200000000000, targets: -1 }
        ],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'collection',
                text: 'Export',
                buttons: ['copy','excel', 'csv', 'pdf']
            }
        ]
    });
    $('[data-toggle="tooltip"]').tooltip({
        trigger: 'hover'
    });
});
</script>
@endsection
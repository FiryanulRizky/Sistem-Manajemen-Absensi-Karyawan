@extends('layouts.app')        

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Daftar Lembur</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">Admin Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Daftar Lembur
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
                            <h3 class="card-title">Daftar Lembur</h3>
                        </div>
                        <div class="card-body">
                            @if ($expenses->count())
                            <table class="table table-hover" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Diajukan pada</th>
                                        <th>Judul Tugas</th>
                                        <th>Status</th>
                                        <th>Estimasi Upah Lembur</th>
                                        <th class="none">Deskripsi</th>
                                        <th class="none">Bukti Absen Lembur</th>
                                        <th class="none">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($expenses as $index => $expense)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ Carbon\Carbon::parse($expense->created_at)->format('d-m-Y') }}</td>
                                        <td>{{ $expense->reason }}</td>
                                        <td>
                                            <h5>
                                                <span 
                                                @if ($expense->status == 'pending')
                                                    class="badge badge-pill badge-warning"
                                                @elseif($expense->status == 'ditolak')
                                                    class="badge badge-pill badge-danger"
                                                @elseif($expense->status == 'diterima')
                                                    class="badge badge-pill badge-success"
                                                @endif
                                                >
                                                    {{ ucfirst($expense->status) }}
                                                </span> 
                                            </h5>
                                        </td>
                                        <td>{{ $expense->amount }}</td>
                                        <td>{{ $expense->description }}</td>
                                        <td>
                                            @if ($expense->receipt)
                                            <button type="button" class="btn btn-flat btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{ $index + 1 }}">
                                                Lihat Bukti Absen Lembur
                                            </button>  
                                            @else
                                            Belum Ada File Upload
                                            @endif
                                        </td>
                                        <td>
                                            <button 
                                            class="btn btn-flat btn-info"
                                            data-toggle="modal"
                                            data-target="#deleteModalCenter{{ $index + 1 }}"
                                            >
                                            Ubah Status
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @for ($i = 1; $i < $expenses->count()+1; $i++)
                                <!-- Modal -->
                                @if ($expenses->get($i-1)->receipt )
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle1{{ $i }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <img src="/storage/receipts/{{ $expenses->get($i-1)->receipt }}" class="img-fluid" alt="Receipt Image" style="width: auto; height:100%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.modal -->
                                @endif
                                <div class="modal fade" id="deleteModalCenter{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle1{{ $i }}" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="card card-info">
                                                <div class="card-header">
                                                    <h5 style="text-align: center !important">Update Status Lembur</h5>
                                                </div>
                                                <form 
                                                    action="{{ route('admin.expenses.update', $expenses->get($i-1)->id) }}"
                                                    method="POST"
                                                >
                                                <div class="card-body">
                                                    @csrf
                                                    @method('PUT')
                                                        <div class="form-group text-center">
                                                            <label for="">Pilih status</label>
                                                            <select name="status" class="form-control text-center mx-auto" style="width:50%">
                                                                <option hidden disabled selected value> ---- </option>
                                                                <option value="pending">Pending</option>
                                                                <option value="diterima">Diterima</option>
                                                                <option value="ditolak">Ditolak</option>
                                                            </select>
                                                        </div>
                                                        
                                                </div>
                                                <div class="card-footer text-center">
                                                    <button type="submit" class="btn flat btn-info">Update</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal -->
                            @endfor
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
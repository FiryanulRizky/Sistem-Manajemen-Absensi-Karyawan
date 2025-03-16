@extends('layouts.app')        

@section('content')
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Absensi</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.index') }}">Dashboard Admin</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Absensi
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
            <div class="col-md-4 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="text-center">Tanggal Absensi</h5>
                    </div>
                    <form action="{{ route('admin.employees.attendance') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="input-group mx-auto" style="width:70%">
                            <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            <input type="text" name="date" id="date" class="form-control text-center" >
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-flat btn-primary" type="submit">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                @include('messages.alerts')
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title text-center">
                            @if ($date)
                            Absensi Karyawan berdasarkan rentang tanggal {{ $date }}                                
                            @else
                            Absensi Karyawan Hari ini
                            @endif
                        </div>
                        
                    </div>
                    <div class="card-body">
                        @if ($employees->count())
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Riwayat Database</th>
                                    <th class="none">Riwayat Awal Absensi</th>
                                    <th>Riwayat Absensi</th>
                                    <th class="none">Riwayat Akhir Absensi</th>
                                    <th>Lokasi</th>
                                    <th>Jabatan</th>
                                    <th class="none">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $index => $employee)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $employee->first_name.' '.$employee->last_name }}</td>
                                    @if($employee->attendanceToday)
                                        <td><h6 class="text-center"><span class="badge badge-pill badge-success">Terekam</span></h6></td>
                                        <td>
                                            Terekam sejak {{ Carbon\Carbon::parse($employee->attendanceToday->created_at)->format('H:i:s') }} dari {{ $employee->attendanceToday->entry_location}} dengan alamat IP {{ $employee->attendanceToday->entry_ip}}
                                        </td>
                                        @if($employee->attendanceToday->time<=9 && $employee->attendanceToday->time>=7)
                                            <td><h6 class="text-center"><span class="badge badge-pill badge-success">Hadir Tepat Waktu</span></h6></td>
                                        @elseif ($employee->attendanceToday->time>9 && $employee->attendanceToday->time<=17)
                                            <td><h6 class="text-center"><span class="badge badge-pill badge-warning">Hadir Terlambat</span></h6></td>
                                        @else
                                           ?><td><h6 class="text-center"><span class="badge badge-pill badge-danger">Absensi Tidak Valid</span></h6></td>
                                        @endif

                                        @if(!empty($employee->attendanceToday->exit_location))
                                            <td>
                                                Terekam sejak {{ Carbon\Carbon::parse($employee->attendanceToday->updated_at)->format('H:i:s') }} dari {{ $employee->attendanceToday->exit_location}} dengan alamat IP {{ $employee->attendanceToday->exit_ip}}
                                            </td>
                                        @else
                                            <td>
                                                <h6 class="text-center"><span class="badge badge-pill badge-danger">Belum Ada Riwayat</span></h6></td>
                                            </td>
                                        @endif
                                    @else
                                        <td><h6 class="text-center"><span class="badge badge-pill badge-danger">Belum Ada Riwayat</span></h6></td>
                                        <td><h6 class="text-center"><span class="badge badge-pill badge-danger">Belum Ada Riwayat</span></h6></td>
                                        <td><h6 class="text-center"><span class="badge badge-pill badge-danger">Belum Ada Riwayat</span></h6></td>
                                        <td><h6 class="text-center"><span class="badge badge-pill badge-danger">Belum Ada Riwayat</span></h6></td>
                                    @endif
                                    <td>{{ $employee->attendanceToday->entry_location ?? '-' }}</td>
                                    <td>{{ $employee->desg }}</td>
                                    <td>
                                        @if($employee->attendanceToday)
                                        <button 
                                        class="btn btn-flat btn-danger"
                                        data-toggle="modal"
                                        data-target="#deleteModalCenter{{ $employee->attendanceToday->id }}"
                                        >Hapus Riwayat</button>
                                        @else 
                                        Aksi Tidak Tersedia
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @for ($i = 1; $i < $employees->count()+1; $i++)
                                <!-- Modal -->
                                @if($employees->get($i-1)->attendanceToday)
                                <div class="modal fade" id="deleteModalCenter{{ $employees->get($i-1)->attendanceToday->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle1{{ $employees->get($i-1)->attendanceToday->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="card card-danger">
                                                <div class="card-header">
                                                    <h5 style="text-align: center !important">Yakin ingin dihapus?</h5>
                                                </div>
                                                <div class="card-body text-center d-flex" style="justify-content: center">
                                                    
                                                    <button type="button" class="btn flat btn-secondary" data-dismiss="modal">Tidak</button>
                                                    
                                                    <form 
                                                    action="{{ route('admin.employees.attendance.delete', $employees->get($i-1)->attendanceToday->id) }}"
                                                    method="POST"
                                                    >
                                                    @csrf
                                                    @method('DELETE')
                                                        <button type="submit" class="btn flat btn-danger ml-1">Ya</button>
                                                    </form>
                                                </div>
                                                <div class="card-footer text-center">
                                                    <small>Aksi tidak tersedia</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.modal -->
                                @endif
                            @endfor
                        @else
                        <div class="alert alert-info text-center" style="width:50%; margin: 0 auto">
                            <h4>Belum Ada Riwayat</h4>
                        </div>
                        @endif
                        
                    </div>
                </div>
                <!-- general form elements -->
                
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
    <!-- /.content -->

@endsection
@section('extra-js')

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            responsive:true,
            autoWidth: false,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'collection',
                    text: 'Export',
                    buttons: ['copy','excel', 'csv', 'pdf'],
                }
            ]
        });
        $('#date').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "locale": {
                "format": "DD-MM-YYYY"
            }
        });
    });
</script>
@endsection
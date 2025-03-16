@extends('layouts.app')        

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Profile</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Profile
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
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="text-center mt-2">Profil Saya</h5>
                    </div>
                    <div class="card-body">
                        @include('messages.alerts')
                        <div class="row mb-3">
                            <div class="col text-center mx-auto">
                                <img src="/storage/employee_photos/{{ $employee->photo }}" class="rounded-circle img-fluid" alt=""
                                style="box-shadow: 2px 4px rgba(0,0,0,0.1)"
                                >
                            </div>
                        </div>
                        <table class="table profile-table table-hover">
                            <tr>
                                <td>Nama Awal</td>
                                <td>{{ $employee->first_name }}</td>
                            </tr>
                            <tr>
                                <td>Nama Akhir</td>
                                <td>{{ $employee->last_name }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>{{ Carbon\Carbon::parse($employee->dob)->format('d M, Y') }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>{{ $employee->sex }}</td>
                            </tr>
                            
                            <tr>
                                <td>Tanggal Bergabung</td>
                                <td>{{ Carbon\Carbon::parse($employee->join_date)->format('d M, Y') }}</td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td>{{ $employee->desg }}</td>
                            </tr>
                            <tr>
                                <td>Department</td>
                                <td>{{ $employee->department->name }}</td>
                            </tr>
                            <tr>
                                <td>Gaji</td>
                                <td>Rp. {{ $employee->salary }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('employee.profile-edit', $employee->id) }}" class="btn btn-flat btn-primary">Edit Profil</a>
                        <a href="{{ route('employee.reset-password') }}" class="btn btn-danger btn-danger">Ganti Password</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- /.content-wrapper -->

@endsection

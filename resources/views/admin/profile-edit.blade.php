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
            <div class="col-lg-6 col-md-8 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="text-center mt-2">Profil Saya</h5>
                    </div>
                    <form action="{{ route('admin.profile-update', Auth::user()->employee->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="card-body">
                        
                            <fieldset>
                                <div class="form-group">
                                    <label for="">Nama Awal</label>
                                    <input type="text" name="first_name" value="{{ $admin->first_name }}" class="form-control">
                                    @error('first_name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Akhir</label>
                                    <input type="text" name="last_name" value="{{ $admin->last_name }}" class="form-control">
                                    @error('last_name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="dob">Tanggal Lahir</label>
                                    <input type="text" name="dob" id="dob" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="gender" class="form-control">
                                        @if ($admin->sex == 'Male')
                                            <option value="Male" selected>Laki-Laki</option>
                                            <option value="Female">Perempuan</option>
                                        @else
                                            <option value="Male">Laki-Laki</option>
                                            <option value="Female" selected>Perempuan</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="join_date">Tanggal Bergabung</label>
                                    <input type="text" name="join_date" id="join_date" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Jabatan</label>
                                        <select name="desg" class="form-control">
                                            @foreach ($desgs as $desg)
                                                <option value="{{ $desg }}"
                                                @if ($desg == $admin->desg)
                                                    selected
                                                @endif
                                                >
                                                    {{ $desg }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Department</label>
                                        <select name="department_id" class="form-control">
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}"
                                                @if ($department->id == $admin->department_id)
                                                    selected
                                                @endif
                                                >
                                                    {{ $department->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Photo</label>
                                    <input type="file" name="photo" class="form-control-file">
                                    @error('photo')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                            </fieldset>
                            
                        
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-flat btn-primary" style="width: 40%; font-size:1.3rem">Simpan</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- /.content-wrapper -->

@endsection

@section('extra-js')
<script>
    $().ready(function() {
        dob = new Date('{{ $admin->dob }}');
        joinDate = new Date('{{ $admin->join_date }}');
        $('#dob').daterangepicker({
            "singleDatePicker": true,
            "startDate": dob,
            "locale": {
                "format": "DD-MM-YYYY"
            }
        });
        $('#join_date').daterangepicker({
            "singleDatePicker": true,
            "startDate": joinDate,
            "locale": {
                "format": "DD-MM-YYYY"
            }
        });
    });
</script>
@endsection
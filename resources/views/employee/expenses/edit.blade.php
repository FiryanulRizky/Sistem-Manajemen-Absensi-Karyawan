@extends('layouts.app')        

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Klaim Lembur</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('employee.index') }}">Dashboard Karyawan</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Edit Klaim Lembur
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
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                Edit Klaim Lembur
                            </h3>
                        </div>
                        @include('messages.alerts')
                        <form 
                        action="{{ route('employee.expenses.update', $expense->id) }}" 
                        method="POST" 
                        enctype="multipart/form-data"
                        >
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Judul Tugas</label>
                                    <input type="text" name="reason" value="{{ $expense->reason }}" class="form-control">
                                    @error('reason')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Alasan</label>
                                    <textarea name="description" class="form-control">{{ $expense->description }}</textarea>
                                    @error('description')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Estimasi Total Upah Lembur</label>
                                    <input disabled type="text" name="amount2" value="{{ $expense->amount }}" class="form-control">
                                    <input type="text" name="amount" value="{{ $expense->amount }}" style="display:none">
                                    @error('amount')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Re-upload Bukti Absensi</label>
                                    <select name="new_image" class="form-control" id="" onchange="showInput()">
                                        <option value="tidak" selected>Tidak</option>
                                        <option value="ya">Ya</option>
                                    </select>
                                </div>
                                <div class="form-group hide-input" id="file">
                                    <label for="">Bukti Absensi</label>
                                    <input type="file" name="receipt" class="form-control-file">
                                    @error('receipt')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit">Ajukan</button>
                            </div>
                        </form>
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
    function showInput() {
        $('#file').toggleClass('hide-input')
    }
</script>
@endsection
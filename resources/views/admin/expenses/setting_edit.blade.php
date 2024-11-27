@extends('layouts.app')        

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Setting Lembur</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.index') }}">Dashboard Admin</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Edit Setting Lembur
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
                                Edit Setting Lembur
                            </h3>
                        </div>
                        @include('messages.alerts')
                        <form action="{{ route('admin.expenses.setting_update', $department->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Nama Department</label>
                                    <input type="text" name="name" value="{{ $department->name }}" class="form-control">
                                    @error('name')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Batas Awal Waktu Lembur</label>
                                    <input type="time" name="overtime_start" value="{{ $department->overtime_start }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Batas Akhir Waktu Lembur</label>
                                    <input type="time" name="overtime_end" value="{{ $department->overtime_end }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="">Upah Lembur Per Jam</label>
                                    <input type="text" name="overtime_cost" value="{{ $department->overtime_cost }}" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit">Submit</button>
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

{{-- @section('extra-js')

<script>
    $(document).ready(function() {
        if('{{ $department->overtime_end }}') {
            $('#date1').daterangepicker({
                "showDropdowns": true,
                "singleDatePicker": true,
                "locale": {
                    "format": "DD-MM-YYYY",
                }
            });
            $('#single-date').addClass('hide-input');
            start = moment('{{ $department->overtime_start }}', 'YYYY-MM-DD');
            end = moment('{{ $department->overtime_end }}', 'YYYY-MM-DD');
            $('#date2').daterangepicker({
                "startDate": start,
                "endDate": end,
                "showDropdowns": true,
                "locale": {
                    "format": "DD-MM-YYYY",
                }
            });
        } else {
            start = moment('{{ $department->overtime_start }}', 'YYYY-MM-DD');
            $('#date1').daterangepicker({
                "startDate": start,
                "showDropdowns": true,
                "singleDatePicker": true,
                "locale": {
                    "format": "DD-MM-YYYY",
                }
            });
            $('#date2').daterangepicker({
                "showDropdowns": true,
                "locale": {
                    "format": "DD-MM-YYYY",
                }
            });
            $('#multiple-date').addClass('hide-input');
        }
    });
</script>
@endsection --}}
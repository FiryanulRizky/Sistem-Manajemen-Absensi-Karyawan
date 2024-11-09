@extends('layouts.app')        

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Aju</h1> Cuti
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('employee.index') }}">Dashboard Karyawan</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Edit Aju Cuti
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
                                Edit Aju Cuti
                            </h3>
                        </div>
                        @include('messages.alerts')
                        <form action="{{ route('employee.leaves.update', $leave->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Alasan</label>
                                    <input type="text" name="reason" value="{{ $leave->reason }}" class="form-control">
                                    @error('reason')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <textarea name="description" class="form-control" >{{ $leave->description }}</textarea>
                                    @error('description')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                @if ($leave->end_date)
                                    <div class="form-group">
                                        <label>Lebih dari satu hari ?</label>
                                        <select class="form-control" name="multiple-days" onchange="showDate()">
                                            <option value="ya" selected>Ya</option>
                                            <option value="tidak">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="form-group hide-input" id="half-day">
                                        <label>Setengah Hari Kerja</label>
                                        <select class="form-control" name="half-day">
                                            <option value="tidak">Tidak</option>
                                            <option value="ya">Ya</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="range-group">
                                        <label for="">Rentang Tanggal: </label>
                                        <input type="text" name="date_range" id="date_range" class="form-control">
                                        @error('date_range')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group hide-input" id="date-group">
                                        <label for="">Seleksi Tanggal </label>
                                        <input type="text" name="date" id="date" class="form-control">
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label>Multiple Days</label>
                                        <select class="form-control" name="multiple-days" onchange="showDate()">
                                            <option value="ya" >Ya</option>
                                            <option value="tidak" selected>Tidak</option>
                                        </select>
                                    </div>
                                    <div class="form-group" id="half-day">
                                        <label>Setengah Hari Kerja</label>
                                        <select class="form-control" name="half-day">
                                            @if ($leave->half_day == "no")
                                                <option value="tidak" selected>Tidak</option>
                                                <option value="ya">Ya</option>    
                                            @else
                                            <option value="tidak" >Tidak</option>
                                            <option value="ya" selected>Ya</option>    
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group hide-input" id="range-group">
                                        <label for="">Rentang Tanggal: </label>
                                        <input type="text" name="date_range" id="date_range" class="form-control">
                                        @error('date_range')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group" id="date-group">
                                        <label for="">Seleksi Data </label>
                                        <input type="text" name="date" id="date" class="form-control">
                                    </div>
                                @endif
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
    $(document).ready(function() {
        startDate = moment('{{ $leave->start_date }}');
        if('{{ $leave->end_date }}') {
            endDate = new Date('{{ $leave->end_date }}');
            $('#date_range').daterangepicker({
                "startDate": startDate,
                "endDate": endDate,
                "locale": {
                    "format": "DD-MM-YYYY",
                }
            });

            $('#date').daterangepicker({
                "singleDatePicker": true,
                "locale": {
                    "format": "DD-MM-YYYY",
                }
            });
        } else {
            $('#date_range').daterangepicker({
                "locale": {
                    "format": "DD-MM-YYYY",
                }
            });
            $('#date').daterangepicker({
                "startDate": startDate,
                "singleDatePicker": true,
                "locale": {
                    "format": "DD-MM-YYYY",
                }
            });
        }
        
        
        
        
    });
    function showDate() {
        $('#range-group').toggleClass('hide-input');
        $('#date-group').toggleClass('hide-input');
        $('#half-day').toggleClass('hide-input');
    }
</script>
@endsection
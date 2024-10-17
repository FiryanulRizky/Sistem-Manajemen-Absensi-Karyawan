@extends('layouts.app')        

@section('content')

<!-- Main content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 mx-auto">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="text-center mt-2">Register Admin</h5>
                    </div>
                    @include('messages.alerts')
                   <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                    <div class="card-body">
                        
                            <fieldset>
                                <div class="form-group">
                                    <label for="">Nama Awal</label>
                                    <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control">
                                    @error('first_name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Akhir</label>
                                    <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control">
                                    @error('last_name')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" value="{{ old('email') }}" class="form-control">
                                    @error('email')
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
                                    <select name="sex" class="form-control">
                                        <option hidden disabled selected value> -- Pilih Opsi -- </option>
                                        @if (old('sex') == 'Male')
                                        <option value="Male" selected>Laki-Laki</option>
                                        <option value="Female">Female</option>
                                        @elseif (old('sex') == 'Female')
                                        <option value="Male">Perempuan</option>
                                        <option value="Female" selected>Perempuan</option>
                                        @else
                                        <option value="Male">Laki-Laki</option>
                                        <option value="Female">Perempuan</option>
                                        @endif
                                    </select>
                                    @error('sex')
                                        <div class="text-danger">
                                            Please select an valid option
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="join_date">Tanggal Bergabung</label>
                                    <input type="text" name="join_date" id="join_date" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Jabatan</label>
                                        <select name="desg" class="form-control">
                                            <option hidden disabled selected value> -- Pilih Opsi -- </option>
                                                <option value="Manajer">Manajer
                                                </option><option value="Asisten Manajer">Asisten Manajer
                                                </option><option value="Kepala Divisi">Kepala Divisi
                                                </option><option value="Staff">Staff
                                                </option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Department</label>
                                        <select name="department_id" class="form-control">
                                            <option hidden disabled selected value> -- Pilih Opsi -- </option>
                                            <?php $conn = mysqli_connect("localhost","root","","absensi"); 
                                            $dt=mysqli_query($conn,"SELECT * FROM departments");
                                            while($dt2=mysqli_fetch_array($dt)) { echo"<option value=".$dt2['id'].">".$dt2['name']."
                                                </option>"; }?>
                                        </select>                     
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Gaji</label>
                                    <input type="text" name="salary" value="{{ old('salary') }}" class="form-control">
                                    @error('salary')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <input type="file" name="photo" class="form-control-file">
                                    @error('photo')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" value="{{ old('password') }}" class="form-control">
                                    @error('password')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control">
                                    @error('password_confirmation')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </fieldset>
                            
                        
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-flat btn-primary" style="width: 40%; font-size:1.3rem">Tambah</button>
                        <a href="{{ route('login') }}"><button type="button" class="btn btn-flat btn-primary" style="width: 40%; background: orange;font-size:1.3rem">Batal</button></a>
                    </div>
                </form>
                </div>
            </div>
        </div>
        
    </div>
    <!-- /.container-fluid -->
<!-- /.content -->

<!-- /.content-wrapper -->

@endsection

@section('extra-js')
<script>
    $().ready(function() {
        if('{{ old('dob') }}') {
            const dob = moment('{{ old('dob') }}', 'DD-MM-YYYY');
            const join_date = moment('{{ old('join_date') }}', 'DD-MM-YYYY');
            console.log('{{ old('dob') }}')
            $('#dob').daterangepicker({
                "startDate": dob,
                "singleDatePicker": true,
                "showDropdowns": true,
                "locale": {
                    "format": "DD-MM-YYYY"
                }
            });
            $('#join_date').daterangepicker({
                "startDate": join_date,
                "singleDatePicker": true,
                "showDropdowns": true,
                "locale": {
                    "format": "DD-MM-YYYY"
                }
            });
        } else {
            $('#dob').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                "locale": {
                    "format": "DD-MM-YYYY"
                }
            });
            $('#join_date').daterangepicker({
                "singleDatePicker": true,
                "showDropdowns": true,
                "locale": {
                    "format": "DD-MM-YYYY"
                }
            });
        }
        
    });
</script>
@endsection
@extends('layouts.app')        

@section('content')
<!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard Admin</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Halaman Utama</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Dashboard Admin
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
        <row class="">
        <div class="col-md-8 mx-auto">
            <div class="jumbotron">
            <h1 class="display-4 text-primary">Selamat Datang di Panel Admin Website Absensi</h1>
            <p class="lead">Solusi Absensi Digital</p>
            <hr class="my-4">
            <p>Copyright &copy; <?php echo date('Y') ?>
                <a href="http://jemari-edu.web.id">Jemari Edu</a></p>
            </div>
        </div>
        </row>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- /.content-wrapper -->

@endsection

@extends('layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Slip Gaji</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Slip Gaji
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Catatan:</h5>
                    Halaman ini sudah disempurnakan untuk pencetakan.
                    Klik tombol cetak di bagian bawah halaman slip gaji.
                </div>

                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i>
                                Slip Gaji Karyawan
                                <small class="float-right"
                                    >Date: {{ date('d F Y') }}</small
                                >
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>HRGA Department</strong>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong>{{ $employee->first_name." ".$employee->last_name }}</strong><br />
                                {{ $employee->desg." ".$departments->name }}<br />
                                {{ $users->email }}
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Invoice #007612</b><br />
                            <br />
                            <b>Order ID:</b> 4F3S8J<br />
                            <b>Gaji Terakhir :</b> {{ date('t F Y',strtotime("-1 month",strtotime(date('d F Y')))) }}<br />
                            <b>Account:</b> 968-34567
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Gaji Bersih</th>
                                        <th>Lembur</th>
                                        <th>Pajak (PPH 23)</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $employee->salary }}</td>
                                        <td>{{ $expenses->amount ?? 0 }}</td>
                                        <td>{{ 2*($employee->salary+($expenses->amount ?? 0))/100 }}</td>
                                        <td>{{ $employee->salary+($expenses->amount ?? 0)-(2*($employee->salary+($expenses->amount ?? 0))/100) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                            <p class="lead">Dibayarkan Melalui :</p>
                            <img
                                src="/dist/img/credit/visa.png"
                                alt="Visa"
                            />
                            <img
                                src="/dist/img/credit/mastercard.png"
                                alt="Mastercard"
                            />
                            <img
                                src="/dist/img/credit/atmbersama.png"
                                alt="ATM-Bersama"
                                width="51"
                                height="32"
                            />
                            <img
                                src="/dist/img/credit/paypal2.png"
                                alt="Paypal"
                            />

                            <p
                                class="text-muted well well-sm shadow-none"
                                style="margin-top: 10px;"
                            >
                                Gaji Dibayarkan tiap Akhir Bulan Sesuai dengan Kebijakan Perusahaan
                            </p>
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <p class="lead">
                                Dibayarkan Pada {{ date('t F Y',strtotime("-1 month",strtotime(date('d F Y')))) }}
                            </p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">
                                            Gaji Bersih
                                        </th>
                                        <td>{{ $employee->salary }}</td>
                                    </tr>
                                    <tr>
                                        <th>Lembur</th>
                                        <td>{{ $expenses->amount ?? 0 }}</td>
                                    </tr>
                                    <tr>
                                        <th>PPH (23)</th>
                                        <td>{{ 2*($employee->salary+($expenses->amount ?? 0))/100 }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>{{ $employee->salary+($expenses->amount ?? 0)-(2*($employee->salary+($expenses->amount ?? 0))/100) }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <a
                                href="{{ route('employee.self.salary_slip_print') }}"
                                target="_blank"
                                class="btn btn-default"
                                ><i class="fas fa-print"></i>
                                Print</a
                            >
                            {{-- <button
                                type="button"
                                class="btn btn-success float-right"
                            >
                                <i
                                    class="far fa-credit-card"
                                ></i>
                                Submit Payment
                            </button>
                            <button
                                type="button"
                                class="btn btn-primary float-right"
                                style="margin-right: 5px;"
                            >
                                <i class="fas fa-download"></i>
                                Generate PDF
                            </button> --}}
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection




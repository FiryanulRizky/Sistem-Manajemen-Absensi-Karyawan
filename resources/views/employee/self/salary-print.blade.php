<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>CETAK SLIP GAJI</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- Bootstrap 4 -->

        <!-- Font Awesome -->
        <link
            rel="stylesheet"
            href="/plugins/fontawesome-free/css/all.min.css"
        />
        <!-- Ionicons -->
        <link
            rel="stylesheet"
            href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
        />
        <!-- Theme style -->
        <link rel="stylesheet" href="/dist/css/adminlte.min.css" />

        <!-- Google Font: Source Sans Pro -->
        <link
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700"
            rel="stylesheet"
        />
    </head>
    <body>
        <div class="wrapper">
            <!-- Main content -->
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
        </div>
        <!-- ./wrapper -->

        <script type="text/javascript">
            window.addEventListener("load", window.print());
        </script>
    </body>
</html>

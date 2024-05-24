@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Transaksi</div>

                <div class="card-body">
                    <p><strong>Nomor Invoice:</strong> {{ $transaction->invoice_number }}</p>
                    <p><strong>Kode Unik:</strong> {{ $transaction->unique_code }}</p>
                    <p><strong>Tanggal Kadaluarsa:</strong> {{ $transaction->expiry_date->format('d/m/Y H:i:s') }}</p>
                    <!-- Tambahkan informasi transaksi lainnya sesuai kebutuhan -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

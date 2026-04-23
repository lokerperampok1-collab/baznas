@extends('layouts.app')

@section('title', 'Invoice Donasi - KURBAN BERKAH BAZNAS')

@section('styles')
<style>
    .invoice-container {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background: #fff;
        min-height: 100vh;
    }
    .header-invoice {
        text-align: center;
        padding: 20px 0;
        border-bottom: 2px dashed #eee;
    }
    .status-badge {
        display: inline-block;
        padding: 5px 15px;
        border-radius: 20px;
        background: #fff8e1;
        color: #ff8f00;
        font-size: 12px;
        font-weight: bold;
        margin-top: 10px;
    }
    .total-box {
        background: #f1f8e9;
        border-radius: 12px;
        padding: 25px;
        text-align: center;
        margin: 20px 0;
        border: 1px solid #c8e6c9;
    }
    .total-box h2 {
        margin: 0;
        color: #2e7d32;
        font-size: 28px;
    }
    .unique-code {
        color: #c62828;
        font-weight: bold;
    }
    .bank-details {
        border: 1px solid #e0e0e0;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 20px;
    }
    .bank-details img {
        height: 30px;
        margin-bottom: 15px;
    }
    .copy-btn {
        color: #259148;
        cursor: pointer;
        font-size: 12px;
        font-weight: bold;
        float: right;
    }
    .instruction-list {
        font-size: 13px;
        color: #616161;
        padding-left: 20px;
    }
    .instruction-list li {
        margin-bottom: 10px;
    }
    .wa-button {
        display: block;
        width: 100%;
        background: #25d366;
        color: #fff;
        text-align: center;
        padding: 15px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: bold;
        margin-top: 30px;
    }
    .wa-button:hover {
        background: #128c7e;
    }
</style>
@endsection

@section('content')
<div class="invoice-container">
    <div class="header-invoice">
        <img src="{{ asset('assets/images/bank/bank.png') }}" style="height: 40px; filter: grayscale(1);">
        <h3 style="margin: 10px 0 5px;">Instruksi Pembayaran</h3>
        <p style="color: #757575; font-size: 14px;">ID Transaksi: #{{ strtoupper(substr($donation->token, 0, 8)) }}</p>
        <div class="status-badge">Menunggu Pembayaran</div>
    </div>

    <div class="total-box">
        <p style="margin-bottom: 10px; font-size: 14px; color: #558b2f;">Total yang harus ditransfer:</p>
        <h2>Rp {{ number_format($donation->total_payment, 0, ',', '.') }}</h2>
        <p style="font-size: 12px; margin-top: 10px; color: #757575;">
            Termasuk kode unik <span class="unique-code">{{ $donation->unique_code }}</span>
        </p>
    </div>

    @if($donation->payment_method == 'qris')
        <div class="bank-details" style="text-align: center;">
            <p style="font-size: 14px; font-weight: bold; margin-bottom: 15px;">Scan QRIS di bawah ini:</p>
            @php
                $qr_url = $donation->payment_data['qr_image_url'] ?? 
                          $donation->payment_data['qr_url'] ?? 
                          (isset($donation->payment_data['payment_number']) ? 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=' . $donation->payment_data['payment_number'] : null);
            @endphp

            @if($qr_url)
                <img src="{{ $qr_url }}" alt="QRIS Code" style="height: auto; width: 100%; max-width: 300px; margin-bottom: 15px; border: 1px solid #eee; padding: 10px; border-radius: 8px;">
            @else
                <p class="text-danger">Gagal memuat kode QRIS.</p>
            @endif
            <p style="font-size: 12px; color: #757575;">Berlaku untuk semua aplikasi E-Wallet & Mobile Banking</p>
        </div>
    @elseif($donation->payment_method == 'qris' && isset($donation->payment_data['payment_url']))
    <div class="bank-details" style="text-align: center;">
        <p style="margin-bottom: 15px;">Klik tombol di bawah untuk membayar melalui QRIS/E-Wallet:</p>
        <a href="{{ $donation->payment_data['payment_url'] }}" target="_blank" class="wa-button" style="background: #0099ff; margin-top: 0;">BAYAR SEKARANG</a>
    </div>
    @else
    <div class="bank-details">
        @if($bank)
            <img src="{{ asset('assets/images/bank/'.$donation->payment_method.'.png') }}" alt="{{ $bank['name'] }}">
            <div style="margin-bottom: 15px;">
                <p style="font-size: 12px; color: #757575; margin-bottom: 5px;">Nomor Rekening</p>
                <span style="font-size: 18px; font-weight: bold;">{{ $bank['number'] }}</span>
                <span class="copy-btn" onclick="copyToClipboard('{{ $bank['number'] }}')">SALIN</span>
            </div>
            <div>
                <p style="font-size: 12px; color: #757575; margin-bottom: 5px;">Atas Nama</p>
                <p style="font-weight: bold;">{{ $bank['acc'] }}</p>
            </div>
        @else
            <p>Metode pembayaran tidak ditemukan.</p>
        @endif
    </div>
    @endif

    <div style="margin-top: 30px;">
        <h4 style="margin-bottom: 15px;">Cara Pembayaran:</h4>
        <ul class="instruction-list">
            @if($donation->payment_method == 'qris')
                <li>Buka aplikasi OVO, GoPay, Dana, LinkAja, atau Mobile Banking Anda.</li>
                <li>Pilih fitur "Scan QR" atau "Bayar".</li>
                <li>Scan kode QR yang tampil di atas atau klik tombol bayar.</li>
                <li>Konfirmasi pembayaran di aplikasi Anda.</li>
            @else
                <li>Gunakan Mobile Banking/ATM untuk transfer.</li>
                <li>Pastikan nominal transfer **persis** sampai 3 digit terakhir.</li>
                <li>Simpan bukti transfer Anda.</li>
            @endif
            <li>Klik tombol di bawah untuk konfirmasi ke WhatsApp Admin.</li>
        </ul>
    </div>

    @php
        $items = "";
        foreach($donation->qurban_details as $item) {
            $name = $item['name'] ?? 'Paket Kurban';
            $count = $item['count'] ?? 0;
            $items .= $name . " (" . $count . "x), ";
        }
        $items = rtrim($items, ", ");
        
        $message = "Halo BAZNAS, saya ingin konfirmasi donasi kurban:\n\n" .
                   "ID Transaksi: #" . strtoupper(substr($donation->token, 0, 8)) . "\n" .
                   "Nama: " . $donation->sapaan . " " . $donation->name . "\n" .
                   "Paket: " . $items . "\n" .
                   "Total: Rp " . number_format($donation->total_payment, 0, ',', '.') . "\n\n" .
                   "Saya akan segera mengirimkan bukti transfernya. Terima kasih.";
        $wa_link = "https://wa.me/6281234567890?text=" . urlencode($message);
    @endphp

    <a href="{{ $wa_link }}" class="wa-button" target="_blank">
        KONFIRMASI VIA WHATSAPP
    </a>

    <p style="text-align: center; margin-top: 20px; font-size: 12px; color: #bdbdbd;">
        &copy; {{ date('Y') }} BAZNAS Kabupaten Tasikmalaya
    </p>
</div>

<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(() => {
            alert('Nomor rekening berhasil disalin!');
        });
    }
</script>
@endsection

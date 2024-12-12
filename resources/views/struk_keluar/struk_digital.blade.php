<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Parkir</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; 
            flex-direction: column;
        }

        .container {
            text-align: center;
            background-color: #ffffff; 
            padding: 20px;
            border-radius: 8px; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
            padding-left: 70px;
            padding-right: 70px;
        }


        .footer-note {
            margin-top: 20px;
            font-size: 0.9em;
            color: #6c757d; 
        }

        .message {
            margin-bottom: 20px;
            text-align: center;
            font-size: 1em;
        }

    </style>    

</head>
<body>
<br>
<p class="message" style="margin-bottom: 2px; margin-top:50px">** Tidak dapat terhubung ke printer. Silahkan lihat struk pada layar. **</p>
<p class="message" style="color:#6c757d;">Kembali ke layar utama dalam 5 detik</p>
<div class="container">
    
    <h1 style="text-align: center;">Struk Parkir</h1>
    
        @if (isset($prints) && count($prints) > 0)
            @foreach ($prints as $data)
                <p><strong>Jenis Kendaraan:</strong> {{ strtoupper($data->tarif->jenis_kendaraan) }}</p>
                <p><strong>Kode Parkir:</strong> {{ $data->kode_parkir }}</p>
                <p><strong>Plat:</strong> {{ $data->plat }}</p>
                <p><strong>Waktu Masuk:</strong> {{ $data->created_at->format('d-m-Y | H:i:s') }}</p>
                <p><strong>Waktu Keluar:</strong> {{ $data->updated_at->format('d-m-Y | H:i:s') }}</p>
                <p><strong>Durasi:</strong> {{ $data->durasi }}</p>
                <p><strong>Petugas:</strong> {{ $data->user->nama }}</p>
                <p><strong>Total:</strong> {{ number_format($data->harga, 0, '.', '.') }}</p>
                <div class="footer-note">
                    <p><strong></strong>** Terima Kasih Atas Kunjungannya **</p>
                    <p><strong></strong>** Hati-Hati di Jalan **</p>

                </div>
            @endforeach
        @else
            <p style="text-align: center;">Tidak ada data struk untuk ditampilkan.</p>
        @endif
    
    </div>



    <script>
        setTimeout(() => {
            window.location.href = "/keluar-parkir";
        }, 5000); 
    // </script>
</body>
</html>

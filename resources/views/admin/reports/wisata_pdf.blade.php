<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .header { text-align: center; margin-bottom: 30px; }
        .footer { position: fixed; bottom: 0; width: 100%; text-align: right; font-size: 10px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>{{ $title }}</h2>
        <p>Tanggal Laporan: {{ $date }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Wisata</th>
                <th>Kategori</th>
                <th>Harga Tiket</th>
                <th>Jam Operasional</th>
            </tr>
        </thead>
        <tbody>
            @foreach($wisatas as $index => $w)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $w->nama }}</td>
                <td>{{ $w->kategori }}</td>
                <td>{{ $w->harga_tiket_rupiah }}</td>
                <td>{{ $w->jam_operasional }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak otomatis oleh Sistem Pariwisata Surabaya
    </div>
</body>
</html>

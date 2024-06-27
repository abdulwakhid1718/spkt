<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-container img {
            width: 70px;
        }

        .subtitle {
            margin-top: 10px;
            font-size: 14px;
            color: #666;
            text-align: center;
        }

        .address {
            margin-top: 10px;
            font-size: 14px;
            color: #666;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            text-transform: capitalize;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #999;
            text-align: center;
        }

        .signature {
            float: right;
            margin-top: 20px;
            text-align: center;
        }

        .signature p {
            margin-top: 10px;
            border-top: 1px solid #ccc;
            padding-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo-container">
            <img src="{{ asset('assets_admin/img/logo_polri.png') }}" alt="Logo Polri">
            <p class="subtitle">Polsek Kamal</p>
        </div>
        <div class="address">
            <p>Jl. Polsek Kamal No. XX, Jakarta</p>
            <p>Telp: (021) 1234567</p>
            <p>Email: polsek_kamal@example.com</p>
        </div>
        <h2>Laporan Pengguna</h2>
        <p class="subtitle">Rentang Tanggal: {{ $start_date }} - {{ $end_date }}</p>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Pekerjaan</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Registrasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->nama_lengkap }}</td>
                        <td>{{ $user->alamat }}</td>
                        <td>{{ $user->jenis_kelamin }}</td>
                        <td>{{ $user->pekerjaan }}</td>
                        <td>{{ $user->tempat_lahir }}</td>
                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="footer">
            <p>Dicetak pada: {{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}</p>
        </div>
    </div>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>

</html>

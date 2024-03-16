<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Barang Jual</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        .admin {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }
    </style>
</head>

<body>
    <div class="title">
        <h2>Laporan Barang Jual</h2>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Barang Masuk</th>
                <th>Nama Barang</th>
                <th>Jenis</th>
                <th>Jumlah Barang</th>
                <th>Harga Barang</th>
                <th>Harga Jual</th>
                <th>Tanggal DiBuat</th>
                <th>Tanggal DiUpdate</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangjuals as $barang)
                <tr>
                    <td>{{ $barang->id }}</td>
                    <td>{{ $barang->barang_masuk_id }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->jenis }}</td>
                    <td>{{ $barang->jumlah_barang }}</td>
                    <td>{{ $barang->harga_barang }}</td>
                    <td>{{ $barang->harga_jual }}</td>
                    <td>{{ $barang->created_at }}</td>
                    <td>{{ $barang->updated_at }}</td>
                    <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="admin">
        <p>Admin: {{ auth()->user()->first_name }}</p>
    </div>
</body>

</html>

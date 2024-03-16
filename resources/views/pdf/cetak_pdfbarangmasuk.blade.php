<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Barang Masuk</title>
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
        <h2>Laporan Barang Masuk</h2>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID </th>
                <th>ID Permintaan</th>
                <th>ID Supplier</th>
                <th>ID Product</th>

                <th>Nama Supplier</th>
                <th>Nama PIC</th>
                <th>Lokasi</th>
                <th>Nama Product</th>
                <th>Jenis Product</th>
                <th>Jumlah Barang</th>
                <th>Harga Barang</th>\
                <th>Tanggal DiBuat</th>
                <th>Tanggal DiUpdate</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barangmasuks as $bm)
                <tr>
                    <td>{{ $bm->id }}</td>
                    <td>{{ $bm->request_barang_masuk_id }}</td>

                    <td>{{ $bm->supplier_id }}</td>
                    <td>{{ $bm->product_id }}</td>

                    <td>{{ $bm->nama_supplier }}</td>
                    <td>{{ $bm->nama_pic }}</td>
                    {{-- <td>{{ $bm->no_hp }}</td> --}}
                    <td>{{ $bm->lokasi }}</td>
                    <td>{{ $bm->namabarang }}</td>
                    <td>{{ $bm->jenis }}</td>
                    <td>{{ $bm->jumlah_barang }}</td>
                    <td>{{ $bm->harga_barang }}</td>
                    <td>{{ $bm->created_at }}</td>
                    <td>{{ $bm->updated_at }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>



    <div class="admin">
        <p>Admin: {{ auth()->user()->first_name }}</p>
    </div>
</body>

</html>

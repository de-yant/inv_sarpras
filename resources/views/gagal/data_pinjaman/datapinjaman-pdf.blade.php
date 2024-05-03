<html>

<head>
    <style>


        #header {
            text-align: center;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <header id="header">
        <h2>MTS AL-HIDAYAH IBUN</h2>
        <h3>Laporan Data Peminjaman Barang</h3>
    </header>
    <table id="customers">
        <tr>
            <th>No</th>
            <th>Tanggal Peminjaman</th>
            <th>Batas Pengembalian</th>
            <th>Tanggal Pengembalian</th>
            <th>Nama Peminjam</th>
            <th>Nama Pengambil</th>
            <th>Telepon</th>
            <th>Nama Pengembali</th>
            <th>Nama Barang</th>
            <th>Ruangan</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Status</th>
            <th>Dikembalikan</th>
        </tr>
        @php
            $no = 1;
        @endphp
        <tr>
            @foreach ($data_pinjaman as $row)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $row->tgl_peminjaman }}</td>
            <td>{{ $row->bts_pengembalian }}</td>
            <td>{{ $row->tgl_pengembalian }}</td>
            <td>{{ $row->nama_peminjam }}</td>
            <td>{{ $row->nama_pengambil }}</td>
            <td>{{ $row->no_tlp }}</td>
            <td>{{ $row->nama_pengembali }}</td>
            <td>{{ $row->data_barang->nama_barang }}</td>
            <td>{{ $row->ruangan->nama_ruangan }}</td>
            <td>{{ $row->jumlah }}</td>
            <td>{{ $row->data_barang->satuan_barang }}</td>
            <td>{{ $row->status }}</td>
            <td>{{ $row->dikembalikan }}</td>
        </tr>
        @endforeach
        </tr>
    </table>

</body>

</html>

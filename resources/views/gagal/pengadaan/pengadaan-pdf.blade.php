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
        <h3>Laporan Data Pengadaan Barang</h3>
    </header>
    <table id="customers">
        <tr>
            <th>No</th>
            <th>Tanggal Pengambilan</th>
            <th>Nama Pengambil</th>
            <th>Nama Barang</th>
            <th>Ruangan</th>
            <th>Jumlah</th>
            <th>Satuan</th>
            <th>Status</th>
        </tr>
        @php
            $no = 1;
        @endphp
        <tr>
            @foreach ($data_pengadaan as $row)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $row->tgl_pengambilan }}</td>
            <td>{{ $row->nama_pengambil }}</td>
            <td>{{ $row->data_barang->nama_barang }}</td>
            <td>{{ $row->ruangan->nama_ruangan }}</td>
            <td>{{ $row->jumlah }}</td>
            <td>{{ $row->data_barang->satuan_barang }}</td>
            <td>{{ $row->status }}</td>
        </tr>
        @endforeach
        </tr>
    </table>

</body>

</html>

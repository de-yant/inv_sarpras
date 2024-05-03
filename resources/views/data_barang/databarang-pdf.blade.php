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
        <h3>Laporan Data Barang</h3>
    </header>
    <table id="customers">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Ruangan</th>
            <th>Nama Barang</th>
            <th>Merek Barang</th>
            <th>Jumlah Barang</th>
            <th>Kondisi Barang</th>
            {{-- <th>Status Barang</th> --}}
            <th>Tanggal Pembelian</th>
            <th>Sumber Dana</th>
            <th>Keterangan</th>
        </tr>
        @php
            $no = 1;
        @endphp
        <tr>
            @foreach ($data_barang as $row)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $row->kode_barang }}</td>
            <td>{{ $row->ruangan->nama_ruangan }}</td>
            <td>{{ $row->nama_barang }}</td>
            <td>{{ $row->merk_barang }}</td>
            <td>{{ $row->jumlah_barang }}</td>
            <td>{{ $row->kondisi_barang }}</td>
            <td>{{ $row->status_barang }}</td>
            <td>{{ $row->tanggal_pembelian }}</td>
            <td>{{ $row->sumber_dana->sumber_dana }}</td>
            <td>{{ $row->keterangan }}</td>
        </tr>
        @endforeach
        </tr>
    </table>

</body>

</html>

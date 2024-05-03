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
        <h3>Laporan Data Ruangan</h3>
    </header>
    <table id="customers">
        <tr>
            <th>No</th>
            <th>Kode Ruangan</th>
            <th>Nama Barang</th>
            <th>Sumber Dana</th>
            <th>Kondisi</th>
            <th>Keterangan</th>
        </tr>
        @php
            $no = 1;
        @endphp
        <tr>
            @foreach ($data_ruangan as $row)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $row->kode_ruangan }}</td>
            <td>{{ $row->nama_ruangan }}</td>
            <td>{{ $row->sumber_dana->sumber_dana }}</td>
            <td>{{ $row->kondisi_ruangan }}</td>
            <td>{{ $row->keterangan }}</td>
        </tr>
        @endforeach
        </tr>
    </table>

</body>

</html>

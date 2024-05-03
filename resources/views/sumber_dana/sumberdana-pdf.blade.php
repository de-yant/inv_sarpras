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
        <h3>Laporan Sumber Dana Ruangan</h3>
    </header>
    <table id="customers">
        <tr>
            <th>No</th>
            <th>Sumber Dana</th>
            <th>Keterangan</th>
        </tr>
        @php
            $no = 1;
        @endphp
        <tr>
            @foreach ($sumber_dana as $row)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $row->sumber_dana }}</td>
            <td>{{ $row->keterangan }}</td>
        </tr>
        @endforeach
        </tr>
    </table>

</body>

</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir Pendaftaran - {{ $pendaftaran->nama_santri }}</title>
    <style>
        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 12px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h3, .header h4 {
            margin: 0;
            padding: 0;
        }
        .header .address {
            font-size: 11px;
            border-bottom: 2px solid #000;
            padding-bottom: 5px;
        }
        .content-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .content-table td {
            padding: 5px;
            vertical-align: top;
        }
        .content-table .label {
            width: 30%;
        }
        .content-table .separator {
            width: 5%;
            text-align: center;
        }
        .content-table .data {
            width: 65%;
            border-bottom: 1px dotted #000;
        }
        .nested-label {
            padding-left: 20px;
        }
        .signature-section {
            margin-top: 60px;
            width: 100%;
        }
        .signature-section td {
            text-align: center;
            width: 50%;
        }
        .signature-name {
            margin-top: 60px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="header">
        <h3>FORMULIR PENDAFTARAN SANTRI BARU</h3>
        <h4>PONDOK PESANTREN PUTRI KH. BASTHOMI</h4>
        <p class="address">PO BOX 02 LOCERET NGANJUK 64471 NO HP : 085855062194</p>
    </div>

    <table class="content-table">
        <tr>
            <td class="label">No Induk</td>
            <td class="separator">:</td>
            <td class="data"></td>
        </tr>
        <tr>
            <td class="label">No Pendaftaran</td>
            <td class="separator">:</td>
            <td class="data">{{ $pendaftaran->tahun_pendaftaran }}-{{ str_pad($pendaftaran->no_pendaftaran, 4, '0', STR_PAD_LEFT) }}</td>
        </tr>
        <tr>
            <td class="label">Nama Santri</td>
            <td class="separator">:</td>
            <td class="data">{{ $pendaftaran->nama_santri }}</td>
        </tr>
        <tr>
            <td class="label">Tempat / Tgl. Lahir</td>
            <td class="separator">:</td>
            <td class="data">{{ $pendaftaran->tempat_lahir }}, {{ $pendaftaran->tgl_lahir->format('d F Y') }}</td>
        </tr>
        <tr>
            <td class="label">Nama Orang Tua</td>
            <td class="separator">:</td>
            <td></td>
        </tr>
        <tr>
            <td class="label nested-label">a) Ayah</td>
            <td class="separator">:</td>
            <td class="data">{{ $pendaftaran->nama_ayah }}</td>
        </tr>
         <tr>
            <td class="label nested-label">b) Ibu</td>
            <td class="separator">:</td>
            <td class="data">{{ $pendaftaran->nama_ibu }}</td>
        </tr>
        <tr>
            <td class="label">Pekerjaan orang tua</td>
            <td class="separator">:</td>
            <td></td>
        </tr>
        <tr>
            <td class="label nested-label">a) Ayah</td>
            <td class="separator">:</td>
            <td class="data">{{ $pendaftaran->pekerjaan_ayah }}</td>
        </tr>
         <tr>
            <td class="label nested-label">b) Ibu</td>
            <td class="separator">:</td>
            <td class="data">{{ $pendaftaran->pekerjaan_ibu }}</td>
        </tr>
        <tr>
            <td class="label">Nomor Telepon</td>
            <td class="separator">:</td>
            <td class="data">{{ $pendaftaran->nomor_telepon }}</td>
        </tr>
        <tr>
            <td class="label">Alamat Rumah</td>
            <td class="separator">:</td>
            <td class="data">{{ $pendaftaran->alamat_rumah }}</td>
        </tr>
        <tr>
            <td class="label">Tanggal Masuk Pondok</td>
            <td class="separator">:</td>
            <td class="data"></td>
        </tr>
        <tr>
            <td class="label">Kelas</td>
            <td class="separator">:</td>
            <td class="data"></td>
        </tr>
         <tr>
            <td class="label">Kamar</td>
            <td class="separator">:</td>
            <td class="data"></td>
        </tr>
         <tr>
            <td class="label">Keterangan</td>
            <td class="separator">:</td>
            <td class="data"></td>
        </tr>
    </table>
    
    <table class="signature-section">
        <tr>
            <td>
                Mengetahui<br>
                Pengasuh P.P KH. Basthomi
                <p class="signature-name">( Ibu Nyai Hj. Mahmudah Basthomi )</p>
            </td>
            <td>
                Mojosari, {{ date('d F Y') }}<br>
                Pendaftar
                <p class="signature-name">( ............................................ )</p>
            </td>
        </tr>
    </table>

</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Formulir Pendaftaran - {{ $pendaftaran->nama_santri }}</title>
    <style>
        /* CSS Reset Sederhana */
        body, h1, h2, h3, h4, h5, h6, p, table, tr, td {
            margin: 0;
            padding: 0;
            border-spacing: 0;
        }

        body {
            font-family: 'Times New Roman', Times, serif; /* Font klasik untuk dokumen resmi */
            font-size: 12px;
            color: #000;
        }

        /* Styling Header */
        .header-table {
            width: 100%;
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 5px;
        }
        .header-table td {
            padding: 1px 0;
        }
        .header-title {
            font-size: 14px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .header-subtitle {
            font-size: 13px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .header-address {
            font-size: 12px;
            font-weight: bold;
        }

        /* Styling Tabel Konten */
        .content-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .content-table td {
            padding: 6px 4px; /* Sedikit padding agar tidak terlalu mepet */
            vertical-align: top;
        }
        .content-table .label {
            width: 30%;
        }
        .content-table .separator {
            width: 2%;
        }
        .content-table .data {
            width: 68%;
            border-bottom: 1px dotted #333;
            min-height: 16px; /* Pastikan garis tetap terlihat */
        }
        .data:empty::before {
             content: "\a0"; /* Spasi non-breaking untuk data kosong agar garis terlihat */
        }
        .nested-label {
            padding-left: 20px;
        }

        /* Styling Tanda Tangan */
        .signature-section {
            margin-top: 60px;
            width: 100%;
        }
        .signature-section td {
            text-align: center;
            width: 50%;
            padding: 0 15px;
            vertical-align: top;
        }
        .signature-name {
            margin-top: 60px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <table class="header-table">
        <tr>
            <td class="header-title">Formulir Pendaftaran Santri Baru</td>
        </tr>
        <tr>
            <td class="header-subtitle">Pondok Pesantren Putri KH. Basthomi</td>
        </tr>
        <tr>
            <td class="header-subtitle">Pondok Pesantren Mojosari</td>
        </tr>
        <tr>
            <td class="header-address">PO BOX 02 LOCERET NGANJUK 64471 NO HP : 085855062194</td>
        </tr>
    </table>

    <table class="content-table">
        <tr>
            <td class="label">No Induk</td>
            <td class="separator">:</td>
            <td class="data"></td>
        </tr>
        <tr>
            <td class="label">Nomor Pendaftaran</td>
            <td class="separator">:</td>
            <td class="data">{{ $pendaftaran->formatted_nomor_pendaftaran }}</td>
        </tr>
        <tr>
            <td class="label">Nama Santri</td>
            <td class="separator">:</td>
            <td class="data">{{ $pendaftaran->nama_santri }}</td>
        </tr>
        <tr>
            <td class="label">Tempat / Tgl. Lahir</td>
            <td class="separator">:</td>
            <td class="data">{{ $pendaftaran->tempat_lahir }}, {{ $pendaftaran->tgl_lahir->translatedFormat('d F Y') }}</td>
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
                ............................, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>
                Pendaftar
                <p class="signature-name">( ............................................ )</p>
            </td>
        </tr>
    </table>

</body>
</html>
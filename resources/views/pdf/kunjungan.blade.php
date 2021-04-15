<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Kunjungan</title>
</head>
<style>

    @page { margin-top: 10px; }
    /*body { margin: 1px; margin-top: 0px }*/
    .page-break {
        page-break-after: always;
    }

    td, th {
        vertical-align: top;
    }

    .jusfify {
        text-align: justify
    }
</style>
<body>

<div class="row">
    <div class="col-12 justify-content-center">

        <h3 style="text-align: center">
            <span style="text-decoration: underline">SURAT MENGUNJUNGI TAHANAN</span>
            <br><span style="text-decoration: none">NOMOR:05/L.10.12.3/EP.1/02/2020</span>
        </h3>

    </div>
</div>

<div class="row" style="padding-left: 20px; padding-right: 20px; padding-top: 0">
    <div class="col-12">
        <p>Diberikan kepada:</p>
        <table>
            <tbody>
            @foreach($kunjungan->dataPengunjungKunjungan as $dataPengunjungKunjungan)
                <tr>
                    <td style="padding-right: 10px">{{ $loop->iteration }}.</td>
                    <td style="padding-right: 80px">Nama</td>
                    <td style="padding-right: 30px">:</td>
                    <td><strong>{{ $dataPengunjungKunjungan->dataPengunjung->nama_lengkap }}</strong></td>
                </tr>
                <tr>
                    <td style="padding-right: 10px"></td>
                    <td style="padding-right: 80px">Alamat</td>
                    <td style="padding-right: 30px">:</td>
                    <td class="jusfify">
                        {{ $dataPengunjungKunjungan->dataPengunjung->alamat }}
                    </td>
                </tr>
                <tr>
                    <td style="padding-right: 10px"></td>
                    <td style="padding-right: 80px">Pekerjaan</td>
                    <td style="padding-right: 30px">:</td>
                    <td>{{ $dataPengunjungKunjungan->dataPengunjung->pekerjaan }}</td>
                </tr>
                <tr>
                    <td style="padding-right: 10px"></td>
                    <td style="padding-right: 80px">Hubungan</td>
                    <td style="padding-right: 30px">:</td>
                    <td>{{ $dataPengunjungKunjungan->dataPengunjung->hubungan }}</td>
                </tr>
                <tr>
                    <td style="height: 10px"></td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <p>Untuk Mengujungi Tahanan:</p>
        <table>
            <tbody>
            <tr>
                <td style="padding-right: 75px">Nama Lengkap</td>
                <td style="padding-right: 30px">:</td>
                <td><strong>{{ $kunjungan->narapidana->nama_lengkap }}</strong></td>
            </tr>

            <tr>
                <td style="padding-right: 75px">Tempat Lahir</td>
                <td style="padding-right: 30px">:</td>
                <td>{{ $kunjungan->narapidana->tempat_lahir }}</td>
            </tr>

            <tr>
                <td style="padding-right: 75px">Umur/Tgl Lahir</td>
                <td style="padding-right: 30px">:</td>
                <td>{{ $kunjungan->narapidana->tanggal_lahir }}</td>
            </tr>

            <tr>
                <td style="padding-right: 75px">Jenis Kelamin</td>
                <td style="padding-right: 30px">:</td>
                <td>{{ $kunjungan->narapidana->jenis_kelamin }}</td>
            </tr>

            <tr>
                <td style="padding-right: 75px">Kebangsaan</td>
                <td style="padding-right: 30px">:</td>
                <td>{{ $kunjungan->narapidana->kebangsaan }}</td>
            </tr>

            <tr>
                <td style="padding-right: 75px">Tempat Tinggal</td>
                <td style="padding-right: 30px">:</td>
                <td>{{ $kunjungan->narapidana->tempat_tinggal }}</td>
            </tr>

            <tr>
                <td style="padding-right: 75px">Agama</td>
                <td style="padding-right: 30px">:</td>
                <td>{{ $kunjungan->narapidana->agama }}</td>
            </tr>

            <tr>
                <td style="padding-right: 75px">Pekerjaan</td>
                <td style="padding-right: 30px">:</td>
                <td>{{ $kunjungan->narapidana->pekerjaan }}</td>
            </tr>

            <tr>
                <td style="padding-right: 75px">Pendidikan</td>
                <td style="padding-right: 30px">:</td>
                <td>{{ $kunjungan->narapidana->pendidikan }}</td>
            </tr>

            <tr>
                <td style="padding-right: 75px">Reg. Perkara</td>
                <td style="padding-right: 30px">:</td>
                <td>{{ $kunjungan->narapidana->reg_perkara }}</td>
            </tr>

            <tr>
                <td style="padding-right: 75px">Reg. Tahanan</td>
                <td style="padding-right: 30px">:</td>
                <td>{{ $kunjungan->narapidana->reg_tahanan }}</td>
            </tr>

            <tr>
                <td style="padding-right: 75px">Reg. Bukti</td>
                <td style="padding-right: 30px">:</td>
                <td>{{ $kunjungan->narapidana->reg_bukti }}</td>
            </tr>

            <tr>
                <td style="padding-right: 75px">Keperluan</td>
                <td style="padding-right: 30px">:</td>
                <td>{{ $kunjungan->keperluan }}</td>
            </tr>

            <tr>
                <td style="padding-right: 75px">Izin Berlaku</td>
                <td style="padding-right: 30px">:</td>
                <td>
                    @foreach($kunjungan->waktuKunjungan as $waktuKunjungan)
                        <strong>{{ $waktuKunjungan->tanggal }}</strong> {{ $waktuKunjungan->dari_jam }}
                        - {{ $waktuKunjungan->hingga_jam }}<br>
                    @endforeach
                </td>
            </tr>

            </tbody>
        </table>

        <div style="padding-left: 300px">
            <p style="text-align: center; margin-bottom: 80px">Dikeluarkan di: Tanjung Balai Karimun<br>
                <span style="text-decoration: underline">Pada Tanggal : 08 Februari 2020</span><br><br>
                <strong >
                    An. KEPALA KEJAKSAAN NEGERI KARIMUN
                    Ub KEPALA SEKSI TINDAK PIDANA UMUM
                    JAKSA PENUNTUT UMUM
                </strong>
            </p>
            <p style="text-align: center">
                <strong>
                    YOGI FRANSIS TAUFIK, SH<br>
                    AJUN JAKSA NIP. 19910712 201403 1 002
                </strong>
            </p>
            <p>

            </p>
        </div>

        <div class="page-break"></div>

        <p style="margin-top: 50px"><strong>TEMBUSAN:</strong></p>
        <table>
            <tbody>
            <tr>
                <td style="padding-right: 10px">1.</td>
                <td style="padding-right: 80px">Yth. Kepala Kejaksaan Negeri Tanjung Balai Karimun
                    di – Tanjung Balai Karimun (Sebagai Laporan)
                </td>
            </tr>

            <tr>
                <td style="padding-right: 10px">2.</td>
                <td style="padding-right: 80px">Yth. Kepala Rutan Tanjung Balai Karimun di – Tanjung Balai Karimun</td>
            </tr>

            <tr>
                <td style="padding-right: 10px">3.</td>
                <td style="padding-right: 80px">Yth. Jaksa Penuntut Umum</td>
            </tr>

            <tr>
                <td style="padding-right: 10px">4.</td>
                <td style="padding-right: 80px">Keluarga Terdakwa / Penasehat Hukum</td>
            </tr>

            <tr>
                <td style="padding-right: 10px">5.</td>
                <td style="padding-right: 80px">
                    Arsip-----------------------------------------------------------------------------------------------
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>


</body>
</html>
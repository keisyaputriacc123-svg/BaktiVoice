<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan - BaktiVoice</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            color: #222;
            background: #f1f3f8;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 850px;
            margin: auto;
            padding: 40px;
            background: white;
            border-radius: 10px;
        }

        .toolbar {
            max-width: 850px;
            margin: 0 auto 15px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .toolbar button {
            padding: 11px 20px;
            border: none;
            border-radius: 6px;
            background: #111844;
            color: white;
            cursor: pointer;
            font-weight: bold;
        }

        .toolbar .back {
            background: #64748b;
        }

        .header {
            text-align: center;
            border-bottom: 3px solid #111844;
            padding-bottom: 20px;
            margin-bottom: 25px;
        }

        .header h1 {
            color: #111844;
            margin: 0 0 8px;
            font-size: 25px;
        }

        .header p {
            margin: 0;
            color: #555;
            font-size: 13px;
        }

        .document-title {
            text-align: center;
            margin: 25px 0;
        }

        .document-title h2 {
            font-size: 19px;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .document-title p {
            color: #555;
            font-size: 13px;
        }

        .section-title {
            color: #111844;
            font-size: 15px;
            margin: 25px 0 12px;
            padding-bottom: 7px;
            border-bottom: 1px solid #d8dce8;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 9px 5px;
            vertical-align: top;
            font-size: 14px;
        }

        .info-table td:first-child {
            width: 180px;
            font-weight: bold;
        }

        .content-box {
            padding: 15px;
            background: #f7f8fc;
            border: 1px solid #e1e5ef;
            border-radius: 6px;
            font-size: 14px;
            line-height: 1.7;
            white-space: pre-wrap;
            overflow-wrap: anywhere;
        }

        .evidence {
            margin-top: 12px;
        }

        .evidence img {
            max-width: 100%;
            max-height: 450px;
            object-fit: contain;
            display: block;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .response {
            padding: 13px;
            margin-bottom: 12px;
            border: 1px solid #e1e5ef;
            border-radius: 6px;
            font-size: 13px;
            line-height: 1.6;
        }

        .response-meta {
            color: #555;
            font-size: 12px;
            margin-bottom: 8px;
        }

        .footer {
            margin-top: 40px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
            text-align: center;
            color: #777;
            font-size: 11px;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }

            .container {
                max-width: none;
                padding: 15px;
                border-radius: 0;
            }

            .toolbar {
                display: none;
            }

            .content-box,
            .response,
            .evidence img {
                break-inside: avoid;
            }

            @page {
                size: A4;
                margin: 15mm;
            }
        }

        @media screen and (max-width: 600px) {
            body {
                padding: 10px;
            }

            .container {
                padding: 20px;
            }

            .info-table td:first-child {
                width: 125px;
            }
        }
    </style>
</head>
<body>

    <div class="toolbar">
        <button class="back" onclick="history.back()">Kembali</button>
        <button onclick="window.print()">Cetak / Simpan PDF</button>
    </div>

    <main class="container">

        <header class="header">
            <h1>BAKTIVOICE</h1>
            <p>Sistem Pengaduan Sekolah SMK Budi Bakti Ciwidey</p>
        </header>

        <div class="document-title">
            <h2>Dokumen Laporan Pengaduan</h2>
            <p>Nomor Laporan: BV{{ str_pad($laporan->id_laporan, 3, '0', STR_PAD_LEFT) }}</p>
        </div>

        <h3 class="section-title">A. Informasi Laporan</h3>

        <table class="info-table">
            <tr>
                <td>Nomor Laporan</td>
                <td>: BV{{ str_pad($laporan->id_laporan, 3, '0', STR_PAD_LEFT) }}</td>
            </tr>
            <tr>
                <td>Tanggal Laporan</td>
                <td>: {{ $laporan->created_at ? $laporan->created_at->format('d-m-Y H:i') : '-' }}</td>
            </tr>
            <tr>
                <td>Pelapor</td>
                <td>:
                    {{ $laporan->anonim ? 'Identitas dirahasiakan' : ($laporan->user->name ?? 'Tidak diketahui') }}
                </td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>: {{ $laporan->kategori->nama_kategori ?? '-' }}</td>
            </tr>
            <tr>
                <td>Judul Laporan</td>
                <td>: {{ $laporan->judul ?? '-' }}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>: {{ ucfirst($laporan->status ?? '-') }}</td>
            </tr>
        </table>

        <h3 class="section-title">B. Isi Laporan</h3>

        <div class="content-box">{{ $laporan->isi_laporan ?? '-' }}</div>

        <h3 class="section-title">C. Bukti Pendukung</h3>

        @if($buktiList->isNotEmpty())
            <div class="evidence">
                @foreach($buktiList as $bukti)
                    <div>
                        <p><strong>{{ basename($bukti->file_path) }}</strong></p>
                        <img
                            src="{{ asset($bukti->file_path) }}"
                            alt="Bukti laporan"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
                        >
                        <p style="display:none;">
                            File bukti: {{ basename($bukti->file_path) }}
                        </p>
                    </div>
                @endforeach
            </div>
        @else
            <p style="font-size: 14px;">Tidak ada bukti pendukung yang dilampirkan.</p>
        @endif

        <h3 class="section-title">D. Tanggapan dan Tindak Lanjut</h3>

        @forelse($laporan->tanggapan as $tanggapan)
            <div class="response">
                <div class="response-meta">
                    <strong>{{ $tanggapan->user->name ?? 'Petugas' }}</strong>
                    |
                    {{ $tanggapan->created_at ? $tanggapan->created_at->format('d-m-Y H:i') : '-' }}
                </div>
                <div>{{ $tanggapan->tanggapan ?? '-' }}</div>
            </div>
        @empty
            <p style="font-size: 14px;">Belum ada tanggapan atau tindak lanjut.</p>
        @endforelse

        <footer class="footer">
            Dokumen ini dicetak melalui sistem BaktiVoice.
            <br>
            SMK Budi Bakti Ciwidey
        </footer>

    </main>

</body>
</html>
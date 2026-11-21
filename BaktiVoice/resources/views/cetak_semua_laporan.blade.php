<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen Rekapitulasi Laporan BaktiVoice</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            color: #263445;
            background: #eef2f8;
            margin: 0;
            padding: 25px;
            font-size: 13px;
        }

        .toolbar {
            max-width: 850px;
            margin: 0 auto 18px;
            display: flex;
            justify-content: flex-end;
        }

        .print-button {
            border: none;
            border-radius: 7px;
            padding: 12px 22px;
            background: linear-gradient(135deg, #7b9fe8, #4772c7);
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .document {
            max-width: 850px;
            margin: auto;
        }

        .summary-page,
        .report-page {
            background: white;
            padding: 38px;
            margin-bottom: 25px;
            box-shadow: 0 3px 15px rgba(30, 55, 100, .08);
        }

        .header {
            text-align: center;
            border-bottom: 3px solid #628cdb;
            padding-bottom: 18px;
            margin-bottom: 25px;
        }

        .header h1 {
            color: #2c4a8e;
            font-size: 27px;
            letter-spacing: 1.5px;
            margin: 0 0 7px;
        }

        .header h2 {
            font-size: 15px;
            color: #455b7c;
            margin: 0;
        }

        .header p {
            font-size: 11px;
            color: #64748b;
            margin: 7px 0 0;
        }

        .document-info {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
            padding: 12px 14px;
            background: #f5f8fd;
            border: 1px solid #dce6f5;
            border-radius: 6px;
            font-size: 11px;
            margin-bottom: 24px;
        }

        .section-title {
            color: #2c4a8e;
            font-size: 14px;
            padding-bottom: 8px;
            border-bottom: 1px solid #d8e2f1;
            margin: 24px 0 13px;
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 8px;
        }

        .summary-card {
            border: 1px solid #d6e1f2;
            border-radius: 7px;
            padding: 14px 6px;
            text-align: center;
            background: #f5f8fd;
        }

        .summary-card strong {
            display: block;
            color: #2c4a8e;
            font-size: 22px;
            margin-bottom: 5px;
        }

        .summary-card span {
            color: #52647d;
            font-size: 10px;
        }

        .summary-note {
            margin-top: 22px;
            padding: 14px;
            border-left: 4px solid #7b9fe8;
            background: #f5f8fd;
            color: #52647d;
            line-height: 1.7;
            font-size: 12px;
        }

        .report-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding-bottom: 15px;
            border-bottom: 3px solid #628cdb;
            margin-bottom: 20px;
        }

        .report-heading h2 {
            color: #2c4a8e;
            font-size: 20px;
            margin: 0;
        }

        .report-number {
            color: #4772c7;
            background: #eaf1fb;
            border: 1px solid #d6e1f2;
            padding: 8px 11px;
            border-radius: 5px;
            font-size: 11px;
            font-weight: bold;
            white-space: nowrap;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 8px 7px;
            border-bottom: 1px solid #edf0f5;
            vertical-align: top;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .info-table td:first-child {
            width: 155px;
            font-weight: bold;
            color: #455b7c;
        }

        .info-table td:nth-child(2) {
            width: 15px;
            text-align: center;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            background: #eaf1fb;
            color: #2c4a8e;
            font-weight: bold;
            text-transform: capitalize;
        }

        .content-box {
            padding: 16px;
            background: #f7f9fd;
            border: 1px solid #e1e7f0;
            border-radius: 6px;
            line-height: 1.8;
            white-space: pre-wrap;
            overflow-wrap: anywhere;
            min-height: 65px;
        }

        .evidence-list {
            display: grid;
            grid-template-columns: 1fr;
            gap: 14px;
        }

        .evidence-item {
            padding: 12px;
            border: 1px solid #e1e7f0;
            border-radius: 6px;
            break-inside: avoid;
        }

        .evidence-item p {
            color: #52647d;
            font-size: 11px;
            margin: 0 0 10px;
            overflow-wrap: anywhere;
        }

        .evidence-item img {
            display: block;
            max-width: 100%;
            max-height: 430px;
            object-fit: contain;
            margin: auto;
        }

        .no-data {
            padding: 14px;
            color: #64748b;
            background: #f7f9fd;
            border: 1px dashed #cbd5e1;
            border-radius: 6px;
            font-size: 12px;
        }

        .response {
            border: 1px solid #dce5f2;
            border-radius: 6px;
            margin-bottom: 12px;
            overflow: hidden;
            break-inside: avoid;
        }

        .response-header {
            padding: 10px 13px;
            background: #edf3fc;
            color: #2c4a8e;
            font-size: 12px;
            font-weight: bold;
        }

        .response-body {
            padding: 13px;
            line-height: 1.7;
            white-space: pre-wrap;
            overflow-wrap: anywhere;
        }

        .footer {
            border-top: 1px solid #dce2eb;
            margin-top: 30px;
            padding-top: 12px;
            text-align: center;
            color: #8290a5;
            font-size: 10px;
            line-height: 1.6;
        }

        .empty {
            padding: 25px;
            text-align: center;
            color: #64748b;
            background: #f7f9fd;
            border: 1px dashed #cbd5e1;
            border-radius: 6px;
        }

        @media print {
            @page {
                size: A4 portrait;
                margin: 14mm;
            }

            body {
                padding: 0;
                margin: 0;
                background: white;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .toolbar {
                display: none !important;
            }

            .document {
                max-width: none;
            }

            .summary-page,
            .report-page {
                box-shadow: none;
                margin: 0;
                padding: 0;
                border: none;
            }

            .report-page {
                break-before: page;
                page-break-before: always;
            }

            .summary-card,
            .content-box,
            .response,
            .evidence-item {
                break-inside: avoid;
            }

            .footer {
                break-inside: avoid;
            }
        }

        @media screen and (max-width: 600px) {
            body {
                padding: 10px;
            }

            .summary-page,
            .report-page {
                padding: 17px;
            }

            .summary {
                grid-template-columns: repeat(2, 1fr);
            }

            .document-info {
                flex-direction: column;
            }

            .info-table td:first-child {
                width: 115px;
            }

            .report-heading h2 {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>

    <div class="toolbar">
        <button class="print-button" onclick="window.print()">
            Cetak / Simpan sebagai PDF
        </button>
    </div>

    <main class="document">

        {{-- HALAMAN RINGKASAN --}}
        <section class="summary-page">

            <header class="header">
                <h1>BAKTIVOICE</h1>
                <h2>DOKUMEN REKAPITULASI LAPORAN SEKOLAH</h2>
                <p>Sistem Informasi Pengaduan dan Pelaporan Sekolah</p>
                <p>SMK Budi Bakti Ciwidey</p>
            </header>

            <div class="document-info">
                <div>
                    <strong>Jenis Dokumen:</strong>
                    Rekapitulasi dan Detail Seluruh Laporan
                </div>
                <div>
                    <strong>Tanggal Cetak:</strong>
                    {{ now()->format('d-m-Y H:i') }}
                </div>
            </div>

            <h3 class="section-title">Ringkasan Laporan</h3>

            <div class="summary">
                <div class="summary-card">
                    <strong>{{ $totalLaporan }}</strong>
                    <span>Total Laporan</span>
                </div>

                <div class="summary-card">
                    <strong>{{ $pendingCount }}</strong>
                    <span>Pending</span>
                </div>

                <div class="summary-card">
                    <strong>{{ $diprosesCount }}</strong>
                    <span>Diproses</span>
                </div>

                <div class="summary-card">
                    <strong>{{ $selesaiCount }}</strong>
                    <span>Selesai</span>
                </div>

                <div class="summary-card">
                    <strong>{{ $ditolakCount }}</strong>
                    <span>Ditolak</span>
                </div>
            </div>

            <h3 class="section-title">Keterangan Dokumen</h3>

            <div class="summary-note">
                Dokumen ini berisi ringkasan dan rincian laporan pengaduan
                yang tercatat dalam sistem BaktiVoice. Setiap laporan
                dilengkapi dengan informasi pelapor, kategori, status,
                isi laporan, bukti pendukung, serta tanggapan Admin dan
                tindak lanjut Wakasek apabila tersedia.
                <br><br>
                Identitas pelapor yang memilih mode anonim akan ditampilkan
                sebagai Anonim.
            </div>

            <footer class="footer">
                Dokumen ini dihasilkan secara otomatis oleh sistem BaktiVoice.
                <br>
                SMK Budi Bakti Ciwidey
            </footer>

        </section>

        {{-- DETAIL SETIAP LAPORAN --}}
        @forelse ($laporans as $index => $item)

            @php
                $anonimValue = strtolower(trim((string) $item->anonim));

                $isAnonim = in_array(
                    $anonimValue,
                    ['1', 'true', 't', 'yes', 'ya', 'anonim'],
                    true
                );

                $rolePelapor = strtolower(trim($item->user?->role ?? ''));

                $namaPelapor = $isAnonim
                    ? 'Anonim'
                    : ($item->user?->name ?? '-');

                $statusLaporan = strtolower(trim((string) $item->status));
            @endphp

            <section class="report-page">

                <div class="report-heading">
                    <h2>Detail Laporan {{ $index + 1 }}</h2>

                    <div class="report-number">
                        BV{{ str_pad($item->id_laporan, 3, '0', STR_PAD_LEFT) }}
                    </div>
                </div>

                <h3 class="section-title">A. Informasi Laporan</h3>

                <table class="info-table">
                    <tr>
                        <td>Nomor Laporan</td>
                        <td>:</td>
                        <td>
                            BV{{ str_pad($item->id_laporan, 3, '0', STR_PAD_LEFT) }}
                        </td>
                    </tr>

                    <tr>
                        <td>Tanggal Laporan</td>
                        <td>:</td>
                        <td>
                            {{ $item->created_at?->format('d-m-Y H:i') ?? '-' }}
                        </td>
                    </tr>

                    <tr>
                        <td>Pelapor</td>
                        <td>:</td>
                        <td>{{ $namaPelapor }}</td>
                    </tr>

                    @if (!$isAnonim)
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td>{{ $item->user?->kelas ?? '-' }}</td>
                        </tr>

                        <tr>
                            <td>Jurusan</td>
                            <td>:</td>
                            <td>{{ $item->user?->jurusan ?? '-' }}</td>
                        </tr>
                    @endif

                    <tr>
                        <td>Kategori</td>
                        <td>:</td>
                        <td>{{ $item->kategori?->nama_kategori ?? '-' }}</td>
                    </tr>

                    <tr>
                        <td>Judul Laporan</td>
                        <td>:</td>
                        <td><strong>{{ $item->judul ?? '-' }}</strong></td>
                    </tr>

                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                            <span class="status">
                                {{ ucfirst($statusLaporan ?: '-') }}
                            </span>
                        </td>
                    </tr>
                </table>

                <h3 class="section-title">B. Isi Laporan</h3>

                <div class="content-box">{{ $item->isi_laporan ?? '-' }}</div>

                <h3 class="section-title">C. Bukti Pendukung</h3>

                @if ($item->buktiLaporan->isNotEmpty())
                    <div class="evidence-list">

                        @foreach ($item->buktiLaporan as $bukti)
                            <div class="evidence-item">

                                @if (!empty($bukti->file_path) && file_exists(public_path($bukti->file_path)))

                                    <p>
                                        <strong>Nama File:</strong>
                                        {{ basename($bukti->file_path) }}
                                    </p>

                                    <img
                                        src="{{ asset($bukti->file_path) }}"
                                        alt="Bukti laporan {{ $item->id_laporan }}"
                                    >

                                @else

                                    <p>
                                        File bukti tidak tersedia atau tidak
                                        dapat ditemukan pada penyimpanan.
                                    </p>

                                @endif

                            </div>
                        @endforeach

                    </div>
                @else
                    <div class="no-data">
                        Tidak ada bukti pendukung yang dilampirkan.
                    </div>
                @endif

                <h3 class="section-title">D. Tanggapan Admin dan Tindak Lanjut Wakasek</h3>

                @php
                    $adaTanggapan = $item->tanggapan->isNotEmpty();
                @endphp

                @if ($adaTanggapan)

                    @foreach ($item->tanggapan as $tanggapan)

                        @php
                            $rolePetugas = strtolower(trim($tanggapan->user?->role ?? ''));

                            $namaPetugas = $tanggapan->user?->name ?? 'Petugas';

                            if ($rolePetugas === 'admin') {
                                $jenisTanggapan = 'Tanggapan Admin';
                            } elseif (str_starts_with($rolePetugas, 'wakasek')) {
                                $jenisTanggapan = 'Tindak Lanjut Wakasek';
                            } else {
                                $jenisTanggapan = 'Tanggapan Petugas';
                            }
                        @endphp

                        <div class="response">

                            <div class="response-header">
                                {{ $jenisTanggapan }}
                                &mdash;
                                {{ $namaPetugas }}
                            </div>

                            <div class="response-body">{{ $tanggapan->tanggapan ?? '-' }}</div>

                        </div>

                    @endforeach

                @else

                    <div class="no-data">
                        Belum ada tanggapan Admin atau tindak lanjut Wakasek.
                    </div>

                @endif

                <footer class="footer">
                    Dokumen laporan BV{{ str_pad($item->id_laporan, 3, '0', STR_PAD_LEFT) }}
                    <br>
                    Dicetak melalui sistem BaktiVoice &mdash; SMK Budi Bakti Ciwidey
                </footer>

            </section>

        @empty

            <section class="report-page">
                <div class="empty">
                    Tidak ada laporan yang ditemukan berdasarkan filter yang dipilih.
                </div>
            </section>

        @endforelse

    </main>

</body>
</html>
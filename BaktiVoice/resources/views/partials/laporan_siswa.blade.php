@forelse($laporans as $laporan)
    <div class="report-card">
        <div class="report-info-group">
            <div class="report-thumbnail">
                @if($laporan->buktiLaporan && $laporan->buktiLaporan->count() > 0)
                    <img src="{{ asset($laporan->buktiLaporan->first()->file_path) }}" alt="Bukti">
                @else
                    <i class="fa-regular fa-image"></i>
                @endif
            </div>

            <div class="report-details">
                <div class="report-title">{{ $laporan->judul }}</div>
                <div class="report-date">{{ $laporan->created_at->format('d M Y') }}</div>
            </div>
        </div>

        <div class="report-actions">
            @php
                $statusName = $laporan->status ?? 'Pending';
                $badgeClass = match(strtolower($statusName)) {
                    'proses', 'diproses' => 'badge-diproses',
                    'selesai' => 'badge-selesai',
                    'ditolak' => 'badge-ditolak',
                    default => 'badge-pending'
                };
            @endphp

            <span class="status-badge {{ $badgeClass }}">{{ $statusName }}</span>

            <a href="{{ route('detail_laporan_siswa', ['id' => $laporan->id_laporan]) }}" class="btn-detail" title="Detail">
                <i class="fa-solid fa-chevron-right"></i>
            </a>
        </div>
    </div>
@empty
    <p style="color: var(--text-muted); text-align: center; padding: 20px;">
        Belum ada laporan yang dikirim.
    </p>
@endforelse

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BaktiVoice - Notifikasi Guru BK</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #96ace0;
            --background: #eaf1fb;
            --card-bg: #ffffff;
            --border: rgba(186, 210, 240, 0.6);
            --text-main: #2c4a8e;
            --text-muted: #64748b;
            --sidebar-width: 250px;
            --topbar-height: 70px;
            --gradient-pastel: linear-gradient(135deg, #7b9fe8 0%, #9bc3f8 50%, #b8d7ff 100%);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: var(--background);
            color: var(--text-main);
            min-height: 100vh;
        }

        .sidebar {
            width: var(--sidebar-width);
            background: var(--gradient-pastel);
            position: fixed;
            inset: 0 auto 0 0;
            z-index: 100;
            padding: 24px 16px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow-y: auto;
            box-shadow: 4px 0 20px rgba(123,159,232,.15);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 12px 24px;
        }

        .brand-logo-img {
            width: 60px;
            height: 60px;
            object-fit: contain;
            background: white;
            border-radius: 12px;
            padding: 4px;
        }

        .brand-name {
            font-size: 20px;
            font-weight: 800;
            color: #1e3a70;
        }

        .nav-menu {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

                        .nav-notification {
    position: relative;
}

.nav-notification .notification-dot {
    position: absolute;
    top: 9px;
    left: 29px;
    width: 8px;
    height: 8px;
    background: #ef7777;
    border: 2px solid #ffffff;
    border-radius: 50%;
}

        .nav-item a, .logout-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 12px 16px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: .2s;
        }

        .nav-item a {
            color: #274472;
        }

        .nav-item a:hover {
            background: rgba(255,255,255,.4);
            transform: translateX(4px);
        }

        .nav-content {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-item i, .logout-btn i {
            width: 20px;
            text-align: center;
        }

        .nav-item.active > a {
            background: white;
            color: #3b62ac;
            font-weight: 700;
            box-shadow: 0 4px 14px rgba(60,98,172,.18);
        }

        .logout-btn {
            color: #e11d48;
            margin-top: 16px;
        }

        .logout-btn:hover {
            background: rgba(255,255,255,.5);
        }

        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            min-height: var(--topbar-height);
            background: var(--gradient-pastel);
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 20px;
            padding: 12px 36px;
            position: sticky;
            top: 0;
            z-index: 90;
            box-shadow: 0 4px 15px rgba(123,159,232,.12);
        }

        .topbar-icon {
            position: relative;
            color: #274472;
            font-size: 18px;
            padding: 8px;
            border-radius: 50%;
            text-decoration: none;
        }

        .topbar-icon:hover {
            background: rgba(255,255,255,.4);
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: white;
            border: 2px solid rgba(255,255,255,.8);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #3b62ac;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 6px 12px;
        }

        .user-name {
            font-size: 14px;
            font-weight: 700;
            color: #1e3a70;
        }

        .content {
            padding: 36px;
            flex: 1;
        }

        .page-title {
            font-size: 28px;
            font-weight: 800;
            color: #1e3a70;
            margin-bottom: 8px;
        }

        .page-subtitle {
            color: var(--text-muted);
            font-size: 14px;
            line-height: 1.7;
            margin-bottom: 28px;
        }

        .notification-panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 24px;
            box-shadow: 0 4px 15px rgba(123,159,232,.08);
        }

        .notification-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 22px;
        }

        .notification-heading h2 {
            font-size: 18px;
            color: #1e3a70;
        }

        .mark-all {
            border: none;
            background: transparent;
            color: #4772c7;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
        }

        .filter-list {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .filter-btn {
            border: 1px solid #d7e3f7;
            background: #f7faff;
            color: #496cbd;
            padding: 9px 14px;
            border-radius: 22px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .filter-btn.active {
            background: #4772c7;
            border-color: #4772c7;
            color: white;
        }

        .notification-list {
            display: flex;
            flex-direction: column;
        }

        .notification-card {
            display: flex;
            align-items: flex-start;
            gap: 16px;
            padding: 20px 12px;
            border-bottom: 1px solid #edf2fa;
            border-radius: 8px;
        }

        .notification-card:last-child {
            border-bottom: none;
        }

        .notification-card.unread {
            background: #f3f7ff;
        }

        .notification-icon {
            width: 46px;
            height: 46px;
            flex-shrink: 0;
            border-radius: 12px;
            background: #e8efff;
            color: #4772c7;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .notification-body {
            flex: 1;
            min-width: 0;
        }

        .notification-title {
            font-size: 14px;
            font-weight: 700;
            color: #1e3a70;
            margin-bottom: 6px;
        }

        .notification-message {
            color: #64748b;
            font-size: 13px;
            line-height: 1.7;
            margin-bottom: 8px;
        }

        .notification-meta {
            font-size: 11px;
            color: #8795aa;
        }

        .unread-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #4772c7;
            flex-shrink: 0;
            margin-top: 6px;
        }

        .notification-card:not(.unread) .unread-dot {
            visibility: hidden;
        }

        .empty-state {
            display: none;
            text-align: center;
            color: var(--text-muted);
            padding: 36px 12px;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                padding: 16px 8px;
            }

            .brand-name, .nav-item span, .logout-btn span {
                display: none;
            }

            .brand {
                padding: 0 0 24px;
                justify-content: center;
            }

            .brand-logo-img {
                width: 48px;
                height: 48px;
            }

            .nav-item a, .logout-btn {
                justify-content: center;
                padding: 12px 8px;
            }

            .main-wrapper {
                margin-left: 70px;
            }

            .content {
                padding: 20px;
            }

            .topbar {
                padding: 12px 16px;
            }

            .user-name {
                display: none;
            }

            .notification-panel {
                padding: 16px;
            }
        }

        @media (max-width: 480px) {
            .page-title {
                font-size: 24px;
            }

            .notification-card {
                gap: 10px;
                padding: 16px 4px;
            }

            .notification-icon {
                width: 38px;
                height: 38px;
                font-size: 15px;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
<aside class="sidebar">
    <div>
        <div class="brand">
            <img src="{{ asset('images/logo BaktiVoice.png') }}"
                 alt="Logo BaktiVoice"
                 class="brand-logo-img">
            <span class="brand-name">BaktiVoice</span>
        </div>

        <ul class="nav-menu">
            <li class="nav-item">
                <a href="{{ route('dashboard_bk') }}">
                    <i class="fa-solid fa-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('LaporanSiswa_bk') }}">
                    <i class="fa-regular fa-file-lines"></i>
                    <span>Laporan Siswa</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('monitoring_bk') }}">
                    <i class="fa-regular fa-eye"></i>
                    <span>Monitoring</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('notifikasi_bk') }}" class="active">
                    <i class="fa-solid fa-bell"></i>
                    <span>Notifikasi</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('profil_bk') }}" title="Profil">
                    <i class="fa-regular fa-user"></i>
                    <span>Profil</span>
                </a>
            </li>
        </ul>
    </div>

    <a href="{{ route('login') }}" class="logout-btn">
        <i class="fa-solid fa-right-from-bracket"></i>
        <span>Logout</span>
    </a>
</aside>

<!-- MAIN CONTENT -->
<div class="main-wrapper">

    <header class="topbar">
        <div class="user-profile">
            <div class="avatar">
                <i class="fa-regular fa-user"></i>
            </div>

            <span class="user-name">
                {{ Auth::user()->name ?? 'Guru BK' }}
            </span>
        </div>
    </header>

    <main class="content">

        <h1 class="page-title">Notifikasi Guru BK</h1>

        <p class="page-subtitle">
            Pantau laporan kategori Kesiswaan, pembaruan status,
            dan tindak lanjut yang perlu diperhatikan.
        </p>

        <section class="notification-panel">

            <!-- HEADING NOTIFIKASI -->
            <div class="notification-heading">
                <h2>
                    Aktivitas Kesiswaan
                    (<span id="unreadCount">{{ $unreadCount ?? 0 }}</span>
                    Belum Dibaca)
                </h2>

                <form action="{{ route('notifikasi.readAll') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit"
                            class="mark-all"
                            id="markAll">
                        Tandai semua dibaca
                    </button>
                </form>
            </div>

            <!-- FILTER NOTIFIKASI -->
            <div class="filter-list">
                <button type="button"
                        class="filter-btn active"
                        data-filter="semua">
                    Semua
                </button>

                <button type="button"
                        class="filter-btn"
                        data-filter="belum">
                    Belum Dibaca
                </button>

                <button type="button"
                        class="filter-btn"
                        data-filter="laporan">
                    Laporan Siswa
                </button>

                <button type="button"
                        class="filter-btn"
                        data-filter="status">
                    Status Laporan
                </button>

                <button type="button"
                        class="filter-btn"
                        data-filter="tindak-lanjut">
                    Tindak Lanjut
                </button>
            </div>

            <!-- DAFTAR NOTIFIKASI -->
            <div class="notification-list" id="notificationList">

                @forelse($notifications as $notif)

                    @php
                        $isUnread = !$notif->is_read;

                        $iconClass = match($notif->type ?? 'laporan') {
                            'laporan' => 'fa-solid fa-file-circle-exclamation',
                            'status' => 'fa-solid fa-clipboard-check',
                            'tindak-lanjut' => 'fa-solid fa-comments',
                            default => 'fa-solid fa-bell'
                        };
                    @endphp

                    <article
                        class="notification-card {{ $isUnread ? 'unread' : '' }}"
                        data-id="{{ $notif->id_notifikasi }}"
                        data-type="{{ $notif->type ?? 'laporan' }}">

                        <div class="notification-icon">
                            <i class="{{ $iconClass }}"></i>
                        </div>

                        <div class="notification-body">

                            <h3 class="notification-title">
                                {{ $notif->judul }}
                            </h3>

                            <p class="notification-message">
                                {{ $notif->pesan }}
                            </p>

                            <span class="notification-meta">
                                {{ $notif->created_at->diffForHumans() }}
                                · Guru BK
                            </span>

                        </div>

                        @if($isUnread)
                            <span class="unread-dot"
                                  aria-label="Belum dibaca">
                            </span>
                        @endif

                    </article>

                @empty

                    <p class="notification-message">
                        Belum ada notifikasi Kesiswaan.
                    </p>

                @endforelse

            </div>

            <!-- PESAN KETIKA FILTER TIDAK MENEMUKAN DATA -->
            <div class="empty-state"
                 id="emptyState"
                 style="display: none;">
                Tidak ada notifikasi Kesiswaan untuk filter ini.
            </div>

        </section>

    </main>
</div>

<!-- JAVASCRIPT & AJAX -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    const filterButtons = document.querySelectorAll('.filter-btn');
    const notificationCards = document.querySelectorAll('.notification-card');
    const emptyState = document.getElementById('emptyState');
    const unreadCountElement = document.getElementById('unreadCount');
    const markAllButton = document.getElementById('markAll');

    let unreadCount = Number(unreadCountElement.textContent) || 0;

    // MEMPERBARUI JUMLAH NOTIFIKASI BELUM DIBACA
    function updateUnreadCount() {
        unreadCountElement.textContent = unreadCount;
    }

    // FILTER NOTIFIKASI
    function applyFilter(filter) {

        let visibleCount = 0;

        notificationCards.forEach(card => {

            const type = card.dataset.type;
            const isUnread = card.classList.contains('unread');

            const show =
                filter === 'semua' ||
                (filter === 'belum' && isUnread) ||
                filter === type;

            card.style.display = show ? 'flex' : 'none';

            if (show) {
                visibleCount++;
            }
        });

        if (emptyState) {
            emptyState.style.display =
                visibleCount === 0 ? 'block' : 'none';
        }
    }

    // KLIK TOMBOL FILTER
    filterButtons.forEach(button => {

        button.addEventListener('click', function () {

            filterButtons.forEach(item => {
                item.classList.remove('active');
            });

            this.classList.add('active');

            applyFilter(this.dataset.filter);
        });

    });

    // MENANDAI SATU NOTIFIKASI SUDAH DIBACA
    notificationCards.forEach(card => {

        card.addEventListener('click', function () {

            if (!card.classList.contains('unread')) {
                return;
            }

            const notifId = card.dataset.id;

            fetch(`/dashboard/bk/notifikasi/${notifId}/read`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then(response => {

                if (!response.ok) {
                    throw new Error('Gagal memperbarui notifikasi.');
                }

                card.classList.remove('unread');

                const dot = card.querySelector('.unread-dot');

                if (dot) {
                    dot.remove();
                }

                unreadCount = Math.max(0, unreadCount - 1);

                updateUnreadCount();

                const activeFilter =
                    document.querySelector('.filter-btn.active');

                if (activeFilter) {
                    applyFilter(activeFilter.dataset.filter);
                }

            })
            .catch(error => {
                console.error(error);
                alert('Notifikasi gagal ditandai sudah dibaca.');
            });

        });

    });

    // MENANDAI SEMUA NOTIFIKASI SUDAH DIBACA
    if (markAllButton) {

        markAllButton.addEventListener('click', function () {

            fetch('/dashboard/bk/notifikasi/mark-all', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then(response => {

                if (!response.ok) {
                    throw new Error('Gagal memperbarui notifikasi.');
                }

                notificationCards.forEach(card => {

                    card.classList.remove('unread');

                    const dot = card.querySelector('.unread-dot');

                    if (dot) {
                        dot.remove();
                    }

                });

                unreadCount = 0;

                updateUnreadCount();

                const activeFilter =
                    document.querySelector('.filter-btn.active');

                if (activeFilter) {
                    applyFilter(activeFilter.dataset.filter);
                }

            })
            .catch(error => {
                console.error(error);
                alert('Notifikasi gagal diperbarui.');
            });

        });

    }

    // FILTER AWAL SAAT HALAMAN DIBUKA
    applyFilter('semua');

});
</script>

</body>
</html>

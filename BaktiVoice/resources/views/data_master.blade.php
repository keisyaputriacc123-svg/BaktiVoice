<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaktiVoice - Data Master</title>

    <!-- Tailwind CSS untuk content body -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font dan ikon -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #96ace0;
            --background: #f8fafc;
            --card-bg: #ffffff;
            --border: #e2e8f0;
            --text-main: #496cbd;
            --text-muted: #64748b;
            --font-family: 'Inter', sans-serif;
            --sidebar-width: 250px;
            --topbar-height: 70px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: var(--font-family);
            background-color: var(--background);
            color: var(--text-main);
            min-height: 100vh;
        }

        /* =========================
        SIDEBAR
        ========================= */

        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--card-bg);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 24px 16px;
            overflow-y: auto;
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
            max-width: 60px;
            object-fit: contain;
            border-radius: 8px;
        }

        .brand-name {
            font-size: 20px;
            font-weight: 800;
            color: var(--text-main);
            white-space: nowrap;
        }

        .nav-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .nav-item a,
        .dropdown-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 12px 16px;
            color: var(--text-muted);
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            border-radius: 8px;
            transition: all 0.2s ease;
            background: none;
            border: none;
            cursor: pointer;
            font-family: inherit;
        }

        .nav-content {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-item a:hover,
        .dropdown-btn:hover {
            background-color: #f1f5f9;
            color: var(--text-main);
        }

        .nav-item.active > a,
        .nav-item.active > .dropdown-btn {
            background-color: var(--primary);
            color: #ffffff;
            font-weight: 600;
        }

        .nav-item i {
            font-size: 16px;
            width: 20px;
            text-align: center;
        }

        .arrow-icon {
            font-size: 12px !important;
            transition: transform 0.3s ease;
        }

        .sub-menu {
            list-style: none;
            display: none;
            flex-direction: column;
            gap: 4px;
            padding-left: 32px;
            margin-top: 4px;
        }

        .sub-menu.show {
            display: flex;
        }

        .sub-menu a {
            padding: 8px 12px;
            font-size: 13px;
            color: var(--text-muted);
            border-radius: 6px;
            text-decoration: none;
            display: block;
        }

        .sub-menu a:hover {
            background-color: #f1f5f9;
            color: var(--text-main);
        }

        .sub-menu a.sub-active {
            background-color: #eff6ff;
            color: #496cbd;
            font-weight: 600;
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: #ef4444;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            border-radius: 8px;
            transition: background 0.2s;
            margin-top: 16px;
        }

        .logout-btn:hover {
            background-color: #fef2f2;
        }

        /* =========================
        MAIN WRAPPER
        ========================= */

        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* =========================
        TOPBAR - SAMA DENGAN DASHBOARD
        ========================= */

        .topbar {
            height: var(--topbar-height);
            min-height: var(--topbar-height);
            background-color: var(--card-bg);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: flex-end;
            padding: 0 36px;
            gap: 20px;
            position: sticky;
            top: 0;
            z-index: 90;
        }

        .topbar-icon {
            color: var(--text-muted);
            font-size: 18px;
            cursor: pointer;
            position: relative;
            padding: 8px;
            border-radius: 50%;
            transition: background 0.2s;
            border: none;
            background: none;
        }

        .topbar-icon:hover {
            background-color: #f1f5f9;
            color: var(--text-main);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            border-radius: 50%;
            background-color: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-size: 16px;
        }

        .user-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-main);
        }

        /* CONTENT BODY */
        .content-area {
            flex: 1;
            min-width: 0;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                padding: 16px 8px;
            }

            .brand {
                padding: 0 4px 24px;
                justify-content: center;
            }

            .brand-logo-img {
                width: 45px;
                height: 45px;
            }

            .brand-name,
            .nav-item > a span,
            .dropdown-btn span,
            .logout-btn span,
            .arrow-icon,
            .sub-menu {
                display: none !important;
            }

            .nav-item a,
            .dropdown-btn {
                justify-content: center;
                padding: 12px 8px;
            }

            .nav-content {
                justify-content: center;
            }

            .nav-item i {
                width: auto;
            }

            .main-wrapper {
                margin-left: 70px;
            }

            .topbar {
                padding: 0 16px;
                gap: 12px;
            }

            .user-name {
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            .user-name {
                display: none;
            }
        }
    </style>
</head>

<body>

    <!-- =========================
        SIDEBAR
    ========================= -->

    <aside class="sidebar">
        <div>
            <div class="brand">
                <img
                    src="{{ asset('images/logo BaktiVoice.png') }}"
                    alt="Logo BaktiVoice"
                    class="brand-logo-img"
                >
                <span class="brand-name">BaktiVoice</span>
            </div>

            <ul class="nav-menu">

                <!-- Laporan -->
                <li class="nav-item">
                    <a href="{{ url('/dashboard/admin') }}">
                        <div class="nav-content">
                            <i class="fa-regular fa-file-lines"></i>
                            <span>Laporan</span>
                        </div>
                    </a>
                </li>

                <!-- Data Master aktif -->
                <li class="nav-item active">
                    <button
                        type="button"
                        class="dropdown-btn"
                        onclick="toggleDataMaster()"
                        aria-expanded="true"
                    >
                        <div class="nav-content">
                            <i class="fa-solid fa-database"></i>
                            <span>Data Master</span>
                        </div>

                        <i
                            class="fa-solid fa-chevron-down arrow-icon"
                            id="masterArrow"
                            style="transform: rotate(180deg);"
                        ></i>
                    </button>

                    <ul class="sub-menu show" id="masterMenu">
                        <li>
                            <a href="#"
                               onclick="switchTab('kategori'); return false;"
                               id="sub-kategori">
                                Kategori Laporan
                            </a>
                        </li>

                        <li>
                            <a href="#"
                               onclick="switchTab('status'); return false;"
                               id="sub-status">
                                Status Laporan
                            </a>
                        </li>

                        <li>
                            <a href="#"
                               onclick="switchTab('users'); return false;"
                               id="sub-users"
                               class="sub-active">
                                User & Role
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Rekap Laporan -->
                <li class="nav-item">
                    <a href="#">
                        <div class="nav-content">
                            <i class="fa-solid fa-chart-column"></i>
                            <span>Rekap Laporan</span>
                        </div>
                    </a>
                </li>

                <!-- Notifikasi -->
                <li class="nav-item">
                    <a href="#">
                        <div class="nav-content">
                            <i class="fa-regular fa-bell"></i>
                            <span>Notifikasi</span>
                        </div>
                    </a>
                </li>

                <!-- Profil -->
                <li class="nav-item">
                    <a href="#">
                        <div class="nav-content">
                            <i class="fa-regular fa-user"></i>
                            <span>Profil</span>
                        </div>
                    </a>
                </li>

            </ul>
        </div>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                type="submit"
                class="logout-btn"
                style="width: 100%; background: none; border: none; cursor: pointer; font-family: inherit; text-align: left;"
            >
                <i class="fa-solid fa-xmark"></i>
                <span>Logout</span>
            </button>
        </form>
    </aside>

    <!-- =========================
        MAIN WRAPPER
    ========================= -->

    <div class="main-wrapper">

        <!-- TOPBAR -->
        <header class="topbar">
            <button class="topbar-icon" type="button" title="Notifikasi">
                <i class="fa-regular fa-bell"></i>
            </button>

            <div class="user-profile">
                <div class="avatar">
                    <i class="fa-regular fa-user"></i>
                </div>

                <span class="user-name">
                    {{ Auth::user()->name ?? 'Admin Sekolah' }}
                </span>
            </div>
        </header>

        <!-- =========================
        CONTENT BODY DATA MASTER
        ========================= -->

        <main class="content-area">

            <!-- Page Header -->
            <div class="p-8 max-w-7xl w-full mx-auto space-y-6">

                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h1 class="text-2xl font-extrabold text-blue-900 tracking-tight" id="pageTitle">
                            Data Master
                        </h1>
                        <p class="text-sm text-gray-500 mt-1" id="pageDesc">
                            Kelola data pengguna serta pembagian hak akses role di lingkungan sekolah.
                        </p>
                    </div>

                    <button
                        onclick="openModal()"
                        class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2.5 rounded-xl shadow-sm transition"
                    >
                        <i class="fa-solid fa-plus"></i>
                        <span id="btnAddText">Tambah User</span>
                    </button>
                </div>

                <!-- STATS CARDS -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm text-center">
                        <span class="text-xs font-bold text-gray-400 tracking-wider uppercase">TOTAL USERS</span>
                        <div class="text-3xl font-extrabold text-gray-800 mt-1">{{ $totalUsers }}</div>
                    </div>

                    <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm text-center">
                        <span class="text-xs font-bold text-gray-400 tracking-wider uppercase">TOTAL SISWA</span>
                        <div class="text-3xl font-extrabold text-orange-500 mt-1">{{ $totalSiswa }}</div>
                    </div>

                    <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm text-center">
                        <span class="text-xs font-bold text-gray-400 tracking-wider uppercase">GURU BK & WAKASEK</span>
                        <div class="text-3xl font-extrabold text-emerald-500 mt-1">{{ $totalBkWakasek }}</div>
                    </div>

                    <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm text-center">
                        <span class="text-xs font-bold text-gray-400 tracking-wider uppercase">Admin</span>
                        <div class="text-3xl font-extrabold text-red-500 mt-1">{{ $totalAdmin }}</div>
                    </div>
                </div>

                <!-- TABLE CONTAINER -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

                   <!-- TAB 1: USERS & ROLE -->
<div id="tab-users" class="tab-content">
    <div class="p-4 border-b border-gray-100 bg-gray-50/50 flex flex-col sm:flex-row justify-between gap-3">
        <!-- Form Pencarian Nama / Email -->
        <form action="{{ url()->current() }}" method="GET" class="relative flex-1 max-w-xs">
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3 text-gray-400 text-sm"></i>
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari nama atau email..."
                class="w-full pl-9 pr-4 py-2 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-blue-500"
                onkeydown="if(event.key === 'Enter') this.form.submit();"
            >
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-50 text-gray-500 border-b border-gray-100 uppercase text-[11px] font-bold tracking-wider">
                <tr>
                    <th class="py-3.5 px-6">Nama Pengguna</th>
                    <th class="py-3.5 px-6">Email / Username</th>
                    <th class="py-3.5 px-6">Role / Jabatan</th>
                    <th class="py-3.5 px-6 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 font-medium text-gray-700">
                @forelse($users as $user)
                    <tr class="hover:bg-gray-50/60 transition">
                        <!-- Kolom Nama & Avatar -->
                        <td class="py-4 px-6">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs uppercase">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <span class="font-semibold text-gray-800">{{ $user->name }}</span>
                            </div>
                        </td>

                        <!-- Kolom Email -->
                        <td class="py-4 px-6 text-gray-500">{{ $user->email }}</td>

                        <!-- Kolom Role -->
                        <td class="py-4 px-6">
                            @php
                                $roleLower = strtolower($user->role);
                                $badgeClass = 'bg-gray-100 text-gray-700';
                                if ($roleLower === 'admin') {
                                    $badgeClass = 'bg-purple-50 text-purple-600';
                                } elseif ($roleLower === 'siswa') {
                                    $badgeClass = 'bg-orange-50 text-orange-600';
                                } elseif (str_contains($roleLower, 'bk') || str_contains($roleLower, 'wakasek')) {
                                    $badgeClass = 'bg-teal-50 text-teal-700';
                                }
                            @endphp
                            <span class="px-3 py-1 {{ $badgeClass }} font-semibold text-xs rounded-full capitalize">
                                {{ $user->role }}
                            </span>
                        </td>

                        <!-- Kolom Aksi -->
                        <td class="py-4 px-6 text-center space-x-2">
                            <!-- Tombol Edit (Membuka Modal Dinamis dengan Data User) -->
                            <button type="button"
                                    onclick="openEditModal('users', {
                                        id: '{{ $user->id_user ?? $user->id }}',
                                        name: '{{ $user->name }}',
                                        email: '{{ $user->email }}',
                                        role: '{{ $user->role }}'
                                    })"
                                    class="text-blue-600 hover:text-blue-800"
                                    title="Edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>

                            <!-- Form Hapus User -->
                            <form action="{{ route('user.destroy', $user->id_user ?? $user->id) }}"
                                  method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 bg-transparent border-none cursor-pointer" title="Hapus">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="py-6 text-center text-gray-400 text-sm">
                            Belum ada data pengguna yang tersedia.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

                  <!-- TAB 2: KATEGORI LAPORAN -->
<div id="tab-kategori" class="tab-content hidden">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden p-6">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 text-gray-500 border-b border-gray-100 uppercase text-[11px] font-bold tracking-wider">
                    <tr>
                        <th class="py-3.5 px-6">#</th>
                        <th class="py-3.5 px-6">Nama Kategori</th>
                        <th class="py-3.5 px-6">Penanggung Jawab (Role)</th>
                        <th class="py-3.5 px-6 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100 font-medium text-gray-700">
                    @forelse($kategoris as $index => $kategori)
                        <tr class="hover:bg-gray-50/60 transition">
                            <!-- Nomor Urut Otomatis -->
                            <td class="py-4 px-6 font-bold text-gray-400">{{ $index + 1 }}</td>

                            <!-- Nama Kategori dari Database -->
                            <td class="py-4 px-6 font-semibold text-gray-800">{{ $kategori->nama_kategori }}</td>

                            <!-- Penanggung Jawab dari Database -->
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 bg-indigo-50 text-indigo-700 font-semibold text-xs rounded-full">
                                    {{ $kategori->penanggung_jawab ?? 'Wakasek / Guru BK' }}
                                </span>
                            </td>

                            <!-- Tombol Aksi (Edit & Hapus) -->
                            <td class="py-4 px-6 text-center space-x-2">
                                <!-- Tombol Edit Kategori (Memanggil Modal Dinamis) -->
                                <button type="button"
                                        onclick="openEditModal('kategori', {
                                            id: '{{ $kategori->id_kategori ?? $kategori->id }}',
                                            nama_kategori: '{{ $kategori->nama_kategori }}',
                                            penanggung_jawab: '{{ $kategori->penanggung_jawab }}'
                                        })"
                                        class="text-blue-600 hover:text-blue-800 bg-transparent border-none cursor-pointer"
                                        title="Edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </button>

                                <!-- Form Tombol Hapus Kategori -->
                                <form action="{{ route('kategori.destroy', $kategori->id_kategori ?? $kategori->id) }}"
                                      method="POST"
                                      class="inline-block"
                                      onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 bg-transparent border-none cursor-pointer" title="Hapus">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <!-- Jika data kategori kosong -->
                        <tr>
                            <td colspan="4" class="py-6 text-center text-gray-400 text-sm">
                                Belum ada data kategori laporan yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

                 <!-- TAB 3: STATUS LAPORAN -->
<div id="tab-status" class="tab-content hidden">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden p-6">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-gray-50 text-gray-500 border-b border-gray-100 uppercase text-[11px] font-bold tracking-wider">
                    <tr>
                        <th class="py-3.5 px-6">Nama Status</th>
                        <th class="py-3.5 px-6">Tampilan Badge</th>
                        <th class="py-3.5 px-6">Deskripsi Keterangan</th>
                        <th class="py-3.5 px-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 font-medium text-gray-700">
                    @forelse($statusLaporan as $item)
                    <tr class="hover:bg-gray-50/60 transition">
                        <td class="py-4 px-6 font-semibold text-gray-800">{{ $item->nama_status }}</td>
                        <td class="py-4 px-6">
                            <span class="px-3 py-1 font-semibold text-xs rounded-full bg-emerald-100 text-emerald-700">
                                {{ $item->nama_status }}
                            </span>
                        </td>
                        <td class="py-4 px-6 text-gray-500">{{ $item->deskripsi_keterangan ?? '-' }}</td>

                        <!-- KOLOM AKSI (Tombol Edit & Hapus) -->
                        <td class="py-4 px-6 text-center space-x-2">
                            <!-- Tombol Edit yang memanggil modal dinamis -->
                            <button type="button"
                                    onclick="openEditModal('status', {
                                        id: '{{ $item->id_status ?? $item->id }}',
                                        nama_status: '{{ $item->nama_status }}',
                                        deskripsi: '{{ $item->deskripsi_keterangan ?? '' }}'
                                    })"
                                    class="text-blue-600 hover:text-blue-800 bg-transparent border-none cursor-pointer"
                                    title="Edit">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </button>

                            <!-- Form Hapus -->
                            <form action="{{ route('status.destroy', $item->id_status ?? $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus status ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 bg-transparent border-none cursor-pointer" title="Hapus">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-6 text-center text-gray-400 text-sm">
                            Belum ada data status laporan yang tersedia.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL DINAMIS BERSAMA (UNTUK SEMUA TAB) -->
<div id="modalData" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-50 items-center justify-center hidden p-4">
    <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-xl space-y-5">
        <div class="flex items-center justify-between border-b border-gray-100 pb-3">
            <h3 id="modalTitle" class="text-lg font-bold text-gray-800">Tambah Data</h3>
            <button onclick="closeModal()" type="button" class="text-gray-400 hover:text-gray-600">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>

        <form id="formModalData" method="POST" action="{{ route('user.store') }}" class="space-y-4">
            @csrf


            <input type="hidden" name="active_tab" id="activeTabInput" value="users">

            <!-- Input Utama (Nama / Nama Kategori / Nama Status) -->
            <div>
                <label id="inputLabel" class="block text-xs font-bold text-gray-500 uppercase mb-1">
                    Nama Lengkap
                </label>
                <input
                    type="text"
                    id="inputNama"
                    name="name"
                    required
                    placeholder="Masukkan nama..."
                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-blue-500"
                >
            </div>

            <!-- Field Deskripsi Keterangan (Khusus Tab Status Laporan) -->
            <div id="statusFields" class="hidden">
                <label class="block text-xs font-bold text-gray-500 uppercase mb-1">
                    Deskripsi Keterangan
                </label>
                <textarea name="deskripsi_keterangan" id="inputDeskripsi" rows="3"
                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-blue-500"
                    placeholder="Masukkan keterangan singkat..."></textarea>
            </div>

            <!-- Field Penanggung Jawab (Khusus Kategori Laporan) -->
            <div id="penanggungJawabField" class="hidden">
                <label class="block text-xs font-bold text-gray-500 uppercase mb-1">
                    Penanggung Jawab (Role)
                </label>
                <select name="penanggung_jawab" id="inputPenanggungJawab" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
                    <option value="guru_bk">Guru BK</option>
                    <option value="wakasek kesiswaan">Wakasek Kesiswaan</option>
                    <option value="wakasek kurikulum">Wakasek Kurikulum</option>
                    <option value="wakasek sarana">Wakasek Sarana Prasarana</option>
                    <option value="wakasek dudi">Wakasek DUDI (Humas)</option>
                </select>
            </div>

            <!-- Field Role Akses (Khusus User & Role) -->
            <div id="roleSelectField">
                <label class="block text-xs font-bold text-gray-500 uppercase mb-1">
                    Pilih Role Akses
                </label>
                <select name="role" id="inputRole" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
                    <option value="siswa">Siswa</option>
                    <option value="admin">Admin</option>
                    <option value="guru_bk">Guru BK</option>
                    <option value="wakasek kurikulum">Wakasek Kurikulum</option>
                    <option value="wakasek kesiswaan">Wakasek Kesiswaan</option>
                    <option value="wakasek sarana">Wakasek Sarana</option>
                    <option value="wakasek dudi">Wakasek DUDI</option>
                </select>
            </div>

            <!-- Field Email (Khusus User & Role) -->
            <div id="emailField">
                <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Email</label>
                <input type="email" id="inputEmail" name="email" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
            </div>

            <!-- Field Password (Khusus User & Role) -->
            <div id="passwordField" class="space-y-1">
                <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <i class="fa-solid fa-lock text-sm"></i>
                    </span>
                    <input
                        type="password"
                        name="password"
                        id="passwordInput"
                        placeholder="Minimal 8 karakter"
                        class="w-full pl-10 pr-10 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-blue-500"
                    >
                </div>
                <p id="passwordNote" class="text-[11px] text-gray-400 hidden">*Kosongkan jika tidak ingin mengubah password</p>
            </div>

            <!-- Tombol Aksi -->
            <div class="flex justify-end gap-3 border-t border-gray-100 pt-4">
                <button type="button" onclick="closeModal()" class="px-4 py-2 text-sm font-semibold text-gray-500 rounded-xl hover:bg-gray-100">
                    Batal
                </button>
                <button type="submit" class="px-5 py-2 text-sm font-semibold bg-blue-600 text-white rounded-xl hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ========================= -->
<!--      JAVASCRIPT GABUNGAN  -->
<!-- ========================= -->

<script>
let currentTab = 'users';

// Membuka dan menutup menu Data Master
function toggleDataMaster() {
    const menu = document.getElementById('masterMenu');
    const arrow = document.getElementById('masterArrow');
    const button = document.querySelector('.dropdown-btn');

    if (!menu || !arrow || !button) return;

    menu.classList.toggle('show');

    const isOpen = menu.classList.contains('show');

    arrow.style.transform = isOpen
        ? 'rotate(180deg)'
        : 'rotate(0deg)';

    button.setAttribute('aria-expanded', isOpen);
}

// Memilih tab Data Master
function switchTab(tab) {
    if (!['users', 'kategori', 'status'].includes(tab)) {
        tab = 'users';
    }

    currentTab = tab;

    const activeTabInput = document.getElementById('activeTabInput');
    if (activeTabInput) {
        activeTabInput.value = tab;
    }

    // 1. Sembunyikan semua konten tab
    document.querySelectorAll('.tab-content').forEach(el => {
        el.classList.add('hidden');
    });

    // 2. Hapus kelas aktif dari semua menu sidebar
    document.querySelectorAll('.sub-menu a').forEach(link => {
        link.classList.remove('sub-active');
    });

    // 3. Tampilkan konten tab yang dipilih secara eksplisit
    const activeContent = document.getElementById(`tab-${tab}`);
    const activeLink = document.getElementById(`sub-${tab}`);

    if (activeContent) {
        activeContent.classList.remove('hidden');
    }
    if (activeLink) {
        activeLink.classList.add('sub-active');
    }

    const pageTitle = document.getElementById('pageTitle');
    const pageDesc = document.getElementById('pageDesc');
    const btnAddText = document.getElementById('btnAddText');

    const tabSettings = {
        users: {
            title: 'Data Master - Users & Role',
            desc: 'Kelola data pengguna serta pembagian hak akses role di lingkungan sekolah.',
            button: 'Tambah User'
        },
        kategori: {
            title: 'Data Master - Kategori Laporan',
            desc: 'Kelola jenis kategori laporan pengaduan beserta penanggung jawab bidang.',
            button: 'Tambah Kategori'
        },
        status: {
            title: 'Data Master - Status Laporan',
            desc: 'Kelola tahapan status progres laporan.',
            button: 'Tambah Status'
        }
    };

    const settings = tabSettings[tab];

    if (pageTitle) pageTitle.innerText = settings.title;
    if (pageDesc) pageDesc.innerText = settings.desc;
    if (btnAddText) btnAddText.innerText = settings.button;
}

// ==========================================
// 1. MEMBUKA MODAL TAMBAH DATA (DINAMIS TAB)
// ==========================================
function openModal() {
    const modal = document.getElementById('modalData');
    const form = document.getElementById('formModalData');
    const modalTitle = document.getElementById('modalTitle');
    const inputNama = document.getElementById('inputNama');
    const inputLabel = document.getElementById('inputLabel');
    const activeTabInput = document.getElementById('activeTabInput');

    const roleSelectField = document.getElementById('roleSelectField');
    const emailField = document.getElementById('emailField');
    const passwordField = document.getElementById('passwordField');
    const kategoriFields = document.getElementById('kategoriFields');
    const statusFields = document.getElementById('statusFields');
    const penanggungJawabField = document.getElementById('penanggungJawabField');

    if (!modal || !form || !modalTitle || !inputNama) {
        console.error('Elemen modal atau form tidak ditemukan.');
        return;
    }

    // Reset Form ke keadaan awal (Mode Tambah)
    form.reset();

    // Hapus method PUT jika sebelumnya sempat dipakai untuk edit
    let methodInput = form.querySelector('input[name="_method"]');
    if (methodInput) methodInput.remove();

    if (activeTabInput) {
        activeTabInput.value = currentTab;
    }

    const emailInput = emailField?.querySelector('input');
    const passwordInput = passwordField?.querySelector('input');

    // Reset required attributes
    if (emailInput) emailInput.required = false;
    if (passwordInput) passwordInput.required = false;

    // Tampilkan / Sembunyikan field berdasarkan tab yang aktif
    const isUserTab = currentTab === 'users';
    const isCategoryTab = currentTab === 'kategori';
    const isStatusTab = currentTab === 'status';

    if (roleSelectField) roleSelectField.classList.toggle('hidden', !isUserTab);
    if (emailField) emailField.classList.toggle('hidden', !isUserTab);
    if (passwordField) passwordField.classList.toggle('hidden', !isUserTab);
    if (kategoriFields) kategoriFields.classList.toggle('hidden', !isCategoryTab);
    if (statusFields) statusFields.classList.toggle('hidden', !isStatusTab);
    if (penanggungJawabField) penanggungJawabField.classList.toggle('hidden', !isCategoryTab);

    // Tampilkan catatan password (sembunyikan saat tambah baru)
    const passwordNote = document.getElementById('passwordNote');
    if (passwordNote) passwordNote.classList.add('hidden');

    if (isUserTab) {
        modalTitle.innerText = 'Tambah User Baru';
        if (inputLabel) inputLabel.innerText = 'NAMA LENGKAP';
        form.action = "{{ route('user.store') }}";

        inputNama.name = 'name';
        inputNama.placeholder = 'Masukkan nama pengguna...';

        if (emailInput) emailInput.required = true;
        if (passwordInput) passwordInput.required = true;

    } else if (isCategoryTab) {
        modalTitle.innerText = 'Tambah Kategori Laporan';
        if (inputLabel) inputLabel.innerText = 'NAMA KATEGORI';
        form.action = "{{ route('kategori.store') }}";

        inputNama.name = 'nama_kategori';
        inputNama.placeholder = 'Masukkan nama kategori...';

    } else if (isStatusTab) {
        modalTitle.innerText = 'Tambah Status Laporan';
        if (inputLabel) inputLabel.innerText = 'NAMA STATUS';
        form.action = "{{ route('status.store') }}";

        inputNama.name = 'nama_status';
        inputNama.placeholder = 'Masukkan nama status (Contoh: Selesai)...';
    }

    inputNama.required = true;

    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

// ==========================================
// 2. MEMBUKA MODAL EDIT DATA (SEMUA TAB)
// ==========================================
function openEditModal(tab, data) {
    const modal = document.getElementById('modalData');
    const form = document.getElementById('formModalData');
    const modalTitle = document.getElementById('modalTitle');
    const inputNama = document.getElementById('inputNama');
    const inputLabel = document.getElementById('inputLabel');
    const activeTabInput = document.getElementById('activeTabInput');

    const roleSelectField = document.getElementById('roleSelectField');
    const emailField = document.getElementById('emailField');
    const passwordField = document.getElementById('passwordField');
    const kategoriFields = document.getElementById('kategoriFields');
    const statusFields = document.getElementById('statusFields');
    const penanggungJawabField = document.getElementById('penanggungJawabField');

    if (!modal || !form) return;

    modal.classList.remove('hidden');
    modal.classList.add('flex');

    if (activeTabInput) activeTabInput.value = tab;

    // Tambahkan method HTTP _method = PUT untuk proses update di Laravel
    let methodInput = form.querySelector('input[name="_method"]');
    if (!methodInput) {
        methodInput = document.createElement('input');
        methodInput.type = 'hidden';
        methodInput.name = '_method';
        form.appendChild(methodInput);
    }
    methodInput.value = 'PUT';

    // ------------------------------------
    // JIKA TAB USERS
    // ------------------------------------
    if (tab === 'users') {
        if (modalTitle) modalTitle.innerText = "Edit Data User";
        if (inputLabel) inputLabel.innerText = "NAMA LENGKAP";
        form.action = `/data_master/${data.id}`;

        if (roleSelectField) roleSelectField.classList.remove('hidden');
        if (emailField) emailField.classList.remove('hidden');
        if (passwordField) roleSelectField ? passwordField.classList.remove('hidden') : null;
        if (statusFields) statusFields.classList.add('hidden');
        if (penanggungJawabField) penanggungJawabField.classList.add('hidden');
        if (kategoriFields) kategoriFields.classList.add('hidden');

        if (inputNama) {
            inputNama.name = 'name';
            inputNama.value = data.name || '';
        }

        const emailInput = emailField?.querySelector('input');
        if (emailInput) {
            emailInput.value = data.email || '';
            emailInput.required = true;
        }

        const inputRole = document.getElementById('inputRole');
        if (inputRole) inputRole.value = data.role || 'siswa';

        const passwordInput = passwordField?.querySelector('input');
        if (passwordInput) {
            passwordInput.value = '';
            passwordInput.required = false;
        }

        const passwordNote = document.getElementById('passwordNote');
        if (passwordNote) passwordNote.classList.remove('hidden');

    // ------------------------------------
    // JIKA TAB KATEGORI LAPORAN
    // ------------------------------------
    } else if (tab === 'kategori') {
        if (modalTitle) modalTitle.innerText = "Edit Kategori Laporan";
        if (inputLabel) inputLabel.innerText = "NAMA KATEGORI";
        form.action = `/data_master/kategori/${data.id}`;

        if (roleSelectField) roleSelectField.classList.add('hidden');
        if (emailField) emailField.classList.add('hidden');
        if (passwordField) passwordField.classList.add('hidden');
        if (statusFields) statusFields.classList.add('hidden');
        if (penanggungJawabField) penanggungJawabField.classList.remove('hidden');
        if (kategoriFields) kategoriFields.classList.add('hidden');

        if (inputNama) {
            inputNama.name = 'nama_kategori';
            inputNama.value = data.nama_kategori || '';
        }

        const inputPJ = document.getElementById('inputPenanggungJawab');
        if (inputPJ) inputPJ.value = data.penanggung_jawab || '';

        const passwordNote = document.getElementById('passwordNote');
        if (passwordNote) passwordNote.classList.add('hidden');

    // ------------------------------------
    // JIKA TAB STATUS LAPORAN
    // ------------------------------------
    } else if (tab === 'status') {
        if (modalTitle) modalTitle.innerText = "Edit Status Laporan";
        if (inputLabel) inputLabel.innerText = "NAMA STATUS";
        form.action = `/data_master/status/${data.id}`;

        if (roleSelectField) roleSelectField.classList.add('hidden');
        if (emailField) emailField.classList.add('hidden');
        if (passwordField) passwordField.classList.add('hidden');
        if (penanggungJawabField) penanggungJawabField.classList.add('hidden');
        if (statusFields) statusFields.classList.remove('hidden');
        if (kategoriFields) kategoriFields.classList.add('hidden');

        if (inputNama) {
            inputNama.name = 'nama_status';
            inputNama.value = data.nama_status || '';
        }

        const inputDeskripsi = document.getElementById('inputDeskripsi');
        if (inputDeskripsi) inputDeskripsi.value = data.deskripsi || '';

        const passwordNote = document.getElementById('passwordNote');
        if (passwordNote) passwordNote.classList.add('hidden');
    }
}

// Menutup modal
function closeModal() {
    const modal = document.getElementById('modalData');

    if (modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
}

// Fungsi untuk menampilkan / menyembunyikan password (Tombol Mata)
function togglePasswordVisibility() {
    const passwordInput = document.getElementById('passwordInput');
    const eyeIcon = document.getElementById('eyeIcon');

    if (!passwordInput || !eyeIcon) return;

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.classList.remove('fa-eye-slash');
        eyeIcon.classList.add('fa-eye');
    } else {
        passwordInput.type = 'password';
        eyeIcon.classList.remove('fa-eye');
        eyeIcon.classList.add('fa-eye-slash');
    }
}

// Mengaktifkan tab berdasarkan URL saat halaman dimuat
document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const tabParam = urlParams.get('tab');

    if (tabParam) {
        switchTab(tabParam);
    } else {
        switchTab('users');
    }
});
</script>

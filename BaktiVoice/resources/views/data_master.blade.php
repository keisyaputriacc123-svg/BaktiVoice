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
                        <div class="text-3xl font-extrabold text-gray-800 mt-1">128</div>
                    </div>

                    <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm text-center">
                        <span class="text-xs font-bold text-gray-400 tracking-wider uppercase">TOTAL SISWA</span>
                        <div class="text-3xl font-extrabold text-orange-500 mt-1">115</div>
                    </div>

                    <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm text-center">
                        <span class="text-xs font-bold text-gray-400 tracking-wider uppercase">GURU BK & WAKASEK</span>
                        <div class="text-3xl font-extrabold text-emerald-500 mt-1">11</div>
                    </div>

                    <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm text-center">
                        <span class="text-xs font-bold text-gray-400 tracking-wider uppercase">ADMIN</span>
                        <div class="text-3xl font-extrabold text-red-500 mt-1">2</div>
                    </div>
                </div>

                <!-- TABLE CONTAINER -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

                    <!-- TAB 1: USERS & ROLE -->
                    <div id="tab-users" class="tab-content">
                        <div class="p-4 border-b border-gray-100 bg-gray-50/50 flex flex-col sm:flex-row justify-between gap-3">
                            <div class="relative flex-1 max-w-xs">
                                <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3 text-gray-400 text-sm"></i>
                                <input
                                    type="text"
                                    placeholder="Cari nama atau email..."
                                    class="w-full pl-9 pr-4 py-2 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-blue-500"
                                >
                            </div>
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
                                    <tr class="hover:bg-gray-50/60 transition">
                                        <td class="py-4 px-6">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">A</div>
                                                <span class="font-semibold text-gray-800">Budi Santoso</span>
                                            </div>
                                        </td>
                                        <td class="py-4 px-6 text-gray-500">budi.admin@bakti.sch.id</td>
                                        <td class="py-4 px-6"><span class="px-3 py-1 bg-purple-50 text-purple-600 font-semibold text-xs rounded-full">Admin</span></td>
                                        <td class="py-4 px-6 text-center space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i class="fa-regular fa-trash-can"></i></button>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50/60 transition">
                                        <td class="py-4 px-6">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs">S</div>
                                                <span class="font-semibold text-gray-800">Siti Aminah</span>
                                            </div>
                                        </td>
                                        <td class="py-4 px-6 text-gray-500">siti.bk@bakti.sch.id</td>
                                        <td class="py-4 px-6"><span class="px-3 py-1 bg-emerald-50 text-emerald-600 font-semibold text-xs rounded-full">Guru BK</span></td>
                                        <td class="py-4 px-6 text-center space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i class="fa-regular fa-trash-can"></i></button>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50/60 transition">
                                        <td class="py-4 px-6">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center font-bold text-xs">W</div>
                                                <span class="font-semibold text-gray-800">Drs. Ahmad Dahlan</span>
                                            </div>
                                        </td>
                                        <td class="py-4 px-6 text-gray-500">ahmad.kurikulum@bakti.sch.id</td>
                                        <td class="py-4 px-6"><span class="px-3 py-1 bg-amber-50 text-amber-700 font-semibold text-xs rounded-full">Wakasek Kurikulum</span></td>
                                        <td class="py-4 px-6 text-center space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i class="fa-regular fa-trash-can"></i></button>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50/60 transition">
                                        <td class="py-4 px-6">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-xs">M</div>
                                                <span class="font-semibold text-gray-800">Muhammad Hatta</span>
                                            </div>
                                        </td>
                                        <td class="py-4 px-6 text-gray-500">hatta.kesiswaan@bakti.sch.id</td>
                                        <td class="py-4 px-6"><span class="px-3 py-1 bg-indigo-50 text-indigo-700 font-semibold text-xs rounded-full">Wakasek Kesiswaan</span></td>
                                        <td class="py-4 px-6 text-center space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i class="fa-regular fa-trash-can"></i></button>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50/60 transition">
                                        <td class="py-4 px-6">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-teal-100 text-teal-600 flex items-center justify-center font-bold text-xs">E</div>
                                                <span class="font-semibold text-gray-800">Eka Rahmawati</span>
                                            </div>
                                        </td>
                                        <td class="py-4 px-6 text-gray-500">eka.dudi@bakti.sch.id</td>
                                        <td class="py-4 px-6"><span class="px-3 py-1 bg-teal-50 text-teal-700 font-semibold text-xs rounded-full">Wakasek DUDI</span></td>
                                        <td class="py-4 px-6 text-center space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i class="fa-regular fa-trash-can"></i></button>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50/60 transition">
                                        <td class="py-4 px-6">
                                            <div class="flex items-center gap-3">
                                                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">R</div>
                                                <span class="font-semibold text-gray-800">Rizky Pratama</span>
                                            </div>
                                        </td>
                                        <td class="py-4 px-6 text-gray-500">0051234567 (NISN)</td>
                                        <td class="py-4 px-6"><span class="px-3 py-1 bg-blue-50 text-blue-600 font-semibold text-xs rounded-full">Siswa</span></td>
                                        <td class="py-4 px-6 text-center space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i class="fa-regular fa-trash-can"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- TAB 2: KATEGORI LAPORAN -->
                    <div id="tab-kategori" class="tab-content hidden">
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
                                    <tr class="hover:bg-gray-50/60 transition">
                                        <td class="py-4 px-6 font-bold text-gray-400">1</td>
                                        <td class="py-4 px-6 font-semibold text-gray-800">Kesiswaan</td>
                                        <td class="py-4 px-6"><span class="px-3 py-1 bg-indigo-50 text-indigo-700 font-semibold text-xs rounded-full">Wakasek Kesiswaan / Guru BK</span></td>
                                        <td class="py-4 px-6 text-center space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i class="fa-regular fa-trash-can"></i></button>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50/60 transition">
                                        <td class="py-4 px-6 font-bold text-gray-400">2</td>
                                        <td class="py-4 px-6 font-semibold text-gray-800">Kurikulum</td>
                                        <td class="py-4 px-6"><span class="px-3 py-1 bg-amber-50 text-amber-700 font-semibold text-xs rounded-full">Wakasek Kurikulum</span></td>
                                        <td class="py-4 px-6 text-center space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i class="fa-regular fa-trash-can"></i></button>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50/60 transition">
                                        <td class="py-4 px-6 font-bold text-gray-400">3</td>
                                        <td class="py-4 px-6 font-semibold text-gray-800">Sarana dan Prasarana</td>
                                        <td class="py-4 px-6"><span class="px-3 py-1 bg-purple-50 text-purple-700 font-semibold text-xs rounded-full">Wakasek Sarana</span></td>
                                        <td class="py-4 px-6 text-center space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i class="fa-regular fa-trash-can"></i></button>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50/60 transition">
                                        <td class="py-4 px-6 font-bold text-gray-400">4</td>
                                        <td class="py-4 px-6 font-semibold text-gray-800">DUDI (Dunia Usaha & Industri)</td>
                                        <td class="py-4 px-6"><span class="px-3 py-1 bg-teal-50 text-teal-700 font-semibold text-xs rounded-full">Wakasek DUDI</span></td>
                                        <td class="py-4 px-6 text-center space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i class="fa-regular fa-trash-can"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- TAB 3: STATUS LAPORAN -->
                    <div id="tab-status" class="tab-content hidden">
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
                                    <tr class="hover:bg-gray-50/60 transition">
                                        <td class="py-4 px-6 font-semibold text-gray-800">Menunggu</td>
                                        <td class="py-4 px-6"><span class="px-3 py-1 bg-gray-100 text-gray-600 font-semibold text-xs rounded-full">Menunggu</span></td>
                                        <td class="py-4 px-6 text-gray-500">Laporan baru dikirim oleh siswa & belum diverifikasi.</td>
                                        <td class="py-4 px-6 text-center space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i class="fa-regular fa-trash-can"></i></button>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50/60 transition">
                                        <td class="py-4 px-6 font-semibold text-gray-800">Diproses</td>
                                        <td class="py-4 px-6"><span class="px-3 py-1 bg-amber-100 text-amber-700 font-semibold text-xs rounded-full">Diproses</span></td>
                                        <td class="py-4 px-6 text-gray-500">Laporan sedang dalam tindak lanjut oleh pihak terkait.</td>
                                        <td class="py-4 px-6 text-center space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i class="fa-regular fa-trash-can"></i></button>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50/60 transition">
                                        <td class="py-4 px-6 font-semibold text-gray-800">Selesai</td>
                                        <td class="py-4 px-6"><span class="px-3 py-1 bg-emerald-100 text-emerald-700 font-semibold text-xs rounded-full">Selesai</span></td>
                                        <td class="py-4 px-6 text-gray-500">Laporan telah tuntas ditangani dan diberikan solusi.</td>
                                        <td class="py-4 px-6 text-center space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i class="fa-regular fa-trash-can"></i></button>
                                        </td>
                                    </tr>

                                    <tr class="hover:bg-gray-50/60 transition">
                                        <td class="py-4 px-6 font-semibold text-gray-800">Ditolak</td>
                                        <td class="py-4 px-6"><span class="px-3 py-1 bg-red-100 text-red-600 font-semibold text-xs rounded-full">Ditolak</span></td>
                                        <td class="py-4 px-6 text-gray-500">Laporan tidak valid atau tidak memenuhi kriteria penanganan.</td>
                                        <td class="py-4 px-6 text-center space-x-2">
                                            <button class="text-blue-600 hover:text-blue-800"><i class="fa-regular fa-pen-to-square"></i></button>
                                            <button class="text-red-500 hover:text-red-700"><i class="fa-regular fa-trash-can"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </main>
    </div>

    <!-- =========================
    MODAL DYNAMIC FORM
    ========================= -->

    <div id="modalData" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-50 items-center justify-center hidden p-4">
        <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-xl space-y-5">
            <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                <h3 id="modalTitle" class="text-lg font-bold text-gray-800">Tambah Data</h3>
                <button onclick="closeModal()" type="button" class="text-gray-400 hover:text-gray-600">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <form class="space-y-4" onsubmit="event.preventDefault(); closeModal();">
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Nama / Judul</label>
                    <input
                        type="text"
                        placeholder="Masukkan nama..."
                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-blue-500"
                    >
                </div>

                <div id="roleSelectField">
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Pilih Role Akses</label>
                    <select class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
                        <option value="siswa">Siswa</option>
                        <option value="admin">Admin</option>
                        <option value="guru_bk">Guru BK</option>
                        <option value="wakasek_kurikulum">Wakasek Kurikulum</option>
                        <option value="wakasek_kesiswaan">Wakasek Kesiswaan</option>
                        <option value="wakasek_sarana">Wakasek Sarana</option>
                        <option value="wakasek_dudi">Wakasek DUDI</option>
                    </select>
                </div>

                <div class="flex justify-end gap-3 border-t border-gray-100 pt-4">
                    <button
                        type="button"
                        onclick="closeModal()"
                        class="px-4 py-2 text-sm font-semibold text-gray-500 hover:bg-gray-100 rounded-xl"
                    >
                        Batal
                    </button>

                    <button
                        type="submit"
                        class="px-5 py-2 text-sm font-semibold bg-blue-600 text-white rounded-xl hover:bg-blue-700 shadow-sm"
                    >
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- =========================
        JAVASCRIPT
    ========================= -->

    <script>
        let currentTab = 'users';

        function toggleDataMaster() {
            const menu = document.getElementById('masterMenu');
            const arrow = document.getElementById('masterArrow');
            const button = document.querySelector('.dropdown-btn');

            menu.classList.toggle('show');

            const isOpen = menu.classList.contains('show');

            arrow.style.transform = isOpen
                ? 'rotate(180deg)'
                : 'rotate(0deg)';

            button.setAttribute('aria-expanded', isOpen);
        }

        function switchTab(tab) {
            currentTab = tab;

            document.querySelectorAll('.tab-content').forEach(el => {
                el.classList.add('hidden');
            });

            document.querySelectorAll('.sub-menu a').forEach(link => {
                link.classList.remove('sub-active');
            });

            document.getElementById(`tab-${tab}`).classList.remove('hidden');
            document.getElementById(`sub-${tab}`).classList.add('sub-active');

            const pageTitle = document.getElementById('pageTitle');
            const pageDesc = document.getElementById('pageDesc');
            const btnAddText = document.getElementById('btnAddText');

            if (tab === 'users') {
                pageTitle.innerText = 'Data Master - Users & Role';
                pageDesc.innerText =
                    'Kelola data pengguna serta pembagian hak akses role di lingkungan sekolah.';
                btnAddText.innerText = 'Tambah User';
            } else if (tab === 'kategori') {
                pageTitle.innerText = 'Data Master - Kategori Laporan';
                pageDesc.innerText =
                    'Kelola jenis kategori laporan pengaduan beserta penanggung jawab bidang.';
                btnAddText.innerText = 'Tambah Kategori';
            } else if (tab === 'status') {
                pageTitle.innerText = 'Data Master - Status Laporan';
                pageDesc.innerText =
                    'Kelola tahapan status progres laporan (Menunggu, Diproses, Selesai, Ditolak).';
                btnAddText.innerText = 'Tambah Status';
            }
        }

        function openModal() {
            const modal = document.getElementById('modalData');
            const modalTitle = document.getElementById('modalTitle');
            const roleSelectField = document.getElementById('roleSelectField');

            if (currentTab === 'users') {
                modalTitle.innerText = 'Tambah User Baru';
                roleSelectField.classList.remove('hidden');
            } else if (currentTab === 'kategori') {
                modalTitle.innerText = 'Tambah Kategori Laporan';
                roleSelectField.classList.add('hidden');
            } else {
                modalTitle.innerText = 'Tambah Status Laporan';
                roleSelectField.classList.add('hidden');
            }

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal() {
            const modal = document.getElementById('modalData');

            modal.classList.remove('flex');
            modal.classList.add('hidden');
        }
    </script>

</body>
</html>

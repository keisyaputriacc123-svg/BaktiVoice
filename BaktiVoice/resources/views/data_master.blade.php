<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaktiVoice - Data Master</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #F4F7FB; }
    </style>
</head>
<body class="flex h-screen overflow-hidden text-gray-800">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white border-r border-gray-100 flex flex-col justify-between p-5 z-10 shrink-0">
        <div>
            <!-- Logo BaktiVoice -->
            <div class="flex items-center gap-3 px-2 mb-8">
                <img src="{{ asset('images/logo BaktiVoice.png') }}" alt="Logo BaktiVoice" class="h-10 w-auto object-contain">
                <span class="text-xl font-extrabold text-blue-600 tracking-tight">BaktiVoice</span>
            </div>

            <!-- Navigation Menu -->
            <nav class="space-y-1.5 font-medium">
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:text-blue-600 hover:bg-blue-50/50 rounded-xl transition">
                    <i class="fa-regular fa-file-lines text-lg w-5"></i>
                    <span>Laporan</span>
                </a>

                <!-- Data Master Dropdown Active -->
                <div>
                    <button onclick="toggleDataMaster()" class="w-full flex items-center justify-between px-4 py-3 bg-blue-400 text-white font-semibold rounded-xl shadow-sm transition">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-database text-lg w-5"></i>
                            <span>Data Master</span>
                        </div>
                        <i id="arrowIcon" class="fa-solid fa-chevron-down text-xs transition-transform duration-200"></i>
                    </button>
                    <!-- Submenu Tabs -->
                    <div id="subDataMaster" class="mt-2 ml-4 pl-3 border-l-2 border-blue-100 space-y-1">
                        <button onclick="switchTab('users')" id="sub-users" class="sub-tab-btn w-full text-left px-3 py-2 text-sm text-blue-600 font-semibold bg-blue-50 rounded-lg">Users & Role</button>
                        <button onclick="switchTab('kategori')" id="sub-kategori" class="sub-tab-btn w-full text-left px-3 py-2 text-sm text-gray-500 hover:text-blue-600 rounded-lg">Kategori Laporan</button>
                        <button onclick="switchTab('status')" id="sub-status" class="sub-tab-btn w-full text-left px-3 py-2 text-sm text-gray-500 hover:text-blue-600 rounded-lg">Status Laporan</button>
                    </div>
                </div>

                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:text-blue-600 hover:bg-blue-50/50 rounded-xl transition">
                    <i class="fa-solid fa-chart-column text-lg w-5"></i>
                    <span>Rekap Laporan</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:text-blue-600 hover:bg-blue-50/50 rounded-xl transition">
                    <i class="fa-regular fa-bell text-lg w-5"></i>
                    <span>Notifikasi</span>
                </a>
                <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-500 hover:text-blue-600 hover:bg-blue-50/50 rounded-xl transition">
                    <i class="fa-regular fa-user text-lg w-5"></i>
                    <span>Profil</span>
                </a>
            </nav>
        </div>

        <!-- Logout Form -->
        <form method="POST" action="{{ route('logout') ?? '#' }}">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-red-500 font-semibold hover:bg-red-50 rounded-xl transition">
                <i class="fa-solid fa-xmark text-lg w-5"></i>
                <span>Logout</span>
            </button>
        </form>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 flex flex-col min-w-0 overflow-y-auto">
        <!-- TOPBAR -->
        <header class="bg-white/80 backdrop-blur border-b border-gray-100 px-8 py-4 flex items-center justify-end gap-5 sticky top-0 z-10">
            <button class="relative p-2 text-gray-400 hover:text-blue-600 transition">
                <i class="fa-regular fa-bell text-xl"></i>
                <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full"></span>
            </button>
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">
                    <i class="fa-regular fa-user"></i>
                </div>
                <span class="font-bold text-blue-900 text-sm">{{ Auth::user()->name ?? 'Admin Sekolah' }}</span>
            </div>
        </header>

        <!-- CONTENT BODY -->
        <div class="p-8 max-w-7xl w-full mx-auto space-y-6">

            <!-- Page Header -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-extrabold text-blue-900 tracking-tight" id="pageTitle">Data Master</h1>
                    <p class="text-sm text-gray-500 mt-1" id="pageDesc">Kelola data pengguna serta pembagian hak akses role di lingkungan sekolah.</p>
                </div>
                <button onclick="openModal()" class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2.5 rounded-xl shadow-sm transition">
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
                            <input type="text" placeholder="Cari nama atau email..." class="w-full pl-9 pr-4 py-2 bg-white border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
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
                                    <td class="py-4 px-6 flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">A</div>
                                        <span class="font-semibold text-gray-800">Budi Santoso</span>
                                    </td>
                                    <td class="py-4 px-6 text-gray-500">budi.admin@bakti.sch.id</td>
                                    <td class="py-4 px-6"><span class="px-3 py-1 bg-purple-50 text-purple-600 font-semibold text-xs rounded-full">Admin</span></td>
                                    <td class="py-4 px-6 text-center space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800"><i class="fa-regular fa-pen-to-square"></i></button>
                                        <button class="text-red-500 hover:text-red-700"><i class="fa-regular fa-trash-can"></i></button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50/60 transition">
                                    <td class="py-4 px-6 flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center font-bold text-xs">S</div>
                                        <span class="font-semibold text-gray-800">Siti Aminah</span>
                                    </td>
                                    <td class="py-4 px-6 text-gray-500">siti.bk@bakti.sch.id</td>
                                    <td class="py-4 px-6"><span class="px-3 py-1 bg-emerald-50 text-emerald-600 font-semibold text-xs rounded-full">Guru BK</span></td>
                                    <td class="py-4 px-6 text-center space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800"><i class="fa-regular fa-pen-to-square"></i></button>
                                        <button class="text-red-500 hover:text-red-700"><i class="fa-regular fa-trash-can"></i></button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50/60 transition">
                                    <td class="py-4 px-6 flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center font-bold text-xs">W</div>
                                        <span class="font-semibold text-gray-800">Drs. Ahmad Dahlan</span>
                                    </td>
                                    <td class="py-4 px-6 text-gray-500">ahmad.kurikulum@bakti.sch.id</td>
                                    <td class="py-4 px-6"><span class="px-3 py-1 bg-amber-50 text-amber-700 font-semibold text-xs rounded-full">Wakasek Kurikulum</span></td>
                                    <td class="py-4 px-6 text-center space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800"><i class="fa-regular fa-pen-to-square"></i></button>
                                        <button class="text-red-500 hover:text-red-700"><i class="fa-regular fa-trash-can"></i></button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50/60 transition">
                                    <td class="py-4 px-6 flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-xs">M</div>
                                        <span class="font-semibold text-gray-800">Muhammad Hatta</span>
                                    </td>
                                    <td class="py-4 px-6 text-gray-500">hatta.kesiswaan@bakti.sch.id</td>
                                    <td class="py-4 px-6"><span class="px-3 py-1 bg-indigo-50 text-indigo-700 font-semibold text-xs rounded-full">Wakasek Kesiswaan</span></td>
                                    <td class="py-4 px-6 text-center space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800"><i class="fa-regular fa-pen-to-square"></i></button>
                                        <button class="text-red-500 hover:text-red-700"><i class="fa-regular fa-trash-can"></i></button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50/60 transition">
                                    <td class="py-4 px-6 flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-teal-100 text-teal-600 flex items-center justify-center font-bold text-xs">E</div>
                                        <span class="font-semibold text-gray-800">Eka Rahmawati</span>
                                    </td>
                                    <td class="py-4 px-6 text-gray-500">eka.dudi@bakti.sch.id</td>
                                    <td class="py-4 px-6"><span class="px-3 py-1 bg-teal-50 text-teal-700 font-semibold text-xs rounded-full">Wakasek DUDI</span></td>
                                    <td class="py-4 px-6 text-center space-x-2">
                                        <button class="text-blue-600 hover:text-blue-800"><i class="fa-regular fa-pen-to-square"></i></button>
                                        <button class="text-red-500 hover:text-red-700"><i class="fa-regular fa-trash-can"></i></button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-gray-50/60 transition">
                                    <td class="py-4 px-6 flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">R</div>
                                        <span class="font-semibold text-gray-800">Rizky Pratama</span>
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

    <!-- MODAL DYNAMIC FORM -->
    <div id="modalData" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-50 items-center justify-center hidden">
        <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-xl space-y-5">
            <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                <h3 id="modalTitle" class="text-lg font-bold text-gray-800">Tambah Data</h3>
                <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600"><i class="fa-solid fa-xmark text-xl"></i></button>
            </div>

            <form class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Nama / Judul</label>
                    <input type="text" placeholder="Masukkan nama..." class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:border-blue-500">
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
                    <button type="button" onclick="closeModal()" class="px-4 py-2 text-sm font-semibold text-gray-500 hover:bg-gray-100 rounded-xl">Batal</button>
                    <button type="submit" class="px-5 py-2 text-sm font-semibold bg-blue-600 text-white rounded-xl hover:bg-blue-700 shadow-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- JAVASCRIPT LOGIC -->
    <script>
        let currentTab = 'users';

        function toggleDataMaster() {
            document.getElementById('subDataMaster').classList.toggle('hidden');
            document.getElementById('arrowIcon').classList.toggle('rotate-180');
        }

        function switchTab(tab) {
            currentTab = tab;
            document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));

            document.querySelectorAll('.sub-tab-btn').forEach(btn => {
                btn.classList.remove('text-blue-600', 'font-semibold', 'bg-blue-50');
                btn.classList.add('text-gray-500');
            });

            document.getElementById(`tab-${tab}`).classList.remove('hidden');
            const activeBtn = document.getElementById(`sub-${tab}`);
            activeBtn.classList.add('text-blue-600', 'font-semibold', 'bg-blue-50');
            activeBtn.classList.remove('text-gray-500');

            const pageTitle = document.getElementById('pageTitle');
            const pageDesc = document.getElementById('pageDesc');
            const btnAddText = document.getElementById('btnAddText');

            if(tab === 'users') {
                pageTitle.innerText = "Data Master - Users & Role";
                pageDesc.innerText = "Kelola data pengguna serta pembagian hak akses role di lingkungan sekolah.";
                btnAddText.innerText = "Tambah User";
            } else if(tab === 'kategori') {
                pageTitle.innerText = "Data Master - Kategori Laporan";
                pageDesc.innerText = "Kelola jenis kategori laporan pengaduan beserta penanggung jawab bidang.";
                btnAddText.innerText = "Tambah Kategori";
            } else if(tab === 'status') {
                pageTitle.innerText = "Data Master - Status Laporan";
                pageDesc.innerText = "Kelola tahapan status progres laporan (Menunggu, Diproses, Selesai, Ditolak).";
                btnAddText.innerText = "Tambah Status";
            }
        }

    function openModal() {
    const modal = document.getElementById('modalData');
    const modalTitle = document.getElementById('modalTitle');
    const roleSelectField = document.getElementById('roleSelectField');

    if (currentTab === 'users') {
        modalTitle.innerText = "Tambah User Baru";
        roleSelectField.classList.remove('hidden');
    } else if (currentTab === 'kategori') {
        modalTitle.innerText = "Tambah Kategori Laporan";
        roleSelectField.classList.add('hidden');
    } else {
        modalTitle.innerText = "Tambah Status Laporan";
        roleSelectField.classList.add('hidden');
    }

    // Tampilkan modal (hapus hidden, tambahkan flex)
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}
function closeModal() {
    const modal = document.getElementById('modalData');

    // Sembunyikan modal (hapus flex, tambahkan hidden)
    modal.classList.remove('flex');
    modal.classList.add('hidden');
}
    </script>
</body>
</html>

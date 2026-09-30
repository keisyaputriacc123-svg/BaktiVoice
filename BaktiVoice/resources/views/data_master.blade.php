<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Master - BaktiVoice</title>
  <style>
    :root {
      --primary-color: #1e3a8a;
      --primary-hover: #1e40af;
      --secondary-color: #0f172a;
      --bg-color: #f8fafc;
      --card-bg: #ffffff;
      --text-main: #334155;
      --text-muted: #64748b;
      --border-color: #e2e8f0;

      /* Status Colors */
      --badge-draft-bg: #f1f5f9;
      --badge-draft-text: #475569;
      --badge-process-bg: #fef3c7;
      --badge-process-text: #b45309;
      --badge-success-bg: #dcfce7;
      --badge-success-text: #15803d;
      --badge-danger-bg: #fee2e2;
      --badge-danger-text: #b91c1c;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    body {
      background-color: var(--bg-color);
      color: var(--text-main);
      display: flex;
      min-height: 100vh;
    }

    /* Sidebar */
    .sidebar {
      width: 260px;
      background-color: var(--secondary-color);
      color: #fff;
      padding: 1.5rem;
      display: flex;
      flex-direction: column;
    }

    .sidebar .brand {
      font-size: 1.25rem;
      font-weight: 700;
      color: #60a5fa;
      margin-bottom: 2rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .sidebar .menu {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }

    .sidebar .menu li a {
      color: #94a3b8;
      text-decoration: none;
      padding: 0.75rem 1rem;
      border-radius: 0.375rem;
      display: block;
      font-weight: 500;
      transition: all 0.2s;
    }

    .sidebar .menu li a:hover,
    .sidebar .menu li.active a {
      background-color: #1e293b;
      color: #fff;
    }

    /* Main Content */
    .main-content {
      flex: 1;
      padding: 2rem;
      overflow-y: auto;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.5rem;
    }

    .header h1 {
      font-size: 1.5rem;
      color: var(--secondary-color);
    }

    /* Tab Navigation */
    .tab-navigation {
      display: flex;
      gap: 1rem;
      border-bottom: 2px solid var(--border-color);
      margin-bottom: 1.5rem;
    }

    .tab-btn {
      padding: 0.75rem 1.25rem;
      background: none;
      border: none;
      font-size: 0.95rem;
      font-weight: 600;
      color: var(--text-muted);
      cursor: pointer;
      border-bottom: 3px solid transparent;
      transition: all 0.2s;
    }

    .tab-btn.active {
      color: var(--primary-color);
      border-bottom-color: var(--primary-color);
    }

    .tab-content {
      display: none;
    }

    .tab-content.active {
      display: block;
    }

    /* Card & Table Area */
    .card {
      background: var(--card-bg);
      border-radius: 0.5rem;
      border: 1px solid var(--border-color);
      box-shadow: 0 1px 3px rgba(0,0,0,0.05);
      padding: 1.5rem;
    }

    .card-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1rem;
    }

    .search-box {
      padding: 0.5rem 1rem;
      border: 1px solid var(--border-color);
      border-radius: 0.375rem;
      width: 250px;
    }

    .btn-add {
      background-color: var(--primary-color);
      color: #fff;
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 0.375rem;
      cursor: pointer;
      font-weight: 500;
      transition: background 0.2s;
    }

    .btn-add:hover {
      background-color: var(--primary-hover);
    }

    .table-responsive {
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      text-align: left;
      font-size: 0.9rem;
    }

    th, td {
      padding: 0.75rem 1rem;
      border-bottom: 1px solid var(--border-color);
    }

    th {
      background-color: #f1f5f9;
      color: var(--text-main);
      font-weight: 600;
    }

    /* Badges */
    .badge {
      padding: 0.25rem 0.5rem;
      border-radius: 0.25rem;
      font-size: 0.75rem;
      font-weight: 600;
      text-transform: uppercase;
    }

    .badge-draft { background: var(--badge-draft-bg); color: var(--badge-draft-text); }
    .badge-proses { background: var(--badge-process-bg); color: var(--badge-process-text); }
    .badge-selesai { background: var(--badge-success-bg); color: var(--badge-success-text); }
    .badge-ditolak { background: var(--badge-danger-bg); color: var(--badge-danger-text); }

    /* Action Buttons */
    .btn-action {
      border: none;
      padding: 0.25rem 0.5rem;
      border-radius: 0.25rem;
      cursor: pointer;
      font-size: 0.8rem;
    }
    .btn-edit { background-color: #e0f2fe; color: #0369a1; }
    .btn-delete { background-color: #fee2e2; color: #b91c1c; }

    /* Modal Styling */
    .modal-overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(15, 23, 42, 0.5);
      backdrop-filter: blur(2px);
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    .modal-overlay.active {
      display: flex;
    }

    .modal-card {
      background: #fff;
      padding: 1.5rem;
      border-radius: 0.5rem;
      width: 100%;
      max-width: 450px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1rem;
    }

    .modal-header h3 {
      font-size: 1.1rem;
      color: var(--secondary-color);
    }

    .close-btn {
      background: none;
      border: none;
      font-size: 1.25rem;
      cursor: pointer;
      color: var(--text-muted);
    }

    .form-group {
      margin-bottom: 1rem;
    }

    .form-group label {
      display: block;
      font-size: 0.85rem;
      font-weight: 600;
      margin-bottom: 0.25rem;
    }

    .form-group input, .form-group select, .form-group textarea {
      width: 100%;
      padding: 0.5rem;
      border: 1px solid var(--border-color);
      border-radius: 0.375rem;
      font-size: 0.9rem;
    }

    .modal-footer {
      display: flex;
      justify-content: flex-end;
      gap: 0.5rem;
      margin-top: 1.5rem;
    }

    .btn-cancel {
      background: var(--border-color);
      color: var(--text-main);
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 0.375rem;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <aside class="sidebar">
    <div class="brand">📣 BaktiVoice</div>
    <ul class="menu">
      <li><a href="#">Dashboard</a></li>
      <li class="active"><a href="#">Data Master</a></li>
      <li><a href="#">Laporan Pengaduan</a></li>
      <li><a href="#">Pengaturan</a></li>
    </ul>
  </aside>

  <!-- Main Content -->
  <main class="main-content">
    <div class="header">
      <h1>Data Master Sistem</h1>
      <span style="color: var(--text-muted); font-size: 0.9rem;">Administrator</span>
    </div>

    <!-- Navigation Tabs -->
    <div class="tab-navigation">
      <button class="tab-btn active" onclick="switchTab('users', event)">Users / Pengguna</button>
      <button class="tab-btn" onclick="switchTab('kategori', event)">Kategori Pengaduan</button>
      <button class="tab-btn" onclick="switchTab('pengaduan', event)">Data Pengaduan</button>
      <button class="tab-btn" onclick="switchTab('tanggapan', event)">Data Tanggapan</button>
    </div>

    <!-- 1. Tab Master Users -->
    <div id="tab-users" class="tab-content active">
      <div class="card">
        <div class="card-header">
          <input type="text" class="search-box" placeholder="Cari Nama / NIK / NISN...">
          <button class="btn-add" onclick="openModal('Tambah User Baru')">+ Tambah Pengguna</button>
        </div>
        <div class="table-responsive">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>NIK / NISN</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>No. Telepon</th>
                <th>Role</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>3204123456780001</td>
                <td>Ahmad Fauzi, S.Pd.</td>
                <td>ahmad_admin</td>
                <td>081234567890</td>
                <td><span class="badge badge-selesai">Admin</span></td>
                <td>
                  <button class="btn-action btn-edit" onclick="openModal('Edit User')">Edit</button>
                  <button class="btn-action btn-delete" onclick="confirmDelete()">Hapus</button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>0081429690</td>
                <td>Tiara Maharani</td>
                <td>tiara_siswa</td>
                <td>089876543210</td>
                <td><span class="badge badge-draft">Siswa</span></td>
                <td>
                  <button class="btn-action btn-edit" onclick="openModal('Edit User')">Edit</button>
                  <button class="btn-action btn-delete" onclick="confirmDelete()">Hapus</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- 2. Tab Master Kategori Pengaduan -->
    <div id="tab-kategori" class="tab-content">
      <div class="card">
        <div class="card-header">
          <input type="text" class="search-box" placeholder="Cari Kategori...">
          <button class="btn-add" onclick="openModal('Tambah Kategori')">+ Tambah Kategori</button>
        </div>
        <div class="table-responsive">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Deskripsi Kategori</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Sarana Prasarana</td>
                <td>Laporan terkait kerusakan fasilitas fisik dan infrastruktur sekolah</td>
                <td>
                  <button class="btn-action btn-edit" onclick="openModal('Edit Kategori')">Edit</button>
                  <button class="btn-action btn-delete" onclick="confirmDelete()">Hapus</button>
                </td>
              </tr>
              <tr>
                <td>2</td>
                <td>Akademik & Kedisiplinan</td>
                <td>Laporan seputar proses KBM, jadwal, dan ketaatan tata tertib sekolah</td>
                <td>
                  <button class="btn-action btn-edit" onclick="openModal('Edit Kategori')">Edit</button>
                  <button class="btn-action btn-delete" onclick="confirmDelete()">Hapus</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- 3. Tab Master Pengaduan -->
    <div id="tab-pengaduan" class="tab-content">
      <div class="card">
        <div class="card-header">
          <input type="text" class="search-box" placeholder="Cari Judul Pengaduan...">
        </div>
        <div class="table-responsive">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>Pelapor</th>
                <th>Kategori</th>
                <th>Judul Laporan</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>101</td>
                <td>Tiara Maharani</td>
                <td>Sarana Prasarana</td>
                <td>Proyektor Lab Komputer 2 Rusak</td>
                <td><span class="badge badge-proses">Proses</span></td>
                <td>2026-09-28</td>
                <td>
                  <button class="btn-action btn-edit" onclick="openModal('Detail Status Pengaduan')">Detail / Status</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- 4. Tab Master Tanggapan -->
    <div id="tab-tanggapan" class="tab-content">
      <div class="card">
        <div class="card-header">
          <input type="text" class="search-box" placeholder="Cari Tanggapan...">
        </div>
        <div class="table-responsive">
          <table>
            <thead>
              <tr>
                <th>ID</th>
                <th>ID Pengaduan</th>
                <th>Penanggap (Petugas/Admin)</th>
                <th>Isi Tanggapan</th>
                <th>Tgl Tanggapan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>501</td>
                <td>101</td>
                <td>Ahmad Fauzi, S.Pd.</td>
                <td>Laporan telah diterima. Tim teknisi sarpras sedang menuju lokasi untuk perbaikan.</td>
                <td>2026-09-29</td>
                <td>
                  <button class="btn-action btn-edit" onclick="openModal('Edit Tanggapan')">Edit</button>
                  <button class="btn-action btn-delete" onclick="confirmDelete()">Hapus</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </main>

  <!-- Pop-up Modal (Form Input/Edit Data) -->
  <div id="modalForm" class="modal-overlay">
    <div class="modal-card">
      <div class="modal-header">
        <h3 id="modalTitle">Tambah Data</h3>
        <button class="close-btn" onclick="closeModal()">&times;</button>
      </div>
      <form id="formMaster" onsubmit="handleFormSubmit(event)">
        <div class="form-group">
          <label>Nama / Judul</label>
          <input type="text" placeholder="Masukkan nama atau judul..." required>
        </div>
        <div class="form-group">
          <label>Keterangan / Deskripsi</label>
          <textarea rows="3" placeholder="Masukkan deskripsi detail..."></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-cancel" onclick="closeModal()">Batal</button>
          <button type="submit" class="btn-add">Simpan Data</button>
        </div>
      </form>
    </div>
  </div>

  <!-- JavaScript Single File Logic -->
  <script>
    // Tab switching functionality
    function switchTab(tabName, event) {
      const contents = document.querySelectorAll('.tab-content');
      contents.forEach(content => content.classList.remove('active'));

      const buttons = document.querySelectorAll('.tab-btn');
      buttons.forEach(btn => btn.classList.remove('active'));

      document.getElementById('tab-' + tabName).classList.add('active');
      event.currentTarget.classList.add('active');
    }

    // Modal Pop-Up Functions
    function openModal(title) {
      document.getElementById('modalTitle').innerText = title;
      document.getElementById('modalForm').classList.add('active');
    }

    function closeModal() {
      document.getElementById('modalForm').classList.remove('active');
    }

    function handleFormSubmit(e) {
      e.preventDefault();
      alert('Data berhasil disimpan!');
      closeModal();
    }

    function confirmDelete() {
      if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
        alert('Data berhasil dihapus.');
      }
    }
  </script>
</body>
</html>

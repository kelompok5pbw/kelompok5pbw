<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Manajemen Data Mahasiswa Berbasis Web</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            padding: 30px;
            text-align: center;
            color: white;
        }

        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .header p {
            font-size: 1.1em;
            opacity: 0.9;
        }

        .content {
            padding: 40px;
        }

        .form-section {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            transform: translateY(0);
            transition: transform 0.3s ease;
        }

        .form-section:hover {
            transform: translateY(-5px);
        }

        .form-title {
            font-size: 1.5em;
            color: #333;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 600;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e1e1;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: #f8f9fa;
            font-family: inherit;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 80px;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #4facfe;
            background: white;
            box-shadow: 0 0 15px rgba(79, 172, 254, 0.2);
        }

        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(79, 172, 254, 0.4);
        }

        .btn-success {
            background: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
            color: white;
        }

        .btn-warning {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }

        .btn-danger {
            background: linear-gradient(135deg, #ff6b6b 0%, #ffd93d 100%);
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .table-section {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .table-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .search-filter-section {
            display: flex;
            gap: 15px;
            align-items: center;
            flex-wrap: wrap;
        }

        .search-box {
            position: relative;
            min-width: 250px;
        }

        .search-box input {
            width: 100%;
            padding: 10px 15px 10px 40px;
            border: none;
            border-radius: 25px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .search-box input::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.7);
        }

        .filter-select {
            padding: 8px 15px;
            border: none;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            min-width: 120px;
        }

        .filter-select option {
            color: #333;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        th, td {
            padding: 15px 10px;
            text-align: left;
            border-bottom: 1px solid #f0f0f0;
        }

        th {
            background: #f8f9fa;
            font-weight: 600;
            color: #333;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        tr:hover {
            background: #f8f9fa;
            transform: scale(1.005);
            transition: all 0.2s ease;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .btn-sm {
            padding: 6px 10px;
            font-size: 12px;
        }

        .empty-state {
            text-align: center;
            padding: 50px;
            color: #999;
        }

        .empty-state i {
            font-size: 4em;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .stat-number {
            font-size: 2.2em;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .stat-label {
            color: #666;
            font-size: 0.9em;
        }

        .gpa-badge {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: bold;
            color: white;
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            color: white;
        }

        .semester-badge {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 11px;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .content {
                padding: 20px;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .table-header {
                flex-direction: column;
                text-align: center;
            }

            .search-filter-section {
                width: 100%;
                justify-content: center;
            }
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            z-index: 1000;
        }

        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            max-width: 500px;
            width: 90%;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .close {
            font-size: 24px;
            cursor: pointer;
            color: #999;
        }

        .close:hover {
            color: #333;
        }

        .detail-modal .modal-content {
            max-width: 600px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .detail-item {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
        }

        .detail-label {
            font-weight: 600;
            color: #555;
            margin-bottom: 5px;
        }

        .detail-value {
            color: #333;
            font-size: 1.1em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-graduation-cap"></i>Aplikasi Manajemen Data Mahasiswa Berbasis Web</h1>
            <p>Sistem CRUD untuk mengelola data mahasiswa universitas</p>
        </div>

        <div class="content">
            <!-- Statistics -->
            <div class="stats">
                <div class="stat-card">
                    <div class="stat-number" id="totalStudents">0</div>
                    <div class="stat-label">Total Mahasiswa</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" id="activeStudents">0</div>
                    <div class="stat-label">Mahasiswa Aktif</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" id="averageGPA">0.0</div>
                    <div class="stat-label">Rata-rata IPK</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" id="faculties">0</div>
                    <div class="stat-label">Fakultas</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number" id="programs">0</div>
                    <div class="stat-label">Program Studi</div>
                </div>
            </div>

            <!-- Form Section -->
            <div class="form-section">
                <h2 class="form-title">
                    <i class="fas fa-user-plus"></i>
                    <span id="formTitle">Tambah Mahasiswa Baru</span>
                </h2>
                <form id="studentForm">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" id="nim" required maxlength="15" placeholder="202301001">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" id="nama" required placeholder="Nama lengkap mahasiswa">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" required placeholder="mahasiswa@email.com">
                        </div>
                        <div class="form-group">
                            <label for="telepon">No. Telepon</label>
                            <input type="tel" id="telepon" required placeholder="08123456789">
                        </div>
                        <div class="form-group">
                            <label for="jenisKelamin">Jenis Kelamin</label>
                            <select id="jenisKelamin" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggalLahir">Tanggal Lahir</label>
                            <input type="date" id="tanggalLahir" required>
                        </div>
                        <div class="form-group">
                            <label for="fakultas">Fakultas</label>
                            <select id="fakultas" required onchange="updateProgramStudi()">
                                <option value="">Pilih Fakultas</option>
                                <option value="Teknik">Fakultas Teknik</option>
                                <option value="Ekonomi">Fakultas Ekonomi</option>
                                <option value="Kelautan">Fakultas Kelautan</option>
                                <option value="Bahasa">Fakultas Bahasa</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="programStudi">Program Studi</label>
                            <select id="programStudi" required>
                                <option value="">Pilih Program Studi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="angkatan">Angkatan</label>
                            <input type="number" id="angkatan" required min="2020" max="2030" placeholder="2024">
                        </div>
                        <div class="form-group">
                            <label for="semester">Semester</label>
                            <select id="semester" required>
                                <option value="">Pilih Semester</option>
                                <option value="1">Semester 1</option>
                                <option value="2">Semester 2</option>
                                <option value="3">Semester 3</option>
                                <option value="4">Semester 4</option>
                                <option value="5">Semester 5</option>
                                <option value="6">Semester 6</option>
                                <option value="7">Semester 7</option>
                                <option value="8">Semester 8</option>
                                <option value="9">Semester 9</option>
                                <option value="10">Semester 10</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ipk">IPK</label>
                            <input type="number" id="ipk" step="0.01" min="0" max="4" placeholder="3.50">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" required>
                                <option value="">Pilih Status</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Cuti">Cuti</option>
                                <option value="Non-Aktif">Non-Aktif</option>
                                <option value="Lulus">Lulus</option>
                                <option value="DO">Drop Out</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Lengkap</label>
                        <textarea id="alamat" placeholder="Alamat lengkap mahasiswa"></textarea>
                    </div>
                    <div style="text-align: center; margin-top: 20px;">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            <span id="submitText">Simpan Data</span>
                        </button>
                        <button type="button" class="btn btn-warning" id="cancelBtn" style="display: none; margin-left: 10px;">
                            <i class="fas fa-times"></i>
                            Batal
                        </button>
                    </div>
                </form>
            </div>

            <!-- Table Section -->
            <div class="table-section">
                <div class="table-header">
                    <h2><i class="fas fa-table"></i> Data Mahasiswa</h2>
                    <div class="search-filter-section">
                        <div class="search-box">
                            <i class="fas fa-search"></i>
                            <input type="text" id="searchInput" placeholder="Cari mahasiswa...">
                        </div>
                        <select id="filterFakultas" class="filter-select" onchange="handleFilter()">
                            <option value="">Semua Fakultas</option>
                            <option value="Teknik">Teknik</option>
                            <option value="Ekonomi">Ekonomi</option>
                            <option value="Kelautan">Kelautan</option>
                            <option value="Bahasa">Bahasa</option>
                        </select>
                        <select id="filterStatus" class="filter-select" onchange="handleFilter()">
                            <option value="">Semua Status</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Cuti">Cuti</option>
                            <option value="Non-Aktif">Non-Aktif</option>
                            <option value="Lulus">Lulus</option>
                            <option value="DO">Drop Out</option>
                        </select>
                    </div>
                </div>
                <div class="table-wrapper">
                    <table id="studentTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Fakultas</th>
                                <th>Program Studi</th>
                                <th>Semester</th>
                                <th>IPK</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="studentTableBody">
                        </tbody>
                    </table>
                    <div class="empty-state" id="emptyState">
                        <i class="fas fa-user-graduate"></i>
                        <h3>Belum ada data mahasiswa</h3>
                        <p>Tambahkan mahasiswa baru menggunakan form di atas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Konfirmasi Hapus</h3>
                <span class="close" onclick="closeDeleteModal()">&times;</span>
            </div>
            <p>Apakah Anda yakin ingin menghapus data mahasiswa <strong id="deleteStudentName"></strong>?</p>
            <div style="text-align: center; margin-top: 20px;">
                <button class="btn btn-danger" onclick="confirmDelete()">
                    <i class="fas fa-trash"></i>
                    Ya, Hapus
                </button>
                <button class="btn btn-warning" onclick="closeDeleteModal()" style="margin-left: 10px;">
                    <i class="fas fa-times"></i>
                    Batal
                </button>
            </div>
        </div>
    </div>

    <!-- Detail Modal -->
    <div id="detailModal" class="modal detail-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Detail Mahasiswa</h3>
                <span class="close" onclick="closeDetailModal()">&times;</span>
            </div>
            <div id="detailContent"></div>
        </div>
    </div>

    <script>
        // Data storage
        let students = [];
        let editingId = null;
        let deleteId = null;

        // Program studi mapping
        const programStudiMap = {
            'Teknik': ['Sistem Informasi', 'Teknik Mesin', 'Teknik Elektro', 'Teknik Industri', 'Teknologi Informasi'],
            'Ekonomi': ['Manajemen', 'Akuntansi'],
            'Kelautan': ['Teknik Perkapalan', 'Teknik Sistem Perkapalan'],
            'Bahasa': ['Bahasa dan Kebudayaan Jepang', 'Bahasa dan Kebudayaan Inggris', 'Bahasa Mandarin dan Kebudayaan Tiongkok'],
        };

        // Initialize app
        document.addEventListener('DOMContentLoaded', function() {
            loadSampleData();
            renderTable();
            updateStats();
            setupEventListeners();
        });

        // Load sample data
        function loadSampleData() {
            students = [
                {
                    id: 1,
                    nim: '2024240003',
                    nama: 'Kevin Fajar Pratama',
                    email: 'kevinfajarpratama@gmail.com',
                    telepon: '0895364313840',
                    jenisKelamin: 'Laki-laki',
                    tanggalLahir: '2004-12-26',
                    fakultas: 'Teknik',
                    programStudi: 'Sistem Informasi',
                    angkatan: 2024,
                    semester: 2,
                    ipk: 3.60,
                    status: 'Aktif',
                    alamat: 'Jl. Waringin No.16 Utan Kayu Utara, Matraman'
                },
                {
                    id: 2,
                    nim: '2024240015',
                    nama: 'Gallant Adhiya Fauzan Pratama Putra',
                    email: 'gallantadhiyafauzan@gmail.com',
                    telepon: '089653111445',
                    jenisKelamin: 'Laki-laki',
                    tanggalLahir: '2005-07-15',
                    fakultas: 'Teknik',
                    programStudi: 'Sistem Informasi',
                    angkatan: 2024,
                    semester: 2,
                    ipk: 3.74,
                    status: 'Aktif',
                    alamat: 'Jl. Boegenville Blok B12 No.19, Tambun Selatan, Bekasi Timur'
                },
                {
                    id: 3,
                    nim: '2024240029',
                    nama: 'Radika Widi Putra',
                    email: 'radikawp14@gmail.com',
                    telepon: '081314765752',
                    jenisKelamin: 'Laki-laki',
                    tanggalLahir: '2005-08-29',
                    fakultas: 'Teknik',
                    programStudi: 'Sistem Informasi',
                    angkatan: 2024,
                    semester: 2,
                    ipk: 3.71,
                    status: 'Aktif',
                    alamat: 'Jl. Nusa Indah 6 GG 10'
                },
                {
                    id: 4,
                    nim: '2024240032',
                    nama: 'M.Ghatan Naufal Hakim',
                    email: 'ghatannaufal22@gmail.com',
                    telepon: '085810962329',
                    jenisKelamin: 'Laki-Laki',
                    tanggalLahir: '2005-08-05',
                    fakultas: 'Teknik',
                    programStudi: 'Sistem Informasi',
                    angkatan: 2024,
                    semester: 2,
                    ipk: 3.92,
                    status: 'Aktif',
                    alamat: 'Jl. Pahlawan No. 321, Medan'
                },
                  {
                    id: 5,
                    nim: '2024240017',
                    nama: 'M.Ammar Rizky',
                    email: '@gmail.com',
                    telepon: '085810962329',
                    jenisKelamin: 'Laki-Laki',
                    tanggalLahir: '2005-08-05',
                    fakultas: 'Teknik',
                    programStudi: 'Sistem Informasi',
                    angkatan: 2024,
                    semester: 2,
                    ipk: 3.92,
                    status: 'Aktif',
                    alamat: 'Jl. Pahlawan No. 321, Medan'
                }
            ];
        }

        // Setup event listeners
        function setupEventListeners() {
            document.getElementById('studentForm').addEventListener('submit', handleSubmit);
            document.getElementById('cancelBtn').addEventListener('click', cancelEdit);
            document.getElementById('searchInput').addEventListener('input', handleSearch);
        }

        // Update program studi options
        function updateProgramStudi() {
            const fakultas = document.getElementById('fakultas').value;
            const programStudiSelect = document.getElementById('programStudi');
            
            programStudiSelect.innerHTML = '<option value="">Pilih Program Studi</option>';
            
            if (fakultas && programStudiMap[fakultas]) {
                programStudiMap[fakultas].forEach(prodi => {
                    const option = document.createElement('option');
                    option.value = prodi;
                    option.textContent = prodi;
                    programStudiSelect.appendChild(option);
                });
            }
        }

        // Handle form submission
        function handleSubmit(e) {
            e.preventDefault();
            
            const formData = {
                nim: document.getElementById('nim').value,
                nama: document.getElementById('nama').value,
                email: document.getElementById('email').value,
                telepon: document.getElementById('telepon').value,
                jenisKelamin: document.getElementById('jenisKelamin').value,
                tanggalLahir: document.getElementById('tanggalLahir').value,
                fakultas: document.getElementById('fakultas').value,
                programStudi: document.getElementById('programStudi').value,
                angkatan: parseInt(document.getElementById('angkatan').value),
                semester: parseInt(document.getElementById('semester').value),
                ipk: parseFloat(document.getElementById('ipk').value) || 0,
                status: document.getElementById('status').value,
                alamat: document.getElementById('alamat').value
            };

            // Check if NIM already exists (except when editing)
            const existingStudent = students.find(student => 
                student.nim === formData.nim && student.id !== editingId
            );
            
            if (existingStudent) {
                alert('NIM sudah terdaftar! Silakan gunakan NIM yang berbeda.');
                return;
            }

            if (editingId) {
                // Update existing student
                const index = students.findIndex(student => student.id === editingId);
                students[index] = { ...formData, id: editingId };
                editingId = null;
                resetForm();
            } else {
                // Add new student
                const newStudent = {
                    ...formData,
                    id: Date.now()
                };
                students.push(newStudent);
            }

            document.getElementById('studentForm').reset();
            renderTable();
            updateStats();
        }

        // Render table
        function renderTable(data = students) {
            const tbody = document.getElementById('studentTableBody');
            const emptyState = document.getElementById('emptyState');

            if (data.length === 0) {
                tbody.innerHTML = '';
                emptyState.style.display = 'block';
                return;
            }

            emptyState.style.display = 'none';
            tbody.innerHTML = data.map((student, index) => `
                <tr>
                    <td>${index + 1}</td>
                    <td><strong>${student.nim}</strong></td>
                    <td>${student.nama}</td>
                    <td>${student.fakultas}</td>
                    <td>${student.programStudi}</td>
                    <td><span class="semester-badge">Sem ${student.semester}</span></td>
                    <td><span class="gpa-badge" style="background: ${getGPAColor(student.ipk)}">${student.ipk.toFixed(2)}</span></td>
                    <td>
                        <span class="status-badge" style="background: ${getStatusColor(student.status)}">
                            ${student.status}
                        </span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <button class="btn btn-primary btn-sm" onclick="viewDetail(${student.id})" title="Detail">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="btn btn-success btn-sm" onclick="editStudent(${student.id})" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="showDeleteModal(${student.id})" title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `).join('');
        }

        // Get GPA color
        function getGPAColor(gpa) {
            if (gpa >= 3.5) return '#28a745';
            if (gpa >= 3.0) return '#17a2b8';
            if (gpa >= 2.5) return '#ffc107';
            return '#dc3545';
        }

        // Get status color
        function getStatusColor(status) {
            switch(status) {
                case 'Aktif': return '#28a745';
                case 'Cuti': return '#ffc107';
                case 'Non-Aktif': return '#6c757d';
                case 'Lulus': return '#17a2b8';
                case 'DO': return '#dc3545';
                default: return '#6c757d';
            }
        }

        // View student detail
        function viewDetail(id) {
            const student = students.find(s => s.id === id);
            if (!student) return;

            const age = calculateAge(student.tanggalLahir);
            
            document.getElementById('detailContent').innerHTML = `
                <div class="detail-grid">
                    <div class="detail-item">
                        <div class="detail-label">NIM</div>
                        <div class="detail-value">${student.nim}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Nama Lengkap</div>
                        <div class="detail-value">${student.nama}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Email</div>
                        <div class="detail-value">${student.email}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">No. Telepon</div>
                        <div class="detail-value">${student.telepon}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Jenis Kelamin</div>
                        <div class="detail-value">${student.jenisKelamin}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Tanggal Lahir</div>
                        <div class="detail-value">${formatDate(student.tanggalLahir)} (${age} tahun)</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Fakultas</div>
                        <div class="detail-value">Fakultas ${student.fakultas}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Program Studi</div>
                        <div class="detail-value">${student.programStudi}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Angkatan</div>
                        <div class="detail-value">${student.angkatan}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Semester</div>
                        <div class="detail-value">Semester ${student.semester}</div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">IPK</div>
                        <div class="detail-value">
                            <span class="gpa-badge" style="background: ${getGPAColor(student.ipk)}">
                                ${student.ipk.toFixed(2)}
                            </span>
                        </div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Status</div>
                        <div class="detail-value">
                            <span class="status-badge" style="background: ${getStatusColor(student.status)}">
                                ${student.status}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="detail-item" style="grid-column: 1 / -1;">
                    <div class="detail-label">Alamat</div>
                    <div class="detail-value">${student.alamat || 'Tidak ada data alamat'}</div>
                </div>
            `;
            
            document.getElementById('detailModal').style.display = 'block';
        }

        // Calculate age
        function calculateAge(birthDate) {
            const today = new Date();
            const birth = new Date(birthDate);
            let age = today.getFullYear() - birth.getFullYear();
            const monthDiff = today.getMonth() - birth.getMonth();
            
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birth.getDate())) {
                age--;
            }
            
            return age;
        }

        // Format date
        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });
        }

        // Close detail modal
        function closeDetailModal() {
            document.getElementById('detailModal').style.display = 'none';
        }

        // Edit student
        function editStudent(id) {
            const student = students.find(s => s.id === id);
            if (!student) return;

            document.getElementById('nim').value = student.nim;
            document.getElementById('nama').value = student.nama;
            document.getElementById('email').value = student.email;
            document.getElementById('telepon').value = student.telepon;
            document.getElementById('jenisKelamin').value = student.jenisKelamin;
            document.getElementById('tanggalLahir').value = student.tanggalLahir;
            document.getElementById('fakultas').value = student.fakultas;
            
            // Update program studi options and set value
            updateProgramStudi();
            setTimeout(() => {
                document.getElementById('programStudi').value = student.programStudi;
            }, 100);
            
            document.getElementById('angkatan').value = student.angkatan;
            document.getElementById('semester').value = student.semester;
            document.getElementById('ipk').value = student.ipk;
            document.getElementById('status').value = student.status;
            document.getElementById('alamat').value = student.alamat;

            editingId = id;
            document.getElementById('formTitle').textContent = 'Edit Data Mahasiswa';
            document.getElementById('submitText').textContent = 'Update Data';
            document.getElementById('cancelBtn').style.display = 'inline-flex';

            // Scroll to form
            document.querySelector('.form-section').scrollIntoView({ behavior: 'smooth' });
        }

        // Cancel edit
        function cancelEdit() {
            resetForm();
            document.getElementById('studentForm').reset();
        }

        // Reset form
        function resetForm() {
            editingId = null;
            document.getElementById('formTitle').textContent = 'Tambah Mahasiswa Baru';
            document.getElementById('submitText').textContent = 'Simpan Data';
            document.getElementById('cancelBtn').style.display = 'none';
            document.getElementById('programStudi').innerHTML = '<option value="">Pilih Program Studi</option>';
        }

        // Show delete modal
        function showDeleteModal(id) {
            const student = students.find(s => s.id === id);
            if (!student) return;

            deleteId = id;
            document.getElementById('deleteStudentName').textContent = student.nama;
            document.getElementById('deleteModal').style.display = 'block';
        }

        // Close delete modal
        function closeDeleteModal() {
            deleteId = null;
            document.getElementById('deleteModal').style.display = 'none';
        }

        // Confirm delete
        function confirmDelete() {
            if (deleteId) {
                students = students.filter(s => s.id !== deleteId);
                renderTable();
                updateStats();
                closeDeleteModal();
            }
        }

        // Handle search and filter
        function handleSearch() {
            applyFilters();
        }

        function handleFilter() {
            applyFilters();
        }

        function applyFilters() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const filterFakultas = document.getElementById('filterFakultas').value;
            const filterStatus = document.getElementById('filterStatus').value;

            let filteredStudents = students.filter(student => {
                const matchSearch = !searchTerm || 
                    student.nim.toLowerCase().includes(searchTerm) ||
                    student.nama.toLowerCase().includes(searchTerm) ||
                    student.email.toLowerCase().includes(searchTerm) ||
                    student.programStudi.toLowerCase().includes(searchTerm);
                
                const matchFakultas = !filterFakultas || student.fakultas === filterFakultas;
                const matchStatus = !filterStatus || student.status === filterStatus;

                return matchSearch && matchFakultas && matchStatus;
            });

            renderTable(filteredStudents);
        }

        // Update statistics
        function updateStats() {
            const totalStudents = students.length;
            const activeStudents = students.filter(s => s.status === 'Aktif').length;
            const faculties = [...new Set(students.map(s => s.fakultas))].length;
            const programs = [...new Set(students.map(s => s.programStudi))].length;
            
            const totalGPA = students.reduce((sum, s) => sum + s.ipk, 0);
            const averageGPA = totalStudents > 0 ? (totalGPA / totalStudents) : 0;

            document.getElementById('totalStudents').textContent = totalStudents;
            document.getElementById('activeStudents').textContent = activeStudents;
            document.getElementById('averageGPA').textContent = averageGPA.toFixed(2);
            document.getElementById('faculties').textContent = faculties;
            document.getElementById('programs').textContent = programs;
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const deleteModal = document.getElementById('deleteModal');
            const detailModal = document.getElementById('detailModal');
            
            if (event.target === deleteModal) {
                closeDeleteModal();
            }
            if (event.target === detailModal) {
                closeDetailModal();
            }
        }
    </script>
</body>
</html>
<?php
session_start();

// File untuk menyimpan data
define('DATA_FILE', 'data_jurnal.json');

// Fungsi untuk membaca data dari file
function readData() {
    if (file_exists(DATA_FILE)) {
        $json = file_get_contents(DATA_FILE);
        return json_decode($json, true);
    }
    return initializeData();
}

// Fungsi untuk menyimpan data ke file
function saveData($data) {
    file_put_contents(DATA_FILE, json_encode($data, JSON_PRETTY_PRINT));
}

// Fungsi untuk inisialisasi data awal
function initializeData() {
    $data = [
        'users' => [],
        'kelas' => [],
        'siswa' => [],
        'absensi' => [],
        'jurnal' => []
    ];
    
    // Data Admin
    $data['users'][] = [
        'id' => 1,
        'username' => 'admin',
        'password' => password_hash('admin123', PASSWORD_DEFAULT),
        'nama' => 'Administrator',
        'role' => 'admin',
        'mapel' => null
    ];
    
    // Data 10 Guru
    $guru_data = [
        ['id' => 2, 'username' => 'guru1', 'nama' => 'Drs. Ahmad Santoso, M.Pd', 'mapel' => 'Matematika'],
        ['id' => 3, 'username' => 'guru2', 'nama' => 'Sri Wahyuni, S.Pd', 'mapel' => 'Bahasa Indonesia'],
        ['id' => 4, 'username' => 'guru3', 'nama' => 'Budi Hartono, S.Kom', 'mapel' => 'Pemrograman'],
        ['id' => 5, 'username' => 'guru4', 'nama' => 'Siti Nurjanah, S.Pd', 'mapel' => 'Bahasa Inggris'],
        ['id' => 6, 'username' => 'guru5', 'nama' => 'Agus Setiawan, S.T', 'mapel' => 'Teknik Jaringan'],
        ['id' => 7, 'username' => 'guru6', 'nama' => 'Rina Kusuma, S.Pd', 'mapel' => 'PKn'],
        ['id' => 8, 'username' => 'guru7', 'nama' => 'Hendra Wijaya, S.Kom', 'mapel' => 'Basis Data'],
        ['id' => 9, 'username' => 'guru8', 'nama' => 'Dewi Lestari, S.Pd', 'mapel' => 'Seni Budaya'],
        ['id' => 10, 'username' => 'guru9', 'nama' => 'Eko Prasetyo, S.Pd', 'mapel' => 'Pendidikan Jasmani'],
        ['id' => 11, 'username' => 'guru10', 'nama' => 'Wulan Sari, S.Pd', 'mapel' => 'Sejarah Indonesia']
    ];
    
    foreach ($guru_data as $guru) {
        $data['users'][] = [
            'id' => $guru['id'],
            'username' => $guru['username'],
            'password' => password_hash('guru123', PASSWORD_DEFAULT),
            'nama' => $guru['nama'],
            'role' => 'guru',
            'mapel' => $guru['mapel']
        ];
    }
    
    // Data 30 Kelas
    $kelas_data = [
        // Kelas X
        ['id' => 1, 'nama_kelas' => 'X AKL 1', 'tingkat' => 10, 'jurusan' => 'AKUTANSI'],
        ['id' => 2, 'nama_kelas' => 'X AKL 2', 'tingkat' => 10, 'jurusan' => 'AKUTANSI'],
        ['id' => 3, 'nama_kelas' => 'X AKL 3', 'tingkat' => 10, 'jurusan' => 'AKUTANSI'],
        ['id' => 4, 'nama_kelas' => 'X PM 1', 'tingkat' => 10, 'jurusan' => 'PEMASARAN'],
        ['id' => 5, 'nama_kelas' => 'X PM 2', 'tingkat' => 10, 'jurusan' => 'PEMASARAN'],
        ['id' => 6, 'nama_kelas' => 'X PM 3', 'tingkat' => 10, 'jurusan' => 'PEMASARAN'],
        ['id' => 7, 'nama_kelas' => 'X MPLB 1', 'tingkat' => 10, 'jurusan' => 'PERKANTORAN'],
        ['id' => 8, 'nama_kelas' => 'X MPLB 2', 'tingkat' => 10, 'jurusan' => 'PERKANTORAN'],
        ['id' => 9, 'nama_kelas' => 'X MPLB 3', 'tingkat' => 10, 'jurusan' => 'PERKANTORAN'],
        ['id' => 10, 'nama_kelas' => 'X PPLG', 'tingkat' => 10, 'jurusan' => 'PERANGKAT LUNAK'],
        // Kelas XI
        ['id' => 11, 'nama_kelas' => 'XI RPL 1', 'tingkat' => 11, 'jurusan' => 'Rekayasa Perangkat Lunak'],
        ['id' => 12, 'nama_kelas' => 'XI RPL 2', 'tingkat' => 11, 'jurusan' => 'Rekayasa Perangkat Lunak'],
        ['id' => 13, 'nama_kelas' => 'XI RPL 3', 'tingkat' => 11, 'jurusan' => 'Rekayasa Perangkat Lunak'],
        ['id' => 14, 'nama_kelas' => 'XI TKJ 1', 'tingkat' => 11, 'jurusan' => 'Teknik Komputer dan Jaringan'],
        ['id' => 15, 'nama_kelas' => 'XI TKJ 2', 'tingkat' => 11, 'jurusan' => 'Teknik Komputer dan Jaringan'],
        ['id' => 16, 'nama_kelas' => 'XI TKJ 3', 'tingkat' => 11, 'jurusan' => 'Teknik Komputer dan Jaringan'],
        ['id' => 17, 'nama_kelas' => 'XI MM 1', 'tingkat' => 11, 'jurusan' => 'Multimedia'],
        ['id' => 18, 'nama_kelas' => 'XI MM 2', 'tingkat' => 11, 'jurusan' => 'Multimedia'],
        ['id' => 19, 'nama_kelas' => 'XI SIJA 1', 'tingkat' => 11, 'jurusan' => 'Sistem Informasi Jaringan dan Aplikasi'],
        ['id' => 20, 'nama_kelas' => 'XI SIJA 2', 'tingkat' => 11, 'jurusan' => 'Sistem Informasi Jaringan dan Aplikasi'],
        // Kelas XII
        ['id' => 21, 'nama_kelas' => 'XII RPL 1', 'tingkat' => 12, 'jurusan' => 'Rekayasa Perangkat Lunak'],
        ['id' => 22, 'nama_kelas' => 'XII RPL 2', 'tingkat' => 12, 'jurusan' => 'Rekayasa Perangkat Lunak'],
        ['id' => 23, 'nama_kelas' => 'XII RPL 3', 'tingkat' => 12, 'jurusan' => 'Rekayasa Perangkat Lunak'],
        ['id' => 24, 'nama_kelas' => 'XII TKJ 1', 'tingkat' => 12, 'jurusan' => 'Teknik Komputer dan Jaringan'],
        ['id' => 25, 'nama_kelas' => 'XII TKJ 2', 'tingkat' => 12, 'jurusan' => 'Teknik Komputer dan Jaringan'],
        ['id' => 26, 'nama_kelas' => 'XII TKJ 3', 'tingkat' => 12, 'jurusan' => 'Teknik Komputer dan Jaringan'],
        ['id' => 27, 'nama_kelas' => 'XII MM 1', 'tingkat' => 12, 'jurusan' => 'Multimedia'],
        ['id' => 28, 'nama_kelas' => 'XII MM 2', 'tingkat' => 12, 'jurusan' => 'Multimedia'],
        ['id' => 29, 'nama_kelas' => 'XII SIJA 1', 'tingkat' => 12, 'jurusan' => 'Sistem Informasi Jaringan dan Aplikasi'],
        ['id' => 30, 'nama_kelas' => 'XII SIJA 2', 'tingkat' => 12, 'jurusan' => 'Sistem Informasi Jaringan dan Aplikasi']
    ];
    
    $data['kelas'] = $kelas_data;
    
    // Generate 36 siswa per kelas (1080 siswa total)
    $nama_laki = ['Ahmad', 'Budi', 'Candra', 'Doni', 'Eko', 'Fahmi', 'Galih', 'Hasan', 'Ilham', 'Joko', 'Kurnia', 'Lukman', 'Maulana', 'Nanda', 'Okta', 'Putra', 'Qori', 'Reza'];
    $nama_perempuan = ['Ayu', 'Bella', 'Citra', 'Dewi', 'Eka', 'Fitri', 'Gita', 'Hani', 'Intan', 'Julia', 'Kartika', 'Lina', 'Maya', 'Novi', 'Olivia', 'Putri', 'Qonita', 'Ratna'];
    $nama_belakang = ['Saputra', 'Pratama', 'Wijaya', 'Kusuma', 'Santoso', 'Wibowo', 'Setiawan', 'Nugroho', 'Rahmadi', 'Hartono', 'Kusumawati', 'Lestari', 'Anggraini', 'Maharani'];
    
    $siswa_id = 1;
    foreach ($kelas_data as $kelas) {
        for ($i = 1; $i <= 36; $i++) {
            $jk = ($i % 2 == 0) ? 'L' : 'P';
            $nama_depan = ($jk == 'L') ? $nama_laki[array_rand($nama_laki)] : $nama_perempuan[array_rand($nama_perempuan)];
            $nama = $nama_depan . ' ' . $nama_belakang[array_rand($nama_belakang)];
            $nis = '2024' . str_pad($kelas['id'], 2, '0', STR_PAD_LEFT) . str_pad($i, 3, '0', STR_PAD_LEFT);
            
            $data['siswa'][] = [
                'id' => $siswa_id++,
                'nis' => $nis,
                'nama' => $nama,
                'kelas_id' => $kelas['id'],
                'jenis_kelamin' => $jk
            ];
        }
    }
    
    saveData($data);
    return $data;
}

// Load data
$data = readData();

// Proses Login
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    foreach ($data['users'] as $user) {
        if ($user['username'] == $username && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['mapel'] = $user['mapel'];
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        }
    }
    $error = "Username atau password salah!";
}

// Proses Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Proses Input Absensi
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['simpan_absensi'])) {
    $kelas_id = $_POST['kelas_id'];
    $tanggal = $_POST['tanggal'];
    $guru_id = $_SESSION['user_id'];
    
    foreach ($_POST['status'] as $siswa_id => $status) {
        $keterangan = $_POST['keterangan'][$siswa_id] ?? '';
        
        $data['absensi'][] = [
            'id' => count($data['absensi']) + 1,
            'siswa_id' => (int)$siswa_id,
            'kelas_id' => (int)$kelas_id,
            'guru_id' => $guru_id,
            'tanggal' => $tanggal,
            'status' => $status,
            'keterangan' => $keterangan
        ];
    }
    
    saveData($data);
    $success = "Absensi berhasil disimpan!";
}

// Proses Input Jurnal
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['simpan_jurnal'])) {
    $data['jurnal'][] = [
        'id' => count($data['jurnal']) + 1,
        'guru_id' => $_SESSION['user_id'],
        'kelas_id' => (int)$_POST['kelas_id'],
        'tanggal' => $_POST['tanggal'],
        'jam_mulai' => $_POST['jam_mulai'],
        'jam_selesai' => $_POST['jam_selesai'],
        'materi' => $_POST['materi'],
        'metode' => $_POST['metode'],
        'catatan' => $_POST['catatan']
    ];
    
    saveData($data);
    $success = "Jurnal mengajar berhasil disimpan!";
}

// Proses Tambah Siswa (Admin)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah_siswa'])) {
    $data['siswa'][] = [
        'id' => count($data['siswa']) + 1,
        'nis' => $_POST['nis'],
        'nama' => $_POST['nama'],
        'kelas_id' => (int)$_POST['kelas_id'],
        'jenis_kelamin' => $_POST['jenis_kelamin']
    ];
    
    saveData($data);
    $data = readData(); // Reload data
    $success = "Siswa berhasil ditambahkan!";
}

// Helper function untuk mendapatkan kelas by id
function getKelasById($id) {
    global $data;
    foreach ($data['kelas'] as $kelas) {
        if ($kelas['id'] == $id) return $kelas;
    }
    return null;
}

// Helper function untuk mendapatkan user by id
function getUserById($id) {
    global $data;
    foreach ($data['users'] as $user) {
        if ($user['id'] == $id) return $user;
    }
    return null;
}

// Helper function untuk mendapatkan siswa by id
function getSiswaById($id) {
    global $data;
    foreach ($data['siswa'] as $siswa) {
        if ($siswa['id'] == $id) return $siswa;
    }
    return null;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jurnal Mengajar - SMKN 9 Semarang</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
       body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-image: url('https://i.postimg.cc/28Shsgmr/SKANILAN-BOS.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    min-height: 100vh;
}
        
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .login-box {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 400px;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo-circle img {
    max-width: 35%;
    max-height: 50%;
    object-fit: contain; /* atau 'cover' jika ingin mengisi penuh */
    display: block;
    margin: 0 auto; /* Center horizontal */
}
        
        .logo h2 {
            color: #333;
            margin-bottom: 5px;
        }
        
        .logo p {
            color: #666;
            font-size: 14px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
        }
        
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
            outline: none;
            border-color: #667eea;
        }
        
        .btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }
        
        .btn:hover {
            transform: translateY(-2px);
        }
        
        .alert {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            font-size: 14px;
        }
        
        .alert-error {
            background: #fee;
            color: #c33;
            border: 1px solid #fcc;
        }
        
        .alert-success {
            background: #efe;
            color: #3c3;
            border: 1px solid #cfc;
        }
        
        .dashboard {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .header {
            background: white;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .header-logo img {
    max-height: 40px; /* sesuaikan dengan kebutuhan */
    width: auto;
    display: block;
}
        .header-info h2 {
            color: #333;
            margin-bottom: 5px;
        }
        
        .header-info p {
            color: #666;
            font-size: 14px;
        }
        
        .user-info {
            text-align: right;
        }
        
        .user-info strong {
            color: #333;
            display: block;
            margin-bottom: 5px;
        }
        
        .user-info span {
            color: #666;
            font-size: 14px;
        }
        
        .btn-logout {
            background: #dc3545;
            color: white;
            padding: 8px 20px;
            text-decoration: none;
            border-radius: 6px;
            display: inline-block;
            margin-top: 10px;
            font-size: 14px;
        }
        
        .menu-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .menu-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
        }
        
        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }
        
        .menu-card h3 {
            color: #333;
            margin-bottom: 10px;
        }
        
        .menu-card p {
            color: #666;
            font-size: 14px;
        }
        
        .content-box {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        
        .content-box h3 {
            color: #333;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #667eea;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        
        table th {
            background: #f8f9fa;
            color: #333;
            font-weight: 600;
        }
        
        table tr:hover {
            background: #f8f9fa;
        }
        
        .btn-small {
            padding: 6px 15px;
            font-size: 13px;
            width: auto;
            display: inline-block;
            margin: 2px;
        }
        
        .back-btn {
            background: #6c757d;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 6px;
            display: inline-block;
            margin-bottom: 20px;
        }
        
        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        
        .status-badge {
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            font-size: 12px;
            display: inline-block;
        }
        
        .status-hadir { background: #28a745; }
        .status-sakit { background: #ffc107; }
        .status-izin { background: #17a2b8; }
        .status-alpha { background: #dc3545; }
        
        .stat-card {
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            color: white;
        }
        
        .stat-card h2 {
            font-size: 36px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<?php if (!isset($_SESSION['user_id'])): ?>
    <!-- Halaman Login -->
   <div class="login-container">
        <div class="login-box">
            <div class="logo">
                <div class="logo-circle">
                    <img src="https://i.postimg.cc/FzhYmkLJ/Whats-App-Image-2024-10-21-at-11-14-25-98b47d48.jpg" alt="Logo">
                </div>
                <h2>SMKN 9 Semarang</h2>
                <p>Sistem Jurnal Mengajar</p>
            </div>
            
            <?php if (isset($error)): ?>
                <div class="alert alert-error"><?= $error ?></div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" required placeholder="Masukkan username">
                </div>
                
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" required placeholder="Masukkan password">
                </div>
                
                <button type="submit" name="login" class="btn">LOGIN</button>
            </form>
        </div>
    </div>

<?php else: ?>
    <!-- Dashboard -->
    <div class="dashboard">
        <div class="header">
            <div class="header-left">
                <div class="header-logo">
                    <img src="https://i.postimg.cc/FzhYmkLJ/Whats-App-Image-2024-10-21-at-11-14-25-98b47d48.jpg" alt="Logo">
                </div>
                <div class="header-info">
                    <h2>SMKN 9 Semarang</h2>
                    <p>Sistem Jurnal Mengajar</p>
                </div>
            </div>
            <div class="user-info">
                <strong><?= $_SESSION['nama'] ?></strong>
                <span><?= strtoupper($_SESSION['role']) ?></span>
                <?php if ($_SESSION['role'] == 'guru'): ?>
                    <br><span>Mapel: <?= $_SESSION['mapel'] ?></span>
                <?php endif; ?>
                <br>
                <a href="?logout" class="btn-logout">Logout</a>
            </div>
        </div>
        
        <?php if (!isset($_GET['page'])): ?>
            <!-- Menu Utama -->
            <div class="menu-cards">
                <?php if ($_SESSION['role'] == 'admin'): ?>
                    <div class="menu-card" onclick="location.href='?page=manage_siswa'">
                        <h3>👥 Manajemen Siswa</h3>
                        <p>Kelola data siswa per kelas</p>
                    </div>
                <?php endif; ?>
                
                <div class="menu-card" onclick="location.href='?page=input_absensi'">
                    <h3>✅ Input Absensi</h3>
                    <p>Catat kehadiran siswa</p>
                </div>
                
                <div class="menu-card" onclick="location.href='?page=input_jurnal'">
                    <h3>📝 Input Jurnal</h3>
                    <p>Catat jurnal mengajar</p>
                </div>
                
                <div class="menu-card" onclick="location.href='?page=rekap_jurnal'">
                    <h3>📊 Rekap Jurnal</h3>
                    <p>Lihat rekapitulasi jurnal</p>
                </div>
                
                <div class="menu-card" onclick="location.href='?page=rekap_absensi'">
                    <h3>📈 Rekap Absensi</h3>
                    <p>Lihat rekapitulasi absensi</p>
                </div>
            </div>
        <?php endif; ?>
        
        <?php
        $page = $_GET['page'] ?? '';
        
        if ($page == 'manage_siswa' && $_SESSION['role'] == 'admin'): 
        ?>
            <a href="?" class="back-btn">← Kembali</a>
            <div class="content-box">
                <h3>Manajemen Siswa</h3>
                
                <?php if (isset($success)): ?>
                    <div class="alert alert-success"><?= $success ?></div>
                <?php endif; ?>
                
                <form method="POST" style="margin-bottom: 30px;">
                    <div class="grid-2">
                        <div class="form-group">
                            <label>NIS</label>
                            <input type="text" name="nis" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <input type="text" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select name="kelas_id" required>
                                <option value="">Pilih Kelas</option>
                                <?php foreach ($data['kelas'] as $kelas): ?>
                                    <option value="<?= $kelas['id'] ?>"><?= $kelas['nama_kelas'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" required>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" name="tambah_siswa" class="btn">Tambah Siswa</button>
                </form>
                
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>JK</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $count = 0;
                        foreach ($data['siswa'] as $siswa):
                            if ($count >= 100) break;
                            $kelas = getKelasById($siswa['kelas_id']);
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $siswa['nis'] ?></td>
                                <td><?= $siswa['nama'] ?></td>
                                <td><?= $kelas['nama_kelas'] ?></td>
                                <td><?= $siswa['jenis_kelamin'] ?></td>
                            </tr>
                        <?php
                            $count++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        
        <?php elseif ($page == 'input_absensi'): ?>
            <a href="?" class="back-btn">← Kembali</a>
            <div class="content-box">
                <h3>Input Absensi Siswa</h3>
                
                <?php if (isset($success)): ?>
                    <div class="alert alert-success"><?= $success ?></div>
                <?php endif; ?>
                
                <?php if (!isset($_POST['pilih_kelas'])): ?>
                    <form method="POST">
                        <div class="form-group">
                            <label>Pilih Kelas</label>
                            <select name="kelas_id" required>
                                <option value="">-- Pilih Kelas --</option>
                                <?php foreach ($data['kelas'] as $kelas): ?>
                                    <option value="<?= $kelas['id'] ?>"><?= $kelas['nama_kelas'] ?> - <?= $kelas['jurusan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        <button type="submit" name="pilih_kelas" class="btn">Lanjutkan</button>
                    </form>
                <?php else: ?>
                    <?php
                    $kelas_id = (int)$_POST['kelas_id'];
                    $tanggal = $_POST['tanggal'];
                    
                    $kelas = getKelasById($kelas_id);
                    
                    $siswa_list = array_filter($data['siswa'], function($s) use ($kelas_id) {
                        return $s['kelas_id'] == $kelas_id;
                    });
                    usort($siswa_list, function($a, $b) {
                        return strcmp($a['nama'], $b['nama']);
                    });
                    ?>
                    
                    <div style="background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                        <strong>Kelas:</strong> <?= $kelas['nama_kelas'] ?> - <?= $kelas['jurusan'] ?><br>
                        <strong>Tanggal:</strong> <?= date('d-m-Y', strtotime($tanggal)) ?><br>
                        <strong>Jumlah Siswa:</strong> <?= count($siswa_list) ?> siswa
                    </div>
                    
                    <form method="POST">
                        <input type="hidden" name="kelas_id" value="<?= $kelas_id ?>">
                        <input type="hidden" name="tanggal" value="<?= $tanggal ?>">
                        
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Status Kehadiran</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($siswa_list as $siswa): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $siswa['nis'] ?></td>
                                        <td><?= $siswa['nama'] ?></td>
                                        <td>
                                            <select name="status[<?= $siswa['id'] ?>]" required style="padding: 8px;">
                                                <option value="Hadir">Hadir</option>
                                                <option value="Sakit">Sakit</option>
                                                <option value="Izin">Izin</option>
                                                <option value="Alpha">Alpha</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="keterangan[<?= $siswa['id'] ?>]" 
                                                   placeholder="Keterangan (opsional)" style="padding: 8px; width: 100%;">
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        
                        <div style="margin-top: 20px;">
                            <button type="submit" name="simpan_absensi" class="btn">Simpan Absensi</button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        
        <?php elseif ($page == 'input_jurnal'): ?>
            <a href="?" class="back-btn">← Kembali</a>
            <div class="content-box">
                <h3>Input Jurnal Mengajar</h3>
                
                <?php if (isset($success)): ?>
                    <div class="alert alert-success"><?= $success ?></div>
                <?php endif; ?>
                
                <form method="POST">
                    <div class="grid-2">
                        <div class="form-group">
                            <label>Kelas</label>
                            <select name="kelas_id" required>
                                <option value="">-- Pilih Kelas --</option>
                                <?php foreach ($data['kelas'] as $kelas): ?>
                                    <option value="<?= $kelas['id'] ?>"><?= $kelas['nama_kelas'] ?> - <?= $kelas['jurusan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Jam Mulai</label>
                            <input type="time" name="jam_mulai" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Jam Selesai</label>
                            <input type="time" name="jam_selesai" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Materi Pembelajaran</label>
                        <textarea name="materi" rows="4" required placeholder="Tuliskan materi yang diajarkan"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Metode Pembelajaran</label>
                        <input type="text" name="metode" placeholder="Contoh: Ceramah, Diskusi, Praktik, dll">
                    </div>
                    
                    <div class="form-group">
                        <label>Catatan</label>
                        <textarea name="catatan" rows="3" placeholder="Catatan tambahan (opsional)"></textarea>
                    </div>
                    
                    <button type="submit" name="simpan_jurnal" class="btn">Simpan Jurnal</button>
                </form>
            </div>
        
        <?php elseif ($page == 'rekap_jurnal'): ?>
            <a href="?" class="back-btn">← Kembali</a>
            <div class="content-box">
                <h3>Rekapitulasi Jurnal Mengajar</h3>
                
                <form method="GET" style="margin-bottom: 20px;">
                    <input type="hidden" name="page" value="rekap_jurnal">
                    <div class="grid-2">
                        <div class="form-group">
                            <label>Dari Tanggal</label>
                            <input type="date" name="dari" value="<?= $_GET['dari'] ?? date('Y-m-01') ?>">
                        </div>
                        <div class="form-group">
                            <label>Sampai Tanggal</label>
                            <input type="date" name="sampai" value="<?= $_GET['sampai'] ?? date('Y-m-d') ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-small">Filter</button>
                </form>
                
                <?php
                $dari = $_GET['dari'] ?? date('Y-m-01');
                $sampai = $_GET['sampai'] ?? date('Y-m-d');
                
                $jurnal_list = array_filter($data['jurnal'], function($j) use ($dari, $sampai) {
                    if ($_SESSION['role'] == 'guru' && $j['guru_id'] != $_SESSION['user_id']) {
                        return false;
                    }
                    return $j['tanggal'] >= $dari && $j['tanggal'] <= $sampai;
                });
                
                usort($jurnal_list, function($a, $b) {
                    $cmp = strcmp($b['tanggal'], $a['tanggal']);
                    if ($cmp == 0) {
                        return strcmp($b['jam_mulai'], $a['jam_mulai']);
                    }
                    return $cmp;
                });
                ?>
                
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <?php if ($_SESSION['role'] == 'admin'): ?>
                            <th>Guru</th>
                            <th>Mapel</th>
                            <?php endif; ?>
                            <th>Kelas</th>
                            <th>Jam</th>
                            <th>Materi</th>
                            <th>Metode</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($jurnal_list) > 0): ?>
                            <?php $no = 1; foreach ($jurnal_list as $jurnal): 
                                $guru = getUserById($jurnal['guru_id']);
                                $kelas = getKelasById($jurnal['kelas_id']);
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= date('d-m-Y', strtotime($jurnal['tanggal'])) ?></td>
                                    <?php if ($_SESSION['role'] == 'admin'): ?>
                                    <td><?= $guru['nama'] ?></td>
                                    <td><?= $guru['mapel'] ?></td>
                                    <?php endif; ?>
                                    <td><?= $kelas['nama_kelas'] ?></td>
                                    <td><?= substr($jurnal['jam_mulai'], 0, 5) ?> - <?= substr($jurnal['jam_selesai'], 0, 5) ?></td>
                                    <td><?= substr($jurnal['materi'], 0, 100) ?><?= strlen($jurnal['materi']) > 100 ? '...' : '' ?></td>
                                    <td><?= $jurnal['metode'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="<?= $_SESSION['role'] == 'admin' ? '8' : '6' ?>" style="text-align: center; padding: 30px; color: #999;">
                                    Tidak ada data jurnal untuk periode ini
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        
        <?php elseif ($page == 'rekap_absensi'): ?>
            <a href="?" class="back-btn">← Kembali</a>
            <div class="content-box">
                <h3>Rekapitulasi Absensi</h3>
                
                <form method="GET" style="margin-bottom: 20px;">
                    <input type="hidden" name="page" value="rekap_absensi">
                    <div class="grid-2">
                        <div class="form-group">
                            <label>Kelas</label>
                            <select name="kelas_id">
                                <option value="">-- Semua Kelas --</option>
                                <?php foreach ($data['kelas'] as $kelas): ?>
                                    <option value="<?= $kelas['id'] ?>" <?= (isset($_GET['kelas_id']) && $_GET['kelas_id'] == $kelas['id']) ? 'selected' : '' ?>>
                                        <?= $kelas['nama_kelas'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" value="<?= $_GET['tanggal'] ?? date('Y-m-d') ?>">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-small">Filter</button>
                </form>
                
                <?php
                $tanggal = $_GET['tanggal'] ?? date('Y-m-d');
                $kelas_id = $_GET['kelas_id'] ?? '';
                
                if ($kelas_id) {
                    $absensi_list = array_filter($data['absensi'], function($a) use ($tanggal, $kelas_id) {
                        if ($_SESSION['role'] == 'guru' && $a['guru_id'] != $_SESSION['user_id']) {
                            return false;
                        }
                        return $a['tanggal'] == $tanggal && $a['kelas_id'] == $kelas_id;
                    });
                    
                    // Hitung statistik
                    $hadir = 0; $sakit = 0; $izin = 0; $alpha = 0;
                    foreach ($absensi_list as $abs) {
                        switch($abs['status']) {
                            case 'Hadir': $hadir++; break;
                            case 'Sakit': $sakit++; break;
                            case 'Izin': $izin++; break;
                            case 'Alpha': $alpha++; break;
                        }
                    }
                ?>
                
                <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 15px; margin-bottom: 20px;">
                    <div class="stat-card" style="background: #28a745;">
                        <h2><?= $hadir ?></h2>
                        <p>Hadir</p>
                    </div>
                    <div class="stat-card" style="background: #ffc107;">
                        <h2><?= $sakit ?></h2>
                        <p>Sakit</p>
                    </div>
                    <div class="stat-card" style="background: #17a2b8;">
                        <h2><?= $izin ?></h2>
                        <p>Izin</p>
                    </div>
                    <div class="stat-card" style="background: #dc3545;">
                        <h2><?= $alpha ?></h2>
                        <p>Alpha</p>
                    </div>
                </div>
                
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <?php if ($_SESSION['role'] == 'admin'): ?>
                            <th>Input Oleh</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($absensi_list) > 0): ?>
                            <?php $no = 1; foreach ($absensi_list as $abs): 
                                $siswa = getSiswaById($abs['siswa_id']);
                                $kelas = getKelasById($abs['kelas_id']);
                                $guru = getUserById($abs['guru_id']);
                                
                                $status_class = '';
                                switch($abs['status']) {
                                    case 'Hadir': $status_class = 'status-hadir'; break;
                                    case 'Sakit': $status_class = 'status-sakit'; break;
                                    case 'Izin': $status_class = 'status-izin'; break;
                                    case 'Alpha': $status_class = 'status-alpha'; break;
                                }
                            ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $siswa['nis'] ?></td>
                                    <td><?= $siswa['nama'] ?></td>
                                    <td><?= $kelas['nama_kelas'] ?></td>
                                    <td>
                                        <span class="status-badge <?= $status_class ?>">
                                            <?= $abs['status'] ?>
                                        </span>
                                    </td>
                                    <td><?= $abs['keterangan'] ?></td>
                                    <?php if ($_SESSION['role'] == 'admin'): ?>
                                    <td><?= $guru['nama'] ?></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="<?= $_SESSION['role'] == 'admin' ? '7' : '6' ?>" style="text-align: center; padding: 30px; color: #999;">
                                    Tidak ada data absensi untuk tanggal dan kelas ini
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                
                <?php } else { ?>
                    <div style="text-align: center; padding: 50px; color: #999;">
                        <p>Silakan pilih kelas untuk melihat rekapitulasi absensi</p>
                    </div>
                <?php } ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>

</body>
</html>
<?php
session_start();
require __DIR__ . './koneksi.php';
require_once __DIR__ . '/fungsi.php';

#cek method form, hanya izinkan POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['flash_error'] = 'Akses tidak valid.';
  redirect_ke('index.php#biodata');
}

#ambil dan bersihkan nilai dari form
$nim  = bersihkan($_POST['txtNim']  ?? '');
$nama = bersihkan($_POST['txtNmLengkap'] ?? '');
$tempat = bersihkan($_POST['txtT4Lhr'] ?? '');
$tanggal = bersihkan($_POST['txtTglLhr'] ?? '');
$hobi = bersihkan($_POST['txtHobi'] ?? '');
$pasangan = bersihkan($_POST['txtPasangan'] ?? '');
$pekerjaan = bersihkan($_POST['txtKerja'] ?? '');
$orangtua = bersihkan($_POST['txtNmOrtu'] ?? '');
$kakak = bersihkan($_POST['txtNmKakak'] ?? '');
$adik = bersihkan($_POST['txtNmAdik'] ?? '');


#Validasi sederhana
$errors = []; #ini array untuk menampung semua error yang ada

if ($nim === '')        { $errors[] = 'NIM wajib diisi.'; }
if ($nama === '')       { $errors[] = 'Nama lengkap wajib diisi.'; }
if ($tempat === '')     { $errors[] = 'Tempat lahir wajib diisi.'; }
if ($tanggal === '')    { $errors[] = 'Tanggal lahir wajib diisi.'; }
if ($hobi === '')       { $errors[] = 'Hobi wajib diisi.'; }
if ($pekerjaan === '')  { $errors[] = 'Pekerjaan wajib diisi.'; }
if ($ortu === '')       { $errors[] = 'Nama orang tua wajib diisi.'; }

if (mb_strlen($nim) < 5)  { $errors[] = 'NIM minimal 5 karakter.'; }
if (mb_strlen($nama) < 3) { $errors[] = 'Nama minimal 3 karakter.'; }

/*
kondisi di bawah ini hanya dikerjakan jika ada error, 
simpan nilai lama dan pesan error, lalu redirect (konsep PRG)
*/
if (!empty($errors)) {
  $_SESSION['old_biodata'] = [
    'nim'        => $nim,
        'nama'       => $nama,
        'tempat'     => $tempat,
        'tanggal'    => $tanggal,
        'hobi'       => $hobi,
        'pasangan'   => $pasangan,
        'pekerjaan'  => $pekerjaan,
        'ortu'       => $ortu,
        'kakak'      => $kakak,
        'adik'       => $adik,
    ];

  $_SESSION['flash_error'] = implode('<br>', $errors);
  redirect_ke('index.php#biodata');
}

#menyiapkan query INSERT dengan prepared statement
$sql = "INSERT INTO tbl_Biodata_mahasiswa_sederhana (cnim, cnama_lengkap, ctempat_lahir, chobi, cpasanagan, cpekerjaan, cnama_orang_tua, namakaka, namaadik) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
  #jika gagal prepare, kirim pesan error ke pengguna (tanpa detail sensitif)
  $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
  redirect_ke('index.php#biodata');
}

mysqli_stmt_bind_param($stmt, "ssssssssss", $nim, $nama_lengkap, $tempat_lahir, $hobi, $pasanagan, $pekerjaan, $nama_orang_tua, $namakaka, $namaadik);

if (mysqli_stmt_execute($stmt)) { #jika berhasil, kosongkan old value, beri pesan sukses
  unset($_SESSION['old_biodata']);
  $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah tersimpan.';
  redirect_ke('index.php#biodata'); #pola PRG: kembali ke form / halaman home
} else { 

  $_SESSION['flash_error'] = 'Data gagal disimpan. Silakan coba lagi.';
  redirect_ke('index.php#biodata');
}

mysqli_stmt_close($stmt);
redirect_ke('index.php#biodata');

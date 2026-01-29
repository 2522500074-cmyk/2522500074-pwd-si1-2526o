<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('index.php#biodata');
}

/* Ambil & bersihkan input */
$kode       = bersihkan($_POST['txtKdPengunjung'] ?? '');
$nama       = bersihkan($_POST['txtNmPengunjung'] ?? '');
$alamat     = bersihkan($_POST['txtalmtrumah'] ?? '');
$tanggal    = bersihkan($_POST['txtTglkunjungan'] ?? '');
$hobi       = bersihkan($_POST['txtHobi'] ?? '');
$asal       = bersihkan($_POST['txtAsalslta'] ?? '');
$pekerjaan  = bersihkan($_POST['txtPekerjaan'] ?? '');
$ortua      = bersihkan($_POST['txtNmOrtua'] ?? '');
$pacar      = bersihkan($_POST['txtNmpacar'] ?? '');
$mantan     = bersihkan($_POST['txtNmmantan'] ?? '');

$errors = [];

/* Validasi (FIX: case-sensitive) */
if ($kode === '')       { $errors[] = 'Kode Pengunjung wajib diisi.'; }
if ($nama === '')       { $errors[] = 'Nama Pengunjung wajib diisi.'; }
if ($alamat === '')     { $errors[] = 'Alamat Rumah wajib diisi.'; }
if ($tanggal === '')    { $errors[] = 'Tanggal Kunjungan wajib diisi.'; }
if ($hobi === '')       { $errors[] = 'Hobi wajib diisi.'; }
if ($asal === '')       { $errors[] = 'Asal SLTA wajib diisi.'; }
if ($pekerjaan === '')  { $errors[] = 'Pekerjaan wajib diisi.'; }
if ($ortua === '')      { $errors[] = 'Nama Orang Tua wajib diisi.'; }
if ($pacar === '')      { $errors[] = 'Nama Pacar wajib diisi.'; }
if ($mantan === '')     { $errors[] = 'Nama Mantan wajib diisi.'; }

/* Jika ada error */
if (!empty($errors)) {
    $_SESSION['old_biodata'] = [
        'kode'       => $kode,
        'nama'       => $nama,
        'alamat'     => $alamat,
        'tanggal'    => $tanggal,
        'hobi'       => $hobi,
        'asal'       => $asal,
        'pekerjaan'  => $pekerjaan,
        'ortua'      => $ortua,
        'pacar'      => $pacar,
        'mantan'     => $mantan,
    ];

    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('index.php#biodata');
}

/* Query insert */
$sql = "INSERT INTO tbl_biodata_daftar_pengunjung
        (mkode_pengunjung, mnama_pengunjung, malamat_rumah, mtanggal_kunjungan, mhobi,
         masal_SLTA, mpekerjaan, mnama_orang_tua, mnama_pacar, mnama_mantan)
        VALUES (?,?,?,?,?,?,?,?,?,?)";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    $_SESSION['flash_error'] = 'Kesalahan sistem (prepare gagal).';
    redirect_ke('index.php#biodata');
}

/* Bind parameter */
mysqli_stmt_bind_param(
    $stmt,
    "ssssssssss",
    $kode,
    $nama,
    $alamat,
    $tanggal,
    $hobi,
    $asal,
    $pekerjaan,
    $ortua,
    $pacar,
    $mantan
);

/* Eksekusi */
if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION['old_biodata']);
    $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah tersimpan.';
    redirect_ke('index.php#biodata');
} else {
    $_SESSION['old_biodata'] = [
        'kode'       => $kode,
        'nama'       => $nama,
        'alamat'     => $alamat,
        'tanggal'    => $tanggal,
        'hobi'       => $hobi,
        'asal'       => $asal,
        'pekerjaan'  => $pekerjaan,
        'ortua'      => $ortua,
        'pacar'      => $pacar,
        'mantan'     => $mantan,
    ];

    $_SESSION['flash_error'] = 'Data gagal disimpan. Silakan coba lagi.';
    redirect_ke('index.php#biodata');
}

mysqli_stmt_close($stmt);

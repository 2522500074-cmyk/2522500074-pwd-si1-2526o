<?php
  require_once 'koneksi.php';
  require_once 'fungsi.php';

  $cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);

  if (!$cid) {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('bacabiodata.php');
  }

  $stmt = mysqli_prepare($conn, "SELECT cid, mkode_pengunjung, mnama_pengunjung, malamat_rumah, mtanggal_kunjungan, mhobi,
 masal_slta, mpekerjaan, mnama_orang_tua, mnama_pacar, mnama_mantan
 FROM tbl_biodata_daftar_pengunjung WHERE cid = ? LIMIT 1");
  
  if (!$stmt) {
    $_SESSION['flash_error'] = 'Query tidak benar.';
    redirect_ke('read_biodata.php');
  }

  mysqli_stmt_bind_param($stmt, "i", $cid);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($res);
  mysqli_stmt_close($stmt);

  if (!$row) {
    $_SESSION['flash_error'] = 'Record tidak ditemukan.';
    redirect_ke('read_biodata.php');
  }

    $kode_pengunjung    = $row['mkode'] ?? '';
    $nama_pengunjung    = $row['mnama_pengunjung'] ?? '';
    $alamat_rumah       = $row['malamat_rumah'] ?? '';
    $tanggal_kunjungan  = $row['mtanggal_kunjungan'] ?? '';
    $hobi               = $row['mhobi'] ?? '';
    $asalA_slta         = $row['masal_slta'] ?? '';
    $pekerjaan          = $row['mpekerjaan'] ?? '';
    $nama_ortua         = $row['mnama_orang_tua'] ?? '';
    $nama_pacar         = $row['mnama_pacar'] ?? '';
    $nama_adik          = $row['mnama_mantan'] ?? '';

  $flash_error = $_SESSION['flash_error'] ?? '';
  $old_biodata = $_SESSION['old_pengunjung'] ?? [];
  unset($_SESSION['flash_error'], $_SESSION['old_pengunjung']);
  
  if (!empty($old_biodata)) {
    $kode_pengunjung      = $old_biodata['kode_pengunjung'] ?? $kode_pengunjung;
    $nama_pengunjung      = $old_biodata['nama_pengunjung'] ?? $nama_pengunjung;
    $alamat_rumah         = $old_biodata['alamat_rumah'] ?? $alamat_rumah;
    $tanggal_kunjungan    = $old_biodata['tanggal_kunjungan'] ?? $tanggal_kunjungan;
    $hobi                 = $old_biodata['hobi'] ?? $hobi;
    $asal_slta            = $old_biodata['asal_slta'] ?? $asal_slta;
    $pekerjaan            = $old_biodata['pekerjaan'] ?? $pekerjaan;
    $nama_ortua           = $old_biodata['nama_ortu'] ?? $nama_ortua;
    $nama_pacar           = $old_biodata['nama_pacar'] ?? $nama_pacar;
    $nama_mantan          = $old_biodata['nama_mantan'] ?? $nama_mantan;
  }
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Biodata Mahasiswa</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
<header>
  <h1>Ini Header</h1>
</header>

<main>
<section id="biodata">
  <h2>Edit Biodata Mahasiswa</h2>

  <?php if (!empty($flash_error)): ?>
    <div style="padding:10px; margin-bottom:10px;
      background:#f8d7da; color:#721c24; border-radius:6px;">
      <?= $flash_error; ?>
    </div>
  <?php endif; ?>

  <form action="proses_update_biodata.php" method="POST">

    <input type="hidden" name="cid" value="<?= (int)$cid; ?>">

    <label>Kode Pengunjung:
      <input type="text" name="kode_pengunjung" value="<?= htmlspecialchars($kode_pengunjung); ?>" required>
    </label>

    <label>Nama Pengunjung:
      <input type="text" name="nama_pengunjung" value="<?= htmlspecialchars($nama_pengunjung); ?>" required>
    </label>

    <label>Alamat Rumah:
      <input type="text" name="alamat_rumah" value="<?= htmlspecialchars($alamat_rumah); ?>" required>
    </label>

    <label>Tanggal Kunjungan:
      <input type="text" name="tanggal_kunjungan" value="<?= htmlspecialchars($tanggal_kunjungan); ?>" required>
    </label>

    <label>Hobi:
      <input type="text" name="hobi" value="<?= htmlspecialchars($hobi); ?>" required>
    </label>

    <label>Asal SLTA:
      <input type="text" name="asal_slta" value="<?= htmlspecialchars($asal_slta); ?>" required>
    </label>

    <label>Pekerjaan:
      <input type="text" name="pekerjaan" value="<?= htmlspecialchars($pekerjaan); ?>" required>
    </label>

    <label>Nama Orang Tua:
      <input type="text" name="nama_ortua" value="<?= htmlspecialchars($nama_ortua); ?>" required>
    </label>

    <label>Nama Pacar:
      <input type="text" name="nama_pacar" value="<?= htmlspecialchars($nama_pacar); ?>" required>
    </label>

    <label>Nama Mantan:
      <input type="text" name="nama_mantan" value="<?= htmlspecialchars($nama_mantan); ?>" required>
    </label>

    <button type="submit">Update</button>
    <button type="reset">Batal</button>
    <a href="read_biodata.php">Kembali</a>
  </form>
</section>
</main>
<script src="script.js"></script>
</body>
</html>
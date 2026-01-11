<?php
require 'koneksi.php';
require_ONCE 'fungsi.php';

$fieldConfig = [
  "nim" => ["label" => "NIM:", "suffix" => ""],
  "nama" => ["label" => "nama lengkap:", "suffix" => ""],
  "tempat" => ["label" => "tempat lahir:", "suffix" => ""],
  "tanggal" => ["label" => "tanggal lahir:", "suffix" => ""],
  "hobi" => ["label" => "hobi:", "suffix" => ""],
  "pasangan" => ["label" => "pasangan:", "suffix" => ""],
  "pekerjaan" => ["label" => "pekerjaan:", "suffix" => ""],
  "orangtua" => ["label" => "nama orang tua:", "suffix" => ""],
  "kakak" => ["label" => "nama kakak:", "suffix" => ""],
  "adik" => ["label" => "nama adik:", "suffix" => ""],
];

$sql = "SELECT * FROM tbl_tamu ORDER BY cid DESC";
$q = mysqli_query($conn, $sql);
if (!$q) {
  echo "<p>Gagal membaca data tamu: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} elseif (mysqli_num_rows($q) === 0) {
  echo "<p>Belum ada data tamu yang tersimpan.</p>";
} else {
  while ($row = mysqli_fetch_assoc($q)) {
    $arrContact = [
      "nim"  => $row["cnim"],
      "nama" => $row["cnama_lengkap"],
      "tempat" => $row["cnama_tempat"],
      "tanggal" => $row["ctanggal_lahir"],
      "hobi" => $row["chobi"],
      "pasangan" => $row["cpasangan"],
      "pekerjaan" => $row["cpekerjaan"],
      "orangtua" => $row["cnama_orangtua"],
      "kakak" => $row["cnama_kakak"],
      "adik" => $row["cnama_adik"],
    ];
    echo tampilkanBiodata($fieldContact, $arrContact);
  }
}
?>

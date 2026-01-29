<?php
require 'koneksi.php';

$fieldConfig = [
    "kode"      => ["label" => "Kode Pengunjung:", "suffix" => ""],
    "nama"      => ["label" => "Nama Pengunjung:", "suffix" => " &#128526;"],
    "alamat"    => ["label" => "Alamat Rumah:", "suffix" => ""],
    "tanggal"   => ["label" => "Tanggal Kunjungan:", "suffix" => ""],
    "hobi"      => ["label" => "Hobi:", "suffix" => " &#127926;"],
    "asal"      => ["label" => "Asal SLTA:", "suffix" => " &hearts;"],
    "pekerjaan" => ["label" => "Pekerjaan:", "suffix" => " &copy; 2025"],
    "ortu"      => ["label" => "Nama Orang Tua:", "suffix" => ""],
    "pacar"     => ["label" => "Nama Pacar:", "suffix" => ""],
    "mantan"    => ["label" => "Nama Mantan:", "suffix" => ""],
];

$sql = "SELECT * FROM tbl_biodata_daftar_pengunjung ORDER BY cid DESC";
$q = mysqli_query($conn, $sql);

if (!$q) {
    echo "<p>Gagal membaca data tamu: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} elseif (mysqli_num_rows($q) === 0) {
    echo "<p>Belum ada data tamu yang tersimpan.</p>";
} else {
    while ($row = mysqli_fetch_assoc($q)) {
        $arrContact = [
            "kode"      => $row["mkode_pengunjung"],
            "nama"      => $row["mnama_pengunjung"],
            "alamat"    => $row["malamat_rumah"],
            "tanggal"   => $row["mtanggal_kunjungan"],
            "hobi"      => $row["mhobi"],
            "asal"      => $row["masal_SLTA"],   
            "pekerjaan" => $row["mpekerjaan"],
            "ortu"      => $row["mnama_orang_tua"],
            "pacar"     => $row["mnama_pacar"], 
            "mantan"    => $row["mnama_mantan"],
        ];

        echo tampilkanBiodata($fieldConfig, $arrContact); 
    }
}
?>

<?php
require 'koneksi.php';

$sql = "SELECT * FROM tbl_tamu ORDER BY cid DESC";
$q = mysqli_query($conn, $sql);
?>
<table border="1" cellpadding="8" cellspacing="0">
<tr>
<th>ID</th>
<th>Nama</th>
<th>Email</th>
<th>Pesan</th>
</tr>
<?php while ($row = mysqli_fetch_assoc($q)): ?>
<tr>
<td><?= $row['cid']; ?></td>
<td><?= htmlspecialchars($row['cnama']); ?></td>
<td><?= htmlspecialchars($row['cemail']); ?></td>
<td><?= nl2br(htmlspecialchars($row['cpesan'])); ?></td>
</tr>
<?php endwhile; ?>
</table>

<?php
// ... (Kode koneksi database dan query SELECT Anda yang sudah ada)

$result = mysqli_query($conn, "SELECT * FROM tbl_tamu"); // Ganti tbl_tamu jika nama tabel berbeda

echo "<table border='1'>";
echo "<tr><th>No</th><th>ID</th><th>Nama</th><th>Email</th><th>Pesan</th></tr>";

// Inisialisasi nomor urut
$no = 1;

if (mysqli_num_rows($result) > 0) {
    // Loop untuk menampilkan data
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        // Menampilkan nomor urut
        echo "<td>" . $no . "</td>";
        // Menampilkan data lainnya dari database
        echo "<td>" . $row["ID"] . "</td>";
        echo "<td>" . $row["Nama"] . "</td>";
        echo "<td>" . $row["Email"] . "</td>";
        echo "<td>" . $row["Pesan"] . "</td>";
        echo "</tr>";
        
        // Menambahkan nomor urut untuk baris selanjutnya
        $no++;
    }
} else {
    echo "<tr><td colspan='5'>Tidak ada data ditemukan.</td></tr>";
}
echo "</table>";

// ... (Kode penutup lainnya)
?>
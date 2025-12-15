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

<!-- Di dalam file read.php, temukan bagian header tabel (<thead>) -->
<thead>
    <tr>
        <th>No</th> <!-- Tambahkan baris ini -->
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Pesan</th>
        <th>Created At</th> <!-- Untuk tugas no 5 -->
    </tr>
</thead>

<!-- Di dalam file read.php, di bagian perulangan data (biasanya loop while atau foreach) -->
<?php
$no = 1; // Inisialisasi variabel nomor urut
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>"; // Tampilkan nomor urut dan tambahkan 1
        echo "<td>" . $row["ID"] . "</td>";
        echo "<td>" . $row["Nama"] . "</td>";
        echo "<td>" . $row["Email"] . "</td>";
        echo "<td>" . $row["Pesan"] . "</td>";
        // Untuk tugas no 5
        echo "<td>" . $row["dcreated_at"] . "</td>"; 
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>Tidak ada data</td></tr>"; // Sesuaikan colspan
}
?>

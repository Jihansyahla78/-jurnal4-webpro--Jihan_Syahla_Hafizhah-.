<<?php
// Koneksi ke database MySQL
$host = "localhost";
$user = "root";
$pass = "";
$film_db = "bioskop"; // Ganti dengan nama database yang sesuai

$conn = new mysqli($host, $user, $pass, $film_db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data film
$query = "SELECT * FROM film";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Film</title>
    <style>
        table { border-collapse: collapse; width: 60%; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Daftar Film</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun Terbit</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id_film"] . "</td>";
                echo "<td>" . $row["judul"] . "</td>";
                echo "<td>" . $row["sutradara"] . "</td>";
                echo "<td>" . $row["tahun_rilis"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Tutup koneksi database
$conn->close();
?>

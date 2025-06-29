<?php
include "koneksi.php";

$nim = $_GET['nim'];
mysqli_query($conn, "DELETE FROM data_mahasiswa WHERE nim=$nim");
header("Location: index.php");
?>

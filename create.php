<?php include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim     = $_POST['nim'];
    $nama    = $_POST['nama'];
    $fakultas = $_POST['fakultas'];
    $prodi   = $_POST['program_studi'];
    $semester = $_POST['semester'];
    $ipk     = $_POST['ipk'];
    $keterangan  = $_POST['keterangan'];

    $sql = "INSERT INTO data_mahasiswa (nim, nama, fakultas, program_studi, semester, ipk, keterangan) VALUES 
            ('$nim', '$nama', '$fakultas', '$prodi', '$semester', '$ipk', '$keterangan')";

    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<h2>Tambah Mahasiswa</h2>
<form method="POST">
    NIM: <input type="text" name="nim" required><br><br>
    Nama: <input type="text" name="nama" required><br><br>
    Fakultas: <input type="text" name="fakultas"><br><br>
    Program Studi: <input type="text" name="program_studi"><br><br>
    Semester: <input type="number" name="semester"><br><br>
    IPK: <input type="text" name="ipk"><br><br>
    Keterangan: <select name="keterangan">
        <option value="Aktif">Aktif</option>
        <option value="Cuti">Cuti</option>
        <option value="Non-Aktif">Non-Aktif</option>
        <option value="Lulus">Lulus</option>
        <option value="DO">Drop Out</option>
    </select><br><br>
    <button type="submit">Simpan</button>
</form>

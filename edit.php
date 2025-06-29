<?php include "koneksi.php";

$nim = $_GET['nim'];
$result = mysqli_query($conn, "SELECT * FROM data_mahasiswa WHERE nim=$nim");
$data = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim     = $_POST['nim'];
    $nama    = $_POST['nama'];
    $fakultas = $_POST['fakultas'];
    $prodi   = $_POST['program_studi'];
    $semester = $_POST['semester'];
    $ipk     = $_POST['ipk'];
    $keterangan  = $_POST['keterangan'];

    $update = "UPDATE data_mahasiswa SET 
        nim='$nim', nama='$nama', fakultas='$fakultas', program_studi='$prodi',
        semester='$semester', ipk='$ipk', keterangan='$keterangan' 
        WHERE nim=$nim";

    if (mysqli_query($conn, $update)) {
        header("Location: index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<h2>Edit Mahasiswa</h2>
<form method="POST">
    NIM: <input type="text" name="nim" value="<?= $data['nim'] ?>" required><br><br>
    Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br><br>
    Fakultas: <input type="text" name="fakultas" value="<?= $data['fakultas'] ?>"><br><br>
    Program Studi: <input type="text" name="program_studi" value="<?= $data['program_studi'] ?>"><br><br>
    Semester: <input type="number" name="semester" value="<?= $data['semester'] ?>"><br><br>
    IPK: <input type="text" name="ipk" value="<?= $data['ipk'] ?>"><br><br>
    Keterangan: <select name="keterangan">
        <option value="Aktif" <?= $data['keterangan'] == 'Aktif' ? 'selected' : '' ?>>Aktif</option>
        <option value="Cuti" <?= $data['keterangan'] == 'Cuti' ? 'selected' : '' ?>>Cuti</option>
        <option value="Non-Aktif" <?= $data['keterangan'] == 'Non-Aktif' ? 'selected' : '' ?>>Non-Aktif</option>
        <option value="Lulus" <?= $data['keterangan'] == 'Lulus' ? 'selected' : '' ?>>Lulus</option>
        <option value="DO" <?= $data['keterangan'] == 'DO' ? 'selected' : '' ?>>Drop Out</option>
    </select><br><br>
    <button type="submit">Update</button>
</form>

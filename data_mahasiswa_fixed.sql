-- Membuat tabel jika belum ada
CREATE TABLE IF NOT EXISTS data_mahasiswa (
    nim VARCHAR(20) PRIMARY KEY,
    nama VARCHAR(100),
    fakultas VARCHAR(50),
    program_studi VARCHAR(50),
    semester VARCHAR(20),
    ipk DECIMAL(3,2),
    keterangan VARCHAR(20)
);

-- Memasukkan data
INSERT INTO data_mahasiswa (nim, nama, fakultas, program_studi, semester, ipk, keterangan) VALUES
('2024240003', 'Kevin Fajar Pratama', 'Teknik', 'Sistem Informasi', 'Semester 2', 3.60, 'Aktif'),
('2024240015', 'Gallant Adhiya Fauzan Pratama Putra', 'Teknik', 'Sistem Informasi', 'Semester 2', 3.74, 'Aktif');

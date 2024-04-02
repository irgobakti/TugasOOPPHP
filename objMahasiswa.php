<?php
session_start();

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kuliah = $_POST['kuliah'];
    $mata_kuliah = $_POST['mata_kuliah'];
    $nilai = $_POST['nilai'];

    // Validasi NIM harus terdiri dari 8 angka
    if (!preg_match('/^[0-9]{8}$/', $nim)) {
        $error .= "NIM harus terdiri dari 8 angka.<br>";
    }

    // Validasi Nama tidak boleh kosong
    if (empty($nama)) {
        $error .= "Nama tidak boleh kosong.<br>";
    }

    // Validasi Nilai harus berada dalam rentang 0-100
    if ($nilai < 0 || $nilai > 100) {
        $error .= "Nilai harus berada dalam rentang 0-100.<br>";
    }

    if (empty($error)) {
        // Simpan data ke dalam objek Mahasiswa
        $ns1 = new stdClass();
        $ns1->nim = $nim;
        $ns1->nama = $nama;
        $ns1->kuliah = $kuliah;
        $ns1->mata_kuliah = $mata_kuliah;
        $ns1->nilai = $nilai;

        // Simpan objek ke dalam session
        $_SESSION['mahasiswa'] = $ns1;

        // Redirect ke halaman hasilMahasiswa.php
        header('Location: hasilMahasiswa.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Form Input Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        h2 {
            text-align: center;
            color: #333333;
            margin-bottom: 30px;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <h2>Form Input Mahasiswa</h2>

    <form action="" method="post">
        <label>NIM: <input type="text" name="nim" required></label><br>
        <label>Nama: <input type="text" name="nama" required></label><br>
        <label>Kuliah:
            <select name="kuliah" required>
                <option value="" disabled selected>Pilih Kuliah</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                <!-- Tambahkan option lainnya sesuai kebutuhan -->
            </select>
        </label><br>
        <label>Mata Kuliah:
            <select name="mata_kuliah" required>
                <option value="" disabled selected>Pilih Mata Kuliah</option>
                <option value="Pemrograman Dasar">Pemrograman Dasar</option>
                <option value="Basis Data">Basis Data</option>
                <option value="Pengantar Sistem Informasi">Pengantar Sistem Informasi</option>
                <!-- Tambahkan option lainnya sesuai kebutuhan -->
            </select>
        </label><br>
        <label>Nilai: <input type="number" name="nilai" required></label><br>
        <input type="submit" value="Submit">
    </form>

    <?php if (!empty($error)) : ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

</body>

</html>
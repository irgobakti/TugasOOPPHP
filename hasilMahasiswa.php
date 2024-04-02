<?php
session_start();

// Cek apakah data mahasiswa ada di session
if (isset($_SESSION['mahasiswa'])) {
    $ns1 = $_SESSION['mahasiswa'];

    // Menentukan predikat, grade, dan status berdasarkan nilai
    if ($ns1->nilai >= 85) {
        $predikat = "A";
        $grade = "Sangat Memuaskan";
    } elseif ($ns1->nilai >= 75) {
        $predikat = "B";
        $grade = "Memuaskan";
    } elseif ($ns1->nilai >= 60) {
        $predikat = "C";
        $grade = "Cukup";
    } elseif ($ns1->nilai >= 40) {
        $predikat = "D";
        $grade = "Kurang";
    } else {
        $predikat = "E";
        $grade = "Sangat Kurang";
    }

    $status = ($ns1->nilai >= 65) ? "Lulus" : "Tidak Lulus";
} else {
    header('Location: objMahasiswa.php');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Hasil Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center !important;
        }

        .back-btn {
            text-align: center;
            margin-top: 20px;
        }

        .back-btn a {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }

        .back-btn a:hover {
            background-color: #0056b3;
        }

        /* CSS untuk membuat tabel horizontal */
        .horizontal-table {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .horizontal-table-row {
            display: flex;
            width: 100%;
            justify-content: space-between;
        }

        .horizontal-table-header,
        .horizontal-table-cell {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
        }

        .horizontal-table-header {
            background-color: #f2f2f2;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Data Mahasiswa</h2>

        <div class="horizontal-table">
            <div class="horizontal-table-row">
                <div class="horizontal-table-header">NIM</div>
                <div class="horizontal-table-cell"><?php echo $ns1->nim; ?></div>
                <div class="horizontal-table-header">Nama</div>
                <div class="horizontal-table-cell"><?php echo $ns1->nama; ?></div>
            </div>
            <div class="horizontal-table-row">
                <div class="horizontal-table-header">Kuliah</div>
                <div class="horizontal-table-cell"><?php echo $ns1->kuliah; ?></div>
                <div class="horizontal-table-header">Mata Kuliah</div>
                <div class="horizontal-table-cell"><?php echo $ns1->mata_kuliah; ?></div>
            </div>
            <div class="horizontal-table-row">
                <div class="horizontal-table-header">Nilai</div>
                <div class="horizontal-table-cell"><?php echo $ns1->nilai; ?></div>
                <div class="horizontal-table-header">Predikat</div>
                <div class="horizontal-table-cell"><?php echo $predikat; ?></div>
            </div>
            <div class="horizontal-table-row">
                <div class="horizontal-table-header">Grade</div>
                <div class="horizontal-table-cell"><?php echo $grade; ?></div>
                <div class="horizontal-table-header">Status</div>
                <div class="horizontal-table-cell"><?php echo $status; ?></div>
            </div>
        </div>

        <div class="back-btn">
            <a href="objMahasiswa.php">Kembali</a>
        </div>
    </div>



</body>

</html>
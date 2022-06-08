<?php
require_once '../../helpers/file-storage.php';
require_once '../../helpers/calculate.php';

// mengolah data hasil import form
if (isset($_POST["submit"])) {

    // nama file untuk menyimpan data
    $filename = '../../data/DataAll.txt';

    // ambil data dari file
    $getData = getData($filename, "triangle");

    // ambil indeks array terakhir
    if (!is_null($getData)) {
        $lastRow = count($getData) - 1;
    }

    // determine id
    $id = (is_null($getData)) ? 1 : $getData[$lastRow]['id_triangle'] + 1;

    // simpan hasil fungsi hitung matematika
    $cal_result = triangle($_POST["base_triangle"], $_POST["height_triangle"]);

    // data array yang akan disimpan dalam file
    $data = [
        'id_triangle' => $id,
        'id_square' =>  null,
        'id_circle' => null,
        'student_name' => $_POST["student_name"],
        'base_triangle' => $_POST["base_triangle"],
        'height_triangle' => $_POST["height_triangle"],
        'side_square' =>  null,
        'radius_circle' => null,
        'result' => $cal_result,
        'datetime' => date("Y-m-d h:i:sa")
    ];

    // simpan data di file
    $result = save($filename, "triangle", $data);

    // jika proses hasil berhasil
    // atau setara dengan benar atau sebaliknya salah
    // itu akan meningkatkan peringatan dan mengarahkan pengguna
    // ke triangle.php
    if ($result) {
        echo "<script type='text/javascript'>
                alert('Data berhasil disimpan...!');
                document.location.href = '../../views/triangle.php';
            </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Data GAGAL disimpan...!');
                document.location.href = '../../views/forms/form_add_triangle.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Perhitungan Luas Bangunan</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

</head>

<body>
    <?php include_once "../../components/navbar.php" ?>

    <div class="container py-4">

        <!-- Title website -->
        <div class="p-5 mb-3 bg-light rounded">
            <div class="container text-dark">
                <h1 class="display-6 fw-bolder ">Form Hitung Luas Segitiga</h1>
                <p>Rumus Luas : <b>1/2*Alas*Tinggi</b></p>
            </div>

            <div class="container">
                <div class="card p-4">
                    <form class="row g-3" action="" method="POST">

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control" id="nama" name="student_name" placeholder="Ketik nama segitiga disini" required>
                        </div>

                        <div class="mb-3">
                            <label for="alas" class="form-label">Panjang alas</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" id="alas" name="base_triangle" placeholder="Ketik alas segitiga disini" required>
                                <span class="input-group-text" id="rp-addon1">cm</span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="tinggi" class="form-label">Panjang tinggi</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" id="tinggi" name="height_triangle" placeholder="Ketik tinggi segitiga disini" required>
                                <span class="input-group-text" id="rp-addon1">cm</span>
                            </div>
                        </div>

                        <div class="mb-3 d-flex justify-content-end">
                            <a href="../triangle.php" class="btn btn-secondary btn-lg mx-2" role="button">Kembali</a>

                            <input class="btn btn-primary btn-lg" type="submit" name="submit" value="Hitung">
                        </div>


                    </form>
                </div>
            </div>

        </div>

        <script src="./assets/js/bootstrap.min.js"></script>
</body>

</html>
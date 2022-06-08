<?php
require_once '../helpers/file-storage.php';
require_once '../helpers/calculate.php';

$filename = '../data/DataAll.txt';
$result = getData($filename, "circle");

$max_total = max(array_column($result, 'result'));
$min_total = min(array_column($result, 'result'));

// mengambil semua data dari file
$data_all = getData($filename) ?? [];

$triangle = [
    "total" => calculateTotalOfEachshape($data_all, "triangle"),
    "percentage" => percentage($data_all, "triangle")
];
$square = [
    "total" => calculateTotalOfEachshape($data_all, "square"),
    "percentage" => percentage($data_all, "square")
];
$circle = [
    "total" => calculateTotalOfEachshape($data_all, "circle"),
    "percentage" => percentage($data_all, "circle")
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Perhitungan Luas Bangunan</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

</head>

<body>
    <!-- menyertakan file component navbar -->
    <?php include_once "../components/navbar.php" ?>

    <div class="container py-4">

        <!-- Judul website -->
        <div class="p-5 mb-3 bg-light rounded">
            <div class="container text-dark text-center">
                <h1 class="display-6 fw-bolder">Website Perhitungan Luas Bangun Datar</h1>
                <p>Website ini dapat digunakan untuk menghitung luas bangun datar segitiga, persegi, dan lingkaran </p>
            </div>
        </div>

        <!-- Card Analisis Total dan Persentase -->
        <div class="card p-3 bg-light mb-3">
            <div class="card-body">
                <div class="row">
                    <!-- max dan min -->
                    <div class="d-flex justify-content-center">
                        <div class="col-md-6 mb-3">
                            <div class="card text-center">
                                <div class="card-header bg-dark text-light">
                                    Perhitungan Nilai Max dan Min Yang Telah Dilakukan
                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="card">
                                                <b>Max</b>
                                                <h1><?= $max_total; ?></h1>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <b>Min</b>
                                                <h1><?= $min_total; ?></h1>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">

                    <!-- Segitiga -->
                    <div class="col-md-6">
                        <div class="card text-center">
                            <div class="card-header bg-dark text-light">
                                Perhitungan Segitiga Yang Telah Dilakukan
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="card">
                                            <b>Total</b>
                                            <h1><?= $triangle["total"] ?></h1>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <b>Persentase</b>
                                            <h1><?= $triangle["percentage"] ?></h1>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Persegi -->
                    <div class="col-md-6">
                        <div class="card text-center">
                            <div class="card-header bg-dark text-light">
                                Perhitungan Persegi Yang Telah Dilakukan
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="card">
                                            <b>Total</b>
                                            <h1><?= $square["total"] ?></h1>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <b>Persentase</b>
                                            <h1><?= $square["percentage"] ?></h1>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Lingkaran -->
                <div class="d-flex justify-content-center">
                    <div class="col-md-6 mb-3">
                        <div class="card text-center">
                            <div class="card-header bg-dark text-light">
                                Perhitungan Lingkaran Yang Telah Dilakukan
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="card">
                                            <b>Total</b>
                                            <h1><?= $circle["total"] ?></h1>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <b>Persentase</b>
                                            <h1><?= $circle["percentage"] ?></h1>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>
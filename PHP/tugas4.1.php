<?php
    // memanggil file pegawai dengan fungsi require
    require 'tugas4.php';

    // membuat 6 instance object pegawai
    $p1 = new Pegawai('01103101', 'Asep Suhendi', 'Manager', 'Islam', 'Menikah');
    $p2 = new Pegawai('01103102', 'Raka Yanuar', 'Kepala Bagian', 'Kristen', 'Belum Menikah');
    $p3 = new Pegawai('01103103', 'Lea Lio', 'Staff', 'Budha', 'Belum Menikah');
    $p4 = new Pegawai('01103104', 'Matiass Cordoba', 'Asisten Manager', 'Kristen', 'Menikah');
    $p5 = new Pegawai('01103105', 'Aldera Made Wardana', 'Staff', 'Hindu', 'Menikah');
    $p6 = new Pegawai('01103106', 'Azizah Kanza', 'Manager', 'Islam', 'Menikah');

    // array associative
    $pegawais = [$p1, $p2, $p3, $p4, $p5, $p6];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Pegawai::TITLE ?> - Tugas 4</title>


    <!-- bootstrap css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- header -->
    <header class="sticky-top shadow-sm">
        <div class="container py-3">
            <h3 class="text-center"><?= Pegawai::TITLE ?></h3>
        </div>
    </header>

    <!-- main content -->
    <main>
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 g-3">
                <?php foreach ($pegawais as $pegawai) { ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <?= $pegawai->mencetak() ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>

    <!-- footer -->
    <footer class="py-4">
        <div class="container">
        </div>
    </footer>

    <!-- bootstrap js -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>
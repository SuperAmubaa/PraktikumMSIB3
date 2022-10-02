<?php
    // membuat judul dengan array
    $arrJudul = ['No', 'NIM', 'Nama', 'Nilai', 'Keterangan', 'Grade', 'Predikat'];

    // membuat data dengan array scalar 1 dimensi
    $m1 = ['nim' => '01101101', 'nama' => 'Udin Samsudin', 'nilai' => 100];
    $m2 = ['nim' => '01101102', 'nama' => 'Yani Sumiarti', 'nilai' => 65];
    $m3 = ['nim' => '01101103', 'nama' => 'Rivan Muhyi', 'nilai' => 58];
    $m4 = ['nim' => '01101104', 'nama' => 'Fatimah Husain', 'nilai' => 83];
    $m5 = ['nim' => '01101105', 'nama' => 'Deden Ipan', 'nilai' => 94];
    $m6 = ['nim' => '01101106', 'nama' => 'Daifina Azzahra', 'nilai' => 92];
    $m7 = ['nim' => '01101107', 'nama' => 'Rika Agustina', 'nilai' => 66];
    $m8 = ['nim' => '01101108', 'nama' => 'Ramadhan Putra', 'nilai' => 78];
    $m9 = ['nim' => '01101109', 'nama' => 'Aceng Ridwan', 'nilai' => 70];
    $m10 = ['nim' => '01101110', 'nama' => 'Anggi Yanuari', 'nilai' => 56];

    // array associative
    $mahasiswa = [$m1, $m2, $m3, $m4, $m5, $m6, $m7, $m8, $m9, $m10];

    // aggregate function => nilai tertinggi, terendah, nilai rata-rata dan jumlah siswa
    $totalMahasiswa = count($mahasiswa);
    $jumlahNilai = array_column($mahasiswa, 'nilai');
    $nilaiTertinggi = max($jumlahNilai);
    $nilaiTerendah = min($jumlahNilai);
    $totalNilai = array_sum($jumlahNilai);
    $nilaiRataRata = $totalNilai / $totalMahasiswa;

    // keterangan hasil
    $result = [
        'Nilai Tertinggi' => $nilaiTertinggi,
        'Nilai Terendah' => $nilaiTerendah,
        'Nilai Rata-rata' => $nilaiRataRata,
        'Jumlah Mahasiswa' => $totalMahasiswa
    ]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>

    <link rel="stylesheet" href="src/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/css/style.css">
</head>

<body>
    <div class="container py-5">
        <h1 class="text-center text-primary font-custom mb-5">Data Mahasiswa</h1>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive mb-4" style="max-height: 300px;">
                    <table class="table mb-0 sticky">
                        <thead>
                            <tr>
                                <?php foreach ($arrJudul as $judul) { ?>
                                    <th><?= $judul ?></th>
                                <?php } ?>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $number = 1;

                                foreach ($mahasiswa as $mhs){
                                    $nilai = $mhs['nilai'];
                                    $keterangan = ($nilai >= 60) ? "<span class='badge rounded-pill text-bg-success'>Lulus</span>" : 
                                                                    "<span class='badge rounded-pill text-bg-danger'>Tidak Lulus</span>";

                                    if ($nilai >= 85 && $nilai <= 100) $grade = 'A';
                                    else if ($nilai >= 75 && $nilai < 85) $grade = 'B';
                                    else if ($nilai >= 60 && $nilai < 75) $grade = 'C';
                                    else if ($nilai >= 30 && $nilai < 60) $grade = 'D';
                                    else if ($nilai >= 0 && $nilai < 30) $grade = 'E';
                                    else $grade = '';

                                    switch ($grade) {
                                        case 'A': $predikat = 'Memuaskan'; break;
                                        case 'B': $predikat = 'Baik'; break;
                                        case 'C': $predikat = 'Cukup'; break;
                                        case 'D': $predikat = 'Kurang'; break;
                                        case 'E': $predikat = 'Buruk'; break;
                                        default: $predikat = 'Buruk';
                                    }
                            ?>
                                <tr bgcolor="" cellpading="1" border="1">
                                    <td><?= $number++ ?></td>
                                    <td><?= $mhs['nim'] ?></td>
                                    <td><?= $mhs['nama'] ?></td>
                                    <td><?= $mhs['nilai'] ?></td>
                                    <td><?= $keterangan ?></td>
                                    <td><?= $grade ?></td>
                                    <td><?= $predikat ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <!-- hasil -->
                <?php foreach ($result as $key => $value) { ?>
                    <ul class="list-group mb-2">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <?= $key ?>
                            <span class="badge rounded-pill text-bg-dark"><?= $value ?></span>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>


    <!-- bootstrap js -->
    <script src="src/js/bootstrap.bundle.min.js"></script>
</body>

</html>
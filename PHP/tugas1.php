
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 2 - PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
    <style>
        legend {
            padding: 5px 10px;
        }

        .rad{
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="container-md">
            <div class="container px-5 my-5">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <div class="form-floating mb-3">
                        <input class="form-control" name="namaPegawai" type="text" placeholder="Nama Pegawai" data-sb-validations="required" />
                        <label for="namaPegawai">Nama Pegawai</label>
                        <div class="invalid-feedback" data-sb-feedback="namaPegawai:required">Nama Pegawai is required.</div>
                    </div>
                    <div class="form-floating mb-3">
                        <select class="form-select" name="agama" aria-label="Agama"  name="religion">
                            <option selected>Pilih Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                        <label for="agama">Agama</label>
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-block">Jabatan</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" value="manager" type="radio" name="jabatan" data-sb-validations="required"/>
                            <label class="form-check-label" for="manager">Manager</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" value="asisten" type="radio" name="jabatan" data-sb-validations="required" />
                            <label class="form-check-label" for="asisten">Asisten</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" value="kabag" type="radio" name="jabatan" data-sb-validations="required" />
                            <label class="form-check-label" for="kabag">Kabag</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" value="staff" type="radio" name="jabatan" data-sb-validations="required" />
                            <label class="form-check-label" for="staff">Staff</label>
                        </div>
                        <div class="invalid-feedback" data-sb-feedback="jabatan:required">One option is required.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-block">Status Pernikahan</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" value="sudahMenikah" type="radio" name="statusPernikahan" data-sb-validations="required" />
                            <label class="form-check-label" for="sudahMenikah">Sudah Menikah</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" value="belumMenikah" type="radio" name="statusPernikahan" data-sb-validations="required" />
                            <label class="form-check-label" for="belumMenikah">Belum Menikah</label>
                        </div>
                        <div class="invalid-feedback" data-sb-feedback="statusPernikahan:required">One option is required.</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" name="jumlahAnak" type="text" placeholder="Jumlah Anak" data-sb-validations="required"/>
                        <label for="jumlahAnak">Jumlah Anak</label>
                        <div class="invalid-feedback" data-sb-feedback="jumlahAnak:required">Jumlah Anak is required.</div>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" name="submitButton" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
            <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        </div>

        <?php
            if($_SERVER["REQUEST_METHOD"]=="POST") {
                $name = $_POST['namaPegawai'];
                $agama = $_POST['agama'];
                $jabatan = $_POST['jabatan']; 
                $status = $_POST['statusPernikahan'];
                $jumlah_anak = $_POST['jumlahAnak'];
                $gajiPokok = 0; // Manager: 20jt, Asisten: 15jt, Kabag: 10jt, Staff: 4jt
                $tunjangan = 0; // 20% dari Gaji pokok
                $tunjangan_kel = 0; // <= 2: 5% Gapok, >=3 & <=5: 10% gapok, >5 15% gapok
                $gajiKotor = 0; // Jumlah semua penghasil (GAPOK, tunjangan, Tunjangan keluarga)
                $zakatProfesi = 0; // >6jt: 2.5% Gaji kotor
                $thp = 0; // Gaji Kotor - Zakat

                switch ($jabatan){
                    case 'manager' : $gajiPokok = 20000000; break;
                    case 'asisten' : $gajiPokok = 15000000; break;
                    case 'kabag' : $gajiPokok = 10000000; break;
                    case 'staff' : $gajiPokok = 4000000; break;
                }

                if($status == "belumMenikah") {
                    if($agama == "Islam") {
                        $tunjangan = 0.2 * $gajiPokok;
                        $gajiKotor = ($gajiPokok + $tunjangan);
                        if ($gajiKotor >= 6000000) $zakatProfesi = 0.025 * $gajiKotor;
                        $thp = ($gajiKotor - $zakatProfesi);
                    }
                    else {
                        $tunjangan = 0.2 * $gajiPokok;
                        $gajiKotor = ($gajiPokok + $tunjangan);
                        $thp = $gajiKotor;
                    }
                    $status = 'Menikah';
                    $jumlah_anak = 0;
                }
                else {
                    if($agama == "Islam") {
                        $tunjangan = 0.20 * $gajiPokok;
                        
                       
                        if ($jumlah_anak <= 2) $tunjangan_kel = 0.05 * $gajiPokok;
                        else if ($anak >= 3 && $jumlah_anak <=5) $tunjangan_kel = 0.1 * $gajiPokok;
                        else $tunjangan_kel = 0.15 * $gajiPokok;
                        
                        $gajiKotor = $gajiPokok + $tunjangan + $tunjangan_kel;
                        
                      
                        if ($gajiKotor >= 6000000) $zakatProfesi = 0.025 * $gajiKotor;
                        $thp = $gajiKotor - $zakatProfesi;

                    }
                    else {
                        $tunjangan = 0.20 * $gajiPokok;
                        
                        
                        if ($jumlahanak <= 2) $tunjangan_kel = 0.05 * $gajiPokok;
                        else if ($anak >= 3 && $jumlah_anak <=5) $tunjangan_kel = 0.1 * $gajiPokok;
                        else $tunjangan_kel = 0.15 * $gajiPokok;
                        
                        $gajiKotor = $gajiPokok + $tunjangan + $tunjangan_kel;
                        $thp = $gajiKotor;
                    }
                    $status = "Menikah";
                };

                echo "<table class='table'>
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Agama</th>
                        <th>Jabatan</th>
                        <th>Status Pernikahan</th>
                        <th>Jumlah Anak</th>
                        <th>Gaji Pokok</th>
                        <th>Tunjangan</th>
                        <th>Tunjangan Keluarga</th>
                        <th>Gaji Kotor</th>
                        <th>Zakat</th>
                        <th>Take Home Pay</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>$name</td>
                        <td>$agama</td>
                        <td>$jabatan</td>
                        <td>$status</td>
                        <td>$jumlah_anak</td>
                        <td>Rp. $gajiPokok</td>
                        <td>Rp. $tunjangan</td>
                        <td>Rp. $tunjangan_kel</td>
                        <td>Rp. $gajiKotor</td>
                        <td>Rp. $zakatProfesi</td>
                        <td>Rp. $thp</td>
                    </tr>
                </tbody>
            </table>";

            }
            
        ?>

    </div>
</body>
</html>

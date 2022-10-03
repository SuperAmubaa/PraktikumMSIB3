<?php 
  require_once "Bidang.php";
  class Lingkaran extends Bentuk
  {
    // Variabel Jari Jari
    public $jr;
    // Variabel Construct
    public function __construct ($jari)
    {
      $this->jr = $jari;
    }
    public function namaBidang()
    {
      echo "Lingkaran";
    }

    public function keterangan()
    {
      echo "Menghitung Bidang Lingkaran";
    }

    public function bidangLuas()
    {
      if ($this->jr % 10 == 0) $luas = (3.14 * ($this->jr**2));
      else $luas = (22/7 * ($this->jr**2));
      echo $luas;
    }
    public function bidangKeliling()
    {
      if ($this->jr % 10 == 0) $keliling = 3.14 * 2 * $this->jr;
      else $keliling = (2 * 22/7 * $this->jr);
      echo $keliling;
    }
  }

?>
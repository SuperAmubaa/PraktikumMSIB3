<?php 
  require_once "Bidang.php";
  class Segitiga extends Bentuk 
  {
    // Variabel Jari Jari
    public $alas;
    public $tinggi;
    // Variabel Construct
    public function __construct ($alas, $tinggi)
    {
      $this->alas = $alas;
      $this->tinggi = $tinggi;
    }

    public function namaBidang()
    {
      echo "Segitiga";
    }

    public function keterangan()
    {
      echo "Menghitung Bidang Segitiga";
    }

    public function bidangLuas()
    {
      $luas = $this->alas * $this->tinggi / 2;
      echo $luas;
    }
    public function bidangKeliling()
    {
      $keliling = ($this->tinggi * 3);
      echo $keliling;
    }
  }

?>
<?php 
  require_once "Bidang.php";
  class persegiPanjang extends Bentuk 
  {
    // Variabel Jari Jari
    public $panjang;
    public $lebar;
    // Variabel Construct
    public function __construct ($panjang, $lebar)
    {
      $this->panjang = $panjang;
      $this->lebar = $lebar;
    }

    public function namaBidang()
    {
      echo "Persegi Panjang";
    }

    public function keterangan()
    {
      echo "Menghitung Bidang Persegi Panjang";
    }

    public function bidangLuas()
    {
      $luas = $this->panjang * $this->lebar;
      echo $luas;
    }
    public function bidangKeliling()
    {
      $keliling = (2 * $this->panjang) + ($this->lebar * 2);
      echo $keliling;
    }
  }

?>
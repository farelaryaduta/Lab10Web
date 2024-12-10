<?php 
class Mobil {
    private $warna;
    private $merk;
    private $harga;

    public function __construct(){
        $this->warna = "Biru";
        $this->merk = "BMW";
        $this->harga = "1000000000";  
    }

    public function gantiWarna($warnaBaru){
        $this->warna = $warnaBaru;
    }

    public function tampilWarna (){
        echo "Warna Mobilnya : " . $this->warna;
    }
}

$a = new Mobil();
$b = new Mobil();

echo "<b>Mobil Pertama</b><br>";
$a->tampilWarna();
echo "<b>Mobil pertama ganti warna</b><br>";
$a->gantiWarna("Merah");
$a->tampilWarna();

echo"<br><b>Mobil Kedua</b><br>";
$b->gantiWarna("Hijau");
$b->tampilWarna();

?>
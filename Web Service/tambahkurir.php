<?php
error_reporting(E_ALL ^ E_DEPRECATED);

//koneksi database mysql
$dbhost = "mysql.hostinger.co.uk";
$dbuser	= "u838276818_pizza";
$dbpass	= "u838276818_";
$dbname	= "u838276818_pizza";
mysql_connect($dbhost,$dbuser,$dbpass);
mysql_select_db($dbname);

//buat array untuk menampung respon dari JSON
$respon = array();

// cek apakah nilai yang dikirimkan android sudah terisi
if (isset($_POST['nama']) && isset($_POST['latitude'])&& isset($_POST['longitude'])) {
    
        $nama = $_POST['nama'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];


      // query menambah data member
    $result = mysql_query("INSERT INTO kurir(nama, latitude, longitude) VALUES('$nama', '$latitude','$longitude')");

    // cek apakah query berhasil menambah data
    if ($result) {
        // jika berhasil menambah data ke mysql
        $respon["sukses"] = 1;
        $respon["pesan"] = "Berhasil menambah data kurir.";

        // memprint/mencetak JSON respon
        echo json_encode($respon);
    } else {
        // gagal menambah data kurir
        $respon["sukses"] = 0;
        $respon["pesan"] = "Gagal menambah data.";
        
        // memprint/mencetak JSON respon
        echo json_encode($respon);
    }
} else {
    // jika data tidak terisi/tidak terset
    $respon["sukses"] = 0;
    $respon["pesan"] = "data belum terisi";

    //  memprint/mencetak JSON respon
    echo json_encode($respon);
}
?>
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
if (isset($_POST['lat']) && isset($_POST['lng'])) {
    
    $latitude = $_POST['lat'];
    $longitude = $_POST['lng'];

      // query menambah data member
    $result = mysql_query("UPDATE update_lokasi SET latitude = '$latitude', longitude = '$longitude' WHERE id = 1");

    // cek apakah query berhasil menambah data
    if ($result) {
        // jika berhasil menambah data ke mysql
        $respon["sukses"] = 1;
        $respon["pesan"] = "Sukses.";

        // memprint/mencetak JSON respon
        echo json_encode($respon);
    } else {
        // gagal menambah data member
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
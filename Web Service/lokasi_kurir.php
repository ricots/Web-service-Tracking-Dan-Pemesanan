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

// query menampilkan semua data kurir
$result = mysql_query("SELECT *FROM update_lokasi") or die(mysql_error());

// jika data ada/tidak kosong
if (mysql_num_rows($result) > 0) {
    // looping semua hasil
    // member node
    $respon["kurir"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp member array
        $kurir = array();
        $kurir["id"] = $row["id"];
        //$kurir["nama"] = $row["nama"];
        $kurir["latitude"] = $row["latitude"];
        $kurir["longitude"] = $row["longitude"];
       //tambahkan array $member pada array final $respon
        array_push($respon["kurir"], $kurir);
    }
    // sukses
    $respon["sukses"] = 1;

    // memprint/mencetak JSON respon
    echo json_encode($respon);
} else {
    // jika data kosong
    $respon["sukses"] = 0;
    $respon["pesan"] = "Tidak ada member";

    // memprint/mencetak JSON respon
    echo json_encode($respon);
}
?>
			
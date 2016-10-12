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

// query menampilkan semua data member
$result = mysql_query("SELECT *FROM pemesan limit 3") or die(mysql_error());

// jika data ada/tidak kosong
if (mysql_num_rows($result) > 0) {
    // looping semua hasil
    // member node
    $respon["pemesan"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp member array
        $pemesan = array();
        $pemesan["id"] = $row["id"];
        $pemesan["nama"] = $row["nama"];
        $pemesan["alamat"] = $row["alamat"];
		$pemesan["no_telp"] = $row["no_telp"];
        $pemesan["latitude"] = $row["latitude"];
		$pemesan["longitude"] = $row["longitude"];
        
       //tambahkan array $member pada array final $respon
        array_push($respon["pemesan"], $pemesan);
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

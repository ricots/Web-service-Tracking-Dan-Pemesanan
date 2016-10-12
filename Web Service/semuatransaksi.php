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

// query menampilkan semua data transaksi
$result = mysql_query("SELECT *FROM detail_transaksi") or die(mysql_error());

// jika data ada/tidak kosong
if (mysql_num_rows($result) > 0) {
    // looping semua hasil
    // member node
    $respon["detail_transaksi"] = array();
    
    while ($row = mysql_fetch_array($result)) {
        // temp member array
        $detail_transaksi = array();
        $detail_transaksi["id_transaksi"] = $row["id_transaksi"];
        $detail_transaksi["harga"] = $row["harga"];
        $detail_transaksi["jumlah"] = $row["jumlah"];
		$detail_transaksi["keterangan"] = $row["keterangan"];
        $detail_transaksi["total_harga"] = $row["total_harga"];
        
       //tambahkan array $member pada array final $respon
        array_push($respon["detail_transaksi"], $detail_transaksi);
    }
    // sukses
    $respon["sukses"] = 1;

    // memprint/mencetak JSON respon
    echo json_encode($respon);
} else {
    // jika data kosong
    $respon["sukses"] = 0;
    $respon["pesan"] = "Tidak ada transaksi";

    // memprint/mencetak JSON respon
    echo json_encode($respon);
}
?>

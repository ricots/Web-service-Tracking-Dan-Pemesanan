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
if (isset($_POST['nama_produk']) && isset($_POST['harga'])&& isset($_POST['jumlah']) && isset($_POST['keterangan']) && isset($_POST['total_harga']) ) {
    
        $Namabarang = $_POST['nama_produk'];
       $harga = $_POST['harga'];
       $jumlah = $_POST['jumlah'];
       $keterangan = $_POST['keterangan'];
       $hargatotal= $_POST['total_harga'];


      // query menambah data member
    $result = mysql_query("INSERT INTO detail_transaksi (nama_produk,harga,jumlah,keterangan,total_harga) 
                  VALUES('$Namabarang', '$jumlah','$keterangan','$harga','$hargatotal')");

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
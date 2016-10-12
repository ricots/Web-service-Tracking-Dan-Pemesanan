<?php

 mysql_connect("mysql.hostinger.co.uk","u838276818_pizza","u838276818_");
 mysql_select_db("u838276818_pizza");
$query = "select * from produk";
$hasil = mysql_query($query);
if (mysql_num_rows($hasil)>0) {

	$response = array();
	$response["produk"] = array();
	while ($data = mysql_fetch_array($hasil))
	{
		$h["id_produk"] = $data['id_produk'];
		$h["nama_produk"] = $data['nama_produk'];
		$h["harga"] = $data['harga'];
		$h["deskripsi"] = $data['deskripsi'];
		$h["stok"] = $data['stok'];

		array_push($response["produk"], $h);
	}
	$response["success"] = "1";

	echo json_encode($response);
}
else{
	$response["success"] = 0;
	$response["message"] = "Tidak ada data";

	echo json_encode($response);

}
?>
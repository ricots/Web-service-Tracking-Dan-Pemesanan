<?php
// THIS IS ONLY A SAMPLE SCRIPT. PLEASE TWEAK IT TO YOUR NEEDS.
// IT COMES WITH NO WARRANTY WHATSOEVER. 
$dbhost = "mysql.hostinger.co.uk";
  	$dbuser	= "u838276818_pizza";
	$dbpass	= "u838276818_";
	$dbname	= "u838276818_pizza";
	mysql_connect($dbhost,$dbuser,$dbpass);
	mysql_select_db($dbname);

$file = "gps-position.txt"; // you might save in a database instead...
if (isset($_GET["lat"]) && preg_match("/^-?\d+\.\d+$/", $_GET["lat"])
    && isset($_GET["lon"]) && preg_match("/^-?\d+\.\d+$/", $_GET["lon"]) ) {

	$latitude = $_GET['lat'];
    $longitude = $_GET['lon'];
$id = 1;
      // query menambah data member
    $result = mysql_query("UPDATE kurir SET latitude='$latitude', longitude='$longitude' WHERE id_kurir='$id' ");
    $fh = fopen($file, "w");
    if (!$fh) {
        header("HTTP/1.0 500 Internal Server Error");
        exit(print_r(error_get_last(), true));
    }
    fwrite($fh, date("Y-m-d H:i:s")."_".$_GET["lat"]."_".$_GET["lon"]."_");
    if (isset($_GET["t"]) && preg_match("/^\d+$/", $_GET["t"])) {
        fwrite($fh, $_GET["t"]);
    }
    fclose($fh);
    // you should obviously do your own checks before this...
    echo "OK";
} else if (isset($_GET["tracker"])) {
    // do whatever you want here...
    echo "OK";
} else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Please type this URL in the <a href="https://play.google.com/store/apps/details?id=fr.herverenault.selfhostedgpstracker">Self-Hosted GPS Tracker</a> Android app on your phone.';
}
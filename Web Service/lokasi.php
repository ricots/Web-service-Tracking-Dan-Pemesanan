<?
$handle = @fopen("tmp/lokasi.txt", "r");
$conn = mysql_connect("mysql.hostinger.co.uk","u838276818_pizza","u838276818_"); 
mysql_select_db("u838276818_pizza",$conn);
while (!feof($handle)) // Loop til end of file.
{
$buffer = fgets($handle, 4096);
 // Read a line.
list($a,$b)=explode("|",$buffer);
//Separate string by the means of |
echo $a."-".$b."<br>";
$sql = "INSERT INTO kurir (latitude, longitude) VALUES('".$a."','".$b."',")";   
mysql_query($sql,$conn) or die(mysql_error());
}
?>
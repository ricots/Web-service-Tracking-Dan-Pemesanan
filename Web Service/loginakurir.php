<?php 
         mysql_connect("mysql.hostinger.co.uk","u838276818_pizza","u838276818_");
        mysql_select_db("u838276818_pizza");

        if(isset($_GET['username_kurir']) && isset($_GET['password_kurir'])){
	$user=$_GET["username_kurir"]; 
	$pass=$_GET["password_kurir"];
		$query = " SELECT * FROM login_kurir WHERE username_kurir = '$user' AND password_kurir ='$pass'"; 
		$result=mysql_query($query); 
		$row = mysql_num_rows($result); 
		if ($row > 0) { 
			$response["login_kurir"] = array();
			while($row = mysql_fetch_array($result)){
				$login_kurir["username_kurir"] = $row['username_kurir'];
				$login_kurir["password_kurir"] = $row['password_kurir'];
				array_push($response["login_kurir"], $login_kurir);				
			} 
			$response["success"] = 1; 
			$response["message"] = "Anda berhasil melakukan login";	
			echo json_encode($response); 
		} else{ 
			$response["success"] = 0; 
			$response["message"] = "Username atau password anda salah"; 
			echo json_encode($response);
		} 
}
	 	
?>			
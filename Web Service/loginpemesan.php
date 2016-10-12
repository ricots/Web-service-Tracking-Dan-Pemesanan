<?php 
         mysql_connect("mysql.hostinger.co.uk","u838276818_pizza","u838276818_");
        mysql_select_db("u838276818_pizza");

        if(isset($_GET['username_pemesan']) && isset($_GET['password_pemesan'])){
	$user=$_GET["username_pemesan"]; 
	$pass=$_GET["password_pemesan"];
		$query = " SELECT * FROM login_pemesan WHERE username_pemesan = '$user' AND password_pemesan ='$pass'"; 
		$result=mysql_query($query); 
		$row = mysql_num_rows($result); 
		if ($row > 0) { 
			$response["login_pemesan"] = array();
			while($row = mysql_fetch_array($result)){
				$login_pemesan["username_pemesan"] = $row['username_pemesan'];
				$login_pemesan["password_pemesan"] = $row['password_pemesan'];
				array_push($response["login_pemesan"], $login_pemesan);				
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
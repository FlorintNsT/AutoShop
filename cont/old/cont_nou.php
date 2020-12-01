<?php
include_once ('../common/config.php');
// $coin = 0 arata campuri
// $coin = 1 incearca inregtistrare

$coin = $_GET['coin'];

if ($coin == 1){
	//echo $coin;echo $coin;echo $coin;

	$username    = $_GET["username"];
	$password	 = $_GET["password"];
	$email  	 = $_GET["email"];

	if ($username !== ""){
		if($password !== ""){
			if($email!==""){
				// daca merge inserat return succes
				//$username=$_POST['username'];
				//$password=$_POST['password'];
				//$email=$_POST['email'];
				$sql="INSERT INTO user(username,password,email) 
					  VALUES (:usern,:pass,:em)";
				
				$query= $dbh -> prepare($sql);
    			$query-> bindParam(':usern', $username, PDO::PARAM_STR);
    			$query-> bindParam(':pass', $password, PDO::PARAM_STR);
    			$query-> bindParam(':em', $email, PDO::PARAM_STR);
    			
    			
    			$bit = 0 ;
    			try {
  					  $query-> execute();
				} catch (Exception $e) {
    				$bit = 1 ;
				}
				if($bit == 0){
					echo "OK";

	

				}else{
					echo "KO";
					
				}
    			
			} else {
				echo "Lipsa Email";
			}
		}else{
			echo "Lipsa parola";
		}
	}else{
		echo "Lipsa Email";
		
	}
	
}else{
	echo '
		<form action="" method="post">
			<label>Email</label><br>
			<input  id="email" type="text" name="email"><br>
			<label>Username</label><br>
			<input  id="usernameField" type="text" name="username"><br>
			<label>Parola</label><br>

			
 			 <input name="password" id="password" type="password" onkeyup="check();" />
			
			<br>
			
			<label>Confirma parola</label><br/>
  			<input type="password" name="confirm_password" id="confirm_password"  onkeyup="check();" /> 
  			<br/>
  			<span id="message"></span>
			
			</br>
			</br>
			<input  onmouseover="validate();" class = "Butonel1" type="submit" name="register" value="Inregistrare"> <br />
			<input class = "Butonel1" type="button" name="anulare" value=" Anulare"  onclick="document.location.href=\'login.php\';">
			</form>
	';
}


	
?>


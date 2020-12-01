
<?php
if (isset($_SESSION['id_user'])){
  $id_user = $_SESSION['id_user'];
}


echo '

	<div id="top">
	<h1 class = "box" id = "headerMic" >MotoShop</h1>
	
	<!---
		inlocuit cu buton cu js petr ajax
		--->
	';
  if (isset($id_user)){
      echo ' 
  <button class = "Butonel1" onclick="verifCmd();">Istoric</button> 
  <p class = "Nume" > ' . "User: ".$id_user. ' </p>
      <!---
    inlocuit cu buton cu js petr ajax
    --->
  

  <button class = "Butonel1"  name="Cos" value="Verifica Cos" onclick="verifCos();" >Cos</button>


  
  <button class = "Butonel1"  name="Back" value="VBack" onclick="shop();" >Magazin</button>
 ';
  }
  
 echo '
  <button class = "Butonel1"  name="Logout" value="Logout" onclick="logout();" >Logout</button>

    <br></br>
</div>

	
	<script type="text/javascript">
		function verifCos(){

         		var xmlhttp = new XMLHttpRequest();
        		xmlhttp.onreadystatechange = function() {
          	 	 if (this.readyState == 4 && this.status == 200) {
           	 	 //    document.getElementById("formlogare").remove();
            		    document.getElementById("centrat").innerHTML = this.	responseText;
           		 }
       		 };
       		// var str = "0";
       		xmlhttp.open("GET", "cos.php", true);
       	    xmlhttp.send();

         }

         function verifCmd(){
         	var xmlhttp = new XMLHttpRequest();
        		xmlhttp.onreadystatechange = function() {
          	 	 if (this.readyState == 4 && this.status == 200) {
           	 	 //    document.getElementById("formlogare").remove();
            		    document.getElementById("centrat").innerHTML = this.	responseText;
           		 }
       		 };
       		// var str = "0";
       		xmlhttp.open("GET", "comenziClienti.php", true);
       	    xmlhttp.send();
      	
      		
         }
         function shop(){
			//window.location.href = "client.php";
			var xmlhttp = new XMLHttpRequest();
        		xmlhttp.onreadystatechange = function() {
          	 	 if (this.readyState == 4 && this.status == 200) {
           	 	 //    document.getElementById("formlogare").remove();
            		    document.getElementById("tot").innerHTML = this.	responseText;
           		 }
       		 };
       		// var str = "0";
       		xmlhttp.open("GET", "client.php", true);
       	    xmlhttp.send();

         }

         function logout(){
          sessionStorage.clear()
            window.location.href = "login.php";

         }
	</script>


';
?>
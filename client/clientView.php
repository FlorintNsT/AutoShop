<?php 

 class ClientView{

    public static function showClientView(){

      $conn = mysqli_connect('localhost','root','');
		mysqli_select_db($conn,'PieseAutoDB');
		session_start();
		$id_user = $_SESSION['id_user'];

      include('../comanda/cosDeleteLogic.php');
      echo '   
         <!DOCTYPE html>
         <html>
         <head>
            <title>Client</title>
            <link rel="stylesheet" href="client1.css">
         </head>
         <body>
         <div id="tot">
            <div id="top">
         </div>
            ';
      include("../common/topClient.php");
      
      echo'
         <div id="shop">
            <form id= "lista" action="" method="post">
            <p  class = "box" id = "headerMic1" >Alege Modelul de Masina</p>
            <select name="masina">
            ';

      $checkMasina = mysqli_query($conn,"SELECT * from masina");

      echo "<option value = 'none'>----</option>";
        
      while($row = mysqli_fetch_array($checkMasina)){
            if(isset($_POST['masina'])){
               if ($row['id_masina'] == $_POST['masina']){
                  echo "<option selected value='".$row['id_masina']."'>".$row['producator']." ".$row['model']." ".$row['tip_motor']."</option>";	
               }else{
                  echo "<option value='".$row['id_masina']."'>".$row['producator']." ".$row['model']." ".$row['tip_motor']."</option>";
               }
            }else{
               echo "<option value='".$row['id_masina']."'>".$row['producator']." ".$row['model']." ".$row['tip_motor']."</option>";
            }
         }

      echo '
         </select>
         <input  class = "Butonel1" type="submit" name="search" value="Cautare">
         </form>
            <div id = "row">
            <div class="column">
         <img src="../images/kia.jpeg" id="margine" alt="dreapta" >
         </div>
         <div  id="centrat" class="column">
         ';
                           
            if (isset($_POST['search'])){
                  $masina = $_POST['masina'];
                  
                     if ($masina === 'none'){
                        $piesa = mysqli_query($conn,"SELECT * from piesa where sters != 1");
                     } else {
                        $piesa = mysqli_query($conn,"SELECT * from piesa WHERE sters != 1 and id_masina = '".$masina."'");
                     }

                     while($row = mysqli_fetch_array($piesa)){
   
                        echo "<div id='lista'>";
                        echo "Denumire: ".$row['denumire']."<br> Pret:".$row['pret'	]."  RON <br> <img src='data:image/jpeg;base64,".	base64_encode($row["img"])."' height='170' width='170' 	><br>";
                        echo "<form action='../piesa/detaliiController.php' method='post'>";
                        echo "<input  class = 'Butonel1' type='submit' 	name='Detail' value='Detalii'><br>";
                        echo "<input type='hidden' value='".$row['id_piesa']."' 	name='id_piesa'>";			
                        echo  "</form>";
                        echo "<form  action=".$_SERVER['PHP_SELF']." method='post' 	>";
                        echo "<input  class = 'Butonel1' type='submit' name='Add' 	value='Adauga in Cos'><br>";
                        echo "<input type='hidden' value='".$row['id_piesa']."' 	name='id_piesa'>";			
                        echo  "</form>";
                        echo "</div>";
                        
                     }
            }else {
               // 	$masina = $_POST['masina'];
                  $piesa = mysqli_query($conn,"SELECT * from piesa where sters != 1");
                     while($row = mysqli_fetch_array($piesa)){
                        echo "<div id='lista'>";
                        echo "Denumire: ".$row['denumire']."<br> Pret:".$row['pret'	]."  RON<br> <img src='data:image/jpeg;base64,".	base64_encode($row["img"])."' height='170' width='170' 	><br>";
                        echo "<form action='../piesa/detaliiController.php' method='post'>";
                        echo "<input class = 'Butonel1' type='submit' 	name='Detail' value='Detalii'><br>";
                        echo "<input type='hidden' value='".$row['id_piesa']."' 	name='id_piesa'>";			
                        echo  "</form>";
                        echo "<form  action=".$_SERVER['PHP_SELF']." method='post' 	>";
                        echo "<input class = 'Butonel1' type='submit' name='Add' 	value='Adauga in Cos'><br>";
                        echo "<input type='hidden' value='".$row['id_piesa']."' 	name='id_piesa'>";			
                        echo  "</form>";
                        echo "</div>";
                     }
               
               }  
                           
                  if (isset($_GET['comanda'])){
                        $cmd = $_GET['comanda'];

                        if ($cmd == '1'){
                           
                        // 	echo '
                        // 		<script>
                        // 			alert("Comanda efectuata cu succes");
                        // 			window.location.href = "client.php?";
                        // 		</script>
                        // ';

            
                  } elseif ($cmd == '2') {
                     
                     // echo '
                     // 	<script>
                     // 			alert("Element sters din cos);
                     // 			window.location.href = "client.php?";
                     // 		</script>
                     // ';
                                    
                  } elseif ($cmd == '3'){
                     echo '

                        <script>

                           var xmlhttp = new XMLHttpRequest();
                           xmlhttp.onreadystatechange = function() {
                                 if (this.readyState == 4 && this.status == 200) {
                                 //    document.getElementById("formlogare").remove();
                                       document.getElementById("centrat").innerHTML = this.	responseText;
                                 }
                              };
                              
                              xmlhttp.open("GET", "comenziClienti.php", true);
                                 xmlhttp.send();
                              </script>
            

                     ';
                  }
               }
         echo '
            </div>      
               </div>               
                  <div  class="column">	
                     <img src="../images/kia.jpeg" alt="dreapta" id ="margine" >
                  </div>';
                include("../common/bottomClient.php");
              echo' </div>
               </div>
               <!-- </form> -->
               </div>
               </body>
                  <footer> </footer>
               <html>';
    }

 }
?>
<?php

    $lista = array();

    $conn = mysqli_connect('localhost','root','');
        mysqli_select_db($conn,'PieseAutoDB');

         $res = mysqli_query($conn,"SELECT * from cos where id_user='".$_SESSION['id_user']."'");

         $count = mysqli_query($conn,"SELECT count(*) as total from cos where id_user='".$_SESSION['id_user']."'");
         
        $row = $count->fetch_row();

        while ($row = mysqli_fetch_array($res)){

            $yak = [];
            
            $yak = mysqli_query($conn,"SELECT * from piesa where id_piesa='".$row['id_piesa']."'");
        
              $lin = mysqli_fetch_array($yak);

              if(isset($lin['id_piesa'])){
                    array_push($lista, $lin['id_piesa']);     
              }
               
         }

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Delete']))
    {
        $contor = 0;
        foreach ($lista as $var) {
        	$contor = $contor + 1;
        }
        if ($contor >= 1){
        	$qr = "DELETE from cos where id_cos='".$_POST['id_cos']."'";
        	$dl = mysqli_query($conn,"DELETE from cos where id_cos='".$_POST['id_cos']."'");
       		 mysqli_query($conn,$dl);
       		 echo $dl;
    		//echo "<meta http-equiv='refresh' content='0'>";
     	
       		 echo '
     			<script>
     				window.location.href = "client.php?comanda=2"'.$qr.';
     			</script>
     			';
        } else {
        	$dl = mysqli_query($conn,"DELETE from cos WHERE id_user = '".$_SESSION['id_user']."'");
        	 mysqli_query($conn,$dl);
        	 echo '1313';
        	 echo '
     			<script>
     				window.location.href = "client.php?comanda=2";
     			</script>
     			';
        }
        
    }

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['CMD']))
    {
       
        $dl = mysqli_query($conn,"DELETE from cos WHERE id_user = '".$_SESSION['id_user']."'");
        foreach ($_POST['lista'] as $var) {
        	
        	// mysqli_query($conn,"INSERT INTO COMANDA (id_piesa,id_user) VALUES (".$var.",'".$_SESSION["id_user"]."'')");
        	$t = time();
        	$qr = "INSERT INTO comanda (date, id_piesa,id_user) VALUES ('".date("Y-m-d",$t)." Ora-> ".date('H:i:s')."',".$var.",'".$_SESSION["id_user"]."')";
        	 mysqli_query($conn,$qr);
        	 //echo $qr;
        }
       // echo "<meta http-equiv='refresh' content='0'>";
        //header('location:client.php?comanda=1');
       
     	echo '
     		<script>
     		window.location.href = "client.php?comanda=1";
     		</script>
     	';

        mysqli_query($conn,$dl);
         
    	
    }


?>
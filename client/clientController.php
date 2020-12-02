<?php 
include '../common/config.php';
include "clientView.php";

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Add'])) {
    ClientController::startClientController($_POST['id_piesa']);
}

ClientView::showClientView();

  class ClientController {
     
    public static function startClientController($id_piesa){
        $conn = mysqli_connect('localhost','root','');
		mysqli_select_db($conn,'PieseAutoDB');
		session_start();
		$id_user = $_SESSION['id_user'];
        $sql="INSERT INTO cos(id_piesa,id_user) VALUES ('".$id_piesa."','".$_SESSION['id_user']."')";
		//echo $sql;
  		mysqli_query($conn,$sql);
    
      }
 
    }
?>
<?php 
include '../common/config.php';
include "clientView.php";


$conn = mysqli_connect('localhost','root','');
        mysqli_select_db($conn,'PieseAutoDB');
        
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Add'])) {
    ClientController::startClientController($_POST['id_piesa'],$conn);
}

ClientController::showView($conn);


  class ClientController {
    public static function showView($conn){
      if(session_id() == '') {
        session_start();
      }
      $id_user = $_SESSION['id_user'];
      $checkMasina = mysqli_query($conn,"SELECT * from masina");
      $piesa = mysqli_query($conn,"SELECT * from piesa where sters != 1");
      
      
      
      ClientView::showClientView($id_user, $checkMasina, $piesa);

    }
    public static function startClientController($id_piesa, $conn){
        
		    if(session_id() == '') {
          session_start();
       }
		    $id_user = $_SESSION['id_user'];
        $sql="INSERT INTO cos(id_piesa,id_user) VALUES ('".$id_piesa."','".$_SESSION['id_user']."')";
		    //echo $sql;
  		  mysqli_query($conn,$sql);
    
      }
 
    }
?>
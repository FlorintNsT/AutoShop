<?php 
    $conn = mysqli_connect('localhost','root','');
    ComenziClientiController::startController($conn);

    class ComenziClientiController{
        
        public static function startController($conn){
            include 'comenziClientiView.php';
            mysqli_select_db($conn,'PieseAutoDB');
            session_start();
            $query = mysqli_query($conn,"SELECT DISTINCT date FROM comanda WHERE id_user='".$_SESSION['id_user']."' ORDER BY date DESC");
              while($row = mysqli_fetch_array($query)){
                  
                  $qr2= mysqli_query($conn,"SELECT * FROM comanda WHERE date ='".$row[0]."'");
                  ComenziClientiView::showView1($row[0]);

                  while($row2 = mysqli_fetch_array($qr2)){
                      
                    $qr3 =  "SELECT * from piesa where id_piesa='".$row2[1]."'";
                    $check= mysqli_query($conn,$qr3);
                    $res = mysqli_fetch_array($check);
                     
                    $qr4 = "SELECT * FROM masina WHERE id_masina = ".$res['id_masina'];
                    $check2 = mysqli_query($conn,$qr4);
                    $res1 = mysqli_fetch_array($check2);

                    ComenziClientiView::showView2($res['denumire'], $res1['model'], 
                                                  $res1['producator'], $res1['tip_motor'], $res["pret"], $row2[1]);
                      
                  }
                  echo "</div>";
    
              }
                 
        }
    }


?>
<?php 
    include "../common/PiesaModel.php";
    include "../common/MasinaModel.php";
    include "../common/ComandaModel.php";

    $conn = mysqli_connect('localhost','root','');
    ComenziClientiController::startController($conn);

    class ComenziClientiController{
        
        public static function startController($conn){
            include 'comenziClientiView.php';
            mysqli_select_db($conn,'PieseAutoDB');
            session_start();
            $query = mysqli_query($conn,"SELECT DISTINCT * FROM comanda WHERE id_user='".$_SESSION['id_user']."' ORDER BY date DESC");
              while($row = mysqli_fetch_array($query)){
                  
                 $comanda = new Comanda($row[0],$row[1],$row[2]);

                  $qr2= mysqli_query($conn,"SELECT * FROM comanda WHERE date ='".$comanda->date."'");
                  ComenziClientiView::showView1($comanda->date);

                  while($row2 = mysqli_fetch_array($qr2)){
                      
                    $qr3 =  "SELECT * from piesa where id_piesa='".$row2[1]."'";
                    $check= mysqli_query($conn,$qr3);
                    $res = mysqli_fetch_array($check);

                    $piesa = new Piesa($res['id_piesa']
                                        ,$res['id_masina']
                                        ,$res['pret']
                                        ,$res['denumire']
                                        ,$res['img']
                                        ,$res['sters']);
                     
                    $qr4 = "SELECT * FROM masina WHERE id_masina = ".$res['id_masina'];
                    $check2 = mysqli_query($conn,$qr4);
                    $res1 = mysqli_fetch_array($check2);

                    $masina = new Masina($res[0],
                                        $res[1],
                                        $res[2],
                                        $res[3],
                                    );

                    ComenziClientiView::showView2($piesa->denumire,
                                                    $masina->model, 
                                                    $masina->producator,
                                                    $masina->tip_motor,
                                                    $piesa->pret,
                                                    $row2[1]);
                      
                  }
                  echo "</div>";
    
              }
                 
        }
    }


?>
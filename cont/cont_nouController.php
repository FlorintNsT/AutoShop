<?php 

    include '../common/config.php';
    // $coin = 0 arata campuri
    // $coin = 1 incearca inregtistrare
    include "cont_nouView.php";

    $coin = $_GET['coin'];
    if ($coin == 1){
        ContNouController::createCont($dbh,$_GET["username"], $_GET["password"], $_GET["email"]);
    } else {
        ContNouView::showContNou();
    }

    class ContNouController{
        public static function createCont($dbh,$username, $password, $email){
            //echo $coin;echo $coin;echo $coin;

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
        }
    }

?>
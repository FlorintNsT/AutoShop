<?php 
    
    include_once ('../common/config.php');

    include "loginView.php";
    session_start();


if (isset($_GET['contNouR'])){
    LoginView::showContNouR();
    }
    
    if(isset($_POST['login']))
    {
       //LoginView::executeLogin($dbh, $_POST['username'], $_POST['password']);
       
       $input_user = $_POST['username'];
       $input_password = $_POST['password'];
       
       echo "nu are cum";
       $uname=$input_user;
       $password=$input_password;
       $sql ="SELECT username, password FROM user WHERE username=:uname";
       $query= $dbh -> prepare($sql);
       $query-> bindParam(':uname', $uname, PDO::PARAM_STR);
       //$query-> bindParam(':password', $password, PDO::PARAM_STR);
       $query-> execute();
       $results=$query->fetchAll(PDO::FETCH_OBJ);
       if($query->rowCount() > 0)
       {
          if($uname == 'admin'){
             //echo $uname;
             $_SESSION['admin'] = "admin";
             echo "<script type='text/javascript'> document.location = '../admin/adminController.php'; </script>";
          } else {
            
             $_SESSION['admin'] = null;
                 $conn = mysqli_connect('localhost','root','');
             mysqli_select_db($conn,'PieseAutoDB');
    
              $check= mysqli_query($conn,"SELECT * from user where username='".$uname."'");
                $res = mysqli_fetch_array($check);
                if ($res[0] != NULL) {
                  //
                  $check1= mysqli_query($conn,"SELECT password from user where username='".$uname."'");
                   $res1 = mysqli_fetch_array($check1);
    
                   if ($res1[0] == $password){
                    echo "<script> alert('".$password."')</script>";
                     
                  echo "<script type='text/javascript'> document.location = '../client/clientController.php'; </script>";
                   header("location: ../client/clientController.php");
    
                  } else {
                     $error1 = "Parola invalida.";
                  //   echo "<script type='text/javascript'> document.location = 'client.php'; </script>";
                   //header("location: client.php");
                       echo "<script> alert('".$error1."')</script>";
                  }
    
                } else {
                 // echo "<script type='text/javascript'> document.location = 'client.php'; </script>";
                  // header("location: client.php");
                  $error = "Username invalidaa.";
                  echo "<script> alert('".$error."')</script>";
                }
               // echo "SELECT * from user where username='".$uname."'";
               $_SESSION['id_user'] = $uname;
    
           
        }
    
        
       } else {
           $error = "Username invalidass.";
          echo "<script> alert('".$error."')</script>";
        }
    
    }
    if (isset($_POST['register'])) {
       
        LoginView::executeRegister($_POST['username'], $_POST['password'], $_POST['email']);
       
    }else{
        LoginView::showLogin();
    
    }


?>
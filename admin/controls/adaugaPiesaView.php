<?php 

class AdaugaPiesaView{
        public static function showAdaugaPiesaView1(){
            echo '
             <!DOCTYPE html>
             <html>
             <head>
                 <title></title>
                 <link rel="stylesheet" href="adaugaMasina.css">
             </head>
             <body>';
             include('../../common/topClient.php');
             echo '     
             <link rel="stylesheet" href="../../client/client.css">  
             <form enctype="multipart/form-data" action="'.$_SERVER['PHP_SELF'].'" method="post" >
             <p>Alege Modelul de Masina</p>
             <select name="masina">
             ';
         }
         public static function showAdaugaPiesaView2(){
             echo '
             </select><br>
             <p>Denumire</p><input type="text" name="denumire"><br>
             <p>Pret in RON</p><input type="text" name="pret"><br>
             <p>Imagine max=500kb</p><input class = "Butonel1" type="file" name="img_path"><br>
             <input  class = "Butonel1" type="submit" name="ok" value="Adauga">
             </form>
             <button class = "Butonel1"  name="Logout" value="Logout" onclick="back();"> Back</button>';
             include('../../common/bottomClient.php');
             echo '
             </body>
             </html>
             <script>
     
                     function back(){
                             window.location.href = "./adminController.php";
                     }
     
             </script>
             ';
         }
    
}

?>
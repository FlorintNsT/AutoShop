<?php 


class AdaugaMasinaView{
  
    public static function showAdaugaMasinaView(){
        echo '
        <!DOCTYPE html>
        <html>
        <head>
            <title>Adauga Masina</title>
            <link rel="stylesheet" href="adaugaMasina.css">
        </head>
        <body>';
    
        include('../../common/topClient.php');
        echo '
            <link rel="stylesheet" href="../../client/client.css">
            <form action="" method="post">
            
            <label>Producator</label><br>
            <input type="text" name="producator"><br>
            
            <label>Model</label><br>
            <input type="text" name="model"><br>
            
            <label>Tip_Motor</label><br>
            <select name="tip_motor">
                <option value="benzina">Benzina</option>
                <option value="diesel" >Diesel</option>
            </select>
            <br><br>
            
            <input  class = "Butonel1" type="submit" name="ok" value="Adauga">
            </form>
            <button class = "Butonel1"  name="Logout" value="Logout" onclick="back();"> Back</button>
            </body>';
        include('../../common/bottomClient.php');
        echo ' 
        </html>
        <script>
        function back(){
                window.location.href = "./adminController.php";
        }
        </script>'
            ;
    }

}

?>
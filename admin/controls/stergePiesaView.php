<?php 

class StergePiesaView{

    public static function showStergePiesaView1(){
        echo '
        <!DOCTYPE html>
        <html>
        <head>
            <title>Client</title>
            <link rel="stylesheet" href="editeazaMasini.css">
        </head>
        <body>';
        include('../../common/topClient.php');
        echo '
            <form action="" method="post">
            <p>Alege Modelul de Masina</p>
            <select name="masina">
        ';
    }

    public  static function showStergePiesaView2(){
        echo '
        </select>
        <!-- <select tip="motor">
            <option value="none">---</option>
            <option value="benzina">Benzina</option>
            <option value="Diesel">Diesel</option>
        </select> -->
        <input  class="Butonel1" type="submit" name="search" value="Cautare">
        </form>
        <div id="centrat">
    ';
    }

    public static function showEnd(){
        echo '
        </div>
        <br/>
        <button class = "Butonel1"  name="Logout" value="Logout" onclick="back();"> Back</button>';
        include('../../common/bottomClient.php');
        echo '
            </body>
            </html>
            <script>
                function back(){
                        window.location.href = "../adminController.php";
                }
            </script>
        ';
    }
}
?>
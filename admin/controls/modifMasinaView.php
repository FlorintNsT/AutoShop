<?php 
class ModifMasinaView{
    public static function showModifMasinaView($res, $id_masina){
        echo '
            <!DOCTYPE html>
            <html>
            <head>
                <title>Modificare Masina</title>
                <link rel="stylesheet" href="editeazaMasini.css">
            </head>
            <body>';
             include('../../common/topClient.php');
             echo '
            <form  action="'.$_SERVER['PHP_SELF'].'" method="post" >
                
                <label>Producator</label><br>
            
                <input type="text: name="producator" value="'.$res[1].'" ><br>
                <br/>
            
                <label>Model</label><br>
                
                    <input type=:text" name="model" value="'.$res[2].'"><br>
                
                <br/>
                <label>Tip_Motor</label><br>
                <select name="tip_motor">';
                     
                if($res[3] == 'benzina'){
                    echo "<option selected value='benzina'>Benzina</option>";
                    echo "<option value='diesel' >Diesel</option>";
                }else{
                    echo "<option  value='benzina'>Benzina</option>";
                    echo "<option selected value='diesel' >Diesel</option>";
                }
                echo '
                </select>
                ';
                
                echo "<input type='hidden' value='".$id_masina."' name='id_masina'>";
                echo '
                <br/>
                <br/>
                <input class = "Butonel1" type="submit" name="ok" value="Salveaza">
                </form>
                <br/>
                <button class = "Butonel1"  name="Logout" value="Logout" onclick="back();"> Back</button>
                ';
                 include('../../common/bottomClient.php'); 
                
                echo '
                 </body>
                    </html>
                    <script>
                    function back(){
                            window.location.href = "editeazaMasiniController.php";
                    }
                </script>
        ';
    }
}
?>
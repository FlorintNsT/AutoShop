<?php 

class ModifPiesaView{

    public static function showView($conn,$res, $id_piesa){
        echo '
            <!DOCTYPE html>
            <html>
            <head>
                <title>Modifca Piesa</title>
                <link rel="stylesheet" href="editeazaMasini.css">
            </head>
            <body>';
        include('../../common/topClient.php');
        echo '
        <form enctype="multipart/form-data" action="'.$_SERVER['PHP_SELF'].'" method="post" >
                <p>Alege Modelul de Masina</p>
                <select name="masina">';
                            
        $checkMasina = mysqli_query($conn,"SELECT * from masina");
        while($row = mysqli_fetch_array($checkMasina)){
            echo "<option value='".$row['id_masina']."'>".$row['producator']." ".$row['model']."</option>";
        }
                            
        echo '
        </select><br>
        <p>Denumire</p><input type="text" name="denumire" value="'.$res[2].'"><br>
        <p>Pret in RON</p><input type="text" name="pret" value="'.$res[3].'"><br>
        
        <p>Image</p><input class = "Butonel1" type="file" name="img_path"><br>';
                    
        echo "<img src='data:image/jpeg;base64,".base64_encode($res[1])."' height='100' width='100' >";
                       
        echo "<input type='hidden' value='".$id_piesa."' name='id_piesa'>";
                   
        echo '
        <br/>
        <input class = "Butonel1" type="submit" name="ok">
        </form>
        <button class = "Butonel1"  name="Logout" value="Logout" onclick="back();"> Back</button>';
        
        include('../../common/bottomClient.php'); 
        
        echo' 
            </body>
            </html>
            <script>

                function back(){
                        window.location.href = "editeazaPieseController.php";
                }

            </script>
            
        ';
    }

}

?>
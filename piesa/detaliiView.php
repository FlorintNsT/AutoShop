<?php 
    class DetaliiView{

        public static function showDetaliiView($res){

            echo '
            <link rel="stylesheet" href="../client/client.css">
            <!DOCTYPE html>
            <html>
            <head>
                <title>Produs</title>
            </head>
            <body>
            ';

             include('../common/topClient.php');
             
            echo "
            <p class='eticheta' >Denumire: ".$res['denumire']."</p><br> <p class='eticheta' >Pret:".$res['pret']." RON </p><br> <img src='data:image/jpeg;base64,".base64_encode($res["img"])."' height='350' width='350' ><br>
    
            ";
                                        
            echo '
                <button class = "Butonel1"  name="Back" value="VBack" onclick="shop();" >Back</button>
                <br></br>
                <script>
                
                        function shop(){
                        window.location.href = "../client/clientController.php?comanda=3";
                            }
                </script>
            ';
            
            include('../common/bottomClient.php');
            echo '
            </body>
            </html>
            ';

        }

    }
?>
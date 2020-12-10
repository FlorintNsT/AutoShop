

<?php 

class StergeMasiniView{
    public static function showStergeMasinaView1(){
        echo '
        <!DOCTYPE html>
        <html>
        <head>
            <title>Editeaza masina</title>
            <link rel="stylesheet" href="editeazaMasini.css">
        </head>
        <body>
        ';
        include('../../common/topClient.php');

        echo '
        <form action="" method="post">
        <p>Alege Producatorul</p>
        <select name="producator">
        ';

    }
    public static function showStergeMasinaView2(){
        echo '
        </select>
        <input class = "Butonel1" type="submit" name="search" value="Cautare">
        </form>
        <div id="centrat">
        ';
    }

    public static function showStergeMasinaView3(){
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
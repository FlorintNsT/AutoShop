<?php 
    class ContNouView{

        public static function showContNou(){
            echo '
                <form action="" method="post">
                    <label>Email</label><br>
                    <input  id="email" type="text" name="email"><br>
                    <label>Username</label><br>
                    <input  id="usernameField" type="text" name="username"><br>
                    <label>Parola</label><br>

                    
                    <input name="password" id="password" type="password" onkeyup="check();" />
                    
                    <br>
                    
                    <label>Confirma parola</label><br/>
                    <input type="password" name="confirm_password" id="confirm_password"  onkeyup="check();" /> 
                    <br/>
                    <span id="message"></span>
                    
                    </br>
                    </br>
                    <input  onmouseover="validate();" class = "Butonel1" type="submit" name="register" value="Inregistrare"> <br />
                    <input class = "Butonel1" type="button" name="anulare" value=" Anulare"  onclick="document.location.href=\'loginController.php\';">
                    </form>
            ';
        }

    }
?>
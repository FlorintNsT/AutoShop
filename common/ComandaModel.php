<?php 

class Comanda{
    public $date;
    public $id_piesa;
    public $id_user;

    function __construct($a, $b, $c){
        $this->date = $a;
        $this->id_piesa = $b;
        $this->id_user = $c;
    }


}


?>
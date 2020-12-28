<?php 

class Masina{
    public $id_masina;
    public $producator;
    public $model;
    public $tip_motor;

    function __construct($a, $b, $c, $d){
        $this->id_masina = $a;
        $this->producator = $b;
        $this->model = $c;
        $this->tip_motor = $d;
    }


}


?>
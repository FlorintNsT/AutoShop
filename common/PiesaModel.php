<?php

class Piesa{
    public $id_piesa;
    public $id_masina;
    public $pret;
    public $denumire;
    public $img;
    public $sters;

    function __construct($a, $b, $c, $d, $e, $f) {
        $this->id_piesa = $a;
        $this->id_masina = $b;
        $this->pret = $c;
        $this->denumire = $d;
        $this->img = $e;
        $this->sters = $f;
    }
}

?>
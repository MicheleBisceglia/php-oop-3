<?php
class CreditCard {
    public $numeroCarta;
    public $scadenza;
    public $cvc;

    function __construct($_numeroCarta, $_scadenza, $_cvc ) {
        $this->numeroCarta = $_numeroCarta;
        $this->scadenza = $_scadenza;
        $this->cvc = $_cvc;
    }

//Funzione per verificare la data di scadenza della carta 
    public function checkPayament() {
        $today = new \DateTime('midnight');
        $scadenza_datetime = \DateTime::createFromFormat("m/y", $this->scadenza);
        return $today < $scadenza_datetime;
    }
}
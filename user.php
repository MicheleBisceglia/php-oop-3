<?php
// Classe Utente 
class User {
  public $name;
  public $email;
  public $scadenza;
  public $registered;
  public $cart = [];

  function __construct($_name, $_email, $_scadenza, $_registered) {
    $this->name = $_name;
    $this->email = $_email;
    $this->scadenza = $_scadenza;
    $this->registered = $_registered;
  }

//Funzione per aggiungere prodotti al carrello
  function addToCart($_productToCart) {
    $this->cart[] = $_productToCart;
  } 

//Funzione per calcolare il prezzo totale
  function getTotalPrice() {
    $total_price = 0;
    foreach($this->cart as $item) {
        $total_price += $item->prezzo;
    }
    //se l'utente è registarto applicalo sconto del 20%
    if($this->registered) {
      return number_format(($total_price / 100)*80, 2);
    }
    //se l'utente non è registarto il prezzo resta pieno
    else return $total_price;
}
}
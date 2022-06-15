<?php
// Classe Utente 
class User {
  public $name;
  public $email;
  public $registered;
  public $cart = [];

  function __construct($_name, $_email, $_registered) {
    $this->name = $_name;
    $this->email = $_email;
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
      return number_format(($total_price / 100)*80, 2) . '  <small>20% di sconto per te che sei già registrato!<small/>';
    }
    //se l'utente non è registarto il prezzo resta pieno
    else return $total_price;
}

public function setPaymentMethod($_paymentMethod) {
  $this->paymentMethod = $_paymentMethod;
}

public function payamentMethod_result() {
      //Se la carta risulta valida stampo il messaggio di conferma in verde
        if ($this->paymentMethod->checkPayament()) {
            return '<h3 class="bg-success">Metodo di pagamento convalidato!<h3/>';
      //Altrimenti stampo il messaggio di errore in rosso
        } else {
            return '<h3 class="bg-danger">Metodo di pagamento non convalidato<h3/>';
        }
    }
}
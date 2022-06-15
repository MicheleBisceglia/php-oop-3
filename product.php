<?php
//Classe prodotti //principale
class Product {
  public $nome;
  public $prezzo;
  public $made;

  function __construct($_nome, $_prezzo, $_made) {
    $this->nome = $_nome;
    $this->prezzo = $_prezzo;
    $this->made = $_made;
  }
  //Funzione per stampare i prodotti nella pagina
  public function printProduct() {
    return "$this->nome
    $this->prezzo euro;
    made in: $this->made.";
  }
}
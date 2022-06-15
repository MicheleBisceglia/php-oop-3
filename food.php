<!-- subclasses -->
<?php
require_once __DIR__ . "/product.php";

//Mangime-Sottoclasse di product
class Food extends Product {
  function __construct($_nome, $_prezzo, $_made, $_animal, $_expiryDate) {
    parent:: __construct($_nome, $_prezzo, $_made);
    $this->animal = $_animal;
    $this->expiryDate = $_expiryDate;
  }
  public function printProduct() {
    return "$this->nome; 
    $this->prezzo euro; 
    made in: $this->made; 
    per: $this->animal; 
    consumare entro il $this->expiryDate .";
  }
}


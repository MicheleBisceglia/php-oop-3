<!-- subclasses -->
<?php
require_once __DIR__ . "/product.php";

//Trasporto-Sottoclasse di product
class Transport extends Product {
  function __construct($_nome, $_prezzo, $_made, $_size, $_color) {
    parent:: __construct($_nome, $_prezzo, $_made);
    $this->size = $_size;
    $this->color = $_color;
  }
  public function printProduct() {
    return "$this->nome; 
    $this->prezzo euro; 
    made in: $this->made; 
    misura: $this->size; 
    colore: $this->color.";
  }
}
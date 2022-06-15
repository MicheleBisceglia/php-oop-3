<!-- subclasses -->
<?php
require_once __DIR__ . "/product.php";

//Giochi-Sottoclasse di product
class Toy extends Product {
  function __construct($_nome, $_prezzo, $_made, $_type, $_material) {
    parent:: __construct($_nome, $_prezzo, $_made);
    $this->type = $_type;
    $this->material = $_material; 
  }
  public function printProduct() {
    return "$this->nome;    
    $this->prezzo euro;    
    made in: $this->made;    
    per: $this->type;     
    materiale: $this->material.";  
  }
}
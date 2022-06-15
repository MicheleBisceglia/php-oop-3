<?php
trait format {
    public $peso;
    public $contenitore;

    public function printFormat() {
      return "informazioni aggiuntive: peso: $this->peso g; $this->contenitore";
    }
}
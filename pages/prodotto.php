<?php

class Prodotto 
{
  public $id;
  public $nome;
  public $tipo; //la tipologia è la proprietà per la creazione della tabella
  public $immagine;

    // Methods
    function __construct($id, $nome, $tipo, $immagine) {
        $this->id = $id;
        $this->nome = $nome;
        $this->tipo = $tipo;
        $this->immagine = $immagine;
    }
  
    //return valore nome
    function get_nome() 
    {
        return $this->nome;
    }
    
    //return valore tipo
    function get_tipo() 
    {
        return $this->tipo;
    }
    
    //return valore immagine
    function get_immagine() 
    {
        return $this->immagine;
    }
    
    //return valore id
    function get_id() 
    {
        return $this->id;
    }
}

?>
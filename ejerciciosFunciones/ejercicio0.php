<?php
class Persona {
    public $nombre;
    public $edad;
    public function saludar (){
        return "hola, " . $this->nombre;
    }
}


$persona = new Persona();
$persona->nombre = "Juan";
$persona->edad = 25;
echo $persona -> saludar(); 
?>
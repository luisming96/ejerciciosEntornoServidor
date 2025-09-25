<?php
class Persona
{
    public $nombre;
    protected $edad;
    private $password;

    public function __construct($nombre, $edad, $password)
    {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function getEdad()
    {
        return $this->edad;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
}
$persona1 = new Persona("luismiguel", 29, "1234");
$persona1->nombre;
$persona1->edad;
$persona1->getEdad();
$persona1->getPassword();

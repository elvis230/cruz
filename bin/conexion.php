<?php
class Conexion
{
    private $BD      = 'cruz';
    private $Host    = 'localhost';
    private $Usuario = 'root';
    private $Pwd     = '';

    public function BD()
    {
        return $this->BD;
    }
    public function Host()
    {
        return $this->Host;
    }
    public function Usuario()
    {
        return $this->Usuario;
    }
    public function Pwd()
    {
        return $this->Pwd;
    }

}
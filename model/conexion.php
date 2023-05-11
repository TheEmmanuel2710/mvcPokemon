<?php
class Conexion{
    private $host="localhost";
    private $user="root";
    private $password="";
    private $database="pokemon";
    private $con;

    public function __construct()
    {   
        try {
            $this->con=new PDO("mysql:dbname=$this->database; host=$this->host",$this->user,$this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Fallo en la conexión: " . $e->getMessage();
        }
    }

    /**
     * Obtén el valor de con
     */
    public function getCon()
    {
        return $this->con;
    }
}
$conexion=new Conexion();
?>

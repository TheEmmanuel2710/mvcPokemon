<?php

namespace Modelo;

use PDO;
use PDOException;

include_once "conexion.php";

class Rol
{
    private $id;
    private $nombre;
    private $estado = 'A';
    public $con;

    public function __construct()
    {
        $this->con = new \Conexion();
    }

    public function create()
    {
        try {
            $request = $this->con->getCon()->prepare("INSERT INTO roles(nombreRol,estado) VALUES(:nombre,:estado)");
            $request->bindParam(':nombre', $this->nombre);
            $request->bindParam(':estado', $this->estado);
            $request->execute();
            return "Rol creado de manera exitosa";
        } catch (PDOException $e) {
            return "Error: al crear rol" . $e->getMessage();
        }
    }
    public function read()
    {
        try {
            $request = $this->con->getCon()->prepare("SELECT * FROM  roles");
            $request->execute();
            $result=$request->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return "Error: al consultar roles" . $e->getMessage();
        }
    }
    public function readOne($id)
    {
        try {
            $request = $this->con->getCon()->prepare("SELECT * FROM roles WHERE id = :id");
            $request->bindParam(":id", $id);
            $request->execute();
            $result = $request->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return "Error al consultar rol " . $e->getMessage();
        } 
    }
    public function estado()
    {
        try {
            $request = $this->con->getCon()->prepare("UPDATE roles SET estado = ? WHERE id = ?");
            $request->bindParam(1,$this->estado);
            $request->bindParam(2,$this->id);
            $request->execute();
            return "Estado modificado";
        } catch (PDOException $e) {
            return "Error al actualizar estado " . $e->getMessage();
        }
    }  
    public function update()
    {
        try {
            $request = $this->con->getCon()->prepare("UPDATE roles SET nombreRol = ? WHERE id = ?");
            $request->bindParam(1,$this->nombre);
            $request->bindParam(2,$this->id);
            $request->execute();
            return "Nombre rol modificado";
        } catch (PDOException $e) {
            return "Error al actualizar el nombre del rol" . $e->getMessage();
        }
    } 
    public function delete()
    {
        try {
            $request = $this->con->getCon()->prepare("DELETE FROM roles  WHERE id = ?");
            $request->bindParam(1,$this->id);
            $request->execute();
            return "Rol eliminado de manera exitosa";
        } catch (PDOException $e) {
            return "Error al eliminar el rol" . $e->getMessage();
        }
    } 
    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }


    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     */
    public function setEstado($estado): self
    {
        $this->estado = $estado;

        return $this;
    }
}

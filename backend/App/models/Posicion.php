<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Posicion implements Crud{
    public static function getAll(){
        $mysqli = Database::getInstance();
        $query=<<<sql
    SELECT b.id_posicion, b.clave, b.nombre, b.fecha_alta, ua.nombre as creo FROM posiciones b 
    INNER JOIN utilerias_administradores ua on ua.utilerias_administradores_id = b.utilerias_administradores_id ORDER BY b.nombre ASC;
sql;
        return $mysqli->queryAll($query);
    }
    public static function getById($id){
        
    }
    public static function insert($data){
        
    }
    public static function update($data){
        
    }
    public static function delete($id){
        
    }
}
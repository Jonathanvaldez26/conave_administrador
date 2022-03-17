<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Linea implements Crud{
    public static function getAll(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT lp.id_linea_principal, lp.clave, lp.nombre, lp.fecha_alta, ua.nombre as creo, b.nombre AS nombre_bu
        FROM linea_principal lp
        INNER JOIN utilerias_administradores ua ON ua.utilerias_administradores_id = lp.utilerias_administradores_id 
        INNER JOIN bu b ON b.id_bu = lp.id_bu 
        ORDER BY lp.nombre ASC
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
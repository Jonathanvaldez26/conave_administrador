<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class PruebasCovidUsuarios implements Crud{
    public static function getAll(){
        
    }
    public static function getById($id){
        
    }
    public static function insert($data){
        
    }
    public static function update($data){
        
    }
    public static function delete($id){
        
    }

    public static function getByIdUser($id_usuario){
        $mysqli = Database::getInstance(true);
        $query =<<<sql
        SELECT * FROM prueba_covid WHERE utilerias_asistentes_id = '$id_usuario'
sql;

        return $mysqli->queryAll($query);
   
    }
}
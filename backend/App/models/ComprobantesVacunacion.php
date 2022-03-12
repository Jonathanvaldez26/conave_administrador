<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class ComprobantesVacunacion implements Crud{
    public static function getAll(){
        $mysqli = Database::getInstance(true);
        $query =<<<sql
        SELECT * FROM comprobante_vacuna cv
        INNER JOIN utilerias_asistentes u
        INNER JOIN registros_acceso ra
        ON cv.utilerias_asistentes_id = u.utilerias_asistentes_id
        and u.id_registro_acceso = ra.id_registro_acceso
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

    public static function getByIdUser($id_usuario){
        $mysqli = Database::getInstance(true);
        $query =<<<sql
        SELECT * FROM comprobante_vacuna WHERE utilerias_asistentes_id = '$id_usuario' and status = 1
sql;

        return $mysqli->queryAll($query);
   
    }
}
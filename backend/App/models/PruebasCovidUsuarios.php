<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class PruebasCovidUsuarios implements Crud{
    public static function getAll(){
        $mysqli = Database::getInstance(true);
        $query =<<<sql
        SELECT cv.id_prueba_covid AS id_c_v, cv.utilerias_asistentes_id , fecha_carga_documento, tipo_prueba, resultado, documento, cv.status AS status_prueba, CONCAT(ra.nombre, ' ',ra.segundo_nombre,' ',ra.apellido_paterno,' ',ra.apellido_materno) AS nombre_completo FROM prueba_covid cv
        JOIN utilerias_asistentes u
        JOIN registros_acceso ra
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
        SELECT * FROM prueba_covid WHERE utilerias_asistentes_id = '$id_usuario'
sql;

        return $mysqli->queryAll($query);
   
    }
}
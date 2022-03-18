<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Asistencias implements Crud{
    public static function getAll(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM asistencias
sql;
      return $mysqli->queryAll($query);
        
    }
    public static function getById($id){
         
    }
    public static function insert($asistentes){
        $mysqli = Database::getInstance(1);
        $query=<<<sql
            INSERT INTO asistencias(clave, nombre, descripcion, fecha_asistencia, hora_asistencia_inicio, hora_asistencia_fin, url, utilerias_administrador_id)
            VALUES(:clave, :nombre, :descripcion, :fecha_asistencia, :hora_asistencia_inicio, :hora_asistencia_fin, :url, :utilerias_administrador_id)
    sql;
            $parametros = array(
            ':clave'=>$asistentes->_clave,
            ':nombre'=>$asistentes->_nombre,
            ':descripcion'=>$asistentes->_descripcion,
            ':fecha_asistencia'=>$asistentes->_fecha_asistencia,
            ':hora_asistencia_inicio'=>$asistentes->_hora_asistencia_inicio,
            ':hora_asistencia_fin'=>$asistentes->_hora_asistencia_fin,
            ':url'=>$asistentes->_url,
            ':utilerias_administrador_id'=>$asistentes->_utilerias_administrador_id
            );
 
            $id = $mysqli->insert($query,$parametros);

            $accion = new \stdClass();
            $accion->_sql= $query;
            $accion->_parametros = $parametros;
            $accion->_id = $id;

            //UtileriasLog::addAccion($accion);
            return $id;
         
    }
    public static function update($data){
        
    }
    public static function delete($id){
        
    }
} 
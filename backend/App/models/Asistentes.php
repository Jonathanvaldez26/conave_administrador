<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Asistentes implements Crud{
    public static function getAll(){
        
    }

    public static function getById($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT utilerias_asistentes_id, id_registro_acceso, usuario, contrasena, politica, status FROM utilerias_asistentes WHERE utilerias_asistentes_id = $id;
sql;
        return $mysqli->queryAll($query);
    }

    public static function getTotalById($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT * FROM utilerias_asistentes ua INNER JOIN registros_acceso ra ON ua.id_registro_acceso = ra.id_registro_acceso WHERE ua.utilerias_asistentes_id = $id;
sql;
        return $mysqli->queryAll($query);
    }
    
    public static function insert($data){
        
    }

    public static function update($data){
      $mysqli = Database::getInstance(true);
      $query=<<<sql
      UPDATE registros_acceso SET nombre = :nombre, segundo_nombre = :segundo_nombre, apellido_materno = :apellido_materno, apellido_paterno = :apellido_paterno, fecha_nacimiento = :fecha_nacimiento, telefono = :telefono, alergias = :alergias WHERE email = :email;
  sql;
      $parametros = array(
        
        ':nombre'=>$data->_nombre,
        ':segundo_nombre'=>$data->_segundo_nombre,
        ':apellido_paterno'=>$data->_apellido_paterno,
        ':apellido_materno'=>$data->_apellido_materno,
        ':fecha_nacimiento'=>$data->_fecha_nacimiento,
        ':telefono'=>$data->_telefono,
        ':alergias'=>$data->_alergias,
        ':email'=>$data->_email
        
      );


      $accion = new \stdClass();
      $accion->_sql= $query;
      $accion->_parametros = $parametros;
      $accion->_id = $data->_administrador_id;
      // UtileriasLog::addAccion($accion);
      return $mysqli->update($query, $parametros);
  }

    public static function delete($id){
        
    }
}
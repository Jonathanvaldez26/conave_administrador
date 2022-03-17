<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Asistentes{

    public static function getAll(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT ra.nombre as nombre_usuario, ra.apellido_paterno, ra.apellido_materno, ra.id_registro_acceso, ua.status as status_user, ch.nombre_categoria, uad.nombre as nombre_administrador
      FROM registros_acceso ra
      INNER JOIN utilerias_asistentes ua ON (ra.id_registro_acceso = ua.id_registro_acceso) 
      INNER JOIN habitaciones_hotel hh ON (ra.id_habitacion = hh.id_habitacion) 
      INNER JOIN categorias_habitaciones ch ON (ch.id_categoria_habitacion = hh.id_categoria_habitacion)
      INNER JOIN utilerias_administradores uad ON (hh.utilerias_administradores_id = uad.utilerias_administradores_id)
      WHERE ra.id_registro_acceso = ua.id_registro_acceso
      and ra.politica = 1 and ua.status = 1 
sql;
      return $mysqli->queryAll($query);
        
    }

    public static function getAllRegister(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM registros_acceso WHERE politica = 1
sql;
      return $mysqli->queryAll($query);
        
    }

    public static function getAllRegisterSinHabitacion(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT ra.id_registro_acceso, CONCAT(ra.nombre, ' ', ra.segundo_nombre, ' ', ra.apellido_paterno, ' ',ra.apellido_materno, ' - ',ra.email,'') as nombre
      FROM registros_acceso ra
      WHERE ra.id_registro_acceso NOT IN (SELECT id_registro_acceso FROM asigna_habitacion) and ra.politica = 1 ORDER BY nombre ASC
  sql;
      return $mysqli->queryAll($query);
        
    }

    public static function getAllRegisterConHabitacion(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT ra.nombre, ra.segundo_nombre, ra.apellido_paterno, ra.apellido_materno, ah.*, ch.nombre_categoria, ua.nombre as nombre_administrador
      FROM registros_acceso ra
      INNER JOIN asigna_habitacion ah ON (ra.id_registro_acceso = ah.id_registro_acceso)
      INNER JOIN categorias_habitaciones ch ON (ch.id_categoria_habitacion = ah.id_categoria_habitacion)
      INNER JOIN utilerias_administradores ua ON(ua.utilerias_administradores_id = ah.utilerias_administradores_id)
      WHERE ra.politica = 1 GROUP BY ah.clave
  sql;
      return $mysqli->queryAll($query);
        
    }

    public static function getUsuariosByClaveHabitacion($clave){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT ah.id_registro_acceso, ah.clave, CONCAT(ra.nombre, ' ', ra.segundo_nombre, ' ', ra.apellido_paterno, ' ',ra.apellido_materno) as nombre, ra.email, ra.telefono, ah.id_asigna_habitacion
      FROM asigna_habitacion ah
      INNER JOIN registros_acceso ra ON (ah.id_registro_acceso = ra.id_registro_acceso)
      WHERE clave = '$clave'
sql;
      return $mysqli->queryAll($query);
        
    }

    public static function getCountAsistentesByClave($clave){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT count(*) as total_asignados
      FROM asigna_habitacion ah
      INNER JOIN registros_acceso ra ON (ah.id_registro_acceso = ra.id_registro_acceso)
      WHERE clave = '$clave'
sql;
      return $mysqli->queryAll($query);
        
    }



    public static function getUsuarioByName($nombre){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM registros_acceso WHERE nombre LIKE '$nombre%'
sql;
      return $mysqli->queryAll($query);
        
    }


    public static function getById($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT utilerias_asistentes_id, id_registro_acceso, usuario, contrasena, politica, status FROM utilerias_asistentes WHERE utilerias_asistentes_id = $id;
sql;
        return $mysqli->queryAll($query);
    }

    public static function getHabitacionByNumber($numero_habitacion){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT DISTINCT ra.nombre as nombre_usuario, ra.apellido_paterno, ra.apellido_materno, ua.status as status_user, hh.numero_habitacion, ch.nombre_categoria, uad.nombre as nombre_administrador
      FROM registros_acceso ra
      INNER JOIN utilerias_asistentes ua ON (ra.id_registro_acceso = ua.id_registro_acceso) 
      INNER JOIN habitaciones_hotel hh ON (ra.id_habitacion = hh.id_habitacion) 
      INNER JOIN categorias_habitaciones ch ON (ch.id_categoria_habitacion = hh.id_categoria_habitacion)
      INNER JOIN utilerias_administradores uad ON (hh.utilerias_administradores_id = uad.utilerias_administradores_id)
      WHERE ra.id_registro_acceso = ua.id_registro_acceso
      and ra.politica = 1 and ua.status = 1 and hh.numero_habitacion = $numero_habitacion
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
      UPDATE registros_acceso SET nombre = :nombre, segundo_nombre = :segundo_nombre, apellido_materno = :apellido_materno, apellido_paterno = :apellido_paterno, fecha_nacimiento = :fecha_nacimiento, telefono = :telefono, alergias = :alergias, alergias_otro = :alergias_otro, alergia_medicamento = :alergia_medicamento, alergia_medicamento_cual = :alergia_medicamento_cual, restricciones_alimenticias = :restricciones_alimenticias, restricciones_alimenticias_cual = :restricciones_alimenticias_cual WHERE email = :email;
sql;
      $parametros = array(
        
        ':nombre'=>$data->_nombre,
        ':segundo_nombre'=>$data->_segundo_nombre,
        ':apellido_paterno'=>$data->_apellido_paterno,
        ':apellido_materno'=>$data->_apellido_materno,
        ':fecha_nacimiento'=>$data->_fecha_nacimiento,
        ':telefono'=>$data->_telefono,
        ':alergias'=>$data->_alergias,
        ':alergias_otro'=>$data->_alergias_otro,
        ':alergia_medicamento'=>$data->_alergia_medicamento,
        ':alergia_medicamento_cual'=>$data->_alergia_medicamento_cual,
        ':restricciones_alimenticias'=>$data->_restricciones_alimenticias,
        ':restricciones_alimenticias_cual'=>$data->_restricciones_alimenticias_cual,
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

    public static function getEncargadoLinea($id_linea){
      
      $mysqli = Database::getInstance();
      $query =<<<sql
      SELECT ua.nombre as nombre_encargado, lp.clave, lp.nombre as nombre_linea, al.id_linea_principal
        FROM asigna_linea al
        INNER JOIN linea_principal lp ON (lp.id_linea_principal = al.id_linea_principal) 
        INNER JOIN utilerias_administradores ua ON (al.utilerias_administradores_id_linea_asignada = ua.utilerias_administradores_id) 
        WHERE al.id_linea_principal = $id_linea;
sql;
  
      return $mysqli->queryAll($query);
    }
}
<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Administradores implements Crud{
    public static function getAll(){
        $mysqli = Database::getInstance();
        $query=<<<sql
            SELECT a.utilerias_administradores_id, a.nombre, a.usuario, a.perfil_id, a.descripcion, a.status, s.nombre AS nombre_status, p.nombre AS nombre_perfil,
            per.permisos_globales, per.seccion_principal, per.seccion_asistentes, per.seccion_bu, per.seccion_lineas, per.seccion_posiciones,
            per.seccion_restaurantes, per.seccion_gafete, per.seccion_vuelos, per.seccion_pickup, per.seccion_habitaciones, per.seccion_cenas, per.seccion_vacunacion,
            per.seccion_pruebas_covid, per.seccion_sorteo_prueba_covid, per.seccion_utilerias, per.seccion_configuracion
            FROM utilerias_administradores AS a
            INNER JOIN utilerias_permisos AS per ON (a.usuario = per.usuario)
            INNER JOIN catalogo_status AS s ON (a.status = s.catalogo_status_id)
            INNER JOIN utilerias_perfiles AS p ON(a.perfil_id = p.perfil_id)
            WHERE a.usuario = per.usuario AND a.status = 1
sql;
        return $mysqli->queryAll($query);
    }
    public static function getById($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
            SELECT * FROM utilerias_administradores WHERE utilerias_administradores_id  = $id
sql;
        return $mysqli->queryOne($query);
        
    }
    public static function insert($administradores){
	    $mysqli = Database::getInstance(1);
        $query=<<<sql
            INSERT INTO utilerias_administradores(nombre, usuario, contrasena, perfil_id, descripcion, fecha_alta, status) 
            VALUES (:nombre, :usuario, :contrasena, :perfil_id, :descripcion, NOW(), :status)
    sql;
            $parametros = array(
            ':nombre'=>$administradores->_nombre,
            ':usuario'=>$administradores->_usuario,
            ':contrasena'=>$administradores->_contrasena,
            ':perfil_id'=>$administradores->_perfil_id,
            ':descripcion'=>$administradores->_descripcion,
            ':status'=>$administradores->_status
            );

            $id = $mysqli->insert($query,$parametros);

            $accion = new \stdClass();
            $accion->_sql= $query;
            $accion->_parametros = $parametros;
            $accion->_id = $id;

            //UtileriasLog::addAccion($accion);
            return $id;
    }

    public static function insertPermisos($permisos){

        $mysqli = Database::getInstance(1);
        $query=<<<sql
        INSERT INTO utilerias_permisos (usuario, permisos_globales, seccion_principal, seccion_asistentes, 	seccion_bu, seccion_lineas, seccion_posiciones, seccion_restaurantes, seccion_gafete, seccion_vuelos, seccion_pickup, seccion_habitaciones, seccion_cenas, seccion_vacunacion, seccion_pruebas_covid, seccion_sorteo_prueba_covid, seccion_utilerias, seccion_configuracion) VALUES (:usuario, :permisos_globales, :seccion_principal, :seccion_asistentes, :seccion_bu, :seccion_lineas, :seccion_posiciones, :seccion_restaurantes, :seccion_gafete, :seccion_vuelos, :seccion_pickup, :seccion_habitaciones, :seccion_cenas, :seccion_vacunacion, :seccion_pruebas_covid, :seccion_sorteo_prueba_covid, :seccion_utilerias, :seccion_configuracion);
sql;
        $parametros = array(
          ':usuario'=>$permisos->_usuario,
          ':permisos_globales'=>$permisos->_permisos_globales,
          ':seccion_principal'=>$permisos->_seccion_principal,
          ':seccion_asistentes'=>$permisos->_seccion_asistentes,
          ':seccion_bu'=>$permisos->_seccion_bu,
          ':seccion_lineas'=>$permisos->_seccion_lineas,
          ':seccion_posiciones'=>$permisos->_seccion_posiciones,
          ':seccion_restaurantes'=>$permisos->_seccion_restaurantes,
          ':seccion_gafete'=>$permisos->_seccion_gafete,
          ':seccion_vuelos'=>$permisos->_seccion_vuelos,
          ':seccion_pickup'=>$permisos->_seccion_pickup,
          ':seccion_habitaciones'=>$permisos->_seccion_habitaciones,
          ':seccion_cenas'=>$permisos->_seccion_cenas,
          ':seccion_vacunacion'=>$permisos->_seccion_vacunacion,
          ':seccion_pruebas_covid'=>$permisos->_seccion_pruebas_covid,
          ':seccion_sorteo_prueba_covid'=>$permisos->_seccion_sorteo_prueba_covid,
          ':seccion_utilerias'=>$permisos->_seccion_utilerias,
          ':seccion_configuracion'=>$permisos->_seccion_configuracion
        );
  
        $id = $mysqli->insert($query,$parametros);
  
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;
  
       // UtileriasLog::addAccion($accion);
        return $id;
    }

    public static function update($data){
        
    }
    public static function delete($id){
        
    }

    ///////////
    public static function getDepartamentosAdministrador($id){
        
    }
    public static function getPlantas(){
        
    }
    public static function getPerfiles(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM utilerias_perfiles WHERE status != 2
sql;
      return $mysqli->queryAll($query);
        
    }

    public static function getPerfil(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT * FROM utilerias_perfiles
sql;
        return $mysqli->queryAll($query);
    }
    public static function User(){
        
    }
    public static function getStatus(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM catalogo_status
sql;
      return $mysqli->queryAll($query);
        
    }
    public static function getSeccionesMenu(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT * FROM utilerias_secciones ORDER BY utilerias_seccion_id
sql;
        return $mysqli->queryAll($query);
      }
    public static function getDepartamentos(){
        
    }
    public static function getPermisosByUser($usuario){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT * FROM utilerias_permisos WHERE usuario = '$usuario'
sql;
        return $mysqli->queryOne($query);
    }

    public static function updateDataAdministrador($administrador){
        $mysqli = Database::getInstance();
        $query=<<<sql
        UPDATE utilerias_administradores SET perfil_id = :perfil_id, descripcion = :descripcion, status = :status WHERE usuario = :usuario;
sql;
        $parametros = array(
          ':usuario'=>$administrador->_usuario,
          ':perfil_id'=>$administrador->_perfil_id,
          ':descripcion'=>$administrador->_descripcion,
          ':status'=>$administrador->_status
        );
        
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $administrador->_administrador_id;
        //UtileriasLog::addAccion($accion);
        return $mysqli->update($query, $parametros);
    }

    public static function updatePermisosUsuario($permisos){
        $mysqli = Database::getInstance();


        $query=<<<sql
        UPDATE utilerias_permisos SET permisos_globales = :permisos_globales, seccion_principal = :seccion_principal, seccion_asistentes = :seccion_asistentes, seccion_bu = :seccion_bu, seccion_lineas = :seccion_lineas, seccion_posiciones = :seccion_posiciones, seccion_restaurantes = :seccion_restaurantes, seccion_gafete = :seccion_gafete, seccion_vuelos = :seccion_vuelos, seccion_pickup = :seccion_pickup, seccion_habitaciones = :seccion_habitaciones, seccion_cenas = :seccion_cenas, seccion_vacunacion = :seccion_vacunacion, seccion_pruebas_covid = :seccion_pruebas_covid, seccion_sorteo_prueba_covid = :seccion_sorteo_prueba_covid, seccion_utilerias = :seccion_utilerias, seccion_configuracion = :seccion_configuracion WHERE usuario = :usuario;
sql;
        $parametros = array(
          ':usuario'=>$permisos->_usuario,
          ':permisos_globales'=>$permisos->_permisos_globales,
          ':seccion_principal'=>$permisos->_seccion_principal,
          ':seccion_asistentes'=>$permisos->_seccion_asistentes,
          ':seccion_bu'=>$permisos->_seccion_bu,
          ':seccion_lineas'=>$permisos->_seccion_lineas,
          ':seccion_posiciones'=>$permisos->_seccion_posiciones,
          ':seccion_restaurantes'=>$permisos->_seccion_restaurantes,
          ':seccion_gafete'=>$permisos->_seccion_gafete,
          ':seccion_vuelos'=>$permisos->_seccion_vuelos,
          ':seccion_pickup'=>$permisos->_seccion_pickup,
          ':seccion_habitaciones'=>$permisos->_seccion_habitaciones,
          ':seccion_cenas'=>$permisos->_seccion_cenas,
          ':seccion_vacunacion'=>$permisos->_seccion_vacunacion,
          ':seccion_pruebas_covid'=>$permisos->_seccion_pruebas_covid,
          ':seccion_sorteo_prueba_covid'=>$permisos->_seccion_sorteo_prueba_covid,
          ':seccion_utilerias'=>$permisos->_seccion_utilerias,
          ':seccion_configuracion'=>$permisos->_seccion_configuracion
          
        );
          $accion = new \stdClass();
          $accion->_sql= $query;
          $accion->_parametros = $parametros;
          $accion->_id = $permisos->_administrador_id;
          //UtileriasLog::addAccion($accion);
          return $mysqli->update($query, $parametros);
          
      
    }

    
}
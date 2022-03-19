<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class RegistroAsistencia{

    public static function getById($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT * FROM asistencias WHERE clave = '$id';
sql;
        return $mysqli->queryAll($query);
    }

    public static function getAsistentes(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT id_registro_asistencia, id_asistencia, ras.fecha_alta AS fecha_alta_r_asistencias, ra.img AS imagen, clave,
        CONCAT(ra.nombre, ' ', ra.segundo_nombre, ' ', ra.apellido_paterno, ' ',ra.apellido_materno) AS nombre_completo
        FROM registros_asistencia ras
        INNER JOIN asistencias a
        INNER JOIN utilerias_asistentes ua
        INNER JOIN registros_acceso ra
        INNER JOIN linea_principal lp
        ON a.id_asistencia = ras.id_asistencias
        and ras.utilerias_asistentes_id = ua.utilerias_asistentes_id
        and ra.id_registro_acceso = ua.id_registro_acceso
sql;
        return $mysqli->queryAll($query);
    }

    public static function getInfo($clave){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT *
        FROM registros_acceso
        WHERE clave = '$clave'
sql;
        return $mysqli->queryAll($query);
    }

    public static function getLineaPrincipial(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT *
        FROM linea_principal
sql;
        return $mysqli->queryAll($query);
    }

    public static function getBu(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT *
        FROM bu
sql;
        return $mysqli->queryAll($query);
    }

    public static function getRegistrosAsistenciasByCode($code){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT a.nombre AS nombre_asistencia, ras.utilerias_asistentes_id, ua.usuario,
        ra.telefono, ra.email,
        CONCAT (ra.nombre,' ',ra.segundo_nombre,' ',apellido_paterno,' ',apellido_materno) AS nombre_completo
        FROM registros_asistencia ras
        INNER JOIN asistencias a
        INNER JOIN utilerias_asistentes ua
        INNER JOIN registros_acceso ra
        ON a.id_asistencia = id_asistencias
        and ua.utilerias_asistentes_id = ras.utilerias_asistentes_id
        and ra.id_registro_acceso = ua.id_registro_acceso
        
        WHERE a.clave = '$code'
sql;
        return $mysqli->queryAll($query);
    }

    public static function countLista($code){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT COUNT(*) FROM `registros_asistencia` ras
        INNER JOIN asistencias a
        ON ras.id_asistencias = a.id_asistencia
        WHERE a.clave = '$code'
sql;
        return $mysqli->queryAll($query);
    }

    public static function addRegister($id_asistencia,$id_user){
        $mysqli = Database::getInstance();
        $query=<<<sql
        INSERT INTO registros_asistencia ( `id_asistencias`, `utilerias_asistentes_id`, `fecha_alta`, `status`) 
        VALUES ($id_asistencia,$id_user,NOW(),1)
sql;
        $id = $mysqli->insert($query);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;
        return $id_user;
    }

    public static function getIdRegistrosAsistenciasByCode($code){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT *
        FROM asistencias
        WHERE clave = '$code'
sql;
        return $mysqli->queryAll($query);
    }

//     public static function addRegister($asistencia){
//         $mysqli = Database::getInstance();
//         $query=<<<sql
//         INSERT INTO `registros_asistencia` (`id_asistencias`, `utilerias_asistentes_id`, `fecha_alta`, `status`) 
//         VALUES (1,'[value-2]','[value-3]','[value-4]','[value-5]')
// sql;
//         return $mysqli->queryAll($query);
//     }
}
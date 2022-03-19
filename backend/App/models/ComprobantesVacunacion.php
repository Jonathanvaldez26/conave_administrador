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
        SELECT cv.id_comprobante_vacuna AS id_c_v, cv.utilerias_asistentes_id, cv.nota, cv.status AS status_comprobante, cv.validado,
            email, telefono, fecha_carga_documento, numero_empleado, fecha_carga_documento, numero_dosis, marca_dosis, documento,
            b.nombre AS nombre_bu, 
            p.nombre as nombre_posicion,
            lp.nombre AS nombre_linea,  
            CONCAT(ra.nombre, ' ',ra.segundo_nombre,' ',ra.apellido_paterno,' ',ra.apellido_materno) AS nombre_completo 
        FROM comprobante_vacuna cv
        JOIN utilerias_asistentes u
        JOIN registros_acceso ra
        JOIN bu b
        JOIN linea_principal lp
        JOIN posiciones p
        ON cv.utilerias_asistentes_id = u.utilerias_asistentes_id
        and u.id_registro_acceso = ra.id_registro_acceso
        and b.id_bu = ra.id_bu
        and lp.id_linea_principal = ra.id_linea_principal
        and p.id_posicion = ra.id_posicion
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

    public static function contarComprobantesValidos(){
        $mysqli = Database::getInstance(true);
        $query =<<<sql
        SELECT COUNT(id_comprobante_vacuna) FROM comprobante_vacuna WHERE validado = 1
sql;

        return $mysqli->queryAll($query);        
    }

    public static function contarComprobantesTotales(){
        $mysqli = Database::getInstance(true);
        $query =<<<sql
        SELECT COUNT(id_comprobante_vacuna) FROM comprobante_vacuna
sql;

        return $mysqli->queryAll($query);        
    }

    public static function contarComprobantesPorRevisar(){
        $mysqli = Database::getInstance(true);
        $query =<<<sql
        SELECT COUNT(id_comprobante_vacuna) FROM comprobante_vacuna WHERE validado = 0
sql;

        return $mysqli->queryAll($query);        
    }

    public static function contarAsistentes(){
        $mysqli = Database::getInstance(true);
        $query =<<<sql
        SELECT COUNT(utilerias_asistentes_id) FROM utilerias_asistentes
sql;

        return $mysqli->queryAll($query);        
    }
    
    public static function validar($id){
        $mysqli = Database::getInstance(true);
        $query=<<<sql
        UPDATE comprobante_vacuna SET validado = 1 WHERE id_comprobante_vacuna = $id;
sql;
        return $mysqli->update($query);

    }

    public static function rechazar($id){
        $mysqli = Database::getInstance(true);
        $query=<<<sql
        UPDATE comprobante_vacuna SET status = 0 WHERE id_comprobante_vacuna = $id;
sql;
        return $mysqli->update($query);

    }

    public static function updateNote($data){
        $mysqli = Database::getInstance(true);
        $query=<<<sql
        UPDATE comprobante_vacuna SET nota = :nota WHERE id_comprobante_vacuna = :id_comprobante_vacuna;
sql;
        $parametros = array(
        
        ':id_comprobante_vacuna'=>$data->_id_comprobante_vacuna,
        ':nota'=>$data->_nota,
        
        );

        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $data->_administrador_id;
        // UtileriasLog::addAccion($accion);
        return $mysqli->update($query, $parametros);

    }

    public static function getByIdUser($id_usuario){
        $mysqli = Database::getInstance(true);
        $query =<<<sql
        SELECT * FROM comprobante_vacuna WHERE utilerias_asistentes_id = '$id_usuario' and status = 1
sql;

        return $mysqli->queryAll($query);
   
    }

    public static function getComprobatesByLinea($id_linea){
        $mysqli = Database::getInstance(true);
        $query =<<<sql
        SELECT cv.id_comprobante_vacuna AS id_c_v, cv.utilerias_asistentes_id, cv.nota, cv.status AS status_comprobante, cv.validado,
            email, telefono, fecha_carga_documento, numero_empleado, fecha_carga_documento, numero_dosis, marca_dosis, documento,
            b.nombre AS nombre_bu, 
            p.nombre as nombre_posicion,
            lp.nombre AS nombre_linea,  
            CONCAT(ra.nombre, ' ',ra.segundo_nombre,' ',ra.apellido_paterno,' ',ra.apellido_materno) AS nombre_completo 
        FROM comprobante_vacuna cv
        JOIN utilerias_asistentes u
        JOIN registros_acceso ra
        JOIN bu b
        JOIN linea_principal lp
        JOIN posiciones p        
        ON cv.utilerias_asistentes_id = u.utilerias_asistentes_id
        and u.id_registro_acceso = ra.id_registro_acceso
        and b.id_bu = ra.id_bu
        and lp.id_linea_principal = ra.id_linea_principal
        and p.id_posicion = ra.id_posicion
        where ra.id_linea_principal = $id_linea
sql;

        return $mysqli->queryAll($query);
    }
}
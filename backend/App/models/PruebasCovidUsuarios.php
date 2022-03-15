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
        SELECT pc.id_prueba_covid AS id_c_v, pc.utilerias_asistentes_id, pc.status AS status_prueba, pc.resultado, pc.tipo_prueba,
            numero_empleado, fecha_carga_documento, tipo_prueba, pc.nota, resultado, email, telefono, documento,  CONCAT(ra.nombre, ' ',ra.segundo_nombre,' ',ra.apellido_paterno,' ',ra.apellido_materno) AS nombre_completo, 
            b.nombre AS nombre_bu, 
            p.nombre as nombre_posicion,
            lp.nombre AS nombre_linea
        FROM prueba_covid pc
        JOIN utilerias_asistentes u
        JOIN registros_acceso ra
        JOIN bu b
        JOIN linea_principal lp
        JOIN posiciones p
        ON pc.utilerias_asistentes_id = u.utilerias_asistentes_id
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

    public static function validar($id){
        $mysqli = Database::getInstance(true);
        $query=<<<sql
        UPDATE prueba_covid SET status = 2 WHERE id_prueba_covid = $id;
sql;
        return $mysqli->update($query);

    }

    public static function rechazar($id){
        $mysqli = Database::getInstance(true);
        $query=<<<sql
        UPDATE prueba_covid SET status = 1 WHERE id_prueba_covid = $id;
sql;
        return $mysqli->update($query);

    }

    public static function updateNote($data){
        $mysqli = Database::getInstance(true);
        $query=<<<sql
        UPDATE prueba_covid SET nota = :nota WHERE id_prueba_covid = :id_prueba_covid;
sql;
        $parametros = array(
        
        ':id_prueba_covid'=>$data->_id_prueba_covid,
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
        SELECT * FROM prueba_covid WHERE utilerias_asistentes_id = '$id_usuario'
sql;

        return $mysqli->queryAll($query);
   
    }
}
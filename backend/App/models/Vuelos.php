<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Vuelos implements Crud{
    public static function getAll(){
        $mysqli = Database::getInstance();
        $query=<<<sql
            SELECT pa.id_pase_abordar, pa.clave, CONCAT(ra.nombre," ", ra.segundo_nombre," ", ra.apellido_paterno," ", ra.apellido_materno) as nombre, pa.fecha_alta, CONCAT(ae.iata, " - ",ae.aeropuerto) as aeropuerto_salida, CONCAT(aeo.iata, " - ",aeo.aeropuerto) as aeropuerto_llegada , pa.numero_vuelo, pa.hora_llegada_destino, 
            pa.nota , ua.nombre as nombre_registro, ra.email, ra.telefono FROM pases_abordar pa
            INNER JOIN aeropuertos ae on ae.id_aeropuerto = pa.id_aeropuerto_origen
            INNER JOIN aeropuertos aeo on aeo.id_aeropuerto = pa.id_aeropuerto_destino
            INNER JOIN utilerias_administradores ua on ua.utilerias_administradores_id = pa.utilerias_administradores_id
            INNER JOIN utilerias_asistentes uaa on uaa.utilerias_asistentes_id = pa.utilerias_asistentes_id
            INNER JOIN registros_acceso ra on ra.id_registro_acceso = uaa.id_registro_acceso
            WHERE tipo = 1 ORDER BY pa.fecha_alta DESC;
sql;
        return $mysqli->queryAll($query);
    }
    public static function getById($id){
        
    }
    public static function insert($data){
        $mysqli = Database::getInstance(1);
        $query=<<<sql
        INSERT INTO pases_abordar (id_pase_abordar, utilerias_asistentes_id, utilerias_administradores_id, clave, id_aeropuerto_origen, id_aeropuerto_destino, numero_vuelo, hora_llegada_destino, fecha_alta, url, status, nota, tipo) 
        VALUES ('', :utilerias_asistentes_id, :utilerias_administradores_id, :clave, :id_aeropuerto_origen, :id_aeropuerto_destino, :numero_vuelo, :hora_llegada_destino, current_timestamp(), :url, 1, :nota, 1);
sql;
        $parametros = array(
            ':utilerias_asistentes_id'=>$data->_utilerias_asistentes_id,
            ':utilerias_administradores_id'=>$data->_utilerias_administradores_id,
            ':clave'=>$data->_clave,
            ':id_aeropuerto_origen'=>$data->_id_aeropuerto_origen,
            ':id_aeropuerto_destino'=>$data->_id_aeropuerto_destino,
            ':numero_vuelo'=>$data->_numero_vuelo,
            ':hora_llegada_destino'=>$data->_hora_llegada,
            ':url'=>$data->_url,
            ':nota'=>$data->_notas
        );
        $id = $mysqli->insert($query,$parametros);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;
        return $id;
    }
    public static function update($data){
        
    }
    public static function delete($id){
        
    }

    public static function getAsistenteNombre(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        select ra.id_registro_acceso, CONCAT(ra.nombre, ' ', ra.segundo_nombre, ' ', ra.apellido_paterno, ' ', ra.apellido_materno) as nombre 
        from utilerias_asistentes ua 
        INNER JOIN registros_acceso ra on ra.id_registro_acceso = ua.id_registro_acceso 
        INNER JOIN comprobante_vacuna cv on cv.utilerias_asistentes_id = ua.id_registro_acceso
        INNER JOIN prueba_covid pc on pc.utilerias_asistentes_id = ua.id_registro_acceso 
        WHERE ua.utilerias_asistentes_id NOT IN (SELECT utilerias_asistentes_id FROM pases_abordar) AND cv.status = 1 and pc.status = 2;
sql;
        return $mysqli->queryAll($query);
    }
}
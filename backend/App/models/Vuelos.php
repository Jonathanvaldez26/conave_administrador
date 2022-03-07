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
pa.nota , ua.nombre as nombre_registro FROM pases_abordar pa
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
        
    }
    public static function update($data){
        
    }
    public static function delete($id){
        
    }
}
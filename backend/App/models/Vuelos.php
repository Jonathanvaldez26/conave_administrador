<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;
use \App\controllers\UtileriasNotificacionesLog;

class Vuelos{
    public static function getAllLlegada(){
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

    public static function getAllSalida(){
        $mysqli = Database::getInstance();
        $query=<<<sql
            SELECT pa.id_pase_abordar, pa.clave, CONCAT(ra.nombre," ", ra.segundo_nombre," ", ra.apellido_paterno," ", ra.apellido_materno) as nombre, pa.fecha_alta, CONCAT(ae.iata, " - ",ae.aeropuerto) as aeropuerto_salida, CONCAT(aeo.iata, " - ",aeo.aeropuerto) as aeropuerto_llegada , pa.numero_vuelo, pa.hora_llegada_destino, 
            pa.nota , ua.nombre as nombre_registro, ra.email, ra.telefono FROM pases_abordar pa
            INNER JOIN aeropuertos ae on ae.id_aeropuerto = pa.id_aeropuerto_origen
            INNER JOIN aeropuertos aeo on aeo.id_aeropuerto = pa.id_aeropuerto_destino
            INNER JOIN utilerias_administradores ua on ua.utilerias_administradores_id = pa.utilerias_administradores_id
            INNER JOIN utilerias_asistentes uaa on uaa.utilerias_asistentes_id = pa.utilerias_asistentes_id
            INNER JOIN registros_acceso ra on ra.id_registro_acceso = uaa.id_registro_acceso
            WHERE tipo = 2 ORDER BY pa.fecha_alta DESC;
sql;
        return $mysqli->queryAll($query);
    }

    public static function getById($id){
        
    }
    public static function insert($data){
        $mysqli = Database::getInstance(1);
        $query=<<<sql
        INSERT INTO pases_abordar (id_pase_abordar, utilerias_asistentes_id, utilerias_administradores_id, clave, id_aeropuerto_origen, id_aeropuerto_destino, numero_vuelo, hora_llegada_destino, fecha_alta, url, status, nota, tipo) 
        VALUES (null, :utilerias_asistentes_id, :utilerias_administradores_id, :clave, :id_aeropuerto_origen, :id_aeropuerto_destino, :numero_vuelo, :hora_llegada_destino, NOW(), :url, 1, :nota, 1);
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
        $accion->_id_asistente = $data->_utilerias_asistentes_id;
        $accion->_titulo = "Pase de abordar";
        $accion->_descripcion = 'Un ejecutivo ha cargado su '.$accion->_titulo;
        $accion->_id = $id;
        UtileriasNotificacionesLog::addAccion($accion);
        
        return $id;

    }

    public static function insertItinerario($data){
        $mysqli = Database::getInstance(1);
        $query=<<<sql
        INSERT INTO itinerario (id_itinerario, aerolinea_origen, aerolinea_escala_origen, aerolinea_destino, aerolinea_escala_destino, fecha_salida, fecha_escala_salida, hora_salida, hora_escala_salida, fecha_regreso, fecha_escala_regreso, hora_regreso, hora_escala_regreso, aeropuerto_salida, aeropuerto_escala_salida, aeropuerto_regreso, aeropuerto_escala_regreso, nota, utilerias_asistentes_id, utilerias_administradores_id, status, fecha_alta) 
        VALUES (null, :aerolinea_origen, :aerolinea_escala_origen,:aerolinea_destino, :aerolinea_escala_destino,:fecha_salida, :fecha_escala_salida,:hora_salida, :hora_escala_salida,:fecha_regreso, :fecha_escala_regreso,:hora_regreso, :hora_escala_regreso,:aeropuerto_salida, :aeropuerto_escala_salida, :aeropuerto_regreso, :aeropuerto_escala_regreso,:nota, :utilerias_asistentes_id, :utilerias_administradores_id, 1, NOW());
sql;
        $parametros = array(
            ':aerolinea_origen'=>$data->_aerolinea_origen,
            ':aerolinea_escala_origen'=>$data->_aerolinea_escala_origen,            
            ':aerolinea_destino'=>$data->_aerolinea_destino,
            ':aerolinea_escala_destino'=>$data->_aerolinea_escala_destino,
            ':fecha_salida'=>$data->_fecha_salida,
            ':fecha_escala_salida'=>$data->_fecha_escala_salida,
            ':hora_salida'=>$data->_hora_salida,
            ':hora_escala_salida'=>$data->_hora_escala_salida,
            ':fecha_regreso'=>$data->_fecha_regreso,
            ':fecha_escala_regreso'=>$data->_fecha_escala_regreso,
            ':hora_regreso'=>$data->_hora_regreso,
            ':hora_escala_regreso'=>$data->_hora_escala_regreso,
            ':aeropuerto_salida'=>$data->_aeropuerto_salida,
            ':aeropuerto_escala_salida'=>$data->_aeropuerto_escala_salida,
            ':aeropuerto_regreso'=>$data->_aeropuerto_regreso,
            ':aeropuerto_escala_regreso'=>$data->_aeropuerto_escala_regreso,
            ':nota'=>$data->_nota_itinerario,
            ':utilerias_asistentes_id'=>$data->_utilerias_asistentes_id,
            ':utilerias_administradores_id'=>$data->_utilerias_administradores_id
        );
        $id = $mysqli->insert($query,$parametros);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_id_asistente = $data->_utilerias_asistentes_id;
        $accion->_titulo = "Itinerario";
        //$accion->_descripcion = 'Un ejecutivo ha cargado su '.$accion->_titulo;
        $accion->_descripcion = 'Hola '.$data->_nombre_asistente.', Tu itinerario de viaje ha sido cargado con exito <button class="btn btn-sm btn-info btn-itinerario" data-toggle="modal" data-target="#ver-itinerario" >Ver aquí</button>,';
        $accion->_id = $id;
        UtileriasNotificacionesLog::addAccion($accion);
        
        return $id;

    }

    public static function update($data){
        
    }
    public static function delete($id){
        
    }

    public static function getAsistenteNombre(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        select ra.id_registro_acceso, CONCAT(ra.nombre, ' ', ra.segundo_nombre, ' ', ra.apellido_paterno, ' ', ra.apellido_materno) as nombre, ua.utilerias_asistentes_id 
        from utilerias_asistentes ua 
        INNER JOIN registros_acceso ra on ra.id_registro_acceso = ua.id_registro_acceso 
        INNER JOIN comprobante_vacuna cv on cv.utilerias_asistentes_id = ua.utilerias_asistentes_id
        INNER JOIN prueba_covid pc on pc.utilerias_asistentes_id = ua.utilerias_asistentes_id 
        WHERE ua.utilerias_asistentes_id NOT IN (SELECT utilerias_asistentes_id FROM pases_abordar) AND cv.status = 1 and pc.status = 2;
sql;
        return $mysqli->queryAll($query);
    }

    public static function getItinerarios(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT 
        i.id_itinerario, 

        cao.nombre as aerolinea_origen, 
        caeo.nombre as aerolinea_escala_origen, 
        cad.nombre as aerolinea_destino, 
        caed.nombre as aerolinea_escala_destino,

        i.fecha_escala_salida,
        i.hora_escala_salida,
        i.fecha_escala_regreso,
        i.hora_escala_regreso,

        i.fecha_salida, 
        i.hora_salida, 
        i.fecha_regreso, 
        i.hora_regreso,
        i.nota, 
        
        a.aeropuerto as aeropuerto_salida, 
        ae.aeropuerto as aeropuerto_escala_salida, 
        aa.aeropuerto as aeropuerto_regreso,
        
        concat(ra.nombre, " ", ra.segundo_nombre, " ", ra.apellido_paterno, " ", ra.apellido_materno) as nombre 
      FROM itinerario i 
      INNER JOIN catalogo_aerolinea cao on cao.id_aerolinea = i.aerolinea_origen 
      LEFT JOIN catalogo_aerolinea caeo on caeo.id_aerolinea = i.aerolinea_escala_origen
      INNER JOIN catalogo_aerolinea cad on cad.id_aerolinea = i.aerolinea_destino
      LEFT JOIN catalogo_aerolinea caed on caed.id_aerolinea = i.aerolinea_escala_destino
      INNER JOIN aeropuertos a on a.id_aeropuerto = i.aeropuerto_salida 
      LEFT JOIN aeropuertos ae on ae.id_aeropuerto = i.aeropuerto_escala_salida
      INNER JOIN aeropuertos aa on aa.id_aeropuerto = i.aeropuerto_regreso 
      INNER JOIN utilerias_asistentes ua on ua.utilerias_asistentes_id = i.utilerias_asistentes_id 
      INNER JOIN registros_acceso ra on ra.id_registro_acceso = ua.id_registro_acceso;
sql;
        return $mysqli->queryAll($query);
    }

    public static function getAsistenteNombreItinerario(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        select ra.id_registro_acceso, CONCAT(ra.nombre, ' ', ra.segundo_nombre, ' ', ra.apellido_paterno, ' ', ra.apellido_materno) as nombre, ua.utilerias_asistentes_id from utilerias_asistentes ua INNER JOIN registros_acceso ra on ra.id_registro_acceso = ua.id_registro_acceso INNER JOIN comprobante_vacuna cv on cv.utilerias_asistentes_id = ua.utilerias_asistentes_id WHERE cv.validado = 1 AND ua.utilerias_asistentes_id NOT IN (SELECT utilerias_asistentes_id FROM itinerario);
sql;
        return $mysqli->queryAll($query);
    }

    public static function getAsistenteNombreItinerarioById($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        select ra.id_registro_acceso, CONCAT(ra.nombre, ' ', ra.segundo_nombre, ' ', ra.apellido_paterno, ' ', ra.apellido_materno) as nombre, ua.utilerias_asistentes_id, ua.usuario 
        from utilerias_asistentes ua 
        INNER JOIN registros_acceso ra on ra.id_registro_acceso = ua.id_registro_acceso 
        INNER JOIN comprobante_vacuna cv on cv.utilerias_asistentes_id = ua.utilerias_asistentes_id
        INNER JOIN prueba_covid pc on pc.utilerias_asistentes_id = ua.utilerias_asistentes_id 
        WHERE cv.status = 1 and pc.status = 2 AND ua.utilerias_asistentes_id = $id;
sql;
        return $mysqli->queryAll($query);
    }

    public static function getAeropuertoOrigen(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT * FROM `aeropuertos` where id_aeropuerto != 40 ORDER BY iata ASC;
sql;
        return $mysqli->queryAll($query);
    }

    public static function getAeropuertoDestino(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT * FROM `aeropuertos` where id_aeropuerto = 40;
sql;
        return $mysqli->queryAll($query);
    }

    public static function getAeropuertosAll(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT * FROM `aeropuertos`
sql;
        return $mysqli->queryAll($query);
    }

    public static function getCountVuelos(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT COUNT(*) as usuarios FROM `utilerias_asistentes` where status = 1;
sql;
        return $mysqli->queryAll($query);
    }

    public static function getCountVuelosLlegada(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT COUNT(*) as total FROM `pases_abordar` where status = 1 and tipo = 1;
sql;
        return $mysqli->queryAll($query);
    }

    public static function getCountVuelosSalida(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT COUNT(*) as total FROM `pases_abordar` where status = 1 and tipo = 2;
sql;
        return $mysqli->queryAll($query);
    }

    public static function getAerolineas(){
        $mysqli = Database::getInstance();
        $query=<<<sql
            SELECT * FROM catalogo_aerolinea
sql;
        return $mysqli->queryAll($query);
    }

}
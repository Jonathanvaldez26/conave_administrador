<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Habitaciones implements Crud{
    
    public static function getAll(){
        $mysqli = Database::getInstance();
      $query=<<<sql
       SELECT * FROM hoteles;
sql;
      return $mysqli->queryAll($query);
        
    }
    public static function getById($id){
        
    }
    public static function insert($data){
        
    }
    public static function update($hotel){
      $mysqli = Database::getInstance(true);
      $query=<<<sql
      UPDATE hoteles SET nombre_hotel = :nombre_hotel, cliente = :cliente, evento = :evento, fechas = :fechas, lugar = :lugar, total_habitaciones =	:total_habitaciones WHERE id_hotel = :id_hotel;
sql;
      $parametros = array(
        ':id_hotel'=>$hotel->_id_hotel,
        ':nombre_hotel'=>$hotel->_nombre_hotel,
        ':cliente'=>$hotel->_cliente,
        ':evento'=>$hotel->_evento,
        ':fechas'=>$hotel->_fechas,
        ':total_habitaciones'=>$hotel->_total_habitaciones,
        ':lugar' =>$hotel->_lugar
      );
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $hotel->_id_hotel;
        return $mysqli->update($query, $parametros);
    }

    public static function updateCategoria($data){
      $mysqli = Database::getInstance(true);
      $query=<<<sql
      UPDATE categorias_habitaciones SET id_hotel = :id_hotel, categoria_habitacion = :categoria_habitacion, nombre_categoria = :nombre_categoria, huespedes = :huespedes, total_huespedes = :total_huespedes WHERE id_habitacion = :id_habitacion;
sql;
      $parametros = array(
        ':id_habitacion'=>$data->_id_habitacion,
        ':id_hotel'=>$data->_id_hotel,
        ':categoria_habitacion'=>$data->_categoria_habitacion,
        ':nombre_categoria'=>$data->_nombre_categoria,
        ':huespedes'=>$data->_huespedes,
        ':total_huespedes'=>$data->_total_huespedes,
      );

        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $data->_id_habitacion;
        return $mysqli->update($query, $parametros);
    }
    
    public static function delete($id){
        
    }

    public static function getCategoriasHabitaciones($id_hotel){
      $mysqli = Database::getInstance(true);
      $query =<<<sql
      SELECT * FROM categorias_habitaciones WHERE id_hotel = '$id_hotel'
sql;

      return $mysqli->queryAll($query);
 
    }
}
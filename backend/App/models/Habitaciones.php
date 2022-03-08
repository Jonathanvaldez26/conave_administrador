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
      UPDATE hoteles SET nombre_hotel = :nombre_hotel, cliente = :cliente, evento = :evento, fechas = :fechas, lugar = :lugar WHERE id_hotel = :id_hotel;
sql;
      $parametros = array(
        ':id_hotel'=>$hotel->_id_hotel,
        ':nombre_hotel'=>$hotel->_nombre_hotel,
        ':cliente'=>$hotel->_cliente,
        ':evento'=>$hotel->_evento,
        ':fechas'=>$hotel->_fechas,
        ':lugar' =>$hotel->_lugar
      );
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $hotel->_id_hotel;
        return $mysqli->update($query, $parametros);
    }
    public static function delete($id){
        
    }
}
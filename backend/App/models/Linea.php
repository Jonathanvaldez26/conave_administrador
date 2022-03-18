<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Linea implements Crud{
    public static function getAll(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT lp.id_linea_principal, lp.clave, lp.nombre, lp.fecha_alta, ua.nombre as creo, b.nombre AS nombre_bu
        FROM linea_principal lp
        INNER JOIN utilerias_administradores ua ON ua.utilerias_administradores_id = lp.utilerias_administradores_id 
        INNER JOIN bu b ON b.id_bu = lp.id_bu 
        ORDER BY bu.nombre ASC
        ORDER BY lp.nombre ASC
        ORDER BY p.nombre ASC
sql;
        return $mysqli->queryAll($query);
    }
    public static function getById($id){
        $mysqli = Database::getInstance(true);
        $query =<<<sql
        SELECT * FROM linea_principal WHERE id_linea_principal = $id
sql;

        return $mysqli->queryAll($query);
        
    }
    public static function insert($data){
        
    }
    public static function update($data){
        
    }
    public static function delete($id){
        
    }

    public static function getLineasAll(){
        $mysqli = Database::getInstance(true);
        $query =<<<sql
        SELECT * FROM linea_principal
sql;

        return $mysqli->queryAll($query);
    }

    public static function getLineasSinEjecutivo(){
        $mysqli = Database::getInstance(true);
        $query =<<<sql
        SELECT lp.*
        FROM linea_principal lp
        WHERE lp.id_linea_principal NOT IN (select id_linea_principal from asigna_linea)
sql;

        return $mysqli->queryAll($query);
    }

    public static function getLineaEjecutivo(){
        $mysqli = Database::getInstance(true);
        $query =<<<sql
        SELECT lp.*
        FROM linea_principal lp
        WHERE lp.id_linea_principal NOT IN (select id_linea_principal from asigna_linea)
sql;

        return $mysqli->queryAll($query);
    }

    public static function insertAsignaLinea($asigaLinea){
	    $mysqli = Database::getInstance(1);
        $query=<<<sql
            INSERT INTO asigna_linea(id_linea_principal, utilerias_administradores_id_linea_asignada, fecha_alta, status, utilerias_administradores) 
            VALUES (:id_linea_principal, :utilerias_administradores_id_linea_asignada, NOW(), 1, :utilerias_administradores)
sql;
            $parametros = array(
            ':id_linea_principal'=>$asigaLinea->_linea_id,
            ':utilerias_administradores_id_linea_asignada'=>$asigaLinea->_utilerias_administradores_linea_asignada,
            ':utilerias_administradores'=>$asigaLinea->_utilerias_administradores
            );

            $id = $mysqli->insert($query,$parametros);

            return $id;
    }
}
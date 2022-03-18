<?php
namespace App\controllers;
defined("APPPATH") OR die("Access denied"); 

use \Core\View;
use \Core\MasterDom;
use \App\controllers\Contenedor;
use \Core\Controller;
use \App\models\PruebasCovidSitio as PruebasCovidSitioDao;
use \App\models\Asistencias as AsistenciasDao;

class Asistencias extends Controller{

    private $_contenedor;

    function __construct(){
        parent::__construct();
        $this->_contenedor = new Contenedor;
        View::set('header',$this->_contenedor->header());
        View::set('footer',$this->_contenedor->footer());
        if(Controller::getPermisosUsuario($this->__usuario, "seccion_sorteo_prueba_covid",1) == 0)
        header('Location: /Principal/');
       
    }

    public function getUsuario(){
      return $this->__usuario;
    }

    public function index() {
     $extraHeader =<<<html
html;
$datos = AsistenciasDao::getAll();
foreach ($datos as $key => $value) {
  $tabla=<<<html
  <tr>
  <td>{$value['nombre']}</td>
  <td>{$value['descripcion']}</td>
  <td>{$value['fecha_asistencia']}</td>
  <td>{$value['hora_asistencia_inicio']}</td>
  <td>{$value['hora_asistencia_fin']}</td>
  <td><a href='{$value['url']}'><i class='fas fa-globe'></i></a></td>
 
  </tr>
 
 html;
}

      View::set('tabla',$tabla);
      View::set('header',$this->_contenedor->header($extraHeader));
      View::set('footer',$this->_contenedor->footer($extraFooter));
      View::render("asistencias_all");
    }
 

    public function asistenciasAdd() {

      $asistentes = new \stdClass();
      $asistentes->_clave = MasterDom::getData('clave');
      $asistentes->_nombre = MasterDom::getData('nombre');
      $asistentes->_descripcion = MasterDom::getData('descripcion');
      $asistentes->_fecha_asistencia = MasterDom::getData('fecha_asistencia');
      $asistentes->_hora_asistencia_inicio = MasterDom::getData('hora_asistencia_inicio');
      $asistentes->_hora_asistencia_fin = MasterDom::getData('hora_asistencia_fin');
      $asistentes->_url = MasterDom::getData('url');
      

      $id = AsistenciasDao::insert($asistentes);
      if($id >= 1){
        $this->alerta($id,'add');
      }else{
        $this->alerta($id,'error');
      }


    }

      

}

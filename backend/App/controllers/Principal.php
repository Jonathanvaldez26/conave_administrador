<?php
namespace App\controllers;
defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\MasterDom;
use \App\controllers\Contenedor;
use \Core\Controller;

class Principal extends Controller{

    private $_contenedor;

    function __construct(){
        parent::__construct();
        $this->_contenedor = new Contenedor;
        View::set('header',$this->_contenedor->header());
        View::set('footer',$this->_contenedor->footer());
    }

    public function getUsuario(){
      return $this->__usuario;
    }

    public function index() {
     $extraHeader =<<<html
     <script charset="UTF-8" src="//web.webpushs.com/js/push/9d0c1476424f10b1c5e277f542d790b8_1.js" async></script>
     
html;

      $permisoGlobalHidden = (Controller::getPermisoGlobalUsuario($this->__usuario)[0]['permisos_globales']) != 1 ? "style=\"display:none;\"" : "";
      $asistentesHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_asistentes", 1)==0)? "style=\"display:none;\"" : "";  
      $vuelosHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_vuelos", 1)==0)? "style=\"display:none;\"" : "";  
      $pickUpHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_pickup", 1)==0)? "style=\"display:none;\"" : "";
      $habitacionesHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_habitaciones", 1)==0)? "style=\"display:none;\"" : ""; 
      $cenasHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_cenas", 1)==0)? "style=\"display:none;\"" : ""; 
      $cenasHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_cenas", 1)==0)? "style=\"display:none;\"" : ""; 
      $aistenciasHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_asistencias", 1)==0)? "style=\"display:none;\"" : ""; 
      $vacunacionHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_vacunacion", 1)==0)? "style=\"display:none;\"" : ""; 
      $pruebasHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_pruebas_covid", 1)==0)? "style=\"display:none;\"" : "";
      $configuracionHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_configuracion", 1)==0)? "style=\"display:none;\"" : "";
      $utileriasHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_utilerias", 1)==0)? "style=\"display:none;\"" : "";  

      View::set('permisoGlobalHidden',$permisoGlobalHidden);
      View::set('asistentesHidden',$asistentesHidden);
      View::set('vuelosHidden',$vuelosHidden);
      View::set('pickUpHidden',$pickUpHidden);
      View::set('habitacionesHidden',$habitacionesHidden);
      View::set('cenasHidden',$cenasHidden);
      View::set('aistenciasHidden',$aistenciasHidden);
      View::set('vacunacionHidden',$vacunacionHidden);
      View::set('pruebasHidden',$pruebasHidden);
      View::set('configuracionHidden',$configuracionHidden);
      View::set('utileriasHidden',$utileriasHidden);

      View::set('header',$this->_contenedor->header($extraHeader));
      View::set('footer',$this->_contenedor->footer($extraFooter));
      View::render("principal_all");
    }

}

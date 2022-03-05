<?php
namespace App\controllers;
defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\Controller;
use \App\models\Linea as LineaDao;

class Lineas extends Controller{

    private $_contenedor;

    function __construct(){
        parent::__construct();
        $this->_contenedor = new Contenedor;
        View::set('header',$this->_contenedor->header());
        View::set('footer',$this->_contenedor->footer());
        if(Controller::getPermisosUsuario($this->__usuario, "seccion_lineas",1) == 0)
          header('Location: /Principal/');
    }

    public function getUsuario(){
      return $this->__usuario;
    }

    public function index() {
     $extraHeader =<<<html
html;

        $lineas = LineaDao::getAll();
        $tabla= '';
        foreach ($lineas as $key => $value) {
            $tabla.=<<<html
                <tr>
                <td><input type="checkbox" name="borrar[]" value="{$value['clave']}"/></td>
                <td><h6 class="mb-0 text-sm">{$value['nombre']}</h6></td>
           
                <td><p class="text-sm text-secondary mb-0">{$value['fecha_alta']}</p></td>
                <td><h6 class="mb-0 text-sm">{$value['creo']}</h6></td>
                </tr>
html;
        }

      View::set('tabla',$tabla);
      View::set('header',$this->_contenedor->header($extraHeader));
      View::set('footer',$this->_contenedor->footer($extraFooter));
      View::render("lineas_all");
    }

}

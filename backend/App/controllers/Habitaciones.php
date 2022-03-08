<?php
namespace App\controllers;
defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\MasterDom;
use \App\controllers\Contenedor;
use \Core\Controller;
use \App\models\Habitaciones as HabitacionesDao;

class Habitaciones extends Controller{

    private $_contenedor;

    function __construct(){
        parent::__construct();
        $this->_contenedor = new Contenedor;
        View::set('header',$this->_contenedor->header());
        View::set('footer',$this->_contenedor->footer());
        if(Controller::getPermisosUsuario($this->__usuario, "seccion_habitaciones",1) == 0)
          header('Location: /Principal/');
    }

    public function getUsuario(){
      return $this->__usuario;
    }

    public function index() {
     $extraHeader =<<<html
html;

      $hotel = HabitacionesDao::getAll()[0];
      $fechas = $hotel['fechas'];
      $dates = '';
     // echo $fechas;

     
      $fecha = explode(",", $fechas);

      foreach ($fecha as $key => $value) {
        $dates .= <<<html
        <div class="col-12 col-lg-6 date">
          <label class="form-label mt-4">Fechas * </label>
          <input type="date" class="form-control " id="fecha{$key}" name="fecha[]" required="" value="{$value}">
        </div>
html;
      }

      // echo count($fecha);
      // echo "<br>";
      // echo $fecha[0]; // porción1
      // echo $fecha[1]; // porción2

      View::set('hotel',$hotel);
      View::set('dates',$dates);
      View::set('header',$this->_contenedor->header($extraHeader));
      View::set('footer',$this->_contenedor->footer($extraFooter));
      View::render("habitaciones_all");
    }

    public function Actualizar(){
      $documento = new \stdClass();
  
  
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {


              $id_hotel = $_POST['id_hotel'];
              $cliente = $_POST['cliente'];
              $evento = $_POST['evento'];
              $lugar = $_POST['lugar'];
              $nombre_hotel = $_POST['nombre_hotel'];
              $fechas = $_POST['fecha'];
              $fechas_ = implode(",", $fechas);
              

              // echo $id_hotel;
              // echo $cliente;
              // echo $evento;
              // echo $lugar;
              // echo $nombre_hotel;
              // //var_dump($fechas);
              // echo $fechas_;
  
              $documento->_id_hotel = $id_hotel;
              $documento->_cliente = $cliente;
              $documento->_evento = $evento;
              $documento->_lugar = $lugar;
              $documento->_nombre_hotel = $nombre_hotel;
              $documento->_fechas = $fechas_;

              $update = HabitacionesDao::update($documento);
  
              if ($update) {
                 
                  echo 'success';
              } else {
                echo 'fail';
              }
          } else {
              echo 'fail REQUEST';
          }
    }

}

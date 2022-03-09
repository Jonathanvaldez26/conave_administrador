<?php

namespace App\controllers;

defined("APPPATH") or die("Access denied");

use \Core\View;
use \Core\MasterDom;
use \App\controllers\Contenedor;
use \Core\Controller;
use \App\models\Habitaciones as HabitacionesDao;

class Habitaciones extends Controller
{

  private $_contenedor;

  function __construct()
  {
    parent::__construct();
    $this->_contenedor = new Contenedor;
    View::set('header', $this->_contenedor->header());
    View::set('footer', $this->_contenedor->footer());
    if (Controller::getPermisosUsuario($this->__usuario, "seccion_habitaciones", 1) == 0)
      header('Location: /Principal/');
  }

  public function getUsuario()
  {
    return $this->__usuario;
  }

  public function index()
  {
    $extraHeader = <<<html
html;

    $hotel = HabitacionesDao::getAll()[0];
    $fechas = $hotel['fechas'];
    $dates = '';
    $tabla_categorias = '';
    $modal_habitaciones = '';
    // echo $fechas;
    $fecha = explode(",", $fechas);

    $fecha_de = $fecha[array_key_first($fecha)];
    $fecha_al = $fecha[array_key_last($fecha)];


    foreach ($fecha as $key => $value) {
      $dates .= <<<html
        <div class="col-12 col-lg-6 date">
          <label class="form-label mt-4">Fechas * </label>
          <input type="date" class="form-control " id="fecha{$key}" name="fecha[]" required="" value="{$value}">
        </div>
html;
    }

    $categoriasHabitaciones = HabitacionesDao::getCategoriasHabitaciones($hotel['id_hotel']);
    // var_dump($categoriasHabitaciones);

    foreach ($categoriasHabitaciones as $key => $value) {
        $tabla_categorias .= <<<html
            <tr>
                <td> <p class="text-xs font-weight-bold ms-2 mb-0">{$value['nombre_categoria']}</p> </td>
                <td class="font-weight-bold"> <p class="text-xs font-weight-bold ms-2 mb-0">{$value['huespedes']}</p></td>
                <td class="font-weight-bold"> <p class="text-xs font-weight-bold ms-2 mb-0">{$value['total_huespedes']}</p></td>
                <td> <a href="#" type="submit" name="id" class="btn bg-gradient-primary" data-toggle="modal" data-target="#edit-habitacion{$value['id_habitacion']}"><span class="fa fa-pencil-square-o" style="color:white" ></span> </a>  </td>
            </tr>
html;


        $modal_habitaciones .= <<<html
            <div class="modal fade" id="edit-habitacion{$value['id_habitacion']}" tabindex="-1" role="dialog" aria-labelledby="edit-habitacionLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="edit-habitacionLabel">Editar Categoria</h5>
                            <button type="button" class="btn bg-gradient-danger" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
            
                        <div class="modal-body">
                            <form class="form-horizontal" id="update_form_cat" action="" method="POST">
                            <input id="id_habitacion" name="id_habitacion"  class="form-control" type="hidden" placeholder="Sencilla" "  value="{$value['id_habitacion']}">
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label">Nombre *</label>
                                            <div class="input-group c">
                                                <select id="id_hotel" name="id_hotel" maxlength="29" pattern="[a-zA-Z ÑñáÁéÉíÍóÚ]*{2,254}" class="form-control" type="text" placeholder="Thompson" required="required" onfocus="focused(this)" onfocusout="defocused(this)" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                                    <option value="" disabled>Selecciona un Hotel</option>
html;
        $hoteles = HabitacionesDao::getAll();

        foreach ($hoteles as $key => $value_cat) {
            if ($value['id_hotel' == $value_cat]) {
                $modal_habitaciones .= <<<html
                    <option value="{$value_cat['id_hotel']}" selected> {$value_cat['id_hotel']}</option>
html;
            }else{
                $modal_habitaciones .= <<<html
                    <option value="{$value_cat['id_hotel']}">{$value_cat['nombre_hotel']}</option>
html;
            }
            
        }

        $modal_habitaciones .= <<<html
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="row mb-4">
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label">Categoría Habitación *</label>
                                            <div class="input-group">
                                                <input id="categoria_habitacion" name="categoria_habitacion" maxlength="29" pattern="[a-zA-Z ÑñáÁéÉíÍóÚ]*{2,254}" class="form-control" type="text" placeholder="SENCILLA" required="required" onfocus="focused(this)" onfocusout="defocused(this)" value="{$value['categoria_habitacion']}" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                            </div>
                                        </div>
            
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label">Nombre Categoría *</label>
                                            <div class="input-group">
                                                <input id="nombre_categoria" name="nombre_categoria" maxlength="29" pattern="[a-zA-Z ÑñáÁéÉíÍóÚ]*{2,254}" class="form-control" type="text" placeholder="Sencilla" required="required" onfocus="focused(this)" onfocusout="defocused(this)" value="{$value['nombre_categoria']}">
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="row mb-4">
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label">Cupo Huéspedes *</label>
                                            <div class="input-group">
                                                <input id="huespedes" name="huespedes" maxlength="10" class="form-control" type="number" placeholder="SENCILLA" required="required" onfocus="focused(this)" onfocusout="defocused(this)" value="{$value['huespedes']}" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                            </div>
                                        </div>
            
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label">Total Huéspedes *</label>
                                            <div class="input-group">
                                                <input id="total_huespedes" name="total_huespedes" maxlength="10" class="form-control" type="number" placeholder="SENCILLA" required="required" onfocus="focused(this)" onfocusout="defocused(this)" value="{$value['total_huespedes']}" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="row">
                                        <div class="button-row d-flex mt-4 col-12">
                                            <a class="btn bg-gradient-danger mb-0 js-btn-prev" data-dismiss="modal" title="Prev">Cancelar</a>
                                            <button class="btn bg-gradient-primary ms-auto mb-0" type="submit" title="Actualizar">Actualizar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
html;
    }

    // echo count($fecha);
    // echo "<br>";
    // echo $fecha[0]; // porción1
    // echo $fecha[1]; // porción2

    View::set('modal_habitaciones',$modal_habitaciones);
    View::set('hotel', $hotel);
    View::set('dates', $dates);
    View::set('fecha_de', $fecha_de);
    View::set('fecha_al', $fecha_al);
    View::set('tabla_categorias', $tabla_categorias);
    View::set('header', $this->_contenedor->header($extraHeader));
    View::set('footer', $this->_contenedor->footer($extraFooter));
    View::render("habitaciones_all");
  }

  public function Actualizar(){
    $documento = new \stdClass();


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


      $id_hotel = $_POST['id_hotel'];
      $cliente = $_POST['cliente'];
      $evento = $_POST['evento'];
      $lugar = $_POST['lugar'];
      $total_habitaciones = $_POST['total_habitaciones'];
      $nombre_hotel = $_POST['nombre_hotel'];
      $fechas = $_POST['fecha'];
      $fechas_ = implode(",", $fechas);

      // echo $total_habitaciones;
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
      $documento->_total_habitaciones = $total_habitaciones;
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

  public function ActualizarCategoria(){
    $documento = new \stdClass();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $id_habitacion = $_POST['id_habitacion'];
      $id_hotel = $_POST['id_hotel'];
      $categoria_habitacion = $_POST['categoria_habitacion'];
      $nombre_categoria = $_POST['nombre_categoria'];
      $huespedes = $_POST['huespedes'];
      $total_huespedes = $_POST['total_huespedes'];

      $documento->_id_habitacion = $id_habitacion;
      $documento->_id_hotel = $id_hotel;
      $documento->_categoria_habitacion = $categoria_habitacion;
      $documento->_nombre_categoria = $nombre_categoria;
      $documento->_huespedes = $huespedes;
      $documento->_total_huespedes = $total_huespedes;

      $update = HabitacionesDao::updateCategoria($documento);

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

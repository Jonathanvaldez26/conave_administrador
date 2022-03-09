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
    var_dump($categoriasHabitaciones);

    foreach ($categoriasHabitaciones as $key => $value) {
      $tabla_categorias .= <<<html
        <tr>
          <td>
            <p class="text-xs font-weight-bold ms-2 mb-0">{$value['nombre_categoria']}</p>
          </td>
        
          <td class="font-weight-bold">
          <p class="text-xs font-weight-bold ms-2 mb-0">{$value['huespedes']}</p>
          </td>
          <td class="font-weight-bold">
          <p class="text-xs font-weight-bold ms-2 mb-0">{$value['total_huespedes']}</p>
          </td>
          <td>
          <a href="#" type="submit" name="id" class="btn btn-primary" data-toggle="modal" data-target="#edit-habitacion{$value['id_habitacion']}"><span class="fa fa-pencil-square-o" style="color:white" ></span> </a>  
          
          
          </td>
        </tr>
html;


      $modal_habitaciones .= <<<html

      <div class="modal fade" id="edit-habitacion{$value['id_habitacion']}" tabindex="-1" role="dialog" aria-labelledby="edit-habitacionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-habitacionLabel">Editar Categoria{$value['id_habitacion']}</h5>
                <button type="button" class="btn bg-gradient-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" id="update_form" action="" method="POST">
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <!-- <input type="text" id="id_registro" name="id_registro" value=" "> -->
                                <label class="form-label">Nombre *</label>
                                <div class="input-group">
                                    <input id="nombre" name="nombre" maxlength="29" pattern="[a-zA-Z ÑñáÁéÉíÍóÚ]*{2,254}" class="form-control" type="text" placeholder="Alec" required="" onfocus="focused(this)" onfocusout="defocused(this)" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label class="form-label">Segundo Nombre </label>
                                <div class="input-group">
                                    <input id="segundo_nombre" name="segundo_nombre" maxlength="49" pattern="[a-zA-Z ÑñáÁéÉíÍóÚ]*{2,254}" class="form-control" type="text" placeholder="Alec" onfocus="focused(this)" onfocusout="defocused(this)" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-12 col-lg-6">
                                <label class="form-label">Apellido Paterno *</label>
                                <div class="input-group">
                                    <input id="apellido_paterno" name="apellido_paterno" maxlength="29" pattern="[a-zA-Z ÑñáÁéÉíÍóÚ]*{2,254}" class="form-control" type="text" placeholder="Thompson" required="required" onfocus="focused(this)" onfocusout="defocused(this)" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                            </div>

                            <div class="col-12 col-lg-6">
                                <label class="form-label">Apellido Materno *</label>
                                <div class="input-group">
                                    <input id="apellido_materno" name="apellido_materno" maxlength="29" pattern="[a-zA-Z ÑñáÁéÉíÍóÚ]*{2,254}" class="form-control" type="text" placeholder="Thompson" required="required" onfocus="focused(this)" onfocusout="defocused(this)" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>
                            </div>

                        </div>



                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <label class="form-label mt-4">Fecha de Nacimiento * </label>
                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required="" value="">
                            </div>

                            <div class="col-lg-6 col-12">
                                <label class="form-label mt-4">Número de Telefono *</label>
                                <div class="input-group">
                                    <input id="telefono" name="telefono" minlength="10" maxlength="10" pattern="[0-9]" class="form-control" type="number" placeholder="+40 735 631 620" onfocus="focused(this)" onfocusout="defocused(this)" value="" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <label class="form-label mt-4">Email Registrado y Verificado *</label>
                                <div class="input-group">
                                    <input id="email" name="email" maxlength="49" class="form-control" type="email" placeholder="example@email.com" onfocus="focused(this)" onfocusout="defocused(this)" value="" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label class="form-label mt-4">Alergias *</label>
                                <input class="form-control" name="alergias" id="alergias" maxlength="149" name="alergias" data-color="dark" type="text" value="" placeholder="" readonly />
                            </div>

                            <div class="col-md-4">
                                <label class="form-label mt-4">Alergias Otro *</label>
                                <input class="form-control" name="alergias_otro" id="alergias_otro" maxlength="149" name="alergias" data-color="dark" type="text" value="" placeholder="" readonly />
                            </div>

                            <div class="col-md-4">
                                <label class="form-label mt-4">Alergias Medicamento *</label>
                                <input class="form-control" name="alergia_medicamento_cual" id="alergia_medicamento_cual" maxlength="149" name="alergias" data-color="dark" type="text" value="" placeholder="" readonly />
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

  public function Actualizar()
  {
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
}

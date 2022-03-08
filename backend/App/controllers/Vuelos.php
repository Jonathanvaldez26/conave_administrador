<?php
namespace App\controllers;
defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\Controller;
use \App\models\Vuelos as VuelosDao;

class Vuelos extends Controller{

    private $_contenedor;

    function __construct(){
        parent::__construct();
        $this->_contenedor = new Contenedor;
        View::set('header',$this->_contenedor->header());
        View::set('footer',$this->_contenedor->footer());
        if(Controller::getPermisosUsuario($this->__usuario, "seccion_vuelos",1) == 0)
          header('Location: /Principal/');
    }

    public function getUsuario(){
      return $this->__usuario;
    }

    public function index() {
     $extraHeader =<<<html
    
html;

     $vuelos = VuelosDao::getAll();
     $tabla= '';
     foreach ($vuelos as $key => $value) {
            $tabla.= <<<html
            <tr>
                <td>
                      <div class="form-check text-center">
                          <input class="form-check-input" type="checkbox" name="borrar[]" value="{$value['clave']}">
                          <label class="form-check-label"></label>
                      </div>
                 </td>
                 <td>
                      <div class="d-flex px-3 py-1">
                          <div>
                               <img src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/assets/img/ecommerce/blue-shoe.jpg" class="avatar me-3" alt="image">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm"><span class="fa fa-user-md" style="font-size: 13px"></span> {$value['nombre']}</h6>
                              <p class="text-sm font-weight-bold text-secondary mb-0"><span class="fa fa-calendar" style="font-size: 13px"></span> {$value['fecha_alta']}</p>
                              <p class="text-sm mb-0"><span class="fa fa-plane" style="color: #125a16; font-size: 13px"></span> {$value['aeropuerto_llegada']}</p>
                              <p class="text-sm mb-0"><span class="fa fa-flag" style="color: #353535; font-size: 13px"></span> {$value['aeropuerto_salida']}</p>
                              <p class="text-sm mb-0"><span class="fa fa-ticket" style="color: #1a8fdd; font-size: 13px"></span> Número de Vuelo: <strong>{$value['numero_vuelo']}</strong></p>
                              <p class="text-sm mb-0"><span class="fa fa-clock-o" font-size: 13px"></span> Hora Estimada de Llegada: {$value['hora_llegada_destino']}</p>
                          </div>
                      </div>
                 </td>
                 <td class="align-middle text-end">
                     <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                         <button type="button" class="btn btn-sm btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center ms-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Descargo el archivo el día 23/02/2022 18:00:14">
                             <i class="fas fa-info" aria-hidden="true"></i>
                         </button>
                     </div>
                 </td>
                 <td class="align-middle text-center text-sm">
                     <p class="text-sm font-weight-bold mb-0 text-dark">{$value['nombre_registro']}</p>
                 </td>
                <td style="text-align:center; vertical-align:middle;">
                    <a href="Detalles/{$value['clave']}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Ver .PDF Pase de Abordar"><i class="fa fa-eye"></i></a>
                    <a href="Detalles/{$value['clave']}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Eliminar el Pase de Abordar"><i class="fa fa-trash" style="color:firebrick"></i></a>
                </td>
                 
            </tr>
html;
        }

     View::set('tabla',$tabla);
     View::set('header',$this->_contenedor->header($extraHeader));
     View::render("vuelos_all");
      
    }

    public function getAsistenteNombreLineaRoot($linea_asignada){
        $asistente = '';
        foreach (VuelosDao::getAsistenteNombre($linea_asignada) as $key => $value) {
            $asistente .=<<<html
        <option value="{$value['catalogo_colaboradores_id']}">{$value['nombre']}</option>
html;
        }
        return $asistente;
    }

    public function getAsistenteNombreLinea($linea_asignada){
        $asistente = '';
        foreach (VuelosDao::getAsistenteNombre($linea_asignada) as $key => $value) {
            $asistente .=<<<html
        <option value="{$value['catalogo_colaboradores_id']}">{$value['nombre']}</option>
html;
        }
        return $asistente;
    }

}

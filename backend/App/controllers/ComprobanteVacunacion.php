<?php
namespace App\controllers;
defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\MasterDom;
use \App\controllers\Contenedor;
use \Core\Controller;
use \App\models\ComprobantesVacunacion as ComprobantesVacunacionDao;

class ComprobanteVacunacion extends Controller{

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
      <style>
        .logo{
          width:100%;
          height:150px;
          margin: 0px;
          padding: 0px;
        }
      </style>
html;

      $tabla = '';
      $tabla_no_v = '';

      $comprobantes = ComprobantesVacunacionDao::getAll();

      foreach ($comprobantes as $key => $value) {
        if ($value['validado'] == 1) {
          $tabla .= <<<html
            <tr>
              <td>
                <p class="text-center" style="font-size: small;">{$value['nombre']}</p>
              </td>
              <td>
                <p class="text-center" style="font-size: small;">{$value['fecha_carga_documento']}</p>
              </td>
              <td>
                <p class="text-center" style="font-size: small;">{$value['numero_dosis']}</p>
              </td>
              <td>
                <p class="text-center" style="font-size: small;">{$value['marca_dosis']}</p>
              </td>
              <td class="text-center">
                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#ver-documento-{$value['id_comprabante_vacuna']}">
                  Ver documento
                </button>
              </td>
            </tr>

            <div class="modal fade" id="ver-documento-{$value['id_comprabante_vacuna']}" tabindex="-1" role="dialog" aria-labelledby="ver-documento-{$value['id_comprabante_vacuna']}" aria-hidden="true">
              <div class="modal-dialog" role="document" style="max-width: 590px;">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Documento Prueba SARS-CoV-2</h5>
                          <span type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                              X
                          </span>
                      </div>
                      <div class="modal-body">
                      <iframe src="/PDF/{$value['documento']}" style="width:100%; height:700px;" frameborder="0" >
                      </iframe>
                  </div>
                  </div>
              </div>
            </div>
html;
        }

        if ($value['validado'] == 0) {
          $tabla_no_v .= <<<html
            <tr>
              <td>
                <p class="text-center" style="font-size: small;">{$value['nombre']}</p>
              </td>
              <td>
                <p class="text-center" style="font-size: small;">{$value['fecha_carga_documento']}</p>
              </td>
              <td>
                <p class="text-center" style="font-size: small;">{$value['numero_dosis']}</p>
              </td>
              <td>
                <p class="text-center" style="font-size: small;">{$value['marca_dosis']}</p>
              </td>
              <td class="text-center">
                <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#ver-documento-{$value['id_comprabante_vacuna']}">
                  Ver documento
                </button>
              </td>
              <td class="text-center">
                <button type="button" class="btn bg-gradient-danger" >
                  <i class="fas fa-times"></i>
                </button>
                <button type="button" class="btn bg-gradient-success" >
                  <i class="fas fa-check"></i>
                </button>
              </td>
            </tr>

            <div class="modal fade" id="ver-documento-{$value['id_comprabante_vacuna']}" tabindex="-1" role="dialog" aria-labelledby="ver-documento-{$value['id_comprabante_vacuna']}" aria-hidden="true">
              <div class="modal-dialog" role="document" style="max-width: 590px;">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Documento Prueba SARS-CoV-2</h5>
                          <span type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                              X
                          </span>
                      </div>
                      <div class="modal-body">
                      <iframe src="/PDF/{$value['documento']}" style="width:100%; height:700px;" frameborder="0" >
                      </iframe>
                  </div>
                  </div>
              </div>
            </div>
html;
        }
      }

      View::set('comprobantes',$comprobantes);
      View::set('tabla',$tabla);
      View::set('tabla_no_v',$tabla_no_v);
      View::set('header',$this->_contenedor->header($extraHeader));
      View::set('footer',$this->_contenedor->footer($extraFooter));
      View::render("comprobantesvacunacion_all");
    }

}

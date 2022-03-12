<?php
namespace App\controllers;
defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\MasterDom;
use \App\controllers\Contenedor;
use \Core\Controller;
use \App\models\PruebasCovidUsuarios as PruebasCovidUsuariosDao;

class PruebasCovidUsuarios extends Controller{

    private $_contenedor;

    function __construct(){
        parent::__construct();
        $this->_contenedor = new Contenedor;
        View::set('header',$this->_contenedor->header());
        View::set('footer',$this->_contenedor->footer());
        if(Controller::getPermisosUsuario($this->__usuario, "seccion_pruebas_covid",1) == 0)
        header('Location: /Principal/');
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
    $tabla_rechazados = '';

      $pruebas = PruebasCovidUsuariosDao::getAll();

      foreach ($pruebas as $key => $value) {

        if ($value['status_prueba'] == 1) {
          
          // print('asdasdasdadas');
          $tabla_rechazados .= <<<html
            <tr>
              <td>
                <p class="text-center" style="font-size: small;">{$value['nombre_completo']} </p>
              </td>
              <td>
                <p class="text-center" style="font-size: small;">{$value['fecha_carga_documento']}</p>
              </td>
              <td>
                <p class="text-center" style="font-size: small;">{$value['tipo_prueba']}</p>
              </td>
              <td>
                <p class="text-center" style="font-size: small;">{$value['resultado']}</p>
              </td>
              <td class="text-center">
                <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#ver-documento-{$value['id_c_v']}">
                  <i class="fas fa-eye"></i>
                </button>
              </td>
            </tr>

            <div class="modal fade" id="ver-documento-{$value['id_c_v']}" tabindex="-1" role="dialog" aria-labelledby="ver-documento-{$value['id_c_v']}" aria-hidden="true">
              <div class="modal-dialog" role="document" style="max-width: 590px;">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Documento Prueba SARS-CoV-2 <br> {$value['nombre_completo']}</h5>
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
        } else {

          if ($value['status_prueba'] == 0) {
            $tabla .= <<<html
              <tr>
                <td>
                  <p class="text-center" style="font-size: small;">{$value['nombre_completo']}</p>
                </td>
                <td>
                  <p class="text-center" style="font-size: small;">{$value['fecha_carga_documento']}</p>
                </td>
                <td>
                  <p class="text-center" style="font-size: small;">{$value['tipo_prueba']}</p>
                </td>
                <td>
                  <p class="text-center" style="font-size: small;">{$value['resultado']}</p>
                </td>
                <td class="text-center">
                  <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#ver-documento-{$value['id_c_v']}">
                    <i class="fas fa-eye"></i>
                  </button>
                </td>
              </tr>

              <div class="modal fade" id="ver-documento-{$value['id_c_v']}" tabindex="-1" role="dialog" aria-labelledby="ver-documento-{$value['id_c_v']}" aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width: 590px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Documento Prueba SARS-CoV-2 <br> {$value['nombre_completo']}</h5>
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

          if ($value['status_prueba'] == 0) {
            $tabla_no_v .= <<<html
              <tr>
                <td>
                  <p class="text-center" style="font-size: small;">{$value['nombre_completo']}</p>
                </td>
                <td>
                  <p class="text-center" style="font-size: small;">{$value['fecha_carga_documento']}</p>
                </td>
                <td>
                  <p class="text-center" style="font-size: small;">{$value['tipo_prueba']}</p>
                </td>
                <td>
                  <p class="text-center" style="font-size: small;">{$value['resultado']}</p>
                </td>
                <td class="text-center">
                  <button type="button" class="btn bg-gradient-primary" data-toggle="modal" data-target="#ver-documento-{$value['id_c_v']}">
                    <i class="fas fa-eye"></i>
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

              <div class="modal fade" id="ver-documento-{$value['id_c_v']}" tabindex="-1" role="dialog" aria-labelledby="ver-documento-{$value['id_c_v']}" aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width: 590px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Documento Prueba SARS-CoV-2 <br> {$value['nombre_completo']}</h5>
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
      }

      View::set('pruebas',$pruebas);
      View::set('tabla',$tabla);
      View::set('tabla_no_v',$tabla_no_v);
      View::set('tabla_rechazados',$tabla_rechazados);
      View::set('header',$this->_contenedor->header($extraHeader));
      View::set('footer',$this->_contenedor->footer($extraFooter));
      View::render("pruebascovidusuarios_all");
    }

}

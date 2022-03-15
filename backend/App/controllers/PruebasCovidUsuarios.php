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
              <td class="text-center">
                <span class="badge badge-danger"><i class="fas fa-times"></i> Rechazado</span>
              </td>
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
              <div class="modal-dialog" role="document" style="max-width: 1000px;">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Documento Prueba SARS-CoV-2</h5>
                          <span type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                              X
                          </span>
                      </div>
                      <div class="modal-body bg-gray-200">
                      <div class="row">
                        <div class="col-md-8 col-12">
                          <div class="card card-body mb-4">
                            <iframe src="/PDF/{$value['documento']}" style="width:100%; height:700px;" frameborder="0" >
                            </iframe>
                          </div>
                        </div>
                        <div class="col-md-4 col-12">
                          <div class="card card-body mb-4">
                            <h5>Datos Personales</h5>
                            <div class="mb-2">
                              <h6 class="fas fa-user"> </h6>
                              <span> <b>Nombre:</b> {$value['nombre_completo']}</span>
                              <span class="badge badge-danger">Rechazado</span>
                            </div>
                            <div class="mb-2">
                              <h6 class="fas fa-address-card"> </h6>
                              <span> <b>Número de empleado:</b> {$value['numero_empleado']}</span>
                            </div>
                            <div class="mb-2">
                              <h6 class="fas fa-business-time"> </h6>
                              <span> <b>Bu:</b> {$value['nombre_bu']}</span>
                            </div>
                            <div class="mb-2">
                              <h6 class="fas fa-pills"> </h6>
                              <span> <b>Línea:</b> {$value['nombre_linea']}</span>
                            </div>
                            <div class="mb-2">
                              <h6 class="fas fa-hospital"> </h6>
                              <span> <b>Posición:</b> {$value['nombre_posicion']}</span>
                            </div>
                            <div class="mb-2">
                              <h6 class="fas fa-envelope"> </h6>
                              <span> <b>Correo Electrónico:</b> {$value['email']}</span>
                            </div>
                            <div class="mb-2">
                              <h6 class="fas fa-phone"> </h6>
                              <span> <b>Teléfono:</b> {$value['telefono']}</span>
                            </div>
                          </div>
                          <div class="card card-body mb-4">
                            <h5>Datos del Comprobante</h5>
                            <div class="mb-2">
                              <h6 class="fas fa-calendar"> </h6>
                              <span> <b>Fecha de alta:</b> {$value['fecha_carga_documento']}</span>
                            </div>
                            <div class="mb-2">
                              <h6 class="fas fa-hashtag"> </h6>
                              <span> <b>Resultado:</b> {$value['resultado']}</span>
                            </div>
                            <div class="mb-2">
                              <h6 class="fas fa-syringe"> </h6>
                              <span> <b>Tipo de prueba:</b> {$value['tipo_prueba']}</span>
                            </div>
                          </div>
                          <div class="card card-body">
                            <h5>Notas</h5>
                            <div class="alert div-danger">
                              {$value['nota']}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
html;
        }

          if ($value['status_prueba'] == 2) {
            $tabla .= <<<html
              <tr>
                <td class="text-center">
                  <span class="badge badge-success"><i class="fas fa-check"></i> Aprobada</span>
                </td>
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
                <div class="modal-dialog" role="document" style="max-width: 1000px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Documento Prueba SARS-CoV-2</h5>
                            <span type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                X
                            </span>
                        </div>
                        <div class="modal-body bg-gray-200">
                          <div class="row">
                            <div class="col-md-8 col-12">
                              <div class="card card-body mb-4">
                                <iframe src="/PDF/{$value['documento']}" style="width:100%; height:700px;" frameborder="0" >
                                </iframe>
                              </div>
                            </div>
                            <div class="col-md-4 col-12">
                              <div class="card card-body mb-4">
                                <h5>Datos Personales</h5>
                                <div class="mb-2">
                                  <h6 class="fas fa-user"> </h6>
                                  <span> <b>Nombre:</b> {$value['nombre_completo']}</span>
                                  <span class="badge badge-success">Aprobado</span>
                                </div>
                                <div class="mb-2">
                                  <h6 class="fas fa-address-card"> </h6>
                                  <span> <b>Número de empleado:</b> {$value['numero_empleado']}</span>
                                </div>
                                <div class="mb-2">
                                  <h6 class="fas fa-business-time"> </h6>
                                  <span> <b>Bu:</b> {$value['nombre_bu']}</span>
                                </div>
                                <div class="mb-2">
                                  <h6 class="fas fa-pills"> </h6>
                                  <span> <b>Línea:</b> {$value['nombre_linea']}</span>
                                </div>
                                <div class="mb-2">
                                  <h6 class="fas fa-hospital"> </h6>
                                  <span> <b>Posición:</b> {$value['nombre_posicion']}</span>
                                </div>
                                <div class="mb-2">
                                  <h6 class="fas fa-envelope"> </h6>
                                  <span> <b>Correo Electrónico:</b> {$value['email']}</span>
                                </div>
                                <div class="mb-2">
                                  <h6 class="fas fa-phone"> </h6>
                                  <span> <b>Teléfono:</b> {$value['telefono']}</span>
                                </div>
                              </div>
                              <div class="card card-body mb-4">
                                <h5>Datos del Comprobante</h5>
                                <div class="mb-2">
                                  <h6 class="fas fa-calendar"> </h6>
                                  <span> <b>Fecha de alta:</b> {$value['fecha_carga_documento']}</span>
                                </div>
                                <div class="mb-2">
                                  <h6 class="fas fa-hashtag"> </h6>
                                  <span> <b>Resultado:</b> {$value['resultado']}</span>
                                </div>
                                <div class="mb-2">
                                  <h6 class="fas fa-syringe"> </h6>
                                  <span> <b>Tipo de prueba:</b> {$value['tipo_prueba']}</span>
                                </div>
                              </div>
                              <div class="card card-body">
                                <h5>Notas</h5>
                                <div class="alert div-info">
                                  {$value['nota']}
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
              </div>
html;
          }

          if ($value['status_prueba'] == 0) {
            $tabla_no_v .= <<<html
              <tr>
                <td class="text-center">
                  <span class="badge badge-warning"><i class="fas fa-clock"></i> Pendiente</span>
                </td>
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
                <div class="modal-dialog" role="document" style="max-width: 1000px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Documento Prueba SARS-CoV-2</h5>
                            <span type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                X
                            </span>
                        </div>
                        <div class="modal-body bg-gray-200">
                          <div class="row">
                            <div class="col-md-8 col-12">
                              <div class="card card-body mb-4">
                                <iframe src="/PDF/{$value['documento']}" style="width:100%; height:700px;" frameborder="0" >
                                </iframe>
                              </div>
                            </div>
                            <div class="col-md-4 col-12">
                              <div class="card card-body mb-4">
                                <h5>Datos Personales</h5>
                                <div class="mb-2">
                                  <h6 class="fas fa-user"> </h6>
                                  <span> <b>Nombre:</b> {$value['nombre_completo']}</span>
                                  <span class="badge badge-warning">Pendiente</span>
                                </div>
                                <div class="mb-2">
                                  <h6 class="fas fa-address-card"> </h6>
                                  <span> <b>Número de empleado:</b> {$value['numero_empleado']}</span>
                                </div>
                                <div class="mb-2">
                                  <h6 class="fas fa-business-time"> </h6>
                                  <span> <b>Bu:</b> {$value['nombre_bu']}</span>
                                </div>
                                <div class="mb-2">
                                  <h6 class="fas fa-pills"> </h6>
                                  <span> <b>Línea:</b> {$value['nombre_linea']}</span>
                                </div>
                                <div class="mb-2">
                                  <h6 class="fas fa-hospital"> </h6>
                                  <span> <b>Posición:</b> {$value['nombre_posicion']}</span>
                                </div>
                                <div class="mb-2">
                                  <h6 class="fas fa-envelope"> </h6>
                                  <span> <b>Correo Electrónico:</b> {$value['email']}</span>
                                </div>
                                <div class="mb-2">
                                  <h6 class="fas fa-phone"> </h6>
                                  <span> <b>Teléfono:</b> {$value['telefono']}</span>
                                </div>
                              </div>
                              <div class="card card-body mb-4">
                                <h5>Datos del Comprobante</h5>
                                <div class="mb-2">
                                  <h6 class="fas fa-calendar"> </h6>
                                  <span> <b>Fecha de alta:</b> {$value['fecha_carga_documento']}</span>
                                </div>
                                <div class="mb-2">
                                  <h6 class="fas fa-hashtag"> </h6>
                                  <span> <b>Resultado:</b> {$value['resultado']}</span>
                                </div>
                                <div class="mb-2">
                                  <h6 class="fas fa-syringe"> </h6>
                                  <span> <b>Tipo de prueba:</b> {$value['tipo_prueba']}</span>
                                </div>
                              </div>
                              <div class="card card-body">
                                <h5 class="mb-2">Notas</h5>
html;
                            if ($value['nota'] != '') {
                              $tabla_no_v .=<<<html
                                <div id="editar_section">
                                  <p id="">
                                    {$value['nota']}
                                  </p>
                                  <button id="editar_nota" type="button" class="btn bg-gradient-primary w-50" >
                                    Editar
                                  </button>
                                </div>

                                <div class="hide-section" id="editar_section_textarea">
                                  <form class="form-horizontal" id="guardar_nota" action="" method="POST">
                                    <input type="text" id="id_prueba_covid" name="id_prueba_covid" value="{$value['id_c_v']}" readonly style="display:none;"> 
                                    <p>
                                      <textarea class="form-control" name="nota" id="nota" placeholder="Agregar notas sobre la respuesta de la validación del documento" required> {$value['nota']} </textarea>
                                    </p>
                                    <div class="row">
                                      <div class="col-md-6 col-12">
                                      <button type="submit" id="guardar_editar_nota" class="btn bg-gradient-dark " >
                                        Guardar
                                      </button>
                                      </div>
                                      <div class="col-md-6 col-12">
                                        <button type="button" id="cancelar_editar_nota" class="btn bg-gradient-danger" >
                                          Cancelar
                                        </button>
                                      </div>
                                    </div>
                                  </form>
                                </div>
html;
                            }else{
                              $tabla_no_v .=<<<html
                                <p>
                                  {$value['nota']}
                                </p>
                                <form class="form-horizontal" id="guardar_nota" action="" method="POST">
                                  <input type="text" id="id_prueba_covid" name="id_prueba_covid" value="{$value['id_c_v']}" readonly style="display:none;"> 
                                  <p>
                                    <textarea class="form-control" name="nota" id="nota" placeholder="Agregar notas sobre la respuesta de la validación del documento" required></textarea>
                                  </p>
                                  <button type="submit" id="guardar_editar_nota" class="btn bg-gradient-dark w-50" >
                                    Guardar
                                  </button>
                                </form>
html;
                            }
              $tabla_no_v .=<<<html
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="pt-4">
                          <div class="row text-center">
                            <div class="col-md-6 col-12">
                              <form class="form-horizontal" id="btn_validar" action="" method="POST">
                                <input type="text" id="id_comprobante" name="id_comprobante" value="{$value['id_c_v']}" readonly style="display:none;" hidden>
                                
                                <button type="submit" class="btn bg-gradient-success w-50" >
                                  Aceptar
                                </button>
                              </form>
                            </div>
                            <div class="col-md-6 col-12">
                              <form class="form" id="btn_rechazar" action="" method="POST">
                                <input type="text" id="id_comprobante" name="id_comprobante" value="{$value['id_c_v']}" readonly style="display:none;">
                                <button type="submit" class="btn bg-gradient-danger w-50" >
                                  Rechazar
                                </button>
                              </form>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
              </div>
html;
          }
             
      }

      $extraFooter = <<<html
      <script>
      $(document).ready(function() {
  
          $("#btn_validar").on("submit", function(event) {
              event.preventDefault();
  
              var formData = new FormData(document.getElementById("btn_validar"));
              for (var value of formData.values()) {
                  console.log(value);
              }
  
              $.ajax({
                  url: "/PruebasCovidUsuarios/Validar",
                  type: "POST",
                  data: formData,
                  cache: false,
                  contentType: false,
                  processData: false,
                  beforeSend: function() {
                      console.log("Procesando....");
                  },
                  success: function(respuesta) {
                      console.log(respuesta);
                      if (respuesta == 'success') {
                          swal("¡Se validó correctamente el comprobante!", "", "success").
                          then((value) => {
                              window.location.replace("/PruebasCovidUsuarios/");
                          });
                      } else {
                          swal("¡No se pudo validar correctamente el comprobante!", "", "warning").
                          then((value) => {
                              window.location.replace("/PruebasCovidUsuarios/")
                          });
                      }
                  },
                  error: function(respuesta) {
                      console.log(respuesta);
                  }
  
              });
          });
  
          $("#btn_rechazar").on("submit", function(event) {
              event.preventDefault();
  
              var formData = new FormData(document.getElementById("btn_rechazar"));
              for (var value of formData.values()) {
                  console.log(value);
              }
  
              $.ajax({
                  url: "/PruebasCovidUsuarios/Rechazar",
                  type: "POST",
                  data: formData,
                  cache: false,
                  contentType: false,
                  processData: false,
                  beforeSend: function() {
                      console.log("Procesando....");
                  },
                  success: function(respuesta) {
                      console.log(respuesta);
                      if (respuesta == 'success') {
                          swal("¡Se rechazó correctamente el comprobante!", "", "success").
                          then((value) => {
                              window.location.replace("/PruebasCovidUsuarios/");
                          });
                      } else {
                          swal("¡No se pudo rechazar correctamente el comprobante!", "", "warning").
                          then((value) => {
                              window.location.replace("/PruebasCovidUsuarios/")
                          });
                      }
                  },
                  error: function(respuesta) {
                      console.log(respuesta);
                  }
  
              });
          });

          $("#guardar_nota").on("submit", function(event) {
            event.preventDefault();

            var formData = new FormData(document.getElementById("guardar_nota"));
            for (var value of formData.values()) {
                console.log(value);
            }

            $.ajax({
                url: "/PruebasCovidUsuarios/GuardarNota",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    console.log("Procesando....");
                },
                success: function(respuesta) {
                    console.log(respuesta);
                    if (respuesta == 'success') {
                        swal("¡Se guardó correctamente la nota!", "", "success").
                        then((value) => {
                            // window.location.replace("/PruebasCovidUsuarios/");
                        });
                        var ta = document.getElementById("nota");
                        ta.setAttribute('disabled','');

                        var btn_cancelar = document.getElementById('cancelar_editar_nota');
                        btn_cancelar.setAttribute('hidden','');

                        var btn_guardar = document.getElementById('guardar_editar_nota');
                        btn_guardar.setAttribute('hidden','');

                    } else {
                        swal("¡No se pudo guardar correctamente la nota!", "", "warning").
                        then((value) => {
                            // window.location.replace("/PruebasCovidUsuarios/")
                        });
                    }
                },
                error: function(respuesta) {
                    console.log(respuesta);
                }

            });
        });

        $("#editar_nota").on("click", function(event) {
            $('#editar_section').addClass('hide-section').removeClass('show-section');
            $('#editar_section_textarea').addClass('show-section').removeClass('hide-section');
            console.log('Holaa');
        });

        $("#cancelar_editar_nota").on("click", function(event) {
            $('#editar_section_textarea').addClass('hide-section').removeClass('show-section');
            $('#editar_section').addClass('show-section').removeClass('hide-section');
            console.log('Holaa');
        });
      });
    </script>
html;


      View::set('pruebas',$pruebas);
      View::set('tabla',$tabla);
      View::set('tabla_no_v',$tabla_no_v);
      View::set('tabla_rechazados',$tabla_rechazados);
      View::set('header',$this->_contenedor->header($extraHeader));
      View::set('footer',$this->_contenedor->footer($extraFooter));
      View::render("pruebascovidusuarios_all");
    }

    public function Validar(){

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          $id_comprobante = $_POST['id_comprobante'];

          $id = PruebasCovidUsuariosDao::validar($id_comprobante);

          if($id){
              echo "success";
            //header("Location: /Home");
          }else{
              echo "fail";
           // header("Location: /Home/");
          }

      } else {
          echo 'fail REQUEST';
      }
    }

    public function Rechazar(){

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          $id_comprobante = $_POST['id_comprobante'];

          $id = PruebasCovidUsuariosDao::rechazar($id_comprobante);

          if($id){
              echo "success";
            //header("Location: /Home");
          }else{
              echo "fail";
          // header("Location: /Home/");
          }

      } else {
          echo 'fail REQUEST';
      }

    }

    public function GuardarNota(){

      $documento = new \stdClass();

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          $id_prueba_covid = $_POST['id_prueba_covid'];
          $nota = $_POST['nota'];

          $documento->_id_prueba_covid = $id_prueba_covid;
          $documento->_nota = $nota;

          $id = PruebasCovidUsuariosDao::updateNote($documento);


          if($id){
              echo "success";
            //header("Location: /Home");
          }else{
              echo "fail";
            // header("Location: /Home/");
          }

      } else {
          echo 'fail REQUEST';
      }

    }
}

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
                <span class="badge badge-danger"><i class="fas fa-times"></i> Rechazado</span> <br>
                <span class="badge badge-secondary">Folio <i class="fas fa-hashtag"> </i> {$value['id_c_v'] }</span>
              </td>
              <td>
                <h6 class="mb-0 text-sm"> <span class="fas fa-user-md"> </span>  {$value['nombre_completo']}</h6>
                <p class="text-sm font-weight-bold mb-0 "><span class="fa fa-business-time" style="font-size: 13px;"></span><b> Bu: </b>{$value['nombre_bu']}</p>
                  <p class="text-sm font-weight-bold mb-0 "><span class="fa fa-pills" style="font-size: 13px;"></span><b> Linea Principal: </b>{$value['nombre_linea']}</p>
                  <p class="text-sm font-weight-bold mb-0 "><span class="fa fa-hospital" style="font-size: 13px;"></span><b> Posición: </b>{$value['nombre_posicion']}</p>

                <hr>

                  <!--p class="text-sm font-weight-bold mb-0 "><span class="fa fas fa-user-tie" style="font-size: 13px;"></span><b> Ejecutivo Asignado a Línea: </b><br></p-->

                  <!--p class="text-sm font-weight-bold mb-0 "><span class="fa fa-whatsapp" style="font-size: 13px; color:green;"></span><b> </b>{$value['telefono']}</p>
                  <p class="text-sm font-weight-bold mb-0 "><span class="fa fa-mail-bulk" style="font-size: 13px;"></span><b>  </b><a "mailto:{$value['email']}">{$value['email']}</a></p-->

                  <div class="d-flex flex-column justify-content-center">
                      <u><a href="mailto:{$value['email']}"><h6 class="mb-0 text-sm"><span class="fa fa-mail-bulk" style="font-size: 13px"></span> {$value['email']}</h6></a></u>
                      <u><a href="https://api.whatsapp.com/send?phone=52{$value['telefono']}&text=Buen%20d%C3%ADa,%20te%20contacto%20de%20parte%20del%20Equipo%20Grupo%20LAHE%20%F0%9F%98%80" target="_blank"><p class="text-sm font-weight-bold text-secondary mb-0"><span class="fa fa-whatsapp" style="font-size: 13px; color:green;"></span> {$value['telefono']}</p></a></u>
                  </div>
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
                              <h6 class="fa fa-mail-bulk"> </h6>
                              <span> <b>Correo Electrónico:</b> <u><a href="mailto:{$value['email']}">{$value['email']}</a></u></span>
                            </div>
                            <div class="mb-2">
                                  <h6 class="fa fa-whatsapp" style="font-size: 13px; color:green;"> </h6>
                                  <span> <b></b> <u><a href="https://api.whatsapp.com/send?phone=52{$value['telefono']}&text=Buen%20d%C3%ADa,%20te%20contacto%20de%20parte%20del%20Equipo%20Grupo%20LAHE%20%F0%9F%98%80" target="_blank">{$value['telefono']}</a></u></span>
                                </div>
                          </div>
                          <div class="card card-body mb-4">
                            <h5>Datos de la Prueba</h5>
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
html;

                        if ($value['nota'] != '') {
                          $tabla_rechazados .=<<<html
                            <div class="editar_section" id="editar_section">
                              <p id="">
                                {$value['nota']}
                              </p>
                              <button id="editar_nota" type="button" class="btn bg-gradient-primary w-50 editar_nota" >
                                Editar
                              </button>
                            </div>

                            <div class="hide-section editar_section_textarea" id="editar_section_textarea">
                              <form class="form-horizontal guardar_nota" id="guardar_nota" action="" method="POST">
                                <input type="text" id="id_prueba_covid" name="id_prueba_covid" value="{$value['id_c_v']}" readonly style="display:none;"> 
                                <p>
                                  <textarea class="form-control nota" name="nota" id="nota" placeholder="Agregar notas sobre la respuesta de la validación del documento" required> {$value['nota']} </textarea>
                                </p>
                                <div class="row">
                                  <div class="col-md-6 col-12">
                                  <button type="submit" id="guardar_editar_nota" class="btn bg-gradient-dark guardar_editar_nota" >
                                    Guardar
                                  </button>
                                  </div>
                                  <div class="col-md-6 col-12">
                                    <button type="button" id="cancelar_editar_nota" class="btn bg-gradient-danger cancelar_editar_nota" >
                                      Cancelar
                                    </button>
                                  </div>
                                </div>
                              </form>
                            </div>
html;
                        }else{
                          $tabla_rechazados .=<<<html
                            <p>
                              {$value['nota']}
                            </p>
                            <form class="form-horizontal guardar_nota" id="guardar_nota" action="" method="POST">
                              <input type="text" id="id_prueba_covid" name="id_prueba_covid" value="{$value['id_c_v']}" readonly style="display:none;"> 
                              <p>
                                <textarea class="form-control nota" name="nota" id="nota" placeholder="Agregar notas sobre la respuesta de la validación del documento" required></textarea>
                              </p>
                              <button type="submit" class="btn bg-gradient-dark w-50" >
                                Guardar
                              </button>
                            </form>
html;
                        }
                        $tabla_rechazados .=<<<html
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
                  <span class="badge badge-success"><i class="fas fa-check"></i> Aprobada</span> <br>
                  <span class="badge badge-secondary">Folio <i class="fas fa-hashtag"> </i> {$value['id_c_v'] }</span>
                </td>
                <td>
                  <h6 class="mb-0 text-sm"> <span class="fas fa-user-md"> </span>  {$value['nombre_completo']}</h6>
                  <p class="text-sm font-weight-bold mb-0 "><span class="fa fa-business-time" style="font-size: 13px;"></span><b> Bu: </b>{$value['nombre_bu']}</p>
                    <p class="text-sm font-weight-bold mb-0 "><span class="fa fa-pills" style="font-size: 13px;"></span><b> Linea Principal: </b>{$value['nombre_linea']}</p>
                    <p class="text-sm font-weight-bold mb-0 "><span class="fa fa-hospital" style="font-size: 13px;"></span><b> Posición: </b>{$value['nombre_posicion']}</p>

                  <hr>

                    <!--p class="text-sm font-weight-bold mb-0 "><span class="fa fas fa-user-tie" style="font-size: 13px;"></span><b> Ejecutivo Asignado a Línea: </b><br></p-->

                    <!--p class="text-sm font-weight-bold mb-0 "><span class="fa fa-whatsapp" style="font-size: 13px; color:green;"></span><b> </b>{$value['telefono']}</p>
                    <p class="text-sm font-weight-bold mb-0 "><span class="fa fa-mail-bulk" style="font-size: 13px;"></span><b>  </b><a "mailto:{$value['email']}">{$value['email']}</a></p-->

                    <div class="d-flex flex-column justify-content-center">
                        <u><a href="mailto:{$value['email']}"><h6 class="mb-0 text-sm"><span class="fa fa-mail-bulk" style="font-size: 13px"></span> {$value['email']}</h6></a></u>
                        <u><a href="https://api.whatsapp.com/send?phone=52{$value['telefono']}&text=Buen%20d%C3%ADa,%20te%20contacto%20de%20parte%20del%20Equipo%20Grupo%20LAHE%20%F0%9F%98%80" target="_blank"><p class="text-sm font-weight-bold text-secondary mb-0"><span class="fa fa-whatsapp" style="font-size: 13px; color:green;"></span> {$value['telefono']}</p></a></u>
                    </div>
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
                                  <h6 class="fa fa-mail-bulk"> </h6>
                                  <span> <b>Correo Electrónico:</b> <u><a href="mailto:{$value['email']}">{$value['email']}</a></u></span>
                                </div>
                                <div class="mb-2">
                                  <h6 class="fa fa-whatsapp" style="font-size: 13px; color:green;"> </h6>
                                  <span> <b></b> <u><a href="https://api.whatsapp.com/send?phone=52{$value['telefono']}&text=Buen%20d%C3%ADa,%20te%20contacto%20de%20parte%20del%20Equipo%20Grupo%20LAHE%20%F0%9F%98%80" target="_blank">{$value['telefono']}</a></u></span>
                                </div>
                              </div>
                              <div class="card card-body mb-4">
                                <h5>Datos de la Prueba</h5>
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
                                
html;
                            if ($value['nota'] != '') {
                              $tabla .=<<<html
                                <div class="editar_section" id="editar_section">
                                  <p id="">
                                    {$value['nota']}
                                  </p>
                                  <button id="editar_nota" type="button" class="btn bg-gradient-primary w-50 editar_nota" >
                                    Editar
                                  </button>
                                </div>

                                <div class="hide-section editar_section_textarea" id="editar_section_textarea">
                                  <form class="form-horizontal guardar_nota" id="guardar_nota" action="" method="POST">
                                    <input type="text" id="id_prueba_covid" name="id_prueba_covid" value="{$value['id_c_v']}" readonly style="display:none;"> 
                                    <p>
                                      <textarea class="form-control nota" name="nota" id="nota" placeholder="Agregar notas sobre la respuesta de la validación del documento" required> {$value['nota']} </textarea>
                                    </p>
                                    <div class="row">
                                      <div class="col-md-6 col-12">
                                      <button type="submit" id="guardar_editar_nota" class="btn bg-gradient-dark guardar_editar_nota" >
                                        Guardar
                                      </button>
                                      </div>
                                      <div class="col-md-6 col-12">
                                        <button type="button" id="cancelar_editar_nota" class="btn bg-gradient-danger cancelar_editar_nota" >
                                          Cancelar
                                        </button>
                                      </div>
                                    </div>
                                  </form>
                                </div>
html;
                            }else{
                              $tabla .=<<<html
                                <p>
                                  {$value['nota']}
                                </p>
                                <form class="form-horizontal guardar_nota" id="guardar_nota" action="" method="POST">
                                  <input type="text" id="id_prueba_covid" name="id_prueba_covid" value="{$value['id_c_v']}" readonly style="display:none;"> 
                                  <p>
                                    <textarea class="form-control nota" name="nota" id="nota" placeholder="Agregar notas sobre la respuesta de la validación del documento" required></textarea>
                                  </p>
                                  <button type="submit" class="btn bg-gradient-dark w-50" >
                                    Guardar
                                  </button>
                                </form>
html;
                            }
                            $tabla .=<<<html
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
                  <span class="badge badge-warning text-dark"><i class="fas fa-clock"></i> Pendiente</span> <br>
                  <span class="badge badge-secondary">Folio <i class="fas fa-hashtag"> </i> {$value['id_c_v'] }</span>
                </td>
                <td>
                  <h6 class="mb-0 text-sm"> <span class="fas fa-user-md"> </span>  {$value['nombre_completo']}</h6>
                  <p class="text-sm font-weight-bold mb-0 "><span class="fa fa-business-time" style="font-size: 13px;"></span><b> Bu: </b>{$value['nombre_bu']}</p>
                    <p class="text-sm font-weight-bold mb-0 "><span class="fa fa-pills" style="font-size: 13px;"></span><b> Linea Principal: </b>{$value['nombre_linea']}</p>
                    <p class="text-sm font-weight-bold mb-0 "><span class="fa fa-hospital" style="font-size: 13px;"></span><b> Posición: </b>{$value['nombre_posicion']}</p>

                  <hr>

                    <!--p class="text-sm font-weight-bold mb-0 "><span class="fa fas fa-user-tie" style="font-size: 13px;"></span><b> Ejecutivo Asignado a Línea: </b><br></p-->

                    <!--p class="text-sm font-weight-bold mb-0 "><span class="fa fa-whatsapp" style="font-size: 13px; color:green;"></span><b> </b>{$value['telefono']}</p>
                    <p class="text-sm font-weight-bold mb-0 "><span class="fa fa-mail-bulk" style="font-size: 13px;"></span><b>  </b><a "mailto:{$value['email']}">{$value['email']}</a></p-->

                    <div class="d-flex flex-column justify-content-center">
                        <u><a href="mailto:{$value['email']}"><h6 class="mb-0 text-sm"><span class="fa fa-mail-bulk" style="font-size: 13px"></span> {$value['email']}</h6></a></u>
                        <u><a href="https://api.whatsapp.com/send?phone=52{$value['telefono']}&text=Buen%20d%C3%ADa,%20te%20contacto%20de%20parte%20del%20Equipo%20Grupo%20LAHE%20%F0%9F%98%80" target="_blank"><p class="text-sm font-weight-bold text-secondary mb-0"><span class="fa fa-whatsapp" style="font-size: 13px; color:green;"></span> {$value['telefono']}</p></a></u>
                    </div>
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
                            <h5 class="modal-title" id="exampleModalLabel">Prueba de SARS-CoV-2</h5>
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
                                  <h6 class="fa fa-mail-bulk"> </h6>
                                  <span> <b>Correo Electrónico:</b> <u><a href="mailto:{$value['email']}">{$value['email']}</a></u></span>
                                </div>
                                <div class="mb-2">
                                  <h6 class="fa fa-whatsapp" style="font-size: 13px; color:green;"> </h6>
                                  <span> <b></b> <u><a href="https://api.whatsapp.com/send?phone=52{$value['telefono']}&text=Buen%20d%C3%ADa,%20te%20contacto%20de%20parte%20del%20Equipo%20Grupo%20LAHE%20%F0%9F%98%80" target="_blank">{$value['telefono']}</a></u></span>
                                </div>
                              </div>
                              <div class="card card-body mb-4">
                                <h5>Datos de la Prueba</h5>
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
                                <div class="editar_section" id="editar_section">
                                  <p id="">
                                    {$value['nota']}
                                  </p>
                                  <button id="editar_nota" type="button" class="btn bg-gradient-primary w-50 editar_nota" >
                                    Editar
                                  </button>
                                </div>

                                <div class="hide-section editar_section_textarea" id="editar_section_textarea">
                                  <form class="form-horizontal guardar_nota_pendiente" id="guardar_nota_pendiente" action="" method="POST">
                                    <input type="text" id="id_prueba_covid" name="id_prueba_covid" value="{$value['id_c_v']}" readonly style="display:none;"> 
                                    <p>
                                      <textarea class="form-control nota" name="nota" id="nota" placeholder="Agregar notas sobre la respuesta de la validación del documento" required> {$value['nota']} </textarea>
                                    </p>
                                    <div class="row">
                                      <div class="col-md-6 col-12">
                                      <button type="submit" id="guardar_editar_nota" class="btn bg-gradient-dark guardar_editar_nota" >
                                        Guardar
                                      </button>
                                      </div>
                                      <div class="col-md-6 col-12">
                                        <button type="button" id="cancelar_editar_nota" class="btn bg-gradient-danger cancelar_editar_nota" >
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
                                <form class="form-horizontal guardar_nota" id="guardar_nota" action="" method="POST">
                                  <input type="text" id="id_prueba_covid" name="id_prueba_covid" value="{$value['id_c_v']}" readonly style="display:none;"> 
                                  <p>
                                    <textarea class="form-control nota" name="nota" id="nota" placeholder="Agregar notas sobre la respuesta de la validación del documento" required></textarea>
                                  </p>
                                  <button type="submit" id="guardar_editar_nota" class="btn bg-gradient-dark w-50 guardar_editar_nota"  >
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
                        <div class="pt-4 modal-footer">
                          <div class="row text-center">
                            <div class="col-md-6 col-12">
                              <form class="form-horizontal btn_validar" id="btn_validar" action="" method="POST">
                                <input type="hidden" id="id_prueba_covid" name="id_prueba_covid" value="{$value['id_c_v']}" readonly >
                                <input type="hidden" id="id_asistente" name="id_asistente" value="{$value['utilerias_asistentes_id']}" readonly >
                                <button type="submit" class="btn bg-gradient-success" >
                                  Aceptar
                                </button>
                              </form>
                            </div>
                            <div class="col-md-6 col-12">
                              <form class="form btn_rechazar" id="btn_rechazar" action="" method="POST">
                                <input type="hidden" id="id_prueba_covid" name="id_prueba_covid" value="{$value['id_c_v']}" readonly >
                                <input type="hidden" id="id_asistente" name="id_asistente" value="{$value['utilerias_asistentes_id']}" readonly >
                                <button type="submit" class="btn bg-gradient-secondary" >
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

      <script src="http://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" defer></script>
      <link rel="stylesheet" href="http://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />

      <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" defer></script>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />

      <script>
      $(document).ready(function() {
  
          $(".btn_validar").on("submit", function(event) {
              event.preventDefault();
  
              var formData = $(this).serialize();
              console.log(formData);
  
              $.ajax({
                  url: "/PruebasCovidUsuarios/Validar",
                  type: "POST",
                  data: formData,
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
                              //window.location.replace("/PruebasCovidUsuarios/")
                          });
                      }
                  },
                  error: function(respuesta) {
                      console.log(respuesta);
                  }
  
              });
          });
  
          $(".btn_rechazar").on("submit", function(event) {
              event.preventDefault();
  
              var formData = $(this).serialize();
              console.log(formData);
  
              $.ajax({
                  url: "/PruebasCovidUsuarios/Rechazar",
                  type: "POST",
                  data: formData,
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
                              //window.location.replace("/PruebasCovidUsuarios/")
                          });
                      }
                  },
                  error: function(respuesta) {
                      console.log(respuesta);
                  }
  
              });
          });

          $(".guardar_nota").on("submit", function(event) {
            event.preventDefault();

            var formData = $(this).serialize();
            console.log(formData);

            $.ajax({
                url: "/PruebasCovidUsuarios/GuardarNota",
                type: "POST",
                data: formData,
                beforeSend: function() {
                    console.log("Procesando....");
                },
                success: function(respuesta) {
                    console.log(respuesta);
                    if (respuesta == 'success') {
                        swal("¡Se guardó correctamente la nota!", "", "success").
                        then((value) => {
                            window.location.replace("/PruebasCovidUsuarios/");
                        });
                        // var ta = document.getElementById("nota");
                        // ta.setAttribute('disabled','');

                        $('.nota').attr('disabled');

                        $('.cancelar_editar_nota').attr('hidden');

                        $('.cancelar_editar_nota').attr('disabled');

                        $('.guardar_editar_nota').attr('hidden');

                        $('.guardar_editar_nota').attr('disabled');

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

        $(".guardar_nota_pendiente").on("submit", function(event) {
          event.preventDefault();

          var formData = $(this).serialize();
          console.log(formData);

          $.ajax({
              url: "/PruebasCovidUsuarios/GuardarNota",
              type: "POST",
              data: formData,
              beforeSend: function() {
                  console.log("Procesando....");
              },
              success: function(respuesta) {
                  console.log(respuesta);
                  if (respuesta == 'success') {
                      
                      // var ta = document.getElementById("nota");
                      // ta.setAttribute('disabled','');

                      // var ta = document.getElementById("guardar_editar_nota");
                      // ta.setAttribute('disabled','');

                      // console.log(ta);

                      let ta = $('.nota');

                      // $('.cancelar_editar_nota').attr('hidden');

                      // $('.cancelar_editar_nota').attr('disabled');

                      // $('.guardar_editar_nota').attr('hidden');

                      // $('.guardar_editar_nota').attr('disabled');
                      
                      console.log('Guardar');

                      swal("¡Se guardó correctamente la nota!", "", "success").
                      then((value) => {
                          //window.location.replace("/PruebasCovidUsuarios/");
                      });
                      
                      console.log(ta);
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

        $(".editar_nota").on("click", function(event) {
            $('.editar_section').addClass('hide-section').removeClass('show-section');
            $('.editar_section_textarea').addClass('show-section').removeClass('hide-section');
            console.log('Editar');
        });

        $(".cancelar_editar_nota").on("click", function(event) {
            $('.editar_section_textarea').addClass('hide-section').removeClass('show-section');
            $('.editar_section').addClass('show-section').removeClass('hide-section');
            console.log('Cancelar');
        });

        $('#table_pendiente').DataTable({
          "drawCallback": function( settings ) {
          $('.current').addClass("btn bg-gradient-danger btn-rounded").removeClass("paginate_button");
          $('.paginate_button').addClass("btn").removeClass("paginate_button");
          $('.dataTables_length').addClass("m-4");
          $('.dataTables_info').addClass("mx-4");
          $('.dataTables_filter').addClass("m-4");
          $('input').addClass("form-control");
          $('select').addClass("form-control");
          $('.previous.disabled').addClass("btn-outline-danger opacity-5 btn-rounded mx-2");
          $('.next.disabled').addClass("btn-outline-danger opacity-5 btn-rounded mx-2");
          $('.previous').addClass("btn-outline-danger btn-rounded mx-2");
          $('.next').addClass("btn-outline-danger btn-rounded mx-2");
          $('a.btn').addClass("btn-rounded");
          },
          "language": {
          
              "sProcessing":     "Procesando...",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla",
              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix":    "",
              "sSearch":         "Buscar:",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
                  "sFirst":    "Primero",
                  "sLast":     "Último",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
              },
              "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }
          
          }
        });

        $('#table_rechazado').DataTable({
          "drawCallback": function( settings ) {
          $('.current').addClass("btn bg-gradient-danger btn-rounded").removeClass("paginate_button");
          $('.paginate_button').addClass("btn").removeClass("paginate_button");
          $('.dataTables_length').addClass("m-4");
          $('.dataTables_info').addClass("mx-4");
          $('.dataTables_filter').addClass("m-4");
          $('input').addClass("form-control");
          $('select').addClass("form-control");
          $('.previous.disabled').addClass("btn-outline-danger opacity-5 btn-rounded mx-2");
          $('.next.disabled').addClass("btn-outline-danger opacity-5 btn-rounded mx-2");
          $('.previous').addClass("btn-outline-danger btn-rounded mx-2");
          $('.next').addClass("btn-outline-danger btn-rounded mx-2");
          $('a.btn').addClass("btn-rounded");
          },
          "language": {
          
              "sProcessing":     "Procesando...",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla",
              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix":    "",
              "sSearch":         "Buscar:",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
                  "sFirst":    "Primero",
                  "sLast":     "Último",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
              },
              "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }
          
          }
        });

        $('#table_aprobado').DataTable({
          "drawCallback": function( settings ) {
          $('.current').addClass("btn bg-gradient-danger btn-rounded").removeClass("paginate_button");
          $('.paginate_button').addClass("btn").removeClass("paginate_button");
          $('.dataTables_length').addClass("m-4");
          $('.dataTables_info').addClass("mx-4");
          $('.dataTables_filter').addClass("m-4");
          $('input').addClass("form-control");
          $('select').addClass("form-control");
          $('.previous.disabled').addClass("btn-outline-danger opacity-5 btn-rounded mx-2");
          $('.next.disabled').addClass("btn-outline-danger opacity-5 btn-rounded mx-2");
          $('.previous').addClass("btn-outline-danger btn-rounded mx-2");
          $('.next').addClass("btn-outline-danger btn-rounded mx-2");
          $('a.btn').addClass("btn-rounded");
          },
          "language": {
          
              "sProcessing":     "Procesando...",
              "sLengthMenu":     "Mostrar _MENU_ registros",
              "sZeroRecords":    "No se encontraron resultados",
              "sEmptyTable":     "Ningún dato disponible en esta tabla",
              "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix":    "",
              "sSearch":         "Buscar:",
              "sUrl":            "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
                  "sFirst":    "Primero",
                  "sLast":     "Último",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
              },
              "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }
          
          }
        });
      });
    </script>
html;

      $pruebas_validos = PruebasCovidUsuariosDao::contarPruebasValidos();
      foreach ($pruebas_validos[0] as $key => $value) {
        $numero_validos = $value;
      }

      $asistentes_total = PruebasCovidUsuariosDao::contarAsistentes();
      foreach ($asistentes_total[0] as $key => $value) {
        $numero_asistentes = $value;
      }

      $pruebas_total = PruebasCovidUsuariosDao::contarPruebasTotales();
      foreach ($pruebas_total[0] as $key => $value) {
        $numero_pruebas = $value;
      }

      $pruebas_sin_revisar = PruebasCovidUsuariosDao::contarPruebasPorRevisar();
      foreach ($pruebas_sin_revisar[0] as $key => $value) {
        $numero_sin_revisar = $value;
      }

      $permisoGlobalHidden = (Controller::getPermisoGlobalUsuario($this->__usuario)[0]['permisos_globales']) != 1 ? "style=\"display:none;\"" : "";
      $asistentesHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_asistentes", 1) == 0) ? "style=\"display:none;\"" : "";
      $vuelosHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_vuelos", 1) == 0) ? "style=\"display:none;\"" : "";
      $pickUpHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_pickup", 1) == 0) ? "style=\"display:none;\"" : "";
      $habitacionesHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_habitaciones", 1) == 0) ? "style=\"display:none;\"" : "";
      $cenasHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_cenas", 1) == 0) ? "style=\"display:none;\"" : "";
      $cenasHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_cenas", 1) == 0) ? "style=\"display:none;\"" : "";
      $aistenciasHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_asistencias", 1) == 0) ? "style=\"display:none;\"" : "";
      $vacunacionHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_vacunacion", 1) == 0) ? "style=\"display:none;\"" : "";
      $pruebasHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_pruebas_covid", 1) == 0) ? "style=\"display:none;\"" : "";
      $configuracionHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_configuracion", 1) == 0) ? "style=\"display:none;\"" : "";
      $utileriasHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_utilerias", 1) == 0) ? "style=\"display:none;\"" : "";
 
      View::set('permisoGlobalHidden', $permisoGlobalHidden);
      View::set('asistentesHidden', $asistentesHidden);
      View::set('vuelosHidden', $vuelosHidden);
      View::set('pickUpHidden', $pickUpHidden);
      View::set('habitacionesHidden', $habitacionesHidden);
      View::set('cenasHidden', $cenasHidden);
      View::set('aistenciasHidden', $aistenciasHidden);
      View::set('vacunacionHidden', $vacunacionHidden);
      View::set('pruebasHidden', $pruebasHidden);
      View::set('configuracionHidden', $configuracionHidden);
      View::set('utileriasHidden', $utileriasHidden);

      View::set('pruebas',$pruebas);
      View::set('numero_sin_revisar',$numero_sin_revisar);
      View::set('numero_pruebas',$numero_pruebas);
      View::set('numero_asistentes',$numero_asistentes);
      View::set('numero_validos',$numero_validos);
      View::set('tabla',$tabla);
      View::set('tabla_no_v',$tabla_no_v);
      View::set('tabla_rechazados',$tabla_rechazados);
      View::set('header',$this->_contenedor->header($extraHeader));
      View::set('footer',$this->_contenedor->footer($extraFooter));
      View::render("pruebascovidusuarios_all");
    }

    public function Validar(){

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $documento = new \stdClass();

          $id_prueba_covid = $_POST['id_prueba_covid'];
          $id_asistente = $_POST['id_asistente'];

          $documento->_id_prueba_covid = $id_prueba_covid;
          $documento->_id_asistente = $id_asistente;
          

          $id = PruebasCovidUsuariosDao::validar($documento);

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

        $documento = new \stdClass();

        $id_prueba_covid = $_POST['id_prueba_covid'];
        $id_asistente = $_POST['id_asistente'];

        $documento->_id_prueba_covid = $id_prueba_covid;
        $documento->_id_asistente = $id_asistente;

          $id = PruebasCovidUsuariosDao::rechazar($documento);

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

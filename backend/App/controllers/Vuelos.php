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

     $extraFooter =<<<html

          <!-- jQuery -->
            <script src="/js/jquery.min.js"></script>
            <!--   Core JS Files   -->
            <script src="/assets/js/core/popper.min.js"></script>
            <script src="/assets/js/core/bootstrap.min.js"></script>
            <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
            <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
            <!-- Kanban scripts -->
            <script src="/assets/js/plugins/dragula/dragula.min.js"></script>
            <script src="/assets/js/plugins/jkanban/jkanban.js"></script>
            <script src="/assets/js/plugins/chartjs.min.js"></script>
            <script src="/assets/js/plugins/threejs.js"></script>
            <script src="/assets/js/plugins/orbit-controls.js"></script>
            
          <!-- Github buttons -->
            <script async defer src="https://buttons.github.io/buttons.js"></script>
          <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
            <script src="/assets/js/soft-ui-dashboard.min.js?v=1.0.5"></script>

          <!-- VIEJO INICIO -->
            <script src="/js/jquery.min.js"></script>
          
            <script src="/js/custom.min.js"></script>

            <script src="/js/validate/jquery.validate.js"></script>
            <script src="/js/alertify/alertify.min.js"></script>
            <script src="/js/login.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          <!-- VIEJO FIN -->
   <script>
    $( document ).ready(function() {

          $("#form_vuelo_uno").on("submit",function(event){
              event.preventDefault();
              
                  var formData = new FormData(document.getElementById("form_vuelo_uno"));
                  for (var value of formData.values()) 
                  {
                     console.log(value);
                  }
                  $.ajax({
                      url:"/Vuelos/uploadVueloUno",
                      type: "POST",
                      data: formData,
                      cache: false,
                      contentType: false,
                      processData: false,
                      beforeSend: function(){
                      console.log("Procesando....");
                  },
                  success: function(respuesta){
                      if(respuesta == 'success'){
                         // $('#modal_payment_ticket').modal('toggle');
                         
                          swal("¡El vuelo se Cargo Correctamente!", "", "success").
                          then((value) => {
                              window.location.replace("/Vuelos/");
                          });
                      }
                      console.log(respuesta);
                  },
                  error:function (respuesta)
                  {
                      console.log(respuesta);
                  }
              });
          });

      });
</script>

html;

     $vuelos = VuelosDao::getAllLlegada();
     $tabla= '';
     foreach ($vuelos as $key => $value) {
            $tabla.= <<<html
            <tr>
                 <td>
                      <div class="d-flex px-3 py-1">
                          <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm"><span class="fa fa-user-md" style="font-size: 13px"></span> {$value['nombre']} <span class="badge badge-sm bg-gradient-success"> Activo</span></h6>
                              <p class="text-sm font-weight-bold text-secondary mb-0"><span class="fa fa-calendar" style="font-size: 13px"></span> {$value['fecha_alta']}</p>
                              <p class="text-sm mb-0"><span class="fa fa-plane" style="color: #125a16; font-size: 13px"></span> {$value['aeropuerto_llegada']}</p>
                              <p class="text-sm mb-0"><span class="fa fa-flag" style="color: #353535; font-size: 13px"></span> {$value['aeropuerto_salida']}</p>
                              <p class="text-sm mb-0"><span class="fa fa-ticket" style="color: #1a8fdd; font-size: 13px"></span> Número de Vuelo: <strong>{$value['numero_vuelo']}</strong></p>
                              <p class="text-sm mb-0"><span class="fa fa-clock-o" font-size: 13px"></span> Hora Estimada de Llegada: {$value['hora_llegada_destino']}</p>
                              <hr>
                              <p class="text-sm font-weight-bold text-secondary mb-0"><span class="fa fa-sticky-note" style="font-size: 13px"></span> {$value['nota']}</p>
                          </div>
                      </div>
                 </td>
                 <td>
                      <div class="d-flex px-3 py-1">
                          <div class="d-flex flex-column justify-content-center">
                              <u><a href="mailto:{$value['email']}"><h6 class="mb-0 text-sm"><span class="fa fa-mail-bulk" style="font-size: 13px"></span> {$value['email']}</h6></a></u>
                              <u><a href="https://api.whatsapp.com/send?phone=52{$value['telefono']}&text=Buen%20d%C3%ADa,%20te%20contacto%20de%20parte%20del%20Equipo%20Grupo%20LAHE%20%F0%9F%98%80" target="_blank"><p class="text-sm font-weight-bold text-secondary mb-0"><span class="fa fa-whatsapp" style="font-size: 13px; color:green;"></span> {$value['telefono']}</p></a></u>
                          </div>
                      </div>
                 </td>
                 <td class="align-middle text-center text-sm">
                     <p class="text-sm font-weight-bold mb-0 text-dark">{$value['nombre_registro']}</p>
                 </td>
                <td style="text-align:center; vertical-align:middle;">
                    <a href="Detalles/{$value['clave']}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Ver .PDF Pase de Abordar"><i class="fa fa-eye"></i></a>
                </td>
                 
            </tr>
html;
        }

     $vuelos = VuelosDao::getAllSalida();
     $tabla1= '';
     foreach ($vuelos as $key => $value) {
            $tabla1.= <<<html
            <tr>
                 <td>
                      <div class="d-flex px-3 py-1">
                          <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm"><span class="fa fa-user-md" style="font-size: 13px"></span> {$value['nombre']} <span class="badge badge-sm bg-gradient-success"> Activo</span> </h6>
                              <p class="text-sm font-weight-bold text-secondary mb-0"><span class="fa fa-calendar" style="font-size: 13px"></span> {$value['fecha_alta']}</p>
                              <p class="text-sm mb-0"><span class="fa fa-plane" style="color: #125a16; font-size: 13px"></span> {$value['aeropuerto_llegada']}</p>
                              <p class="text-sm mb-0"><span class="fa fa-flag" style="color: #353535; font-size: 13px"></span> {$value['aeropuerto_salida']}</p>
                              <p class="text-sm mb-0"><span class="fa fa-ticket" style="color: #1a8fdd; font-size: 13px"></span> Número de Vuelo: <strong>{$value['numero_vuelo']}</strong></p>
                              <p class="text-sm mb-0"><span class="fa fa-clock-o" font-size: 13px"></span> Hora Estimada de Llegada: {$value['hora_llegada_destino']}</p>
                              <hr>
                              <p class="text-sm font-weight-bold text-secondary mb-0"><span class="fa fa-sticky-note" style="font-size: 13px"></span> {$value['nota']}</p>
                          </div>
                      </div>
                 </td>
                 <td>
                      <div class="d-flex px-3 py-1">
                          <div class="d-flex flex-column justify-content-center">
                              <u><a href="mailto:{$value['email']}"><h6 class="mb-0 text-sm"><span class="fa fa-mail-bulk" style="font-size: 13px"></span> {$value['email']}</h6></a></u>
                              <u><a href="https://api.whatsapp.com/send?phone=52{$value['telefono']}&text=Buen%20d%C3%ADa,%20te%20contacto%20de%20parte%20del%20Equipo%20Grupo%20LAHE%20%F0%9F%98%80" target="_blank"><p class="text-sm font-weight-bold text-secondary mb-0"><span class="fa fa-whatsapp" style="font-size: 13px; color:green;"></span> {$value['telefono']}</p></a></u>
                          </div>
                      </div>
                 </td>
                 <td class="align-middle text-center text-sm">
                     <p class="text-sm font-weight-bold mb-0 text-dark">{$value['nombre_registro']}</p>
                 </td>
                <td style="text-align:center; vertical-align:middle;">
                    <a href="Detalles/{$value['clave']}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Ver .PDF Pase de Abordar"><i class="fa fa-eye"></i></a>
                </td>
                 
            </tr>
html;
        }

     $totalvuelos = '';
     foreach (VuelosDao::getCountVuelos() as $key => $value)
     {
         $totalvuelos  = $value['usuarios'];
     }

     $totalvueloscargadosllegada = '';
     foreach (VuelosDao::getCountVuelosLlegada() as $key => $value)
     {
         $totalvueloscargadosllegada  = $value['total'];
     }

     $totalvueloscargadossalida = '';
     foreach (VuelosDao::getCountVuelosSalida() as $key => $value)
     {
         $totalvueloscargadossalida  = $value['total'];
     }

     $permisoGlobalHidden = (Controller::getPermisoGlobalUsuario($this->__usuario)[0]['permisos_globales']) == 0 ? "style=\"display:none;\"" : "";
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

     View::set('idAsistente',$this->getAsistentes());
     View::set('idAeropuertoOrigen',$this->getAeropuertosOrigen());
     View::set('idAeropuertoDestino',$this->getAeropuertosDestino());
     View::set('tabla',$tabla);
     View::set('tabla1',$tabla1);
     View::set('totalvuelos',$totalvuelos);
     View::set('totalvueloscargadossalida',$totalvueloscargadossalida);
     View::set('totalvueloscargadosllegada',$totalvueloscargadosllegada);
     View::set('header',$this->_contenedor->header($extraHeader));
     View::set('footer',$extraFooter);
     View::render("vuelos_all");
    }

    public function uploadVueloUno(){

        $documento = new \stdClass();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $utilerias_asistentes_id = $_POST['id_asistente'];
            $documento->_utilerias_asistentes_id = $utilerias_asistentes_id;

            $utilerias_administradores_id = $_POST["user_"];
            $documento->_utilerias_administradores_id = $utilerias_administradores_id;

            $clave = $this->generateClave();
            $documento->_clave = $clave;

            $id_aeropuerto_origen = $_POST['id_origen'];
            $documento->_id_aeropuerto_origen = $id_aeropuerto_origen;

            $id_aeropuerto_destino = $_POST['id_destino'];
            $documento->_id_aeropuerto_destino = $id_aeropuerto_destino;

            $numero_vuelo = $_POST['numero_vuelo'];
            $documento->_numero_vuelo = $numero_vuelo;

            $hora_llegada = $_POST['hora_llegada'];
            $documento->_hora_llegada = $hora_llegada;

            $file = $_FILES["file_"];
            $pdf = $this->generateRandomString();
            move_uploaded_file($file["tmp_name"], "comprobante_vuelo_uno/".$pdf.'.pdf');

            $documento->_url = $pdf.'.pdf';

            $notas = $_POST['notas'];
            if($notas == '')
            {
                $notas = 'Sin Notas';
                $documento->_notas = $notas;
            }
            else
            {
                $notas = $_POST['notas'];
                $documento->_notas = $notas;
            }

            $id = VuelosDao::insert($documento);

            if ($id) {
                echo 'success';

            } else {
                echo 'fail';
            }
        } else {
            echo 'fail REQUEST';
        }
    }

    function generateRandomString($length = 10) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

    function generateClave($length = 6) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

    public function getAsistentes(){
        $asistentes = '';
        foreach (VuelosDao::getAsistenteNombre() as $key => $value) {
            $asistentes .=<<<html
      <option value="{$value['id_registro_acceso']}"> {$value['nombre']}</option>
html;
        }
        return $asistentes;
    }

    public function getAeropuertosOrigen(){
        $aeropuertos = '';
        foreach (VuelosDao::getAeropuertoOrigen() as $key => $value) {
            $aeropuertos .=<<<html
      <option value="{$value['id_aeropuerto']}"> {$value['iata']} - {$value['aeropuerto']}</option>
html;
        }
        return $aeropuertos;
    }

    public function getAeropuertosDestino(){
        $aeropuertos = '';
        foreach (VuelosDao::getAeropuertoDestino() as $key => $value) {
            $aeropuertos .=<<<html
      <option value="{$value['id_aeropuerto']}"> {$value['iata']} - {$value['aeropuerto']}</option>
html;
        }
        return $aeropuertos;
    }

}

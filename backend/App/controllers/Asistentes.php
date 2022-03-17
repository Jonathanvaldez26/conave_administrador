<?php
namespace App\controllers;
//defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\MasterDom;
use \App\controllers\Contenedor;
use \Core\Controller;
use \App\models\Colaboradores AS ColaboradoresDao;
use \App\models\Accidentes AS AccidentesDao;
use \App\models\General AS GeneralDao;
use \App\models\Pases AS PasesDao;
use \App\models\PruebasCovidUsuarios AS PruebasCovidUsuariosDao;
use \App\models\ComprobantesVacunacion AS ComprobantesVacunacionDao;
use \App\models\Asistentes AS AsistentesDao;

use Generator;

class Asistentes extends Controller{

    private $_contenedor;

    function __construct(){
        parent::__construct();
        $this->_contenedor = new Contenedor;
        View::set('header',$this->_contenedor->header());
        View::set('footer',$this->_contenedor->footer());
        if(Controller::getPermisosUsuario($this->__usuario, "seccion_asistentes",1) == 0)
          header('Location: /Principal/');
    }

    public function index() {

        
        $user = GeneralDao::getDatosUsuarioLogeado($this->__usuario);
        $asistentes = GeneralDao::getAllColaboradores();
        $filtros = "";
        if($_POST != "")
            //$filtros = $this->getFiltro($post);

        ///////////////////////////////////////////////////////
        // var_dump($user);
        // var_dump($asistentes);
        View::set('tabla',$this->getAllColaboradoresAsignados());
        View::set('header',$this->_contenedor->header($this->getHeader()));
        View::set('footer',$this->_contenedor->footer($this->getFooter()));
        View::render("asistentes_all");

    }

    public function Detalles($id) {

        $extraHeader = <<<html
        <title>
            Detalles
        </title>

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link href="Content/jquery.Jcrop.css" rel="stylesheet" />
        <style>
        .select2-container--default .select2-selection--single {
        height: 38px!important;
        border-radius: 8px!important;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #444;
            line-height: 32px;
        }
        .select2-container--default.select2-container--focus .select2-selection--multiple {
           // height: 38px!important;
            border-radius: 8px!important;
        }
        
        // .select2-container--default .select2-selection--multiple {
        //     height: 38px!important;
        //     border-radius: 8px!important;
        // }
        </style>

        

html;

        $extraFooter = <<<html
            <!--Select 2-->
            <script src="/js/jquery.min.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <!--   Core JS Files   -->
            <script src="../../../assets/js/core/popper.min.js"></script>
            <script src="../../../assets/js/core/bootstrap.min.js"></script>
            <script src="../../../assets/js/plugins/perfect-scrollbar.min.js"></script>
            <script src="../../../assets/js/plugins/smooth-scrollbar.min.js"></script>
            <!-- Kanban scripts -->
            <script src="../../../assets/js/plugins/dragula/dragula.min.js"></script>
            <script src="../../../assets/js/plugins/jkanban/jkanban.js"></script>
            <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
            </script>
            <!-- Github buttons -->
            <script async defer src="https://buttons.github.io/buttons.js"></script>
            <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
            <script src="../../../assets/js/soft-ui-dashboard.min.js?v=1.0.5"></script>
            <script src="../../../assets/js/plugins/choices.min.js"></script>
            <script type="text/javascript" wfd-invisible="true">
                if (document.getElementById('choices-button')) {
                    var element = document.getElementById('choices-button');
                    const example = new Choices(element, {});
                }
                var choicesTags = document.getElementById('choices-tags');
                var color = choicesTags.dataset.color;
                if (choicesTags) {
                    const example = new Choices(choicesTags, {
                    delimiter: ',',
                    editItems: true,
                    maxItemCount: 5,
                    removeItemButton: true,
                    addItems: true,
                    classNames: {
                        item: 'badge rounded-pill choices-' + color + ' me-2'
                    }
                    });
                }
            </script>
            <script src="/js/jquery.min.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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

            <script>
                $(document).ready(function() {
                    // $('#select_alergico').select2();
                });
            </script>

            <!-- VIEJO INICIO -->
            <script src="/js/jquery.min.js"></script>
        
            <script src="/js/custom.min.js"></script>

            <script src="/js/validate/jquery.validate.js"></script>
            <script src="/js/alertify/alertify.min.js"></script>
            <script src="/js/login.js"></script>
            <!-- VIEJO FIN -->
html;
        $detalles = AsistentesDao::getById($id);
        $detalles_registro = AsistentesDao::getTotalById($id);

        if ($detalles_registro[0]['img'] == '') {
        $img_asistente =<<<html
            <img src="/img/user.png" class="avatar avatar-xxl me-3" title="{$detalles_registro[0]['usuario']}" alt="{$detalles_registro[0]['usuario']}">
html;
        } else {
        $img_asistente =<<<html
            <img src="/img/users_conave/{$detalles_registro[0]['img']}" class="avatar avatar-xxl me-3" title="{$detalles_registro[0]['usuario']}" alt="{$detalles_registro[0]['usuario']}">
html;
        }

        if ($detalles_registro[0]['alergias'] == 'otro'){
            $alergias_a = <<<html
            <div class="col-md-4">
                <label class="form-label mt-4">Alergias *</label>
                <input class="form-control" name="alergias" id="alergias" maxlength="149" name="alergias" data-color="dark" type="text" value="{$detalles_registro[0]['alergias']}" placeholder="" />
            
                <label class="form-label mt-4">Alergias Otro *</label>
                <input class="form-control" name="alergias_otro" id="alergias_otro" maxlength="149" name="alergias" data-color="dark" type="text" value="<?= {$detalles_registro[0]['alergias']} ?>" placeholder="" />
            </div>
html;
        } else {
            $alergias_a = <<<html
            <div class="col-md-4">
                <label class="form-label mt-4">Alergias *</label>
                <input class="form-control" name="alergias" id="alergias" maxlength="149" name="alergias" data-color="dark" type="text" value="{$detalles_registro[0]['alergias']}" placeholder="" />
            
                <label class="form-label mt-4">Alergias Otro *</label>
                <input class="form-control" name="alergias_otro" id="alergias_otro" maxlength="149" name="alergias" data-color="dark" type="text" value="{$detalles_registro[0]['alergias_otro']}" placeholder="" />
            </div>
html;
        }

        if ($detalles_registro[0]['alergia_medicamento'] == '') {
            $alergia_medicamento_cual = <<<html
            <div class="col-md-4 col-sm-12">
                <label class="form-label mt-4">¿Es usted alérgico a un medicamento?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="confirm_alergia" id="confirm_alergia_si" value="si">
                    <label class="form-check-label" for="confirm_alergia_si">
                        Si
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="confirm_alergia" id="confirm_alergia_no" value="no" checked>
                    <label class="form-check-label" for="confirm_alergia_no">
                        No
                    </label>
                </div>
                <div class="col-md-12 col-sm-12 medicamento_cual" style="display: none!important;">
                    <label class="form-label mt-4">
                        ¿Cual?
                        </label>
                    <input id="alergia_medicamento_cual" name="alergia_medicamento_cual" maxlength="29" pattern="[a-zA-Z0-9]*" class="form-control" type="text" placeholder="Escriba a que medicamento es alérgico" value="">
                </div>
            </div>
html;
        } else {
            if ($detalles_registro[0]['alergia_medicamento'] == 'si') {
                $alergia_medicamento_cual = <<<html
                <div class="col-md-4 col-sm-12">
                    <label class="form-label mt-4">¿Es usted alérgico a un medicamento?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="confirm_alergia" id="confirm_alergia_si" value="si" checked>
                        <label class="form-check-label" for="confirm_alergia_si">
                            Si
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="confirm_alergia" id="confirm_alergia_no" value="no">
                        <label class="form-check-label" for="confirm_alergia_no">
                            No
                        </label>
                    </div>
                    <div class="col-md-12 col-sm-12 medicamento_cual" >
                        <label class="form-label mt-4">
                            ¿Cual?
                            </label>
                        <input id="alergia_medicamento_cual" name="alergia_medicamento_cual" maxlength="29" pattern="[a-zA-Z0-9]*" class="form-control" type="text" placeholder="Escriba a que medicamento es alérgico" value="{$detalles_registro[0]['alergia_medicamento_cual']}">
                    </div>
                </div>
    html;
            } else {
                $alergia_medicamento_cual = <<<html
                <div class="col-md-4 col-sm-12">
                    <label class="form-label mt-4">¿Es usted alérgico a un medicamento?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="confirm_alergia" id="confirm_alergia_si" value="si">
                        <label class="form-check-label" for="confirm_alergia_si">
                            Si
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="confirm_alergia" id="confirm_alergia_no" value="no" checked>
                        <label class="form-check-label" for="confirm_alergia_no">
                            No
                        </label>
                    </div>
                    <div class="col-md-12 col-sm-12 medicamento_cual" style="display: none!important;">
                        <label class="form-label mt-4">
                            ¿Cual?
                            </label>
                        <input id="alergia_medicamento_cual" name="alergia_medicamento_cual" maxlength="29" pattern="[a-zA-Z0-9]*" class="form-control" type="text" placeholder="Escriba a que medicamento es alérgico" value="{$detalles_registro[0]['alergia_medicamento_cual']}">
                    </div>
                </div>
    html;
            }
        }

        if ($detalles_registro[0]['restricciones_alimenticias'] == '') {
            $res_alimenticias = <<<html
            <div class="col-md-4 col-sm-12">
                <label class="form-label mt-4">Restricciones Alimentarias *</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="restricciones_alimenticias" id="res_ali_1" value="vegetariano">
                    <label class="form-check-label" for="res_ali_1">
                        Vegetariano
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="restricciones_alimenticias" id="res_ali_2" value="vegano">
                    <label class="form-check-label" for="res_ali_2">
                        Vegano
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="restricciones_alimenticias" id="res_ali_4" value="ninguna" checked>
                    <label class="form-check-label" for="res_ali_4">
                        Ninguna
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="restricciones_alimenticias" id="res_ali_5" value="otro">
                    <label class="form-check-label" for="res_ali_5">
                        Otro
                    </label>
                </div>
                <div class="col-md-12 col-sm-12 restricciones_alimenticias" style="display: none!important;">
                    <label class="form-label mt-4">¿Cual?</label>
                    <input id="restricciones_alimenticias_cual" name="restricciones_alimenticias_cual" maxlength="45" class="form-control" type="text" placeholder="Escriba su restricción" value="">
                </div>
            </div>
html;
        }  else {
            if ($detalles_registro[0]['restricciones_alimenticias'] == 'otro') {
                $res_alimenticias = <<<html
            <div class="col-md-4 col-sm-12">
                <label class="form-label mt-4">Restricciones Alimentarias *</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="restricciones_alimenticias" id="res_ali_1" value="vegetariano">
                    <label class="form-check-label" for="res_ali_1">
                        Vegetariano
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="restricciones_alimenticias" id="res_ali_2" value="vegano">
                    <label class="form-check-label" for="res_ali_2">
                        Vegano
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="restricciones_alimenticias" id="res_ali_4" value="ninguna" >
                    <label class="form-check-label" for="res_ali_4">
                        Ninguna
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="restricciones_alimenticias" id="res_ali_5" value="otro" checked>
                    <label class="form-check-label" for="res_ali_5">
                        Otro
                    </label>
                </div>
                <div class="col-md-12 col-sm-12 restricciones_alimenticias" >
                    <label class="form-label mt-4">¿Cual?</label>
                    <input id="restricciones_alimenticias_cual" name="restricciones_alimenticias_cual" maxlength="45" class="form-control" type="text" placeholder="Escriba su restricción" value="{$detalles_registro[0]['restricciones_alimenticias_cual']}">
                </div>
            </div>
html;
            }

            if ($detalles_registro[0]['restricciones_alimenticias'] == 'ninguna') {
                $res_alimenticias = <<<html
            <div class="col-md-4 col-sm-12">
                <label class="form-label mt-4">Restricciones Alimentarias *</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="restricciones_alimenticias" id="res_ali_1" value="vegetariano">
                    <label class="form-check-label" for="res_ali_1">
                        Vegetariano
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="restricciones_alimenticias" id="res_ali_2" value="vegano">
                    <label class="form-check-label" for="res_ali_2">
                        Vegano
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="restricciones_alimenticias" id="res_ali_4" value="ninguna" checked>
                    <label class="form-check-label" for="res_ali_4">
                        Ninguna
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="restricciones_alimenticias" id="res_ali_5" value="otro" >
                    <label class="form-check-label" for="res_ali_5">
                        Otro
                    </label>
                </div>
                <div class="col-md-12 col-sm-12 restricciones_alimenticias" style="display: none!important;">
                    <label class="form-label mt-4">¿Cual?</label>
                    <input id="restricciones_alimenticias_cual" name="restricciones_alimenticias_cual" maxlength="45" class="form-control" type="text" placeholder="Escriba su restricción" value="{$detalles_registro[0]['restricciones_alimenticias_cual']}">
                </div>
            </div>
html;
            }

            if ($detalles_registro[0]['restricciones_alimenticias'] == 'vegano') {
                $res_alimenticias = <<<html
            <div class="col-md-4 col-sm-12">
                <label class="form-label mt-4">Restricciones Alimentarias *</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="restricciones_alimenticias" id="res_ali_1" value="vegetariano">
                    <label class="form-check-label" for="res_ali_1">
                        Vegetariano
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="restricciones_alimenticias" id="res_ali_2" value="vegano" checked>
                    <label class="form-check-label" for="res_ali_2">
                        Vegano
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="restricciones_alimenticias" id="res_ali_4" value="ninguna" >
                    <label class="form-check-label" for="res_ali_4">
                        Ninguna
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="restricciones_alimenticias" id="res_ali_5" value="otro" >
                    <label class="form-check-label" for="res_ali_5">
                        Otro
                    </label>
                </div>
                <div class="col-md-12 col-sm-12 restricciones_alimenticias" style="display: none!important;">
                    <label class="form-label mt-4">¿Cual?</label>
                    <input id="restricciones_alimenticias_cual" name="restricciones_alimenticias_cual" maxlength="45" class="form-control" type="text" placeholder="Escriba su restricción" value="{$detalles_registro[0]['restricciones_alimenticias_cual']}">
                </div>
            </div>
html;
            }

            if ($detalles_registro[0]['restricciones_alimenticias'] == 'vegetariano') {
                $res_alimenticias = <<<html
            <div class="col-md-4 col-sm-12">
                <label class="form-label mt-4">Restricciones Alimentarias *</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="restricciones_alimenticias" id="res_ali_1" value="vegetariano" checked>
                    <label class="form-check-label" for="res_ali_1">
                        Vegetariano
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="restricciones_alimenticias" id="res_ali_2" value="vegano">
                    <label class="form-check-label" for="res_ali_2">
                        Vegano
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="restricciones_alimenticias" id="res_ali_4" value="ninguna" >
                    <label class="form-check-label" for="res_ali_4">
                        Ninguna
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="restricciones_alimenticias" id="res_ali_5" value="otro" >
                    <label class="form-check-label" for="res_ali_5">
                        Otro
                    </label>
                </div>
                <div class="col-md-12 col-sm-12 restricciones_alimenticias" style="display: none!important;">
                    <label class="form-label mt-4">¿Cual?</label>
                    <input id="restricciones_alimenticias_cual" name="restricciones_alimenticias_cual" maxlength="45" class="form-control" type="text" placeholder="Escriba su restricción" value="{$detalles_registro[0]['restricciones_alimenticias_cual']}">
                </div>
            </div>
html;
            }


        }

        View::set('id_asistente',$id);
        View::set('detalles',$detalles[0]);
        View::set('img_asistente',$img_asistente);
        View::set('alergias_a',$alergias_a);
        View::set('res_alimenticias',$res_alimenticias);
        View::set('alergia_medicamento_cual',$alergia_medicamento_cual);
        View::set('detalles_registro',$detalles_registro[0]);
        View::set('header',$this->_contenedor->header($extraHeader));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("asistentes_detalles");

    }

    public function Actualizar(){


        $documento = new \stdClass();


          if ($_SERVER['REQUEST_METHOD'] == 'POST') {

              $id_registro = $_POST['id_registro'];
              $nombre = $_POST['nombre'];
              $segundo_nombre = $_POST['segundo_nombre'];
              $apellido_paterno = $_POST['apellido_paterno'];
              $apellido_materno = $_POST['apellido_materno'];
              $fecha_nacimiento = $_POST['fecha_nacimiento'];
              $email = $_POST['email'];
              $telefono = $_POST['telefono'];
              $alergias = $_POST['select_alergico'];
              $alergias_otro = $_POST['alergias_otro'];
              $alergia_medicamento = $_POST['confirm_alergia'];
                if (isset($_POST['alergia_medicamento_cual'])) {
                    $alergia_medicamento_cual = $_POST['alergia_medicamento_cual'];
                } else {
                    $alergia_medicamento_cual = '';
                }
              $alergia_medicamento_cual = $_POST['alergia_medicamento_cual'];
              $restricciones_alimenticias = $_POST['restricciones_alimenticias'];
              $restricciones_alimenticias_cual = $_POST['restricciones_alimenticias_cual'];

              $documento->_nombre = $nombre;
              $documento->_segundo_nombre = $segundo_nombre;
              $documento->_apellido_paterno = $apellido_paterno;
              $documento->_apellido_materno = $apellido_materno;
              $documento->_fecha_nacimiento = $fecha_nacimiento;
              $documento->_email = $email;
              $documento->_telefono = $telefono;
              $documento->_alergias = $alergias;
              $documento->_alergias_otro = $alergias_otro;
              $documento->_alergia_medicamento = $alergia_medicamento;
              $documento->_alergia_medicamento_cual = $alergia_medicamento_cual;
              $documento->_restricciones_alimenticias = $restricciones_alimenticias;
              $documento->_restricciones_alimenticias_cual = $restricciones_alimenticias_cual;

              $id = AsistentesDao::update($documento);

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

    public function getAllColaboradoresAsignados(){

        $html = "";
        $personal = '';
        $pase = '';
        foreach (GeneralDao::getAllColaboradores() as $key => $value) {
            if($value['alergias'] == '' && $value['alergias_otro'] == '' ){
                $alergia = 'No registro alergias';
            }else{
                if ($value['alergias'] == 'otro') {
                    $alergia = $value['alergias_otro'];
                } else {
                    $alergia = $value['alergias'];
                }
            }
            
            if($value['alergia_medicamento'] == 'si'){
                if($value['alergia_medicamento_cual'] == ''){
                    $alergia_medicamento = 'No registro alergias a medicamentos';
                }else{
                    $alergia_medicamento = $value['alergia_medicamento_cual'];
                }
            }else{
                $alergia_medicamento = 'No posee ninguna alergia';
            }
            
            

            if($value['restricciones_alimenticias'] == 'ninguna' || $value['restricciones_alimenticias'] == ''){
                $restricciones_alimenticias = 'No registro restricciones alimenticias';
            }else{
                if ($value['restricciones_alimenticias'] == 'otro') {
                    $restricciones_alimenticias = $value['restricciones_alimenticias_cual'];
                } else {
                    $restricciones_alimenticias = $value['restricciones_alimenticias'];
                }
            }

            

            $value['apellido_paterno'] = utf8_encode($value['apellido_paterno']);
            $value['apellido_materno'] = utf8_encode($value['apellido_materno']);
            $value['nombre'] = utf8_encode($value['nombre']);

            if(empty($value['img']) || $value['img'] == null){
                $img_user = "/img/user.png";
            }else{
                $img_user = "/img/users_conave/{$value['img']}";
            }

            $pases = PasesDao::getByIdUser($value['utilerias_asistentes_id']);
            $cont_pase_ida = 0;
            $cont_pase_regreso = 0;
            foreach($pases as $key => $pas){

                if($pases >= 1){

                    if($pas['tipo'] == 1){
                        $cont_pase_ida ++;
                        
                        if($pas['status'] == 1){
                            
                            $pase_ida = '<p class="text-sm font-weight-bold mb-0 " style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Documento validado"><span class="fa fa-plane-departure" style=" font-size: 13px;"></span> Regreso (<i class="fa fa-solid fa-check" style="color: green;"></i>)</p> ';
                        }else{
                            $pase_ida = '<p class="text-sm font-weight-bold mb-0 " style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Documento pendiente de validar"><span class="fa fa-plane-departure" style="font-size: 13px;"></span> Regreso (<i class="fa fa-solid fa-hourglass-end" style="color: #1a8fdd;"></i>)</p> ';
                        }
                        
                    }elseif($pas['tipo'] == 2){
                        $cont_pase_regreso ++;

                        if($pas['status'] == 1){
                            
                            $pase_regreso = '<p class="text-sm font-weight-bold mb-0 " style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Documento validado"><span class="fa fa-plane-arrival" style=" font-size: 13px;"></span> Llegada (<i class="fa fa-solid fa-check" style="color: green;"></i>)</p>';
                        }else{
                            $pase_regreso = '<p class="text-sm font-weight-bold mb-0 " style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Documento pendiente de validar"><span class="fa fa-plane-arrival" style="font-size: 13px"></span> Llegada (<i class="fa fa-solid fa-hourglass-end" style="color: #1a8fdd;"></i>)</p>';
                        }
                     }
                }
               
            }

            if($cont_pase_regreso <= 0){
                $pase_regreso = '<p class="text-sm font-weight-bold mb-0 " style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Aún no se sube el documento"><span class="fa fa-plane-arrival" style="font-size: 13px"></span> Llegada (<i class="fas fa-times" style="color: #7B241C;"></i>)</p>';
            }

            if($cont_pase_ida <= 0){
                $pase_ida = '<p class="text-sm font-weight-bold mb-0 " style="cursor: pointer;"  data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Aún no se sube el documento"><span class="fa fa-plane-departure" style="font-size: 13px;"></span> Regreso (<i class="fas fa-times" style="color: #7B241C;"></i>)</p>';
            }

            

            $pruebacovid = PruebasCovidUsuariosDao::getByIdUser($value['utilerias_asistentes_id'])[0];

            
            if($pruebacovid){
                
                if($pruebacovid['status'] == 1){
                    $pru_covid = '<p class="text-sm font-weight-bold mb-0 " style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Documento validado"><span class="fa fas fa-virus" style="font-size: 13px;"></span> Prueba Covid (<i class="fa fa-solid fa-check" style="color: green;"></i>)</p>';
                }else {
                    $pru_covid = '<p class="text-sm font-weight-bold mb-0 " style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Documento pendiente de validar"><span class="fa fas fa-virus" style="font-size: 13px;"></span> Prueba Covid (<i class="fa fa-solid fa-hourglass-end" style="color: #1a8fdd;"></i>)</p>';
                }
                
            }else{
                $pru_covid = '<p class="text-sm font-weight-bold mb-0 " style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Aún no se sube el documento"><span class="fa fas fa-virus" style="font-size: 13px;"></span> Prueba Covid (<i class="fas fa-times" style="color:#7B241C;"></i>)</p>';
            }

            $comprobantecovid = ComprobantesVacunacionDao::getByIdUser($value['utilerias_asistentes_id'])[0];

            if($comprobantecovid){

                if($comprobantecovid['validado'] == 1){
                     
                    $compro_covid = '<p class="text-sm font-weight-bold mb-0 " style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Documento validado"><span class="fa fas fa-virus" style="font-size: 13px;"></span> Comprobante Covid (<i class="fa fa-solid fa-check" style="color: green;"></i>)</p>';
                }else{
                    
                    $compro_covid = '<p class="text-sm font-weight-bold mb-0 " style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Documento pendiente de validar"><span class="fa fas fa-virus" style="font-size: 13px;"></span> Comprobante Covid (<i class="fa fa-solid fa-hourglass-end" style="color:#1a8fdd;"></i>)</p>';
                }
               
               
            }else{
                $compro_covid = '<p class="text-sm font-weight-bold mb-0 " style="cursor: pointer;" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Aún no se sube el documento"><span class="fa fas fa-virus" style="font-size: 13px;"></span> Comprobante Covid  (<i class="fas fa-times" style="color: #7B241C;" ></i>)</p>';
                
            }

            $id_linea = $value['id_linea_principal'];
            $encargado = AsistentesDao::getEncargadoLinea($id_linea);
            // var_dump($encargado);
            $html .=<<<html
            <tr>
                <td>
                    <div class="d-flex px-3 py-1">
                        <div>
                            <img src="{$img_user}" class="avatar me-3" alt="image">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                    
                            <h6 class="mb-0 text-sm"><span class="fa fa-user-md" style="font-size: 13px"></span> {$value['nombre']} {$value['segundo_nombre']} {$value['apellido_paterno']} {$value['apellido_materno']}</h6>
                            <p class="text-sm font-weight-bold text-secondary mb-0"><span class="fas fa-envelope" style="font-size: 13px"></span> {$value['usuario']}</p>
                            <p class="text-sm mb-0"><span class="fa fa-solid fa-id-card" style="font-size: 13px;"></span>Numero de empleado:  <span style="text-decoration: underline;">{$value['numero_empleado']}</span></p>
                            <hr>
                            <p class="text-sm font-weight-bold mb-0 "><span class="fa fas fa-user-tie" style="font-size: 13px;"></span><b> Ejecutivo Asignado a Línea: </b><br>{$encargado['nombre']}</p>
                            
                        </div>
                    </div>
                </td>
         
          

                <td style="text-align:left; vertical-align:middle;"> 
                    
                    <p class="text-sm font-weight-bold mb-0 "><span class="fa fa-business-time" style="font-size: 13px;"></span><b> Bu: </b>{$value['nombre_bu']}</p>
                    <p class="text-sm font-weight-bold mb-0 "><span class="fa fa-pills" style="font-size: 13px;"></span><b> Linea Principal: </b>{$value['nombre_linea']}</p>
                    <p class="text-sm font-weight-bold mb-0 "><span class="fa fa-hospital" style="font-size: 13px;"></span><b> Posición: </b>{$value['nombre_posicion']}</p>

                    <!--hr>
                    <p class="text-sm font-weight-bold mb-0 "><span class="fas fa-egg-fried" style="font-size: 13px;"></span><b> Restricciones alimenticias: </b>{$value['restricciones_alimenticias']}</p>
                    
                    <p class="text-sm font-weight-bold mb-0 "><span class="fas fa-allergies" style="font-size: 13px;"></span><b> Alergias: </b>{$value['alergias']}{$value['alergias_otro']} <br>
                    {$value['alergia_medicamento_cual']}</p-->

                <hr>
                <p class="text-sm font-weight-bold mb-0 "><span class="fas fa-ban" style="font-size: 13px;"></span><b> Restricciones alimenticias: </b>{$restricciones_alimenticias}</p>
                
                <p class="text-sm font-weight-bold mb-0 "><span class="fas fa-allergies" style="font-size: 13px;"></span><b> Alergias:</b> {$alergia}

                <p class="text-sm font-weight-bold mb-0 "><span class="fas fa-pills" style="font-size: 13px;"></span><b> Alergias a medicamentos:</b> {$alergia_medicamento}

                <td>

        

          <td style="text-align:left; vertical-align:middle;"> 
            {$pase_ida}
            {$pase_regreso}
            <p class="text-sm font-weight-bold mb-0 "><span class="fa fa-solid fa-ticket" style="font-size: 13px;"></span> Ticket Virtual</p>
            {$pru_covid}
            {$compro_covid}  
          </td>
          
          <td style="text-align:center; vertical-align:middle;">
            <a href="/Asistentes/Detalles/{$value['utilerias_asistentes_id']}"><i class="fa fa-eye"></i></a>
          </td>
        </tr>
html;
        }
        return $html;
    }

    public function getTituloColaboradores($perfil, $identificador, $planta, $nombreDepartamento){
        $identificador = explode("_", $identificador);
        $identificador = strtoupper($identificador[0]);
        $titulo = "";
        if($perfil == 1){ // PERFIL ROOT
            $titulo .= "Administra a todos los usuarios";
        }elseif($perfil == 4){ // PERFIL ADMINISTRADOR
            $titulo .= "Administra a todos los usuarios";
        }elseif($perfil == 5){ // PERFIL PERSONALIZADO
            $titulo .= "Administra unicamente a los usuario del departamento de {$nombreDepartamento}";
        }elseif($perfil == 6){ // PERFIL RECURSOS HUMANOS
            if($planta == 1){
                $titulo .= "Administra a todos los usuarios";
            }else{
                $titulo .= "Recursos humanos {$identificador}, Administra a usuarios de {$identificador}";
            }
        }else{ // NO HAY PERFIL
            $titulo .= " -> lo sentimos, no hay ningun perfil asignado para este usuario.";
        }
        return " " . $titulo;
    }

    public function getFiltro($post){
        $datos = array();
        $datos['c.catalogo_empresa_id'] = MasterDom::getData('catalogo_empresa_id');
        $datos['c.catalogo_ubicacion_id'] = MasterDom::getData('catalogo_ubicacion_id');
        $datos['c.catalogo_departamento_id'] = MasterDom::getData('catalogo_departamento_id');
        $datos['c.catalogo_puesto_id'] = MasterDom::getData('catalogo_puesto_id');
        $datos['c.identificador_noi'] = (!empty(MasterDom::getData('status'))) ? MasterDom::getData('status') : "";

        $filtro = '';
        foreach ($datos as $key => $value) {
            if($value!=''){
                if($key == 'c.pago') $filtro .= "AND {$key} = '$value' ";
                else $filtro .= "AND {$key} = '$value' ";
            }
        }
        return $datos;
    }

    public function index1() {

        $extraHeader=<<<html
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
      <style>
        .incentivo{margin: 2px;font: message-box;height:100%;}
        .foto{width:100px;height:100px;border-radius: 50px;}
      </style>
html;

        $extraFooter =<<<html
      <script>
        $(document).ready(function(){
    function funcion(){
            celda = document.getElementById("celda1")
    
            if(celda == "Amarillo")
            {
                alert ("Valor del td: "+celda.innerHTML);
            }
            else
            {
                alert ("Valor del td: "+ celda);
            }
    
        }
          
          $("#muestra-cupones").tablesorter();
          var oTable = $('#muestra-cupones').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                }],
                 "order": false
            });

            // Remove accented character from search input as well
            // $('#muestra-cupones input[type=search]').keyup( function () {
            //     var table = $('#example').DataTable();
            //     table.search(
            //         jQuery.fn.DataTable.ext.type.search.html(this.value)
            //     ).draw();
            // } );

            var checkAll = 0;
            $("#checkAll").click(function () {
              if(checkAll==0){
                $("input:checkbox").prop('checked', true);
                checkAll = 1;
              }else{
                $("input:checkbox").prop('checked', false);
                checkAll = 0;
              }

            });


        //    $("#btnExcel").click(function(){
        //       $('#all').attr('action', '/Colaboradores/generarExcel/');
        //       $('#all').attr('target', '_blank');
        //       $("#all").submit();
        //     });

        //     $("#btnPDF").click(function(){
        //       $('#all').attr('action', '/Colaboradores/generarPDF/');
        //       $('#all').attr('target', '_blank');
        //       $("#all").submit();
        //     });

        //     $("#delete").click(function(){
        //       var seleccionados = $("input[name='borrar[]']:checked").length;
        //       if(seleccionados>0){
        //         alertify.confirm('¿Segúro que desea eliminar lo seleccionado?', function(response){
        //           if(response){
        //             $('#all').attr('action', '/Colaboradores/delete');
        //             $('#all').attr('target', '');
        //             $("#all").submit();
        //             alertify.success("Se ha eliminado correctamente");
        //            }
        //         });
        //       }else{
        //         alertify.confirm('Selecciona al menos uno para eliminar');
        //       }
        //     });

            /*$("select").change(function(){
              $.ajax({
                url: "/Colaboradores/getTabla",
                type: "POST",
                data: $("#all").serialize(),
                success: function(data){
                  $("#registros").html(data);
                }
              });
            });*/

            

        });
      </script>
html;

        $extraFooter1 =<<<html
      <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
      <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      <script>
        $(document).ready(function(){

          var checkAll = 0;
            $("#checkAll").click(function () {
              if(checkAll==0){
                $("input:checkbox").prop('checked', true);
                checkAll = 1;
              }else{
                $("input:checkbox").prop('checked', false);
                checkAll = 0;
              }

            });

           $("#muestra-cupones").tablesorter();
          var oTable = $('#muestra-cupones').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                }],
                 "order": false
            });

            // Remove accented character from search input as well
            $('#muestra-cupones input[type=search]').keyup( function () {
                var table = $('#example').DataTable();
                table.search(
                    jQuery.fn.DataTable.ext.type.search.html(this.value)
                ).draw();
            });

            var checkAll = 0;
            $("#checkAll").click(function () {
              if(checkAll==0){
                $("input:checkbox").prop('checked', true);
                checkAll = 1;
              }else{
                $("input:checkbox").prop('checked', false);
                checkAll = 0;
              }

            });


          //$("#muestra-cupones").tablesorter();

          /*var oTable = $('#muestra-cupones').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                }],
                 "order": false,
                 "language": {
                            "emptyTable": "No hay datos disponibles",
                            "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                            "info": "Mostrar _START_ a _END_ de _TOTAL_ registros",
                            "infoFiltered":   "(Filtrado de _MAX_ total de registros)",
                            "lengthMenu": "Mostrar _MENU_ registros",
                            "zeroRecords":  "No se encontraron resultados",
                            "search": "Buscar:",
                            "processing": "Procesando...",
                            "paginate" : {
                                "next": "Siguiente",
                                "previous" : "Anterior"
                            }
                        }
            });

            $('#muestra-cupones input[type=search]').keyup( function () {
                var table = $('#example').DataTable();
                table.search(
                    jQuery.fn.DataTable.ext.type.search.html(this.value)
                ).draw();
            });*/



          /*$("#muestra-cupones").tablesorter();
          var oTable = $('#muestra-cupones').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                }],
                 "order": false
            });

            // Remove accented character from search input as well
            $('#muestra-cupones input[type=search]').keyup( function () {
                var table = $('#example').DataTable();
                table.search(
                    jQuery.fn.DataTable.ext.type.search.html(this.value)
                ).draw();
            } );*/

            $("#delete").click(function(){
              var seleccionados = $("input[name='borrar[]']:checked").length;
              if(seleccionados>0){
                alertify.confirm('¿Segúro que desea eliminar lo seleccionado?', function(response){
                  if(response){
                    $('#all').attr('action', '/Colaboradores/delete');
                    $('#all').attr('target', '');
                    $("#all").submit();
                    alertify.success("Se ha eliminado correctamente");
                   }
                });
              }else{
                alertify.confirm('Selecciona al menos uno para eliminar');
              }
            });

            $("#btnExcel").click(function(){
              $('#all').attr('action', '/Colaboradores/generarExcel/');
              $('#all').attr('target', '_blank');
              $("#all").submit();
            });

            $("#btnPDF").click(function(){
              $('#all').attr('action', '/Colaboradores/generarPDF/');
              $('#all').attr('target', '_blank');
              $("#all").submit();
            });

            $("#btnReiniciar").click(function(){
              $.ajax({
                url: "/Colaboradores/getTabla",
                type: "POST",
                data: "",
                success: function(data){
                  $("#registros").html(data);
                }
              });
            });

            $("select").change(function(){
              $.ajax({
                url: "/Colaboradores/getTabla",
                type: "POST",
                data: $("#all").serialize(),
                success: function(data){
                  $("#registros").html(data);
                }
              });
            });

        });
      </script>
html;

        $usuario = $this->__usuario;
        $admin = ColaboradoresDao::getDatosUsuarioLogeado($usuario);

        $editarHidden = (Controller::getPermisosUsuario($usuario, "seccion_colaboradores", 5)==1)?  "" : "style=\"display:none;\"";
        $eliminarHidden = (Controller::getPermisosUsuario($usuario, "seccion_colaboradores", 6)==1)? "" : "style=\"display:none;\"";
        $pdfHidden = (Controller::getPermisosUsuario($usuario, "seccion_colaboradores", 2)==1)?  "" : "style=\"display:none;\"";
        $excelHidden = (Controller::getPermisosUsuario($usuario, "seccion_colaboradores", 3)==1)? "" : "style=\"display:none;\"";
        $agregarHidden = (Controller::getPermisosUsuario($usuario, "seccion_colaboradores", 4)==1)? "" : "style=\"display:none;\"";
        View::set('pdfHidden',$pdfHidden);
        View::set('excelHidden',$excelHidden);
        View::set('agregarHidden',$agregarHidden);
        View::set('editarHidden',$editarHidden);
        View::set('eliminarHidden',$eliminarHidden);

        //$datosUsuario = ColaboradoresDao::GeneralDao($this->__usuario);
        $datosUsuario = GeneralDao::getDatosUsuario($this->__usuario);

        if($datosUsuario['perfil_id'] == 1 || $datosUsuario['perfil_id'] == 4){
            $accion = 2;
        }

        if($datosUsuario['perfil_id'] == 6){
            if($datosUsuario['catalogo_planta_id]'] != 1){
                $accion = 6; // RH es diferente a RH xochimilco
            }else{
                $accion = 2;
            }
        }

        $datos = array();
        $datos['e.catalogo_empresa_id'] = MasterDom::getData('catalogo_empresa_id');
        $datos['u.catalogo_ubicacion_id'] = MasterDom::getData('catalogo_ubicacion_id');
        $datos['d.catalogo_departamento_id'] = MasterDom::getData('catalogo_departamento_id');
        $datos['p.catalogo_puesto_id'] = MasterDom::getData('catalogo_puesto_id');
        $datos['c.identificador_noi'] = (!empty(MasterDom::getData('status'))) ? MasterDom::getData('status') : "";

        $filtro = '';
        foreach ($datos as $key => $value) {
            if($value!=''){
                if($key == 'c.pago'){
                    //$filtro .= 'AND '.$key." = '{$value}' ";
                    $filtro .= "AND {$key} = '$value' ";
                }else{
                    //$filtro .= 'AND '.$key." = $value ";
                    $filtro .= "AND {$key} = '$value' ";
                }
            }
        }
        $tabla = '';
        foreach (ColaboradoresDao::getAllColaboradores($datosUsuario['perfil_id'], $datosUsuario['catalogo_planta_id'], $datosUsuario['catalogo_departamento_id'], $accion, $value['catalogo_departamento_id'], $admin['nombre_planta'], $admin['usuario'], $admin['perfil_id'], 1, $filtro) as $key => $value) {

            $value['nombre'] = utf8_encode($value['nombre']);
            $value['apellido_paterno'] = utf8_encode($value['apellido_paterno']);
            $value['apellido_materno'] = utf8_encode($value['apellido_materno']);
            $value['identificador_noi'] = ($value['identificador_noi'] != '') ? $value['identificador_noi'] : "SIN IDENTIFICADOR";

            $tabla .=<<<html
          <tr>
            <td {$editarHidden} style="text-align:center; vertical-align:middle;"><input type="checkbox" name="borrar[]" value="{$value['catalogo_colaboradores_id']}"/></td>
            <td style="text-align:center; vertical-align:middle;"><img class="foto" src="/img/colaboradores/{$value['foto']}"/></td>
            <td style="text-align:center; vertical-align:middle;">
              <b># EMPLEADO</b> {$value['numero_empleado']} <br>
              <b># PUESTO</b> {$value['nombre_puesto']}
            </td>
            <td style="text-align:center; vertical-align:middle;">{$value['nombre']} {$value['apellido_paterno']} {$value['apellido_materno']}</td>
            <td style="text-align:center; vertical-align:middle;">{$value['nombre_empresa']}</td>
            <td style="text-align:center; vertical-align:middle;">{$value['nombre_departamento']}</td>
            <td style="text-align:center; vertical-align:middle;"> {$value['pago']} </td>
            <td style="text-align:center; vertical-align:middle;"> {$value['identificador_noi']} </td>
            <td style="text-align:center; vertical-align:middle;">
                        <a href="/Colaboradores/edit/{$value['catalogo_colaboradores_id']}" {$editarHidden} type="submit" name="id" class="btn btn-primary"><span class="fa fa-pencil-square-o" style="color:white"></span> </a> <br>
                        <a href="/Colaboradores/show/{$value['catalogo_colaboradores_id']}" type="submit" name="id_empresa" class="btn btn-success"><span class="glyphicon glyphicon-eye-open" style="color:white"></span> </a>
                    </td>
          </tr>
html;
        }

        $sStatus = "";
        foreach (ColaboradoresDao::getStatus() as $key => $value) {
            $sStatus .=<<<html
        <option value="{$value['catalogo_status_id']}">{$value['nombre']}</option>
html;
        }

        $idDepartamento = "";
        foreach (ColaboradoresDao::getIdDepartamento() as $key => $value) {
            $idDepartamento .=<<<html
        <option value="{$value['catalogo_departamento_id']}">{$value['nombre']}</option>
html;
        }

        $idEmpresa = '';
        foreach (ColaboradoresDao::getIdEmpresa() as $key => $value) {
            $idEmpresa .=<<<html
        <option value="{$value['catalogo_empresa_id']}">{$value['nombre']}</option>
html;
        }

        $idUbicacion = '';
        foreach (ColaboradoresDao::getIdUbicacion() as $key => $value) {
            $idUbicacion .=<<<html
        <option value="{$value['catalogo_ubicacion_id']}">{$value['nombre']}</option>
html;
        }

        $idPuesto = '';
        foreach (ColaboradoresDao::getIdPuesto() as $key => $value) {
            $idPuesto .=<<<html
        <option value="{$value['catalogo_puesto_id']}">{$value['nombre']}</option>
html;
        }

        $nomina = "";
        foreach (ColaboradoresDao::getNominaIdentificador() as $key => $value) {
            if(!empty($value['identificador_noi'])){
                $nomina .=<<<html
            <option value="{$value['identificador_noi']}">NOMINA NOI {$value['identificador_noi']}</option>
html;
            }else{
                $nomina .=<<<html
            <option value="vacio">SIN NOMINA NOI</option>
html;
            }

        }

        View::set('nomina', $nomina);
        View::set('sStatus',$sStatus);
        View::set('idEmpresa', $idEmpresa);
        View::set('idUbicacion', $idUbicacion);
        View::set('idDepartamento', $idDepartamento);
        View::set('idPuesto', $idPuesto);
        View::set('tabla',$tabla);
        View::set('header',$this->_contenedor->header($extraHeader));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("colaboradores_all");
    }

    public function colaboradoresPropios() {

        $extraHeader=<<<html
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
      <style>
        .incentivo{margin: 2px;font: message-box;height:100%;}
        .foto{width:100px;height:100px;border-radius: 50px;}
      </style>
html;
        $extraFooter =<<<html
      <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
      <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      <script>
        $(document).ready(function(){

          var checkAll = 0;
            $("#checkAll").click(function () {
              if(checkAll==0){
                $("input:checkbox").prop('checked', true);
                checkAll = 1;
              }else{
                $("input:checkbox").prop('checked', false);
                checkAll = 0;
              }

            });

          $("#muestra-cupones").tablesorter();
          var oTable = $('#muestra-cupones').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                }],
                 "order": false
            });

            // Remove accented character from search input as well
            $('#muestra-cupones input[type=search]').keyup( function () {
                var table = $('#example').DataTable();
                table.search(
                    jQuery.fn.DataTable.ext.type.search.html(this.value)
                ).draw();
            } );

            $("#delete").click(function(){
              var seleccionados = $("input[name='borrar[]']:checked").length;
              if(seleccionados>0){
                alertify.confirm('¿Segúro que desea eliminar lo seleccionado?', function(response){
                  if(response){
                    $('#all').attr('action', '/Colaboradores/delete');
                    $('#all').attr('target', '');
                    $("#all").submit();
                    alertify.success("Se ha eliminado correctamente");
                   }
                });
              }else{
                alertify.confirm('Selecciona al menos uno para eliminar');
              }
            });

            $("#btnExcel").click(function(){
              $('#all').attr('action', '/Colaboradores/generarExcel/');
              $('#all').attr('target', '_blank');
              $("#all").submit();
            });

            $("#btnPDF").click(function(){
              $('#all').attr('action', '/Colaboradores/generarPDF/');
              $('#all').attr('target', '_blank');
              $("#all").submit();
            });

            $("#btnReiniciar").click(function(){
              $.ajax({
                url: "/Colaboradores/getTabla",
                type: "POST",
                data: "",
                success: function(data){
                  $("#registros").html(data);
                }
              });
            });

            $("select").change(function(){
              $.ajax({
                url: "/Colaboradores/getTabla",
                type: "POST",
                data: $("#all").serialize(),
                success: function(data){
                  $("#registros").html(data);
                }
              });
            });

        });
      </script>
html;

        $usuario = $this->__usuario;
        $admin = ColaboradoresDao::getDatosUsuarioLogeado($usuario);

        $editarHidden = (Controller::getPermisosUsuario($usuario, "seccion_colaboradores", 5)==1)?  "" : "style=\"display:none;\"";
        $eliminarHidden = (Controller::getPermisosUsuario($usuario, "seccion_colaboradores", 6)==1)? "" : "style=\"display:none;\"";
        $pdfHidden = (Controller::getPermisosUsuario($usuario, "seccion_colaboradores", 2)==1)?  "" : "style=\"display:none;\"";
        $excelHidden = (Controller::getPermisosUsuario($usuario, "seccion_colaboradores", 3)==1)? "" : "style=\"display:none;\"";
        $agregarHidden = (Controller::getPermisosUsuario($usuario, "seccion_colaboradores", 4)==1)? "" : "style=\"display:none;\"";
        View::set('pdfHidden',$pdfHidden);
        View::set('excelHidden',$excelHidden);
        View::set('agregarHidden',$agregarHidden);
        View::set('editarHidden',$editarHidden);
        View::set('eliminarHidden',$eliminarHidden);

        /*$datosUsuario = ColaboradoresDao::getDatosUsuarioLogeado($this->__usuario);
        $secciones = ColaboradoresDao::getDepartamentos($datosUsuario['administrador_id']);
        $datosUsuario = ColaboradoresDao::getDatosUsuarioLogeado($this->__usuario);*/

        $datosUsuario = GeneralDao::getDatosUsuario($this->__usuario);

        $accion = 4; // ES PARA PROPIOS DE RH O ROOT
        $tabla = '';
        foreach (ColaboradoresDao::getAllColaboradores($datosUsuario['perfil_id'], $datosUsuario['catalogo_planta_id'], $datosUsuario['catalogo_departamento_id'], $accion, $value['catalogo_departamento_id'], $admin['nombre_planta'], $admin['usuario'], $admin['perfil_id'], 2) as $key => $value) {
            $tabla .=<<<html
          <tr>
            <td {$editarHidden} style="text-align:center; vertical-align:middle;"><input type="checkbox" name="borrar[]" value="{$value['catalogo_colaboradores_id']}"/></td>
            <td style="text-align:center; vertical-align:middle;"><img class="foto" src="/img/colaboradores/{$value['foto']}"/></td>
            <td style="text-align:center; vertical-align:middle;">{$value['numero_empleado']}</td>
            <td style="text-align:center; vertical-align:middle;">{$value['nombre']} {$value['apellido_paterno']} {$value['apellido_materno']}</td>
            <td style="text-align:center; vertical-align:middle;">{$value['nombre_empresa']}</td>
            <td style="text-align:center; vertical-align:middle;">{$value['nombre_departamento']}</td>
            <td style="text-align:center; vertical-align:middle;"> {$value['status']} </td>
            <td class="center">
                        <a href="/Colaboradores/edit/{$value['catalogo_colaboradores_id']}" {$editarHidden} type="submit" name="id" class="btn btn-primary"><span class="fa fa-pencil-square-o" style="color:white"></span> </a>
                        <a href="/Colaboradores/show/{$value['catalogo_colaboradores_id']}" type="submit" name="id_empresa" class="btn btn-success"><span class="glyphicon glyphicon-eye-open" style="color:white"></span> </a>
                    </td>
          </tr>
html;
        }

        $sStatus = "";
        foreach (ColaboradoresDao::getStatus() as $key => $value) {
            $sStatus .=<<<html
        <option value="{$value['catalogo_status_id']}">{$value['nombre']}</option>
html;
        }

        $idDepartamento = "";
        foreach (ColaboradoresDao::getIdDepartamento() as $key => $value) {
            $idDepartamento .=<<<html
        <option value="{$value['catalogo_departamento_id']}">{$value['nombre']}</option>
html;
        }

        $idEmpresa = '';
        foreach (ColaboradoresDao::getIdEmpresa() as $key => $value) {
            $idEmpresa .=<<<html
        <option value="{$value['catalogo_empresa_id']}">{$value['nombre']}</option>
html;
        }

        $idUbicacion = '';
        foreach (ColaboradoresDao::getIdUbicacion() as $key => $value) {
            $idUbicacion .=<<<html
        <option value="{$value['catalogo_ubicacion_id']}">{$value['nombre']}</option>
html;
        }

        $idPuesto = '';
        foreach (ColaboradoresDao::getIdPuesto() as $key => $value) {
            $idPuesto .=<<<html
        <option value="{$value['catalogo_puesto_id']}">{$value['nombre']}</option>
html;
        }
        View::set('sStatus',$sStatus);
        View::set('idEmpresa', $idEmpresa);
        View::set('idUbicacion', $idUbicacion);
        View::set('idDepartamento', $idDepartamento);
        View::set('idPuesto', $idPuesto);
        View::set('tabla',$tabla);
        View::set('header',$this->_contenedor->header($extraHeader));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("colaboradores_all");
    }

    public function getTabla(){
        $datos = array();
        $datos['e.catalogo_empresa_id'] = MasterDom::getData('catalogo_empresa_id');
        $datos['u.catalogo_ubicacion_id'] = MasterDom::getData('catalogo_ubicacion_id');
        $datos['d.catalogo_departamento_id'] = MasterDom::getData('catalogo_departamento_id');
        $datos['p.catalogo_puesto_id'] = MasterDom::getData('catalogo_puesto_id');
        $datos['c.pago'] = MasterDom::getData('status');

        $filtro = '';
        foreach ($datos as $key => $value) {
            if($value!=''){
                if($key == 'c.pago'){
                    $filtro .= 'AND '.$key." = '{$value}' ";
                }else{
                    $filtro .= 'AND '.$key." = $value ";
                }
            }
        }

        $tabla= '';
        foreach (ColaboradoresDao::getAllReporte($filtro) as $key => $value) {
            $value['numero_empleado'] = utf8_encode($value['numero_empleado']);
            $value['nombre'] = utf8_encode($value['nombre']);
            $value['apellido_paterno'] = utf8_encode($value['apellido_paterno']);
            $value['apellido_materno'] = utf8_encode($value['apellido_materno']);
            $value['catalogo_empresa_id'] = utf8_encode($value['catalogo_empresa_id']);
            $value['catalogo_departamento_id'] = utf8_encode($value['catalogo_departamento_id']);
            $value['status'] = utf8_encode($value['status']);
            $tabla.=<<<html
                <tr>
                  <td {$editarHidden}><input type="checkbox" name="borrar[]" value="{$value['catalogo_colaboradores_id']}"/></td>
                  <td><img class="foto" src="/img/colaboradores/{$value['foto']}"/></td>
                  <td>{$value['numero_empleado']}</td>
                  <td>{$value['nombre']} {$value['apellido_paterno']} {$value['apellido_materno']}</td>
                  <td>{$value['catalogo_empresa_id']}</td>
                  <td>{$value['catalogo_departamento_id']}</td>
                  <td>{$value['pago']}</td>
                  <td class="center" {$editarHidden}>
                        <a href="/Colaboradores/edit/{$value['catalogo_colaboradores_id']}" type="submit" name="id" class="btn btn-primary"><span class="fa fa-pencil-square-o" style="color:white"></span> </a>
                        <a href="/Colaboradores/show/{$value['catalogo_colaboradores_id']}" type="submit" name="id_empresa" class="btn btn-success"><span class="glyphicon glyphicon-eye-open" style="color:white"></span> </a>
                    </td>
                </tr>
html;
        }
        echo $tabla;
    }

    public function show($id){
        $extraHeader =<<<html
      <link href="/css/bootstrap-datetimepicker.css" rel="stylesheet">
      <style>
        .incentivo{
          margin: 2px;
          background-color: #18bf7f;
          font: message-box;
          height:25px;
          -webkit-box-shadow: 9px 13px 23px -9px #18bf7f;
          -moz-box-shadow: 9px 13px 23px -9px #18bf7f;
          box-shadow: 9px 13px 23px -9px #18bf7f;
        }

        .incentivo:hover{
          background-color: #c9069b;
          -webkit-box-shadow: 9px 13px 23px -9px #c9069b;
          -moz-box-shadow: 9px 13px 23px -9px #c9069b;
          box-shadow: 9px 13px 23px -9px #c9069b;
        }
        .foto{
          width:150px;
          height:150px;
          border-radius: 50px;
          margin:10px;
          float:left;
        }

        .btn span.glyphicon {
          opacity: 0;
        }
        .btn.active span.glyphicon {
          opacity: 1;
        }

      </style>
html;
        $extraFooter =<<<html
      <script src="/js/moment/moment.min.js"></script>
      <script src="/js/datepicker/scriptdatepicker.js"></script>
      <script src="/js/datepicker/datepicker2.js"></script>

      <script>
    
        $(document).ready(function(){
           $("#muestra-cupones1").tablesorter();
           var oTable = $('#muestra-cupones1').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                }],
                 "order": false
            });

           // Remove accented character from search input as well
           $('#muestra-cupones1 input[type=search]').keyup( function () {
                var table = $('#example').DataTable();
                table.search(
                    jQuery.fn.DataTable.ext.type.search.html(this.value)
                ).draw();
            });

           var checkAll = 0;
           $("#checkAll").click(function () {
              if(checkAll==0){
                $("input:checkbox").prop('checked', true);
                checkAll = 1;
              }else{
                $("input:checkbox").prop('checked', false);
                checkAll = 0;
              }

            });

          $("#btnCancel").click(function(){
             window.location.href = "/Colaboradores/";
          });//fin del btnAdd
          
        });
        
        $(document).ready(function(){
	$(document).on('click', '.edit', function(){
		var id=$(this).val();
		console.log('El código es: ' + id );
		var url = "/files/" + id;
		$('#edit').modal('show');
        $('#iframePDF').attr('src', url);
	});
});
      </script>

html;

        $usuario = $this->__usuario;
        $documentos = ColaboradoresDao::getDocumentos($id);
        $puestos_ocupados = ColaboradoresDao::getPuestosOcupados($id);
        $accidentes = ColaboradoresDao::getAccidentes($id);
        $accidentes_count = '';
        if($accidentes >= 1)
        {
            $accidentes_count = 'SI';
        }
        else{
            $accidentes_count = 'NO';
        }


        $incapacidades = ColaboradoresDao::getIncapacidades($id);
        $incapacidades_count = "";
        $trabaja_seguridad = "";

        if($incapacidades['days'] <= 1)
        {
            $incapacidades_count = "0 Incapacidades";
            $trabaja_seguridad = "SI";
        }
        else{
            $incapacidades_count = $incapacidades['days']." Días de Incapacidad (Globales)";
            $trabaja_seguridad = "NO";
        }

        $tabla_economicos = '';
        $dias_economicos = ColaboradoresDao::getAllDiasEconomicos($id);
        if(empty($dias_economicos['dias_sobrantes']))
        {
            $tabla_economicos.=<<<html
            <input type="text" class="form-control" value="NO DISPONIBLE PARA ADMINISTRATIVOS" disabled>
html;
        }
        else
        {
            $tabla_economicos.=<<<html
            <input type="text" class="form-control" value="{$dias_economicos['dias_sobrantes']} días" disabled>
html;
        }

        $otros_datos = ColaboradoresDao::getOtrosDatosPersonales($id);
        $editarHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 5)==1)?  "" : "style=\"display:none;\"";
        $eliminarHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 6)==1)? "" : "style=\"display:none;\"";
        $tabla= '';
        foreach ($documentos as $key => $value) {

            $delete = $value['id'];
            $filename = $value['filename'];
            $tabla.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id']}"/></td>
                    <td> {$value['title']} </td>
                    <td> {$value['filename']} </td>
                    <td> {$value['description']} </td>
                    <td> {$value['created_at']} </td>
                    <td class="center" > 
                        <button type="button" class="btn btn-success edit" value="{$value['filename']}"><span class="fa fa-eye" style="color:white"></span></button>
                        <button class="btn btn-danger" type="button" id="button" onclick="gt_1($delete)"><span class="fa fa-trash" style="color:white"></button>
                    </td>
                </tr>
html;
        }

        $estado_civil_combo = ColaboradoresDao::getByIdOtro($id);

        $sOtros = "";
        foreach (ColaboradoresDao::getEstadoCivil() as $key => $value) {
            $selected = ($estado_civil_combo['estado_civil']==$value['id_estado_civil'])? 'selected' : '';
            $sOtros .=<<<html
        <option {$selected} value="{$value['id_estado_civil']}">{$value['descripcion']}</option>
html;
        }

        $sUltimoGradoEstudios = "";
        foreach (ColaboradoresDao::getUltimoGradoEstudios() as $key => $value) {
            $selected = ($estado_civil_combo['ultimo_grado_estudios']==$value['id_ultimo_grado_estudios'])? 'selected' : '';
            $sUltimoGradoEstudios.=<<<html
        <option {$selected} value="{$value['id_ultimo_grado_estudios']}">{$value['descripcion']}</option>
html;
        }

        $pdfHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 2)==1)?  "" : "style=\"display:none;\"";
        $excelHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 3)==1)? "" : "style=\"display:none;\"";
        $agregarHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 4)==1)? "" : "style=\"display:none;\"";
        View::set('pdfHidden',$pdfHidden);
        View::set('excelHidden',$excelHidden);
        View::set('agregarHidden',$agregarHidden);
        View::set('editarHidden',$editarHidden);
        View::set('eliminarHidden',$eliminarHidden);
        View::set('tabla_economicos',$tabla_economicos);
        View::set('accidentes',$accidentes);
        View::set('trabaja_seguridad',$trabaja_seguridad);
        View::set('accidentes_count',$accidentes_count);
        View::set('incapacidades_count',$incapacidades_count);
        View::set('tabla',$tabla);
        View::set('sOtros',$sOtros);

        $colaborador = ColaboradoresDao::getById($id);

        $sStatus = "";
        foreach (ColaboradoresDao::getStatus() as $key => $value) {
            $selected = ($value['catalogo_status_id'] == $colaborador['status'])? 'selected' : '';
            $sStatus .=<<<html
        <option {$selected} value="{$value['catalogo_status_id']}">{$value['nombre']}</option>
html;
        }

        $archivo = ColaboradoresDao::getByIdArchivo($id);
        $ingreso_proyecto = ColaboradoresDao::getIngresoProyecto($id);
        $incentivo_trimestral = ColaboradoresDao::getIncentivoTrimestral($id);


        $sArchivos = "";
        foreach (ColaboradoresDao::getArchivo($id) as $key => $value) {
            $selected = ($archivo['id_archivo']==$value['id_archivo'])? 'selected' : '';
            $sArchivos.=<<<html
        <option {$selected} value="{$value['id_archivo']}">{$value['Descripcion']}</option>
html;
        }

        $sDocu = "";
        foreach (ColaboradoresDao::getDoc() as $key => $value) {
            $selected = ($value['id_documento_obtenido']==$value['nombre'])? 'selected' : '';
            $sDocu.=<<<html
        <option {$selected} value="{$value['id_documento_obtenido']}">{$value['nombre']}</option>
html;
        }

        $sCompetencia = "";
        foreach (ColaboradoresDao::getCompetencias($id) as $key => $value) {
            $selected = ($value['catalogo_competencia_id']==$value['nombre'])? 'selected' : '';
            $sCompetencia.=<<<html
        <option {$selected} value="{$value['catalogo_competencia_id']}">{$value['nombre']}</option>
html;
        }

        $sOcupacion = "";
        foreach (ColaboradoresDao::getOcupacion() as $key => $value) {
            $selected = ($value['id_ocupacion']==$value['nombre'])? 'selected' : '';
            $sOcupacion.=<<<html
        <option {$selected} value="{$value['id_ocupacion']}">{$value['nombre']}</option>
html;
        }

        $sGeneros = "";
        foreach (ColaboradoresDao::getGenero() as $key => $value) {
            $selected = ($value['id_genero']==$value['nombre'])? 'selected' : '';
            $sGeneros.=<<<html
        <option {$selected} value="{$value['id_genero']}">{$value['nombre']}</option>
html;
        }

        $id_colaborador= '';
        $id_colaborador.=<<<html
                 <div class="form-group">
                      <input type="hidden" class="form-control" id="id_colaborador" name="id_colaborador" value="$id">
                 </div>
html;

        $nombreEmpresa = ColaboradoresDao::getCatalogoEmpresa($id);
        $nombreUbicacion = ColaboradoresDao::getCatalogoUbicacion($id);
        $nombreDepartamento = ColaboradoresDao::getCatalogoDepartamento($id);
        $nombrePuesto = ColaboradoresDao::getCatalogoPuesto($id);
        $nombreLector = ColaboradoresDao::getCatalogoLector($id);
        $statusNombre = ColaboradoresDao::getStatusColaborador($id);
        $UltimoCurso = ColaboradoresDao::getStatusUltimoCurso($id);
        $AntiguedadPuestoActual = ColaboradoresDao::getPuestosOcupadosAntiguedad($id);
        $CuestionarioIngreso = ColaboradoresDao::getIngresoCuestionario($id);

        $CuestionarioIngreso_ = "";
        if(empty($CuestionarioIngreso['id_cuestionario_colaborador']))
        {
            $CuestionarioIngreso_.=<<<html
         <label>RESPONDIO EL CUESTIONARIO DE INGRESO A ADG: </label>
        <input id="calificacion_" type="text" class="form-control" value="SIN REGISTRO" disabled>
html;
        }
        else
        {
            $CuestionarioIngreso_.=<<<html
             <label>RESPONDIO EL CUESTIONARIO DE INGRESO A ADG:</label>      
             <div class="col-md-9">  
             <input id="calificacion_" type="text" class="form-control" value="DISPONIBLE" disabled>
             </div>
             <a href="/Accidentes/Edit/{$CuestionarioIngreso['id_cuestionario_colaborador']}" type="submit" name="id" class="btn btn-primary"><span class="fa fa-eye" style="color:white"></span></a>
                                   
html;
        }

        $DatoUltimoCurso = "";

        if(empty($UltimoCurso['nombre_curso']))
        {
            $DatoUltimoCurso.=<<<html
                      <input type="text" class="form-control" value="SIN REGISTRO" disabled>
html;
        }
        else
        {
            $DatoUltimoCurso.=<<<html
            <input type="text" class="form-control" value="{$UltimoCurso['nombre_curso']} - {$UltimoCurso['fecha']} "  disabled>
html;
        }

        $AscensoUltimo = ColaboradoresDao::getAscensoAllUltimo($id);
        $Prom = ColaboradoresDao::getPromedio($id);
        $Promedio = '';
        if(!empty($Prom['promedio']))
        {
            $Promedio.=<<<html
                     {$Prom['promedio']} PUNTOS
html;
        }

        $Prom_E = ColaboradoresDao::getPromedioE($id);
        $Promedio_E = '';
        if(!empty($Prom_E['promedio']))
        {
            $Promedio_E.=<<<html
                <div class="form-group col-md-9">
                <label>PROMEDIO GENERAL DE LAS EVALUACIONES CÓMO CAPACITADOR: </label>
                {$Prom_E['promedio']} PUNTOS
                </div>
                     
html;
        }


        $Porcentaje = ColaboradoresDao::getPorcentajeAsistencia($id);
        $DatoPorcentaje = "";

        if(empty($Porcentaje['porcentaje']))
        {
            $DatoPorcentaje.=<<<html
                 <input type="text" class="form-control" value=" - %"disabled>
html;
        }
        else
        {
            $DatoPorcentaje.=<<<html
                 <input type="text" class="form-control" value="{$Porcentaje['porcentaje']} %" disabled>
html;
        }

        foreach (ColaboradoresDao::getPuestosOcupados($id) as $key => $value) {
            $tabla1.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_puesto_ocupado']}"/></td>
                    <td> {$value['nombre_puesto']} </td>
                    <td> {$value['fecha_actualizacion']} </td>
                </tr>
html;
        }
        $tablaAccidentes = "";
        foreach (ColaboradoresDao::getAccidentesAll($id) as $key => $value) {
            $tablaAccidentes.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_accidente']}"/></td>
                    <td> {$value['detalle_accidente']} </td>
                    <td> {$value['fecha_accidente']} </td>            
                    <td class="center">
                        <a href="/Accidentes/Show/{$value['id_accidente']}" type="submit" name="id_accidente" class="btn btn-success"><span class="fa fa-eye" style="color:white"></span> </a>
                    </td>
                </tr>
html;
        }

        $tablaCompetencias = "";
        foreach (ColaboradoresDao::getCompetenciasAll($id) as $key => $value) {
            $delete_competencia = $value['id_competencia_colaborador'];
            $tablaCompetencias.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_competencia_colaborador']}"/></td>
                    <td> {$value['nombre']} </td>          
                    <td class="center">
                        <button class="btn btn-danger" type="button" id="button" onclick="eliminar_competencias($delete_competencia)"><span class="fa fa-trash" style="color:white"></button>
                    </td>
                </tr> 
html;
        }

        $tablaAscenso = "";

        foreach (ColaboradoresDao::getAscensoAll($id) as $key => $value) {
            $delete_ascenso = $value['id_ascenso'];
            $estatus = "";
            if($value['estatus'] == 1)
            {
                $estatus.=<<<html
               <span class="bi bi-check-circle-fill fa-2x" style="color:#7DE300;"></span>
html;
            }
            if($value['estatus'] == 2)
            {
                $estatus.=<<<html
               <span class="fa fa-clock-o fa-2x" style="color:#e28743;"></span>
html;
            }
            if($value['estatus'] == 3)
            {
                $estatus.=<<<html
            <button type="button" class="btn btn-warning ver_archivo_personal" value="{$value['url']}"><span class="fa fa-toggle-on" style="color:white"></span></button>

html;
            }
            $tablaAscenso.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_ascenso']}"/></td>
                    <td> {$value['puesto']} </td> 
                    <td> {$value['fecha_registro']} </td> 
                    <td> {$value['fecha_termino']} </td> 
                    <td> $estatus</td> 
                    <td> {$value['descripcion']} </td> 
                    <td class="center">
                        <button class="btn btn-danger" type="button" id="button" onclick="eliminar_competencias($delete_competencia)"><span class="fa fa-trash" style="color:white"></button>
                    </td>
                </tr>
html;
        }



        foreach (ColaboradoresDao::getSueldos($id) as $key => $value) {
            $sueldo = '';
            if($value['numero'] == 1)
            {
                $sueldo = "$".$value['sal_diario']." ---- Sueldo Inicial por día";
            }
            else
            {
                $sueldo = "$".$value['sal_diario']." por día";
            }

            $tablaSueldo.=<<<html
                
                <tr>
                    <td> $sueldo </td>
                    <td> {$value['fecha_alta']} </td>
                </tr>
html;
        }

        foreach (ColaboradoresDao::getDomicilios($id) as $key => $value) {
            $delete_domicilio = $value['id_domicilio'];
            $tabla2.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_domicilio']}"/></td>
                    <td> {$value['direccion']} </td>
                    <td class="center" > 
                        <button class="btn btn-danger" type="button" id="button" onclick="eliminar_domicilio($delete_domicilio)"><span class="fa fa-trash" style="color:white"></button>
                    </td>
                </tr>
html;
        }
        foreach (ColaboradoresDao::getNumeroHijos($id) as $key => $value) {
            $delete_hijos = $value['id_numero_hijos'];

            $firstDate  = new \DateTime($value['fecha_nacimiento']);
            $secondDate = new \DateTime(date("Y") . "-" . date("m") . "-" . date("d"));
            $intvl = $firstDate->diff($secondDate);
            $fecha = $intvl->y . " año(s), " . $intvl->m." mes(es) y ".$intvl->d." dia(s)";

            $tabla3.=<<<html
                <tr>   
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_numero_hijos']}"/></td>
                    <td> {$value['ocupacion']} </td>
                    <td> {$value['fecha_nacimiento']} </td>    
                    <td> $fecha </td>      
                    <td> {$value['genero']} </td>    
                    <td class="center" > 
                        <button class="btn btn-danger" type="button" id="button" onclick="eliminar_hijos($delete_hijos)"><span class="fa fa-trash" style="color:white"></button>
                    </td>
                </tr>
html;
        }

        foreach (ColaboradoresDao::getEstudiosAdicionales($id) as $key => $value) {
            $delete_estudios = $value['id_estudio_adicional'];

            $tabla4.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_estudio_adicional']}"/></td>
                    <td> {$value['descripcion']} </td>
                    <td> {$value['documento_obtenido']} </td>
                    <td class="center" > 
                        <button class="btn btn-danger" type="button" id="button" onclick="eliminar_estudios($delete_estudios)"><span class="fa fa-trash" style="color:white"></button>
                    </td>
                </tr>
html;
        }

        foreach (ColaboradoresDao::getRegistroCapacitaciones($id) as $key => $value) {
            $fechamovimiento =  date('Y-m-d');
            $estatus_ = "";
            $asistencia_ = "";
            if($value['fecha'] >= $fechamovimiento)
            {
                $estatus_ = "POR REALIZAR";
                $asistencia_ = "-";
            }
            else
            {
                if($value['fecha'] <= $fechamovimiento)
                {
                    if($value['asistencia'] == '1')
                    {
                        $asistencia_.=<<<html
               ASISTIO <span class="fa fa-check-circle" style="color:darkgreen"></span>
html;
                    }
                    else
                    {
                        $asistencia_.=<<<html
               NO ASISTIO (falta) <span class="fa fa-times-circle" style="color:darkred"></span>
html;
                    }
                    $estatus_ = "FINALIZADA";
                }

            }
            $calificacion_requiere = '';
            if($value['requierecal'] == '1')
            {
                $calificacion_requiere.=<<<html
               SI
html;
            }
            else
            {
                $calificacion_requiere.=<<<html
               NO
html;
            }

            $cal = '';
            if(!empty($value['calificacion']))
            {
                $cal = $value['calificacion'];
            }
            else
            {
                if($value['requierecal'] == '0')
                {
                    $cal = 'NO APLICA';
                }
                else
                {
                    if(empty($value['calificacion']))
                    {
                        $cal = 'NO SE CARGO';
                    }
                    else
                    {
                        $cal= $value['calificacion'];
                    }
                }
            }
            $TablaCapacitaciones.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_numero_hijos']}"/></td>
                    <td> {$value['nombre_curso']} </td>
                    <td> <span class="fa fa-calendar-check-o" style="color:rosybrown"></span> {$value['fecha']} </td>
                    <td> $calificacion_requiere </td>
                    <td> $estatus_ </td>
                    <td> $asistencia_ </td>
                    <td> $cal </td>
                </tr>
html;
        }

        $EsCapacitador = ColaboradoresDao::getCapacitador($id);
        $CapacitadorUltimaEvaluacion = ColaboradoresDao::getUltimaEvaluacion($id);

        $ResultadoUltimaEvaluacion = '';
        if($EsCapacitador['numero'] >= 1)
        {
            if($CapacitadorUltimaEvaluacion['calificacion'] = 0)
            {
                $ResultadoUltimaEvaluacion.=<<<html
            <div class="form-group col-md-6">
            <label>CALIFICACIÓN DE LA ULTIMA EVALUACIÓN CÓMO EXPOSITOR:</label>
            <input type="text" class="form-control" id="resultado" value="ESTA CAPACITACIÓN NO TUVO EVALUACIÓN" disabled>
            </div>
html;
            }
            else
            {
                if(empty($CapacitadorUltimaEvaluacion['calificacion_expositor'])){
                    $ResultadoUltimaEvaluacion.=<<<html
            <div class="form-group col-md-12">
            <label>CALIFICACIÓN DE LA ULTIMA EVALUACIÓN CÓMO EXPOSITOR:</label>
            <input type="text" class="form-control" id="resultado" value="{$CapacitadorUltimaEvaluacion['fecha']} - ({$CapacitadorUltimaEvaluacion['nombre_curso']}) - FALTA CARGAR LA CALIFICACIÓN" disabled>
            </div>
html;
                }
                else{
                    $ResultadoUltimaEvaluacion.=<<<html
            <div class="form-group col-md-6">
            <label>CALIFICACIÓN DE LA ULTIMA EVALUACIÓN CÓMO EXPOSITOR:</label>
            <input type="text" class="form-control" id="resultado" value="{$CapacitadorUltimaEvaluacion['fecha']} - ({$CapacitadorUltimaEvaluacion['nombre_curso']}) - {$CapacitadorUltimaEvaluacion['calificacion_expositor']}" disabled>
            </div>
html;
                }
            }

        }

        $TieneReportes = ColaboradoresDao::getTieneReportes($id);
        $repo = '';
        if($TieneReportes['numero'] >= 1)
        {
            $repo = 'SI';
        }
        else{
            $repo = 'NO';
        }

        $repor =  '';
        $TieneReportesCuando = ColaboradoresDao::getUltimoReporte($id);
        if(empty($TieneReportesCuando['fecha_alta']))
        {
            $repor =  'SIN REGISTRO';
        }
        else{
            $repor =  $TieneReportesCuando['fecha_alta'].' ('.$TieneReportesCuando['descripcion'].')';
        }

        $id_colaborador_ = $id;

        View::set('sStatus',$sStatus);
        View::set('nombrePuesto',$nombrePuesto);
        View::set('nombreEmpresa', $nombreEmpresa);
        View::set('nombreLector', $nombreLector);
        View::set('nombreUbicacion', $nombreUbicacion);
        View::set('nombreDepartamento', $nombreDepartamento);
        View::set('colaborador', $colaborador);
        View::set('repor', $repor);
        View::set('Promedio', $Promedio);
        View::set('Promedio_E', $Promedio_E);
        View::set('EsCapacitador', $EsCapacitador);
        View::set('ResultadoUltimaEvaluacion', $ResultadoUltimaEvaluacion);
        View::set('ingreso_proyecto', $ingreso_proyecto);
        View::set('incentivo_trimestral', $incentivo_trimestral);
        View::set('id_colaborador', $id_colaborador);
        View::set('AscensoUltimo', $AscensoUltimo);
        View::set('CuestionarioIngreso_', $CuestionarioIngreso_);
        View::set('id_colaborador_', $id_colaborador_);
        View::set('repo', $repo);
        View::set('status', $statusNombre);
        View::set('tabla1', $tabla1);
        View::set('tabla2', $tabla2);
        View::set('tabla3', $tabla3);
        View::set('tabla4', $tabla4);
        View::set('tabla1', $tabla1);
        View::set('tablaAccidentes', $tablaAccidentes);
        View::set('tablaCompetencias', $tablaCompetencias);
        View::set('tablaAscenso', $tablaAscenso);
        View::set('AntiguedadPuestoActual', $AntiguedadPuestoActual);
        View::set('TablaCapacitaciones', $TablaCapacitaciones);
        View::set('tablaSueldo', $tablaSueldo);
        View::set('otros_datos', $otros_datos);
        View::set('sArchivos',$sArchivos);
        View::set('sDocu',$sDocu);
        View::set('sOcupacion',$sOcupacion);
        View::set('sUltimoGradoEstudios',$sUltimoGradoEstudios);
        View::set('DatoUltimoCurso',$DatoUltimoCurso);
        View::set('DatoPorcentaje',$DatoPorcentaje);
        View::set('sGeneros',$sGeneros);
        View::set('sCompetencia',$sCompetencia);
        View::set('header',$this->_contenedor->header($extraHeader));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("colaboradores_view");
    }

    public function DatosPersonalesEdit(){
        $ingreso_proyecto = new \stdClass();
        $ingreso_proyecto->_id_ingreso_proyecto = MasterDom::getData('id_ingreso_proyecto');

        $porcentaje = MasterDom::getDataAll('porcentaje');
        $porcentaje = MasterDom::procesoAcentosNormal($porcentaje);
        $ingreso_proyecto->_porcentaje = $porcentaje;

        $calificacion = MasterDom::getDataAll('calificacion');
        $calificacion = MasterDom::procesoAcentosNormal($calificacion);
        $ingreso_proyecto->_calificacion = $calificacion;

        $nombre = MasterDom::getDataAll('nombre');
        $nombre = MasterDom::procesoAcentosNormal($nombre);
        $ingreso_proyecto->_nombre = $nombre;

        $id = ColaboradoresDao::updateIngresoProyecto($ingreso_proyecto);
        if($id >= 1){
            echo 'success';

        } else {
            echo 'No se actualizo nada';
        }

    }

    public function OtrosDatosPersonalesEdit(){
        $OtrosDatosPersonales = new \stdClass();
        $OtrosDatosPersonales->_catalogo_colaboradores_id = MasterDom::getData('id_colaborador_datos_personales');
        $OtrosDatosPersonales->_estado_civil = MasterDom::getData('estado_civil');
        $OtrosDatosPersonales->_ultimo_grado = MasterDom::getData('ultimo_grado');

        $id = ColaboradoresDao::updateOtrosDatosPersonales($OtrosDatosPersonales);
        if($id >= 1){
            echo 'success';
        } else {
            echo 'No se actualizo nada';
        }

    }

    public function IncentivoEdit(){
        $incentivo = new \stdClass();
        $incentivo->_id_incentivo = MasterDom::getData('id_incentivo');

        $incentivo_trimestral = MasterDom::getDataAll('monto');
        $incentivo_trimestral = MasterDom::procesoAcentosNormal($incentivo_trimestral);
        $incentivo->_monto = $incentivo_trimestral;


        $id = ColaboradoresDao::updateIncentivo($incentivo);
        if($id >= 1){
            echo 'success';

        } else {
            echo 'No se actualizo nada';
        }

    }

    public function EstudiosAdd(){
        $estudios = new \stdClass();
        $estudios->_id_colaborador = MasterDom::getData('id_cola');

        $estudios_descripcion = MasterDom::getDataAll('estudios');
        $estudios_descripcion = MasterDom::procesoAcentosNormal($estudios_descripcion);
        $estudios->_descripcion = $estudios_descripcion;

        $estudios->_doc = MasterDom::getData('doc_obtenido');


        $id = ColaboradoresDao::insertExtraEstudios($estudios);
        if($id >= 1){
            echo 'success';

        } else {
            echo 'No se actualizo nada';
        }

    }

    public function CompetenciasAdd(){
        $competencias = new \stdClass();
        $competencias->_id_colaborador = MasterDom::getData('id_colaborador_competencia');

        $competencias->_competencia = MasterDom::getData('competencia_c');

        $id = ColaboradoresDao::insertExtraCompetencia($competencias);
        if($id >= 1){
            echo 'success';

        } else {
            echo 'No se actualizo nada';
        }

    }

    public function DomicilioAdd(){
        $domicilio = new \stdClass();
        $domicilio->_id_colaborador = MasterDom::getData('id_colaborador_domicilio');

        $domicilio_descripcion = MasterDom::getDataAll('domicilio');
        $domicilio_descripcion = MasterDom::procesoAcentosNormal($domicilio_descripcion);
        $domicilio->_descripcion = $domicilio_descripcion;

        $id = ColaboradoresDao::insertExtraDomicilio($domicilio);
        if($id >= 1){
            echo 'success';

        } else {
            echo 'No se actualizo nada';
        }

    }

    public function HijosAdd(){
        $hijos = new \stdClass();
        $hijos->_id_colaborador = MasterDom::getData('id_colaborador_hijos');

        $hijos->_ocupacion = MasterDom::getData('ocupacion');
        $hijos->_nacimiento_fecha = MasterDom::getData('nacimiento_fecha');
        $hijos->_genero = MasterDom::getData('genero');

        $id = ColaboradoresDao::insertExtraHijos($hijos);
        if($id >= 1){
            echo 'success';

        } else {
            echo 'No se actualizo nada';
        }

    }

    public function AscensoAdd(){
        $ascenso = new \stdClass();
        $ascenso->_id_colaborador = MasterDom::getData('id_colaborador_ascenso');

        $ascenso->_fecha_2 = MasterDom::getData('fecha_1');
        $ascenso->_fecha_1 = MasterDom::getData('fecha_2');
        $ascenso->_ascenso = MasterDom::getData('ascenso');
        $ascenso->_detalle = MasterDom::getData('detalle');

        $id = ColaboradoresDao::insertAscenso($ascenso);
        if($id >= 1){
            echo 'success';

        } else {
            echo 'No se actualizo nada';
        }

    }

    public function generarPDF(){

        $datos = array();
        $datos['e.catalogo_empresa_id'] = MasterDom::getData('catalogo_empresa_id');
        $datos['u.catalogo_ubicacion_id'] = MasterDom::getData('catalogo_ubicacion_id');
        $datos['d.catalogo_departamento_id'] = MasterDom::getData('catalogo_departamento_id');
        $datos['p.catalogo_puesto_id'] = MasterDom::getData('catalogo_puesto_id');
        $datos['s.catalogo_status_id'] = MasterDom::getData('status');


        $filtro = '';
        foreach ($datos as $key => $value) {
            if($value!=''){
                $filtro .= 'AND '.$key.' = '.$value.' ';
            }
        }
        $ids = MasterDom::getDataAll('borrar');
        $mpdf=new \mPDF('c');
        $mpdf->defaultPageNumStyle = 'I';
        $mpdf->h2toc = array('H5'=>0,'H6'=>1);
        $style =<<<html
      <style>
        .imagen{
          width:100%;
          height: 150px;
          background: url(/img/ag_logo.png) no-repeat center center fixed;
          background-size: cover;
          -moz-background-size: cover;
          -webkit-background-size: cover
          -o-background-size: cover;
        }

        .titulo{
          width:100%;
          margin-top: 30px;
          color: #F5AA3C;
          margin-left:auto;
          margin-right:auto;
        }

        .incentivo{
          border-radius:10px;
          background-color: #a0985e;
          margin: 2px;
          font: message-box bold;
          height:100%;
        }

        .foto{
          width: 150px;
          height: 150px;
        }

      </style>
html;

        $tabla =<<<html
<img class="imagen" src="/img/ag_logo.png"/>
<br>
<H1 class="titulo">Colaboradores</H1>

html;

        if($ids!=''){
            foreach ($ids as $key => $value) {
                $colaborador = ColaboradoresDao::getByIdReporte($value);

                $colaborador['catalogo_colaboradores_id'] = utf8_encode($colaborador['catalogo_colaboradores_id']);
                $colaborador['rfc'] = utf8_encode($colaborador['rfc']);
                $colaborador['nombre'] = utf8_encode($colaborador['nombre']);
                $colaborador['apellido_paterno'] = utf8_encode($colaborador['apellido_paterno']);
                $colaborador['apellido_materno'] = utf8_encode($colaborador['apellido_materno']);
                $colaborador['numero_identificador'] = utf8_encode($colaborador['numero_identificador']);
                $colaborador['sexo'] = utf8_encode($colaborador['sexo']);
                $colaborador['status'] = utf8_encode($colaborador['status']);
                $colaborador['numero_empleado'] = utf8_encode($colaborador['numero_empleado']);
                $colaborador['opcion'] = utf8_encode($colaborador['opcion']);
                $colaborador['catalogo_empresa_id'] = utf8_encode($colaborador['catalogo_empresa_id']);
                $colaborador['catalogo_puesto_id'] = utf8_encode($colaborador['catalogo_puesto_id']);
                $colaborador['catalogo_ubicacion_id'] = utf8_encode($colaborador['catalogo_ubicacion_id']);
                $colaborador['catalogo_departamento_id'] = utf8_encode($colaborador['catalogo_departamento_id']);
                $colaborador['pago'] = utf8_encode($colaborador['pago']);
                $colaborador['fecha_alta'] = utf8_encode($colaborador['fecha_alta']);
                $colaborador['fecha_baja'] = utf8_encode($colaborador['fecha_baja']);


                $tabla.=<<<html
          <div style="page-break-inside: avoid; margin-bottom: 30px;">
            <table border="0" style="width:100%;text-align: center; ">
              <tr>
                <td colspan="1" style="background-color:#B8B8B8;"><strong>Colaborador Id: </strong> {$colaborador['catalogo_colaboradores_id']}</td>
                <td colspan="2" style="background-color:#B8B8B8;"><strong>RFC: </strong> {$colaborador['rfc']}</td>
              </tr>
              <tr>
                <td colspan="3" style="background-color:#B8B8B8;"><strong>Nombre: </strong> {$colaborador['nombre']} {$colaborador['apellido_paterno']} {$colaborador['apellido_materno']}</td>
              </tr>
              <tr>
                <td colspan="3" style="background-color:#E4E4E4;"><strong>Número de Identificador: </strong> {$colaborador['numero_identificador']}</td>
              </tr>
              <tr>
                <td colspan="1" style="background-color:#E4E4E4;"><strong>Sexo: </strong> {$colaborador['sexo']}</td>
                <td colspan="1" style="background-color:#E4E4E4;"><strong>Status: </strong> {$colaborador['status']}</td>
                <td colspan="1" style="background-color:#E4E4E4;"><strong>Numero Antiguedad: </strong> {$colaborador['numero_empleado']}</td>
              </tr>
              <tr>
                <td colspan="1" style="background-color:#E4E4E4;"><strong>Opción: </strong> {$colaborador['opcion']}</td>
                <td colspan="2" style="background-color:#E4E4E4;"><strong>Antiguedad: </strong> {$colaborador['catalogo_empresa_id']}</td>
              </tr>
              <tr>
                <td colspan="1" style="background-color:#E4E4E4;"><strong>Puesto: </strong> {$colaborador['catalogo_puesto_id']}</td>
                <td colspan="2" style="background-color:#E4E4E4;"><strong>Ubicacion: </strong> {$colaborador['catalogo_ubicacion_id']}</td>
              </tr>
              <tr>
                <td colspan="1" style="background-color:#E4E4E4;"><strong>Economicos: </strong> {$colaborador['catalogo_departamento_id']}</td>
                <td colspan="2" style="background-color:#E4E4E4;"><strong>Horario</strong>
html;
                foreach (ColaboradoresDao::getHorarioById($colaborador['catalogo_colaboradores_id']) as $key => $horario) {
                    $tabla .=<<<html
                      <span class="badge incentivo">{$horario['nombre']}</span>
html;
                }
                $tabla .=<<<html
                </td>
              </tr>
              <tr>
                <td colspan="1" style="background-color:#E4E4E4;"><strong>Pago: </strong> {$colaborador['pago']}</td>
                <td colspan="2" style="background-color:#E4E4E4;"><strong>Incentivos: </strong>
html;

                foreach (ColaboradoresDao::getIncentivoById($colaborador['catalogo_colaboradores_id']) as $key => $incentivo) {
                    $signo = "$";
                    $tabla .=<<<html
                                <br><span class="badge incentivo" style="background-color: {$incentivo['color']} ;">{$incentivo['nombre']}: {$signo}{$incentivo['cantidad']}</span>
html;
                }


                $tabla .=<<<html

                </td>
              </tr>
              <tr>
                <td colspan="1" style="background-color:#E4E4E4;"><strong>Fecha Alta: </strong> {$colaborador['fecha_alta']}</td>
                <td colspan="2" style="background-color:#E4E4E4;"><strong>Fecha Baja: </strong> {$colaborador['fecha_baja']}</td>
              </tr>
            </table>
          </div>
html;
            }
        }else{
            foreach (ColaboradoresDao::getAllReporte($filtro) as $key => $colaborador) {

                $colaborador['catalogo_colaboradores_id'] = utf8_encode($colaborador['catalogo_colaboradores_id']);
                $colaborador['rfc'] = utf8_encode($colaborador['rfc']);
                $colaborador['nombre'] = utf8_encode($colaborador['nombre']);
                $colaborador['apellido_paterno'] = utf8_encode($colaborador['apellido_paterno']);
                $colaborador['apellido_materno'] = utf8_encode($colaborador['apellido_materno']);
                $colaborador['numero_identificador'] = utf8_encode($colaborador['numero_identificador']);
                $colaborador['sexo'] = utf8_encode($colaborador['sexo']);
                $colaborador['status'] = utf8_encode($colaborador['status']);
                $colaborador['numero_empleado'] = utf8_encode($colaborador['numero_empleado']);
                $colaborador['opcion'] = utf8_encode($colaborador['opcion']);
                $colaborador['catalogo_empresa_id'] = utf8_encode($colaborador['catalogo_empresa_id']);
                $colaborador['catalogo_puesto_id'] = utf8_encode($colaborador['catalogo_puesto_id']);
                $colaborador['catalogo_ubicacion_id'] = utf8_encode($colaborador['catalogo_ubicacion_id']);
                $colaborador['catalogo_departamento_id'] = utf8_encode($colaborador['catalogo_departamento_id']);
                $colaborador['pago'] = utf8_encode($colaborador['pago']);
                $colaborador['fecha_alta'] = utf8_encode($colaborador['fecha_alta']);
                $colaborador['fecha_baja'] = utf8_encode($colaborador['fecha_baja']);


                $tabla.=<<<html
        <div style="page-break-inside: avoid;">
          <table border="0" style="width:100%;text-align: center; margin-bottom: 30px;">
            <tr>
              <td colspan="1" style="background-color:#B8B8B8;"><strong>Colaborador Id: </strong> {$colaborador['catalogo_colaboradores_id']}</td>
              <td colspan="2" style="background-color:#B8B8B8;"><strong>RFC: </strong> {$colaborador['rfc']}</td>
            </tr>
            <tr>
              <td colspan="1" rowspan="2" style="background-color:#E4E4E4;"><img class="foto" src="/img/colaboradores/{$colaborador['foto']}" /></td>
              <td colspan="2" style="background-color:#B8B8B8;"><strong>Nombre: </strong> {$colaborador['nombre']} {$colaborador['apellido_paterno']} {$colaborador['apellido_materno']}</td>
              </tr>
              <tr>
              <td colspan="2" style="background-color:#E4E4E4;"><strong>Número de Identificador: </strong> {$colaborador['numero_identificador']}</td>
            </tr>
            <tr>
              <td colspan="1" style="background-color:#E4E4E4;"><strong>Sexo: </strong> {$colaborador['sexo']}</td>
              <td colspan="1" style="background-color:#E4E4E4;"><strong>Status: </strong> {$colaborador['status']}</td>
              <td colspan="1" style="background-color:#E4E4E4;"><strong>Numero Antiguedad: </strong> {$colaborador['numero_empleado']}</td>
            </tr>
            <tr>
              <td colspan="1" style="background-color:#E4E4E4;"><strong>Opción: </strong> {$colaborador['opcion']}</td>
              <td colspan="2" style="background-color:#E4E4E4;"><strong>Antiguedad: </strong> {$colaborador['catalogo_empresa_id']}</td>
            </tr>
            <tr>
              <td colspan="1" style="background-color:#E4E4E4;"><strong>Puesto: </strong> {$colaborador['catalogo_puesto_id']}</td>
              <td colspan="2" style="background-color:#E4E4E4;"><strong>Ubicacion: </strong> {$colaborador['catalogo_ubicacion_id']}</td>
            </tr>
            <tr>
              <td colspan="1" style="background-color:#E4E4E4;"><strong>Economicos: </strong> {$colaborador['catalogo_departamento_id']}</td>
              <td colspan="2" style="background-color:#E4E4E4;"><strong>Horario</strong>
html;
                foreach (ColaboradoresDao::getHorarioById($colaborador['catalogo_colaboradores_id']) as $key => $horario) {
                    $tabla .=<<<html
                      <span class="badge incentivo" >{$horario['nombre']}</span>
html;
                }
                $tabla .=<<<html
              </td>
            </tr>
            <tr>
              <td colspan="1" style="background-color:#E4E4E4;"><strong>Pago: </strong> {$colaborador['pago']}</td>
              <td colspan="2" style="background-color:#E4E4E4;"><strong>Incentivos: </strong>
html;

                foreach (ColaboradoresDao::getIncentivoById($colaborador['catalogo_colaboradores_id']) as $key => $incentivo) {
                    $signo = "$";
                    $tabla .=<<<html
                <br><span class="badge incentivo" style="background-color: {$incentivo['color']} ;">{$incentivo['nombre']}: {$signo}{$incentivo['cantidad']}</span>
html;
                }


                $tabla .=<<<html
              </td>
            </tr>
            <tr>
              <td colspan="1" style="background-color:#E4E4E4;"><strong>Fecha Alta: </strong> {$colaborador['fecha_alta']}</td>
              <td colspan="2" style="background-color:#E4E4E4;"><strong>Fecha Baja: </strong> {$colaborador['fecha_baja']}</td>
            </tr>
          </table>
        </div>
html;
            }
        }
        $mpdf->WriteHTML($style,1);
        $mpdf->WriteHTML($tabla,2);
        print_r($mpdf->Output());
        exit;
    }

    public function generarExcel(){
        $ids = MasterDom::getDataAll("borrar");
        $datos = array();
        $datos['e.catalogo_empresa_id'] = MasterDom::getData('catalogo_empresa_id');
        $datos['u.catalogo_ubicacion_id'] = MasterDom::getData('catalogo_ubicacion_id');
        $datos['d.catalogo_departamento_id'] = MasterDom::getData('catalogo_departamento_id');
        $datos['p.catalogo_puesto_id'] = MasterDom::getData('catalogo_puesto_id');
        $datos['s.catalogo_status_id'] = MasterDom::getData('status');

        $filtro = '';
        foreach ($datos as $key => $value) {
            if($value!=''){
                $filtro .= 'AND '.$key.' = '.$value.' ';
            }
        }

        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getProperties()->setCreator("jma");
        $objPHPExcel->getProperties()->setLastModifiedBy("jma");
        $objPHPExcel->getProperties()->setTitle("Reporte");
        $objPHPExcel->getProperties()->setSubject("Reporte");
        $objPHPExcel->getProperties()->setDescription("Descripcion");
        $objPHPExcel->setActiveSheetIndex(0);

        /*AGREGAR IMAGEN AL EXCEL*/
        //$gdImage = imagecreatefromjpeg('http://52.32.114.10:8070/img/ag_logo.jpg');
        $gdImage = imagecreatefrompng('http://52.32.114.10:8070/img/ag_logo.png');
        // Add a drawing to the worksheetecho date('H:i:s') . " Add a drawing to the worksheet\n";
        $objDrawing = new \PHPExcel_Worksheet_MemoryDrawing();
        $objDrawing->setName('Sample image');$objDrawing->setDescription('Sample image');
        $objDrawing->setImageResource($gdImage);
        //$objDrawing->setRenderingFunction(\PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
        $objDrawing->setRenderingFunction(\PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
        $objDrawing->setMimeType(\PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
        $objDrawing->setWidth(50);
        $objDrawing->setHeight(125);
        $objDrawing->setCoordinates('A1');
        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

        $estilo_titulo = array(
            'font' => array('bold' => true,'name'=>'Verdana','size'=>12, 'color' => array('rgb' => 'FEAE41')),
            'alignment' => array('horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER),
            'type' => \PHPExcel_Style_Fill::FILL_SOLID
        );

        $estilo_encabezado = array(
            'font' => array('bold' => true,'name'=>'Verdana','size'=>10, 'color' => array('rgb' => 'FEAE41')),
            'alignment' => array('horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER),
            'type' => \PHPExcel_Style_Fill::FILL_SOLID
        );

        $estilo_celda = array(
            'font' => array('bold' => false,'name'=>'Verdana','size'=>8,'color' => array('rgb' => 'B59B68')),
            'alignment' => array('horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER),
            'type' => \PHPExcel_Style_Fill::FILL_SOLID

        );


        $fila = 9;
        $adaptarTexto = true;
        $controlador = "Colaboradores";
        $columna = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T');
        $nombreColumna = array('Id','Nombre','Apellido Paterno','Apellido Materno','Status','Motivo','Sexo','Numero Identificador','RFC','Antiguedad','Ubicación','Economicos','Puesto','Horario','Fecha Alta','Fecha Baja','Pago','Incentivo','Opción','Número Antiguedad');
        $nombreCampo = array('catalogo_colaboradores_id','nombre','apellido_paterno','apellido_materno','status','motivo','sexo','numero_identificador','rfc','catalogo_empresa_id','catalogo_ubicacion_id','catalogo_departamento_id','catalogo_puesto_id','catalogo_horario_id','fecha_alta','fecha_baja','pago','catalogo_incentivo','opcion','numero_empleado');

        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$fila, 'Reporte de Colaboradores');
        $objPHPExcel->getActiveSheet()->mergeCells('A'.$fila.':'.$columna[count($nombreColumna)-1].$fila);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$fila)->applyFromArray($estilo_titulo);
        $objPHPExcel->getActiveSheet()->getStyle('A'.$fila)->getAlignment()->setWrapText($adaptarTexto);

        $fila +=1;

        /*COLUMNAS DE LOS DATOS DEL ARCHIVO EXCEL*/
        foreach ($nombreColumna as $key => $value) {
            $objPHPExcel->getActiveSheet()->SetCellValue($columna[$key].$fila, $value);
            $objPHPExcel->getActiveSheet()->getStyle($columna[$key].$fila)->applyFromArray($estilo_encabezado);
            $objPHPExcel->getActiveSheet()->getStyle($columna[$key].$fila)->getAlignment()->setWrapText($adaptarTexto);
            $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($key)->setAutoSize(true);
        }
        $fila +=1; //fila donde comenzaran a escribirse los datos

        if($ids!=''){
            foreach ($ids as $key => $value) {
                $colaborador = ColaboradoresDao::getByIdReporte($value);
                foreach ($nombreCampo as $llave => $campo) {

                    if($campo == 'catalogo_incentivo'){
                        $colaborador[$campo] = '';
                        foreach (ColaboradoresDao::getIncentivoById($colaborador['catalogo_colaboradores_id']) as $k => $v) {
                            $colaborador[$campo] .= '('.$v['nombre'].': $'.$v['cantidad'].'),';
                        }
                    }

                    if($campo == 'catalogo_horario_id'){
                        $colaborador[$campo] = '';
                        foreach (ColaboradoresDao::getHorarioById($colaborador['catalogo_colaboradores_id']) as $k => $v) {
                            $colaborador[$campo] .= $v['nombre'].',';
                        }
                    }
                    $objPHPExcel->getActiveSheet()->SetCellValue($columna[$llave].$fila, html_entity_decode($colaborador[$campo], ENT_QUOTES, "UTF-8"));
                    $objPHPExcel->getActiveSheet()->getStyle($columna[$llave].$fila)->applyFromArray($estilo_celda);
                    $objPHPExcel->getActiveSheet()->getStyle($columna[$llave].$fila)->getAlignment()->setWrapText($adaptarTexto);
                }
                $fila +=1;
            }
        }else{
            foreach (ColaboradoresDao::getAllReporte($filtro) as $key => $value) {

                foreach ($nombreCampo as $llave => $campo) {

                    if($campo == 'catalogo_incentivo'){
                        $value[$campo] = '';
                        foreach (ColaboradoresDao::getIncentivoById($value['catalogo_colaboradores_id']) as $k => $v) {
                            $value[$campo] .= '('.$v['nombre'].': $'.$v['cantidad'].'),';
                        }
                    }

                    if($campo == 'catalogo_horario_id'){
                        $value[$campo] = 'Horario';
                        foreach (ColaboradoresDao::getHorarioById($value['catalogo_colaboradores_id']) as $k => $v) {
                            $value[$campo] .= $v['nombre'].',';
                        }
                    }

                    $objPHPExcel->getActiveSheet()->SetCellValue($columna[$llave].$fila, html_entity_decode($value[$campo], ENT_QUOTES, "UTF-8"));
                    $objPHPExcel->getActiveSheet()->getStyle($columna[$llave].$fila)->applyFromArray($estilo_celda);
                    $objPHPExcel->getActiveSheet()->getStyle($columna[$llave].$fila)->getAlignment()->setWrapText($adaptarTexto);
                }
                $fila +=1;
            }
        }

        $objPHPExcel->getActiveSheet()->getStyle('A1:'.$columna[count($columna)-1].$fila)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        for ($i=0; $i <$fila ; $i++) {
            $objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(20);
        }

        $objPHPExcel->getActiveSheet()->setTitle('Reporte');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Reporte AG '.$controlador.'.xlsx"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
        header ('Cache-Control: cache, must-revalidate');
        header ('Pragma: public');

        \PHPExcel_Settings::setZipClass(\PHPExcel_Settings::PCLZIP);
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }

    public function getHeader(){
        $extraHeader =<<<html
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
      <style>
        .incentivo{margin: 2px;font: message-box;height:100%;}
        .foto{width:100px;height:100px;border-radius: 50px;}
      </style>
html;
        return $extraHeader;
    }

    public function getFooter(){
        $extraFooter =<<<html
      <script>
        $(document).ready(function(){

            $('#user-list').DataTable({
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
                    $('.odd').addClass("bg-gray-conave")
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


        //     // Remove accented character from search input as well
        //     $('#muestra-cupones input[type=search]').keyup( function () {
        //         var table = $('#example').DataTable();
        //         table.search(
        //             jQuery.fn.DataTable.ext.type.search.html(this.value)
        //         ).draw();
        //     } );

            var checkAll = 0;
            $("#checkAll").click(function () {
              if(checkAll==0){
                $("input:checkbox").prop('checked', true);
                checkAll = 1;
              }else{
                $("input:checkbox").prop('checked', false);
                checkAll = 0;
              }

            });


        //    $("#btnExcel").click(function(){
        //       $('#all').attr('action', '/Colaboradores/generarExcel/');
        //       $('#all').attr('target', '_blank');
        //       $("#all").submit();
        //     });

        //     $("#btnPDF").click(function(){
        //       $('#all').attr('action', '/Colaboradores/generarPDF/');
        //       $('#all').attr('target', '_blank');
        //       $("#all").submit();
        //     });

        //     $("#delete").click(function(){
        //       var seleccionados = $("input[name='borrar[]']:checked").length;
        //       if(seleccionados>0){
        //         alertify.confirm('¿Segúro que desea eliminar lo seleccionado?', function(response){
        //           if(response){
        //             $('#all').attr('target', '');
        //             $('#all').attr('action', '/Colaboradores/delete');
        //             $("#all").submit();
        //             alertify.success("Se ha eliminado correctamente");
        //           }
        //         });
        //       }else{
        //         alertify.confirm('Selecciona al menos uno para eliminar');
        //       }
        //     });

            /*$("select").change(function(){
              $.ajax({
                url: "/Colaboradores/getTabla",
                type: "POST",
                data: $("#all").serialize(),
                success: function(data){
                  $("#registros").html(data);
                }
              });
            });*/
        });
      </script>
html;
        return $extraFooter;
    }

    public function alerta($reporte='', $parametro='add'){
        $regreso = "/Colaboradores/";
        $accion = '';

        if($parametro == 'add')
            $accion = "agregado";

        if($parametro == 'edit')
            $accion = "modificado";

        if($parametro == 'delete')
            $accion = "eliminado";

        $mensaje = '';

        if($reporte->_id_colaborador!= '' && intval($reporte->_id_colaborador) > 0){
            $mensaje .=<<<html
         <div class="alert alert-success">
          <strong>Success!</strong> Se ha $accion correctamente el colaborador con el Id $reporte->_id_colaborador.
        </div>
html;
        }

        if($reporte->_numero_empleado!=''){
            if(intval($reporte->_numero_empleado) >= 0){
                $mensaje .=<<<html
           <div class="alert alert-success">
           <strong>Success!</strong> Se ha asigando correctamente el numero de empleado.
           </div>
html;
            }else{
                $mensaje .=<<<html
           <div class="alert alert-error">
           <strong>Error!</strong> No se asigno el numero de empleado debido a un error.
           </div>
html;
            }
        }

        if(count($reporte->_horarios)>0){
            foreach ($reporte->_horarios as $key => $value) {
                if(intval($value) >= 0){
                    $mensaje .=<<<html
             <div class="alert alert-success">
             <strong>Success!</strong> Se ha asigando correctamente el horario al colaborador.
             </div>
html;
                }else{
                    $mensaje .=<<<html
             <div class="alert alert-error">
             <strong>Error!</strong> No se asigno el horario debido a un error.
             </div>
html;
                }
            }
        }

        if(count($reporte->_incentivos)>0){

            foreach ($reporte->_incentivos as $key => $value) {
                if(intval($value) >= 0){
                    $mensaje .=<<<html
             <div class="alert alert-success">
             <strong>Success!</strong> Se ha asigando correctamente el incentivo al colaborador.
             </div>
html;
                }else{
                    $mensaje .=<<<html
             <div class="alert alert-error">
             <strong>Error!</strong> No se asigno el incentivo debido a un error.
             </div>
html;
                }
            }
        }

        if($reporte->_ids >= 1){
            $id = $reporte->_ids;
            $mensaje .=<<<html
             <div class="alert alert-success">
             <strong>Success!</strong> Se ha eliminado el colaborador.
             </div>
html;
        }


        View::set('class',$class);
        View::set('regreso',$regreso);
        View::set('mensaje',$mensaje);
        View::set('header',$this->_contenedor->header($extraHeader));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("alertas");
    }

    public function getColaboradorNombre($colab){
        $colaborador = '';
        foreach (ColaboradoresDao::getColaboradorNombre($colab) as $key => $value) {
            $colaborador .=<<<html
            <h2>
                <a>
                    <p class="excerpt"><span class="bi bi-file-person" style="color:grey"></span> | {$value['nombre']}</p>                                                     
                </a>
            </h2>
html;
        }
        return $colaborador;
    }

    public function DocumentoAdd(){
        $documento = new \stdClass();

        $fechamovimiento =  date('Y-m-d H:i:s');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $documento->_id_c = $_POST['id_colaborador'];
            $colaborador = $_POST['id_colaborador'];
            $documento->_titulo = $_POST['title'];
            $titulo = $_POST['title'];
            $documento->_descripcion = $_POST['description'];
            $documento->_id_archivo = $_POST['archivo'];
            $documento->_fecha = $fechamovimiento;


            $fichero = $_FILES["file"];
            move_uploaded_file($fichero["tmp_name"], "files/".$colaborador.$titulo.'.pdf');

            $documento->_url = $colaborador.$titulo.'.pdf';
            $id = ColaboradoresDao::insert_documento($documento);

            if ($id) {
                echo 'success';

            } else {
                echo 'fail';
            }
        } else {
            echo 'fail';
        }
    }

    public function Delete(){
        foreach (ColaboradoresDao::files($_POST['a']) as $key => $value) {

            $dato = ColaboradoresDao::delete($_POST['a']);
            $res = $value['filename'];

            if($dato == 1)
            {
                echo "true";
                unlink("./files/".$res);
            }
            else
            {
                echo "false";
            }
        }


    }

    public function Delete_Estudios(){
        $dato = ColaboradoresDao::delete_estudios($_POST['a']);

        if($dato >= 1)
        {
            echo "true";
        }
        else
        {
            echo "fail";
        }
    }

    public function Delete_Hijos(){
        $dato = ColaboradoresDao::delete_hijos($_POST['a']);

        if($dato >= 1)
        {
            echo "true";
        }
        else
        {
            echo "fail";
        }
    }

    public function Delete_Competencia(){
        $dato = ColaboradoresDao::delete_competencia($_POST['a']);

        if($dato >= 1)
        {
            echo "true";
        }
        else
        {
            echo "fail";
        }
    }

    public function Delete_Domicilio(){
        $dato = ColaboradoresDao::delete_domicilio($_POST['a']);

        if($dato >= 1)
        {
            echo "true";
        }
        else
        {
            echo "fail";
        }
    }

}

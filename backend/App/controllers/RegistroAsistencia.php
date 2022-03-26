<?php
namespace App\controllers;
defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\MasterDom;
use \App\controllers\Contenedor;
use \Core\Controller;
use \App\models\RegistroAsistencia AS RegistroAsistenciaDao;

class RegistroAsistencia{
   

    private $_contenedor;

    public function codigo($id) {
        $extraHeader =<<<html
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/favicon.png">
        <link rel="icon" type="image/png" href="/assets/img/favicon.png">
        <title>
            Asistencia CONAVE Convención 2022 ASOFARMA
        </title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="/assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
        <link rel="stylesheet" href="/css/alertify/alertify.core.css" />
        <link rel="stylesheet" href="/css/alertify/alertify.default.css" id="toggleCSS" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

html;
        $extraFooter =<<<html
        <script src="/js/jquery.min.js"></script>
        <script src="/js/validate/jquery.validate.js"></script>
        <script src="/js/alertify/alertify.min.js"></script>
        <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
        <!--   Core JS Files   -->
        <script src="/assets/js/core/popper.min.js"></script>
        <script src="/assets/js/core/bootstrap.min.js"></script>
        <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
        <!-- Kanban scripts -->
        <script src="/assets/js/plugins/dragula/dragula.min.js"></script>
        <script src="/assets/js/plugins/jkanban/jkanban.js"></script>
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
        <script src="/assets/js/soft-ui-dashboard.min.js?v=1.0.5"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script src="http://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" defer></script>
        <link rel="stylesheet" href="http://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />
        
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" defer></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />

html;

        $codigo = RegistroAsistenciaDao::getById($id);

        $lista_registrados = RegistroAsistenciaDao::getRegistrosAsistenciasByCode($id);

        $nombre_asistencia = RegistroAsistenciaDao::getRegistrosAsistenciasByCode($id)[0]['nombre_asistencia'];

        $tabla='';
        foreach ($lista_registrados as $key => $value) {
            $tabla.=<<<html
            <tr>
                <!--td id="id_registro_asistencia" >{$value['id_registro_asistencia']}</td-->
                <td>{$value['nombre_completo']}</td>
                <td><u><a href="mailto:{$value['email']}"><span class="fa fa-mail-bulk"> </span> {$value['email']}</a></u></td>
                <td><u><a href="https://api.whatsapp.com/send?phone=52{$value['telefono']}&text=Buen%20d%C3%ADa,%20te%20contacto%20de%20parte%20del%20Equipo%20Grupo%20LAHE%20%F0%9F%98%80" target="_blank"><span class="fa fa-whatsapp" style="color:green;"> </span> {$value['telefono']}</a></u></td>
                <td>{$value['nombre_linea']}</td>
                <td>{$value['nombre_bu']}</td>
                <td>
                    <button class="btn btn-danger " onclick="borrarRegister({$value['id_registro_asistencia']})" type="button">
                        <i class="fas fa-trash"></i>
                    </button>
                <td>
            </tr>
html;

        }
        
        foreach($codigo as $key => $value)
        {
            if($value['id_asistencia'] != '')
            {
                $flag = true;
                $nombre = $value['nombre'];
                $descripcion = $value['descripcion'];
                $fecha_asistencia = $value['fecha_asistencia'];
                $hora_asistencia_inicio = $value['hora_asistencia_inicio'];
                $hora_asistencia_fin = $value['hora_asistencia_fin'];
            }
        }


        if($flag == true)
        {
            View::set('tabla',$tabla);
            View::set('nombre',$nombre);
            View::set('descripcion',$descripcion);
            View::set('nombre_asistencia',$nombre_asistencia);
            View::set('fecha_asistencia',$fecha_asistencia);
            View::set('hora_asistencia_inicio',$hora_asistencia_inicio);
            View::set('hora_asistencia_fin',$hora_asistencia_fin);
            View::set('header',$extraHeader);
            View::set('footer',$extraFooter);
            View::render("registro_asistencias_codigo");
        }
        else
        {
            // View::render("asistencias_panel_registro");
            View::render("asistencias_all_vacia");
        }
    }

    public function mostrarLista($clave){
        $lista_registrados = RegistroAsistenciaDao::getRegistrosAsistenciasByCode($clave);

        echo json_encode($lista_registrados);
    }

    public function borrarRegistrado($id_user){

        $id_asistencia = '';
        $delete_registrado = RegistroAsistenciaDao::delete($id_user);

        echo json_encode($delete_registrado);
    }

    public function registroAsistencia($clave, $code){

        $user_clave = RegistroAsistenciaDao::getInfo($clave)[0];
        
        // var_dump($clave);
        $linea_principal = RegistroAsistenciaDao::getLineaPrincipial();
        $bu = RegistroAsistenciaDao::getBu();
        
        $id_asistencia = RegistroAsistenciaDao::getIdRegistrosAsistenciasByCode($code)[0];
        // echo 'prueba';
        $hay_asistente = RegistroAsistenciaDao::findAsistantById($user_clave['utilerias_asistentes_id'],$id_asistencia['id_asistencia'])[0];

        
        if($user_clave){

            if ($hay_asistente) {
                $msg_insert = 'success_find_assistant';
            } else {
                $msg_insert = 'fail_not_found_assistant';
                RegistroAsistenciaDao::addRegister($id_asistencia['id_asistencia'],$user_clave['utilerias_asistentes_id']);
            }
 
            $data = [
                'datos'=>$user_clave,
                'linea_principal'=>$linea_principal,
                'bu'=>$bu,
                'id_asistencia'=>$id_asistencia['id_asistencia'],
                'status'=>'success',
                'msg_insert'=>$msg_insert,
                'clave'=>$clave,
                'code'=>$code,
                'hay_asistente'=> $hay_asistente
            ];
        }else{
            $data = [
                'status'=>'fail'
            ];
        }

        echo json_encode($data);
    }
}